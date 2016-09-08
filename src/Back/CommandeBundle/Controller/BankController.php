<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 25/02/2015
 * Time: 10:34
 */

namespace Back\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\CommandeBundle\Entity\Bank;
use Back\CommandeBundle\Form\BankType;
use Back\DashBundle\Common\Tools;

class BankController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $bank = $this->getDoctrine()->getRepository('BackCommandeBundle:Bank')->findBy(array(), array('name' => 'ASC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $bank,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des banques", $this->generateUrl("back_bank"), array());
        return $this->render('BackCommandeBundle:Bank:index.html.twig', array(
            'entities' => $bank, 'pagination' => $pagination,));
    }

    public function editAction(Bank $bank, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new BankType(), $bank);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // delete schedle


            $em->flush();

            return $this->redirect($this->generateUrl('back_bank'));
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des banques", $this->generateUrl("back_bank"), array());
        $breadcrumbs->addItem("Modifier banque", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackCommandeBundle:Bank:edit.html.twig', array(
                'form' => $form->createView(),
                'bank'=>$bank,
                )
        );
    }

    public function addAction(Request $request)
    {
        $bank = new Bank();
        $form = $this->createForm(new BankType(), $bank);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($bank);

                $em->flush();
                return $this->redirect($this->generateUrl('back_bank'));
            } else {
                echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des banques", $this->generateUrl("back_bank"), array());
        $breadcrumbs->addItem("Ajouter banque", $this->generateUrl("back_entreprise"), array());
        return $this->render('BackCommandeBundle:Bank:edit.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function unactivateAction(Bank $bank)
    {
        $em = $this->getDoctrine()->getManager();
        $bank->setAct(false);
        $em->persist($bank);
        $em->flush();
        return $this->redirect($this->generateUrl('back_bank'));
    }

    public function activateAction(Bank $bank)
    {
        $em = $this->getDoctrine()->getManager();
        $bank->setAct(true);
        $em->persist($bank);
        $em->flush();
        return $this->redirect($this->generateUrl('back_bank'));
    }
}