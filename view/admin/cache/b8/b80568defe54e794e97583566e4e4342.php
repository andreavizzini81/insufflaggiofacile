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

/* /partials/toolbar.twig */
class __TwigTemplate_84e2a095975e8a68e23293cf38a7594a extends Template
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
        echo "<div class=\"page-toolbar\">
    <div class=\"page-title\">";
        // line 2
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</div>
    ";
        // line 3
        if ( !(null === ($context["filterPath"] ?? null))) {
            // line 4
            echo "        ";
            $__internal_compile_0 = null;
            try {
                $__internal_compile_0 =                 $this->loadTemplate(($context["filterPath"] ?? null), "/partials/toolbar.twig", 4);
            } catch (LoaderError $e) {
                // ignore missing template
            }
            if ($__internal_compile_0) {
                $__internal_compile_0->display($context);
            }
            echo " 
    ";
        }
        // line 6
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "actions", [], "any", true, true, false, 6)) {
            // line 7
            echo "    <div class=\"actions\">
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "actions", [], "any", false, false, false, 8));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 9
                echo "            ";
                echo twig_get_attribute($this->env, $this->source, $context["action"], "render", [], "method", false, false, false, 9);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "    </div>
    ";
        }
        // line 13
        echo "</div>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/toolbar.twig";
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
        return array (  83 => 13,  79 => 11,  70 => 9,  66 => 8,  63 => 7,  60 => 6,  46 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"page-toolbar\">
    <div class=\"page-title\">{{ title }}</div>
    {% if filterPath is not null %}
        {% include filterPath ignore missing %} 
    {% endif %}
    {% if data.actions is defined %}
    <div class=\"actions\">
        {% for action in data.actions %}
            {{ action.render()|raw }}
        {% endfor %}
    </div>
    {% endif %}
</div>", "/partials/toolbar.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/partials/toolbar.twig");
    }
}
