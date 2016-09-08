<?php

/* MainFrontBundle:Deal:index.html.twig */
class __TwigTemplate_6252833e648fc8804625e58c55e2d6ae11fffd4cdf64345d494cb7b9a417b363 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "MainFrontBundle:Deal:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        if ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoTitle", array())) {
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoTitle", array()), "html", null, true);
            echo "
";
        } else {
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getPourcentageFilter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "reference", array()), 0, array(), "array"), "shopPrice", array()), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "reference", array()), 0, array(), "array"), "bigdealPrice", array())), "html", null, true);
            echo " % de remise chez 
";
            // line 7
            $context["pointVente"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array());
            echo " 
";
            // line 8
            if ((twig_length_filter($this->env, (isset($context["pointVente"]) ? $context["pointVente"] : null)) != 0)) {
                // line 9
                if (($this->getAttribute($this->getAttribute((isset($context["pointVente"]) ? $context["pointVente"] : null), 0, array(), "array"), "visible", array()) == 0)) {
                    // line 10
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["pointVente"]) ? $context["pointVente"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 11
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                        echo "
";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                } else {
                    // line 14
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pointVente"]) ? $context["pointVente"] : null), 0, array(), "array"), "visibleAdress", array()), "html", null, true);
                    echo "
";
                }
            }
            // line 17
            echo "| BIGDeal Tunisie
";
        }
        // line 19
        echo "
";
    }

    // line 22
    public function block_description($context, array $blocks = array())
    {
        if ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoDescription", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoDescription", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array()), "html", null, true);
        }
    }

    // line 24
    public function block_head($context, array $blocks = array())
    {
        // line 25
        echo "<meta property=\"og:site_name\" content=\"BIGDeal\"/>
<meta property=\"og:type\" content=\"website\"/>
<meta property=\"og:image\" content=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()), "facebook_share")), array(" " => "%20")), "html", null, true);
        echo "\"/>

<meta property=\"og:url\" 
content=\"";
        // line 30
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "getSchemeAndHttpHost", array(), "method") . $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"))), "html", null, true);
        echo "\"/>
";
        // line 31
        if ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoTitle", array())) {
            // line 32
            echo "<meta property=\"og:title\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoTitle", array()), "html", null, true);
            echo "\"/>
";
        } else {
            // line 34
            echo "<meta property=\"og:title\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array()), "html", null, true);
            echo "\"/>
";
        }
        // line 36
        if ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoDescription", array())) {
            // line 37
            echo "<meta property=\"og:description\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoDescription", array()), "html", null, true);
            echo "\"/>
";
        } else {
            // line 40
            echo "<meta property=\"og:description\" content=\"";
            echo strip_tags($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "deal", array()), "<b>");
            echo "\"/>
";
        }
        // line 43
        echo "
";
    }

    // line 46
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 47
        echo "<!-- BxSlider -->
<link rel=\"stylesheet\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/jquery.bxslider.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/dcsrating/css/rating.css"), "html", null, true);
        echo "\"/>
<link rel=\"stylesheet\" href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/enjoyhint.css"), "html", null, true);
        echo "\">
<style>
  .fa {
    color: #de0e79;
    font-size: 1.3em;

  }

  .modal-open .modal {
    z-index: 10000;
  }

  .mySkip, .myNext, .mySkip:focus, .myNext:focus {
    color: white;
    border-color: #de0e79;
    border-radius: 0;
    margin-top: 10px;
  }


  .mySkip, .mySkip:hover, .mySkip:focus {
    background: transparent;
  }

  .myNext, .myNext:hover, .myNext:focus {
    background: #de0e79;
  }

  .enjoy_hint_label {
    margin-top: -11px;
  }
</style>

