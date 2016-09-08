<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:24
 */

namespace Back\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\User;
use Back\CommandeBundle\Form\FinanceaddType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Form\FinanceFilterType;

class FinancierController extends Controller
{
    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Financier", $this->generateUrl("list_financier"), array());
        $breadcrumbs->addItem("Afficher Financier", "view_financier", array());
        return $this->render('BackCommandeBundle:Financier:show.html.twig', array('entity' => $user));
    }



    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Financier", $this->generateUrl("list_financier"), array());
        $request = $this->get('request');
        $form = $this->createForm(new FinanceFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_financierfilter');
        $data=Tools::dropNull($data);
        $data['roles']="FINANCIER";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:Financier:index.html.twig', array('form' => $form->createView(),'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Financier", $this->generateUrl("list_financier"), array());
        $breadcrumbs->addItem("Modifier Financier", "edit_financier", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new FinanceaddType(), $partner);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('list_financier'));
        }
        return $this->render('BackCommandeBundle:Financier:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Financier", $this->generateUrl("list_financier"), array());
        $breadcrumbs->addItem("Ajouter Financier", "add_financier", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new FinanceaddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('FINANCIER' => 'FINANCIER'));
                $user->setEnabled(true);
                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);

                $om->persist($user);
                $om->flush();


                return $this->redirect($this->generateUrl('list_financier'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackCommandeBundle:Financier:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Financier", $this->generateUrl("list_financier"), array());
        $breadcrumbs->addItem("Afficher Financier", "show_financier", array());
        return $this->render('BackCommandeBundle:Financier:show.html.twig', array('entity' => $user,));
    }

}