<?php

/* BackDealBundle:Comment:count.html.twig */
class __TwigTemplate_211c6e7537c938280153429173481f93f7593c4c673cb708caca469ac1646314 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["nb"]) ? $context["nb"] : null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "BackDealBundle:Comment:count.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{ nb }}*/