";
    }

    // line 84
    public function block_javascripts($context, array $blocks = array())
    {
        // line 85
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b35a613_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b35a613_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b35a613_jquery.jscroll.min_1.js");
            // line 86
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "b35a613"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b35a613") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b35a613.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 88
        echo "<script type=\"text/javascript\">
  \$(document).ready(function () {
    \$('.alert-success').delay(5000).fadeOut();
  });
  \$(document).ready(function () {
    \$('.alert-error').delay(5000).fadeOut();
  });
  \$(document).ready(function () {
    \$('#comment').jscroll({
      loadingHtml: '<div class=\"row\"><div class=\"col-md-12 col-sm-12\"><div id=\"loading\"><img src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/loading.gif"), "html", null, true);
        echo "\" alt=\"Loader\"></div></div></div>',
      nextSelector: '.last a'

    });
    \$('#shwos2').jscroll({
      loadingHtml: '<div class=\"row\"><div class=\"col-md-12 col-sm-12\"><div id=\"loading\"><img src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/loading.gif"), "html", null, true);
        echo "\" alt=\"Loader\"></div></div></div>',
      nextSelector: '.last2 a'

    });
    \$('.bxslider').bxSlider({
      pagerCustom: '#bx-pager'
    });
            /*
             \$(\"#price-hover\").hover(function(){
             \$(\".price-big\").css(\"opacity\", \"1.0\");
             }, function(){
             \$(\".price-big\").css(\"opacity\", \"0.0\");
           });  */

           \$('[data-toggle=\"tooltip\"]').tooltip();
         })

       </script>
       <!-- BxSlider JS -->
       <script src=\"";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery.bxslider.js"), "html", null, true);
        echo "\"></script>

       ";
        // line 123
        $context["sellingpoint"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array());
        // line 124
        echo "       ";
        if ((twig_length_filter($this->env, (isset($context["sellingpoint"]) ? $context["sellingpoint"] : null)) > 0)) {
            // line 125
            echo "
       <script type=\"text/javascript\">


        function initialize() {
          ";
            // line 130
            if ($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "visible", array())) {
                // line 131
                echo "          var myLatlng = new google.maps.LatLng(";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "latVisibleAdress", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "lonVisibleAdress", array()), "html", null, true);
                echo ");
          ";
            } else {
                // line 133
                echo "          var myLatlng = new google.maps.LatLng(";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "latitude", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "longitude", array()), "html", null, true);
                echo ");
          ";
            }
            // line 135
            echo "          var mapOptions = {
            ";
            // line 136
            if ($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "visible", array())) {
                // line 137
                echo "            center: {
              lat:";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "latVisibleAdress", array()), "html", null, true);
                echo ",
              lng: ";
                // line 139
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "lonVisibleAdress", array()), "html", null, true);
                echo "
            }, ";
            } else {
                // line 141
                echo "            center: {
              lat:";
                // line 142
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "latitude", array()), "html", null, true);
                echo ",
              lng: ";
                // line 143
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "longitude", array()), "html", null, true);
                echo "
            }, ";
            }
            // line 145
            echo "            zoom: 16
          }
          ;
          var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
          ";
            // line 150
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 151
                echo "          ";
                if ($this->getAttribute($context["item"], "visible", array())) {
                    // line 152
                    echo "          var mypoint";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                    echo " = new google.maps.LatLng(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "latVisibleAdress", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "lonVisibleAdress", array()), "html", null, true);
                    echo ");
          ";
                } else {
                    // line 154
                    echo "          var mypoint";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                    echo " = new google.maps.LatLng(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "latitude", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "longitude", array()), "html", null, true);
                    echo ");
          ";
                }
                // line 156
                echo "          var marker = new google.maps.Marker({
            position: mypoint";
                // line 157
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo ",
            map: map,
            title: '";
                // line 159
                if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "visible", array()) == 1)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array()), 0, array(), "array"), "visibleAdress", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "html", null, true);
                }
                echo "'
          });
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 162
            echo "        }

        google.maps.event.addDomListener(window, 'load', initialize);</script>
        ";
        }
        // line 166
        echo "


        <script src=\"";
        // line 169
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/dcsrating/js/rating.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery.countdown.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>

        <script type=\"text/javascript\">
          var ts = new Date(";
        // line 173
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "endDate", array()), "Y"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "endDate", array()), "m"), "html", null, true);
        echo "-1, ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "endDate", array()), "d"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "endDate", array()), "H"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "endDate", array()), "i"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "endDate", array()), "s"), "html", null, true);
        echo ");</script>
          <script src=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/scriptcounter.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
          ";
        // line 175
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a71c3ad_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a71c3ad_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/a71c3ad_bootstrap-rating-input.min_1.js");
            // line 176
            echo "          <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
          ";
        } else {
            // asset "a71c3ad"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a71c3ad") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/a71c3ad.js");
            echo "          <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
          ";
        }
        unset($context["asset_url"]);
        // line 178
        echo "          <script>
            \$(document).ready(function () {
              \$('#back_dealbundle_comment_value').rating();
              \$('.starss').rating(\"refresh\", {disabled: true, showClear: false});
            });
          </script>
          <script>
            var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            if (w > 767) {
              document.write('<script type=\"text/javascript\" src=\"";
        // line 187
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/enjoyhint.min.js"), "html", null, true);
        echo "\"><\\/script>');
            }
            if (w > 767) {
              document.write('<script type=\"text/javascript\" src=\"";
        // line 190
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/main2.js"), "html", null, true);
        echo "\"><\\/script>');
            }

          </script>   


          ";
    }

    // line 199
    public function block_body($context, array $blocks = array())
    {
        // line 200
        echo "          ";
        if ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoTitle", array())) {
            // line 201
            echo "          ";
            $context["permelink"] = $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "seoTitle", array());
            // line 202
            echo "          ";
        } else {
            // line 203
            echo "          ";
            $context["permelink"] = $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array());
            // line 204
            echo "          ";
        }
        // line 205
        echo "          ";
        $context["urlFacebook"] = ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "categoryId", array())), "id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null)))));
        // line 206
        echo "          ";
        if ((isset($context["curentUser"]) ? $context["curentUser"] : null)) {
            // line 207
            echo "
          ";
            // line 208
            $context["urlFacebook"] = ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "categoryId", array())), "id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null))))) . "?user=") . (isset($context["curentUser"]) ? $context["curentUser"] : null));
            // line 209
            echo "
          ";
        }
        // line 211
        echo "          ";
        // line 212
        echo "          ";
        // line 213
        echo "          ";
        // line 214
        echo "          ";
        // line 215
        echo "          ";
        $context["ref"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "reference", array());
        // line 216
        echo "          ";
        $context["reservation"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), 0, array(), "array"), "annexe", array()), "booking", array());
        // line 217
        echo "          ";
        $context["CouponConsomer"] = $this->env->getExtension('twig_extension')->listCouponConsomer($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()));
        // line 218
        echo "          ";
        $context["indexref"] = 0;
        // line 219
        echo "          ";
        $context["i"] = 0;
        // line 220
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ref"]) ? $context["ref"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 221
            echo "
          ";
            // line 222
            if (((isset($context["i"]) ? $context["i"] : null) != 0)) {
                // line 223
                echo "          ";
                if (($this->getAttribute($context["item"], "bigdealPrice", array()) < $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), 0, array(), "array"), "bigdealPrice", array()))) {
                    // line 224
                    echo "          ";
                    $context["indexref"] = $context["key"];
                    // line 225
                    echo "          ";
                }
                // line 226
                echo "          ";
            }
            // line 227
            echo "          ";
            $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
            // line 228
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 229
        echo "
          <div class=\"row\" itemscope itemtype=\"http://schema.org/Product\">
            <div class=\"col-md-12 entry\" itemprop=\"name\"><h1>";
        // line 231
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array()), "html", null, true);
        echo "</h1></div>
          </div>

          <!-- Shows -->
          <div id=\"offre\" class=\"row\">

            <div class=\"col-md-9 col-sm-12 product pull-right\">
              <ul class=\"bxslider\">
                ";
        // line 239
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()) != "")) {
            // line 240
            echo "                <li><img
                  src=\"";
            // line 241
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()), "sliddetaildeal")), "html", null, true);
            echo "\"
                  id=\"image1\"></li>";
        }
        // line 243
        echo "                  ";
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image2", array()) != "")) {
            // line 244
            echo "                  <li><img
                    src=\"";
            // line 245
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image2", array()), "sliddetaildeal")), "html", null, true);
            echo "\"
                    id=\"image2\"></li>";
        }
        // line 247
        echo "                    ";
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image3", array()) != "")) {
            // line 248
            echo "                    <li><img
                      src=\"";
            // line 249
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image3", array()), "sliddetaildeal")), "html", null, true);
            echo "\"
                      id=\"image3\"></li>";
        }
        // line 251
        echo "                    </ul>

                    <ul class=\"row\" id=\"bx-pager\">
                      <div class=\"col-md-offset-2 col-md-10 col-sm-12\">
                        <div class=\"row\">
                          ";
        // line 256
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()) != "")) {
            // line 257
            echo "                          <li class=\"col-xs-4 col-md-3\">
                            <a data-slide-index=\"0\" href=\"\"><img
                              src=\"";
            // line 259
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()), "thumbdetaildeal")), "html", null, true);
            echo "\"
                              class=\"img-responsive \"></a></li>";
        }
        // line 261
        echo "
                              ";
        // line 262
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image2", array()) != "")) {
            // line 263
            echo "                              <li class=\"col-xs-4 col-md-3\"><a data-slide-index=\"1\"
                               href=\"\"><img
                               src=\"";
            // line 265
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image2", array()), "thumbdetaildeal")), "html", null, true);
            echo "\"
                               class=\"img-responsive \"></a></li>";
        }
        // line 267
        echo "                               ";
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image3", array()) != "")) {
            // line 268
            echo "                               <li class=\"col-xs-4 col-md-3\"><a data-slide-index=\"2\"
                                 href=\"\"><img
                                 src=\"";
            // line 270
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image3", array()), "thumbdetaildeal")), "html", null, true);
            echo "\"
                                 class=\"img-responsive \"></a></li>";
        }
        // line 272
        echo "                               </div>
                             </div>
                           </ul>
                         </div>

                         <div class=\"col-md-3 col-sm-12 product-det\">
                          <div class=\"detailPrice\">
                            <div class=\"row\">
                              <div class=\"col-sm-12\">";
        // line 280
        if ((twig_length_filter($this->env, (isset($context["ref"]) ? $context["ref"] : null)) > 1)) {
            echo "<p class=\"dark-gray bold\">Dès</p>";
        }
        echo "</div>
                              <div class=\"col-md-9 col-sm-9 col-xs-12 text-center\">
                                ";
        // line 287
        echo "                              </div>
                            </div>
                            <div class=\"row price\">
                              <div class=\"col-sm-12 text-center\" itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
                                <strong id=\"price-hover\" data-html=\"true\"
                                data-toggle=\"tooltip\"
                                title=\"<p class='dark-gray bold'>";
        // line 293
        echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getBigfidFilter($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "bigdealPrice", array())), "html", null, true);
        echo " <i class='flaticon-computerchip'></i></p><p class='teal'>IGFid</p>\"  itemprop=\"price\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "bigdealPrice", array()), "html", null, true);
        echo "
                                <sup>DT</sup></strong>
                              </div>
                            </div>
                            <div class=\"row details\">
                              <div class=\"col-md-4 col-sm-4 col-xs-4 valeur\">
                                <p class=\"dark-gray \">Valeur</p>
                                <strong class=\"dark-gray \">";
        // line 300
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "shopPrice", array()), "html", null, true);
        echo "
                                  <sup>DT</sup></strong>
                                </div>
                                <div class=\"col-md-4 col-sm-4 col-xs-4 remise\">
                                  <p class=\"dark-gray \">Remise</p>
                                  <strong class=\"dark-gray bold\">";
        // line 305
        echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getPourcentageFilter($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "shopPrice", array()), $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "bigdealPrice", array())), "html", null, true);
        echo "
                                    %</strong>
                                  </div>
                                  <div class=\"col-md-4 col-sm-4 col-xs-4 economie\">
                                    <p class=\"dark-gray \">économie</p>
                                    <strong class=\"dark-gray bold\">";
        // line 310
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "shopPrice", array()) - $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "bigdealPrice", array())), "html", null, true);
        echo "
                                      <sup>DT</sup></strong>
                                    </div>

                                  </div>
                                </div>
                                <div class=\"row buy\">
                                  <div class=\"col-md-12\">
                                    ";
        // line 318
        if (((isset($context["nbcoupon"]) ? $context["nbcoupon"] : null) < $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()))) {
            // line 319
            echo "                                    ";
            if ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))) {
                // line 320
                echo "                                    <p class=\"hidden-xs\">
                                      <a href=\"javascript:void();\"
                                      class=\"btn btn-teal no-bg\"><i
                                      class=\"fa fa-exclamation-triangle pr-30\"></i>Expiré</a>
                                      <!-- script get response popup deal passé -->
                                      <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3462403\"></script>
                                      ";
            } else {
                // line 327
                echo "
                                      ";
                // line 328
                if ((twig_length_filter($this->env, (isset($context["ref"]) ? $context["ref"] : null)) > 1)) {
                    // line 329
                    echo "                                      <p class=\"hidden-xs\"><a href=\"#\" data-toggle=\"modal\"
                                        data-target=\".add-modal\"
                                        class=\"btn btn-teal\"><i
                                        class=\"flaticon-buy10\"></i>J'achete</a>
                                      </p>
                                      <!-- Script GetResponse detail deal en cours 1-->
                                      <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>
                                      ";
                } else {
                    // line 337
                    echo "                                      ";
                    if (($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) == 0)) {
                        // line 338
                        echo "                                      <p class=\"hidden-xs\">
                                        <a href=\"";
                        // line 339
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                        echo "\"
                                        class=\"btn btn-teal\"><i
                                        class=\"flaticon-buy10\"></i>J'achete</a>
                                      </p>
                                      <!-- Script GetResponse detail deal en cours 2-->
                                      <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>
                                      ";
                    } elseif (($this->getAttribute($this->getAttribute(                    // line 345
(isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) > $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())))) {
                        // line 346
                        echo "                                      <p class=\"hidden-xs\">
                                        <a  href=\"";
                        // line 347
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                        echo "\"
                                        class=\"btn btn-teal\"><i
                                        class=\"flaticon-buy10\"></i>J'achete</a>
                                      </p>
                                      <!-- Script GetResponse detail deal en cours 3-->
                                      <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>
                                      ";
                    } else {
                        // line 354
                        echo "                                      <p class=\"hidden-xs\">
                                        <a href=\"javascript:void();\"
                                        class=\"btn btn-teal no-bg\"><i
                                        class=\"fa fa-cart-arrow-down\"></i>Epuisé</a>
                                      </p>

                                      <p>
                                        ";
                    }
                    // line 362
                    echo "                                        ";
                }
                // line 363
                echo "                                        ";
            }
            // line 364
            echo "                                        ";
            if ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))) {
                // line 365
                echo "                                        ";
            } else {
                // line 366
                echo "
                                        <div class=\"dispoCount\">
                                          <p class=\"dark-gray dispo\">Disponible pour un temps
                                            limité ! </p>

                                            <p class=\"teal\"><i
                                              class=\"flaticon-clock96\"></i> <span
                                              id=\"countdown\"></span></p>
                                            </div>
                                            ";
            }
            // line 376
            echo "                                            ";
        } elseif ((($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()) == 0) && ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())) != 1))) {
            // line 377
            echo "                                            ";
            if ((twig_length_filter($this->env, (isset($context["ref"]) ? $context["ref"] : null)) > 1)) {
                // line 378
                echo "                                            <p class=\"hidden-xs\"><a href=\"#\" data-toggle=\"modal\"
                                              data-target=\".add-modal\"
                                              class=\"btn btn-teal\"><i
                                              class=\"flaticon-buy10\"></i>J'achete</a>
                                            </p>
                                            <!-- Script GetResponse detail deal en cours 4-->
                                            <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>
                                            ";
            } else {
                // line 386
                echo "                                            ";
                if (($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) == 0)) {
                    // line 387
                    echo "                                            <p class=\"hidden-xs\">
                                              <a href=\"";
                    // line 388
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                    echo "\"
                                              class=\"btn btn-teal\"><i
                                              class=\"flaticon-buy10\"></i>J'achete</a>
                                            </p>
                                            <!-- Script GetResponse detail deal en cours 5-->
                                            <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>

                                            ";
                } elseif (($this->getAttribute($this->getAttribute(                // line 395
(isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) > $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())))) {
                    // line 396
                    echo "                                            <p class=\"hidden-xs\">
                                              <a href=\"";
                    // line 397
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                    echo "\"
                                              class=\"btn btn-teal\"><i
                                              class=\"flaticon-buy10\"></i>J'achete</a>
                                            </p>
                                            <!-- Script GetResponse detail deal en cours 6--> 
                                            <script type=\"text/javascript\" src=\"https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903\"></script>
                                            ";
                } else {
                    // line 404
                    echo "                                            <p class=\"hidden-xs\">
                                              <a href=\"javascript:void();\"
                                              class=\"btn btn-teal no-bg\"><i
                                              class=\"fa fa-cart-arrow-down\"></i>Epuisé</a>
                                            </p>


                                            ";
                }
                // line 412
                echo "                                            ";
            }
            // line 413
            echo "                                            <div class=\"dispoCount\">
                                              <p class=\"dark-gray dispo\">Disponible pour un temps
                                                limité !</p>

                                                <p class=\"teal\"><i class=\"flaticon-clock96\"></i> <span
                                                  id=\"countdown\"></span></p>
                                                </div>
                                                ";
        } else {
            // line 421
            echo "                                                <p class=\"hidden-xs\">
                                                  <a href=\"javascript:void();\"
                                                  class=\"btn btn-teal no-bg\"><i
                                                  class=\"fa fa-exclamation-triangle pr-30\"></i>Expiré</a>
                                                </p>
                                                ";
        }
        // line 427
        echo "                                                ";
        if ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))) {
            // line 428
            echo "                                                <p class=\"dark-gray buyers\">
                                                  <i class=\"flaticon-group2\"></i>
                                                  ";
            // line 430
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())), "html", null, true);
            echo " Acheteurs</p>
                                                  ";
        } else {
            // line 432
            echo "                                                  ";
            if (($this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())) >= $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "mincoupon", array()))) {
                // line 433
                echo "                                                  <p class=\"dark-gray buyers\">

                                                    <i class=\"flaticon-group2\"></i>
                                                    ";
                // line 436
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())), "html", null, true);
                echo " Acheteurs
                                                  </p>
                                                  ";
            } else {
                // line 439
                echo "                                                  <!-- small box -->
                                                  <p class=\"dark-gray buyers\">
                                                    <i class=\"flaticon-group2 teal\"></i>
                                                    Encore ";
                // line 442
                echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "mincoupon", array()) - $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))), "html", null, true);
                echo "
                                                    Participant(s) pour VALIDER LE DEAL
                                                  </p>
                                                  ";
            }
            // line 446
            echo "                                                  ";
        }
        // line 447
        echo "                                                  <p>
                                                   <a href=\"https://www.facebook.com/dialog/feed?app_id=831428680266309&link=";
        // line 448
        echo twig_escape_filter($this->env, (isset($context["urlFacebook"]) ? $context["urlFacebook"] : null), "html", null, true);
        echo "&name=";
        echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array()), array("&" => "et")), "html", null, true);
        echo "&caption=bigdeal.tn&picture=";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()), "sliddetaildeal")), "html_attr");
        echo "
                                                   &redirect_uri=";
        // line 449
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()) . $this->env->getExtension('routing')->getPath("deal_detail", array("region" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "regionId", array())), "categorie" => $this->env->getExtension('twig_extension')->getAliasFilter($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "categoryId", array())), "id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "name" => $this->env->getExtension('twig_extension')->getAliasFilter((isset($context["permelink"]) ? $context["permelink"] : null))))), "html", null, true);
        echo "&display=popup\"
                                                   class=\"btn btn-facebook\"><i class=\"fa fa-facebook\"></i>Partagez
                                                   & Gagnez 20 BIGfid</a></p>
                                                   ";
        // line 452
        if (((isset($context["reservation"]) ? $context["reservation"] : null) == 1)) {
            // line 453
            echo "                                                   <p><a target=\"_blank\"
                                                    href=\"";
            // line 454
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("disponibilite", array("id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))), "html", null, true);
            echo "\"
                                                    class=\"btn blue-btn text-center\">Disponibilités</a>
                                                  </p>

                                                  <p><a target=\"_blank\"
                                                    href=\"";
            // line 459
            echo $this->env->getExtension('routing')->getPath("front_booking_step1");
            echo "\"
                                                    class=\"btn green-btn text-center\">Réserver</a></p>
                                                    ";
        }
        // line 462
        echo "                                                  </div>
                                                </div>
                                              </div>
                                              <div class=\"clearfix\"></div>
                                              <div class=\"offre\">
                                                <div class=\"row\">
                                                  <div class=\"col-md-8 col-sm-12 offre-det\">
                                                    ";
        // line 469
        echo $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "description", array());
        echo "



                                                    ";
        // line 473
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "deal", array()) != "")) {
            // line 474
            echo "
                                                    <h3 class=\"titleOffreDet\">Le Deal :</h3>
                                                    <p itemprop=\"description\" itemtype=\"http://schema.org/Product\"> ";
            // line 476
            echo $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "deal", array());
            echo " </p><br/><br/>
                                                    ";
        }
        // line 478
        echo "
                                                    ";
        // line 479
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "bigdeallike", array()) != "")) {
            // line 480
            echo "                                                    <h3>BigDeal.tn aime :</h3>
                                                    ";
            // line 481
            echo $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "bigdeallike", array());
            echo "<br/><br/>
                                                    ";
        }
        // line 483
        echo "                                                    ";
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "youLike", array()) != "")) {
            // line 484
            echo "
                                                    <h3>Vous allez adorer :</h3>
                                                    ";
            // line 486
            echo $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "youLike", array());
            echo "<br/><br/>
                                                    ";
        }
        // line 488
        echo "                                                    ";
        if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "toBeClear", array()) != "")) {
            // line 489
            echo "
                                                    <h3>Conditions du deal :</h3>
                                                    ";
            // line 491
            echo $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "toBeClear", array());
            echo "<br/><br/>
                                                    ";
        }
        // line 493
        echo "


                                                    <h3>
                                                      ";
        // line 497
        $context["pointVente"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array());
        // line 498
        echo "                                                      ";
        if ((twig_length_filter($this->env, (isset($context["pointVente"]) ? $context["pointVente"] : null)) != 0)) {
            // line 499
            echo "
                                                      ";
            // line 500
            if (($this->getAttribute($this->getAttribute((isset($context["pointVente"]) ? $context["pointVente"] : null), 0, array(), "array"), "visible", array()) == 0)) {
                // line 501
                echo "                                                      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["pointVente"]) ? $context["pointVente"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 502
                    echo "                                                      ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo " :<br/>
                                                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 504
                echo "                                                      
                                                      ";
            }
            // line 506
            echo "                                                      ";
        }
        // line 507
        echo "                                                      ";
        echo " 
                                                    </h3>
                                                    ";
        // line 509
        $context["pointVente"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array());
        // line 510
        echo "                                                    ";
        $context["categ"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "category", array());
        // line 511
        echo "                                                    ";
        if ((twig_length_filter($this->env, (isset($context["pointVente"]) ? $context["pointVente"] : null)) != 0)) {
            // line 512
            echo "
                                                    ";
            // line 513
            if (($this->getAttribute($this->getAttribute((isset($context["pointVente"]) ? $context["pointVente"] : null), 0, array(), "array"), "visible", array()) == 0)) {
                // line 514
                echo "                                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["pointVente"]) ? $context["pointVente"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 515
                    echo "
                                                    ";
                    // line 516
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo " est proposé dans la catégorie deal ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categ"]) ? $context["categ"] : null), "name", array()), "html", null, true);
                    echo " à ";
                    if ($this->getAttribute($context["item"], "localite", array())) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "name", array()), "html", null, true);
                        echo " ";
                    }
                    echo " </br></br>
                                                    ";
                    // line 517
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo " est un marchand exclusif de BIGDeal</br>
                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 519
                echo "
                                                    ";
            }
            // line 521
            echo "                                                    ";
        }
        echo "</br>


                                                    ";
        // line 524
        echo " 



                                                    ";
        // line 528
        echo $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "strongpoint", array());
        echo "



                                                    <!-- bloc adsense -->
                                                        <!-- <div class=\"top hidden-xs\"> 
                                                            <script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
                                                            
                                                            <ins class=\"adsbygoogle\"
                                                                 style=\"display:inline-block;width:468px;height:60px\"
                                                                 data-ad-client=\"ca-pub-4502360515267224\"
                                                                 data-ad-slot=\"1040065191\"></ins>
                                                            <script>
                                                            (adsbygoogle = window.adsbygoogle || []).push({});
                                                            </script>
                                                            
                                                          </div> -->
                                                          <!-- end bloc adsense -->
                                                        </div>
                                                        <div class=\"col-md-4 offre-location\" itemprop=\"brand\" itemscope itemtype=\"http://schema.org/Organization\">
                                                          <h2 itemprop=\"name\">
                                                           ";
        // line 549
        $context["pointVente"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array());
        // line 550
        echo "                                                           ";
        if ((twig_length_filter($this->env, (isset($context["pointVente"]) ? $context["pointVente"] : null)) != 0)) {
            // line 551
            echo "
                                                           ";
            // line 552
            if (($this->getAttribute($this->getAttribute((isset($context["pointVente"]) ? $context["pointVente"] : null), 0, array(), "array"), "visible", array()) == 0)) {
                // line 553
                echo "                                                           ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["pointVente"]) ? $context["pointVente"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 554
                    echo "                                                           ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo "<br/>
                                                           ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 556
                echo "                                                           ";
            } else {
                // line 557
                echo "                                                           ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pointVente"]) ? $context["pointVente"] : null), 0, array(), "array"), "visibleAdress", array()), "html", null, true);
                echo "
                                                           ";
            }
            // line 559
            echo "                                                           ";
        }
        // line 560
        echo "                                                           ";
        // line 561
        echo "
                                                         </h2>
                                                         ";
        // line 563
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "webSite", array()) != "")) {
            // line 564
            echo "                                                         <a target=\"_blank\"
                                                         href=\"";
            // line 565
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "webSite", array()), "html", null, true);
            echo "\"
                                                         title=\"\"
                                                         class=\"website\"><i class=\"fa fa-globe\"></i></a>
                                                         ";
        }
        // line 569
        echo "                                                         ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "fbpage", array()) != "")) {
            // line 570
            echo "                                                         <a target=\"_blank\"
                                                         href=\"";
            // line 571
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "fbpage", array()), "html", null, true);
            echo "\"
                                                         title=\"\"
                                                         class=\"social\"><i class=\"fa fa-facebook\"></i></a>
                                                         ";
        }
        // line 574
        echo "                    
                                                         ";
        // line 575
        $context["sellingpoint"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "sellingpoint", array());
        // line 576
        echo "                                                         ";
        if ((twig_length_filter($this->env, (isset($context["sellingpoint"]) ? $context["sellingpoint"] : null)) != 0)) {
            // line 577
            echo "
                                                         ";
            // line 578
            $context["latitude"] = $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "latitude", array());
            // line 579
            echo "                                                         ";
            $context["longitude"] = $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "longitude", array());
            // line 580
            echo "                                                         ";
            if (($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "visible", array()) == false)) {
                // line 581
                echo "                                                         <a  target=\"_blank\" href=\"https://www.google.fr/maps/dir//";
                echo twig_escape_filter($this->env, (isset($context["latitude"]) ? $context["latitude"] : null), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, (isset($context["longitude"]) ? $context["longitude"] : null), "html", null, true);
                echo "\" title=\"Iténiraire\" class=\"social social2\"><i
                                                          class=\"fa fa-map-marker teal\"></i></a>
                                                          ";
            }
            // line 584
            echo "                                                          ";
        }
        // line 585
        echo "                                                          <p class=\"address\">
                                                            <strong>Adresse: </strong>
                                                            ";
        // line 587
        if ((twig_length_filter($this->env, (isset($context["sellingpoint"]) ? $context["sellingpoint"] : null)) != 0)) {
            // line 588
            echo "
                                                            ";
            // line 589
            if (($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "visible", array()) == 0)) {
                // line 590
                echo "                                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 591
                    echo "                                                            ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "adress", array()), "html", null, true);
                    echo " ";
                    if ($this->getAttribute($context["item"], "localite", array())) {
                        echo "- ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "name", array()), "html", null, true);
                        echo "- ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "cp", array()), "html", null, true);
                        echo " ";
                    }
                    // line 592
                    echo "                                                            <br/>
                                                            <strong>Horaires:</strong>
                                                            <table border=\"0\" width=\"100%\">
                                                              ";
                    // line 595
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 0, array(), "array", true, true)) {
                        // line 596
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 597
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 599
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 600
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 601
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 603
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 605
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 606
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 607
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 609
                        echo "                                                                </td>
                                                              </tr>";
                    }
                    // line 611
                    echo "                                                              ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 1, array(), "array", true, true)) {
                        // line 612
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 613
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 615
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 616
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 617
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 619
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 621
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 622
                            echo "
                                                                  ";
                            // line 623
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 624
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 626
                        echo "                                                                </td>
                                                              </tr>";
                    }
                    // line 628
                    echo "                                                              ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 2, array(), "array", true, true)) {
                        // line 629
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 630
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 632
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 633
                            echo "
                                                                  ";
                            // line 634
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 635
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 637
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 639
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 640
                            echo "
                                                                  ";
                            // line 641
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 642
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 644
                        echo "                                                                </td>
                                                              </tr>";
                    }
                    // line 646
                    echo "                                                              ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 3, array(), "array", true, true)) {
                        // line 647
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 648
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 650
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 651
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 652
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 654
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 656
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 657
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 658
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 660
                        echo "                                                                </td>
                                                              </tr>";
                    }
                    // line 662
                    echo "                                                              ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 4, array(), "array", true, true)) {
                        // line 663
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 664
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 666
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 667
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 668
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 670
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 672
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 673
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 674
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 676
                        echo "                                                                </td>
                                                              </tr>";
                    }
                    // line 678
                    echo "                                                              ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 5, array(), "array", true, true)) {
                        // line 679
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 680
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 682
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 683
                            echo "
                                                                  ";
                            // line 684
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 685
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 687
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 689
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 690
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 691
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 693
                        echo "                                                                </td>
                                                              </tr>";
                    }
                    // line 695
                    echo "                                                              ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 6, array(), "array", true, true)) {
                        // line 696
                        echo "                                                              <tr>
                                                                <td><strong>";
                        // line 697
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "day", array()), "html", null, true);
                        echo "</strong></td>
                                                                <td>
                                                                  ";
                        // line 699
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                            // line 700
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 701
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 703
                        echo "                                                                </td>
                                                                <td>
                                                                  ";
                        // line 705
                        if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                            // line 706
                            echo "                                                                  ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  à ";
                            // line 707
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                            echo "
                                                                  ";
                        }
                        // line 709
                        echo "
                                                                </td>
                                                              </tr>";
                    }
                    // line 712
                    echo "                                                            </table>
                                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 713
                echo "<br>
                                                            ";
            } else {
                // line 715
                echo "                                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "visibleAdress", array()), "html", null, true);
                echo "<br>
                                                            <table border=\"0\" width=\"100%\">
                                                              ";
                // line 717
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 0, array(), "array", true, true)) {
                    // line 718
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 719
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 721
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 722
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 723
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 725
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 727
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 728
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 729
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 0, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 731
                    echo "                                                                </td>
                                                              </tr>";
                }
                // line 733
                echo "                                                              ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 1, array(), "array", true, true)) {
                    // line 734
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 735
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 737
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 738
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 739
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 741
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 743
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 744
                        echo "
                                                                  ";
                        // line 745
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 746
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 1, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 748
                    echo "                                                                </td>
                                                              </tr>";
                }
                // line 750
                echo "                                                              ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 2, array(), "array", true, true)) {
                    // line 751
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 752
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 754
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 755
                        echo "
                                                                  ";
                        // line 756
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 757
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 759
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 761
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 762
                        echo "
                                                                  ";
                        // line 763
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 764
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 2, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 766
                    echo "                                                                </td>
                                                              </tr>";
                }
                // line 768
                echo "                                                              ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 3, array(), "array", true, true)) {
                    // line 769
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 770
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 772
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 773
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 774
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 776
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 778
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 779
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 780
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 3, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 782
                    echo "                                                                </td>
                                                              </tr>";
                }
                // line 784
                echo "                                                              ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 4, array(), "array", true, true)) {
                    // line 785
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 786
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 788
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 789
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 790
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 792
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 794
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 795
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 796
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 4, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 798
                    echo "                                                                </td>
                                                              </tr>";
                }
                // line 800
                echo "                                                              ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 5, array(), "array", true, true)) {
                    // line 801
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 802
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 804
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 805
                        echo "
                                                                  ";
                        // line 806
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 807
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 809
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 811
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 812
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 813
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 5, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 815
                    echo "                                                                </td>
                                                              </tr>";
                }
                // line 817
                echo "                                                              ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array", false, true), "schedule", array(), "any", false, true), 6, array(), "array", true, true)) {
                    // line 818
                    echo "                                                              <tr>
                                                                <td><strong>";
                    // line 819
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "day", array()), "html", null, true);
                    echo "</strong></td>
                                                                <td>
                                                                  ";
                    // line 821
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeMorning", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeMorning", array()), "H:i"))) {
                        // line 822
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 823
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeMorning", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 825
                    echo "                                                                </td>
                                                                <td>
                                                                  ";
                    // line 827
                    if ((twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeAfternoon", array()), "H:i") != twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeAfternoon", array()), "H:i"))) {
                        // line 828
                        echo "                                                                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "openTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  à ";
                        // line 829
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sellingpoint"]) ? $context["sellingpoint"] : null), 0, array(), "array"), "schedule", array()), 6, array(), "array"), "closeTimeAfternoon", array()), "H:i"), "html", null, true);
                        echo "
                                                                  ";
                    }
                    // line 831
                    echo "
                                                                </td>
                                                              </tr>";
                }
                // line 834
                echo "                                                            </table>
                                                            ";
            }
            // line 836
            echo "                                                            ";
        }
        // line 837
        echo "                                                            
                                                            <br>

                                                          </p>
                                                          <div class=\"map\">
                                                            <div id=\"map-canvas\"
                                                            style=\"width: 100%; height: 250px;\"></div>
                                                          </div>

                                                          <div class=\"popularometre\" >
                                                            <h3>Popularomètre <span>BIGDeal</span></h3>

                                                            <p>Note: <span>";
        // line 850
        echo "                                                              ";
        $this->loadTemplate("MainRatingclientBundle:Rating:control.html.twig", "MainFrontBundle:Deal:index.html.twig", 850)->display(array_merge($context, array("id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "role" => "ROLE_CLIENT")));
        echo "</span>
                                                              <span> <a href=\"#mon_ancre\"
                                                                class=\"dark-gray\"> ";
        // line 852
        echo twig_escape_filter($this->env, (isset($context["nbvote"]) ? $context["nbvote"] : null), "html", null, true);
        echo "Avis</a></span>
                                                              </p>
                                                              <ul>

                                                                <li>
                                                                  <label class=\"label gray-label\">";
        // line 857
        echo twig_escape_filter($this->env, sprintf("%05d", (isset($context["CouponConsomer"]) ? $context["CouponConsomer"] : null)), "html", null, true);
        echo "</label><span>membres ont <strong>visité</strong> ce Partenaire </span>
                                                                </li>
                                                                <li>
                                                                  <label class=\"label gray-label\">";
        // line 860
        echo twig_escape_filter($this->env, sprintf("%05d", (isset($context["nbvote3"]) ? $context["nbvote3"] : null)), "html", null, true);
        echo "</label><span>membres sont <strong>satisfait </strong>

                                                                </span>
                                                              </li>
                                                              <li>
                                                                <a href=\"#\"
                                                                data-toggle=\"modal\"
                                                                data-target=\".commentpartner\"
                                                                class=\"dark-gray\">Voir tout les avis sur ce marchand</a>
                                                              </li>
                                                            </ul>
                                                          </div>
                                                          <!-- bloc femme de tunisie -->
                                                          <div>
                                                            <iframe width=\"250\" height=\"250\" frameborder=\"0\" scrolling=\"no\" src=\"https://femmesdetunisie.com/site-2/\"></iframe>
                                                          </div>

                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div id=\"comment\" class=\"offre-comments\">
                                                      ";
        // line 881
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 882
            echo "                                                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashMessages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 883
                echo "                                                      <br/>
                                                      <div class=\"alert ";
                // line 884
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                                                        <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×
                                                        </button>
                                                        ";
                // line 887
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"]), "html", null, true);
                echo "
                                                      </div>
                                                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 890
            echo "                                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 891
        echo "                                                      <div class=\"row\">
                                                        <div class=\"col-md-12 col-sm-12 title\">
                                                          <h3 id=\"mon_ancre\">Commentaires</h3>
                                                        </div>
                                                      </div>


                                                      ";
        // line 898
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["commentaire"]) ? $context["commentaire"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 899
            echo "                                                      <div class=\"row comments\">
                                                        <div class=\"col-md-1 col-sm-1 col-xs-3 text-left\">
                                                          ";
            // line 901
            if (($this->getAttribute($this->getAttribute($context["item"], "voter", array()), "fbid", array()) != "")) {
                // line 902
                echo "                                                          <img src=\"https://graph.facebook.com/v2.3/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "voter", array()), "fbid", array()), "html", null, true);
                echo "/picture?width=80&height=80\"
                                                          alt=\"\">
                                                          ";
            } else {
                // line 905
                echo "                                                          <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/profile-no-picture.png"), "html", null, true);
                echo "\"
                                                          alt=\"\">
                                                          ";
            }
            // line 908
            echo "                                                        </div>
                                                        <div class=\"col-md-11 col-sm-11 col-xs-9\">
                                                          <div class=\"row\">
                                                            <div class=\"col-sm-12 col-xs-12\">
                                                              <strong>";
            // line 912
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "voter", array()), "html", null, true);
            echo "</strong>
                                                            </div>
                                                            <div class=\"col-sm-12 col-xs-12\">
                                                              <strong>Avis</strong>
                                                              ";
            // line 916
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 917
                echo "                                                              ";
                $context["style"] = "fa fa-star-o";
                // line 918
                echo "                                                              ";
                if (($context["i"] <= $this->getAttribute($context["item"], "value", array()))) {
                    // line 919
                    echo "                                                              ";
                    $context["style"] = "fa fa-star";
                    // line 920
                    echo "                                                              ";
                } else {
                    // line 921
                    echo "                                                              ";
                    $context["style"] = (($this->env->getExtension('rating_extension')->isHalfStarFilter($this->getAttribute($context["item"], "value", array()), $context["i"])) ? ("fa fa-star-half-o") : (""));
                    // line 922
                    echo "                                                              ";
                }
                // line 923
                echo "                                                              ";
                if (((isset($context["style"]) ? $context["style"] : null) == "")) {
                    // line 924
                    echo "                                                              ";
                    $context["style"] = "fa fa-star-o";
                    // line 925
                    echo "                                                              ";
                }
                // line 926
                echo "                                                              <span class=\"";
                echo twig_escape_filter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true);
                echo "\"></span>
                                                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 928
            echo "                                                            </div>
                                                            <div class=\"col-sm-12 col-xs-12\">";
            // line 929
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "dcr", array()), "d/m/Y"), "html", null, true);
            echo "</div>
                                                          </div>

                                                          <p>";
            // line 932
            echo $this->getAttribute($context["item"], "comment", array());
            echo "</p>
                                                        </div>
                                                      </div>

                                                      ";
            // line 936
            if (((isset($context["pagercomment"]) ? $context["pagercomment"] : null) == 1)) {
                // line 937
                echo "                                                      <div class=\"last\"><a
                                                        href=\"";
                // line 938
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pager_deal_comment", array("id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "page" => 2)), "html", null, true);
                echo "\"
                                                        style=\"display: none;\">next</a></div>
                                                        ";
            }
            // line 941
            echo "                                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 942
        echo "                                                        ";
        if (((isset($context["testfrm"]) ? $context["testfrm"] : null) == 1)) {
            // line 943
            echo "                                                        ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "POST", "attr" => array("class" => "validatedForm")));
            echo "

                                                        <div class=\"row comments\">
                                                          <div class=\"col-md-1 col-sm-1 col-xs-3 text-left\">

                                                            ";
            // line 948
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "fbid", array()) != "")) {
                // line 949
                echo "                                                            <img src=\"https://graph.facebook.com/v2.3/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "fbid", array()), "html", null, true);
                echo "/picture?width=80&height=80\"
                                                            alt=\"\">
                                                            ";
            } else {
                // line 952
                echo "                                                            <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/profile-no-picture.png"), "html", null, true);
                echo "\"
                                                            alt=\"\">
                                                            ";
            }
            // line 955
            echo "                                                          </div>
                                                          <div class=\"col-md-11 col-sm-11 col-xs-9\">
                                                            <div class=\"row\">
                                                              <div class=\"col-sm-12\"><strong>";
            // line 958
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "html", null, true);
            echo "</strong>
                                                              </div>
                                                            </div>

                                                            <div class=\"row\">
                                                              <div class=\"col-sm-12 col-xs-12\">
                                                                ";
            // line 964
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "comment", array()), 'widget', array("attr" => array("class" => "form-control")));
            echo "
                                                                ";
            // line 965
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "value", array()), 'widget', array("attr" => array("class" => "form-control", "data-max" => 5, "data-min" => 1, "data-icon-lib" => "fa", "data-active-icon" => "fa-star", "data-inactive-icon" => "fa-star-o", "data-clearable-icon" => "fa-trash-o")));
            // line 973
            echo "
                                                            </div>
                                                          </div>
                                                          <div class=\"col-sm-12 col-xs-12 text-right\">
                                                            ";
            // line 977
            if (((isset($context["testfrm"]) ? $context["testfrm"] : null) == 1)) {
                // line 978
                echo "                                                            <input class=\"btn btn-comment\" type=\"submit\"
                                                            value=\"Commenter\">
                                                            ";
            }
            // line 981
            echo "                                                          </div>
                                                        </div>
                                                      </div>

                                                      ";
            // line 985
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'widget');
            echo "
                                                      ";
            // line 986
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
            echo "
                                                      ";
        } else {
            // line 988
            echo "                                                      <div class=\"alert alert-danger\">Vous devez passer une commande pour
                                                        pouvoir laisser un commentaire
                                                      </div>
                                                      ";
        }
        // line 992
        echo "                                                    </div>
                                                    <!-- Fixed Mobile Buy button -->
                                                    <div class=\"fixed-buy product-det mobile-visible\">
                                                      <div class=\"col-sm-12 buy\">
                                                        ";
        // line 996
        if (((isset($context["nbcoupon"]) ? $context["nbcoupon"] : null) < $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()))) {
            // line 997
            echo "                                                        ";
            if ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))) {
                // line 998
                echo "                                                        <p>
                                                          <a href=\"javascript:void();\"
                                                          class=\"btn btn-teal no-bg\"><i
                                                          class=\"fa fa-exclamation-triangle pr-30\"></i>Expiré</a>
                                                          ";
            } else {
                // line 1003
                echo "                                                          ";
                if ((twig_length_filter($this->env, (isset($context["ref"]) ? $context["ref"] : null)) > 1)) {
                    // line 1004
                    echo "                                                          <p><a href=\"#\" data-toggle=\"modal\"
                                                            data-target=\".add-modal\" class=\"btn btn-teal\"><i
                                                            class=\"flaticon-buy10\"></i>J'achete</a>
                                                          </p>
                                                          ";
                } else {
                    // line 1009
                    echo "                                                          ";
                    if (($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) == 0)) {
                        // line 1010
                        echo "                                                          <p>
                                                           <a href=\"";
                        // line 1011
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                        echo "\"
                                                           class=\"btn btn-teal\"><i
                                                           class=\"flaticon-buy10\"></i>J'achete</a>
                                                         </p>

                                                         ";
                    } elseif (($this->getAttribute($this->getAttribute(                    // line 1016
(isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) > $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())))) {
                        // line 1017
                        echo "                                                         <p>
                                                           <a href=\"";
                        // line 1018
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                        echo "\"
                                                           class=\"btn btn-teal\"><i
                                                           class=\"flaticon-buy10\"></i>J'achete</a>
                                                         </p>
                                                         ";
                    } else {
                        // line 1023
                        echo "                                                         <p>
                                                          <a href=\"javascript:void();\"
                                                          class=\"btn btn-teal no-bg\"><i
                                                          class=\"fa fa-cart-arrow-down\"></i>Epuisé</a>
                                                        </p>

                                                        <p>
                                                          ";
                    }
                    // line 1031
                    echo "                                                          ";
                }
                // line 1032
                echo "                                                          ";
            }
            // line 1033
            echo "                                                          ";
            if ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))) {
                // line 1034
                echo "                                                          ";
            } else {
                // line 1035
                echo "


                                                          ";
            }
            // line 1039
            echo "                                                          ";
        } elseif ((($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()) == 0) && ($this->env->getExtension('twig_extension')->verifExpireFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())) != 1))) {
            // line 1040
            echo "                                                          ";
            if ((twig_length_filter($this->env, (isset($context["ref"]) ? $context["ref"] : null)) > 1)) {
                // line 1041
                echo "                                                          <p><a href=\"#\" data-toggle=\"modal\" data-target=\".add-modal\"
                                                            class=\"btn btn-teal\"><i class=\"flaticon-buy10\"></i>J'achete</a>
                                                          </p>
                                                          ";
            } else {
                // line 1045
                echo "                                                          ";
                if (($this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) == 0)) {
                    // line 1046
                    echo "                                                          <p>
                                                            <a href=\"";
                    // line 1047
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                    echo "\"
                                                            class=\"btn btn-teal\"><i
                                                            class=\"flaticon-buy10\"></i>J'achete</a>
                                                          </p>

                                                          ";
                } elseif (($this->getAttribute($this->getAttribute(                // line 1052
(isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "maxCoupon", array()) > $this->env->getExtension('twig_extension')->getNombreAcheteursFilter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array())))) {
                    // line 1053
                    echo "                                                          <p>
                                                            <a href=\"";
                    // line 1054
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($this->getAttribute((isset($context["ref"]) ? $context["ref"] : null), (isset($context["indexref"]) ? $context["indexref"] : null), array(), "array"), "id", array()))), "html", null, true);
                    echo "\"
                                                            class=\"btn btn-teal\"><i
                                                            class=\"flaticon-buy10\"></i>J'achete</a>
                                                          </p>
                                                          ";
                } else {
                    // line 1059
                    echo "                                                          <p>
                                                            <a href=\"javascript:void();\"
                                                            class=\"btn btn-teal no-bg\"><i
                                                            class=\"fa fa-cart-arrow-down\"></i>Epuisé</a>
                                                          </p>

                                                          <p>
                                                            ";
                }
                // line 1067
                echo "                                                            ";
            }
            // line 1068
            echo "

                                                            ";
        } else {
            // line 1071
            echo "                                                            <p><a href=\"javascript:void();\"
                                                             class=\"btn btn-teal no-bg\"><i
                                                             class=\"fa fa-cart-arrow-down\"></i>Epuisé</a></p>
                                                             ";
        }
        // line 1075
        echo "                                                           </div>
                                                         </div>
                                                         <!-- End Fixed Mobile Buy button -->
                                                       </div>
                                                       <!-- modal -->

                                                       <div class=\"modal fade commentpartner\" tabindex=\"-1\" role=\"dialog\"
                                                       aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                                                       <div class=\"modal-dialog\" style=\"width:60%\">
                                                        <div class=\"modal-content\">
                                                          <div class=\"modal-header\">
                                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                                                            aria-label=\"Close\"><span
                                                            aria-hidden=\"true\"><i
                                                            class=\"fa fa-close\"></i></span></button>
                                                            <h4 class=\"modal-title\">Les commentaires du
                                                              partenaire ";
        // line 1091
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "planning", array()), "defaultannexe", array()), "protocol", array()), "user", array()), "html", null, true);
        echo "</h4>
                                                            </div>
                                                            <div class=\"modal-body\">
                                                              <iframe src=\"";
        // line 1094
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pager_deal_allcomment", array("id" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()))), "html", null, true);
        echo "\"
                                                              style=\"zoom:0.60\" width=\"100%\" height=\"500\"
                                                              frameborder=\"0\"></iframe>


                                                            </div>

                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class=\"modal fade add-modal\" tabindex=\"-1\" role=\"dialog\"
                                                      aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                                                      <div class=\"modal-dialog\">
                                                        <div class=\"modal-content\">
                                                          <div class=\"modal-header\">
                                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\"
                                                            aria-label=\"Close\"><span
                                                            aria-hidden=\"true\"><i
                                                            class=\"fa fa-close\"></i></span></button>
                                                            <h4 class=\"modal-title\">Choisir une offre</h4>
                                                          </div>
                                                          <div class=\"modal-body\">


                                                            <div class=\"\">
                                                              <table class=\"table table-striped\">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Offres</th>
                                                                    <th>Prix</th>
                                                                    <th></th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  ";
        // line 1129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ref"]) ? $context["ref"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 1130
            echo "                                                                  <tr>
                                                                    <td>";
            // line 1131
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</td>

                                                                    <td>";
            // line 1133
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "bigdealPrice", array()), "html", null, true);
            echo " <sup>TND</sup></td>

                                                                    <td>
                                                                      ";
            // line 1136
            if (($this->getAttribute($context["item"], "maxCoupon", array()) == 0)) {
                // line 1137
                echo "                                                                      <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
                echo "\"
                                                                      title=\"J’ACHETE\"
                                                                      class=\"btn btn-buy pull-right\">J’ACHETE</a>
                                                                      ";
            } elseif (($this->getAttribute(            // line 1140
$context["item"], "maxCoupon", array()) > $this->env->getExtension('twig_extension')->getNombreAcheteursReferenceFilter($this->getAttribute($context["item"], "id", array())))) {
                // line 1141
                echo "
                                                                      <a href=\"";
                // line 1142
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
                echo "\"
                                                                      title=\"J’ACHETE\"
                                                                      class=\"btn btn-buy pull-right\">J’ACHETE</a>
                                                                      ";
            } else {
                // line 1146
                echo "                                                                      <a href=\"javascript:void();\"
                                                                      title=\"Epuisé\"
                                                                      class=\"btn btn-primary no-bg pull-right\"><i
                                                                      class=\"fa fa-cart-arrow-down pr-10\"></i>Epuisé</a>
                                                                      ";
            }
            // line 1151
            echo "                                                                    </td>

                                                                  </tr>
                                                                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1155
        echo "                                                                </tbody>
                                                              </table>
                                                            </div>


                                                          </div>
                                                          <div class=\"modal-footer\">
                                                            <a type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Annuler</a>

                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    ";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Deal:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2466 => 1155,  2457 => 1151,  2450 => 1146,  2443 => 1142,  2440 => 1141,  2438 => 1140,  2431 => 1137,  2429 => 1136,  2423 => 1133,  2418 => 1131,  2415 => 1130,  2411 => 1129,  2373 => 1094,  2367 => 1091,  2349 => 1075,  2343 => 1071,  2338 => 1068,  2335 => 1067,  2325 => 1059,  2317 => 1054,  2314 => 1053,  2312 => 1052,  2304 => 1047,  2301 => 1046,  2298 => 1045,  2292 => 1041,  2289 => 1040,  2286 => 1039,  2280 => 1035,  2277 => 1034,  2274 => 1033,  2271 => 1032,  2268 => 1031,  2258 => 1023,  2250 => 1018,  2247 => 1017,  2245 => 1016,  2237 => 1011,  2234 => 1010,  2231 => 1009,  2224 => 1004,  2221 => 1003,  2214 => 998,  2211 => 997,  2209 => 996,  2203 => 992,  2197 => 988,  2192 => 986,  2188 => 985,  2182 => 981,  2177 => 978,  2175 => 977,  2169 => 973,  2167 => 965,  2163 => 964,  2154 => 958,  2149 => 955,  2142 => 952,  2135 => 949,  2133 => 948,  2124 => 943,  2121 => 942,  2115 => 941,  2109 => 938,  2106 => 937,  2104 => 936,  2097 => 932,  2091 => 929,  2088 => 928,  2079 => 926,  2076 => 925,  2073 => 924,  2070 => 923,  2067 => 922,  2064 => 921,  2061 => 920,  2058 => 919,  2055 => 918,  2052 => 917,  2048 => 916,  2041 => 912,  2035 => 908,  2028 => 905,  2021 => 902,  2019 => 901,  2015 => 899,  2011 => 898,  2002 => 891,  1996 => 890,  1987 => 887,  1981 => 884,  1978 => 883,  1973 => 882,  1969 => 881,  1945 => 860,  1939 => 857,  1931 => 852,  1925 => 850,  1911 => 837,  1908 => 836,  1904 => 834,  1899 => 831,  1894 => 829,  1889 => 828,  1887 => 827,  1883 => 825,  1878 => 823,  1873 => 822,  1871 => 821,  1866 => 819,  1863 => 818,  1860 => 817,  1856 => 815,  1851 => 813,  1846 => 812,  1844 => 811,  1840 => 809,  1835 => 807,  1831 => 806,  1828 => 805,  1826 => 804,  1821 => 802,  1818 => 801,  1815 => 800,  1811 => 798,  1806 => 796,  1801 => 795,  1799 => 794,  1795 => 792,  1790 => 790,  1785 => 789,  1783 => 788,  1778 => 786,  1775 => 785,  1772 => 784,  1768 => 782,  1763 => 780,  1758 => 779,  1756 => 778,  1752 => 776,  1747 => 774,  1742 => 773,  1740 => 772,  1735 => 770,  1732 => 769,  1729 => 768,  1725 => 766,  1720 => 764,  1716 => 763,  1713 => 762,  1711 => 761,  1707 => 759,  1702 => 757,  1698 => 756,  1695 => 755,  1693 => 754,  1688 => 752,  1685 => 751,  1682 => 750,  1678 => 748,  1673 => 746,  1669 => 745,  1666 => 744,  1664 => 743,  1660 => 741,  1655 => 739,  1650 => 738,  1648 => 737,  1643 => 735,  1640 => 734,  1637 => 733,  1633 => 731,  1628 => 729,  1623 => 728,  1621 => 727,  1617 => 725,  1612 => 723,  1607 => 722,  1605 => 721,  1600 => 719,  1597 => 718,  1595 => 717,  1589 => 715,  1585 => 713,  1578 => 712,  1573 => 709,  1568 => 707,  1563 => 706,  1561 => 705,  1557 => 703,  1552 => 701,  1547 => 700,  1545 => 699,  1540 => 697,  1537 => 696,  1534 => 695,  1530 => 693,  1525 => 691,  1520 => 690,  1518 => 689,  1514 => 687,  1509 => 685,  1505 => 684,  1502 => 683,  1500 => 682,  1495 => 680,  1492 => 679,  1489 => 678,  1485 => 676,  1480 => 674,  1475 => 673,  1473 => 672,  1469 => 670,  1464 => 668,  1459 => 667,  1457 => 666,  1452 => 664,  1449 => 663,  1446 => 662,  1442 => 660,  1437 => 658,  1432 => 657,  1430 => 656,  1426 => 654,  1421 => 652,  1416 => 651,  1414 => 650,  1409 => 648,  1406 => 647,  1403 => 646,  1399 => 644,  1394 => 642,  1390 => 641,  1387 => 640,  1385 => 639,  1381 => 637,  1376 => 635,  1372 => 634,  1369 => 633,  1367 => 632,  1362 => 630,  1359 => 629,  1356 => 628,  1352 => 626,  1347 => 624,  1343 => 623,  1340 => 622,  1338 => 621,  1334 => 619,  1329 => 617,  1324 => 616,  1322 => 615,  1317 => 613,  1314 => 612,  1311 => 611,  1307 => 609,  1302 => 607,  1297 => 606,  1295 => 605,  1291 => 603,  1286 => 601,  1281 => 600,  1279 => 599,  1274 => 597,  1271 => 596,  1269 => 595,  1264 => 592,  1253 => 591,  1248 => 590,  1246 => 589,  1243 => 588,  1241 => 587,  1237 => 585,  1234 => 584,  1225 => 581,  1222 => 580,  1219 => 579,  1217 => 578,  1214 => 577,  1211 => 576,  1209 => 575,  1206 => 574,  1199 => 571,  1196 => 570,  1193 => 569,  1186 => 565,  1183 => 564,  1181 => 563,  1177 => 561,  1175 => 560,  1172 => 559,  1166 => 557,  1163 => 556,  1154 => 554,  1149 => 553,  1147 => 552,  1144 => 551,  1141 => 550,  1139 => 549,  1115 => 528,  1109 => 524,  1102 => 521,  1098 => 519,  1090 => 517,  1078 => 516,  1075 => 515,  1070 => 514,  1068 => 513,  1065 => 512,  1062 => 511,  1059 => 510,  1057 => 509,  1052 => 507,  1049 => 506,  1045 => 504,  1036 => 502,  1031 => 501,  1029 => 500,  1026 => 499,  1023 => 498,  1021 => 497,  1015 => 493,  1010 => 491,  1006 => 489,  1003 => 488,  998 => 486,  994 => 484,  991 => 483,  986 => 481,  983 => 480,  981 => 479,  978 => 478,  973 => 476,  969 => 474,  967 => 473,  960 => 469,  951 => 462,  945 => 459,  937 => 454,  934 => 453,  932 => 452,  926 => 449,  918 => 448,  915 => 447,  912 => 446,  905 => 442,  900 => 439,  894 => 436,  889 => 433,  886 => 432,  881 => 430,  877 => 428,  874 => 427,  866 => 421,  856 => 413,  853 => 412,  843 => 404,  833 => 397,  830 => 396,  828 => 395,  818 => 388,  815 => 387,  812 => 386,  802 => 378,  799 => 377,  796 => 376,  784 => 366,  781 => 365,  778 => 364,  775 => 363,  772 => 362,  762 => 354,  752 => 347,  749 => 346,  747 => 345,  738 => 339,  735 => 338,  732 => 337,  722 => 329,  720 => 328,  717 => 327,  708 => 320,  705 => 319,  703 => 318,  692 => 310,  684 => 305,  676 => 300,  664 => 293,  656 => 287,  649 => 280,  639 => 272,  634 => 270,  630 => 268,  627 => 267,  622 => 265,  618 => 263,  616 => 262,  613 => 261,  608 => 259,  604 => 257,  602 => 256,  595 => 251,  590 => 249,  587 => 248,  584 => 247,  579 => 245,  576 => 244,  573 => 243,  568 => 241,  565 => 240,  563 => 239,  552 => 231,  548 => 229,  542 => 228,  539 => 227,  536 => 226,  533 => 225,  530 => 224,  527 => 223,  525 => 222,  522 => 221,  517 => 220,  514 => 219,  511 => 218,  508 => 217,  505 => 216,  502 => 215,  500 => 214,  498 => 213,  496 => 212,  494 => 211,  490 => 209,  488 => 208,  485 => 207,  482 => 206,  479 => 205,  476 => 204,  473 => 203,  470 => 202,  467 => 201,  464 => 200,  461 => 199,  450 => 190,  444 => 187,  433 => 178,  419 => 176,  415 => 175,  411 => 174,  397 => 173,  391 => 170,  387 => 169,  382 => 166,  376 => 162,  363 => 159,  358 => 157,  355 => 156,  345 => 154,  335 => 152,  332 => 151,  328 => 150,  321 => 145,  316 => 143,  312 => 142,  309 => 141,  304 => 139,  300 => 138,  297 => 137,  295 => 136,  292 => 135,  284 => 133,  276 => 131,  274 => 130,  267 => 125,  264 => 124,  262 => 123,  257 => 121,  235 => 102,  227 => 97,  216 => 88,  202 => 86,  198 => 85,  195 => 84,  157 => 50,  153 => 49,  149 => 48,  146 => 47,  143 => 46,  138 => 43,  132 => 40,  126 => 37,  124 => 36,  118 => 34,  112 => 32,  110 => 31,  106 => 30,  100 => 27,  96 => 25,  93 => 24,  83 => 22,  78 => 19,  74 => 17,  68 => 14,  59 => 11,  55 => 10,  53 => 9,  51 => 8,  47 => 7,  43 => 6,  38 => 4,  36 => 3,  33 => 2,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* {% block title %}*/
