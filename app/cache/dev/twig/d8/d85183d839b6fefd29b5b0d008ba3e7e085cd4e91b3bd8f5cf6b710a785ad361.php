<?php

/* MainFrontBundle:Deal:jachete.html.twig */
class __TwigTemplate_e731cdee09baa79143f035ce3396cf4e1ffa2cd48b624e48cc24470e05e8cb19 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "MainFrontBundle:Deal:jachete.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
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
        // line 2
        $context["idClient"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array());
        // line 3
        $context["varexist"] = 0;
        // line 4
        $context["varid"] = 0;
        // line 5
        $context["foo"] = "non";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "adresses", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 7
            if (((isset($context["varexist"]) ? $context["varexist"] : null) != 1)) {
                // line 8
                $context["varexist"] = 1;
                // line 9
                $context["varid"] = $this->getAttribute($context["item"], "id", array());
            }
            // line 11
            if (($this->getAttribute($context["item"], "stat", array()) == 1)) {
                // line 12
                $context["foo"] = "oui";
                // line 13
                $context["varid"] = $this->getAttribute($context["item"], "id", array());
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        if (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "shipping", array()) == 1)) {
            // line 18
            $context["montantLivraison"] = $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "price", array());
        } else {
            // line 20
            $context["montantLivraison"] = 0;
        }
        // line 22
        $context["totalCommande"] = (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "bigdealPrice", array()) * (isset($context["qte"]) ? $context["qte"] : null)) + ((isset($context["montantLivraison"]) ? $context["montantLivraison"] : null) * (isset($context["qte"]) ? $context["qte"] : null)));
        // line 23
        $context["TotalBigFid"] = $this->env->getExtension('twig_extension')->getBigfidFilter((isset($context["totalCommande"]) ? $context["totalCommande"] : null));
        // line 24
        $context["soldBigFid"] = $this->env->getExtension('twig_extension')->getBigFidToDinarFilter($this->env->getExtension('twig_extension')->getSoldeBigFidClientFilter((isset($context["idClient"]) ? $context["idClient"] : null)));
        // line 25
        $context["nombreCouponAcheterParClient"] = $this->env->getExtension('caisse_extension')->getNombreAcheteursReferenceParClient((isset($context["idClient"]) ? $context["idClient"] : null), $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()));
        // line 26
        if (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "maxCoupon", array()) == 0)) {
            // line 27
            if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()) == 0)) {
                // line 28
                $context["maxCoupon"] = 15;
            } else {
                // line 30
                $context["maxCoupon"] = ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()) - (isset($context["nombreCouponAcheterParClient"]) ? $context["nombreCouponAcheterParClient"] : null));
            }
        } else {
            // line 33
            if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()) == 0)) {
                // line 34
                $context["maxCoupon"] = ($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "maxCoupon", array()) - $this->env->getExtension('twig_extension')->getNombreAcheteursReferenceFilter($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array())));
            } else {
                // line 36
                if (($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array()) > ($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "maxCoupon", array()) - $this->env->getExtension('twig_extension')->getNombreAcheteursReferenceFilter($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()))))) {
                    // line 37
                    $context["maxCoupon"] = ($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "maxCoupon", array()) - $this->env->getExtension('twig_extension')->getNombreAcheteursReferenceFilter($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array())));
                } else {
                    // line 39
                    $context["maxCoupon"] = $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "maxCouponUser", array());
                }
            }
        }
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 43
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 45
    public function block_title($context, array $blocks = array())
    {
    }

    // line 46
    public function block_body($context, array $blocks = array())
    {
        // line 47
        echo "    <div id=\"content\" class=\"marg-50\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12 entry\">
\t\t\t\t<h1>Votre commande</h1>
\t\t\t</div>
\t\t</div>
        <form id=\"tocheck\" class=\"form-horizontal form\" action=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()))), "html", null, true);
        echo "\" method=\"POST\">
            <input type=\"hidden\"  name=\"livr\" id=\"livr\" value=\"0\">
            <input type=\"hidden\"  name=\"adr\" id=\"adr\" value=\"0\">
            <div class=\"informations\">
                <!-- Processus de commande -->
                <div class=\"table-responsive pay\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>Description du deal</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th>Sous-total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class=\"row\">
                                    <div class=\"col-sm-3 col-xs-6 text-center\">
                                        <img src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('liip_imagine')->filter($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "image1", array()), "thumbcommandedeal")), "html", null, true);
        echo "\"
                                             alt=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array()), "html", null, true);
        echo "\">
                                    </div>
                                    <div class=\"col-sm-9 col-xs-6\">
                                        <p>";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "title", array()), "html", null, true);
        echo "</p>
                                    </div>
                                </div>
                            </td>
                            <td class=\"bold\">";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "bigdealPrice", array()), "html", null, true);
        echo " <sup>DT</sup></td>
                            <td class=\"bg\">
                                <select class=\"form-control\" id=\"form-control\" name=\"qte\">
                                    ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxCoupon"]) ? $context["maxCoupon"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 85
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["item"], "html", null, true);
            echo "\" ";
            if (((isset($context["qte"]) ? $context["qte"] : null) == $context["item"])) {
                echo " selected ";
            }
            echo " >";
            echo twig_escape_filter($this->env, $context["item"], "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "                                </select>
                            </td>
                            <td class=\"bold\">";
        // line 89
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "bigdealPrice", array()) * (isset($context["qte"]) ? $context["qte"] : null)), "html", null, true);
        echo " <sup>DT</sup></td>
                        </tr>
                        ";
        // line 91
        if (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "shipping", array()) == 1)) {
            // line 92
            echo "                            <tr>
                                <td>Livraison</td>
                                <td>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "price", array()), "html", null, true);
            echo " <sup>DT</sup></td>
                                <td>";
            // line 95
            echo twig_escape_filter($this->env, (isset($context["qte"]) ? $context["qte"] : null), "html", null, true);
            echo "</td>
                                <td class=\"total bold\">";
            // line 96
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "price", array()) * (isset($context["qte"]) ? $context["qte"] : null)), "html", null, true);
            echo " <sup>DT</sup></td>
                            </tr>
                        ";
        }
        // line 99
        echo "                        <tr class=\"hidden-xs\">
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td class=\"bold\">";
        // line 103
        echo twig_escape_filter($this->env, (isset($context["totalCommande"]) ? $context["totalCommande"] : null), "html", null, true);
        echo " <sup>DT</sup>
                                <small>(";
        // line 104
        echo twig_escape_filter($this->env, (isset($context["TotalBigFid"]) ? $context["TotalBigFid"] : null), "html", null, true);
        echo " <sup>B</sup> )</small>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
\t\t\t\t<div class=\"row hidden-md hidden-sm mb10\">
\t\t\t\t\t<div class=\"col-xs-5\">
\t\t\t\t\t\t<p><span class=\"bold\">Total</span></p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-7\">
\t\t\t\t\t\t<p class=\"bold\">";
        // line 115
        echo twig_escape_filter($this->env, (isset($context["totalCommande"]) ? $context["totalCommande"] : null), "html", null, true);
        echo " <sup>DT</sup>
                                <small>(";
        // line 116
        echo twig_escape_filter($this->env, (isset($context["TotalBigFid"]) ? $context["TotalBigFid"] : null), "html", null, true);
        echo " <sup>B</sup> )</small></p>
\t\t\t\t\t</div>
\t\t\t\t</div>
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        <p>Ci - dessous les coordonnées de la personne qui bénéficiera de notre deal s’il vous plait ,
                            veuillez vous assurer du nom inscrit ( il doit correspondre avec une pièce d’identité )
                            et de l’adresse email . Si vous souhaitez offrir notre deal à une autre personne , merci de
                            procéder à la modification du nom
                        </p>
                    </div>
                </div>

                <div class=\"mt-40\">
                    <div class=\"form-group\">
                        <label for=\"nom\" class=\"col-sm-4 control-label\">Le coupon est au nom de</label>

                        <div class=\"col-sm-6\">
                            <input type=\"text\" class=\"form-control\" value=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "fname", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "name", array()), "html", null, true);
        echo "\"
                                   required=\"required\" name=\"clientcoupon\" id=\"nom\" placeholder=\"Nom...\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"email\" class=\"col-sm-4 control-label\">E-mail pour la récupération des
                            coupons</label>

                        <div class=\"col-sm-6\">
                            <input type=\"email\" class=\"form-control\" id=\"email\" required=\"required\" name=\"clientemail\"
                                   value=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "email", array()), "html", null, true);
        echo "\" placeholder=\"E-mail...\">
                        </div>
                    </div>
                    ";
        // line 147
        if (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "shipping", array()) == 1)) {
            // line 148
            echo "                        <div class=\"form-group\">
                            <label for=\"adresse\" class=\"col-sm-4 control-label bold\">Vos adresses</label>

                            <div class=\"col-sm-6\">
                                <select class=\"form-control\" required=\"required\" name=\"adresse\">
                                    ";
            // line 153
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "adresses", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 154
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "adress", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "indcation", array()), "html", null, true);
                echo "
                                            - ";
                // line 155
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "name", array()), "html", null, true);
                echo "- ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "cp", array()), "html", null, true);
                echo " </option>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 157
            echo "
                                </select>
                            </div>
                        </div>
                    ";
        }
        // line 162
        echo "
                </div>
                ";
        // line 164
        if (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "shipping", array()) == 1)) {
            // line 165
            echo "
                    <div class=\"row\">
                        <div class=\"col-sm-10\">
                            <a href=\"#\" title=\"Ajouter une adresse\" class=\"btn btn-infos pull-right\" data-toggle=\"modal\"
                               data-target=\".add-modal\">Ajouter une adresse</a>
                        </div>
                    </div>
                ";
        }
        // line 173
        echo "
            </div>
            <!-- Methode de paiement -->
            <div class=\"paiement\">
                <div class=\"row marg-50\">
                    <div class=\"col-md-12\">
                        <h4>Veuillez choisir un mode de Paiement</h4>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-8 col-sm-12 col-xs-12\">
                        <div role=\"tabpanel\">
                            <!-- Nav tabs -->
                            <ul id=\"tab\" class=\"btn-group\" data-toggle=\"buttons-radio\" role=\"tablist\">
                                <li role=\"presentation\" class=\"active\" id=\"gpg\">
                                    <a href=\"#online\" aria-controls=\"online\" role=\"tab\" data-toggle=\"tab\">
                                        <h5>Paiement en Ligne</h5>
                                        <i class=\"fa fa-cc-mastercard\"></i>
                                    </a>
                                </li>
                                ";
        // line 193
        if ($this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "cashPayment", array())) {
            // line 194
            echo "                                    <li role=\"presentation\" id=\"cashe\">
                                        <a href=\"#cash\" aria-controls=\"cash\" role=\"tab\" data-toggle=\"tab\">
                                            <h5>Paiement en Espèce</h5>
                                            <i class=\"fa fa-briefcase\"></i>
                                        </a>
                                    </li>
                                ";
        }
        // line 201
        echo "
                                <li role=\"presentation\" id=\"livraisons\">
                                    <a href=\"#livraison\" aria-controls=\"livraison\" role=\"tab\" data-toggle=\"tab\">
                                        <h5>Paiement à la livraison</h5>
                                        <i class=\"fa fa-envelope-o\"></i>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class=\"tab-content\">
                                <div role=\"tabpanel\" class=\"tab-pane active\" id=\"online\">
                                    <div class=\"bg\">
                                        <span class=\"title teal\">Choix de Paiement</span>

                                        <div class=\"radio\">
                                            <label>
                                                <input type=\"radio\" name=\"paiement\" id=\"optionsRadios\"
                                                       value=\"1\" checked>
                                                <i class=\"fa fa-cc-mastercard\"></i>
                                            </label>
                                        </div>

                                        ";
        // line 224
        if (($this->env->getExtension('twig_extension')->getSoldeBigFidClientFilter((isset($context["idClient"]) ? $context["idClient"] : null)) >= (isset($context["TotalBigFid"]) ? $context["TotalBigFid"] : null))) {
            // line 225
            echo "                                            <div class=\"radio\">
                                                <label>
                                                    <input type=\"radio\" name=\"paiement\" id=\"optionsRadios\"
                                                           value=\"3\">
                                                    <i class=\"flaticon-computerchip teal\"></i><strong>Vous
                                                        avez ";
            // line 230
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getSoldeBigFidClientFilter((isset($context["idClient"]) ? $context["idClient"] : null)), "html", null, true);
            echo " BigFid</strong>
                                                </label>
                                            </div>
                                        ";
        }
        // line 234
        echo "                                    </div>
                                    <span class=\"bold teal new-price\">Nouveau Total: ";
        // line 235
        echo twig_escape_filter($this->env, (isset($context["totalCommande"]) ? $context["totalCommande"] : null), "html", null, true);
        echo "
                                        <sup>DT</sup></span>

                                </div>
                                <div role=\"tabpanel\" class=\"tab-pane\" id=\"cash\">
