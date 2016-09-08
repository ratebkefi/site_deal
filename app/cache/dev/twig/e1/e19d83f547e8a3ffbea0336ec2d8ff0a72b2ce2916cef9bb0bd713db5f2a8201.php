<?php

/* BackPartnerBundle:Partner:index.html.twig */
class __TwigTemplate_e5bfec6e1821532fedda444f00ffbfef4a1a2f4a649062765bc0e5f456b32a9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "BackPartnerBundle:Partner:index.html.twig", 1);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<!-- ==================== PAGE CONTENT ==================== -->
    <div class=\"content\">

        <!-- ==================== WIDGETS CONTAINER ==================== -->
        <div class=\"container-fluid\">


            <!-- ==================== END OF ROW ==================== -->
            <div class=\"row-fluid\">
                <div class=\"span12\">
                    <div class=\"containerHeadline\">
                        <i class=\"icon-zoom-in\"></i>

                        <h2>Filtre de recherche</h2>

                        <div class=\"controlButton pull-right\"><i class=\"icon-caret-down minimizeElement\"></i></div>
                    </div>
                    <div class=\"floatingBox  \">
                        <div class=\"container-fluid\" style=\"padding: 10px\">
                            ";
        // line 23
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "GET", "attr" => array("class" => "form-horizontal contentForm", "style" => "padding:0; margin:0")));
        echo "
                            <div class=\"span5\">
                                <label>Nom</label>
                                ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget', array("attr" => array("class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                            <div class=\"span5\">
                                <label>E-mail</label>
                                ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                        </div>
                        <div class=\"container-fluid\" style=\"padding: 10px\">
                            <div class=\"span5\">
                                <label>Catégorie</label>
                                ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category", array()), 'widget', array("attr" => array("class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                            <div class=\"span5\">
                                <label>Région</label>
                                ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "region", array()), 'widget', array("attr" => array("class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
\t\t\t\t\t\t\t<div class=\"span5\">
                                <label>Point de vente</label>
                                ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "sellingpoint", array()), 'widget', array("attr" => array("class" => "span10")));
        echo "
                            </div>
                            <div class=\"span2\">
                                <label>&nbsp;</label>
                                <input type=\"submit\" value=\"Rechercher\" class=\"btn btn-success\"/>
                            </div>

                            ";
        // line 51
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
                        </div>

                    </div>
                    <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->
                    ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 57
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashMessages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 58
                echo "                            <br/>
                            <div class=\"alert ";
                // line 59
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                                ";
                // line 61
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"]), "html", null, true);
                echo "
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                    ";
        if ((((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "SERVICECLIENT") && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "CHEFRED")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "REDACTEUR")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "CHEFSERVICECLI")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "DAF")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "FINANCIER"))) {
            // line 66
            echo "                    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("dash_partner_add");
            echo "\" class=\"btn btn-danger\">
                        <i class=\"icon-user\" style=\"opacity: 1;\"></i> Ajouter un partenaire
                    </a>
                    ";
        }
        // line 70
        echo "                    <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->
                    <div class=\"containerHeadline\">
                        <i class=\"icon-table\"></i>

                        <h2>Liste partenaire</h2>
                    </div>

                    <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->
                    <div class=\"floatingBox table\">
                        <div class=\"container-fluid\">
                            <table class=\"table\">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Banque</th>
                                    <th>Agence</th>
                                    <th>RIB</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Site web</th>
                                    <th>Page facebook</th>
                                    <th>Note</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 97
            echo "                                    <tr>
                                        <td>
                                            <a href=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dash_partner_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</a>
                                        </td>
                                        <td>";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "bank", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "agency", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "rib", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "address", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "phone", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "webSite", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "fbPage", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->calculateRatePartnerFilter($this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo " / 5</td>

                                        <td>
                                            <div class=\"btn-toolbar\" style=\"margin: 0;\">
                                                <div class=\"btn-group\">
                                                    <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                                                        Action <span
                                                                class=\"caret\"></span></button>
                                                    <ul class=\"dropdown-menu pull-right\">

                                                        <li>
                                                            <a href=\"";
            // line 119
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dash_partner_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">Afficher </a>
                                                        </li>

                                                        ";
            // line 122
            if (((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "SERVICECLIENT") && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "CHEFRED")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "REDACTEUR")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "CHEFSERVICECLI")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "DAF"))) {
                // line 123
                echo "                                                        <li>
                                                            <a href=\"";
                // line 124
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dash_partner_update", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Modifier</a>
                                                        </li>

                                                        <li>
                                                            <a href=\"";
                // line 128
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("add_protocol_manager_partner", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Ajouter
                                                                protocole</a>
                                                        </li>
                                                        ";
            }
            // line 132
            echo "                                                        ";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "CHEFRED") && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "REDACTEUR"))) {
                // line 133
                echo "
                                                        <li>
                                                            <a href=\"";
                // line 135
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("back_contact_partner", array("partid" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Contacts
                                                                Partenaire</a>
                                                        </li>
                                                        <li>
                                                            <a href=\"";
                // line 139
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("back_sellingpoint", array("partid" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Points
                                                                de vente</a>
                                                        </li>
                                                        ";
            }
            // line 143
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
                                                            <a href=\"";
            // line 144
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("back_partner_password", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">Générer mot de passe</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 155
        echo "                                </tbody>
                            </table>
                            ";
        // line 158
        echo "                            <div class=\"pagination pagination-large\" style=\"text-align: center\">
                                ";
        // line 159
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==================== END OF WIDGETS CONTAINER ==================== -->
    </div>

    <!-- ==================== END OF PAGE CONTENT ==================== -->
    <!-- ==================== END OF PAGE CONTENT ==================== -->

    ";
        // line 172
        $this->displayBlock('stylesheets', $context, $blocks);
    }

    public function block_stylesheets($context, array $blocks = array())
    {
        // line 173
        echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/bootstrap-select.css"), "html", null, true);
        echo "\">
    ";
    }

    // line 176
    public function block_javascripts($context, array $blocks = array())
    {
        // line 177
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/bootstrap-select.js"), "html", null, true);
        echo "\"></script>

        <script>

            \$(document).ready(function () {
                \$('.alert-error').delay(5000).fadeOut();
            });



        </script>
    ";
    }

    public function getTemplateName()
    {
        return "BackPartnerBundle:Partner:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  341 => 177,  338 => 176,  331 => 173,  325 => 172,  309 => 159,  306 => 158,  302 => 155,  285 => 144,  282 => 143,  275 => 139,  268 => 135,  264 => 133,  261 => 132,  254 => 128,  247 => 124,  244 => 123,  242 => 122,  236 => 119,  222 => 108,  218 => 107,  214 => 106,  210 => 105,  206 => 104,  202 => 103,  198 => 102,  194 => 101,  187 => 99,  183 => 97,  179 => 96,  151 => 70,  143 => 66,  140 => 65,  134 => 64,  125 => 61,  120 => 59,  117 => 58,  112 => 57,  108 => 56,  100 => 51,  90 => 44,  83 => 40,  76 => 36,  67 => 30,  60 => 26,  54 => 23,  33 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends '::baseBack.html.twig' %}*/
/* {% block body -%}*/
/* */
/*     <!-- ==================== PAGE CONTENT ==================== -->*/
/*     <div class="content">*/
/* */
/*         <!-- ==================== WIDGETS CONTAINER ==================== -->*/
/*         <div class="container-fluid">*/
/* */
/* */
/*             <!-- ==================== END OF ROW ==================== -->*/
/*             <div class="row-fluid">*/
/*                 <div class="span12">*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-zoom-in"></i>*/
/* */
/*                         <h2>Filtre de recherche</h2>*/
/* */
/*                         <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>*/
/*                     </div>*/
/*                     <div class="floatingBox  ">*/
/*                         <div class="container-fluid" style="padding: 10px">*/
/*                             {{ form_start(form, {'method': 'GET','attr': {'class': 'form-horizontal contentForm','style':'padding:0; margin:0'}}) }}*/
/*                             <div class="span5">*/
/*                                 <label>Nom</label>*/
/*                                 {{ form_widget(form.name,{'attr':{'class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                             <div class="span5">*/
/*                                 <label>E-mail</label>*/
/*                                 {{ form_widget(form.email,{'attr':{'class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                         </div>*/
/*                         <div class="container-fluid" style="padding: 10px">*/
/*                             <div class="span5">*/
/*                                 <label>Catégorie</label>*/
/*                                 {{ form_widget(form.category,{'attr':{'class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                             <div class="span5">*/
/*                                 <label>Région</label>*/
/*                                 {{ form_widget(form.region,{'attr':{'class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/* 							<div class="span5">*/
/*                                 <label>Point de vente</label>*/
/*                                 {{ form_widget(form.sellingpoint,{'attr':{'class':'span10'}}) }}*/
/*                             </div>*/
/*                             <div class="span2">*/
/*                                 <label>&nbsp;</label>*/
/*                                 <input type="submit" value="Rechercher" class="btn btn-success"/>*/
/*                             </div>*/
/* */
/*                             {{ form_end(form) }}*/
/*                         </div>*/
/* */
/*                     </div>*/
/*                     <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->*/
/*                     {% for type, flashMessages in app.session.flashbag.all() %}*/
/*                         {% for flashMessage in flashMessages %}*/
/*                             <br/>*/
/*                             <div class="alert {{ type }}">*/
/*                                 <button data-dismiss="alert" class="close" type="button">×</button>*/
/*                                 {{ flashMessage|trans }}*/
/*                             </div>*/
/*                         {% endfor %}*/
/*                     {% endfor %}*/
/*                     {% if app.user.roles[0]!='SERVICECLIENT'  and app.user.roles[0]!='CHEFRED'  and app.user.roles[0]!='REDACTEUR' and app.user.roles[0]!='CHEFSERVICECLI' and app.user.roles[0]!= 'DAF' and app.user.roles[0]!= 'FINANCIER' %}*/
/*                     <a href="{{ path('dash_partner_add') }}" class="btn btn-danger">*/
/*                         <i class="icon-user" style="opacity: 1;"></i> Ajouter un partenaire*/
/*                     </a>*/
/*                     {% endif %}*/
/*                     <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-table"></i>*/
/* */
/*                         <h2>Liste partenaire</h2>*/
/*                     </div>*/
/* */
/*                     <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->*/
/*                     <div class="floatingBox table">*/
/*                         <div class="container-fluid">*/
/*                             <table class="table">*/
/*                                 <thead>*/
/*                                 <tr>*/
/*                                     <th>Titre</th>*/
/*                                     <th>Banque</th>*/
/*                                     <th>Agence</th>*/
/*                                     <th>RIB</th>*/
/*                                     <th>Adresse</th>*/
/*                                     <th>Téléphone</th>*/
/*                                     <th>Site web</th>*/
/*                                     <th>Page facebook</th>*/
/*                                     <th>Note</th>*/
/*                                     <th>Actions</th>*/
/*                                 </tr>*/
/*                                 </thead>*/
/*                                 <tbody>*/
/*                                 {% for entity in pagination %}*/
/*                                     <tr>*/
/*                                         <td>*/
/*                                             <a href="{{ path('dash_partner_show', { 'id': entity.id }) }}">{{ entity.name }}</a>*/
/*                                         </td>*/
/*                                         <td>{{ entity.bank }}</td>*/
/*                                         <td>{{ entity.agency }}</td>*/
/*                                         <td>{{ entity.rib }}</td>*/
/*                                         <td>{{ entity.address }}</td>*/
/*                                         <td>{{ entity.phone }}</td>*/
/*                                         <td>{{ entity.webSite }}</td>*/
/*                                         <td>{{ entity.fbPage }}</td>*/
/*                                         <td>{{ entity.id|calculateRatePartner }} / 5</td>*/
/* */
/*                                         <td>*/
/*                                             <div class="btn-toolbar" style="margin: 0;">*/
/*                                                 <div class="btn-group">*/
/*                                                     <button class="btn dropdown-toggle" data-toggle="dropdown">*/
/*                                                         Action <span*/
/*                                                                 class="caret"></span></button>*/
/*                                                     <ul class="dropdown-menu pull-right">*/
/* */
/*                                                         <li>*/
/*                                                             <a href="{{ path('dash_partner_show', {'id': entity.id}) }}">Afficher </a>*/
/*                                                         </li>*/
/* */
/*                                                         {% if app.user.roles[0]!='SERVICECLIENT' and app.user.roles[0]!='CHEFRED' and app.user.roles[0]!='REDACTEUR' and app.user.roles[0]!='CHEFSERVICECLI' and app.user.roles[0]!='DAF' %}*/
/*                                                         <li>*/
/*                                                             <a href="{{ path('dash_partner_update', {'id': entity.id}) }}">Modifier</a>*/
/*                                                         </li>*/
/* */
/*                                                         <li>*/
/*                                                             <a href="{{ path('add_protocol_manager_partner', { 'id': entity.id }) }}">Ajouter*/
/*                                                                 protocole</a>*/
/*                                                         </li>*/
/*                                                         {% endif %}*/
/*                                                         {% if  app.user.roles[0]!='CHEFRED' and app.user.roles[0]!='REDACTEUR' %}*/
/* */
/*                                                         <li>*/
/*                                                             <a href="{{ path('back_contact_partner', { 'partid': entity.id }) }}">Contacts*/
/*                                                                 Partenaire</a>*/
/*                                                         </li>*/
/*                                                         <li>*/
/*                                                             <a href="{{ path('back_sellingpoint', { 'partid': entity.id }) }}">Points*/
/*                                                                 de vente</a>*/
/*                                                         </li>*/
/*                                                         {% endif %}*/
/* 														<li>*/
/*                                                             <a href="{{ path('back_partner_password', { 'id': entity.id }) }}">Générer mot de passe</a>*/
/*                                                         </li>*/
/* */
/*                                                     </ul>*/
/*                                                 </div>*/
/*                                             </div>*/
/* */
/* */
/*                                         </td>*/
/*                                     </tr>*/
/*                                 {% endfor %}*/
/*                                 </tbody>*/
/*                             </table>*/
/*                             {# display navigation #}*/
/*                             <div class="pagination pagination-large" style="text-align: center">*/
/*                                 {{ knp_pagination_render(pagination) }}*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <!-- ==================== END OF WIDGETS CONTAINER ==================== -->*/
/*     </div>*/
/* */
/*     <!-- ==================== END OF PAGE CONTENT ==================== -->*/
/*     <!-- ==================== END OF PAGE CONTENT ==================== -->*/
/* */
/*     {% block stylesheets %}*/
/*         <link rel="stylesheet" type="text/css" href="{{ asset('RessourcesBack/css/bootstrap-select.css') }}">*/
/*     {% endblock %}*/
/* {% endblock %}*/
/*     {% block javascripts %}*/
/*         <script src="{{ asset('RessourcesBack/js/bootstrap-select.js') }}"></script>*/
/* */
/*         <script>*/
/* */
/*             $(document).ready(function () {*/
/*                 $('.alert-error').delay(5000).fadeOut();*/
/*             });*/
/* */
/* */
/* */
/*         </script>*/
/*     {% endblock %}*/
/* */