/* {% if deal.seoTitle %}*/
/* {{ deal.seoTitle }}*/
/* {% else %}*/
/* {{ deal.planning.defaultannexe.reference[0].shopPrice|getPourcentage(deal.planning.defaultannexe.reference[0].bigdealPrice) }} % de remise chez */
/* {% set pointVente=deal.planning.defaultannexe.protocol.user.sellingpoint %} */
/* {% if pointVente|length != 0 %}*/
/* {% if pointVente[0].visible == 0   %}*/
/* {% for item in pointVente %}*/
/* {{ item.name }}*/
/* {% endfor %}*/
/* {% else %}*/
/* {{ pointVente[0].visibleAdress }}*/
/* {% endif %}*/
/* {% endif %}*/
/* | BIGDeal Tunisie*/
/* {% endif %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block description %}{% if deal.seoDescription %}{{ deal.seoDescription }}{% else %}{{ (deal.title) }}{% endif %}{% endblock %}*/
/* */
/* {% block head %}*/
/* <meta property="og:site_name" content="BIGDeal"/>*/
/* <meta property="og:type" content="website"/>*/
/* <meta property="og:image" content="{{ asset(deal.image1| imagine_filter('facebook_share'))|replace({' ': '%20'}) }}"/>*/
/* */
/* <meta property="og:url" */
/* content="{{ app.request.getSchemeAndHttpHost()~path(app.request.attributes.get('_route'),app.request.attributes.get('_route_params')) }}"/>*/
/* {% if deal.seoTitle %}*/
/* <meta property="og:title" content="{{ (deal.seoTitle) }}"/>*/
/* {% else %}*/
/* <meta property="og:title" content="{{ (deal.title) }}"/>*/
/* {% endif %}*/
/* {% if deal.seoDescription %}*/
/* <meta property="og:description" content="{{ deal.seoDescription }}"/>*/
/* {% else %}*/
/* {% autoescape 'html' %}*/
/* <meta property="og:description" content="{{ (deal.deal|striptags('<b>')|raw) }}"/>*/
/* {% endautoescape %}*/
/* {% endif %}*/
/* */
/* {% endblock %}*/
/* */
/* {% block stylesheets %}*/
/* <!-- BxSlider -->*/
/* <link rel="stylesheet" href="{{ asset('public/css/jquery.bxslider.css') }}">*/
/* <link rel="stylesheet" href="{{ asset('bundles/dcsrating/css/rating.css') }}"/>*/
/* <link rel="stylesheet" href="{{ asset('public/css/enjoyhint/enjoyhint.css') }}">*/
/* <style>*/
/*   .fa {*/
/*     color: #de0e79;*/
/*     font-size: 1.3em;*/
/* */
/*   }*/
/* */
/*   .modal-open .modal {*/
/*     z-index: 10000;*/
/*   }*/
/* */
/*   .mySkip, .myNext, .mySkip:focus, .myNext:focus {*/
/*     color: white;*/
/*     border-color: #de0e79;*/
/*     border-radius: 0;*/
/*     margin-top: 10px;*/
/*   }*/
/* */
/* */
/*   .mySkip, .mySkip:hover, .mySkip:focus {*/
/*     background: transparent;*/
/*   }*/
/* */
/*   .myNext, .myNext:hover, .myNext:focus {*/
/*     background: #de0e79;*/
/*   }*/
/* */
/*   .enjoy_hint_label {*/
/*     margin-top: -11px;*/
/*   }*/
/* </style>*/
/* */
/* {% endblock %}*/
/* {% block javascripts %}*/
/* {% javascripts '@MainFrontBundle/Resources/public/js/jquery.jscroll.min.js' %}*/
/* <script type="text/javascript" src="{{ asset_url }}"></script>*/
/* {% endjavascripts %}*/
/* <script type="text/javascript">*/
/*   $(document).ready(function () {*/
/*     $('.alert-success').delay(5000).fadeOut();*/
/*   });*/
/*   $(document).ready(function () {*/
/*     $('.alert-error').delay(5000).fadeOut();*/
/*   });*/
/*   $(document).ready(function () {*/
/*     $('#comment').jscroll({*/
/*       loadingHtml: '<div class="row"><div class="col-md-12 col-sm-12"><div id="loading"><img src="{{ asset('public/images/loading.gif') }}" alt="Loader"></div></div></div>',*/
/*       nextSelector: '.last a'*/
/* */
/*     });*/
/*     $('#shwos2').jscroll({*/
/*       loadingHtml: '<div class="row"><div class="col-md-12 col-sm-12"><div id="loading"><img src="{{ asset('public/images/loading.gif') }}" alt="Loader"></div></div></div>',*/
/*       nextSelector: '.last2 a'*/
/* */
/*     });*/
/*     $('.bxslider').bxSlider({*/
/*       pagerCustom: '#bx-pager'*/
/*     });*/
/*             /**/
/*              $("#price-hover").hover(function(){*/
/*              $(".price-big").css("opacity", "1.0");*/
/*              }, function(){*/
/*              $(".price-big").css("opacity", "0.0");*/
/*            });  *//* */
/* */
/*            $('[data-toggle="tooltip"]').tooltip();*/
/*          })*/
/* */
/*        </script>*/
/*        <!-- BxSlider JS -->*/
/*        <script src="{{ asset('public/js/jquery.bxslider.js') }}"></script>*/
/* */
/*        {% set sellingpoint= deal.planning.defaultannexe.protocol.user.sellingpoint %}*/
/*        {% if sellingpoint|length>0 %}*/
/* */
/*        <script type="text/javascript">*/
/* */
/* */
/*         function initialize() {*/
/*           {% if sellingpoint[0].visible %}*/
/*           var myLatlng = new google.maps.LatLng({{ sellingpoint[0].latVisibleAdress }}, {{ sellingpoint[0].lonVisibleAdress }});*/
/*           {% else %}*/
/*           var myLatlng = new google.maps.LatLng({{ sellingpoint[0].latitude }}, {{ sellingpoint[0].longitude }});*/
/*           {% endif %}*/
/*           var mapOptions = {*/
/*             {% if sellingpoint[0].visible %}*/
/*             center: {*/
/*               lat:{{ sellingpoint[0].latVisibleAdress }},*/
/*               lng: {{ sellingpoint[0].lonVisibleAdress }}*/
/*             }, {% else %}*/
/*             center: {*/
/*               lat:{{ sellingpoint[0].latitude }},*/
/*               lng: {{ sellingpoint[0].longitude }}*/
/*             }, {% endif %}*/
/*             zoom: 16*/
/*           }*/
/*           ;*/
/*           var map = new google.maps.Map(document.getElementById('map-canvas'),*/
/*             mapOptions);*/
/*           {% for item in sellingpoint %}*/
/*           {% if item.visible %}*/
/*           var mypoint{{ item.id }} = new google.maps.LatLng({{ item.latVisibleAdress }}, {{ item.lonVisibleAdress }});*/
/*           {% else %}*/
/*           var mypoint{{ item.id }} = new google.maps.LatLng({{ item.latitude }}, {{ item.longitude }});*/
/*           {% endif %}*/
/*           var marker = new google.maps.Marker({*/
/*             position: mypoint{{ item.id }},*/
/*             map: map,*/
/*             title: '{% if deal.planning.defaultannexe.protocol.user.sellingpoint[0].visible == 1 %}{{deal.planning.defaultannexe.protocol.user.sellingpoint[0].visibleAdress}}{% else %}{{ deal.planning.defaultannexe.protocol.user }}{% endif %}'*/
/*           });*/
/*           {% endfor %}*/
/*         }*/
/* */
/*         google.maps.event.addDomListener(window, 'load', initialize);</script>*/
/*         {% endif %}*/
/* */
/* */
/* */
/*         <script src="{{ asset('bundles/dcsrating/js/rating.js') }}"></script>*/
/*         <script src="{{ asset('public/js/jquery.countdown.js') }}" type="text/javascript" charset="utf-8"></script>*/
/* */
/*         <script type="text/javascript">*/
/*           var ts = new Date({{ deal.planning.endDate|date("Y") }}, {{ deal.planning.endDate|date("m") }}-1, {{ deal.planning.endDate|date("d") }}, {{ deal.planning.endDate|date("H") }}, {{ deal.planning.endDate|date("i") }}, {{ deal.planning.endDate|date("s") }});</script>*/
/*           <script src="{{ asset('public/js/scriptcounter.js') }}" type="text/javascript"></script>*/
/*           {% javascripts '@MainFrontBundle/Resources/public/js/bootstrap-rating-input.min.js' %}*/
/*           <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*           {% endjavascripts %}*/
/*           <script>*/
/*             $(document).ready(function () {*/
/*               $('#back_dealbundle_comment_value').rating();*/
/*               $('.starss').rating("refresh", {disabled: true, showClear: false});*/
/*             });*/
/*           </script>*/
/*           <script>*/
/*             var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);*/
/*             if (w > 767) {*/
/*               document.write('<script type="text/javascript" src="{{ asset('public/css/enjoyhint/enjoyhint.min.js') }}"><\/script>');*/
/*             }*/
/*             if (w > 767) {*/
/*               document.write('<script type="text/javascript" src="{{ asset('public/css/enjoyhint/main2.js') }}"><\/script>');*/
/*             }*/
/* */
/*           </script>   */
/* */
/* */
/*           {% endblock %}*/
/* */
/* */
/*           {% block body %}*/
/*           {% if deal.seoTitle %}*/
/*           {% set permelink = deal.seoTitle %}*/
/*           {% else %}*/
/*           {% set permelink = deal.title %}*/
/*           {%endif%}*/
/*           {% set urlFacebook = app.request.schemeAndHttpHost ~ path('deal_detail',  {'region':(deal.planning.regionId|getAlias),'categorie':(deal.planning.categoryId|getAlias), 'id': deal.id ,'name':(permelink|getAlias)}) %}*/
/*           {% if curentUser %}*/
/* */
/*           {% set urlFacebook= app.request.schemeAndHttpHost ~ path('deal_detail',  {'region':(deal.planning.regionId|getAlias),'categorie':(deal.planning.categoryId|getAlias), 'id': deal.id ,'name':(permelink|getAlias)}) ~ "?user=" ~ curentUser %}*/
/* */
/*           {% endif %}*/
/*           {#% set urlClient = ""  %#}*/
/*           {#% if app.user.id %#}*/
/*           {#% set urlClient = "?user=" ~ app.user.id  %#}*/
/*           {#% endif %#}*/
/*           {% set ref=deal.planning.defaultannexe.reference %}*/
/*           {% set reservation = ref[0].annexe.booking %}*/
/*           {% set CouponConsomer = deal.id|listCouponConsomer %}*/
/*           {% set indexref=0 %}*/
/*           {% set i=0 %}*/
/*           {% for key,item in ref %}*/
/* */
/*           {% if i!=0 %}*/
/*           {% if item.bigdealPrice<ref[0].bigdealPrice %}*/
/*           {% set indexref=key %}*/
/*           {% endif %}*/
/*           {% endif %}*/
/*           {% set i=i+1 %}*/
/*           {% endfor %}*/
/* */
/*           <div class="row" itemscope itemtype="http://schema.org/Product">*/
/*             <div class="col-md-12 entry" itemprop="name"><h1>{{ deal.title }}</h1></div>*/
/*           </div>*/
/* */
/*           <!-- Shows -->*/
/*           <div id="offre" class="row">*/
/* */
/*             <div class="col-md-9 col-sm-12 product pull-right">*/
/*               <ul class="bxslider">*/
/*                 {% if deal.image1!="" %}*/
/*                 <li><img*/
/*                   src="{{ asset(deal.image1| imagine_filter('sliddetaildeal')) }}"*/
/*                   id="image1"></li>{% endif %}*/
/*                   {% if deal.image2!="" %}*/
/*                   <li><img*/
/*                     src="{{ asset(deal.image2| imagine_filter('sliddetaildeal')) }}"*/
/*                     id="image2"></li>{% endif %}*/
/*                     {% if deal.image3!="" %}*/
/*                     <li><img*/
/*                       src="{{ asset(deal.image3| imagine_filter('sliddetaildeal')) }}"*/
/*                       id="image3"></li>{% endif %}*/
/*                     </ul>*/
/* */
/*                     <ul class="row" id="bx-pager">*/
/*                       <div class="col-md-offset-2 col-md-10 col-sm-12">*/
/*                         <div class="row">*/
/*                           {% if deal.image1!="" %}*/
/*                           <li class="col-xs-4 col-md-3">*/
/*                             <a data-slide-index="0" href=""><img*/
/*                               src="{{ asset(deal.image1| imagine_filter('thumbdetaildeal')) }}"*/
/*                               class="img-responsive "></a></li>{% endif %}*/
/* */
/*                               {% if deal.image2!="" %}*/
/*                               <li class="col-xs-4 col-md-3"><a data-slide-index="1"*/
/*                                href=""><img*/
/*                                src="{{ asset(deal.image2| imagine_filter('thumbdetaildeal')) }}"*/
/*                                class="img-responsive "></a></li>{% endif %}*/
/*                                {% if deal.image3!="" %}*/
/*                                <li class="col-xs-4 col-md-3"><a data-slide-index="2"*/
/*                                  href=""><img*/
/*                                  src="{{ asset(deal.image3| imagine_filter('thumbdetaildeal')) }}"*/
/*                                  class="img-responsive "></a></li>{% endif %}*/
/*                                </div>*/
/*                              </div>*/
/*                            </ul>*/
/*                          </div>*/
/* */
/*                          <div class="col-md-3 col-sm-12 product-det">*/
/*                           <div class="detailPrice">*/
/*                             <div class="row">*/
/*                               <div class="col-sm-12">{% if ref|length >1 %}<p class="dark-gray bold">Dès</p>{% endif %}</div>*/
/*                               <div class="col-md-9 col-sm-9 col-xs-12 text-center">*/
/*                                 {# <div class="price-big">*/
/*                                 <b></b>*/
/*                                 <p class="dark-gray bold">{{ ref[indexref].bigdealPrice|getBigfid }} <img*/
/*                                   src="{{ asset('public/images/btn.png') }}" alt="price" width="24"/></p><p class="teal">IGFid</p>*/
/*                                 </div>#}*/
/*                               </div>*/
/*                             </div>*/
/*                             <div class="row price">*/
/*                               <div class="col-sm-12 text-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer">*/
/*                                 <strong id="price-hover" data-html="true"*/
/*                                 data-toggle="tooltip"*/
/*                                 title="<p class='dark-gray bold'>{{ ref[indexref].bigdealPrice|getBigfid }} <i class='flaticon-computerchip'></i></p><p class='teal'>IGFid</p>"  itemprop="price">{{ ref[indexref].bigdealPrice }}*/
/*                                 <sup>DT</sup></strong>*/
/*                               </div>*/
/*                             </div>*/
/*                             <div class="row details">*/
/*                               <div class="col-md-4 col-sm-4 col-xs-4 valeur">*/
/*                                 <p class="dark-gray ">Valeur</p>*/
/*                                 <strong class="dark-gray ">{{ ref[indexref].shopPrice }}*/
/*                                   <sup>DT</sup></strong>*/
/*                                 </div>*/
/*                                 <div class="col-md-4 col-sm-4 col-xs-4 remise">*/
/*                                   <p class="dark-gray ">Remise</p>*/
/*                                   <strong class="dark-gray bold">{{ ref[indexref].shopPrice|getPourcentage(ref[indexref].bigdealPrice) }}*/
/*                                     %</strong>*/
/*                                   </div>*/
/*                                   <div class="col-md-4 col-sm-4 col-xs-4 economie">*/
/*                                     <p class="dark-gray ">économie</p>*/
/*                                     <strong class="dark-gray bold">{{ ref[indexref].shopPrice-ref[indexref].bigdealPrice }}*/
/*                                       <sup>DT</sup></strong>*/
/*                                     </div>*/
/* */
/*                                   </div>*/
/*                                 </div>*/
/*                                 <div class="row buy">*/
/*                                   <div class="col-md-12">*/
/*                                     {% if nbcoupon<deal.maxCouponUser %}*/
/*                                     {% if deal.id|verifExpire %}*/
/*                                     <p class="hidden-xs">*/
/*                                       <a href="javascript:void();"*/
/*                                       class="btn btn-teal no-bg"><i*/
/*                                       class="fa fa-exclamation-triangle pr-30"></i>Expiré</a>*/
/*                                       <!-- script get response popup deal passé -->*/
/*                                       <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3462403"></script>*/
/*                                       {% else %}*/
/* */
/*                                       {% if ref|length >1 %}*/
/*                                       <p class="hidden-xs"><a href="#" data-toggle="modal"*/
/*                                         data-target=".add-modal"*/
/*                                         class="btn btn-teal"><i*/
/*                                         class="flaticon-buy10"></i>J'achete</a>*/
/*                                       </p>*/
/*                                       <!-- Script GetResponse detail deal en cours 1-->*/
/*                                       <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/*                                       {% else %}*/
/*                                       {% if ref[indexref].maxCoupon ==0 %}*/
/*                                       <p class="hidden-xs">*/
/*                                         <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                         class="btn btn-teal"><i*/
/*                                         class="flaticon-buy10"></i>J'achete</a>*/
/*                                       </p>*/
/*                                       <!-- Script GetResponse detail deal en cours 2-->*/
/*                                       <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/*                                       {% elseif ref[indexref].maxCoupon > deal.id|nombreAcheteurs %}*/
/*                                       <p class="hidden-xs">*/
/*                                         <a  href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                         class="btn btn-teal"><i*/
/*                                         class="flaticon-buy10"></i>J'achete</a>*/
/*                                       </p>*/
/*                                       <!-- Script GetResponse detail deal en cours 3-->*/
/*                                       <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/*                                       {% else %}*/
/*                                       <p class="hidden-xs">*/
/*                                         <a href="javascript:void();"*/
/*                                         class="btn btn-teal no-bg"><i*/
/*                                         class="fa fa-cart-arrow-down"></i>Epuisé</a>*/
/*                                       </p>*/
/* */
/*                                       <p>*/
/*                                         {% endif %}*/
/*                                         {% endif %}*/
/*                                         {% endif %}*/
/*                                         {% if deal.id|verifExpire %}*/
/*                                         {% else %}*/
/* */
/*                                         <div class="dispoCount">*/
/*                                           <p class="dark-gray dispo">Disponible pour un temps*/
/*                                             limité ! </p>*/
/* */
/*                                             <p class="teal"><i*/
/*                                               class="flaticon-clock96"></i> <span*/
/*                                               id="countdown"></span></p>*/
/*                                             </div>*/
/*                                             {% endif %}*/
/*                                             {% elseif deal.maxCouponUser==0 and deal.id|verifExpire != 1 %}*/
/*                                             {% if ref|length >1 %}*/
/*                                             <p class="hidden-xs"><a href="#" data-toggle="modal"*/
/*                                               data-target=".add-modal"*/
/*                                               class="btn btn-teal"><i*/
/*                                               class="flaticon-buy10"></i>J'achete</a>*/
/*                                             </p>*/
/*                                             <!-- Script GetResponse detail deal en cours 4-->*/
/*                                             <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/*                                             {% else %}*/
/*                                             {% if ref[indexref].maxCoupon ==0 %}*/
/*                                             <p class="hidden-xs">*/
/*                                               <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                               class="btn btn-teal"><i*/
/*                                               class="flaticon-buy10"></i>J'achete</a>*/
/*                                             </p>*/
/*                                             <!-- Script GetResponse detail deal en cours 5-->*/
/*                                             <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/* */
/*                                             {% elseif ref[indexref].maxCoupon > deal.id|nombreAcheteurs %}*/
/*                                             <p class="hidden-xs">*/
/*                                               <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                               class="btn btn-teal"><i*/
/*                                               class="flaticon-buy10"></i>J'achete</a>*/
/*                                             </p>*/
/*                                             <!-- Script GetResponse detail deal en cours 6--> */
/*                                             <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BLRed&webforms_id=3460903"></script>*/
/*                                             {% else %}*/
/*                                             <p class="hidden-xs">*/
/*                                               <a href="javascript:void();"*/
/*                                               class="btn btn-teal no-bg"><i*/
/*                                               class="fa fa-cart-arrow-down"></i>Epuisé</a>*/
/*                                             </p>*/
/* */
/* */
/*                                             {% endif %}*/
/*                                             {% endif %}*/
/*                                             <div class="dispoCount">*/
/*                                               <p class="dark-gray dispo">Disponible pour un temps*/
/*                                                 limité !</p>*/
/* */
/*                                                 <p class="teal"><i class="flaticon-clock96"></i> <span*/
/*                                                   id="countdown"></span></p>*/
/*                                                 </div>*/
/*                                                 {% else %}*/
/*                                                 <p class="hidden-xs">*/
/*                                                   <a href="javascript:void();"*/
/*                                                   class="btn btn-teal no-bg"><i*/
/*                                                   class="fa fa-exclamation-triangle pr-30"></i>Expiré</a>*/
/*                                                 </p>*/
/*                                                 {% endif %}*/
/*                                                 {% if deal.id|verifExpire %}*/
/*                                                 <p class="dark-gray buyers">*/
/*                                                   <i class="flaticon-group2"></i>*/
/*                                                   {{ deal.id|nombreAcheteurs }} Acheteurs</p>*/
/*                                                   {% else %}*/
/*                                                   {% if deal.id|nombreAcheteurs >= deal.planning.defaultannexe.mincoupon %}*/
/*                                                   <p class="dark-gray buyers">*/
/* */
/*                                                     <i class="flaticon-group2"></i>*/
/*                                                     {{ deal.id|nombreAcheteurs }} Acheteurs*/
/*                                                   </p>*/
/*                                                   {% else %}*/
/*                                                   <!-- small box -->*/
/*                                                   <p class="dark-gray buyers">*/
/*                                                     <i class="flaticon-group2 teal"></i>*/
/*                                                     Encore {{ deal.planning.defaultannexe.mincoupon - deal.id|nombreAcheteurs }}*/
/*                                                     Participant(s) pour VALIDER LE DEAL*/
/*                                                   </p>*/
/*                                                   {% endif %}*/
/*                                                   {% endif %}*/
/*                                                   <p>*/
/*                                                    <a href="https://www.facebook.com/dialog/feed?app_id=831428680266309&link={{ urlFacebook }}&name={{ deal.title|replace({'&': 'et'}) }}&caption=bigdeal.tn&picture={{ asset(deal.image1| imagine_filter('sliddetaildeal'))|e('html_attr') }}*/
/*                                                    &redirect_uri={{ app.request.schemeAndHttpHost ~ path('deal_detail',  {'region':(deal.planning.regionId|getAlias),'categorie':(deal.planning.categoryId|getAlias), 'id': deal.id ,'name':(permelink|getAlias)}) }}&display=popup"*/
/*                                                    class="btn btn-facebook"><i class="fa fa-facebook"></i>Partagez*/
/*                                                    & Gagnez 20 BIGfid</a></p>*/
/*                                                    {% if reservation ==1 %}*/
/*                                                    <p><a target="_blank"*/
/*                                                     href="{{ path('disponibilite',{'id':deal.id}) }}"*/
/*                                                     class="btn blue-btn text-center">Disponibilités</a>*/
/*                                                   </p>*/
/* */
/*                                                   <p><a target="_blank"*/
/*                                                     href="{{ path('front_booking_step1') }}"*/
/*                                                     class="btn green-btn text-center">Réserver</a></p>*/
/*                                                     {% endif %}*/
/*                                                   </div>*/
/*                                                 </div>*/
/*                                               </div>*/
/*                                               <div class="clearfix"></div>*/
/*                                               <div class="offre">*/
/*                                                 <div class="row">*/
/*                                                   <div class="col-md-8 col-sm-12 offre-det">*/
/*                                                     {{ deal.description|raw }}*/
/* */
/* */
/* */
/*                                                     {% if deal.deal !='' %}*/
/* */
/*                                                     <h3 class="titleOffreDet">Le Deal :</h3>*/
/*                                                     <p itemprop="description" itemtype="http://schema.org/Product"> {{ deal.deal|raw }} </p><br/><br/>*/
/*                                                     {% endif %}*/
/* */
/*                                                     {% if deal.bigdeallike  !='' %}*/
/*                                                     <h3>BigDeal.tn aime :</h3>*/
/*                                                     {{ deal.bigdeallike|raw }}<br/><br/>*/
/*                                                     {% endif %}*/
/*                                                     {% if deal.youLike  !='' %}*/
/* */
/*                                                     <h3>Vous allez adorer :</h3>*/
/*                                                     {{ deal.youLike|raw }}<br/><br/>*/
/*                                                     {% endif %}*/
/*                                                     {% if deal.toBeClear  !='' %}*/
/* */
/*                                                     <h3>Conditions du deal :</h3>*/
/*                                                     {{ deal.toBeClear|raw }}<br/><br/>*/
/*                                                     {% endif %}*/
/* */
/* */
/* */
/*                                                     <h3>*/
/*                                                       {% set pointVente=deal.planning.defaultannexe.protocol.user.sellingpoint %}*/
/*                                                       {% if pointVente|length != 0 %}*/
/* */
/*                                                       {% if pointVente[0].visible == 0   %}*/
/*                                                       {% for item in pointVente %}*/
/*                                                       {{ item.name }} :<br/>*/
/*                                                       {% endfor %}*/
/*                                                       */
/*                                                       {% endif %}*/
/*                                                       {% endif %}*/
/*                                                       {#{ deal.planning.defaultannexe.protocol.user :}#} */
/*                                                     </h3>*/
/*                                                     {% set pointVente=deal.planning.defaultannexe.protocol.user.sellingpoint %}*/
/*                                                     {% set categ=deal.planning.defaultannexe.protocol.user.category %}*/
/*                                                     {% if pointVente|length != 0 %}*/
/* */
/*                                                     {% if pointVente[0].visible == 0   %}*/
/*                                                     {% for item in pointVente %}*/
/* */
/*                                                     {{ item.name }} est proposé dans la catégorie deal {{categ.name}} à {% if item.localite %} {{ item.localite.name }} {% endif %} </br></br>*/
/*                                                     {{ item.name }} est un marchand exclusif de BIGDeal</br>*/
/*                                                     {% endfor %}*/
/* */
/*                                                     {% endif %}*/
/*                                                     {% endif %}</br>*/
/* */
/* */
/*                                                     {#{ deal.planning.defaultannexe.protocol.user }#} */
/* */
/* */
/* */
/*                                                     {{ deal.strongpoint|raw }}*/
/* */
/* */
/* */
/*                                                     <!-- bloc adsense -->*/
/*                                                         <!-- <div class="top hidden-xs"> */
/*                                                             <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>*/
/*                                                             */
/*                                                             <ins class="adsbygoogle"*/
/*                                                                  style="display:inline-block;width:468px;height:60px"*/
/*                                                                  data-ad-client="ca-pub-4502360515267224"*/
/*                                                                  data-ad-slot="1040065191"></ins>*/
/*                                                             <script>*/
/*                                                             (adsbygoogle = window.adsbygoogle || []).push({});*/
/*                                                             </script>*/
/*                                                             */
/*                                                           </div> -->*/
/*                                                           <!-- end bloc adsense -->*/
/*                                                         </div>*/
/*                                                         <div class="col-md-4 offre-location" itemprop="brand" itemscope itemtype="http://schema.org/Organization">*/
/*                                                           <h2 itemprop="name">*/
/*                                                            {% set pointVente=deal.planning.defaultannexe.protocol.user.sellingpoint %}*/
/*                                                            {% if pointVente|length != 0 %}*/
/* */
/*                                                            {% if pointVente[0].visible == 0   %}*/
/*                                                            {% for item in pointVente %}*/
/*                                                            {{ item.name }}<br/>*/
/*                                                            {% endfor %}*/
/*                                                            {% else %}*/
/*                                                            {{ pointVente[0].visibleAdress }}*/
/*                                                            {% endif %}*/
/*                                                            {% endif %}*/
/*                                                            {#{ deal.planning.defaultannexe.protocol.user }#}*/
/* */
/*                                                          </h2>*/
/*                                                          {% if deal.planning.defaultannexe.protocol.user.webSite!="" %}*/
/*                                                          <a target="_blank"*/
/*                                                          href="{{ deal.planning.defaultannexe.protocol.user.webSite }}"*/
/*                                                          title=""*/
/*                                                          class="website"><i class="fa fa-globe"></i></a>*/
/*                                                          {% endif %}*/
/*                                                          {% if deal.planning.defaultannexe.protocol.user.fbpage!="" %}*/
/*                                                          <a target="_blank"*/
/*                                                          href="{{ deal.planning.defaultannexe.protocol.user.fbpage }}"*/
/*                                                          title=""*/
/*                                                          class="social"><i class="fa fa-facebook"></i></a>*/
/*                                                          {% endif %}                    */
/*                                                          {% set sellingpoint=deal.planning.defaultannexe.protocol.user.sellingpoint %}*/
/*                                                          {% if sellingpoint|length != 0 %}*/
/* */
/*                                                          {% set latitude = sellingpoint[0].latitude %}*/
/*                                                          {% set longitude = sellingpoint[0].longitude %}*/
/*                                                          {% if sellingpoint[0].visible == false %}*/
/*                                                          <a  target="_blank" href="https://www.google.fr/maps/dir//{{ latitude }},{{ longitude }}" title="Iténiraire" class="social social2"><i*/
/*                                                           class="fa fa-map-marker teal"></i></a>*/
/*                                                           {% endif %}*/
/*                                                           {% endif %}*/
/*                                                           <p class="address">*/
/*                                                             <strong>Adresse: </strong>*/
/*                                                             {% if sellingpoint|length != 0 %}*/
/* */
/*                                                             {% if sellingpoint[0].visible == 0 %}*/
/*                                                             {% for item in sellingpoint %}*/
/*                                                             {{ item.adress }} {% if item.localite %}- {{ item.localite.name }}- {{ item.localite.cp }} {% endif %}*/
/*                                                             <br/>*/
/*                                                             <strong>Horaires:</strong>*/
/*                                                             <table border="0" width="100%">*/
/*                                                               {% if sellingpoint[0].schedule[0] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[0].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if  sellingpoint[0].schedule[0].openTimeMorning|date('H:i') != sellingpoint[0].schedule[0].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[0].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[0].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if  sellingpoint[0].schedule[0].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[0].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[0].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[0].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[1] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[1].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[1].openTimeMorning|date('H:i') !=  sellingpoint[0].schedule[1].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[1].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[1].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[1].openTimeAfternoon|date('H:i') !=  sellingpoint[0].schedule[1].closeTimeAfternoon|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[1].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[1].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[2] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[2].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[2].openTimeMorning|date('H:i') !=  sellingpoint[0].schedule[2].closeTimeMorning|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[2].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[2].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[2].openTimeAfternoon|date('H:i') !=  sellingpoint[0].schedule[2].closeTimeAfternoon|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[2].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[2].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[3] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[3].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[3].openTimeMorning|date('H:i') != sellingpoint[0].schedule[3].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[3].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[3].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[3].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[3].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[3].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[3].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[4] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[4].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[4].openTimeMorning|date('H:i') != sellingpoint[0].schedule[4].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[4].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[4].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[4].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[4].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[4].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[4].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[5] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[5].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[5].openTimeMorning|date('H:i') != sellingpoint[0].schedule[5].closeTimeMorning|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[5].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[5].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[5].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[5].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[5].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[5].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[6] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[6].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[6].openTimeMorning|date('H:i') != sellingpoint[0].schedule[6].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[6].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[6].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[6].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[6].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[6].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[6].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/* */
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                             </table>*/
/*                                                             {% endfor %}<br>*/
/*                                                             {% else %}*/
/*                                                             {{ sellingpoint[0].visibleAdress }}<br>*/
/*                                                             <table border="0" width="100%">*/
/*                                                               {% if sellingpoint[0].schedule[0] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[0].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if  sellingpoint[0].schedule[0].openTimeMorning|date('H:i') != sellingpoint[0].schedule[0].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[0].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[0].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if  sellingpoint[0].schedule[0].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[0].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[0].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[0].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[1] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[1].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[1].openTimeMorning|date('H:i') !=  sellingpoint[0].schedule[1].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[1].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[1].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[1].openTimeAfternoon|date('H:i') !=  sellingpoint[0].schedule[1].closeTimeAfternoon|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[1].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[1].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[2] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[2].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[2].openTimeMorning|date('H:i') !=  sellingpoint[0].schedule[2].closeTimeMorning|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[2].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[2].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[2].openTimeAfternoon|date('H:i') !=  sellingpoint[0].schedule[2].closeTimeAfternoon|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[2].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[2].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[3] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[3].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[3].openTimeMorning|date('H:i') != sellingpoint[0].schedule[3].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[3].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[3].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[3].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[3].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[3].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[3].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[4] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[4].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[4].openTimeMorning|date('H:i') != sellingpoint[0].schedule[4].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[4].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[4].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[4].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[4].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[4].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[4].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[5] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[5].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[5].openTimeMorning|date('H:i') != sellingpoint[0].schedule[5].closeTimeMorning|date('H:i') %}*/
/* */
/*                                                                   {{ sellingpoint[0].schedule[5].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[5].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[5].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[5].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[5].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[5].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                               {% if sellingpoint[0].schedule[6] is defined %}*/
/*                                                               <tr>*/
/*                                                                 <td><strong>{{ sellingpoint[0].schedule[6].day }}</strong></td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[6].openTimeMorning|date('H:i') != sellingpoint[0].schedule[6].closeTimeMorning|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[6].openTimeMorning|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[6].closeTimeMorning|date('H:i') }}*/
/*                                                                   {% endif %}*/
/*                                                                 </td>*/
/*                                                                 <td>*/
/*                                                                   {% if sellingpoint[0].schedule[6].openTimeAfternoon|date('H:i') != sellingpoint[0].schedule[6].closeTimeAfternoon|date('H:i') %}*/
/*                                                                   {{ sellingpoint[0].schedule[6].openTimeAfternoon|date('H:i') }}*/
/*                                                                   à {{ sellingpoint[0].schedule[6].closeTimeAfternoon|date('H:i') }}*/
/*                                                                   {% endif %}*/
/* */
/*                                                                 </td>*/
/*                                                               </tr>{% endif %}*/
/*                                                             </table>*/
/*                                                             {% endif %}*/
/*                                                             {% endif %}*/
/*                                                             */
/*                                                             <br>*/
/* */
/*                                                           </p>*/
/*                                                           <div class="map">*/
/*                                                             <div id="map-canvas"*/
/*                                                             style="width: 100%; height: 250px;"></div>*/
/*                                                           </div>*/
/* */
/*                                                           <div class="popularometre" >*/
/*                                                             <h3>Popularomètre <span>BIGDeal</span></h3>*/
/* */
/*                                                             <p>Note: <span>{# include 'DCSRatingBundle:Rating:rating.html.twig' with {'id' : deal.id} #}*/
/*                                                               {% include 'MainRatingclientBundle:Rating:control.html.twig' with {'id' : deal.id, 'role' : 'ROLE_CLIENT'} %}</span>*/
/*                                                               <span> <a href="#mon_ancre"*/
/*                                                                 class="dark-gray"> {{ nbvote }}Avis</a></span>*/
/*                                                               </p>*/
/*                                                               <ul>*/
/* */
/*                                                                 <li>*/
/*                                                                   <label class="label gray-label">{{ "%05d"|format(CouponConsomer) }}</label><span>membres ont <strong>visité</strong> ce Partenaire </span>*/
/*                                                                 </li>*/
/*                                                                 <li>*/
/*                                                                   <label class="label gray-label">{{ "%05d"|format(nbvote3) }}</label><span>membres sont <strong>satisfait </strong>*/
/* */
/*                                                                 </span>*/
/*                                                               </li>*/
/*                                                               <li>*/
/*                                                                 <a href="#"*/
/*                                                                 data-toggle="modal"*/
/*                                                                 data-target=".commentpartner"*/
/*                                                                 class="dark-gray">Voir tout les avis sur ce marchand</a>*/
/*                                                               </li>*/
/*                                                             </ul>*/
/*                                                           </div>*/
/*                                                           <!-- bloc femme de tunisie -->*/
/*                                                           <div>*/
/*                                                             <iframe width="250" height="250" frameborder="0" scrolling="no" src="https://femmesdetunisie.com/site-2/"></iframe>*/
/*                                                           </div>*/
/* */
/*                                                         </div>*/
/*                                                       </div>*/
/*                                                     </div>*/
/*                                                     <div id="comment" class="offre-comments">*/
/*                                                       {% for type, flashMessages in app.session.flashbag.all() %}*/
/*                                                       {% for flashMessage in flashMessages %}*/
/*                                                       <br/>*/
/*                                                       <div class="alert {{ type }}">*/
/*                                                         <button data-dismiss="alert" class="close" type="button">×*/
/*                                                         </button>*/
/*                                                         {{ flashMessage|trans }}*/
/*                                                       </div>*/
/*                                                       {% endfor %}*/
/*                                                       {% endfor %}*/
/*                                                       <div class="row">*/
/*                                                         <div class="col-md-12 col-sm-12 title">*/
/*                                                           <h3 id="mon_ancre">Commentaires</h3>*/
/*                                                         </div>*/
/*                                                       </div>*/
/* */
/* */
/*                                                       {% for item in commentaire %}*/
/*                                                       <div class="row comments">*/
/*                                                         <div class="col-md-1 col-sm-1 col-xs-3 text-left">*/
/*                                                           {% if item.voter.fbid!="" %}*/
/*                                                           <img src="https://graph.facebook.com/v2.3/{{ item.voter.fbid }}/picture?width=80&height=80"*/
/*                                                           alt="">*/
/*                                                           {% else %}*/
/*                                                           <img src="{{ asset('public/images/profile-no-picture.png') }}"*/
/*                                                           alt="">*/
/*                                                           {% endif %}*/
/*                                                         </div>*/
/*                                                         <div class="col-md-11 col-sm-11 col-xs-9">*/
/*                                                           <div class="row">*/
/*                                                             <div class="col-sm-12 col-xs-12">*/
/*                                                               <strong>{{ item.voter }}</strong>*/
/*                                                             </div>*/
/*                                                             <div class="col-sm-12 col-xs-12">*/
/*                                                               <strong>Avis</strong>*/
/*                                                               {% for i in 1..5 %}*/
/*                                                               {% set style = 'fa fa-star-o' %}*/
/*                                                               {% if i <= item.value %}*/
/*                                                               {% set style = 'fa fa-star' %}*/
/*                                                               {% else %}*/
/*                                                               {% set style = item.value|isHalfStar(i) ? 'fa fa-star-half-o' %}*/
/*                                                               {% endif %}*/
/*                                                               {% if style == '' %}*/
/*                                                               {% set style = 'fa fa-star-o' %}*/
/*                                                               {% endif %}*/
/*                                                               <span class="{{ style }}"></span>*/
/*                                                               {% endfor %}*/
/*                                                             </div>*/
/*                                                             <div class="col-sm-12 col-xs-12">{{ item.dcr|date('d/m/Y') }}</div>*/
/*                                                           </div>*/
/* */
/*                                                           <p>{{ item.comment|raw }}</p>*/
/*                                                         </div>*/
/*                                                       </div>*/
/* */
/*                                                       {% if pagercomment==1 %}*/
/*                                                       <div class="last"><a*/
/*                                                         href="{{ path('pager_deal_comment',{'id':deal.id,'page':2}) }}"*/
/*                                                         style="display: none;">next</a></div>*/
/*                                                         {% endif %}*/
/*                                                         {% endfor %}*/
/*                                                         {% if testfrm==1 %}*/
/*                                                         {{ form_start(form, {'method': 'POST','attr': {'class': 'validatedForm'}}) }}*/
/* */
/*                                                         <div class="row comments">*/
/*                                                           <div class="col-md-1 col-sm-1 col-xs-3 text-left">*/
/* */
/*                                                             {% if app.user.fbid!="" %}*/
/*                                                             <img src="https://graph.facebook.com/v2.3/{{ app.user.fbid }}/picture?width=80&height=80"*/
/*                                                             alt="">*/
/*                                                             {% else %}*/
/*                                                             <img src="{{ asset('public/images/profile-no-picture.png') }}"*/
/*                                                             alt="">*/
/*                                                             {% endif %}*/
/*                                                           </div>*/
/*                                                           <div class="col-md-11 col-sm-11 col-xs-9">*/
/*                                                             <div class="row">*/
/*                                                               <div class="col-sm-12"><strong>{{ app.user }}</strong>*/
/*                                                               </div>*/
/*                                                             </div>*/
/* */
/*                                                             <div class="row">*/
/*                                                               <div class="col-sm-12 col-xs-12">*/
/*                                                                 {{ form_widget(form.comment, { 'attr': {'class': "form-control"} }) }}*/
/*                                                                 {{ form_widget(form.value, { 'attr': {'class': "form-control",*/
/*                                                                 "data-max":5,*/
/*                                                                 "data-min":1,*/
/*                                                                 "data-icon-lib":"fa" ,*/
/*                                                                 "data-active-icon":"fa-star" ,*/
/*                                                                 "data-inactive-icon":"fa-star-o" ,*/
/*                                                                 "data-clearable-icon":"fa-trash-o"*/
/* */
/*                                                               } }) }}*/
/*                                                             </div>*/
/*                                                           </div>*/
/*                                                           <div class="col-sm-12 col-xs-12 text-right">*/
/*                                                             {% if testfrm==1 %}*/
/*                                                             <input class="btn btn-comment" type="submit"*/
/*                                                             value="Commenter">*/
/*                                                             {% endif %}*/
/*                                                           </div>*/
/*                                                         </div>*/
/*                                                       </div>*/
/* */
/*                                                       {{ form_widget(form._token) }}*/
/*                                                       {{ form_end(form) }}*/
/*                                                       {% else %}*/
/*                                                       <div class="alert alert-danger">Vous devez passer une commande pour*/
/*                                                         pouvoir laisser un commentaire*/
/*                                                       </div>*/
/*                                                       {% endif %}*/
/*                                                     </div>*/
/*                                                     <!-- Fixed Mobile Buy button -->*/
/*                                                     <div class="fixed-buy product-det mobile-visible">*/
/*                                                       <div class="col-sm-12 buy">*/
/*                                                         {% if nbcoupon<deal.maxCouponUser %}*/
/*                                                         {% if deal.id|verifExpire %}*/
/*                                                         <p>*/
/*                                                           <a href="javascript:void();"*/
/*                                                           class="btn btn-teal no-bg"><i*/
/*                                                           class="fa fa-exclamation-triangle pr-30"></i>Expiré</a>*/
/*                                                           {% else %}*/
/*                                                           {% if ref|length >1 %}*/
/*                                                           <p><a href="#" data-toggle="modal"*/
/*                                                             data-target=".add-modal" class="btn btn-teal"><i*/
/*                                                             class="flaticon-buy10"></i>J'achete</a>*/
/*                                                           </p>*/
/*                                                           {% else %}*/
/*                                                           {% if ref[indexref].maxCoupon ==0 %}*/
/*                                                           <p>*/
/*                                                            <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                                            class="btn btn-teal"><i*/
/*                                                            class="flaticon-buy10"></i>J'achete</a>*/
/*                                                          </p>*/
/* */
/*                                                          {% elseif ref[indexref].maxCoupon > deal.id|nombreAcheteurs %}*/
/*                                                          <p>*/
/*                                                            <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                                            class="btn btn-teal"><i*/
/*                                                            class="flaticon-buy10"></i>J'achete</a>*/
/*                                                          </p>*/
/*                                                          {% else %}*/
/*                                                          <p>*/
/*                                                           <a href="javascript:void();"*/
/*                                                           class="btn btn-teal no-bg"><i*/
/*                                                           class="fa fa-cart-arrow-down"></i>Epuisé</a>*/
/*                                                         </p>*/
/* */
/*                                                         <p>*/
/*                                                           {% endif %}*/
/*                                                           {% endif %}*/
/*                                                           {% endif %}*/
/*                                                           {% if deal.id|verifExpire %}*/
/*                                                           {% else %}*/
/* */
/* */
/* */
/*                                                           {% endif %}*/
/*                                                           {% elseif deal.maxCouponUser==0  and deal.id|verifExpire != 1  %}*/
/*                                                           {% if ref|length >1 %}*/
/*                                                           <p><a href="#" data-toggle="modal" data-target=".add-modal"*/
/*                                                             class="btn btn-teal"><i class="flaticon-buy10"></i>J'achete</a>*/
/*                                                           </p>*/
/*                                                           {% else %}*/
/*                                                           {% if ref[indexref].maxCoupon ==0 %}*/
/*                                                           <p>*/
/*                                                             <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                                             class="btn btn-teal"><i*/
/*                                                             class="flaticon-buy10"></i>J'achete</a>*/
/*                                                           </p>*/
/* */
/*                                                           {% elseif ref[indexref].maxCoupon > deal.id|nombreAcheteurs %}*/
/*                                                           <p>*/
/*                                                             <a href="{{ path('jachetelist',{'deal':deal.id ,'id':ref[indexref].id}) }}"*/
/*                                                             class="btn btn-teal"><i*/
/*                                                             class="flaticon-buy10"></i>J'achete</a>*/
/*                                                           </p>*/
/*                                                           {% else %}*/
/*                                                           <p>*/
/*                                                             <a href="javascript:void();"*/
/*                                                             class="btn btn-teal no-bg"><i*/
/*                                                             class="fa fa-cart-arrow-down"></i>Epuisé</a>*/
/*                                                           </p>*/
/* */
/*                                                           <p>*/
/*                                                             {% endif %}*/
/*                                                             {% endif %}*/
/* */
/* */
/*                                                             {% else %}*/
/*                                                             <p><a href="javascript:void();"*/
/*                                                              class="btn btn-teal no-bg"><i*/
/*                                                              class="fa fa-cart-arrow-down"></i>Epuisé</a></p>*/
/*                                                              {% endif %}*/
/*                                                            </div>*/
/*                                                          </div>*/
/*                                                          <!-- End Fixed Mobile Buy button -->*/
/*                                                        </div>*/
/*                                                        <!-- modal -->*/
/* */
/*                                                        <div class="modal fade commentpartner" tabindex="-1" role="dialog"*/
/*                                                        aria-labelledby="myModalLabel" aria-hidden="true">*/
/*                                                        <div class="modal-dialog" style="width:60%">*/
/*                                                         <div class="modal-content">*/
/*                                                           <div class="modal-header">*/
/*                                                             <button type="button" class="close" data-dismiss="modal"*/
/*                                                             aria-label="Close"><span*/
/*                                                             aria-hidden="true"><i*/
/*                                                             class="fa fa-close"></i></span></button>*/
/*                                                             <h4 class="modal-title">Les commentaires du*/
/*                                                               partenaire {{ deal.planning.defaultannexe.protocol.user }}</h4>*/
/*                                                             </div>*/
/*                                                             <div class="modal-body">*/
/*                                                               <iframe src="{{ path('pager_deal_allcomment',{'id':deal.id}) }}"*/
/*                                                               style="zoom:0.60" width="100%" height="500"*/
/*                                                               frameborder="0"></iframe>*/
/* */
/* */
/*                                                             </div>*/
/* */
/*                                                           </div>*/
/*                                                         </div>*/
/*                                                       </div>*/
/* */
/*                                                       <div class="modal fade add-modal" tabindex="-1" role="dialog"*/
/*                                                       aria-labelledby="myModalLabel" aria-hidden="true">*/
/*                                                       <div class="modal-dialog">*/
/*                                                         <div class="modal-content">*/
/*                                                           <div class="modal-header">*/
/*                                                             <button type="button" class="close" data-dismiss="modal"*/
/*                                                             aria-label="Close"><span*/
/*                                                             aria-hidden="true"><i*/
/*                                                             class="fa fa-close"></i></span></button>*/
/*                                                             <h4 class="modal-title">Choisir une offre</h4>*/
/*                                                           </div>*/
/*                                                           <div class="modal-body">*/
/* */
/* */
/*                                                             <div class="">*/
/*                                                               <table class="table table-striped">*/
/*                                                                 <thead>*/
/*                                                                   <tr>*/
/*                                                                     <th>Offres</th>*/
/*                                                                     <th>Prix</th>*/
/*                                                                     <th></th>*/
/*                                                                   </tr>*/
/*                                                                 </thead>*/
/*                                                                 <tbody>*/
/*                                                                   {% for item in ref %}*/
/*                                                                   <tr>*/
/*                                                                     <td>{{ item.title }}</td>*/
/* */
/*                                                                     <td>{{ item.bigdealPrice }} <sup>TND</sup></td>*/
/* */
/*                                                                     <td>*/
/*                                                                       {% if item.maxCoupon ==0 %}*/
/*                                                                       <a href="{{ path('jachetelist',{'deal':deal.id ,'id':item.id}) }}"*/
/*                                                                       title="J’ACHETE"*/
/*                                                                       class="btn btn-buy pull-right">J’ACHETE</a>*/
/*                                                                       {% elseif item.maxCoupon > item.id|nombreAcheteursReference %}*/
/* */
/*                                                                       <a href="{{ path('jachetelist',{'deal':deal.id ,'id':item.id}) }}"*/
/*                                                                       title="J’ACHETE"*/
/*                                                                       class="btn btn-buy pull-right">J’ACHETE</a>*/
/*                                                                       {% else %}*/
/*                                                                       <a href="javascript:void();"*/
/*                                                                       title="Epuisé"*/
/*                                                                       class="btn btn-primary no-bg pull-right"><i*/
/*                                                                       class="fa fa-cart-arrow-down pr-10"></i>Epuisé</a>*/
/*                                                                       {% endif %}*/
/*                                                                     </td>*/
/* */
/*                                                                   </tr>*/
/*                                                                   {% endfor %}*/
/*                                                                 </tbody>*/
/*                                                               </table>*/
/*                                                             </div>*/
/* */
/* */
/*                                                           </div>*/
/*                                                           <div class="modal-footer">*/
/*                                                             <a type="button" class="btn btn-default" data-dismiss="modal">Annuler</a>*/
/* */
/*                                                           </div>*/
/*                                                         </div>*/
/*                                                       </div>*/
/*                                                     </div>*/
/* */
/*                                                     {% endblock %}*/
/* */
