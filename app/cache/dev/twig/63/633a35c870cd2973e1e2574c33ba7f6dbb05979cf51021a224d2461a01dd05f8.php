<?php

/* MainFrontBundle:Client:login.html.twig */
class __TwigTemplate_0ea61088324b83b865bf50e6a547adb4104adf557b54945150f0c9102d38f8f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "MainFrontBundle:Client:login.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/enjoyhint.css"), "html", null, true);
        echo "\">
    <style>
\t\t.mySkip, .myNext, .mySkip:focus, .myNext:focus {
            color: white;
            border-color: #de0e79;
            border-radius: 0;
            margin-top: 40px;
        }

        .enjoyhint_close_btn {
            display: none;
        }

        .mySkip, .mySkip:hover, .mySkip:focus {
            background: transparent;
        }

        .myNext, .myNext:hover, .myNext:focus {
            background: #de0e79;
        }

        .enjoy_hint_label {
            margin-top: -32px;
        }
    </style>
";
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
        // line 30
        echo " 
    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 32
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashMessages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 33
                echo "            <br/>
            <div class=\"alert ";
                // line 34
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                ";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"]), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    <div class=\"authen\">
        <div class=\"clearfix\">
            <div class=\"col-md-12 title\">
                <h1 class=\"bold\">S’identifier </h1> <span>|</span> <a class=\"teal\" href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("inscription");
        echo "\"><span> S’inscrire</span></a>
            </div>
        </div>
        <div class=\"row login\">
            <div class=\"col-md-5 text-center signin\">
                <h3 class=\"bold\">Connectez-vous avec votre compte facebook</h3>
                <a class=\"btn btn-facebook\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["loginUrl"]) ? $context["loginUrl"] : null), "html", null, true);
        echo "\"><i class=\"fa fa-facebook\"></i> Se connecter</a>
            </div>
\t\t\t<div class=\"vertical-spacer  hidden-xs\">
              <span>ou</span>
            </div>
\t\t\t<div class=\"horizontal-spacer hidden-md hidden-sm\">
              <span>ou</span>
            </div>
\t\t\t<div class=\"col-md-offset-1 col-md-6\">
\t\t\t\t<h3 class=\"bold\">Se connecter avec votre compte Bigdeal</h3>
\t\t\t
\t\t\t\t<form action=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("login_check_client");
        echo "\" method=\"post\" class=\"form-horizontal form\">
\t\t\t\t\t";
        // line 61
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 62
            echo "\t\t\t\t\t\t<div class=\"alert alert-danger\">";
            if (($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()) == "Bad credentials")) {
                echo "Login ou mot de passe incorect ";
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), "html", null, true);
            }
            echo "</div>
\t\t\t\t\t";
        }
        // line 64
        echo "\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"email\" class=\"col-sm-3 control-label hidden-xs\">E-mail</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" placeholder= \"Email\" class=\"form-control\" id=\"username\" name=\"_username\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"password\" class=\"col-sm-3 control-label hidden-xs\">Mot de passe</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"password\" name=\"_password\" class=\"form-control\" placeholder=\"Mot de passe\" />
\t\t\t\t\t\t\t<br>

\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-offset-3 col-sm-5 col-xs-7 marg10\">

\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\"/>
\t\t\t\t\t\t\tSe souvenir de moi<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-sm-4 col-xs-5 marg10 pwdOublie\">
\t\t\t\t\t\t\t<a href=\"";
        // line 85
        echo $this->env->getExtension('routing')->getPath("mot_de_pass_oublie");
        echo "\">Mot de passe oublié ?</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                                                <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "headers", array()), "get", array(0 => "referer"), "method"), "html", null, true);
        echo "\" />
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-offset-3 col-sm-9\">
\t\t\t\t\t\t\t<input type=\"submit\" value=\"Se connecter\" class=\"btn btn-infos\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
        </div>
        
    </div>

