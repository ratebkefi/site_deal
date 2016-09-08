<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_4b967314c7d342117ab59e92d167560e829905b408ee8b6375330334efaee81e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::login.html.twig", "FOSUserBundle::layout.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::login.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "ROLE_CLIENT"))) {
            // line 4
            echo "<script>

    window.location.href = \"";
            // line 6
            echo $this->env->getExtension('routing')->getPath("back_dash_homepage");
            echo "\"</script>
";
        } else {
            // line 8
            echo "
\t<div class=\"col-md-12 text-center\">
\t    <a class=\"navbar-brand brand-form-signin\" href=\"";
            // line 10
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/img/logo.png"), "html", null, true);
            echo "\" alt=\"Big Deal\" class=\"img-responsive\" /></a>
\t</div>
    <form id=\"login-validate\" name=\"loginform\" action=\"";
            // line 12
            echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
            echo "\" class=\"form-signin\" method=\"post\">
        <h2 class=\"form-signin-heading\"><strong>Administration </strong>BigDeal</h2>

        ";
            // line 16
            echo "        ";
            if ((isset($context["error"]) ? $context["error"] : null)) {
                // line 17
                echo "            <div class=\"alert alert-error\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), array("Bad credentials" => "Login ou mot de passe incorrect"), "FOSUserBundle"), "html", null, true);
                echo "</div>
        ";
            }
            // line 19
            echo "        <div class=\"input-prepend\">
            <span class=\"add-on\"><i class=\"icon-user\"></i></span>
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
            // line 21
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
            echo "\" placeholder=\"Username\">
        </div>
        <div class=\"input-prepend\">
            <span class=\"add-on\"><i class=\"icon-lock\"></i></span>
            <input type=\"password\" id=\"password\" name=\"_password\" value=\"\">
\t\t\t<!--
            <a href=\"javascript:\$('#login-validate').submit()\"><span  class=\"add-on\" id=\"login\"><i class=\"icon-arrow-right\"></i></span></a>
            -->
            
            <button type=\"submit\" class=\"btn\" ><span  class=\"add-on\" id=\"login\"><i class=\"icon-arrow-right\"></i></span></button>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
            echo "\"/>
        </div>


    </form>
\t<div class=\"col-md-12 text-center form-signin-footer\">
\t    <strong>Bigdeal © ";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
            echo "</strong>
\t</div>


";
        }
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 37,  85 => 31,  72 => 21,  68 => 19,  62 => 17,  59 => 16,  53 => 12,  46 => 10,  42 => 8,  37 => 6,  33 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends '::login.html.twig' %}*/
/* {% block body %}*/
/* {% if app.user  and app.user.roles[0]!='ROLE_CLIENT' %}*/
/* <script>*/
/* */
/*     window.location.href = "{{ path('back_dash_homepage') }}"</script>*/
/* {% else %}*/
/* */
/* 	<div class="col-md-12 text-center">*/
/* 	    <a class="navbar-brand brand-form-signin" href="{{ path('fos_user_security_login') }}"><img src="{{ asset('RessourcesBack/img/logo.png') }}" alt="Big Deal" class="img-responsive" /></a>*/
/* 	</div>*/
/*     <form id="login-validate" name="loginform" action="{{ path('fos_user_security_check') }}" class="form-signin" method="post">*/
/*         <h2 class="form-signin-heading"><strong>Administration </strong>BigDeal</h2>*/
/* */
/*         {% trans_default_domain 'FOSUserBundle' %}*/
/*         {% if error %}*/
/*             <div class="alert alert-error">{{ error.message|trans({'Bad credentials': 'Login ou mot de passe incorrect'}) }}</div>*/
/*         {% endif %}*/
/*         <div class="input-prepend">*/
/*             <span class="add-on"><i class="icon-user"></i></span>*/
/*             <input type="text" id="username" name="_username" value="{{ last_username }}" placeholder="Username">*/
/*         </div>*/
/*         <div class="input-prepend">*/
/*             <span class="add-on"><i class="icon-lock"></i></span>*/
/*             <input type="password" id="password" name="_password" value="">*/
/* 			<!--*/
/*             <a href="javascript:$('#login-validate').submit()"><span  class="add-on" id="login"><i class="icon-arrow-right"></i></span></a>*/
/*             -->*/
/*             */
/*             <button type="submit" class="btn" ><span  class="add-on" id="login"><i class="icon-arrow-right"></i></span></button>*/
/*             <input type="hidden" name="_csrf_token" value="{{ csrf_token }}"/>*/
/*         </div>*/
/* */
/* */
/*     </form>*/
/* 	<div class="col-md-12 text-center form-signin-footer">*/
/* 	    <strong>Bigdeal © {{ 'now'|date('Y') }}</strong>*/
/* 	</div>*/
/* */
/* */
/* {% endif %}*/
/* {% endblock %}*/
/* */
