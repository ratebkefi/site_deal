<?php

/* MainFrontBundle:Deal:allcomment.html.twig */
class __TwigTemplate_eca9b5d9b056bc6db17a59bd5130308ccc95a0cf9b293f5a73a57662a310cacb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    ";
        // line 4
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 23
        echo "
    </head>
<body>
<div id=\"content\">
<div class=\"row offre-comments comments-modal\">
    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            echo "
        <div class=\"row comments\">
            <div class=\"col-md-1 col-sm-1 col-xs-3 text-left\">
                                                            ";
            // line 32
            if (($this->getAttribute($this->getAttribute($context["item"], "voter", array()), "fbid", array()) != "")) {
                // line 33
                echo "                                                                <img src=\"https://graph.facebook.com/v2.3/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "voter", array()), "fbid", array()), "html", null, true);
                echo "/picture?width=80&height=80\"
                                                                     alt=\"\">
                                                            ";
            } else {
                // line 36
                echo "                                                                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/profile-no-picture.png"), "html", null, true);
                echo "\"
                                                                     alt=\"\">
                                                            ";
            }
            // line 39
            echo "            </div>
            <div class=\"col-md-11 col-sm-11 col-xs-9\">
                <div class=\"row\">
                    <div class=\"col-sm-12 col-xs-12\">
                        <strong>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "voter", array()), "html", null, true);
            echo "</strong>
                    </div>
                    <div class=\"col-sm-12 col-xs-12\">
                        <strong>Avis</strong>
\t\t\t\t\t\t";
            // line 47
            $context["maxValue"] = 5;
            // line 48
            echo "\t\t\t\t\t\t";
            $context["rate"] = $this->getAttribute($context["item"], "value", array());
            // line 49
            echo "\t\t\t\t\t\t<div class=\"stars clearfix\">
\t\t\t\t\t\t";
            // line 50
            ob_start();
            // line 51
            echo "
\t\t\t\t\t\t";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxValue"]) ? $context["maxValue"] : null)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 53
                echo "\t\t\t\t\t\t\t";
                $context["style"] = "fa fa-star-o";
                // line 54
                echo "\t\t\t\t\t\t\t";
                if (($context["i"] <= (isset($context["rate"]) ? $context["rate"] : null))) {
                    // line 55
                    echo "\t\t\t\t\t\t\t\t";
                    $context["style"] = "fa fa-star";
                    // line 56
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 57
                    echo "\t\t\t\t\t\t\t\t";
                    $context["style"] = (($this->env->getExtension('rating_extension')->isHalfStarFilter((isset($context["rate"]) ? $context["rate"] : null), $context["i"])) ? ("fa fa-star-half-o") : (""));
                    // line 58
                    echo "\t\t\t\t\t\t\t";
                }
                // line 59
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["style"]) ? $context["style"] : null) == "")) {
                    // line 60
                    echo "\t\t\t\t\t\t\t\t";
                    $context["style"] = "fa fa-star-o";
                    // line 61
                    echo "\t\t\t\t\t\t\t";
                }
                // line 62
                echo "\t\t\t\t\t\t\t<span class=\"";
                echo twig_escape_filter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true);
                echo "\"></span>
\t\t\t\t\t\t\t
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-12 col-xs-12\">";
            // line 66
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "dcr", array()), "d/m/Y"), "html", null, true);
            echo "</div>
                </div>
";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 69
            echo "                </div>
                <p> ";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getdealFilter($this->getAttribute($this->getAttribute($context["item"], "rating", array()), "id", array())), "html", null, true);
            echo "</p>
                <br><p>";
            // line 71
            echo $this->getAttribute($context["item"], "comment", array());
            echo "</p>
            </div>
        </div>


    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "</div>
    <div class=\"pagination pagination-large\" style=\"text-align: center\">
        ";
        // line 79
        echo $this->env->getExtension('knp_pagination')->render($this->env, (isset($context["pagination"]) ? $context["pagination"] : null));
        echo "
    </div>
</div>
<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/jquery-migrate-1.2.1.min.js"), "html", null, true);
        echo "\"></script>
<script>
    \$('.pagination a').attr('target','_self')
</script>
</body>
";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "
    <!-- Font-awesome Icons -->
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/font-awesome.min.css"), "html", null, true);
        echo "\">
    <!-- Latest compiled and minified CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/bootstrap.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/storelocator.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/flexslider.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/css/style.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/dcsrating/css/rating.css"), "html", null, true);
        echo "\"/>
