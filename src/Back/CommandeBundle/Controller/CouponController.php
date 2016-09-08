<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 02/03/2015
 * Time: 12:02
 */

namespace Back\CommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Back\CommandeBundle\Entity\Command;
Use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Common\PrintCoupon;
use Back\CommandeBundle\Form\CouponManagerType;
use Back\DashBundle\Common;
use iio\libmergepdf\Merger;
use Symfony\Component\HttpFoundation\Response;
use Back\CommandeBundle\Entity\Checkc;

class CouponController extends Controller
{
    public function indexAction(Command $command)
    {
        $coupon = $command->getCoupon();
        $coup_id = [];
        $coupon_consomme=0;

        if($command->getEtat()==1)
        {
            $coupon_consomme=1;
            foreach ($coupon as $value) {
                array_push($coup_id, $value->getId());
            }
        }

        $checks = $this->getDoctrine()->getRepository("BackCommandeBundle:Checkc")->findBy(array('coupon' =>  $coup_id),array('dcr' => 'DESC'));
        //var_dump($checks); exit;
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des commandes", $this->generateUrl("back_commande"), array());
        $breadcrumbs->addItem("Liste des coupons", $this->generateUrl("back_commande"), array());
        return $this->render('BackCommandeBundle:Coupon:index.html.twig', array('entities' => $coupon, 'numCommande' => $command->getId(),'dates' => $checks,'consomm' => $coupon_consomme));
    }

    public function traiterAction(Command $command)
    {
        $coupon = $command->getCoupon();
        $client= $command->getClient();
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("commandes livraison", $this->generateUrl("back_commande"), array());
        $breadcrumbs->addItem("Détails", $this->generateUrl("back_commande"), array());
        return $this->render('BackCommandeBundle:Client:traiter.html.twig', array('entities' => $coupon, 'client' => $client, 'commande' => $command,));
    }

    public function trackingAction(Command $command)
    {
        $coupon = $command->getCoupon();
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

        $get_api=httpGet("http://5.196.15.248/api/bigdealcoupon/tracking/barcode/".$barcode."/api_key/bccd3d465f272a58335bb91b/format/json");
       // $get_api='[{"id":1,"status_code":"101","status_label":"Enlevement effectue","update_date":"2016-01-22 17:48:49"},{"id":2,"status_code":"104","status_label":"Livraison effectuee","update_date":"2016-01-23"}]';

        $get_api=json_decode($get_api);

        if(isset($get_api->error))
        {
                //$get_api=json_decode($get_api);
                return $this->render('BackCommandeBundle:Client:trackingerror.html.twig');
        }
        //var_dump($get_api); exit;

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("commandes livraison", $this->generateUrl("back_commande"), array());
        $breadcrumbs->addItem("Détails", $this->generateUrl("back_commande"), array());
        return $this->render('BackCommandeBundle:Client:tracking.html.twig', array('entities' => $get_api,));
    }


