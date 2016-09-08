<?php

/* MainRatingclientBundle:Rating:control.html.twig */
class __TwigTemplate_81aefbf1f9b2874be95af0c2e0ea653d51b24e3d61bc31972e5f403fda004825 extends Twig_Template
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
        $context["securityRole"] = ((array_key_exists("role", $context)) ? (_twig_default_filter((isset($context["role"]) ? $context["role"] : null), $this->env->getExtension('rating_extension')->getDefaultSecurityRoleFunction())) : ($this->env->getExtension('rating_extension')->getDefaultSecurityRoleFunction()));
        // line 2
        $context["permalink"] = ((array_key_exists("permalink", $context)) ? (_twig_default_filter((isset($context["permalink"]) ? $context["permalink"] : null), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "uri", array()))) : ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "uri", array())));
        // line 3
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("MainRatingclientBundle:Rating:control", array("id" => (isset($context["id"]) ? $context["id"] : null), "permalink" => (isset($context["permalink"]) ? $context["permalink"] : null), "securityRole" => (isset($context["securityRole"]) ? $context["securityRole"] : null), "params" => ((array_key_exists("params", $context)) ? (_twig_default_filter((isset($context["params"]) ? $context["params"] : null), array())) : (array())))));
    }

    public function getTemplateName()
    {
        return "MainRatingclientBundle:Rating:control.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set securityRole = role|default(getDefaultSecurityRole()) %}*/
/* {% set permalink = permalink|default(app.request.uri) %}*/
/* {{ render(controller('MainRatingclientBundle:Rating:control', {'id' : id, 'permalink' : permalink, 'securityRole' : securityRole, 'params' : params|default({})})) }}*/
