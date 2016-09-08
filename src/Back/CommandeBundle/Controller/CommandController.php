<?php

namespace Back\CommandeBundle\Controller;

use Back\CommandeBundle\Entity\Client;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\CommandeBundle\Entity\Command;
use Back\CommandeBundle\Common\PrintCoupon;
use Back\CommandeBundle\Form\CommandType;
use Back\CommandeBundle\Form\SuiviCommandFilterType;
use Back\CommandeBundle\Form\PayeType;
use Back\CommandeBundle\Entity\Coupon;
use Back\CommandeBundle\Entity\Caisse;
use Back\CommandeBundle\Entity\Operation;
use Back\DashBundle\Common\Tools;
use Back\DashBundle\Entity\BigFidHistorique;
use Symfony\Component\Validator\Constraints\Null;
use Back\CommandeBundle\Form\CommandFilterType;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;

class CommandController extends Controller
{
    public function annulercmdAction(Command $command){
        $em = $this->getDoctrine()->getManager();
        $coupon=$command->getCoupon();
        foreach($coupon as $value){
            $value->setVendu(1);
            $em->persist($value);
            $em->flush();
        }

        foreach($command->getOperation() as $value){
            $em->remove($value);
            $em->flush();
        }
        $command->setEtat(3);
        $em->persist($command);
        $em->flush();






        return $this->redirect($this->generateUrl('back_commande'));


    }

