<?php

/* BackDashBundle:Default:index.html.twig */
class __TwigTemplate_09fcb723856daee050b8569edcd586098646f20f3fd8413a3e0b0be99211fddf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "BackDashBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseBack.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "roles", array()), 0, array(), "array") == "REDACTEUR")) {
            // line 4
            echo "<script>
    window.location.replace(\"";
            // line 5
            echo $this->env->getExtension('routing')->getPath("homeredacteur");
            echo "\");
</script>\t
";
        }
    }

    public function getTemplateName()
    {
        return "BackDashBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  33 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends '::baseBack.html.twig' %}*/
/* {% block body %}*/
/* {% if app.user.roles[0]=='REDACTEUR' %}*/
/* <script>*/
/*     window.location.replace("{{path("homeredacteur")}}");*/
/* </script>	*/
/* {% endif %}*/
/* {% endblock %}*/
