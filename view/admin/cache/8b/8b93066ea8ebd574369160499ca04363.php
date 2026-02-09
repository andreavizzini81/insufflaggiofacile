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

/* 404.twig */
class __TwigTemplate_4f7cab727f1ea0993fde706155c988e3 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "404.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"row\">
    <div class=\"col-md-12\">
        <h1 style=\"color: #777; font-size: 150px; font-weight: bold; text-align: center;\">404</h1>
        <h2 style=\"color: #777; font-size: 38px; font-weight: bold; text-align: center;\">NOT FOUND</h2>
        <h4 style=\"color: #777; text-align: center;\">La pagina richiesta non esiste oppure &egrave; in fase di allestimento.</h4>
    </div>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "404.twig";
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
        <h1 style=\"color: #777; font-size: 150px; font-weight: bold; text-align: center;\">404</h1>
        <h2 style=\"color: #777; font-size: 38px; font-weight: bold; text-align: center;\">NOT FOUND</h2>
        <h4 style=\"color: #777; text-align: center;\">La pagina richiesta non esiste oppure &egrave; in fase di allestimento.</h4>
    </div>
</div>
{% endblock content %}", "404.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/404.twig");
    }
}