    public function suiviCommandeAction()
    {

	    $request = $this->get('request');
        $typeClient = $request->query->get("type_client");
        $export = $request->query->get("export");

		//$data['deal'] = null;
        $data = $request->query->get('back_commandebundle_commandfilter');
        $data = Tools::dropNull($data);
        $commande = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Command')
            ->getListSuiviCmd($data, $typeClient);


        if (isset($export)) {
		
		$response = new StreamedResponse();
            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');
                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Date creation.', 'Deal', 'Reference', 'Total commande', 'Client', 'Type client', 'Tel', 'Quantite', 'Payer a', 'Status'), ';');
                // Query data from database
                $request = $this->get('request');
                // $deal = $request->request->get('deal');
                $data = $request->query->get('back_commandebundle_commandfilter');
                $data = Tools::dropNull($data);
				$typeClient = $request->query->get("type_client");
                $results = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Command')
            ->getListSuiviCmd($data, $typeClient);
                // Add the data queried from database
                foreach ($results as $key => $row) {
                    $coupon = $this->getDoctrine()
                        ->getRepository('BackCommandeBundle:Coupon')
                        ->findBy(array('command'=>$row->getId()));
                    $nombreCommandeClient   = $this->getDoctrine()
                        ->getRepository('BackCommandeBundle:Command')
                        ->nombreCommandeParClient($row->getClient()->getId());
                            foreach($coupon as $value)
                            {
                                $total = $value->getPrice() . " DT";
                                $client = $value->getClient();
                            }
							  if ($nombreCommandeClient <= 1 )
                                                        $etatClient ='Nouveaux client';
                                                     elseif ($nombreCommandeClient > 1  and $nombreCommandeClient <= 3 )
														$etatClient ='Ancien Client';
														elseif  ($nombreCommandeClient > 3 )
														$etatClient ='Client fidéle';

							if($row->getEtat()==1)
								$etat = "Payé";
							if($row->getEtat()==0)
								$etat = " En attente ";	
							fputcsv($handle, array(
                                $row->getDcr()->format('d/m/Y H:i:s'),
                                utf8_decode($row->getDeal()),
                                utf8_decode($row->getReference()->getTitle()),
                                $total,
                                utf8_decode($client),
                                utf8_decode($etatClient),
                                $row->getClient()->getPhone(),
                                $row->getQte(),
                                utf8_decode($row->getCaisse()),
                                utf8_decode($etat),
                            ), ';');
                }

                fclose($handle);
            });
            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
			
        }

        
 $form = $this->createForm(new SuiviCommandFilterType());
        $form->bind($request);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commande, $request->query->get('page', 1)/* page number */, 25/* limit per page */
        );
		if(isset($data['deal']))
		{
			$leDeal = $data['deal'];
		}
		else
		{
			$leDeal = null;
		}
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des commandes", $this->generateUrl("back_commande"), array());
        return $this->render('BackCommandeBundle:Command:suiviCommande.html.twig', array('entities' => $commande,
            'pagination' => $pagination,
            'type_client' => $typeClient,
            'deal_encour' => $leDeal,
            'form' => $form->createView()));
    }

    public function indexAction($page,Request $request)
    {

      if ($page < 1) {
            throw $this->createNotFoundException("La pages ".$page." n'existe pas.");
        }
        // Ici je fixe le nombre d'annonces par page à 3
        // Mais bien sûr il faudrait utiliser un paramètre, et y accéder via $this->container->getParameter('nb_per_page')
        $nbPerPage = 15;


        /*
        * filtre de recheche
        */
           $request->get('request');
         $form = $this->createForm(new CommandFilterType());
         $form->bind($request);
         $data = $request->query->get('back_commandebundle_commandfilter');
         $data = Tools::dropNull($data);
         //Tools::dump($data,true); exit;
         // On récupère notre objet Paginator



        $countcmd = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getCountCommande($data);

        $val=intval($countcmd[1]);

        if($val==0)
        {
            $nbPages=1;
        }
        else
        {
            // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
            $nbPages = ceil(intval($countcmd[1])/$nbPerPage);
        }



        // Si la page n'existe pas, on retourne une 404
        /* if ($page > $nbPages) {
             throw $this->createNotFoundException("La page ".$page." n'existe pas.");
         }*/
        if ($page > $nbPages) {
            $page=1;
        }

         $paginator = $this->getDoctrine()
             ->getRepository('BackCommandeBundle:Command')
             ->getListCmd($data,$page, $nbPerPage);



         $breadcrumbs = $this->get("white_october_breadcrumbs");
         $breadcrumbs->addItem("Gestions des commandes", $this->generateUrl("back_commande"), array());
         return $this->render('BackCommandeBundle:Command:index.html.twig', array(
             'pagination' => $paginator,
             'nbPages'     => $nbPages,
             'page'        => $page,
             'form' => $form->createView()));


    }

    public function commandelivraisonAction(Request $request)
    {

        /*
         * filtre de recheche
         */
        $request->get('request');
        $form = $this->createForm(new CommandFilterType());
        $form->bind($request);
        $data = $request->query->get('back_commandebundle_commandfilter');
        $data = Tools::dropNull($data);

        //Tools::dump($data,true); exit;
        $commande = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Command')
            ->getListLivrCmd($data);

        /*exit;
        $commande = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Command')
            ->findBy(array(), array('id' => 'DESC'));*/
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commande, $request->query->get('page', 1)/* page number */, 25/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des commandes de livraison", $this->generateUrl("back_commande"), array());
        return $this->render('BackCommandeBundle:Client:listlivraiosn.html.twig', array('entities' => $commande,
            'pagination' => $pagination,
            'form' => $form->createView()));
    }


    public function apiurlAction($id)
    {

        /*
         * filtre de recheche
         */

        var_dump("no");
        exit;

    }

    public function countcmdAction()
    {

        /*
         * filtre de recheche
         */

        $countcmd = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getCountCommandeLivr();
        $val=intval($countcmd[1]);

        $response = new JsonResponse();

        return $response->setData(array('count' => $val));




    }





    public function addAction(Client $client)
    {
        $commande = new Command();
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->findAll();
        $form = $this->createForm(new CommandType($client->getId()), $commande);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $tb = $request->request->get('back_commandebundle_command');
            $qte = $tb['qte'];
            $idref = $tb['reference'];
            $reference = $this->getDoctrine()->getRepository('BackContractBundle:Reference')->find($idref);
            $commande->setUser($this->get('security.context')->getToken()->getUser());
            $commande->setClient($client);
            $commande->setQte($qte);
            $commande->setEtat(false);
            $em->persist($commande);
            $em->flush();
            // génération des coupon
            $price = $reference->getBigdealPrice();
            for ($j = 1; $j <= $qte; $j++) {

                $coupon = new Coupon();
                $coupon->setVendu(1);
                $coupon->setPrice($price);
                $coupon->setCommand($commande);
                $coupon->setRecu(1);
                $coupon->setClient($client->getName() . " " . $client->getFname());
                // generate code coupon
                $code = Tools::generatecodeCoupon($commande->getDeal()->getId(), $commande->getId(), $j);
                $coupon->setCode($code);
                $em->persist($coupon);
                $em->flush();

            }


            return $this->redirect($this->generateUrl('back_commande'));

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des commandes", $this->generateUrl("back_commande"), array());
        $breadcrumbs->addItem("Vente supplémentaire", $this->generateUrl("back_commande"), array());
        return $this->render('BackCommandeBundle:Command:new.html.twig', array(
            'form' => $form->createView(),
            'id' => $client->getId(),
            'deal' => $deal));
    }

    public function showAction($id)
    {
        $request = $this->get('request');
        $commande = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Commande')
            ->find($id);

        $em = $this->getDosctrine()->getManager();
        $form = $this->createForm(new CommandeType(), $commande);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_commande'));
        } else {
            // echo $form->getErrors();
        }
        return $this->render('BackCommandeBundle:Commande:show.html.twig', array('form' => $form->createView(), "entity" => $commande, 'id' => $id,));
    }

    public function payeAction($id, Request $request)
    {
        $request = $this->get('request');
        $modePayement = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:PaymentMethod')
            ->getListMethode();
        $commande = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Command')
            ->find($id);
        $coupon = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Coupon')
            ->findBy(array("command" => $id));
        if ($commande->getEtat() == 1) {
            return $this->redirect($this->generateUrl('back_commande'));

        } else {


            $reference = $this->getDoctrine()
                ->getRepository('BackContractBundle:Reference')
                ->find($commande->getReference());
            $totalCommande = $reference->getBigdealPrice() * $commande->getQte();
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(new PayeType(), $commande);
            $form->handleRequest($request);

            if ($commande->getEtat() == 0) {


                if ($form->isValid()) {
                    $caisse = $this->get('security.context')->getToken()->getUser()->getCaisse();
                   // var_dump($caisse); exit;
                    if($caisse)
                    {

                    $mode = $request->request->get('mode');
                    $espece = $request->request->get('espece');
                    $numCheque = $request->request->get('num_cheque');
                    $titulaireCheque = $request->request->get('titulaire_cheque');
                    $montantCheque = $request->request->get('montant_cheque');
                    $totalCheque = 0;
                    $Totalespece = 0;

                    for ($i = 0; $i < count($numCheque); ++$i) {
                        $totalCheque += $montantCheque[$i];
                    }
                    for ($count = 0; $count < count($mode); $count++) {
                        if (($mode[$count] == 1))
                            $Totalespece = $espece;



                    }

                    $totalCommandeSaisie = $totalCheque + $Totalespece;

                    if ($totalCommandeSaisie == $totalCommande) {
                        if ($commande->getEtat() == 0) {
                            $currentCaisse = $this->getDoctrine()
                                ->getRepository('BackCommandeBundle:Caisse')
                                ->findBy(array('user' => $this->get('security.context')->getToken()->getUser()));
                            $caisse = $this->get('security.context')->getToken()->getUser()->getCaisse();
                            //perssiste caisse

                            $caisse->setDateUpdate(new \DateTime());
                            $caisse->setMontantEspece($caisse->getMontantEspece() + $Totalespece);
                            $caisse->setMontantCheque($caisse->getMontantCheque() + $totalCheque);
                            $em->persist($caisse);
                            $em->flush();
                            //perssiste date payement
                            foreach ($coupon as $value) {
                                $value->setDcr(new \DateTime());
                                $em->persist($value);
                                $em->flush();
                            }

                            //perssiste Operation

                            for ($count = 0; $count < count($mode); $count++) {
                                if ($mode[$count] == 1) {
                                    $modePayement = $this->getDoctrine()
                                        ->getRepository('BackCommandeBundle:PaymentMethod')
                                        ->find($mode[$count]);
                                    $operation = new Operation();
                                    $operation->setCommande($commande);
                                    $operation->setModepayement($modePayement);
                                    $operation->setType(1);
                                    $operation->setNumCheque(Null);
                                    $operation->setTitulaire(Null);
                                    $operation->setMontant($espece);
                                    $operation->setCaisse($this->get('security.context')->getToken()->getUser());
                                   // $operation->setDcr(new \DateTime());
                                    $em->persist($operation);
                                    $em->flush();
                                } elseif ($mode[$count] == 2) {
                                    $modePayement = $this->getDoctrine()
                                        ->getRepository('BackCommandeBundle:PaymentMethod')
                                        ->find($mode[$count]);
                                    for ($i = 0; $i < count($numCheque); ++$i) {
                                        $operation = new Operation();
                                        $operation->setCommande($commande);

                                        $operation->setModepayement($modePayement);
                                        $operation->setType(1);
                                        $operation->setNumCheque($numCheque[$i]);
                                        $operation->setTitulaire($titulaireCheque[$i]);
                                        $operation->setMontant($montantCheque[$i]);
                                        //$operation->setDcr(new \DateTime());
                                        $operation->setCaisse($this->get('security.context')->getToken()->getUser());

                                        $em->persist($operation);
                                    }
                                    $em->flush();
                                }
                            }

                            //perssiste etat commande
                            $commande->setEtat(1);
                            $commande->setDpa(new \DateTime());
                            $commande->setCaisse($caisse);


                            $em->persist($commande);
                            $em->flush();
                            // si la commande vient d'une poste facebook
                            if($commande->getPoste())
                            {

                                $clientQuiPartage = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($commande->getPoste()->getIdClient()->getId());
                                $historiqueBigFid = new BigFidHistorique();
                                $historiqueBigFid->setDcr(new \dateTime());
                                $historiqueBigFid->setMontant(20);
                                $historiqueBigFid->setOperation(1);
                                $historiqueBigFid->setMotif("Partage facebook");
                                $historiqueBigFid->setClient($clientQuiPartage);
                                $em->persist($historiqueBigFid);
                                $em->flush();

                            }
$allcoupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->findBy(array("command" => $commande->getId()));
							//$allcoupon = $commande->getCoupon();
                            foreach ($allcoupon as $value) {
                                $value->setVendu(2);
                                $em->persist($value);
                                $em->flush();
                            }		
							

			$nombreDeCouponPourValiderDeal = $commande->getReference()->getAnnexe()->getMinCoupon();
				
			$nombreAcheteur =  $this->getDoctrine()->getRepository('BackDealBundle:Deal')->findNombreAcheteur($commande->getDeal()->getId());	
			if($nombreAcheteur>=$nombreDeCouponPourValiderDeal)
            {
                $lesCoupons  = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->listCouponParDeal($commande->getDeal()->getId());
                $Lescommande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->listCommandeVendu($commande->getDeal()->getId());
		
                //metre les coupon Délivré
                foreach($lesCoupons as $value)
                {
                    $coupon = $this->getDoctrine()->getRepository('BackCommandeBundle:Coupon')->find($value->getId());
                    $coupon->setVendu(3);
                    $em->persist($coupon);
                    $em->flush();
                }

                foreach($Lescommande as $value)
                {
                    //envoi un mail au client en cas
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Confirmation de commande'.$value->getId())
                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                        ->setTo($value->getClient()->getEmail())
                        ->setBody($this->renderView('MainFrontBundle:Email:confirmOrderEspece.html.twig', array("client" => $value->getClient(), "commande" => $value, "mode" => " : En caisse")));
                    $message->setContentType("text/html");
                    $this->get('mailer')->send($message);
                }
				
            }
// envoi de mail en cas de deal valide
                            if($nombreAcheteur==$nombreDeCouponPourValiderDeal)
                            {
                                $Lescommande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->listCommandeVendu($commande->getDeal()->getId());

                                foreach($Lescommande as $value)
                                {

                                    $message = \Swift_Message::newInstance()
                                        ->setSubject('Votre coupon est désormais disponible '.$value->getId())
                                        ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                        ->setTo($value->getClient()->getEmail())
                                        ->setBody($this->renderView('MainFrontBundle:Email:dealValider.html.twig', array("client" => $value->getClient(), "commande" => $value)));
                                    $message->setContentType("text/html");
                                    $this->get('mailer')->send($message);
                                }

                            }

//envoi un mail au client
                            $message = \Swift_Message::newInstance()
                                ->setSubject('Confirmation de commande'.$commande->getId())
                                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                ->setTo($commande->getClient()->getEmail())
                                ->setBody($this->renderView('MainFrontBundle:Email:confirmOrderEspece.html.twig', array("client" => $commande->getClient(), "commande" => $commande, "mode" => " : En caisse")));
                            $message->setContentType("text/html");
                            $this->get('mailer')->send($message);

			
			
			
			
			
			/*
			
                            // changer l'etat des coupon en payer
                            $allcoupon = $commande->getCoupon();
                            foreach ($allcoupon as $value) {
                                $value->setVendu(2);
                                $em->persist($value);
                                $em->flush();
                            }
							*/
                            // generateion de pdf
                            $pdf = $this->get("white_october.tcpdf")->create();
                            PrintCoupon::printc($commande, $pdf, true);
                            // envoit d'email
/*
                            $message = \Swift_Message::newInstance()
                                ->setSubject('Hello Email')
                                ->setFrom('contact@bigdeal.tn')
                                ->setTo($commande->getClient()->getEmail())
                                ->setBody($this->renderView('BackCommandeBundle:Command:email.html.twig', array()));
                            $this->get('mailer')->send($message);*/
							$url = $this->generateUrl('back_commande')."?back_commandebundle_commandfilter%5Bid%5D=".$commande->getId()."&back_commandebundle_commandfilter%5Betat%5D=&back_commandebundle_commandfilter%5Bname%5D=&back_commandebundle_commandfilter%5Bfname%5D=&back_commandebundle_commandfilter%5Bpaypar%5D=&back_commandebundle_commandfilter%5Bnum_cheque%5D=&back_commandebundle_commandfilter%5Bdeal%5D=&back_commandebundle_commandfilter%5Bnumcoupon%5D=&back_commandebundle_commandfilter%5Btelc%5D=";


                        }
                    } else {
                        return $this->redirect($this->generateUrl('back_commande'));
                    }
                }
                    else
                    {
                        // message si le caissier n'a pas une caisse
                        $this->get('session')->getFlashBag()->set('alert-error', 'Ce caissier n\'a pas de caisse');
						
                        return $this->redirect($this->generateUrl('back_commande'));

                    }
                }
                    else {
                    // echo $form->getErrors();
                }

                return $this->render('BackCommandeBundle:Command:paye.html.twig', array('form' => $form->createView(), "entity" => $commande, 'idCommand' => sprintf("%09d", $id), "modepayement" => $modePayement, "totalcommande" => $totalCommande));
            } else {
                return $this->redirect($this->generateUrl('back_commande'), 301);
            }
        }
    }

    public function villesAction()
    {
        $request = $this->get('request');

        if ($request->isXmlHttpRequest()) {
            $term = $request->request->get('ville');
            $array = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('BackCommandeBundle:Client')
                ->findVillesLike($term);

            $response = new Response(json_encode($array));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }

    public function codesPostauxAction()
    {
        $request = $this->get('request');

        if ($request->isXmlHttpRequest()) {
            $term = $request->request->get('codePostal');
            $array = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('BackCommandeBundle:Client')
                ->findCodesPostauxLike($term);

            $response = new Response(json_encode($array));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }
}
