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

/* login.twig */
class __TwigTemplate_0ae757ea152f0b174b834651ee133333 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "login.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"widget login\">
\t<div class=\"content\">
\t\t<form class=\"login-form text-center\" action=\"javascript:void(0);\" method=\"POST\">
\t\t\t<img src=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/img/logo-square.svg\" class=\"center-block mt5 mb5\" height=\"65\">
\t\t\t<h4 class=\"fw400\">Effettua il login</h4>
\t\t\t<p class=\"mb15\">Inserisci le tue credenziali per accedere</p>
\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t<input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Indirizzo email, es. utente@unires.it\">
\t\t\t</div>
\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t<input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Password\">
\t\t\t</div>
\t\t\t<a href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "password-restore-form\" class=\"display-block\">Ho dimenticato la mia password</a>
\t\t\t<button type=\"submit\" class=\"btn btn-info action login mt15\">EFFETTUA L&rsquo;ACCESSO</button>
\t\t</form>
\t</div>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "login.twig";
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
        return array (  67 => 15,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<div class=\"widget login\">
\t<div class=\"content\">
\t\t<form class=\"login-form text-center\" action=\"javascript:void(0);\" method=\"POST\">
\t\t\t<img src=\"{{ theme }}assets/img/logo-square.svg\" class=\"center-block mt5 mb5\" height=\"65\">
\t\t\t<h4 class=\"fw400\">Effettua il login</h4>
\t\t\t<p class=\"mb15\">Inserisci le tue credenziali per accedere</p>
\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t<input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Indirizzo email, es. utente@unires.it\">
\t\t\t</div>
\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t<input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Password\">
\t\t\t</div>
\t\t\t<a href=\"{{ path }}password-restore-form\" class=\"display-block\">Ho dimenticato la mia password</a>
\t\t\t<button type=\"submit\" class=\"btn btn-info action login mt15\">EFFETTUA L&rsquo;ACCESSO</button>
\t\t</form>
\t</div>
</div>
{% endblock content %}", "login.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/login.twig");
    }
}
