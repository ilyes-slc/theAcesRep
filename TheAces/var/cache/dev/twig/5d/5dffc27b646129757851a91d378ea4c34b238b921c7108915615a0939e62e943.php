<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* complaint/test.html.twig */
class __TwigTemplate_ddf05e3795afa9d371fae8c1eeb571f476e322b49c732272e61610220ba0ddbf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "baseFront.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "complaint/test.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "complaint/test.html.twig"));

        $this->parent = $this->loadTemplate("baseFront.html.twig", "complaint/test.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 7
        echo "<br><br><br><br>
<div class=\"container\">
        <table id=\"customers\" >
            <tr>
                <td>
                    Date
                </td>
                <td>
                    Description
                </td>
                <td colspan=\"2\" align=\"center\" >
                    Actions
                </td>
            </tr>
            ";
        // line 21
        if (array_key_exists("Reclamations", $context)) {
            // line 22
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Reclamations"]) || array_key_exists("Reclamations", $context) ? $context["Reclamations"] : (function () { throw new RuntimeError('Variable "Reclamations" does not exist.', 22, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
                // line 23
                echo "                <tr>
                    <td>
                        ";
                // line 25
                $context["date"] = twig_get_attribute($this->env, $this->source, $context["rec"], "getDate", [], "method", false, false, false, 25);
                // line 26
                echo "                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 26, $this->source); })()), "d/m/Y"), "html", null, true);
                echo "
                    </td>
                    <td>
                        ";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rec"], "getDescription", [], "method", false, false, false, 29), "html", null, true);
                echo "
                    </td>
                    <td>
                        <a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("supprimer", ["id" => twig_get_attribute($this->env, $this->source, $context["rec"], "idRec", [], "any", false, false, false, 32)]), "html", null, true);
                echo "\"> Supprimer </a>
                    </td>
                    <td>
                        <a href=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("modifier", ["id" => twig_get_attribute($this->env, $this->source, $context["rec"], "idRec", [], "any", false, false, false, 35)]), "html", null, true);
                echo "\"> Modifier </a>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                <tr>
                    <td colspan=\"4\" align=\"center\">
                        <a href=\"ajouter\">Ajouter Reclamation</a>
                    </td>
                </tr>
        </table>
            ";
        } else {
            // line 46
            echo "                No Reclamations found
            ";
        }
        // line 48
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "complaint/test.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 48,  135 => 46,  126 => 39,  116 => 35,  110 => 32,  104 => 29,  97 => 26,  95 => 25,  91 => 23,  86 => 22,  84 => 21,  68 => 7,  58 => 6,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseFront.html.twig' %} 




{% block content %}
<br><br><br><br>
<div class=\"container\">
        <table id=\"customers\" >
            <tr>
                <td>
                    Date
                </td>
                <td>
                    Description
                </td>
                <td colspan=\"2\" align=\"center\" >
                    Actions
                </td>
            </tr>
            {% if Reclamations is defined %}
                {% for rec in Reclamations %}
                <tr>
                    <td>
                        {% set date = rec.getDate() %}
                        {{ date|date('d/m/Y') }}
                    </td>
                    <td>
                        {{ rec.getDescription() }}
                    </td>
                    <td>
                        <a href=\"{{ path( \"supprimer\" , {'id':rec.idRec} ) }}\"> Supprimer </a>
                    </td>
                    <td>
                        <a href=\"{{ path( \"modifier\" , {'id':rec.idRec} ) }}\"> Modifier </a>
                    </td>
                </tr>
                {% endfor %}
                <tr>
                    <td colspan=\"4\" align=\"center\">
                        <a href=\"ajouter\">Ajouter Reclamation</a>
                    </td>
                </tr>
        </table>
            {% else %}
                No Reclamations found
            {% endif %}
    </div>
{% endblock %}", "complaint/test.html.twig", "C:\\Users\\MSI\\Desktop\\Esprit\\S2\\theAcesRep\\TheAces\\templates\\complaint\\test.html.twig");
    }
}
