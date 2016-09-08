<?php

namespace Back\PlanningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PlanningBundle\Entity\requiredInfo;
use Back\PlanningBundle\Form\requiredInfoType;

class requiredInfoController extends Controller {

    public function indexAction($category_id,Request $request) {
        //category_id
        
        $requiredInfo = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:requiredInfo')
                ->findBy(array('categoryId' => $category_id));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $requiredInfo, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        $category = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:category')
            ->find($category_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($category->getName(), $this->generateUrl("show_category_manager",array("id"=>$category_id)), array());
        $breadcrumbs->addItem("Gestions des Questions", $this->generateUrl("back_requiredInfo",array("category_id"=>$category_id)), array());
        return $this->render('BackPlanningBundle:requiredInfo:index.html.twig', array('entities' => $requiredInfo,
                    'pagination' => $pagination,'category_id'=>$category_id));
    }

    public function addAction($category_id) {
        $requiredInfo = new requiredInfo();
        $form = $this->createForm(new requiredInfoType(), $requiredInfo);
        $category = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Category')
            ->find($category_id);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $requiredInfo->setCategoryId($category);
                $em->persist($requiredInfo);
                $em->flush();
                return $this->redirect($this->generateUrl('back_requiredInfo', array('category_id' => $category_id)));

        }
        }
        $category = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:category')
            ->find($category_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($category->getName(), $this->generateUrl("show_category_manager",array("id"=>$category_id)), array());
        $breadcrumbs->addItem("Gestions des Questions", $this->generateUrl("back_requiredInfo",array("category_id"=>$category_id)), array());
        $breadcrumbs->addItem("Ajouter  Questions", $this->generateUrl("back_requiredInfo",array("category_id"=>$category_id)), array());
        return $this->render('BackPlanningBundle:requiredInfo:edit.html.twig', array('form' => $form->createView(), "requiredInfo" => $requiredInfo,'category_id'=>$category_id));
    }

    public function editAction($category_id,$id) {
        $request = $this->get('request');
        $requiredInfo = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:requiredInfo')
                ->find($id);
        $category = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:category')
            ->find($category_id);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new requiredInfoType(), $requiredInfo);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_requiredInfo', array('category_id' => $category_id)));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($category->getName(), $this->generateUrl("show_category_manager",array("id"=>$category_id)), array());
        $breadcrumbs->addItem("Gestions des Questions", $this->generateUrl("back_requiredInfo",array("category_id"=>$category_id)), array());
        $breadcrumbs->addItem("Modifier  Questions", $this->generateUrl("back_requiredInfo",array("category_id"=>$category_id)), array());
        return $this->render('BackPlanningBundle:requiredInfo:edit.html.twig', array('form' => $form->createView(), "requiredInfo" => $requiredInfo, 'id' => $id,'category_id'=>$category_id));
    }

    public function deleteAction($category_id,requiredInfo $requiredInfo) {
        if (!$requiredInfo) {
            throw $this->createNotFoundException('No Question found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($requiredInfo);
        $em->flush();

        return $this->redirect($this->generateUrl('back_requiredInfo', array('category_id' => $category_id)));
    }

}