    public function approuverAction(Command $command)
    {

        $coupon = $command->getCoupon();
        $client= $command->getClient();
        $client_id= $command->getClient()->getId();

        $destinataire=(string)($client->getfname().'_'.$client->getname());
        $destinataire=str_replace(" ","_",$destinataire);
        $api_key='bccd3d465f272a58335bb91b';
        $user_name="bigdeal-coupon";
        $adresse= $this->getDoctrine()->getRepository("BackCommandeBundle:Adress")->findOneBy(array('id' =>  $command->getAdresse()->getId()));
        $adresse_de_livraison=$adresse->getAdress().'_'.$adresse->getIndcation().'_'.$adresse->getLocalite();
        $adresse_de_livraison=rtrim($adresse_de_livraison);
        $adresse_de_livraison=str_replace(" ","_",$adresse_de_livraison);
       $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($adresse->getLocalite())->getParent()->getParent()->getName();
        $gouvernorat_livraison=0;
            if($gouvernorat==='TUNIS') {$gouvernorat_livraison=1;}
        else if($gouvernorat==='ARIANA') {$gouvernorat_livraison=2;}
        else if($gouvernorat==='BEN AROUS') {$gouvernorat_livraison=3;}
        else if($gouvernorat==='MANOUBA') {$gouvernorat_livraison=4;}
        else if($gouvernorat==='NABEUL') {$gouvernorat_livraison=5;}
        else if($gouvernorat==='ZAGHOUAN') {$gouvernorat_livraison=6;}
        else if($gouvernorat==='BIZERTE') {$gouvernorat_livraison=7;}
        else if($gouvernorat==='BEJA') {$gouvernorat_livraison=8;}
        else if($gouvernorat==='JENDOUBA') {$gouvernorat_livraison=9;}
        else if($gouvernorat==='KEF') {$gouvernorat_livraison=10;}
        else if($gouvernorat==='SILIANA') {$gouvernorat_livraison=11;}
        else if($gouvernorat==='KAIROUAN') {$gouvernorat_livraison=12;}
        else if($gouvernorat==='KASSERINE') {$gouvernorat_livraison=13;}
        else if($gouvernorat==='SIDI BOUZID') {$gouvernorat_livraison=14;}
        else if($gouvernorat==='SOUSSE') {$gouvernorat_livraison=15;}
        else if($gouvernorat==='MONASTIR') {$gouvernorat_livraison=16;}
        else if($gouvernorat==='MAHDIA') {$gouvernorat_livraison=17;}
        else if($gouvernorat==='SFAX') {$gouvernorat_livraison=18;}
        else if($gouvernorat==='GAFSA') {$gouvernorat_livraison=19;}
        else if($gouvernorat==='TOZEUR') {$gouvernorat_livraison=20;}
        else if($gouvernorat==='KEBILI') {$gouvernorat_livraison=21;}
        else if($gouvernorat==='GABES') {$gouvernorat_livraison=22;}
        else if($gouvernorat==='MEDENINE') {$gouvernorat_livraison=23;}
        else if($gouvernorat==='TATAOUINE') {$gouvernorat_livraison=24;}

        $code_postal_livraison = $adresse->getLocalite()->getCp();
        $telephone_de_contact_livraison= $command->getClient()->getPhone();
        $nombre_de_colis=count($coupon);
        $id_commande_client=$command->getId();

         $valeur_marchandise=3;
         $barcode_client='';
        foreach ($coupon as $value) {
            $valeur_marchandise=$valeur_marchandise+$value->getPrice();
        }
        //var_dump($valeur_marchandise); exit;
        $barcode_client=$coupon[0]->getcode();

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
        $date_env_colii =new \DateTime();
        $date_liv_colli =new \DateTime();
        $heure = date_format(new \DateTime(), 'H');
        if(intval($heure)>17)
        {
            $date_env_colii->modify('+1 day');
            $date_liv_colli->modify('+3 day');
        }
        else
        {
            $date_liv_colli->modify('+2 day');
        }

        $date_livraison =date_format($date_liv_colli, 'Y-m-d');
        $date_enlevement =date_format($date_env_colii, 'Y-m-d');
        /*$longurl_id="1524847";
         $longurl="localhost/devbigdeal/web/app_dev.php/apiurl/".$longurl_id;

        function generateRandomString($length = 10) {
             $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
             $charactersLength = strlen($characters);
             $randomString = '';
             for ($i = 0; $i < $length; $i++) {
                 $randomString .= $characters[rand(0, $charactersLength - 1)];
             }
             return $randomString;
         }

         $shorturl=generateRandomString(10);*/

        function curl_get_result($url) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        function get_bitly_short_url($url,$login,$appkey,$format='txt') {
            $connectURL = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$appkey.'&uri='.urlencode($url).'&format='.$format;
            return curl_get_result($connectURL);
        }
        $host=$this->getRequest()->getHost();
        $longurl =   "https://".$host."/printcommand/".$command->getId();

        $short_url = get_bitly_short_url($longurl,'rateb1984','R_7f0c4d67f9a944b7845fbf9efbed0372');
        $short_url=trim($short_url);
        $get_api=httpGet("http://5.196.15.248/api/bigdealcoupon/additem?format=json&api_key=".$api_key."&destinataire=".$destinataire."&user_name=".$user_name."&date_enlevement=".$date_enlevement."&date_livraison=".$date_livraison."&adresse_de_livraison=".$adresse_de_livraison."&gouvernorat_livraison=".$gouvernorat_livraison."&telephone_de_contact_livraison=".$telephone_de_contact_livraison."&code_postal_livraison=".$code_postal_livraison."&nombre_de_colis=".$nombre_de_colis."&valeur_marchandise=".$valeur_marchandise."&barcode_client=".$barcode_client."&id_commande_client=".$id_commande_client."&libelle_de_marchandise=".$short_url);
        $em = $this->getDoctrine()->getManager();
        $barcode=json_decode ($get_api)->Barcode;
         $coupon = $command->getCoupon();

        foreach ($coupon as $value) {
            $value->setAramexid($barcode);
            $value->setAramexpdf($short_url);
            $em->persist($value);
            $em->flush();
        }

        $command->setEtat(4);
        $em->persist($command);
        $em->flush();

        return $this->redirect($this->generateUrl('back_client_livraison'));
    }

