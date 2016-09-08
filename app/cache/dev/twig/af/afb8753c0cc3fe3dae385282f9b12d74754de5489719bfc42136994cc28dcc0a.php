<?php

/* UserUserBundle:Default:show.html.twig */
class __TwigTemplate_e11d49c6f66271923eb02df87e99a145664f0af0ed7d1fa6a69ad625ff2d46f5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseBack.html.twig", "UserUserBundle:Default:show.html.twig", 1);
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<!-- ==================== PAGE CONTENT ==================== -->
    <div class=\"content\">

        <!-- ==================== WIDGETS CONTAINER ==================== -->
        <div class=\"container-fluid\">
            <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("add_users");
        echo "\">
                <button class=\"btn btn-danger\" type=\"button\">Ajouter</button>
            </a>

            <!-- ==================== END OF ROW ==================== -->
            <div class=\"row-fluid\">
                <div class=\"span12\">
                    <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->
                    <div class=\"containerHeadline\">
                        <i class=\"icon-table\"></i>

                        <h2>liste Utilisateur</h2>
                    </div>
                    <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->

                    <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->
                    <div class=\"floatingBox table\">
                        <div class=\"container-fluid\">
                            <table class=\"table\">
                                <thead>
                                <tr role=\"row\">
                                    <th>Utilisateur</th>
                                    <th>Login</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Activé?</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 40
            echo "
                                    <tr>
                                        <td>
                                            <a href=\"#\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "name", array()));
            echo " </a>
                                        </td>
                                        <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "username", array()));
            echo "</td>
                                        <td> ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "email", array()), "html", null, true);
            echo "</td>
                                        <td> ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entry"], "roles", array()), 0, array(), "array"), "html", null, true);
            echo "</td>
                                        <td>
                                            ";
            // line 49
            if (($this->getAttribute($context["entry"], "enabled", array()) == 1)) {
                echo "<span
                                                    class=\"label label-success ptip_ne\">Activé</span>";
            } else {
                // line 50
                echo "<span
                                                    class=\"label label-danger ptip_ne\">Désactivé</span> ";
            }
            // line 52
            echo "                                        </td>
                                        <td>
                                            <div class=\"btn-toolbar\" style=\"margin: 0;\">
                                                <div class=\"btn-group\">
                                                    <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                                                        Action <span
                                                                class=\"caret\"></span></button>
                                                    <ul class=\"dropdown-menu pull-right\">

                                                        <li>
                                                            <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("view_users", array("id" => $this->getAttribute($context["entry"], "id", array()))), "html", null, true);
            echo "\">Modifier </a>
                                                        </li>
                                                       

                                                    </ul>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==================== END OF WIDGETS CONTAINER ==================== -->
    </div>

    <!-- ==================== END OF PAGE CONTENT ==================== -->
";
    }

    public function getTemplateName()
    {
        return "UserUserBundle:Default:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 74,  119 => 62,  107 => 52,  103 => 50,  98 => 49,  93 => 47,  89 => 46,  85 => 45,  80 => 43,  75 => 40,  71 => 39,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends '::baseBack.html.twig' %}*/
/* */
/* {% block body -%}*/
/*     <!-- ==================== PAGE CONTENT ==================== -->*/
/*     <div class="content">*/
/* */
/*         <!-- ==================== WIDGETS CONTAINER ==================== -->*/
/*         <div class="container-fluid">*/
/*             <a href="{{ path('add_users') }}">*/
/*                 <button class="btn btn-danger" type="button">Ajouter</button>*/
/*             </a>*/
/* */
/*             <!-- ==================== END OF ROW ==================== -->*/
/*             <div class="row-fluid">*/
/*                 <div class="span12">*/
/*                     <!-- ==================== DEFAULT TABLE HEADLINE ==================== -->*/
/*                     <div class="containerHeadline">*/
/*                         <i class="icon-table"></i>*/
/* */
/*                         <h2>liste Utilisateur</h2>*/
/*                     </div>*/
/*                     <!-- ==================== END OF DEFAULT TABLE HEADLINE ==================== -->*/
/* */
/*                     <!-- ==================== DEFAULT TABLE FLOATING BOX ==================== -->*/
/*                     <div class="floatingBox table">*/
/*                         <div class="container-fluid">*/
/*                             <table class="table">*/
/*                                 <thead>*/
/*                                 <tr role="row">*/
/*                                     <th>Utilisateur</th>*/
/*                                     <th>Login</th>*/
/*                                     <th>Email</th>*/
/*                                     <th>Rôle</th>*/
/*                                     <th>Activé?</th>*/
/*                                     <th>Action</th>*/
/*                                 </tr>*/
/*                                 </thead>*/
/*                                 <tbody>*/
/*                                 {% for entry in users %}*/
/* */
/*                                     <tr>*/
/*                                         <td>*/
/*                                             <a href="#">{{ entry.name|e }} </a>*/
/*                                         </td>*/
/*                                         <td>{{ entry.username|e }}</td>*/
/*                                         <td> {{ entry.email }}</td>*/
/*                                         <td> {{ entry.roles[0] }}</td>*/
/*                                         <td>*/
/*                                             {% if entry.enabled==1 %}<span*/
/*                                                     class="label label-success ptip_ne">Activé</span>{% else %}<span*/
/*                                                     class="label label-danger ptip_ne">Désactivé</span> {% endif %}*/
/*                                         </td>*/
/*                                         <td>*/
/*                                             <div class="btn-toolbar" style="margin: 0;">*/
/*                                                 <div class="btn-group">*/
/*                                                     <button class="btn dropdown-toggle" data-toggle="dropdown">*/
/*                                                         Action <span*/
/*                                                                 class="caret"></span></button>*/
/*                                                     <ul class="dropdown-menu pull-right">*/
/* */
/*                                                         <li>*/
/*                                                             <a href="{{ path('view_users', {'id': entry.id}) }}">Modifier </a>*/
/*                                                         </li>*/
/*                                                        */
/* */
/*                                                     </ul>*/
/*                                                 </div>*/
/*                                             </div>*/
/* */
/*                                         </td>*/
/*                                     </tr>*/
/* */
/*                                 {% endfor %}*/
/*                                 </tbody>*/
/*                             </table>*/
/* */
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <!-- ==================== END OF WIDGETS CONTAINER ==================== -->*/
/*     </div>*/
/* */
/*     <!-- ==================== END OF PAGE CONTENT ==================== -->*/
/* {% endblock %}*/
/* */
