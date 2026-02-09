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

/* partials/pagination.twig */
class __TwigTemplate_5a0104a3e4701a57899b020db3a64820 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"pagination\">
    <a class=\"item navigation\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "prev", [], "any", false, false, false, 2), "href", [], "any", false, false, false, 2), "html", null, true);
        echo "\" ";
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "prev", [], "any", false, false, false, 2), "active", [], "any", false, false, false, 2)) ? ("") : ("disabled"));
        echo ">
        <span class=\"far fa-chevron-left\"></span>
    </a>
    <a class=\"item navigation\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "next", [], "any", false, false, false, 5), "href", [], "any", false, false, false, 5), "html", null, true);
        echo "\" ";
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "next", [], "any", false, false, false, 5), "active", [], "any", false, false, false, 5)) ? ("") : ("disabled"));
        echo ">
        <span class=\"far fa-chevron-right\"></span>
    </a>
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pages", [], "any", false, false, false, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 9
            echo "    <a class=\"item ";
            echo ((twig_get_attribute($this->env, $this->source, $context["page"], "active", [], "any", false, false, false, 9)) ? ("active") : (""));
            echo "\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "href", [], "any", false, false, false, 9), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "value", [], "any", false, false, false, 9), "html", null, true);
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "results", [], "any", true, true, false, 11)) {
            // line 12
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "results", [], "any", false, false, false, 12) > 0)) {
                // line 13
                echo "        <div class=\"summary\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "results", [], "any", false, false, false, 13), "html", null, true);
                echo " risultati</div>
        ";
            } else {
                // line 15
                echo "        <div class=\"summary\">Nessun risultato trovato</div>
        ";
            }
            // line 17
            echo "    ";
        }
        // line 18
        echo "</div>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "partials/pagination.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  92 => 18,  89 => 17,  85 => 15,  79 => 13,  76 => 12,  73 => 11,  60 => 9,  56 => 8,  48 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"pagination\">
    <a class=\"item navigation\" href=\"{{ data.prev.href }}\" {{data.prev.active ? '' : 'disabled' }}>
        <span class=\"far fa-chevron-left\"></span>
    </a>
    <a class=\"item navigation\" href=\"{{ data.next.href }}\" {{data.next.active ? '' : 'disabled' }}>
        <span class=\"far fa-chevron-right\"></span>
    </a>
    {% for page in data.pages %}
    <a class=\"item {{page.active ? 'active' : '' }}\" href=\"{{ page.href }}\">{{page.value}}</a>
    {% endfor %}
    {% if data.results is defined %}
        {% if data.results > 0 %}
        <div class=\"summary\">{{ data.results }} risultati</div>
        {% else %}
        <div class=\"summary\">Nessun risultato trovato</div>
        {% endif %}
    {% endif %}
</div>", "partials/pagination.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/pagination.twig");
    }
}
