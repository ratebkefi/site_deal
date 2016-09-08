<?php

/* MainFrontBundle:Default:index.html.twig */
class __TwigTemplate_bb6437b5232835636b0d31f842652b6fb57cdd19424d9c0619b975893ed600bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "MainFrontBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "
";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/enjoyhint.css"), "html", null, true);
        echo "\">
<style>
\t.mySkip, .myNext, .mySkip:focus, .myNext:focus {
\t\tcolor: white;
\t\tborder-color: #de0e79;
\t\tborder-radius: 0;
\t\tmargin-top: 50px;
\t}
\t/*.enjoyhint_close_btn {display: none;}
\t*/
\t.mySkip, .mySkip:hover, .mySkip:focus {
\t\tbackground: transparent;
\t}
\t.myNext, .myNext:hover, .myNext:focus {
\t\tbackground: #de0e79;
\t}
</style>
";
    }

    // line 26
    public function block_javascripts($context, array $blocks = array())
    {
        // line 27
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery-ias.min.js"), "html", null, true);
        echo "\"></script>
<script>
var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
if (w > 767) {
  document.write('<script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/enjoyhint.min.js"), "html", null, true);
        echo "\"><\\/script>');
}
if (w > 767) {
  document.write('<script type=\"text/javascript\" src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/main.js"), "html", null, true);
        echo "\"><\\/script>');
}

</script>


    <script>
        \$(function () {
            \$('.carousel').carousel();
        });

        \$(window).load(function(){
            \$('.flexslider').flexslider({
                animation: \"slide\",
                animationLoop: true,
                controlNav: false,
                itemWidth: 67,
                itemMargin: 5,
                minItems: 2,
                maxItems: 6
            });
        });
       \$(document).ready(function () {
\t\tvar ias = \$.ias({
\t\t  container:  \".ddcontainer\",
\t\t  item:       \".dditem\",
\t\t  pagination: \".pagination\",
\t\t  next:       \".next a\",
\t\t  delay:      1250  
\t\t});

\t\t//ias.extension(new IASSpinnerExtension());            // shows a spinner (a.k.a. loader)
\t\tias.extension(new IASSpinnerExtension({src: '/public/images/loading.gif' }));
\t\t//ias.extension(new IASTriggerExtension({})); // shows a trigger after page 3
\t\tias.extension(new IASTriggerExtension({html: '<div class=\"ias-trigger ias-trigger-next\" style=\"text-align: center; cursor: pointer;\"><a class=\"btn btn-primary\">Afficher plus</a></div>', offset: 4})); // override text show more
\t\t
\t\t/*ias.extension(new IASNoneLeftExtension({
\t\t  text: 'Plus aucun deal à afficher'      // override text when no pages left
\t\t}));*/
\t});
    </script>
";
    }

    // line 76
    public function block_body($context, array $blocks = array())
    {
        // line 77
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 78
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashMessages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 79
                echo "            <div class=\"alert ";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo " alert-subscribe\">
                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                ";
                // line 81
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"]), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["slider"]) ? $context["slider"] : null)) > 0)) {
            // line 86
            echo "    <div id=\"home-carousel\" class=\"carousel slide\" data-ride=\"carousel\">
        ";
            // line 87
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method") != "")) {
                // line 88
                echo "            ";
                $context["defaultregion"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method");
                // line 89
                echo "
            ";
            } else {
                // line 91
                echo "                ";
                $context["defaultregion"] = "Grand tunis";
                // line 92
                echo "            ";
            }
            // line 93
            echo "                <!-- Wrapper for slides -->
        <div class=\"carousel-inner\" role=\"listbox\">
            ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["slider"]) ? $context["slider"] : null));
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
                // line 96
                echo "                ";
                if ($this->getAttribute($context["item"], "seoTitle", array())) {
                    // line 97
                    echo "                ";
                    $context["permelink"] = $this->getAttribute($context["item"], "seoTitle", array());
                    // line 98
                    echo "                ";
                } else {
                    // line 99
                    echo "                ";
                    $context["permelink"] = $this->getAttribute($context["item"], "title", array());
                    // line 100
                    echo "                ";
                }
                // line 101
                echo "            ";
                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "reference", array())) > 0)) {
                    // line 102
                    echo "            <div class=\"item";
                    if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                        echo " active";
                    }
                    echo "\">
                <a href=\"";
                    // line 103
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "categoryId", array())), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null)))), "html", null, true);
                    echo "\"><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute($context["item"], "image4", array()), "jcarouselhome")), "html", null, true);
                    echo "\" alt=\"slideshow\" /></a>
                <div class=\"carousel-caption desc\">

                    <div class=\"\">
                        <div class=\"col-sm-6 pull-left\">
