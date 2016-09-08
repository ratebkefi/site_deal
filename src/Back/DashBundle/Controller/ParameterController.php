<?php

namespace Back\DashBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Form\ParameterType;

class ParameterController extends Controller
{

    public function indexAction(Request $request)
    {
        $region = $this->getDoctrine()
            ->getRepository('BackDashBundle:Parameter')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $region,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Big Fid", $this->generateUrl("back_parameter"), array());
        return $this->render('BackDashBundle:Parameter:index.html.twig', array('entities' => $region,
            'pagination' => $pagination));
    }


    public function editAction($id)
    {
        $request = $this->get('request');
        $parameter = $this->getDoctrine()
            ->getRepository('BackDashBundle:Parameter')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ParameterType(), $parameter);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_parameter'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Big Fid", $this->generateUrl("back_parameter"), array());
        $breadcrumbs->addItem("Modifier Big Fid", $this->generateUrl("back_parameter"), array());
        return $this->render('BackDashBundle:Parameter:edit.html.twig', array('form' => $form->createView(), "parameter" => $parameter, 'id' => $id,));
    }


}
