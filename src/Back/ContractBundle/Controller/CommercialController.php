<?php

namespace Back\ContractBundle\Controller;

use User\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\ContractBundle\Entity\Commercial;
use Back\ContractBundle\Form\CommercialaddType;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\ContractBundle\Form\CommercialFilterType;

class CommercialController extends Controller
{

    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des commercials", $this->generateUrl("list_commercial"), array());
        $breadcrumbs->addItem("Afficher commercial", "view_commercial_manager", array());
        return $this->render('BackContractBundle:Commercial:show.html.twig', array('entity' => $user));
    }

    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Gestion des commercials", $this->generateUrl("list_commercial"), array());

        $request = $this->get('request');
        $form = $this->createForm(new CommercialFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_commercialfilter');
        $data=Tools::dropNull($data);
        $data['roles']="COMMERCIAL";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackContractBundle:Commercial:index.html.twig', array('form' => $form->createView(),'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des commercials", $this->generateUrl("list_commercial"), array());
        $breadcrumbs->addItem("Modifier commercial", "edit_commercial", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CommercialaddType(), $partner);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
        if ($form->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('list_commercial'));
        } else {
            $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
            return $this->redirect($this->generateUrl('list_commercial'));
        }
    }
        return $this->render('BackContractBundle:Commercial:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des commercials", $this->generateUrl("list_commercial"), array());
        $breadcrumbs->addItem("Ajouter commercial", "add_commercial", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new CommercialaddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('COMMERCIAL' => 'COMMERCIAL'));
                $user->setEnabled(true);
                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);
                //Tools::dump($user, true);
                $om->persist($user);
                $om->flush();

                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_commercial'));
            } else {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl('list_commercial'));
            }
        }
        return $this->render('BackContractBundle:Commercial:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {//view_commercial_manager
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des commercials", $this->generateUrl("list_commercial"), array());
        $breadcrumbs->addItem("Afficher commercial", "view_commercial_manager", array());
        return $this->render('BackContractBundle:Commercial:show.html.twig', array('entity' => $user,));
    }

}
