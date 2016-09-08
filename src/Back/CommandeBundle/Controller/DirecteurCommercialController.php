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
use Back\CommandeBundle\Form\DirecteurCommercialaddType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Form\DirecteurCommercialFilterType;
use Back\DashBundle\Constant;

class DirecteurCommercialController extends Controller
{
    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeurs commercials", $this->generateUrl("list_directeurcommercial"), array());
        $breadcrumbs->addItem("Afficher un directeur commercial", "show_directeurcommercial", array());
        return $this->render('BackCommandeBundle:DirecteurCommercial:show.html.twig', array('entity' => $user));
    }

    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur commercial", $this->generateUrl("list_directeurcommercial"), array());
        $request = $this->get('request');
        $form = $this->createForm(new DirecteurCommercialFilterType());
        $form->bind($request);
        $data = $request->query->get('back_commandebundle_directeurcommercial');
        $data = Tools::dropNull($data);
        $data['roles'] = "DIRECTEURCOMMERCIAL";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:DirecteurCommercial:index.html.twig', array('form' => $form->createView(), 'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur commercial", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Modifier directeur directeur commercial", "edit_directeurcommercial", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new DirecteurCommercialaddType(), $partner);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('list_directeurcommercial'));
        }
        return $this->render('BackCommandeBundle:DirecteurCommercial:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur commercial", $this->generateUrl("list_directeurcommercial"), array());
        $breadcrumbs->addItem("Ajouter directeur commercial", "add_directeurCommercial", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new DirecteurCommercialaddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('DIRECTEURCOMMERCIAL' => 'DIRECTEURCOMMERCIAL'));
                $user->setEnabled(true);
                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);

                $om->persist($user);
                $om->flush();

                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_directeurcommercial'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackCommandeBundle:DirecteurCommercial:add.html.twig', array('form' => $form->createView()));
    }


}