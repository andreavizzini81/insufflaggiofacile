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

/* 401.twig */
class __TwigTemplate_0f5a8cb0648c547f11bf5abce992c063 extends Template
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
        return "index.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("index.twig", "401.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"row\">
    <div class=\"col-md-12\">
        <h1 style=\"color: #777; font-size: 150px; font-weight: bold; text-align: center;\">401</h1>
        <h2 style=\"color: #777; font-size: 38px; font-weight: bold; text-align: center;\">ACCESSO NON AUTORIZZATO</h2>
        <h4 style=\"color: #777; text-align: center;\">L&rsquo;utente corrente non ha i permessi per accedere alla risorsa specificata.<br><br>Per ulteriori informazioni rivolgersi all&rsquo;amministratore di sistema.</h4>
    </div>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "401.twig";
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
        return array (  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<div class=\"row\">
    <div class=\"col-md-12\">
        <h1 style=\"color: #777; font-size: 150px; font-weight: bold; text-align: center;\">401</h1>
        <h2 style=\"color: #777; font-size: 38px; font-weight: bold; text-align: center;\">ACCESSO NON AUTORIZZATO</h2>
        <h4 style=\"color: #777; text-align: center;\">L&rsquo;utente corrente non ha i permessi per accedere alla risorsa specificata.<br><br>Per ulteriori informazioni rivolgersi all&rsquo;amministratore di sistema.</h4>
    </div>
</div>
{% endblock content %}", "401.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/401.twig");
    }
}
