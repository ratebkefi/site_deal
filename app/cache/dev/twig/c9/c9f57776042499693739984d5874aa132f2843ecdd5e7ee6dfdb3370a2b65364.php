<?php

/* ::base.html.twig */
class __TwigTemplate_28c7573564b8534e57ed52b695aab4fdb9caf614cecf968793e1429fce584686 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'description' => array($this, 'block_description'),
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\" class=\"no-js\">
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo " </title>
    <meta name=\"description\" content=\"";
        // line 9
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">


    ";
        // line 13
        $this->displayBlock('head', $context, $blocks);
        // line 15
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
    <!-- Font-awesome Icons -->
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/simplemenu.css"), "html", null, true);
        echo "\">
    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/storelocator.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/flexslider.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/style.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/select2.min.css"), "html", null, true);
        echo "\">
    <link rel=\"canonical\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method")), "html", null, true);
        echo "\" />
    

    <style>
        .dropdown-menu > li > a{
            white-space: normal;
        }
    </style>
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->



    ";
        // line 40
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 42
        echo "\t
\t

\t
\t<!-- Script Pixel Facebook  -->
\t <script>
\t (function() {
\t\t\tvar _fbq = window._fbq || (window._fbq = []);
\t\t\tif (!_fbq.loaded) {
\t\t\tvar fbds = document.createElement('script');
\t\t\tfbds.async = true;
\t\t\tfbds.src = '//connect.facebook.net/en_US/fbds.js';
\t\t\tvar s = document.getElementsByTagName('script')[0];
\t\t\ts.parentNode.insertBefore(fbds, s);
\t\t\t_fbq.loaded = true;
\t\t\t}
\t\t\t_fbq.push(['addPixelId', '798395716878981']);
\t\t\t})();
\t\t\twindow._fbq = window._fbq || [];
\t\t\twindow._fbq.push(['track', 'PixelInitialized', {}]);
\t</script>
\t<noscript><img height=\"1\" width=\"1\" alt=\"\" style=\"display:none\" src=\"https://www.facebook.com/tr?id=798395716878981&amp;ev=PixelInitialized\" /></noscript>
\t

</head>


<body>
<div class=\"wrapper container\">

    ";
        // line 72
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("MainFrontBundle:Default:header"));
        echo "
    <!-- END HEADER -->
    <!--PUB -->

    <div id=\"content\">
        <div class=\"row hidden-xs\">
        <div class=\"col-md-12 col-sm-12 col-xs-12\">
        ";
        // line 79
        $context["bann"] = $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("MainFrontBundle:Default:banner", array("type" => 1)));
        // line 80
        echo "        ";
        echo (isset($context["bann"]) ? $context["bann"] : null);
        echo "</div></div>
        ";
        // line 81
        ob_start();
        $this->displayBlock('body', $context, $blocks);
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 82
        echo "    </div>
</div>
    ";
        // line 84
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("MainFrontBundle:Default:footer"));
        echo "
</div>
<!-- /container -->

<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/modernizr-custom.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery-migrate-1.2.1.min.js"), "html", null, true);
        echo "\"></script>
<!-- Latest compiled and minified JavaScript -->
<script src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/select2.full.js"), "html", null, true);
        echo "\"></script>
<!-- Include Thumbelina script. -->
<script type=\"text/javascript\" src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery.flexslider-min.js"), "html", null, true);
        echo "\"></script>
<!-- Main JS -->
<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAKO3TfHhcs6aF7q_XFZf8L3QavfVOKRZU&sensor=true\"
        type=\"text/javascript\"></script>
<script type=\"text/javascript\">

    var pathregion=\"";
        // line 101
        echo $this->env->getExtension('routing')->getPath("ajx_region_deal");
        echo "\";
</script>
  
";
        // line 104
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "37790b0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_37790b0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/37790b0_bootstrap-typeahead.min_1.js");
            // line 105
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "37790b0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_37790b0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/37790b0.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 107
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "region"), "method")) == 0)) {
            // line 108
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "0ebe4b4_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0ebe4b4_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/0ebe4b4_region_1.js");
                // line 109
                echo "<script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
                echo "\"></script>
