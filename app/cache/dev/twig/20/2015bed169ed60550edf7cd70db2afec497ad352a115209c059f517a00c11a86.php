<?php

/* MainFrontBundle:Client:inscription.html.twig */
class __TwigTemplate_8190ea476b21d6c8c5bda11a0f3dd7dee8f61bbe49a7ec092d1332c4686ada2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "MainFrontBundle:Client:inscription.html.twig", 1);
        $this->blocks = array(
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
        // line 2
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "form_table_layout.html.twig"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <style>
        .help-block {
            color: red;
            display: block;
            margin-bottom: 0px;
            margin-top: 0px;
        }
    </style>
";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b6fa751_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b6fa751_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b6fa751_jquery.form-validator_1.js");
            // line 15
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "b6fa751"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b6fa751") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b6fa751.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 17
        echo "
    
    <script>
        function afficherCodePostale(id)
        {
            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 25
        echo $this->env->getExtension('routing')->getPath("viewcp");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    \$(\"#ccp\").val(msg);


                }
            });
        }

        function sendData3(id)
        {

            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 41
        echo $this->env->getExtension('routing')->getPath("listdelegation");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    var str = \"<option value=''></option>\";
                    \$(\"#delegation1\").show();
                    \$.each(msg, function(index, value) { // pour chaque noeud JSON
                        // on ajoute l option dans la liste
                        //\$(\"delegation2\").append('<option value=\"'+ value.id +'\">'+ value.name +'</option>');
                        str += \"<option value='\"+ value.id+\"'>\"+ value.name+\"</option>\";

                    });
                    // \$('#delegation3').html(str);

                }
            });
        }
        function sendData2(id)
        {

            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 63
        echo $this->env->getExtension('routing')->getPath("listdelegation");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    var str = \"<option value=''></option>\";
                    \$(\"#localite\").show();
                    \$.each(msg, function(index, value) { // pour chaque noeud JSON
                        // on ajoute l option dans la liste
                        //\$(\"delegation2\").append('<option value=\"'+ value.id +'\">'+ value.name +'</option>');
                        str += \"<option value='\"+ value.id+\"'>\"+ value.name+\"</option>\";
                    });
                    \$('#delegation3').html(str);

                }
            });
        }
        function sendData(id)
        {

            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 84
        echo $this->env->getExtension('routing')->getPath("listdelegation");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    var str = \"<option value=''></option>\";
                    \$(\"#delegation\").show();
                    \$.each(msg, function(index, value) { // pour chaque noeud JSON
                        // on ajoute l option dans la liste
                        //\$(\"delegation2\").append('<option value=\"'+ value.id +'\">'+ value.name +'</option>');
                        str += \"<option value='\"+ value.id+\"'>\"+ value.name+\"</option>\";
                    });
                    \$('#delegation2').html(str);

                }
            });
        }
        \$('#ville').typeahead({
            onSelect: function(item) {
                \$(\"#ccp\").val(item.value)
            },
            ajax: {
                url: '";
        // line 104
        echo $this->env->getExtension('routing')->getPath("listvilleajx");
        echo "',
                triggerLength: 1
            },
            afterSelect: function (item) {
                //save the id value into the hidden field
                console.log(item)
            },
            displayField: 'full_name'

        })

        /* \$.validator.setDefaults({
         submitHandler: function() {
         alert(\"submitted!\");
         }
         });*/

        \$().ready(function () {
            \$(\"#inscription_client_title\").attr({
                'data-validation': 'required'
            });
            \$(\"#inscription_client_fname\").attr({
                'data-validation': 'required'
            });
            \$(\"#inscription_client_name\").attr({
                'data-validation': 'required'
            });
            \$(\"#adresse1\").attr({
                'data-validation': 'required'
            });

            \$(\"#ville\").attr({
                'data-validation': 'required'
            });
            \$(\"#ccp\").attr({
                'data-validation': 'number'
            });
            \$(\"#inscription_client_email\").attr('data-validation', 'email');
            \$(\"#inscription_client_phone\").attr({'data-validation': 'length number', 'data-validation-length': '8-8'});

            \$(\"#inscription_client_password_first\").attr({
                'data-validation': 'length',
                'data-validation-length': 'min8'
            });
            \$(\"#inscription_client_password_second\").attr({
                'data-validation': 'confirmation',
                'data-validation-confirm':'inscription_client[password][first]'
            });


            \$.validate({
                modules: 'security'
            } );
        });
    </script>
    <script>

        \$(document).ready(function () {
            \$('.alert-success').delay(5000).fadeOut();
        });
        \$(document).ready(function () {
            \$('.alert-error').delay(5000).fadeOut();
        });
        \$(\"#cgv\").change(function () {
            if (\$('#cgv').is(':checked')) {
                \$('#submit').removeAttr('disabled')
            } else {
                \$('#submit').attr('disabled', 'disabled')
            }

        })

    </script>
