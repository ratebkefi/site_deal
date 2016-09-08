<?php

namespace Back\DashBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Entity\Entreprise;
use Back\DashBundle\Form\EntrepriseType;

class EntrepriseController extends Controller
{

    public function indexAction(Request $request)
    {
        $region = $this->getDoctrine()
            ->getRepository('BackDashBundle:Entreprise')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $region,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des entreprises", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackDashBundle:Entreprise:index.html.twig', array('entities' => $region,
            'pagination' => $pagination));
    }

    public function addAction()
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(new EntrepriseType(), $entreprise);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $em->flush();
                return $this->redirect($this->generateUrl('back_entreprise'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des entreprises", $this->generateUrl("back_entreprise"), array());
        $breadcrumbs->addItem("Ajouter entreprise", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackDashBundle:Entreprise:edit.html.twig', array('form' => $form->createView(), "entreprise" => $entreprise));
    }

    public function editAction($id)
    {
        $request = $this->get('request');
        $entreprise = $this->getDoctrine()
            ->getRepository('BackDashBundle:Entreprise')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new EntrepriseType(), $entreprise);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_entreprise'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des entreprises", $this->generateUrl("back_entreprise"), array());
        $breadcrumbs->addItem("Modifier entreprise", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackDashBundle:Entreprise:edit.html.twig', array('form' => $form->createView(), "entreprise" => $entreprise, 'id' => $id,));
    }

    public function deleteAction(Entreprise $entreprise)
    {
        if (!$entreprise) {
            throw $this->createNotFoundException('No Entreprise found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($entreprise);
        $em->flush();

        return $this->redirect($this->generateUrl('back_entreprise'));
    }

}
