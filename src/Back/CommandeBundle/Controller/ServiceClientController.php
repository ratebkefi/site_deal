<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:24
 */

namespace Back\CommandeBundle\Controller;

use Back\CommandeBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\User;
use Back\CommandeBundle\Form\ServiceClientaddType;
use Back\CommandeBundle\Form\TicketViewType;
use Back\CommandeBundle\Form\ticketFilterType;
use Back\CommandeBundle\Form\TicketType;
use Back\CommandeBundle\Form\TicketMessageType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Form\ServiceClientFilterType;
use Back\CommandeBundle\Entity\TicketMessage;
use Back\CommandeBundle\Entity\TicketHistorique;
use Back\CommandeBundle\Entity\TicketNote;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;
use Back\CommandeBundle\Entity\Remboursement;
use Back\CommandeBundle\Entity\Virement;
use Back\DashBundle\Entity\BigFidHistorique;
use Back\CommandeBundle\Entity\Client;
use Back\CommandeBundle\Form\ClientFilterType;
use Main\FrontBundle\Form\ClientType;


class ServiceClientController extends Controller
{
    public function ticket10jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $partenaire = $request->request->get("partenaire");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        $DealRep=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealDateById($deal) ;
        $dated=$DealRep[0]->getStartDate();
        $datef=$DealRep[0]->getEndDate();
        $nb_jours = Tools::date_diff2($dated->format('Y-m-d'), $datef->format('d-m-Y'));
        $jour_apres = Tools::toStamp2($dated->format('Y-m-d')) - (60 * 60 * 24);
        $total=0;
        for ($i = 0; $i < $nb_jours; $i++) {
            $jour_apres += (60 * 60 * 24);
            $paye = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandePaye(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $enAttente = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandeEnAttente(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $annuler = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandeAnnuler(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $total=$enAttente+$annuler+$paye ;
            $array[] = array(
                "jour" => strtotime(date('Y-m-d', $jour_apres)) * 1000,
                "paye" => $paye,
                "enattente" => $enAttente,
                "annuler" => $annuler,
                "total" => $total,
            );
            unset($paye);
            unset($enAttente);
            unset($annuler);
        }

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket122jsonAction(Request $request)
    {

        $partenaire = $request->request->get("partenaire");
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");



        $categorie = $request->request->get("categorie");
        $region = $request->request->get("region");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";


        $nb_jours = Tools::date_diff2($firstDate, $endDate);

        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);
        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearchNow($firstDate, $endDate);

        //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch1($firstDate, $endDate);
        // $deal=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getdealsearch();

        foreach ($deal as $value) {
            $nombreCommandePaye = count($this->getDoctrine()->getRepository("BackCommandeBundle:Command")->findBy(array("etat" =>1, "deal"=>$value->getId()))) ;
            $nombreCommandeEnAttente = count($this->getDoctrine()->getRepository("BackCommandeBundle:Command")->findBy(array("etat" =>0, "deal"=>$value->getId()))) ;
            $nombreCommandeTotal = count($this->getDoctrine()->getRepository("BackCommandeBundle:Command")->findBy(array( "deal"=>$value->getId()))) ;
            $array[] = array(
                "title" => $value->getTitle(),
                "nbrpaye" => $nombreCommandePaye,
                "nbrnonpaye" => $nombreCommandeEnAttente,
                "totals" => $nombreCommandeTotal,
            );
        }


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket133jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";
        $nb_jours = Tools::date_diff2($firstDate, $endDate);
        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);

        $inscrits = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->getNombreinscrits($firstDate, $endDate);
        $confirme = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->getNombreValider($firstDate, $endDate);
        $unecommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getUneCommande($firstDate, $endDate);
        $moinscinqcommandes = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getMoinsCinqCommande($firstDate, $endDate);
        $pluscingcommande = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getPlusCinqCommande($firstDate, $endDate);
        $moinscinqcommandes = $moinscinqcommandes - $unecommande;
        $Arrresult["inscrits"] = $inscrits;
        $Arrresult["confirme"] = $confirme;
        $Arrresult["unecommande"] = $unecommande;
        $Arrresult["moinscinqcommandes"] = $moinscinqcommandes;
        $Arrresult["pluscingcommande"] = $pluscingcommande;
        $Arrresult["firstDate"] = $firstDate;
        $Arrresult["endDate"] = $endDate;

        $response = new Response(json_encode($Arrresult));
        $response->headers->set('Content-Type', 'application/json');
        return $response;



    }


    public function ticket14jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $partenaire = $request->request->get("partenaire");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        $nb_jours = Tools::date_diff2($firstDate, $endDate);

        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);
        for ($i = 0; $i < $nb_jours; $i++) {
            $jour_apres += (60 * 60 * 24);
            $paye = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandePaye(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $enAttente = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandeEnAttente(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $annuler = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandeAnnuler(date('Y-m-d', $jour_apres), $partenaire, $deal);

            $array[] = array(
                "jour" => strtotime(date('Y-m-d', $jour_apres)) * 1000,
                "paye" => $paye,
                "enattente" => $enAttente,
                "annuler" => $annuler,
                "total" => $paye + $enAttente + $annuler,
            );
            unset($paye);
            unset($enAttente);
            unset($annuler);
        }
        $response = new Response(json_encode($array));
        $response->heaers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket155jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");

        $categorie = $request->request->get("categorie");
        $region = $request->request->get("region");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";


        $nb_jours = Tools::date_diff2($firstDate, $endDate);
        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);


        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch($firstDate, $endDate);
        // $deal=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getdealsearch();


        foreach ($deal as $value) {

            $idDeal = $value['id'];


            $getRefPrice = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getRefPrice($idDeal);
            //$nompaye=$this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getCountCommandeNonPaye($idDeal);
            if ($getRefPrice!=null)
            {

            $arrayr = [];
            foreach ($getRefPrice as $values) {

                $idRef = $values['id'];
                $bigfid = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getCountBigfid($idDeal, $idRef);

                $virement = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getCountVirement($idDeal, $idRef);
                $nbcoup = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getCountCoup($idRef);
                $valbig = intval($bigfid[1]);
                $valvirement = intval($virement[1]);
                $valprice = intval($values['bigdealPrice']);
                if(($valbig + $valvirement)!=0)
                {
                $arrayr[] = array(
                    "title" => $values['title'],
                    "price" => $values['bigdealPrice'],
                    "bigfid" => $bigfid[1],
                    "virement" => $virement[1],
                    "nbcoup" => $nbcoup[1],
                    "montant" => $valprice * ($valbig + $valvirement),
                );


            $array[] = array(
                "title" => $value['dealtitle'],
                "refprix" => $arrayr,
                //"nbrnonpaye" => $nompaye[1],
                //"totals" => $nompaye[1]+$paye[1],
            );
            }
            }
            }
        }


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function ticket156jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");

        $categorie = $request->request->get("categorie");
        $region = $request->request->get("region");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";


        $nb_jours = Tools::date_diff2($firstDate, $endDate);
        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);

        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch($firstDate, $endDate);
        // $deal=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getdealsearch();


