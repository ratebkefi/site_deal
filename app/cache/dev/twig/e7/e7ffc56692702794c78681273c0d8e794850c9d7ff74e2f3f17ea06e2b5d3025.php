<?php

/* MainFrontBundle:Default:footer.html.twig */
class __TwigTemplate_9e4059fee218097aab44e28720861f28e74b6fccdf8d6629029ea946a4d19c47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<footer>
    <div id=\"footer-top\" class=\"container\">
    \t<div class=\"separator\"></div>
        <div class=\"wrap\">
            <div class=\"row\">
                <div class=\"col-md-2 col-sm-6 col-xs-6\">
                    <div class=\"feature text-center\">
                    \t<i class=\"icon-bigfid\"></i>
                    \t<span>PROGRAMME DE FIDELITE</span>
                    </div>
                </div>
                <div class=\"col-md-2 col-sm-6 col-xs-6\">
                    <div class=\"feature text-center\">
                    \t<i class=\"flaticon-shield20\"></i>
                    \t<span>PAIEMENT SECURISE</span>
                    </div>
                </div>
                <div class=\"col-md-2 col-sm-6 col-xs-6\">
                    <div class=\"feature text-center\">
                    \t<i class=\"icon-delivery\"></i>
                    \t<span>LIVRAISON EN 72H</span>
                    </div>
                </div>
                <div class=\"col-md-2 col-sm-6 col-xs-6\">
                    <div class=\"feature text-center\">
                    \t<i class=\"fa fa-smile-o\"></i>
                        <span>GARANTIE SATISFAIT OU REMBOURSE</span>
                    </div>
                </div>
                <div class=\"col-md-2 col-sm-6 col-xs-6\">
                    <div class=\"feature text-center\">
                    \t<i class=\"flaticon-gift90\"></i>
                    \t<span>OFFREZ à VOS PROCHE</span>
                    </div>
                </div>
                <div class=\"col-md-2 col-sm-6 col-xs-6\">
                    <div class=\"feature text-center\">
                    \t<i class=\"flaticon-responsive4\"></i>
                    \t<span>COMPATIBLE PC/TABLETTE/MOBILE</span>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row cards\">
            <div class=\"col-md-4 col-sm-12\">
                <h3>Nous acceptons:</h3>
            </div>
            <div class=\"col-md-5 col-sm-12\">
                <img class=\"img-responsive\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/cards.png"), "html", null, true);
        echo "\" alt=\"cards\" />
            </div>
\t\t\t<div class=\"col-md-3 col-sm-12\">
              <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("paybox_show");
        echo "\" style=\"cursor: pointer;\" class=\"pull-left teal\"><h3>Nos Paybox</h3></a>
            </div>
        </div>
    </div>
    <div id=\"footer\">
        <div class=\"container\">
        \t<div class=\"row hidden-md hidden-sm\">
        \t\t<div class=\"col-xs-12\">
\t                    <a href=\"#\"><img src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/footer-logo.png"), "html", null, true);
        echo "\" alt=\"Big Deal\" class=\"footer-logo\" /></a>
\t                
        \t\t\t<div class=\"panel-group\" id=\"accordion\">
\t\t\t\t\t  <div class=\"panel panel-default\">
\t\t\t\t\t    <div class=\"panel-heading\">
\t\t\t\t\t      <h3 class=\"panel-title\">
\t\t\t\t\t        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">
\t\t\t\t\t          Contactez nous
\t\t\t\t\t        </a>
\t\t\t\t\t      </h3>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
\t\t\t\t\t      <div class=\"panel-body\">
\t\t\t\t\t        <ul>
\t\t                        <li><span>Address: </span>6 Rue de l'encyclopédie
\t\t                            Ennasr 2 - 2008 Ariana</li>
\t\t                        <li><span>E-mail: </span>contact@bigdeal.tn</li>
\t\t                        <li><span>Service Client</span><br>
\t\t                            +216 71 168 444 / 31 368 444</li>
\t\t                    </ul>
\t\t\t\t\t      </div>
\t\t\t\t\t    </div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"panel panel-default\">
\t\t\t\t\t    <div class=\"panel-heading\">
\t\t\t\t\t      <h3 class=\"panel-title\">
\t\t\t\t\t        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">
\t\t\t\t\t          FAQ
\t\t\t\t\t        </a>
\t\t\t\t\t      </h3>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
\t\t\t\t\t      <div class=\"panel-body\">
\t\t\t\t\t        <ul>
\t\t                        <li><a href=\"";
        // line 94
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "votre-activite-sur-bigdeal-tn"));
        echo "\">Votre Activité sur BIGDeal.tn</a></li>
