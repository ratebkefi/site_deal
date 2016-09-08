<?php

namespace Back\PlanningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PlanningBundle\Entity\Planning;
use Back\PlanningBundle\Entity\Planninghistory;
use Back\PlanningBundle\Entity\Region;
use Back\PlanningBundle\Form\PlanningType;
use Back\DashBundle\Common\Tools;
use Back\DealBundle\Entity\Deal;
use Back\DealBundle\Entity\Dealhistory;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;
use Symfony\Component\HttpFoundation\Response;

class PlanningController extends Controller
{
    public function  ajxlePlanningAction()
    {

        $request = $this->get('request');

        //$Arrresult =array();
        $planningid = $request->request->get('id');

        $planning = $this->getDoctrine()->getRepository('BackPlanningBundle:Planning')->find($planningid);

        if($planning->getDefaultannexe())
            $routePdf =$this->generateUrl('pdf_annexe_manager', array('protocol_id' =>$planning->getDefaultannexe()->getProtocol()->getId(),'id' => $planning->getDefaultannexe()->getId()), true);
        else
            $routePdf ="#";
			
			$protocolId = 0;
			$idAnnexe = 0;
			$routeAnnexe = NULL;
			foreach($planning->getAnnexe() as $value)
			{
				$idAnnexe = $value->getId();
				$Annexe = $value;
				$protocolId = $value->getProtocol()->getId();
				 $routeAnnexe[] = array(
                "route" => $this->generateUrl('pdf_annexe_manager',
								array('protocol_id' => $protocolId
								,'id' =>$idAnnexe
								), true),
                "name" => $value->getObject()

            );
				
			}

		
            $Arrresult = array(
                "annexe" => $planning->getDefaultannexe(),
                "annexe1" => $planning->getAnnexe(),
                "state" => $planning->getState(),
                "category" => $planning->getCategoryId()->getName(),
                "region" => $planning->getRegionId()->getName(),
                "object" => $planning->getObject(),
                "tariff" => $planning->getTariff(),
                "description" => $planning->getDescription(),
                "startDate" => $planning->getStartDate()->format('d-m-Y H:i:s'),
                "endDate" => $planning->getEndDate()->format('d-m-Y H:i:s'),
                "remarks" => $planning->getRemarks(),
                "ca" => $planning->getCa(),
                "route_update" => $this->generateUrl('update_planning_manager', array('id' => $planning->getId(),'regionid' =>$planning->getRegionId()->getId()), true)
            ,
                "route_show" => $this->generateUrl('show_planning_manager', array('id' => $planning->getId(),'regionid' =>$planning->getRegionId()->getId()), true),
                "route_pdf" => $routePdf ,
                "route_annexe" => $routeAnnexe
            );




        if(!isset($Arrresult))
            $Arrresult = [];
        $response = new Response(json_encode($Arrresult));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function ajxPlanningAction()
    {

        $request = $this->get('request');
        $date = Tools::reformatDate($request->request->get('date'));
        //$Arrresult =array();
        $regionid = $request->request->get('region');

        $region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->find($regionid);

        $planning = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Planning')
            ->getListValid($region,$date);
        foreach($planning as  $value)
        {
            $Arrresult[] = array(
                "color" => $value->getCategoryId()->getColor(),
                "object" => $value->getObject(),
                "state" => $value->getState(),
                "route_update" => $this->generateUrl('update_planning_manager', array('id' => $value->getId(),'regionid' =>$regionid), true),
                "route_show" => $this->generateUrl('show_planning_manager', array('id' => $value->getId(),'regionid' =>$regionid), true),
                "id" => $value->getId(),
            );



        }
        if(!isset($Arrresult))
            $Arrresult = [];
        $response = new Response(json_encode($Arrresult));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function indexAction($regionid)
    {
        $dt = new \DateTime();
		        $request = $this->get('request');

		$statusPlanning =  $request->query->get('status');

        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();

        if($roles[0]=="ROLE_SUPER_ADMIN")
        {
            $breadcrumbsLible ="Service planification";
        }

        else
        {
            $breadcrumbsLible ="Planning";

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($breadcrumbsLible, "list_planning", array());
        $region = $this->getDoctrine()->getRepository('BackPlanningBundle:Region')->find($regionid);
        $category = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array('parent' => null));
        $planning = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Planning')
            ->getListValid1($region,$dt,$statusPlanning);
        $planning2 = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Planning')
            ->getListValid2($region,$statusPlanning);
        return $this->render('BackPlanningBundle:Planning:index.html.twig', array(
            'entities' => $planning2,
            'entities2' => $planning,
            'category' => $category,
            'regionid' => $regionid,
            'region' => $region));
    }

    public function addAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $planning = new Planning($user);
        $request = $this->get('request');
        $listUserForNotif = Constant\NotifUser::getNotifPlanning();
        if ($request->getMethod() == 'POST') {

            $idobject = $request->request->get('idobject');
            $idtarif = $request->request->get('idtarif');
            $iddescription = $request->request->get('iddescription');
            $startdate = $request->request->get('startdate');
            $enddate = $request->request->get('enddate');
            $idremarque = $request->request->get('idremarque');
            $idca = $request->request->get('idca');
            $idcategorie = $request->request->get('idcategorie');
            $regionid = $request->request->get('regionid');
            $em = $this->getDoctrine()->getManager();
            $planning->setDescription($iddescription);
            $planning->setEndDate(Tools::reformatDateTime($enddate));
            $planning->setObject($idobject);
            $planning->setRemarks($idremarque);
            $planning->setCa($idca);
            $planning->setStartDate(Tools::reformatDateTime($startdate));
            $planning->setTariff($idtarif);
            $planning->setCategoryId($this->getDoctrine()->getRepository('BackPlanningBundle:Category')->find($idcategorie));
            $planning->setRegionId($this->getDoctrine()->getRepository('BackPlanningBundle:Region')->find($regionid));

            $em->persist($planning);
            $em->flush();
            // planning history
            $history = new Planninghistory();
            $history->setType(0);
            $history->setPlanning($planning);
            $em->persist($history);
            $em->flush();

            $libelleNotif = $planning->getAgent()->getName() . " a ajouté un planning dans la région " . $planning->getRegionId()->getName();
            $lient = $this->generateUrl('show_planning_manager', array('id' => $planning->getId(), 'regionid' => $planning->getRegionId()->getId()));
            $icone = "icon-calendar";
            for ($count = 1; $count <= count($listUserForNotif); $count++) {
                $query = $this->getDoctrine()->getEntityManager()
                    ->createQuery(
                        'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                    )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                $listUser = $query->getResult();
                foreach ($listUser as $value) {
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                    $notification->setName($libelleNotif);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();
                }
                unset($listUser);
            }
            exit;
        } else {
            echo "false";
            exit;
        }


        //return $this->render('BackPlanningBundle:Planning:edit.html.twig', array('form' => $form->createView(), "planning" => $planning));
    }

    public function editAction($id, $regionid)
    {
        $request = $this->get('request');
        $user = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('PARTENAIRE');
        $planning = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Planning')
            ->find($id);
        $annexes = $planning->getAnnexe();

        $tst = true;
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new PlanningType(array("em" => $this->getDoctrine()->getRepository("BackPlanningBundle:Category"))), $planning);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $tab = $request->request->get('back_planningbundle_planning');
            //Tools::dump($tab,true);
            $em->flush();
            $tst = false;
            $state = $request->request->get('state');
            $planning->setState($state);

            if ($state == 1 && $planning->getDeal() == null) {
                if ($request->request->get('annex_id') > 0) {
                    $annexdefault = $this->getDoctrine()->getRepository('BackContractBundle:Annexe')->find($request->request->get('annex_id'));
                    $planning->setDefaultannexe($annexdefault);
                    $em->persist($planning);
                    $em->flush();
                }
                $setEndDateValidtyCoupon =  date('Y-m-d', strtotime($planning->getStartDate()->format("Y-m-d"). ' + 30 days'));
                $deal = new Deal();
                $deal->setPlanning($planning);
                $deal->setStartDateValidtyCoupon(new \DateTime($planning->getStartDate()->format("Y-m-d")));
                $deal->setEndDateValidtyCoupon(new \DateTime($setEndDateValidtyCoupon));

                $deal->setTitle("En attente de rédaction");
                $em->persist($deal);
                $em->flush();
                $dealhistory = new Dealhistory();
                $dealhistory->setType(1);
                $dealhistory->setDeal($deal);
                $em->persist($dealhistory);
                $em->flush();

/*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getNotifLivraisonPlanning();

                $libelleNotif = $planning->getAgent()->getName() . " a lié le planning " . $planning->getObject() . " à l’annexe " . $planning->getDefaultannexe()->getObject();
                $lient =  $this->generateUrl('pdf_annexe_manager', array('protocol_id' => $deal->getPlanning()->getDefaultannexe()->getProtocol()->getId(),'id' => $deal->getPlanning()->getDefaultannexe()->getId()));
                $icone = "icon-check-sign";
                for ($count = 1; $count <= count($listUserForNotif); $count++) {
                    $query = $this->getDoctrine()->getEntityManager()
                        ->createQuery(
                            'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                        )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                    $listUser = $query->getResult();
                    foreach ($listUser as $value) {
                        $notification = new Notification();
                        $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                        $notification->setName($libelleNotif);
                        $notification->setLien($lient);
                        $notification->setIcone($icone);
                        $em->persist($notification);
                        $em->flush();
                    }
                    unset($listUser);
                }
            }

            if ($state == 3) {
                $deal = $planning->getDeal();
                //$deal->setStatus(true);
                $em->persist($deal);
                $em->flush();
                /*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getValidationDEAL();

                $libelleNotif = $this->get('security.context')->getToken()->getUser()->getName() . " a validé la rédaction du deal " . $deal->getTitle();
                $lient = $this->generateUrl('pdf_annexe_manager', array('protocol_id' => $deal->getPlanning()->getDefaultannexe()->getProtocol()->getId(),'id' => $planning->getDefaultannexe()->getId()));
                $icone = "icon-share-alt";
                for ($count = 1; $count <= count($listUserForNotif); $count++) {
                    $query = $this->getDoctrine()->getEntityManager()
                        ->createQuery(
                            'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                        )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                    $listUser = $query->getResult();
                    foreach ($listUser as $value) {
                        $notification = new Notification();
                        $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                        $notification->setName($libelleNotif);
                        $notification->setLien($lient);
                        $notification->setIcone($icone);
                        $em->persist($notification);
                        $em->flush();
                    }
                    unset($listUser);
                }
            }
            /*-------------------------------------Notification-----------------------------------------------------------------*/

            if ($state == 5) {


                /*-------------------------------------Notification-----------------------------------------------------------------*/

                if ($planning->getDeal()) {


                    $libelleNotif = $this->get('security.context')->getToken()->getUser()->getName() . " a refusé la rédaction du deal " . $planning->getDeal();
                    $lient = $this->generateUrl('show_deal_manager', array('id' => $planning->getDeal()->getId()));
                    $icone = "icon-share-alt";


                    $redacteur = $planning->getDeal()->getRedacteur()->getId();
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($redacteur));
                    $notification->setName($libelleNotif);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();


                }
            }
            $history = new Planninghistory();
            $history->setType($state);
            $history->setPlanning($planning);
            $em->persist($history);
            $em->flush();


            return $this->redirect($this->generateUrl('back_planning_home', array('regionid' => $regionid)));
        } else {
            // echo $form->getErrors();
        }
        return $this->render('BackPlanningBundle:Planning:edit.html.twig', array(
            'form' => $form->createView(),
            "planning" => $planning,
            'id' => $id,
            'annexes' => $annexes,
            'regionid' => $regionid,
            'tst' => $tst,
            'partenaires' => $user
        ));
    }

    public function showAction($id, $regionid)
    {
        $request = $this->get('request');

        $planning = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Planning')
            ->find($id);
        $annexes = $planning->getAnnexe();
        $tst = true;
        $em = $this->getDoctrine()->getManager();


        return $this->render('BackPlanningBundle:Planning:show.html.twig', array(

            "planning" => $planning,
            'id' => $id,
            'annexes' => $annexes,
            'regionid' => $regionid,
            'tst' => $tst
        ));
    }

    public function deleteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $id = $request->request->get("id");
        $planning = $this->getDoctrine()->getRepository('BackPlanningBundle:Planning')->find($id);
        $em->remove($planning);
        $em->flush();
        exit;
    }

    public function testrefannexAction()
    {
        $request = $this->get('request');
        $id = $request->request->get('id');
        $annex = $this->getDoctrine()->getRepository('BackContractBundle:Annexe')->find($id);
        if (count($annex->getReference()) > 0) {
            echo "true";
        } else {
            echo "false";
        }
        exit;
    }
}
