<?php

/* ::breadcrumbs.html.twig */
class __TwigTemplate_d4c2cbe371fa8d2942325ee70348a50555715639a0fe338c0e73886a85a46e07 extends Twig_Template
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
        echo "<li><i class=\"icon-home\"></i><a href=\"";
        echo $this->env->getExtension('routing')->getPath("back_dash_homepage");
        echo "\"> Home</a> <span class=\"divider\"><i class=\"icon-angle-right\"></i></span></li>
";
        // line 2
        if (twig_length_filter($this->env, $this->env->getExtension('breadcrumbs')->getBreadcrumbs())) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "       <!-- <ul id=\"";
            echo twig_escape_filter($this->env, (isset($context["listId"]) ? $context["listId"] : null), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, (isset($context["listClass"]) ? $context["listClass"] : null), "html", null, true);
            echo "\" itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\">-->
            ";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
                // line 6
                echo "                <li";
                if ((array_key_exists("itemClass", $context) && twig_length_filter($this->env, (isset($context["itemClass"]) ? $context["itemClass"] : null)))) {
                    echo " class=\"";
                    echo twig_escape_filter($this->env, (isset($context["itemClass"]) ? $context["itemClass"] : null), "html", null, true);
                    echo "\"";
                }
                if ( !$this->getAttribute($context["loop"], "first", array())) {
                    echo " itemprop=\"child\"";
                }
                echo ">
                    ";
                // line 7
                if (($this->getAttribute($context["b"], "url", array()) &&  !$this->getAttribute($context["loop"], "last", array()))) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["b"], "url", array()), "html", null, true);
                    echo "\" itemprop=\"url\"";
                    if ((array_key_exists("linkRel", $context) && twig_length_filter($this->env, (isset($context["linkRel"]) ? $context["linkRel"] : null)))) {
                        echo " rel=\"";
                        echo twig_escape_filter($this->env, (isset($context["linkRel"]) ? $context["linkRel"] : null), "html", null, true);
                        echo "\"";
                    }
                    echo ">";
                }
                // line 8
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["b"], "text", array()), $this->getAttribute($context["b"], "translationParameters", array()), (isset($context["translation_domain"]) ? $context["translation_domain"] : null), (isset($context["locale"]) ? $context["locale"] : null)), "html", null, true);
                // line 9
                if (($this->getAttribute($context["b"], "url", array()) &&  !$this->getAttribute($context["loop"], "last", array()))) {
                    echo "</a>";
                }
                // line 10
                echo "
                    ";
                // line 11
                if (( !(null === (isset($context["separator"]) ? $context["separator"] : null)) &&  !$this->getAttribute($context["loop"], "last", array()))) {
                    // line 12
                    echo "                        <span class=\"divider\"><i class=\"icon-angle-right\"></i></span>
                    ";
                }
                // line 14
                echo "                </li>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "      <!--  </ul>-->
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    public function getTemplateName()
    {
        return "::breadcrumbs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 16,  92 => 14,  88 => 12,  86 => 11,  83 => 10,  79 => 9,  77 => 8,  65 => 7,  53 => 6,  36 => 5,  29 => 4,  26 => 3,  24 => 2,  19 => 1,);
    }
}
/* <li><i class="icon-home"></i><a href="{{ path('back_dash_homepage') }}"> Home</a> <span class="divider"><i class="icon-angle-right"></i></span></li>*/
/* {% if wo_breadcrumbs()|length %}*/
/*     {% spaceless %}*/
/*        <!-- <ul id="{{ listId }}" class="{{ listClass }}" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">-->*/
/*             {% for b in breadcrumbs %}*/
/*                 <li{% if itemClass is defined and itemClass|length %} class="{{ itemClass }}"{% endif %}{% if not(loop.first) %} itemprop="child"{% endif %}>*/
/*                     {% if b.url and not loop.last %}<a href="{{ b.url }}" itemprop="url"{% if linkRel is defined and linkRel|length %} rel="{{ linkRel }}"{% endif %}>{% endif %}*/
/*                        {{- b.text | trans(b.translationParameters, translation_domain, locale) -}}*/
/*                         {% if b.url and not loop.last %}</a>{% endif %}*/
/* */
/*                     {% if separator is not null and not loop.last %}*/
/*                         <span class="divider"><i class="icon-angle-right"></i></span>*/
/*                     {% endif %}*/
/*                 </li>*/
/*             {% endfor %}*/
/*       <!--  </ul>-->*/
/*     {% endspaceless %}*/
/* {% endif %}*/
/* */