";
    }

    // line 178
    public function block_body($context, array $blocks = array())
    {
        // line 179
        echo "
    ";
        // line 180
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 181
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["flashMessages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 182
                echo "            <br/>
            <div class=\"alert ";
                // line 183
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                ";
                // line 185
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flashMessage"]), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 189
        echo "    <div class=\"authen\">
        <div class=\"clearfix\">
            <div class=\"col-md-12 title\">
                <h1 class=\"bold\">S’inscrire </h1> <span>|</span> <a class=\"teal\" href=\"";
        // line 192
        echo $this->env->getExtension('routing')->getPath("identification");
        echo "\"><span> S’identifier</span></a>
            </div>
        </div>
        <div class=\"row reg\">
            <div class=\"col-md-5 text-center signin\">
                <h3 class=\"bold\">Inscrivez-vous avec votre compte facebook</h3>
                <a class=\"btn btn-facebook\" href=\"";
        // line 198
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
\t\t\t\t<h3 class=\"bold\">Créer votre compte BIGDeal.tn</h3>
\t\t\t\t";
        // line 208
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "POST", "attr" => array("class" => "form-horizontal form", "id" => "inscriptionForm")));
        echo "
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"titre\" class=\"col-sm-4 control-label hidden-xs\">Titre</label>

\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t";
        // line 213
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"nom\" class=\"col-sm-4 control-label hidden-xs\">Prénom / Nom</label>

\t\t\t\t\t<div class=\"col-md-4 col-sm-4\">
\t\t\t\t\t\t";
        // line 221
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fname", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Enter votre Prénom")));
        // line 222
        echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4 col-sm-4\">
\t\t\t\t\t\t";
        // line 225
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Enter votre Nom")));
        // line 226
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"adresse\" class=\"col-sm-4 control-label hidden-xs\">Adresse</label>

\t\t\t\t\t<div class=\"col-md-8 col-sm-8\">
\t\t\t\t\t\t<input type=\"text\" name=\"adresse\" class=\"form-control\" id=\"adresse1\"
\t\t\t\t\t\t\t   placeholder=\"Enter votre adresse\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"indication_adresse\" class=\"col-sm-4 control-label hidden-xs\">Indication Adresse</label>

\t\t\t\t\t<div class=\"col-md-8 col-sm-8\">
\t\t\t\t\t\t<input type=\"text\" name=\"indication_adresse\" class=\"form-control\" id=\"adresse2\"
\t\t\t\t\t\t\t   placeholder=\"Indication d'adresse (exp: à coté de..., en face de...)\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label class=\"col-sm-4 control-label hidden-xs\" for=\"gouvernorat\">Gouvernorat /Délegations</label>
\t\t\t\t\t<div class=\"col-md-4 col-sm-4\">
\t\t\t\t\t\t<select name=\"gouvernorat\" onChange=\"javascript:sendData(''+this.value+'')\" required=\"required\">
\t\t\t\t\t\t\t<option value=\"\"> Gouvernorat</option>

\t\t\t\t\t\t\t";
        // line 251
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gouvernorat"]) ? $context["gouvernorat"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 252
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 254
        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4 col-sm-4\">
\t\t\t\t\t\t<select name=\"delegation\" id=\"delegation2\" onChange=\"javascript:sendData2(''+this.value+'')\" required=\"required\">
\t\t\t\t\t\t\t<option value=\"\"> Delegation</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"cp\" class=\"col-sm-4 control-label hidden-xs\">Ville / C.P.</label>

