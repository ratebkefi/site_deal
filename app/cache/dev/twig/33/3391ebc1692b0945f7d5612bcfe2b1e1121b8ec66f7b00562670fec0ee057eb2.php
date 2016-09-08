<?php

/* ::baseBack.html.twig */
class __TwigTemplate_a6b022a535d272e02383add28b2522ca0fbd37942008d050ab6ffaea84719a50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]>
<html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>
<html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>
<html class=\"no-js lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class=\"no-js\"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>";
        // line 14
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/styles.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/jquery.fancybox.css"), "html", null, true);
        echo "\">
    ";
        // line 21
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 23
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
</head>
";
        // line 26
        $context["notifications"] = $this->env->getExtension('caisse_extension')->listeNotification($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()));
        // line 27
        $context["notificationsVu"] = $this->env->getExtension('caisse_extension')->listeNotificationVu($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()));
        // line 28
        echo "
<body class=\"validationForm\">
<!--[if lt IE 7]>
<p class=\"chromeframe\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade
    your browser</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<!-- ==================== TOP MENU ==================== -->
<div class=\"navbar navbar-inverse navbar-fixed-top\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            <a class=\"brand\" href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("back_dash_homepage");
        echo "\"><img class=\"img-responsive\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/img/logo.png"), "html", null, true);
        echo "\"> </a>

            <div class=\"nav pull-right\">
                <form class=\"navbar-form\">
                    <div class=\"input-append\">
                        <div class=\"collapsibleContent\">

                            <a href=\"#notificationsContent\" class=\"sidebar\"><span
                                        class=\"add-on add-on-middle add-on-mini add-on-dark\" id=\"notifications\"><i
                                            class=\"icon-bell-alt\"></i><span
                                            class=\"notifyCircle orange\">";
        // line 50
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["notificationsVu"]) ? $context["notificationsVu"] : null)), "html", null, true);
        echo "</span></span></a>
                            ";
        // line 51
        $context["cntcmt"] = $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BackDealBundle:Comment:countcomment"));
        // line 52
        echo "                            ";
        if (((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "ROLE_SUPER_ADMIN") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "SERVICECLIENT")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "CHEFSERVICECLI"))) {
            // line 53
            echo "
                            <a href=\"#messagesContent\" class=\"sidebar\"><span
                                        class=\"add-on add-on-middle add-on-mini add-on-dark\" id=\"messages\"><i
                                            class=\"icon-comments-alt\"></i>";
            // line 56
            if (((isset($context["cntcmt"]) ? $context["cntcmt"] : null) > 0)) {
                echo "<span
                                            class=\"notifyCircle red\">";
                // line 57
                echo twig_escape_filter($this->env, (isset($context["cntcmt"]) ? $context["cntcmt"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</span></a>
                            ";
        }
        // line 59
        echo "                            <a href=\"#profileContent\" class=\"sidebar\"><span class=\"add-on add-on-mini add-on-dark\"
                                                                            id=\"profile\"><i class=\"icon-user\"></i><span
                                            class=\"username\">";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "name", array()), "html", null, true);
        echo "</span></span></a>
                        </div>
                        <a href=\"#collapsedSidebarContent\" class=\"collapseHolder sidebar\"><span
                                    class=\"add-on add-on-mini add-on-dark\"><i class=\"icon-sort-down\"></i></span></a>
                    </div>
                </form>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>


<!-- ==================== SIDEBAR ==================== -->
<div class=\"hiddenContent\">
    <!-- ==================== SIDEBAR COLLAPSED ==================== -->
    <div id=\"collapsedSidebarContent\">
        <div class=\"sidebarDivider\"></div>
        <div class=\"sidebarContent\">
            <ul class=\"collapsedSidebarMenu\">

                <li><a href=\"#notificationsContent\" class=\"sidebar\">Notifications
                        <div class=\"notifyCircle orange\">";
        // line 83
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["notifications"]) ? $context["notifications"] : null)), "html", null, true);
        echo "</div>
                        <i class=\"icon-chevron-sign-right\"></i></a></li>
                ";
        // line 85
        if (((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "ROLE_SUPER_ADMIN") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "SERVICECLIENT")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "CHEFSERVICECLI"))) {
            // line 86
            echo "
                <li><a href=\"#messagesContent\" class=\"sidebar\">Messages

                        <div class=\"notifyCircle red\">";
            // line 89
            echo twig_escape_filter($this->env, (isset($context["cntcmt"]) ? $context["cntcmt"] : null), "html", null, true);
            echo "</div>
                        <i class=\"icon-chevron-sign-right\"></i></a></li>
";
        }
        // line 92
        echo "                <li><a href=\"#profileContent\" class=\"sidebar\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "name", array()), "html", null, true);
        echo "<i class=\"icon-chevron-sign-right\"></i></a>
                </li>
                <li class=\"sublevel\"><a href=\"";
        // line 94
        echo $this->env->getExtension('routing')->getPath("update_profile_users");
        echo "\">Modifier mon profile<i class=\"icon-user\"></i></a></li>

                <li class=\"sublevel\"><a href=\"";
        // line 96
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Déconnexion<i class=\"icon-off\"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- ==================== END OF SIDEBAR COLLAPSED ==================== -->
    <!-- ==================== SIDEBAR TASKS ==================== -->


    <!-- ==================== SIDEBAR NOTIFICATIONS ==================== -->
    <div id=\"notificationsContent\">
        <div class=\"sidebarDivider\"></div>
        <div class=\"sidebarContent\">
            <a href=\"#collapsedSidebarContent\" class=\"showCollapsedSidebarMenu\"><i class=\"icon-chevron-sign-left\"></i>

                <h1> Notifications</h1></a>

            <h1>Notifications</h1>
            <a class=\"btn btn-danger\" href=\"";
        // line 113
        echo $this->env->getExtension('routing')->getPath("back_notification_vu");
        echo "\" >Tout marquer comme vu</a><br>
            <div class=\"sidebarInfo\">
                <div><span class=\"label orange\">";
        // line 115
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["notificationsVu"]) ? $context["notificationsVu"] : null)), "html", null, true);
        echo "</span> notifications Non vu </div>
            </div>
            <ul class=\"notificationsList\">
                ";
        // line 118
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["notifications"]) ? $context["notifications"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 119
            echo "                    ";
            $context["time"] = $this->env->getExtension('caisse_extension')->timeAgo(twig_date_format_filter($this->env, $this->getAttribute($context["item"], "dcr", array()), "Y-m-d H:i:s"));
            // line 120
            echo "
                    <li class=\"";
            // line 121
            if (($this->getAttribute($context["item"], "etat", array()) == 0)) {
                echo " Non vu ";
            }
            echo " ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " first ";
            }
            echo "\">

                        <div>
                            ";
            // line 124
            if ($this->getAttribute($context["item"], "lien", array())) {
                echo "<a class=\"hover\" style=\"color: #616161 \"
                                                 href=\"";
                // line 125
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "lien", array()), "html", null, true);
                echo "?notif=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\">
                                <i class=\"";
                // line 126
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icone", array()), "html", null, true);
                echo "\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</a>
                            ";
            } else {
                // line 128
                echo "                                <i class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icone", array()), "html", null, true);
                echo "\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "
                            ";
            }
            // line 130
            echo "                        </div>
                        <span class=\"notificationDate\">";
            // line 131
            echo twig_escape_filter($this->env, (isset($context["time"]) ? $context["time"] : null), "html", null, true);
            echo " ";
            if (($this->getAttribute($context["item"], "etat", array()) == 0)) {
                echo "<span
                                    class=\"pull-right notificationStatus\">Non vu</span>";
            }
            // line 132
            echo "</span>
                    </li>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "
            </ul>
            <form method=\"get\" action=\"";
        // line 137
        echo $this->env->getExtension('routing')->getPath("back_notification");
        echo "\">
                <button class=\"btn btn-primary\">Voir tous</button>

            </form>
        </div>
    </div>
    <!-- ==================== END OF SIDEBAR NOTIFICATIONS ==================== -->

    <!-- ==================== SIDEBAR MESSAGES ==================== -->
    ";
        // line 146
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BackDealBundle:Comment:messagebar"));
        echo "

    <!-- ==================== END OF SIDEBAR MESSAGES ==================== -->



    <!-- ==================== SIDEBAR PROFILE ==================== -->
    <div id=\"profileContent\">
        <div class=\"sidebarDivider\"></div>
        <div class=\"sidebarContent\">
            <a href=\"#collapsedSidebarContent\" class=\"showCollapsedSidebarMenu\"><i class=\"icon-chevron-sign-left\"></i>

                <h1> Mon Compte</h1></a>

            <h1>Mon Compte</h1>
