<?php

/* MainFrontBundle:Default:banner.html.twig */
class __TwigTemplate_f8224730cdc7b2f965e35f4714f9c5bc5a380a2ad1a66c13662bf97d2f50136c extends Twig_Template
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
        if (((isset($context["entity"]) ? $context["entity"] : null) != null)) {
            // line 2
            echo "     <div class=\"row\">
         ";
            // line 3
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "zone", array()) == 1)) {
                // line 4
                echo "        <button id=\"banner";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()), "html", null, true);
                echo "\" class=\"close\" onclick=\"hidethisadds(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()), "html", null, true);
                echo ")\" type=\"button\">
            <span aria-hidden=\"true\">×</span></button>";
            }
            // line 6
            echo "        </button>
         ";
            // line 7
            echo $this->env->getExtension('twig_extension')->bannershowFilter($this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "media", array())), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "target", array()), $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "link", array())), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "width", array()), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "height", array()));
            echo "

    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "MainFrontBundle:Default:banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  34 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if entity!=null %}*/
/*      <div class="row">*/
/*          {% if entity.zone==1 %}*/
/*         <button id="banner{{ entity.id }}" class="close" onclick="hidethisadds({{ entity.id }})" type="button">*/
/*             <span aria-hidden="true">×</span></button>{% endif %}*/
/*         </button>*/
/*          {{ (asset(entity.media)|bannershow(entity.target,asset(entity.link),entity.width,entity.height))|raw }}*/
/* */
/*     </div>*/
/* {% endif %}*/
