<?php

namespace Back\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PageBundle\Entity\Pages;
use Back\PageBundle\Form\PagesType;
use Back\DashBundle\Common\Tools;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $pages = $this->getDoctrine()->getRepository('BackPageBundle:Pages')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $pages,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des pages statiques", $this->generateUrl("back_page_homepage"), array());
        return $this->render('BackPageBundle:Default:index.html.twig', array(
            'entities' => $pages,
            'pagination' => $pagination
        ));
    }

    public function addAction()
    {
        $page = new Pages();
        $form = $this->createForm(new PagesType(), $page);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $page->setAlias(Tools::string2url($page->getName()));
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('back_page_homepage'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des pages statiques", $this->generateUrl("back_page_homepage"), array());
        $breadcrumbs->addItem("Ajouter une page", $this->generateUrl("back_page_homepage"), array());
        return $this->render('BackPageBundle:Default:edit.html.twig', array('form' => $form->createView(), "page" => $page));
    }
    public function updateAction(Pages $pages){
        $request = $this->get('request');


        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new PagesType(), $pages);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_page_homepage'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des pages statiques", $this->generateUrl("back_page_homepage"), array());
        $breadcrumbs->addItem("Modifier une page", $this->generateUrl("back_page_homepage"), array());
        return $this->render('BackPageBundle:Default:edit.html.twig', array('form' => $form->createView(),"page"=>$pages));
    }
}