";
        // line 161
        $context["userPhoto"] = ("uploads/user/" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "profilePicturePath", array()));
        // line 162
        echo "           <div class=\"profileBlock\">
                <div class=\"profilePhoto\"
                     ";
        // line 164
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "profilePicturePath", array()) != "")) {
            echo "style=\"background: url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter((isset($context["userPhoto"]) ? $context["userPhoto"] : null), "user_profil")), "html", null, true);
            echo "') no-repeat center top\"";
        }
        echo ">

                    <div class=\"usernameHolder\">";
        // line 166
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "name", array()), "html", null, true);
        echo "</div>

                </div>
                <div class=\"profileInfo\">

                    <p><i class=\"icon-envelope-alt\"></i> ";
        // line 171
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "email", array()), "html", null, true);
        echo "</p>

                    <p><i class=\"icon-globe\"></i> Bigdeal.tn</p>

                </div>
                <footer>
                    <div class=\"profileSettingBlock editProfile\"
                         onclick=\"\$(location).attr('href','";
        // line 178
        echo $this->env->getExtension('routing')->getPath("update_profile_users");
        echo "');\"><i
                                class=\"icon-user\"></i>Modifier le profil
                    </div>
                    <!--div class=\"profileSettingBlock changePassword\"><i class=\"icon-lock\"></i>change password</div-->
                    <div class=\"profileSettingBlock logout\"
                         onclick=\"\$(location).attr('href','";
        // line 183
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "');\"><i
                                class=\"icon-off\"></i>Déconnexion
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- ==================== END OF SIDEBAR PROFILE ==================== -->

