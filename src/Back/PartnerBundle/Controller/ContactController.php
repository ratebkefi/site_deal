<?php

namespace Back\PartnerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PartnerBundle\Form\ContactPartnerType;
use Back\PartnerBundle\Entity\ContactPartner;
use Back\DashBundle\Common\Tools;

/**
 * Partner controller.
 */
class ContactController extends Controller
{


    public function indexAction($partid)
    {
        $request = $this->get('request');
        $contact = $this->getDoctrine()
            ->getRepository('BackPartnerBundle:ContactPartner')
            ->findBy(array("user" => $partid));
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $contact,
            $request->query->get('page', 1),
            10
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());
        return $this->render('BackPartnerBundle:Contact:index.html.twig', array('entities' => $contact, 'pagination' => $pagination, "partid" => $partid));
    }

    public function addAction($partid)
    {
        $contact = new ContactPartner();
        $form = $this->createForm(new ContactPartnerType(), $contact);
        $request = $this->get('request');
        $verifContactPrincipale =$this->getDoctrine()
            ->getRepository('BackPartnerBundle:ContactPartner')
            ->findBy(array("user"=>$partid,"principale"=>1));

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $partner = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($partid);
                $contact->setUser($partner);
                //Tools::dump($contact,true);
                $em->persist($contact);
                $em->flush();
                return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partid)));
            } else {
                echo $form->getErrors();
            }
        }
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());

        $breadcrumbs->addItem("Ajouter contacts partenaire", "show_partner", array());
        return $this->render('BackPartnerBundle:Contact:edit.html.twig', array('form' => $form->createView(), 'verifprincipale' => count($verifContactPrincipale), 'partid' => $partid));
    }

    public function editAction($partid, $id)
    {

        $request = $this->get('request');
        $contact = $this->getDoctrine()
            ->getRepository('BackPartnerBundle:ContactPartner')
            ->find($id);
        $verifContactPrincipale =$this->getDoctrine()
            ->getRepository('BackPartnerBundle:ContactPartner')
            ->findBy(array("user"=>$partid,"principale"=>1,"id"=> !$id));
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ContactPartnerType(), $contact);
        //$file = $amg->getFile();
        $form->handleRequest($request);
        if ($form->isValid()) {
            // $amg->setFile($request->request->get("files"));
            $em->flush();

            return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partid)));
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());

        $breadcrumbs->addItem("Modifier contacts partenaire", "show_partner", array());
        return $this->render('BackPartnerBundle:Contact:edit.html.twig', array('form' => $form->createView(), 'verifprincipale' => count($verifContactPrincipale), 'partid' => $partid, 'partner' => $contact, 'id' => $id /*'file' => $file*/)
        );
    }

    public function showAction($partid, $id)
    {
        $partenaire = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partid);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partenaire->getName(), $this->generateUrl('dash_partner_show',array("id"=>$partid)), array());

        $breadcrumbs->addItem("Détails contacts partenaire", "show_partner", array());
        $contact = $this->getDoctrine()->getRepository('BackPartnerBundle:ContactPartner')->find($id);
        return $this->render('BackPartnerBundle:Contact:show.html.twig', array('partid' => $partid, 'entity' => $contact));
    }

    public function deleteAction($partid, ContactPartner $contact)
    {
        $em = $this->getDoctrine()->getManager();

        if (!$contact) {
            throw new NotFoundHttpException('contact non trouvée');
        }
        $em->remove($contact);
        $em->flush();
        return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partid)));
    }
}
