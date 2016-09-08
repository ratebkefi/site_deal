<?php

namespace Back\PlanningBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PlanningBundle\Entity\Category;
use Back\PlanningBundle\Form\CategoryType;

class CategoryController extends Controller {

    public function indexAction(Request $request) {
        $category = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:Category')
                ->findBy(array('parent' => NULL));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $category, $request->query->get('page', 1)/* page number */, 20/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_bank"), array());
        return $this->render('BackPlanningBundle:Category:index.html.twig', array('entities' => $category,
                    'pagination' => $pagination));
    }

    public function FilsAction($id) {
        $category = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:Category')
                ->findBy(array('parent' => $id));

        return $this->render('BackPlanningBundle:Category:fils.html.twig', array('entities' => $category));

        //  return new Response('supression effectué avec succée!!');
    }

    public function addAction() {
        $category = new Category();
        $form = $this->createForm(new CategoryType(), $category);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();
                return $this->redirect($this->generateUrl('back_category'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_category"), array());
        $breadcrumbs->addItem("Ajouter Categorie", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackPlanningBundle:Category:edit.html.twig', array('form' => $form->createView(), "category" => $category));
    }

    public function showAction($id) {
        $request = $this->get('request');
        $category = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:Category')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CategoryType(), $category);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_category'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_category"), array());
        $breadcrumbs->addItem("Détails Categorie", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackPlanningBundle:Category:show.html.twig', array('form' => $form->createView(), "entity" => $category, 'id' => $id,));
    }

    public function editAction($id) {
        $request = $this->get('request');
        $category = $this->getDoctrine()
                ->getRepository('BackPlanningBundle:Category')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CategoryType(), $category);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_category'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Categories", $this->generateUrl("back_category"), array());
        $breadcrumbs->addItem("Modifier Categorie", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackPlanningBundle:Category:edit.html.twig', array('form' => $form->createView(), "category" => $category, 'id' => $id,));
    }

    public function deleteAction(Category $category) {
        if (!$category) {
            throw $this->createNotFoundException('No Category found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($category);
        $em->flush();

        return $this->redirect($this->generateUrl('back_category'));
    }

}
