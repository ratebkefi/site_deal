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
use Back\DealBundle\Form\ChefRedactorType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\DealBundle\Form\ChefRedactorFilterType;

class ChefRedactorController extends Controller
{
    public function viewAction(User $user){
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des chefs rédacteurs", $this->generateUrl("list_chefredactor"), array());
        $breadcrumbs->addItem("Afficher chef rédacteur", "show_chefredator", array());
        return $this->render('BackDealBundle:ChefRedactor:show.html.twig', array('entity' => $user));
    }
    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Gestion des rédacteurs", "list_chefredactor", array());

        $request = $this->get('request');
        $form = $this->createForm(new ChefRedactorFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_chefredactorfilter');
        $data=Tools::dropNull($data);
        $data['roles']="CHEFRED";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackDealBundle:ChefRedactor:index.html.twig', array('form' => $form->createView(),'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des rédacteurs", $this->generateUrl("list_chefredactor"), array());
        $breadcrumbs->addItem("Modifier chef rédacteur", "edit_chefredator", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ChefRedactorType(), $partner);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('list_chefredactor'));
        }
        return $this->render('BackDealBundle:ChefRedactor:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner, )
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des chefs rédacteurs", $this->generateUrl("list_chefredactor"), array());
        $breadcrumbs->addItem("Ajouter chef rédacteur", "add_chefredator", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new ChefRedactorType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('CHEFRED' => 'CHEFRED'));
                $user->setEnabled(true);

                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);
                //Tools::dump($user, true);
                $om->persist($user);
                $om->flush();
                return $this->redirect($this->generateUrl('list_chefredactor'));
            } else {

            }
        }
        return $this->render('BackDealBundle:ChefRedactor:add.html.twig',  array('form' => $form->createView()));
    }

}