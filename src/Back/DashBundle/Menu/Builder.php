<?php

namespace Back\DashBundle\Menu;

use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Builder extends ContainerAware
{
    public function createMainRedacctorMenu(FactoryInterface $factory, array $options){
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );
        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');

        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }
        $menu->addChild('Dealredactor', array('route' => 'homeredacteur', 'label' => 'Deals' ));



//partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );

        /*$menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Dashboard']->addChild('ndr', array('route' => 'nombre_deal_redacteur', 'label' => 'Nombre des deals par rédacteur'));
        $menu['Dashboard']->addChild('dgrd', array('route' => 'duree_generation_redaction_deal_redacteur', 'label' => 'Durée entre la génération et la rédation de deal'));
        $menu['Dashboard']->addChild('dr', array('route' => 'duree_redaction', 'label' => 'Durée de rédaction'));*/

        return $menu;
    }

    public function createMainChefRedacctorMenu(FactoryInterface $factory, array $options){
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );
        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');

        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));



//partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );



        return $menu;
    }

    public function createMainMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );
        //planning
        $menu->addChild('Planification', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Planification']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Planification']->setLinkAttribute('data-toggle', 'dropdown');


        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Planification']->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(), 'label' =>  $value->getName()));
            //$plan->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName()));
        }


        //partner
        $menu->addChild('Commercial', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );

        //Deal
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Rédaction' ));

        //service Finnancier
        $menu->addChild('Service financier', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
            'attributes' => array('class' => 'dropdown', 'id' => 'servicefinance') ));
        $menu['Service financier']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Service financier']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Service financier']->addChild('commande', array('route' => 'back_commande', 'label' => 'Gestion des commandes'));
        $menu['Service financier']->addChild('Users', array('route' => 'back_invoice', 'label' => 'Gestion des factures'));
        $menu['Service financier']->addChild('coupon_manager', array('route' => 'coupon_manager', 'label' => 'Récéption des coupons'));
        $menu['Service financier']->addChild('back_remboursement', array('route' => 'back_remboursement', 'label' => 'Remboursement des coupons'));
        $menu->addChild('Service client', array('route' => 'back_client', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'clientservice'))
        );
        $menu['Service financier']->addChild('responsablecaissier', array('route' => 'list_responsablecaissier', 'label' => 'Responsable des Caisses'));
        $menu['Service financier']->addChild('caissier', array('route' => 'list_caissier', 'label' => 'Caissier'));
        $menucexport = $menu['Service financier']->addChild('chefserviceexport', array('label' => 'Export',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'mexport')));
        $menucexport->addChild('exp1', array('route' => 'back_reportcaisse', 'label' => 'Caisse'));
        $menucexport->addChild('exp2', array('route' => 'back_reportfidelite', 'label' => 'Fidélité'));
        $menucexport->addChild('exp3', array('route' => 'back_reportfacturepaye', 'label' => 'Facture payé Partenaires'));
        $menucexport->addChild('exp4', array('route' => 'back_reportfacture', 'label' => 'Facturation'));
        $menucexport->addChild('exp5', array('route' => 'back_reportnouveaudeal', 'label' => 'Nouveaux Deal'));
        $menucexport->addChild('exp6', array('route' => 'back_reportnouveaupart', 'label' => 'Nouveaux Parteanaires'));
        $menucexport->addChild('exp7', array('route' => 'back_reportcouponconsomme', 'label' => 'Liste des coupons consommés'));

        $menu['Service client']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Service client']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Service client']->addChild('part', array('route' => 'back_client', 'label' => 'Liste des clientes'));
        $count= htmlspecialchars('<span class="notifyCircle red">15</span>');

        $menu['Service client']->addChild('lstcom', array('route' => 'back_client_livraison', 'label' => 'Confirmation des commandes ',
                'attributes' => array( 'id' => 'livrcomm'))
        );

        $menu['Service client']->addChild('ticket', array('route' => 'list_ticket', 'label' => 'Gestion des tickets'));
        $menu['Service client']->addChild('reservation', array('route' => 'front_booking_step1', 'label' => 'Réservation'));
       // $menu['Service client']->addChild('compagne', array('route' => 'dash_compagnes', 'label' => 'Compagne'));

        $menu->addChild('Rapports', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'raport'))
        );
        $menu['Rapports']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Rapports']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Rapports']->addChild('partdeal', array('route' => 'back_reportdeal', 'label' => 'Rapport des deals'));
        $menu['Rapports']->addChild('suivicommande', array('route' => 'back_suivicommande', 'label' => 'Rapport de suivi des commandes'));
        $menu['Rapports']->addChild('partlivraison', array('route' => 'back_reportlivraison', 'label' => 'Rapport des livraisons'));

        $menu->addChild('Utilitaires', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'utilitaires'))
        );
        $menu['Utilitaires']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Utilitaires']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Utilitaires']->addChild('livraison', array('route' => 'coupon_livraison', 'label' => 'Livraison'));
        $menu['Utilitaires']->addChild('SMS', array('route' => 'back_dash_sms', 'label' => 'SMS'));
        $menu['Utilitaires']->addChild('Commentaire', array('route' => 'back_comment', 'label' => 'Commentaires'));
        $menu['Utilitaires']->addChild('Notification', array('route' => 'back_notification', 'label' => ' Mes notifications'));

        //configuration
        $menu->addChild('Configuration', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Configuration']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Configuration']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Configuration']->addChild('entreprise', array('route' => 'back_entreprise', 'label' => 'Entreprises'));
        $menu['Configuration']->addChild('bank', array('route' => 'back_bank', 'label' => 'Banques'));
        $menu['Configuration']->addChild('paymentmethod', array('route' => 'back_paymentmethod', 'label' => 'Modes de paiement'));
        $menu['Configuration']->addChild('categ', array('route' => 'back_category', 'label' => 'Catégories'));
        $menu['Configuration']->addChild('region', array('route' => 'back_region', 'label' => 'Régions'));
        $menu['Configuration']->addChild('locality', array('route' => 'back_locality', 'label' => 'Localités'));
        //$menu['Configuration']->addChild('parameter', array('route' => 'back_parameter', 'label' => 'BigFid'));
        //$menu['Configuration']->addChild('regle', array('route' => 'back_regle', 'label' => 'Les règles'));


        $menu['Configuration']->addChild('pages', array('route' => 'back_page_homepage', 'label' => 'Pages statiques'));
        $menu['Configuration']->addChild('sociaux', array('route' => 'back_social_homepage', 'label' => 'Réseaux sociaux'));
        $menu['Configuration']->addChild('banner', array('route' => 'back_banner_homepage', 'label' => 'Bannières publicitaires'));
        //file
        $menu->addChild('RH', array('route' => 'back_dash_homepage', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'dashboard')));
        //$menu['Fichier']->addChild('Users', array('route' => 'show_users', 'label' => 'Gestion des utilisateurs'));


        $agent = $menu['RH']->addChild('agent', array('label' => 'Agents',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning')));
        $agent->addChild('planner', array('route' => 'list_planner', 'label' => 'Planificateurs'));
        $agent->addChild('commercial', array('route' => 'list_commercial', 'label' => 'Commerciaux'));
        $agent->addChild('redacteur', array('route' => 'list_redactor', 'label' => 'Rédacteurs'));
        $agent->addChild('caissier', array('route' => 'list_caissier', 'label' => 'Caissiers'));
        $agent->addChild('financier', array('route' => 'list_financier', 'label' => 'Financiers'));
        $agent->addChild('serviceclient', array('route' => 'list_serviceclient', 'label' => 'Service client'));
        $responsable = $menu['RH']->addChild('respo', array('label' => 'Responsables',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning1')));
        $responsable->addChild('responsablecaissier', array('route' => 'list_responsablecaissier', 'label' => 'Responsable des Caisses'));
        $responsable->addChild('chefserviceclient', array('route' => 'list_chefserviceclient', 'label' => 'Chef de service client'));
        $responsable->addChild('daf', array('route' => 'list_daf', 'label' => 'Directeur administratif et financier'));
        $responsable->addChild('directeurcommercial', array('route' => 'list_directeurcommercial', 'label' => 'Directeur commercial'));
        $responsable->addChild('redacteurchef', array('route' => 'list_chefredactor', 'label' => 'Rédacteur en chef'));

        //$menu['Gestion des Utilisateurs']->addChild('Déconnexion', array('route' => 'fos_user_security_logout', 'label' => 'Déconnexion'));
        $menu['RH']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['RH']->setLinkAttribute('data-toggle', 'dropdown');

        $menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');

        $menuchef = $menu['Dashboard']->addChild('chefserviceclient', array('label' => 'Chef service client',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'csc')));
        $menuchef->addChild('vt', array('route' => 'volume_tickets_client', 'label' => 'Récap Nombre tickets'));
        $menuchef->addChild('vtt', array('route' => 'nombre_tickets_total_client', 'label' => 'Récap tickets Fermés Remboursement'));
        $menuchef->addChild('tc', array('route' => 'nombre_commande_total_client', 'label' => 'Récap Ratio Commandes en attente'));
        $menuchef->addChild('ce', array('route' => 'statistique_client', 'label' => 'Client par Etat'));
        $menuchef->addChild('rc', array('route' => 'recapitulatif_client', 'label' => 'Récapitulatif des clients'));
        $menuchef->addChild('rr', array('route' => 'recapitulatif_remboursement', 'label' => 'Récapitulatif des Remboursement'));
        $menuchef->addChild('rc', array('route' => 'recapitulatif_commentaires', 'label' => 'Récapitulatif des Commentaires'));
        $menuchef->addChild('nm', array('route' => 'nombre_message_client', 'label' => 'Récapitulatif performance des tickets fermés'));
        $menuchef->addChild('dt', array('route' => 'delai_traitement_client', 'label' => 'Delai de traitement des tickets '));
        $menucexport = $menuchef->addChild('chefserviceexport', array('label' => 'Export',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'mexport')));
        $menucexport->addChild('exp1', array('route' => 'back_reportcaisse', 'label' => 'Caisse'));
        $menucexport->addChild('exp2', array('route' => 'back_reportfidelite', 'label' => 'Fidélité'));
        $menucexport->addChild('exp3', array('route' => 'back_reportfacturepaye', 'label' => 'Facture payé Partenaires'));
        $menucexport->addChild('exp4', array('route' => 'back_reportfacture', 'label' => 'Facturation'));
        $menucexport->addChild('exp5', array('route' => 'back_reportnouveaudeal', 'label' => 'Nouveaux Deal'));
        $menucexport->addChild('exp6', array('route' => 'back_reportnouveaupart', 'label' => 'Nouveaux Parteanaires'));
        $menucexport->addChild('exp7', array('route' => 'back_reportcouponconsomme', 'label' => 'Liste des coupons consommés'));



        //$menuchef->addChild('mr', array('route' => 'montant_remboursements_client', 'label' => 'Montant de Remboursements'));
        //$menuchef->addChild('nr', array('route' => 'nombre_remboursement_client', 'label' => 'Nombre Remboursements'));
        //$menuchef->addChild('vc', array('route' => 'volume_coupons_client', 'label' => 'Volume des coupons'));
        $menuchef->addChild('nc', array('route' => 'nombre_commande_client', 'label' => 'Nombre des commandes'));

        $mendireteur= $menu['Dashboard']->addChild('directeuradministratifetfinancier', array('label' => 'Directeur administratif et financier',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'daf')));
        $mendireteur->addChild('rfun', array('route' => 'recapitulatif_facturation_un_financier', 'label' => 'Récapitulatif Facturation'));
        $mendireteur->addChild('rfdeux', array('route' => 'recapitulatif_facturation_deux_financier', 'label' => 'Récapitulatif Facturation commission'));
        /*$mendireteur->addChild('fcnc', array('route' => 'fact_coup_nb_coup_financier', 'label' => 'Facturation des coupons par Nbr de coupons'));
        $mendireteur->addChild('fcp', array('route' => 'fact_coup_prix_financier', 'label' => 'Facturation des coupon par prix'));
        $mendireteur->addChild('vp', array('route' => 'volume_paiement_financier', 'label' => 'Volume de paiement'));
        $mendireteur->addChild('vc', array('route' => 'volume_caisse_financier', 'label' => 'Volume caisse'));
        $mendireteur->addChild('mc', array('route' => 'montant_caisse_financier', 'label' => 'Montant caisse'));
        $mendireteur->addChild('mr', array('route' => 'montant_remboursements_financier', 'label' => 'Montant de Remboursements'));*/

        $mendireteurcomm= $menu['Dashboard']->addChild('directeurcommercial', array('label' => 'Directeur commercial',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'dc')));
        $mendireteurcomm->addChild('perf', array('route' => 'performances_marchant', 'label' => 'Performances des marchands '));
        $mendireteurcomm->addChild('perfcomm', array('route' => 'performances_commercial', 'label' => 'Performances des commerciaux '));
        $mendireteurcomm->addChild('nacc', array('route' => 'nombre_annexes_choisis_commercial_planificateur', 'label' => 'Nombre d’annexes choisis par commercial'));
        $mendireteurcomm->addChild('ncsc', array('route' => 'nombre_contrats_signes_commercial_planificateur', 'label' => 'Nombre de contrats signés par commercial'));
        $mendireteurcomm->addChild('nnde', array('route' => 'nombre_deal_etat_planificateur', 'label' => 'Nombre de deals par état'));
        $mendireteurcomm->addChild('rfca', array('route' => 'recapitulatif_facturation_ca_financier', 'label' => 'Récapitulatif Facturation CA'));



        /* $mendireteurcomm->addChild('catd', array('route' => 'chiffre_affaire_tous_deal_commercial', 'label' => 'Chiffre d\'affaires pour tous les deals'));
        $mendireteurcomm->addChild('ca', array('route' => 'chiffre_affaire_commercial', 'label' => 'Chiffre d\'affaire'));
        $mendireteurcomm->addChild('cad', array('route' => 'chiffre_affaire_deal_commercial', 'label' => 'Chiffre d\'affaire par deal'));
        $mendireteurcomm->addChild('vc', array('route' => 'volume_contrats_commercial', 'label' => 'Volume des contrats'));*/

        /*$mendireteurcomm= $menu['Dashboard']->addChild('chefredaceur', array('label' => 'Rédacteur en chef',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'rc')));
        $mendireteurcomm->addChild('ndr', array('route' => 'nombre_deal_redacteur', 'label' => 'Nombre des deals par rédacteur'));
        $mendireteurcomm->addChild('dgrd', array('route' => 'duree_generation_redaction_deal_redacteur', 'label' => 'Durée entre la génération et la rédation de deal'));
        $mendireteurcomm->addChild('dr', array('route' => 'duree_redaction', 'label' => 'Durée de rédaction'));

        $menuplanif= $menu['Dashboard']->addChild('planificateur', array('label' => 'Planificateur',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'pla')));
        $menuplanif->addChild('dda', array('route' => 'deal_annules_planificateur', 'label' => '% de deals annulés'));
        $menuplanif->addChild('dnc', array('route' => 'nouveaux_contrats_planificateur', 'label' => '% des nouveaux contrats'));

        $menuplanif->addChild('dapdd', array('route' => 'delai_avant_publication_deals_planificateur', 'label' => 'Délai avant la publication des deals'));*/

        return $menu;

    }

    public function createMainDcMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );

        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');

        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }

        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));

//partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );


        $menu->addChild('Factures', array('route' => 'back_invoice', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );

        /*
                $em = $this->container->get('doctrine.orm.entity_manager');
                $menu = $factory->createItem('root', array(
                        'childrenAttributes' => array(
                            'class' => 'nav',
                            'id' => 'mobile-nav'
                        ),
                    )
                );



                //partner
                $menu->addChild('Partenaires', array('route' => 'back_dash_homepage', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
                );
                $menu['Partenaires']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Partenaires']->setLinkAttribute('data-toggle', 'dropdown');

                $menu['Partenaires']->addChild('part', array('route' => 'back_partner', 'label' => 'Gestion des partenaires'));

                //planning
                $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
                );
                $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');


                $plan = $menu['Plannings']->addChild('plann', array('label' => 'Gestion des plannings',
                    'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning')));
                $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
                foreach ($region as $value) {
                    $plan->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName()));
                }



                //contract
                $menu->addChild('Contrats', array('route' => 'back_dash_homepage', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'contract'))
                );
                $menu['Contrats']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Contrats']->setLinkAttribute('data-toggle', 'dropdown');


                //Deal
                $menu->addChild('Deal', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'deal'))
                );
                $menu['Deal']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Deal']->setLinkAttribute('data-toggle', 'dropdown');
                $menu['Deal']->addChild('Deal', array('route' => 'back_deal', 'label' => 'Gestion des Deals'));
        */
        return $menu;

        return $menu;

    }

    public function createMainPalainerMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );

        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');

        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }

        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));

//partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );


        $menu->addChild('Factures', array('route' => 'back_invoice', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );

        /*
                $em = $this->container->get('doctrine.orm.entity_manager');
                $menu = $factory->createItem('root', array(
                        'childrenAttributes' => array(
                            'class' => 'nav',
                            'id' => 'mobile-nav'
                        ),
                    )
                );



                //partner
                $menu->addChild('Partenaires', array('route' => 'back_dash_homepage', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
                );
                $menu['Partenaires']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Partenaires']->setLinkAttribute('data-toggle', 'dropdown');

                $menu['Partenaires']->addChild('part', array('route' => 'back_partner', 'label' => 'Gestion des partenaires'));

                //planning
                $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
                );
                $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');


                $plan = $menu['Plannings']->addChild('plann', array('label' => 'Gestion des plannings',
                    'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning')));
                $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
                foreach ($region as $value) {
                    $plan->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName()));
                }



                //contract
                $menu->addChild('Contrats', array('route' => 'back_dash_homepage', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'contract'))
                );
                $menu['Contrats']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Contrats']->setLinkAttribute('data-toggle', 'dropdown');


                //Deal
                $menu->addChild('Deal', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                        'attributes' => array('class' => 'dropdown', 'id' => 'deal'))
                );
                $menu['Deal']->setLinkAttribute('class', 'dropdown-toggle');
                $menu['Deal']->setLinkAttribute('data-toggle', 'dropdown');
                $menu['Deal']->addChild('Deal', array('route' => 'back_deal', 'label' => 'Gestion des Deals'));
        */

        /* $menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                 'attributes' => array('class' => 'dropdown', 'id' => 'config'))
         );
         $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
         $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');
         $menu['Dashboard']->addChild('dda', array('route' => 'deal_annules_planificateur', 'label' => '% de deals annulés'));
         $menu['Dashboard']->addChild('dnc', array('route' => 'nouveaux_contrats_planificateur', 'label' => '% des nouveaux contrats'));
         $menu['Dashboard']->addChild('nnde', array('route' => 'nombre_deal_etat_planificateur', 'label' => 'Nombre de deals par état'));
         $menu['Dashboard']->addChild('dapdd', array('route' => 'delai_avant_publication_deals_planificateur', 'label' => 'Délai avant la publication des deals'));*/

        return $menu;
    }

    public function createMainCommercialMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );


        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');

        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));


//partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );


        $menu->addChild('Factures', array('route' => 'back_invoice', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );

        $menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Dashboard']->addChild('perf', array('route' => 'performances_marchant', 'label' => 'Performances des marchands'));
        $menu['Dashboard']->addChild('perfcomm', array('route' => 'performances_commercial', 'label' => ' Performances des commerciaux'));
        $menu['Dashboard']->addChild('nacc', array('route' => 'nombre_annexes_choisis_commercial_planificateur', 'label' => 'Nombre d’annexes choisis par commercial'));
        $menu['Dashboard']->addChild('ncsc', array('route' => 'nombre_contrats_signes_commercial_planificateur', 'label' => 'Nombre de contrats signés par commercial'));
        $menu['Dashboard']->addChild('nnde', array('route' => 'nombre_deal_etat_planificateur', 'label' => 'Nombre de deals par état'));
        $menu['Dashboard']->addChild('rfca', array('route' => 'recapitulatif_facturation_ca_financier', 'label' => 'Récapitulatif Facturation CA'));
        //$menu['Dashboard']->addChild('fcnca', array('route' => 'recapitulatif_facturation_un_financier', 'label' => 'Récapitulatif Facturation'));
        // $menu['Dashboard']->addChild('catd', array('route' => 'chiffre_affaire_tous_deal_commercial', 'label' => 'Chiffre d\'affaires pour tous les deals'));
        //$menu['Dashboard']->addChild('ca', array('route' => 'chiffre_affaire_commercial', 'label' => 'Chiffre d\'affaire'));
        //$menu['Dashboard']->addChild('cad', array('route' => 'chiffre_affaire_deal_commercial', 'label' => 'Chiffre d\'affaire par deal'));
        //$menu['Dashboard']->addChild('vc', array('route' => 'volume_contrats_commercial', 'label' => 'Volume des contrats'));
        return $menu;

    }

    public function createMainCaissierMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );


        //Commande

        $menu->setLinkAttribute('class', 'dropdown-toggle');
        $menu->setLinkAttribute('data-toggle', 'dropdown');
        $menu->addChild('caisse', array('route' => 'mon_caisse', 'label' => 'Ma Caisse'));

        $menu->addChild('commande', array('route' => 'back_commande', 'label' => 'Commandes'));
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals','linkAttributes' => ['target' => '_blank'] ));



        return $menu;

    }

    public function createMainResponsableCaisseMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );


        //Liste des caisses
        $menu->addChild('Caisses', array('route' => 'list_caissier', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );
        $menu->addChild('Historiques des opérations', array('route' => 'historique_responsablecaissier', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );

//Liste des caisses
        /* $menu->addChild('Liste des commandes', array('route' => 'mon_caisse', 'class' => 'dropdown-toggle',
                 'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
         );*/


        return $menu;

    }

    public function createMainFinancierMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );

        //file
        $menu->addChild('Collaborateurs', array('route' => 'back_dash_homepage', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'dashboard')));
        //$menu['Fichier']->addChild('Users', array('route' => 'show_users', 'label' => 'Gestion des utilisateurs'));

        $agent = $menu['Collaborateurs']->addChild('agent', array('label' => 'Agents',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning')));
        $agent->addChild('planner', array('route' => 'list_planner', 'label' => 'Planificateurs'));
        $agent->addChild('commercial', array('route' => 'list_commercial', 'label' => 'Commerciaux'));
        $agent->addChild('redacteur', array('route' => 'list_redactor', 'label' => 'Rédacteurs'));
        $agent->addChild('caissier', array('route' => 'list_caissier', 'label' => 'Caissiers'));
        $agent->addChild('financier', array('route' => 'list_financier', 'label' => 'Financiers'));
        $agent->addChild('serviceclient', array('route' => 'list_serviceclient', 'label' => 'Service client'));
        $responsable = $menu['Collaborateurs']->addChild('respo', array('label' => 'Responsables',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning1')));
        $responsable->addChild('responsablecaissier', array('route' => 'list_responsablecaissier', 'label' => 'Responsable des Caisses'));
        $responsable->addChild('chefserviceclient', array('route' => 'list_chefserviceclient', 'label' => 'Chef de service client'));
        $responsable->addChild('daf', array('route' => 'list_daf', 'label' => 'Directeur administratif et financier'));


        //$menu['Gestion des Utilisateurs']->addChild('Déconnexion', array('route' => 'fos_user_security_logout', 'label' => 'Déconnexion'));
        $menu['Collaborateurs']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Collaborateurs']->setLinkAttribute('data-toggle', 'dropdown');
        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');


        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }

        $menu->addChild('Export', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'exportexcel'))
        );

        $menu['Export']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Export']->setLinkAttribute('data-toggle', 'dropdown');

        $menu['Export']->addChild('exp1', array('route' => 'back_reportcaisse', 'label' => 'Caisse '));
        $menu['Export']->addChild('exp2', array('route' => 'back_reportfidelite', 'label' => 'Fidélité '));
        $menu['Export']->addChild('exp3', array('route' => 'back_reportfacturepaye', 'label' => 'Facture payé Partenaires '));
        $menu['Export']->addChild('exp4', array('route' => 'back_reportfacture', 'label' => 'Facturation '));
        $menu['Export']->addChild('exp5', array('route' => 'back_reportnouveaudeal', 'label' => 'Nouveaux Deal '));
        $menu['Export']->addChild('exp6', array('route' => 'back_reportnouveaupart', 'label' => 'Nouveaux Parteanaires '));
        $menu['Export']->addChild('exp7', array('route' => 'back_reportcouponconsomme', 'label' => 'Liste des coupons consommés '));





        //deal
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));
        //partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );

        //tickets
        $menu->addChild('ticket', array('route' => 'list_ticket', 'label' => 'Tickets'));

        //Liste des factures
        $menu->addChild('Factures', array('route' => 'back_invoice', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );
        $menu->addChild('commande', array('route' => 'back_commande', 'label' => 'Commandes'));

        $menu->addChild('Réception des coupons', array('route' => 'coupon_manager', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'coupon'))
        );
        //$menu['Facturation']->addChild('coupon_manager', array('route' => 'coupon_manager', 'label' => 'Gestion des coupons'));

        $menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Dashboard']->addChild('fcnc', array('route' => 'recapitulatif_facturation_un_financier', 'label' => 'Récapitulatif Facturation'));
        $menu['Dashboard']->addChild('rfdeux', array('route' => 'recapitulatif_facturation_deux_financier', 'label' => 'Récapitulatif Facturation commission'));


        //$menu['Dashboard']->addChild('fcnc', array('route' => 'fact_coup_nb_coup_financier', 'label' => 'Facturation des coupons par Nbr de coupons'));
        //$menu['Dashboard']->addChild('fcp', array('route' => 'fact_coup_prix_financier', 'label' => 'Facturation des coupon par prix'));
        //$menu['Dashboard']->addChild('vp', array('route' => 'volume_paiement_financier', 'label' => 'Volume de paiement'));
        //$menu['Dashboard']->addChild('vc', array('route' => 'volume_caisse_financier', 'label' => 'Volume caisse'));
        //$menu['Dashboard']->addChild('mc', array('route' => 'montant_caisse_financier', 'label' => 'Montant caisse'));
        //$menu['Dashboard']->addChild('mr', array('route' => 'montant_remboursements_financier', 'label' => 'Montant de Remboursements'));
        return $menu;

    }

    public function createMainServiceClientMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );


        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );//
        //Liste des tickets
        $menu->addChild('Tickets', array('route' => 'list_ticket', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );
        $menu->addChild('commande', array('route' => 'back_commande', 'label' => 'Commandes'));
        $menu->addChild('lstcom', array('route' => 'back_client_livraison', 'label' => 'Confirmation des commandes ',
                'attributes' => array( 'id' => 'livrcomm'))
        );

//Liste des client

        $menu->addChild('Clients', array('route' => 'back_client', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );


        $menu->addChild('reservation', array('route' => 'front_booking_step1', 'label' => 'Réservation'));
        $menu->addChild('Commentaire', array('route' => 'back_comment', 'label' => 'Commentaires'));
        $menu->addChild('remboursement', array('route' => 'back_remboursement', 'label' => 'Remboursement des coupons'));
        $menu->addChild('Rapports', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'withbadge'))
        );
        $menu['Rapports']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Rapports']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Rapports']->addChild('partdeal', array('route' => 'back_reportdeal', 'label' => 'Rapport des deals'));
        $menu['Rapports']->addChild('suivicommande', array('route' => 'back_suivicommande', 'label' => 'Rapport de suivi des commandes'));
        $menu['Rapports']->addChild('partlivraison', array('route' => 'back_reportlivraison', 'label' => 'Rapport des livraisons'));



        return $menu;
    }

    public function createMainChefServiceClientMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );

        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');


        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(), 'label' =>  $value->getName()));
            //$plan->addChild($value->getName(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName()));
        }
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));
        $menu->addChild('Partenaires', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );//
        //Liste des tickets
        $menu->addChild('Tickets', array('route' => 'list_ticket', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );

        $menu->addChild('Commandes', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'withbadge'))
        );
        $menu['Commandes']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Commandes']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Commandes']->addChild('commande', array('route' => 'back_commande', 'label' => 'Gestions des commandes'));
        $menu['Commandes']->addChild('lstcom', array('route' => 'back_client_livraison', 'label' => 'Confirmation des commandes ',
                'attributes' => array( 'id' => 'livrcomm'))
        );



