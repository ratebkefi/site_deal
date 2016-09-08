<?php

namespace Back\DashBundle\Controller;

use Back\DashBundle\Common\Tools;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Entity\Sms;
use Back\DashBundle\Form\SmsType;
use Back\DashBundle\Entity\Smstmp;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;

class SmsController extends Controller
{

    public function catAction()
    {
        $id = rand(1, 15);
        $request = $this->get('request');
        $categorie  = $request->request->get('categorie');

        $category = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array('parent' => null));

        return $this->render('BackDashBundle:Sms:cat.html.twig', array(
            'id' => $id,
            "categorie" => $categorie,
            "category" => $category
        ));
    }

    public function indexAction()
    {

        $request = $this->get('request');
        $deal ="";

        if ($request->query->get('button')) {
            $categorie  = $request->query->get('categorie');
            $agefrom    = $request->query->get('agefrom');
            $ageto      = $request->query->get('ageto');
            $sexe       = $request->query->get('sexe');
            $localite   = $request->query->get('locality');
            $status     = $request->query->get('status');
            $deals     = $request->query->get('deals');
            $exporter   = $request->query->get('button');
			$listeClient = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy(array("stat" =>1));
            $sms = $this->getDoctrine()->getRepository('BackDashBundle:Sms')->findCommande($categorie,$agefrom,$ageto,$sexe,$localite,$status,$deals);
            if($categorie)
            {
                $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getAllDealCategorie($categorie);

            }
			if($exporter=="Exporter tous")
            {
                $response = new StreamedResponse();

                $response->setCallback(function () use ($listeClient) {


                    $handle = fopen('php://output', 'r+');
                    // Add a row with the names of the columns for the CSV file
                    fputcsv($handle, array('Numero.', 'Nom', 'Prenom', 'E-mail', 'Date de naissance', 'Sexe', 'Tel', 'Adresse', 'CP', 'Ville', 'Indication adresse'), ';');
                    // Query data from database



                    // Add the data queried from database
                    foreach ($listeClient as $key => $row) {
                        $adresse = "";
                        $localite = "";
                        $indcation = "";
                        foreach($row->getAdresses() as $item)
                        {
                            $adresse .= $item->getAdress()." ";
                            $localite .= $item->getLocalite()." ";
                            $indcation .= $item->getIndcation()." ";
                        }
                        if($row->getDatebirth())
                        {
                            $birthDay = $row->getDatebirth()->format('d/m/Y');
                        }
                        else
                            $birthDay = "";

                        fputcsv($handle, array($key + 1,
                            utf8_decode($row->getName()),
                            utf8_decode($row->getFname()),
                            $row->getEmail(),
                            $birthDay,
                            $row->getSex() ,
                            $row->getPhone(),
                            utf8_decode($adresse),
                            utf8_decode($localite),
                            utf8_decode($indcation)
                        ), ';');

                    }

                    fclose($handle);
                });


                $response->headers->set('Content-Type', 'application/force-download');
                $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

               return $response;
            }
			
            if($exporter=="Exporter")
            {
                $response = new StreamedResponse();

                $response->setCallback(function () use ($sms) {


                    $handle = fopen('php://output', 'r+');
                    // Add a row with the names of the columns for the CSV file
                    fputcsv($handle, array('Numero.', 'Nom', 'Prenom', 'E-mail', 'Date de naissance', 'Sexe', 'Tel', 'Adresse', 'CP', 'Ville', 'Indication adresse'), ';');
                    // Query data from database



                    // Add the data queried from database
                    foreach ($sms as $key => $row) {
                        $adresse = "";
                        $localite = "";
                        $indcation = "";
                        foreach($row->getAdresses() as $item)
                        {
                            $adresse .= $item->getAdress()." ";
                            $localite .= $item->getLocalite()." ";
                            $indcation .= $item->getIndcation()." ";
                        }
                        if($row->getDatebirth())
                        {
                            $birthDay = $row->getDatebirth()->format('d/m/Y');
                        }
                        else
                            $birthDay = "";

                        fputcsv($handle, array($key + 1,
                            utf8_decode($row->getName()),
                            utf8_decode($row->getFname()),
                            $row->getEmail(),
                            $birthDay,
                            $row->getSex() ,
                            $row->getPhone(),
                            utf8_decode($adresse),
                            utf8_decode($localite),
                            utf8_decode($indcation)
                        ), ';');

                    }

                    fclose($handle);
                });


                $response->headers->set('Content-Type', 'application/force-download');
                $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

               return $response;
            }

        }
        else
        { 
            $categorie  = "";
            $agefrom    = "";
            $ageto      = "";
            $sexe       = "";
            $localite   = "";
            $status     = "";
            $deals     = "";
			$data = array();
			$sms = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy1($data);
            //$sms =$this->getDoctrine()->getRepository('BackDashBundle:Sms')->findCommande1();
            $deal ="";


        }
        $sms2 = new Sms();
        $form = $this->createForm(new SmsType(), $sms2);
       // $sms = $this->getDoctrine()->getRepository('BackDashBundle:Sms')->findBy(array(), array('id' => 'DESC'));
        $locality = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array('parent' => null));
        $category = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array('parent' => null));
		$paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $sms,
			 $request->query->get('page', 1),30 );
      

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des SMS", $this->generateUrl("back_dash_sms"), array());
        return $this->render('BackDashBundle:Sms:index.html.twig', array(
            'entities' => $sms,
            'pagination' => $pagination,
            "category" => $category,
            "locality" => $locality,
            "deal" => $deal,

            "categorie" => $categorie,
            "agefrom" => $agefrom,
            "ageto" => $ageto,
            "sexe" => $sexe,
            "localite" => $localite,
            "status" => $status,
            "deals" => $deals,

            'form' => $form->createView(),

        ));
    }

    public function addAction()
    {
        $locality = $this->getDoctrine()->getRepository('BackCommandeBundle:Localite')->findBy(array('parent' => null));
        $category = $this->getDoctrine()->getRepository('BackPlanningBundle:Category')->findBy(array('parent' => null));
        $sms = new Sms();
        $form = $this->createForm(new SmsType(), $sms);
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($sms);
                $em->flush();
                return $this->redirect($this->generateUrl('back_dash_sms'));
            } else {
                //echo $form->getErrors();
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des SMS", $this->generateUrl("back_dash_sms"), array());
        $breadcrumbs->addItem("Ajouter une compagne sms", $this->generateUrl("back_dash_sms"), array());
        return $this->render('BackDashBundle:Sms:edit.html.twig', array(
            'form' => $form->createView(),
            "category" => $category,
            "locality" => $locality,
            "sms" => $sms
        ));
    }

    public function editAction(Sms $sms)
    {
        $request = $this->get('request');

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new SmsType(), $sms);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('back_dash_sms'));
        } else {
            // echo $form->getErrors();
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des SMS", $this->generateUrl("back_dash_sms"), array());
        $breadcrumbs->addItem("Modifier une compagne sms", $this->generateUrl("back_dash_sms"), array());
        return $this->render('BackDashBundle:Sms:edit.html.twig', array('form' => $form->createView(), 'form' => $form->createView(), "sms" => $sms));

    }

    public function deleteAction(Sms $sms)
    {
        if (!$sms) {
            throw $this->createNotFoundException('No Sms found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($sms);
        $em->flush();

        return $this->redirect($this->generateUrl('back_dash_sms'));
    }

    public function sendAction(Sms $sms)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $id = $sms->getId();
        $tmpsms = $sms->getSmstmp();
        if (count($tmpsms) == 0 && !$sms->getSend()) {
            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy(array('stat' => 1));
            $i = 0;
            foreach ($client as $key => $value) {
                if ($value->getPhone() != "") {
                    $tel = Tools::trimspace($value->getPhone());
                    $tel = substr($tel, -8);
                    if (strlen($tel) == 8) {
                        $op = substr($tel, 0, 1);
                        if (in_array($op, array('5', '2', '9', '4'))) {
                            $tmp = new Smstmp();
                            $tmp->setPhone($tel);
                            $tmp->setSms($sms);
                            switch ($op) {
                                case 5:
                                    $tmp->setOperator('60501');
                                    break;
                                case 2:
                                    $tmp->setOperator('60503');
                                    break;
                                case 9:
                                    $tmp->setOperator('60502');
                                    break;
                                case 4:
                                    $tmp->setOperator('60502');
                                    break;
                            }
                            $em->persist($tmp);
                            $em->flush();
                            ++$i;

                        }
                    }
                }
            }
            $sms->setTotal($i);
            $em->persist($sms);
            $em->flush();

        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des SMS", $this->generateUrl("back_dash_sms"), array());
        $breadcrumbs->addItem("Envoie de la compagne sms", $this->generateUrl("back_dash_sms"), array());
        $sms = $this->getDoctrine()->getRepository('BackDashBundle:Sms')->find($id);
        return $this->render('BackDashBundle:Sms:send.html.twig', array("sms" => $sms));

    }

    public function sendingAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();

        $id = $request->request->get('id');
        $idtmp = $request->request->get('smstmpid');
        $tmp = $this->getDoctrine()->getRepository('BackDashBundle:Smstmp')->find($idtmp);
        //sending sms


        $urlPlatform = "http://smsc.jmt.tn/sendSMS.php?SRVID=67&PRID=34&SC=BigDeal&MOBILE=" . $tmp->getPhone() . "&OPID=" . $tmp->getOperator() . "&MESSAGE=" . $tmp->getSms()->getBody() . "&ENCODE=0&LOGIN=bigdeal&PASS=big2014deal";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlPlatform);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);

        curl_close($ch);


        $em->remove($tmp);
        $em->flush();
        $sms = $this->getDoctrine()->getRepository('BackDashBundle:Sms')->find($id);
        if (count($sms->getSmstmp()) == 0) {
            $sms->setSend(true);
            $em->persist($sms);
            $em->flush();
        }
        exit;
    }
}
