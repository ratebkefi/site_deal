<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/js')) {
            // _assetic_37790b0
            if ($pathinfo === '/js/37790b0.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '37790b0',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_37790b0',);
            }

            // _assetic_b6fa751
            if ($pathinfo === '/js/b6fa751.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b6fa751',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b6fa751',);
            }

            // _assetic_deb23be
            if ($pathinfo === '/js/deb23be.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'deb23be',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_deb23be',);
            }

            // _assetic_a71c3ad
            if ($pathinfo === '/js/a71c3ad.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'a71c3ad',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_a71c3ad',);
            }

            // _assetic_b35a613
            if ($pathinfo === '/js/b35a613.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b35a613',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b35a613',);
            }

            // _assetic_f56c267
            if ($pathinfo === '/js/f56c267.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'f56c267',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_f56c267',);
            }

            // _assetic_30bedc1
            if ($pathinfo === '/js/30bedc1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '30bedc1',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_30bedc1',);
            }

            // _assetic_f6091f1
            if ($pathinfo === '/js/f6091f1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'f6091f1',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_f6091f1',);
            }

            // _assetic_4229408
            if ($pathinfo === '/js/4229408.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 4229408,  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_4229408',);
            }

            // _assetic_6491d9a
            if ($pathinfo === '/js/6491d9a.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '6491d9a',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_6491d9a',);
            }

            // _assetic_b9e8148
            if ($pathinfo === '/js/b9e8148.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b9e8148',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b9e8148',);
            }

            // _assetic_26abf61
            if ($pathinfo === '/js/26abf61.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '26abf61',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_26abf61',);
            }

            // _assetic_0ebe4b4
            if ($pathinfo === '/js/0ebe4b4.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '0ebe4b4',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_0ebe4b4',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // main_ratingclient_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'main_ratingclient_homepage')), array (  '_controller' => 'MainRatingclientBundle:Default:index',));
        }

        if (0 === strpos($pathinfo, '/rest')) {
            // main_rest_register
            if (0 === strpos($pathinfo, '/rest/login') && preg_match('#^/rest/login/(?P<email>[^/]++)/(?P<pwd>[^/]++)/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'main_rest_register')), array (  '_controller' => 'Main\\RestBundle\\Controller\\DefaultController::indexAction',));
            }

            // main_rest_partner
            if (0 === strpos($pathinfo, '/rest/partner') && preg_match('#^/rest/partner/(?P<iduser>[^/]++)/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'main_rest_partner')), array (  '_controller' => 'Main\\RestBundle\\Controller\\DefaultController::partnerAction',));
            }

            // main_rest_deal
            if (0 === strpos($pathinfo, '/rest/deal') && preg_match('#^/rest/deal/(?P<iduser>[^/]++)/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'main_rest_deal')), array (  '_controller' => 'Main\\RestBundle\\Controller\\DefaultController::dealAction',));
            }

            // main_rest_check
            if (0 === strpos($pathinfo, '/rest/coupon') && preg_match('#^/rest/coupon/(?P<iduser>[^/]++)/(?P<codecoupon>[^/]++)/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'main_rest_check')), array (  '_controller' => 'Main\\RestBundle\\Controller\\DefaultController::checkAction',));
            }

            // main_rest_demande
            if (0 === strpos($pathinfo, '/rest/demande') && preg_match('#^/rest/demande/(?P<iduser>[^/]++)/(?P<iddeal>[^/]++)/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'main_rest_demande')), array (  '_controller' => 'Main\\RestBundle\\Controller\\DefaultController::demandeAction',));
            }

        }

        if (0 === strpos($pathinfo, '/dash')) {
            if (0 === strpos($pathinfo, '/dash/pages')) {
                // back_page_homepage
                if ($pathinfo === '/dash/pages') {
                    return array (  '_controller' => 'Back\\PageBundle\\Controller\\DefaultController::indexAction',  '_route' => 'back_page_homepage',);
                }

                // update_page_manager
                if (0 === strpos($pathinfo, '/dash/pages/update') && preg_match('#^/dash/pages/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_page_manager')), array (  '_controller' => 'Back\\PageBundle\\Controller\\DefaultController::updateAction',));
                }

                // add_page_manager
                if ($pathinfo === '/dash/pages/add') {
                    return array (  '_controller' => 'Back\\PageBundle\\Controller\\DefaultController::addAction',  '_route' => 'add_page_manager',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/social')) {
                // back_social_homepage
                if ($pathinfo === '/dash/social') {
                    return array (  '_controller' => 'Back\\PageBundle\\Controller\\SocialController::indexAction',  '_route' => 'back_social_homepage',);
                }

                // update_social_manager
                if (0 === strpos($pathinfo, '/dash/social/update') && preg_match('#^/dash/social/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_social_manager')), array (  '_controller' => 'Back\\PageBundle\\Controller\\SocialController::updateAction',));
                }

                // delete_social_manager
                if (0 === strpos($pathinfo, '/dash/social/delete') && preg_match('#^/dash/social/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_social_manager')), array (  '_controller' => 'Back\\PageBundle\\Controller\\SocialController::deleteAction',));
                }

                // add_social_manager
                if ($pathinfo === '/dash/social/add') {
                    return array (  '_controller' => 'Back\\PageBundle\\Controller\\SocialController::addAction',  '_route' => 'add_social_manager',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/banner')) {
                // back_banner_homepage
                if ($pathinfo === '/dash/banner') {
                    return array (  '_controller' => 'Back\\PageBundle\\Controller\\BannerController::indexAction',  '_route' => 'back_banner_homepage',);
                }

                // update_banner_manager
                if (0 === strpos($pathinfo, '/dash/banner/update') && preg_match('#^/dash/banner/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_banner_manager')), array (  '_controller' => 'Back\\PageBundle\\Controller\\BannerController::updateAction',));
                }

                // delete_banner_manager
                if (0 === strpos($pathinfo, '/dash/banner/delete') && preg_match('#^/dash/banner/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_banner_manager')), array (  '_controller' => 'Back\\PageBundle\\Controller\\BannerController::deleteAction',));
                }

                // add_banner_manager
                if ($pathinfo === '/dash/banner/add') {
                    return array (  '_controller' => 'Back\\PageBundle\\Controller\\BannerController::addAction',  '_route' => 'add_banner_manager',);
                }

            }

        }

        // main_front_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'main_front_homepage');
            }

            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DefaultController::indexAction',  '_route' => 'main_front_homepage',);
        }

        // hide_banner
        if ($pathinfo === '/hidebanner') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DefaultController::hidebannerAction',  '_route' => 'hide_banner',);
        }

        // deal_detail
        if (preg_match('#^/(?P<region>[^/]++)/(?P<categorie>[^/]++)/(?P<id>\\d+)/(?P<name>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_detail')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::indexAction',));
        }

        // jachetelist
        if (preg_match('#^/(?P<deal>[^/]++)/(?P<id>\\d+)/jachete\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'jachetelist')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::jacheteAction',));
        }

        // paybox_show
        if ($pathinfo === '/paybox.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::payboxAction',  '_route' => 'paybox_show',);
        }

        // api_url
        if (0 === strpos($pathinfo, '/apiurl') && preg_match('#^/apiurl/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_url')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::apiurlAction',));
        }

        // confirm_command
        if (preg_match('#^/(?P<id>\\d+)/confirm\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'confirm_command')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::confirmAction',));
        }

        // deal_validation_commande
        if (preg_match('#^/(?P<id>[^/]++)/confirmationcommande\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_validation_commande')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::confirmationAction',));
        }

        // deal_validation_commande_gpg
        if ($pathinfo === '/confirmationcommandegpg.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::confirmationGpgAction',  '_route' => 'deal_validation_commande_gpg',);
        }

        // deal_validation_commande_Bigfid
        if (preg_match('#^/(?P<id>[^/]++)/confirmationcommandeBigfid\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_validation_commande_Bigfid')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::confirmationBigfidAction',));
        }

        if (0 === strpos($pathinfo, '/deal')) {
            // deal_ajx_list
            if ($pathinfo === '/dealajxlist') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ajxlistAction',  '_route' => 'deal_ajx_list',);
            }

            // deal_passe
            if ($pathinfo === '/dealspasses.html') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::dealpasseAction',  '_route' => 'deal_passe',);
            }

        }

        // dealpasseajx
        if (0 === strpos($pathinfo, '/passedajx') && preg_match('#^/passedajx/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'dealpasseajx')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::dealpasseajxAction',));
        }

        // deal_listpassed_page
        if (0 === strpos($pathinfo, '/dealspasses') && preg_match('#^/dealspasses/(?P<page>\\d+)/(?P<cat>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_listpassed_page')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::dealpassepageAction',));
        }

        // deal_list
        if (preg_match('#^/(?P<region>[^/]++)/(?P<id>\\d+)/(?P<name>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_list')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ListAction',));
        }

        // deal_list_page
        if (0 === strpos($pathinfo, '/a') && preg_match('#^/a/(?P<name>[^/]++)/(?P<id>[^/]++)/(?P<page>[^/]++)/(?P<price>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_list_page')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ListpageAction',));
        }

        // deal_list_region
        if (preg_match('#^/(?P<id>\\d+)/regions/(?P<name>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_list_region')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::regionAction',));
        }

        // deal_list_parregion
        if (preg_match('#^/(?P<id>\\d+)/laregions$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'deal_list_parregion')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::dealparregionAction',));
        }

        // add_adress
        if (preg_match('#^/(?P<ref>[^/]++)/ajouter_adresse\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_adress')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ajouterAdressAction',));
        }

        // add_adress_livraison
        if (preg_match('#^/(?P<ref>[^/]++)/ajouter_adresse_livraison\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_adress_livraison')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ajouterAdresslivraisonAction',));
        }

        // add_phone
        if (preg_match('#^/(?P<ref>[^/]++)/ajouter_phone\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_phone')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ajouterPhoneAction',));
        }

        // ajxdealtop
        if ($pathinfo === '/dealajxtop') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::dealajxtopAction',  '_route' => 'ajxdealtop',);
        }

        // ajxdeallink
        if ($pathinfo === '/ajxdeallink') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::ajxdeallinkAction',  '_route' => 'ajxdeallink',);
        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/pagedeal')) {
                // pager_deal_comment
                if (0 === strpos($pathinfo, '/pagedealcomment') && preg_match('#^/pagedealcomment/(?P<id>[^/]++)/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pager_deal_comment')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::commentpagerAction',));
                }

                // pager_deal_allcomment
                if (0 === strpos($pathinfo, '/pagedealallcomment') && preg_match('#^/pagedealallcomment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pager_deal_allcomment')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::allcommentpagerAction',));
                }

            }

            // deal_problem_commande
            if ($pathinfo === '/problemcommande.html') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::annulationAction',  '_route' => 'deal_problem_commande',);
            }

        }

        // notification
        if ($pathinfo === '/notification.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DealController::notificationAction',  '_route' => 'notification',);
        }

        if (0 === strpos($pathinfo, '/ajx')) {
            if (0 === strpos($pathinfo, '/ajxregion')) {
                // ajx_region_deal
                if ($pathinfo === '/ajxregiondeal') {
                    return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DefaultController::ajxregiondealAction',  '_route' => 'ajx_region_deal',);
                }

                // ajxregiontop
                if ($pathinfo === '/ajxregiontop') {
                    return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DefaultController::ajxregiontopAction',  '_route' => 'ajxregiontop',);
                }

            }

            // ajxsetregion
            if ($pathinfo === '/ajxsetregion') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\DefaultController::ajxsetregionAction',  '_route' => 'ajxsetregion',);
            }

        }

        // pages_detail
        if (0 === strpos($pathinfo, '/page') && preg_match('#^/page/(?P<name>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pages_detail')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\PagesController::indexAction',));
        }

        // inscription
        if ($pathinfo === '/inscription.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::inscriptionAction',  '_route' => 'inscription',);
        }

        if (0 === strpos($pathinfo, '/co')) {
            // identification
            if ($pathinfo === '/connexion.html') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::identificationAction',  '_route' => 'identification',);
            }

            if (0 === strpos($pathinfo, '/com')) {
                // mon_compte
                if ($pathinfo === '/compte.html') {
                    return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::compteAction',  '_route' => 'mon_compte',);
                }

                // my_command
                if ($pathinfo === '/commande.html') {
                    return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::commandeAction',  '_route' => 'my_command',);
                }

            }

        }

        // detail_commande
        if (preg_match('#^/(?P<id>\\d+)/detail\\-commande\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'detail_commande')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::detcommandeAction',));
        }

        // mes_adresse
        if ($pathinfo === '/mesadresses.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::adresseAction',  '_route' => 'mes_adresse',);
        }

        // coupon
        if (preg_match('#^/(?P<id>[^/]++)/coupon\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::couponAction',));
        }

        // mot_de_pass_oublie
        if ($pathinfo === '/mot_de_pass_oublie.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::resetPasswordAction',  '_route' => 'mot_de_pass_oublie',);
        }

        // reset
        if ($pathinfo === '/reset.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::resetAction',  '_route' => 'reset',);
        }

        // traking_coupon
        if (0 === strpos($pathinfo, '/traking') && preg_match('#^/traking/(?P<ref>[^/]++)/(?P<ship>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'traking_coupon')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::trakingAction',));
        }

        // confirm_client
        if (preg_match('#^/(?P<token>[^/]++)/confirm\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'confirm_client')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::confirmAction',));
        }

        // viewcp
        if ($pathinfo === '/viewcop') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::codePostaleAction',  '_route' => 'viewcp',);
        }

        if (0 === strpos($pathinfo, '/delegationlist')) {
            // listdelegation
            if ($pathinfo === '/delegationlist') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::delegationAction',  '_route' => 'listdelegation',);
            }

            // listvilleajx
            if ($pathinfo === '/delegationlist') {
                return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::delegationAction',  '_route' => 'listvilleajx',);
            }

        }

        // ville
        if ($pathinfo === '/ville') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::villeAction',  '_route' => 'ville',);
        }

        // count_cmd
        if ($pathinfo === '/countcmd') {
            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::countcmdAction',  '_route' => 'count_cmd',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            // login_check_client
            if ($pathinfo === '/login_check_client') {
                return array('_route' => 'login_check_client');
            }

            // logout_client
            if ($pathinfo === '/logout_client') {
                return array('_route' => 'logout_client');
            }

        }

        // delete_mes_adresse
        if ($pathinfo === '/adressedelete') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::deleteadresseAction',  '_route' => 'delete_mes_adresse',);
        }

        // default_adresse
        if ($pathinfo === '/defaultdresse') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::defaultdresseAction',  '_route' => 'default_adresse',);
        }

        // coupon_commande_pdf
        if (0 === strpos($pathinfo, '/printcommand') && preg_match('#^/printcommand/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande_pdf')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::printlivAction',));
        }

        if (0 === strpos($pathinfo, '/adresseupdate')) {
            // update_mes_adresse
            if ($pathinfo === '/adresseupdate') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::updateadresseAction',  '_route' => 'update_mes_adresse',);
            }

            // update_mes_adresse_livraison
            if ($pathinfo === '/adresseupdatelivraison') {
                return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::updateadresselivraisonAction',  '_route' => 'update_mes_adresse_livraison',);
            }

        }

        // mes_bigfid
        if ($pathinfo === '/mes_bigfid.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::bigfidAction',  '_route' => 'mes_bigfid',);
        }

        // abonnement
        if ($pathinfo === '/abonnement.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::abonnementAction',  '_route' => 'abonnement',);
        }

        // confirmation_inscription
        if ($pathinfo === '/confirmation_inscription.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::confirmationAction',  '_route' => 'confirmation_inscription',);
        }

        // message_inscription
        if ($pathinfo === '/message_inscription.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\ClientController::messageAction',  '_route' => 'message_inscription',);
        }

        // ticket_manager
        if ($pathinfo === '/ticket.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\TicketController::ticketAction',  '_route' => 'ticket_manager',);
        }

        // ajouter_ticket
        if ($pathinfo === '/ajouterticket.html') {
            return array (  '_controller' => 'Main\\FrontBundle\\Controller\\TicketController::addAction',  '_route' => 'ajouter_ticket',);
        }

        // detail_ticket
        if (preg_match('#^/(?P<id>[^/]++)/detailticket\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'detail_ticket')), array (  '_controller' => 'Main\\FrontBundle\\Controller\\TicketController::detailAction',));
        }

        if (0 === strpos($pathinfo, '/reservation')) {
            // front_booking_step1
            if (rtrim($pathinfo, '/') === '/reservation') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'front_booking_step1');
                }

                return array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::indexAction',  '_route' => 'front_booking_step1',);
            }

            if (0 === strpos($pathinfo, '/reservation/step')) {
                // front_booking_step3
                if ($pathinfo === '/reservation/step1') {
                    return array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::step1Action',  '_route' => 'front_booking_step3',);
                }

                // front_booking_step2
                if (0 === strpos($pathinfo, '/reservation/step2') && preg_match('#^/reservation/step2/(?P<code_coupon>[^/]++)/(?P<month>[^/]++)/(?P<year>\\d{4})$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'front_booking_step2')), array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::step2Action',));
                }

            }

            // front_booking_load
            if ($pathinfo === '/reservation/load') {
                return array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::loadAction',  '_route' => 'front_booking_load',);
            }

            // front_booking_user
            if (0 === strpos($pathinfo, '/reservation/book') && preg_match('#^/reservation/book/(?P<deal>[^/]++)/(?P<date>[^/]++)/(?P<codeCoupon>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'front_booking_user')), array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::bookAction',));
            }

            // front_booking_calandar
            if (0 === strpos($pathinfo, '/reservation/Calandar') && preg_match('#^/reservation/Calandar/(?P<deal>[^/]++)/(?P<month>[^/]++)/(?P<year>[^/]++)/(?P<monthEnd>[^/]++)/(?P<yearEnd>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'front_booking_calandar')), array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::CalandarAction',));
            }

            // disponibilite
            if (0 === strpos($pathinfo, '/reservation/disponibilite') && preg_match('#^/reservation/disponibilite/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'disponibilite')), array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::disponibiliteAction',));
            }

            // disponibilite_horaire
            if (0 === strpos($pathinfo, '/reservation/horaire') && preg_match('#^/reservation/horaire/(?P<deal>[^/]++)/(?P<date>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'disponibilite_horaire')), array (  '_controller' => 'Main\\BookingBundle\\Controller\\BookingController::horaireAction',));
            }

        }

        if (0 === strpos($pathinfo, '/dash')) {
            if (0 === strpos($pathinfo, '/dash/client')) {
                // back_client
                if (rtrim($pathinfo, '/') === '/dash/client') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_client');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::indexAction',  '_route' => 'back_client',);
                }

                // back_client_livraison
                if ($pathinfo === '/dash/client/listlivraiosn') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::commandelivraisonAction',  '_route' => 'back_client_livraison',);
                }

                // view_client_manager
                if (0 === strpos($pathinfo, '/dash/client/show') && preg_match('#^/dash/client/show/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_client_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::showAction',));
                }

                // block_client_manager
                if (0 === strpos($pathinfo, '/dash/client/block') && preg_match('#^/dash/client/block/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'block_client_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::blockAction',));
                }

                // unblock_client_manager
                if (0 === strpos($pathinfo, '/dash/client/unblock') && preg_match('#^/dash/client/unblock/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'unblock_client_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::unblockAction',));
                }

                // search_client_manager
                if ($pathinfo === '/dash/client/search') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::searchAction',  '_route' => 'search_client_manager',);
                }

                // bigfid_client
                if (0 === strpos($pathinfo, '/dash/client/bigfid') && preg_match('#^/dash/client/bigfid/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bigfid_client')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::bigFidAction',));
                }

                // back_client_adresse
                if (0 === strpos($pathinfo, '/dash/client/adresse') && preg_match('#^/dash/client/adresse/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_client_adresse')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::addresseAction',));
                }

                // back_client_adresse_modifier
                if (0 === strpos($pathinfo, '/dash/client/modifadresse') && preg_match('#^/dash/client/modifadresse/(?P<id>\\d+)/(?P<client>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_client_adresse_modifier')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::editaddresseAction',));
                }

                // back_client_edit
                if (0 === strpos($pathinfo, '/dash/client/edit') && preg_match('#^/dash/client/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_client_edit')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::editAction',));
                }

                // list_client_par_nom
                if ($pathinfo === '/dash/client/namefilter') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::listparnomAction',  '_route' => 'list_client_par_nom',);
                }

                // list_client_par_prenom
                if ($pathinfo === '/dash/client/fnamefilter') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::listparprenomAction',  '_route' => 'list_client_par_prenom',);
                }

                // list_client_par_tel
                if ($pathinfo === '/dash/client/telfilter') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::listpartelAction',  '_route' => 'list_client_par_tel',);
                }

                // list_client_par_email
                if ($pathinfo === '/dash/client/emailfilter') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ClientController::listparemailAction',  '_route' => 'list_client_par_email',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/locality')) {
                // back_locality
                if (rtrim($pathinfo, '/') === '/dash/locality') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_locality');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\LocaliteController::indexAction',  '_route' => 'back_locality',);
                }

                // update_locality_manager
                if (0 === strpos($pathinfo, '/dash/locality/update') && preg_match('#^/dash/locality/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_locality_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\LocaliteController::editAction',));
                }

                // add_locality_manager
                if ($pathinfo === '/dash/locality/add') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\LocaliteController::addAction',  '_route' => 'add_locality_manager',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/bank')) {
                // back_bank
                if (rtrim($pathinfo, '/') === '/dash/bank') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_bank');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\BankController::indexAction',  '_route' => 'back_bank',);
                }

                // update_bank_manager
                if (0 === strpos($pathinfo, '/dash/bank/update') && preg_match('#^/dash/bank/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_bank_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\BankController::editAction',));
                }

                if (0 === strpos($pathinfo, '/dash/bank/a')) {
                    // add_bank_manager
                    if ($pathinfo === '/dash/bank/add') {
                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\BankController::addAction',  '_route' => 'add_bank_manager',);
                    }

                    // activate_bank_manager
                    if (0 === strpos($pathinfo, '/dash/bank/act') && preg_match('#^/dash/bank/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_bank_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\BankController::activateAction',));
                    }

                }

                // unactivate_bank_manager
                if (0 === strpos($pathinfo, '/dash/bank/unact') && preg_match('#^/dash/bank/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_bank_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\BankController::unactivateAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/paymentmethod')) {
                // back_paymentmethod
                if (rtrim($pathinfo, '/') === '/dash/paymentmethod') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_paymentmethod');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\PaymentmethodController::indexAction',  '_route' => 'back_paymentmethod',);
                }

                // update_paymentmethod_manager
                if (0 === strpos($pathinfo, '/dash/paymentmethod/update') && preg_match('#^/dash/paymentmethod/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_paymentmethod_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\PaymentmethodController::editAction',));
                }

                if (0 === strpos($pathinfo, '/dash/paymentmethod/a')) {
                    // add_paymentmethod_manager
                    if ($pathinfo === '/dash/paymentmethod/add') {
                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\PaymentmethodController::addAction',  '_route' => 'add_paymentmethod_manager',);
                    }

                    // activate_paymentmethod_manager
                    if (0 === strpos($pathinfo, '/dash/paymentmethod/act') && preg_match('#^/dash/paymentmethod/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_paymentmethod_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\PaymentmethodController::activateAction',));
                    }

                }

                // unactivate_paymentmethod_manager
                if (0 === strpos($pathinfo, '/dash/paymentmethod/unact') && preg_match('#^/dash/paymentmethod/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_paymentmethod_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\PaymentmethodController::unactivateAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/c')) {
                if (0 === strpos($pathinfo, '/dash/commande')) {
                    // back_commande
                    if (preg_match('#^/dash/commande(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_commande')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::indexAction',  'page' => 1,));
                    }

                    // update_commande_manager
                    if (0 === strpos($pathinfo, '/dash/commande/update') && preg_match('#^/dash/commande/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_commande_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::editAction',));
                    }

                    // add_commande_manager
                    if (0 === strpos($pathinfo, '/dash/commande/add') && preg_match('#^/dash/commande/add/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_commande_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::addAction',));
                    }

                    // show_commande_manager
                    if (0 === strpos($pathinfo, '/dash/commande/show') && preg_match('#^/dash/commande/show/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'show_commande_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::showAction',));
                    }

                    // paye_commande_manager
                    if (0 === strpos($pathinfo, '/dash/commande/paye') && preg_match('#^/dash/commande/paye/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'paye_commande_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::payeAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/commande/json')) {
                        // ahs_commun_json_villes
                        if ($pathinfo === '/dash/commande/json/villes') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::villesAction',  '_route' => 'ahs_commun_json_villes',);
                        }

                        // ahs_commun_json_codesPostaux
                        if ($pathinfo === '/dash/commande/json/codesPostaux') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::codesPostauxAction',  '_route' => 'ahs_commun_json_codesPostaux',);
                        }

                    }

                    // commande_annuler
                    if (0 === strpos($pathinfo, '/dash/commande/annulercmd') && preg_match('#^/dash/commande/annulercmd/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'commande_annuler')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::annulercmdAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/commande/coupon')) {
                        // coupon_commande
                        if (preg_match('#^/dash/commande/coupon/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::indexAction',));
                        }

                        // coupon_commande_traiter
                        if (preg_match('#^/dash/commande/coupon/(?P<id>\\d+)/traiter$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande_traiter')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::traiterAction',));
                        }

                        // coupon_commande_tracking
                        if (preg_match('#^/dash/commande/coupon/(?P<id>\\d+)/tracking$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande_tracking')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::trackingAction',));
                        }

                        // coupon_commande_annule
                        if (preg_match('#^/dash/commande/coupon/(?P<id>\\d+)/annule$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande_annule')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::annuleAction',));
                        }

                        // coupon_commande_approuver
                        if (preg_match('#^/dash/commande/coupon/(?P<id>\\d+)/approuver$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande_approuver')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::approuverAction',));
                        }

                        // coupon_commande2
                        if (0 === strpos($pathinfo, '/dash/commande/coupon/print') && preg_match('#^/dash/commande/coupon/print/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'coupon_commande2')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::printAction',));
                        }

                        // coupon_manager
                        if ($pathinfo === '/dash/commande/coupon/couponmanager') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::managerAction',  '_route' => 'coupon_manager',);
                        }

                        if (0 === strpos($pathinfo, '/dash/commande/coupon/livr')) {
                            // coupon_livraison
                            if ($pathinfo === '/dash/commande/coupon/livraison') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::livraisonAction',  '_route' => 'coupon_livraison',);
                            }

                            // livrer_coupon
                            if ($pathinfo === '/dash/commande/coupon/livrer') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::livrerAction',  '_route' => 'livrer_coupon',);
                            }

                        }

                        // print_coupon
                        if ($pathinfo === '/dash/commande/coupon/print') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CouponController::imprimerAction',  '_route' => 'print_coupon',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/dash/caissier')) {
                    // list_caissier
                    if (rtrim($pathinfo, '/') === '/dash/caissier') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_caissier');
                        }

                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::indexAction',  '_route' => 'list_caissier',);
                    }

                    // mon_caisse
                    if (rtrim($pathinfo, '/') === '/dash/caissier/caisse') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'mon_caisse');
                        }

                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::caisseAction',  '_route' => 'mon_caisse',);
                    }

                    // update_caissier_manager
                    if (0 === strpos($pathinfo, '/dash/caissier/update') && preg_match('#^/dash/caissier/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_caissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::editAction',));
                    }

                    // view_caissier_manager
                    if (0 === strpos($pathinfo, '/dash/caissier/view') && preg_match('#^/dash/caissier/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_caissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::viewAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/caissier/a')) {
                        // add_caissier_manager
                        if ($pathinfo === '/dash/caissier/add') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::addAction',  '_route' => 'add_caissier_manager',);
                        }

                        // activate_caissier_manager
                        if (0 === strpos($pathinfo, '/dash/caissier/act') && preg_match('#^/dash/caissier/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_caissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::activateAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/dash/caissier/unact')) {
                        // unactivate_caissier_manager
                        if (preg_match('#^/dash/caissier/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_caissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::unactivateAction',));
                        }

                        // delete_caissier_manager
                        if (preg_match('#^/dash/caissier/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_caissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CaissierController::unactivateAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/respcaisse')) {
                // list_responsablecaissier
                if (rtrim($pathinfo, '/') === '/dash/respcaisse') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_responsablecaissier');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::indexAction',  '_route' => 'list_responsablecaissier',);
                }

                // historique_responsablecaissier
                if ($pathinfo === '/dash/respcaisse/historique') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::historiqueAction',  '_route' => 'historique_responsablecaissier',);
                }

                // update_responsablecaissier_manager
                if (0 === strpos($pathinfo, '/dash/respcaisse/update') && preg_match('#^/dash/respcaisse/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_responsablecaissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::editAction',));
                }

                // view_responsablecaissier_manager
                if (0 === strpos($pathinfo, '/dash/respcaisse/view') && preg_match('#^/dash/respcaisse/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_responsablecaissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::viewAction',));
                }

                if (0 === strpos($pathinfo, '/dash/respcaisse/a')) {
                    // add_responsablecaissier_manager
                    if ($pathinfo === '/dash/respcaisse/add') {
                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::addAction',  '_route' => 'add_responsablecaissier_manager',);
                    }

                    // activate_responsablecaissier_manager
                    if (0 === strpos($pathinfo, '/dash/respcaisse/act') && preg_match('#^/dash/respcaisse/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_responsablecaissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::activateAction',));
                    }

                }

                // unactivate_responsablecaissier_manager
                if (0 === strpos($pathinfo, '/dash/respcaisse/unact') && preg_match('#^/dash/respcaisse/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_responsablecaissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::unactivateAction',));
                }

                // retrait_responsablecaissier_manager
                if (0 === strpos($pathinfo, '/dash/respcaisse/retrait') && preg_match('#^/dash/respcaisse/retrait/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'retrait_responsablecaissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::retraitAction',));
                }

                // historique_responsablecaissier_manager
                if (0 === strpos($pathinfo, '/dash/respcaisse/historique') && preg_match('#^/dash/respcaisse/historique/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'historique_responsablecaissier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ResponsableCaissierController::historiqueRespAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/financier')) {
                // list_financier
                if (rtrim($pathinfo, '/') === '/dash/financier') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_financier');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\FinancierController::indexAction',  '_route' => 'list_financier',);
                }

                // update_financier_manager
                if (0 === strpos($pathinfo, '/dash/financier/update') && preg_match('#^/dash/financier/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_financier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\FinancierController::editAction',));
                }

                // view_financier_manager
                if (0 === strpos($pathinfo, '/dash/financier/view') && preg_match('#^/dash/financier/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_financier_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\FinancierController::viewAction',));
                }

                // add_financier_manager
                if ($pathinfo === '/dash/financier/add') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\FinancierController::addAction',  '_route' => 'add_financier_manager',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/serviceclient')) {
                // list_serviceclient
                if (rtrim($pathinfo, '/') === '/dash/serviceclient') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_serviceclient');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::indexAction',  '_route' => 'list_serviceclient',);
                }

                // update_serviceclient_manager
                if (0 === strpos($pathinfo, '/dash/serviceclient/update') && preg_match('#^/dash/serviceclient/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_serviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::editAction',));
                }

                // view_serviceclient_manager
                if (0 === strpos($pathinfo, '/dash/serviceclient/view') && preg_match('#^/dash/serviceclient/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_serviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::viewAction',));
                }

                // add_serviceclient_manager
                if ($pathinfo === '/dash/serviceclient/add') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::addAction',  '_route' => 'add_serviceclient_manager',);
                }

                if (0 === strpos($pathinfo, '/dash/serviceclient/ticket')) {
                    // list_ticket
                    if (rtrim($pathinfo, '/') === '/dash/serviceclient/ticket') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_ticket');
                        }

                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticketAction',  '_route' => 'list_ticket',);
                    }

                    // add_ticket
                    if (rtrim($pathinfo, '/') === '/dash/serviceclient/ticket/add') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'add_ticket');
                        }

                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ajouterTicketAction',  '_route' => 'add_ticket',);
                    }

                }

                // view_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/view/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'view_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::viewTicketAction',));
                }

                // message_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/message/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'message_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::messageTicketAction',));
                }

                // supprimer_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/(?P<ticket>[^/]++)/ticket/delete/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'supprimer_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'supprimer_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::supprimerTicketAction',));
                }

                // modifier_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/(?P<ticket>[^/]++)/ticket/edit/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'modifier_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'modifier_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::modifierTicketAction',));
                }

                // historique_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/historique/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'historique_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'historique_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::historiqueTicketAction',));
                }

                // note_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/note/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'note_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::noteTicketAction',));
                }

                // note_ticket_add
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/note/add/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'note_ticket_add');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_ticket_add')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::addNoteTicketAction',));
                }

                // fermer_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/fermer/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fermer_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fermer_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::fermerTicketAction',));
                }

                // ouvrire_ticket
                if (preg_match('#^/dash/serviceclient/(?P<id>[^/]++)/ticket/ouvrire/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'ouvrire_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ouvrire_ticket')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ouvrireTicketAction',));
                }

                // list_desclient
                if ($pathinfo === '/dash/serviceclient/listclient') {
                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::clientAction',  '_route' => 'list_desclient',);
                }

                if (0 === strpos($pathinfo, '/dash/serviceclient/ticket')) {
                    // back_ajx_commande
                    if ($pathinfo === '/dash/serviceclient/ticket/commande') {
                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ListCommandeAction',  '_route' => 'back_ajx_commande',);
                    }

                    if (0 === strpos($pathinfo, '/dash/serviceclient/ticket/ticket')) {
                        // back_ajx_ticket1_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket1json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket1jsonAction',  '_route' => 'back_ajx_ticket1_json',);
                        }

                        // back_ajx_ticket2_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket2json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket2jsonAction',  '_route' => 'back_ajx_ticket2_json',);
                        }

                        // back_ajx_ticket3_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket3json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket3jsonAction',  '_route' => 'back_ajx_ticket3_json',);
                        }

                        // back_ajx_ticket4_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket4json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket4jsonAction',  '_route' => 'back_ajx_ticket4_json',);
                        }

                        // back_ajx_ticket5_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket5json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket5jsonAction',  '_route' => 'back_ajx_ticket5_json',);
                        }

                        // back_ajx_ticket6_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket6json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket6jsonAction',  '_route' => 'back_ajx_ticket6_json',);
                        }

                        // back_ajx_ticket133_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket133json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket133jsonAction',  '_route' => 'back_ajx_ticket133_json',);
                        }

                        // back_ajx_ticket7_json
                        if ($pathinfo === '/dash/serviceclient/ticket/ticket7json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket7jsonAction',  '_route' => 'back_ajx_ticket7_json',);
                        }

                        if (0 === strpos($pathinfo, '/dash/serviceclient/ticket/ticket1')) {
                            // back_ajx_ticket10_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket10json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket10jsonAction',  '_route' => 'back_ajx_ticket10_json',);
                            }

                            // back_ajx_ticket11_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket11json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket11jsonAction',  '_route' => 'back_ajx_ticket11_json',);
                            }

                            // back_ajx_ticket122_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket122json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket122jsonAction',  '_route' => 'back_ajx_ticket122_json',);
                            }

                            // back_ajx_ticket114_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket14json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket14jsonAction',  '_route' => 'back_ajx_ticket114_json',);
                            }

                            // back_ajx_ticket155_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket155json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket155jsonAction',  '_route' => 'back_ajx_ticket155_json',);
                            }

                            // back_ajx_ticket116_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket16json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket16jsonAction',  '_route' => 'back_ajx_ticket116_json',);
                            }

                            // back_ajx_ticket156_json
                            if ($pathinfo === '/dash/serviceclient/ticket/ticket156json') {
                                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket156jsonAction',  '_route' => 'back_ajx_ticket156_json',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/dash/serviceclient/ticket/deal')) {
                        // back_dash_json_cs_deal
                        if ($pathinfo === '/dash/serviceclient/ticket/deal') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticketdealAction',  '_route' => 'back_dash_json_cs_deal',);
                        }

                        // back_dash_json_cs_deal2
                        if ($pathinfo === '/dash/serviceclient/ticket/deal2') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket2dealAction',  '_route' => 'back_dash_json_cs_deal2',);
                        }

                        // back_dash_json_cs_deal3
                        if ($pathinfo === '/dash/serviceclient/ticket/deal3') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticket2dealAction',  '_route' => 'back_dash_json_cs_deal3',);
                        }

                        // back_dash_json_cs_part
                        if ($pathinfo === '/dash/serviceclient/ticket/deal/part') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::ticketdealpartAction',  '_route' => 'back_dash_json_cs_part',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/chefserviceclient')) {
                // list_chefserviceclient
                if (rtrim($pathinfo, '/') === '/dash/chefserviceclient') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_chefserviceclient');
                    }

                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::indexAction',  '_route' => 'list_chefserviceclient',);
                }

                // volume_tickets_client
                if ($pathinfo === '/dash/chefserviceclient/volumetickets') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::TicketsClientAction',  '_route' => 'volume_tickets_client',);
                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/nombrem')) {
                    // nombre_tickets_total_client
                    if ($pathinfo === '/dash/chefserviceclient/nombremtickets') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreTicketsClientAction',  '_route' => 'nombre_tickets_total_client',);
                    }

                    // nombre_message_client
                    if ($pathinfo === '/dash/chefserviceclient/nombremessage') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::MessageClientAction',  '_route' => 'nombre_message_client',);
                    }

                }

                // delai_traitement_client
                if ($pathinfo === '/dash/chefserviceclient/delaitraitement') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::TraitementClientAction',  '_route' => 'delai_traitement_client',);
                }

                // view_ticket_client
                if (preg_match('#^/dash/chefserviceclient/(?P<id>[^/]++)/ticket/view/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'view_ticket_client');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_ticket_client')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ServiceClientController::viewTicketAction',));
                }

                // montant_remboursements_client
                if ($pathinfo === '/dash/chefserviceclient/montantremboursements') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::MontantRemboursementsClientAction',  '_route' => 'montant_remboursements_client',);
                }

                // nombre_remboursement_client
                if ($pathinfo === '/dash/chefserviceclient/nombreremboursement') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreRemboursementClientAction',  '_route' => 'nombre_remboursement_client',);
                }

                // volume_coupons_client
                if ($pathinfo === '/dash/chefserviceclient/volumecoupons') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::VolumeCouponsClientAction',  '_route' => 'volume_coupons_client',);
                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/nombre')) {
                    // nombre_commande_client
                    if ($pathinfo === '/dash/chefserviceclient/nombrecommande') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreCommandeClientAction',  '_route' => 'nombre_commande_client',);
                    }

                    // nombre_commande_total_client
                    if ($pathinfo === '/dash/chefserviceclient/nombretotalcommande') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreTotalCommandeClientAction',  '_route' => 'nombre_commande_total_client',);
                    }

                }

                // statistique_client
                if ($pathinfo === '/dash/chefserviceclient/statistiqueclient') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::StatistiqueClientAction',  '_route' => 'statistique_client',);
                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/recapitulatif')) {
                    // recapitulatif_client
                    if ($pathinfo === '/dash/chefserviceclient/recapitulatifclient') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifClientAction',  '_route' => 'recapitulatif_client',);
                    }

                    // recapitulatif_remboursement
                    if ($pathinfo === '/dash/chefserviceclient/recapitulatifremboursement') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifRemboursementAction',  '_route' => 'recapitulatif_remboursement',);
                    }

                    // recapitulatif_commentaires
                    if ($pathinfo === '/dash/chefserviceclient/recapitulatifcommentaires') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifCommentairesAction',  '_route' => 'recapitulatif_commentaires',);
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/factcoup')) {
                    // fact_coup_nb_coup_financier
                    if ($pathinfo === '/dash/chefserviceclient/factcoupnbcoup') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::FactCoupNbCoupFinancierAction',  '_route' => 'fact_coup_nb_coup_financier',);
                    }

                    // fact_coup_prix_financier
                    if ($pathinfo === '/dash/chefserviceclient/factcoupprix') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::FactCoupPrixCoupFinancierAction',  '_route' => 'fact_coup_prix_financier',);
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/volume')) {
                    // volume_paiement_financier
                    if ($pathinfo === '/dash/chefserviceclient/volumepaiement') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::VolumePaiementFinancierAction',  '_route' => 'volume_paiement_financier',);
                    }

                    // volume_caisse_financier
                    if ($pathinfo === '/dash/chefserviceclient/volumecaisse') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::VolumeCaisseFinancierAction',  '_route' => 'volume_caisse_financier',);
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/montant')) {
                    // montant_caisse_financier
                    if ($pathinfo === '/dash/chefserviceclient/montantcaisse') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::MontantCaisseFinancierAction',  '_route' => 'montant_caisse_financier',);
                    }

                    // montant_remboursements_financier
                    if ($pathinfo === '/dash/chefserviceclient/montantremboursements') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::MontantRemboursementsFinancierAction',  '_route' => 'montant_remboursements_financier',);
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/chiffreaffaire')) {
                    // chiffre_affaire_tous_deal_commercial
                    if ($pathinfo === '/dash/chefserviceclient/chiffreaffairetousdeal') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::ChiffreAffaireTousDealCommercialAction',  '_route' => 'chiffre_affaire_tous_deal_commercial',);
                    }

                    // chiffre_affaire_commercial
                    if ($pathinfo === '/dash/chefserviceclient/chiffreaffaire') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::ChiffreAffaireCommercialAction',  '_route' => 'chiffre_affaire_commercial',);
                    }

                    // chiffre_affaire_deal_commercial
                    if ($pathinfo === '/dash/chefserviceclient/chiffreaffairedeal') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::ChiffreAffaireDealCommercialAction',  '_route' => 'chiffre_affaire_deal_commercial',);
                    }

                }

                // volume_contrats_commercial
                if ($pathinfo === '/dash/chefserviceclient/volumecontratscom') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::VolumeContratsCommercialAction',  '_route' => 'volume_contrats_commercial',);
                }

                // nombre_deal_redacteur
                if ($pathinfo === '/dash/chefserviceclient/nombredeal') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreDealRedacteurAction',  '_route' => 'nombre_deal_redacteur',);
                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/duree')) {
                    // duree_generation_redaction_deal_redacteur
                    if ($pathinfo === '/dash/chefserviceclient/dureegenerationredactiondeal') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::DureeGenerationRedactionDealRedacteurAction',  '_route' => 'duree_generation_redaction_deal_redacteur',);
                    }

                    // duree_redaction
                    if ($pathinfo === '/dash/chefserviceclient/dureeredaction') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::DureeRedactionAction',  '_route' => 'duree_redaction',);
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/nombre')) {
                    // nombre_annexes_choisis_commercial_planificateur
                    if ($pathinfo === '/dash/chefserviceclient/nombreannexeschoisiscommercial') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreAnnexesChoisisCommercialPlanificateurAction',  '_route' => 'nombre_annexes_choisis_commercial_planificateur',);
                    }

                    // nombre_contrats_signes_commercial_planificateur
                    if ($pathinfo === '/dash/chefserviceclient/nombrecontratssignescommercial') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreContratsSignesCommercialPlanificateurAction',  '_route' => 'nombre_contrats_signes_commercial_planificateur',);
                    }

                }

                // deal_annules_planificateur
                if ($pathinfo === '/dash/chefserviceclient/dealannules') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::DealAnnulesPlanificateurAction',  '_route' => 'deal_annules_planificateur',);
                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/no')) {
                    // nouveaux_contrats_planificateur
                    if ($pathinfo === '/dash/chefserviceclient/nouveauxcontrats') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NouveauxContratsPlanificateurAction',  '_route' => 'nouveaux_contrats_planificateur',);
                    }

                    // nombre_deal_etat_planificateur
                    if ($pathinfo === '/dash/chefserviceclient/nombredealetat') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::NombreDealEtatPlanificateurAction',  '_route' => 'nombre_deal_etat_planificateur',);
                    }

                }

                // delai_avant_publication_deals_planificateur
                if ($pathinfo === '/dash/chefserviceclient/delaiavantpublicationdeals') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::DelaiAvantPublicationDealsPlanificateurAction',  '_route' => 'delai_avant_publication_deals_planificateur',);
                }

                // update_chefserviceclient_manager
                if (0 === strpos($pathinfo, '/dash/chefserviceclient/update') && preg_match('#^/dash/chefserviceclient/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_chefserviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ChefServiceClientController::editAction',));
                }

                // view_chefserviceclient_manager
                if (0 === strpos($pathinfo, '/dash/chefserviceclient/view') && preg_match('#^/dash/chefserviceclient/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_chefserviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ChefServiceClientController::viewAction',));
                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/a')) {
                    // add_chefserviceclient_manager
                    if ($pathinfo === '/dash/chefserviceclient/add') {
                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ChefServiceClientController::addAction',  '_route' => 'add_chefserviceclient_manager',);
                    }

                    // activate_chefserviceclient_manager
                    if (0 === strpos($pathinfo, '/dash/chefserviceclient/act') && preg_match('#^/dash/chefserviceclient/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_chefserviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ChefServiceClientController::activateAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefserviceclient/unact')) {
                    // unactivate_chefserviceclient_manager
                    if (preg_match('#^/dash/chefserviceclient/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_chefserviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ChefServiceClientController::unactivateAction',));
                    }

                    // delete_chefserviceclient_manager
                    if (preg_match('#^/dash/chefserviceclient/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_chefserviceclient_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\ChefServiceClientController::unactivateAction',));
                    }

                }

                // pdf_annexe_manager_chef
                if (preg_match('#^/dash/chefserviceclient/(?P<protocol_id>[^/]++)/pdf/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pdf_annexe_manager_chef')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::printAction',));
                }

                // back_reportlivraisoncsv_chef
                if (0 === strpos($pathinfo, '/dash/chefserviceclient/exportchef') && preg_match('#^/dash/chefserviceclient/exportchef/(?P<date1>[^/]++)/(?P<date2>[^/]++)/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_reportlivraisoncsv_chef')), array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportLivraisonController::exportchefAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/remboursement')) {
                // back_remboursement
                if (rtrim($pathinfo, '/') === '/dash/remboursement') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_remboursement');
                    }

                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\RemboursementController::indexAction',  '_route' => 'back_remboursement',);
                }

                // back_show_remboursement
                if (0 === strpos($pathinfo, '/dash/remboursement/show') && preg_match('#^/dash/remboursement/show/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_show_remboursement')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\RemboursementController::showAction',));
                }

                // remboursement_virement
                if (0 === strpos($pathinfo, '/dash/remboursement/virement') && preg_match('#^/dash/remboursement/virement/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'remboursement_virement')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\RemboursementController::virementAction',));
                }

                // remboursement_annuler
                if (0 === strpos($pathinfo, '/dash/remboursement/annuler') && preg_match('#^/dash/remboursement/annuler/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'remboursement_annuler')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\RemboursementController::annulerAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/d')) {
                if (0 === strpos($pathinfo, '/dash/daf')) {
                    // list_daf
                    if (rtrim($pathinfo, '/') === '/dash/daf') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_daf');
                        }

                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::indexAction',  '_route' => 'list_daf',);
                    }

                    // update_daf_manager
                    if (0 === strpos($pathinfo, '/dash/daf/update') && preg_match('#^/dash/daf/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_daf_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::editAction',));
                    }

                    // view_daf_manager
                    if (0 === strpos($pathinfo, '/dash/daf/view') && preg_match('#^/dash/daf/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_daf_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::viewAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/daf/a')) {
                        // add_daf_manager
                        if ($pathinfo === '/dash/daf/add') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::addAction',  '_route' => 'add_daf_manager',);
                        }

                        // activate_daf_manager
                        if (0 === strpos($pathinfo, '/dash/daf/act') && preg_match('#^/dash/daf/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_daf_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::activateAction',));
                        }

                    }

                    // unactivate_daf_manager
                    if (0 === strpos($pathinfo, '/dash/daf/unact') && preg_match('#^/dash/daf/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_daf_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::unactivateAction',));
                    }

                    // retrait_daf_manager
                    if (0 === strpos($pathinfo, '/dash/daf/retrait') && preg_match('#^/dash/daf/retrait/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'retrait_daf_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::retraitAction',));
                    }

                    // daf_historique_caisse
                    if (0 === strpos($pathinfo, '/dash/daf/caisse') && preg_match('#^/dash/daf/caisse/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'daf_historique_caisse')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::caisseAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/daf/ticket/ticket')) {
                        // back_ajx_ticket8_json
                        if ($pathinfo === '/dash/daf/ticket/ticket8json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::daf8jsonAction',  '_route' => 'back_ajx_ticket8_json',);
                        }

                        // back_ajx_ticket9_json
                        if ($pathinfo === '/dash/daf/ticket/ticket9json') {
                            return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::daf9jsonAction',  '_route' => 'back_ajx_ticket9_json',);
                        }

                        if (0 === strpos($pathinfo, '/dash/daf/ticket/ticket1')) {
                            if (0 === strpos($pathinfo, '/dash/daf/ticket/ticket15')) {
                                // back_ajx_ticket157_json
                                if ($pathinfo === '/dash/daf/ticket/ticket157json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket157jsonAction',  '_route' => 'back_ajx_ticket157_json',);
                                }

                                // back_ajx_ticket158_json
                                if ($pathinfo === '/dash/daf/ticket/ticket158json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket158jsonAction',  '_route' => 'back_ajx_ticket158_json',);
                                }

                                // back_ajx_ticket159_json
                                if ($pathinfo === '/dash/daf/ticket/ticket159json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket159jsonAction',  '_route' => 'back_ajx_ticket159_json',);
                                }

                            }

                            if (0 === strpos($pathinfo, '/dash/daf/ticket/ticket16')) {
                                // back_ajx_ticket160_json
                                if ($pathinfo === '/dash/daf/ticket/ticket160json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket160jsonAction',  '_route' => 'back_ajx_ticket160_json',);
                                }

                                // back_ajx_ticket161_json
                                if ($pathinfo === '/dash/daf/ticket/ticket161json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket161jsonAction',  '_route' => 'back_ajx_ticket161_json',);
                                }

                                // back_ajx_ticket162_json
                                if ($pathinfo === '/dash/daf/ticket/ticket162json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket162jsonAction',  '_route' => 'back_ajx_ticket162_json',);
                                }

                                // back_ajx_ticket163_json
                                if ($pathinfo === '/dash/daf/ticket/ticket163json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket163jsonAction',  '_route' => 'back_ajx_ticket163_json',);
                                }

                                // back_ajx_ticket164_json
                                if ($pathinfo === '/dash/daf/ticket/ticket164json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket164jsonAction',  '_route' => 'back_ajx_ticket164_json',);
                                }

                                // back_ajx_ticket165_json
                                if ($pathinfo === '/dash/daf/ticket/ticket165json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket165jsonAction',  '_route' => 'back_ajx_ticket165_json',);
                                }

                                // back_ajx_ticket166_json
                                if ($pathinfo === '/dash/daf/ticket/ticket166json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket166jsonAction',  '_route' => 'back_ajx_ticket166_json',);
                                }

                                // back_ajx_ticket167_json
                                if ($pathinfo === '/dash/daf/ticket/ticket167json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket167jsonAction',  '_route' => 'back_ajx_ticket167_json',);
                                }

                                // back_ajx_ticket168_json
                                if ($pathinfo === '/dash/daf/ticket/ticket168json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket168jsonAction',  '_route' => 'back_ajx_ticket168_json',);
                                }

                                // back_ajx_ticket169_json
                                if ($pathinfo === '/dash/daf/ticket/ticket169json') {
                                    return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DafController::ticket169jsonAction',  '_route' => 'back_ajx_ticket169_json',);
                                }

                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/dash/daf/recapitulatif')) {
                        if (0 === strpos($pathinfo, '/dash/daf/recapitulatiff')) {
                            if (0 === strpos($pathinfo, '/dash/daf/recapitulatiffacturation')) {
                                // recapitulatif_facturation_un_financier
                                if ($pathinfo === '/dash/daf/recapitulatiffacturationun') {
                                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifFacturationUnAction',  '_route' => 'recapitulatif_facturation_un_financier',);
                                }

                                // recapitulatif_facturation_deux_financier
                                if ($pathinfo === '/dash/daf/recapitulatiffacturationdeux') {
                                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifFacturationDeuxAction',  '_route' => 'recapitulatif_facturation_deux_financier',);
                                }

                            }

                            // recapitulatif_facturation_ca_financier
                            if ($pathinfo === '/dash/daf/recapitulatiffca') {
                                return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifFacturationCAAction',  '_route' => 'recapitulatif_facturation_ca_financier',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/dash/daf/recapitulatifperformance')) {
                            // performances_marchant
                            if ($pathinfo === '/dash/daf/recapitulatifperformanceperf') {
                                return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifPerformancesMarchantAction',  '_route' => 'performances_marchant',);
                            }

                            // performances_commercial
                            if ($pathinfo === '/dash/daf/recapitulatifperformancecomm') {
                                return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::RecapitulatifPerformancesCommAction',  '_route' => 'performances_commercial',);
                            }

                        }

                    }

                    // daf_partner_show
                    if (0 === strpos($pathinfo, '/dash/daf/partner/view') && preg_match('#^/dash/daf/partner/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'daf_partner_show')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::schowAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/dash/directeurcommercial')) {
                    // list_directeurcommercial
                    if (rtrim($pathinfo, '/') === '/dash/directeurcommercial') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_directeurcommercial');
                        }

                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DirecteurCommercialController::indexAction',  '_route' => 'list_directeurcommercial',);
                    }

                    // update_directeurcommercial_manager
                    if (0 === strpos($pathinfo, '/dash/directeurcommercial/update') && preg_match('#^/dash/directeurcommercial/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_directeurcommercial_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DirecteurCommercialController::editAction',));
                    }

                    // view_directeurcommercial_manager
                    if (0 === strpos($pathinfo, '/dash/directeurcommercial/view') && preg_match('#^/dash/directeurcommercial/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_directeurcommercial_manager')), array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DirecteurCommercialController::viewAction',));
                    }

                    // add_directeurcommercial_manager
                    if ($pathinfo === '/dash/directeurcommercial/add') {
                        return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\DirecteurCommercialController::addAction',  '_route' => 'add_directeurcommercial_manager',);
                    }

                }

                if (0 === strpos($pathinfo, '/dash/deal')) {
                    // back_deal
                    if (rtrim($pathinfo, '/') === '/dash/deal') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'back_deal');
                        }

                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::indexAction',  '_route' => 'back_deal',);
                    }

                    // update_deal_manager
                    if (0 === strpos($pathinfo, '/dash/deal/update') && preg_match('#^/dash/deal/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_deal_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::editAction',));
                    }

                    // back_change_redactor_deal
                    if (0 === strpos($pathinfo, '/dash/deal/change') && preg_match('#^/dash/deal/change/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_change_redactor_deal')), array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::changeredactorAction',));
                    }

                    // show_deal_manager
                    if (0 === strpos($pathinfo, '/dash/deal/show') && preg_match('#^/dash/deal/show/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'show_deal_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::showAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/deal/a')) {
                        if (0 === strpos($pathinfo, '/dash/deal/ajxget')) {
                            // back_deal_ajax_invoice
                            if ($pathinfo === '/dash/deal/ajxgetdeal') {
                                return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::ajxgetdealAction',  '_route' => 'back_deal_ajax_invoice',);
                            }

                            // back_coupon_ajax_invoice
                            if ($pathinfo === '/dash/deal/ajxgetcoupon') {
                                return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::couponAction',  '_route' => 'back_coupon_ajax_invoice',);
                            }

                            // back_total_ajax_invoice
                            if ($pathinfo === '/dash/deal/ajxgettotal') {
                                return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::totalAction',  '_route' => 'back_total_ajax_invoice',);
                            }

                        }

                        // redactordeal_deal
                        if ($pathinfo === '/dash/deal/alldeal') {
                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::alldealAction',  '_route' => 'redactordeal_deal',);
                        }

                    }

                    // update_deal_manager2
                    if (0 === strpos($pathinfo, '/dash/deal/update') && preg_match('#^/dash/deal/update/(?P<id>\\d+)/(?P<type>\\d{1})$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_deal_manager2')), array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::editAction',));
                    }

                    // redactordeal_mydeal
                    if ($pathinfo === '/dash/deal/mydeal') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::mydealAction',  '_route' => 'redactordeal_mydeal',);
                    }

                    // detail_deal_view
                    if (0 === strpos($pathinfo, '/dash/deal/detaildeal') && preg_match('#^/dash/deal/detaildeal/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'detail_deal_view')), array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::detaildealAction',));
                    }

                    // apercu_deal_view
                    if (0 === strpos($pathinfo, '/dash/deal/appercu') && preg_match('#^/dash/deal/appercu/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'apercu_deal_view')), array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::apercuAction',));
                    }

                    // ajxdealback
                    if ($pathinfo === '/dash/deal/dealajxtop') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::dealajxAction',  '_route' => 'ajxdealback',);
                    }

                    // get_all_deal_categorie
                    if ($pathinfo === '/dash/deal/getalldealcategorie') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::getalldealcategorieAction',  '_route' => 'get_all_deal_categorie',);
                    }

                    // homeredacteur
                    if ($pathinfo === '/dash/deal/homeredacteur') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\DealController::homeredacteurAction',  '_route' => 'homeredacteur',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/re')) {
                if (0 === strpos($pathinfo, '/dash/redactor')) {
                    // list_redactor
                    if (rtrim($pathinfo, '/') === '/dash/redactor') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_redactor');
                        }

                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::indexAction',  '_route' => 'list_redactor',);
                    }

                    // add_redactor_manager
                    if ($pathinfo === '/dash/redactor/add') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::addAction',  '_route' => 'add_redactor_manager',);
                    }

                    // update_redactor_manager
                    if (0 === strpos($pathinfo, '/dash/redactor/update') && preg_match('#^/dash/redactor/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_redactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::editAction',));
                    }

                    // view_redactor_manager
                    if (0 === strpos($pathinfo, '/dash/redactor/view') && preg_match('#^/dash/redactor/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_redactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::viewAction',));
                    }

                    // activate_redactor_manager
                    if (0 === strpos($pathinfo, '/dash/redactor/act') && preg_match('#^/dash/redactor/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_redactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::activateAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/redactor/unact')) {
                        // unactivate_redactor_manager
                        if (preg_match('#^/dash/redactor/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_redactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::unactivateAction',));
                        }

                        // delete_redactor_manager
                        if (preg_match('#^/dash/redactor/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_redactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\RedactorController::deleteAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/dash/report')) {
                    // back_reportdeal
                    if (rtrim($pathinfo, '/') === '/dash/report') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'back_reportdeal');
                        }

                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportDealController::indexAction',  '_route' => 'back_reportdeal',);
                    }

                    // back_reportdealcsv
                    if ($pathinfo === '/dash/report/export') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportDealController::exportAction',  '_route' => 'back_reportdealcsv',);
                    }

                    if (0 === strpos($pathinfo, '/dash/reportlivraison')) {
                        // back_reportlivraison
                        if (rtrim($pathinfo, '/') === '/dash/reportlivraison') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'back_reportlivraison');
                            }

                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportLivraisonController::indexAction',  '_route' => 'back_reportlivraison',);
                        }

                        // back_reportlivraisoncsv
                        if ($pathinfo === '/dash/reportlivraison/export') {
                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportLivraisonController::exportAction',  '_route' => 'back_reportlivraisoncsv',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/c')) {
                if (0 === strpos($pathinfo, '/dash/comment')) {
                    // back_comment
                    if (rtrim($pathinfo, '/') === '/dash/comment') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'back_comment');
                        }

                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\CommentController::indexAction',  '_route' => 'back_comment',);
                    }

                    // countcomment
                    if ($pathinfo === '/dash/comment/countcomment') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\CommentController::countcommentAction',  '_route' => 'countcomment',);
                    }

                    // activate_deal_manager
                    if (0 === strpos($pathinfo, '/dash/comment/activate') && preg_match('#^/dash/comment/activate/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_deal_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CommentController::activateAction',));
                    }

                    // delete_deal_manager
                    if (0 === strpos($pathinfo, '/dash/comment/delete') && preg_match('#^/dash/comment/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_deal_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CommentController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/dash/chefredactor')) {
                    // list_chefredactor
                    if (rtrim($pathinfo, '/') === '/dash/chefredactor') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_chefredactor');
                        }

                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::indexAction',  '_route' => 'list_chefredactor',);
                    }

                    // add_chefredactor_manager
                    if ($pathinfo === '/dash/chefredactor/add') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::addAction',  '_route' => 'add_chefredactor_manager',);
                    }

                    // update_chefredactor_manager
                    if (0 === strpos($pathinfo, '/dash/chefredactor/update') && preg_match('#^/dash/chefredactor/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_chefredactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::editAction',));
                    }

                    // view_chefredactor_manager
                    if (0 === strpos($pathinfo, '/dash/chefredactor/view') && preg_match('#^/dash/chefredactor/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_chefredactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::viewAction',));
                    }

                    // activate_chefredactor_manager
                    if (0 === strpos($pathinfo, '/dash/chefredactor/act') && preg_match('#^/dash/chefredactor/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_chefredactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::activateAction',));
                    }

                    if (0 === strpos($pathinfo, '/dash/chefredactor/unact')) {
                        // unactivate_chefredactor_manager
                        if (preg_match('#^/dash/chefredactor/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_chefredactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::unactivateAction',));
                        }

                        // delete_chefredactor_manager
                        if (preg_match('#^/dash/chefredactor/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_chefredactor_manager')), array (  '_controller' => 'Back\\DealBundle\\Controller\\ChefRedactorController::deleteAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/reportfinancier')) {
                // back_reportcaisse
                if ($pathinfo === '/dash/reportfinancier/caisse') {
                    return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::caisseAction',  '_route' => 'back_reportcaisse',);
                }

                if (0 === strpos($pathinfo, '/dash/reportfinancier/f')) {
                    // back_reportfidelite
                    if ($pathinfo === '/dash/reportfinancier/fidelite') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::fideliteAction',  '_route' => 'back_reportfidelite',);
                    }

                    if (0 === strpos($pathinfo, '/dash/reportfinancier/facture')) {
                        // back_reportfacturepaye
                        if ($pathinfo === '/dash/reportfinancier/facturepaye') {
                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::facturepayeAction',  '_route' => 'back_reportfacturepaye',);
                        }

                        // back_reportfacture
                        if ($pathinfo === '/dash/reportfinancier/facture') {
                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::factureAction',  '_route' => 'back_reportfacture',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/dash/reportfinancier/nouveau')) {
                    // back_reportnouveaudeal
                    if ($pathinfo === '/dash/reportfinancier/nouveaudeal') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::nouveaudealAction',  '_route' => 'back_reportnouveaudeal',);
                    }

                    // back_reportnouveaupart
                    if ($pathinfo === '/dash/reportfinancier/nouveaupart') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::nouveaupartAction',  '_route' => 'back_reportnouveaupart',);
                    }

                }

                // back_reportcouponconsomme
                if ($pathinfo === '/dash/reportfinancier/couponconsomme') {
                    return array (  '_controller' => 'Back\\DealBundle\\Controller\\ReportFinancierController::couponconsommeAction',  '_route' => 'back_reportcouponconsomme',);
                }

            }

            // back_suivicommande
            if ($pathinfo === '/dash/suivi') {
                return array (  '_controller' => 'Back\\CommandeBundle\\Controller\\CommandController::suiviCommandeAction',  '_route' => 'back_suivicommande',);
            }

            if (0 === strpos($pathinfo, '/dash/protocol')) {
                // dash_protocol_show
                if (0 === strpos($pathinfo, '/dash/protocol/view') && preg_match('#^/dash/protocol/view/(?P<id>\\d+)/(?P<partner>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_protocol_show')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ProtocolController::showAction',));
                }

                // add_protocol_manager_partner
                if (0 === strpos($pathinfo, '/dash/protocol/addpartner') && preg_match('#^/dash/protocol/addpartner/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_protocol_manager_partner')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ProtocolController::addpartnerAction',));
                }

                // update_protocol_manager
                if (0 === strpos($pathinfo, '/dash/protocol/update') && preg_match('#^/dash/protocol/update/(?P<id>\\d+)/(?P<partner>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_protocol_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ProtocolController::editAction',));
                }

                // delete_protocol_manager
                if (0 === strpos($pathinfo, '/dash/protocol/delete') && preg_match('#^/dash/protocol/delete/(?P<id>\\d+)/(?P<partner>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_protocol_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ProtocolController::deleteAction',));
                }

                // print_protocol_manager
                if (0 === strpos($pathinfo, '/dash/protocol/print') && preg_match('#^/dash/protocol/print/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'print_protocol_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ProtocolController::printAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/annexe')) {
                // back_annexe_homepage
                if (preg_match('#^/dash/annexe/(?P<protocol_id>\\d+)/(?P<partner>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_annexe_homepage')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::indexAction',));
                }

                // dash_annexe_show
                if (preg_match('#^/dash/annexe/(?P<protocol_id>[^/]++)/view/(?P<id>\\d+)/(?P<partner>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_annexe_show')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::showAction',));
                }

                // pdf_annexepar_manager
                if (preg_match('#^/dash/annexe/(?P<protocol_id>[^/]++)/pdfp/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pdf_annexepar_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::printpartAction',));
                }

                // pdf_annexe_manager
                if (preg_match('#^/dash/annexe/(?P<protocol_id>[^/]++)/pdf/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pdf_annexe_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::printAction',));
                }

                // add_annexe_manager
                if (preg_match('#^/dash/annexe/(?P<protocol_id>[^/]++)/add/(?P<partner>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_annexe_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::addAction',));
                }

                // update_annexe_manager
                if (preg_match('#^/dash/annexe/(?P<protocol_id>[^/]++)/update/(?P<id>\\d+)/(?P<partner>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_annexe_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::editAction',));
                }

                // delete_annexe_manager
                if (preg_match('#^/dash/annexe/(?P<protocol_id>[^/]++)/delete/(?P<id>\\d+)/(?P<partner>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_annexe_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::deleteAction',));
                }

                if (0 === strpos($pathinfo, '/dash/annexe/ajx')) {
                    // back_ajx_get_planing
                    if ($pathinfo === '/dash/annexe/ajxAnexe') {
                        return array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::GetPlanningAction',  '_route' => 'back_ajx_get_planing',);
                    }

                    // back_ajx_get_anexe_from_part
                    if ($pathinfo === '/dash/annexe/ajxpartannex') {
                        return array (  '_controller' => 'Back\\ContractBundle\\Controller\\AnnexeController::partannexAction',  '_route' => 'back_ajx_get_anexe_from_part',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/reference')) {
                // dash_reference_show
                if (preg_match('#^/dash/reference/(?P<protocol_id>[^/]++)/(?P<annexe_id>[^/]++)/view/(?P<id>\\d+)/(?P<partner>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_reference_show')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ReferenceController::showAction',));
                }

                // add_reference_manager
                if (preg_match('#^/dash/reference/(?P<protocol_id>[^/]++)/(?P<annexe_id>[^/]++)/add/(?P<partner>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_reference_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ReferenceController::addAction',));
                }

                // update_reference_manager
                if (preg_match('#^/dash/reference/(?P<protocol_id>[^/]++)/(?P<annexe_id>[^/]++)/update/(?P<id>\\d+)/(?P<partner>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_reference_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ReferenceController::editAction',));
                }

                // delete_reference_manager
                if (preg_match('#^/dash/reference/(?P<protocol_id>[^/]++)/(?P<annexe_id>[^/]++)/delete/(?P<id>\\d+)/(?P<partner>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_reference_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\ReferenceController::deleteAction',));
                }

                // back_ajx_reference
                if ($pathinfo === '/dash/reference/ajx') {
                    return array (  '_controller' => 'Back\\ContractBundle\\Controller\\ReferenceController::ajxcmdAction',  '_route' => 'back_ajx_reference',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/commercial')) {
                // list_commercial
                if (rtrim($pathinfo, '/') === '/dash/commercial') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_commercial');
                    }

                    return array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::indexAction',  '_route' => 'list_commercial',);
                }

                // update_commercial_manager
                if (0 === strpos($pathinfo, '/dash/commercial/update') && preg_match('#^/dash/commercial/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_commercial_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::editAction',));
                }

                // view_commercial_manager
                if (0 === strpos($pathinfo, '/dash/commercial/view') && preg_match('#^/dash/commercial/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_commercial_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::viewAction',));
                }

                if (0 === strpos($pathinfo, '/dash/commercial/a')) {
                    // add_commercial_manager
                    if ($pathinfo === '/dash/commercial/add') {
                        return array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::addAction',  '_route' => 'add_commercial_manager',);
                    }

                    // activate_commercial_manager
                    if (0 === strpos($pathinfo, '/dash/commercial/act') && preg_match('#^/dash/commercial/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_commercial_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::activateAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/dash/commercial/unact')) {
                    // unactivate_commercial_manager
                    if (preg_match('#^/dash/commercial/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_commercial_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::unactivateAction',));
                    }

                    // delete_commercial_manager
                    if (preg_match('#^/dash/commercial/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_commercial_manager')), array (  '_controller' => 'Back\\ContractBundle\\Controller\\CommercialController::unactivateAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/partner')) {
                // back_partner
                if (rtrim($pathinfo, '/') === '/dash/partner') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_partner');
                    }

                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::indexAction',  '_route' => 'back_partner',);
                }

                // dash_partner_update
                if (0 === strpos($pathinfo, '/dash/partner/update') && preg_match('#^/dash/partner/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_partner_update')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::editAction',));
                }

                // dash_partner_show
                if (0 === strpos($pathinfo, '/dash/partner/view') && preg_match('#^/dash/partner/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_partner_show')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::schowAction',));
                }

                // dash_partner_add
                if ($pathinfo === '/dash/partner/add') {
                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::addAction',  '_route' => 'dash_partner_add',);
                }

                // dash_partner_deal
                if ($pathinfo === '/dash/partner/deal') {
                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::dealAction',  '_route' => 'dash_partner_deal',);
                }

                // dash_partner_booking
                if (0 === strpos($pathinfo, '/dash/partner/booking') && preg_match('#^/dash/partner/booking/(?P<deal>[^/]++)/(?P<month>[^/]++)/(?P<year>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_partner_booking')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::bookingAction',));
                }

                if (0 === strpos($pathinfo, '/dash/partner/detail')) {
                    // dash_partner_book_detail
                    if (preg_match('#^/dash/partner/detail/(?P<deal>[^/]++)/(?P<date>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_partner_book_detail')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::bookDetailAction',));
                    }

                    // dash_partner_book_print
                    if (preg_match('#^/dash/partner/detail/(?P<deal>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_partner_book_print')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::printAction',));
                    }

                }

                // dash_partner_deal_print
                if (0 === strpos($pathinfo, '/dash/partner/rapportdeal') && preg_match('#^/dash/partner/rapportdeal/(?P<deal>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_partner_deal_print')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::printrapportdealAction',));
                }

                // back_partner_password
                if (0 === strpos($pathinfo, '/dash/partner/motdepasse') && preg_match('#^/dash/partner/motdepasse/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_partner_password')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::motdepasseAction',));
                }

                // dash_partner_invoice
                if ($pathinfo === '/dash/partner/invoice') {
                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\PartnerController::InvoiceAction',  '_route' => 'dash_partner_invoice',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/contactpartner')) {
                // back_contact_partner
                if (preg_match('#^/dash/contactpartner/(?P<partid>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_contact_partner')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\ContactController::indexAction',));
                }

                // dash_contact_partner_update
                if (preg_match('#^/dash/contactpartner/(?P<partid>\\d+)/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_contact_partner_update')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\ContactController::editAction',));
                }

                // dash_contact_partner_add
                if (preg_match('#^/dash/contactpartner/(?P<partid>[^/]++)/add$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_contact_partner_add')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\ContactController::addAction',));
                }

                // dash_contact_partner_show
                if (preg_match('#^/dash/contactpartner/(?P<partid>\\d+)/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_contact_partner_show')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\ContactController::showAction',));
                }

                // dash_contact_partner_delete
                if (preg_match('#^/dash/contactpartner/(?P<partid>\\d+)/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_contact_partner_delete')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\ContactController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/sellingpoint')) {
                // back_sellingpoint_partner
                if (rtrim($pathinfo, '/') === '/dash/sellingpoint') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_sellingpoint_partner');
                    }

                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::indexAction',  '_route' => 'back_sellingpoint_partner',);
                }

                // back_sellingpoint
                if (0 === strpos($pathinfo, '/dash/sellingpoint/list') && preg_match('#^/dash/sellingpoint/list/(?P<partid>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_sellingpoint')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::listAction',));
                }

                // view_cp
                if ($pathinfo === '/dash/sellingpoint/viewcp') {
                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::codePostaleAction',  '_route' => 'view_cp',);
                }

                // list_villeajx
                if ($pathinfo === '/dash/sellingpoint/delegation') {
                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::delegationAction',  '_route' => 'list_villeajx',);
                }

                // dash_sellingpoint_update
                if (preg_match('#^/dash/sellingpoint/(?P<partid>\\d+)/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_sellingpoint_update')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::editAction',));
                }

                // dash_sellingpoint_add
                if (preg_match('#^/dash/sellingpoint/(?P<partid>\\d+)/add$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_sellingpoint_add')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::addAction',));
                }

                // dash_sellingpoint_show
                if (preg_match('#^/dash/sellingpoint/(?P<partid>\\d+)/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_sellingpoint_show')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::showAction',));
                }

                // dash_sellingpoint_delete
                if (preg_match('#^/dash/sellingpoint/(?P<partid>\\d+)/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_sellingpoint_delete')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\SellingPointController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/invoice')) {
                // back_invoice
                if (rtrim($pathinfo, '/') === '/dash/invoice') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_invoice');
                    }

                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\InvoiceController::indexAction',  '_route' => 'back_invoice',);
                }

                // dash_invoice_update
                if (0 === strpos($pathinfo, '/dash/invoice/update') && preg_match('#^/dash/invoice/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_invoice_update')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\InvoiceController::editAction',));
                }

                // dash_invoice_show
                if (0 === strpos($pathinfo, '/dash/invoice/view') && preg_match('#^/dash/invoice/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_invoice_show')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\InvoiceController::showAction',));
                }

                // dash_invoice_add
                if ($pathinfo === '/dash/invoice/add') {
                    return array (  '_controller' => 'Back\\PartnerBundle\\Controller\\InvoiceController::addAction',  '_route' => 'dash_invoice_add',);
                }

                // dash_invoice_pdf
                if (0 === strpos($pathinfo, '/dash/invoice/print') && preg_match('#^/dash/invoice/print/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_invoice_pdf')), array (  '_controller' => 'Back\\PartnerBundle\\Controller\\InvoiceController::printAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/category')) {
                // back_category
                if (rtrim($pathinfo, '/') === '/dash/category') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_category');
                    }

                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\CategoryController::indexAction',  '_route' => 'back_category',);
                }

                // add_category_manager
                if ($pathinfo === '/dash/category/add') {
                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\CategoryController::addAction',  '_route' => 'add_category_manager',);
                }

                // update_category_manager
                if (0 === strpos($pathinfo, '/dash/category/update') && preg_match('#^/dash/category/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_category_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\CategoryController::editAction',));
                }

                // delete_category_manager
                if (0 === strpos($pathinfo, '/dash/category/delete') && preg_match('#^/dash/category/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_category_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\CategoryController::deleteAction',));
                }

                // show_category_manager
                if (0 === strpos($pathinfo, '/dash/category/show') && preg_match('#^/dash/category/show/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'show_category_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\CategoryController::showAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/region')) {
                // back_region
                if (rtrim($pathinfo, '/') === '/dash/region') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_region');
                    }

                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\RegionController::indexAction',  '_route' => 'back_region',);
                }

                // add_region_manager
                if ($pathinfo === '/dash/region/add') {
                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\RegionController::addAction',  '_route' => 'add_region_manager',);
                }

                // update_region_manager
                if (0 === strpos($pathinfo, '/dash/region/update') && preg_match('#^/dash/region/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_region_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\RegionController::editAction',));
                }

                // delete_region_manager
                if (0 === strpos($pathinfo, '/dash/region/delete') && preg_match('#^/dash/region/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_region_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\RegionController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/planning')) {
                // back_planning_home
                if (preg_match('#^/dash/planning/(?P<regionid>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_planning_home')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::indexAction',));
                }

                // add_planning_manager
                if ($pathinfo === '/dash/planning/add') {
                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::addAction',  '_route' => 'add_planning_manager',);
                }

                // update_planning_manager
                if (0 === strpos($pathinfo, '/dash/planning/update') && preg_match('#^/dash/planning/update/(?P<id>\\d+)/(?P<regionid>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_planning_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::editAction',));
                }

                // show_planning_manager
                if (0 === strpos($pathinfo, '/dash/planning/show') && preg_match('#^/dash/planning/show/(?P<id>\\d+)/(?P<regionid>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'show_planning_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::showAction',));
                }

                // delete_planning_manager
                if ($pathinfo === '/dash/planning/delete') {
                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::deleteAction',  '_route' => 'delete_planning_manager',);
                }

                // back_ajx_get_anexe_test_ref
                if ($pathinfo === '/dash/planning/testrefannex') {
                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::testrefannexAction',  '_route' => 'back_ajx_get_anexe_test_ref',);
                }

                if (0 === strpos($pathinfo, '/dash/planning/ajx')) {
                    // back_ajx_planning_json
                    if ($pathinfo === '/dash/planning/ajxplanning') {
                        return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::ajxPlanningAction',  '_route' => 'back_ajx_planning_json',);
                    }

                    // back_ajx_leplanning_json
                    if ($pathinfo === '/dash/planning/ajxleplanning') {
                        return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlanningController::ajxlePlanningAction',  '_route' => 'back_ajx_leplanning_json',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/re')) {
                if (0 === strpos($pathinfo, '/dash/requiredInfo')) {
                    // back_requiredInfo
                    if (preg_match('#^/dash/requiredInfo/(?P<category_id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'back_requiredInfo');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_requiredInfo')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\requiredInfoController::indexAction',));
                    }

                    // add_requiredInfo_manager
                    if (preg_match('#^/dash/requiredInfo/(?P<category_id>[^/]++)/add$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'add_requiredInfo_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\requiredInfoController::addAction',));
                    }

                    // update_requiredInfo_manager
                    if (preg_match('#^/dash/requiredInfo/(?P<category_id>[^/]++)/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_requiredInfo_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\requiredInfoController::editAction',));
                    }

                    // delete_requiredInfo_manager
                    if (preg_match('#^/dash/requiredInfo/(?P<category_id>[^/]++)/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_requiredInfo_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\requiredInfoController::deleteAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/dash/reponseRequiredInfo')) {
                    // back_reponseRequiredInfo
                    if (rtrim($pathinfo, '/') === '/dash/reponseRequiredInfo') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'back_reponseRequiredInfo');
                        }

                        return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\ResponseRequiredInfoController::indexAction',  '_route' => 'back_reponseRequiredInfo',);
                    }

                    // add_reponseRequiredInfo_manager
                    if ($pathinfo === '/dash/reponseRequiredInfo/add') {
                        return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\ResponseRequiredInfoController::addAction',  '_route' => 'add_reponseRequiredInfo_manager',);
                    }

                    // update_reponseRequiredInfo_manager
                    if (0 === strpos($pathinfo, '/dash/reponseRequiredInfo/update') && preg_match('#^/dash/reponseRequiredInfo/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_reponseRequiredInfo_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\ResponseRequiredInfoController::editAction',));
                    }

                    // delete_reponseRequiredInfo_manager
                    if (0 === strpos($pathinfo, '/dash/reponseRequiredInfo/delete') && preg_match('#^/dash/reponseRequiredInfo/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_reponseRequiredInfo_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\ResponseRequiredInfoController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/dash/planner')) {
                // list_planner
                if (rtrim($pathinfo, '/') === '/dash/planner') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'list_planner');
                    }

                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::indexAction',  '_route' => 'list_planner',);
                }

                // ajxpartenerback
                if ($pathinfo === '/dash/planner/ajxpartener') {
                    return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::ajxpartenerAction',  '_route' => 'ajxpartenerback',);
                }

                // update_planner_manager
                if (0 === strpos($pathinfo, '/dash/planner/update') && preg_match('#^/dash/planner/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_planner_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::editAction',));
                }

                // view_planner_manager
                if (0 === strpos($pathinfo, '/dash/planner/view') && preg_match('#^/dash/planner/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_planner_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::viewAction',));
                }

                if (0 === strpos($pathinfo, '/dash/planner/a')) {
                    // add_planner_manager
                    if ($pathinfo === '/dash/planner/add') {
                        return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::addAction',  '_route' => 'add_planner_manager',);
                    }

                    // activate_planner_manager
                    if (0 === strpos($pathinfo, '/dash/planner/act') && preg_match('#^/dash/planner/act/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_planner_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::activateAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/dash/planner/unact')) {
                    // unactivate_planner_manager
                    if (preg_match('#^/dash/planner/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'unactivate_planner_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::unactivateAction',));
                    }

                    // delete_planner_manager
                    if (preg_match('#^/dash/planner/unact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_planner_manager')), array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::unactivateAction',));
                    }

                }

            }

            // back_dash_homepage
            if ($pathinfo === '/dash/home') {
                return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::indexAction',  '_route' => 'back_dash_homepage',);
            }

            if (0 === strpos($pathinfo, '/dash/entreprise')) {
                // back_entreprise
                if (rtrim($pathinfo, '/') === '/dash/entreprise') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_entreprise');
                    }

                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\EntrepriseController::indexAction',  '_route' => 'back_entreprise',);
                }

                // add_entreprise_manager
                if ($pathinfo === '/dash/entreprise/add') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\EntrepriseController::addAction',  '_route' => 'add_entreprise_manager',);
                }

                // update_entreprise_manager
                if (0 === strpos($pathinfo, '/dash/entreprise/update') && preg_match('#^/dash/entreprise/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_entreprise_manager')), array (  '_controller' => 'Back\\DashBundle\\Controller\\EntrepriseController::editAction',));
                }

                // delete_entreprise_manager
                if (0 === strpos($pathinfo, '/dash/entreprise/delete') && preg_match('#^/dash/entreprise/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_entreprise_manager')), array (  '_controller' => 'Back\\DashBundle\\Controller\\EntrepriseController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/parameter')) {
                // back_parameter
                if (rtrim($pathinfo, '/') === '/dash/parameter') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_parameter');
                    }

                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\ParameterController::indexAction',  '_route' => 'back_parameter',);
                }

                // update_parameter_manager
                if (0 === strpos($pathinfo, '/dash/parameter/update') && preg_match('#^/dash/parameter/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_parameter_manager')), array (  '_controller' => 'Back\\DashBundle\\Controller\\ParameterController::editAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/regle')) {
                // back_regle
                if (rtrim($pathinfo, '/') === '/dash/regle') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_regle');
                    }

                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\RegleController::indexAction',  '_route' => 'back_regle',);
                }

                // add_regle_manager
                if ($pathinfo === '/dash/regle/add') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\RegleController::addAction',  '_route' => 'add_regle_manager',);
                }

                // update_regle_manager
                if (0 === strpos($pathinfo, '/dash/regle/update') && preg_match('#^/dash/regle/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_regle_manager')), array (  '_controller' => 'Back\\DashBundle\\Controller\\RegleController::editAction',));
                }

            }

            if (0 === strpos($pathinfo, '/dash/sms')) {
                // back_dash_sms
                if (rtrim($pathinfo, '/') === '/dash/sms') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_dash_sms');
                    }

                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::indexAction',  '_route' => 'back_dash_sms',);
                }

                // add_dash_sms
                if ($pathinfo === '/dash/sms/add') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::addAction',  '_route' => 'add_dash_sms',);
                }

                // update_dash_sms
                if (0 === strpos($pathinfo, '/dash/sms/update') && preg_match('#^/dash/sms/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_dash_sms')), array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::editAction',));
                }

                // delete_dash_sms
                if (0 === strpos($pathinfo, '/dash/sms/delete') && preg_match('#^/dash/sms/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_dash_sms')), array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::deleteAction',));
                }

                if (0 === strpos($pathinfo, '/dash/sms/send')) {
                    // send_dash_sms
                    if (preg_match('#^/dash/sms/send/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'send_dash_sms')), array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::sendAction',));
                    }

                    // sendind_dash_sms
                    if ($pathinfo === '/dash/sms/sending') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::sendingAction',  '_route' => 'sendind_dash_sms',);
                    }

                }

                // sendind_cat_sms
                if ($pathinfo === '/dash/sms/cat') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\SmsController::catAction',  '_route' => 'sendind_cat_sms',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/notification')) {
                // back_notification
                if (rtrim($pathinfo, '/') === '/dash/notification') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'back_notification');
                    }

                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\NotificationController::indexAction',  '_route' => 'back_notification',);
                }

                // back_notification_vu
                if ($pathinfo === '/dash/notification/marquervues') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\NotificationController::notifvuAction',  '_route' => 'back_notification_vu',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/json')) {
                if (0 === strpos($pathinfo, '/dash/json/dc')) {
                    // back_dash_json_dc_ca
                    if ($pathinfo === '/dash/json/dcca') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::dccaAction',  '_route' => 'back_dash_json_dc_ca',);
                    }

                    // back_dash_json_dc_deal
                    if ($pathinfo === '/dash/json/dcdeal') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::dcdealAction',  '_route' => 'back_dash_json_dc_deal',);
                    }

                    // back_dash_json_dc_ca_deal
                    if ($pathinfo === '/dash/json/dccadeal') {
                        return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::dccadealAction',  '_route' => 'back_dash_json_dc_ca_deal',);
                    }

                }

                // liste_deal_dash
                if ($pathinfo === '/dash/json/listdealdash') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::listdealdashAction',  '_route' => 'liste_deal_dash',);
                }

                // back_dash_json_contrat
                if ($pathinfo === '/dash/json/contrat') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::contratAction',  '_route' => 'back_dash_json_contrat',);
                }

                // back_dash_json_all_deal
                if ($pathinfo === '/dash/json/alldeal') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::alldealAction',  '_route' => 'back_dash_json_all_deal',);
                }

                // back_dash_json_deal_cmd
                if (0 === strpos($pathinfo, '/dash/json/listdealdashcmd') && preg_match('#^/dash/json/listdealdashcmd/(?P<type>\\d{1})$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'back_dash_json_deal_cmd')), array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::listdealcmddashAction',));
                }

                if (0 === strpos($pathinfo, '/dash/json/planning')) {
                    if (0 === strpos($pathinfo, '/dash/json/planning/1')) {
                        // back_ajx_ticket12_json
                        if ($pathinfo === '/dash/json/planning/12json') {
                            return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::dealjsonAction',  '_route' => 'back_ajx_ticket12_json',);
                        }

                        // back_ajx_ticket13_json
                        if ($pathinfo === '/dash/json/planning/13json') {
                            return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::publicationjsonAction',  '_route' => 'back_ajx_ticket13_json',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/dash/json/planning/etat')) {
                        // back_dash_ajx_redacteur_cas1
                        if ($pathinfo === '/dash/json/planning/etat1deal') {
                            return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::etat1dealAction',  '_route' => 'back_dash_ajx_redacteur_cas1',);
                        }

                        // back_dash_ajx_redacteur_cas2
                        if ($pathinfo === '/dash/json/planning/etat2deal') {
                            return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::etat2dealAction',  '_route' => 'back_dash_ajx_redacteur_cas2',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/dash/json/planning/1')) {
                        // back_ajx_ticket14_json
                        if ($pathinfo === '/dash/json/planning/14json') {
                            return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::dealannulerjsonAction',  '_route' => 'back_ajx_ticket14_json',);
                        }

                        // back_ajx_ticket15_json
                        if ($pathinfo === '/dash/json/planning/15json') {
                            return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::comparecontratjsonAction',  '_route' => 'back_ajx_ticket15_json',);
                        }

                        // back_ajx_ticket16_json
                        if ($pathinfo === '/dash/json/planning/16json') {
                            return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::comparecommercialjsonAction',  '_route' => 'back_ajx_ticket16_json',);
                        }

                        // back_ajx_ticket17_json
                        if ($pathinfo === '/dash/json/planning/17json') {
                            return array (  '_controller' => 'Back\\PlanningBundle\\Controller\\PlannerController::contratcommercialjsonAction',  '_route' => 'back_ajx_ticket17_json',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/dash/json/planning/etat')) {
                        // back_dash_ajx_redacteur_cas3
                        if ($pathinfo === '/dash/json/planning/etat3deal') {
                            return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::etat3dealAction',  '_route' => 'back_dash_ajx_redacteur_cas3',);
                        }

                        // back_dash_ajx_redacteur_cas4
                        if ($pathinfo === '/dash/json/planning/etat4deal') {
                            return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::etat4dealAction',  '_route' => 'back_dash_ajx_redacteur_cas4',);
                        }

                    }

                }

            }

            // dash_csc
            if ($pathinfo === '/dash/csc') {
                return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::ChefServiceClientAction',  '_route' => 'dash_csc',);
            }

            if (0 === strpos($pathinfo, '/dash/d')) {
                // dash_daf
                if ($pathinfo === '/dash/ddaf') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::DafAction',  '_route' => 'dash_daf',);
                }

                // dash_dc
                if ($pathinfo === '/dash/dc') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::directeurCommercialAction',  '_route' => 'dash_dc',);
                }

            }

            // dash_rcef
            if ($pathinfo === '/dash/rcef') {
                return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::redacteurChefAction',  '_route' => 'dash_rcef',);
            }

            if (0 === strpos($pathinfo, '/dash/d')) {
                // dash_plan
                if ($pathinfo === '/dash/dplan') {
                    return array (  '_controller' => 'Back\\DashBundle\\Controller\\DefaultController::planificateurAction',  '_route' => 'dash_plan',);
                }

                if (0 === strpos($pathinfo, '/dash/dcompagne')) {
                    // dash_compagnes
                    if (preg_match('#^/dash/dcompagne(?:/(?P<page>\\d*))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_compagnes')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::compAction',  'page' => 1,));
                    }

                    // compagne_show
                    if (preg_match('#^/dash/dcompagne/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'compagne_show')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::showAction',));
                    }

                    // compagne_save
                    if ($pathinfo === '/dash/dcompagne/savecompagne') {
                        return array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::saveCompagneAction',  '_route' => 'compagne_save',);
                    }

                    // compagne_new
                    if (0 === strpos($pathinfo, '/dash/dcompagne/new') && preg_match('#^/dash/dcompagne/new(?:/(?P<idr>\\d*))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'compagne_new')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::newAction',  'idr' => 0,));
                    }

                    if (0 === strpos($pathinfo, '/dash/dcompagne/create')) {
                        // compagne_create
                        if ($pathinfo === '/dash/dcompagne/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_compagne_create;
                            }

                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::createAction',  '_route' => 'compagne_create',);
                        }
                        not_compagne_create:

                        // compagne_createf
                        if ($pathinfo === '/dash/dcompagne/createfinal') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_compagne_createf;
                            }

                            return array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::createFinalAction',  '_route' => 'compagne_createf',);
                        }
                        not_compagne_createf:

                    }

                    // compagne_edit
                    if (preg_match('#^/dash/dcompagne/(?P<id>[^/]++)/edit(?:/(?P<idr>\\d*))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'compagne_edit')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::editAction',  'idr' => 0,));
                    }

                    // compagne_update
                    if (preg_match('#^/dash/dcompagne/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_compagne_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'compagne_update')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::updateAction',));
                    }
                    not_compagne_update:

                    // compagne_updatef
                    if (preg_match('#^/dash/dcompagne/(?P<id>[^/]++)/updatefinal$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_compagne_updatef;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'compagne_updatef')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::updateFinalAction',));
                    }
                    not_compagne_updatef:

                    // compagne_delete
                    if (preg_match('#^/dash/dcompagne/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_compagne_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'compagne_delete')), array (  '_controller' => 'Back\\DealBundle\\Controller\\CompagneController::deleteAction',));
                    }
                    not_compagne_delete:

                }

            }

            // fos_user_security_login
            if (rtrim($pathinfo, '/') === '/dash') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_security_login');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
            }

            if (0 === strpos($pathinfo, '/dash/log')) {
                // fos_user_security_check
                if ($pathinfo === '/dash/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

                // fos_user_security_logout
                if ($pathinfo === '/dash/logout') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/dash/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/dash/profile/edit') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }

            }

            if (0 === strpos($pathinfo, '/dash/re')) {
                if (0 === strpos($pathinfo, '/dash/register')) {
                    // fos_user_registration_register
                    if (rtrim($pathinfo, '/') === '/dash/register') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                        }

                        return array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                    }

                    if (0 === strpos($pathinfo, '/dash/register/c')) {
                        // fos_user_registration_check_email
                        if ($pathinfo === '/dash/register/check-email') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_check_email;
                            }

                            return array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                        }
                        not_fos_user_registration_check_email:

                        if (0 === strpos($pathinfo, '/dash/register/confirm')) {
                            // fos_user_registration_confirm
                            if (preg_match('#^/dash/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirm;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                            }
                            not_fos_user_registration_confirm:

                            // fos_user_registration_confirmed
                            if ($pathinfo === '/dash/register/confirmed') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirmed;
                                }

                                return array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                            }
                            not_fos_user_registration_confirmed:

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/dash/resetting')) {
                    // fos_user_resetting_request
                    if ($pathinfo === '/dash/resetting/request') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_request;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                    }
                    not_fos_user_resetting_request:

                    // fos_user_resetting_send_email
                    if ($pathinfo === '/dash/resetting/send-email') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_resetting_send_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                    }
                    not_fos_user_resetting_send_email:

                    // fos_user_resetting_check_email
                    if ($pathinfo === '/dash/resetting/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                    }
                    not_fos_user_resetting_check_email:

                    // fos_user_resetting_reset
                    if (0 === strpos($pathinfo, '/dash/resetting/reset') && preg_match('#^/dash/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_resetting_reset;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                    }
                    not_fos_user_resetting_reset:

                }

            }

            // fos_user_change_password
            if ($pathinfo === '/dash/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

            // show_users
            if ($pathinfo === '/dash/liste') {
                return array (  '_controller' => 'User\\UserBundle\\Controller\\DefaultController::showAction',  '_route' => 'show_users',);
            }

            // add_users
            if ($pathinfo === '/dash/register') {
                return array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'add_users',);
            }

            // view_users
            if (0 === strpos($pathinfo, '/dash/update') && preg_match('#^/dash/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_users')), array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::editAction',));
            }

            // update_profile_users
            if ($pathinfo === '/dash/editprofile') {
                return array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::edit2Action',  '_route' => 'update_profile_users',);
            }

            // delete_users
            if (0 === strpos($pathinfo, '/dash/delete') && preg_match('#^/dash/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_users')), array (  '_controller' => 'User\\UserBundle\\Controller\\RegistrationController::deleteAction',));
            }

            if (0 === strpos($pathinfo, '/dash/contract')) {
                // user_contract_homepage
                if (preg_match('#^/dash/contract/(?P<user_id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_contract_homepage')), array (  '_controller' => 'User\\UserBundle\\Controller\\ContractController::indexAction',));
                }

                // user_contract_show
                if (preg_match('#^/dash/contract/(?P<user_id>[^/]++)/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_contract_show')), array (  '_controller' => 'User\\UserBundle\\Controller\\ContractController::showAction',));
                }

                // user_contract_add_manager
                if (preg_match('#^/dash/contract/(?P<user_id>[^/]++)/add$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_contract_add_manager')), array (  '_controller' => 'User\\UserBundle\\Controller\\ContractController::addAction',));
                }

                // user_contract_update_manager
                if (preg_match('#^/dash/contract/(?P<user_id>[^/]++)/update/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_contract_update_manager')), array (  '_controller' => 'User\\UserBundle\\Controller\\ContractController::editAction',));
                }

            }

            // user_vote_partner
            if ($pathinfo === '/dash/partnervote') {
                return array (  '_controller' => 'User\\UserBundle\\Controller\\VoterController::voteAction',  '_route' => 'user_vote_partner',);
            }

        }

        if (0 === strpos($pathinfo, '/media/cache/resolve')) {
            // liip_imagine_filter_runtime
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter_runtime;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
            }
            not_liip_imagine_filter_runtime:

            // liip_imagine_filter
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
            }
            not_liip_imagine_filter:

        }

        // dcs_rating_add_vote
        if (0 === strpos($pathinfo, '/vote/add') && preg_match('#^/vote/add/(?P<id>[^/]++)/(?P<value>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'dcs_rating_add_vote')), array (  '_controller' => 'Main\\RatingclientBundle\\Controller\\RatingController::addVoteAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
