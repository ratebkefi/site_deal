<?php

namespace Main\FrontBundle\Controller;

use Back\CommandeBundle\Entity\TicketMessage;
use Symfony\Component\HttpFoundation\Request;
use Main\FrontBundle\Form\TicketType;
use Back\CommandeBundle\Form\TicketMessageType;
use Back\CommandeBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Entity\BigFidHistorique;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile as UploadedFile;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;

class TicketController extends Controller
{
    protected $file;

    public function ticketAction()
    {
        $request = $this->get('request');
        $client = $this->get('security.context')->getToken()->getUser();

        if ($client != 'anon.') {
            $request = $this->get('request');
            $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array("client" => $client));
            $ticket = $this->getDoctrine()->getRepository('BackCommandeBundle:Ticket')->findBy(array("commande" => $commande),             array('dcr' => 'DESC'));
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $ticket,
                $request->query->get('page', 1)/*page number*/,
                15
            );

            return $this->render('MainFrontBundle:Ticket:ticket.html.twig', array('entities' => $ticket, 'pagination' => $pagination,));
        } else {
            return $this->redirect($this->generateUrl('identification'));

        }

    }

    public function addAction(Request $request)
    {
        //$this->file = new File();        
        	//$request = $this->get('request');
		$erreurMessage = null;
        $client = $this->get('security.context')->getToken()->getUser();

        if ($client) {
            $ticket = new Ticket();
            $ticketMessage = new TicketMessage();
            $ticket->addMessage($ticketMessage);


            $form = $this->createForm(new TicketType(), $ticket, array('id' => $client->getId()));

            if ($request->getMethod() == 'POST') {
                $form->bind($request);


                $message = $request->request->get('message');
                $file = $request->request->get('file');
				$dataTicket = $request->request->get('commandebundle_ticket');

               
				if(isset($dataTicket["commande"]))
				{
				
				
               

                if ($form->isValid()) {

				
				 $nombreTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->ListServiceClient();
                $min = $nombreTicket[0];
                foreach ($nombreTicket as $value) {
                    $nombreTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->Disponiblite($value->getId());
                    if ($nombreTicket <= $min) {
                        $min = $nombreTicket;
                        $idUser = $value->getId();
                    }
                }

                $User = $this->getDoctrine()->getRepository("UserUserBundle:User")->find($idUser);
                $utilisateur = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->find($client->getId());
				
				
				
                    $codeReclamation = "RECLA-" . sprintf("%09d", rand());
                    $em = $this->getDoctrine()->getManager();
                    $ticket->setCode($codeReclamation);
                    $ticket->setStatus(1);
                    $ticket->setPriorite(1);
                    $ticket->setUser($User);
                    $ticket->setDcr(new \DateTime());
                    //$ticket->addTicketmessage($ticketMessage);
                    $ticketMessage->setTicket($ticket);
                    $ticketMessage->setMessage($message);
                    $ticketMessage->setDpa(new \DateTime());
                    $ticketMessage->setClient($utilisateur);
                    $ticketMessage->upload();
                    $ticket->addMessage($ticketMessage);

                    $em->persist($ticket);
                    $em->flush();

                    /*------------------------------------Notification-------------------------------------*/
                    $listUserForNotif = Constant\NotifUser::getOuvrirTicket();

                    $libelleNotif = "Un ticket assigné " . $ticket->getUser()->getName() . " a été ouvert";
                    $libelleNotif1 = "Vous avez une ticket a traité";
                    $lient = $this->generateUrl('view_ticket', array('id' => $ticket->getId()));

                    $icone = "icon-calendar";
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($ticket->getUser()));
                    $notification->setName($libelleNotif1);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();
                    for ($count = 1; $count <= count($listUserForNotif); $count++) {
                        $query = $this->getDoctrine()->getEntityManager()
                            ->createQuery(
                                'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                            )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                        $listUser = $query->getResult();
                        foreach ($listUser as $value) {
                            $notification = new Notification();
                            $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                            $notification->setName($libelleNotif);
                            $notification->setLien($lient);
                            $notification->setIcone($icone);
                            $em->persist($notification);
                            $em->flush();
                        }
                        unset($listUser);
                    }

                    $subject = "[ " . $codeReclamation . " ]";
                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($client->getEmail())
                        ->setBody($this->renderView('MainFrontBundle:Email:notifClientNewTicket.html.twig', array("ticket" => $ticket)));
                    $message->setContentType("text/html");

                    $this->get('mailer')->send($message);
                    //send mail au agent service client
                    $subject = "Nouvelle Ticket [ " . $codeReclamation . " ]";
                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($User->getEmail())
                        ->setBody($this->renderView('MainFrontBundle:Email:notifAgentNewTicket.html.twig', array("ticket" => $ticket, 'user' => $User)));
                    $message->setContentType("text/html");

                    $this->get('mailer')->send($message);
                    return $this->redirect($this->generateUrl('ticket_manager'));
                }
				else
				{
				$formError = $form->getErrors();
				$erreurMessage = $formError[0]->GetMessage();
				
				}

            }
            }
            return $this->render('MainFrontBundle:Ticket:ajouter.html.twig', array(
                'form' => $form->createView(), 'erreurMessage' => $erreurMessage ,'client' => $client
            ));

        } else {
            return $this->redirect($this->generateUrl('identification'));

        }
    }

    public function detailAction($id)
    {
        $request = $this->get('request');

        $securityContext = $this->container->get('security.context');
        $client = $this->get('security.context')->getToken()->getUser();
        $ticket1 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);

        if (!$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

            return $this->redirect($this->generateUrl('identification'));

        } else {
            if ($ticket1->getCommande()->getClient()->getId() != $client->getId()) {
                return $this->redirect($this->generateUrl('identification'));

            }
        }
        $messageTichet = new TicketMessage();
        $form = $this->createForm(new TicketMessageType(), $messageTichet);
        $form->bind($request);
        //$form->handleRequest($this->getRequest());
        // $form->bindRequest($this->getRequest());
        $client = $this->get('security.context')->getToken()->getUser();
        if ($client) {
            $utilisateur = $this->get('security.context')->getToken()->getUser();;
            $data = $request->request->get('ticketbundle_ticketmessage');
            $request = $this->get('request');
            $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);
            if ($request->getMethod() == 'POST') {
                if ($form->isValid()) {
                    //var_dump($request->files); exit;
                    $em = $this->getDoctrine()->getManager();
                    // $form->handleRequest($request);
                    $messageTichet->setMessage($data["message"]);
                    $messageTichet->setClient($utilisateur);
                    $messageTichet->setDpa(new \DateTime());
                    $messageTichet->setTicket($ticket);
                    $em->persist($messageTichet);
                    $messageTichet->upload();
                    $em->flush();

                    $ticket->setStatus(1);
                    $em->persist($ticket);
                    $em->flush();
                    /*------------------------------------Notification-------------------------------------*/
                    $listUserForNotif = Constant\NotifUser::getNouveauTicket();

                    $libelleNotif = "Le client  " . $messageTichet->getClient() . " a répondu au ticket " . $ticket->getObject();
                    $lient = $this->generateUrl('view_ticket', array('id' => $ticket->getId()));
                    $icone = "icon-calendar";
                    $notification = new Notification();
                    $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($ticket->getUser()));
                    $notification->setName($libelleNotif);
                    $notification->setLien($lient);
                    $notification->setIcone($icone);
                    $em->persist($notification);
                    $em->flush();
                    for ($count = 1; $count <= count($listUserForNotif); $count++) {
                        $query = $this->getDoctrine()->getEntityManager()
                            ->createQuery(
                                'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                            )->setParameter('role', '%"' . $listUserForNotif[$count] . '"%');

                        $listUser = $query->getResult();
                        foreach ($listUser as $value) {
                            $notification = new Notification();
                            $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()));
                            $notification->setName($libelleNotif);
                            $notification->setLien($lient);
                            $notification->setIcone($icone);
                            $em->persist($notification);
                            $em->flush();
                        }
                        unset($listUser);
                    }
                    /*-----------------------------Fin notif--------------------------------------------------------------*/
                    //send mail au agent service client
                    $subject = "Retour Ticket [ " . $ticket->getCode() . " ]" . $ticket->getObject();
                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($ticket->getUser()->getEmail())
                        ->setBody($this->render('MainFrontBundle:Email:notifAgentNewTicket.html.twig', array("ticket" => $ticket, 'user' => $ticket->getUser())));
                    $this->get('mailer')->send($message);

                    return $this->redirect($this->generateUrl('detail_ticket', array('id' => $id)));
                }
            }


            return $this->render('MainFrontBundle:Ticket:detail.html.twig', array(
                'form' => $form->createView(), 'ticket' => $ticket
            ));

        } else {
            return $this->redirect($this->generateUrl('identification'));
        }
    }


}
