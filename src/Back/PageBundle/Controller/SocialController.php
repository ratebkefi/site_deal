<?php

namespace Back\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PageBundle\Entity\Socialmedia;
use Back\PageBundle\Form\SocialmediaType;
use Back\DashBundle\Common\Tools;

class SocialController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $Socialmedia = $this->getDoctrine()->getRepository('BackPageBundle:Socialmedia')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Socialmedia,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Réseaux sociaux", $this->generateUrl("back_social_homepage"), array());
        return $this->render('BackPageBundle:Socialmedia:index.html.twig', array(
            'entities' => $Socialmedia,
            'pagination' => $pagination
        ));
    }

    public function addAction()
    {
        $page = new Socialmedia();
        $form = $this->createForm(new SocialmediaType(), $page);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($page);
                $em->flush();
                return $this->redirect($this->generateUrl('back_social_homepage'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Réseaux sociaux", $this->generateUrl("back_page_homepage"), array());
        $breadcrumbs->addItem("Ajouter une lien", $this->generateUrl("back_page_homepage"), array());
        return $this->render('BackPageBundle:Socialmedia:edit.html.twig', array('form' => $form->createView(), "page" => $page));
    }
    public function updateAction(Socialmedia $Socialmedia){
        $request = $this->get('request');


        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new SocialmediaType(), $Socialmedia);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_social_homepage'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Réseaux sociaux", $this->generateUrl("back_page_homepage"), array());
        $breadcrumbs->addItem("Modifier une lien", $this->generateUrl("back_social_homepage"), array());
        return $this->render('BackPageBundle:Socialmedia:edit.html.twig', array('form' => $form->createView(),"page"=>$Socialmedia));
    }
    public function deleteAction(Socialmedia $entreprise)
    {
        if (!$entreprise) {
            throw $this->createNotFoundException('No Social media found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($entreprise);
        $em->flush();

        return $this->redirect($this->generateUrl('back_social_homepage'));
    }
}
