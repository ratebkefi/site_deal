<?php

namespace Back\ContractBundle\Controller;

use Back\DashBundle\Common\Tools;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\ContractBundle\Entity\Protocol;
use Back\ContractBundle\Form\ProtocolType;
use Back\ContractBundle\Form\ProtocolFilterType;
use Back\DashBundle\Entity\Notification;
use Back\DashBundle\Constant;

class ProtocolController extends Controller
{
    public function printP($id, $pdf)
    {
        // test partenaire
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($id);
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Imprimer::Protocole D’accord ');
        $pdf->SetTitle('Protocole D’accord');
        $pdf->SetSubject('');
        $pdf->SetKeywords('');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 45);

        $pdf->SetFont('helvetica', '', 9, '', true);

        $pdf->AddPage();
        $html = $this->renderView('BackContractBundle:Protocol:pdf.html.twig', array(
            'protocol' => $protocol));

        $pdf->writeHTML($html);
        //$pdf->Output('/pnv.pdf', 'F');
        $nompdf = 'protocole_accord.pdf';
        $pdf->Output($nompdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function printAction($id)
    {

        // générer un mail pour le client final avec validation de génération de coupon

        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = ProtocolController::printP($id, $pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        $form = $this->createForm(new ProtocolFilterType());
        $form->bind($request);
        $data = $request->query->get('back_contractbundle_filterprotocol');
        $data = Tools::dropNull($data);
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->findByFilter($data, array('id' => 'DESC'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $protocol, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );


        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des protocoles", "dash_sellingpoint_show", array());
        return $this->render('BackContractBundle:Protocol:index.html.twig', array(
            'entities' => $protocol,
            'pagination' => $pagination,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Protocol $protocol)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($protocol->getUser()->getName(), $this->generateUrl("dash_partner_show", array('id'=>$protocol->getUser()->getId())));
        $breadcrumbs->addItem("Afficher protocole", "dash_protocol_show", array());
        return $this->render('BackContractBundle:Protocol:show.html.twig', array('entity' => $protocol,'partner'=>$protocol->getUser()->getId()));
    }

    public function addpartnerAction($id)
    {
        $protocol = new Protocol();
        $form = $this->createForm(new ProtocolType(), $protocol);
        $commercial = $this->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        $partner = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($id);

        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $protocol->setUser($partner);
                $protocol->setCommercial($commercial);
                $em->persist($protocol);
                $em->flush();
                
                              
/*------------------------------------Notification-------------------------------------*/
                
               $listUserForNotif = Constant\NotifUser::getAjoutProtocole();

                $libelleNotif = $protocol->getCommercial()." a ajouté un nouveau protocole au partenaire ".$protocol->getUser();
                //$libelleNotif1 = "Vous avez ajouté un nouveau protocole";
                $lien = $this->generateUrl('dash_partner_show', array('id' => $protocol->getUser()->getId()));
                $icone = "icon-pushpin";
               
                for($count=1;$count<=count($listUserForNotif);$count++)
                {
                    $query = $this->getDoctrine()->getEntityManager()
                        ->createQuery(
                            'SELECT u FROM UserUserBundle:User u WHERE u.roles LIKE :role'
                        )->setParameter('role', '%"'.$listUserForNotif[$count].'"%');

                    $listUser = $query->getResult();
                    foreach($listUser as $value)
                    {
                        $notification = new Notification();
                        $notification->setUser($this->getDoctrine()->getRepository("UserUserBundle:User")->find($value->getId()) );
                        $notification->setName($libelleNotif);
                        $notification->setLien($lien);
                        $notification->setIcone($icone);
                        $em->persist($notification);
                        $em->flush();
                    }
                    unset($listUser);
                }

                /*----------------Fin notif----------------*/
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$id)));
            } else {
                $this->get('session')->getFlashBag()->set('error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');

                return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$id)));

            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($partner->getName(), $this->generateUrl("dash_partner_show", array('id'=>$id)));
        $breadcrumbs->addItem("Ajouter protocole", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Protocol:newpartner.html.twig', array('form' => $form->createView()));
    }

    public function addAction()
    {

        $protocol = new Protocol();
        $form = $this->createForm(new ProtocolType(), $protocol);
        $request = $this->get('request');
        $commercial = $this->get('security.context')->getToken()->getUser();

        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            //echo "<pre>";print_r($page);exit;
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $protocol->setCommercial($commercial);
                $em->persist($protocol);
                $em->flush();                
                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('back_protocol_homepage'));
            } else {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl('back_protocol_homepage'));

            }
        }

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des protocoles", $this->generateUrl("back_protocol_homepage"), array());
        $breadcrumbs->addItem("Ajouter protocole", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Protocol:new.html.twig', array('form' => $form->createView()));
    }

    public function editAction($id)
    {
        $commercial = $this->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ProtocolType(), $protocol);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {
                $protocol->setCommercial($commercial);

                $em->flush();
                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$protocol->getUser()->getId())));

            } else {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$protocol->getUser()->getId())));
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($protocol->getUser()->getName(), $this->generateUrl("dash_partner_show", array('id'=>$protocol->getUser()->getId())));
        $breadcrumbs->addItem("Modifier protocole", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Protocol:new.html.twig', array('form' => $form->createView(), 'id' => $id,)
        );
    }

    public function deleteAction(Protocol $protocol)
    {
        $em = $this->getDoctrine()->getManager();
        $id=$protocol->getUser()->getId();
        if (!$protocol) {
            throw new NotFoundHttpException("Protocole non trouvée");
        }
        $em->remove($protocol);
        $em->flush();
        return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$id)));

    }

}
