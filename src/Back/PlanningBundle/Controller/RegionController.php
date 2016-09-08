<?php

namespace Back\PlanningBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PlanningBundle\Entity\Region;
use Back\PlanningBundle\Form\RegionType;

class RegionController extends Controller {

    public function indexAction(Request $request) {
        $region = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:Region')
                ->findAll();
        $paginator  = $this->get('knp_paginator');
           $pagination = $paginator->paginate(
               $region,
               $request->query->get('page', 1)/*page number*/,
               10/*limit per page*/
           );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des régions", $this->generateUrl("back_region"), array());
        return $this->render('BackPlanningBundle:Region:index.html.twig', array('entities' => $region,
            'pagination' => $pagination));
    }

    public function addAction() {
        $region = new Region();
        $form = $this->createForm(new RegionType(), $region);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($region);
                $em->flush();
                return $this->redirect($this->generateUrl('back_region'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des régions", $this->generateUrl("back_region"), array());
        $breadcrumbs->addItem("Ajouter une région", $this->generateUrl("back_region"), array());
        return $this->render('BackPlanningBundle:Region:edit.html.twig', array('form' => $form->createView(),"region"=>$region));
    }

    public function editAction($id) {
        $request = $this->get('request');
        $region = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:Region')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RegionType(), $region);
        $form->handleRequest($request);

        if ($form->isValid()) { 
            $em->flush();

            return $this->redirect($this->generateUrl('back_region'));
        } else {
           // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des régions", $this->generateUrl("back_region"), array());
        $breadcrumbs->addItem("Modifier une région", $this->generateUrl("back_region"), array());
        return $this->render('BackPlanningBundle:Region:edit.html.twig', array('form' => $form->createView(),"region"=>$region, 'id' => $id,));
    }

    public function deleteAction(Region $region) {
         if (!$region) {
        throw $this->createNotFoundException('No Region found');
    }

    $em = $this->getDoctrine()->getEntityManager();
    $em->remove($region);
    $em->flush();

        return $this->redirect($this->generateUrl('back_region'));
    }

}
