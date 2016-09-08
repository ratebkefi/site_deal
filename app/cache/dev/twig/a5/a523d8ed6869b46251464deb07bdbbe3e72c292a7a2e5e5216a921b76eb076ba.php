<?php

/* UserUserBundle:Registration:edit.html.twig */
class __TwigTemplate_8d71775d73984519a914d8c5e34125ccc219cd134c74e1145e0b4521948b69f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "UserUserBundle:Registration:edit.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseBack.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "form_table_layout.html.twig"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"content\">
        <div class=\"container-fluid\">

            <!-- ==================== COMMON ELEMENTS ROW ==================== -->
            <div class=\"row-fluid\">
                <div class=\"span12\">
                    <!-- ==================== TEXT INPUTS HEADLINE ==================== -->
                    <div class=\"containerHeadline\">
                        <i class=\"icon-edit\"></i>

                        <h2>Ajouter / Modifier un utilisateur</h2>

                        <div class=\"controlButton pull-right\"><i class=\"icon-remove removeElement\"></i></div>
                        <div class=\"controlButton pull-right\"><i class=\"icon-caret-down minimizeElement\"></i></div>
                    </div>
                    <!-- ==================== END OF TEXT INPUTS HEADLINE ==================== -->

                    <!-- ==================== TEXT INPUTS FLOATING BOX ==================== -->
                    <div class=\"floatingBox\">
                        <div class=\"container-fluid\">

                            <div class=\"container-fluid\">
                                ";
        // line 26
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "POST", "attr" => array("class" => "form-horizontal contentForm")));
        echo "
                                ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'row', array("attr" => array("class" => "span10")));
        echo "
                                ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'row', array("attr" => array("class" => "span10")));
        echo "
                                ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "username", array()), 'row', array("attr" => array("class" => "span10")));
        echo "
                                ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword", array()), 'row', array("attr" => array("class" => "span10")));
        echo "
                                ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "roles", array()), 'row', array("attr" => array("class" => "span10")));
        echo "
                                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "enabled", array()), 'row', array("attr" => array("class" => "span3 ")));
        echo "
                                ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "profilePictureFile", array()), 'row', array("attr" => array("class" => "span3 ")));
        echo "


                                <div class=\"formFooter\">
                                    <button type=\"submit\" class=\"btn btn-success\"><i class=\"icon-ok\"> </i>
                                        Valider
                                    </button>
                                    <button type=\"reset\" class=\"btn btn-danger\"><i class=\"icon-remove\"> </i>
                                        Effacer
                                    </button>
                                    <a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("show_users");
        echo "\">
                                        <button class=\"btn btn-inverse\" type=\"button\"><i class=\"icon-list\"></i>
                                            Liste
                                        </button>
                                    </a>
                                    ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'row');
        echo "
                                </div>
                                ";
        // line 50
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
                            </div>

                        </div>
                    </div>
                    <!-- ==================== END OF TEXT INPUTS FLOATING BOX ==================== -->
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 61
    public function block_javascripts($context, array $blocks = array())
    {
        // line 62
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("tinymce/tinymce.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/jquery.form-validator.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function () {
            \$('#fos_user_registration_form_roles').multiselect({
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
        });
\t\t\$(document).ready(function () {
            \$(\"#fos_user_registration_form_name\").attr({
                'data-validation': 'required'
            });
            \$(\"#fos_user_registration_form_email\").attr('data-validation', 'email');
            \$(\"#fos_user_registration_form_plainPassword_first\").attr({
                'data-validation': 'length',
                'data-validation-length': 'min8'
            });
            \$(\"#fos_user_registration_form_plainPassword_second\").attr({
                'data-validation': 'confirmation',
                'data-validation-confirm':'fos_user_registration_form[plainPassword][first]'
            });
             \$.validate();
        });
    </script>
