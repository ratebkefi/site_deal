<?php

/* form_table_layout.html.twig */
class __TwigTemplate_3ef1e5f164d7cceb1d595023d96fab25c6b05393a68a317376d038b83e99f06c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form_row', $context, $blocks);
    }

    public function block_form_row($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"control-group ";
        echo (((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : null)) > 0)) ? ("has-error") : (""));
        echo "\">
        ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'label', array("label_attr" => array("class" => "control-label")));
        echo "
        ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
        <div class=\"controls\">
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "form_table_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  35 => 4,  31 => 3,  26 => 2,  20 => 1,);
    }
}
/* {% block form_row %}*/
/*     <div class="control-group {{ errors|length > 0 ? 'has-error' : '' }}">*/
/*         {{ form_label(form, null, {'label_attr': {'class': 'control-label'}}) }}*/
/*         {{ form_errors(form) }}*/
/*         <div class="controls">*/
/*             {{ form_widget(form) }}*/
/*         </div>*/
/* */
/*     </div>*/
/* {% endblock form_row %}*/
/* */