\t\t\t\t\t\t\t<p><a href=\"";
                    // line 108
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "categoryId", array())), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null)))), "html", null, true);
                    echo "\" title=\"\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                    echo "</a></p>
\t\t\t\t\t\t\t<p><i class=\"fa fa-tags teal\"></i><span class=\"gray\">";
                    // line 109
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "visible", array()) == 1)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "visibleAdress", array()), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "name", array()), "html", null, true);
                    }
                    echo "  </span> <i class=\"fa fa-map-marker teal\"></i><span class=\"gray\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "planning", array()), "regionId", array()), "html", null, true);
                    echo "</span></p>

                        </div>
                        ";
                    // line 112
                    $context["ref"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "reference", array()), 0, array(), "array");
                    // line 113
                    echo "                        <div class=\"pull-right\">
                            <div class=\"teal bold pull-left\">
                                <div class=\"btn btn-white\">";
                    // line 115
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), "bigdealPrice", array()), "html", null, true);
                    echo "<sup>DT</sup><span class=\"bottom gray\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), "shopPrice", array()), "html", null, true);
                    echo "<sup>DT</sup></span></div>
                                <div class=\"btn btn-white\">";
                    // line 116
                    echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getBigfidFilter($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), "bigdealPrice", array())), "html", null, true);
                    echo " <i class=\"flaticon-computerchip\"></i></div>
                            </div>
                            <a href=\"";
                    // line 118
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "categoryId", array())), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null)))), "html", null, true);
                    echo "\" class=\"btn pull-right\">Voir le Deal</a>
                        </div>
                    </div>


                </div>
            </div>
                ";
                }
                // line 126
                echo "            ";
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
            // line 127
            echo "        </div>
        <!-- Controls -->
        <a class=\"left carousel-control\" href=\"#home-carousel\" role=\"button\" data-slide=\"prev\">
            <span class=\"fa fa-angle-left\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Previous</span>
        </a>
        <a class=\"right carousel-control\" href=\"#home-carousel\" role=\"button\" data-slide=\"next\">
            <span class=\"fa fa-angle-right\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Next</span>
        </a>
    </div>
";
        }
        // line 139
        echo "    <div id=\"shows\" class=\"row ddcontainer\">
    ";
        // line 140
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["deal"]) ? $context["deal"] : null));
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
            // line 141
            echo "                ";
            if ($this->getAttribute($context["item"], "seoTitle", array())) {
                // line 142
                echo "                ";
                $context["permelink"] = $this->getAttribute($context["item"], "seoTitle", array());
                // line 143
                echo "                ";
            } else {
                // line 144
                echo "                ";
                $context["permelink"] = $this->getAttribute($context["item"], "title", array());
                // line 145
                echo "                ";
            }
            // line 146
            echo "        ";
            $context["link"] = $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "categoryId", array())), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null))));
            // line 147
            echo "        <div class=\"col-md-6 show dditem\">
            <a href=\"";
            // line 148
            echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute($context["item"], "image1", array()), "homedeal")), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\" /></a>
            <div class=\"details\">
\t\t\t\t<p class=\"dealTitle\"><a href=\"";
            // line 150
            echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</a></p>
\t\t\t\t<p><i class=\"fa fa-tags teal\"></i><span class=\"dark-gray nomPart\">";
            // line 151
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "visible", array()) == 1)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "visibleAdress", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "name", array()), "html", null, true);
            }
            echo "</span>  <i class=\"fa fa-map-marker teal\"></i><span class=\"dark-gray nomReg\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "planning", array()), "regionId", array()), "html", null, true);
            echo "</span></p>

                <div class=\"row\">
