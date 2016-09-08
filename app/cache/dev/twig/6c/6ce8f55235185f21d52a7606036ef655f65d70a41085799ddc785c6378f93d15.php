<?php

/* BackCommandeBundle:Client:edit.html.twig */
class __TwigTemplate_8857c4d4bbc5d5da1e8f4e5f073c1e6a665adb896108765780aa5742013329d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "BackCommandeBundle:Client:edit.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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

                        <h2>Modifier client</h2>

                        <div class=\"controlButton pull-right\"><i class=\"icon-remove removeElement\"></i></div>
                        <div class=\"controlButton pull-right\"><i class=\"icon-caret-down minimizeElement\"></i></div>
                    </div>
                    <!-- ==================== END OF TEXT INPUTS HEADLINE ==================== -->

                    <!-- ==================== TEXT INPUTS FLOATING BOX ==================== -->
                    <div class=\"floatingBox\">
                        <div class=\"container-fluid\">
                            <div class=\"container-fluid\">

                                
                                    <form class=\"form-horizontal contentForm\" method=\"POST\"
                                          action=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("back_client_edit", array("id" => $this->getAttribute((isset($context["client"]) ? $context["client"] : null), "id", array()))), "html", null, true);
        echo "\">


                                        ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'row');
        echo "
                                        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fname", array()), 'row');
        echo "
                                        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'row');
        echo "
                                        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cin", array()), 'row');
        echo "
                                        ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "datebirth", array()), 'row');
        echo "
                                        ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'row');
        echo "
                                        ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'row');
        echo "
<div class=\"control-group \">
                                                <label for=\"back_partnerbundle_sellingpoint_nbrEmployee\" class=\"control-label\">Mot de passe</label>
                                                <div class=\"controls\">
                                                    <input type=\"password\" name=\"password\" id=\"password\" value=\"\"   >
                                                </div>
                                            </div>


                                    <div class=\"formFooter\">
                                        <button type=\"submit\" class=\"btn btn-success\"><i class=\"icon-ok\"> </i> Valider
                                        </button>
                                        <button type=\"reset\" class=\"btn btn-danger\"><i class=\"icon-remove\"> </i>
                                            Effacer
                                        </button>
                                        <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("back_client");
        echo "\">
                                            <button class=\"btn btn-inverse\" type=\"button\"><i class=\"icon-list\"></i>
                                                Liste
                                            </button>
                                        </a>
                                        ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'widget');
        echo "
                                    </div>
                                </form>
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

    // line 71
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 72
        echo "

        <style type=\"text/css\">


            .pick-a-color {
                height: 34px !important;
            }

        </style>
    ";
    }

    // line 83
    public function block_javascripts($context, array $blocks = array())
    {
        // line 84
        echo "\t <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/lib/jquery-inputmask/jquery.inputmask.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/lib/jquery-inputmask/jquery.inputmask.extensions.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/lib/jquery-inputmask/jquery.inputmask.date.extensions.js"), "html", null, true);
        echo "\"></script>
         <script>


            \$(\"#commandebundle_client_datebirth\").inputmask(\"date\");

        
            \$(document).ready(function () {
                \$(\"#back_commandebundle_bank_name\").attr({
                    'data-validation': 'required'
                });
                \$.validate();
            });
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "BackCommandeBundle:Client:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 86,  160 => 85,  155 => 84,  152 => 83,  138 => 72,  135 => 71,  118 => 57,  110 => 52,  92 => 37,  88 => 36,  84 => 35,  80 => 34,  76 => 33,  72 => 32,  68 => 31,  62 => 28,  36 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
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
/*                         <h2>Modifier client</h2>*/
/* */
/*                         <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>*/
/*                         <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>*/
/*                     </div>*/
/*                     <!-- ==================== END OF TEXT INPUTS HEADLINE ==================== -->*/
/* */
/*                     <!-- ==================== TEXT INPUTS FLOATING BOX ==================== -->*/
/*                     <div class="floatingBox">*/
/*                         <div class="container-fluid">*/
/*                             <div class="container-fluid">*/
/* */
/*                                 */
/*                                     <form class="form-horizontal contentForm" method="POST"*/
/*                                           action="{{ path('back_client_edit',{'id':client.id}) }}">*/
/* */
/* */
/*                                         {{ form_row(form.title) }}*/
/*                                         {{ form_row(form.fname) }}*/
/*                                         {{ form_row(form.name) }}*/
/*                                         {{ form_row(form.cin) }}*/
/*                                         {{ form_row(form.datebirth) }}*/
/*                                         {{ form_row(form.email) }}*/
/*                                         {{ form_row(form.phone) }}*/
/* <div class="control-group ">*/
/*                                                 <label for="back_partnerbundle_sellingpoint_nbrEmployee" class="control-label">Mot de passe</label>*/
/*                                                 <div class="controls">*/
/*                                                     <input type="password" name="password" id="password" value=""   >*/
/*                                                 </div>*/
/*                                             </div>*/
/* */
/* */
/*                                     <div class="formFooter">*/
/*                                         <button type="submit" class="btn btn-success"><i class="icon-ok"> </i> Valider*/
/*                                         </button>*/
/*                                         <button type="reset" class="btn btn-danger"><i class="icon-remove"> </i>*/
/*                                             Effacer*/
/*                                         </button>*/
/*                                         <a href="{{ path('back_client') }}">*/
/*                                             <button class="btn btn-inverse" type="button"><i class="icon-list"></i>*/
/*                                                 Liste*/
/*                                             </button>*/
/*                                         </a>*/
/*                                         {{ form_widget(form._token) }}*/
/*                                     </div>*/
/*                                 </form>*/
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
/* */
/*     {% block stylesheets %}*/
/* */
/* */
/*         <style type="text/css">*/
/* */
/* */
/*             .pick-a-color {*/
/*                 height: 34px !important;*/
/*             }*/
/* */
/*         </style>*/
/*     {% endblock %}*/
/*     {% block javascripts %}*/
/* 	 <script src="{{ asset('RessourcesBack/js/lib/jquery-inputmask/jquery.inputmask.min.js') }}"></script>*/
/*         <script src="{{ asset('RessourcesBack/js/lib/jquery-inputmask/jquery.inputmask.extensions.js') }}"></script>*/
/*         <script src="{{ asset('RessourcesBack/js/lib/jquery-inputmask/jquery.inputmask.date.extensions.js') }}"></script>*/
/*          <script>*/
/* */
/* */
/*             $("#commandebundle_client_datebirth").inputmask("date");*/
/* */
/*         */
/*             $(document).ready(function () {*/
/*                 $("#back_commandebundle_bank_name").attr({*/
/*                     'data-validation': 'required'*/
/*                 });*/
/*                 $.validate();*/
/*             });*/
/*         </script>*/
/*     {% endblock %}*/
/* */