";
    }

    // line 101
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "UserUserBundle:Registration:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 101,  137 => 63,  132 => 62,  129 => 61,  114 => 50,  109 => 48,  101 => 43,  88 => 33,  84 => 32,  80 => 31,  76 => 30,  72 => 29,  68 => 28,  64 => 27,  60 => 26,  36 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
    }
}
/* {% extends '::baseBack.html.twig' %}*/
/* {% form_theme form 'form_table_layout.html.twig' %}*/
/* {% block body -%}*/
/*     <div class="content">*/
/*         <div class="container-fluid">*/
/* */
/*             <!-- ==================== COMMON ELEMENTS ROW ==================== -->*/
/*             <div class="row-fluid">*/
/*                 <div class="span12">*/
/*                     <!-- ==================== TEXT INPUTS HEADLINE ==================== -->*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-edit"></i>*/
/* */
/*                         <h2>Ajouter / Modifier un utilisateur</h2>*/
/* */
/*                         <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>*/
/*                         <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>*/
/*                     </div>*/
/*                     <!-- ==================== END OF TEXT INPUTS HEADLINE ==================== -->*/
/* */
/*                     <!-- ==================== TEXT INPUTS FLOATING BOX ==================== -->*/
/*                     <div class="floatingBox">*/
/*                         <div class="container-fluid">*/
/* */
/*                             <div class="container-fluid">*/
/*                                 {{ form_start(form, {'method': 'POST','attr': {'class': 'form-horizontal contentForm'}}) }}*/
/*                                 {{ form_row(form.name, { 'attr': {'class': 'span10'} }) }}*/
/*                                 {{ form_row(form.email, { 'attr': {'class': 'span10'} }) }}*/
/*                                 {{ form_row(form.username, { 'attr': {'class': 'span10'} }) }}*/
/*                                 {{ form_row(form.plainPassword, { 'attr': {'class': 'span10'} }) }}*/
/*                                 {{ form_row(form.roles, { 'attr': {'class': 'span10'} }) }}*/
/*                                 {{ form_row(form.enabled, { 'attr': {'class': 'span3 '} }) }}*/
/*                                 {{ form_row(form.profilePictureFile, { 'attr': {'class': 'span3 '} }) }}*/
/* */
/* */
/*                                 <div class="formFooter">*/
/*                                     <button type="submit" class="btn btn-success"><i class="icon-ok"> </i>*/
/*                                         Valider*/
/*                                     </button>*/
/*                                     <button type="reset" class="btn btn-danger"><i class="icon-remove"> </i>*/
/*                                         Effacer*/
/*                                     </button>*/
/*                                     <a href="{{ path('show_users') }}">*/
/*                                         <button class="btn btn-inverse" type="button"><i class="icon-list"></i>*/
/*                                             Liste*/
/*                                         </button>*/
/*                                     </a>*/
/*                                     {{ form_row(form._token) }}*/
/*                                 </div>*/
/*                                 {{ form_end(form) }}*/
/*                             </div>*/
/* */
/*                         </div>*/
/*                     </div>*/
/*                     <!-- ==================== END OF TEXT INPUTS FLOATING BOX ==================== -->*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* {% block javascripts %}*/
/*     <script type="text/javascript" src="{{ asset('tinymce/tinymce.min.js') }}"></script>*/
/*     <script src="{{ asset('RessourcesBack/js/vendor/jquery.form-validator.js') }}"></script>*/
/*     <script>*/
/*         $(function () {*/
/*             $('#fos_user_registration_form_roles').multiselect({*/
/*                 buttonText: function (options, select) {*/
/*                     if (options.length == 0) {*/
/*                         return 'None selected <b class="caret"></b>';*/
/*                     }*/
/*                     else if (options.length > 1) {*/
/*                         return options.length + ' selected <b class="caret"></b>';*/
/*                     }*/
/*                     else {*/
/*                         var selected = '';*/
/*                         options.each(function () {*/
/*                             selected += $(this).text() + ', ';*/
/*                         });*/
/*                         return selected.substr(0, selected.length - 2) + ' <b class="caret"></b>';*/
/*                     }*/
/*                 }*/
/*             });*/
/*         });*/
/* 		$(document).ready(function () {*/
/*             $("#fos_user_registration_form_name").attr({*/
/*                 'data-validation': 'required'*/
/*             });*/
/*             $("#fos_user_registration_form_email").attr('data-validation', 'email');*/
/*             $("#fos_user_registration_form_plainPassword_first").attr({*/
/*                 'data-validation': 'length',*/
/*                 'data-validation-length': 'min8'*/
/*             });*/
/*             $("#fos_user_registration_form_plainPassword_second").attr({*/
/*                 'data-validation': 'confirmation',*/
/*                 'data-validation-confirm':'fos_user_registration_form[plainPassword][first]'*/
/*             });*/
/*              $.validate();*/
/*         });*/
/*     </script>*/
/* {% endblock %}*/
/* {% block stylesheets %}*/
/* {% endblock %}*/
