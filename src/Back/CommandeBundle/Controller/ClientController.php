<?php
namespace Back\CommandeBundle\Controller;

use Back\DashBundle\Common\Tools;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\CommandeBundle\Entity\Client;
use Back\CommandeBundle\Form\ClientFilterType;
use Main\FrontBundle\Form\ClientType;

class ClientController extends Controller
{
    public function editAction($id)
    {
         $request = $this->get('request');
         $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($id);
          $form = $this->createForm(new ClientType(), $client);
                $em = $this->getDoctrine()->getManager();

            if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $request->request->get('commandebundle_client');
                //var_dump($data); exit;
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($client);
                $password =  $request->request->get('password');

                $client->setUsername($client->getEmail());
                if($password)
                {
                    $encodedPassword = md5($password);
                    $client->setPassword($password);
                    $client->setPwd($encodedPassword);
                }
                if ($data["title"] == 'M.')
                    $client->setSex("Homme");
                else
                    $client->setSex("Femme");
                    
                 $client->setPhone($data["phone"]);
                 $client->setCin($data["cin"]);
                 $client->setEmail($data["email"]);
                $em->persist($client);
                $em->flush();
                return $this->redirect($this->generateUrl('back_client'));
            }
            else {
            return $this->redirect($this->generateUrl('back_client'));
                 var_dump( $form->getErrors());
            }
            }
    $breadcrumbs = $this->get("white_october_breadcrumbs");
    $breadcrumbs->addItem("Gestions des adresses clients", $this->generateUrl("back_client"), array());
return $this->render('BackCommandeBundle:Client:edit.html.twig', array(
            'form' => $form->createView(),
    'client'=>$client));
    }

    public function editaddresseAction($id,$client)
    {
     $request = $this->get('request');
     $em = $this->getDoctrine()->getManager();

    $addresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->find($id);
    $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent"=>null));
    if ($request->getMethod() == 'POST') {
            $ville =  $request->request->get('ville');
            $cp =  $request->request->get('cpadd');
            $adress =  $request->request->get('adress');
            $indcation =  $request->request->get('indcation');
            
            $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($ville);
            $localiteId = $localite->getId();

           $loca = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($localiteId);
            $addresse->setAdress($adress);
            $addresse->setIndcation($indcation);
            $addresse->setIndcation($indcation);
            $addresse->setLocalite($loca);
            $em->persist($addresse);
            $em->flush();
            return $this->redirect($this->generateUrl('back_client_adresse', array('id' => $client)));

            }
    return $this->render('BackCommandeBundle:Client:editadresse.html.twig', array('id'=>$id
    ,'client'=>$client,
    'gouvernorat' => $gouvernorat,
    'addresse' => $addresse,
    ));
    }
    
   public function addresseAction($id)
    {
    
        $request = $this->get('request');
        $adresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findBy( array('client' => $id));
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $adresse,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        //$breadcrumbs->addItem("Gestions des adresses clients", $this->generateUrl("back_client_adresse"), array("id"=>$id));
        
        return $this->render('BackCommandeBundle:Client:adresselist.html.twig', array('entities' => $adresse, 'pagination' => $pagination, 'client' => $id,));
    }
    public function indexAction(Request $request)
    {
        $request->get('request');
        $form = $this->createForm(new ClientFilterType());

        if ($request->getMethod() == 'GET') {
            $form->bind($request);
            $data=$request->query->get('back_commandebundle_clientfilter');

            $data=Tools::dropNull($data);
           //Tools::dump($data,true); exit;

            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy1($data);
        }else{
            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findAll(array(), array('id' => 'ASC'));
        }

        //$client=array_reverse($client);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $client,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des clients", $this->generateUrl("back_client"), array());
        return $this->render('BackCommandeBundle:Client:index.html.twig', array('form' => $form->createView(),'entities' => $client,
            'pagination' => $pagination,
            ));
    }




    public function showAction(Client $client){
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des clients", $this->generateUrl("back_client"), array());
        $breadcrumbs->addItem("Détails client", $this->generateUrl("back_client"), array());
        $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('client' => $client), array('id' => 'DESC'));
        $ticket = $this->getDoctrine()->getRepository('BackCommandeBundle:Ticket')->findBy(array("commande" => $commande),             array('dcr' => 'DESC'));
        return $this->render('BackCommandeBundle:Client:show.html.twig', array('entity' => $client,'commande' =>$commande,'tickets' =>$ticket));
    }
    public function blockAction(Client $client){
        $em = $this->getDoctrine()->getManager();
        $client->setStat(false);
        $em->persist($client);
        $em->flush();
        return $this->redirect($this->generateUrl('back_client', array()));
    }
    public function unblockAction(Client $client){
        $em = $this->getDoctrine()->getManager();
        $client->setStat(true);
        $em->persist($client);
        $em->flush();
        return $this->redirect($this->generateUrl('back_client', array()));
    }

    public function bigFidAction($id,Request $request)
    {
        $request->get('request');
        $bigFid = $this->getDoctrine()->getRepository('BackDashBundle:BigFidHistorique')->findBy(array("client"=>$id), array('dcr' => 'DESC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $bigFid,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des clients", $this->generateUrl("back_client"), array());
        return $this->render('BackCommandeBundle:Client:bigFid.html.twig', array('entities' => $bigFid, 'pagination' => $pagination,));
    }

    public function FilsAction($id) {
        $fils = $this->getDoctrine()
            ->getRepository('BackDashBundle:BigFidHistorique')
            ->findBy(array('parent' => $id));

        return $this->render('BackCommandeBundle:Client:fils.html.twig', array('entities' => $fils));

        //  return new Response('supression effectué avec succée!!');
    }

    public function listparemailAction(Request $request)
    {
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $deals = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->getClientfilterParEmail($query);
        $tab = array();
        foreach ($deals as $value) {

            $tab[] = array(
                "id" => $value->getId(),
                "full_name" => $value->getEmail()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;


    }
        public function listpartelAction(Request $request)
    {
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $deals = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->getClientfilterParTel($query);
        $tab = array();
        foreach ($deals as $value) {

            $tab[] = array(
                "id" => $value->getId(),
                "full_name" => $value->getPhone()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;



}
    public function listparnomAction(Request $request)
    {
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $deals = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->getClientfilterParNom($query);
        $tab = array();
        foreach ($deals as $value) {

            $tab[] = array(
                "full_name" => $value->getName()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;


    }

    public function listparprenomAction(Request $request)
    {
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $deals = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->getClientfilterParPrenom($query);
        $tab = array();
        foreach ($deals as $value) {

            $tab[] = array(
                "full_name" => $value->getFname()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;


    }
}