<style>
        .fa {
            color: #de0e79;
            font-size: 1.3em;

        }

    </style>
    ";
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Deal:allcomment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 13,  202 => 12,  198 => 11,  194 => 10,  190 => 9,  185 => 7,  181 => 5,  178 => 4,  168 => 83,  164 => 82,  158 => 79,  154 => 77,  142 => 71,  138 => 70,  135 => 69,  129 => 66,  126 => 65,  116 => 62,  113 => 61,  110 => 60,  107 => 59,  104 => 58,  101 => 57,  98 => 56,  95 => 55,  92 => 54,  89 => 53,  85 => 52,  82 => 51,  80 => 50,  77 => 49,  74 => 48,  72 => 47,  65 => 43,  59 => 39,  52 => 36,  45 => 33,  43 => 32,  38 => 29,  34 => 28,  27 => 23,  25 => 4,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="fr">*/
/* <head>*/
/*     {% block stylesheets %}*/
/* */
/*     <!-- Font-awesome Icons -->*/
/*     <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">*/
/*     <!-- Latest compiled and minified CSS -->*/
/*     <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">*/
/*     <link rel="stylesheet" type="text/css" href="{{ asset('public/css/storelocator.css') }}" />*/
/*     <link rel="stylesheet" href="{{ asset('public/css/flexslider.css') }}">*/
/*     <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">*/
/*     <link rel="stylesheet" href="{{ asset('bundles/dcsrating/css/rating.css') }}"/>*/
/* <style>*/
/*         .fa {*/
/*             color: #de0e79;*/
/*             font-size: 1.3em;*/
/* */
/*         }*/
/* */
/*     </style>*/
/*     {% endblock %}*/
/* */
/*     </head>*/
/* <body>*/
/* <div id="content">*/
/* <div class="row offre-comments comments-modal">*/
/*     {% for item in pagination %}*/
/* */
/*         <div class="row comments">*/
/*             <div class="col-md-1 col-sm-1 col-xs-3 text-left">*/
/*                                                             {% if item.voter.fbid!="" %}*/
/*                                                                 <img src="https://graph.facebook.com/v2.3/{{ item.voter.fbid }}/picture?width=80&height=80"*/
/*                                                                      alt="">*/
/*                                                             {% else %}*/
/*                                                                 <img src="{{ asset('public/images/profile-no-picture.png') }}"*/
/*                                                                      alt="">*/
/*                                                             {% endif %}*/
/*             </div>*/
/*             <div class="col-md-11 col-sm-11 col-xs-9">*/
/*                 <div class="row">*/
/*                     <div class="col-sm-12 col-xs-12">*/
/*                         <strong>{{ item.voter }}</strong>*/
/*                     </div>*/
/*                     <div class="col-sm-12 col-xs-12">*/
/*                         <strong>Avis</strong>*/
/* 						{%set maxValue = 5 %}*/
/* 						{%set rate = item.value %}*/
/* 						<div class="stars clearfix">*/
/* 						{% spaceless %}*/
/* */
/* 						{% for i in 1..maxValue %}*/
/* 							{% set style = 'fa fa-star-o' %}*/
/* 							{% if i <= rate %}*/
/* 								{% set style = 'fa fa-star' %}*/
/* 							{% else %}*/
/* 								{% set style = rate|isHalfStar(i) ? 'fa fa-star-half-o' %}*/
/* 							{% endif %}*/
/* 							{% if style == '' %}*/
/* 								{% set style = 'fa fa-star-o' %}*/
/* 							{% endif %}*/
/* 							<span class="{{ style }}"></span>*/
/* 							*/
/* 						{% endfor %}*/
/* 					</div>*/
/* 					<div class="col-sm-12 col-xs-12">{{ item.dcr|date('d/m/Y') }}</div>*/
/*                 </div>*/
/* {% endspaceless %}*/
/*                 </div>*/
/*                 <p> {{ item.rating.id|getdeal }}</p>*/
/*                 <br><p>{{ item.comment|raw }}</p>*/
/*             </div>*/
/*         </div>*/
/* */
/* */
/*     {% endfor %}*/
/* </div>*/
/*     <div class="pagination pagination-large" style="text-align: center">*/
/*         {{ knp_pagination_render(pagination) }}*/
/*     </div>*/
/* </div>*/
/* <script src="{{ asset('public/js/jquery-1.11.3.min.js') }}"></script>*/
/* <script src="{{ asset('public/js/jquery-migrate-1.2.1.min.js') }}"></script>*/
/* <script>*/
/*     $('.pagination a').attr('target','_self')*/
/* </script>*/
/* </body>*/
/* */