    public function annuleAction(Command $command)
    {
        $em = $this->getDoctrine()->getManager();
        $command->setEtat(3);
        $em->persist($command);
        $em->flush();

        $coupon = $command->getCoupon();

        foreach ($coupon as $value) {
            $value->setVendu(6);
            $em->persist($value);
            $em->flush();
        }
        /* $client = $this->get('security.context')->getToken()->getUser();

         $message = \Swift_Message::newInstance()
             ->setSubject('Confirmation de pré-commande ' . $command->getId())
             ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
             ->setTo($client->getEmail())
             ->setBody($this->renderView('MainFrontBundle:Email:annullerrderLivr.html.twig', array("client" => $client, "commande" => $command, "mode" => "Livraison")));
         $message->setContentType("text/html");
         $this->get('mailer')->send($message);*/


        return $this->redirect($this->generateUrl('back_client_livraison'));
    }




    public function imprimerAction()
    {
        $m = new Merger();
        $nomFichier = "livraison".rand().'-'.time().'.pdf';
        $request = $this->get('request');
        $item = $request->request->get('item');
        $pdfs =null;
        for($count=0;$count<count($item);$count++)
        {
            $coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($item[$count]);
            if($coupon->getAramexpdf())
            $pdfs['folder'.$coupon->getId().''] =  '' . $coupon->getAramexpdf() . '';
        }
if(count($pdfs)>0)
{
    try{
        //start to loop through the files stored in the pdfs array
        foreach( $pdfs as $key => $pdf ){

            //split the string on /
            $urlParts = explode( '/', $pdf );

            //get the last segment as this is our file name eg charter.pdf
            $fileName = end( $urlParts );

            //get the contents of the file
            $fileContents = file_get_contents( $pdf );

            //get a path to our directory
            $directory = $this->get('kernel')->getRootDir() . '/../web/pdf/';

            //check to see if the directory DOESN'T exist
            if( !is_dir( $directory ) ){
                //create the directory
                mkdir( $directory );
            }

            //create a file object for the contents to be written to
            $fileObject = new \SPLFileObject( $directory . $fileName, 'a+'  );

            //write the contents to the file
            $fileObject->fwrite( $fileContents );

            //clean up by removing the contents
            unset( $fileContents );
            $m->addFromFile($this->get('kernel')->getRootDir() . '/../web/pdf/'.$fileName.'');

        }

    }catch( Exceptions $e ){

        echo $e->getMessage();
    }
    file_put_contents($this->get('kernel')->getRootDir() . '/../web/pdf/'.$nomFichier.'', $m->merge());
    $domain = strstr($this->container->get('router')->getContext()->getBaseUrl(), 'app_dev.php', true);
    if(stripos($this->container->get('router')->getContext()->getBaseUrl(), 'app_dev.php'))
    {
        $domain = strstr($this->container->get('router')->getContext()->getBaseUrl(), 'app_dev.php', true);

    }
    else
        $domain = $this->container->get('router')->getContext()->getBaseUrl();


    return $this->redirect($domain.'/pdf/'.$nomFichier.'');
}
        else
        {
            return $this->redirect($this->generateUrl('coupon_livraison'));

        }

    }

    public function livraisonAction()
    {
        $request=$this->get('request');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Livraison", $this->generateUrl("back_commande"), array());
        $coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->findBy(array('vendu' =>  array(2,3)));
        $coupon2 = $coupon;
        $data = $request->query->get('back_commandebundle_commandfilter');
        $data = Tools::dropNull($data);
        $deals=array();
        foreach ($coupon2 as $key => $value) {
            if (!$value->getCommand()->getReference()->getShipping()) {
                unset($coupon[$key]);
            }else{
                $deals[$value->getCommand()->getDeal()->getId()]=$value->getCommand()->getDeal()->getTitle();
            }
        }
        if(isset($data['deal'])){
            $coupon2 = $coupon;
            foreach ($coupon2 as $key => $value) {
                if($value->getCommand()->getDeal()->getId()!=$data['deal'])
                    unset($coupon[$key]);
            }
        }

        $coupon = array_values($coupon);

        return $this->render('BackCommandeBundle:Coupon:livraison.html.twig', array('data'=>$data,'deals'=>$deals,'entities' => $coupon,));
    }

