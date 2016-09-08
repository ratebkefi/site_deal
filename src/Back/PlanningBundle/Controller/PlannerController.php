<?php

namespace Back\PlanningBundle\Controller;

use User\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PlanningBundle\Form\PlanneraddType;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\PlanningBundle\Form\PlannerFilterType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PlannerController extends Controller
{

    public function viewAction(User $user){
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Plannificateurs", $this->generateUrl("list_planner"), array());
        $breadcrumbs->addItem("Détails Plannificateurs", "edit_planner", array());
        return $this->render('BackPlanningBundle:Planner:show.html.twig', array('entity' => $user));
    }
	
	public function ajxpartenerAction()
	{
	
        $query = $request->query->get('query');
        if (strlen($query) < 3) {
            $response = new Response(json_encode(null));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        $partener = $this->getDoctrine()->getRepository('UserUserBundle:User')->getPartenairefilter($query);
        $tab = array();
        foreach ($partener as $value) {

            $tab[] = array(
                "id" => $value->getId(),
                "full_name" => $value->getName()
            );

        }
        $response = new Response(json_encode($tab));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
	}
	
    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Gestion des Plannificateurs", "list_planner", array());

        $request = $this->get('request');
        $form = $this->createForm(new PlannerFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_plannerfilter');
        $data=Tools::dropNull($data);
        $data['roles']="PALAINER";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackPlanningBundle:Planner:index.html.twig', array('form' => $form->createView(),'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Plannificateurs", $this->generateUrl("list_planner"), array());
        $breadcrumbs->addItem("Modifier Plannificateurs", "edit_planner", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new PlanneraddType(), $partner);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {

        if ($form->isValid()) {

            $em->flush();
            $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
            return $this->redirect($this->generateUrl('list_planner'));
        }
        else
        {
            $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
            return $this->redirect($this->generateUrl('list_planner'));
        }
        }
        return $this->render('BackPlanningBundle:Planner:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Plannificateurs", $this->generateUrl("list_planner"), array());
        $breadcrumbs->addItem("Ajouter Plannificateurs", "add_planner", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new PlanneraddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('PALAINER' => 'PALAINER'));
                $user->setEnabled(true);

                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);
                //Tools::dump($user, true);
                $om->persist($user);
                $om->flush();


                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl('list_planner'));
            }
            else
            {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl('list_planner'));
            }
        }
        return $this->render('BackPlanningBundle:Planner:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Plannificateurs", $this->generateUrl("list_planner"), array());
        $breadcrumbs->addItem("Afficher Plannificateurs", "show_planner", array());
        return $this->render('BackPlanningBundle:Planner:show.html.twig', array('entity' => $user,));
    }

    public function dealjsonAction(Request $request)
    {
        $region = $request->request->get("region");
        $etat=$request->request->get("etat");
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");
        $dateFin = explode("/",$datef);
        $dateDebut = explode("/",$dated);
        $endDate = $dateFin[2]."-".$dateFin[1]."-".$dateFin[0];
        $firstDate = $dateDebut[2]."-".$dateDebut[1]."-".$dateDebut[0];

        $prePlanifier=$this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreDealParEtat(0,$firstDate,$endDate,$region);
        $planifie=$this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreDealParEtat(1,$firstDate,$endDate,$region);
        $redige=$this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreDealParEtat(2,$firstDate,$endDate,$region);
        $valide=$this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreDealParEtat(3,$firstDate,$endDate,$region);
        $annuler=$this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreDealParEtat(4,$firstDate,$endDate,$region);
        $liste=$this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getListDealParEtat($etat,$firstDate,$endDate,$region);
        $array2 =array();
        foreach($liste as $value)
        {
            if($value->getDefaultannexe())
            {
                $defaultAnnexe = $value->getDefaultannexe()->getObject();
                $idDefaultAnnexe = $value->getDefaultannexe()->getId();
                $idPartenaire = $value->getDefaultannexe()->getProtocol()->getUser()->getId();
                $idProtocole = $value->getDefaultannexe()->getProtocol()->getId();
                $routeAnnexe = $this->generateUrl('dash_annexe_show',array('id'=>$idDefaultAnnexe,'protocol_id'=>$idProtocole,'partner'=>$idPartenaire));
            }
            else
            {
                $defaultAnnexe = "null";
                $idDefaultAnnexe = null;
                $idPartenaire = null;
                $idProtocole = null;
                $routeAnnexe = "#";
            }

            if($value->getDeal())
            {//show_deal_manager
                $deal = $value->getDeal()->getTitle();
                $idDeal = $value->getDeal()->getId();
                $routeDeal = $this->generateUrl('show_deal_manager',array('id'=>$idDeal));

            }
            else
            {
                $deal = "null";
                $idDeal = "null";
                $routeDeal = "#";

            }
            if($value->getState()==0)
                $etat = "Pré-Planifié";
            elseif ($value->getState()==1)
                $etat = "Planifié";
            elseif ($value->getState()==2)
                $etat = "Rédigé";
            elseif ($value->getState()==3)
                $etat = "Validé";
            elseif ($value->getState()==4)
                $etat = "Annulé";
            $array2[] = array(
                "id" => $value->getId(),
                "planning" => $value->getObject(),
                "etat" => $etat,
                "routeAnnexe" => $routeAnnexe,
                "routeDeal" => $routeDeal,
                "annexe" => $defaultAnnexe,
                "deal" => $deal,
                "dealId" => $idDeal,
                "publication" => $value->getStartDate()->format('d-m-Y H:i:s') ,
            );
        }
        $array = array(
            "prePlanifier" => $prePlanifier,
            "planifie" => $planifie,
            "redige" => $redige,
            "valide" => $valide,
            "annuler" => $annuler ,
            "liste" => $array2 ,
        );
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function publicationjsonAction(Request $request)
    {
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");
        $dateFin = explode("/",$datef);
        $dateDebut = explode("/",$dated);
        $endDate = $dateFin[2]."-".$dateFin[1]."-".$dateFin[0];
        $firstDate = $dateDebut[2]."-".$dateDebut[1]."-".$dateDebut[0];
        $compare    = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->compareDatePublication($firstDate,$endDate);
        $semaine = 0;
        $quatrejour = 0;
        foreach($compare as $value)
        {

            $nombreJour = Tools::date_diff_par_jour($value->getDcr()->format('Y-m-d H:i:s'),$value->getStartDate()->format('Y-m-d H:i:s'));
            if($nombreJour <7 and $nombreJour>4)
            {
                $semaine +=1;
            }
            if($nombreJour<4)
            {
                $quatrejour +=1;
            }


        }

        $array = array(
            "semaine" => $semaine,
            "quatrejour" => $quatrejour,
        );
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function comparecontratjsonAction(Request $request)
    {
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");
        $dateFin = explode("/",$datef);
        $dateDebut = explode("/",$dated);
        $endDate = $dateFin[2]."-".$dateFin[1]."-".$dateFin[0];
        $firstDate = $dateDebut[2]."-".$dateDebut[1]."-".$dateDebut[0];
        $compare   = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->compareAnnexePlanning($firstDate,$endDate);
        $ancienContrat = 0;
        $nouveauContrat = 0;
        foreach($compare as $value)
        {
            if($value->getStartDate()->format("Y-m-d") > $value->getDefaultannexe()->getDcr()->format("Y-m-d"))
            {
                $ancienContrat +=1;
            }
            else
                $nouveauContrat +=1;
        }
        $array = array(
            "nouveau_contrat" => $nouveauContrat,
            "ancien_contrat" => $ancienContrat,
        );
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function comparecommercialjsonAction(Request $request)
    {
        $commercialId = $request->request->get("commercial");
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");
        $dateFin = explode("/",$datef);
        $dateDebut = explode("/",$dated);
        $endDate = $dateFin[2]."-".$dateFin[1]."-".$dateFin[0];
        $firstDate = $dateDebut[2]."-".$dateDebut[1]."-".$dateDebut[0];
        if($commercialId)
        {
            $array =array();
            $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->find($commercialId);
            $annexe = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->contratSigne($commercialId,$firstDate,$endDate );
            $listannexename=array();
            foreach($annexe as $value1)
            {
                $listannexename[] = array(
                    "annexename" =>  $value1->getObject() ." <br/>",
                    "annexId" =>  $value1->getId(),
                    "protocoleId" =>  $value1->getProtocol()->getId()
                );
            }

            $array[] = array(
                "id" => 0,
                "name" => $commercial->getName(),
                "annexename" => $listannexename,
                "nbr" => count($annexe),
            );

            unset($listannexename);
        }
else
{
    $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
    $array =array();
    foreach($commercial as $key => $value){
        $annexe = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->contratSigne($value->getId(),$firstDate,$endDate );
        $listannexename=array();
        foreach($annexe as $value1)
        {
            $listannexename[] = array(
                "annexename" =>  $value1->getObject() ." <br/>",
                "annexId" =>  $value1->getId(),
                "protocoleId" =>  $value1->getProtocol()->getId()
            );
        }

        $array[] = array(
            "id" => $key,
            "name" => $value->getName(),
            "annexename" => $listannexename,
            "nbr" => count($annexe),
        );
        unset($listannexename);

    }
}

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function contratcommercialjsonAction(Request $request)
    {

        $commercialId = $request->request->get("commercial");
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");



        $dateFin = explode("/",$datef);
        $dateDebut = explode("/",$dated);
        $endDate = $dateFin[2]."-".$dateFin[1]."-".$dateFin[0];
        $firstDate = $dateDebut[2]."-".$dateDebut[1]."-".$dateDebut[0];
        if($commercialId)
        {
            $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->find($commercialId);
            $array =array();
            $annexe = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getAnnexeAccepterParCommercial($commercialId,$firstDate,$endDate);
            $annexename = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getAnnexeAccepterParCommercialByName($commercialId,$firstDate,$endDate);
            $listannexename=array();
            foreach($annexename as $value1)
            {
                $listannexename[] = array(
                    "annexename" =>  $value1->getObject() ." <br/>",
                    "annexId" =>  $value1->getId(),
                    "protocoleId" =>  $value1->getProtocol()->getId()
                );
            }
            $array[] = array(
                    "id" => 0,
                    "name" => $commercial->getName(),
                    "annexename" => $listannexename,
                    "nbr" => $annexe
                );
            unset($listannexename);

        }
        else
        {
            $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
            $array =array();
            foreach($commercial as $key => $value){
                $annexe = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getAnnexeAccepterParCommercial($value->getId(),$firstDate,$endDate);
                $annexename = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getAnnexeAccepterParCommercialByName($value->getId(),$firstDate,$endDate);
                $listannexename=array();

                foreach($annexename as $value1)
                {
                    $listannexename[] = array(
                        "annexename" =>  $value1->getObject() ." <br/>",
                        "annexId" =>  $value1->getId(),
                        "protocoleId" =>  $value1->getProtocol()->getId()
                    );
                }


                $array[] = array(
                    "id" => $key,
                    "name" =>  $value->getName(),
                    "annexename" => $listannexename,
                    "nbr" => $annexe
                );
                unset($listannexename);

            }
        }

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function dealannulerjsonAction(Request $request)
    {
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");
        $dateFin = explode("/",$datef);
        $dateDebut = explode("/",$dated);
        $endDate = $dateFin[2]."-".$dateFin[1]."-".$dateFin[0];
        $firstDate = $dateDebut[2]."-".$dateDebut[1]."-".$dateDebut[0];
        $dealAnnuler    = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getListDealParEtat(4,$firstDate,$endDate);
        $dealValider    = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getListDealParEtat(3,$firstDate,$endDate);

        $array = array(
            "deal_annuler" => count($dealAnnuler),
            "deal_valider" => count($dealValider),
            "deal_total" => count($dealValider) + count($dealAnnuler),
        );
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
