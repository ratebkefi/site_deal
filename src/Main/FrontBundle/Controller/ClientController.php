<?php

namespace Main\FrontBundle\Controller;

use Back\CommandeBundle\Entity\Command;
use Back\CommandeBundle\Common\PrintCoupon;
use Main\FrontBundle\Form\InscriptionType;
use Main\FrontBundle\Form\ResetPasswordType;
use Main\FrontBundle\Form\ResetType;
use Main\FrontBundle\Form\ClientType;
use Back\CommandeBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Back\DashBundle\Entity\BigFidHistorique;
use Main\FrontBundle\Form\ConnexionType;
use Back\DashBundle\Common\Tools;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Main\FrontBundle\Facebook\FacebookSession;
use Main\FrontBundle\Facebook\FacebookRedirectLoginHelper;
use Main\FrontBundle\Facebook\FacebookRequest;
use Main\FrontBundle\Facebook\FacebookResponse;
use Main\FrontBundle\Facebook\FacebookSDKException;
use Main\FrontBundle\Facebook\FacebookRequestException;
use Main\FrontBundle\Facebook\FacebookAuthorizationException;
use Main\FrontBundle\Facebook\GraphObject;
use Main\FrontBundle\Facebook\GraphLocation;
use Main\FrontBundle\Facebook\GraphUser;
use Main\FrontBundle\Facebook\Entities\AccessToken;
use Main\FrontBundle\Facebook\HttpClients\FacebookCurlHttpClient;
use Main\FrontBundle\Facebook\HttpClients\FacebookHttpable;
use Back\CommandeBundle\Entity\Adress;
use Main\FrontBundle\Form\AdressType;
use Main\FrontBundle\Entity\Token;
use FOS\UserBundle\Util\TokenGeneratorInterface;

use Back\CommandeBundle\Form\CouponManagerType;
use Back\DashBundle\Common;
use iio\libmergepdf\Merger;




class ClientController extends Controller
{


    public static $SRVID = "67" ;
    public static $PRID = "34" ;
    public static $SC = "BigDeal" ;
    public static $OPID = array(
        "org" => 60501,
        "tt" => 60502,
        "tun" => 60503
        );
    public function abonnementAction()
    {
        return $this->render('MainFrontBundle:Client:abonnement.html.twig', array());
    }