";
    }

    // line 101
    public function block_javascripts($context, array $blocks = array())
    {
        // line 102
        echo "    
        <script language=\"javascript\" type=\"text/javascript\">
            <!--
            function popitup(url, title, w, h) {
                var left = (screen.width/2)-(w/2);
                var top = (screen.height/2)-(h/2);
                return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
            }

            // -->
            
        </script>
\t\t<script>
\t\t\t\tvar w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
\t\t\t\tif (w > 767) {
\t\t\t\t  document.write('<script type=\"text/javascript\" src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/enjoyhint.min.js"), "html", null, true);
        echo "\"><\\/script>');
\t\t\t\t}
\t\t\t\tif (w > 767) {
\t\t\t\t  document.write('<script type=\"text/javascript\" src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/enjoyhint/main4.js"), "html", null, true);
        echo "\"><\\/script>');
\t\t\t\t}
    
    </script>   
    
    ";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Client:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 120,  215 => 117,  198 => 102,  195 => 101,  178 => 88,  172 => 85,  151 => 67,  146 => 64,  136 => 62,  134 => 61,  130 => 60,  116 => 49,  107 => 43,  102 => 40,  96 => 39,  87 => 36,  82 => 34,  79 => 33,  74 => 32,  70 => 31,  67 => 30,  64 => 29,  33 => 3,  30 => 2,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* {% block stylesheets %}*/
/* <link rel="stylesheet" href="{{ asset('public/css/enjoyhint/enjoyhint.css') }}">*/
/*     <style>*/
/* 		.mySkip, .myNext, .mySkip:focus, .myNext:focus {*/
/*             color: white;*/
/*             border-color: #de0e79;*/
/*             border-radius: 0;*/
/*             margin-top: 40px;*/
/*         }*/
/* */
/*         .enjoyhint_close_btn {*/
/*             display: none;*/
/*         }*/
/* */
/*         .mySkip, .mySkip:hover, .mySkip:focus {*/
/*             background: transparent;*/
/*         }*/
/* */
/*         .myNext, .myNext:hover, .myNext:focus {*/
/*             background: #de0e79;*/
/*         }*/
/* */
/*         .enjoy_hint_label {*/
/*             margin-top: -32px;*/
/*         }*/
/*     </style>*/
/* {% endblock %}*/
/* {% block body %}*/
/*  */
/*     {% for type, flashMessages in app.session.flashbag.all() %}*/
/*         {% for flashMessage in flashMessages %}*/
/*             <br/>*/
/*             <div class="alert {{ type }}">*/
/*                 <button data-dismiss="alert" class="close" type="button">×</button>*/
/*                 {{ flashMessage|trans }}*/
/*             </div>*/
/*         {% endfor %}*/
/*     {% endfor %}*/
/*     <div class="authen">*/
/*         <div class="clearfix">*/
/*             <div class="col-md-12 title">*/
/*                 <h1 class="bold">S’identifier </h1> <span>|</span> <a class="teal" href="{{ path('inscription') }}"><span> S’inscrire</span></a>*/
/*             </div>*/
/*         </div>*/
/*         <div class="row login">*/
/*             <div class="col-md-5 text-center signin">*/
/*                 <h3 class="bold">Connectez-vous avec votre compte facebook</h3>*/
/*                 <a class="btn btn-facebook" href="{{ loginUrl }}"><i class="fa fa-facebook"></i> Se connecter</a>*/
/*             </div>*/
/* 			<div class="vertical-spacer  hidden-xs">*/
/*               <span>ou</span>*/
/*             </div>*/
/* 			<div class="horizontal-spacer hidden-md hidden-sm">*/
/*               <span>ou</span>*/
/*             </div>*/
/* 			<div class="col-md-offset-1 col-md-6">*/
/* 				<h3 class="bold">Se connecter avec votre compte Bigdeal</h3>*/
/* 			*/
/* 				<form action="{{ path('login_check_client') }}" method="post" class="form-horizontal form">*/
/* 					{% if  error  %}*/
/* 						<div class="alert alert-danger">{% if error.message=="Bad credentials" %}Login ou mot de passe incorect {% else %}{{ error.message }}{% endif %}</div>*/
/* 					{% endif %}*/
/* 					<div class="form-group">*/
/* 						<label for="email" class="col-sm-3 control-label hidden-xs">E-mail</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="text" placeholder= "Email" class="form-control" id="username" name="_username" value="{{ last_username }}" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<label for="password" class="col-sm-3 control-label hidden-xs">Mot de passe</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="password" id="password" name="_password" class="form-control" placeholder="Mot de passe" />*/
/* 							<br>*/
/* */
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-offset-3 col-sm-5 col-xs-7 marg10">*/
/* */
/* 							<input type="checkbox" id="remember_me" name="_remember_me" value="on"/>*/
/* 							Se souvenir de moi<br>*/
/* 						</div>*/
/* 						<div class="col-sm-4 col-xs-5 marg10 pwdOublie">*/
/* 							<a href="{{ path('mot_de_pass_oublie') }}">Mot de passe oublié ?</a>*/
/* 						</div>*/
/* 					</div>*/
/*                                                 <input type="hidden" name="_target_path" value="{{ app.request.headers.get('referer') }}" />*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-offset-3 col-sm-9">*/
/* 							<input type="submit" value="Se connecter" class="btn btn-infos">*/
/* 						</div>*/
/* 					</div>*/
/* 				</form>*/
/* 			</div>*/
/*         </div>*/
/*         */
/*     </div>*/
/* */
/* {% endblock %}*/
/*     {% block javascripts %}*/
/*     */
/*         <script language="javascript" type="text/javascript">*/
/*             <!--*/
/*             function popitup(url, title, w, h) {*/
/*                 var left = (screen.width/2)-(w/2);*/
/*                 var top = (screen.height/2)-(h/2);*/
/*                 return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);*/
/*             }*/
/* */
/*             // -->*/
/*             */
/*         </script>*/
/* 		<script>*/
/* 				var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);*/
/* 				if (w > 767) {*/
/* 				  document.write('<script type="text/javascript" src="{{ asset('public/css/enjoyhint/enjoyhint.min.js') }}"><\/script>');*/
/* 				}*/
/* 				if (w > 767) {*/
/* 				  document.write('<script type="text/javascript" src="{{ asset('public/css/enjoyhint/main4.js') }}"><\/script>');*/
/* 				}*/
/*     */
/*     </script>   */
/*     */
/*     {% endblock %}*/