\t\t\t\t\t<div class=\"col-md-4 col-sm-4\">
\t\t\t\t\t\t<select name=\"ville\" id=\"delegation3\"  required=\"required\"  onChange=\"javascript:afficherCodePostale(''+this.value+'')\">
\t\t\t\t\t\t<option value=\"\"> Ville</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4 col-sm-4\">
\t\t\t\t\t\t<input type=\"text\" required=\"required\" class=\"form-control cp\" readonly name=\"cp\" id=\"ccp\" placeholder=\"Enter votre CP\"
\t\t\t\t\t\t\t   maxlength=\"4\" autocomplete=\"off\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"email\" class=\"col-sm-4 control-label hidden-xs\">E-mail</label>

\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t";
        // line 279
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Enter votre e-mail")));
        // line 280
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"phone\" class=\"col-sm-4 control-label hidden-xs\">Téléphone</label>

\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t";
        // line 287
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Enter votre numero de télephone")));
        // line 288
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        // line 291
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "password", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["passwordField"]) {
            // line 292
            echo "\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"password\" class=\"col-sm-4 control-label hidden-xs\">";
            // line 293
            if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                echo "Mot de passe ";
            } else {
                echo "Confirmation";
            }
            echo "</label>
\t\t\t\t\t\t";
            // line 294
            if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                echo " 
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t";
                // line 296
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["passwordField"], 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Mot de passe")));
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            } else {
                // line 299
                echo "\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t";
                // line 300
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["passwordField"], 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Confirmation")));
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 303
            echo "\t\t\t\t\t</div>
\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['passwordField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 305
        echo "

\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"col-sm-offset-4 col-sm-8\">
\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<input type=\"checkbox\"> Se connecter automatiquement depuis cet ordinateur
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"col-sm-offset-4 col-sm-8\">
\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<input type=\"checkbox\"> Je veux recevoir des e-mails personnalisés sur les meilleurs commerces
\t\t\t\t\t\t\t\tlocaux, produits et voyages. (en fonction de mon lieu de résidence, de mes préférences de
\t\t\t\t\t\t\t\tnavigation sur internet et mobile, des données fournies par les cookies ou autres dispositifs,
\t\t\t\t\t\t\t\tde mon historique d’achat et d’autres informations).
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"col-sm-offset-4 col-sm-8\">
\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"cgv\"> J'accepte les <a class=\"light-blue\" target=\"_blank\" href=\"";
        // line 332
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "conditions-generales"));
        echo "\">Conditions générales de
\t\t\t\t\t\t\t\t\tcommercialisation</a> ainsi que la <a class=\"light-blue\" target=\"_blank\" href=\"";
        // line 333
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "politique-de-confidentialite"));
        echo "\">Politique de confidentialité</a>.
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div class=\"col-sm-offset-4 col-sm-4 col-xs-6\">
\t\t\t\t\t\t<input type=\"submit\" id=\"submit\" value=\"S'inscrire\" disabled=\"disabled\" class=\"btn btn-infos\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-4 col-sm-4 col-xs-6 login-link\">
\t\t\t\t\t\t<a href=\"";
        // line 343
        echo $this->env->getExtension('routing')->getPath("identification");
        echo "\" title=\"login\">Déja membre ?</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<input type=\"hidden\" name=\"localite\" id=\"localite\">
\t\t\t\t";
        // line 347
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'widget');
        echo "
\t\t\t\t";
        // line 348
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
\t\t\t</div>
        </div>
        
    </div>
