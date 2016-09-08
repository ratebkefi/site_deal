<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:24
 */

namespace Back\DealBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\User;
use Back\DealBundle\Form\RedactorType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\DealBundle\Form\RedactorFilterType;

class RedactorController extends Controller
{
    public function viewAction(User $user){
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des rédacteurs", $this->generateUrl("list_redactor"), array());
        $breadcrumbs->addItem("Afficher rédacteur", "show_redator", array());
        return $this->render('BackDealBundle:Redactor:show.html.twig', array('entity' => $user));
    }
    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Gestion des rédacteurs", "list_redactor", array());

        $request = $this->get('request');
        $form = $this->createForm(new RedactorFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_redactorfilter');
        $data=Tools::dropNull($data);
        $data['roles']="REDACTEUR";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackDealBundle:Redactor:index.html.twig', array('form' => $form->createView(),'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des rédacteurs", $this->generateUrl("list_redactor"), array());
        $breadcrumbs->addItem("Modifier rédacteur", "edit_redator", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RedactorType(), $partner);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('list_redactor'));
        }
        return $this->render('BackDealBundle:Redactor:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner, )
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des rédacteurs", $this->generateUrl("list_redactor"), array());
        $breadcrumbs->addItem("Ajouter rédacteur", "add_redator", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new RedactorType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('REDACTEUR' => 'REDACTEUR'));
                $user->setEnabled(true);

                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);
                //Tools::dump($user, true);
                $om->persist($user);
                $om->flush();
                return $this->redirect($this->generateUrl('list_redactor'));
            } else {

            }
        }
        return $this->render('BackDealBundle:Redactor:add.html.twig',  array('form' => $form->createView()));
    }

}