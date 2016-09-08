<?php

/* MainFrontBundle:Default:header.html.twig */
class __TwigTemplate_a92e719028a2668f313bc493a020bc217c7171fc5477ec001695ce7100dcc98d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header> 
    <div id=\"top-header\" class=\"row\">
        <div class=\"col-md-4 col-sm-12 col-xs-12\">
            <a class=\"navbar-brand\" href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("main_front_homepage");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/logo.png"), "html", null, true);
        echo "\" alt=\"Big Deal\" class=\"img-responsive\" /></a>
        </div>
        <div class=\"col-md-5 col-sm-12 col-xs-12\">
            <form class=\"navbar-form navbar-left\" role=\"search\">
                <div class=\"input-group\">
                    <input class=\"form-control\" id=\"searchtop\" placeholder=\"Que cherchez-vous?\" name=\"search\" type=\"text\">
                    <select class=\"form-control\" id=\"js-example-basic-single\" placeholder=\"Région\" name=\"city\">
                        ";
        // line 11
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") != "")) {
            // line 12
            echo "                            ";
            $context["defaultregion"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method");
            // line 13
            echo " <option value=\"0\" ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") == "Toutes les régions")) {
                echo "selected=\"selected\" ";
            }
            echo ">Toutes les régions</option>
                            ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 15
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") == $this->getAttribute($context["item"], "name", array()))) {
                    echo "selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "                        ";
        } else {
            // line 18
            echo "                            ";
            $context["defaultregion"] = "Grand tunis";
            // line 19
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 20
                echo "                            
                                <option value=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\" ";
                if (("Grand tunis" == $this->getAttribute($context["item"], "name", array()))) {
                    echo "selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
                           
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "                        ";
        }
        // line 25
        echo "                    </select>

                    <!--<input class=\"form-control\"  placeholder=\"Région\" name=\"city\" type=\"text\" value=\"\">-->
                </div>
            </form>
        </div>
        <div class=\"col-md-3 col-sm-12 col-xs-12\">
        \t<div class=\"row hidden-md hidden-sm\">
        \t\t<div class=\"col-xs-12 text-center\">
        \t\t\t<ul class=\"header-mobile-icon\">

\t\t                    ";
        // line 36
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->env->getExtension('security')->isGranted("ROLE_CLIENT"))) {
            // line 37
            echo "\t\t                        ";
            $context["client"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array());
            // line 38
            echo "\t\t                        <li class=\"first\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("mon_compte");
            echo "\"><span>Bonjour ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "title", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "fname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "name", array()), "html", null, true);
            echo "</span></a></li>
\t\t
\t\t                        <li class=\"bordered\"><a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("mon_compte");
            echo "\"><i class=\"fa fa-user\"></i></a></li>
                                <li class=\"bordered\"><a href=\"";
            // line 41
            echo $this->env->getExtension('routing')->getPath("logout_client");
            echo "\"><i class=\"fa fa-sign-out\"></i></a></li>
\t\t                    ";
        } else {
            // line 43
            echo "\t\t                        <li class=\"bordered\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("identification");
            echo "\"><i class=\"fa fa-user\"></i></a></li>
\t\t
\t\t                        <li class=\"bordered\"><a href=\"";
            // line 45
            echo $this->env->getExtension('routing')->getPath("inscription");
            echo "\"><i class=\"fa fa-sign-in\"></i></a></li>
\t\t                    ";
        }
        // line 47
        echo "\t\t\t\t\t\t\t     <li class=\"bordered\"><a href=\"tel:+21671168444\"><i class=\"flaticon-telephone46\"></i></a></li>