";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Client:inscription.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  549 => 348,  545 => 347,  538 => 343,  525 => 333,  521 => 332,  492 => 305,  477 => 303,  471 => 300,  468 => 299,  462 => 296,  457 => 294,  449 => 293,  446 => 292,  429 => 291,  424 => 288,  422 => 287,  413 => 280,  411 => 279,  384 => 254,  373 => 252,  369 => 251,  342 => 226,  340 => 225,  335 => 222,  333 => 221,  322 => 213,  314 => 208,  301 => 198,  292 => 192,  287 => 189,  281 => 188,  272 => 185,  267 => 183,  264 => 182,  259 => 181,  255 => 180,  252 => 179,  249 => 178,  171 => 104,  148 => 84,  124 => 63,  99 => 41,  80 => 25,  70 => 17,  56 => 15,  51 => 14,  48 => 13,  36 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* {% form_theme form 'form_table_layout.html.twig' %}*/
/* {% block stylesheets %}*/
/*     <style>*/
/*         .help-block {*/
/*             color: red;*/
/*             display: block;*/
/*             margin-bottom: 0px;*/
/*             margin-top: 0px;*/
/*         }*/
/*     </style>*/
/* {% endblock %}*/
/* {% block javascripts %}*/
/*     {% javascripts '@BackPlanningBundle/Resources/public/js/jquery.form-validator.js' %}*/
/*     <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* */
/*     */
/*     <script>*/
/*         function afficherCodePostale(id)*/
/*         {*/
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('viewcp')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     $("#ccp").val(msg);*/
/* */
/* */
/*                 }*/
/*             });*/
/*         }*/
/* */
/*         function sendData3(id)*/
/*         {*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('listdelegation')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     var str = "<option value=''></option>";*/
/*                     $("#delegation1").show();*/
/*                     $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                         // on ajoute l option dans la liste*/
/*                         //$("delegation2").append('<option value="'+ value.id +'">'+ value.name +'</option>');*/
/*                         str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/* */
/*                     });*/
/*                     // $('#delegation3').html(str);*/
/* */
/*                 }*/
/*             });*/
/*         }*/
/*         function sendData2(id)*/
/*         {*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('listdelegation')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     var str = "<option value=''></option>";*/
/*                     $("#localite").show();*/
/*                     $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                         // on ajoute l option dans la liste*/
/*                         //$("delegation2").append('<option value="'+ value.id +'">'+ value.name +'</option>');*/
/*                         str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/*                     });*/
/*                     $('#delegation3').html(str);*/
/* */
/*                 }*/
/*             });*/
/*         }*/
/*         function sendData(id)*/
/*         {*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('listdelegation')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     var str = "<option value=''></option>";*/
/*                     $("#delegation").show();*/
/*                     $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                         // on ajoute l option dans la liste*/
/*                         //$("delegation2").append('<option value="'+ value.id +'">'+ value.name +'</option>');*/
/*                         str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/*                     });*/
/*                     $('#delegation2').html(str);*/
/* */
/*                 }*/
/*             });*/
/*         }*/
/*         $('#ville').typeahead({*/
/*             onSelect: function(item) {*/
/*                 $("#ccp").val(item.value)*/
/*             },*/
/*             ajax: {*/
/*                 url: '{{path('listvilleajx')}}',*/
/*                 triggerLength: 1*/
/*             },*/
/*             afterSelect: function (item) {*/
/*                 //save the id value into the hidden field*/
/*                 console.log(item)*/
/*             },*/
/*             displayField: 'full_name'*/
/* */
/*         })*/
/* */
/*         /* $.validator.setDefaults({*/
/*          submitHandler: function() {*/
/*          alert("submitted!");*/
/*          }*/
/*          });*//* */
/* */
/*         $().ready(function () {*/
/*             $("#inscription_client_title").attr({*/
/*                 'data-validation': 'required'*/
/*             });*/
/*             $("#inscription_client_fname").attr({*/
/*                 'data-validation': 'required'*/
/*             });*/
/*             $("#inscription_client_name").attr({*/
/*                 'data-validation': 'required'*/
/*             });*/
/*             $("#adresse1").attr({*/
/*                 'data-validation': 'required'*/
/*             });*/
/* */
/*             $("#ville").attr({*/
/*                 'data-validation': 'required'*/
/*             });*/
/*             $("#ccp").attr({*/
/*                 'data-validation': 'number'*/
/*             });*/
/*             $("#inscription_client_email").attr('data-validation', 'email');*/
/*             $("#inscription_client_phone").attr({'data-validation': 'length number', 'data-validation-length': '8-8'});*/
/* */
/*             $("#inscription_client_password_first").attr({*/
/*                 'data-validation': 'length',*/
/*                 'data-validation-length': 'min8'*/
/*             });*/
/*             $("#inscription_client_password_second").attr({*/
/*                 'data-validation': 'confirmation',*/
/*                 'data-validation-confirm':'inscription_client[password][first]'*/
/*             });*/
/* */
/* */
/*             $.validate({*/
/*                 modules: 'security'*/
/*             } );*/
/*         });*/
/*     </script>*/
/*     <script>*/
/* */
/*         $(document).ready(function () {*/
/*             $('.alert-success').delay(5000).fadeOut();*/
/*         });*/
/*         $(document).ready(function () {*/
/*             $('.alert-error').delay(5000).fadeOut();*/
/*         });*/
/*         $("#cgv").change(function () {*/
/*             if ($('#cgv').is(':checked')) {*/
/*                 $('#submit').removeAttr('disabled')*/
/*             } else {*/
/*                 $('#submit').attr('disabled', 'disabled')*/
/*             }*/
/* */
/*         })*/
/* */
/*     </script>*/
/* {% endblock %}*/
/* {% block body %}*/
/* */
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
/*                 <h1 class="bold">S’inscrire </h1> <span>|</span> <a class="teal" href="{{ path('identification') }}"><span> S’identifier</span></a>*/
/*             </div>*/
/*         </div>*/
/*         <div class="row reg">*/
/*             <div class="col-md-5 text-center signin">*/
/*                 <h3 class="bold">Inscrivez-vous avec votre compte facebook</h3>*/
/*                 <a class="btn btn-facebook" href="{{ loginUrl }}"><i class="fa fa-facebook"></i> Se connecter</a>*/
/*             </div>*/
/* 			<div class="vertical-spacer  hidden-xs">*/
/*               <span>ou</span>*/
/*             </div>*/
/* 			<div class="horizontal-spacer hidden-md hidden-sm">*/
/*               <span>ou</span>*/
/*             </div>*/
/* 			<div class="col-md-offset-1 col-md-6">*/
/* 				<h3 class="bold">Créer votre compte BIGDeal.tn</h3>*/
/* 				{{ form_start(form, {'method': 'POST','attr': {'class': 'form-horizontal form','id':'inscriptionForm'}}) }}*/
/* 				<div class="form-group">*/
/* 					<label for="titre" class="col-sm-4 control-label hidden-xs">Titre</label>*/
/* */
/* 					<div class="col-sm-8">*/
/* 						{{ form_widget(form.title, { 'attr': {'class': "form-control"} }) }}*/
/* */
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="nom" class="col-sm-4 control-label hidden-xs">Prénom / Nom</label>*/
/* */
/* 					<div class="col-md-4 col-sm-4">*/
/* 						{{ form_widget(form.fname, { 'attr': {'class': "form-control",*/
/* 							'placeholder': "Enter votre Prénom"} }) }}*/
/* 					</div>*/
/* 					<div class="col-md-4 col-sm-4">*/
/* 						{{ form_widget(form.name, { 'attr': {'class': "form-control",*/
/* 							'placeholder': "Enter votre Nom"} }) }}*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="adresse" class="col-sm-4 control-label hidden-xs">Adresse</label>*/
/* */
/* 					<div class="col-md-8 col-sm-8">*/
/* 						<input type="text" name="adresse" class="form-control" id="adresse1"*/
/* 							   placeholder="Enter votre adresse">*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="indication_adresse" class="col-sm-4 control-label hidden-xs">Indication Adresse</label>*/
/* */
/* 					<div class="col-md-8 col-sm-8">*/
/* 						<input type="text" name="indication_adresse" class="form-control" id="adresse2"*/
/* 							   placeholder="Indication d'adresse (exp: à coté de..., en face de...)">*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label class="col-sm-4 control-label hidden-xs" for="gouvernorat">Gouvernorat /Délegations</label>*/
/* 					<div class="col-md-4 col-sm-4">*/
/* 						<select name="gouvernorat" onChange="javascript:sendData(''+this.value+'')" required="required">*/
/* 							<option value=""> Gouvernorat</option>*/
/* */
/* 							{% for item in gouvernorat %}*/
/* 								<option value="{{ item.id }}">{{ item.name }}</option>*/
/* 							{% endfor %}*/
/* 						</select>*/
/* 					</div>*/
/* 					<div class="col-md-4 col-sm-4">*/
/* 						<select name="delegation" id="delegation2" onChange="javascript:sendData2(''+this.value+'')" required="required">*/
/* 							<option value=""> Delegation</option>*/
/* 						</select>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="cp" class="col-sm-4 control-label hidden-xs">Ville / C.P.</label>*/
/* */
/* 					<div class="col-md-4 col-sm-4">*/
/* 						<select name="ville" id="delegation3"  required="required"  onChange="javascript:afficherCodePostale(''+this.value+'')">*/
/* 						<option value=""> Ville</option>*/
/* 						</select>*/
/* 					</div>*/
/* 					<div class="col-md-4 col-sm-4">*/
/* 						<input type="text" required="required" class="form-control cp" readonly name="cp" id="ccp" placeholder="Enter votre CP"*/
/* 							   maxlength="4" autocomplete="off">*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="email" class="col-sm-4 control-label hidden-xs">E-mail</label>*/
/* */
/* 					<div class="col-sm-8">*/
/* 						{{ form_widget(form.email, { 'attr': {'class': "form-control",*/
/* 							'placeholder': "Enter votre e-mail"} }) }}*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<label for="phone" class="col-sm-4 control-label hidden-xs">Téléphone</label>*/
/* */
/* 					<div class="col-sm-8">*/
/* 						{{ form_widget(form.phone, { 'attr': {'class': "form-control",*/
/* 							'placeholder': "Enter votre numero de télephone"} }) }}*/
/* 					</div>*/
/* 				</div>*/
/* 				{% for passwordField in form.password %}*/
/* 					<div class="form-group">*/
/* 						<label for="password" class="col-sm-4 control-label hidden-xs">{% if loop.index==1 %}Mot de passe {% else %}Confirmation{% endif %}</label>*/
/* 						{% if loop.index==1 %} */
/* 						<div class="col-sm-8">*/
/* 							{{ form_widget(passwordField, { 'attr': {'class': 'form-control','placeholder': 'Mot de passe' } }) }}*/
/* 						</div>*/
/* 						{% else %}*/
/* 						<div class="col-sm-8">*/
/* 							{{ form_widget(passwordField, { 'attr': {'class': 'form-control','placeholder': 'Confirmation' } }) }}*/
/* 						</div>*/
/* 						{% endif %}*/
/* 					</div>*/
/* 				{% endfor %}*/
/* */
/* */
/* 				<div class="form-group">*/
/* 					<div class="col-sm-offset-4 col-sm-8">*/
/* 						<div class="checkbox">*/
/* 							<label>*/
/* 								<input type="checkbox"> Se connecter automatiquement depuis cet ordinateur*/
/* 							</label>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<div class="col-sm-offset-4 col-sm-8">*/
/* 						<div class="checkbox">*/
/* 							<label>*/
/* 								<input type="checkbox"> Je veux recevoir des e-mails personnalisés sur les meilleurs commerces*/
/* 								locaux, produits et voyages. (en fonction de mon lieu de résidence, de mes préférences de*/
/* 								navigation sur internet et mobile, des données fournies par les cookies ou autres dispositifs,*/
/* 								de mon historique d’achat et d’autres informations).*/
/* 							</label>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<div class="col-sm-offset-4 col-sm-8">*/
/* 						<div class="checkbox">*/
/* 							<label>*/
/* 								<input type="checkbox" id="cgv"> J'accepte les <a class="light-blue" target="_blank" href="{{ path('pages_detail',{'name':'conditions-generales'}) }}">Conditions générales de*/
/* 									commercialisation</a> ainsi que la <a class="light-blue" target="_blank" href="{{ path('pages_detail',{'name':'politique-de-confidentialite'}) }}">Politique de confidentialité</a>.*/
/* 							</label>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="form-group">*/
/* 					<div class="col-sm-offset-4 col-sm-4 col-xs-6">*/
/* 						<input type="submit" id="submit" value="S'inscrire" disabled="disabled" class="btn btn-infos">*/
/* 					</div>*/
/* 					<div class="col-sm-4 col-sm-4 col-xs-6 login-link">*/
/* 						<a href="{{ path('identification') }}" title="login">Déja membre ?</a>*/
/* 					</div>*/
/* 				</div>*/
/* 				<input type="hidden" name="localite" id="localite">*/
/* 				{{ form_widget(form._token) }}*/
/* 				{{ form_end(form) }}*/
/* 			</div>*/
/*         </div>*/
/*         */
/*     </div>*/
/* {% endblock %}*/
/* */
