<?php

/* BackDashBundle:Pagination:sliding.html.twig */
class __TwigTemplate_75b12e90fa18c00f4a892038c78c2369a65394ebc5fa99c19305c2e4910af7cc extends Twig_Template
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
        if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > 1)) {
            // line 2
            echo "    <ul class=\"pagination\">
    ";
            // line 3
            if ((array_key_exists("first", $context) && ((isset($context["current"]) ? $context["current"] : null) != (isset($context["first"]) ? $context["first"] : null)))) {
                // line 4
                echo "        <li class=\"first\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["first"]) ? $context["first"] : null)))), "html", null, true);
                echo "\"> << </a></li>
    ";
            }
            // line 6
            echo "
    ";
            // line 7
            if (array_key_exists("previous", $context)) {
                // line 8
                echo "        <li class=\"previous\"><a class=\"hidden-xs\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["previous"]) ? $context["previous"] : null)))), "html", null, true);
                echo "\"> < </a></li>
    ";
            }
            // line 10
            echo "
    ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 12
                echo "        ";
                if (($context["page"] != (isset($context["current"]) ? $context["current"] : null))) {
                    // line 13
                    echo "            <li class=\"page\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => $context["page"]))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                    echo "</a></li>
        ";
                } else {
                    // line 15
                    echo "            <li class=\"current active\"><a>";
                    echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                    echo " <span class=\"sr-only\"></span></a></li>
        ";
                }
                // line 17
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "
    ";
            // line 19
            if (array_key_exists("next", $context)) {
                // line 20
                echo "        <li class=\"next\"><a class=\"hidden-xs\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["next"]) ? $context["next"] : null)))), "html", null, true);
                echo "\"> > </a></li>
    ";
            }
            // line 22
            echo "
    ";
            // line 23
            if ((array_key_exists("last", $context) && ((isset($context["current"]) ? $context["current"] : null) != (isset($context["last"]) ? $context["last"] : null)))) {
                // line 24
                echo "        <li class=\"last\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["last"]) ? $context["last"] : null)))), "html", null, true);
                echo "\"> >> </a></li>
    ";
            }
            // line 26
            echo "    </ul>
";
        }
    }

    public function getTemplateName()
    {
        return "BackDashBundle:Pagination:sliding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 26,  89 => 24,  87 => 23,  84 => 22,  78 => 20,  76 => 19,  73 => 18,  67 => 17,  61 => 15,  53 => 13,  50 => 12,  46 => 11,  43 => 10,  37 => 8,  35 => 7,  32 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if pageCount > 1 %}*/
/*     <ul class="pagination">*/
/*     {% if first is defined and current != first %}*/
/*         <li class="first"><a href="{{ path(route, query|merge({(pageParameterName): first})) }}"> << </a></li>*/
/*     {% endif %}*/
/* */
/*     {% if previous is defined %}*/
/*         <li class="previous"><a class="hidden-xs" href="{{ path(route, query|merge({(pageParameterName): previous})) }}"> < </a></li>*/
/*     {% endif %}*/
/* */
/*     {% for page in pagesInRange %}*/
/*         {% if page != current %}*/
/*             <li class="page"><a href="{{ path(route, query|merge({(pageParameterName): page})) }}">{{ page }}</a></li>*/
/*         {% else %}*/
/*             <li class="current active"><a>{{ page }} <span class="sr-only"></span></a></li>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* */
/*     {% if next is defined %}*/
/*         <li class="next"><a class="hidden-xs" href="{{ path(route, query|merge({(pageParameterName): next})) }}"> > </a></li>*/
/*     {% endif %}*/
/* */
/*     {% if last is defined and current != last %}*/
/*         <li class="last"><a href="{{ path(route, query|merge({(pageParameterName): last})) }}"> >> </a></li>*/
/*     {% endif %}*/
/*     </ul>*/
/* {% endif %}*/
