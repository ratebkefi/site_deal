<?php

namespace Back\PlanningBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PlanningBundle\Entity\ResponseRequiredInfo;
use Back\PlanningBundle\Form\ResponseRequiredInfoType;

class ResponseRequiredInfoController extends Controller {

    public function indexAction(Request $request) {
        $ResponseRequiredInfo = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:ResponseRequiredInfo')
                ->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
               $ResponseRequiredInfo,
               $request->query->get('page', 1)/*page number*/,
               10/*limit per page*/
           );
        return $this->render('BackPlanningBundle:ResponseRequiredInfo:index.html.twig', array('entities' => $ResponseRequiredInfo,
            'pagination' => $pagination));
    }

    public function addAction() {
        $responseRequiredInfo = new ResponseRequiredInfo();
        $form = $this->createForm(new ResponseRequiredInfoType(), $responseRequiredInfo);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($responseRequiredInfo);
                $em->flush();
                return $this->redirect($this->generateUrl('back_reponseRequiredInfo'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackPlanningBundle:ResponseRequiredInfo:edit.html.twig', array('form' => $form->createView(),"responserequiredinfo"=>$responseRequiredInfo));
    }

    public function editAction($id) {
        $request = $this->get('request');
        $responseRequiredInfo = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:ResponseRequiredInfo')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ResponseRequiredInfoType(), $responseRequiredInfo);
        $form->handleRequest($request);

        if ($form->isValid()) { 
            $em->flush();

            return $this->redirect($this->generateUrl('back_reponseRequiredInfo'));
        } else {
           // echo $form->getErrors();
        }
        return $this->render('BackPlanningBundle:ResponseRequiredInfo:edit.html.twig', array('form' => $form->createView(),"responserequiredinfo"=>$responseRequiredInfo, 'id' => $id,));
    }

    public function deleteAction(ResponseRequiredInfo $responseRequiredInfo) {
         if (!$responseRequiredInfo) {
        throw $this->createNotFoundException('No Réponse found');
    }

    $em = $this->getDoctrine()->getEntityManager();
    $em->remove($responseRequiredInfo);
    $em->flush();

        return $this->redirect($this->generateUrl('back_reponseRequiredInfo'));
    }

}