\t\t            </ul>
        \t\t</div>
        \t</div>
            <ul class=\"top hidden-xs\">

                    ";
        // line 53
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && $this->env->getExtension('security')->isGranted("ROLE_CLIENT"))) {
            // line 54
            echo "                        ";
            $context["client"] = $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array());
            // line 55
            echo "                        <li class=\"first\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("mon_compte");
            echo "\"><span>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "title", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "fname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "name", array()), "html", null, true);
            echo "</span></a></li>

                        <li><a href=\"";
            // line 57
            echo $this->env->getExtension('routing')->getPath("logout_client");
            echo "\"><span>Déconnexion</span></a></li>
                    ";
        } else {
            // line 59
            echo "                        <li class=\"first\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("identification");
            echo "\"><span>Connexion</span></a></li>

                        <li><a href=\"";
            // line 61
            echo $this->env->getExtension('routing')->getPath("inscription");
            echo "\"><span>Inscription</span></a></li>
                    ";
        }
        // line 63
        echo "
            </ul>
            <div class=\"row bottom hidden-xs\">
                <div class=\"col-sm-offset-3 col-sm-9 col-xs-12\">
                    <div class=\"phone\"><i class=\"flaticon-telephone46\"></i>71 168 444</div>
                    <span>Lun-Sam de 08H30 à 18H</span>
                </div>
            </div>
        </div>
    </div>
    <nav class=\"navbar\">
            <div class=\"navbar-header\">
            \t<!--<a href=\"javascript:void(0)\" class=\"mobile-visible mobile-search\"><i class=\"fa fa-search\"></i></a>
            \tSearch Modal-->
            \t<a href=\"javascript:void(0)\" class=\"mobile-visible mobile-search\"><i class=\"search-btn fa flaticon-location26\"></i></a>
\t\t\t    <div class=\"mobilenav\"> 
\t\t\t    \t\t<form class=\"navbar-form navbar-left\" role=\"search\">
\t\t\t\t\t\t  <li><select class=\"form-control\" id=\"js-example-basic-single2\" placeholder=\"Région\" name=\"city\">
\t\t\t\t\t\t 
\t\t\t\t\t\t  
\t\t\t\t\t\t                        ";
        // line 83
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") != "")) {
            // line 84
            echo "\t\t\t\t\t\t                            ";
            $context["defaultregion"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method");
            // line 85
            echo "\t\t\t\t\t\t <option value=\"0\" ";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") == "Toutes les régions")) {
                echo "selected=\"selected\" ";
            }
            echo ">Toutes les régions</option>
\t\t\t\t\t\t                            ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 87
                echo "\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") == $this->getAttribute($context["item"], "name", array()))) {
                    echo "selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
\t\t\t\t\t\t                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "\t\t\t\t\t\t                        ";
        } else {
            // line 90
            echo "\t\t\t\t\t\t                            ";
            $context["defaultregion"] = "Grand tunis";
            // line 91
            echo "\t\t\t\t\t\t                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 92
                echo "\t\t\t\t\t\t                                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\" ";
                if (("Grand tunis" == $this->getAttribute($context["item"], "name", array()))) {
                    echo "selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
\t\t\t\t\t\t                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "\t\t\t\t\t\t                        ";
        }
        // line 95
        echo "\t\t\t\t\t\t                    </select>
\t\t\t\t\t\t     </li> 
\t\t\t\t\t   </form>
\t\t\t\t</div> 
\t\t\t    
\t\t\t    
\t\t\t   <!-- <div class=\"search-open\">
\t\t\t    \t<select class=\"form-control\" id=\"js-example-basic-single2\" placeholder=\"Région\" name=\"city\">
\t\t\t\t\t\t                        ";
        // line 103
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") != "")) {
            // line 104
            echo "\t\t\t\t\t\t                            ";
            $context["defaultregion"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method");
            // line 105
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t                            ";
            // line 106
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 107
                echo "\t\t\t\t\t\t                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") == $this->getAttribute($context["item"], "name", array()))) {
                    echo "selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
\t\t\t\t\t\t                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            echo "\t\t\t\t\t\t                        ";
        } else {
            // line 110
            echo "\t\t\t\t\t\t                            ";
            $context["defaultregion"] = "Grand tunis";
            // line 111
            echo "\t\t\t\t\t\t                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 112
                echo "\t\t\t\t\t\t                                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\" ";
                if (("Grand tunis" == $this->getAttribute($context["item"], "name", array()))) {
                    echo "selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
\t\t\t\t\t\t                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "\t\t\t\t\t\t                        ";
        }
        // line 115
        echo "\t\t\t\t\t</select>
\t\t\t    </div>-->
            \t<a class=\"mobile-logo mobile-visible\" href=\"";
        // line 117
        echo $this->env->getExtension('routing')->getPath("main_front_homepage");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/logo.png"), "html", null, true);
        echo "\" alt=\"Big Deal\" class=\"img-responsive\" /></a>
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
\t\t\t\t\t<li><a href=\"http://www.bigdeal-booking.tn/\" target=\"_blanc\" class=\"booking_button blink\">Hotels</a></li>
                    ";
        // line 128
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["category"]) ? $context["category"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 129
            echo "
\t\t\t\t\t<li";
            // line 130
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "server", array()), "get", array(0 => "REDIRECT_URL"), "method") == $this->env->getExtension('routing')->getPath("deal_list", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["defaultregion"]) ? $context["defaultregion"] : null)), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($context["item"], "name", array())))))) {
                echo " class=\"active\"";
            }
            echo "><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_list", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["defaultregion"]) ? $context["defaultregion"] : null)), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($context["item"], "name", array())))), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($context["item"], "id", array()) == 4)) {
                echo " class=\"lifestyles hvr-underline-from-center\" ";
            } else {
                echo " class=\"hvr-underline-from-center\" ";
            }
            echo ">";
            echo $this->getAttribute($context["item"], "name", array());
            echo "</a></li>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "
                    <li><a href=\"";
        // line 134
        echo $this->env->getExtension('routing')->getPath("deal_passe");
        echo "\" class=\"hvr-underline-from-center\">Deals passés</a></li>