\t\t                        <li><a href=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "protection-des-donnes-pesonnelle"));
        echo "\">Protection des données Pesonnelles</a></li>
\t\t                    </ul>
\t\t\t\t\t      </div>
\t\t\t\t\t    </div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"panel panel-default\">
\t\t\t\t\t    <div class=\"panel-heading\">
\t\t\t\t\t      <h3 class=\"panel-title\">
\t\t\t\t\t        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseThree\">
\t\t\t\t\t          Suivez nous
\t\t\t\t\t        </a>
\t\t\t\t\t      </h3>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div id=\"collapseThree\" class=\"panel-collapse collapse\">
\t\t\t\t\t      <div class=\"panel-body\">
\t\t\t\t\t        <ul class=\"social\">
\t\t                        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["social"]) ? $context["social"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 112
            echo "\t\t
\t\t                            <li><a href=\"";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "lien", array()), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", array()), "html", null, true);
            echo "\"></i></a></li>
\t\t                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "\t\t                    </ul>
\t\t                    <div class=\"bg\">
\t\t                        <p><a href=\"#\"><img src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/pro.png"), "html", null, true);
        echo "\" alt=\"Big deal Pro\" /></a></p>
\t\t\t    \t\t\t\t\t\t<span>Développez votre clientèle et faites
\t\t\t\t\t\t\t\t\t\t\tprospérer votre entreprise ></span>
\t\t                    </div>
\t\t\t\t\t      </div>
\t\t\t\t\t    </div>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div class=\"panel panel-default\">
\t\t\t\t\t    <div class=\"panel-heading\">
\t\t\t\t\t      <h3 class=\"panel-title\">
\t\t\t\t\t        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseFour\">
\t\t\t\t\t          A propos de nous
\t\t\t\t\t        </a>
\t\t\t\t\t      </h3>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div id=\"collapseFour\" class=\"panel-collapse collapse\">
\t\t\t\t\t      <div class=\"panel-body\">
\t\t\t\t\t        <ul>
\t\t                        <li><a href=\"";
        // line 135
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "qui-sommes-nous"));
        echo "\">Qui sommes nous</a></li>
\t\t                        <li><a href=\"";
        // line 136
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "conditions-generales"));
        echo "\">Conditions générales d'utilisation</a></li>
\t\t                        <li><a href=\"";
        // line 137
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "revue-de-press"));
        echo "\">Revue de Presse </a></li>
\t\t                    </ul>
\t\t                    <h3 class=\"orange\">En savoir plus</h3>
\t\t\t\t\t      </div>
\t\t\t\t\t    </div>
\t\t\t\t\t  </div>
\t\t\t\t\t</div>
        \t\t</div>
        \t</div>
            <div class=\"row hidden-xs\">
\t\t\t\t<div class=\"col-md-2\">
                    <a href=\"#\"><img src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/footer-logo.png"), "html", null, true);
        echo "\" alt=\"Big Deal\" class=\"footer-logo\" /></a>
                </div>
                <div class=\"col-md-3\">
                    <h3>Contactez nous</h3>
                    <ul>
                        <li><span>Address: </span>6 Rue de l'encyclopédie
                            Ennasr 2 - 2008 Ariana</li>
                        <li><span>E-mail: </span>contact@bigdeal.tn</li>
                        <li><span>Service Client</span><br>
                            +216 71 168 444 / 31 368 444</li>
                    </ul>
                </div>
                <div class=\"col-md-2\">
                    <h3><a href=\"";
        // line 161
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "faq"));
        echo "\">FAQ</a></h3>
                    <ul>
                        <li><a href=\"";
        // line 163
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "votre-activite-sur-bigdeal-tn"));
        echo "\">Votre Activité sur BIGDeal.tn</a></li>
                        <li><a href=\"";
        // line 164
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "protection-des-donnes-pesonnelle"));
        echo "\">Protection des données Pesonnelles</a></li>
                    </ul>
                </div>
                <div class=\"col-md-3\">
                    <h3>Suivez nous</h3>
                    <ul class=\"social\">
                        ";
        // line 170
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["social"]) ? $context["social"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 171
            echo "
                            <li><a href=\"";
            // line 172
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "lien", array()), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", array()), "html", null, true);
            echo "\"></i></a></li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 174
        echo "                    </ul>
                    <div class=\"bg\">
                        <p><a href=\"#\"><img src=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/pro.png"), "html", null, true);
        echo "\" alt=\"Big deal Pro\" /></a></p>