";
            } else {
                // asset "0ebe4b4"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0ebe4b4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/0ebe4b4.js");
                echo "<script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
                echo "\"></script>
";
            }
            unset($context["asset_url"]);
        }
        // line 112
        echo "
<script type=\"text/javascript\">

    \$('#searchtop').typeahead({
        onSelect: function(item) {

            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 120
        echo $this->env->getExtension('routing')->getPath("ajxdeallink");
        echo "\",
                data: \"id=\"+item.value,
                success: function(msg){
                    \$(location).attr('href',msg);
                }
            });
        },
        ajax: {
            url: '";
        // line 128
        echo $this->env->getExtension('routing')->getPath("ajxdealtop");
        echo "',
            triggerLength: 1
        },
        afterSelect: function (item) {
            //save the id value into the hidden field

        },
        displayField: 'full_name'

    });

    \$(document).ready(function() { \$(\"#js-example-basic-single\").select2(); });
    \$( \"#js-example-basic-single\" ).change(function() {
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 143
        echo $this->env->getExtension('routing')->getPath("ajxsetregion");
        echo "\",
            data: \"id=\"+\$( \"#js-example-basic-single option:selected\" ).text(),
            success: function(msg){
\t\t\tvar regionId = \$( \"#js-example-basic-single\").val();
\t\t\tvar regionName = \$( \"#js-example-basic-single option:selected\" ).text();
\t\t\t
\t\tif(regionId==1)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/1/regions/grand-tunis.html\";
\t\t}
\t\tif(regionId==2)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/2/regions/sahel.html\";
\t\t}
\t\tif(regionId==3)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/3/regions/cap-bon.html\";
\t\t}
        if(regionId==4)
        {
            window.location.href =\"https://www.bigdeal.tn/4/regions/sfax.html\";
        }
\t\tif(regionId==0)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/0/regions/toutes-les-regions.html\";
\t\t}
\t
            }

        });
    });

    function hidethisadds(id){
        globan=\$('#banner'+id).parent();
        globan.html(\"\");
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 180
        echo $this->env->getExtension('routing')->getPath("hide_banner");
        echo "\",
            data: \"id=\"+id,
            success: function(msg){


            }
        });
    }
    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
\t  \$(\"body\").addClass(\"mac\");
\t} else {
\t  \$(\"body\").addClass(\"pc\");
\t}
    </script>
    <script src=\"";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/simplemenu.js"), "html", null, true);
        echo "\"></script>
    <script>
  \t\t\$('#mobile-searchtop').typeahead({
        onSelect: function(item) {

            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 201
        echo $this->env->getExtension('routing')->getPath("ajxdeallink");
        echo "\",
                data: \"id=\"+item.value,
                success: function(msg){
                    \$(location).attr('href',msg);
                }
            });
        },
        ajax: {
            url: '";
        // line 209
        echo $this->env->getExtension('routing')->getPath("ajxdealtop");
        echo "',
            triggerLength: 1
        },
        afterSelect: function (item) {
            //save the id value into the hidden field

        },
        displayField: 'full_name'

    });

    \$(document).ready(function() { \$(\"#js-example-basic-single2\").select2(); });
    \$( \"#js-example-basic-single2\" ).change(function() {
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 224
        echo $this->env->getExtension('routing')->getPath("ajxsetregion");
        echo "\",
            data: \"id=\"+\$( \"#js-example-basic-single2 option:selected\" ).text(),
            success: function(msg){ 
\t\t\tvar regionId = \$( \"#js-example-basic-single2\").val();
\t\t\tvar regionName = \$( \"#js-example-basic-single2 option:selected\" ).text();
\t\t\t
\t\tif(regionId==1)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/1/regions/grand-tunis.html\";
\t\t}
\t\tif(regionId==2)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/2/regions/sahel.html\";
\t\t}
\t\tif(regionId==3)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/3/regions/cap-bon.html\";
\t\t}
        if(regionId==4)
        {
            window.location.href =\"https://www.bigdeal.tn/4/regions/sfax.html\";
        }
\t\tif(regionId==0)
\t\t{
\t\t\twindow.location.href =\"https://www.bigdeal.tn/0/regions/toutes-les-regions.html\";
\t\t}
            }

        });
    });
  \t\t
