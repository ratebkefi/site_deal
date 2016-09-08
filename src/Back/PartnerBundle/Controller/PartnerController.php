<?php

namespace Back\PartnerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Null;
use User\UserBundle\Entity\User;
use Back\PartnerBundle\Form\PartnerType;
use Back\PartnerBundle\Form\PartneraddType;
use Back\DashBundle\Common\Tools;
use FOS\UserBundle\Event\FormEvent;
use User\UserBundle\Form\UserFilterType;
use Back\DashBundle\Common;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;
use FOS\UserBundle\Model\UserInterface;

class PartnerController extends Controller
{
    public function addAction(Request $request)
    {
        $user1 = $this->get('security.context')->getToken()->getUser();
        $roles = $user1->getRoles();
        if($roles[0]=="ROLE_SUPER_ADMIN")
        {
            $breadcrumbsLible ="Service commercial";
        }
        else
        {
            $breadcrumbsLible ="Partenaires et Contrats";
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($breadcrumbsLible, $this->generateUrl('back_partner'), array());

        $breadcrumbs->addItem("Ajouter un partenaire", "back_partner", array());
        $user = new User();
        $form = $this->createForm(new PartneraddType(array("em" => $this->getDoctrine()->getRepository("BackPlanningBundle:Category"))), $user);
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent"=>null));

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                
                /*ajouter ville et code posle*/
                $cp =  $request->request->get('cpadd');
                $ville =  $request->request->get('ville');
                $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($ville);

                $localiteId = $localite->getId();

                $loca = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($localiteId);

                /*fin ajouter ville et code posle*/
                    $userManager = $this->container->get('fos_user.user_manager');
                    $event = new FormEvent($form, $request);
                    $om = $this->container->get('doctrine.orm.entity_manager');
                    $newpassword = Tools::randomPassword();
                    $user->setPlainPassword($newpassword);
                    $user->setRoles(array('PARTENAIRE' => 'PARTENAIRE'));
                    $user->setEnabled(true);
                    $user->setUsername($user->getEmail());
                    $user->setLocalite($loca);

                $em = $this->getDoctrine()->getManager();
                    $userManager->createUser($user);
                    //Tools::dump($user, true);
                    $om->persist($user);
                    $om->flush();
                    //$em->persist($user);
                    //$em->flush();
					$message = \Swift_Message::newInstance()
                    ->setSubject('BienVenue chez BIGDeal')
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($user->getEmail())
                    //ajout de destinataires cci
                    ->setBcc(array('commercial@bigdeal.tn' => 'Commercial','hotline@bigdeal.tn' => 'Hotline','finance@bigdeal.tn' => 'Finance'))
                    ->setBody($this->renderView('MainFrontBundle:Email:registerPartner.html.twig', array("email" => $user->getEmail(),"nom" => $user->getName(),"password" =>$newpassword)));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);
                    
/*-------------------------------------Notification-----------------------------------------------------------------*/

                $listUserForNotif = Constant\NotifUser::getAjoutProtocole();
                $libelleNotif = "Le commercial  " . $user1 . " a ajouté le nouveau partenaire  " . $user->getName();
                $lient = $this->generateUrl('dash_partner_show', array('id' => $user->getId()));
                $icone = "icon-group";
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
                    
                    return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$user->getId())));
               
            } 
			
        }
        return $this->render('BackPartnerBundle:Partner:add.html.twig', array('form' => $form->createView(),
            'ville' => "",
            'cp' => "",
            'gouvernorat' => $gouvernorat,
            ));
    }

    public function schowAction(User $user)
    {
        $user1 = $this->get('security.context')->getToken()->getUser();
        $roles = $user1->getRoles();
        if($roles[0]=="ROLE_SUPER_ADMIN")
        {
            $breadcrumbsLible ="Service commercial";
        }

        else
        {
            $breadcrumbsLible ="Partenaires et Contrats";

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($breadcrumbsLible, $this->generateUrl('back_partner'), array());
        $breadcrumbs->addItem("Détails partenaire", "show_partner", array());
        $contact = $this->getDoctrine()->getRepository('BackPartnerBundle:ContactPartner')->findBy(array("user" => $user));
        $protocol = $this->getDoctrine()->getRepository('BackContractBundle:Protocol')->findBy(array("user" => $user));
        $pointDeVente = $this->getDoctrine()->getRepository('BackPartnerBundle:SellingPoint')->findBy(array("user" => $user));
        // calcluer les voter
        $vote=$this->getDoctrine()->getRepository('UserUserBundle:Voterpartner')->findBy(array('partner'=>$user));
        $rate=0;
        $i=0;
        $testvoter=0;
        $rateuser=0;
        $current=$this->get('security.context')->getToken()->getUser();
        foreach($vote as $value){
            $rate+=$value->getRate();
            ++$i;
            if($current->getId()==$value->getVoter()->getId()){
                $testvoter=true;
                $rateuser=$value->getRate();
            }
        }
        if($i!=0){
            $rate=($rate/$i);
        }
        return $this->render('BackPartnerBundle:Partner:show.html.twig', array(
            'testvoter'=>$testvoter,
            'rateuser'=>$rateuser,
            'rate'=>$rate,
            'entity' => $user,
            'contact' => $contact,
            'protocol' => $protocol,
            'pointDeVente' => $pointDeVente,));
    }

    public function indexAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        if($roles[0]=="ROLE_SUPER_ADMIN")
        {
            $breadcrumbsLible ="Service commercial";
        }

        else
        {
            $breadcrumbsLible ="Partenaires et Contrats";

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $breadcrumbs->addItem($breadcrumbsLible, "back_partner", array());

        $form = $this->createForm(new UserFilterType(array("em" => $this->getDoctrine()->getRepository("BackPlanningBundle:Category"))));
        $form->bind($request);
        $data = $request->query->get('user_userbundle_filteruser');
        //var_dump($data); exit;

        $data = Tools::dropNull($data);
        $data['roles'] = "PARTENAIRE";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        if (isset($data['region'])) {
            foreach ($partner as $key => $value) {
                $object = $value->getRegion();
                $tab = array();
                foreach ($object as $kk => $vv) {
                    $tab[] = $vv->getId();
                }
                if (!in_array($data['region'], $tab)) {
                    unset ($partner[$key]);
                }
            }
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackPartnerBundle:Partner:index.html.twig', array('form' => $form->createView(), 'entities' => $partner, 'pagination' => $pagination,));
    }
	
	public function motdepasseAction($id)
	{
	 $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);
					$om =  $this->container->get('fos_user.user_manager');
					$newpassword = Tools::randomPassword();
                    $partner->setPlainPassword($newpassword);
					$om->updatePassword($partner);
                       $om->updateUser($partner, true);

					$message = \Swift_Message::newInstance()
                    ->setSubject('BienVenue chez BIGDeal')
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($partner->getEmail())
                    //ajout de destinataires cci
                    ->setBcc(array('commercial@bigdeal.tn' => 'Commercial','hotline@bigdeal.tn' => 'Hotline','finance@bigdeal.tn' => 'Finance'))
                    ->setBody($this->renderView('MainFrontBundle:Email:registerPartner.html.twig', array("email" => $partner->getUserName(),"nom" => $partner->getName(),"password" =>$newpassword)));
                $message->setContentType("text/html");
                $this->get('mailer')->send($message);
			$this->get('session')->getFlashBag()->set('alert-error', 'Mot de passe envoyé au partenaire');

		return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$id)));

	}
	
    public function editAction(Request $request,$id)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        if($roles[0]=="ROLE_SUPER_ADMIN")
        {
            $breadcrumbsLible ="Service commercial";
        }

        else
        {
            $breadcrumbsLible ="Partenaires et Contrats";

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem($breadcrumbsLible, $this->generateUrl('back_partner'), array());

        $breadcrumbs->addItem("Modifier un partenaire", "edit_partner", array());

        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);
        $gouvernorat = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array("parent"=>null));
        if($partner->getLocalite())
        {
            $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($partner->getLocalite());
            $villePart = $localite->getName();
            $cpPart = $localite->getCp();

        }
        else
        {
            $localite = new \stdClass();
            $villePart = null;
            $cpPart = null;


        }
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new PartneraddType(array("em" => $this->getDoctrine()->getRepository("BackPlanningBundle:Category"))), $partner);
		$data = $request->request->get('back_partnerbundle_partner');
        if ('POST' === $request->getMethod()) {
		          $form->bind($request);
		if ($form->isValid()) {
                    $cp =  $request->request->get('cpadd');
                    $ville =  $request->request->get('ville');
                    $localite = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->find($ville);

            $om = $this->container->get('doctrine.orm.entity_manager');
					$partner->setUsername($data['email']);
					$partner->setEmail($data['email']);
                    $partner->setLocalite( $localite);

            $om->persist($partner);
                    $om->flush();
				return $this->redirect($this->generateUrl('dash_partner_show',array('id'=>$id)));
			
			
        }
		
        } 
        return $this->render('BackPartnerBundle:Partner:edit.html.twig', array('form' => $form->createView(),
                'partner' => $partner,

                'ville' => $villePart,
                'gouvernorat' => $gouvernorat,

                'cp' => $cpPart,
                 /*'file' => $file*/)
        );
    }

    public function dealAction()
    {
        $user = $this->get('security.context')->getToken()->getUser()->getId();

        $deal = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->listDeals($user);
        return $this->render('BackPartnerBundle:Partner:deal.html.twig', array('deal' => $deal,));

    }

    public function bookingAction($deal,$month,$year)
    {

       // $idCoupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->findBy(array("deal" => $deal, "recu" => 1, "vendu" => 3));

            $couponReserver = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->findBy(array("deal"=>$deal));
            $disponibilite = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($deal);
                $idDeal = $disponibilite->getId();
                $dateDebutValiditeCoupon = $disponibilite->getStartDateValidtyCoupon()->format('Y-m-d');
                $moiDebutValiditeCoupon = $disponibilite->getStartDateValidtyCoupon()->format('m');
                $dateFinValiditeCoupon = $disponibilite->getEndDateValidtyCoupon()->format('Y-m-d');
                $moiFinValiditeCoupon = $disponibilite->getEndDateValidtyCoupon()->format('m');


            $start = strtotime($dateDebutValiditeCoupon);
            $end = strtotime($dateFinValiditeCoupon);
            for ($count = $moiDebutValiditeCoupon; $count <= $moiFinValiditeCoupon; ++$count) {
                $listMont[] = $count;
            }
            $Horaire = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->horaire($idDeal);
            $daysOfWeek = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
            $numberDays = date('t', $firstDayOfMonth);
            $dateComponents = getdate($firstDayOfMonth);
            $monthName = $dateComponents['month'];
            if($dateComponents['wday']-1>=0)
                $dayOfWeek = $dateComponents['wday']-1;
            else
                $dayOfWeek = 6;

            /*-------------------New------------------*/


            $cMonth = $month;
            $cYear = $year;

            $prev_year = $cYear;
            $next_year = $cYear;
            $prev_month = $cMonth-1;
            $next_month = $cMonth+1;

            if ($prev_month == 0 ) {
                $prev_month = 12;
                $prev_year = $cYear - 1;
            }
            if ($next_month == 13 ) {
                $next_month = 1;
                $next_year = $cYear + 1;
            }

            return $this->render('BackPartnerBundle:Partner:booking.html.twig', array("nom_deal"=>$disponibilite->getTitle(),"next_month"=>$next_month,"next_year"=>$next_year,"prev_month"=>$prev_month,
                "prev_year"=>$prev_year,"couponReserver"=>$couponReserver, "dayOfWeek" => $dayOfWeek,
                "monthName" => $monthName, "numberDays" => $numberDays, "daysOfWeek" => $daysOfWeek, "horaire" => $Horaire,
                "deal" => $idDeal, "month" => $month, "year" => $year));



    }

    public function bookDetailAction($deal,$date)
    {   $dispo = $this->getDoctrine()->getRepository('MainBookingBundle:Booking')->Dispo(Tools::getDay($date), $deal);
        foreach ($dispo as $value) {
            $getOpenTimeMorning = explode(':', $value->getOpenTimeMorning()->format('H:i:s'));
            $getOpenTimeMorning=$getOpenTimeMorning[0];
            $getCloseTimeMorning = explode(':', $value->getCloseTimeMorning()->format('H:i:s'));
            $getCloseTimeMorning=$getCloseTimeMorning[0];
            $getOpenTimeAfternon = explode(':', $value->getOpenTimeAfternoon()->format('H:i:s'));
            $getOpenTimeAfternon=$getOpenTimeAfternon[0];
            $getCloseTimeAfternon = explode(':', $value->getCloseTimeAfternoon()->format('H:i:s'));
            $getCloseTimeAfternon=$getCloseTimeAfternon[0];
        }
        // echo explode(':',$getOpenTimeMorning)[0]."<br><br>";
        for ($count = $getOpenTimeMorning; $count <= $getCloseTimeMorning; ++$count) {
            $morning[] = $count;
        }
        for ($count = $getOpenTimeAfternon; $count <= $getCloseTimeAfternon; ++$count) {
            $afternon[] = $count;
        }
        return $this->render('BackPartnerBundle:Partner:bookDetail.html.twig',array('deal'=>$deal,'date'=>$date, "morning" => $morning, "afternon" => $afternon));

    }

    public function printAction($deal)
    {
        // générer un mail pour le client final avec validation de génération de coupon
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = PartnerController::printB($deal,$pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }
    
    public function printrapportdealAction($deal)
    {
        // générer un mail pour le client final avec validation de génération de coupon
        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf = PartnerController::printrapportdeal($deal,$pdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function printB($deal, $pdf)
    {
        $dealSelectionner = $this->getDoctrine()
        ->getRepository('BackDealBundle:Deal')
        ->find($deal);

        $booking = $this->getDoctrine()
            ->getRepository('BackPartnerBundle:Invoice')
            ->ListeDate($deal);

        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('');
        $pdf->SetTitle('Imprimmer::Rapport réservation');
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
        $html = $this->renderView('BackPartnerBundle:Partner:pdf.html.twig', array(
            'deal' => $deal, 'booking' => $booking,'titre'=>$dealSelectionner->getTitle()));

        $pdf->writeHTML($html);
        //$pdf->Output('/pnv.pdf', 'F');
        $nompdf = 'rapport_reservations.pdf';
        $pdf->Output($nompdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function printrapportdeal($deal, $pdf)
    {
        $dealSelectionner = $this->getDoctrine()
        ->getRepository('BackDealBundle:Deal')
        ->find($deal);

         $query = $this->getDoctrine()->getEntityManager()
            ->createQuery("select cmd  from
                            Back\CommandeBundle\Entity\Coupon as coupon ,
                            Back\CommandeBundle\Entity\Command as cmd
                            where  coupon.command=cmd.id
                            and coupon.vendu in(2,3)
                            and cmd.deal =  '" . $deal . "'

                            ");

        $command = $query->getResult();

        $pdf = $this->get('white_october.tcpdf')->create();
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('BIGDeal');
        $pdf->SetTitle('Imprimmer::Rapport Deal');
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
        $html = $this->renderView('BackPartnerBundle:Partner:pdfdeal.html.twig', array(
            'deal' => $deal, 'command' => $command,'titre'=>$dealSelectionner->getTitle()));

        $pdf->writeHTML($html);
        //$pdf->Output('/pnv.pdf', 'F');
        $nompdf = 'rapport_reservations.pdf';
        $pdf->Output($nompdf);
        return new \Symfony\Component\BrowserKit\Response($pdf->Output($nompdf));
    }

    public function InvoiceAction()
    {
        $data =array();
        $data['user'] = $this->get('security.context')->getToken()->getUser()->getId();
        $data['etat'] = 2;
        $request = $this->get('request');

        $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListInv($data);
        $invoice = array_reverse($invoice);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $invoice,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Mes factures", $this->generateUrl("dash_partner_invoice"), array());

        return $this->render('BackPartnerBundle:Partner:invoice.html.twig', array('entities' => $invoice,
            'pagination' => $pagination));
    }
}