</div>
<!-- ==================== END OF SIDEBAR ==================== -->

";
        // line 195
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "ROLE_SUPER_ADMIN")) {
            // line 196
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 198
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 201
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "COMMERCIAL")) {
            // line 202
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 204
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainCommercialMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 207
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "PALAINER")) {
            // line 208
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 210
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainPalainerMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 213
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "CAISSIER")) {
            // line 214
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 216
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainCaissierMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 219
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "RESPONSABLECAISSE")) {
            // line 220
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 222
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainResponsableCaisseMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 225
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "FINANCIER")) {
            // line 226
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 228
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainFinancierMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 231
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "SERVICECLIENT")) {
            // line 232
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 234
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainServiceClientMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
\t";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 237
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "CHEFSERVICECLI")) {
            // line 238
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 240
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainChefServiceClientMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 243
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "PARTENAIRE")) {
            // line 244
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 246
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainPartnerMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 249
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "REDACTEUR")) {
            // line 250
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 252
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainRedacctorMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>



";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 258
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "DAF")) {
            // line 259
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 261
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainDafMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 264
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "DIRECTEURCOMMERCIAL")) {
            // line 265
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 267
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainDcMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 270
(isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "CHEFRED")) {
            // line 271
            echo "    <div class=\"mainmenu\">
        <div class=\"container-fluid\">
            ";
            // line 273
            echo $this->env->getExtension('knp_menu')->render("BackDashBundle:Builder:createMainChefRedacctorMenu", array("template" => "BackDashBundle:Menu:knp_menu.html.twig"));
            echo "
        </div>
    </div>
";
        }
        // line 277
        echo "<div class=\"content1\">
    <!-- ==================== TITLE LINE FOR HEADLINE ==================== -->
    <div class=\"titleLine\">
        <!--div class=\"container-fluid\">
            <div class=\"titleIcon\"><i class=\"icon-dashboard\"></i></div>
            <ul class=\"titleLineHeading\">
                <li class=\"heading\"><h1>Dashboard</h1></li>
                <li class=\"subheading\">the place for everything</li>
            </ul>
            <ul class=\"titleLineCharts pull-right\">
                <li>
                    <span class=\"usersBar\">100,235,549,222,639,335,800</span>
                    <h2 class=\"cyanText\">1254<span class=\"greyText\">users</span></h2>
                </li>
                ...
            </ul>
        </div-->
    </div>
    <!-- ==================== END OF TITLE LINE ==================== -->
    <!-- ==================== BREADCRUMBS / DATETIME ==================== -->
    <ul class=\"breadcrumb\">
        ";
        // line 298
        echo $this->env->getExtension('breadcrumbs')->renderBreadcrumbs(array("viewTemplate" => "::breadcrumbs.html.twig"));
        echo "
        <!--<li><i class=\"icon-home\"></i><a href=\"";
        // line 299
        echo $this->env->getExtension('routing')->getPath("back_dash_homepage");
        echo "\"> Home</a> <span class=\"divider\"><i class=\"icon-angle-right\"></i></span></li>
                <li class=\"active\">Dashboard</li>
                <li class=\"moveDown pull-right\">
                    <span class=\"time\"></span>
                    <span class=\"date\"></span>
                </li>   -->
    </ul>
    ";
        // line 306
        $this->displayBlock('body', $context, $blocks);
        // line 310
        echo "

    <!-- ==================== END OF BREADCRUMBS / DATETIME ==================== -->
    
</div>
<div class=\"col-md-12 text-center form-signin-footer\">
\t<strong>Bigdeal © ";
        // line 316
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</strong>
</div>

<script src=\"";
        // line 319
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/jquery-1.10.1.min.js"), "html", null, true);
        echo "\"></script>
