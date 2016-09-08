<?php

namespace Back\CommandeBundle\Controller;

use User\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\CommandeBundle\Form\ChefServiceClientaddType;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Form\ChefServiceClientFilterType;


class ChefServiceClientController extends Controller
{

    public function viewAction(User $user){
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Chefs services clients", $this->generateUrl("list_chefserviceclient"), array());
        $breadcrumbs->addItem("Détails Chef service client", "edit_chefserviceclient", array());
        return $this->render('BackCommandeBundle:ChefServiceClient:show.html.twig', array('entity' => $user));
    }
    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        // Example with parameter injected into translation "user.profile"
        $breadcrumbs->addItem("Gestion des Chefs services clients", "list_chefserviceclient", array());

        $request = $this->get('request');
        $form = $this->createForm(new ChefServiceClientFilterType());
        $form->bind($request);
        $data=$request->query->get('back_commandebundle_chefserviceclientfilter');
        //var_dump($data); exit;
        $data=Tools::dropNull($data);
        $data['roles']="CHEFSERVICECLI";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:ChefServiceClient:index.html.twig', array('form' => $form->createView(),'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Chéf services clients", $this->generateUrl("list_chefserviceclient"), array());
        $breadcrumbs->addItem("Modifier Chéf services clients", "edit_chefserviceclient", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ChefServiceClientaddType(), $partner);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {

        if ($form->isValid()) {

            $em->flush();
            $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
            return $this->redirect($this->generateUrl('list_chefserviceclient'));
        }
        else
        {
            $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
            return $this->redirect($this->generateUrl('list_chefserviceclient'));
        }
        }
        return $this->render('BackCommandeBundle:ChefServiceClient:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Chef service client", $this->generateUrl("list_chefserviceclient"), array());
        $breadcrumbs->addItem("Ajouter chef service client", "add_chefserviceclient", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new ChefServiceClientaddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('CHEFSERVICECLI' => 'CHEFSERVICECLI'));
                $user->setEnabled(true);

                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);
                //Tools::dump($user, true);
                $om->persist($user);
                $om->flush();


                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl('list_chefserviceclient'));
            }
            else
            {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl('list_chefserviceclient'));
            }
        }
        return $this->render('BackCommandeBundle:ChefServiceClient:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des Chefs Services Clients", $this->generateUrl("list_chefserviceclient"), array());
        $breadcrumbs->addItem("Afficher Chef service client", "show_chefserviceclient", array());
        return $this->render('BackCommandeBundle:ChefServiceClient:show.html.twig', array('entity' => $user,));
    }

}
