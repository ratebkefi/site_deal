<?php

namespace Back\ContractBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\ContractBundle\Entity\Annexe;
use Back\ContractBundle\Form\AnnexeType;
use Symfony\Component\HttpFoundation\Request;
use Back\PlanningBundle\Entity\ResponseRequiredInfo;
use Back\DashBundle\Common\Tools;
use Symfony\Component\HttpFoundation\JsonResponse;
use User\UserBundle\Entity\User;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;

class AnnexeController extends Controller
{
public function printP($id, $protocol_id, $pdf)
    {
        // test partenaire
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $user = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($protocol->getUser());
        $annexe = $this->getDoctrine()
            ->getRepository('BackContractBundle:Annexe')
            ->find($id);
        $reference = $this->getDoctrine()
            ->getRepository('BackContractBundle:Reference')
            ->findBy(array("annexe" => $id));
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        $pdf->SetTitle('Imprimmer::Annexe au Protocole D’accord ');
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
        $html = $this->renderView('BackContractBundle:Annexe:pdfpar.html.twig', array(
            'protocol' => $protocol, 'annexe' => $annexe, 'reference' => $reference, 'user' => $user));

        $pdf->writeHTML($html);
        //$pdf->Output('/pnv.pdf', 'F');
        $nompdf = 'protocole_accord_annexe.pdf';
        $pdf->Output($nompdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }
    public function printA($id, $protocol_id, $pdf)
    {
        // test partenaire
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $user = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($protocol->getUser());
        $annexe = $this->getDoctrine()
            ->getRepository('BackContractBundle:Annexe')
            ->find($id);
        $reference = $this->getDoctrine()
            ->getRepository('BackContractBundle:Reference')
            ->findBy(array("annexe" => $id));
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        $pdf->SetTitle('Imprimmer::Annexe au Protocole D’accord ');
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
        $html = $this->renderView('BackContractBundle:Annexe:pdf.html.twig', array(
            'protocol' => $protocol, 'annexe' => $annexe, 'reference' => $reference, 'user' => $user));
        $pdf->writeHTML($html);
        //$pdf->Output('/pnv.pdf', 'F');
        $nompdf = 'protocole_accord_annexe.pdf';
        $pdf->Output($nompdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }
public function printpartAction($protocol_id, $id)
    {
        // générer un mail pour le client final avec validation de génération de coupon
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = AnnexeController::printP($id, $protocol_id, $pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }
    public function printAction($id,$protocol_id)
    {
        // générer un mail pour le client final avec validation de génération de coupon
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = AnnexeController::printA($id, $protocol_id, $pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function indexAction($protocol_id)
    {
        $request = $this->getRequest();
        $annexe = $this->getDoctrine()
            ->getRepository('BackContractBundle:Annexe')
            ->findBy(array('protocol' => $protocol_id));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $annexe, $request->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des annexes", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Annexe:index.html.twig', array(
            'entities' => $annexe,
            'pagination' => $pagination,
            'protocol_id' => $protocol_id
        ));
    }

    public function showAction($protocol_id, Annexe $annexe, User $partner)
    {
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem( $partner->getName(), $this->generateUrl("dash_partner_show", array('id' => $partner->getId())));
        //$breadcrumbs->addItem("protocole : " . $protocol->getUser(), $this->generateUrl("dash_protocol_show", array("id" => $protocol_id)), array());

        $breadcrumbs->addItem("Détails annexe", "add_protocol_manager", array());
        $reference = $this->getDoctrine()->getRepository('BackContractBundle:Reference')->findBy(array("annexe" => $annexe));

        return $this->render('BackContractBundle:Annexe:show.html.twig', array(
            'entity' => $annexe,
            'reference' => $reference,
            'partner' => $partner->getId(),
            'protocol_id' => $protocol_id));
    }

    public function addAction($protocol_id)
    {
        $annexe = new Annexe();
        $form = $this->createForm(new AnnexeType(), $annexe);

        $region = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Region')
            ->findAll();
        $categorie = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Category')
            ->findBy(array("parent" => null));
        $user = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $partnerId = $user->getUser();

        $user = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partnerId);
        $catId = $user->getCategory()->getId();

        $question = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:requiredInfo')
            ->findBy(array("categoryId" => $catId));

        $lesReponse = "";
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            //echo "<pre>";print_r($page);exit;
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $annexe->setAgent($this->get('security.context')->getToken()->getUser());

                $em->persist($annexe);
                $em->flush();
                
/*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getAjoutProtocole();
                $libelleNotif = "Le commercial  " . $annexe->getAgent() . " a ajouté une annexe " . $annexe->getObject() . " au partenaire " .$annexe->getProtocol()->getUser()->getName(). " à la date " . $annexe->getReleaseDate()->format('d-m-Y');
                $lient = $this->generateUrl('dash_partner_show', array('id' => $annexe->getProtocol()->getUser()->getId()));
                $icone = "icon-edit";
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
                
/*-------------------------------------Fin Notification-----------------------------------------------------------------*/

                if($annexe->getPlanning()!=null)
                {
/*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getAjoutProtocole();
                $libelleNotif = "Le commercial  " . $annexe->getAgent() . " a lié l'annexe " . $annexe->getObject() . " au planning " .$annexe->getPlanning()->getObject();
                $lient = $this->generateUrl('dash_annexe_show', array('protocol_id' => $annexe->getProtocol(),'id'=>$annexe->getId(),'partner'=>$annexe->getProtocol()->getUser()->getId()));
                $icone = "icon-random";
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
                
/*-------------------------------------Fin Notification-----------------------------------------------------------------*/
 
                }
                $tab = array();
                $tab[] = $annexe;
                $releaseDate = $request->request->get('releaseDate');
                $variableCommission = $request->request->get('variableCommission');

                if (is_array($releaseDate)) {
                    foreach ($releaseDate as $key => $value) {

                        $newannex2 = new Annexe();
                        $newannex2->setReleaseDate(Tools::reformatDate($value));
                        $newannex2->setVariableCommission($variableCommission[$key]);
                        $newannex2->setAgent($annexe->getAgent());

                        $newannex2->setBooking($annexe->getBooking());
                        $newannex2->setFixedCommission($annexe->getFixedCommission());
                        $newannex2->setMinCoupon($annexe->getMinCoupon());
                        $newannex2->setNbrGratuite($annexe->getNbrGratuite());
                        $newannex2->setObject($annexe->getObject());
                        $newannex2->setPlanning(null);
                        $newannex2->setProtocol($annexe->getProtocol());
                        $newannex2->setQuota($annexe->getQuota());
                        $newannex2->setRemark($annexe->getRemark());

                        $em->persist($newannex2);
                        $em->flush();
                        
/*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getAjoutProtocole();
                $libelleNotif = "Le commercial  " . $newannex2->getAgent() . " a ajouté une annexe " . $newannex2->getObject() . " au partenaire " .$newannex2->getProtocol()->getUser()->getName(). " à la date " . $newannex2->getReleaseDate()->format('d-m-Y');
                $lient = $this->generateUrl('dash_partner_show', array('id' => $annexe->getProtocol()->getUser()->getId()));
                $icone = "icon-edit";
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
                
/*-------------------------------------Fin Notification-----------------------------------------------------------------*/
                        $tab[] = $newannex2;
                    }
                } else {

                }
                //echo count($tab);exit;
                foreach ($tab as $value) {

                    foreach ($question as $questions) {
                        $reponse = new ResponseRequiredInfo();
                        $valeur = 'reponse_' . $questions->getId();
                        $reponse->setAnnexe($value);
                        $requiredinfo = $this->getDoctrine()->getRepository('BackPlanningBundle:requiredInfo')->find($questions->getId());
                        $reponse->setRequiredInfoId($requiredinfo);
                        $reponse->setResponse($request->request->get('' . $valeur . ''));
                        $em->persist($reponse);
                        $em->flush();
                    }
                }

                return $this->redirect($this->generateUrl('dash_partner_show', array('id' => $partnerId->getId())));
            } else {
                //echo $form->getErrors();
            }
        }
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem( $partnerId->getName(), $this->generateUrl("dash_partner_show", array('id' => $partnerId->getId())));
        //$breadcrumbs->addItem("Gestions des annexes", $this->generateUrl("back_annexe_homepage", array("protocol_id" => $protocol_id)), array());
        $breadcrumbs->addItem("Ajouter annexe", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Annexe:new.html.twig', array('form' => $form->createView(),
            'category' => $categorie,
            'region' => $region,
            'protocol_id' => $protocol_id,
            'question' => $question,
            'partner' => $partnerId->getId(),
            'listereponse' => $lesReponse));
    }

    public function GetPlanningAction()
    {
        $request = $this->get('request');
        $regionId = $request->request->get('region');
        $categorieId = $request->request->get('categorie');
        $arrPlanning = array();
        $data = array();
        $data['state'] = 0;
        if ($regionId != "") {

            $data['regionId'] = $regionId;
        }
        if ($categorieId != "") {

            $data['categoryId'] = $categorieId;
        }
        $planning = $this->getDoctrine()->getRepository('BackPlanningBundle:Planning')->findby($data);
        foreach ($planning as $value) {
            $arrPlanning[] = array("id" => $value->getId(),
                "name" => $value->getObject() ." ".$value->getStartDate()->format('d-m-Y')
            );

        }

        return new JsonResponse($arrPlanning);
    }

    public function editAction($protocol_id, $id, User $partner, Request $request)
    {
        $request = $this->get('request');
        $region = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Region')
            ->findAll();
        $categorie = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:Category')
            ->findAll();
        $annexe = $this->getDoctrine()
            ->getRepository('BackContractBundle:Annexe')
            ->find($id);
        $protocolId = $annexe->getProtocol();


        $user = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocolId);
        $partnerId = $user->getUser();

        $user = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($partnerId);
        $catId = $user->getCategory();

        $question = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:requiredInfo')
            ->findBy(array("categoryId" => $catId));
        $lesReponse = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:ResponseRequiredInfo')
            ->findBy(array("annexe" => $id));

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new AnnexeType(), $annexe);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {

            if ($form->isValid()) {


                $em->flush();
                $reponseInfo = $this->getDoctrine()
                    ->getRepository('BackPlanningBundle:ResponseRequiredInfo')
                    ->findBy(array("annexe" => $id));
                foreach ($reponseInfo as $val) {
                    $em->remove($val);
                    $em->flush();
                }


                foreach ($question as $questions) {
                    $reponse = new ResponseRequiredInfo();
                    $valeur = 'reponse_' . $questions->getId();
                    $reponse->setAnnexe($annexe);
                    $reponse->setRequiredInfoId($this->getDoctrine()
                        ->getRepository('BackPlanningBundle:requiredInfo')
                        ->find($questions->getId()));
                    $reponse->setResponse($request->request->get('' . $valeur . ''));
                    $em->persist($reponse);
                    $em->flush();
                }
                $this->get('session')->getFlashBag()->set('alert-success', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl("dash_partner_show", array('id' => $partner->getId())));
            } else {
                $this->get('session')->getFlashBag()->set('alert-error', 'L\'élément n\'a pas été enregistré veuillez vérifier les données saisies!');
                return $this->redirect($this->generateUrl("dash_partner_show", array('id' => $partner->getId())));
            }
        }
        $protocol = $this->getDoctrine()
            ->getRepository('BackContractBundle:Protocol')
            ->find($protocol_id);
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem( $partner->getName(), $this->generateUrl("dash_partner_show", array('id' => $partner->getId())));
        $breadcrumbs->addItem("Modifier annexe", "add_protocol_manager", array());
        return $this->render('BackContractBundle:Annexe:new.html.twig', array(
                'id' => $id, 'form' => $form->createView(),
                'category' => $categorie,
                'region' => $region,
                'partner' => $partner->getId(),
                'id' => $id, 'protocol_id' => $protocol_id, 'question' => $question, 'listereponse' => $lesReponse)
        );
    }

    public function ReponseAction($id, $question)
    {

        $lesReponse = $this->getDoctrine()
            ->getRepository('BackPlanningBundle:ResponseRequiredInfo')
            ->findBy(array("annexe" => $id, "requiredInfoId" => $question));

        return $this->render('BackContractBundle:Annexe:reponse.html.twig', array('entities' => $lesReponse, 'id_question' => $question));

    }

    public function deleteAction($protocol_id, Annexe $annexe, User $partner)
    {
        $em = $this->getDoctrine()->getManager();

        if (!$annexe) {
            throw new NotFoundHttpException("Annexe non trouvée");
        }
        $em->remove($annexe);
        $em->flush();
        return $this->redirect($this->generateUrl("dash_partner_show", array('id' => $partner->getId())));
    }

    public function partannexAction(Request $request)
    {
        //Tools::dump($request->request,true);
        $partid = $request->request->get('partid');
        $planningid = $request->request->get('planningid');
        $planning = $this->getDoctrine()->getRepository('BackPlanningBundle:Planning')->find($planningid);

        //$annex = $this->getDoctrine()->getRepository("BackContractBundle:Annexe")->findAll();
        $annex = $planning->getAnnexe();
        foreach ($annex as $key => $value) {

            if ($value->getProtocol()->getUser()->getId() != $partid) {
                unset($annex[$key]);
            }
            /*if (count($value->getReference()) == 0) {
                unset($annex[$key]);
            }*/

        }

        return $this->render('BackContractBundle:Annexe:listoption.html.twig', array('entities' => $annex));
    }

}