\t\t\t\t\t<li><a href=\"https://www.teskerti.tn/\" target=\"_blanc\" class=\"hvr-underline-from-center\">Billetterie</a></li>
\t\t\t\t\t<li><a href=\"http://www.bigdeal-shopping.tn\" target=\"_blanc\" class=\"hvr-underline-from-center\">Shopping</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
    </nav>
</header>







";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Default:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  389 => 134,  386 => 133,  365 => 130,  362 => 129,  358 => 128,  342 => 117,  338 => 115,  335 => 114,  320 => 112,  315 => 111,  312 => 110,  309 => 109,  294 => 107,  290 => 106,  287 => 105,  284 => 104,  282 => 103,  272 => 95,  269 => 94,  254 => 92,  249 => 91,  246 => 90,  243 => 89,  228 => 87,  224 => 86,  217 => 85,  214 => 84,  212 => 83,  190 => 63,  185 => 61,  179 => 59,  174 => 57,  162 => 55,  159 => 54,  157 => 53,  149 => 47,  144 => 45,  138 => 43,  133 => 41,  129 => 40,  117 => 38,  114 => 37,  112 => 36,  99 => 25,  96 => 24,  81 => 21,  78 => 20,  73 => 19,  70 => 18,  67 => 17,  52 => 15,  48 => 14,  41 => 13,  38 => 12,  36 => 11,  24 => 4,  19 => 1,);
    }
}
/* <header> */
/*     <div id="top-header" class="row">*/
/*         <div class="col-md-4 col-sm-12 col-xs-12">*/
/*             <a class="navbar-brand" href="{{ path('main_front_homepage') }}"><img src="{{ asset('public/images/logo.png') }}" alt="Big Deal" class="img-responsive" /></a>*/
/*         </div>*/
/*         <div class="col-md-5 col-sm-12 col-xs-12">*/
/*             <form class="navbar-form navbar-left" role="search">*/
/*                 <div class="input-group">*/
/*                     <input class="form-control" id="searchtop" placeholder="Que cherchez-vous?" name="search" type="text">*/
/*                     <select class="form-control" id="js-example-basic-single" placeholder="Région" name="city">*/
/*                         {% if app.session.get('region')!="" %}*/
/*                             {% set defaultregion= app.session.get('region') %}*/
/*  <option value="0" {% if app.session.get('region')== "Toutes les régions"   %}selected="selected" {% endif %}>Toutes les régions</option>*/
/*                             {% for item in region %}*/
/*                         <option value="{{ item.id }}" {% if app.session.get('region')== item.name   %}selected="selected" {% endif %}>{{ item.name }}</option>*/
/*                         {% endfor %}*/
/*                         {% else %}*/
/*                             {% set defaultregion= "Grand tunis" %}*/
/*                             {% for item in region %}*/
/*                             */
/*                                 <option value="{{ item.id }}" {% if "Grand tunis"== item.name   %}selected="selected" {% endif %}>{{ item.name }}</option>*/
/*                            */
/*                             {% endfor %}*/
/*                         {% endif %}*/
/*                     </select>*/
/* */
/*                     <!--<input class="form-control"  placeholder="Région" name="city" type="text" value="">-->*/
/*                 </div>*/
/*             </form>*/
/*         </div>*/
/*         <div class="col-md-3 col-sm-12 col-xs-12">*/
/*         	<div class="row hidden-md hidden-sm">*/
/*         		<div class="col-xs-12 text-center">*/
/*         			<ul class="header-mobile-icon">*/
/* */
/* 		                    {% if app.user and   is_granted('ROLE_CLIENT') %}*/
/* 		                        {% set client =app.user  %}*/
/* 		                        <li class="first"><a href="{{ path('mon_compte') }}"><span>Bonjour {{ client.title }} {{ client.fname }} {{ client.name }}</span></a></li>*/
/* 		*/
/* 		                        <li class="bordered"><a href="{{ path('mon_compte') }}"><i class="fa fa-user"></i></a></li>*/
/*                                 <li class="bordered"><a href="{{ path('logout_client') }}"><i class="fa fa-sign-out"></i></a></li>*/
/* 		                    {% else %}*/
/* 		                        <li class="bordered"><a href="{{ path('identification') }}"><i class="fa fa-user"></i></a></li>*/
/* 		*/
/* 		                        <li class="bordered"><a href="{{ path('inscription') }}"><i class="fa fa-sign-in"></i></a></li>*/
/* 		                    {% endif %}*/
/* 							     <li class="bordered"><a href="tel:+21671168444"><i class="flaticon-telephone46"></i></a></li>*/
/* 		            </ul>*/
/*         		</div>*/
/*         	</div>*/
/*             <ul class="top hidden-xs">*/
/* */
/*                     {% if app.user and   is_granted('ROLE_CLIENT') %}*/
/*                         {% set client =app.user  %}*/
/*                         <li class="first"><a href="{{ path('mon_compte') }}"><span>{{ client.title }} {{ client.fname }} {{ client.name }}</span></a></li>*/
/* */
/*                         <li><a href="{{ path('logout_client') }}"><span>Déconnexion</span></a></li>*/
/*                     {% else %}*/
/*                         <li class="first"><a href="{{ path('identification') }}"><span>Connexion</span></a></li>*/
/* */
/*                         <li><a href="{{ path('inscription') }}"><span>Inscription</span></a></li>*/
/*                     {% endif %}*/
/* */
/*             </ul>*/
/*             <div class="row bottom hidden-xs">*/
/*                 <div class="col-sm-offset-3 col-sm-9 col-xs-12">*/
/*                     <div class="phone"><i class="flaticon-telephone46"></i>71 168 444</div>*/
/*                     <span>Lun-Sam de 08H30 à 18H</span>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <nav class="navbar">*/
/*             <div class="navbar-header">*/
/*             	<!--<a href="javascript:void(0)" class="mobile-visible mobile-search"><i class="fa fa-search"></i></a>*/
/*             	Search Modal-->*/
/*             	<a href="javascript:void(0)" class="mobile-visible mobile-search"><i class="search-btn fa flaticon-location26"></i></a>*/
/* 			    <div class="mobilenav"> */
/* 			    		<form class="navbar-form navbar-left" role="search">*/
/* 						  <li><select class="form-control" id="js-example-basic-single2" placeholder="Région" name="city">*/
/* 						 */
/* 						  */
/* 						                        {% if app.session.get('region')!="" %}*/
/* 						                            {% set defaultregion= app.session.get('region') %}*/
/* 						 <option value="0" {% if app.session.get('region')== "Toutes les régions"   %}selected="selected" {% endif %}>Toutes les régions</option>*/
/* 						                            {% for item in region %}*/
/* 					<option value="{{ item.id }}" {% if app.session.get('region')== item.name   %}selected="selected" {% endif %}>{{ item.name }}</option>*/
/* 						                        {% endfor %}*/
/* 						                        {% else %}*/
/* 						                            {% set defaultregion= "Grand tunis" %}*/
/* 						                            {% for item in region %}*/
/* 						                                <option value="{{ item.id }}" {% if "Grand tunis"== item.name   %}selected="selected" {% endif %}>{{ item.name }}</option>*/
/* 						                            {% endfor %}*/
/* 						                        {% endif %}*/
/* 						                    </select>*/
/* 						     </li> */
/* 					   </form>*/
/* 				</div> */
/* 			    */
/* 			    */
/* 			   <!-- <div class="search-open">*/
/* 			    	<select class="form-control" id="js-example-basic-single2" placeholder="Région" name="city">*/
/* 						                        {% if app.session.get('region')!="" %}*/
/* 						                            {% set defaultregion= app.session.get('region') %}*/
/* 						*/
/* 						                            {% for item in region %}*/
/* 						                        <option value="{{ item.name }}" {% if app.session.get('region')== item.name   %}selected="selected" {% endif %}>{{ item.name }}</option>*/
/* 						                        {% endfor %}*/
/* 						                        {% else %}*/
/* 						                            {% set defaultregion= "Grand tunis" %}*/
/* 						                            {% for item in region %}*/
/* 						                                <option value="{{ item.name }}" {% if "Grand tunis"== item.name   %}selected="selected" {% endif %}>{{ item.name }}</option>*/
/* 						                            {% endfor %}*/
/* 						                        {% endif %}*/
/* 					</select>*/
/* 			    </div>-->*/
/*             	<a class="mobile-logo mobile-visible" href="{{ path('main_front_homepage') }}"><img src="{{ asset('public/images/logo.png') }}" alt="Big Deal" class="img-responsive" /></a>*/
/*                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">*/
/*                     <span class="sr-only">Toggle navigation</span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                 </button>*/
/*             </div>*/
/*             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*                 <ul class="nav navbar-nav">*/
/* 					<li><a href="http://www.bigdeal-booking.tn/" target="_blanc" class="booking_button blink">Hotels</a></li>*/
/*                     {% for item in category %}*/
/* */
/* 					<li{% if app.request.server.get('REDIRECT_URL')==path('deal_list',{'region':(defaultregion|getAlias),'id':item.id,'name':(item.name|getAlias)})  %} class="active"{% endif %}><a href="{{ path('deal_list',{'region':(defaultregion|getAlias),'id':item.id,'name':(item.name|getAlias)}) }}" {% if item.id==4 %} class="lifestyles hvr-underline-from-center" {% else %} class="hvr-underline-from-center" {% endif %}>{{ item.name|raw }}</a></li>*/
/* */
/*                     {% endfor %}*/
/* */
/*                     <li><a href="{{ path('deal_passe') }}" class="hvr-underline-from-center">Deals passés</a></li>*/
/* 					<li><a href="https://www.teskerti.tn/" target="_blanc" class="hvr-underline-from-center">Billetterie</a></li>*/
/* 					<li><a href="http://www.bigdeal-shopping.tn" target="_blanc" class="hvr-underline-from-center">Shopping</a></li>*/
/*                 </ul>*/
/*             </div><!-- /.navbar-collapse -->*/
/*     </nav>*/
/* </header>*/
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