//Liste des client

        $menu->addChild('Clients', array('route' => 'back_client', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );


        $menu->addChild('reservation', array('route' => 'front_booking_step1', 'label' => 'Réservation'));
        $menu->addChild('Commentaire', array('route' => 'back_comment', 'label' => 'Commentaires'));
        $menu->addChild('remboursement', array('route' => 'back_remboursement', 'label' => 'Remboursement'));
        $menu->addChild('Rapports', array('route' => 'back_reportdeal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'raport'))
        );
        $menu['Rapports']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Rapports']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Rapports']->addChild('partdeal', array('route' => 'back_reportdeal', 'label' => 'Rapport des deals'));
        $menu['Rapports']->addChild('suivicommande', array('route' => 'back_suivicommande', 'label' => 'Rapport de suivi des commandes'));
        $menu['Rapports']->addChild('partlivraison', array('route' => 'back_reportlivraison', 'label' => 'Rapport des livraisons'));


        $menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Dashboard']->addChild('vt', array('route' => 'volume_tickets_client', 'label' => 'Récap Nombre tickets'));
        $menu['Dashboard']->addChild('vtt', array('route' => 'nombre_tickets_total_client', 'label' => 'Récap tickets Fermés Remboursement'));
        $menu['Dashboard']->addChild('tc', array('route' => 'nombre_commande_total_client', 'label' => 'Récap Ratio Commandes en attente'));
        $menu['Dashboard']->addChild('ce', array('route' => 'statistique_client', 'label' => 'Client par Etat'));
        $menu['Dashboard']->addChild('rc', array('route' => 'recapitulatif_client', 'label' => 'Récapitulatif des clients'));
        //$menu['Dashboard']->addChild('rr', array('route' => 'recapitulatif_remboursement', 'label' => 'Récapitulatif des Remboursement'));
        $menu['Dashboard']->addChild('rc', array('route' => 'recapitulatif_commentaires', 'label' => 'Récapitulatif des Commentaires'));
        $menu['Dashboard']->addChild('nm', array('route' => 'nombre_message_client', 'label' => 'Récapitulatif performance des tickets fermés'));
        $menu['Dashboard']->addChild('dt', array('route' => 'delai_traitement_client', 'label' => 'Delai de traitement des tickets '));
        //$menu['Dashboard']->addChild('mr', array('route' => 'montant_remboursements_client', 'label' => 'Montant de Remboursements'));
        //$menu['Dashboard']->addChild('nr', array('route' => 'nombre_remboursement_client', 'label' => 'Nombre Remboursements'));
        //$menu['Dashboard']->addChild('vc', array('route' => 'volume_coupons_client', 'label' => 'Volume des coupons'));
        $menu['Dashboard']->addChild('nc', array('route' => 'nombre_commande_client', 'label' => 'Nombre des commandes'));



        return $menu;
    }

    public function createMainPartnerMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );


        $menu->addChild('Mes deals', array('route' => 'dash_partner_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );
        //2016
        $menu->addChild('Mes factures', array('route' => 'dash_partner_invoice', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'commande'))
        );
        $menu->addChild('Consommation des coupons', array('route' => 'coupon_manager', 'class' => 'dropdown-toggle')
        );
//coupon_manager
        return $menu;

    }

    public function createMainDafMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $menu = $factory->createItem('root', array(
                'childrenAttributes' => array(
                    'class' => 'nav',
                    'id' => 'mobile-nav'
                ),
            )
        );