\t\t\t\t\t\t\t\t\t<div class=\"pay-alert\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t\t\t\t\t\t\t<p>Vous pouvez payer vos commandes en espèce ou par chèque <strong class=\"teal bold\">avant la cloture du deal</strong> à l'un de nos paybox mentionnés sur la carte dessous.</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
                                    <div class=\"bg\">
\t\t\t\t\t\t\t\t\t\t
                                        <div class=\"bh-sl-container\">
                                            <div id=\"map-container\" class=\"bh-sl-map-container\">
                                                <div class=\"bh-sl-loc-list\">
                                                    <ul class=\"list\"></ul>
                                                </div>
                                                <div id=\"bh-sl-map\" class=\"bh-sl-map\"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role=\"tabpanel\" class=\"tab-pane liv\" id=\"livraison\">
                                    <div class=\"pay-alert\">
                                    </div>
                                    <div class=\"bg\">


                                        <div class=\"bh-sl-container\">
                                            <span class=\"title teal\">Frais de livraison : 3 DT</span>
                                        </div>

                                        <div class=\"form-group\">
                                            <label for=\"nom\" class=\"col-sm-4 control-label marg-5\"  >Votre téléphone de contact est </label>
                                            <div class=\"col-sm-4 marg-5\" >
                                                <input type=\"text\" class=\"form-control\" value=\"";
        // line 270
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "phone", array()), "html", null, true);
        echo "\"
                                                       required=\"required\" name=\"clientcoupon\" id=\"nom\" disabled>

                                            </div>

                                            <div class=\"col-sm-4 marg-5\">
                                                    <a href=\"#\" title=\"Modifier\" class=\"btn btn-infos modifier\" data-toggle=\"modal\" data-target=\".add-modal1\">Modifier</a>
                                            </div>
                                        </div>

                                        <div class=\"bh-sl-container marg-5\">
                                            <span>Vous serez contacté par notre livreur sur ce numéro de téléphone. Veuillez vous assurer que ce numéro est joignable.</span>
                                            <div class=\"table-responsive\">
                                                <table class=\"table table-striped\">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Adresse</th>
                                                        <th>Ville</th>
                                                        <th>CP</th>
                                                        <th>Indication</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <input id=\"adressreq\" style=\"display: none;\" class=\"messageCheckbox\" type=\"radio\" name=\"adressreq\" value=\"0\"  required>
                                                    ";
        // line 296
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "adresses", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 297
            echo "
                                                        <tr>
                                                            <td><input id=\"adressreqs\" class=\"messageCheckbox adressreqs\" type=\"radio\" name=\"adressreq\" value=\"";
            // line 299
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\" onclick=\"choisiradresse(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()), "html", null, true);
            echo ")\" ";
            if (($this->getAttribute($context["item"], "stat", array()) == 1)) {
                echo " checked  ";
            }
            echo "></td>
                                                            <td>";
            // line 300
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "adress", array()), "html", null, true);
            echo "</td>
                                                            <td>";
            // line 301
            if ($this->getAttribute($context["item"], "localite", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "name", array()), "html", null, true);
            }
            echo "</td>
                                                            <td>";
            // line 302
            if ($this->getAttribute($context["item"], "localite", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "cp", array()), "html", null, true);
            }
            echo "</td>
                                                            <td>";
            // line 303
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "indcation", array()), "html", null, true);
            echo "</td>
                                                            <td>
                                                                <a href=\"#\" title=\"Modifier\" data-toggle=\"modal\" data-target=\".custom-modal";
            // line 305
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\"><i
                                                                            class=\"fa fa-edit dark-gray\"></i></a>
                                                                <a href=\"javascript:deleteadresse(";
            // line 307
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo ")\" title=\"Supprimer\" class=\"delete\"><i
                                                                            class=\"fa fa-trash teal\"></i></a></td>
                                                        </tr>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 311
        echo "                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class=\"col-sm-offset-7 col-sm-5\">
                                                <a href=\"#\" title=\"Ajouter une adresse\" class=\"btn btn-infos\" data-toggle=\"modal\" data-target=\".add-modal\">Ajouter
                                                    une adresse</a>
                                            </div>


                                        </div>
                                        <span class=\"bold teal new-price-online\">Nouveau Total: ";
        // line 321
        echo twig_escape_filter($this->env, ((isset($context["totalCommande"]) ? $context["totalCommande"] : null) + 3), "html", null, true);
        echo "
                                            <sup>DT</sup></span>
                                           </div>

                                </div>
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" id=\"cgv\" required=\"required\"> En passant ma commande, je
                                        reconnais que je serais
                                        tenu de la payer, je confirme avoir lu et accepté les <a class=\"light-blue\" target=\"_blank\" href=\"";
        // line 330
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "conditions-g-n-rales"));
        echo "\">Conditions générales
                                        de commercialisation</a> de BIGDeal et la <a class=\"light-blue\" target=\"_blank\" href=\"";
        // line 331
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "politique-de-confidentialite"));
        echo "\">Charte
                                        de confidentialité</a>
                                    </label>
                                </div>
                                <input type=\"submit\" id=\"subbtn\" value=\"Valider\" onclick=\"countCheckedalert()\" class=\"btn btn-danger pull-right\">
                            </div>

                        </div>
                    </div>
                    <div class=\"col-md-4 col-sm-12 col-xs-12 bg\">
                        <h4>FAQ Paiement</h4>

                        <div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
                            <div class=\"panel\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingOne\">
                                    <h4 class=\"panel-title\">
                                        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\"
                                           aria-expanded=\"true\" aria-controls=\"collapseOne\">
                                            <i class=\"fa fa-caret-right pr-10\"></i>Que se passe-t-il après mon achat ?
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapseOne\" class=\"panel-collapse collapse in\" role=\"tabpanel\"
                                     aria-labelledby=\"headingOne\">
                                    <div class=\"panel-body\">
                                        Une fois le deal est validé (nombre minimum d'acheteurs atteint) , vous receverez un mail de confirmation indiquant que votre commande a bien été prise en compte. Vous trouverez tous les coupons dans la rubrique mes commandes. Il vous suffit juste de les imprimer. Les conditions et instructions spécifiques pour leur utilisation sont clairement indiquées sur chaque coupon.
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingTwo\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                           href=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                                            <i class=\"fa fa-caret-right pr-10\"></i>Que se passe-t-il si le deal  du jour n'atteint pas le nombre minimum d’acheteurs nécessaires ?
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapseTwo\" class=\"panel-collapse collapse\" role=\"tabpanel\"
                                     aria-labelledby=\"headingTwo\">
                                    <div class=\"panel-body\">
                                        Dans ce cas-là (assez rare), si le deal n'est pas validé alors vous seriez remboursé du montant de votre commande.
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingThree\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                           href=\"#collapseThree\" aria-expanded=\"false\" aria-controls=\"collapseThree\">
                                            <i class=\"fa fa-caret-right pr-10\"></i>Puis-je acheter un coupon BIGDEAL et l’offrir en cadeau à quelqu’un ?
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapseThree\" class=\"panel-collapse collapse\" role=\"tabpanel\"
                                     aria-labelledby=\"headingThree\">
                                    <div class=\"panel-body\">
                                        Bien sûr. Le coupon Bigdeal est une idée toujours pratique et originale de cadeau. Tous les coupons Bigdeal peuvent être offerts. Si vous souhaitez que nous envoyons directement le coupon cadeau à son bénéficiaire, mentionnez le nom et l'email de votre ami lors de l'achat du coupon.
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingfour\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                           href=\"#collapsefour\" aria-expanded=\"false\" aria-controls=\"collapsefour\">
                                            <i class=\"fa fa-caret-right pr-10\"></i>Est-ce sécurisé ?
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapsefour\" class=\"panel-collapse collapse\" role=\"tabpanel\"
                                     aria-labelledby=\"headingfour\">
                                    <div class=\"panel-body\">
                                        Tout à fait, notre programme de sécurité comprend des contrôles administratifs, techniques et physiques qui sont conçus pour protéger vos informations. Votre numéro de carte de crédit est transmis par un protocole sécurisé SSL . À aucun moment, ces informations ne sont stockées sur nos serveurs.
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingfive\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                           href=\"#collapsefive\" aria-expanded=\"false\" aria-controls=\"collapsefive\">
                                            <i class=\"fa fa-caret-right pr-10\"></i>Si je change d'avis, puis-je annuler ma commande ?
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapsefive\" class=\"panel-collapse collapse\" role=\"tabpanel\"
                                     aria-labelledby=\"headingfive\">
                                    <div class=\"panel-body\">
                                        Non, une fois vous achetez votre coupon, nous ne pouvons pas annuler votre commande.
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingsix\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                           href=\"#collapsesix\" aria-expanded=\"false\" aria-controls=\"collapsesix\">
                                            <i class=\"fa fa-caret-right pr-10\"></i>Comment utiliser mes points de fildélité BIGFid ?
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapsesix\" class=\"panel-collapse collapse\" role=\"tabpanel\"
                                     aria-labelledby=\"headingsix\">
                                    <div class=\"panel-body\">
                                        Lors de l'achat de votre deal, vous avez la possibilité de payer votre commande par vos points BIGFid une fois votre solde est superieur ou égal au montant de la commande. Si ce n'est pas le cas, vous pouvez payer la différence via le paiement en ligne (carte bancaire ou carte e-dinar).
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Modifier tel Modal1 -->
    <div class=\"modal fade add-modal1\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span
                                aria-hidden=\"true\"><i class=\"fa fa-close\"></i></span></button>
                    <h4 class=\"modal-title\">Modifier Le Téléphone </h4>
                </div>
                <div class=\"modal-body\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">

                            ";
        // line 460
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formphone"]) ? $context["formphone"] : null), 'form_start', array("method" => "POST", "action" => $this->env->getExtension('routing')->getPath("add_phone", array("ref" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()), "deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "qte" => (isset($context["qte"]) ? $context["qte"] : null))), "attr" => array("class" => "form-horizontal", "id" => "addform")));
        echo "
                            <fieldset>

                                <div class=\"form-group\">
                                    <label class=\"col-sm-2 control-label\" for=\"phone\">Phone</label>

                                    <div class=\"col-sm-10\">
                                        ";
        // line 467
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formphone"]) ? $context["formphone"] : null), "phone", array()), 'widget', array("attr" => array("class" => "form-control", "value" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "phone", array()))));
        echo "
                                    </div>
                                </div>

                            </fieldset>

                            ";
        // line 473
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formphone"]) ? $context["formphone"] : null), "_token", array()), 'row');
        echo "

                        </div>



                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class=\"modal-footer\">
                    <a type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Annuler</a>
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"Modifier\"/>
                    ";
        // line 486
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formphone"]) ? $context["formphone"] : null), 'form_end');
        echo "
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter adresse Modal -->
    <div class=\"modal fade add-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span
                                aria-hidden=\"true\"><i class=\"fa fa-close\"></i></span></button>
                    <h4 class=\"modal-title\">Ajout d'une adresse</h4>
                </div>
                <div class=\"modal-body\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">

                            ";
        // line 505
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("method" => "POST", "action" => $this->env->getExtension('routing')->getPath("add_adress_livraison", array("ref" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()), "deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "qte" => (isset($context["qte"]) ? $context["qte"] : null))), "attr" => array("class" => "form-horizontal", "id" => "addform")));
        echo "
                            <fieldset>

                                    <div class=\"form-group\">
                                        <label class=\"col-sm-2 control-label\" for=\"ville\">Adresse</label>

                                        <div class=\"col-sm-10\">
                                            ";
        // line 512
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "adress", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Enter votre adresse")));
        echo "
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"col-sm-2 control-label\" for=\"ville\">Indication adresse</label>

                                        <div class=\"col-sm-10\">
                                            ";
        // line 519
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "indcation", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Indication d'adresse (exp: à coté de..., en face de...)")));
        echo "
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        <label class=\"col-sm-2 control-label\" for=\"gouvernorat\">Gouvernorat /Délegations</label>
                                        <div class=\"col-sm-5\">
                                            <select required=\"required\" name=\"gouvernorat\" onChange=\"javascript:sendData(''+this.value+'')\">
                                                <option value=\"\"></option>

                                                ";
        // line 528
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gouvernorat"]) ? $context["gouvernorat"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 529
            echo "                                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</option>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 531
        echo "                                            </select>
                                        </div>
                                        <div class=\"col-sm-5\">
                                            <select required=\"required\" name=\"delegation\" id=\"delegation2\" onChange=\"javascript:sendData2(''+this.value+'')\">

                                            </select>
                                        </div>
                                    </div>

                                    <div class=\"form-group\">
                                        <label class=\"col-sm-2 control-label\" for=\"ville\">Ville / C.P </label>
                                        <div class=\"col-sm-5\">
                                            <select name=\"ville\" id=\"delegation3\"  required=\"required\" onChange=\"javascript:afficherCodePostale(''+this.value+'')\">

                                            </select>

                                        </div>
                                        <div class=\"col-sm-5\">
                                            <input type=\"text\" required=\"required\" id=\"cpadd\" name=\"cp\" class=\"form-control\" readonly>
                                        </div>
                                    </div>


                                </fieldset>

                            ";
        // line 556
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'row');
        echo "

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class=\"modal-footer\">
                    <a type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Annuler</a>
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"Ajouter\"/>
                    ";
        // line 566
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
                </div>
            </div>
        </div>
    </div>


    <!-- Modifier adresse Modal -->
    ";
        // line 574
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["client"]) ? $context["client"] : null), "adresses", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 575
            echo "        <div class=\"modal fade custom-modal";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
             aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span
                                    aria-hidden=\"true\"><i class=\"fa fa-close\"></i></span></button>
                        <h4 class=\"modal-title\">Modification de l'adresse</h4>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"row\">
                            <div class=\"col-md-12\">
                                <form action=\"";
            // line 587
            echo $this->env->getExtension('routing')->getPath("update_mes_adresse_livraison");
            echo "\" method=\"POST\"
                                      class=\"form-horizontal\">
                                    <fieldset>

                                        <input type=\"hidden\"  name=\"qte\" value=\"";
            // line 591
            echo twig_escape_filter($this->env, (isset($context["qte"]) ? $context["qte"] : null), "html", null, true);
            echo "\">
                                        <input type=\"hidden\"  name=\"ref\" value=\"";
            // line 592
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()), "html", null, true);
            echo "\">
                                        <input type=\"hidden\"  name=\"deal\" value=\"";
            // line 593
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "html", null, true);
            echo "\">

                                        <div class=\"form-group\">
                                            <label class=\"col-sm-2 control-label\" for=\"ville\">Adresse";
            // line 596
            echo twig_escape_filter($this->env, (isset($context["qte"]) ? $context["qte"] : null), "html", null, true);
            echo "</label>

                                            <div class=\"col-sm-10\">
                                                <input type=\"text\" name=\"adress\" value=\"";
            // line 599
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "adress", array()), "html", null, true);
            echo "\"
                                                       required=\"required\" class=\"form-control\">
                                            </div>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"col-sm-2 control-label\" for=\"ville\">Indication adresse</label>

                                            <div class=\"col-sm-10\">
                                                <input type=\"text\" name=\"indcation\" value=\"";
            // line 607
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "indcation", array()), "html", null, true);
            echo "\"
                                                       class=\"form-control\">
                                            </div>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"col-sm-2 control-label\" for=\"gouvernorat\">Gouvernorat /Délegationss</label>
                                            <div class=\"col-sm-5\">
                                                <select name=\"gouvernorat\" onChange=\"javascript:sendData1(''+this.value+'')\">
                                                    <option value=\"\"></option>
                                                    ";
            // line 616
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["gouvernorat"]) ? $context["gouvernorat"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 617
                echo "                                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "</option>
                                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 619
            echo "                                                </select>
                                            </div>
                                            <div class=\"col-sm-5\">
                                                <select name=\"delegation\" id=\"delegation2_update\" class=\"delegation2_update\" onChange=\"javascript:sendData21(''+this.value+'')\">

                                                </select>
                                            </div>
                                        </div>
                                        <div class=\"form-group\">
                                            <label class=\"col-sm-2 control-label\" for=\"ville\">Ville / C.P</label>

                                            <div class=\"col-sm-5\">
                                                <select name=\"ville\" id=\"delegation3_update\" class=\"form-control delegation3_update\"  onChange=\"javascript:afficherCodePostale1(''+this.value+'')\">

                                                </select>

                                            </div>
                                            <div class=\"col-sm-5\">
                                                <input type=\"text\" readonly
                                                       value=\"";
            // line 638
            if ($this->getAttribute($context["item"], "localite", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "localite", array()), "cp", array()), "html", null, true);
            }
            echo "\"
                                                       id=\"cpadd_update\"  maxlength=\"4\" autocomplete=\"off\"
                                                       name=\"cp\" class=\"form-control cpadd_update\"
                                                       placeholder=\"Enter votre CP\" required=\"required\" readonly>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type=\"hidden\" name=\"id\" value=\"";
            // line 645
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\" required=\"required\"/>

                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <div class=\"modal-footer\">
                        <a type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Annuler</a>

                        <input type=\"submit\" class=\"btn btn-primary\" value=\"Sauvegarder\"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 663
        echo "