\t    \t\t\t\t\t\t<span>Développez votre clientèle et faites
\t\t\t\t\t\t\t\t\tprospérer votre entreprise ></span>
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <h3>A propos de nous</h3>
                    <ul>
                        <li><a href=\"";
        // line 184
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "qui-sommes-nous"));
        echo "\">Qui sommes nous</a></li>
                        <li><a href=\"";
        // line 185
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "conditions-generales"));
        echo "\">Conditions générales d'utilisation</a></li>
                        <li><a href=\"";
        // line 186
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "revue-de-press"));
        echo "\">Revue de Presse</a></li>
                    </ul>
                    <h3 class=\"orange\">En savoir plus</h3>
                </div>
            </div>
            <div class=\"separator\" style=\"margin-top:20px;\"></div>
            <div class=\"row\">
                <div class=\"container\" style=\"text-align:center\">
                    <a href=\"";
        // line 194
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "deal-restaurant-tunisie"));
        echo "\">Deal restaurant : Pourquoi avez-vous intérêt à cliquer !</a> |
                    <a href=\"";
        // line 195
        echo $this->env->getExtension('routing')->getPath("pages_detail", array("name" => "deal-restaurant"));
        echo "\">Deal Restaurant en Tunisie : Les meilleures affaires sur Bigdeal</a>
                </div>
            </div>

            <!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

            fbq('init', '1558172207806416');
            fbq('track', \"PageView\");</script>
            <noscript><img height=\"1\" width=\"1\" style=\"display:none\"
            src=\"https://www.facebook.com/tr?id=1558172207806416&ev=PageView&noscript=1\"
            /></noscript>
            <!-- End Facebook Pixel Code -->
            
            <!--Start of Zopim Live Chat Script-->
            <script type=\"text/javascript\">
                window.\$zopim||(function(d,s){var z=\$zopim=function(c){z._.push(c)},\$=z.s=
                        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
                        _.push(o)};z._=[];z.set._=[];\$.async=!0;\$.setAttribute(\"charset\",\"utf-8\");
                    \$.src=\"//v2.zopim.com/?sOHttwR6rQLlhNH7JrosS8OTBzsdci1b\";z.t=+new Date;\$.
                            type=\"text/javascript\";e.parentNode.insertBefore(\$,e)})(document,\"script\");
            </script>
            <!--End of Zopim Live Chat Script-->
\t\t\t<!-- script getresponse -->
\t\t\t<script type=\"text/javascript\">
\t\t\tvar gr_goal_params = {
\t\t\t param_0 : '',
\t\t\t param_1 : '',
\t\t\t param_2 : '',
\t\t\t param_3 : '',
\t\t\t param_4 : '',
\t\t\t param_5 : ''
\t\t\t};</script>
\t\t\t<script type=\"text/javascript\" src=\"https://app.getresponse.com/goals_log.js?p=593202&u=BvYi8\"></script>
\t\t\t<!-- end script getresponse -->
        </div>
    </div>
    <div id=\"copyright\">
    \t<div class=\"container\">
    \t\t<p class=\"pull-left\">Copyright © ";
        // line 239
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " BigDeal. Tous droits réservés.</p>
    \t\t<p class=\"\"> Powered by <a href=\"http://www.prodexo.net/\" target=\"_blank\" title=\"Prodexo\">Prodexo</a></p>
    \t</div>
    </div>
</footer>










";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Default:footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  346 => 239,  299 => 195,  295 => 194,  284 => 186,  280 => 185,  276 => 184,  265 => 176,  261 => 174,  251 => 172,  248 => 171,  244 => 170,  235 => 164,  231 => 163,  226 => 161,  210 => 148,  196 => 137,  192 => 136,  188 => 135,  167 => 117,  163 => 115,  153 => 113,  150 => 112,  146 => 111,  127 => 95,  123 => 94,  86 => 60,  75 => 52,  69 => 49,  19 => 1,);
    }
}
/* <footer>*/
/*     <div id="footer-top" class="container">*/
/*     	<div class="separator"></div>*/
/*         <div class="wrap">*/
/*             <div class="row">*/
/*                 <div class="col-md-2 col-sm-6 col-xs-6">*/
/*                     <div class="feature text-center">*/
/*                     	<i class="icon-bigfid"></i>*/
/*                     	<span>PROGRAMME DE FIDELITE</span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-2 col-sm-6 col-xs-6">*/
/*                     <div class="feature text-center">*/
/*                     	<i class="flaticon-shield20"></i>*/
/*                     	<span>PAIEMENT SECURISE</span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-2 col-sm-6 col-xs-6">*/
/*                     <div class="feature text-center">*/
/*                     	<i class="icon-delivery"></i>*/
/*                     	<span>LIVRAISON EN 72H</span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-2 col-sm-6 col-xs-6">*/
/*                     <div class="feature text-center">*/
/*                     	<i class="fa fa-smile-o"></i>*/
/*                         <span>GARANTIE SATISFAIT OU REMBOURSE</span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-2 col-sm-6 col-xs-6">*/
/*                     <div class="feature text-center">*/
/*                     	<i class="flaticon-gift90"></i>*/
/*                     	<span>OFFREZ à VOS PROCHE</span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-2 col-sm-6 col-xs-6">*/
/*                     <div class="feature text-center">*/
/*                     	<i class="flaticon-responsive4"></i>*/
/*                     	<span>COMPATIBLE PC/TABLETTE/MOBILE</span>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <div class="row cards">*/
/*             <div class="col-md-4 col-sm-12">*/
/*                 <h3>Nous acceptons:</h3>*/
/*             </div>*/
/*             <div class="col-md-5 col-sm-12">*/
/*                 <img class="img-responsive" src="{{ asset('public/images/cards.png') }}" alt="cards" />*/
/*             </div>*/
/* 			<div class="col-md-3 col-sm-12">*/
/*               <a href="{{ path('paybox_show') }}" style="cursor: pointer;" class="pull-left teal"><h3>Nos Paybox</h3></a>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <div id="footer">*/
/*         <div class="container">*/
/*         	<div class="row hidden-md hidden-sm">*/
/*         		<div class="col-xs-12">*/
/* 	                    <a href="#"><img src="{{ asset('public/images/footer-logo.png') }}" alt="Big Deal" class="footer-logo" /></a>*/
/* 	                */
/*         			<div class="panel-group" id="accordion">*/
/* 					  <div class="panel panel-default">*/
/* 					    <div class="panel-heading">*/
/* 					      <h3 class="panel-title">*/
/* 					        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">*/
/* 					          Contactez nous*/
/* 					        </a>*/
/* 					      </h3>*/
/* 					    </div>*/
/* 					    <div id="collapseOne" class="panel-collapse collapse in">*/
/* 					      <div class="panel-body">*/
/* 					        <ul>*/
/* 		                        <li><span>Address: </span>6 Rue de l'encyclopédie*/
/* 		                            Ennasr 2 - 2008 Ariana</li>*/
/* 		                        <li><span>E-mail: </span>contact@bigdeal.tn</li>*/
/* 		                        <li><span>Service Client</span><br>*/
/* 		                            +216 71 168 444 / 31 368 444</li>*/
/* 		                    </ul>*/
/* 					      </div>*/
/* 					    </div>*/
/* 					  </div>*/
/* 					  <div class="panel panel-default">*/
/* 					    <div class="panel-heading">*/
/* 					      <h3 class="panel-title">*/
/* 					        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">*/
/* 					          FAQ*/
/* 					        </a>*/
/* 					      </h3>*/
/* 					    </div>*/
/* 					    <div id="collapseTwo" class="panel-collapse collapse">*/
/* 					      <div class="panel-body">*/
/* 					        <ul>*/
/* 		                        <li><a href="{{ path('pages_detail',{'name':'votre-activite-sur-bigdeal-tn'}) }}">Votre Activité sur BIGDeal.tn</a></li>*/
/* 		                        <li><a href="{{ path('pages_detail',{'name':'protection-des-donnes-pesonnelle'}) }}">Protection des données Pesonnelles</a></li>*/
/* 		                    </ul>*/
/* 					      </div>*/
/* 					    </div>*/
/* 					  </div>*/
/* 					  <div class="panel panel-default">*/
/* 					    <div class="panel-heading">*/
/* 					      <h3 class="panel-title">*/
/* 					        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">*/
/* 					          Suivez nous*/
/* 					        </a>*/
/* 					      </h3>*/
/* 					    </div>*/
/* 					    <div id="collapseThree" class="panel-collapse collapse">*/
/* 					      <div class="panel-body">*/
/* 					        <ul class="social">*/
/* 		                        {% for item in social %}*/
/* 		*/
/* 		                            <li><a href="{{ item.lien }}" target="_blank"><i class="{{ item.icon }}"></i></a></li>*/
/* 		                        {% endfor %}*/
/* 		                    </ul>*/
/* 		                    <div class="bg">*/
/* 		                        <p><a href="#"><img src="{{ asset('public/images/pro.png') }}" alt="Big deal Pro" /></a></p>*/
/* 			    						<span>Développez votre clientèle et faites*/
/* 											prospérer votre entreprise ></span>*/
/* 		                    </div>*/
/* 					      </div>*/
/* 					    </div>*/
/* 					  </div>*/
/* 					  <div class="panel panel-default">*/
/* 					    <div class="panel-heading">*/
/* 					      <h3 class="panel-title">*/
/* 					        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">*/
/* 					          A propos de nous*/
/* 					        </a>*/
/* 					      </h3>*/
/* 					    </div>*/
/* 					    <div id="collapseFour" class="panel-collapse collapse">*/
/* 					      <div class="panel-body">*/
/* 					        <ul>*/
/* 		                        <li><a href="{{ path('pages_detail',{'name':'qui-sommes-nous'}) }}">Qui sommes nous</a></li>*/
/* 		                        <li><a href="{{ path('pages_detail',{'name':'conditions-generales'}) }}">Conditions générales d'utilisation</a></li>*/
/* 		                        <li><a href="{{ path('pages_detail',{'name':'revue-de-press'}) }}">Revue de Presse </a></li>*/
/* 		                    </ul>*/
/* 		                    <h3 class="orange">En savoir plus</h3>*/
/* 					      </div>*/
/* 					    </div>*/
/* 					  </div>*/
/* 					</div>*/
/*         		</div>*/
/*         	</div>*/
/*             <div class="row hidden-xs">*/
/* 				<div class="col-md-2">*/
/*                     <a href="#"><img src="{{ asset('public/images/footer-logo.png') }}" alt="Big Deal" class="footer-logo" /></a>*/
/*                 </div>*/
/*                 <div class="col-md-3">*/
/*                     <h3>Contactez nous</h3>*/
/*                     <ul>*/
/*                         <li><span>Address: </span>6 Rue de l'encyclopédie*/
/*                             Ennasr 2 - 2008 Ariana</li>*/
/*                         <li><span>E-mail: </span>contact@bigdeal.tn</li>*/
/*                         <li><span>Service Client</span><br>*/
/*                             +216 71 168 444 / 31 368 444</li>*/
/*                     </ul>*/
/*                 </div>*/
/*                 <div class="col-md-2">*/
/*                     <h3><a href="{{ path('pages_detail',{'name':'faq'}) }}">FAQ</a></h3>*/
/*                     <ul>*/
/*                         <li><a href="{{ path('pages_detail',{'name':'votre-activite-sur-bigdeal-tn'}) }}">Votre Activité sur BIGDeal.tn</a></li>*/
/*                         <li><a href="{{ path('pages_detail',{'name':'protection-des-donnes-pesonnelle'}) }}">Protection des données Pesonnelles</a></li>*/
/*                     </ul>*/
/*                 </div>*/
/*                 <div class="col-md-3">*/
/*                     <h3>Suivez nous</h3>*/
/*                     <ul class="social">*/
/*                         {% for item in social %}*/
/* */
/*                             <li><a href="{{ item.lien }}" target="_blank"><i class="{{ item.icon }}"></i></a></li>*/
/*                         {% endfor %}*/
/*                     </ul>*/
/*                     <div class="bg">*/
/*                         <p><a href="#"><img src="{{ asset('public/images/pro.png') }}" alt="Big deal Pro" /></a></p>*/
/* 	    						<span>Développez votre clientèle et faites*/
/* 									prospérer votre entreprise ></span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-2">*/
/*                     <h3>A propos de nous</h3>*/
/*                     <ul>*/
/*                         <li><a href="{{ path('pages_detail',{'name':'qui-sommes-nous'}) }}">Qui sommes nous</a></li>*/
/*                         <li><a href="{{ path('pages_detail',{'name':'conditions-generales'}) }}">Conditions générales d'utilisation</a></li>*/
/*                         <li><a href="{{ path('pages_detail',{'name':'revue-de-press'}) }}">Revue de Presse</a></li>*/
/*                     </ul>*/
/*                     <h3 class="orange">En savoir plus</h3>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="separator" style="margin-top:20px;"></div>*/
/*             <div class="row">*/
/*                 <div class="container" style="text-align:center">*/
/*                     <a href="{{ path('pages_detail',{'name':'deal-restaurant-tunisie'}) }}">Deal restaurant : Pourquoi avez-vous intérêt à cliquer !</a> |*/
/*                     <a href="{{ path('pages_detail',{'name':'deal-restaurant'}) }}">Deal Restaurant en Tunisie : Les meilleures affaires sur Bigdeal</a>*/
/*                 </div>*/
/*             </div>*/
/* */
/*             <!-- Facebook Pixel Code -->*/
/*             <script>*/
/*             !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?*/
/*             n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;*/
/*             n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;*/
/*             t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,*/
/*             document,'script','//connect.facebook.net/en_US/fbevents.js');*/
/* */
/*             fbq('init', '1558172207806416');*/
/*             fbq('track', "PageView");</script>*/
/*             <noscript><img height="1" width="1" style="display:none"*/
/*             src="https://www.facebook.com/tr?id=1558172207806416&ev=PageView&noscript=1"*/
/*             /></noscript>*/
/*             <!-- End Facebook Pixel Code -->*/
/*             */
/*             <!--Start of Zopim Live Chat Script-->*/
/*             <script type="text/javascript">*/
/*                 window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=*/
/*                         d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.*/
/*                         _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");*/
/*                     $.src="//v2.zopim.com/?sOHttwR6rQLlhNH7JrosS8OTBzsdci1b";z.t=+new Date;$.*/
/*                             type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");*/
/*             </script>*/
/*             <!--End of Zopim Live Chat Script-->*/
/* 			<!-- script getresponse -->*/
/* 			<script type="text/javascript">*/
/* 			var gr_goal_params = {*/
/* 			 param_0 : '',*/
/* 			 param_1 : '',*/
/* 			 param_2 : '',*/
/* 			 param_3 : '',*/
/* 			 param_4 : '',*/
/* 			 param_5 : ''*/
/* 			};</script>*/
/* 			<script type="text/javascript" src="https://app.getresponse.com/goals_log.js?p=593202&u=BvYi8"></script>*/
/* 			<!-- end script getresponse -->*/
/*         </div>*/
/*     </div>*/
/*     <div id="copyright">*/
/*     	<div class="container">*/
/*     		<p class="pull-left">Copyright © {{ 'now'|date('Y') }} BigDeal. Tous droits réservés.</p>*/
/*     		<p class=""> Powered by <a href="http://www.prodexo.net/" target="_blank" title="Prodexo">Prodexo</a></p>*/
/*     	</div>*/
/*     </div>*/
/* </footer>*/
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
