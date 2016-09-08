<?php

namespace Back\DashBundle\Controller;

use Guzzle\Http\Message\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Back\DashBundle\Common\Tools;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse as StreamedResponse;

class DefaultController extends Controller
{

    public function TicketsClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:tiecketsclient.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function NombreTicketsClientAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();

        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();

        return $this->render('BackDashBundle:Default:nombretickets.html.twig', array(
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,
        ));

    }

    public function MessageClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:nombremessage.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function TraitementClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:delaitraitement.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function MontantRemboursementsClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:montantremboursements.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function NombreRemboursementClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:nombreremboursement.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function VolumeCouponsClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:volumecoupons.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }
    public function NombreCommandeClientAction()
    {



        $dt = new \DateTime();
        $dt2 = new \DateTime("-1 month");



        $dti = $dt->format('m-d-Y');
        $dti2 = $dt2->format('m-d-Y');



        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $data['roles'] = "PARTENAIRE";
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartnerByDealValide($dti,$dti2);

        return $this->render('BackDashBundle:Default:nombrecommande.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }


    public function NombreTotalCommandeClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:nombretotalcommande.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function StatistiqueClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:statistiqueclient.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));



        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
        $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
        return $this->render('BackDashBundle:Default:statistiqueclient.html.twig', array(
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "delaiMoin24" => $delaiMoin24,
        ));

    }


    public function RecapitulatifClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatifclient.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function RecapitulatifRemboursementAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatifremboursement.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function RecapitulatifFacturationDeuxAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatiffacturationdeux.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }
    public function RecapitulatifFacturationCAAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatiffca.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }
    public function RecapitulatifFacturationUnAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatiffacturationun.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }
    public function RecapitulatifPerformancesMarchantAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatifperformance.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }
    public function RecapitulatifPerformancesCommAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        return $this->render('BackDashBundle:Default:recapitulatifperformancecomm.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,
            "commercial" => $commercial,

        ));

    }


    public function RecapitulatifCommentairesAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:recapitulatifcommentaires.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }



    public function FactCoupNbCoupFinancierAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:factcoupnbcoup.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));
    }

    public function FactCoupPrixCoupFinancierAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:factcoupprix.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function VolumePaiementFinancierAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:volumepaiement.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function VolumeCaisseFinancierAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:volumecaisse.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function MontantCaisseFinancierAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:montantcaisse.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function MontantRemboursementsFinancierAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:montantremboursementsfinancier.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function ChiffreAffaireTousDealCommercialAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $commecial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:chiffreaffairetousdeal.html.twig', array(
            "commecial" => $commecial,
            "category" => $category,
            "region" => $region,
            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function ChiffreAffaireCommercialAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $commecial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:chiffreaffaire.html.twig', array(
            "commecial" => $commecial,
            "category" => $category,
            "region" => $region,
            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function ChiffreAffaireDealCommercialAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $commecial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:chiffreaffairedeal.html.twig', array(
            "commecial" => $commecial,
            "category" => $category,
            "region" => $region,
            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function VolumeContratsCommercialAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $commecial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:volumecontratscom.html.twig', array(
            "commecial" => $commecial,
            "category" => $category,
            "region" => $region,
            "dated" => $dt2,
            "datef" => $dt,
        ));
    }

    public function NombreDealRedacteurAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:nombredeal.html.twig', array(
            "category" => $category,
            "region" => $region,
            "redacteur" => $redacteur,
            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function DureeGenerationRedactionDealRedacteurAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:dureegenerationredactiondeal.html.twig', array(
            "category" => $category,
            "region" => $region,
            "redacteur" => $redacteur,
            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function DureeRedactionAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        return $this->render('BackDashBundle:Default:dureeredaction.html.twig', array(
            "category" => $category,
            "region" => $region,
            "redacteur" => $redacteur,
            "dated" => $dt2,
            "datef" => $dt,
        ));

    }

    public function VolumeContratsRedacteurAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        return $this->render('BackDashBundle:Default:chefserviceclient.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,

        ));

    }

    public function NombreAnnexesChoisisCommercialPlanificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        return $this->render('BackDashBundle:Default:nombreannexeschoisiscommercial.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));

    }

    public function NombreContratsSignesCommercialPlanificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        return $this->render('BackDashBundle:Default:nombrecontratssignescommercial.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));
    }

    public function DealAnnulesPlanificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        return $this->render('BackDashBundle:Default:dealannules.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));

    }

    public function NouveauxContratsPlanificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        return $this->render('BackDashBundle:Default:nouveauxcontrats.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));

    }

    public function NombreDealEtatPlanificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        return $this->render('BackDashBundle:Default:nombredealetat.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));

    }

    public function DelaiAvantPublicationDealsPlanificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        return $this->render('BackDashBundle:Default:delaiavantpublicationdeals.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));

    }

    public function indexAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];




        if ($role == "CHEFSERVICECLI") {
            $agent = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('SERVICECLIENT');
            $delaiMoin24 = $this->getDoctrine()->getRepository("BackCommandeBundle:Ticket")->nbrTicketCloture();
            $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
            $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
            $data['roles'] = "PARTENAIRE";
            $partner = $this->getDoctrine()
                ->getRepository('UserUserBundle:User')
                ->getListPartner($data);
            return $this->render('BackDashBundle:Default:chefserviceclient.html.twig', array(
                "category" => $category,
                "region" => $region,
                'agents' => $agent,
                "dated" => $dt2,
                "datef" => $dt,
                "partenaire" => $partner,
                "delaiMoin24" => $delaiMoin24,

            ));
        } else if ($role == "DIRECTEURCOMMERCIAL") {
            $commecial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
            $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
            $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
            return $this->render('BackDashBundle:Default:directeurcommercial.html.twig', array(
                "commecial" => $commecial,
                "category" => $category,
                "region" => $region,
                "dated" => $dt2,
                "datef" => $dt,
            ));
        } else if ($role == "DAF") {
            $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
            $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

            $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
            $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
            return $this->render('BackDashBundle:Default:daf.html.twig', array(
                "partenaire" => $partenaire,
                "category" => $category,
                "region" => $region,
                'agents' => $agent,

                "dated" => $dt2,
                "datef" => $dt,
            ));
        } else if ($role == "PALAINER") {
            $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
            $dt = new \DateTime();
            $dt2 = $dt->modify("-1 month");
            $dt = new \DateTime();
            return $this->render('BackDashBundle:Default:planificateur.html.twig', array("dated" => $dt2,
                "datef" => $dt, "commercial" => $commercial));
        } elseif ($role == "CHEFRED") {
            $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
            $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
            $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
            return $this->render('BackDashBundle:Default:chefred.html.twig', array(
                "category" => $category,
                "region" => $region,
                "redacteur" => $redacteur,
                "dated" => $dt2,
                "datef" => $dt,
            ));
        }
        //
        return $this->render('BackDashBundle:Default:index.html.twig');

    }

    public function redacteurChefAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();

        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $breadcrumbs->addItem("Dashboard rédacteur en chéf", "show_partner", array());

        return $this->render('BackDashBundle:Default:chefred.html.twig', array(
            "category" => $category,
            "region" => $region,
            "redacteur" => $redacteur,

            "dated" => $dt2,
            "datef" => $dt,
        ));
    }

    public function planificateurAction()
    {
        $commercial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $breadcrumbs->addItem("Dashboard planificateur", "show_partner", array());
        return $this->render('BackDashBundle:Default:planificateur.html.twig', array("dated" => $dt2,
            "datef" => $dt, "commercial" => $commercial));
    }

    public function directeurCommercialAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();

        $commecial = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('COMMERCIAL');
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $breadcrumbs->addItem("Dashboard directeur commercial", "show_partner", array());
        return $this->render('BackDashBundle:Default:directeurcommercial.html.twig', array(
            "commecial" => $commecial,
            "category" => $category,
            "region" => $region,
            "dated" => $dt2,
            "datef" => $dt,
        ));
    }

    public function DafAction()
    {
        $dt = new \DateTime();
        $dt2 = $dt->modify("-1 month");
        $dt = new \DateTime();
        $user = $this->get('security.context')->getToken()->getUser();
        $roles = $user->getRoles();
        $role = $roles[0];
        $category = $this->getDoctrine()->getRepository("BackPlanningBundle:Category")->findBy(array('parent' => null));
        $agent = $this->getDoctrine()->getRepository("BackCommandeBundle:Caisse")->findAll();

        $partenaire = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole("PARTENAIRE");
        $region = $this->getDoctrine()->getRepository("BackPlanningBundle:Region")->findAll();
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $breadcrumbs->addItem("Dashboard directeur administratif et financier", "show_partner", array());
        return $this->render('BackDashBundle:Default:daf.html.twig', array(
            "partenaire" => $partenaire,
            "category" => $category,
            "region" => $region,
            'agents' => $agent,

            "dated" => $dt2,
            "datef" => $dt,
        ));
    }

    public function ChefServiceClientAction()
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
        $partner = $this->getDoctrine()
            ->getRepository('UserUserBundle:User')
            ->getListPartner($data);
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        $breadcrumbs->addItem("Dashboard chef service client", "show_partner", array());
        return $this->render('BackDashBundle:Default:chefserviceclient.html.twig', array(
            "category" => $category,
            "region" => $region,
            'agents' => $agent,
            "dated" => $dt2,
            "datef" => $dt,
            "partenaire" => $partner,
            "delaiMoin24" => $delaiMoin24,
        ));

    }

    public function dcdealAction()
    {
        $request = $this->get('request');
        $idcategorie = $request->request->get('idcategorie');
        $idregion = $request->request->get('idregion');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $partenaireId = $request->request->get('prtenaire_id');
        $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findforselectdash($dated, $datef, $idcategorie, $idregion, $partenaireId);
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

    public function dccaAction()
    {
        $request = $this->get('request');

        $idcategorie = $request->request->get('idcategorie');
        $idregion = $request->request->get('idregion');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findforselectdash($dated, null, $idcategorie, $idregion);

        $sommeca = 0;
        foreach ($planning as $value) {
            if ($value->getDeal() != null) {
                $sommeca += $value->getCa();
            }
        }
        $day = $dated->diff($datef);
        $nbday = $day->days;
        $ca = array();

        $cacp = 0;
        for ($i = 0; $i < $nbday; $i++) {
            $dt = $dated->modify("+1 days");

            $fixedCommission = 0;
            foreach ($planning as $value) {

                if ($value->getDeal() != null) {
                    //$sommeca =$value->getCa();
                    // gestion des coupon
                    $deal = $value->getDeal();
                    $command = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->findforJson($deal, $dt);

                    //$cacp = 0;
                    foreach ($command as $vcmd) {
                        foreach ($vcmd->getCoupon() as $vcouppon) {
                            $annex = $vcmd->getReference()->getAnnexe();
                            $variableCommission = $annex->getVariableCommission();
                            $fixedCommission = $annex->getFixedCommission();
                            if (in_array($vcouppon->getVendu(), array(1, 2, 7))) {
                                //echo "(".$vcouppon->getPrice()."*".$variableCommission."/100)<br>";
                                $cacp += ($vcouppon->getPrice() * $variableCommission / 100);
                            }
                        }
                    }
                }
            }
            $ca[strtotime($dt->format("Y-m-d"))]["caplanning"] = $sommeca;
            $ca[strtotime($dt->format("Y-m-d"))]["cacmd"] = $cacp + $fixedCommission;

        }
        //Tools::dump($ca,true);
        $response = new Response(json_encode($ca));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function alldealAction()
    {
        $request = $this->get('request');

        $idcategorie = $request->request->get('idcategorie');
        $idregion = $request->request->get('idregion');
        $id = $request->request->get('id');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findforselectdash($dated, $datef, $idcategorie, $idregion);
        $Arrfinal = array();
        $i = 0;
        foreach ($planning as $value) {
            if ($value->getDeal() != null) {
                $color = Tools::random_color();
                $Arrfinal[$i]["name"] = "Objectif chiffre d'affaire du deal " . $value->getDeal()->getTitle();
                $Arrfinal[$i]["ca"] = $value->getCa();
                $Arrfinal[$i]["color"] = ($color);
                ++$i;
                $Arrfinal[$i]["name"] = "Chiffre d'affaire du deal " . $value->getDeal()->getTitle();
                $command = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->findforJson($value->getDeal(), $dated, $datef);
                $cacp = 0;
                $fixedCommission = 0;
                foreach ($command as $vcmd) {
                    $annex = $vcmd->getReference()->getAnnexe();
                    $variableCommission = $annex->getVariableCommission();
                    $fixedCommission = $annex->getFixedCommission();
                    foreach ($vcmd->getCoupon() as $vcouppon) {

                        if (in_array($vcouppon->getVendu(), array(1, 2, 7))) {
                            $cacp += ($vcouppon->getPrice() * $variableCommission / 100);
                            //$cacp += $vcouppon->getPrice();
                        }
                    }
                }
                $Arrfinal[$i]["ca"] = $cacp + $fixedCommission;


                $Arrfinal[$i]["color"] = Tools::simularColor($color);

                ++$i;
            }
        }
//Tools::dump($Arrfinal,true);
        $response = new Response(json_encode($Arrfinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function dccadealAction()
    {
        $request = $this->get('request');

        $idcategorie = $request->request->get('idcategorie');
        $idregion = $request->request->get('idregion');
        $id = $request->request->get('id');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));

        $day = $dated->diff($datef);
        $nbday = $day->days;
        $ca = array();
        $cacp = 0;
        $fixedCommission = 0;
        for ($i = 0; $i < $nbday; $i++) {
            $dt = $dated->modify("+1 days");
            $planning = $this->getDoctrine()->getRepository("BackPlanningBundle:Planning")->findforJson($dt, $idcategorie, $idregion);
            $sommeca = 0;

            foreach ($planning as $value) {
                if ($value->getDeal() != null) {
                    if ($value->getDeal()->getId() == $id) {
                        $caday = $value->getCa();
                        $nbdayj = $value->getStartDate()->diff($value->getEndDate())->days;
                        $cad = $caday;
                        $sommeca += round($cad, 3);
                        // gestion des coupon
                        $deal = $value->getDeal();
                        $command = $this->getDoctrine()->getRepository("BackCommandeBundle:Command")->findforJson($deal, $dt);

                        foreach ($command as $vcmd) {
                            $annex = $vcmd->getReference()->getAnnexe();
                            $variableCommission = $annex->getVariableCommission();
                            $fixedCommission = $annex->getFixedCommission();
                            foreach ($vcmd->getCoupon() as $vcouppon) {

                                if (in_array($vcouppon->getVendu(), array(1, 2, 7))) {
                                    $cacp += ($vcouppon->getPrice() * $variableCommission / 100);
                                    //$cacp += $vcouppon->getPrice();
                                }
                            }
                        }

                    }

                }
            }
            $ca[strtotime($dt->format("Y-m-d"))]["caplanning"] = $sommeca;
            $ca[strtotime($dt->format("Y-m-d"))]["cacmd"] = $cacp + $fixedCommission;

        }
        $response = new Response(json_encode($ca));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function listdealdashAction()
    {
        $request = $this->get('request');
        $id = $request->request->get('id');
        $partner = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($id);
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->getDealByUser($partner, $dated, $datef);
        return $this->render('BackDashBundle:Default:select.html.twig', array(
            "entities" => $deal,

        ));
    }

    public function listdealcmddashAction($type)
    {
        $request = $this->get('request');
        $id = $request->request->get('id');
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Deal')->find($id);
        $cmd = $this->getDoctrine()->getRepository('BackCommandeBundle:Command')->findforJson($deal, $dated, $datef);
        $Arrfinal = array("cv" => 0, "cf" => 0, "cnf" => 0, "cr" => 0, "cer" => 0, "cra" => 0);
        foreach ($cmd as $value) {
            foreach ($value->getCoupon() as $val) {
                if (in_array($val->getVendu(), array(2, 3, 4, 7))) {
                    if ($type == 1) {
                        $Arrfinal["cv"] = $Arrfinal["cv"] + 1;
                    } else {
                        $Arrfinal["cv"] = $Arrfinal["cv"] + $val->getPrice();
                    }
                } else if ($val->getRecu() == 3) {
                    if ($type == 1) {
                        $Arrfinal["cf"] = $Arrfinal["cf"] + 1;
                    } else {
                        $Arrfinal["cf"] = $Arrfinal["cf"] + $val->getPrice();
                    }

                } else if ($val->getRecu() == 2) {
                    if ($type == 1) {
                        $Arrfinal["cnf"] = $Arrfinal["cnf"] + 1;
                    } else {
                        $Arrfinal["cnf"] = $Arrfinal["cnf"] + $val->getPrice();
                    }
                } else if ($val->getVendu() == 5) {
                    if ($type == 1) {
                        $Arrfinal["cr"] = $Arrfinal["cr"] + 1;
                    } else {
                        $Arrfinal["cr"] = $Arrfinal["cr"] + $val->getPrice();
                    }
                } else if ($val->getVendu() == 4) {
                    if ($type == 1) {
                        $Arrfinal["cer"] = $Arrfinal["cer"] + 1;
                    } else {
                        $Arrfinal["cer"] = $Arrfinal["cer"] + $val->getPrice();
                    }
                } else if ($val->getVendu() == 7) {
                    if ($type == 1) {
                        $Arrfinal["cra"] = $Arrfinal["cra"] + 1;
                    } else {
                        $Arrfinal["cra"] = $Arrfinal["cra"] + $val->getPrice();
                    }

                }

            }
        }

        $response = new Response(json_encode($Arrfinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function contratAction()
    {
        $request = $this->get('request');
        //Tools::dump($request,true);
        $idcategorie = $request->request->get('idcategorie');
        $idregion = $request->request->get('idregion');
        $idcommercial = $request->request->get('idcommercial');
        if ($idcommercial != "") {
            $commercial = $this->getDoctrine()->getRepository('UserUserBundle:User')->find($idcommercial);
        } else {
            $commercial = null;
        }

        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $annex = $this->getDoctrine()->getRepository('BackContractBundle:Annexe')->findByPeriede($dated, $datef);
        $annx = $annex;
        foreach ($annex as $key => $value) {
            $allregion = $value->getProtocol()->getUser()->getRegion();
            $tab = array();
            foreach ($allregion as $vv) {
                $tab[] = $vv->getId();
            }
            if ($idcategorie != "" && $value->getAgent()->getCategory()->getId() != $idcategorie) {
                unset($annx[$key]);
            }
            if (isset($annx[$key]) && $idregion != "" && !in_array($idregion, $tab)) {
                unset($annx[$key]);
            }
            if ($idcommercial != "" && isset($annx[$key])) {
                if ($value->getAgent()->getId() != $idcommercial) {
                    unset($annx[$key]);
                }
            }
        }
        $annex = array_values($annx);

        //calcule des annexe pour chaque partenaie
        $partenaire = array();
        foreach ($annex as $key => $value) {
            if (!isset($partenaire[$value->getProtocol()->getUser()->getId()]))
                $partenaire[$value->getProtocol()->getUser()->getId()] = 1;
            else
                $partenaire[$value->getProtocol()->getUser()->getId()] = $partenaire[$value->getProtocol()->getUser()->getId()] + 1;
        }
        $ancien = 0;
        $nouveau = 0;
        foreach ($partenaire as $key => $value) {
            if ($value > 1) {
                $ancien = $value;
            } else if ($value == 1) {
                foreach ($annex as $k => $v) {
                    if ($v->getProtocol()->getUser()->getId() == $key) {
                        $protocole = $v->getProtocol();
                        $dtprotocole = $protocole->getDatep();
                        $dcr = $v->getDcr();
                        $day = $dcr->diff($dtprotocole)->days;
                        if ($day == 0 && count($protocole->getAnnexe()) == 1) {
                            ++$nouveau;
                        }
                    }
                }

            }
        }
        $Arrfinal["ancien"] = $ancien;
        $Arrfinal["nouveau"] = $nouveau;
        $response = new Response(json_encode($Arrfinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function etat1dealAction()
    {
        $request = $this->get('request');
        //Tools::dump($request->request,true);
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $idcategorie = $request->request->get('categorie');
        $idregion = $request->request->get('region');
        $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Dealhistory')->findByDate($dated, $datef, $idcategorie, $idregion);
        $Arrfinal = array();
        foreach ($deal as $value) {
            if (count($value->getDealhistory()) >= 2) {

                foreach ($value->getDealhistory() as $val) {
                    if ($val->getType() == 1) $dt = $val->getDcr();
                    if ($val->getType() == 2) $dt1 = $val->getDcr();
                }
                $dif = $dt->diff($dt1);
                $hours = $dif->h + ($dif->days * 8);
                $Arrfinal[$value->getId()]["heur"] = $hours;
                $Arrfinal[$value->getId()]["name"] = $value->getTitle();
                $Arrfinal[$value->getId()]["color"] = "#" . Tools::random_color();

            }
        }


        $response = new Response(json_encode($Arrfinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function etat2dealAction()
    {
        $request = $this->get('request');
        //Tools::dump($request->request,true);
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $idcategorie = $request->request->get('categorie');
        $idregion = $request->request->get('region');
        $redacteur = $this->getDoctrine()->getRepository("UserUserBundle:User")->findByRole('REDACTEUR');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Dealhistory')->findByDate($dated, $datef, $idcategorie, $idregion);
        $Arrfinal = array();
        foreach ($deal as $value) {
            if ($value->getRedacteur() != null) {
                if (isset($Arrfinal[$value->getRedacteur()->getId()])) {
                    $Arrfinal[$value->getRedacteur()->getId()]["nbr"] = $Arrfinal[$value->getRedacteur()->getId()]["nbr"] + 1;
                } else {
                    $Arrfinal[$value->getRedacteur()->getId()]["nbr"] = 1;

                    $Arrfinal[$value->getRedacteur()->getId()]["color"] = "#" . Tools::random_color();
                }
                $Arrfinal[$value->getRedacteur()->getId()]["name"] = $value->getRedacteur()->getName();
            }
        }
        foreach ($redacteur as $value) {
            if (!isset($Arrfinal[$value->getId()])) {
                $Arrfinal[$value->getId()]["name"] = $value->getName();
                $Arrfinal[$value->getId()]["nbr"] = 0;
                $Arrfinal[$value->getId()]["color"] = "#" . Tools::random_color();
            }
        }
        $response = new Response(json_encode($Arrfinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function etat3dealAction()
    {
        $request = $this->get('request');
        //Tools::dump($request->request,true);
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $idcategorie = $request->request->get('categorie');
        $idredact = $request->request->get('idredact');
        $idregion = $request->request->get('region');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Dealhistory')->findByDate($dated, $datef, $idcategorie, $idregion, $idredact);
        $Arrfinal = array();
        foreach ($deal as $value) {
            $dtplan = null;
            $dtdeal = null;
            $planning = $value->getPlanning();
            $planninghistory = $this->getDoctrine()->getRepository('BackPlanningBundle:Planninghistory')->findBy(array('planning' => $planning, 'type' => 3));
            if (count($planninghistory) == 1) {
                foreach ($planninghistory as $vplan) {
                    $dtplan = $vplan->getDcr();
                }
            }
            $dealHistory = $value->getDealhistory();
            foreach ($dealHistory as $vdeal) {
                if ($vdeal->getType() == 2) {
                    $dtdeal = $vdeal->getDcr();
                }
            }
            if ($dtplan != null && $dtdeal != null) {
                $dif = $dtdeal->diff($dtplan);
                $hours = $dif->h + ($dif->days * 8);
                $Arrfinal[$value->getId()]["heur"] = $hours;
                $Arrfinal[$value->getId()]["name"] = $value->getTitle();
                $Arrfinal[$value->getId()]["color"] = "#" . Tools::random_color();
            }
        }
        $response = new Response(json_encode($Arrfinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function etat4dealAction()
    {
        $request = $this->get('request');
        //Tools::dump($request->request,true);
        $dated = Tools::reformatDate($request->request->get('dated'));
        $datef = Tools::reformatDate($request->request->get('datef'));
        $idcategorie = $request->request->get('categorie');
        $idredact = $request->request->get('idredact');
        $idregion = $request->request->get('region');
        $deal = $this->getDoctrine()->getRepository('BackDealBundle:Dealhistory')->findByDate($dated, $datef, $idcategorie, $idregion, $idredact);
        $i = 0;
        foreach ($deal as $value) {
            if (count($value->getDealhistory()) == 1) {
                ++$i;
            }
        }
        echo $i;
        exit;
    }
}