\t</script>
\t
\t
\t<!-- Script Google Analytics  -->
\t<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-30376566-1', 'auto');
      ga('send', 'pageview');

    </script>
";
        // line 269
        $this->displayBlock('javascripts', $context, $blocks);
        // line 271
        echo "<script type=\"text/javascript\">
/* <![CDATA[ */
var google_conversion_id = 1019229954;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">
</script>
<noscript>
<div style=\"display:inline;\">
<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//googleads.g.doubleclick.net/pagead/viewthroughconversion/1019229954/?value=0&amp;guid=ON&amp;script=0\"/>
</div>
</noscript>
</body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "BIGDeal : tous les deals en Tunisie .";
    }

    // line 9
    public function block_description($context, array $blocks = array())
    {
        echo "BIGDeal - Les meilleurs deals en Tunisie";
    }

    // line 13
    public function block_head($context, array $blocks = array())
    {
        // line 14
        echo "    ";
    }

    // line 40
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 41
        echo "    ";
    }

    // line 81
    public function block_body($context, array $blocks = array())
    {
    }

    // line 269
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  478 => 269,  473 => 81,  469 => 41,  466 => 40,  462 => 14,  459 => 13,  453 => 9,  447 => 8,  427 => 271,  425 => 269,  377 => 224,  359 => 209,  348 => 201,  338 => 194,  321 => 180,  281 => 143,  263 => 128,  252 => 120,  242 => 112,  227 => 109,  223 => 108,  221 => 107,  207 => 105,  203 => 104,  197 => 101,  188 => 95,  183 => 93,  179 => 92,  174 => 90,  170 => 89,  166 => 88,  159 => 84,  155 => 82,  151 => 81,  146 => 80,  144 => 79,  134 => 72,  102 => 42,  100 => 40,  82 => 25,  78 => 24,  74 => 23,  70 => 22,  66 => 21,  62 => 20,  57 => 18,  53 => 17,  47 => 15,  45 => 13,  38 => 9,  34 => 8,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="fr" class="no-js">*/
/* <head>*/
/* */
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">*/
/*     <title>{% block title %}BIGDeal : tous les deals en Tunisie .{% endblock %} </title>*/
/*     <meta name="description" content="{% block description %}BIGDeal - Les meilleurs deals en Tunisie{% endblock %}">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/* */
/* */
/*     {% block head %}*/
/*     {% endblock %}*/
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>*/
/*     <!-- Font-awesome Icons -->*/
/*     <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">*/
/*     <link rel="stylesheet" href="{{ asset('public/css/simplemenu.css') }}">*/
/*     <!-- Latest compiled and minified CSS -->*/
/*     <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">*/
/*     <link rel="stylesheet" type="text/css" href="{{ asset('public/css/storelocator.css') }}" />*/
/*     <link rel="stylesheet" href="{{ asset('public/css/flexslider.css') }}">*/
/*     <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">*/
/*     <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">*/
/*     <link rel="canonical" href="{{ url(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')) }}" />*/
/*     */
/* */
/*     <style>*/
/*         .dropdown-menu > li > a{*/
/*             white-space: normal;*/
/*         }*/
/*     </style>*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* */
/* */
/*     {% block stylesheets %}*/
/*     {% endblock %}*/
/* 	*/
/* 	*/
/* */
/* 	*/
/* 	<!-- Script Pixel Facebook  -->*/
/* 	 <script>*/
/* 	 (function() {*/
/* 			var _fbq = window._fbq || (window._fbq = []);*/
/* 			if (!_fbq.loaded) {*/
/* 			var fbds = document.createElement('script');*/
/* 			fbds.async = true;*/
/* 			fbds.src = '//connect.facebook.net/en_US/fbds.js';*/
/* 			var s = document.getElementsByTagName('script')[0];*/
/* 			s.parentNode.insertBefore(fbds, s);*/
/* 			_fbq.loaded = true;*/
/* 			}*/
/* 			_fbq.push(['addPixelId', '798395716878981']);*/
/* 			})();*/
/* 			window._fbq = window._fbq || [];*/
/* 			window._fbq.push(['track', 'PixelInitialized', {}]);*/
/* 	</script>*/
/* 	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=798395716878981&amp;ev=PixelInitialized" /></noscript>*/
/* 	*/
/* */
/* </head>*/
/* */
/* */
/* <body>*/
/* <div class="wrapper container">*/
/* */
/*     {{ render(controller('MainFrontBundle:Default:header')) }}*/
/*     <!-- END HEADER -->*/
/*     <!--PUB -->*/
/* */
/*     <div id="content">*/
/*         <div class="row hidden-xs">*/
/*         <div class="col-md-12 col-sm-12 col-xs-12">*/
/*         {% set bann=render(controller('MainFrontBundle:Default:banner', { 'type': 1 })) %}*/
/*         {{ bann|raw }}</div></div>*/
/*         {% spaceless %}{% block body %}{% endblock %}{% endspaceless %}*/
/*     </div>*/
/* </div>*/
/*     {{ render(controller('MainFrontBundle:Default:footer')) }}*/
/* </div>*/
/* <!-- /container -->*/
/* */
/* <script src="{{ asset('public/js/modernizr-custom.js') }}"></script>*/
/* <script src="{{ asset('public/js/jquery-1.11.3.min.js') }}"></script>*/
/* <script src="{{ asset('public/js/jquery-migrate-1.2.1.min.js') }}"></script>*/
/* <!-- Latest compiled and minified JavaScript -->*/
/* <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>*/
/* <script src="{{ asset('public/js/select2.full.js') }}"></script>*/
/* <!-- Include Thumbelina script. -->*/
/* <script type="text/javascript" src="{{ asset('public/js/jquery.flexslider-min.js') }}"></script>*/
/* <!-- Main JS -->*/
/* <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKO3TfHhcs6aF7q_XFZf8L3QavfVOKRZU&sensor=true"*/
/*         type="text/javascript"></script>*/
/* <script type="text/javascript">*/
/* */
/*     var pathregion="{{ path('ajx_region_deal') }}";*/
/* </script>*/
/*   */
/* {% javascripts '@MainFrontBundle/Resources/public/js/bootstrap-typeahead.min.js' %}*/
/* <script type="text/javascript" src="{{ asset_url }}"></script>*/
/* {% endjavascripts %}*/
/* {% if app.session.get('region')|length==0  %}*/
/* {% javascripts '@MainFrontBundle/Resources/public/js/region.js' %}*/
/* <script type="text/javascript" src="{{ asset_url }}"></script>*/
/* {% endjavascripts %}*/
/* {% endif %}*/
/* */
/* <script type="text/javascript">*/
/* */
/*     $('#searchtop').typeahead({*/
/*         onSelect: function(item) {*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ path('ajxdeallink') }}",*/
/*                 data: "id="+item.value,*/
/*                 success: function(msg){*/
/*                     $(location).attr('href',msg);*/
/*                 }*/
/*             });*/
/*         },*/
/*         ajax: {*/
/*             url: '{{ path('ajxdealtop') }}',*/
/*             triggerLength: 1*/
/*         },*/
/*         afterSelect: function (item) {*/
/*             //save the id value into the hidden field*/
/* */
/*         },*/
/*         displayField: 'full_name'*/
/* */
/*     });*/
/* */
/*     $(document).ready(function() { $("#js-example-basic-single").select2(); });*/
/*     $( "#js-example-basic-single" ).change(function() {*/
/*         $.ajax({*/
/*             type: "POST",*/
/*             url: "{{ path('ajxsetregion') }}",*/
/*             data: "id="+$( "#js-example-basic-single option:selected" ).text(),*/
/*             success: function(msg){*/
/* 			var regionId = $( "#js-example-basic-single").val();*/
/* 			var regionName = $( "#js-example-basic-single option:selected" ).text();*/
/* 			*/
/* 		if(regionId==1)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/1/regions/grand-tunis.html";*/
/* 		}*/
/* 		if(regionId==2)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/2/regions/sahel.html";*/
/* 		}*/
/* 		if(regionId==3)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/3/regions/cap-bon.html";*/
/* 		}*/
/*         if(regionId==4)*/
/*         {*/
/*             window.location.href ="https://www.bigdeal.tn/4/regions/sfax.html";*/
/*         }*/
/* 		if(regionId==0)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/0/regions/toutes-les-regions.html";*/
/* 		}*/
/* 	*/
/*             }*/
/* */
/*         });*/
/*     });*/
/* */
/*     function hidethisadds(id){*/
/*         globan=$('#banner'+id).parent();*/
/*         globan.html("");*/
/*         $.ajax({*/
/*             type: "POST",*/
/*             url: "{{ path('hide_banner') }}",*/
/*             data: "id="+id,*/
/*             success: function(msg){*/
/* */
/* */
/*             }*/
/*         });*/
/*     }*/
/*     if (navigator.userAgent.indexOf('Mac OS X') != -1) {*/
/* 	  $("body").addClass("mac");*/
/* 	} else {*/
/* 	  $("body").addClass("pc");*/
/* 	}*/
/*     </script>*/
/*     <script src="{{ asset('public/js/simplemenu.js') }}"></script>*/
/*     <script>*/
/*   		$('#mobile-searchtop').typeahead({*/
/*         onSelect: function(item) {*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ path('ajxdeallink') }}",*/
/*                 data: "id="+item.value,*/
/*                 success: function(msg){*/
/*                     $(location).attr('href',msg);*/
/*                 }*/
/*             });*/
/*         },*/
/*         ajax: {*/
/*             url: '{{ path('ajxdealtop') }}',*/
/*             triggerLength: 1*/
/*         },*/
/*         afterSelect: function (item) {*/
/*             //save the id value into the hidden field*/
/* */
/*         },*/
/*         displayField: 'full_name'*/
/* */
/*     });*/
/* */
/*     $(document).ready(function() { $("#js-example-basic-single2").select2(); });*/
/*     $( "#js-example-basic-single2" ).change(function() {*/
/*         $.ajax({*/
/*             type: "POST",*/
/*             url: "{{ path('ajxsetregion') }}",*/
/*             data: "id="+$( "#js-example-basic-single2 option:selected" ).text(),*/
/*             success: function(msg){ */
/* 			var regionId = $( "#js-example-basic-single2").val();*/
/* 			var regionName = $( "#js-example-basic-single2 option:selected" ).text();*/
/* 			*/
/* 		if(regionId==1)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/1/regions/grand-tunis.html";*/
/* 		}*/
/* 		if(regionId==2)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/2/regions/sahel.html";*/
/* 		}*/
/* 		if(regionId==3)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/3/regions/cap-bon.html";*/
/* 		}*/
/*         if(regionId==4)*/
/*         {*/
/*             window.location.href ="https://www.bigdeal.tn/4/regions/sfax.html";*/
/*         }*/
/* 		if(regionId==0)*/
/* 		{*/
/* 			window.location.href ="https://www.bigdeal.tn/0/regions/toutes-les-regions.html";*/
/* 		}*/
/*             }*/
/* */
/*         });*/
/*     });*/
/*   		*/
/* 	</script>*/
/* 	*/
/* 	*/
/* 	<!-- Script Google Analytics  -->*/
/* 	<script>*/
/*       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){*/
/*       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),*/
/*       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)*/
/*       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');*/
/* */
/*       ga('create', 'UA-30376566-1', 'auto');*/
/*       ga('send', 'pageview');*/
/* */
/*     </script>*/
/* {% block javascripts %}*/
/* {% endblock %}*/
/* <script type="text/javascript">*/
/* /* <![CDATA[ *//* */
/* var google_conversion_id = 1019229954;*/
/* var google_custom_params = window.google_tag_params;*/
/* var google_remarketing_only = true;*/
/* /* ]]> *//* */
/* </script>*/
/* <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">*/
/* </script>*/
/* <noscript>*/
/* <div style="display:inline;">*/
/* <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1019229954/?value=0&amp;guid=ON&amp;script=0"/>*/
/* </div>*/
/* </noscript>*/
/* </body>*/
/* </html>*/
/* */
