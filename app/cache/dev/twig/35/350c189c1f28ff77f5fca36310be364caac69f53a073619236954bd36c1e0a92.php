<?php

/* BackCommandeBundle:Client:index.html.twig */
class __TwigTemplate_2b7a1d7666298ca2fb500389fe95c465ff1b4674c770f2fede6f346f8f8433f8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "BackCommandeBundle:Client:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
        // line 5
        echo "<!-- ==================== PAGE CONTENT ==================== -->
    <div class=\"content\">
        <!-- ==================== WIDGETS CONTAINER ==================== -->
        <div class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div class=\"span12\">
                    <div class=\"containerHeadline\">
                        <i class=\"icon-zoom-in\"></i>

                        <h2>Filtre de recherche</h2>

                        <div class=\"controlButton pull-right\"><i class=\"icon-caret-down minimizeElement\"></i></div>
                    </div>
                    <div class=\"floatingBox table \">
                        <div class=\"container-fluid\" style=\"padding: 10px\">
                            ";
        // line 20
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "GET", "attr" => array("class" => "form-horizontal contentForm", "style" => "padding:0; margin:0")));
        echo "
                            <div class=\"span2\">
                                <label>Nom</label>
                                ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "nom", array()), 'widget', array("attr" => array("autocomplete" => "off", "class" => "span10")));
        echo "
                            </div>
                            <div class=\"span2\">
                                <label>Prénom</label>
                                ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "prenom", array()), 'widget', array("attr" => array("autocomplete" => "off", "class" => "span10")));
        echo "
                            </div>
                            <div class=\"span2\">
                                <label>Téléphone</label>
                                ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'widget', array("attr" => array("autocomplete" => "off", "class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                            <div class=\"span2\">
                                <label>E-mail</label>
                                ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("autocomplete" => "off", "class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>

                            <div class=\"span2\">
                                <label>&Eacute;tat</label>
                                ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "stat", array()), 'widget', array("attr" => array("class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                            <div class=\"span1\">
                                <label>&nbsp;</label>
                                <input type=\"submit\" value=\"Rechercher\" class=\"btn btn-success\"/>
                            </div>

                            ";
        // line 47
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
                        </div>

                    </div>

                    <!-- ==================== END OF ROW ==================== -->
                    <div class=\"row-fluid\">
                        <div class=\"span12\">
                            <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->
                            <div class=\"containerHeadline\">
                                <i class=\"icon-table\"></i>

                                <h2>Liste des clients</h2>
                            </div>
                            <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->

                            <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->
                            <div class=\"floatingBox table\">
                                <div class=\"container-fluid\">
                                    <table class=\"table\">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom et Prénom</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>C.I.N.</th>
                                            <th>Derniére connexion</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 80
            echo "                                            <tr";
            if (($this->getAttribute($context["entity"], "stat", array()) == 0)) {
                echo " class=\"error\"";
            }
            echo ">
                                                <td><a href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("view_client_manager", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a> </td>
                                                <td><a href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("view_client_manager", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "fname", array()), "html", null, true);
            echo "</a></td>
                                                <td>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "phone", array()), "html", null, true);
            echo "</td>
                                                <td>";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "email", array()), "html", null, true);
            echo "</td>
                                                <td>";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "cin", array()), "html", null, true);
            echo "</td>
                                                <td>";
            // line 86
            if ($this->getAttribute($context["entity"], "lastLogin", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "lastLogin", array()), "d-m-Y H:i:s"), "html", null, true);
                echo " ";
            }
            echo "</td>

                                                <td>
                                                    <div class=\"btn-toolbar\" style=\"margin: 0;\">
                                                        <div class=\"btn-group\">
                                                            <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                                                                Action <span
                                                                        class=\"caret\"></span></button>
                                                            <ul class=\"dropdown-menu pull-right\">
                                                                <li><a
                                                                            href=\"";
            // line 96
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("back_client_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">Modifier</a>
                                                                </li>
                                                                <li><a
                                                                            href=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("back_client_adresse", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">Adresse</a>
                                                                </li>
                                                                <li><a
                                                                            href=\"";
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("view_client_manager", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">Afficher</a>
                                                                </li>
                                                                ";
            // line 104
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "DAF")) {
                // line 105
                echo "
                                                                    ";
                // line 106
                if (($this->getAttribute($context["entity"], "stat", array()) == 1)) {
                    // line 107
                    echo "
                                                                        <li><a
                                                                                    href=\"";
                    // line 109
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("block_client_manager", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                    echo "\">Bannir</a>
                                                                        </li>
                                                                    ";
                } else {
                    // line 112
                    echo "                                                                        <li><a
                                                                                    href=\"";
                    // line 113
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("unblock_client_manager", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                    echo "\">Autorisé</a>
                                                                        </li>
                                                                    ";
                }
                // line 116
                echo "                                                                ";
            }
            // line 117
            echo "                                                                ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") != "DIRECTEURCOMMERCIAL")) {
                // line 118
                echo "
                                                                    <li><a
                                                                                href=\"";
                // line 120
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bigfid_client", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Historique BigFid</a>
                                                                    </li>
                                                                ";
            }
            // line 123
            echo "
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
        // line 130
        echo "                                        </tbody>
                                    </table>
                                    ";
        // line 133
        echo "                                    <div class=\"pagination pagination-large\" style=\"text-align: center\">
                                        ";
        // line 134
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
        </div>
    </div>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/bootstrap-select.css"), "html", null, true);
        echo "\">

