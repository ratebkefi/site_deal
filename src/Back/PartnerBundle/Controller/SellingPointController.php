<?php
/**
 * Created by PhpStorm.
 * User: Prodexo
 * Date: 18/02/2015
 * Time: 10:23
 */

namespace Back\PartnerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Common\Tools;
use Back\PartnerBundle\Entity\SellingPoint;
use Back\PartnerBundle\Entity\Schedule;
use Back\PartnerBundle\Form\SellingPointType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
class SellingPointController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findByRole('PARTENAIRE');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackPartnerBundle:SeelingPoint:index.html.twig', array('entities' => $partner, 'pagination' => $pagination,));
    }

    public function listAction($partid)
    {
        $request = $this->get('request');
        $seling = $this->getDoctrine()->getRepository('BackPartnerBundle:SellingPoint')->findBy(array('user' => $partid));
        $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($partid);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $seling,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());
        $breadcrumbs->addItem("Gestions des points de vente", "show_partner", array());
        return $this->render('BackPartnerBundle:SeelingPoint:list.html.twig', array('entities' => $seling, 'user' => $user, 'partid' => $partid, 'pagination' => $pagination,));
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

        $delegation = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent"=>$id));

       foreach($delegation as $value)
        {
            $array[] = array(
                "id" => $value->getId(),
                "name" => $value->getName()

            );
        }


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function addAction($partid)
    {
        $selling = new SellingPoint();
        $form = $this->createForm(new SellingPointType(), $selling);
        $user = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($partid);
        $request = $this->get('request');
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent"=>null));



        if ($request->getMethod() == 'POST') {
            $cp =  $request->request->get('cpadd');
            $ville =  $request->request->get('ville');
            $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($ville);

                $localiteId = $localite->getId();

            $loca = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($localiteId);
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $jour = $request->request->get('jour');
                $selling->setLocalite($loca);
                $selling->setUser($user);
                $em->persist($selling);
                foreach ($jour as $key => $value) {
                    $schedule = new Schedule();
                    $schedule->setDay($key);

                    $schedule->setCloseTimeAfternoon(Tools::reformatTime($value["closeTimeAfternoon"]));
                    $schedule->setCloseTimeMorning(Tools::reformatTime($value["closeTimeMorning"]));
                    $schedule->setOpenTimeAfternoon(Tools::reformatTime($value["openTimeAfternoon"]));
                    $schedule->setOpenTimeMorning(Tools::reformatTime($value["openTimeMorning"]));
                    $schedule->setSellingPoint($selling);
                    $em->persist($schedule);
                }
                $em->flush();
                return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partid)));
            } else {
                echo $form->getErrors();
            }
        }
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());
        $breadcrumbs->addItem("Ajouter points de vente", "dash_sellingpoint_add", array());
        return $this->render('BackPartnerBundle:SeelingPoint:edit.html.twig', array('form' => $form->createView(),
            'partner' => $user,
            'ville' => "",
            'cp' => "",
            'gouvernorat' => $gouvernorat,
            'partid' => $partid));
    }

    public function showAction($partid, SellingPoint $selling)
    {
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());
        $breadcrumbs->addItem("Détails points de vente", "dash_sellingpoint_show", array());
        return $this->render('BackPartnerBundle:SeelingPoint:show.html.twig', array('entry' => $selling, 'partid' => $partid));
    }

    public function deleteAction($partid, SellingPoint $selling)
    {
        $em = $this->getDoctrine()->getManager();

        if (!$selling) {
            throw new NotFoundHttpException('Point de vente non trouvée');
        }
        $em->remove($selling);
        $em->flush();
        return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partid)));
    }

    public function editAction($partid, SellingPoint $selling)
    {
        $request = $this->get('request');
        $schedle=$selling->getSchedule();
        $ArrDay=array();
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent"=>null));

        $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($selling->getLocalite());

        foreach($schedle as $key=>$value){
            $ArrDay[$value->getDay()]=array(
                'OpenTimeMorning'=>$value->getOpenTimeMorning()->format('H:i'),
                'CloseTimeMorning'=>$value->getCloseTimeMorning()->format('H:i'),
                'OpenTimeAfternoon'=>$value->getOpenTimeAfternoon()->format('H:i'),
                'CloseTimeAfternoon'=>$value->getCloseTimeAfternoon()->format('H:i'),
            );
        }
       // Tools::dump($ArrDay,true);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new SellingPointType(), $selling);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $cp =  $request->request->get('cpadd');
            $ville =  $request->request->get('ville');
			//echo $ville; exit;
            $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($ville);
            /*$localiteId = 0;

            foreach($localite as $value)
            {
                $localiteId = $value->getId();
            }

            $loca = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($localiteId);
           */
		   $selling->setLocalite( $localite);

            // delete schedle
            foreach($selling->getSchedule() as $key=>$value){
                $em->remove($value);
                $em->flush();
            }
            $em->flush();
            $jour = $request->request->get('jour');
            foreach ($jour as $key => $value) {
                $schedule = new Schedule();
                $schedule->setDay($key);

                $schedule->setCloseTimeAfternoon(Tools::reformatTime($value["closeTimeAfternoon"]));
                $schedule->setCloseTimeMorning(Tools::reformatTime($value["closeTimeMorning"]));
                $schedule->setOpenTimeAfternoon(Tools::reformatTime($value["openTimeAfternoon"]));
                $schedule->setOpenTimeMorning(Tools::reformatTime($value["openTimeMorning"]));
                //Tools::dump($schedule);
                $schedule->setSellingPoint($selling);
                $em->persist($schedule);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partid)));
        }
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array()); 
        $breadcrumbs->addItem("Modifier points de vente", "dash_sellingpoint_show", array());
        return $this->render('BackPartnerBundle:SeelingPoint:edit.html.twig', array(
                'form' => $form->createView(),
                'selling'=>$selling,
                'partner' => $selling->getUser(),
                'partid' => $partid,
                'arrday' => $ArrDay,
                'ville' => $localite->getName(),
                'gouvernorat' => $gouvernorat,

                'cp' => $localite->getCp(),
                'id' => $selling->getId())
        );
    }

}