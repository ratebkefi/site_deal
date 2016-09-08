<?php

namespace Back\DealBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Back\DashBundle\Common\Tools;
use Back\DealBundle\Form\ReportLivraisonFilterType;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;
class ReportFinancierController extends Controller
{

    public function caisseAction(Request $request)
    {

        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";

        if ($request->getMethod() == 'POST') {
            $response = new StreamedResponse();
            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Date', 'Montant', 'Id Deal', 'Id Reference','Id Caisse','Type'), ';');
                $request = $this->get('request');
                $dateD = $request->request->get("dated");
                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];

                $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListCaisse($firstDate,$endDate);;
                //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
                foreach ($invoice  as $value) {

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
                    if($value->getNumCheque()!=null)
                        $typec='cheque';
                    else
                        $typec='espece';

                    fputcsv($handle, array(utf8_decode($value->getDcr()->format('Y-m-d')),
                        $value->getMontant(),
                        $value->getCommande()->getDeal()->getId(),
                        $idref,
                        $value->getCommande()->getCaisse()->getId(),
                        $typec,
                    ), ';');

                }
                // Query data from database
                fclose($handle);
            });

            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }

        return $this->render('BackDealBundle:ReportCaisse:caisse.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,
        ));
    }

    public function fideliteAction(Request $request)
    {

        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";


        if ($request->getMethod() == 'POST') {
            $response = new StreamedResponse();
            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Date', 'Montant','Caisse Id', 'Id Deal'), ';');
                $request = $this->get('request');
                $dateD = $request->request->get("dated");
                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];




                $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListCaisseBigFid($firstDate,$endDate);
                //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();


                    $typec="";
                    $idref="--";


                    foreach ($invoice  as $value) {

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



                            fputcsv($handle, array(utf8_decode($value->getDcr()->format('Y-m-d')),
                                $value->getMontant()/20,
                                "19",
                                $value->getCommande()->getDeal()->getId(),
                            ), ';');



                }
                // Query data from database
                fclose($handle);
            });

            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }

        return $this->render('BackDealBundle:ReportCaisse:fidelite.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,

        ));


    }

    public function facturepayeAction(Request $request)
    {

        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";


        if ($request->getMethod() == 'POST') {
            $response = new StreamedResponse();
            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');
                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Id Facture','Date', 'Montant', 'Id Deal', 'Id Partenaire'), ';');
                $request = $this->get('request');
                $dateD = $request->request->get("dated");
                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];

                $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListInvPaye($firstDate,$endDate);
                //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
                foreach ($invoice  as $value) {
                    fputcsv($handle, array($value->getNumfacture(),
                        utf8_decode($value->getDvir()->format('Y-m-d')),
                        $value->getVirement(),
                        $value->getDeal()->getId(),
                        $value->getUser()->getId(),
                    ), ';');

                }
                // Query data from database
                fclose($handle);
            });

            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }

        return $this->render('BackDealBundle:ReportCaisse:facturepay.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,

        ));


    }

    public function factureAction(Request $request)
    {

        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";


        if ($request->getMethod() == 'POST') {
            $response = new StreamedResponse();
            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Id facture','Date', 'Id Deal','Id Partenaire','Comission HT','TVA','Comission TTC'), ';');

                $request = $this->get('request');
                $dateD = $request->request->get("dated");
                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];

                $invoice = $this->getDoctrine()->getRepository('BackPartnerBundle:Invoice')->getListInvAll($firstDate,$endDate);
                //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();


                foreach ($invoice  as $value) {

                    fputcsv($handle, array($value->getNumfacture(),
                        utf8_decode($value->getDcr()->format('Y-m-d')),
                        $value->getDeal()->getId(),
                        $value->getUser()->getId(),
                        round(($value->getComFixe()+$value->getComVariable())/1.18, 3),
                        round(($value->getComFixe()+$value->getComVariable())-(($value->getComFixe()+$value->getComVariable())/1.18), 3),
                        $value->getComFixe()+$value->getComVariable(),
                    ), ';');

                }
                // Query data from database
                fclose($handle);
            });

            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }

        return $this->render('BackDealBundle:ReportCaisse:facture.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,

        ));


    }

    public function nouveaudealAction(Request $request)
    {

        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";


        if ($request->getMethod() == 'POST') {

            $response = new StreamedResponse();

            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('ID partenaire', 'libelle'), ';');
                $request = $this->get('request');
                $dateD = $request->request->get("dated");
                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];

                $deal = $this->getDoctrine()
                    ->getRepository('UserUserBundle:User')
                    ->getListDealByCommande($firstDate,$endDate);
                //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
                foreach ($deal  as $value) {

                    fputcsv($handle, array($value->getId(),
                        utf8_decode($value->getTitle()),
                    ), ';');

                }
                // Query data from database
                fclose($handle);
            });

            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }

        return $this->render('BackDealBundle:ReportCaisse:nouveaudeal.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,

        ));


    }

    public function nouveaupartAction(Request $request)
    {

        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";


        if ($request->getMethod() == 'POST') {

            $response = new StreamedResponse();

            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('ID partenaire', 'libelle'), ';');
                $request = $this->get('request');
                $dateD = $request->request->get("dated");

                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];

                $partner = $this->getDoctrine()
                    ->getRepository('UserUserBundle:User')
                    ->getListPartnerByCommande($firstDate,$endDate);
                //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
                foreach ($partner  as $value) {

                    fputcsv($handle, array($value->getId(),
                        utf8_decode($value->getName()),
                    ), ';');

                }

                // Query data from database




                fclose($handle);
            });


            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }




        return $this->render('BackDealBundle:ReportCaisse:nouveaupart.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,

        ));


    }

    public function couponconsommeAction(Request $request)
    {



        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";


        if ($request->getMethod() == 'POST') {

            $response = new StreamedResponse();

            $response->setCallback(function () {
                $handle = fopen('php://output', 'w+');

                // Add a row with the names of the columns for the CSV file
                fputcsv($handle, array('Titre.', 'Nombre Coupon Consommes','Nombre Coupon Non Consomme','Nombre de Coupon Remboursee','Nombre Coupon Facture','Nombre Coupon Non Facture'), ';');
                $request = $this->get('request');
                $dateD = $request->request->get("dated");

                $dateF = $request->request->get("datef");
                $region = $request->request->get("region");
                $dateFin = explode("/", $dateF);
                $dateDebut = explode("/", $dateD);
                $endDate = $dateFin[2] . "-" . $dateFin[1] . "-" . $dateFin[0];
                $firstDate = $dateDebut[2] . "-" .
                    $dateDebut[1] . "-" . $dateDebut[0];

                $deal = $this->getDoctrine()->getRepository("BackDealBundle:Deal")->getDealSearch22($firstDate, $endDate);
            //$planner = $this->getDoctrine()->getRepository("BackPartnerBundle:Invoice")->listPartenaire();
            foreach ($deal as $value) {


                $countCouponConsomme= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponConsomme($value->getId());
                $countCouponNonConsomme= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponNonConsomme($value->getId());
                $countCouponFacture= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponFacture($value->getId());
                $countCouponNonFacture= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponNonFactureR1($value->getId())+$this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponNonFactureR2($value->getId());
                $countCouponRembourse= $this->getDoctrine()->getRepository("BackDealBundle:Deal")->countCouponRemourser($value->getId());


                fputcsv($handle, array(utf8_decode($value->getTitle()),
                    $countCouponConsomme,
                    $countCouponNonConsomme,
                    $countCouponRembourse,
                    $countCouponFacture,
                    $countCouponNonFacture,

                ), ';');

            }

                // Query data from database




                fclose($handle);
            });


            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

            return $response;
        }




        return $this->render('BackDealBundle:ReportCaisse:couponconsomme.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,

        ));


    }


}