";
    }

    // line 665
    public function block_javascripts($context, array $blocks = array())
    {
        // line 666
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/handlebars.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 667
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/plugins/storeLocator/jquery.storelocator.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 668
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/sweet-alert.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">

        function countCheckedalert()
        {
            if(var_block==1)
            {
                if (\$('input[name=adressreq]:checked').length==0)
                {
                    if (\$('input[name=adressreq]').length==1) {
                        \$('#tocheck').submit(false);
                        alert(\"Ajoutez une adresse !\");
                    }
                }
            }
        }


        function sendData1(id)
        {
            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 691
        echo $this->env->getExtension('routing')->getPath("listdelegation");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    var str = \"<option value=''></option>\";

                    \$.each(msg, function(index, value) { // pour chaque noeud JSON
                        str += \"<option value='\"+ value.id+\"'>\"+ value.name+\"</option>\";
                    });

                    \$('.delegation2_update').html(str);

                }
            });
        }
        function sendData21(id)
        {

            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 711
        echo $this->env->getExtension('routing')->getPath("listdelegation");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    var str = \"<option value=''></option>\";

                    \$.each(msg, function(index, value) { // pour chaque noeud JSON
                        // on ajoute l option dans la liste
                        //\$(\"delegation2\").append('<option value=\"'+ value.id +'\">'+ value.name +'</option>');
                        str += \"<option value='\"+ value.id+\"'>\"+ value.name+\"</option>\";
                    });
                    \$('.delegation3_update').html(str);
                }
            });
        }

        function sendData(id)
            {

                \$.ajax({
                    type: \"POST\",
                    dataType: \"json\",
                    url: '";
        // line 732
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

            function sendData2(id)
            {
                \$.ajax({
                    type: \"POST\",
                    dataType: \"json\",
                    url: '";
        // line 753
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
            function afficherCodePostale(id)
            {
                \$.ajax({
                    type: \"POST\",
                    dataType: \"json\",
                    url: '";
        // line 772
        echo $this->env->getExtension('routing')->getPath("viewcp");
        echo "',
                    data: \"id=\" + id,
                    success: function (msg) {
                        \$(\"#cpadd\").val(msg);
                    }
                });
            }

        \$('#cpadd').typeahead({
            onSelect: function (item) {
                \$(\"#villeadd\").val(item.value)

            },
            ajax: {
                url: '";
        // line 786
        echo $this->env->getExtension('routing')->getPath("list_villeajx");
        echo "',
                triggerLength: 1
            },
            afterSelect: function (item) {
                //save the id value into the hidden field

            },
            displayField: 'full_name'

        })
        \$(function () {
            \$(\"#form-control\").change(function () {
                window.location = \"";
        // line 798
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()))), "html", null, true);
        echo "?qte=\" + this.value +\"&tabtag=\"+document.getElementById(\"livr\").value ;
            });
        });
        var var_block =0;
        \$(document).ready(function () {


            function countChecked()
            {

                if(var_block==1)
                {
                    if (\$('input[name=adressreq]:checked').length==0)
                    {

                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
                else
                {

                    document.getElementById(\"adressreq\").required = false;

                    return true;

                }
            }
           

            \$('#tocheck').submit(countChecked);
            function getUrlVars() {
                var vars = {};
                var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                    vars[key] = value;
                });
                return vars;
            }
            document.getElementById(\"livr\").value=\"0\";
             var first = getUrlVars()[\"tabtag\"];
            if(first==\"1\")
            {
                document.getElementById(\"adressreq\").required = true;
                \$('html, body').animate({
                    scrollTop: (\$('#livraisons').offset().top)
                },500);

                \$(\"#online\").removeClass(\"active\");
                \$(\"#gpg\").removeClass(\"active\");
                \$(\"#livraisons\").addClass(\"active\");
                \$(\".liv\").addClass(\"active\");
                document.getElementById(\"livr\").value=\"1\";
                var_block=1;
            }
            else
            {
                document.getElementById(\"adressreq\").required = false;

            }

            var comm_idd = \"";
        // line 861
        echo twig_escape_filter($this->env, (isset($context["varid"]) ? $context["varid"] : null), "html", null, true);
        echo "\";

            document.getElementById(\"adr\").value = comm_idd;
            \$(\"#cashe\").click(
                    function () {

                        \$('#map-container').storeLocator({
                            'dataRaw': ";
        // line 868
        echo twig_jsonencode_filter((isset($context["data"]) ? $context["data"] : null));
        echo "
                        });
                        \$(\"#optionsRadios\").removeAttr(\"checked\");

                        document.getElementById(\"livr\").value = \"0\";
                        document.getElementById(\"adressreq\").required = false;

                        var_block=0;
                        \$('#tocheck').submit(true);

                    });
            \$(\"#gpg\").click(
                    function () {
                        document.getElementById(\"livr\").value = \"0\";
                        \$('#optionsRadios').attr('checked', true);
                        var newcontent = \"Nouveau Total:  ";
        // line 883
        echo twig_escape_filter($this->env, (isset($context["totalCommande"]) ? $context["totalCommande"] : null), "html", null, true);
        echo " <sup>DT</sup>\";
                        \$(\".new-price\").html(newcontent);
                        document.getElementById(\"adressreq\").required = false;

                        var_block=0;
                        \$('#tocheck').submit(true);
                    });

            \$(\"#online\").click(
                    function () {
                        document.getElementById(\"livr\").value = \"0\";
                        var newcontent = \"Nouveau Total:  ";
        // line 894
        echo twig_escape_filter($this->env, (isset($context["totalCommande"]) ? $context["totalCommande"] : null), "html", null, true);
        echo " <sup>DT</sup>\";
                        \$(\".new-price-online\").html(newcontent);
                        var_block=0;
                        \$('#tocheck').submit(true);
                        document.getElementById(\"adressreq\").required = false;

                    });


            \$(\"#livraisons\").click(
                    function () {
                        document.getElementById(\"livr\").value = \"1\";
                        document.getElementById(\"adressreq\").required = true;

                        var_block=1;


                        \$(\"#optionsRadios\").removeAttr(\"checked\");
                        /*  var user_stat = \"";
        // line 912
        echo twig_escape_filter($this->env, (isset($context["foo"]) ? $context["foo"] : null), "html", null, true);
        echo "\";
                        var comm_id = \"";
        // line 913
        echo twig_escape_filter($this->env, (isset($context["varid"]) ? $context["varid"] : null), "html", null, true);
        echo "\";
                        var user_id = \"";
        // line 914
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()), "html", null, true);
        echo "\";
                        var user_qte=\"";
        // line 915
        echo twig_escape_filter($this->env, (isset($context["qte"]) ? $context["qte"] : null), "html", null, true);
        echo "\";
                       document.getElementById(\"adr\").value = comm_id;
                        if(user_stat!='oui')
                        {
                            \$.ajax({
                                type: \"POST\",
                                url: \"";
        // line 921
        echo $this->env->getExtension('routing')->getPath("default_adresse");
        echo "\",
                                data: \"id=\" + comm_id+ '&userid=' + user_id,

                                success: function (msg) {
                                    \$(location).attr('href', \"";
        // line 925
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()))), "html", null, true);
        echo "?qte=\"+user_qte);
                                }
                            });
                        }*/
                    });


            \$(\"input[type=radio][name=paiement]\").change(
                    function () {
                        if (\$(this).val() == 1) {
                            var newcontent = \"Nouveau Total:  ";
        // line 935
        echo twig_escape_filter($this->env, (isset($context["totalCommande"]) ? $context["totalCommande"] : null), "html", null, true);
        echo " <sup>DT</sup>\";
                            \$(\".new-price\").html(newcontent);
                        }
                        if (\$(this).val() == 2) {
                            var newcontent = \"Nouveau Total: ";
        // line 939
        echo twig_escape_filter($this->env, ((isset($context["totalCommande"]) ? $context["totalCommande"] : null) - (isset($context["soldBigFid"]) ? $context["soldBigFid"] : null)), "html", null, true);
        echo " <sup>DT</sup> +  ";
        echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getSoldeBigFidClientFilter((isset($context["idClient"]) ? $context["idClient"] : null)), "html", null, true);
        echo "  <sup>B</sup>\";
                            \$(\".new-price\").html(newcontent);
                        }
                        else if (\$(this).val() == 3) {
                            var newcontent = \"Nouveau Total:  ";
        // line 943
        echo twig_escape_filter($this->env, (isset($context["TotalBigFid"]) ? $context["TotalBigFid"] : null), "html", null, true);
        echo "  <sup>B</sup>\";
                            \$(\".new-price\").html(newcontent);
                            //  \$('#regTitle').empty().append(newcontent);
                        }
                        //\$(\"input:radio\").removeAttr(\"checked\");
                    });
        });

        var price =";
        // line 951
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "bigdealPrice", array()), "html", null, true);
        echo ";
        ";
        // line 952
        if (($this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "price", array()) > 0)) {
            // line 953
            echo "        var livr =";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "price", array()), "html", null, true);
            echo ";
        ";
        } else {
            // line 955
            echo "        var livr = 0;
        ";
        }
        // line 957
        echo "
        function checkville(valeur, div, localitediv) {
            var cp = \$(\"#\" + valeur).val();
            if (cp.length == 4) {
                \$.ajax({
                    type: 'get',
                    url: '";
        // line 963
        echo $this->env->getExtension('routing')->getPath("ville");
        echo "',
                    data: \"cp=\" + cp,
                    success: function (data) {
                        \$(\"#\" + div).val(data.label);
                        \$(\"#\" + localitediv).val(data.id);
                    }
                });
            } else {
                \$(\".ville\").val('');
                \$(\"#localite\").val('');
            }
        }

        function deleteadresse(id) {


            if (\$('input[name=adressreq]:checked').length==0)
            {
                if (\$('input[name=adressreq]').length==1) {
                    \$('#tocheck').submit(false);

                }
            }


            swal({
                        title: \"Voulez vous vraiment supprimer cette adresse?\",
                        text: \"\",
                        type: \"error\",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'Supprimer'

                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            var user_qte=\"";
        // line 999
        echo twig_escape_filter($this->env, (isset($context["qte"]) ? $context["qte"] : null), "html", null, true);
        echo "\";
                            // ajax delete delete_mes_adresse
                            \$.ajax({
                                type: \"POST\",
                                url: \"";
        // line 1003
        echo $this->env->getExtension('routing')->getPath("delete_mes_adresse");
        echo "\",
                                data: \"id=\" + id,
                                success: function (msg) {
                                    \$(location).attr('href', \"";
        // line 1006
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()))), "html", null, true);
        echo "\"+'?qte='+user_qte+\"&tabtag=1\");
                                }
                            });

                        } else {
                        }
                    }
            )
            ;
        }
        function afficherCodePostale1(id)
        {
            \$.ajax({
                type: \"POST\",
                dataType: \"json\",
                url: '";
        // line 1021
        echo $this->env->getExtension('routing')->getPath("viewcp");
        echo "',
                data: \"id=\" + id,
                success: function (msg) {
                    \$(\".cpadd_update\").val(msg);


                }
            });
        }

        function choisiradresse(id,userid) {
            \$('#tocheck').submit(true);
            var user_qte=\"";
        // line 1033
        echo twig_escape_filter($this->env, (isset($context["qte"]) ? $context["qte"] : null), "html", null, true);
        echo "\";

            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 1037
        echo $this->env->getExtension('routing')->getPath("default_adresse");
        echo "\",
                data: \"id=\" + id + '&userid=' + userid,
                success: function (msg) {
                    \$(location).attr('href', \"";
        // line 1040
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("jachetelist", array("deal" => $this->getAttribute((isset($context["deal"]) ? $context["deal"] : null), "id", array()), "id" => $this->getAttribute((isset($context["reference"]) ? $context["reference"] : null), "id", array()))), "html", null, true);
        echo "?qte=\"+user_qte+\"&tabtag=1\");

                }
            });
        }

    </script>

";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Deal:jachete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1488 => 1040,  1482 => 1037,  1475 => 1033,  1460 => 1021,  1442 => 1006,  1436 => 1003,  1429 => 999,  1390 => 963,  1382 => 957,  1378 => 955,  1372 => 953,  1370 => 952,  1366 => 951,  1355 => 943,  1346 => 939,  1339 => 935,  1326 => 925,  1319 => 921,  1310 => 915,  1306 => 914,  1302 => 913,  1298 => 912,  1277 => 894,  1263 => 883,  1245 => 868,  1235 => 861,  1169 => 798,  1154 => 786,  1137 => 772,  1115 => 753,  1091 => 732,  1067 => 711,  1044 => 691,  1018 => 668,  1014 => 667,  1009 => 666,  1006 => 665,  1001 => 663,  977 => 645,  965 => 638,  944 => 619,  933 => 617,  929 => 616,  917 => 607,  906 => 599,  900 => 596,  894 => 593,  890 => 592,  886 => 591,  879 => 587,  863 => 575,  859 => 574,  848 => 566,  835 => 556,  808 => 531,  797 => 529,  793 => 528,  781 => 519,  771 => 512,  761 => 505,  739 => 486,  723 => 473,  714 => 467,  704 => 460,  572 => 331,  568 => 330,  556 => 321,  544 => 311,  534 => 307,  529 => 305,  524 => 303,  518 => 302,  512 => 301,  508 => 300,  496 => 299,  492 => 297,  488 => 296,  459 => 270,  421 => 235,  418 => 234,  411 => 230,  404 => 225,  402 => 224,  377 => 201,  368 => 194,  366 => 193,  344 => 173,  334 => 165,  332 => 164,  328 => 162,  321 => 157,  311 => 155,  302 => 154,  298 => 153,  291 => 148,  289 => 147,  283 => 144,  268 => 134,  247 => 116,  243 => 115,  229 => 104,  225 => 103,  219 => 99,  213 => 96,  209 => 95,  205 => 94,  201 => 92,  199 => 91,  194 => 89,  190 => 87,  175 => 85,  171 => 84,  165 => 81,  158 => 77,  152 => 74,  148 => 73,  125 => 53,  117 => 47,  114 => 46,  109 => 45,  104 => 43,  100 => 1,  95 => 39,  92 => 37,  90 => 36,  87 => 34,  85 => 33,  81 => 30,  78 => 28,  76 => 27,  74 => 26,  72 => 25,  70 => 24,  68 => 23,  66 => 22,  63 => 20,  60 => 18,  58 => 17,  51 => 13,  49 => 12,  47 => 11,  44 => 9,  42 => 8,  40 => 7,  36 => 6,  34 => 5,  32 => 4,  30 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends '::base.html.twig' %}*/
/* {% set idClient = app.user.id %}*/
/*  {% set varexist = 0 %}*/
/* {% set varid= 0 %}*/
/* {% set foo = 'non' %}*/
/*  {% for item in client.adresses %}*/
/*      {% if varexist!=1 %}*/
/*          {% set varexist = 1 %}*/
/*          {% set varid = item.id %}*/
/*      {% endif %}*/
/*      {% if item.stat==1 %}*/
/*          {% set foo = 'oui' %}*/
/*          {% set varid = item.id %}*/
/*      {% endif %}*/
/* */
/*  {% endfor %}*/
/* {% if reference.shipping==1 %}*/
/*     {% set montantLivraison = reference.price %}*/
/* {% else %}*/
/*     {% set montantLivraison = 0 %}*/
/* {% endif %}*/
/*     {% set totalCommande = reference.bigdealPrice*qte+montantLivraison*qte %}*/
/*     {% set TotalBigFid = totalCommande|getBigfid %}*/
/*     {% set soldBigFid = idClient|soldeBigFidClient|convertirBigFidToDinar %}*/
/* {% set nombreCouponAcheterParClient = nombreAcheteursReferenceParClient(idClient,reference.id)  %}*/
/* {% if reference.maxCoupon ==0 %}*/
/*     {% if deal.maxCouponUser ==0 %}*/
/*         {% set maxCoupon = 15  %}*/
/*     {% else %}*/
/*         {% set maxCoupon = deal.maxCouponUser - nombreCouponAcheterParClient  %}*/
/*     {% endif %}*/
/* {% else %}*/
/*     {% if deal.maxCouponUser ==0 %}*/
/*         {% set maxCoupon = reference.maxCoupon - reference.id|nombreAcheteursReference   %}*/
/*     {% else %}*/
/*         {% if  deal.maxCouponUser > reference.maxCoupon - reference.id|nombreAcheteursReference %}*/
/*             {% set maxCoupon = reference.maxCoupon - reference.id|nombreAcheteursReference   %}*/
/*         {% else %}*/
/*             {% set maxCoupon = deal.maxCouponUser %}*/
/*         {% endif %}*/
/* {% endif %}*/
/* {% endif %}*/
/* {% block stylesheets %}*/
/* {% endblock %}*/
/* {% block title %}{% endblock %}*/
/* {% block body %}*/
/*     <div id="content" class="marg-50">*/
/* 		<div class="row">*/
/* 			<div class="col-md-12 entry">*/
/* 				<h1>Votre commande</h1>*/
/* 			</div>*/
/* 		</div>*/
/*         <form id="tocheck" class="form-horizontal form" action="{{ path("jachetelist",{'deal' : deal.id,'id' : reference.id}) }}" method="POST">*/
/*             <input type="hidden"  name="livr" id="livr" value="0">*/
/*             <input type="hidden"  name="adr" id="adr" value="0">*/
/*             <div class="informations">*/
/*                 <!-- Processus de commande -->*/
/*                 <div class="table-responsive pay">*/
/*                     <table class="table table-striped">*/
/*                         <thead>*/
/*                         <tr>*/
/*                             <th>Description du deal</th>*/
/*                             <th>Prix unitaire</th>*/
/*                             <th>Quantité</th>*/
/*                             <th>Sous-total</th>*/
/*                         </tr>*/
/*                         </thead>*/
/*                         <tbody>*/
/*                         <tr>*/
/*                             <td>*/
/*                                 <div class="row">*/
/*                                     <div class="col-sm-3 col-xs-6 text-center">*/
/*                                         <img src="{{ asset(deal.image1| imagine_filter('thumbcommandedeal')) }}"*/
/*                                              alt="{{ deal.title }}">*/
/*                                     </div>*/
/*                                     <div class="col-sm-9 col-xs-6">*/
/*                                         <p>{{ deal.title }}</p>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </td>*/
/*                             <td class="bold">{{ reference.bigdealPrice }} <sup>DT</sup></td>*/
/*                             <td class="bg">*/
/*                                 <select class="form-control" id="form-control" name="qte">*/
/*                                     {% for item  in 1..maxCoupon %}*/
/*                                         <option value="{{ item }}" {% if qte == item %} selected {% endif %} >{{ item }}</option>*/
/*                                     {% endfor %}*/
/*                                 </select>*/
/*                             </td>*/
/*                             <td class="bold">{{ (reference.bigdealPrice*qte) }} <sup>DT</sup></td>*/
/*                         </tr>*/
/*                         {% if reference.shipping==1 %}*/
/*                             <tr>*/
/*                                 <td>Livraison</td>*/
/*                                 <td>{{ reference.price }} <sup>DT</sup></td>*/
/*                                 <td>{{ qte }}</td>*/
/*                                 <td class="total bold">{{ reference.price*qte }} <sup>DT</sup></td>*/
/*                             </tr>*/
/*                         {% endif %}*/
/*                         <tr class="hidden-xs">*/
/*                             <td></td>*/
/*                             <td></td>*/
/*                             <td>Total</td>*/
/*                             <td class="bold">{{ totalCommande }} <sup>DT</sup>*/
/*                                 <small>({{ TotalBigFid }} <sup>B</sup> )</small>*/
/*                             </td>*/
/*                         </tr>*/
/*                         </tbody>*/
/*                     </table>*/
/*                 </div>*/
/* 				<div class="row hidden-md hidden-sm mb10">*/
/* 					<div class="col-xs-5">*/
/* 						<p><span class="bold">Total</span></p>*/
/* 					</div>*/
/* 					<div class="col-xs-7">*/
/* 						<p class="bold">{{ totalCommande }} <sup>DT</sup>*/
/*                                 <small>({{ TotalBigFid }} <sup>B</sup> )</small></p>*/
/* 					</div>*/
/* 				</div>*/
/*                 <div class="row">*/
/*                     <div class="col-sm-12">*/
/*                         <p>Ci - dessous les coordonnées de la personne qui bénéficiera de notre deal s’il vous plait ,*/
/*                             veuillez vous assurer du nom inscrit ( il doit correspondre avec une pièce d’identité )*/
/*                             et de l’adresse email . Si vous souhaitez offrir notre deal à une autre personne , merci de*/
/*                             procéder à la modification du nom*/
/*                         </p>*/
/*                     </div>*/
/*                 </div>*/
/* */
/*                 <div class="mt-40">*/
/*                     <div class="form-group">*/
/*                         <label for="nom" class="col-sm-4 control-label">Le coupon est au nom de</label>*/
/* */
/*                         <div class="col-sm-6">*/
/*                             <input type="text" class="form-control" value="{{ app.user.fname }} {{ app.user.name }}"*/
/*                                    required="required" name="clientcoupon" id="nom" placeholder="Nom...">*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="form-group">*/
/*                         <label for="email" class="col-sm-4 control-label">E-mail pour la récupération des*/
/*                             coupons</label>*/
/* */
/*                         <div class="col-sm-6">*/
/*                             <input type="email" class="form-control" id="email" required="required" name="clientemail"*/
/*                                    value="{{ app.user.email }}" placeholder="E-mail...">*/
/*                         </div>*/
/*                     </div>*/
/*                     {% if reference.shipping==1 %}*/
/*                         <div class="form-group">*/
/*                             <label for="adresse" class="col-sm-4 control-label bold">Vos adresses</label>*/
/* */
/*                             <div class="col-sm-6">*/
/*                                 <select class="form-control" required="required" name="adresse">*/
/*                                     {% for item in app.user.adresses %}*/
/*                                         <option value="{{ item.id }}">{{ item.adress }} - {{ item.indcation }}*/
/*                                             - {{ item.localite.name }}- {{ item.localite.cp }} </option>*/
/*                                     {% endfor %}*/
/* */
/*                                 </select>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% endif %}*/
/* */
/*                 </div>*/
/*                 {% if reference.shipping==1 %}*/
/* */
/*                     <div class="row">*/
/*                         <div class="col-sm-10">*/
/*                             <a href="#" title="Ajouter une adresse" class="btn btn-infos pull-right" data-toggle="modal"*/
/*                                data-target=".add-modal">Ajouter une adresse</a>*/
/*                         </div>*/
/*                     </div>*/
/*                 {% endif %}*/
/* */
/*             </div>*/
/*             <!-- Methode de paiement -->*/
/*             <div class="paiement">*/
/*                 <div class="row marg-50">*/
/*                     <div class="col-md-12">*/
/*                         <h4>Veuillez choisir un mode de Paiement</h4>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="row">*/
/*                     <div class="col-md-8 col-sm-12 col-xs-12">*/
/*                         <div role="tabpanel">*/
/*                             <!-- Nav tabs -->*/
/*                             <ul id="tab" class="btn-group" data-toggle="buttons-radio" role="tablist">*/
/*                                 <li role="presentation" class="active" id="gpg">*/
/*                                     <a href="#online" aria-controls="online" role="tab" data-toggle="tab">*/
/*                                         <h5>Paiement en Ligne</h5>*/
/*                                         <i class="fa fa-cc-mastercard"></i>*/
/*                                     </a>*/
/*                                 </li>*/
/*                                 {% if deal.cashPayment %}*/
/*                                     <li role="presentation" id="cashe">*/
/*                                         <a href="#cash" aria-controls="cash" role="tab" data-toggle="tab">*/
/*                                             <h5>Paiement en Espèce</h5>*/
/*                                             <i class="fa fa-briefcase"></i>*/
/*                                         </a>*/
/*                                     </li>*/
/*                                 {% endif %}*/
/* */
/*                                 <li role="presentation" id="livraisons">*/
/*                                     <a href="#livraison" aria-controls="livraison" role="tab" data-toggle="tab">*/
/*                                         <h5>Paiement à la livraison</h5>*/
/*                                         <i class="fa fa-envelope-o"></i>*/
/*                                     </a>*/
/*                                 </li>*/
/*                             </ul>*/
/* */
/*                             <!-- Tab panes -->*/
/*                             <div class="tab-content">*/
/*                                 <div role="tabpanel" class="tab-pane active" id="online">*/
/*                                     <div class="bg">*/
/*                                         <span class="title teal">Choix de Paiement</span>*/
/* */
/*                                         <div class="radio">*/
/*                                             <label>*/
/*                                                 <input type="radio" name="paiement" id="optionsRadios"*/
/*                                                        value="1" checked>*/
/*                                                 <i class="fa fa-cc-mastercard"></i>*/
/*                                             </label>*/
/*                                         </div>*/
/* */
/*                                         {% if idClient|soldeBigFidClient >= TotalBigFid %}*/
/*                                             <div class="radio">*/
/*                                                 <label>*/
/*                                                     <input type="radio" name="paiement" id="optionsRadios"*/
/*                                                            value="3">*/
/*                                                     <i class="flaticon-computerchip teal"></i><strong>Vous*/
/*                                                         avez {{ idClient|soldeBigFidClient }} BigFid</strong>*/
/*                                                 </label>*/
/*                                             </div>*/
/*                                         {% endif %}*/
/*                                     </div>*/
/*                                     <span class="bold teal new-price">Nouveau Total: {{ totalCommande }}*/
/*                                         <sup>DT</sup></span>*/
/* */
/*                                 </div>*/
/*                                 <div role="tabpanel" class="tab-pane" id="cash">*/
/* 									<div class="pay-alert">*/
/* 										<div class="col-sm-12">*/
/* 											<p>Vous pouvez payer vos commandes en espèce ou par chèque <strong class="teal bold">avant la cloture du deal</strong> à l'un de nos paybox mentionnés sur la carte dessous.</p>*/
/* 										</div>*/
/* 									</div>*/
/*                                     <div class="bg">*/
/* 										*/
/*                                         <div class="bh-sl-container">*/
/*                                             <div id="map-container" class="bh-sl-map-container">*/
/*                                                 <div class="bh-sl-loc-list">*/
/*                                                     <ul class="list"></ul>*/
/*                                                 </div>*/
/*                                                 <div id="bh-sl-map" class="bh-sl-map"></div>*/
/*                                             </div>*/
/*                                         </div>*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div role="tabpanel" class="tab-pane liv" id="livraison">*/
/*                                     <div class="pay-alert">*/
/*                                     </div>*/
/*                                     <div class="bg">*/
/* */
/* */
/*                                         <div class="bh-sl-container">*/
/*                                             <span class="title teal">Frais de livraison : 3 DT</span>*/
/*                                         </div>*/
/* */
/*                                         <div class="form-group">*/
/*                                             <label for="nom" class="col-sm-4 control-label marg-5"  >Votre téléphone de contact est </label>*/
/*                                             <div class="col-sm-4 marg-5" >*/
/*                                                 <input type="text" class="form-control" value="{{ app.user.phone }}"*/
/*                                                        required="required" name="clientcoupon" id="nom" disabled>*/
/* */
/*                                             </div>*/
/* */
/*                                             <div class="col-sm-4 marg-5">*/
/*                                                     <a href="#" title="Modifier" class="btn btn-infos modifier" data-toggle="modal" data-target=".add-modal1">Modifier</a>*/
/*                                             </div>*/
/*                                         </div>*/
/* */
/*                                         <div class="bh-sl-container marg-5">*/
/*                                             <span>Vous serez contacté par notre livreur sur ce numéro de téléphone. Veuillez vous assurer que ce numéro est joignable.</span>*/
/*                                             <div class="table-responsive">*/
/*                                                 <table class="table table-striped">*/
/*                                                     <thead>*/
/*                                                     <tr>*/
/*                                                         <th></th>*/
/*                                                         <th>Adresse</th>*/
/*                                                         <th>Ville</th>*/
/*                                                         <th>CP</th>*/
/*                                                         <th>Indication</th>*/
/*                                                         <th>Action</th>*/
/*                                                     </tr>*/
/*                                                     </thead>*/
/*                                                     <tbody>*/
/*                                                     <input id="adressreq" style="display: none;" class="messageCheckbox" type="radio" name="adressreq" value="0"  required>*/
/*                                                     {% for item in client.adresses %}*/
/* */
/*                                                         <tr>*/
/*                                                             <td><input id="adressreqs" class="messageCheckbox adressreqs" type="radio" name="adressreq" value="{{ item.id }}" onclick="choisiradresse({{ item.id }},{{ app.user.id }})" {% if item.stat==1 %} checked  {% endif %}></td>*/
/*                                                             <td>{{ item.adress }}</td>*/
/*                                                             <td>{% if item.localite %}{{ item.localite.name }}{% endif %}</td>*/
/*                                                             <td>{% if item.localite %}{{ item.localite.cp }}{% endif %}</td>*/
/*                                                             <td>{{ item.indcation }}</td>*/
/*                                                             <td>*/
/*                                                                 <a href="#" title="Modifier" data-toggle="modal" data-target=".custom-modal{{ item.id }}"><i*/
/*                                                                             class="fa fa-edit dark-gray"></i></a>*/
/*                                                                 <a href="javascript:deleteadresse({{ item.id }})" title="Supprimer" class="delete"><i*/
/*                                                                             class="fa fa-trash teal"></i></a></td>*/
/*                                                         </tr>*/
/*                                                     {% endfor %}*/
/*                                                     </tbody>*/
/*                                                 </table>*/
/*                                             </div>*/
/*                                             <div class="col-sm-offset-7 col-sm-5">*/
/*                                                 <a href="#" title="Ajouter une adresse" class="btn btn-infos" data-toggle="modal" data-target=".add-modal">Ajouter*/
/*                                                     une adresse</a>*/
/*                                             </div>*/
/* */
/* */
/*                                         </div>*/
/*                                         <span class="bold teal new-price-online">Nouveau Total: {{ totalCommande+3 }}*/
/*                                             <sup>DT</sup></span>*/
/*                                            </div>*/
/* */
/*                                 </div>*/
/*                                 <div class="checkbox">*/
/*                                     <label>*/
/*                                         <input type="checkbox" id="cgv" required="required"> En passant ma commande, je*/
/*                                         reconnais que je serais*/
/*                                         tenu de la payer, je confirme avoir lu et accepté les <a class="light-blue" target="_blank" href="{{ path('pages_detail',{'name':'conditions-g-n-rales'}) }}">Conditions générales*/
/*                                         de commercialisation</a> de BIGDeal et la <a class="light-blue" target="_blank" href="{{ path('pages_detail',{'name':'politique-de-confidentialite'}) }}">Charte*/
/*                                         de confidentialité</a>*/
/*                                     </label>*/
/*                                 </div>*/
/*                                 <input type="submit" id="subbtn" value="Valider" onclick="countCheckedalert()" class="btn btn-danger pull-right">*/
/*                             </div>*/
/* */
/*                         </div>*/
/*                     </div>*/
/*                     <div class="col-md-4 col-sm-12 col-xs-12 bg">*/
/*                         <h4>FAQ Paiement</h4>*/
/* */
/*                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">*/
/*                             <div class="panel">*/
/*                                 <div class="panel-heading" role="tab" id="headingOne">*/
/*                                     <h4 class="panel-title">*/
/*                                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"*/
/*                                            aria-expanded="true" aria-controls="collapseOne">*/
/*                                             <i class="fa fa-caret-right pr-10"></i>Que se passe-t-il après mon achat ?*/
/*                                         </a>*/
/*                                     </h4>*/
/*                                 </div>*/
/*                                 <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"*/
/*                                      aria-labelledby="headingOne">*/
/*                                     <div class="panel-body">*/
/*                                         Une fois le deal est validé (nombre minimum d'acheteurs atteint) , vous receverez un mail de confirmation indiquant que votre commande a bien été prise en compte. Vous trouverez tous les coupons dans la rubrique mes commandes. Il vous suffit juste de les imprimer. Les conditions et instructions spécifiques pour leur utilisation sont clairement indiquées sur chaque coupon.*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="panel">*/
/*                                 <div class="panel-heading" role="tab" id="headingTwo">*/
/*                                     <h4 class="panel-title">*/
/*                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion"*/
/*                                            href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">*/
/*                                             <i class="fa fa-caret-right pr-10"></i>Que se passe-t-il si le deal  du jour n'atteint pas le nombre minimum d’acheteurs nécessaires ?*/
/*                                         </a>*/
/*                                     </h4>*/
/*                                 </div>*/
/*                                 <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"*/
/*                                      aria-labelledby="headingTwo">*/
/*                                     <div class="panel-body">*/
/*                                         Dans ce cas-là (assez rare), si le deal n'est pas validé alors vous seriez remboursé du montant de votre commande.*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="panel">*/
/*                                 <div class="panel-heading" role="tab" id="headingThree">*/
/*                                     <h4 class="panel-title">*/
/*                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion"*/
/*                                            href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">*/
/*                                             <i class="fa fa-caret-right pr-10"></i>Puis-je acheter un coupon BIGDEAL et l’offrir en cadeau à quelqu’un ?*/
/*                                         </a>*/
/*                                     </h4>*/
/*                                 </div>*/
/*                                 <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"*/
/*                                      aria-labelledby="headingThree">*/
/*                                     <div class="panel-body">*/
/*                                         Bien sûr. Le coupon Bigdeal est une idée toujours pratique et originale de cadeau. Tous les coupons Bigdeal peuvent être offerts. Si vous souhaitez que nous envoyons directement le coupon cadeau à son bénéficiaire, mentionnez le nom et l'email de votre ami lors de l'achat du coupon.*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="panel">*/
/*                                 <div class="panel-heading" role="tab" id="headingfour">*/
/*                                     <h4 class="panel-title">*/
/*                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion"*/
/*                                            href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">*/
/*                                             <i class="fa fa-caret-right pr-10"></i>Est-ce sécurisé ?*/
/*                                         </a>*/
/*                                     </h4>*/
/*                                 </div>*/
/*                                 <div id="collapsefour" class="panel-collapse collapse" role="tabpanel"*/
/*                                      aria-labelledby="headingfour">*/
/*                                     <div class="panel-body">*/
/*                                         Tout à fait, notre programme de sécurité comprend des contrôles administratifs, techniques et physiques qui sont conçus pour protéger vos informations. Votre numéro de carte de crédit est transmis par un protocole sécurisé SSL . À aucun moment, ces informations ne sont stockées sur nos serveurs.*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="panel">*/
/*                                 <div class="panel-heading" role="tab" id="headingfive">*/
/*                                     <h4 class="panel-title">*/
/*                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion"*/
/*                                            href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">*/
/*                                             <i class="fa fa-caret-right pr-10"></i>Si je change d'avis, puis-je annuler ma commande ?*/
/*                                         </a>*/
/*                                     </h4>*/
/*                                 </div>*/
/*                                 <div id="collapsefive" class="panel-collapse collapse" role="tabpanel"*/
/*                                      aria-labelledby="headingfive">*/
/*                                     <div class="panel-body">*/
/*                                         Non, une fois vous achetez votre coupon, nous ne pouvons pas annuler votre commande.*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="panel">*/
/*                                 <div class="panel-heading" role="tab" id="headingsix">*/
/*                                     <h4 class="panel-title">*/
/*                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion"*/
/*                                            href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">*/
/*                                             <i class="fa fa-caret-right pr-10"></i>Comment utiliser mes points de fildélité BIGFid ?*/
/*                                         </a>*/
/*                                     </h4>*/
/*                                 </div>*/
/*                                 <div id="collapsesix" class="panel-collapse collapse" role="tabpanel"*/
/*                                      aria-labelledby="headingsix">*/
/*                                     <div class="panel-body">*/
/*                                         Lors de l'achat de votre deal, vous avez la possibilité de payer votre commande par vos points BIGFid une fois votre solde est superieur ou égal au montant de la commande. Si ce n'est pas le cas, vous pouvez payer la différence via le paiement en ligne (carte bancaire ou carte e-dinar).*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </form>*/
/* */
/*     </div>*/
/*     <!-- Modifier tel Modal1 -->*/
/*     <div class="modal fade add-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">*/
/*         <div class="modal-dialog">*/
/*             <div class="modal-content">*/
/*                 <div class="modal-header">*/
/*                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span*/
/*                                 aria-hidden="true"><i class="fa fa-close"></i></span></button>*/
/*                     <h4 class="modal-title">Modifier Le Téléphone </h4>*/
/*                 </div>*/
/*                 <div class="modal-body">*/
/*                     <div class="row">*/
/*                         <div class="col-md-12">*/
/* */
/*                             {{ form_start(formphone, {'method': 'POST','action':  path('add_phone',{'ref' : reference.id,'deal' : deal.id , 'qte': qte }),'attr': {'class': 'form-horizontal','id':'addform'}}) }}*/
/*                             <fieldset>*/
/* */
/*                                 <div class="form-group">*/
/*                                     <label class="col-sm-2 control-label" for="phone">Phone</label>*/
/* */
/*                                     <div class="col-sm-10">*/
/*                                         {{ form_widget(formphone.phone,{'attr': {'class': "form-control",'value': app.user.phone}}) }}*/
/*                                     </div>*/
/*                                 </div>*/
/* */
/*                             </fieldset>*/
/* */
/*                             {{ form_row(formphone._token) }}*/
/* */
/*                         </div>*/
/* */
/* */
/* */
/*                         <!-- /.col-lg-12 -->*/
/*                     </div>*/
/*                     <!-- /.row -->*/
/*                 </div>*/
/*                 <div class="modal-footer">*/
/*                     <a type="button" class="btn btn-default" data-dismiss="modal">Annuler</a>*/
/*                     <input type="submit" class="btn btn-primary" value="Modifier"/>*/
/*                     {{ form_end(formphone) }}*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Ajouter adresse Modal -->*/
/*     <div class="modal fade add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">*/
/*         <div class="modal-dialog">*/
/*             <div class="modal-content">*/
/*                 <div class="modal-header">*/
/*                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span*/
/*                                 aria-hidden="true"><i class="fa fa-close"></i></span></button>*/
/*                     <h4 class="modal-title">Ajout d'une adresse</h4>*/
/*                 </div>*/
/*                 <div class="modal-body">*/
/*                     <div class="row">*/
/*                         <div class="col-md-12">*/
/* */
/*                             {{ form_start(form, {'method': 'POST','action':  path('add_adress_livraison',{'ref' : reference.id , 'deal':deal.id, 'qte':qte}),'attr': {'class': 'form-horizontal','id':'addform'}}) }}*/
/*                             <fieldset>*/
/* */
/*                                     <div class="form-group">*/
/*                                         <label class="col-sm-2 control-label" for="ville">Adresse</label>*/
/* */
/*                                         <div class="col-sm-10">*/
/*                                             {{ form_widget(form.adress,{'attr': {'class': "form-control",'placeholder':'Enter votre adresse'}}) }}*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <label class="col-sm-2 control-label" for="ville">Indication adresse</label>*/
/* */
/*                                         <div class="col-sm-10">*/
/*                                             {{ form_widget(form.indcation,{'attr': {'class': "form-control",'placeholder':'Indication d\'adresse (exp: à coté de..., en face de...)' }}) }}*/
/*                                         </div>*/
/*                                     </div>*/
/*                                     <div class="form-group">*/
/*                                         <label class="col-sm-2 control-label" for="gouvernorat">Gouvernorat /Délegations</label>*/
/*                                         <div class="col-sm-5">*/
/*                                             <select required="required" name="gouvernorat" onChange="javascript:sendData(''+this.value+'')">*/
/*                                                 <option value=""></option>*/
/* */
/*                                                 {% for item in gouvernorat %}*/
/*                                                     <option value="{{ item.id }}">{{ item.name }}</option>*/
/*                                                 {% endfor %}*/
/*                                             </select>*/
/*                                         </div>*/
/*                                         <div class="col-sm-5">*/
/*                                             <select required="required" name="delegation" id="delegation2" onChange="javascript:sendData2(''+this.value+'')">*/
/* */
/*                                             </select>*/
/*                                         </div>*/
/*                                     </div>*/
/* */
/*                                     <div class="form-group">*/
/*                                         <label class="col-sm-2 control-label" for="ville">Ville / C.P </label>*/
/*                                         <div class="col-sm-5">*/
/*                                             <select name="ville" id="delegation3"  required="required" onChange="javascript:afficherCodePostale(''+this.value+'')">*/
/* */
/*                                             </select>*/
/* */
/*                                         </div>*/
/*                                         <div class="col-sm-5">*/
/*                                             <input type="text" required="required" id="cpadd" name="cp" class="form-control" readonly>*/
/*                                         </div>*/
/*                                     </div>*/
/* */
/* */
/*                                 </fieldset>*/
/* */
/*                             {{ form_row(form._token) }}*/
/* */
/*                         </div>*/
/*                         <!-- /.col-lg-12 -->*/
/*                     </div>*/
/*                     <!-- /.row -->*/
/*                 </div>*/
/*                 <div class="modal-footer">*/
/*                     <a type="button" class="btn btn-default" data-dismiss="modal">Annuler</a>*/
/*                     <input type="submit" class="btn btn-primary" value="Ajouter"/>*/
/*                     {{ form_end(form) }}*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/* */
/*     <!-- Modifier adresse Modal -->*/
/*     {% for item in client.adresses %}*/
/*         <div class="modal fade custom-modal{{ item.id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"*/
/*              aria-hidden="true">*/
/*             <div class="modal-dialog">*/
/*                 <div class="modal-content">*/
/*                     <div class="modal-header">*/
/*                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span*/
/*                                     aria-hidden="true"><i class="fa fa-close"></i></span></button>*/
/*                         <h4 class="modal-title">Modification de l'adresse</h4>*/
/*                     </div>*/
/*                     <div class="modal-body">*/
/*                         <div class="row">*/
/*                             <div class="col-md-12">*/
/*                                 <form action="{{ path('update_mes_adresse_livraison') }}" method="POST"*/
/*                                       class="form-horizontal">*/
/*                                     <fieldset>*/
/* */
/*                                         <input type="hidden"  name="qte" value="{{ qte }}">*/
/*                                         <input type="hidden"  name="ref" value="{{ reference.id }}">*/
/*                                         <input type="hidden"  name="deal" value="{{ deal.id }}">*/
/* */
/*                                         <div class="form-group">*/
/*                                             <label class="col-sm-2 control-label" for="ville">Adresse{{ qte }}</label>*/
/* */
/*                                             <div class="col-sm-10">*/
/*                                                 <input type="text" name="adress" value="{{ item.adress }}"*/
/*                                                        required="required" class="form-control">*/
/*                                             </div>*/
/*                                         </div>*/
/*                                         <div class="form-group">*/
/*                                             <label class="col-sm-2 control-label" for="ville">Indication adresse</label>*/
/* */
/*                                             <div class="col-sm-10">*/
/*                                                 <input type="text" name="indcation" value="{{ item.indcation }}"*/
/*                                                        class="form-control">*/
/*                                             </div>*/
/*                                         </div>*/
/*                                         <div class="form-group">*/
/*                                             <label class="col-sm-2 control-label" for="gouvernorat">Gouvernorat /Délegationss</label>*/
/*                                             <div class="col-sm-5">*/
/*                                                 <select name="gouvernorat" onChange="javascript:sendData1(''+this.value+'')">*/
/*                                                     <option value=""></option>*/
/*                                                     {% for item in gouvernorat %}*/
/*                                                         <option value="{{ item.id }}">{{ item.name }}</option>*/
/*                                                     {% endfor %}*/
/*                                                 </select>*/
/*                                             </div>*/
/*                                             <div class="col-sm-5">*/
/*                                                 <select name="delegation" id="delegation2_update" class="delegation2_update" onChange="javascript:sendData21(''+this.value+'')">*/
/* */
/*                                                 </select>*/
/*                                             </div>*/
/*                                         </div>*/
/*                                         <div class="form-group">*/
/*                                             <label class="col-sm-2 control-label" for="ville">Ville / C.P</label>*/
/* */
/*                                             <div class="col-sm-5">*/
/*                                                 <select name="ville" id="delegation3_update" class="form-control delegation3_update"  onChange="javascript:afficherCodePostale1(''+this.value+'')">*/
/* */
/*                                                 </select>*/
/* */
/*                                             </div>*/
/*                                             <div class="col-sm-5">*/
/*                                                 <input type="text" readonly*/
/*                                                        value="{% if item.localite %}{{ item.localite.cp }}{% endif %}"*/
/*                                                        id="cpadd_update"  maxlength="4" autocomplete="off"*/
/*                                                        name="cp" class="form-control cpadd_update"*/
/*                                                        placeholder="Enter votre CP" required="required" readonly>*/
/*                                             </div>*/
/*                                         </div>*/
/*                                     </fieldset>*/
/*                                     <input type="hidden" name="id" value="{{ item.id }}" required="required"/>*/
/* */
/*                             </div>*/
/*                             <!-- /.col-lg-12 -->*/
/*                         </div>*/
/*                         <!-- /.row -->*/
/*                     </div>*/
/* */
/*                     <div class="modal-footer">*/
/*                         <a type="button" class="btn btn-default" data-dismiss="modal">Annuler</a>*/
/* */
/*                         <input type="submit" class="btn btn-primary" value="Sauvegarder"/>*/
/*                         </form>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     {% endfor %}*/
/* */
/* {% endblock %}*/
/* {% block javascripts %}*/
/*     <script src="{{ asset('public/js/handlebars.min.js') }}"></script>*/
/*     <script src="{{ asset('public/js/plugins/storeLocator/jquery.storelocator.js') }}"></script>*/
/*     <script type="text/javascript" src="{{ asset('public/js/sweet-alert.js') }}"></script>*/
/*     <script type="text/javascript">*/
/* */
/*         function countCheckedalert()*/
/*         {*/
/*             if(var_block==1)*/
/*             {*/
/*                 if ($('input[name=adressreq]:checked').length==0)*/
/*                 {*/
/*                     if ($('input[name=adressreq]').length==1) {*/
/*                         $('#tocheck').submit(false);*/
/*                         alert("Ajoutez une adresse !");*/
/*                     }*/
/*                 }*/
/*             }*/
/*         }*/
/* */
/* */
/*         function sendData1(id)*/
/*         {*/
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('listdelegation')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     var str = "<option value=''></option>";*/
/* */
/*                     $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                         str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/*                     });*/
/* */
/*                     $('.delegation2_update').html(str);*/
/* */
/*                 }*/
/*             });*/
/*         }*/
/*         function sendData21(id)*/
/*         {*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('listdelegation')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     var str = "<option value=''></option>";*/
/* */
/*                     $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                         // on ajoute l option dans la liste*/
/*                         //$("delegation2").append('<option value="'+ value.id +'">'+ value.name +'</option>');*/
/*                         str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/*                     });*/
/*                     $('.delegation3_update').html(str);*/
/*                 }*/
/*             });*/
/*         }*/
/* */
/*         function sendData(id)*/
/*             {*/
/* */
/*                 $.ajax({*/
/*                     type: "POST",*/
/*                     dataType: "json",*/
/*                     url: '{{path('listdelegation')}}',*/
/*                     data: "id=" + id,*/
/*                     success: function (msg) {*/
/*                         var str = "<option value=''></option>";*/
/*                         $("#delegation").show();*/
/*                         $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                             // on ajoute l option dans la liste*/
/*                             //$("delegation2").append('<option value="'+ value.id +'">'+ value.name +'</option>');*/
/*                             str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/*                         });*/
/*                         $('#delegation2').html(str);*/
/* */
/*                     }*/
/*                 });*/
/*             }*/
/* */
/*             function sendData2(id)*/
/*             {*/
/*                 $.ajax({*/
/*                     type: "POST",*/
/*                     dataType: "json",*/
/*                     url: '{{path('listdelegation')}}',*/
/*                     data: "id=" + id,*/
/*                     success: function (msg) {*/
/*                         var str = "<option value=''></option>";*/
/*                         $("#localite").show();*/
/*                         $.each(msg, function(index, value) { // pour chaque noeud JSON*/
/*                             // on ajoute l option dans la liste*/
/*                             //$("delegation2").append('<option value="'+ value.id +'">'+ value.name +'</option>');*/
/*                             str += "<option value='"+ value.id+"'>"+ value.name+"</option>";*/
/*                         });*/
/*                         $('#delegation3').html(str);*/
/*                     }*/
/*                 });*/
/*             }*/
/*             function afficherCodePostale(id)*/
/*             {*/
/*                 $.ajax({*/
/*                     type: "POST",*/
/*                     dataType: "json",*/
/*                     url: '{{path('viewcp')}}',*/
/*                     data: "id=" + id,*/
/*                     success: function (msg) {*/
/*                         $("#cpadd").val(msg);*/
/*                     }*/
/*                 });*/
/*             }*/
/* */
/*         $('#cpadd').typeahead({*/
/*             onSelect: function (item) {*/
/*                 $("#villeadd").val(item.value)*/
/* */
/*             },*/
/*             ajax: {*/
/*                 url: '{{path('list_villeajx')}}',*/
/*                 triggerLength: 1*/
/*             },*/
/*             afterSelect: function (item) {*/
/*                 //save the id value into the hidden field*/
/* */
/*             },*/
/*             displayField: 'full_name'*/
/* */
/*         })*/
/*         $(function () {*/
/*             $("#form-control").change(function () {*/
/*                 window.location = "{{path('jachetelist',{'deal' : deal.id,'id' : reference.id})}}?qte=" + this.value +"&tabtag="+document.getElementById("livr").value ;*/
/*             });*/
/*         });*/
/*         var var_block =0;*/
/*         $(document).ready(function () {*/
/* */
/* */
/*             function countChecked()*/
/*             {*/
/* */
/*                 if(var_block==1)*/
/*                 {*/
/*                     if ($('input[name=adressreq]:checked').length==0)*/
/*                     {*/
/* */
/*                         return false;*/
/*                     }*/
/*                     else*/
/*                     {*/
/*                         return true;*/
/*                     }*/
/*                 }*/
/*                 else*/
/*                 {*/
/* */
/*                     document.getElementById("adressreq").required = false;*/
/* */
/*                     return true;*/
/* */
/*                 }*/
/*             }*/
/*            */
/* */
/*             $('#tocheck').submit(countChecked);*/
/*             function getUrlVars() {*/
/*                 var vars = {};*/
/*                 var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {*/
/*                     vars[key] = value;*/
/*                 });*/
/*                 return vars;*/
/*             }*/
/*             document.getElementById("livr").value="0";*/
/*              var first = getUrlVars()["tabtag"];*/
/*             if(first=="1")*/
/*             {*/
/*                 document.getElementById("adressreq").required = true;*/
/*                 $('html, body').animate({*/
/*                     scrollTop: ($('#livraisons').offset().top)*/
/*                 },500);*/
/* */
/*                 $("#online").removeClass("active");*/
/*                 $("#gpg").removeClass("active");*/
/*                 $("#livraisons").addClass("active");*/
/*                 $(".liv").addClass("active");*/
/*                 document.getElementById("livr").value="1";*/
/*                 var_block=1;*/
/*             }*/
/*             else*/
/*             {*/
/*                 document.getElementById("adressreq").required = false;*/
/* */
/*             }*/
/* */
/*             var comm_idd = "{{ varid }}";*/
/* */
/*             document.getElementById("adr").value = comm_idd;*/
/*             $("#cashe").click(*/
/*                     function () {*/
/* */
/*                         $('#map-container').storeLocator({*/
/*                             'dataRaw': {{ data|json_encode()|raw }}*/
/*                         });*/
/*                         $("#optionsRadios").removeAttr("checked");*/
/* */
/*                         document.getElementById("livr").value = "0";*/
/*                         document.getElementById("adressreq").required = false;*/
/* */
/*                         var_block=0;*/
/*                         $('#tocheck').submit(true);*/
/* */
/*                     });*/
/*             $("#gpg").click(*/
/*                     function () {*/
/*                         document.getElementById("livr").value = "0";*/
/*                         $('#optionsRadios').attr('checked', true);*/
/*                         var newcontent = "Nouveau Total:  {{ totalCommande }} <sup>DT</sup>";*/
/*                         $(".new-price").html(newcontent);*/
/*                         document.getElementById("adressreq").required = false;*/
/* */
/*                         var_block=0;*/
/*                         $('#tocheck').submit(true);*/
/*                     });*/
/* */
/*             $("#online").click(*/
/*                     function () {*/
/*                         document.getElementById("livr").value = "0";*/
/*                         var newcontent = "Nouveau Total:  {{ totalCommande }} <sup>DT</sup>";*/
/*                         $(".new-price-online").html(newcontent);*/
/*                         var_block=0;*/
/*                         $('#tocheck').submit(true);*/
/*                         document.getElementById("adressreq").required = false;*/
/* */
/*                     });*/
/* */
/* */
/*             $("#livraisons").click(*/
/*                     function () {*/
/*                         document.getElementById("livr").value = "1";*/
/*                         document.getElementById("adressreq").required = true;*/
/* */
/*                         var_block=1;*/
/* */
/* */
/*                         $("#optionsRadios").removeAttr("checked");*/
/*                         /*  var user_stat = "{{ foo }}";*/
/*                         var comm_id = "{{ varid }}";*/
/*                         var user_id = "{{ app.user.id }}";*/
/*                         var user_qte="{{ qte }}";*/
/*                        document.getElementById("adr").value = comm_id;*/
/*                         if(user_stat!='oui')*/
/*                         {*/
/*                             $.ajax({*/
/*                                 type: "POST",*/
/*                                 url: "{{ path('default_adresse') }}",*/
/*                                 data: "id=" + comm_id+ '&userid=' + user_id,*/
/* */
/*                                 success: function (msg) {*/
/*                                     $(location).attr('href', "{{path('jachetelist',{'deal' : deal.id,'id' : reference.id})}}?qte="+user_qte);*/
/*                                 }*/
/*                             });*/
/*                         }*//* */
/*                     });*/
/* */
/* */
/*             $("input[type=radio][name=paiement]").change(*/
/*                     function () {*/
/*                         if ($(this).val() == 1) {*/
/*                             var newcontent = "Nouveau Total:  {{ totalCommande }} <sup>DT</sup>";*/
/*                             $(".new-price").html(newcontent);*/
/*                         }*/
/*                         if ($(this).val() == 2) {*/
/*                             var newcontent = "Nouveau Total: {{ totalCommande - soldBigFid }} <sup>DT</sup> +  {{ idClient|soldeBigFidClient }}  <sup>B</sup>";*/
/*                             $(".new-price").html(newcontent);*/
/*                         }*/
/*                         else if ($(this).val() == 3) {*/
/*                             var newcontent = "Nouveau Total:  {{ TotalBigFid }}  <sup>B</sup>";*/
/*                             $(".new-price").html(newcontent);*/
/*                             //  $('#regTitle').empty().append(newcontent);*/
/*                         }*/
/*                         //$("input:radio").removeAttr("checked");*/
/*                     });*/
/*         });*/
/* */
/*         var price ={{ reference.bigdealPrice }};*/
/*         {% if reference.price>0 %}*/
/*         var livr ={{ reference.price }};*/
/*         {% else %}*/
/*         var livr = 0;*/
/*         {% endif %}*/
/* */
/*         function checkville(valeur, div, localitediv) {*/
/*             var cp = $("#" + valeur).val();*/
/*             if (cp.length == 4) {*/
/*                 $.ajax({*/
/*                     type: 'get',*/
/*                     url: '{{ path('ville') }}',*/
/*                     data: "cp=" + cp,*/
/*                     success: function (data) {*/
/*                         $("#" + div).val(data.label);*/
/*                         $("#" + localitediv).val(data.id);*/
/*                     }*/
/*                 });*/
/*             } else {*/
/*                 $(".ville").val('');*/
/*                 $("#localite").val('');*/
/*             }*/
/*         }*/
/* */
/*         function deleteadresse(id) {*/
/* */
/* */
/*             if ($('input[name=adressreq]:checked').length==0)*/
/*             {*/
/*                 if ($('input[name=adressreq]').length==1) {*/
/*                     $('#tocheck').submit(false);*/
/* */
/*                 }*/
/*             }*/
/* */
/* */
/*             swal({*/
/*                         title: "Voulez vous vraiment supprimer cette adresse?",*/
/*                         text: "",*/
/*                         type: "error",*/
/*                         showCancelButton: true,*/
/*                         confirmButtonClass: 'btn-danger',*/
/*                         confirmButtonText: 'Supprimer'*/
/* */
/*                     },*/
/*                     function (isConfirm) {*/
/*                         if (isConfirm) {*/
/*                             var user_qte="{{ qte }}";*/
/*                             // ajax delete delete_mes_adresse*/
/*                             $.ajax({*/
/*                                 type: "POST",*/
/*                                 url: "{{ path('delete_mes_adresse') }}",*/
/*                                 data: "id=" + id,*/
/*                                 success: function (msg) {*/
/*                                     $(location).attr('href', "{{path('jachetelist',{'deal' : deal.id,'id' : reference.id})}}"+'?qte='+user_qte+"&tabtag=1");*/
/*                                 }*/
/*                             });*/
/* */
/*                         } else {*/
/*                         }*/
/*                     }*/
/*             )*/
/*             ;*/
/*         }*/
/*         function afficherCodePostale1(id)*/
/*         {*/
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 dataType: "json",*/
/*                 url: '{{path('viewcp')}}',*/
/*                 data: "id=" + id,*/
/*                 success: function (msg) {*/
/*                     $(".cpadd_update").val(msg);*/
/* */
/* */
/*                 }*/
/*             });*/
/*         }*/
/* */
/*         function choisiradresse(id,userid) {*/
/*             $('#tocheck').submit(true);*/
/*             var user_qte="{{ qte }}";*/
/* */
/*             $.ajax({*/
/*                 type: "POST",*/
/*                 url: "{{ path('default_adresse') }}",*/
/*                 data: "id=" + id + '&userid=' + userid,*/
/*                 success: function (msg) {*/
/*                     $(location).attr('href', "{{path('jachetelist',{'deal' : deal.id,'id' : reference.id})}}?qte="+user_qte+"&tabtag=1");*/
/* */
/*                 }*/
/*             });*/
/*         }*/
/* */
/*     </script>*/
/* */
/* {% endblock %}*/
/* */
/* */