";
    }

    // line 148
    public function block_javascripts($context, array $blocks = array())
    {
        // line 149
        echo "
        ";
        // line 150
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "37790b0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_37790b0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/37790b0_bootstrap-typeahead.min_1.js");
            // line 151
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "37790b0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_37790b0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/37790b0.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 153
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/bootstrap-select.js"), "html", null, true);
        echo "\"></script>
        <script>
            \$('#back_commandebundle_clientfilter_nom').typeahead({

                ajax: {
                    url: '";
        // line 158
        echo $this->env->getExtension('routing')->getPath("list_client_par_nom");
        echo "',
                    triggerLength: 1,
                    items: 10
                },
                afterSelect: function (item) {
                    //save the id value into the hidden field

                },
                displayField: 'full_name'

            })

            \$('#back_commandebundle_clientfilter_prenom').typeahead({

                ajax: {
                    url: '";
        // line 173
        echo $this->env->getExtension('routing')->getPath("list_client_par_prenom");
        echo "',
                    triggerLength: 1,
                    items: 10
                },
                afterSelect: function (item) {
                    //save the id value into the hidden field

                },
                displayField: 'full_name'

            })
            \$('#back_commandebundle_clientfilter_phone').typeahead({

                ajax: {
                    url: '";
        // line 187
        echo $this->env->getExtension('routing')->getPath("list_client_par_tel");
        echo "',
                    triggerLength: 1,
                    items: 10
                },
                afterSelect: function (item) {
                    //save the id value into the hidden field

                },
                displayField: 'full_name'

            })
            \$('#back_commandebundle_clientfilter_email').typeahead({

                ajax: {
                    url: '";
        // line 201
        echo $this->env->getExtension('routing')->getPath("list_client_par_email");
        echo "',
                    triggerLength: 1,
                    items: 10
                },
                afterSelect: function (item) {
                    //save the id value into the hidden field

                },
                displayField: 'full_name'

            })
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "BackCommandeBundle:Client:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  366 => 201,  349 => 187,  332 => 173,  314 => 158,  305 => 153,  291 => 151,  287 => 150,  284 => 149,  281 => 148,  274 => 145,  260 => 134,  257 => 133,  253 => 130,  241 => 123,  235 => 120,  231 => 118,  228 => 117,  225 => 116,  219 => 113,  216 => 112,  210 => 109,  206 => 107,  204 => 106,  201 => 105,  199 => 104,  194 => 102,  188 => 99,  182 => 96,  166 => 86,  162 => 85,  158 => 84,  154 => 83,  146 => 82,  140 => 81,  133 => 80,  129 => 79,  94 => 47,  84 => 40,  76 => 35,  69 => 31,  62 => 27,  55 => 23,  49 => 20,  32 => 5,  29 => 2,  11 => 1,);
    }
}
/* {% extends '::baseBack.html.twig' %}*/
/* {% block body -%}*/
/* */
/* */
/*     <!-- ==================== PAGE CONTENT ==================== -->*/
/*     <div class="content">*/
/*         <!-- ==================== WIDGETS CONTAINER ==================== -->*/
/*         <div class="container-fluid">*/
/*             <div class="row-fluid">*/
/*                 <div class="span12">*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-zoom-in"></i>*/
/* */
/*                         <h2>Filtre de recherche</h2>*/
/* */
/*                         <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>*/
/*                     </div>*/
/*                     <div class="floatingBox table ">*/
/*                         <div class="container-fluid" style="padding: 10px">*/
/*                             {{ form_start(form, {'method': 'GET','attr': {'class': 'form-horizontal contentForm','style':'padding:0; margin:0'}}) }}*/
/*                             <div class="span2">*/
/*                                 <label>Nom</label>*/
/*                                 {{ form_widget(form.nom,{'attr':{'autocomplete':'off','class':'span10'}}) }}*/
/*                             </div>*/
/*                             <div class="span2">*/
/*                                 <label>Prénom</label>*/
/*                                 {{ form_widget(form.prenom,{'attr':{'autocomplete':'off','class':'span10'}}) }}*/
/*                             </div>*/
/*                             <div class="span2">*/
/*                                 <label>Téléphone</label>*/
/*                                 {{ form_widget(form.phone,{'attr':{'autocomplete':'off','class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                             <div class="span2">*/
/*                                 <label>E-mail</label>*/
/*                                 {{ form_widget(form.email,{'attr':{'autocomplete':'off','class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/* */
/*                             <div class="span2">*/
/*                                 <label>&Eacute;tat</label>*/
/*                                 {{ form_widget(form.stat,{'attr':{'class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                             <div class="span1">*/
/*                                 <label>&nbsp;</label>*/
/*                                 <input type="submit" value="Rechercher" class="btn btn-success"/>*/
/*                             </div>*/
/* */
/*                             {{ form_end(form) }}*/
/*                         </div>*/
/* */
/*                     </div>*/
/* */
/*                     <!-- ==================== END OF ROW ==================== -->*/
/*                     <div class="row-fluid">*/
/*                         <div class="span12">*/
/*                             <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->*/
/*                             <div class="containerHeadline">*/
/*                                 <i class="icon-table"></i>*/
/* */
/*                                 <h2>Liste des clients</h2>*/
/*                             </div>*/
/*                             <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->*/
/* */
/*                             <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->*/
/*                             <div class="floatingBox table">*/
/*                                 <div class="container-fluid">*/
/*                                     <table class="table">*/
/*                                         <thead>*/
/*                                         <tr>*/
/*                                             <th>ID</th>*/
/*                                             <th>Nom et Prénom</th>*/
/*                                             <th>Téléphone</th>*/
/*                                             <th>Email</th>*/
/*                                             <th>C.I.N.</th>*/
/*                                             <th>Derniére connexion</th>*/
/*                                             <th>Actions</th>*/
/*                                         </tr>*/
/*                                         </thead>*/
/*                                         <tbody>*/
/*                                         {% for entity in pagination %}*/
/*                                             <tr{% if entity.stat==0 %} class="error"{% endif %}>*/
/*                                                 <td><a href="{{ path('view_client_manager', { 'id': entity.id }) }}">{{ entity.id }}</a> </td>*/
/*                                                 <td><a href="{{ path('view_client_manager', { 'id': entity.id }) }}"> {{ entity.name }} {{ entity.fname }}</a></td>*/
/*                                                 <td>{{ entity.phone }}</td>*/
/*                                                 <td>{{ entity.email }}</td>*/
/*                                                 <td>{{ entity.cin }}</td>*/
/*                                                 <td>{% if entity.lastLogin %}{{ entity.lastLogin|date('d-m-Y H:i:s') }} {% endif %}</td>*/
/* */
/*                                                 <td>*/
/*                                                     <div class="btn-toolbar" style="margin: 0;">*/
/*                                                         <div class="btn-group">*/
/*                                                             <button class="btn dropdown-toggle" data-toggle="dropdown">*/
/*                                                                 Action <span*/
/*                                                                         class="caret"></span></button>*/
/*                                                             <ul class="dropdown-menu pull-right">*/
/*                                                                 <li><a*/
/*                                                                             href="{{ path('back_client_edit', { 'id': entity.id }) }}">Modifier</a>*/
/*                                                                 </li>*/
/*                                                                 <li><a*/
/*                                                                             href="{{ path('back_client_adresse', { 'id': entity.id }) }}">Adresse</a>*/
/*                                                                 </li>*/
/*                                                                 <li><a*/
/*                                                                             href="{{ path('view_client_manager', { 'id': entity.id }) }}">Afficher</a>*/
/*                                                                 </li>*/
/*                                                                 {% if  app.user.roles[0]!= 'DAF' %}*/
/* */
/*                                                                     {% if entity.stat==1 %}*/
/* */
/*                                                                         <li><a*/
/*                                                                                     href="{{ path('block_client_manager', { 'id': entity.id }) }}">Bannir</a>*/
/*                                                                         </li>*/
/*                                                                     {% else %}*/
/*                                                                         <li><a*/
/*                                                                                     href="{{ path('unblock_client_manager', { 'id': entity.id }) }}">Autorisé</a>*/
/*                                                                         </li>*/
/*                                                                     {% endif %}*/
/*                                                                 {% endif %}*/
/*                                                                 {% if  app.user.roles[0]!= 'DIRECTEURCOMMERCIAL' %}*/
/* */
/*                                                                     <li><a*/
/*                                                                                 href="{{ path('bigfid_client', { 'id': entity.id }) }}">Historique BigFid</a>*/
/*                                                                     </li>*/
/*                                                                 {% endif %}*/
/* */
/*                                                             </ul>*/
/*                                                         </div>*/
/*                                                     </div>*/
/*                                                 </td>*/
/*                                             </tr>*/
/*                                         {% endfor %}*/
/*                                         </tbody>*/
/*                                     </table>*/
/*                                     {# display navigation #}*/
/*                                     <div class="pagination pagination-large" style="text-align: center">*/
/*                                         {{ knp_pagination_render(pagination) }}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <!-- ==================== END OF WIDGETS CONTAINER ==================== -->*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <link rel="stylesheet" type="text/css" href="{{ asset('RessourcesBack/css/bootstrap-select.css') }}">*/
/* */
/* {% endblock %}*/
/*     {% block javascripts %}*/
/* */
/*         {% javascripts '@MainFrontBundle/Resources/public/js/bootstrap-typeahead.min.js' %}*/
/*         <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*         {% endjavascripts %}*/
/*         <script src="{{ asset('RessourcesBack/js/bootstrap-select.js') }}"></script>*/
/*         <script>*/
/*             $('#back_commandebundle_clientfilter_nom').typeahead({*/
/* */
/*                 ajax: {*/
/*                     url: '{{ path('list_client_par_nom') }}',*/
/*                     triggerLength: 1,*/
/*                     items: 10*/
/*                 },*/
/*                 afterSelect: function (item) {*/
/*                     //save the id value into the hidden field*/
/* */
/*                 },*/
/*                 displayField: 'full_name'*/
/* */
/*             })*/
/* */
/*             $('#back_commandebundle_clientfilter_prenom').typeahead({*/
/* */
/*                 ajax: {*/
/*                     url: '{{ path('list_client_par_prenom') }}',*/
/*                     triggerLength: 1,*/
/*                     items: 10*/
/*                 },*/
/*                 afterSelect: function (item) {*/
/*                     //save the id value into the hidden field*/
/* */
/*                 },*/
/*                 displayField: 'full_name'*/
/* */
/*             })*/
/*             $('#back_commandebundle_clientfilter_phone').typeahead({*/
/* */
/*                 ajax: {*/
/*                     url: '{{ path('list_client_par_tel') }}',*/
/*                     triggerLength: 1,*/
/*                     items: 10*/
/*                 },*/
/*                 afterSelect: function (item) {*/
/*                     //save the id value into the hidden field*/
/* */
/*                 },*/
/*                 displayField: 'full_name'*/
/* */
/*             })*/
/*             $('#back_commandebundle_clientfilter_email').typeahead({*/
/* */
/*                 ajax: {*/
/*                     url: '{{ path('list_client_par_email') }}',*/
/*                     triggerLength: 1,*/
/*                     items: 10*/
/*                 },*/
/*                 afterSelect: function (item) {*/
/*                     //save the id value into the hidden field*/
/* */
/*                 },*/
/*                 displayField: 'full_name'*/
/* */
/*             })*/
/*         </script>*/
/*     {% endblock %}*/
/* */
