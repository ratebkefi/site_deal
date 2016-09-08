<?php
namespace Back\DashBundle\Listener;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpFoundation\Response;
use Back\DashBundle\Common\Tools;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class SecurityListener
{


    protected $router;
    protected $securityContext;

    public function __construct(EngineInterface $templating, RouterInterface $router, SecurityContextInterface $securityContext)
    {
        $this->templating = $templating;
        $this->router = $router;
        $this->securityContext = $securityContext;
    }

    public function onKernelRequest(GetResponseEvent $event = null)
    {
        $request = $event->getRequest();

        $path = explode("/", $request->getPathInfo());
        if (isset($path[1]) && $path[1] == "dash") {
            if ($this->securityContext->getToken() != null) {
                $token = $this->securityContext->getToken();
                $user = $token->getUser();
                $roles = $user->getRoles();
                $role = $roles[0];
                $valid = true;
                $route = $event->getRequest()->attributes->get('_route');
                if ($role == "RESPONSABLECAISSE") {
                    $routeCassier = array("ajxdealback","back_notification","list_desclient","list_client_par_nom","list_client_par_tel","list_client_par_email","fos_user_security_login", "historique_responsablecaissier", "back_dash_homepage", "list_caissier",
                        "view_caissier_manager", "retrait_responsablecaissier_manager","back_ajx_leplanning_json");
                    //Tools::dump($route);
                    //Tools::dump($routeCassier);
                    if (!in_array($route, $routeCassier)) {//echo "sdsd";exit;
                        if ("historique_responsablecaissier" == $route) {

                            $response = new Response();
                            $response->setContent(
                            // create you custom template AcmeFooBundle:Exception:exception.html.twig
                                $this->templating->render(
                                    'BackDashBundle:Exception:403.html.twig',
                                    array('code' => 403)
                                )
                            );

                            $event->setResponse($response);
                        } else {
                            $response = new Response();
                            $response->setContent(
                            // create you custom template AcmeFooBundle:Exception:exception.html.twig
                                $this->templating->render(
                                    'BackDashBundle:Exception:403.html.twig',
                                    array('code' => 403)
                                )
                            );

                            $event->setResponse($response);
                        }
                    }
                }
                if ($role == "PARTENAIRE") {
                    $routeDaf = array("back_partner_password","ajxdealback","back_notification","dash_partner_book_detail"
                    ,"fos_user_security_login","back_dash_homepage","dash_partner_deal","dash_partner_booking"
                    ,"dash_partner_book_print","dash_partner_deal_print","coupon_manager","dash_partner_invoice","dash_invoice_pdf"
                    );

                    if (!in_array($route, $routeDaf)) {
                        $valid = false;
                    }
                }

                if ($role == "DAF") {
                    $routeDaf = array("back_ajx_ticket162_json","back_ajx_ticket163_json","back_ajx_ticket164_json","back_ajx_ticket165_json","back_ajx_ticket166_json","back_ajx_ticket167_json","back_ajx_ticket168_json","back_ajx_ticket169_json","back_reportcouponconsomme","back_reportnouveaupart","back_reportnouveaudeal","back_reportfacture","back_reportfacturepaye","back_reportfidelite","back_reportcaisse","back_ajx_ticket158_json","back_ajx_ticket159_json","back_partner_password","coupon_commande2","print_coupon","mon_caisse","apercu_deal_view","historique_responsablecaissier","back_notification","back_reportdeal","back_ajx_commande","list_desclient","update_chefredactor_manager","add_chefredactor_manager","view_chefredactor_manager","list_chefredactor","list_directeurcommercial","view_users","fos_user_registration_register","show_users","ajxdealback","remboursement_virement","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","add_serviceclient_manager","add_financier_manager","add_caissier_manager","add_redactor_manager","add_commercial_manager","add_planner_manager","update_chefserviceclient_manager","update_serviceclient_manager","update_financier_manager","update_caissier_manager","update_redactor_manager","update_commercial_manager","update_planner_manager","fos_user_security_login", "retrait_responsablecaissier_manager", "back_partner", "dash_partner_show", "back_dash_homepage", "list_planner", "view_planner_manager", "list_commercial", "user_contract_homepage", "user_contract_add_manager"
                    , "user_contract_show", "user_contract_update_manager", "view_commercial_manager", "list_redactor", "view_redactor_manager", "list_caissier", "view_caissier_manager", "list_financier"
                    , "view_financier_manager", "list_serviceclient", "view_serviceclient_manager", "list_responsablecaissier", "add_responsablecaissier_manager", "update_responsablecaissier_manager"
                    , "view_responsablecaissier_manager", "list_chefserviceclient", "view_chefserviceclient_manager", "list_daf", "add_daf_manager", "view_daf_manager", "update_daf_manager", "back_planning_home"
                    , "show_planning_manager", "dash_sellingpoint_show", "dash_contact_partner_show", "dash_protocol_show", "print_protocol_manager", "pdf_annexe_manager", "dash_annexe_show", "dash_reference_show"
                    , "back_deal", "show_deal_manager", "back_remboursement", "remboursement_virement", "back_invoice", "dash_invoice_add", "dash_invoice_update", "dash_invoice_pdf", "list_ticket"
                    , "view_ticket", "note_ticket", "note_ticket_add", "historique_ticket", "back_commande", "back_client","back_client_livraison", "view_client_manager", "bigfid_client", "update_profile_users", "historique_responsablecaissier_manager", "daf_historique_caisse", "retrait_daf_manager"
                    ,"back_ajx_ticket1_json","back_ajx_ticket10_json","liste_deal_dash","back_dash_json_deal_cmd","back_ajx_ticket7_json"
                    ,"back_ajx_ticket2_json","back_ajx_ticket3_json","back_ajx_ticket4_json","back_ajx_ticket5_json",
                        "back_ajx_ticket6_json","back_dash_json_cs_deal","back_ajx_ticket8_json","recapitulatif_facturation_deux_financier",
                        "back_ajx_ticket9_json","back_dash_json_cs_deal2","back_dash_json_dc_ca","back_dash_json_dc_deal","back_dash_json_dc_ca_deal"
                    ,"back_dash_json_all_deal","back_dash_json_contrat","back_ajx_leplanning_json","fact_coup_nb_coup_financier","fact_coup_prix_financier","volume_paiement_financier","volume_caisse_financier"
                    ,"montant_caisse_financier","montant_remboursements_financier","recapitulatif_facturation_un_financier",
                    );

                    if (!in_array($route, $routeDaf)) {
                        $valid = false;
                    }
                }
                if ($role == "CHEFRED") {
                    $routeChefRad = array("update_planning_manager","back_partner_password","ajxdealback","back_notification","back_ajx_commande","list_desclient","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","apercu_deal_view","update_reference_manager","back_dash_ajx_redacteur_cas1","update_annexe_manager","back_dash_ajx_redacteur_cas2","back_dash_ajx_redacteur_cas3","back_dash_ajx_redacteur_cas4","back_change_redactor_deal","fos_user_security_login", "back_dash_homepage","back_deal","show_deal_manager","update_deal_manager","pdf_annexe_manager","show_planning_manager"
                    ,"back_reportdeal","back_planning_home", "back_partner"
                    , "dash_partner_show", "dash_sellingpoint_show", "dash_contact_partner_show"
                    , "dash_protocol_show", "print_protocol_manager", "dash_annexe_show"
                    ,"nombre_deal_redacteur","duree_generation_redaction_deal_redacteur","duree_redaction"
                    , "pdf_annexe_manager", "dash_reference_show","back_ajx_leplanning_json");

                    if (!in_array($route, $routeChefRad)) {
                        $valid = false;
                    }
                }
//CHEFRED
                if ($role == "CAISSIER") {
                    $routeCassier = array("ajxdealback","back_notification","back_ajx_commande","list_desclient","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","fos_user_security_login", "apercu_deal_view", "coupon_commande2", "back_dash_homepage", "back_commande", "commande_annuler", "add_commande_manager", "back_ajx_reference", "paye_commande_manager", "mon_caisse"
                    , "back_deal", "show_deal_manager", "update_profile_users");
                    if (!in_array($route, $routeCassier)) {
                        $valid = false;
                    }
                }

                if ($role == "DIRECTEURCOMMERCIAL") {
                    $routeCassier = array("back_partner_password","ajxdealback","back_ajx_commande","list_desclient","show_users","pdf_annexepar_manager","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","back_ajx_get_planing","view_cp","back_notification","add_planning_manager","fos_user_security_login","back_dash_homepage","back_ajx_ticket16_json","back_ajx_ticket155_json","back_ajx_ticket17_json","back_ajx_ticket12_json"
                    ,"back_ajx_ticket13_json","back_ajx_ticket14_json","back_planning_home","show_planning_manager","update_planning_manager","back_deal" ,"show_deal_manager","apercu_deal_view"
                    ,"recapitulatif_facturation_ca_financier","back_partner","dash_partner_add","dash_partner_update","dash_partner_show", "dash_sellingpoint_show", "dash_contact_partner_show", "dash_protocol_show", "print_protocol_manager", "dash_annexe_show","performances_commercial","performances_marchant"
                    ,"add_protocol_manager_partner","dash_sellingpoint_add","dash_sellingpoint_update","dash_contact_partner_add","dash_contact_partner_update","update_protocol_manager",
                        "print_protocol_manager","add_annexe_manager","update_annexe_manager" ,"pdf_annexe_manager","add_reference_manager","dash_reference_show","update_reference_manager","back_invoice","back_ajx_planning_json"
                    ,"dash_invoice_pdf","update_profile_users","back_ajx_leplanning_json");
                    if (!in_array($route, $routeCassier)) {
                        $valid = false;
                    }
                }

                if ($role == "COMMERCIAL") {
                    $routeCommercial = array("back_partner_password","ajxdealback","back_ajx_commande","list_desclient","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","pdf_annexepar_manager","view_cp","back_notification","update_planning_manager","print_protocol_manager","back_ajx_get_planing","user_vote_partner","show_planning_manager","fos_user_security_login", "back_dash_homepage", "back_planning_home", "back_partner", "dash_partner_add", "dash_partner_show", "dash_partner_update", "dash_sellingpoint_show"
                    , "dash_sellingpoint_update", "dash_sellingpoint_add", "dash_contact_partner_show", "dash_contact_partner_update", "dash_contact_partner_add", "dash_protocol_show",
                        "update_protocol_manager", "add_protocol_manager_partner", "add_annexe_manager", "dash_annexe_show", "update_annexe_manager", "pdf_annexe_manager"
                    , "add_reference_manager", "dash_reference_show", "update_reference_manager", "back_contact_partner", "dash_contact_partner_show", "back_sellingpoint", "back_deal"
                    , "show_deal_manager", "back_invoice", "dash_invoice_pdf", "update_profile_users","back_ajx_ticket1_json","back_ajx_ticket10_json","liste_deal_dash","back_dash_json_deal_cmd","back_ajx_ticket7_json"
                    ,"back_ajx_ticket2_json","back_ajx_ticket3_json","back_ajx_ticket4_json","back_ajx_ticket5_json","nombre_contrats_signes_commercial_planificateur"
                    ,"chiffre_affaire_tous_deal_commercial","chiffre_affaire_commercial","chiffre_affaire_deal_commercial","volume_contrats_commercial","nombre_deal_etat_planificateur",
                        "back_ajx_ticket6_json","back_dash_json_cs_deal","back_ajx_ticket8_json","nombre_annexes_choisis_commercial_planificateur",
                        "back_ajx_ticket9_json","back_dash_json_cs_deal2","back_dash_json_dc_ca","back_dash_json_dc_deal","back_dash_json_dc_ca_deal"
                    ,"back_dash_json_all_deal","back_dash_json_contrat","back_ajx_leplanning_json");
                    if (!in_array($route, $routeCommercial)) {
                        $valid = false;
                    }
                }

                if ($role == "SERVICECLIENT") {
                    $routeCommercial = array("coupon_commande","coupon_commande_approuver","coupon_commande_annule","coupon_commande_tracking","coupon_commande_traiter","back_partner_password","ajxdealback","list_desclient","back_reportlivraison","back_reportlivraisoncsv_chef","back_suivicommande","back_reportdeal","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","back_client_adresse_modifier","back_client_edit","back_client_adresse","back_notification","fos_user_security_login", "back_dash_homepage", "list_ticket", "add_ticket", "back_ajx_commande", "view_ticket", "fermer_ticket", "historique_ticket", "note_ticket"
                    , "note_ticket_add", "ouvrire_ticket", "back_client","back_client_livraison", "view_client_manager", "block_client_manager", "unblock_client_manager", "bigfid_client", "back_partner"
                    , "dash_partner_show", "dash_sellingpoint_show", "dash_contact_partner_show", "dash_protocol_show", "print_protocol_manager", "dash_annexe_show"
                    , "pdf_annexe_manager", "dash_reference_show", "back_deal", "apercu_deal_view", "show_planning_manager", "show_deal_manager", "back_comment", "activate_deal_manager"
                    , "delete_deal_manager", "back_commande", "add_commande_manager", "back_ajx_reference", "update_profile_users","back_ajx_leplanning_json");
                    if (!in_array($route, $routeCommercial)) {
                        $valid = false;
                    }
                }

                if ($role == "CHEFSERVICECLI") {
                    $routeChefServiceClient = array("coupon_commande","coupon_commande_approuver","coupon_commande_annule","coupon_commande_tracking","coupon_commande_traiter","coupon_commande2","back_partner_password","ajxdealback","back_ajx_commande","list_desclient","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","back_remboursement", "add_ticket","back_client_adresse_modifier","back_reportlivraison","back_suivicommande","back_reportdeal","back_client_edit","back_client_adresse","back_notification","fos_user_security_login", "back_dash_homepage", "list_ticket", "view_ticket", "note_ticket", "note_ticket_add", "historique_ticket", "fermer_ticket"
                    , "ouvrire_ticket", "back_client","back_client_livraison", "view_client_manager", "block_client_manager", "unblock_client_manager", "bigfid_client", "back_partner", "dash_partner_show"
                    , "dash_sellingpoint_show", "dash_contact_partner_show", "dash_protocol_show", "print_protocol_manager", "dash_annexe_show", "pdf_annexe_manager", "dash_reference_show"
                    , "back_contact_partner", "dash_contact_partner_update", "back_sellingpoint", "back_planning_home", "show_planning_manager", "back_deal", "apercu_deal_view", "show_deal_manager"
                    , "back_comment", "activate_deal_manager", "delete_deal_manager","back_ajx_ticket2_json","back_ajx_ticket3_json", "back_commande", "paye_commande_manager", "update_profile_users"
                    ,"back_ajx_ticket1_json","back_ajx_ticket10_json","liste_deal_dash","back_dash_json_deal_cmd","back_ajx_ticket7_json","back_ajx_ticket13_json"
                    ,"back_ajx_ticket2_json","back_ajx_ticket3_json","back_ajx_ticket4_json","back_ajx_ticket5_json","back_ajx_ticket10_json","back_ajx_ticket11_json","back_ajx_ticket12_json","back_ajx_ticket12_json","back_ajx_ticket14_json","back_ajx_ticket13_json"
                    ,"recapitulatif_client","recapitulatif_commentaires","volume_tickets_client","statistique_client","nombre_tickets_total_client","nombre_message_client","delai_traitement_client","montant_remboursements_client","nombre_remboursement_client","volume_coupons_client",
                        "nombre_commande_client","back_ajx_ticket122_json","nombre_commande_total_client","back_ajx_ticket133_json","statistique_client","recapitulatif_client","back_ajx_ticket6_json","back_ajx_ticket156_json","back_dash_json_cs_deal","back_ajx_ticket8_json",
                        "back_ajx_ticket9_json","back_dash_json_cs_deal2","back_dash_json_dc_ca","back_dash_json_dc_deal",
                        "back_dash_json_dc_ca_deal","back_dash_json_all_deal","back_dash_json_contrat","back_ajx_leplanning_json","commande_annuler");
                    if (!in_array($route, $routeChefServiceClient)) {
                        $valid = false;
                    }
                }
                if ($role == "PALAINER") {
                    $routeDaf = array("back_partner_password","ajxdealback","back_ajx_commande","list_desclient","show_users","pdf_annexepar_manager","back_notification_vu","list_client_par_nom","list_client_par_tel","list_client_par_email","back_ajx_get_planing","view_cp","back_notification","add_planning_manager","fos_user_security_login","back_dash_homepage","back_ajx_ticket16_json","back_ajx_ticket155_json","back_ajx_ticket17_json","back_ajx_ticket12_json"
                    ,"back_ajx_ticket13_json","back_ajx_ticket14_json","back_planning_home","show_planning_manager","update_planning_manager","back_deal" ,"show_deal_manager","apercu_deal_view"
                    ,"back_partner","dash_partner_add","dash_partner_update","dash_partner_show", "dash_sellingpoint_show", "dash_contact_partner_show", "dash_protocol_show", "print_protocol_manager", "dash_annexe_show"
                    ,"add_protocol_manager_partner","dash_sellingpoint_add","dash_sellingpoint_update","dash_contact_partner_add","dash_contact_partner_update","update_protocol_manager",
                        "print_protocol_manager","add_annexe_manager","update_annexe_manager" ,"pdf_annexe_manager","add_reference_manager","dash_reference_show","update_reference_manager","back_invoice","back_ajx_planning_json"
                    ,"deal_annules_planificateur"
                    ,"nouveaux_contrats_planificateur","delai_avant_publication_deals_planificateur"
                    ,"dash_invoice_pdf","update_profile_users","back_ajx_leplanning_json");

                    if (!in_array($route, $routeDaf)) {
                        $valid = false;
                    }
                }
                if (!$valid) {
                    $response = new Response();
                    $response->setContent(
                    // create you custom template AcmeFooBundle:Exception:exception.html.twig
                        $this->templating->render(
                            'BackDashBundle:Exception:403.html.twig',
                            array('code' => 403)
                        )
                    );

                    $event->setResponse($response);
                }
            }
        }


    }
}