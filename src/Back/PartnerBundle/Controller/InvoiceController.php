<?php

namespace Back\PartnerBundle\Controller;

use Back\DashBundle\Common\Tools;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\PartnerBundle\Entity\Invoice;
use Back\CommandeBundle\Entity\Coupon;
use Back\PartnerBundle\Form\InvoiceFilterType;
use Back\CommandeBundle\Common\nuts;
use Back\PartnerBundle\Form\InvoiceType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Null;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;


class InvoiceController extends Controller
{
    public function printP($id, $pdf)
    {
        // test partenaire
        $invoice = $this->getDoctrine()
        ->getRepository('BackPartnerBundle:Invoice')
        ->find($id);
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Imprimer::Facture ');
        $pdf->SetTitle('');
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
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 9, '', true);
        $pdf->AddPage();
        $totalHt = ($invoice->getComFixe() + $invoice->getComVariable()) * 0.18 + $invoice->getComFixe() + $invoice->getComVariable() + 0.5;
        $totalttc = $invoice->getComFixe() + $invoice->getComVariable() + 0.5;
        $obj = new nuts($totalttc, "TND");

        $text = $obj->convert("fr-FR");
        $nb = $obj->getFormated(" ", ",");
        $entreprise = $invoice->getDeal()->getPlanning()->getDefaultannexe()->getProtocol()->getEntreprise();

        $PrixReference = $invoice->getDeal()->getPlanning()->getDefaultannexe()->getReference();
        $minPrice = 900000;
        foreach($PrixReference as $val)
        {
            if($minPrice > $val->getBigdealPrice())
                $minPrice = $val->getBigdealPrice();
        }


        $html = $this->renderView('BackPartnerBundle:Invoice:pdf.html.twig', array(
            'invoice' => $invoice,
            'entreprise' => $entreprise,
            'totalHt' => $totalHt,
            'text' => $text));
        //echo $html;exit;
        $pdf->writeHTML($html);
        // deuxième page annexe de facture
        $pdf->AddPage();
        $nbcoupon = 0;
        $commande = null;
        $couponrecu = 0;
        $coupongratuit = 0;
        $couponrenbourse = 0;
        $couponententerenbourse = 0;
        $strprice = "";
        $tabref = array();
        $deal=null;
        $tabrefprice = array();
        foreach ($invoice->getCoupon() as $value) {
            if ( $value->getRecu() == 2) {
                ++$couponrecu;
            }
            if ($value->getVendu() == 5) {
                ++$couponrenbourse;
            }
            if ($value->getVendu() == 4) {
                ++$couponententerenbourse;
            }
            $commande = $value->getCommand();
            $deal=$commande->getDeal();
            $refrence = $commande->getReference();
            $annexe = $refrence->getAnnexe();
            $coupongratuit = $annexe->getNbrGratuite();
            ++$nbcoupon;

            if (!isset($tabref[$refrence->getId()])) {
                $tabref[$refrence->getId()] = 0;
                $tabrefprice[$refrence->getId()] = $refrence->getBigdealPrice();
            }
            $tabref[$refrence->getId()] = $tabref[$refrence->getId()] + 1;

        }
        // test nb facture
        $facture = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDeuiemeFacture($deal->getId());
        $fact = $facture[0]['nbr'];
        // get id de la premiere facture
        $firstFacture = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->MinIdFacture($deal->getId());
        
        $currentFacture = $id;
        if($fact>1 and $currentFacture>$firstFacture){
           /* if()
           {*/
            $coupongratuit=0;
            /*}
            else
            {
                $coupongratuit = $invoice->getDeal()->getPlanning()->getdefaultannexe()->getNbrGratuite();
            }*/
            
        }
        else
        {
            $coupongratuit = $invoice->getDeal()->getPlanning()
            ->getdefaultannexe()->getNbrGratuite();
        }
        $k=0;
        $oldval=0;
        $i = 0;
        foreach ($tabrefprice as $key => $value) {
            if($i==0){
                $k=$key;
                $oldval=$value;
            }
            else{
                if($oldval>$value){
                    $k=$key;
                    $oldval=$value;
                }
            }
            ++$i;
        }
        $tabref[$k] = $tabref[$k] - $coupongratuit;
        //Tools::dump($tabref,true);
        $chiffredaffaire=0;
        foreach ($tabref as $key => $value) {
            $strprice .= " ($value * " . $tabrefprice[$key] . ") + " ;
            $chiffredaffaire +=$value * $tabrefprice[$key];
        }
        $strprice = substr($strprice,0 ,-2);
        // commission
        $fixedCommission=$annexe->getFixedCommission();
        if($fact>1){
            $fixedCommission=0;
        }
        $variableCommission=$annexe->getVariableCommission();
        $commissionttc=$fixedCommission+($chiffredaffaire*$variableCommission/100);

