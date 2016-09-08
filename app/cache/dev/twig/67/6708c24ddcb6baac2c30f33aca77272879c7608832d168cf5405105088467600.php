<?php

/* BackCommandeBundle:Client:listlivraiosn.html.twig */
class __TwigTemplate_c9ad6f9f39553fa0ccf8a5e85b2b098ce83a75af134efe0148046211eeebd8de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "BackCommandeBundle:Client:listlivraiosn.html.twig", 1);
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
        // line 3
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
                    <div class=\"floatingBox table \">
                        ";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "GET", "attr" => array("class" => "form-horizontal contentForm", "style" => "padding:0; margin:0")));
        echo "
                        <div class=\"container-fluid\" style=\"padding: 3px 10px\">

                            <div class=\"span2\">
                                <label>N° commande</label>
                                ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id", array()), 'widget', array("attr" => array("class" => "span10")));
        echo "
                            </div>

                            <div class=\"span2\">
                                <label>&Eacute;tat de commande</label>
                                ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "etat", array()), 'widget', array("attr" => array("class" => "span12")));
        echo "
                            </div>

                            <div class=\"span2\">
                                <label>Nom de client</label>
                                ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget', array("attr" => array("autocomplete" => "off", "class" => "span12")));
        echo "

                            </div>
                            <div class=\"span2\">
                                <label>Prénom de client</label>
                                ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fname", array()), 'widget', array("attr" => array("autocomplete" => "off", "class" => "span12")));
        echo "

                            </div>
                            <div class=\"span3\" style=\"display: none\">
                                <label>Payée à la caisse</label>
                                ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "paypar", array()), 'widget', array("attr" => array("class" => "span10 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                            <div class=\"span3\">
                                <label>N° chèque</label>
                                ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "num_cheque", array()), 'widget', array("attr" => array("class" => "span12")));
        echo "
                            </div>
                        </div>
                        <div class=\"container-fluid\" style=\"padding: 3px 10px\">
                            <div class=\"span6\">
                                <label>Deal</label>
                                ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deal", array()), 'widget', array("attr" => array("class" => "span12 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                            <div class=\"span3\">
                                <label>N° coupon</label>
                                ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "numcoupon", array()), 'widget', array("attr" => array("class" => "span12")));
        echo "
                            </div>
                            <div class=\"span3\">
                                <label>Téléphone de client</label>
                                ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "telc", array()), 'widget', array("attr" => array("class" => "span12 selectpicker", "data-live-search" => "true")));
        echo "
                            </div>
                        </div>
                        <div class=\"container-fluid\" style=\"padding: 3px 10px 20px\">
                            <div class=\"span2\">
                                <label>&nbsp;</label>
                                <input type=\"submit\" value=\"Rechecher\" class=\"btn btn-success\"/>

                            </div>
                        </div>
                        ";
        // line 69
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "

                    </div>
                    ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 73
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashMessages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 74
                echo "                            <div class=\"alert ";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                                ";
                // line 76
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"]), "html", null, true);
                echo "
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "                    <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->
                    <div class=\"containerHeadline\">
                        <i class=\"icon-table\"></i>

                        <h2>Liste des commandes</h2>
                    </div>
                    <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->

                    <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->
                    <div class=\"floatingBox table\">
                        <div class=\"container-fluid\">
                            <table class=\"table\">
                                <thead>
                                <tr>
                                    <th>N° commande</th>
                                    <th>Date création</th>
                                    <th>Deal</th>
                                    <th>Reference</th>
                                    <th>Total commande</th>
                                    <th>Client</th>
                                    <th>Tel</th>
                                    <th>Quantité</th>
                                    <th>Payer à</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 108
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 109
            echo "


                                    ";
            // line 112
            $context["CouponAnnuler"] = $this->env->getExtension('twig_extension')->listCouponAnnuler($this->getAttribute($context["entity"], "id", array()));
            // line 113
            echo "                                    ";
            $context["nbrCouponClient"] = $this->env->getExtension('caisse_extension')->nbrCouponAcheter($this->getAttribute($this->getAttribute($context["entity"], "deal", array()), "id", array()), $this->getAttribute($this->getAttribute($context["entity"], "client", array()), "id", array()));
            // line 114
            echo "                                    <tr class=\"";
            if (($this->getAttribute($context["entity"], "etat", array()) == 2)) {
                echo " error";
            }
            echo "\">
                                        <td> ";
            // line 115
            echo twig_escape_filter($this->env, (isset($context["CouponAnnuler"]) ? $context["CouponAnnuler"] : null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, sprintf("%09d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
                                        <td>";
            // line 116
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "dcr", array()), "d/m/Y H:i:s"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "deal", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "reference", array()), "title", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 119
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["entity"], "reference", array()), "bigdealPrice", array()) * $this->getAttribute($context["entity"], "qte", array())) + 3), "html", null, true);
            echo " DT</td>
                                        <td>";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "client", array()), "html", null, true);
            echo " </td>
                                        <td>";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "client", array()), "phone", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "qte", array()), "html", null, true);
            echo "</td>
                                        <td>";
            // line 123
            if ( !(null === $this->getAttribute($context["entity"], "caisse", array()))) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "caisse", array()), "libelle", array()), "html", null, true);
            }
            // line 124
            echo "                                        </td>
                                        <td>";
            // line 125
            if (($this->getAttribute($context["entity"], "etat", array()) == 2)) {
                echo " En attente de confirmation  ";
            } elseif (($this->getAttribute($context["entity"], "etat", array()) == 4)) {
                echo " Confirmé ";
            } elseif (($this->getAttribute($context["entity"], "etat", array()) == 3)) {
                echo " Annulé";
            }
            echo "</td>
                                        <td>

                                                <div class=\"btn-toolbar\" style=\"margin: 0;\">
                                                    <div class=\"btn-group\">
                                                        ";
            // line 130
            if (($this->getAttribute($context["entity"], "etat", array()) == 2)) {
                // line 131
                echo "                                                            <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                                                                Action <span class=\"caret\"></span></button>
                                                            <ul class=\"dropdown-menu pull-right\">
                                                                <li>
                                                                    <a href=\"";
                // line 135
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("coupon_commande_traiter", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Traiter</a>
                                                                </li>
                                                            </ul>
                                                        ";
            }
            // line 139
            echo "
                                                        ";
            // line 140
            if (($this->getAttribute($context["entity"], "etat", array()) == 4)) {
                // line 141
                echo "                                                            <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                                                                Action <span class=\"caret\"></span></button>

                                                            <ul class=\"dropdown-menu pull-right\">
                                                                <li>
                                                                    <a href=\"";
                // line 146
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("coupon_commande_tracking", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">Tracking </a>
                                                                </li>
                                                            </ul>
                                                        ";
            }
            // line 150
            echo "
                                                    </div>
                                                </div>

                                        </td>
                                    </tr>

                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 158
        echo "                                </tbody>
                            </table>
                            ";
        // line 161
        echo "                            <div class=\"pagination pagination-large\" style=\"text-align: center\">
                                ";
        // line 162
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
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 173
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/css/bootstrap-select.css"), "html", null, true);
        echo "\">

";
    }

    // line 176
    public function block_javascripts($context, array $blocks = array())
    {
        // line 177
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "37790b0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_37790b0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/37790b0_bootstrap-typeahead.min_1.js");
            // line 178
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
        // line 180
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/bootstrap-select.js"), "html", null, true);
        echo "\"></script>


        <!-- masked inputs -->
        <script src=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery.ui.autocomplete.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("RessourcesBack/js/vendor/jquery-ui-1.10.2.custom.min.js"), "html", null, true);
        echo "\"></script>        <!-- jquery ui dragging -->
        <script>
            \$(document).ready(function () {
                \$('.alert-success').delay(5000).fadeOut();
            });
            \$(document).ready(function () {
                \$('.alert-error').delay(5000).fadeOut();
            });
            \$(function () {

                // fancybox
                \$('.paye').fancybox({
                    'height': 'auto',
                    'width': 990,
                    'type': 'iframe',
                    'autoScale': false
                });
//back_commandebundle_commandfilter_vadd
                \$(\"#back_commandebundle_commandfilter_vadd\").change(function () {

                    if (\$('#back_commandebundle_commandfilter_vadd').val() == 0) {
                        \$('#back_commandebundle_commandfilter_user').attr('disabled', 'disabled')
                    } else {
                        \$('#back_commandebundle_commandfilter_user').removeAttr('disabled')
                    }
                });
            })


            var cache = {};

            \$(document).ready(function () {
                \$(\"input[data-id=codePostal], input[data-id=ville]\").autocomplete({
                    source: function (request, response) {
                        alert(request);
                        alert(response);
                        //Si la réponse est dans le cache
                        if (request.term in cache) {
                            response(\$.map(cache[request.term], function (item) {
                                return {
                                    label: item.CodePostal + \", \" + item.Ville,
                                    value: function () {
                                        if (\$(this).attr('data-id') == 'codePostal') {
                                            \$('input[data-id=ville]').val(item.Ville);
                                            return item.CodePostal;
                                        }
                                        else {
                                            \$('input[data-id=codePostal]').val(item.CodePostal);
                                            return item.Ville;
                                        }
                                    }
                                };
                            }));
                        }
                        //Sinon -> Requete Ajax
                        else {
                            var objData = {};
                            var url = \$(this.element).attr('data-url');
                            alert(url);
                            if (\$(this.element).attr('data-id') == 'codePostal') {
                                objData = {codePostal: request.term};
                            }
                            else {
                                objData = {ville: request.term};
                            }

                            \$.ajax({
                                url: url,
                                dataType: \"json\",
                                data: objData,
                                type: 'POST',
                                success: function (data) {
                                    //Ajout de reponse dans le cache
                                    cache[request.term] = data;

                                    response(\$.map(data, function (item) {
                                        return {
                                            label: item.CodePostal + \", \" + item.Ville,
                                            value: function () {
                                                if (\$(this).attr('data-id') == 'codePostal') {
                                                    \$('input[data-id=ville]').val(item.Ville);
                                                    return item.CodePostal;
                                                }
                                                else {
                                                    \$('input[data-id=codePostal]').val(item.CodePostal);
                                                    return item.Ville;
                                                }
                                            }
                                        };
                                    }));
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });
                        }
                    },
                    minLength: 3,
                    delay: 300
                });
            });

            \$('#back_commandebundle_commandfilter_name').typeahead({

                ajax: {
                    url: '";
        // line 290
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

            \$('#back_commandebundle_commandfilter_fname').typeahead({

                ajax: {
                    url: '";
        // line 305
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
            \$('#back_commandebundle_commandfilter_telc').typeahead({

                ajax: {
                    url: '";
        // line 319
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
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "BackCommandeBundle:Client:listlivraiosn.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  524 => 319,  507 => 305,  489 => 290,  381 => 185,  377 => 184,  369 => 180,  355 => 178,  350 => 177,  347 => 176,  340 => 173,  326 => 162,  323 => 161,  319 => 158,  306 => 150,  299 => 146,  292 => 141,  290 => 140,  287 => 139,  280 => 135,  274 => 131,  272 => 130,  258 => 125,  255 => 124,  251 => 123,  247 => 122,  243 => 121,  239 => 120,  235 => 119,  231 => 118,  227 => 117,  223 => 116,  217 => 115,  210 => 114,  207 => 113,  205 => 112,  200 => 109,  196 => 108,  166 => 80,  160 => 79,  151 => 76,  145 => 74,  140 => 73,  136 => 72,  130 => 69,  117 => 59,  110 => 55,  103 => 51,  94 => 45,  87 => 41,  79 => 36,  71 => 31,  63 => 26,  55 => 21,  47 => 16,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends '::baseBack.html.twig' %}*/
/* {% block body -%}*/
/*     <!-- ==================== PAGE CONTENT ==================== -->*/
/*     <div class="content">*/
/*         <!-- ==================== WIDGETS CONTAINER ==================== -->*/
/*         <div class="container-fluid">*/
/*             <!-- ==================== END OF ROW ==================== -->*/
/*             <div class="row-fluid">*/
/*                 <div class="span12">*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-zoom-in"></i>*/
/*                         <h2>Filtre de recherche</h2>*/
/*                         <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>*/
/*                     </div>*/
/*                     <div class="floatingBox table ">*/
/*                         {{ form_start(form, {'method': 'GET','attr': {'class': 'form-horizontal contentForm','style':'padding:0; margin:0'}}) }}*/
/*                         <div class="container-fluid" style="padding: 3px 10px">*/
/* */
/*                             <div class="span2">*/
/*                                 <label>N° commande</label>*/
/*                                 {{ form_widget(form.id,{'attr':{'class':'span10'}}) }}*/
/*                             </div>*/
/* */
/*                             <div class="span2">*/
/*                                 <label>&Eacute;tat de commande</label>*/
/*                                 {{ form_widget(form.etat,{'attr':{'class':'span12'}}) }}*/
/*                             </div>*/
/* */
/*                             <div class="span2">*/
/*                                 <label>Nom de client</label>*/
/*                                 {{ form_widget(form.name,{'attr':{'autocomplete':'off','class':'span12'}}) }}*/
/* */
/*                             </div>*/
/*                             <div class="span2">*/
/*                                 <label>Prénom de client</label>*/
/*                                 {{ form_widget(form.fname,{'attr':{'autocomplete':'off','class':'span12'}}) }}*/
/* */
/*                             </div>*/
/*                             <div class="span3" style="display: none">*/
/*                                 <label>Payée à la caisse</label>*/
/*                                 {{ form_widget(form.paypar,{'attr':{'class':'span10 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                             <div class="span3">*/
/*                                 <label>N° chèque</label>*/
/*                                 {{ form_widget(form.num_cheque,{'attr':{'class':'span12'}}) }}*/
/*                             </div>*/
/*                         </div>*/
/*                         <div class="container-fluid" style="padding: 3px 10px">*/
/*                             <div class="span6">*/
/*                                 <label>Deal</label>*/
/*                                 {{ form_widget(form.deal,{'attr':{'class':'span12 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                             <div class="span3">*/
/*                                 <label>N° coupon</label>*/
/*                                 {{ form_widget(form.numcoupon,{'attr':{'class':'span12'}}) }}*/
/*                             </div>*/
/*                             <div class="span3">*/
/*                                 <label>Téléphone de client</label>*/
/*                                 {{ form_widget(form.telc,{'attr':{'class':'span12 selectpicker','data-live-search':'true'}}) }}*/
/*                             </div>*/
/*                         </div>*/
/*                         <div class="container-fluid" style="padding: 3px 10px 20px">*/
/*                             <div class="span2">*/
/*                                 <label>&nbsp;</label>*/
/*                                 <input type="submit" value="Rechecher" class="btn btn-success"/>*/
/* */
/*                             </div>*/
/*                         </div>*/
/*                         {{ form_end(form) }}*/
/* */
/*                     </div>*/
/*                     {% for type, flashMessages in app.session.flashbag.all() %}*/
/*                         {% for flashMessage in flashMessages %}*/
/*                             <div class="alert {{ type }}">*/
/*                                 <button data-dismiss="alert" class="close" type="button">×</button>*/
/*                                 {{ flashMessage|trans }}*/
/*                             </div>*/
/*                         {% endfor %}*/
/*                     {% endfor %}*/
/*                     <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-table"></i>*/
/* */
/*                         <h2>Liste des commandes</h2>*/
/*                     </div>*/
/*                     <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->*/
/* */
/*                     <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->*/
/*                     <div class="floatingBox table">*/
/*                         <div class="container-fluid">*/
/*                             <table class="table">*/
/*                                 <thead>*/
/*                                 <tr>*/
/*                                     <th>N° commande</th>*/
/*                                     <th>Date création</th>*/
/*                                     <th>Deal</th>*/
/*                                     <th>Reference</th>*/
/*                                     <th>Total commande</th>*/
/*                                     <th>Client</th>*/
/*                                     <th>Tel</th>*/
/*                                     <th>Quantité</th>*/
/*                                     <th>Payer à</th>*/
/*                                     <th>Status</th>*/
/*                                     <th>Actions</th>*/
/*                                 </tr>*/
/*                                 </thead>*/
/*                                 <tbody>*/
/*                                 {% for entity in pagination %}*/
/* */
/* */
/* */
/*                                     {% set CouponAnnuler = entity.id|listCouponAnnuler %}*/
/*                                     {% set nbrCouponClient = nbrCouponAcheter(entity.deal.id,entity.client.id) %}*/
/*                                     <tr class="{% if entity.etat==2 %} error{% endif %}">*/
/*                                         <td> {{ CouponAnnuler }} {{ "%09d"|format(entity.id) }}</td>*/
/*                                         <td>{{ entity.dcr|date("d/m/Y H:i:s") }}</td>*/
/*                                         <td>{{ entity.deal }}</td>*/
/*                                         <td>{{ entity.reference.title }}</td>*/
/*                                         <td>{{ entity.reference.bigdealPrice *  entity.qte + 3 }} DT</td>*/
/*                                         <td>{{ entity.client }} </td>*/
/*                                         <td>{{ entity.client.phone }}</td>*/
/*                                         <td>{{ entity.qte }}</td>*/
/*                                         <td>{% if entity.caisse is not null %}{{ entity.caisse.libelle }}{% endif %}*/
/*                                         </td>*/
/*                                         <td>{% if  entity.etat==2 %} En attente de confirmation  {% elseif entity.etat == 4 %} Confirmé {% elseif entity.etat==3 %} Annulé{% endif %}</td>*/
/*                                         <td>*/
/* */
/*                                                 <div class="btn-toolbar" style="margin: 0;">*/
/*                                                     <div class="btn-group">*/
/*                                                         {% if entity.etat == 2 %}*/
/*                                                             <button class="btn dropdown-toggle" data-toggle="dropdown">*/
/*                                                                 Action <span class="caret"></span></button>*/
/*                                                             <ul class="dropdown-menu pull-right">*/
/*                                                                 <li>*/
/*                                                                     <a href="{{ path('coupon_commande_traiter', { 'id': entity.id }) }}">Traiter</a>*/
/*                                                                 </li>*/
/*                                                             </ul>*/
/*                                                         {% endif %}*/
/* */
/*                                                         {% if entity.etat == 4 %}*/
/*                                                             <button class="btn dropdown-toggle" data-toggle="dropdown">*/
/*                                                                 Action <span class="caret"></span></button>*/
/* */
/*                                                             <ul class="dropdown-menu pull-right">*/
/*                                                                 <li>*/
/*                                                                     <a href="{{ path('coupon_commande_tracking', { 'id': entity.id }) }}">Tracking </a>*/
/*                                                                 </li>*/
/*                                                             </ul>*/
/*                                                         {% endif %}*/
/* */
/*                                                     </div>*/
/*                                                 </div>*/
/* */
/*                                         </td>*/
/*                                     </tr>*/
/* */
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
/*     <link rel="stylesheet" type="text/css" href="{{ asset('RessourcesBack/css/bootstrap-select.css') }}">*/
/* */
/* {% endblock %}*/
/*     {% block javascripts %}*/
/*         {% javascripts '@MainFrontBundle/Resources/public/js/bootstrap-typeahead.min.js' %}*/
/*         <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*         {% endjavascripts %}*/
/*         <script src="{{ asset('RessourcesBack/js/bootstrap-select.js') }}"></script>*/
/* */
/* */
/*         <!-- masked inputs -->*/
/*         <script src="{{ asset('public/js/jquery.ui.autocomplete.min.js') }}"></script>*/
/*         <script src="{{ asset('RessourcesBack/js/vendor/jquery-ui-1.10.2.custom.min.js') }}"></script>        <!-- jquery ui dragging -->*/
/*         <script>*/
/*             $(document).ready(function () {*/
/*                 $('.alert-success').delay(5000).fadeOut();*/
/*             });*/
/*             $(document).ready(function () {*/
/*                 $('.alert-error').delay(5000).fadeOut();*/
/*             });*/
/*             $(function () {*/
/* */
/*                 // fancybox*/
/*                 $('.paye').fancybox({*/
/*                     'height': 'auto',*/
/*                     'width': 990,*/
/*                     'type': 'iframe',*/
/*                     'autoScale': false*/
/*                 });*/
/* //back_commandebundle_commandfilter_vadd*/
/*                 $("#back_commandebundle_commandfilter_vadd").change(function () {*/
/* */
/*                     if ($('#back_commandebundle_commandfilter_vadd').val() == 0) {*/
/*                         $('#back_commandebundle_commandfilter_user').attr('disabled', 'disabled')*/
/*                     } else {*/
/*                         $('#back_commandebundle_commandfilter_user').removeAttr('disabled')*/
/*                     }*/
/*                 });*/
/*             })*/
/* */
/* */
/*             var cache = {};*/
/* */
/*             $(document).ready(function () {*/
/*                 $("input[data-id=codePostal], input[data-id=ville]").autocomplete({*/
/*                     source: function (request, response) {*/
/*                         alert(request);*/
/*                         alert(response);*/
/*                         //Si la réponse est dans le cache*/
/*                         if (request.term in cache) {*/
/*                             response($.map(cache[request.term], function (item) {*/
/*                                 return {*/
/*                                     label: item.CodePostal + ", " + item.Ville,*/
/*                                     value: function () {*/
/*                                         if ($(this).attr('data-id') == 'codePostal') {*/
/*                                             $('input[data-id=ville]').val(item.Ville);*/
/*                                             return item.CodePostal;*/
/*                                         }*/
/*                                         else {*/
/*                                             $('input[data-id=codePostal]').val(item.CodePostal);*/
/*                                             return item.Ville;*/
/*                                         }*/
/*                                     }*/
/*                                 };*/
/*                             }));*/
/*                         }*/
/*                         //Sinon -> Requete Ajax*/
/*                         else {*/
/*                             var objData = {};*/
/*                             var url = $(this.element).attr('data-url');*/
/*                             alert(url);*/
/*                             if ($(this.element).attr('data-id') == 'codePostal') {*/
/*                                 objData = {codePostal: request.term};*/
/*                             }*/
/*                             else {*/
/*                                 objData = {ville: request.term};*/
/*                             }*/
/* */
/*                             $.ajax({*/
/*                                 url: url,*/
/*                                 dataType: "json",*/
/*                                 data: objData,*/
/*                                 type: 'POST',*/
/*                                 success: function (data) {*/
/*                                     //Ajout de reponse dans le cache*/
/*                                     cache[request.term] = data;*/
/* */
/*                                     response($.map(data, function (item) {*/
/*                                         return {*/
/*                                             label: item.CodePostal + ", " + item.Ville,*/
/*                                             value: function () {*/
/*                                                 if ($(this).attr('data-id') == 'codePostal') {*/
/*                                                     $('input[data-id=ville]').val(item.Ville);*/
/*                                                     return item.CodePostal;*/
/*                                                 }*/
/*                                                 else {*/
/*                                                     $('input[data-id=codePostal]').val(item.CodePostal);*/
/*                                                     return item.Ville;*/
/*                                                 }*/
/*                                             }*/
/*                                         };*/
/*                                     }));*/
/*                                 },*/
/*                                 error: function (jqXHR, textStatus, errorThrown) {*/
/*                                     console.log(textStatus, errorThrown);*/
/*                                 }*/
/*                             });*/
/*                         }*/
/*                     },*/
/*                     minLength: 3,*/
/*                     delay: 300*/
/*                 });*/
/*             });*/
/* */
/*             $('#back_commandebundle_commandfilter_name').typeahead({*/
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
/*             $('#back_commandebundle_commandfilter_fname').typeahead({*/
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
/*             $('#back_commandebundle_commandfilter_telc').typeahead({*/
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
/*         </script>*/
/*     {% endblock %}*/
