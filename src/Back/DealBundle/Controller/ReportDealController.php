<?php

namespace Back\DealBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DealBundle\Form\DealFilterType;

use Back\DashBundle\Common\Tools;
use Back\DealBundle\Form\ReportDealFilterType;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;

class ReportDealController extends Controller
{

    public function indexAction()
    {
        /*
          * filtre de recheche
          */
        $request = $this->get('request');
        $form = $this->createForm(new ReportDealFilterType(array("em" => $this->getDoctrine()->getRepository("BackPlanningBundle:Category"))));
		//back_commandebundle_redactorfilter
        $data = $request->query->get('back_dealbundle_reportdealfilter');
        $data = Tools::dropNull($data);
       // var_dump($request->query); exit;
        $form->bind($request);
        if ($request->getMethod() == 'GET' and $request->query->get('Export')) {
		
            $response = new StreamedResponse();
            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Numero De Serie.', 'Nom de l\'acheteur', 'Email Acheteur', 'Tel', 'Cassier', 'Prix', 'Date D\'Achat', 'Date payement', 'Reference', 'Coupon Status'), ';');
                // Query data from database
                $request = $this->get('request');
                // $deal = $request->request->get('deal');
                $data = $request->query->get('back_dealbundle_reportdealfilter');
                $data = Tools::dropNull($data);
                //$form->bind($request);
                $results = $this->getDoctrine()
                    ->getRepository('BackDealBundle:Deal')
                    ->getListRapportDeal($data);


                // Add the data queried from database
                foreach ($results as $key => $row) {
                    $indixationAdresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findby(array("client" => $row->getCommand()->getClient()->getId()));
                    foreach ($indixationAdresse as $value) {
                        $indicationAdresse = $value->getIndcation();
                    }
                    $adresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findby(array("client" => $row->getCommand()->getClient()->getId()));
                    foreach ($adresse as $value) {
                        $adresseClient = utf8_decode($value->getAdress());
                    }
                    fputcsv($handle, array($key + 1,
                        $row->getClient(),
                        $row->getCommand()->getClient()->getEmail(),
                        $row->getCommand()->getClient()->getPhone(),
                        utf8_decode($row->getCommand()->getCaisse()),
                        $row->getCommand()->getReference()->getBigdealPrice() . ' TND',
                        $row->getCommand()->getDcr()->format('d/m/Y H:i:s'),
                        $row->getDcr()->format('d/m/Y H:i:s'),
                       
                        utf8_decode($row->getCommand()->getReference()),
                        utf8_decode(self::getVendu($row->getVendu())) . " " . utf8_decode(self::getRecu($row->getRecu())),
                    ), ';');
                }

                fclose($handle);
            });


            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;

        }
        elseif ($request->getMethod() == 'GET' and $request->query->get('Rechecher')) {
            $report = $this->getDoctrine()
                ->getRepository('BackDealBundle:Deal')
                ->getListRapportDeal($data);

        } 
		 elseif ($request->getMethod() == 'GET' and $request->query->get('enquete')) {
            $report = $this->getDoctrine()
                ->getRepository('BackDealBundle:Deal')
                ->getListDealEnquetteSatisfaction($data);
			//	exit;
            // Envoyer enquête de satisfaction
			  foreach($report as $value)
            {
			
				if( $value->getRecu() == 2)
				{
			//$value->getClient()->getEmail()
                 $nomPrenomClient = $value->getClient();
                $nomPartenaire = $value->getCommand()->getReference()->getAnnexe()->getProtocol()->getUser();
                $message = \Swift_Message::newInstance()
                    ->setSubject(' ' . $nomPrenomClient . ', notez ' . $nomPartenaire . ' et obtenez 20 BIGFid' )
				->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
				->setTo($value->getCommand()->getClient()->getEmail())
				->setBody($this->renderView('MainFrontBundle:Email:enqueteSatisfaction.html.twig', array("client" => $nomPrenomClient, "partenaire" => $nomPartenaire, "deal" => $value->getCommand()->getDeal(),'defaultregion' =>"Grand tunis")));
				$message->setContentType("text/html");
				$this->get('mailer')->send($message);
			
			}
        }
			$message2 = "Une enquête de satisfaction a été envoyée aux clients";
            $this->get('session')->getFlashBag()->set('alert-success', $message2);		
        } 
		else {
            $report = array();
            $deal = null;

        }
if( !$request->request->get('Export'))
{
    $paginator = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $report, $request->query->get('page', 1)/* page number */, 25/* limit per page */
    );
    $breadcrumbs = $this->get("white_october_breadcrumbs");
    $breadcrumbs->addItem("Deal Coupon Report", $this->generateUrl("back_reportdeal"), array());
    return $this->render('BackDealBundle:ReportDeal:index.html.twig', array('entities' => $report,
        'pagination' => $pagination,
        'form' => $form->createView()));
}

    }

    public static function getVendu($code)
    {

        if ($code == 1) {
            return "En attente";
        }

        if ($code == 2) {
            return "Payé";
        }

        if ($code == 3) {
            return "Délivrer";
        }

        if ($code == 4) {
            return "En attente de rembourcemment";
        }
        if ($code == 5) {
            return "Rempoursé";
        }
        if ($code == 6) {
            return "Annulé";
        }
    }

    public static function getRecu($code)
    {

        if ($code == 1) {
            return "Non Consommé";
        }

        if ($code == 2) {
            return "Consommé";
        }

        if ($code == 3) {
            return "Consommé et Facturer";
        }
    }

    public function export($data)
    {


    }
}