\t                <div class=\"teal bold col-md-3 col-sm-3 col-xs-4 border\">";
            // line 154
            $context["ref"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "planning", array()), "defaultannexe", array()), "reference", array()), 0, array(), "array");
            // line 155
            echo "\t                    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), "bigdealPrice", array()), "html", null, true);
            echo "<sup>DT</sup><span class=\"bottom dark-gray\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), "shopPrice", array()), "html", null, true);
            echo "<sup>DT</sup></span>
\t                </div>
\t\t\t\t\t<div class=\"teal bold col-md-3 col-sm-3 col-xs-3 BigfidPrice\">
\t                \t";
            // line 158
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getBigfidFilter($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), "bigdealPrice", array())), "html", null, true);
            echo " <i class=\"flaticon-computerchip\"></i>
\t                </div>
\t\t\t\t\t<div class=\"teal bold col-md-2 col-sm-2 col-xs-3\">";
            // line 160
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute($context["item"], "id", array())), "html", null, true);
            echo " <i class=\"flaticon-group2\"></i></div>
\t                <div class=\"col-md-4 col-xs-2 linkDetail\">
                \t\t<a href=\"";
            // line 162
            echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
            echo "\" class=\"btn\"><i class=\"fa fa-arrow-circle-right hidden-md hidden-sm\"></i><span class=\"hidden-xs\">Voir le Deal</span></a>
                \t</div>
                </div>
            </div>
        </div>
        ";
            // line 167
            if ((($this->getAttribute($context["loop"], "index", array()) % 2) == 0)) {
                echo "<div class=\"clearfix\"></div>";
            }
            // line 168
            echo "        ";
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
        // line 169
        echo "<div class=\"row col-sm-12\">
            <div class=\"pagination col-sm-12\" style=\"text-align: center\">
                ";
        // line 171
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
            </div>
        </div>
    </div>
    <!-- Links -->
    <div id=\"links\" class=\"row\">
        <!-- Script GetResponse popup inscription newsletter -->
        <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>
        <div class=\"col-md-3 dealJour\">
            <h3>Deals du jour</h3>
            <ul class=\"social\">
                ";
        // line 182
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["category"]) ? $context["category"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 183
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_list", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["defaultregion"]) ? $context["defaultregion"] : null)), "id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($context["item"], "name", array())))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        echo "            </ul>
        </div>
        <div class=\"col-md-3\">
            <h3>Villes et Regions</h3>
            <div class=\"row\">
                ";
        // line 190
        if (((twig_length_filter($this->env, (isset($context["region"]) ? $context["region"] : null)) % 2) == 1)) {
            // line 191
            echo "                ";
            $context["demi"] = ((twig_length_filter($this->env, (isset($context["region"]) ? $context["region"] : null)) / 2) + 1);
            // line 192
            echo "                    ";
        } else {
            // line 193
            echo "                        ";
            $context["demi"] = (twig_length_filter($this->env, (isset($context["region"]) ? $context["region"] : null)) / 2);
            // line 194
            echo "                        ";
        }
        // line 195
        echo "                ";
        $context["counter"] = 0;
        // line 196
        echo "                <div class=\"col-md-6\">
                    <ul>
                        ";
        // line 198
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
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
            // line 199
            echo "                            ";
            if (((isset($context["demi"]) ? $context["demi"] : null) >= $this->getAttribute($context["loop"], "index", array()))) {
                // line 200
                echo "                        <li>
<a href=\"";
                // line 201
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_list_region", array("id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($context["item"], "name", array())))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</a></li>
                                ";
                // line 202
                $context["counter"] = $this->getAttribute($context["loop"], "index", array());
                // line 203
                echo "                                ";
            }
            // line 204
            echo "                            ";
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
        // line 205
        echo "
                    </ul>
                </div>
                <div class=\"col-md-6\">
                    <ul>
                        ";
        // line 210
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["region"]) ? $context["region"] : null));
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
            // line 211
            echo "                            ";
            if (((isset($context["counter"]) ? $context["counter"] : null) < $this->getAttribute($context["loop"], "index", array()))) {
                // line 212
                echo "                                <li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deal_list_region", array("id" => $this->getAttribute($context["item"], "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($context["item"], "name", array())))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</a></li>
                            ";
            }
            // line 214
            echo "                        ";
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
        // line 215
        echo "                    </ul>
                </div>
            </div>
        </div>
        <div class=\"col-md-6 col-sm-12 col-xs-12\">
            ";
        // line 220
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("MainFrontBundle:Default:banner", array("type" => 2)));
        echo "
        </div>

    </div>
    <div class=\"row\">
        <div class=\"col-md-2 col-sm-12\">
            <div class=\"col-sm-12 hand text-center\"><i class=\"flaticon-agreement\"\"></i></div>
        </div>

        <div id=\"slider2\" class=\"col-md-10 col-sm-10\">
            <div class=\"flexslider carousel\">
                <ul class=\"slides\">
                    <li><a href=\"http://www.flyaway.tn/\" title=\"Flyaway\" target=\"_blank\"><img src=\"";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/fly.png"), "html", null, true);
        echo "\" alt=\"flyaway\" /></a></li>
                    <li><a href=\"http://www.goldentulipelmechtel.com/fr\" title=\"Golden Tulip\" target=\"_blank\"><img src=\"";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/golden.png"), "html", null, true);
        echo "\" alt=\"golden Tulip\" /></a></li>
                    <li><a href=\"http://www.tunisie-express.com.tn/\" title=\"Tunisia Express\" target=\"_blank\"><img src=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/tunisia_express.png"), "html", null, true);
        echo "\" alt=\"Tunisia Express\" /></a></li>
                    <li><a href=\"http://tn.tunisiebooking.com/\" title=\"Tunisie Booking\" target=\"_blank\"><img src=\"";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/tunisiebooking.png"), "html", null, true);
        echo "\" alt=\"Luxtech\" /></a></li>
                    <li><a href=\"http://www.radiomfm.tn/fr/\" title=\"Radio FM\" target=\"_blank\"><img src=\"";
        // line 236
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/kalamfm.png"), "html", null, true);
        echo "\" alt=\"Radio FM\" /></a></li>

                    <li><a href=\"http://www.flyaway.tn/\" title=\"Flyaway\" target=\"_blank\"><img src=\"";
        // line 238
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/fly.png"), "html", null, true);
        echo "\" alt=\"flyaway\" /></a></li>
                    <li><a href=\"http://www.goldentulipelmechtel.com/fr\" title=\"Golden Tulip\" target=\"_blank\"><img src=\"";
        // line 239
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/golden.png"), "html", null, true);
        echo "\" alt=\"Golden Tulip\" /></a></li>
                    <li><a href=\"http://www.tunisie-express.com.tn/\" title=\"Tunisia Express\" target=\"_blank\"><img src=\"";
        // line 240
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/tunisia_express.png"), "html", null, true);
        echo "\" alt=\"Tunisia Express\" /></a></li>
                    <li><a href=\"//tn.tunisiebooking.com/\" title=\"Tunisie Booking\" target=\"_blank\"><img src=\"";
        // line 241
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/tunisiebooking.png"), "html", null, true);
        echo "\" alt=\"Luxtech\" /></a></li>
                    <li><a href=\"http://www.radiomfm.tn/fr/\" title=\"Radio FM\" target=\"_blank\"><img src=\"";
        // line 242
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/kalamfm.png"), "html", null, true);
        echo "\" alt=\"Radio FM\" /></a></li>
                    <li><a href=\"http://www.flyaway.tn/\" title=\"Flyaway\" target=\"_blank\"><img src=\"";
        // line 243
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/fly.png"), "html", null, true);
        echo "\" alt=\"flyaway\" /></a></li>
                </ul>
            </div>
        </div>



    </div>

