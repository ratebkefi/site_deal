<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 25/02/2015
 * Time: 09:42
 */

namespace Back\CommandeBundle\Controller;

use Main\BookingBundle\Common\Tools;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\CommandeBundle\Entity\Localite;
use Back\CommandeBundle\Form\LocaliteType;

class LocaliteController extends Controller
{


    public function indexAction(Request $request)
    {
        $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $localite,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Localités", $this->generateUrl("back_locality"), array());
        return $this->render('BackCommandeBundle:Localite:index.html.twig', array('entities' => $localite, 'pagination' => $pagination,));
    }
    public function addAction(Request $request)
    {
        $locality = new Localite();
        $form = $this->createForm(new LocaliteType(), $locality);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($locality);

                $em->flush();
                return $this->redirect($this->generateUrl('back_locality'));
            } else {
                echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Localités", $this->generateUrl("back_locality"), array());
        $breadcrumbs->addItem("Ajouter Localités", $this->generateUrl("back_locality"), array());
        return $this->render('BackCommandeBundle:Localite:edit.html.twig', array('form' => $form->createView(), "locality" => $locality,));

    }
    public function editAction(Localite $locality)
    {
        $request = $this->get('request');

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new LocaliteType(), $locality);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_locality'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Localités", $this->generateUrl("back_locality"), array());
        $breadcrumbs->addItem("Modifier Localités", $this->generateUrl("back_region"), array());
        return $this->render('BackCommandeBundle:Localite:edit.html.twig', array('form' => $form->createView(), "locality" => $locality,));
    }
}