<?php

namespace Back\DealBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Back\DashBundle\Common\Tools;
use Back\DealBundle\Form\ReportLivraisonFilterType;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;
class ReportLivraisonController extends Controller
{

    public function indexAction(Request $request)
    {
        /*
          * filtre de recheche
          */
        $request->get('request');
        $form = $this->createForm(new ReportLivraisonFilterType());
        $form->bind($request);
        $deal = $request->request->get('deal_id');
        $consomme = $request->request->get('consomme');
        $non_consomme = $request->request->get('non_consomme');
        $id = $request->request->get('id');
        $etat = $request->request->get('etat');

        $em = $this->getDoctrine()->getManager();

        if($consomme!="")
        {
            for($count=0;$count<count($id);$count++)
            {
                $coupon = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Coupon')
                    ->find($id[$count]);
                $coupon->setRecu(2);
                $em->persist($coupon);
                $em->flush();
            }
        }

        if($non_consomme!="")
        {
            for($count=0;$count<count($id);$count++)
            {
                $coupon = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Coupon')
                    ->find($id[$count]);
                $coupon->setRecu(1);
                $em->persist($coupon);
                $em->flush();
            }
        }
        $listDeal = $this->getDoctrine()
            ->getRepository('BackDealBundle:Deal')
            ->findAll();
        //Tools::dump($data,true);
        if (isset($deal)) {

            $report = $this->getDoctrine()
                ->getRepository('BackDealBundle:Deal')
                ->getListDealLivraison($deal,$etat);
            $deal = $request->request->get('deal_id');
        }
        else{
            $report =  array();
            $deal = null;
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $report, $request->query->get('page', 1)/* page number */, 25/* limit per page */
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Deal Coupon Report", $this->generateUrl("back_reportlivraison"), array());
        return $this->render('BackDealBundle:ReportLivraison:index.html.twig', array('listdeal'=>$listDeal,'deal'=>$deal,'etat'=>$etat,'entities' => $report,
            'pagination' => $pagination,
            'form' => $form->createView()));
    }

    public static function getVendu($code)
    {

        if($code==1)
        {
            return "En attente";
        }

        if($code==2)
        {
            return "Payé";
        }

        if($code==3)
        {
            return "Délivrer";
        }

        if($code==4)
        {
            return "En attente de rembourcemment";
        }
        if($code==5)
        {
            return "Rempoursé";
        }if($code==6)
        {
            return "Annulé";
        }
    }

    public static function getRecu($code)
    {

        if($code==1)
        {
            return "Non Consommé";
        }

        if($code==2)
        {
            return "Consommé";
        }

        if($code==3)
        {
            return "Consommé et Facturer";
        }
    }

    public function exportAction( )
    {
        $response = new StreamedResponse();
        $response->setCallback(function(){
            $handle = fopen('php://output', 'w+');
            // Add a row with the names of the columns for the CSV file
            fputcsv($handle, array('Numero De Serie.', 'Nom de l\'acheteur', 'Email Acheteur', 'Tel', 'Adresse', 'VILLE', 'CP', 'Indication Adresse','Cassier','Prix','Date D\'Achat','Date payement','Code coupon','Reference','Coupon Status'),';');
            // Query data from database
            $request = $this->get('request');
            $form = $this->createForm(new ReportLivraisonFilterType());
            $form->bind($request);
            $deal = $request->request->get('deal_id');
            $etat = $request->request->get('etat');
            if ($deal!="") {
                $results = $this->getDoctrine()
                    ->getRepository('BackDealBundle:Deal')
                    ->getListDealLivraison($deal,$etat);
            }
                else{
                    $results =  array();
            }
            // Add the data queried from database
            //var_dump($results); exit;
            foreach( $results as $key =>  $row)
            {
                $indixationAdresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findby(array("client"=>$row->getCommand()->getClient()->getId()));
                foreach($indixationAdresse as $value)
                {
                    $indicationAdresse = $value->getIndcation();
                }
                $adresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findby(array("client"=>$row->getCommand()->getClient()->getId()));
                foreach($adresse as $value)
                {
                    $adresseClient = utf8_decode($value->getAdress());
                }
                if($row->getCommand()->getAdresse()->getAdress())
                    $adressClient = utf8_decode($row->getCommand()->getAdresse()->getAdress());
                else
                    $adressClient = "";

                if($row->getCommand()->getAdresse()->getLocalite())
                    $localite = utf8_decode($row->getCommand()->getAdresse()->getLocalite());
                else
                    $localite = "";

                if($row->getCommand()->getAdresse()->getLocalite()->getCp())
                    $cp = $row->getCommand()->getAdresse()->getLocalite()->getCp();
                else
                    $cp = "";

                if($row->getCommand()->getAdresse()->getIndcation())
                    $indcation = utf8_decode($row->getCommand()->getAdresse()->getLocalite()->getCp());
                else
                    $indcation = "";
                fputcsv($handle,array($key +1,
                    $row->getClient() ,
                    $row->getCommand()->getClient()->getEmail(),
                    $row->getCommand()->getClient()->getPhone(),

                    $adressClient,

                    $localite,
                    $cp,
                    $indcation,

                    utf8_decode($row->getCommand()->getCaisse()),
                    $row->getCommand()->getReference()->getBigdealPrice() .' TND',
                   $row->getCommand()->getDcr()->format('d/m/Y H:i:s'),
                   $row->getDcr()->format('d/m/Y H:i:s'),
                    $row->getCode(),
                    utf8_decode($row->getCommand()->getReference()),
                    utf8_decode(self::getVendu($row->getVendu()))." ".utf8_decode(self::getRecu($row->getRecu())),
                ),';');
            }

            fclose($handle);
        });

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');

        return $response;


}

    public function exportchefAction($date1,$date2,$type )
    {

if($type==1)
        $unecommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getClientUneCommande($date1, $date2);
else if($type==2)
    $unecommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getClientMoinsCinqCommande($date1, $date2);
else if($type==3)
    $unecommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getClientPlusCinqCommande($date1, $date2);
else if($type==4)
    $unecommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->getClientNombreinscrits($date1, $date2);
else if($type==5)
    $unecommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->getClientNombreValider($date1, $date2);

        $this->unecommande =$unecommande;
        $response = new StreamedResponse();

        $response->setCallback(function(){

            $handle = fopen('php://output', 'w+');
            fputcsv($handle, array('Nom', 'Prenom','Sexe','Email','Tel','Adresse'),';');

            foreach( $this->unecommande  as $value)
            {
                $adresseClient='';
                $adresse = $this->getDoctrine()->getRepository('BackCommandeBundle:Adress')->findby(array("client"=>$value->getId()));
                foreach($adresse as $values)
                {
                    $adresseClient=$values->getAdress();
                }
                fputcsv($handle,array(utf8_decode($value->getFname()),utf8_decode($value->getName()),utf8_decode($value->getSex()),utf8_decode($value->getEmail()),utf8_decode($value->getPhone()),utf8_decode($adresseClient) ),';');
            }

            fclose($handle);
        });
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');
        return $response;

    }
}
