<?php
/**
 * Created by PhpStorm.
 * User: G50
 * Date: 04/03/2015
 * Time: 15:24
 */

namespace Back\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use User\UserBundle\Entity\User;
use Back\CommandeBundle\Form\DafaddType;
use FOS\UserBundle\Event\FormEvent;
use Back\DashBundle\Common\Tools;
use Back\CommandeBundle\Entity\Caisse;
use Back\CommandeBundle\Form\DafFilterType;
use User\UserBundle\Form\UserFilterType;
use Back\CommandeBundle\Form\RetraitType;
use Back\CommandeBundle\Entity\Operation;
use Back\DashBundle\Constant;
use Back\DashBundle\Entity\Notification;
use Back\CommandeBundle\Form\CaisseFilterType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;

class DafController extends Controller
{

    public function ticket158jsonAction(Request $request)
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
        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);

        //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
        foreach ($deal as $value) {
            $idDeal = $value->getId();

            $nombreFacturepayee =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByAll($idDeal, 2);


            $commissionVariable = $value->getPlanning()->getDefaultannexe()->getVariableCommission();
            $prixBigdeal = $value->getPlanning()->getDefaultannexe()->getReference();
            $nbrGratuite = $value->getPlanning()->getDefaultannexe()->getNbrGratuite();

            $minPrix=9999999;

            $price=0;
            foreach($prixBigdeal as $prix)
            {
                if($prix->getBigdealPrice()<$minPrix)
                    $minPrix=$prix->getBigdealPrice();
                $price=$price+$prix->getBigdealPrice();
            }

            $montantGratuite=$minPrix*$nbrGratuite;

            if ($nombreFacturepayee > 0) {

                $montantnonPayecours= $nombreFacturepayee * $price* ((100 - $commissionVariable) / 100) ;
                if ($montantnonPayecours < 0)
                    $montantnonPayecours= 0;
            } else {
                $montantnonPayecours= (($nombreFacturepayee * $price)- $montantGratuite) * ((100 - $commissionVariable) / 100) ;
                if ($montantnonPayecours < 0)
                    $montantnonPayecours= 0;

            }


            $planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listVirement($idDeal);

            foreach ($planner as $values) {
                if ($values['name'] != null) {
                    $array[] = array(
                        "title" => $value->getTitle(),
                        "name" => $values['name'],
                        "etat" => $values['etat'],
                        "virement" => $values['virem'],
                        "montantnonPayecours" => $montantnonPayecours,
                        "total" => $montantnonPayecours+$values['virem'],

                    );
                }
            }
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket163jsonAction(Request $request)
    {
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);

        //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
        foreach ($deal as $value) {

            $countCouponConsomme= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponConsomme($value->getId());
            $countCouponNonConsomme= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponNonConsomme($value->getId());
            $countCouponFacture= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponFacture($value->getId());
            $countCouponNonFacture= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponNonFactureR1($value->getId())+$this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponNonFactureR2($value->getId());
            $countCouponRemourser= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponRemourser($value->getId());

            $array[] = array(
                "title" => $value->getTitle(),
                "countCouponConsomme" => $countCouponConsomme,
                "countCouponNonConsomme" => $countCouponNonConsomme,
                "countCouponFacture" => $countCouponFacture,
                "countCouponNonFacture" => $countCouponNonFacture,
                "countCouponRemourser" => $countCouponRemourser,

            );

        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket164jsonAction(Request $request)
{


    $dateD = $request->request->get("dated");
    $dateF = $request->request->get("datef");
    $region = $request->request->get("region");
    $dateFin = explode("/", $dateF);
    $dateDebut = explode("/", $dateD);
    $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
    $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

    //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);

    $partner = $this->getDoctrine()
        ->getRepository('UserUserBundle:User')
        ->getListPartnerByCommande($firstDate,$endDate);

    //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
    foreach ($partner as $value) {
        $array[] = array(
            "id" => $value->getId(),
            "name" => $value->getName(),
        );
    }
    $response = new Response(json_encode($array));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
}
    public function ticket165jsonAction(Request $request)
{
    $dateD = $request->request->get("dated");
    $dateF = $request->request->get("datef");
    $region = $request->request->get("region");
    $dateFin = explode("/", $dateF);
    $dateDebut = explode("/", $dateD);
    $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
    $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

    //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);

    $deal = $this->getDoctrine()
        ->getRepository('UserUserBundle:User')
        ->getListDealByCommande($firstDate,$endDate);

    //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
    foreach ($deal as $value) {
        $array[] = array(
            "id" => $value->getId(),
            "name" => $value->getTitle(),
        );
    }
    $response = new Response(json_encode($array));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
}
    public function ticket166jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);

        $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListInvAll($firstDate,$endDate);

        //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
        foreach ($invoice as $value) {
            $array[] = array(
                "date" => $value->getDcr(),
                "iddeal" => $value->getDeal()->getId(),
                "idpart" => $value->getUser()->getId(),
                "commht" => round(($value->getComFixe()+$value->getComVariable())/1.18, 3),
                "tva" =>round(($value->getComFixe()+$value->getComVariable())-(($value->getComFixe()+$value->getComVariable())/1.18), 3),
                "montantttc" => ($value->getComFixe()+$value->getComVariable()),
            );
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket167jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);
        $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListInvPaye($firstDate,$endDate);
        //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
        foreach ($invoice as $value) {
            $array[] = array(
                "date" => $value->getDvir(),
                "montant" => $value->getVirement(),
                "iddeal" => $value->getDeal()->getId(),
                "idpart" => $value->getUser()->getId(),
            );
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket168jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);
        $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListCaisseBigFid($firstDate,$endDate);
        //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
        foreach ($invoice as $value) {

            $typec="";
            $idref="--";
            if($value->getNumCheque()!=null)
            {
                $typec='cheque';
                $idref=$value->getNumCheque();
                $idref=sprintf('%07d',$idref);
            }

            else
            {
                $typec='espece';
                $idref="----";
            }

            $array[] = array(
                "date" => $value->getDcr(),
                "montant" => $value->getMontant()/20,
                "iddeal" => $value->getCommande()->getDeal()->getId(),
                "idref" => $idref,
                "idcaisse" => $value->getCommande()->getCaisse()->getId(),
                "typec" => $typec,
            );
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket169jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate,$region);
        $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListCaisse($firstDate,$endDate);
        //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
        foreach ($invoice as $value) {

            $typec="";
            $idref="--";
            if($value->getNumCheque()!=null)
            {
                $typec='cheque';
                $idref=$value->getNumCheque();
                $idref=sprintf('%07d',$idref);
            }

            else
            {
                $typec='espece';
                $idref="----";
            }

            $array[] = array(
                "date" => $value->getDcr(),
                "montant" => $value->getMontant(),
                "iddeal" => $value->getCommande()->getDeal()->getId(),
                "idref" => $idref,
                "idcaisse" => $value->getCommande()->getCaisse()->getId(),
                "typec" => $typec,
            );
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function ticket161jsonAction(Request $request)
    {
        $listPartenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");

        foreach ($listPartenaire as $value) {
            $totalDeal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->totalDeal($value->getId());
            if ($totalDeal > 0 ) {

                $nombreAcheteurParMarchant = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->totalAcheteurMarchant($value->getId());
                $totalRemourementParMarchant = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->totalRembursementMarchant($value->getId());
                $totalReclammationParMarchant = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->totalReclamationsMarchant($value->getId());
                $cABigDeal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->totalChiffreAffaireBigdeal($value->getId());
                $totalCABigDeal = 0;
                $ca = 0;
                foreach ($cABigDeal as $item) {
                    $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findBy(array("defaultannexe" => $item->getId()));
                    $chiffreAffaireDeal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getChiffreAffaire($planning[0]->getDeal()->getId());
                    $ca += $chiffreAffaireDeal;
                    $commissionVariable = $planning[0]->getDefaultannexe()->getVariableCommission();
                    $commissionFixe = $planning[0]->getDefaultannexe()->getFixedCommission();
                    $totalCABigDeal += ($chiffreAffaireDeal * $commissionVariable) / 100 + $commissionFixe;

                }
                $totalCAMarchant = $ca - $totalCABigDeal;
if(($nombreAcheteurParMarchant!=0)&&($totalReclammationParMarchant!=0))
{
    $taux_reclammation=round(($totalReclammationParMarchant/$nombreAcheteurParMarchant)*100);
}
else $taux_reclammation=0;
                $array[] = array(
                    "id" => $value->getId(),
                    "partenaire" => $value->getName(),
                    "totalDeal" => $totalDeal,
                    "nbrAcheteur" => $nombreAcheteurParMarchant,
                    "remboursement" => $totalRemourementParMarchant,
                    "reclammation" => $totalReclammationParMarchant,
                    "taux_reclammation" => $taux_reclammation,
                    "caBigeal" => $totalCABigDeal,
                    "caMarchant" => $totalCAMarchant,
                );
            }
        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
    public function ticket162jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        $commercial = $request->request->get("commercial");


        $marchand = $this->getDoctrine()->getRepository("UserUserBundle:User")->getListMarchandByDate($commercial,$firstDate,$endDate);
        foreach ($marchand as $value) {
            if ($value->getProtocol()->getCommercial()) {
                $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findBy(array("defaultannexe" => $value->getId()));

                if ($planning) {
                    $commissionVariable = $planning[0]->getDefaultannexe()->getVariableCommission();
                    $commissionFixe = $planning[0]->getDefaultannexe()->getFixedCommission();
                    $chiffreAffaireDeal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getChiffreAffaire($planning[0]->getDeal()->getId());
                    $chiffreAffaireBigDeal = ($chiffreAffaireDeal * $commissionVariable) / 100 + $commissionFixe;
                    $publier = "Oui";
                } else {
                    $chiffreAffaireBigDeal = 0;
                    $publier = "Non";
                }
                $array[] = array(
                    "partenaire" => $value->getProtocol()->getUser()->getName(),
                    "annexe" => $value->getObject(),
                    "Commission" => $value->getVariableCommission(),
                    "publier" => $publier,
                    "caBigeal" => $chiffreAffaireBigDeal,
                    "commercial" => $value->getProtocol()->getCommercial()->getName(),
                );
            }


        }
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
    public function ticket159jsonAction(Request $request)
    {
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");
        
        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        $nb_jours = Tools::date_diff2($firstDate, $endDate);
        $jour_apres = Tools::toStamp2($firstDate) - (60 * 60 * 24);

        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch2($firstDate, $endDate,$region);
        $totalcabigdeal=0;
        $totalfactureenattente=0;
        $totalmontantfacturee=0;
        $totalmontantnonfacturee=0;
        $array=array();
        foreach ($deal as $value) {


            $partenaire = $value->getPlanning()->getDefaultannexe()->getProtocol()->getUser()->getName();
            $prixBigdeal = $value->getPlanning()->getDefaultannexe()->getReference();
            $commissionVariable = $value->getPlanning()->getDefaultannexe()->getVariableCommission();
            $commissionFixe = $value->getPlanning()->getDefaultannexe()->getFixedCommission();
            $nbrGratuite = $value->getPlanning()->getDefaultannexe()->getNbrGratuite();
            $nombreFacturepayee = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->NbrFacturePayee($value->getId());
            $nombreFactureEnAttente = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->NbrFactureEnAttente($value->getId());
            $montantFactureAttente = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->montantFactureEnattente($value->getId());
            $montantFactureEtPaye = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->montantFactureEtPaye( $value->getId());
            $montantNonPaye = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->montantNonFacturee( $value->getId());
            $chiffreAffaire = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getChiffreAffaire($value->getId());
            $listPrix=array();
            $listacheteur=array();
            $listCouponFacturer=array();
            $minPrix=9999;
            $prixencour=0;
            $montantRemboursement=0;
            foreach($prixBigdeal as $prix)
            {
                $prixencour=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByPrice($prix->getId(),$value->getId());
                $montantRemboursement=$montantRemboursement+$prixencour;

                if($prix->getBigdealPrice()<$minPrix)
                    $minPrix=$prix->getBigdealPrice();
                $listPrix[] = array(
                    "price" =>  $prix->getBigdealPrice() ." TND <br/>"
                );
                $listacheteur[] = array(
                    "nbacheteur" => $this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByReferenceRecap($prix->getId(),$value->getId())."  <br/>"
            );
                $listCouponFacturer[] = array(
                    "nbrCouponFacture" => $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 3)."  <br/>"
            );
                $listCouponNonConso[] = array(
                    "nbrNonConso" => $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 1)."  <br/>"
            );

                $listReboursement[] = array(
                    "nbrRemboursent" => $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->NbrRembByRef($value->getId(),$prix->getId())."  <br/>"

                );

               // $nbacheteurencours =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByReferenceRecap($prix->getId());
                //$listCouponFacturerencours =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 3);
                //$listCouponConsoencours =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 2);

                $listCouponNonFacturer[] = array(
                    //"nbrCouponNonFacture" => $nbacheteurencours-$listCouponFacturerencours-$listCouponConsoencours."  <br/>"
                    "nbrCouponNonFacture" => $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 2)."  <br/>"
                );
            }
            $montantGratuite=$minPrix*$nbrGratuite;
            $cabigdeal=(($chiffreAffaire-$montantGratuite-$montantRemboursement)*($commissionVariable/100)+$commissionFixe);
            //$cabigdeal=$montantRemboursement;
            $compt=0;
            foreach($prixBigdeal as $prix) {

                if ($nombreFacturepayee > 0) {

                    $montantnonPayecours= $listCouponNonFacturer[$compt]["nbrCouponNonFacture"] * $listPrix[$compt]["price"]* ((100 - $commissionVariable) / 100) ;

                    if ($montantnonPayecours < 0)
                        $montantnonPayecours= 0;
                    $listmontantnonPaye[] = array(
                        //"nbrCouponNonFacture" => $nbacheteurencours-$listCouponFacturerencours-$listCouponConsoencours."  <br/>"
                        "montantnonPaye" => $montantnonPayecours."  <br/>"
                    );

                } else {
                    $montantnonPayecours= (($listCouponNonFacturer[$compt]["nbrCouponNonFacture"] * $listPrix[$compt]["price"])- $montantGratuite) * ((100 - $commissionVariable) / 100) ;
                    if ($montantnonPayecours < 0)
                        $montantnonPayecours= 0;
                    $listmontantnonPaye[] = array(
                        //"nbrCouponNonFacture" => $nbacheteurencours-$listCouponFacturerencours-$listCouponConsoencours."  <br/>"
                        "montantnonPaye" => $montantnonPayecours."  <br/>"
                    );
                }
                $compt=$compt+1;

            }
            $array[] = array(
                "id" => $value->getId(),
                "title" => $value->getTitle(),
                "partenaire" => $partenaire,
                "price" => $listPrix,
                "comm_fixe" => $commissionFixe,
                "comm_var" => $commissionVariable,
                "ca" =>$cabigdeal ,
                "nbrAcheteur" => $listacheteur,
                "nbrNonConso" => $listCouponNonConso,
                "nbrRemboursent" => $listReboursement,
                "nbrGratuite" => $nbrGratuite,
                "nbrCouponFacture" => $listCouponFacturer,
                "nbrCouponNonFacture" => $listCouponNonFacturer,
                "nbrFacturePayee" => $nombreFacturepayee,
                "nbrFactureEnAttente" => $nombreFactureEnAttente,
                "montantFactureEtPaye" => $montantFactureEtPaye,
                "montantFactureAttente" => $montantFactureAttente,
                "montantnonPaye" => $listmontantnonPaye,
            );

            unset($listPrix);
            unset($listCouponNonConso);
            unset($listCouponFacturer);
            unset($listCouponNonFacturer);
            unset($listReboursement);
            unset($listmontantnonPaye);




        }

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
    public function ticket160jsonAction(Request $request)
    {

        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");
        $region = $request->request->get("region");


        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];



        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch2($firstDate, $endDate,$region);

        $totalcabigdeal=0;
        $totalfactureenattente=0;
        $totalmontantfacturee=0;
        $totalmontantnonfacturee=0;
        $totalcamarchand=0;
        $array=array();
        foreach ($deal as $value) {


            $partenaire = $value->getPlanning()->getDefaultannexe()->getProtocol()->getUser()->getName();
            $prixBigdeal = $value->getPlanning()->getDefaultannexe()->getReference();
            $commissionVariable = $value->getPlanning()->getDefaultannexe()->getVariableCommission();
            $commissionFixe = $value->getPlanning()->getDefaultannexe()->getFixedCommission();
            $nbrGratuite = $value->getPlanning()->getDefaultannexe()->getNbrGratuite();
            $nbacheteur= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByDealRecap($value->getId());
            $chiffreAffaire = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getChiffreAffaire($value->getId());
            $objectifCas=$value->getPlanning()->getCa();
            $nbrRemb=$this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->NbrRemb($value->getId());
            $listPrix=array();
            $listacheteur=array();
            $minPrix=9999;
            $prixencour=0;
            $price=0;
            $montantRemboursement=0;
            $nbracheteurcours=0;
            $camarchant=0;
            foreach($prixBigdeal as $prix)
            {
                $prixencour=$this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByPrice($prix->getId(),$value->getId());
                $montantRemboursement=$montantRemboursement+$prixencour;
                $price=$price+$prix->getBigdealPrice();
                if($prix->getBigdealPrice()<$minPrix)
                    $minPrix=$prix->getBigdealPrice();
                $listPrix[] = array(
                    "price" =>  $prix->getBigdealPrice() ." TND <br/>"
                );
                $listacheteur[] = array(
                    "nbacheteur" => $this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByReferenceRecap($prix->getId(),$value->getId())."  <br/>"
                );

                $listCouponNonConso[] = array(
                    "nbrNonConso" => $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 1)."  <br/>"
                );

                $listReboursement[] = array(
                    "nbrRemboursent" => $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->NbrRembByRef($value->getId(),$prix->getId())."  <br/>"

                );

                // $nbacheteurencours =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByReferenceRecap($prix->getId());
                //$listCouponFacturerencours =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 3);
                //$listCouponConsoencours =$this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 2);


            }

            $montantGratuite=$minPrix*$nbrGratuite;
            $cabigdeal=(($chiffreAffaire-$montantGratuite-$montantRemboursement)*($commissionVariable/100)+$commissionFixe);
            $listcamarchant=array();
            $nbracheteurcours=0;
            foreach($prixBigdeal as $prix)
            {
                $nbrNonConsoencours = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getCouponByRef($value->getId(),$prix->getId(), 1);
                $nbracheteurcours = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteurByReferenceRecap($prix->getId(),$value->getId());
                $camarchant=$camarchant+(($nbracheteurcours-$nbrRemb-$nbrNonConsoencours)*$prix->getBigdealPrice());

            }
            $camarchant=($camarchant-$montantGratuite)*((100-$commissionVariable)/100);

            if($camarchant<0)
                $camarchant=0;

            //$cabigdeal=$montantRemboursement;
            $compt=0;
            $totalcamarchand=$totalcamarchand+$camarchant;

            $array[] = array(
                "id" => $value->getId(),
                "title" => $value->getTitle(),
                "partenaire" => $partenaire,
                "price" => $listPrix,
                "comm_fixe" => $commissionFixe,
                "comm_var" => $commissionVariable,
                "nbrAcheteur" => $listacheteur,
                "nbrNonConso" => $listCouponNonConso,
                "nbrRemboursent" => $listReboursement,
                "nbrGratuite" => $nbrGratuite,
                "camarchant" => $camarchant,
                "ca" =>$cabigdeal ,
                "objectifCa" =>$objectifCas ,
                "objectifRealise" =>($cabigdeal/$objectifCas)*100 ,
                "totalcamarchand" =>$camarchant ,

            );

            unset($listPrix);
            unset($listCouponNonConso);
            unset($listReboursement);
            unset($listcamarchant);




        }

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;










// BYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY-----------------------------------------------------//
        $region = $request->request->get("region");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");



        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];
        $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch2($firstDate, $endDate,$region);
        //$deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch1($firstDate, $endDate);
        $array=array();

        foreach ($deal as $value) {

            $partenaire = $value->getPlanning()->getDefaultannexe()->getProtocol()->getUser()->getName();
            $prixBigdeal = $value->getPlanning()->getDefaultannexe()->getReference();
            $commissionVariable = $value->getPlanning()->getDefaultannexe()->getVariableCommission();
            $commissionFixe = $value->getPlanning()->getDefaultannexe()->getFixedCommission();
            $nombreAcheteur = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->findAcheteur($value->getId());
            $nbrReboursement = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->NbrRemb($value->getId());
            $nbrGratuite = $value->getPlanning()->getDefaultannexe()->getNbrGratuite();
            $chiffreAffaireDeal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getChiffreAffaire($value->getId());
            $chiffreAffaire = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getChiffreAffaire($value->getId());
            $nombreFacturepayee = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->NbrFacturePayee($value->getId());
            $montantFactureEtPaye = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->montantFactureEtPaye( $value->getId());

            $listPrix=array();
            $minPrix=9999;
            foreach ($prixBigdeal as $prix) {

                $listPrix[] = array(
                    "price" => $prix->getBigdealPrice() . " TND <br/>"
                );

                if($prix->getBigdealPrice()<$minPrix)
                    $minPrix=$prix->getBigdealPrice();
            }
            if($chiffreAffaireDeal!=null)
            {$chiffreAffaireDeal=$chiffreAffaireDeal;}
            else
                $chiffreAffaireDeal=0;

            $montantGratuite=$minPrix*$nbrGratuite;

            $chiffreAffaireBigDeal=($chiffreAffaire*($commissionVariable/100)+$commissionFixe)+$montantGratuite;



            $montantnonPaye=0;
            if($montantFactureEtPaye==0)
                $montantnonPaye = $chiffreAffaire-$chiffreAffaireBigDeal-$montantGratuite;
            else
                $montantnonPaye = $chiffreAffaire-$chiffreAffaireBigDeal-$montantFactureEtPaye;

            if($montantnonPaye<0)
                $montantnonPaye=0;

            if($montantFactureEtPaye>0)
                $montantFactureEtPaye-=.5*$nombreFacturepayee;

            $chiffreAffairearchant = $montantFactureEtPaye + $montantnonPaye;
            $array[] = array(
                "id" => $value->getId(),
                "title" => $value->getTitle(),
                "partenaire" => $partenaire,
                "price" => $listPrix,
                "comm_fixe" => $commissionFixe,
                "comm_var" => $commissionVariable,
                "caDeal" => $chiffreAffaireDeal,
                "caBigeal" => $chiffreAffaireBigDeal,
                "caMarchant" => $chiffreAffairearchant,
                "objectifCABigDeal" => $value->getPlanning()->getCa(),
                "ObjectifRealise" => round(($chiffreAffaireBigDeal / $value->getPlanning()->getCa())*100 ). " %",
                "zone" => $value->getPlanning()->getRegionId()->getName(),
                "nbrBigdealAcheteur" => $nombreAcheteur,
                "nbrRemboursent" => $nbrReboursement,
                "nbrGratuite" => $nbrGratuite,
            );
            unset($listPrix);

        }


        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
    public function daf9jsonAction(Request $request)
            {
                $user = $request->request->get("user");
                $deal = $request->request->get("deal");
                $dateD = $request->request->get("dated");
                $dateF = $request->request->get("datef");

                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

                $montantCheque = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->getChequeMontantCaisse($deal, $user, $firstDate, $endDate);

                $montantEspece = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->getEspeceMontantCaisse($deal, $user, $firstDate, $endDate);
                $total = $montantEspece + $montantCheque;
                if ($montantCheque != 0)
                    $Arrresult["cheque"] = $montantCheque;
                else
                    $Arrresult["cheque"] = 0;
                if ($montantEspece != 0)
                    $Arrresult["espece"] = $montantEspece;
                else
                    $Arrresult["espece"] = 0;

                $Arrresult["total"] = $total;
                $response = new Response(json_encode($Arrresult));

                $response->headers->set('Content-Type', 'application/json');

                return $response;

    }
    public function ticket157jsonAction(Request $request)
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
                "moyen" => round($moyen, 2)
            );


        }
        var_dump($array);
        exit;

        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    public function daf8jsonAction(Request $request)
    {
        $user = $request->request->get("user");
        $deal = $request->request->get("deal");
        $dateD = $request->request->get("dated");
        $dateF = $request->request->get("datef");

        $dateFin = explode("/", $dateF);
        $dateDebut = explode("/", $dateD);
        $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
        $firstDate = $dateDebut[2] . "-" . $dateDebut[1] . "-" . $dateDebut[0];

        $volumeCheque = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->getChequeVolumeCaisse($deal, $user, $firstDate, $endDate);

        $volumeEspece = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->getEspeceVolumeCaisse($deal, $user, $firstDate, $endDate);
        $total = $volumeCheque + $volumeEspece;
        if ($volumeCheque != 0)
            $Arrresult["cheque"] = round($volumeCheque * 100 / $total, 2);
        else
            $Arrresult["cheque"] = 0;
        if ($volumeEspece != 0)
            $Arrresult["espece"] = round($volumeEspece * 100 / $total, 2);
        else
            $Arrresult["espece"] = 0;

        $response = new Response(json_encode($Arrresult));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    public function viewAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur administratif et financier", $this->generateUrl("list_daf"), array());
        $breadcrumbs->addItem("Afficher un directeur administratif et financier", "show_daf", array());
        return $this->render('BackCommandeBundle:Daf:show.html.twig', array('entity' => $user));
    }
    public function caisseAction($id, Request $request)
    {


        $curentUser = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);

        $this->get('security.context')->getToken()->getUser();
        $roles = $this->get('security.context')->getToken()->getUser()->getRoles();
        $currentCaisse = $curentUser->getCaisse();
        /*
         * filtre de recheche
         */

        $request->get('request');
        $form = $this->createForm(new CaisseFilterType());
        //Tools::dump($request->query,true);
        $data = $request->query->get('back_commandebundle_caissefilter');
        $data = Tools::dropNull($data);
        $data['etat'] = 1;
        if (in_array("ROLE_ADMIN", $roles) || in_array("RESPONSABLECAISSE", $roles)) {
            // echo $data['paypar'];
            //RESPONSABLECAISSIER

            if (isset($data['paypar'])) {
                $casseSelectionner = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Caisse')
                    ->find($data['paypar']);
                $caisse = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Caisse')
                    ->findBy(array('user' => $casseSelectionner->getUser()));

            } else {
                $caisse = $this->getDoctrine()
                    ->getRepository('BackCommandeBundle:Caisse')
                    ->find($currentCaisse);
            }

        } else {
            $data['paypar'] = $currentCaisse->getId();
            $caisse = $this->getDoctrine()
                ->getRepository('BackCommandeBundle:Caisse')
                ->findBy(array('user' => $curentUser));
        }


        $form->bind($request);
        $commande = $this->getDoctrine()->getRepository('BackCommandeBundle:Caisse')->getListCmdCaisse($data);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $commande, $request->query->get('page', 1), 25
        );

        return $this->render('BackCommandeBundle:Daf:caisse.html.twig', array('entities' => $commande, 'pagination' => $pagination, 'caisse' => $caisse, 'form' => $form->createView()));
    }
    public function indexAction()
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur administratif et financier", $this->generateUrl("list_daf"), array());
        $request = $this->get('request');
        $form = $this->createForm(new DafFilterType());
        $form->bind($request);
        $data = $request->query->get('back_commandebundle_daf');
        $data = Tools::dropNull($data);
        $data['roles'] = "DAF";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->findBy($data);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $partner,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('BackCommandeBundle:Daf:index.html.twig', array('form' => $form->createView(), 'entities' => $partner, 'pagination' => $pagination,));
    }

    public function editAction($id)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur administratif et financier", $this->generateUrl("list_responsablecaissier"), array());
        $breadcrumbs->addItem("Modifier directeur administratif et financier", "edit_daf", array());
        $request = $this->get('request');
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:USer')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new DafaddType(), $partner);
        $form->handleRequest($request);

        if ($form->isValid()) {
            if (!$partner->getCaisse()) {
//Ajouter une caisse
                $caisse = new Caisse();
                $caisse->setUser($partner);
                $caisse->setDateUpdate(new \DateTime());
                $caisse->setMontantCheque(0);
                $caisse->setLibelle(null);
                $caisse->setLatitude(null);
                $caisse->setLongitude(null);
                $caisse->setAdresse(null);
                $caisse->setHoraire(null);
                $caisse->setTel(null);
                $caisse->setMontantEspece(0);
                $caisse->setAfficher(0);
                $em->persist($caisse);
                $em->flush();
            }
            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

            return $this->redirect($this->generateUrl('list_daf'));
        }
        return $this->render('BackCommandeBundle:Daf:edit.html.twig', array('form' => $form->createView(), 'partner' => $partner)
        );
    }

    public function addAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur administratif et financier", $this->generateUrl("list_daf"), array());
        $breadcrumbs->addItem("Ajouter directeur administratif et financier", "add_daf", array());
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(new DafaddType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $userManager = $this->container->get('fos_user.user_manager');
                $event = new FormEvent($form, $request);
                $om = $this->container->get('doctrine.orm.entity_manager');
                $newpassword = Tools::randomPassword();
                $user->setPlainPassword($newpassword);
                $user->setRoles(array('DAF' => 'DAF'));
                $user->setEnabled(true);
                $user->setUsername($user->getEmail());
                $em = $this->getDoctrine()->getManager();
                $userManager->createUser($user);

                $om->persist($user);
                $om->flush();
                $caisse = new Caisse();
                $caisse->setUser($user);
                $caisse->setDateUpdate(new \DateTime());
                $caisse->setMontantCheque(0);
                $caisse->setLibelle(null);
                $caisse->setLatitude(null);
                $caisse->setLongitude(null);
                $caisse->setAdresse(null);
                $caisse->setHoraire(null);
                $caisse->setTel(null);
                $caisse->setMontantEspece(0);
                $caisse->setAfficher(0);
                $em->persist($caisse);
                $em->flush();
                $this->get('session')->getFlashBag()->set('error', 'Elément enregistré avec succès');

                return $this->redirect($this->generateUrl('list_daf'));
            } else {
                //echo $form->getErrors();
            }
        }
        return $this->render('BackCommandeBundle:Daf:add.html.twig', array('form' => $form->createView(),));
    }

    public function schowAction(User $user)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Gestion des directeur administratif et financier", $this->generateUrl("list_daf"), array());
        $breadcrumbs->addItem("Afficher directeur administratif et financier", "showw_daf", array());
        return $this->render('BackCommandeBundle:Daf:show.html.twig', array('entity' => $user,));
    }

    public function retraitAction($id, Request $request)
    {

        $request = $this->get('request');
        $montantEspeces = 0;
        $montantCheques = 0;
        $modePayement = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:PaymentMethod')
            ->getListMethode();
        $utilisateur = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->find($id);
        $user = $this->getDoctrine()
            ->getRepository('BackCommandeBundle:Caisse')
            ->findBy(array("user" => $id));

        foreach ($user as $value) {
            $montantEspeces = $value->getMontantEspece();
            $montantCheques = $value->getMontantCheque();
        }

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RetraitType(), $user);
        $form->handleRequest($request);
        // if ($request->getMethod() == 'POST') {


        if ($montantEspeces + $montantCheques > 0) {

            $mode = array(1, 2);
            //$espece = $request->request->get('espece');
            $caisse = $utilisateur->getCaisse();
            //perssiste caisse

            for ($count = 0; $count < count($mode); $count++) {
                if ($mode[$count] == 1) {
                    if ($montantEspeces > 0) {
                        //update caisse reponsable caisse
                        $caisseResp = $this->get('security.context')->getToken()->getUser()->getCaisse();
                        //perssiste caisse
                        $caisseResp->setDateUpdate(new \DateTime());
                        $caisseResp->setMontantEspece($caisseResp->getMontantEspece() + $montantEspeces);
                        $em->persist($caisseResp);
                        $em->flush();

                        //update caisse caissier
                        $caisse->setDateUpdate(new \DateTime());
                        $caisse->setMontantEspece(0);
                        $em->persist($caisse);
                        $em->flush();
                        //update operation
                        $modePayement = $this->getDoctrine()
                            ->getRepository('BackCommandeBundle:PaymentMethod')
                            ->find($mode[$count]);
                        $operation = new Operation();
                        $operation->setModepayement($modePayement);
                        $operation->setType(2);
                        $operation->setMontant($montantEspeces);
                        //$operation->setUser($user = $this->get('security.context')->getToken()->getUser());
                        $operation->setUser($utilisateur);
                        $operation->setDaf($user = $this->get('security.context')->getToken()->getUser());

                        $em->persist($operation);
                        $em->flush();
                    }
                }
                if ($mode[$count] == 2) {
                    if ($montantCheques > 0) {
                        //update caisse reponsable caisse en cas de cheque
                        $caisseResp = $this->get('security.context')->getToken()->getUser()->getCaisse();
                        //perssiste caisse
                        $caisseResp->setDateUpdate(new \DateTime());
                        $caisseResp->setMontantCheque($caisseResp->getMontantCheque() + $montantCheques);

                        $em->persist($caisseResp);
                        $em->flush();

                        //update caisse caissier en cas de cheque
                        $caisse->setDateUpdate(new \DateTime());
                        $caisse->setMontantCheque(0);
                        $em->persist($caisse);
                        $em->flush();
                        //update operation
                        $modePayement = $this->getDoctrine()
                            ->getRepository('BackCommandeBundle:PaymentMethod')
                            ->find($mode[$count]);

                        $operation = new Operation();
                        $operation->setModepayement($modePayement);
                        $operation->setType(2);
                        $operation->setMontant($montantCheques);
                        $operation->setTitulaire(null);
                        $operation->setNumCheque(null);
                        $operation->setUser($utilisateur);
                        $operation->setDaf($user = $this->get('security.context')->getToken()->getUser());
                        $em->persist($operation);
                        $em->flush();


                    }
                }
            }
            $totalSomme = $montantEspeces + $montantCheques;
            /*-------------------------------------Notification-----------------------------------------------------------------*/

            $listUserForNotif = Constant\NotifUser::getValidationDEAL();
            $libelleNotif = "Le directeur administratif et financier " . $operation->getUser()->getName() . " a effectué un retrait d’un total de " . $totalSomme . " DT de la caisse " . $caisse->getLibelle() . " le " . $caisse->getDateUpdate()->format('d-m-Y H:i:s');
            $lient = $this->generateUrl('mon_caisse');
            $icone = "icon-dollar";
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
            $this->get('session')->getFlashBag()->set('alert-success', 'Le montant a été retiré avec succès!');

            return $this->redirect($this->generateUrl('list_responsablecaissier'));

        } else {
            $this->get('session')->getFlashBag()->set('alert-error', 'La caisse est vide!');

            return $this->redirect($this->generateUrl('list_responsablecaissier'));
        }
        /* }
         return $this->render('BackCommandeBundle:ResponsableCaissier:retrait.html.twig', array('form' => $form->createView(),  "modepayement" => $modePayement,  "id" => $id));
        */

    }

}