        $html2 = $this->renderView('BackPartnerBundle:Invoice:pdfannex.html.twig', array(
            'invoice' => $invoice,
            'nbcoupon' => $nbcoupon,
            'couponrecu' => $couponrecu,
            'coupongratuit' => $coupongratuit,
            'couponrenbourse' => $couponrenbourse,
            'couponententerenbourse' => $couponententerenbourse,
            'strprice' => $strprice,
            'chiffredaffaire' => $chiffredaffaire,
            'fixedCommission' => $fixedCommission,
            'variableCommission' => $variableCommission,
            'commissionttc' => $commissionttc,
            'minPrice' => $minPrice,

            ));
        $pdf->writeHTML($html2);
//echo $text; exit;
        //{{ tva + invoice.comFixe + invoice.comVariable + 0.5 }}
        //$pdf->Output('/pnv.pdf', 'F');
        $nompdf = 'facture.pdf';
        $pdf->Output($nompdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function printAction($id)
    {
        // générer un mail pour le client final avec validation de génération de coupon
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = InvoiceController::printP($id, $pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function indexAction()
    {
        $request = $this->get('request');
        $form = $this->createForm(new InvoiceFilterType());
        $data = $request->query->get('back_partnerbundle_invoicefilter');
        //Tools::dump($data,true);
        $data = Tools::dropNull($data);
        $form->bind($request);
        $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListInv($data);
        $invoice = array_reverse($invoice);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $invoice,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
            );
        if (isset($data['coupon'])) {
            $coupon = $data['coupon'];
        } else
        $coupon = "";
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des factures", $this->generateUrl("back_invoice"), array());

        return $this->render('BackPartnerBundle:Invoice:index.html.twig', array('entities' => $invoice, 'coupon' => $coupon,
            'pagination' => $pagination, 'form' => $form->createView()));
    }

    public function addAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $invoice = new Invoice($user);
        $form = $this->createForm(new InvoiceType(), $invoice);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $numfacture = $request->request->get('numfacture');
            $dateDcr = new \DateTime();
            $form->bind($request);
            $ca = $request->request->get('ca');
            $com_variable = $request->request->get('com_variable');
            $com_fixe = $request->request->get('com_fixe');
            $coupon = $request->request->get('coupon');
            $data = $request->request->get('back_partnerbundle_invoice');
            //var_dump($data); exit;
            $leDeal = $this->getDoctrine()
            ->getRepository('BackDealBundle:Deal')
            ->find($data['deal']);
            $PrixReference = $leDeal->getPlanning()->getDefaultannexe()->getReference();
            $facture = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDeuiemeFacture($leDeal->getId());
            $fact = $facture[0]['nbr'];
            if($fact>0){
                $nbrGratuit=0;
            }
            else
            {
                $nbrGratuit = $leDeal->getPlanning()->getDefaultannexe()->getNbrGratuite();

            }

            $minPrice = 900000;
            foreach($PrixReference as $val)
            {
                if($minPrice > $val->getBigdealPrice())
                    $minPrice = $val->getBigdealPrice();
            }
            $virement = $ca - ($com_variable + $com_fixe + $nbrGratuit * $minPrice);
            if ($virement > 0) {

                $em = $this->getDoctrine()->getManager();
                $invoice->setDcr($dateDcr);
                $invoice->setComFixe($com_fixe);
                $invoice->setComVariable($com_variable);
                $invoice->setCa($ca - $nbrGratuit * $minPrice);
                $invoice->setVirement($virement);
                if ($data["etat"] == 2) {
                    $invoice->upload();
                } else {
                    $invoice->setPath(Null);
                    $invoice->setDvir(Null);
                }
                $em->persist($invoice);
                $em->flush();

                foreach ($coupon as $value) {
                    $LeCoupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($value);
                    //$LeCoupon = $invoice->getCoupon($coupon[$count])->setInvoice($invoiceId);
                    $LeCoupon->setInvoice($invoice);
                    $LeCoupon->setRecu(3);
                    $em->persist($LeCoupon);
                    $em->flush();
                }
                /*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getCreateFacture2();
                $libelleNotif = "Le financier  " . $invoice->getAgent()->getName() . " a généré une facture au partenaire " . $invoice->getUser()->getName();
                $lient = $this->generateUrl('dash_invoice_show', array('id' => $invoice->getId()));
                $icone = "icon-tags";
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
                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl('back_invoice'));
            } else {

                $this->get('session')->getFlashBag()->set('alert-error', 'Problème de génération de facture. Vous ne pouvez pas faire un virement de ' . $virement . ' TND');
                return $this->redirect($this->generateUrl('back_invoice'));

            }


        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des facture", $this->generateUrl("back_invoice"), array());
        $breadcrumbs->addItem("Ajouter factures", $this->generateUrl("back_invoice"), array());
        return $this->render('BackPartnerBundle:Invoice:edit.html.twig', array('form' => $form->createView(), "invoice" => $invoice));
    }

    public function editAction($id)
    {
        $dateDcr = new \DateTime();

        $request = $this->get('request');
        $invoice = $this->getDoctrine()
        ->getRepository('BackPartnerBundle:Invoice')
        ->find($id);
        $coupon = $this->getDoctrine()
        ->getRepository('BackCommandeBundle:Coupon')
        ->findBy(array("invoice" => $id));
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getCommition($invoice->getDeal()->getId());
        $leDeal = $this->getDoctrine()
        ->getRepository('BackDealBundle:Deal')
        ->find($invoice->getDeal()->getId());
        $PrixReference = $leDeal->getPlanning()->getDefaultannexe()->getReference();
        $nbrGratuit = $leDeal->getPlanning()->getDefaultannexe()->getNbrGratuite();
        $minPrice = 900000;
        foreach($PrixReference as $val)
        {
            if($minPrice > $val->getBigdealPrice())
                $minPrice = $val->getBigdealPrice();
        }

        foreach ($deal as $value) {
            $commVariable = $value["variableCommission"];
        }

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new InvoiceType(), $invoice);
        $form->handleRequest($request);
        $numfacture = $request->request->get('numfacture');
        $ca = $request->request->get('ca');
        $com_variable = $request->request->get('com_variable');
        $com_fixe = $request->request->get('com_fixe');
        $requestCoupon = $request->request->get('coupon');
        $virement = $ca - ($com_variable + $com_fixe);
        $data = $request->request->get('back_partnerbundle_invoice');

        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {
                if ($virement > 0) {
                    $em = $this->getDoctrine()->getManager();
                    //$invoice->setNumfacture($numfacture);
                    //$invoice->setDcr($dateDcr);

                    $invoice->setComFixe($com_fixe);
                    $invoice->setComVariable($com_variable);
                    $invoice->setCa($ca);
                    $invoice->setVirement($virement);
                    if ($data["etat"] == 2) {
                        $invoice->upload();
                    } else {
                        $invoice->setPath(Null);
                        $invoice->setDvir(Null);
                    }
                    $em->persist($invoice);
                    $em->flush();


                    $Etat0Coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->findBy(array('invoice' => $id));
                    foreach ($Etat0Coupon as $value) {
                        $value->setInvoice(null);
                        $value->setRecu(2);
                        $em->persist($value);
                        $em->flush();
                    }

                    foreach ($requestCoupon as $value) {
                        $LeCoupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($value);
                        $LeCoupon->setInvoice($invoice);
                        $LeCoupon->setRecu(3);
                        $em->persist($LeCoupon);
                        $em->flush();
                    }
                    $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
                    return $this->redirect($this->generateUrl('back_invoice'));
                } else {
                    $this->get('session')->getFlashBag()->set('alert-error', 'Problème de génération de facture. Vous ne pouvez pas faire un virement de ' . $virement . ' TND');
                    return $this->redirect($this->generateUrl('back_invoice'));

                }

            } else {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl('back_invoice'));

            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des facture", $this->generateUrl("back_invoice"), array());
        $breadcrumbs->addItem("Modifier facture", $this->generateUrl("back_invoice"), array());
        return $this->render('BackPartnerBundle:Invoice:edit.html.twig', array('form' => $form->createView(), "minprice" => $minPrice, "nbrgratuit" => $nbrGratuit, "entity" => $invoice, 'id' => $id, 'coupon' => $coupon, 'commVariable' => $commVariable));
    }

    public function showAction($id)
    {
        $request = $this->get('request');
        $invoice = $this->getDoctrine()
        ->getRepository('BackPartnerBundle:Invoice')
        ->find($id);
        $coupon = $this->getDoctrine()
        ->getRepository('BackCommandeBundle:Coupon')
        ->findBy(array("invoice" => $id));
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getCommition($invoice->getDeal()->getId());
        foreach ($deal as $value) {
            $commVariable = $value["variableCommission"];
        }

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new InvoiceType(), $invoice);
        $form->handleRequest($request);
        $ca = $request->request->get('ca');
        $com_variable = $request->request->get('com_variable');
        $com_fixe = $request->request->get('com_fixe');
        $requestCoupon = $request->request->get('coupon');
        $virement = $ca - ($com_variable + $com_fixe);


        return $this->render('BackPartnerBundle:Invoice:show.html.twig', array('form' => $form->createView(), "entity" => $invoice, 'id' => $id, 'coupon' => $coupon, 'commVariable' => $commVariable));
    }


}