//file
        $menu->addChild('Collaborateurs', array('route' => 'back_dash_homepage', 'class' => 'left-side active', 'attributes' => array('class' => 'dropdown', 'id' => 'dashboard')));
        //$menu['Fichier']->addChild('Users', array('route' => 'show_users', 'label' => 'Gestion des utilisateurs'));


        $agent = $menu['Collaborateurs']->addChild('agent', array('label' => 'Agents',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning')));
        $agent->addChild('planner', array('route' => 'list_planner', 'label' => 'Planificateurs'));
        $agent->addChild('commercial', array('route' => 'list_commercial', 'label' => 'Commerciaux'));
        $agent->addChild('redacteur', array('route' => 'list_redactor', 'label' => 'Rédacteurs'));
        $agent->addChild('caissier', array('route' => 'list_caissier', 'label' => 'Caissiers'));
        $agent->addChild('financier', array('route' => 'list_financier', 'label' => 'Financiers'));
        $agent->addChild('serviceclient', array('route' => 'list_serviceclient', 'label' => 'Service client'));
        $responsable = $menu['Collaborateurs']->addChild('respo', array('label' => 'Responsables',
            'attributes' => array('class' => 'dropdown-submenu', 'id' => 'planning1')));

        $responsable->addChild('chefserviceclient', array('route' => 'list_chefserviceclient', 'label' => 'Chef de service client'));
        $responsable->addChild('daf', array('route' => 'list_daf', 'label' => 'Directeur administratif et financier'));




        //$menu['Gestion des Utilisateurs']->addChild('Déconnexion', array('route' => 'fos_user_security_logout', 'label' => 'Déconnexion'));
        $menu['Collaborateurs']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Collaborateurs']->setLinkAttribute('data-toggle', 'dropdown');
        //planning
        $menu->addChild('Plannings', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Plannings']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Plannings']->setLinkAttribute('data-toggle', 'dropdown');

        $region = $em->getRepository('BackPlanningBundle:Region')->findAll();
        foreach ($region as $value) {
            $menu['Plannings']->addChild('plann'.$value->getId(), array('route' => 'back_planning_home', 'routeParameters' => array('regionid' => $value->getId()), 'label' => $value->getName(),
            ));
        }
        $menu->addChild('Dealredactor', array('route' => 'back_deal', 'label' => 'Deals' ));

//partner
        $menu->addChild('Partenaires et Contrats', array('route' => 'back_partner', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'partner'))
        );
        $menu->addChild('Users', array('route' => 'back_invoice', 'label' => 'Factures'));
        $menu->addChild('Clients', array('route' => 'back_client', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'tickets'))
        );
        $menu->addChild('ticket', array('route' => 'list_ticket', 'label' => 'Tickets'));
        $menu->addChild('commande', array('route' => 'back_commande', 'label' => 'Commandes'));


        $menu->addChild('Caisse', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'planning'))
        );
        $menu['Caisse']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Caisse']->setLinkAttribute('data-toggle', 'dropdown');

        $menu['Caisse']->addChild('responsablecaissier', array('route' => 'list_responsablecaissier', 'label' => 'Responsable des Caisses '));
        $menu['Caisse']->addChild('caissier', array('route' => 'list_caissier', 'label' => 'Caissier'));



        $menu->addChild('Export', array('uri' => '#', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'exportexcel'))
        );
        $menu['Export']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Export']->setLinkAttribute('data-toggle', 'dropdown');

        $menu['Export']->addChild('exp1', array('route' => 'back_reportcaisse', 'label' => 'Caisse '));
        $menu['Export']->addChild('exp2', array('route' => 'back_reportfidelite', 'label' => 'Fidélité '));
        $menu['Export']->addChild('exp3', array('route' => 'back_reportfacturepaye', 'label' => 'Facture payé Partenaires '));
        $menu['Export']->addChild('exp4', array('route' => 'back_reportfacture', 'label' => 'Facturation '));
        $menu['Export']->addChild('exp5', array('route' => 'back_reportnouveaudeal', 'label' => 'Nouveaux Deal '));
        $menu['Export']->addChild('exp6', array('route' => 'back_reportnouveaupart', 'label' => 'Nouveaux Parteanaires '));
        $menu['Export']->addChild('exp7', array('route' => 'back_reportcouponconsomme', 'label' => 'Liste des coupons consommés '));



        //$menu['Caisse']->addChild('historique_caissier', array('route' => 'historique_responsablecaissier', 'label' => 'Historiques des opérations'));



        $menu->addChild('back_remboursement', array('route' => 'back_remboursement', 'label' => 'Remboursement'));
        $menu->addChild('Dashboard', array('route' => 'back_deal', 'class' => 'dropdown-toggle',
                'attributes' => array('class' => 'dropdown', 'id' => 'config'))
        );
        $menu['Dashboard']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Dashboard']->setLinkAttribute('data-toggle', 'dropdown');
        $menu['Dashboard']->addChild('fcnc', array('route' => 'recapitulatif_facturation_un_financier', 'label' => 'Récapitulatif Facturation'));
        $menu['Dashboard']->addChild('rfdeux', array('route' => 'recapitulatif_facturation_deux_financier', 'label' => 'Récapitulatif Facturation commission'));


//contract
        return $menu;

    }

}