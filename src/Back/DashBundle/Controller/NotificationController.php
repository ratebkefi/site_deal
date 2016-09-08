<?php

namespace Back\DashBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Form\ParameterType;
use Back\DashBundle\Entity\Notification;

class NotificationController extends Controller {

    public function indexAction(Request $request) {
        $user = $this->get('security.context')->getToken()->getUser();

        $notification = $this->getDoctrine()
                ->getRepository('BackDashBundle:Notification')
                ->findBy(array("user" => $user), array('id' => 'DESC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $notification, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Notifications", $this->generateUrl("back_parameter"), array());
        return $this->render('BackDashBundle:Notification:index.html.twig', array('entities' => $notification,
                    'pagination' => $pagination));
    }

    public function notifvuAction() {
        
        $currentuser = $this->get('security.context')->getToken()->getUser();
        $notifvu = new Notification();
        $notif = $this->getDoctrine()->getRepository('BackDashBundle:Notification')->findBy(array('user' => $currentuser->getId(),"etat" => 0));
       
        foreach ($notif as $value) {
            $value->setEtat(1);
            $em = $this->getDoctrine()->getManager();
            $em->persist($value);
            $em->flush();
        }
        return $this->render('BackDashBundle:Default:index.html.twig');
    }

}