<script>window.jQuery || document.write('<script src=\"";
        // line 320
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.10.1.min.js"), "html", null, true);
        echo "\"><\\/script>')</script>
<script src=\"";
        // line 321
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/bootstrap-slider.js"), "html", null, true);
        echo "\"></script>
<!-- bootstrap slider plugin -->
<script src=\"";
        // line 323
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/jquery.sparkline.min.js"), "html", null, true);
        echo "\"></script>
<!-- small charts plugin -->
<script src=\"";
        // line 325
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/bootstrap-multiselect.js"), "html", null, true);
        echo "\"></script>
<!-- multiselect plugin -->
<script src=\"";
        // line 327
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/parsley.min.js"), "html", null, true);
        echo "\"></script>
<!-- parsley validator plugin -->

<script src=\"";
        // line 330
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 331
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/thekamarel.js"), "html", null, true);
        echo "\"></script>
<!-- main project js file -->
<script src=\"";
        // line 333
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/jquery.fancybox.js"), "html", null, true);
        echo "\"></script>
<!-- bootbox -->
<script src=\"";
        // line 335
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/lib/bootbox/bootbox.min.js"), "html", null, true);
        echo "\"></script>
";
        // line 336
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b6fa751_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b6fa751_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b6fa751_jquery.form-validator_1.js");
            // line 337
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "b6fa751"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b6fa751") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b6fa751.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 339
        echo "<script>

    \$(function () {

        \$('#multipleSelect').multiselect({
            buttonText: function (options, select) {
                if (options.length == 0) {
                    return 'None selected <b class=\"caret\"></b>';
                }
                else if (options.length > 1) {
                    return options.length + ' selected <b class=\"caret\"></b>';
                }
                else {
                    var selected = '';
                    options.each(function () {
                        selected += \$(this).text() + ', ';
                    });
                    return selected.substr(0, selected.length - 2) + ' <b class=\"caret\"></b>';
                }
            }
        });

        \$('#secondForm').parsley({
            excluded: 'ul.dropdown-menu li input[type=checkbox]'
        });
        \$('.iframe-btnx').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoScale': false
        });
    });

