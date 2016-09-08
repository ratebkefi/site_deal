<?php

namespace Back\DashBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Entity\Regle;
use Back\DashBundle\Form\RegleType;

class RegleController extends Controller
{

    public function indexAction(Request $request)
    {
        $region = $this->getDoctrine()
            ->getRepository('BackDashBundle:Regle')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $region,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Régles", $this->generateUrl("back_regle"), array());
        return $this->render('BackDashBundle:Regle:index.html.twig', array('entities' => $region,
            'pagination' => $pagination));
    }

    public function addAction()
    {
        $regle = new Regle();
        $form = $this->createForm(new RegleType(), $regle);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($regle);
                $em->flush();
                return $this->redirect($this->generateUrl('back_regle'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Régles", $this->generateUrl("back_regle"), array());
        $breadcrumbs->addItem("Ajouter une régle", $this->generateUrl("back_regle"), array());
        return $this->render('BackDashBundle:Regle:edit.html.twig', array('form' => $form->createView(), "regle" => $regle));
    }

    public function editAction($id)
    {
        $request = $this->get('request');
        $regle = $this->getDoctrine()
            ->getRepository('BackDashBundle:Regle')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RegleType(), $regle);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_regle'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des régles", $this->generateUrl("back_regle"), array());
        $breadcrumbs->addItem("Modifier régle", $this->generateUrl("back_regle"), array());
        return $this->render('BackDashBundle:Regle:edit.html.twig', array('form' => $form->createView(), "regle" => $regle, 'id' => $id,));
    }



}
