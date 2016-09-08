<?php

/* BackDealBundle:Comment:messagebar.html.twig */
class __TwigTemplate_b4a9a0444bc3a5cde0148cb45187ed70f83f71442beacbf106365602d3dc733f extends Twig_Template
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
        echo "<div id=\"messagesContent\">
    <div class=\"sidebarDivider\"></div>
    <div class=\"sidebarContent\">
        <a href=\"#collapsedSidebarContent\" class=\"showCollapsedSidebarMenu\"><i class=\"icon-chevron-sign-left\"></i>

            <h1> Commentaires</h1></a>

        <h1>Commentaires</h1>

        <div class=\"sidebarInfo\">
            <div><span class=\"label\">";
        // line 11
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["comment"]) ? $context["comment"] : null)), "html", null, true);
        echo "</span> Commentaires</div>
            <div><span class=\"label red\">";
        // line 12
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["unreaded"]) ? $context["unreaded"] : null)), "html", null, true);
        echo "</span> Commentaires non approuvés</div>
        </div>
        <ul class=\"messagesList\">
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["unreaded"]) ? $context["unreaded"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 16
            echo "            <li class=\"unreaded\">
                <div class=\"messageAvatar\">
                    ";
            // line 24
            echo "<img width=\"50\" height=\"50\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/images/profile-no-picture.png"), "html", null, true);
            echo "\"
                                       alt=\"\">
                </div>
                <h3>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "voter", array()), "html", null, true);
            echo "</h3>
                    <span class=\"messageDate\">";
            // line 28
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "dcr", array()), "d/m/Y"), "html", null, true);
            echo " <span
                                class=\"pull-right messageStatus\">non approuvé</span></span>

                <div class=\"messageContent\">\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('twig_extension')->getshortFilter($this->getAttribute($context["item"], "comment", array())), "html", null, true);
            echo "\"
                </div>
            </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "        </ul>
        <a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("back_comment");
        echo "\" class=\"btn btn-primary\">Tout voir</a>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "BackDealBundle:Comment:messagebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 36,  76 => 35,  66 => 31,  60 => 28,  56 => 27,  49 => 24,  45 => 16,  41 => 15,  35 => 12,  31 => 11,  19 => 1,);
    }
}
/* <div id="messagesContent">*/
/*     <div class="sidebarDivider"></div>*/
/*     <div class="sidebarContent">*/
/*         <a href="#collapsedSidebarContent" class="showCollapsedSidebarMenu"><i class="icon-chevron-sign-left"></i>*/
/* */
/*             <h1> Commentaires</h1></a>*/
/* */
/*         <h1>Commentaires</h1>*/
/* */
/*         <div class="sidebarInfo">*/
/*             <div><span class="label">{{ comment|length }}</span> Commentaires</div>*/
/*             <div><span class="label red">{{ unreaded|length }}</span> Commentaires non approuvés</div>*/
/*         </div>*/
/*         <ul class="messagesList">*/
/*             {% for item in unreaded %}*/
/*             <li class="unreaded">*/
/*                 <div class="messageAvatar">*/
/*                     {#{% if item.voter.fbid %}*/
/*                         <img src="http://graph.facebook.com/v2.3/{{ item.voter.fbid }}/picture?width=50&height=50"*/
/*                              alt="">*/
/*                     {% else %}*/
/*                         <img width="50" height="50" src="{{ asset('public/images/profile-no-picture.png') }}"*/
/*                              alt="">*/
/*                     {% endif %}#}<img width="50" height="50" src="{{ asset('public/images/profile-no-picture.png') }}"*/
/*                                        alt="">*/
/*                 </div>*/
/*                 <h3>{{ item.voter }}</h3>*/
/*                     <span class="messageDate">{{ item.dcr|date('d/m/Y') }} <span*/
/*                                 class="pull-right messageStatus">non approuvé</span></span>*/
/* */
/*                 <div class="messageContent">"{{ item.comment|getshort }}"*/
/*                 </div>*/
/*             </li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*         <a href="{{ path('back_comment') }}" class="btn btn-primary">Tout voir</a>*/
/*     </div>*/
/* </div>*/
