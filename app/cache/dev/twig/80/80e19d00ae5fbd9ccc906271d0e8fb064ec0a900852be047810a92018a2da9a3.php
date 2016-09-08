<?php

/* MainRatingclientBundle:Rating:star.html.twig */
class __TwigTemplate_595d88c3c9052c4dfe16de071a8ca993ae1a17ea6188e5dde7f511f73f83e811 extends Twig_Template
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
        ob_start();
        // line 2
        echo "
            ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxValue"]) ? $context["maxValue"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 4
            echo "                ";
            $context["style"] = "fa fa-star-o";
            // line 5
            echo "                ";
            if (($context["i"] <= (isset($context["rate"]) ? $context["rate"] : null))) {
                // line 6
                echo "                    ";
                $context["style"] = "fa fa-star";
                // line 7
                echo "                ";
            } else {
                // line 8
                echo "                    ";
                $context["style"] = (($this->env->getExtension('rating_extension')->isHalfStarFilter((isset($context["rate"]) ? $context["rate"] : null), $context["i"])) ? ("fa fa-star-half-o") : (""));
                // line 9
                echo "                ";
            }
            // line 10
            echo "                ";
            if (((isset($context["style"]) ? $context["style"] : null) == "")) {
                // line 11
                echo "                    ";
                $context["style"] = "fa fa-star-o";
                // line 12
                echo "                ";
            }
            // line 13
            echo "                <span class=\"";
            echo twig_escape_filter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true);
            echo "\"></span>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "MainRatingclientBundle:Rating:star.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 15,  55 => 13,  52 => 12,  49 => 11,  46 => 10,  43 => 9,  40 => 8,  37 => 7,  34 => 6,  31 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* */
/*             {% for i in 1..maxValue %}*/
/*                 {% set style = 'fa fa-star-o' %}*/
/*                 {% if i <= rate %}*/
/*                     {% set style = 'fa fa-star' %}*/
/*                 {% else %}*/
/*                     {% set style = rate|isHalfStar(i) ? 'fa fa-star-half-o' %}*/
/*                 {% endif %}*/
/*                 {% if style == '' %}*/
/*                     {% set style = 'fa fa-star-o' %}*/
/*                 {% endif %}*/
/*                 <span class="{{ style }}"></span>*/
/*             {% endfor %}*/
/* */
/* {% endspaceless %}*/