        foreach ($deal as $value) {

            $idDeal = $value['id'];

            $totalcom = 0;
            $totalcom1 = 0;
            $totalcom2 = 0;
            $totalcom3 = 0;
            $totalcom4 = 0;
            $totalcom5 = 0;


            $totalcom = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->listTotalCommentaire($idDeal);
            $totalcom1 = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->listTotalCommentaire1($idDeal);
            $totalcom2 = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->listTotalCommentaire2($idDeal);
            $totalcom3 = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->listTotalCommentaire3($idDeal);
            $totalcom4 = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->listTotalCommentaire4($idDeal);
            $totalcom5 = $this->getDoctrine()->getRepository("BackDealBundle:Vote")->listTotalCommentaire5($idDeal);

            // $getRefPrice=$this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getRefPrice($idDeal);
            //$nompaye=$this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->getCountCommandeNonPaye($idDeal);
            if ($totalcom != 0) {


                $nbt = $totalcom[1];
                $somme = ((intval($totalcom1[1]) * 1) + (intval($totalcom2[1]) * 2) + (intval($totalcom3[1]) * 3) + (intval($totalcom4[1]) * 4) + (intval($totalcom5[1]) * 5));
                if ($totalcom[1] > 0)
                    $moyen = $somme / $totalcom[1];
                else
                    $moyen = 0;

            }



            $array[] = array(
                "title" => $value['dealtitle'],
                "totalcomm" => $totalcom[1],
                "totalcomm1" => $totalcom1[1],
                "totalcomm2" => $totalcom2[1],
                "totalcomm3" => $totalcom3[1],
                "totalcomm4" => $totalcom4[1],
                "totalcomm5" => $totalcom5[1],
                "moyen" => round($moyen,2)
            );


        }


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket16jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $partenaire = $request->request->get("partenaire");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        $nb_jours = Tools::date_diff2($firstDate, $endDate);

        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);
        for ($i = 0; $i < $nb_jours; $i++) {
            $jour_apres += (60 * 60 * 24);
            $paye = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandePaye(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $enAttente = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandeEnAttente(date('Y-m-d', $jour_apres), $partenaire, $deal);
            $annuler = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->getNombreCommandeAnnuler(date('Y-m-d', $jour_apres), $partenaire, $deal);

            $array[] = array(
                "jour" => strtotime(date('Y-m-d', $jour_apres)) * 1000,
                "paye" => $paye,
                "enattente" => $enAttente,
                "annuler" => $annuler,
                "total" => $paye + $enAttente + $annuler,
            );
            unset($paye);
            unset($enAttente);
            unset($annuler);
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function ticket2dealAction(Request $request)
    {
        $request = $this->get('request');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $prtenaireId = $request->request->get('partenaire_id2');
        $idCategorie = $request->request->get('idcategorie');
        $idregion = $request->request->get('idregion');

        $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findDeal2($idCategorie, $idregion, $prtenaireId);
        $entries = array();
        foreach ($planning as $value) {
            if ($value->getDeal() != null && $value->getDeal()->getTitle() != "En attente de rédaction") {
                $entries[] = $value->getDeal();
            }
        }
        return $this->render('BackDashBundle:Default:select.html.twig', array(
            "entities" => $entries,

        ));

    }






    public function ticketdealAction(Request $request)
    {
        $request = $this->get('request');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $prtenaireId = $request->request->get('partenaire_id');

        $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findDeal($dated, $datef, $prtenaireId);
        $entries = array();
        foreach ($planning as $value) {
            if ($value->getDeal() != null && $value->getDeal()->getTitle() != "En attente de rédaction") {
                $entries[] = $value->getDeal();
            }
        }
        return $this->render('BackDashBundle:Default:select.html.twig', array(
            "entities" => $entries,

        ));
    }


    public function ticketdealpartAction(Request $request)
    {
        $request = $this->get('request');
        $dated = $request->request->get('dated');
        $datef = $request->request->get('datef');
        $prtenaireId = $request->request->get('partenaire_id');

        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartnerByDealValide1($dated,$datef);
        $entries = array();
        foreach ($partner as $value) {
                $entries[] = $value;

        }
        return $this->render('BackDashBundle:Default:selectdeal.html.twig', array(
            "entities" => $entries,

        ));
    }

    public function ticket4jsonAction(Request $request)
    {
        $partenaire = $request->request->get("partenaire");
        $deal = $request->request->get("deal");


        $couponEnAttente = 0;
        $couponPaye = 0;
        $couponDelivre = 0;
        $couponAttenteRembourcemment = 0;
        $couponRembourse = 0;
        $couponAnnule = 0;
        $couponRembourcemmentAnnule = 0;
        $objectifCa = 0;
        $coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererNombreEtatCoupon($partenaire, $deal);
        $ca = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererObjectifCa($partenaire, $deal);
        foreach ($ca as $value) {
            $moyenCoupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererMoyenneCoupon($value->getId());
            $totalRef = 0;
            foreach ($moyenCoupon as $valus) {
                $totalRef = $totalRef + $valus->getBigdealPrice();
            }
            $moyenPrix = $totalRef / count($moyenCoupon);
            $objectifCa = ($objectifCa + $value->getCa()) / $moyenPrix;
            unset($moyenPrix);
            unset($totalRef);
        }
        foreach ($coupon as $key => $values) {
            if ($values->getVendu() == 1)
                $couponEnAttente += 1;
            if ($values->getVendu() == 2)
                $couponPaye += 1;
            if ($values->getVendu() == 3)
                $couponDelivre += 1;
            if ($values->getVendu() == 4)
                $couponAttenteRembourcemment += 1;
            if ($values->getVendu() == 5)
                $couponRembourse += 1;
            if ($values->getVendu() == 6)
                $couponRembourse += 1;
            if ($values->getVendu() == 7)
                $couponRembourcemmentAnnule += 1;

        }


        $Arrresult["couponEnAttente"] = $couponEnAttente;
        $Arrresult["couponPaye"] = $couponPaye;
        $Arrresult["couponDelivre"] = $couponDelivre;
        $Arrresult["couponAttenteRembourcemment"] = $couponAttenteRembourcemment;
        $Arrresult["couponRembourse"] = $couponRembourse;
        $Arrresult["couponAnnule"] = $couponAnnule;
        $Arrresult["couponRembourcemmentAnnule"] = $couponRembourcemmentAnnule;
        if (count($ca) != 0)
            $Arrresult["objectifca"] = $objectifCa / count($ca);
        else
            $Arrresult["objectifca"] = 0;

        $response = new Response(json_encode($Arrresult));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function ticket7jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        $bigFid = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNbrVolumePayement($firstDate, $endDate, $deal, 3);
        $espece = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNbrVolumePayement($firstDate, $endDate, $deal, 1);
        $cheque = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNbrVolumePayement($firstDate, $endDate, $deal, 2);
        $gpg = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNbrVolumePayement($firstDate, $endDate, $deal, 4);
        $array = array(
            "espece" => $espece,
            "cheque" => $cheque,
            "gpg" => $gpg,
            "bigfid" => $bigFid,
        );

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket6jsonAction(Request $request)
    {
        $partenaire = $request->request->get("partenaire");
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $categorie = $request->request->get("categorie");
        $region = $request->request->get("region");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";
        $nb_jours = Tools::date_diff2($firstDate, $endDate);

        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);
        for ($i = 0; $i < $nb_jours; $i++) {
            $jour_apres += (60 * 60 * 24);
            $bigFid = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getMontantBigFid(date('Y-m-d', $jour_apres), $partenaire, $categorie, $region, $deal);
            $virement = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getMontantVirement(date('Y-m-d', $jour_apres), $partenaire, $categorie, $region, $deal);
            //echo date('Y-m-d', $jour_apres)." ----". $bigFid." B ".$virement." Vir <br/>";
            $array[] = array(
                "jour" => strtotime(date('Y-m-d', $jour_apres)) * 1000,
                "montantBigFid" => $bigFid,
                "montantVirement" => $virement,
            );
            unset($bigFid);
            unset($virement);
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function ticket11jsonAction(Request $request)
    {


        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";
        $nb_jours = Tools::date_diff2($firstDate, $endDate);
        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);

        $rembbig = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreBigFid($firstDate, $endDate);
        $sansremb = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreSans($firstDate, $endDate);
        $rembvirement = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNombreRembVirement($firstDate, $endDate);

        $Arrresult["rembvirement"] = $rembvirement;
        $Arrresult["rembbig"] = $rembbig;
        $Arrresult["sansremb"] = $sansremb;

        $response = new Response(json_encode($Arrresult));
        $response->headers->set('Content-Type', 'application/json');
        return $response;


    }


    public function ticket5jsonAction(Request $request)
    {
        $partenaire = $request->request->get("partenaire");
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $categorie = $request->request->get("categorie");
        $region = $request->request->get("region");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";
        $nb_jours = Tools::date_diff2($firstDate, $endDate);

        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);
        for ($i = 0; $i < $nb_jours; $i++) {
            $jour_apres += (60 * 60 * 24);
            $bigFid = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNomnreBigFid(date('Y-m-d', $jour_apres), $partenaire, $categorie, $region, $deal);
            $virement = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->getNomnreVirement(date('Y-m-d', $jour_apres), $partenaire, $categorie, $region, $deal);
            //echo date('Y-m-d', $jour_apres)." ----". $bigFid." B ".$virement." Vir <br/>";
            $array[] = array(
                "jour" => strtotime(date('Y-m-d', $jour_apres)) * 1000,
                "nbrBigFid" => $bigFid,
                "nbrVirement" => $virement,
            );
            unset($bigFid);
            unset($virement);
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket3jsonAction(Request $request)
    {

        $agent = $request->request->get("agent");
        $dated = Tools::reformatDate($request->request->get("dated"));
        $datef = Tools::reformatDate($request->request->get("datef"));

        if ($agent != "") {
            $user = $this->getDoctrine()->getRepository("UserUserBundle:User")->find($agent);
        } else {
            $user = null;
        }

        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererListeTicketCloturee($dated, $datef, $user);
        $ticketMsg1 = 0;
        $ticketMsg2 = 0;
        $ticketMsg3 = 0;
        foreach ($ticket as $value) {
            //echo $value->getId()."<br>";
            $nombre = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->traitementTicket($value->getId());

            if ($nombre == 1)
                $ticketMsg1 += 1;
            if ($nombre == 2)
                $ticketMsg2 += 1;
            if ($nombre >= 3)
                $ticketMsg3 += 1;

        }


        $Arrresult["ticketMsg1"] = $ticketMsg1;
        $Arrresult["ticketMsg2"] = $ticketMsg2;
        $Arrresult["ticketMsg3"] = $ticketMsg3;


        $response = new Response(json_encode($Arrresult));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    public function ticket2jsonAction(Request $request)
    {
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF= $request->request->get("datef");
        //$dateD = '11/01/2016';
        //$dateF = '11/02/2016';
        $categorie = $request->request->get("categorie");
        $region = $request->request->get("region");




        $jour_apres = strtotime($dateD); //Tools::toStamp2($firstDate)-(60*60*24);

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //  echo $endDate." ----".$firstDate."<br/>";

        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererListeTicket($firstDate, $endDate);


        // $deal=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getdealsearch();
        $array = [];
            foreach ($ticket as $value) {
                $jour_apres += (60 * 60 * 24);
                $delai = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererDelaiTraitementTicketFerme($value->getId());
                $array[] = array(
                "object" => $value->getObject(),
                "delais" => $delai,
                "date" => $value->getDcr(),
                 "code" => $value->getCode(),
                 "id" => $value->getId(),
                 "jour" => strtotime(date('Y-m-d', $jour_apres)),


            );
        }
//var_dump($array); exit;


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket2_jsonAction(Request $request)
    {
        $agent = $request->request->get("agent");
        $dated = $request->request->get("dated");
        $datef = $request->request->get("datef");

        $dateFin = explode("/", $datef);
        $dateDebut = explode("/", $dated);
        $dt = Tools::reformatDate($dated);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        $nb_jours = Tools::date_diff2($firstDate, $endDate);
        $jour_apres = strtotime($dt->format("Y-m-d")); //Tools::toStamp2($firstDate)-(60*60*24);


        if ($agent != "") {
            $user = $this->getDoctrine()->getRepository("UserUserBundle:User")->find($agent);
        } else {
            $user = null;
        }

        for ($i = 0; $i < $nb_jours; $i++) {

            $listeDelai = array();
            $oVal = new \stdClass();

            $jour_apres += (60 * 60 * 24);
            $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererListeTicketCloture(date('Y-m-d', $jour_apres), $user);

            foreach ($ticket as $value) {
                $delai = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->recupererDelaiTraitementTicket($value->getTicket()->getId());
                $listeDelai[] = $delai;
            }

            if (count($listeDelai) > 0) {
                Tools::recupereMinMaxDelai($listeDelai, $minDelai, $maxDelai);
                $oVal->jour = date('Y-m-d', $jour_apres);
                $oVal->maxDelai = $maxDelai;
                $oVal->minDelai = $minDelai;
                $array[] = array(
                    "jour" => strtotime(date('Y-m-d', $jour_apres)),
                    "maxDelai" => $maxDelai,
                    "minDelai" => $minDelai
                );
            } else {
                $array[] = array(
                    "jour" => strtotime(date('Y-m-d', $jour_apres)),
                    "maxDelai" => 0,
                    "minDelai" => 0
                );

            }

            unset($listeDelai);
            unset($ticket);
            unset($curentTicket);

        }
        var_dump($array); exit;
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function ticket1jsonAction(Request $request)
    {

        $agent = $request->request->get("agent");
        $dated = Tools::reformatDate($request->request->get("dated"));
        $datef = Tools::reformatDate($request->request->get("datef"));
        if ($agent != "") {
            $user = $this->getDoctrine()->getRepository("UserUserBundle:User")->find($agent);
        } else {
            $user = null;
        }
        $Arrresult = array("ouvert" => 0, "encour" => 0, "cloturer" => 0);
        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->findbystatue($dated, $datef, $user);

        foreach ($ticket as $value) {
            if ($value->getStatus() == 1)
                $Arrresult["ouvert"] = $Arrresult["ouvert"] + 1;
            if ($value->getStatus() == 2)
                $Arrresult["encour"] = $Arrresult["encour"] + 1;
            if ($value->getStatus() == 3)
                $Arrresult["cloturer"] = $Arrresult["cloturer"] + 1;
        }

        $response = new Response(json_encode($Arrresult));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des agents services clients", $this->generateUrl("list_serviceclient"), array());
        $breadcrumbs->addItem("Afficher un service client", "show_serviceclient", array());
        return $this->render('BackCommandeBundle:ServiceClient:show.html.twig', array('entity' => $user));
    }

    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des agents services clients", $this->generateUrl("list_serviceclient"), array());
        $request = $this->get('request');
        $form = $this->createForm(new ServiceClientFilterType());
        $form->bind($request);
        $data = $request->query->get('back_commandebundle_serviceclientfilter');
        $data = Tools::dropNull($data);
        $data['roles'] = "SERVICECLIENT";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:ServiceClient:index.html.twig', array('form' => $form->createView(), 'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des agents services clients", $this->generateUrl("list_serviceclient"), array());
        $breadcrumbs->addItem("Modifier agent service client", "edit_serviceclient", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new ServiceClientaddType(), $partner);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('list_serviceclient'));
        }
        return $this->render('BackCommandeBundle:ServiceClient:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des agents services clients", $this->generateUrl("list_serviceclient"), array());
        $breadcrumbs->addItem("Ajouter agent service client", "add_serviceclient", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new ServiceClientaddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('SERVICECLIENT' => 'SERVICECLIENT'));
                $user->setEnabled(true);
                //$user->setLogo($request->request->get('file'));
                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);

                $om->persist($user);
                $om->flush();

                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_serviceclient'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackCommandeBundle:ServiceClient:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des agents services clients", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Afficher agent services clients", "showw_responsablecaissier", array());
        return $this->render('BackCommandeBundle:ServiceClient:show.html.twig', array('entity' => $user,));
    }

    public function ticketAction(Request $request)
    {
        $form = $this->createForm(new ticketFilterType());
        $form->bind($request);
        $user = $this->get('security.context')->getToken()->getUser()->getId();
        $data = $request->query->get('back_commandebundle_ticketfilter');
        $data = Tools::dropNull($data);
        $roles = $this->get('security.context')->getToken()->getUser()->getRoles();


        if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN') === true
            || $roles[0] == 'CHEFSERVICECLI' || $roles[0] == 'DAF'
        ) {
            $ticket = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:Ticket')
                ->getListTicket($data);
            //$ticket = $this->getDoctrine()->getRepository('BackCommandeBundle:Ticket')->findBy(array(),array('id'=>'DESC'));

        } else {
            $data['user'] = $user;
            $ticket = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:Ticket')
                ->getListTicket($data);
            // $ticket = $this->getDoctrine()->getRepository('BackCommandeBundle:Ticket')->findBy(array("user" => $user));

        }

        $request = $this->get('request');
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $ticket,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des tickets", $this->generateUrl("list_ticket"), array());

        return $this->render('BackCommandeBundle:ServiceClient:ticket.html.twig', array('form' => $form->createView(), 'entities' => $ticket, 'pagination' => $pagination,));
    }

    public function clientAction(Request $request)
    {

        $request->get('request');
        $form = $this->createForm(new ClientFilterType());

        if ($request->getMethod() == 'GET') {
            $form->bind($request);
            $data = $request->query->get('back_commandebundle_clientfilter');

            $data = Tools::dropNull($data);
            //Tools::dump($data,true); exit;

            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findBy1($data);
        } else {
            $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->findAll(array(), array('id' => 'ASC'));
        }

        //$client=array_reverse($client);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $client,
            $request->query->get('page', 1)/*page number*/,
            25
        );
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des clients", $this->generateUrl("back_client"), array());
        return $this->render('BackCommandeBundle:ServiceClient:client.html.twig', array('form' => $form->createView(), 'entities' => $client, 'pagination' => $pagination,));
    }

    public function ajouterTicketAction(Request $request)
    {

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des tickets", $this->generateUrl("list_ticket"), array());
        $breadcrumbs->addItem("Ajouter une nouvelle ticket", "add_ticket", array());
        $em = $this->getDoctrine()->getManager();
        //$listeClient = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->findAll();
        $user = $this->get('security.context')->getToken()->getUser();
        $clientSelectionner = $request->query->get('client');
        if ($clientSelectionner) {
            $ClientS = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->find($clientSelectionner);
            $ListCommande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('client' => $ClientS, 'etat' => 1));
        } else {
            $ClientS = null;
            $ListCommande = null;
        }
        $ticket = new Ticket();
        $ticketMessage = new TicketMessage();
        $ticket->addMessage($ticketMessage);


        $form = $this->createForm(new TicketType(), $ticket);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $message = $request->request->get('message');
            $client = $this->getDoctrine()->getRepository("BackCommandeBundle:Client")->find($clientSelectionner);
            $data = $request->request->get('back_commandebundle_ticket');
            $commande = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->find($data["commande"]);
            if ($form->isValid()) {
                $codeReclamation = "RECLA-" . sprintf("%09d", rand());
                $ticket->setCode($codeReclamation);

                // $ticket->setUser($user);
                $ticket->setDcr(new \DateTime());
                $ticket->setCommande($commande);
                $ticketMessage->setTicket($ticket);
                $ticketMessage->setMessage($message);
                $ticketMessage->setDpa(new \DateTime());
                $ticketMessage->setClient($client);
                $ticketMessage->upload();
                $ticket->addMessage($ticketMessage);
                $em->persist($ticket);
                $em->flush();

                //add historique
                $user = $this->get('security.context')->getToken()->getUser();
                $historiqueTicket = new TicketHistorique();
                $historiqueTicket->setAction("En cours");
                $historiqueTicket->setUser($user);
                $historiqueTicket->setDcr(new \DateTime());
                $historiqueTicket->setTicket($ticket);
                $em->persist($historiqueTicket);
                $em->flush();

                //$em->persist($ticketMessage);
                // $em->flush();
                /*------------------------------------Notification-------------------------------------*/
                $listUserForNotif = Constant\NotifUser::getNouveauTicket();

                $libelleNotif = "Un ticket assigné " . $ticket->getUser()->getName() . " a été en cours";
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

                /*----------------Fin notif----------------*/
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_ticket'));
            }
        }
        return $this->render('BackCommandeBundle:ServiceClient:ajouterTicket.html.twig',
            array('form' => $form->createView(),
                'client' => $ClientS,
                'commande' => $ListCommande
            ));
    }

    public function viewTicketAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $request = $this->get('request');
        $ticketMessage = new TicketMessage();
        $historiqueTicket = new TicketHistorique();
        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);



        if (!$ticket->getCommande()) {
            return $this->redirect($this->generateUrl('list_ticket'));

        }

        $commands=$ticket->getCommande();






        $noteTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketNote")->findBy(array("ticket" => $ticket));

        $listeCoupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->findBy(array("command" => $ticket->getCommande(), "vendu" => array(2, 3)));


        $coup_id = [];
        $coupon_consomme=0;
        if($commands->getEtat()==1)
        {
            $coupon_consomme=1;
            foreach ($listeCoupon as $value) {
                array_push($coup_id, $value->getId());
            }
        }

        $checks = $this->getDoctrine()->getRepository("BackCommandeBundle:Checkc")->findBy(array('coupon' =>  $coup_id),array('dcr' => 'DESC'));


        $couponARembouser = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->findCouponARembourser($ticket->getCommande()->getId());

        $form = $this->createForm(new TicketViewType(), $ticket);
        $form1 = $this->createForm(new TicketMessageType(), $ticketMessage);
        //Tools::dump($ticketMessage,true);
        //add historique
        $user = $this->get('security.context')->getToken()->getUser();

        $historiqueTicket->setAction("Vu");
        $historiqueTicket->setUser($user);
        $historiqueTicket->setDcr(new \DateTime());
        $historiqueTicket->setTicket($ticket);
        $em->persist($historiqueTicket);
        $em->flush();
        $data = $request->request->get('ticketbundle_ticketmessage');
        if ($request->getMethod() == 'POST') {
            $form1->handleRequest($this->getRequest());
            if ($form1->isValid()) {
                $ticketMessage->setTicket($ticket);
                $ticketMessage->setUser($user);
                $em->persist($ticketMessage);
                $ticketMessage->upload();
                $em->flush();
                //metre le ticket en cours et jouter dans historique
                if ($ticket->getStatus() != 3) {

                    $ticket->setStatus(2);
                    $em->persist($ticket);
                    $em->flush();

                }
                $historiqueEncour = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketHistorique")->findBy(array("ticket" => $ticket, "action" => "En cours"));
                if (count($historiqueEncour) == 0) {
                    $historiqueTicket->setAction("En cours");
                    $historiqueTicket->setUser($user);
                    $historiqueTicket->setDcr(new \DateTime());
                    $historiqueTicket->setTicket($ticket);
                    $em->persist($historiqueTicket);
                    $em->flush();
                }
//envoye un mail au client
                $subject = "Réponse [ " . $ticketMessage->getTicket()->getCode() . " ]";
                $message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                    ->setTo($ticketMessage->getTicket()->getCommande()->getClient()->getEmail())
                    ->setBody($this->renderView('MainFrontBundle:Email:responseTicket.html.twig', array("ticketMessage" => $ticketMessage)));
                $message->setContentType("text/html");

                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');
                return $this->redirect($this->generateUrl('view_ticket', array("id" => $id)));
            }
            $form->bind($request);
            if ($form->isValid()) {
                //  var_dump($listeCoupon); exit;
                $remboursement = $request->request->get("remboursement");
                $rembours = $request->request->get("rembours");
                if ($rembours) {
                    foreach ($listeCoupon as $value) //  for($count=0;$count<count($remboursement);$count++)
                    {
                        $checkBigFid = $request->request->get("bigfid_" . $value->getId() . "");
                        $checkVirement = $request->request->get("virement_" . $value->getId() . "");
                        $coupon = $this->getDoctrine()->getRepository("BackCommandeBundle:Coupon")->find($value->getId());
                        if ($checkBigFid) {
                            $historiqueBigFid = new BigFidHistorique();
                            $historiqueBigFid->setMontant($request->request->get("prix_" . $value->getId() . ""));
                            $historiqueBigFid->setClient($coupon->getCommand()->getClient());
                            $historiqueBigFid->setMotif("Remboursement commande");
                            $historiqueBigFid->setDcr(new \dateTime());
                            $historiqueBigFid->setOperation(1);

                            $em->persist($historiqueBigFid);
                            $em->flush();
                            $historiqueBigFidId = $historiqueBigFid->getId();
                            //todo send mail en cas remboursement bigfid

                            $message = \Swift_Message::newInstance()
                                ->setSubject('Remboursement relatif au ticket  ' . $ticket->getCode())
                                ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
                                ->setTo($ticket->getCommande()->getClient()->getEmail())
                                ->setBody($this->renderView('MainFrontBundle:Email:remboursementBigFid.html.twig', array("ticket" => $ticket)));
                            $message->setContentType("text/html");
                            $this->get('mailer')->send($message);
                            //To do Notification
                            /*-------------------------------------Notification demande de virement-----------------------------------------------------------------*/

                            $listUserForNotif = Constant\NotifUser::getDemandeRemboursement();
                            $libelleNotif = "L'agent  " . $user->getName() . " a effectué un remboursement au ticket   " . $ticket->getObject() . " par " . $request->request->get("prix_" . $value->getId() . "") . " BIGFid";
                            $lient = $this->generateUrl('view_ticket', array('id' => $ticket->getId()));
                            $icone = "icon-ticket";
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
                        } else {
                            $historiqueBigFidId = null;

                        }
                        if ($checkVirement) {
                            $virement = new Virement();
                            $virement->setMontant($request->request->get("montant_virement_" . $value->getId() . ""));
                            $virement->setEtat(3);
                            $virement->setRib($request->request->get("rib_" . $value->getId() . ""));
                            $em->persist($virement);
                            $em->flush();
                            $virementId = $virement->getId();
                        } else {
                            $virementId = null;

                        }
                        // inserer dans Entity Remboursement
                        if ($virementId or $historiqueBigFidId) {
                            $oldRemboursement = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->findBy(array("coupon" => $value->getId()));
                            foreach ($oldRemboursement as $value1) {
                                $r = $this->getDoctrine()->getRepository("BackCommandeBundle:Remboursement")->find($value1->getId());
                                $em->remove($r);
                                $em->flush();
                            }
                            $remboursement = new Remboursement();
                            $remboursement->setTicket($ticket);
                            $remboursement->setDcr(new \DateTime());
                            $remboursement->setCoupon($coupon);
                            if ($historiqueBigFidId) {
                                $historique = $this->getDoctrine()->getRepository("BackDashBundle:BigFidHistorique")->find($historiqueBigFidId);
                                $remboursement->setHistorique($historique);
                            }
                            if ($virementId) {
                                $virement = $this->getDoctrine()->getRepository("BackCommandeBundle:Virement")->find($virementId);
                                $remboursement->setVirement($virement);
                            }
                            $em->persist($remboursement);
                            $em->flush();
                            if ($virementId) {
                                /*-------------------------------------Notification demande de virement-----------------------------------------------------------------*/

                                $listUserForNotif = Constant\NotifUser::getDemandeRemboursement();
                                $libelleNotif = "L'agent  " . $user->getName() . " a demandé un remboursement par virement au ticket   " . $ticket->getObject();
                                $lient = $this->generateUrl('view_ticket', array('id' => $ticket->getId()));
                                $icone = "icon-ticket";
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
                            $vendu = 4;
                            if ($historiqueBigFidId) {
                                if (!$virementId) {
                                    $vendu = 5;
                                }
                            }
                            // Changer etat coupon
                            $coupon->setVendu($vendu);
                            $em->persist($coupon);
                            $em->flush();
                        }

                    }

                }

                $em->flush();
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_ticket'));
            }
        }
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestions des tickets ", $this->generateUrl("list_ticket"), array());
        $breadcrumbs->addItem("Détails tickets", $this->generateUrl("back_commande"), array());
      //var_dump($checks); exit;
        return $this->render('BackCommandeBundle:ServiceClient:voirTicket.html.twig', array('form1' => $form1->createView()
            , 'form' => $form->createView()
            , 'ticket' => $ticket
            , 'componRembouser' => $couponARembouser
            , 'listeCoupon' => $listeCoupon
            , 'nbrNote' => count($noteTicket)
            ,'dates' => $checks
            ,'consomm' => $coupon_consomme)
    );
    }

    public function messageTicketAction($id)
    {
        $request = $this->get('request');
        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);
        $historiqueTicket = new TicketHistorique();
        $user = $this->get('security.context')->getToken()->getUser();
        $messageTichet = new TicketMessage();

        $em = $this->getDoctrine()->getManager();
        $message = $request->request->get('message');
        $messageTichet->setMessage($message);
        $messageTichet->setUser($user);
        $messageTichet->setDpa(new \DateTime());
        $messageTichet->setTicket($ticket);
        $em->persist($messageTichet);
        $em->flush();

        $ticket->setStatus(2);
        $em->persist($ticket);
        $em->flush();
        //add historique

        $historiqueTicket->setAction("En cour");
        $historiqueTicket->setUser($user);
        $historiqueTicket->setDcr(new \DateTime());
        $historiqueTicket->setTicket($ticket);
        $em->persist($historiqueTicket);
        $em->flush();
        //metre le ticket en cours
        $historiqueEncour = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketHistorique")->findBy(array("ticket" => $ticket, "action" => "En cours"));
        if (count($historiqueEncour) == 0) {
            $historiqueTicket->setAction("En cours");
            $historiqueTicket->setUser($user);
            $historiqueTicket->setDcr(new \DateTime());
            $historiqueTicket->setTicket($ticket);
            $em->persist($historiqueTicket);
            $em->flush();
        }

        //send mail au agent service client
        $subject = " Ticket [ " . $ticket->getCode() . " ]" . $ticket->getObject();
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom(array('contact@bigdeal.tn' => 'Bigdeal.tn'))
            ->setTo($ticket->getCommande()->getClient()->getEmail())
            ->setBody($this->render('MainFrontBundle:Email:notifClientReponseTicket.html.twig', array("ticket" => $ticket)));
        $this->get('mailer')->send($message);

        return $this->redirect($this->generateUrl('view_ticket', array('id' => $id)));

    }

    public function supprimerTicketAction($id, $ticket)
    {
        $em = $this->getDoctrine()->getManager();
        $messageTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketMessage")->find($id);
        if (!$messageTicket) {
            throw new NotFoundHttpException("Message non trouvée");
        }
        $em->remove($messageTicket);
        $em->flush();
        return $this->redirect($this->generateUrl('view_ticket', array('id' => $ticket)));
    }

    public function modifierTicketAction($id, $ticket)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $messageTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketMessage")->find($id);
        if ($request->getMethod() == 'POST') {
            $message = $request->request->get('message');
            $messageTicket->setMessage($message);
            $messageTicket->setDpa(new \DateTime());
            $em->persist($messageTicket);
            $em->flush();

            return $this->redirect($this->generateUrl('view_ticket', array('id' => $ticket)));

        }

        return $this->render('BackCommandeBundle:ServiceClient:editTicket.html.twig', array('message' => $messageTicket, 'id' => $id, 'ticket' => $ticket)
        );
    }

    public function historiqueTicketAction($id)
    {
        $historiqueTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketHistorique")->findBy(array("ticket" => $id),
            array('id' => 'desc'));
        return $this->render('BackCommandeBundle:ServiceClient:historiqueTicket.html.twig', array('historiqueTicket' => $historiqueTicket)
        );
    }

    public function ouvrireTicketAction($id)
    {
        $messageTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketMessage")->findBy(array("ticket" => $id), array("id" => "DESC"));
        foreach ($messageTicket as $value) {
            $client = $value->getClient();
            $agent = $value->getUser();
        }
        if ($agent) {
            $etat = 2;
            $msg = " En cours";
        }

        if ($client) {
            $etat = 1;
            $msg = "Ouvert";
        }

        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);
        $em = $this->getDoctrine()->getManager();
        $ticket->setStatus($etat);
        $em->persist($ticket);
        $em->flush();

        //add historique
        $user = $this->get('security.context')->getToken()->getUser();
        $historiqueTicket = new TicketHistorique();

        $historiqueTicket->setAction($msg);
        $historiqueTicket->setUser($user);
        $historiqueTicket->setDcr(new \DateTime());
        $historiqueTicket->setTicket($ticket);
        $em->persist($historiqueTicket);
        $em->flush();
        return $this->redirect($this->generateUrl('view_ticket', array('id' => $id)));
    }

    public function fermerTicketAction($id)
    {
        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);
        $em = $this->getDoctrine()->getManager();
        $ticket->setStatus(3);
        $em->persist($ticket);
        $em->flush();

        //add historique
        $user = $this->get('security.context')->getToken()->getUser();
        $historiqueTicket = new TicketHistorique();

        $historiqueTicket->setAction("Cloturé");
        $historiqueTicket->setUser($user);
        $historiqueTicket->setDcr(new \DateTime());
        $historiqueTicket->setTicket($ticket);
        $em->persist($historiqueTicket);
        $em->flush();
        /*------------------------------------Notification-------------------------------------*/
        $listUserForNotif = Constant\NotifUser::getOuvrirTicket();

        $libelleNotif = "-	Un ticket assigné à " . $ticket->getUser()->getName() . " a été fermé";
        $libelleNotif1 = "Vous avez fermé une ticket ";
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

        /*----------------Fin notif----------------*/
        return $this->redirect($this->generateUrl('view_ticket', array('id' => $id)));

    }

    public function ListCommandeAction()
    {
        $request = $this->get('request');
        $id = $request->request->get('client');
        $client = $this->getDoctrine()->getRepository('BackCommandeBundle:Client')->find($id);
        $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findBy(array('client' => $client, 'etat' => 1));
        /*  foreach ($commande as $value)
          {
              $reference = $value->getReference();
          }
           echo $id;
    exit;*/
        $arrReference = array();
        foreach ($commande as $value) {
            $arrReference[] = array("id" => $value->getId(),
                "name" => $value->getId() . " - " . $value->getDeal()->getTitle(),

            );

        }
        //var_dump($arrReference); exit;
        return new JsonResponse($arrReference);
    }

    public function noteTicketAction($id)
    {
        $noteTicket = $this->getDoctrine()->getRepository("BackCommandeBundle:TicketNote")->findBy(array("ticket" => $id),
            array('id' => 'desc'));
        return $this->render('BackCommandeBundle:ServiceClient:noteTicket.html.twig', array('noteTicket' => $noteTicket, 'id' => $id)
        );
    }

    public function addNoteTicketAction($id)
    {
        $request = $this->get('request');
        $user = $this->get('security.context')->getToken()->getUser();
        $ticket = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->find($id);
        $em = $this->getDoctrine()->getManager();
        $noteTicket = new TicketNote();
        if ($request->getMethod() == 'POST') {
            $message = $request->request->get('message');

            $noteTicket->setMessage($message);
            $noteTicket->setTicket($ticket);
            $noteTicket->setDcr(new \DateTime());
            $noteTicket->setUser($user);
            $em->persist($noteTicket);
            $em->flush();

            return $this->redirect($this->generateUrl('note_ticket', array('id' => $id)));

        }

        return $this->render('BackCommandeBundle:ServiceClient:addNoteTicket.html.twig', array('id' => $id)
        );
    }
}