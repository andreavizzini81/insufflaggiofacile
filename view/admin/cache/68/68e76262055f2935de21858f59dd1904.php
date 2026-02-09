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

/* password_restore.twig */
class __TwigTemplate_663d46f5913a70e6caaca96b32ece595 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "password_restore.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"widget position-absolute login\">
\t<div class=\"content\">
\t\t<form class=\"password-restore-form text-center\" action=\"javascript:void(0);\" method=\"POST\" novalidate>
\t\t\t<img src=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/img/logo-square.svg\" class=\"center-block mt5 mb30\" height=\"65\">
\t\t\t<h4 class=\"fw400\">Ripristino password</h4>
\t\t\t";
        // line 8
        if ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "step", [], "any", false, false, false, 8) == 1)) {
            echo " 
\t\t\t<p class=\"mb15\">Inserisci l&rsquo;indirizzo email dell&rsquo;account per il quale si vuole ripristinare la password</p>
\t\t\t<div class=\"form-group\">
\t\t\t\t<input type=\"text\" name=\"email\" class=\"form-control\" placeholder=\"Indirizzo email, es. utente@unires.it\">
\t\t\t</div>
\t\t\t<button type=\"submit\" class=\"btn btn-info submit-password-restore mt15\">
\t\t\t\tCONTINUA <span class=\"fad fa-chevron-circle-right\"></span>
\t\t\t</button>
\t\t\t";
        } else {
            // line 17
            echo "\t\t\t<input type=\"hidden\" name=\"token\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "token", [], "any", false, false, false, 17), "html", null, true);
            echo "\">
\t\t\t<p class=\"mb15\">Inserisci la nuova password che desideri impostare. La password deve essere composta da:</p>
\t\t\t<ul class=\"text-left\">
\t\t\t\t<li>almeno un carattere maiuscolo</li>
\t\t\t\t<li>almeno un carattere minuscolo</li>
\t\t\t\t<li>almeno un simbolo fra: @ \$ ! % * ? &</li>
\t\t\t\t<li>almeno un numero</li>
\t\t\t\t<li>almeno 8 caratteri</li>
\t\t\t</ul>
\t\t\t<div class=\"form-group mt15\">
\t\t\t\t<label class=\"field-descriptor hidden\">Nuova password</label>
\t\t\t\t<input 
\t\t\t\t\ttype=\"password\" 
\t\t\t\t\tname=\"new_password\" 
\t\t\t\t\tclass=\"form-control\" 
\t\t\t\t\tplaceholder=\"Nuova password\" 
\t\t\t\t\tpattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\" 
\t\t\t\t\trequired
\t\t\t\t>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"field-descriptor hidden\">Conferma nuova password</label>
\t\t\t\t<input 
\t\t\t\t\ttype=\"password\" 
\t\t\t\t\tname=\"new_password_confirm\" 
\t\t\t\t\tclass=\"form-control\" 
\t\t\t\t\tplaceholder=\"Conferma nuova password\" 
\t\t\t\t\tdata-validate-linked=\"new_password\" 
\t\t\t\t\tpattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\" 
\t\t\t\t\trequired
\t\t\t\t>
\t\t\t</div>
\t\t\t<button type=\"submit\" class=\"btn btn-info submit-new-password mt10\">
\t\t\t\tIMPOSTA NUOVA PASSWORD <span class=\"fad fa-check\"></span>
\t\t\t</button>
\t\t\t";
        }
        // line 53
        echo "\t\t</form>
\t</div>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "password_restore.twig";
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
        return array (  112 => 53,  72 => 17,  60 => 8,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget position-absolute login\">
\t<div class=\"content\">
\t\t<form class=\"password-restore-form text-center\" action=\"javascript:void(0);\" method=\"POST\" novalidate>
\t\t\t<img src=\"{{ theme }}assets/img/logo-square.svg\" class=\"center-block mt5 mb30\" height=\"65\">
\t\t\t<h4 class=\"fw400\">Ripristino password</h4>
\t\t\t{% if (data.step == 1) %} 
\t\t\t<p class=\"mb15\">Inserisci l&rsquo;indirizzo email dell&rsquo;account per il quale si vuole ripristinare la password</p>
\t\t\t<div class=\"form-group\">
\t\t\t\t<input type=\"text\" name=\"email\" class=\"form-control\" placeholder=\"Indirizzo email, es. utente@unires.it\">
\t\t\t</div>
\t\t\t<button type=\"submit\" class=\"btn btn-info submit-password-restore mt15\">
\t\t\t\tCONTINUA <span class=\"fad fa-chevron-circle-right\"></span>
\t\t\t</button>
\t\t\t{% else %}
\t\t\t<input type=\"hidden\" name=\"token\" value=\"{{ data.token }}\">
\t\t\t<p class=\"mb15\">Inserisci la nuova password che desideri impostare. La password deve essere composta da:</p>
\t\t\t<ul class=\"text-left\">
\t\t\t\t<li>almeno un carattere maiuscolo</li>
\t\t\t\t<li>almeno un carattere minuscolo</li>
\t\t\t\t<li>almeno un simbolo fra: @ \$ ! % * ? &</li>
\t\t\t\t<li>almeno un numero</li>
\t\t\t\t<li>almeno 8 caratteri</li>
\t\t\t</ul>
\t\t\t<div class=\"form-group mt15\">
\t\t\t\t<label class=\"field-descriptor hidden\">Nuova password</label>
\t\t\t\t<input 
\t\t\t\t\ttype=\"password\" 
\t\t\t\t\tname=\"new_password\" 
\t\t\t\t\tclass=\"form-control\" 
\t\t\t\t\tplaceholder=\"Nuova password\" 
\t\t\t\t\tpattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\" 
\t\t\t\t\trequired
\t\t\t\t>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"field-descriptor hidden\">Conferma nuova password</label>
\t\t\t\t<input 
\t\t\t\t\ttype=\"password\" 
\t\t\t\t\tname=\"new_password_confirm\" 
\t\t\t\t\tclass=\"form-control\" 
\t\t\t\t\tplaceholder=\"Conferma nuova password\" 
\t\t\t\t\tdata-validate-linked=\"new_password\" 
\t\t\t\t\tpattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\" 
\t\t\t\t\trequired
\t\t\t\t>
\t\t\t</div>
\t\t\t<button type=\"submit\" class=\"btn btn-info submit-new-password mt10\">
\t\t\t\tIMPOSTA NUOVA PASSWORD <span class=\"fad fa-check\"></span>
\t\t\t</button>
\t\t\t{% endif %}
\t\t</form>
\t</div>
</div>
{% endblock %}", "password_restore.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/password_restore.twig");
    }
}