    public function printAction(Command $command)
    {


        // générer un mail pour le client final avec validation de génération de coupon
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = PrintCoupon::printc($command, $pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function managerAction(Request $request)
    {

        $param = $request->request->get('back_commandebundle_managercoupon');
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CouponManagerType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $coupon = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:Coupon')
                ->findBy(array("code" => $param['code']));
            if (count($coupon) > 0) {
                foreach ($coupon as $value) {
                    if($value->getVendu()==5)
                    {
                        $message = "le coupon N°" . $param['code'] . " est remboursé  ";
                        $alert = "alert-error";

                    }
                    if($value->getVendu()==4)
                    {
                        $message = "le coupon N°" . $param['code'] . " est En attente de rembourcemment  ";
                        $alert = "alert-error";

                    }
                    if($value->getRecu()==2)
                    {
                        $message = "le coupon N°" . $param['code'] . " est déja consommé  ";
                        $alert = "alert-error";

                    }
                    if($value->getRecu()==1 && $value->getVendu() !=4 && $value->getVendu() !=5 )
                    {
                        // si le partenaire est king size ou Green meals
                        if(($value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser()->getId()==422) or ($value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser()->getId()==502) or ($value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser()->getId()==432) or ($value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser()->getId()==452))
                        {
                            $nombreCheck = $this->getDoctrine()->getRepository('BackCommandeBundle:Checkc')->findBy(array("coupon" => $value->getId()));
                            if(count($nombreCheck)<4)
                            {
                                $check = new Checkc();
                                $check->setCoupon($coupon[0]);
                                $check->setDcr(new \DateTime());
                                $em = $this->getDoctrine()->getManager();
                                $em->persist($check);
                                $em->flush();
                            }
                            if(count($nombreCheck)==4)
                            {
                                $nomPrenomClient = $value->getClient();
                                $nomPartenaire = $value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser();
                                $messageMail = \Swift_Message::newInstance()
                                    ->setSubject(' ' . $nomPrenomClient . ', notez ' . $nomPartenaire . ' et obtenez 20 BIGFid' )
                                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                    ->setTo($value->getCommand()->getClient()->getEmail())
                                    ->setBody($this->renderView('MainFrontBundle:Email:enqueteSatisfaction.html.twig', array("client" => $nomPrenomClient,
                                        "partenaire" => $nomPartenaire, "deal" => $value->getCommand()->getDeal(),'defaultregion' =>"Grand tunis")));
                                $messageMail->setContentType("text/html");
                                $this->get('mailer')->send($messageMail);

                                /*ajouter dernier check-----------*/
                                $check = new Checkc();
                                $check->setCoupon($coupon[0]);
                                $check->setDcr(new \DateTime());
                                $em = $this->getDoctrine()->getManager();
                                $em->persist($check);
                                $em->flush();

                                $value->setRecu(2);
                                $em = $this->getDoctrine()->getManager();
                                $em->persist($value);
                                $em->flush();
                            }

                        }
                        else{
                            $value->setRecu(2);
                            $em->persist($value);
                            $em->flush();

                            /*ajouter check-----------*/
                            $check = new Checkc();
                            $check->setCoupon($coupon[0]);
                            $check->setDcr(new \DateTime());
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($check);
                            $em->flush();

                            /*--------send mail enquette de satisfaction --------*/
                            $nomPrenomClient = $value->getClient();
                            $nomPartenaire = $value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser();
                            $messageMail = \Swift_Message::newInstance()
                                ->setSubject(' ' . $nomPrenomClient . ', notez ' . $nomPartenaire . ' et obtenez 20 BIGFid' )
                                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                ->setTo($value->getCommand()->getClient()->getEmail())
                                ->setBody($this->renderView('MainFrontBundle:Email:enqueteSatisfaction.html.twig', array("client" => $nomPrenomClient, "partenaire" => $nomPartenaire, "deal" => $value->getCommand()->getDeal(),'defaultregion' =>"Grand tunis")));
                            $messageMail->setContentType("text/html");
                            $this->get('mailer')->send($messageMail);
                        }
                        $message = "le coupon N°" . $param['code'] . " à été marqué comme consommé  ";
                        $alert = "alert-success";


                    }	
                    if($value->getRecu()==3)
                    {
                        $message = "le coupon N°" . $param['code'] . " est consommé et facturé ";
                        $alert = "alert-error";
                    }

                }


                $this->get('session')->getFlashBag()->set($alert, $message);
                return $this->redirect($this->generateUrl('coupon_manager'));
            } else {
                $message = "le coupon N° " . $param['code'] . " n'existe pas  ";
                $this->get('session')->getFlashBag()->set('alert-error', $message);
                return $this->redirect($this->generateUrl('coupon_manager'));

            }

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des coupons", $this->generateUrl("coupon_manager"), array());
        return $this->render('BackCommandeBundle:Coupon:manager.html.twig', array(
                'form' => $form->createView(),
            )
        );
    }

    public function livrerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $id = $request->request->get('id');
        $coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($id);
        $adresse=$coupon->getCommand()->getAdresse();
        //echo $adresse->getLocalite()->getCp();exit;
        $client = $coupon->getCommand()->getClient();
        $reference = $coupon->getCommand()->getReference();
        $wsdl = $this->get('kernel')->getRootDir();
		$wsdl = '/home/bgdltn2015/public_html/web/Shipping.wsdl';
		
        // Aramex
        $soapClient = new \SoapClient($wsdl);

        $params = array(
            'Shipments' => array(
                'Shipment' => array(
                    'Shipper' => array(
                        'Reference1' => $coupon->getCode(),
                        //'Reference2' 	=> 'Ref 222222',
                        'AccountNumber' => '20016',
                        'PartyAddress' => array(
                            'Line1' => 'Rue Japan',
                            'Line2' => 'Montplaisir',
                            'Line3' => '',
                            'City' => 'Tunis',
                            'StateOrProvinceCode' => '',
                            'PostCode' => '1073',
                            'CountryCode' => 'TN'
                        ),
                        'Contact' => array(
                            'Department' => '',
                            'PersonName' => 'Big deal',
                            'Title' => '',
                            'CompanyName' => 'Bigdeal',
                            'PhoneNumber1' => '71 828 682',
                            'PhoneNumber1Ext' => '216',
                            'PhoneNumber2' => '',
                            'PhoneNumber2Ext' => '',
                            'FaxNumber' => '',
                            'CellPhone' => '73 228 722',
                            'EmailAddress' => 'salah.chtioui@gmail.com',
                            'Type' => ''
                        ),
                    ),
                    // traité les adresses
                    'Consignee' => array(
                        'Reference1' => 'Ref 333333',
                        //'Reference2'	=> 'Ref 444444',
                        'AccountNumber' => '',
                        'PartyAddress' => array(
                            'Line1' => $adresse->getAdress(),
                            'Line2' => $adresse->getIndcation(),
                            'Line3' => $adresse->getLocalite()->getName(),
                            'City' => $adresse->getLocalite()->getParent()->getName(),
                            'StateOrProvinceCode' => '',
                            'PostCode' => $adresse->getLocalite()->getCp(),
                            'CountryCode' => 'TN'
                        ),

                        'Contact' => array(
                            'Department' => '',
                            'PersonName' => $client->getName() . " " . $client->getFname(),
                            'Title' => '',
                            'CompanyName' => $client->getName() . " " . $client->getFname(),
                            'PhoneNumber1' => $client->getPhone(),
                            'PhoneNumber1Ext' => '216',
                            'PhoneNumber2' => '',
                            'PhoneNumber2Ext' => '',
                            'FaxNumber' => '',
                            'CellPhone' => $client->getPhone(),
                            'EmailAddress' => $client->getEmail(),
                            'Type' => ''
                        ),
                    ),

                    'ThirdParty' => array(
                        'Reference1' => '',
                        //'Reference2' 	=> '',
                        'AccountNumber' => '',
                        'PartyAddress' => array(
                            'Line1' => '',
                            'Line2' => '',
                            'Line3' => '',
                            'City' => '',
                            'StateOrProvinceCode' => '',
                            'PostCode' => '',
                            'CountryCode' => ''
                        ),
                        'Contact' => array(
                            'Department' => '',
                            'PersonName' => '',
                            'Title' => '',
                            'CompanyName' => '',
                            'PhoneNumber1' => '',
                            'PhoneNumber1Ext' => '',
                            'PhoneNumber2' => '',
                            'PhoneNumber2Ext' => '',
                            'FaxNumber' => '',
                            'CellPhone' => '',
                            'EmailAddress' => '',
                            'Type' => ''
                        ),
                    ),

                    'Reference1' => 'Shpt ' . $coupon->getCode(),
                    //'Reference2' 				=> '',
                    //'Reference3' 				=> '',
                    'ForeignHAWB' => '',
                    'TransportType' => 0,
                    'ShippingDateTime' => time(),
                    'DueDate' => time(),
                    'PickupLocation' => 'Reception',
                    'PickupGUID' => '',
                    'Comments' => 'Shpt ' . $coupon->getCode(),
                    'AccountingInstrcutions' => '',
                    'OperationsInstructions' => '',

                    'Details' => array(
                        'Dimensions' => array(
                            'Length' => $reference->getLength(),
                            'Width' => $reference->getWidth(),
                            'Height' => $reference->getHeight(),
                            'Unit' => 'cm',

                        ),

                        'ActualWeight' => array(
                            'Value' => $reference->getWeight(),// poid de produit
                            'Unit' => 'Kg'
                        ),

                        'ProductGroup' => 'EXP',
                        'ProductType' => 'PDX',
                        'PaymentType' => 'P',
                        'PaymentOptions' => '',
                        'Services' => 'a',
                        'NumberOfPieces' => 1,
                        'DescriptionOfGoods' => 'bigdeal ',
                        'GoodsOriginCountry' => 'TN',

                        'CashOnDeliveryAmount' => array(
                            'Value' => 1,
                            'CurrencyCode' => 'TND'
                        ),

                        'InsuranceAmount' => array(
                            'Value' => 1,
                            'CurrencyCode' => 'TND'
                        ),

                        'CollectAmount' => array(
                            'Value' => 0,
                            'CurrencyCode' => 'TND'
                        ),

                        'CashAdditionalAmount' => array(
                            'Value' => 0,
                            'CurrencyCode' => 'TND'
                        ),

                        'CashAdditionalAmountDescription' => 'test',

                        'CustomsValueAmount' => array(
                            'Value' => $reference->getPrice(),// le prix final de livraison
                            'CurrencyCode' => 'TND'
                        ),

                        'Items' => array()
                    ),
                ),
            ),

            'ClientInfo' => array(
                'AccountCountryCode' => 'JO',
                'AccountEntity' => 'AMM',
                'AccountNumber' => '20016',
                'AccountPin' => '331421',
                'UserName' => 'testingapi@aramex.com',
                'Password' => 'R123456789$r',
                'Version' => '1.0'
            ),

            'Transaction' => array(
                'Reference1' => $coupon->getCode(),
                //'Reference2'			=> '002',
                //'Reference3'			=> '003',
                //'Reference4'			=> '004',
                //'Reference5'			=> '005',
            ),
            'LabelInfo' => array(
                'ReportID' => 9201,
                'ReportType' => 'URL',
            ),
        );

        $params['Shipments']['Shipment']['Details']['Items'][] = array(
            'PackageType' => 'Box',
            'Quantity' => 1,
            'Weight' => array(
                'Value' => 1,
                'Unit' => 'Kg',
            ),
            'Comments' => 'salah',
            'Reference' => '100'
        );


        try {

            $auth_call = $soapClient->CreateShipments($params);

            $coupon->setAramexid($auth_call->Shipments->ProcessedShipment->ID);
            $coupon->setAramexpdf($auth_call->Shipments->ProcessedShipment->ShipmentLabel->LabelURL);
            if ($auth_call->Shipments->ProcessedShipment->ID != "") {
                $coupon->setVendu(3);
                $coupon->setRecu(2);
                $em->persist($coupon);
                $em->flush();
                // Tools::dump($auth_call->Shipments->ProcessedShipment);
                echo $auth_call->Shipments->ProcessedShipment->ShipmentLabel->LabelURL;
            } else {
                echo "false";
            }

        } catch (SoapFault $fault) {
        die('Error : ' . $fault->faultstring);
    }
        //var_dump($auth_call);
        exit;
    }

    public function trakingAction($ref,$ship)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');

        $wsdl = $this->get('kernel')->getRootDir() . '/../web/shipments-tracking-api-wsdl.wsdl';
        // Aramex
        $soapClient = new \SoapClient($wsdl, array('trace' => 1));

        $params = array(
            'ClientInfo' => array(
                'AccountCountryCode' => 'JO',
                'AccountEntity' => 'AMM',
                'AccountNumber' => '20016',
                'AccountPin' => '331421',
                'UserName' => 'testingapi@aramex.com',
                'Password' => 'R123456789$r',
                'Version' => '1.0'
            ),


            'Transaction' 			=> array(
                'Reference1'			=> ''.$ref.'',
            ),
            'Shipments'				=> array(
                ''.$ship.'',


            )
        );



        try {
            $auth_call = $soapClient->TrackShipments($params);
        } catch (SoapFault $fault) {
            var_dump($fault);
            die('Error : ' . $fault->faultstring);
        }
		$text = '<div class="row-fluid">
	    		<div class="span12 floatingBoxPlanning">
	        	<div class="containerHeadline" style="background: #ffffff;border-top: 3px solid #DE0E79;padding: 13px 10px 11px;border-bottom: 3px solid #dde6e9;">';
				
        if (isset($auth_call->TrackingResults->KeyValueOfstringArrayOfTrackingResultmFAkxlpY)) {
            $tracking_results = $auth_call->TrackingResults->KeyValueOfstringArrayOfTrackingResultmFAkxlpY;
            if (is_object($tracking_results)) {
            	$text .= '<h2 style="font-size: 16px;font-weight: 400;color: #000;margin: 0;">Résultat de tracking pour le numéro de l envoi ' . $tracking_results->Key .'</h2></div>' . PHP_EOL;
				$text .= '<div class="floatingBox" style="margin-bottom: 0;box-shadow: none;background-color: white;min-height: 20px;text-align: left;width: 100%;"><div class="container-fluid" style="padding: 10px;">';
        		$text .= '<div class="table-responsive" style="min-height: .01%;overflow-x: auto;">';
                $text .= '<table class="table table-striped" style="width:100%;max-width: 100%;">';
                $text .= '<thead style="border-bottom: 2px solid #ddd;">';
                $text .= '<tr style="height:37px;background: #ffffff;text-align: left;">';
                $text .= '<th>Description</th>';
                $text .= '<th>Date</th>';
                $text .= '<th>Emplacement</th>';
                $text .= '<th>Commentaires</th>';
                $text .= '<th>Problème de code</th>';
                $text .= '</tr>';
                $text .= '</thead>';
                $text .= '<tbody style="border-top: 1px solid #ddd;background: #f9f9f9;">';
                if (is_array($tracking_results->Value->TrackingResult)) {
                    foreach ($tracking_results->Value->TrackingResult as $value) {
                        $text .= '<tr style="border-bottom: 1px solid #ddd;min-height: 37px;line-height: 37px;">';
                        $text .= '<td>' . $value->UpdateDescription . '</td>';
                        $text .= '<td>' . $value->UpdateDateTime . '</td>';
                        $text .= '<td>' . $value->UpdateLocation . '</td>';
                        $text .= '<td>' . $value->Comments . '</td>';
                        $text .= '<td>' . $value->ProblemCode . '</td>';
                        $text .= '</tr>';
                    }
                }
                else {
                    $text .= '<tr style="border-bottom: 1px solid #ddd;min-height:37px;">';
                    $text .= '<td>' . $tracking_results->Value->TrackingResult->UpdateDescription . '</td>';
                    $text .= '<td>' . $tracking_results->Value->TrackingResult->UpdateDateTime . '</td>';
                    $text .= '<td>' . $tracking_results->Value->TrackingResult->UpdateLocation . '</td>';
                    $text .= '<td>' . $tracking_results->Value->TrackingResult->Comments . '</td>';
                    $text .= '<td>' . $tracking_results->Value->TrackingResult->ProblemCode . '</td>';
                    $text .= '</tr>';
                }
                $text .= '</tbody>';
                $text .= '</table><br />' . PHP_EOL;
            }
        }
        if (isset($auth_call->NonExistingWaybills->string)) {
            $text .= 'The following AWB Number(s) where not found: ' . $auth_call->NonExistingWaybills->string . PHP_EOL;
        }
        echo $text."</div></div></div></div></div>";
        exit;
    }

}