    public function bigfidAction(Request $request)
    {
    $securityContext = $this->container->get('security.context');

    if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

            return $this->redirect($this->generateUrl('identification'));

        }
        $client = $this->get('security.context')->getToken()->getUser()->getId();
        if (isset($client)) {

            $total = $this->getDoctrine()->getRepository('BackDashBundle:BigFidHistorique')->soldeBigFidClient($client);
            $paginator = $this->get('knp_paginator');
            $bigFid = $this->getDoctrine()->getRepository('BackDashBundle:BigFidHistorique')->findBy(array("client" => $client), array('dcr' => 'DESC'));
            $pagination = $paginator->paginate(
                $bigFid,
                $request->query->get('page', 1)/*page number*/,
                25/*limit per page*/
            );
            return $this->render('MainFrontBundle:Client:bigfid.html.twig', array(
                'pagination' => $pagination, 'totalBigFid' => $total

            ));
        } else
            return $this->redirect($this->generateUrl('main_front_homepage'));

    }

    public function couponAction(Command $command)
    {
        $securityContext = $this->container->get('security.context');
        $client = $this->get('security.context')->getToken()->getUser();
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

            return $this->redirect($this->generateUrl('main_front_homepage'));

        } else {
            if ($command->getClient()->getId() != $client->getId()) {
                return $this->redirect($this->generateUrl('main_front_homepage'));

            }
            else
            {
                $pdf = $this->get('white_october.tcpdf')->create();
                // set document information
                $pdf = PrintCoupon::printc($command, $pdf);
                return new \Symfony\Component\BrowserKit\Response($pdf->Output("pdfcoupon.pdf"));
            }
        }

    }

    public function compteAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $request1 = $request->request->get('commandebundle_client');

        $client = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new ClientType(), $client);


        if ($request->getMethod() == 'POST') {


            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $request->request->get('commandebundle_client');
                $em = $this->getDoctrine()->getManager();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($client);

                $client->setUsername($client->getEmail());

                $encodedPassword = $encoder->encodePassword($client->getId(), $client->getSalt());

                if($data["password"]["first"])
                    $client->setPassword($data["password"]["first"]);


                if ($data["title"] == 'M.')
                    $client->setSex("Homme");
                else
                    $client->setSex("Femme");

                $em->persist($client);
                $em->flush();
                $session = $this->get('session');
                if ($session->get('refer') != "")
                    return $this->redirect($session->get('refer'));
                else
                    return $this->redirect($this->generateUrl('mon_compte'));

            } else {
                // echo $form->getErrors();
            }
        }

        return $this->render('MainFrontBundle:Client:compte.html.twig', array(
            'form' => $form->createView(), 'client' => $client,
        ));

    }

    public function detcommandeAction(Command $commande)
    {
        $securityContext = $this->container->get('security.context');
        $client = $this->get('security.context')->getToken()->getUser();
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

            return $this->redirect($this->generateUrl('identification'));

        } else {
            if ($commande->getClient()->getId() != $client->getId()) {
                return $this->redirect($this->generateUrl('identification'));
            }
        }

        $coupon = $commande->getCoupon();
        $em = $this->getDoctrine()->getManager();
        $barcode='';
        foreach ($coupon as $value) {
            $barcode=$value->getAramexid();
            break;
        }
        function httpGet($url)
        {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            //  curl_setopt($ch,CURLOPT_HEADER, false);
            $output=curl_exec($ch);
            curl_close($ch);
            return $output;
        }
        $api_key='bccd3d465f272a58335bb91b';
        $get_api=httpGet("http://5.196.15.248/api/bigdealcoupon/tracking/barcode/".$barcode."/api_key/bccd3d465f272a58335bb91b/format/json");
        //$get_api='[{"id":1,"status_code":"101","status_label":"Enlevement effectue","update_date":"2016-01-22 17:48:49"},{"id":2,"status_code":"104","status_label":"Livraison effectuee","update_date":"2016-01-23"}]';
        $get_api=json_decode($get_api);
        if(isset($get_api->error)) {

                $get_api='error';
                //$get_api = json_decode($get_api);

        }

        return $this->render('MainFrontBundle:Client:detailcommande.html.twig', array('commande' => $commande,'entities' => $get_api));
    }

    public function commandeAction()
    {
        $securityContext = $this->container->get('security.context');
        $request = $this->get('request');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $client = $this->get('security.context')->getToken()->getUser();
        $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('client' => $client), array('id' => 'DESC'));
        //$commande = $client->getCommand();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commande,
             $request->query->get('page', 1),8 );
        return $this->render('MainFrontBundle:Client:commande.html.twig', array('client' => $client, 'commande' => $pagination));

    }

    public function deconnexionAction()
    {
        $session = $this->getRequest()->getSession();
        $session->remove('client');
        return $this->redirect($this->generateUrl('main_front_homepage'));
    }

    public function identificationAction()    {


        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('main_front_homepage'));
        }
        $em = $this->getDoctrine()->getManager();
        FacebookSession::setDefaultApplication('831428680266309', '2afd2de4bbc5dee81b933f5f93e21fc0');


        $helper = new FacebookRedirectLoginHelper("https://www.bigdeal.tn/connexion.html");
        try {
            $session = $helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
            // When Facebook returns an error
        } catch (Exception $ex) {
            // When validation fails or other local issues
        }
        if (isset($session)) {
            // graph api request for user data
            $request = new FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            $data = $response->getGraphObject(GraphObject::className());

            $loginUrl = "";
            $email = $data->getProperty("email");
            //Tools::dump($data,true);
            $testclient = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy(array('email' => $email));

            $session = $this->getRequest()->getSession();
            if (count($testclient) == 0) {

                $client = new Client();
                $client->setName($data->getProperty("last_name"));
                $client->setFname($data->getProperty("first_name"));
                $client->setDcr(new \dateTime());
                if ($data->getProperty("gender") == 'male') {
                    $client->setTitle("M.");
                } else {
                    $client->setTitle("Mme");
                }
                $client->setEmail($email);
                $client->setFbid($data->getProperty("id"));
                $client->setPhone('');
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($client);
                // On ne se sert pas du sel pour l'instant
                $client->setSalt('');
                $client->setUsername($client->getEmail());
                $client->setRoles(array('ROLE_CLIENT'));
                $encodedPassword = $encoder->encodePassword($data->getProperty("id"), $client->getSalt());
                $client->setPassword($encodedPassword);

                if ($client->getTitle() == 'M.')
                    $client->setSex("Homme");
                else
                    $client->setSex("Femme");
                $client->setStat(1);
                $em->persist($client);
                $em->flush();

                self::regleInscription($client);

            } else {
                $client = $testclient[0];

                $id = $data->getProperty("id");
                if (isset($id)) {
                    $client->setFbid($data->getProperty("id"));
                    $em->persist($client);
                    $em->flush();

                }
            }
            // auto connect
            $token = new UsernamePasswordToken($client, null, "client", $client->getRoles());
            $this->get("security.context")->setToken($token); //now the user is logged in
            //now dispatch the login event
            $request = $this->get("request");
            $event = new InteractiveLoginEvent($request, $token);
            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
            $session = $this->get('session');
            if ($session->get('refer') != "")
                return $this->redirect($session->get('refer'));
            else
                return $this->redirect($this->generateUrl('mon_compte'));

        } else {
            $loginUrl = $helper->getLoginUrl(array(
                'scope' => 'email'
            ));

        }


        /* fin facebook*/

        $request = $this->getRequest();
        $session = $request->getSession();
        // Tools::dump($request->query,true);
        //$loginUrl="";
        // get the login error if there is one

        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {

            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('MainFrontBundle:Client:login.html.twig', array(
            // Valeur du précédent nom d'utilisateur entré par l'internaute
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
            'loginUrl' => $loginUrl
        ));

    }

    public function confirmAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->findBy(array("confirmationToken" =>$token));
        if(count($client)>0)
        {
            $currentClient = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->find($client[0]->getId());
            $currentClient->setStat(true);
            $em->persist($currentClient);
            $em->flush();
           // $this->get('session')->getFlashBag()->set('alert-success', 'Votre compte a été validé avec succès');
            return $this->redirect($this->generateUrl('confirmation_inscription'));


        }
        else
        {
            $this->get('session')->getFlashBag()->set('alert-error', 'compte n\'existe pas ');
            return $this->redirect($this->generateUrl('main_front_homepage'));


        }
    }
    public function inscriptionAction(Request $request)
    {
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('main_front_homepage'));
        }
        $em = $this->getDoctrine()->getManager();
        FacebookSession::setDefaultApplication('831428680266309', '2afd2de4bbc5dee81b933f5f93e21fc0');
        $helper = new FacebookRedirectLoginHelper("http://www.bigdeal.tn/inscription.html");
        try {
            $scope = array('email');
            $session = $helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
            // The Graph API returned an error
        } catch (Exception $ex) {
            //echo '<h2>Exception 2</h2>';
            //echo '<pre>' , print_r($ex) , '</pre>';        
        }
        if (isset($session)) {

            // graph api request for user data
            $request = new FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            $data = $response->getGraphObject(GraphUser::className());
            //Tools::dump($data,true);
            $loginUrl = $helper->getLoginUrl(
                array(
                    'scope' => 'email'
                ));

            $email = $data->getProperty("email");

            //echo $email ; exit;
            $testclient = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy(array('email' => $email));
            $session = $this->getRequest()->getSession();
            if (count($testclient) == 0) {

                $client = new Client();
                $client->setName($data->getProperty("last_name"));
                $client->setFname($data->getProperty("first_name"));
                $client->setDcr(new \dateTime());
                if ($data->getProperty("gender") == 'male') {
                    $client->setTitle("M.");
                } else {
                    $client->setTitle("Mme");
                }
                $client->setEmail($email);
                $client->setUsername($data->getProperty("email"));
                $client->setFbid($data->getProperty("id"));

                $client->setPhone('');
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($client);
                // On ne se sert pas du sel pour l'instant
                $client->setSalt('');
                $client->setUsername($data->getProperty("email"));
                $client->setRoles(array('ROLE_CLIENT'));
                $encodedPassword = $encoder->encodePassword($data->getProperty("id"), $client->getSalt());
                $client->setPassword($encodedPassword);

                if ($client->getTitle() == 'M.')
                    $client->setSex("Homme");
                else
                    $client->setSex("Femme");
                $client->setStat(1);
                $em->persist($client);
                $em->flush();


                if (!$client) {
                    throw new UsernameNotFoundException("User not found");
                } else {
                    $token = new UsernamePasswordToken($client, null, "client", $client->getRoles());
                    $this->get("security.context")->setToken($token); //now the user is logged in

                    return $this->redirect($this->generateUrl('mon_compte'));
                }
                //return $this->redirect($this->generateUrl('main_front_homepage'));

            } else {
                $client = $testclient[0];
                $id = $data->getProperty("id");
                if (isset($id)) {
                    $client->setFbid($data->getProperty("id"));
                    $em->persist($client);
                    $em->flush();
                }
            }
            $token = new UsernamePasswordToken($client, null, "client", $client->getRoles());
            $this->get("security.context")->setToken($token); //now the user is logged in

            //now dispatch the login event
            $request = $this->get("request");
            $event = new InteractiveLoginEvent($request, $token);
            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
            return $this->redirect($this->generateUrl('mon_compte'));

        } else {
            $loginUrl = $helper->getLoginUrl(
                array(
                    'scope' => 'email'
                ));

        }


        $inscription = new Client();
        $adresseClient = new Adress();
        $param = $request->request->get('main_frontbundle_client');
        $request = $this->get('request');

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new InscriptionType(), $inscription);
        if ($request->getMethod() == 'POST') {

            //$request = $this->get('request');

            $email = $param['email'];
            $localiteId = $request->request->get('localite');
            $adresse = $request->request->get('adresse');
            $indicationAdresse = $request->request->get('indication_adresse');


            $localite = $em->getRepository('BackCommandeBundle:Localite')->find($localiteId);
            $verifMail = $em->getRepository('BackCommandeBundle:Client')->findBy(array("email" => $email));

            $form->bind($request);
            if ($form->isValid()) {
                //Tools::dump($request->request,true);
                if (count($verifMail) == 0) {
                    $em = $this->getDoctrine()->getManager();
                    $data = $request->request->get('main_frontbundle_client');
                    //Tools::dump($data,true);
                    $factory = $this->get('security.encoder_factory');
                    $password = $data['password']['first'];
                    $encoder = $factory->getEncoder($inscription);
                    // On ne se sert pas du sel pour l'instant
                    $inscription->setSalt('');
                    $inscription->setUsername($inscription->getEmail());
                    $inscription->setRoles(array('ROLE_CLIENT'));
                    $encodedPassword = $encoder->encodePassword($password, $inscription->getSalt());
                    $inscription->setPassword($password);
                     $tokenGenerator = md5($inscription->getEmail());
                    if ($inscription->getTitle() == 'M.')
                        $inscription->setSex("Homme");
                    else
                        $inscription->setSex("Femme");
                    $inscription->setStat(false);
                    $inscription->setConfirmationToken($tokenGenerator);
                    $inscription->setDcr(new \dateTime());

                    $em->persist($inscription);
                    $em->flush();
                    $adresseClient = new Adress();
                    $adresseClient->setAdress($adresse);
                    $adresseClient->setIndcation($indicationAdresse);
                    $adresseClient->setStat(0);
                    $adresseClient->setClient($inscription);
                    $localite = $em->getRepository('BackCommandeBundle:Localite')->find($request->request->get('cp'));
                    $adresseClient->setLocalite($localite);
                    $em->persist($adresseClient);
                    $em->flush();
                    self::regleInscription($inscription);
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Bienvenue chez BIGDeal')
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($email)
                        ->setBody($this->renderView('MainFrontBundle:Email:register.html.twig', array("token" => $inscription->getConfirmationToken(),"nom" => $inscription->getName(), "prenom" => $inscription->getFname())));
                    $message->setContentType("text/html");
                    $this->get('mailer')->send($message);

                        return $this->redirect($this->generateUrl('message_inscription'));

                } else {
                    $this->get('session')->getFlashBag()->set('alert-error', 'E-mail existe déjà');

                    return $this->redirect($this->generateUrl('main_front_homepage'));
                }


            } else {
                //var_dump ($form->getErrors());
            }
        }
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent" => null));

        return $this->render('MainFrontBundle:Client:inscription.html.twig', array(
            'form' => $form->createView(),
            'loginUrl' => $loginUrl,
            'gouvernorat' => $gouvernorat
        ));
    }

    public function messageAction()
    {
        return $this->render('MainFrontBundle:Client:message.html.twig');

    }


    public function printlivAction(Command $command)
    {
        if($command->getCaisse()->getId()!=26)
            return $this->redirect($this->generateUrl('main_front_homepage'));


            // générer un mail pour le client final avec validation de génération de coupon
            $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = PrintCoupon::printc($command, $pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function codePostaleAction()
    {
        $request = $this->get('request');
        $id = $request->request->get("id");

        $requette = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($id);


        $array = $requette->getCp();

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function delegationAction()
    {
        $request = $this->get('request');
        $id = $request->request->get("id");

        $delegation = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent" => $id));

        foreach ($delegation as $value) {
            $array[] = array(
                "id" => $value->getId(),
                "name" => $value->getName()

            );
        }


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function regleInscription($idClient)
    {
        $em = $this->getDoctrine()->getManager();
        $tauxBigFid = 20;
        //insertion 20big pour historique de ce client
        $historique = new BigFidHistorique();
        $historique->setMontant($tauxBigFid);
        $historique->setDcr(new \DateTime());
        $historique->setMotif("Bonus d'inscription");
        $historique->setClient($idClient);
        $historique->setOperation(1);

        $em->persist($historique);
        $em->flush();
    }

    public function villeAction()
    {
        $request = $this->get('request');
        $cp = $request->query->get('cp');
        $em = $this->getDoctrine()->getManager();
        $villeCodePostal = $em->getRepository('BackCommandeBundle:Localite')->findBy(array('cp' => $cp));
        if ($villeCodePostal) {
            foreach ($villeCodePostal as $value) {
                $id = $value->getId();
                $ville = $value->getName();
            }
        } else {
            $ville = null;
        }
        $response = new JsonResponse();
        return $response->setData(array('label' => $ville, 'id' => $id));
    }

    public function resetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ResetType());
        $param = $request->request->get('reset_client');
        $email = $request->query->get('token');
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('main_front_homepage'));
        }
        $token = $this->getDoctrine()->getRepository('MainFrontBundle:Token')->findBy(array("email" => $email));
        if (count($token) == 0) {
            return $this->redirect($this->generateUrl('mot_de_pass_oublie'));

        } else {


            if ($request->getMethod() == 'POST') {
                $form->bind($request);
                $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($token[0]->getClient());

                $client->setPassword($param["pwd"]);
                $client->setPwd(md5($param["pwd"]));
                $em->persist($client);
                $em->flush();
                /*----modifier mot de passe sur site joomla */
                $servername = "ns514821.ip-192-99-149.net";
                $username = "bigdealc";
                $password = "qHRCz7D-#%m4";
                $dbname = "bigdealc_bigdealv2";

// Create connection
                $conn = new \mysqli($servername, $username, $password, $dbname);
// Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "UPDATE tibh5_users SET password ='".md5($param["pwd"])."' WHERE email='".$client->getEmail()."'";

                if ($conn->query($sql) === TRUE) {
                 //  echo "Record updated successfully"; exit;
                } else {
                   // echo "Error updating record: " . $conn->error; exit;
                }

                $conn->close();
                /*-------------------------------------------*/
                $oldToken = $this->getDoctrine()->getRepository('MainFrontBundle:Token')->find($token[0]->getId());
                $em->remove($oldToken);
                return $this->redirect($this->generateUrl('identification'));


            }


            return $this->render('MainFrontBundle:Client:reset.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function resetPasswordAction(Request $request)
    {
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('main_front_homepage'));
        }
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $bouton = $request->request->get('bouton_tel');
            $mail2 = $request->request->get('email2');
            $telClient = $request->request->get('tel');
            //var_dump($request) ; exit;
            //echo $mail2 ;
            if($telClient)
            {
            $clientParTel = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy(array('email' => $mail2));
            //echo count($clientParTel); exit;
            if (count($clientParTel) > 0) {
            
                if(is_numeric($clientParTel[0]->getPhone()))
                {
                $tel = $clientParTel[0]->getPhone();
                }
                else
                {
                    $tel = $telClient;

                }
                    if(strpos($tel,"+216") === 0){
            $tel = substr($tel, 4);
        }elseif(strpos($tel,"00216") === 0){
            $tel = substr($tel, 5);
        }
        switch (substr($tel, 0,1)) {
            case '9':
            case '4':
                $opid = self::$OPID['tt'];
                # code...
                break;
            
            case '5':
                # code...
                $opid = self::$OPID['org'];
                break;
            case '2':
                # code...
                $opid = self::$OPID['tun'];
                break;
        }
        $newpassword = Tools::randomPassword();
        $currentClient = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($clientParTel[0]->getId());
        $currentClient->setPassword($newpassword);
        $currentClient->setPhone($tel);
        $em->persist($currentClient);
        $em->flush();
        $login="Login :".$clientParTel[0]->getEmail()."\n";
        $motDePasse="Mot de passe : ".$newpassword ;
         $message = rawurlencode( $login.$motDePasse);

         //$url ='http://smsc.jmt.tn/sendSMS.php?SRVID=67&PRID=34' . self::$SC . '&MOBILE=' . $tel . '&OPID=' . $opid . '&MESSAGE=' . $message . '&ENCODE=0&LOGIN=bigdeal&PASS=big2014deal';
        
$url ='http://smsc.jmt.tn/sendSMS.php?SRVID=67&PRID=34&SC=BigDeal&MOBILE=' . $tel . '&OPID=' . $opid . '&MESSAGE=' . $message . '&ENCODE=0&LOGIN=bigdeal&PASS=big2014deal';

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);
        //exit;
     $this->get('session')->getFlashBag()->set('alert-success', 'Un message de confirmation vient d\'être envoyé.');            
            }
            else
            {
                $this->get('session')->getFlashBag()->set('alert-error', 'Compte n\'existe pas');
            }
            
            }
            else
            {
            $param = $request->request->get('reset_password');
            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy(array('email' => $param['email']));
            if (count($client) > 0) {
                $token = new Token();
                $token->setEmail(md5($param['email']));
                $token->setClient($client[0]->getId());
                $em->persist($token);
                $em->flush();

                $id = md5($client[0]->getId());
                $message = \Swift_Message::newInstance()
                    ->setSubject('Demande changement de mot de passe')
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($param['email'])
                    ->setBody($this->renderView('MainFrontBundle:Email:resetPassword.html.twig', array("nom" => $client[0]->getName(), "prenom" => $client[0]->getFname(), 'email' => md5($client[0]->getEmail()))));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->set('alert-success', 'Un email de confirmation vient d\'être envoyé.');

            } else {
                $this->get('session')->getFlashBag()->set('alert-error', 'Compte n\'existe pas');

            }
            }
            return $this->redirect($this->generateUrl('mot_de_pass_oublie'));

        }

        $form = $this->createForm(new ResetPasswordType());

        return $this->render('MainFrontBundle:Client:mot_de_passe_oublie.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function adresseAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $client = $this->get('security.context')->getToken()->getUser();
        $adress = new Adress();
        $form = $this->createForm(new AdressType(), $adress);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                //Tools::dump($request->request,true);
                $em = $this->getDoctrine()->getManager();
                $adress->setClient($client);
                $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($request->request->get('ville'));
                //echo count($localite);exit;

                $adress->setLocalite($localite);

                $em->persist($adress);

                $em->flush();
                return $this->redirect($this->generateUrl('mes_adresse'));
            }
        }
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent" => null));

        $adresse = $client->getAdresses();
        return $this->render('MainFrontBundle:Client:mesadresses.html.twig', array(
            'client' => $client,
            'gouvernorat' => $gouvernorat,

            'form' => $form->createView(),
        ));
    }

    public function updateadresseAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        $id = $request->request->get("id");
        $adress = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->find($id);
        //Tools::dump($request,true);
        $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array('cp' => $request->request->get('cp'), 'id' => $request->request->get('ville')));
        //echo count($localite);exit;
        foreach ($localite as $value) {
            $adress->setLocalite($value);
        }

        $adress->setIndcation($request->request->get('indcation'));
        $adress->setAdress($request->request->get('adress'));
        $em->persist($adress);
        $em->flush();
        //Tools::dump($request->request,true);
        return $this->redirect($this->generateUrl('mes_adresse'));
    }

    public function updateadresselivraisonAction()
    {
        $securityContext = $this->container->get('security.context');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $dealid=$request->request->get('deal');
        $ref=$request->request->get('ref');
        $qte=$request->request->get('qte');

        $em = $this->getDoctrine()->getManager();
        $id = $request->request->get("id");
        $adress = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->find($id);

        //Tools::dump($request,true);
        $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array('cp' => $request->request->get('cp'), 'id' => $request->request->get('ville')));
        //echo count($localite);exit;
        foreach ($localite as $value) {
            $adress->setLocalite($value);
        }

        $adress->setIndcation($request->request->get('indcation'));
        $adress->setAdress($request->request->get('adress'));
        $em->persist($adress);
        $em->flush();
        //Tools::dump($request->request,true);

        return $this->redirect($this->generateUrl('jachetelist', array("deal" => $dealid,"id" => $ref)).'?qte='.$qte.'&tabtag=1');
    }



    public function deleteadresseAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $id = $request->request->get("id");
        $adress = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($adress);
        $em->flush();
        exit;
    }

    public function defaultdresseAction()
    {
        $securityContext = $this->container->get('security.context');

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('identification'));
        }
        $request = $this->get('request');
        $id = $request->request->get("id");
        $user = $request->request->get("userid");
        $adress = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->find($id);

        $adress->setStat(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($adress);
        $em->flush();

        $adressclient = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findByClient($user);
        foreach ($adressclient as $value) {
            if ($value->getId()!=$id) {
                $value->setStat(false);
                $em->persist($value);
                $em->flush();
            }
        }
        exit;
    }



    public function menuclientAction()
    {
        return $this->render('MainFrontBundle:Client:menuclient.html.twig', array());
    }

    public function searchlocalityAction(Request $request)
    {
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findbyname($query);
        $tab = array();
        foreach ($localite as $value) {
            if ($value->getCp() > 0) {
                $tab[] = array(
                    "id" => $value->getCp(),
                    "full_name" => $value->getName(),
                    "cp" => $value->getCp(),
                    "first_two_letters" => substr($value->getName(), 0, 2)
                );
            }
        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function confirmationAction(Request $request)
    {
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('main_front_homepage'));
        }
        return $this->render('MainFrontBundle:Client:confirmation.html.twig');
    }
}