</script>
<script>

    \$(document).ready(function () {
        \$.ajax({
            type: 'get',
            url: '";
        // line 378
        echo $this->env->getExtension('routing')->getPath("count_cmd");
        echo "',
            success: function (data) {

                    var newNode = document.createElement(\"span\");
                    newNode.appendChild(document.createTextNode(data.count));
                    newNode.className = \"notifyCircleCmd red\";
                    var td1 = document.getElementById('clientservice');
                    var td2 = document.getElementById('withbadge');
                
                    if(td1){td1.appendChild(newNode);}
                    if(td2){td2.appendChild(newNode);}
                    if(data.count>0)
                    {
                        var td3 = document.getElementById('livrcomm');
                        td3.style.backgroundColor = \"#de0e79\";
                    }

                }

        });


    });


\t\tvar headertext = [],
\t\theaders = document.querySelectorAll(\".table-responsive th\"),
\t\ttablerows = document.querySelectorAll(\".table-responsive th\"),
\t\ttablebody = document.querySelector(\".table-responsive tbody\");
\t\t
\t\tfor(var i = 0; i < headers.length; i++) {
\t\t  var current = headers[i];
\t\t  headertext.push(current.textContent.replace(/\\r?\\n|\\r/,\"\"));
\t\t} 
\t\tfor (var i = 0, row; row = tablebody.rows[i]; i++) {
\t\t  for (var j = 0, col; col = row.cells[j]; j++) {
\t\t    col.setAttribute(\"data-th\", headertext[j]);
\t\t  } 
\t\t}
\t</script>
";
        // line 418
        $this->displayBlock('javascripts', $context, $blocks);
        // line 420
        echo "</body>
</html>
";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo ".: Bigdeal Backoffice :.";
    }

    // line 21
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 22
        echo "    ";
    }

    // line 306
    public function block_body($context, array $blocks = array())
    {
        // line 307
        echo "    
\t
    ";
    }

    // line 418
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::baseBack.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  782 => 418,  776 => 307,  773 => 306,  769 => 22,  766 => 21,  760 => 14,  754 => 420,  752 => 418,  709 => 378,  668 => 339,  654 => 337,  650 => 336,  646 => 335,  641 => 333,  636 => 331,  632 => 330,  626 => 327,  621 => 325,  616 => 323,  611 => 321,  607 => 320,  603 => 319,  597 => 316,  589 => 310,  587 => 306,  577 => 299,  573 => 298,  550 => 277,  543 => 273,  539 => 271,  537 => 270,  531 => 267,  527 => 265,  525 => 264,  519 => 261,  515 => 259,  513 => 258,  504 => 252,  500 => 250,  498 => 249,  492 => 246,  488 => 244,  486 => 243,  480 => 240,  476 => 238,  474 => 237,  468 => 234,  464 => 232,  462 => 231,  456 => 228,  452 => 226,  450 => 225,  444 => 222,  440 => 220,  438 => 219,  432 => 216,  428 => 214,  426 => 213,  420 => 210,  416 => 208,  414 => 207,  408 => 204,  404 => 202,  402 => 201,  396 => 198,  392 => 196,  390 => 195,  375 => 183,  367 => 178,  357 => 171,  349 => 166,  340 => 164,  336 => 162,  334 => 161,  316 => 146,  304 => 137,  300 => 135,  284 => 132,  277 => 131,  274 => 130,  266 => 128,  259 => 126,  253 => 125,  249 => 124,  237 => 121,  234 => 120,  231 => 119,  214 => 118,  208 => 115,  203 => 113,  183 => 96,  178 => 94,  172 => 92,  166 => 89,  161 => 86,  159 => 85,  154 => 83,  129 => 61,  125 => 59,  118 => 57,  114 => 56,  109 => 53,  106 => 52,  104 => 51,  100 => 50,  85 => 40,  71 => 28,  69 => 27,  67 => 26,  62 => 24,  59 => 23,  57 => 21,  53 => 20,  49 => 19,  45 => 18,  38 => 14,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if lt IE 7]>*/
/* <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->*/
/* <!--[if IE 7]>*/
/* <html class="no-js lt-ie9 lt-ie8"> <![endif]-->*/
/* <!--[if IE 8]>*/
/* <html class="no-js lt-ie9"> <![endif]-->*/
/* <!--[if gt IE 8]><!-->*/
/* <html class="no-js"> <!--<![endif]-->*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <!--[if IE]>*/
/*     <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->*/
/*     <title>{% block title %}.: Bigdeal Backoffice :.{% endblock %}</title>*/
/* */
/*     <meta name="description" content="">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*     <link href="{{ asset('RessourcesBack/css/bootstrap-responsive.min.css') }}" type="text/css" rel="stylesheet"/>*/
/*     <link href="{{ asset('RessourcesBack/css/styles.css') }}" type="text/css" rel="stylesheet"/>*/
/*     <link rel="stylesheet" href="{{ asset('RessourcesBack/css/jquery.fancybox.css') }}">*/
/*     {% block stylesheets %}*/
/*     {% endblock %}*/
/* */
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>*/
/* </head>*/
/* {% set notifications = listeNotification( app.user.id ) %}*/
/* {% set notificationsVu = listeNotificationVu( app.user.id ) %}*/
/* */
/* <body class="validationForm">*/
/* <!--[if lt IE 7]>*/
/* <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade*/
/*     your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to*/
/*     improve your experience.</p>*/
/* <![endif]-->*/
/* */
/* <!-- ==================== TOP MENU ==================== -->*/
/* <div class="navbar navbar-inverse navbar-fixed-top">*/
/*     <div class="navbar-inner">*/
/*         <div class="container-fluid">*/
/*             <a class="brand" href="{{ path('back_dash_homepage') }}"><img class="img-responsive" src="{{ asset('RessourcesBack/img/logo.png') }}"> </a>*/
/* */
/*             <div class="nav pull-right">*/
/*                 <form class="navbar-form">*/
/*                     <div class="input-append">*/
/*                         <div class="collapsibleContent">*/
/* */
/*                             <a href="#notificationsContent" class="sidebar"><span*/
/*                                         class="add-on add-on-middle add-on-mini add-on-dark" id="notifications"><i*/
/*                                             class="icon-bell-alt"></i><span*/
/*                                             class="notifyCircle orange">{{ notificationsVu|length }}</span></span></a>*/
/*                             {% set cntcmt=render(controller('BackDealBundle:Comment:countcomment')) %}*/
/*                             {% if app.user.roles[0]=='ROLE_SUPER_ADMIN' or app.user.roles[0]=='SERVICECLIENT' or app.user.roles[0]=='CHEFSERVICECLI'  %}*/
/* */
/*                             <a href="#messagesContent" class="sidebar"><span*/
/*                                         class="add-on add-on-middle add-on-mini add-on-dark" id="messages"><i*/
/*                                             class="icon-comments-alt"></i>{% if cntcmt>0 %}<span*/
/*                                             class="notifyCircle red">{{ cntcmt }}</span>{% endif %}</span></a>*/
/*                             {% endif %}*/
/*                             <a href="#profileContent" class="sidebar"><span class="add-on add-on-mini add-on-dark"*/
/*                                                                             id="profile"><i class="icon-user"></i><span*/
/*                                             class="username">{{ app.user.name }}</span></span></a>*/
/*                         </div>*/
/*                         <a href="#collapsedSidebarContent" class="collapseHolder sidebar"><span*/
/*                                     class="add-on add-on-mini add-on-dark"><i class="icon-sort-down"></i></span></a>*/
/*                     </div>*/
/*                 </form>*/
/*             </div>*/
/*             <!--/.nav-collapse -->*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
/* */
/* <!-- ==================== SIDEBAR ==================== -->*/
/* <div class="hiddenContent">*/
/*     <!-- ==================== SIDEBAR COLLAPSED ==================== -->*/
/*     <div id="collapsedSidebarContent">*/
/*         <div class="sidebarDivider"></div>*/
/*         <div class="sidebarContent">*/
/*             <ul class="collapsedSidebarMenu">*/
/* */
/*                 <li><a href="#notificationsContent" class="sidebar">Notifications*/
/*                         <div class="notifyCircle orange">{{ notifications|length }}</div>*/
/*                         <i class="icon-chevron-sign-right"></i></a></li>*/
/*                 {% if app.user.roles[0]=='ROLE_SUPER_ADMIN' or app.user.roles[0]=='SERVICECLIENT' or app.user.roles[0]=='CHEFSERVICECLI'  %}*/
/* */
/*                 <li><a href="#messagesContent" class="sidebar">Messages*/
/* */
/*                         <div class="notifyCircle red">{{ cntcmt }}</div>*/
/*                         <i class="icon-chevron-sign-right"></i></a></li>*/
/* {% endif %}*/
/*                 <li><a href="#profileContent" class="sidebar">{{ app.user.name }}<i class="icon-chevron-sign-right"></i></a>*/
/*                 </li>*/
/*                 <li class="sublevel"><a href="{{ path('update_profile_users') }}">Modifier mon profile<i class="icon-user"></i></a></li>*/
/* */
/*                 <li class="sublevel"><a href="{{ path('fos_user_security_logout') }}">Déconnexion<i class="icon-off"></i></a></li>*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/*     <!-- ==================== END OF SIDEBAR COLLAPSED ==================== -->*/
/*     <!-- ==================== SIDEBAR TASKS ==================== -->*/
/* */
/* */
/*     <!-- ==================== SIDEBAR NOTIFICATIONS ==================== -->*/
/*     <div id="notificationsContent">*/
/*         <div class="sidebarDivider"></div>*/
/*         <div class="sidebarContent">*/
/*             <a href="#collapsedSidebarContent" class="showCollapsedSidebarMenu"><i class="icon-chevron-sign-left"></i>*/
/* */
/*                 <h1> Notifications</h1></a>*/
/* */
/*             <h1>Notifications</h1>*/
/*             <a class="btn btn-danger" href="{{ path('back_notification_vu') }}" >Tout marquer comme vu</a><br>*/
/*             <div class="sidebarInfo">*/
/*                 <div><span class="label orange">{{ notificationsVu|length }}</span> notifications Non vu </div>*/
/*             </div>*/
/*             <ul class="notificationsList">*/
/*                 {% for item in notifications %}*/
/*                     {% set time = timeAgo( item.dcr|date('Y-m-d H:i:s') ) %}*/
/* */
/*                     <li class="{% if item.etat == 0 %} Non vu {% endif %} {% if loop.first %} first {% endif %}">*/
/* */
/*                         <div>*/
/*                             {% if item.lien %}<a class="hover" style="color: #616161 "*/
/*                                                  href="{{ item.lien }}?notif={{ item.id }}">*/
/*                                 <i class="{{ item.icone }}"></i> {{ item.name }}</a>*/
/*                             {% else %}*/
/*                                 <i class="{{ item.icone }}"></i> {{ item.name }}*/
/*                             {% endif %}*/
/*                         </div>*/
/*                         <span class="notificationDate">{{ time }} {% if item.etat == 0 %}<span*/
/*                                     class="pull-right notificationStatus">Non vu</span>{% endif %}</span>*/
/*                     </li>*/
/*                 {% endfor %}*/
/* */
/*             </ul>*/
/*             <form method="get" action="{{ path('back_notification') }}">*/
/*                 <button class="btn btn-primary">Voir tous</button>*/
/* */
/*             </form>*/
/*         </div>*/
/*     </div>*/
/*     <!-- ==================== END OF SIDEBAR NOTIFICATIONS ==================== -->*/
/* */
/*     <!-- ==================== SIDEBAR MESSAGES ==================== -->*/
/*     {{  render(controller('BackDealBundle:Comment:messagebar'))  }}*/
/* */
/*     <!-- ==================== END OF SIDEBAR MESSAGES ==================== -->*/
/* */
/* */
/* */
/*     <!-- ==================== SIDEBAR PROFILE ==================== -->*/
/*     <div id="profileContent">*/
/*         <div class="sidebarDivider"></div>*/
/*         <div class="sidebarContent">*/
/*             <a href="#collapsedSidebarContent" class="showCollapsedSidebarMenu"><i class="icon-chevron-sign-left"></i>*/
/* */
/*                 <h1> Mon Compte</h1></a>*/
/* */
/*             <h1>Mon Compte</h1>*/
/* {% set userPhoto =  'uploads/user/' ~ app.user.profilePicturePath %}*/
/*            <div class="profileBlock">*/
/*                 <div class="profilePhoto"*/
/*                      {% if app.user.profilePicturePath!='' %}style="background: url('{{ asset(userPhoto| imagine_filter('user_profil')) }}') no-repeat center top"{% endif %}>*/
/* */
/*                     <div class="usernameHolder">{{ app.user.name }}</div>*/
/* */
/*                 </div>*/
/*                 <div class="profileInfo">*/
/* */
/*                     <p><i class="icon-envelope-alt"></i> {{ app.user.email }}</p>*/
/* */
/*                     <p><i class="icon-globe"></i> Bigdeal.tn</p>*/
/* */
/*                 </div>*/
/*                 <footer>*/
/*                     <div class="profileSettingBlock editProfile"*/
/*                          onclick="$(location).attr('href','{{ path('update_profile_users') }}');"><i*/
/*                                 class="icon-user"></i>Modifier le profil*/
/*                     </div>*/
/*                     <!--div class="profileSettingBlock changePassword"><i class="icon-lock"></i>change password</div-->*/
/*                     <div class="profileSettingBlock logout"*/
/*                          onclick="$(location).attr('href','{{ path('fos_user_security_logout') }}');"><i*/
/*                                 class="icon-off"></i>Déconnexion*/
/*                     </div>*/
/*                 </footer>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <!-- ==================== END OF SIDEBAR PROFILE ==================== -->*/
/* */
/* </div>*/
/* <!-- ==================== END OF SIDEBAR ==================== -->*/
/* */
/* {% if app.user.roles[0]=='ROLE_SUPER_ADMIN' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='COMMERCIAL' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainCommercialMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='PALAINER' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainPalainerMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='CAISSIER' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainCaissierMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='RESPONSABLECAISSE' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainResponsableCaisseMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='FINANCIER' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainFinancierMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='SERVICECLIENT'  %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainServiceClientMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* 	{% elseif app.user.roles[0]=='CHEFSERVICECLI' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainChefServiceClientMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='PARTENAIRE' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainPartnerMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='REDACTEUR' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainRedacctorMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* */
/* */
/* */
/* {% elseif app.user.roles[0]=='DAF' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainDafMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='DIRECTEURCOMMERCIAL' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainDcMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% elseif app.user.roles[0]=='CHEFRED' %}*/
/*     <div class="mainmenu">*/
/*         <div class="container-fluid">*/
/*             {{ knp_menu_render('BackDashBundle:Builder:createMainChefRedacctorMenu', {'template': 'BackDashBundle:Menu:knp_menu.html.twig'}) }}*/
/*         </div>*/
/*     </div>*/
/* {% endif %}*/
/* <div class="content1">*/
/*     <!-- ==================== TITLE LINE FOR HEADLINE ==================== -->*/
/*     <div class="titleLine">*/
/*         <!--div class="container-fluid">*/
/*             <div class="titleIcon"><i class="icon-dashboard"></i></div>*/
/*             <ul class="titleLineHeading">*/
/*                 <li class="heading"><h1>Dashboard</h1></li>*/
/*                 <li class="subheading">the place for everything</li>*/
/*             </ul>*/
/*             <ul class="titleLineCharts pull-right">*/
/*                 <li>*/
/*                     <span class="usersBar">100,235,549,222,639,335,800</span>*/
/*                     <h2 class="cyanText">1254<span class="greyText">users</span></h2>*/
/*                 </li>*/
/*                 ...*/
/*             </ul>*/
/*         </div-->*/
/*     </div>*/
/*     <!-- ==================== END OF TITLE LINE ==================== -->*/
/*     <!-- ==================== BREADCRUMBS / DATETIME ==================== -->*/
/*     <ul class="breadcrumb">*/
/*         {{ wo_render_breadcrumbs({ viewTemplate: "::breadcrumbs.html.twig" })|raw }}*/
/*         <!--<li><i class="icon-home"></i><a href="{{ path('back_dash_homepage') }}"> Home</a> <span class="divider"><i class="icon-angle-right"></i></span></li>*/
/*                 <li class="active">Dashboard</li>*/
/*                 <li class="moveDown pull-right">*/
/*                     <span class="time"></span>*/
/*                     <span class="date"></span>*/
/*                 </li>   -->*/
/*     </ul>*/
/*     {% block body %}*/
/*     */
/* 	*/
/*     {% endblock %}*/
/* */
/* */
/*     <!-- ==================== END OF BREADCRUMBS / DATETIME ==================== -->*/
/*     */
/* </div>*/
/* <div class="col-md-12 text-center form-signin-footer">*/
/* 	<strong>Bigdeal © {{ 'now'|date('Y') }}</strong>*/
/* </div>*/
/* */
/* <script src="{{ asset('RessourcesBack/js/jquery-1.10.1.min.js') }}"></script>*/
/* <script>window.jQuery || document.write('<script src="{{ asset('js/jquery-1.10.1.min.js') }}"><\/script>')</script>*/
/* <script src="{{ asset('RessourcesBack/js/vendor/bootstrap-slider.js') }}"></script>*/
/* <!-- bootstrap slider plugin -->*/
/* <script src="{{ asset('RessourcesBack/js/vendor/jquery.sparkline.min.js') }}"></script>*/
/* <!-- small charts plugin -->*/
/* <script src="{{ asset('RessourcesBack/js/vendor/bootstrap-multiselect.js') }}"></script>*/
/* <!-- multiselect plugin -->*/
/* <script src="{{ asset('RessourcesBack/js/vendor/parsley.min.js') }}"></script>*/
/* <!-- parsley validator plugin -->*/
/* */
/* <script src="{{ asset('RessourcesBack/js/vendor/bootstrap.min.js') }}"></script>*/
/* <script src="{{ asset('RessourcesBack/js/thekamarel.js') }}"></script>*/
/* <!-- main project js file -->*/
/* <script src="{{ asset('RessourcesBack/js/jquery.fancybox.js') }}"></script>*/
/* <!-- bootbox -->*/
/* <script src="{{ asset('RessourcesBack/js/lib/bootbox/bootbox.min.js') }}"></script>*/
/* {% javascripts '@BackPlanningBundle/Resources/public/js/jquery.form-validator.js' %}*/
/* <script type="text/javascript" src="{{ asset_url }}"></script>*/
/* {% endjavascripts %}*/
/* <script>*/
/* */
/*     $(function () {*/
/* */
/*         $('#multipleSelect').multiselect({*/
/*             buttonText: function (options, select) {*/
/*                 if (options.length == 0) {*/
/*                     return 'None selected <b class="caret"></b>';*/
/*                 }*/
/*                 else if (options.length > 1) {*/
/*                     return options.length + ' selected <b class="caret"></b>';*/
/*                 }*/
/*                 else {*/
/*                     var selected = '';*/
/*                     options.each(function () {*/
/*                         selected += $(this).text() + ', ';*/
/*                     });*/
/*                     return selected.substr(0, selected.length - 2) + ' <b class="caret"></b>';*/
/*                 }*/
/*             }*/
/*         });*/
/* */
/*         $('#secondForm').parsley({*/
/*             excluded: 'ul.dropdown-menu li input[type=checkbox]'*/
/*         });*/
/*         $('.iframe-btnx').fancybox({*/
/*             'width': 880,*/
/*             'height': 570,*/
/*             'type': 'iframe',*/
/*             'autoScale': false*/
/*         });*/
/*     });*/
/* */
/* </script>*/
/* <script>*/
/* */
/*     $(document).ready(function () {*/
/*         $.ajax({*/
/*             type: 'get',*/
/*             url: '{{ path('count_cmd') }}',*/
/*             success: function (data) {*/
/* */
/*                     var newNode = document.createElement("span");*/
/*                     newNode.appendChild(document.createTextNode(data.count));*/
/*                     newNode.className = "notifyCircleCmd red";*/
/*                     var td1 = document.getElementById('clientservice');*/
/*                     var td2 = document.getElementById('withbadge');*/
/*                 */
/*                     if(td1){td1.appendChild(newNode);}*/
/*                     if(td2){td2.appendChild(newNode);}*/
/*                     if(data.count>0)*/
/*                     {*/
/*                         var td3 = document.getElementById('livrcomm');*/
/*                         td3.style.backgroundColor = "#de0e79";*/
/*                     }*/
/* */
/*                 }*/
/* */
/*         });*/
/* */
/* */
/*     });*/
/* */
/* */
/* 		var headertext = [],*/
/* 		headers = document.querySelectorAll(".table-responsive th"),*/
/* 		tablerows = document.querySelectorAll(".table-responsive th"),*/
/* 		tablebody = document.querySelector(".table-responsive tbody");*/
/* 		*/
/* 		for(var i = 0; i < headers.length; i++) {*/
/* 		  var current = headers[i];*/
/* 		  headertext.push(current.textContent.replace(/\r?\n|\r/,""));*/
/* 		} */
/* 		for (var i = 0, row; row = tablebody.rows[i]; i++) {*/
/* 		  for (var j = 0, col; col = row.cells[j]; j++) {*/
/* 		    col.setAttribute("data-th", headertext[j]);*/
/* 		  } */
/* 		}*/
/* 	</script>*/
/* {% block javascripts %}*/
/* {% endblock %}*/
/* </body>*/
/* </html>*/
/* */
