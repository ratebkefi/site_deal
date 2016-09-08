<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 25/02/2015
 * Time: 13:54
 */

namespace Back\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\CommandeBundle\Entity\PaymentMethod;
use Back\CommandeBundle\Form\PaymentMethodType;

class PaymentmethodController extends Controller {
    public function indexAction()
    {
        $request = $this->get('request');
        $paiment = $this->getDoctrine()->getRepository('BackCommandeBundle:PaymentMethod')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $paiment,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des modes de paiement", $this->generateUrl("back_bank"), array());
        return $this->render('BackCommandeBundle:Paymentmethod:index.html.twig', array('entities' => $paiment, 'pagination' => $pagination,));
    }

    public function editAction(PaymentMethod $method, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new PaymentMethodType(), $method);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // delete schedle


            $em->flush();

            return $this->redirect($this->generateUrl('back_paymentmethod'));
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des modes de paiement", $this->generateUrl("back_bank"), array());
        $breadcrumbs->addItem("Modifier modes de paiement", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackCommandeBundle:Paymentmethod:edit.html.twig', array(
                'form' => $form->createView(),
                'bank'=>$method,
            )
        );
    }

    public function addAction(Request $request)
    {
        $method = new PaymentMethod();
        $form = $this->createForm(new PaymentMethodType(), $method);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($method);

                $em->flush();
                return $this->redirect($this->generateUrl('back_paymentmethod'));
            } else {
                echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des modes de paiement", $this->generateUrl("back_bank"), array());
        $breadcrumbs->addItem("Ajouter modes de paiement", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackCommandeBundle:Paymentmethod:edit.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function unactivateAction(PaymentMethod $method)
    {
        $em = $this->getDoctrine()->getManager();
        $method->setAct(false);
        $em->persist($method);
        $em->flush();
        return $this->redirect($this->generateUrl('back_paymentmethod'));
    }

    public function activateAction(PaymentMethod $method)
    {
        $em = $this->getDoctrine()->getManager();
        $method->setAct(true);
        $em->persist($method);
        $em->flush();
        return $this->redirect($this->generateUrl('back_paymentmethod'));
    }
}