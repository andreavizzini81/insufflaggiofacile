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

/* index.twig */
class __TwigTemplate_f11042898c227ccd042b38dd3e3bfc7f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
    ";
        // line 3
        $this->loadTemplate("/partials/head.twig", "index.twig", 3)->display($context);
        // line 4
        echo "    <body data-page=\"";
        echo twig_escape_filter($this->env, ($context["view"] ?? null), "html", null, true);
        echo "\" class=\"";
        echo twig_escape_filter($this->env, ($context["navStatus"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 5
        if (($context["hasTopbar"] ?? null)) {
            // line 6
            echo "            ";
            $this->loadTemplate("/partials/topbar.twig", "index.twig", 6)->display($context);
            // line 7
            echo "        ";
        }
        // line 8
        echo "        ";
        if (($context["hasNav"] ?? null)) {
            echo " 
            ";
            // line 9
            $this->loadTemplate("/partials/nav.twig", "index.twig", 9)->display($context);
            // line 10
            echo "        ";
        }
        // line 11
        echo "        ";
        if (($context["hasTopbar"] ?? null)) {
            // line 12
            echo "            ";
            $this->loadTemplate("/partials/toolbar.twig", "index.twig", 12)->display($context);
            // line 13
            echo "        ";
        }
        // line 14
        echo "        <main>
            ";
        // line 15
        $this->displayBlock('content', $context, $blocks);
        // line 16
        echo "        </main>
        <div class=\"notifications\"></div>
        ";
        // line 18
        $this->loadTemplate("/partials/body_bundle.twig", "index.twig", 18)->display($context);
        // line 19
        echo "    </body>
</html>";
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "index.twig";
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
        return array (  94 => 15,  89 => 19,  87 => 18,  83 => 16,  81 => 15,  78 => 14,  75 => 13,  72 => 12,  69 => 11,  66 => 10,  64 => 9,  59 => 8,  56 => 7,  53 => 6,  51 => 5,  44 => 4,  42 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    {% include '/partials/head.twig' %}
    <body data-page=\"{{ view }}\" class=\"{{ navStatus }}\">
        {% if hasTopbar %}
            {% include '/partials/topbar.twig' %}
        {% endif %}
        {% if hasNav %} 
            {% include '/partials/nav.twig' %}
        {% endif %}
        {% if hasTopbar %}
            {% include '/partials/toolbar.twig' %}
        {% endif %}
        <main>
            {% block content %}{% endblock content %}
        </main>
        <div class=\"notifications\"></div>
        {% include '/partials/body_bundle.twig' %}
    </body>
</html>", "index.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/index.twig");
    }
}
