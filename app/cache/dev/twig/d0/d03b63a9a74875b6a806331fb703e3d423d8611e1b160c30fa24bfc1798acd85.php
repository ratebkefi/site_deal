<?php

/* ::login.html.twig */
class __TwigTemplate_bcbf798f3ef79618b336651d26a6e6b28db30f360c071c9255ce98da0d349869 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
    <title>BigDeal :: Prodexo</title>
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width\">

    <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/styles.css"), "html", null, true);
        echo "\">

</head>
<body>
<!--[if lt IE 7]>
<p class=\"chromeframe\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade
    your browser</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<div class=\"container-fluid\">

    ";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 31
        echo "    <!-- <div class=\"signInRow\">

     <div><a href=\"#\">Lost your password?</a></div>
    </div>-->

</div>

<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
<script>window.jQuery || document.write('<script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/jquery-1.9.1.min.js"), "html", null, true);
        echo "\"><\\/script>')</script>

<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
<script>
\t\$(document).ready(function() {
\t\tif (\$(\"#login-validate .alert-error\").length > 0){
\t\t  \$(\".form-signin\").toggleClass(\"error-status\");
\t\t}
\t});
</script>
</body>
</html>
";
    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 30,  71 => 41,  66 => 39,  56 => 31,  54 => 30,  39 => 18,  20 => 1,);
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
/*     <title>BigDeal :: Prodexo</title>*/
/*     <meta name="description" content="">*/
/*     <meta name="viewport" content="width=device-width">*/
/* */
/*     <link rel="stylesheet" href="{{ asset('RessourcesBack/css/styles.css') }}">*/
/* */
/* </head>*/
/* <body>*/
/* <!--[if lt IE 7]>*/
/* <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade*/
/*     your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to*/
/*     improve your experience.</p>*/
/* <![endif]-->*/
/* */
/* <div class="container-fluid">*/
/* */
/*     {% block body %}{% endblock %}*/
/*     <!-- <div class="signInRow">*/
/* */
/*      <div><a href="#">Lost your password?</a></div>*/
/*     </div>-->*/
/* */
/* </div>*/
/* */
/* <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>*/
/* <script>window.jQuery || document.write('<script src="{{ asset('RessourcesBack/js/vendor/jquery-1.9.1.min.js') }}"><\/script>')</script>*/
/* */
/* <script src="{{ asset('RessourcesBack/js/vendor/bootstrap.min.js') }}"></script>*/
/* <script>*/
/* 	$(document).ready(function() {*/
/* 		if ($("#login-validate .alert-error").length > 0){*/
/* 		  $(".form-signin").toggleClass("error-status");*/
/* 		}*/
/* 	});*/
/* </script>*/
/* </body>*/
/* </html>*/
/* */