";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  649 => 243,  645 => 242,  641 => 241,  637 => 240,  633 => 239,  629 => 238,  624 => 236,  620 => 235,  616 => 234,  612 => 233,  608 => 232,  593 => 220,  586 => 215,  572 => 214,  564 => 212,  561 => 211,  544 => 210,  537 => 205,  523 => 204,  520 => 203,  518 => 202,  512 => 201,  509 => 200,  506 => 199,  489 => 198,  485 => 196,  482 => 195,  479 => 194,  476 => 193,  473 => 192,  470 => 191,  468 => 190,  461 => 185,  450 => 183,  446 => 182,  432 => 171,  428 => 169,  414 => 168,  410 => 167,  402 => 162,  397 => 160,  392 => 158,  383 => 155,  381 => 154,  369 => 151,  363 => 150,  354 => 148,  351 => 147,  348 => 146,  345 => 145,  342 => 144,  339 => 143,  336 => 142,  333 => 141,  316 => 140,  313 => 139,  299 => 127,  285 => 126,  274 => 118,  269 => 116,  263 => 115,  259 => 113,  257 => 112,  245 => 109,  239 => 108,  229 => 103,  222 => 102,  219 => 101,  216 => 100,  213 => 99,  210 => 98,  207 => 97,  204 => 96,  187 => 95,  183 => 93,  180 => 92,  177 => 91,  173 => 89,  170 => 88,  168 => 87,  165 => 86,  162 => 85,  156 => 84,  147 => 81,  141 => 79,  136 => 78,  131 => 77,  128 => 76,  82 => 34,  76 => 31,  68 => 27,  65 => 26,  42 => 8,  39 => 7,  34 => 5,  31 => 4,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* */
/* */
/* {% block head %}*/
/* */
/* {% endblock %}*/
/* {% block stylesheets %}*/
/* <link rel="stylesheet" href="{{ asset('public/css/enjoyhint/enjoyhint.css') }}">*/
/* <style>*/
/* 	.mySkip, .myNext, .mySkip:focus, .myNext:focus {*/
/* 		color: white;*/
/* 		border-color: #de0e79;*/
/* 		border-radius: 0;*/
/* 		margin-top: 50px;*/
/* 	}*/
/* 	/*.enjoyhint_close_btn {display: none;}*/
/* 	*//* */
/* 	.mySkip, .mySkip:hover, .mySkip:focus {*/
/* 		background: transparent;*/
/* 	}*/
/* 	.myNext, .myNext:hover, .myNext:focus {*/
/* 		background: #de0e79;*/
/* 	}*/
/* </style>*/
/* {% endblock %}*/
/* {% block javascripts %}*/
/* 	<script src="{{ asset('public/js/jquery-ias.min.js') }}"></script>*/
/* <script>*/
/* var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);*/
/* if (w > 767) {*/
/*   document.write('<script type="text/javascript" src="{{ asset('public/css/enjoyhint/enjoyhint.min.js') }}"><\/script>');*/
/* }*/
/* if (w > 767) {*/
/*   document.write('<script type="text/javascript" src="{{ asset('public/css/enjoyhint/main.js') }}"><\/script>');*/
/* }*/
/* */
/* </script>*/
/* */
/* */
/*     <script>*/
/*         $(function () {*/
/*             $('.carousel').carousel();*/
/*         });*/
/* */
/*         $(window).load(function(){*/
/*             $('.flexslider').flexslider({*/
/*                 animation: "slide",*/
/*                 animationLoop: true,*/
/*                 controlNav: false,*/
/*                 itemWidth: 67,*/
/*                 itemMargin: 5,*/
/*                 minItems: 2,*/
/*                 maxItems: 6*/
/*             });*/
/*         });*/
/*        $(document).ready(function () {*/
/* 		var ias = $.ias({*/
/* 		  container:  ".ddcontainer",*/
/* 		  item:       ".dditem",*/
/* 		  pagination: ".pagination",*/
/* 		  next:       ".next a",*/
/* 		  delay:      1250  */
/* 		});*/
/* */
/* 		//ias.extension(new IASSpinnerExtension());            // shows a spinner (a.k.a. loader)*/
/* 		ias.extension(new IASSpinnerExtension({src: '/public/images/loading.gif' }));*/
/* 		//ias.extension(new IASTriggerExtension({})); // shows a trigger after page 3*/
/* 		ias.extension(new IASTriggerExtension({html: '<div class="ias-trigger ias-trigger-next" style="text-align: center; cursor: pointer;"><a class="btn btn-primary">Afficher plus</a></div>', offset: 4})); // override text show more*/
/* 		*/
/* 		/*ias.extension(new IASNoneLeftExtension({*/
/* 		  text: 'Plus aucun deal à afficher'      // override text when no pages left*/
/* 		}));*//* */
/* 	});*/
/*     </script>*/
/* {% endblock %}*/
/* {% block body %}*/
/*     {% for type, flashMessages in app.session.flashbag.all() %}*/
/*         {% for flashMessage in flashMessages %}*/
/*             <div class="alert {{ type }} alert-subscribe">*/
/*                 <button data-dismiss="alert" class="close" type="button">×</button>*/
/*                 {{ flashMessage|trans }}*/
/*             </div>*/
/*         {% endfor %}*/
/*     {% endfor %}*/
/*     {% if slider|length>0 %}*/
/*     <div id="home-carousel" class="carousel slide" data-ride="carousel">*/
/*         {% if app.session.get('region')!="" %}*/
/*             {% set defaultregion= app.session.get('region') %}*/
/* */
/*             {% else %}*/
/*                 {% set defaultregion= "Grand tunis" %}*/
/*             {% endif %}*/
/*                 <!-- Wrapper for slides -->*/
/*         <div class="carousel-inner" role="listbox">*/
/*             {% for item in slider %}*/
/*                 {% if item.seoTitle %}*/
/*                 {% set permelink = item.seoTitle %}*/
/*                 {% else %}*/
/*                 {% set permelink = item.title %}*/
/*                 {%endif%}*/
/*             {% if item.planning.defaultannexe.reference|length>0 %}*/
/*             <div class="item{% if loop.index==1 %} active{% endif %}">*/
/*                 <a href="{{ path('deal_detail',  {'region':(item.planning.regionId|getAlias),'categorie':(item.planning.categoryId|getAlias), 'id': item.id ,'name':(permelink|getAlias)}) }}"><img src="{{ asset(item.image4| imagine_filter('jcarouselhome')) }}" alt="slideshow" /></a>*/
/*                 <div class="carousel-caption desc">*/
/* */
/*                     <div class="">*/
/*                         <div class="col-sm-6 pull-left">*/
/* 							<p><a href="{{ path('deal_detail',  {'region':(item.planning.regionId|getAlias),'categorie':(item.planning.categoryId|getAlias), 'id': item.id ,'name':(permelink|getAlias)}) }}" title="" >{{ item.title }}</a></p>*/
/* 							<p><i class="fa fa-tags teal"></i><span class="gray">{% if item.planning.defaultannexe.protocol.user.sellingpoint[0].visible == 1 %}{{item.planning.defaultannexe.protocol.user.sellingpoint[0].visibleAdress}}{% else %}{{ item.planning.defaultannexe.protocol.user.sellingpoint[0].name }}{% endif %}  </span> <i class="fa fa-map-marker teal"></i><span class="gray">{{ item.planning.regionId }}</span></p>*/
/* */
/*                         </div>*/
/*                         {% set ref=item.planning.defaultannexe.reference[0] %}*/
/*                         <div class="pull-right">*/
/*                             <div class="teal bold pull-left">*/
/*                                 <div class="btn btn-white">{{ ref.bigdealPrice }}<sup>DT</sup><span class="bottom gray"> {{ ref.shopPrice }}<sup>DT</sup></span></div>*/
/*                                 <div class="btn btn-white">{{ ref.bigdealPrice|getBigfid }} <i class="flaticon-computerchip"></i></div>*/
/*                             </div>*/
/*                             <a href="{{ path('deal_detail', {'region':(item.planning.regionId|getAlias),'categorie':(item.planning.categoryId|getAlias), 'id': item.id ,'name':(permelink|getAlias)}) }}" class="btn pull-right">Voir le Deal</a>*/
/*                         </div>*/
/*                     </div>*/
/* */
/* */
/*                 </div>*/
/*             </div>*/
/*                 {% endif %}*/
/*             {% endfor %}*/
/*         </div>*/
/*         <!-- Controls -->*/
/*         <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">*/
/*             <span class="fa fa-angle-left" aria-hidden="true"></span>*/
/*             <span class="sr-only">Previous</span>*/
/*         </a>*/
/*         <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">*/
/*             <span class="fa fa-angle-right" aria-hidden="true"></span>*/
/*             <span class="sr-only">Next</span>*/
/*         </a>*/
/*     </div>*/
/* {% endif %}*/
/*     <div id="shows" class="row ddcontainer">*/
/*     {% for item in deal %}*/
/*                 {% if item.seoTitle %}*/
/*                 {% set permelink = item.seoTitle %}*/
/*                 {% else %}*/
/*                 {% set permelink = item.title %}*/
/*                 {%endif%}*/
/*         {% set link=path('deal_detail',  {'region':(item.planning.regionId|getAlias),'categorie':(item.planning.categoryId|getAlias), 'id': item.id ,'name':(permelink|getAlias)}) %}*/
/*         <div class="col-md-6 show dditem">*/
/*             <a href="{{ link }}"><img src="{{ asset(item.image1| imagine_filter('homedeal')) }}" class="img-responsive" alt="{{ item.title }}" /></a>*/
/*             <div class="details">*/
/* 				<p class="dealTitle"><a href="{{ link }}">{{ item.title }}</a></p>*/
/* 				<p><i class="fa fa-tags teal"></i><span class="dark-gray nomPart">{% if item.planning.defaultannexe.protocol.user.sellingpoint[0].visible == 1 %}{{item.planning.defaultannexe.protocol.user.sellingpoint[0].visibleAdress}}{% else %}{{ item.planning.defaultannexe.protocol.user.sellingpoint[0].name }}{% endif %}</span>  <i class="fa fa-map-marker teal"></i><span class="dark-gray nomReg">{{ item.planning.regionId }}</span></p>*/
/* */
/*                 <div class="row">*/
/* 	                <div class="teal bold col-md-3 col-sm-3 col-xs-4 border">{% set ref=item.planning.defaultannexe.reference[0] %}*/
/* 	                    {{ ref.bigdealPrice }}<sup>DT</sup><span class="bottom dark-gray"> {{ ref.shopPrice }}<sup>DT</sup></span>*/
/* 	                </div>*/
/* 					<div class="teal bold col-md-3 col-sm-3 col-xs-3 BigfidPrice">*/
/* 	                	{{ ref.bigdealPrice|getBigfid }} <i class="flaticon-computerchip"></i>*/
/* 	                </div>*/
/* 					<div class="teal bold col-md-2 col-sm-2 col-xs-3">{{ item.id|nombreAcheteurs }} <i class="flaticon-group2"></i></div>*/
/* 	                <div class="col-md-4 col-xs-2 linkDetail">*/
/*                 		<a href="{{ link }}" class="btn"><i class="fa fa-arrow-circle-right hidden-md hidden-sm"></i><span class="hidden-xs">Voir le Deal</span></a>*/
/*                 	</div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         {% if loop.index%2==0 %}<div class="clearfix"></div>{% endif %}*/
/*         {% endfor %}*/
/* <div class="row col-sm-12">*/
/*             <div class="pagination col-sm-12" style="text-align: center">*/
/*                 {{ knp_pagination_render(pagination) }}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <!-- Links -->*/
/*     <div id="links" class="row">*/
/*         <!-- Script GetResponse popup inscription newsletter -->*/
/*         <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/*         <div class="col-md-3 dealJour">*/
/*             <h3>Deals du jour</h3>*/
/*             <ul class="social">*/
/*                 {% for item in category %}*/
/*                 <li><a href="{{ path('deal_list',{'region':(defaultregion|getAlias),'id':item.id,'name':(item.name|getAlias)}) }}">{{ item.name }}</a></li>*/
/*                     {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*         <div class="col-md-3">*/
/*             <h3>Villes et Regions</h3>*/
/*             <div class="row">*/
/*                 {% if (region|length%2)==1 %}*/
/*                 {% set demi=(region|length/2)+1 %}*/
/*                     {% else %}*/
/*                         {% set demi=(region|length/2) %}*/
/*                         {% endif %}*/
/*                 {% set counter=0 %}*/
/*                 <div class="col-md-6">*/
/*                     <ul>*/
/*                         {% for item in region %}*/
/*                             {% if demi >= loop.index %}*/
/*                         <li>*/
/* <a href="{{ path('deal_list_region',{'id':item.id,'name':(item.name|getAlias)}) }}">{{ item.name }}</a></li>*/
/*                                 {% set counter=loop.index %}*/
/*                                 {% endif %}*/
/*                             {% endfor %}*/
/* */
/*                     </ul>*/
/*                 </div>*/
/*                 <div class="col-md-6">*/
/*                     <ul>*/
/*                         {% for item in region %}*/
/*                             {% if counter < loop.index %}*/
/*                                 <li><a href="{{ path('deal_list_region',{'id':item.id,'name':(item.name|getAlias)}) }}">{{ item.name }}</a></li>*/
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                     </ul>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <div class="col-md-6 col-sm-12 col-xs-12">*/
/*             {{  render(controller('MainFrontBundle:Default:banner', { 'type': 2 })) }}*/
/*         </div>*/
/* */
/*     </div>*/
/*     <div class="row">*/
/*         <div class="col-md-2 col-sm-12">*/
/*             <div class="col-sm-12 hand text-center"><i class="flaticon-agreement""></i></div>*/
/*         </div>*/
/* */
/*         <div id="slider2" class="col-md-10 col-sm-10">*/
/*             <div class="flexslider carousel">*/
/*                 <ul class="slides">*/
/*                     <li><a href="http://www.flyaway.tn/" title="Flyaway" target="_blank"><img src="{{ asset('public/images/fly.png') }}" alt="flyaway" /></a></li>*/
/*                     <li><a href="http://www.goldentulipelmechtel.com/fr" title="Golden Tulip" target="_blank"><img src="{{ asset('public/images/golden.png') }}" alt="golden Tulip" /></a></li>*/
/*                     <li><a href="http://www.tunisie-express.com.tn/" title="Tunisia Express" target="_blank"><img src="{{ asset('public/images/tunisia_express.png') }}" alt="Tunisia Express" /></a></li>*/
/*                     <li><a href="http://tn.tunisiebooking.com/" title="Tunisie Booking" target="_blank"><img src="{{ asset('public/images/tunisiebooking.png') }}" alt="Luxtech" /></a></li>*/
/*                     <li><a href="http://www.radiomfm.tn/fr/" title="Radio FM" target="_blank"><img src="{{ asset('public/images/kalamfm.png') }}" alt="Radio FM" /></a></li>*/
/* */
/*                     <li><a href="http://www.flyaway.tn/" title="Flyaway" target="_blank"><img src="{{ asset('public/images/fly.png') }}" alt="flyaway" /></a></li>*/
/*                     <li><a href="http://www.goldentulipelmechtel.com/fr" title="Golden Tulip" target="_blank"><img src="{{ asset('public/images/golden.png') }}" alt="Golden Tulip" /></a></li>*/
/*                     <li><a href="http://www.tunisie-express.com.tn/" title="Tunisia Express" target="_blank"><img src="{{ asset('public/images/tunisia_express.png') }}" alt="Tunisia Express" /></a></li>*/
/*                     <li><a href="//tn.tunisiebooking.com/" title="Tunisie Booking" target="_blank"><img src="{{ asset('public/images/tunisiebooking.png') }}" alt="Luxtech" /></a></li>*/
/*                     <li><a href="http://www.radiomfm.tn/fr/" title="Radio FM" target="_blank"><img src="{{ asset('public/images/kalamfm.png') }}" alt="Radio FM" /></a></li>*/
/*                     <li><a href="http://www.flyaway.tn/" title="Flyaway" target="_blank"><img src="{{ asset('public/images/fly.png') }}" alt="flyaway" /></a></li>*/
/*                 </ul>*/
/*             </div>*/
/*         </div>*/
/* */
/* */
/* */
/*     </div>*/
/* */
/* {% endblock %}*/
