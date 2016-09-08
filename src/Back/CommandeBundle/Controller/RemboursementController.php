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
use Back\CommandeBundle\Entity\Remboursement;
use Back\DashBundle\Entity\BigFidHistorique;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Form\rembousementFilterType;
use Back\CommandeBundle\Entity\TicketMessage;
use Back\CommandeBundle\Entity\TicketHistorique;
use Back\CommandeBundle\Form\TicketViewType;
use Back\CommandeBundle\Form\TicketMessageType;
use Back\CommandeBundle\Form\VirementType;

class RemboursementController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $form = $this->createForm(new rembousementFilterType());
        $form->bind($request);
        $data = $request->query->get('back_commandebundle_remboursementfilter');
        $data = Tools::dropNull($data);
            $remboursement = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:Remboursement')
                ->getListCouponArembourser($data);


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $remboursement,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des Remboursements", $this->generateUrl("back_remboursement"), array());
        return $this->render('BackCommandeBundle:Remboursement:index.html.twig', array('form' => $form->createView(),'entities' => $remboursement, 'pagination' => $pagination,));
    }

    public function showAction($id)
    {
        $ticket = $this->getDoctrine()->getRepository('BackCommandeBundle:Ticket')->find($id);
        $noteTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketNote")->findBy(array("ticket"=>$id));

        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');

        $ticketMessage =  new TicketMessage();
        $historiqueTicket = new TicketHistorique();
        $form = $this->createForm(new TicketViewType(), $ticket);
        $form1 = $this->createForm(new TicketMessageType(), $ticketMessage );

        $user = $this->get('security.context')->getToken()->getUser();

        $historiqueTicket->setAction("Vu");
        $historiqueTicket->setUser($user);
        $historiqueTicket->setDcr(new \DateTime());
        $historiqueTicket->setTicket($ticket);
        $em->persist($historiqueTicket);
        $em->flush();
        if ($request->getMethod() == 'POST') {
            $form1->handleRequest($this->getRequest());
            if ($form1->isValid()) {
                $ticketMessage->setTicket($ticket);
                $ticketMessage->setUser($user);
                $em->persist($ticketMessage);
                $ticketMessage->upload();
                $em->flush();
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl('view_ticket',array("id"=>$id)));
            }

            $form->bind($request);

            if ($form->isValid()) {
                $remboursement   = $request->request->get("remboursement");
                $rembours        = $request->request->get("rembours");
                if($rembours)
                {
                    for($count=0;$count<count($remboursement);$count++)
                    {
                        $Coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($remboursement[$count]);
                        $Coupon->setVendu(4);
                        $em->persist($Coupon);
                        $em->flush();
                    }
                    // exit;
                }
                $em->flush();
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_ticket'));
            }
        }
        return $this->render('BackCommandeBundle:Remboursement:show.html.twig', array('form1' => $form1->createView(),'ticket' => $ticket,'nbrNote'=>count($noteTicket),'form' => $form->createView()));
    }

    public function bigfidAction($id,$ticket,Request $request)
    {
        if ($request->getMethod() == 'POST') {
            // set historique bigfid
            $em = $this->getDoctrine()->getManager();
            $coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($id);
            $historiqueBigFid = new BigFidHistorique();
            $historiqueBigFid->setMontant($request->request->get("bigfid"));
            $historiqueBigFid->setClient($coupon->getCommand()->getClient());
            $historiqueBigFid->setMotif("Remboursement commande");
            $historiqueBigFid->setDcr(new \dateTime());
            $historiqueBigFid->setOperation(1);

            $em->persist($historiqueBigFid);
            $em->flush();
            // Changer etat coupon
            $coupon->setVendu(5);
            $em->persist($coupon);
            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('back_show_remboursement', array('id'=>$ticket)));
        }
        $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($id);
        return $this->render('BackCommandeBundle:Remboursement:bigfid.html.twig', array('coupon' => $coupon,'ticket'=>$ticket));
    }

    public function virementAction($id)
    {
        $virement = $this->getDoctrine()->getRepository('BackCommandeBundle:Virement')->find($id);

        $request = $this->get('request');
        $form = $this->createForm(new virementType(), $virement);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $em = $this->getDoctrine()->getManager();
            $virement->upload();
            $em->persist($virement);
            $em->flush();
            if($virement->getEtat()==1)
            {
                $Remboursement =   $this->getDoctrine()->getRepository('BackCommandeBundle:Remboursement')->findBy(array("virement"=>$id));
                foreach ($Remboursement as $value)
                {
                    $couponId = $value->getCoupon()->getId();
                }

                if($couponId)
                {
                    $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($couponId);
                    $coupon->setVendu(5);
                    $em->persist($coupon);
                    $em->flush();
                }
                // todo
            // envoi de mail  en cas de remboursement accepeter par viremement
                $message = \Swift_Message::newInstance()
                    ->setSubject('Remboursement relatif au ticket  '.$Remboursement[0]->getTicket()->getCode())
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($Remboursement[0]->getTicket()->getCommande()->getClient()->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:remboursementVirementAccepter.html.twig', array("ticket" => $Remboursement[0]->getTicket())));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);
            }

            if($virement->getEtat()==0)
            {
                $Remboursement =   $this->getDoctrine()->getRepository('BackCommandeBundle:Remboursement')->findBy(array("virement"=>$id));
                foreach ($Remboursement as $value)
                {
                    $couponId = $value->getCoupon()->getId();
                }
                if($couponId)
                {
                    $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($couponId);
                    $coupon->setVendu(7);
                    $em->persist($coupon);
                    $em->flush();
                }
                // envoi de mail  en cas de remboursement refuser par viremement
               /* $message = \Swift_Message::newInstance()
                    ->setSubject('Remboursement relatif au ticket  '.$Remboursement[0]->getTicket()->getCode())
                    ->setFrom('contact@bigdeal.tn')
                    ->setTo($Remboursement[0]->getTicket()->getCommande()->getClient()->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:remboursementVirementRefuser.html.twig', array("ticket" => $Remboursement[0]->getTicket())));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);*/
            }
                return $this->redirect($this->generateUrl('back_remboursement'));
        }
        $form->handleRequest($request);
        return $this->render('BackCommandeBundle:Remboursement:virement.html.twig', array('form' => $form->createView(),'virement' => $virement,));
    }

    public function annulerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($id);
        $coupon->setVendu(7);
        $em->persist($coupon);
        $em->flush();
        return $this->redirect($this->generateUrl('back_remboursement'));
    }
}