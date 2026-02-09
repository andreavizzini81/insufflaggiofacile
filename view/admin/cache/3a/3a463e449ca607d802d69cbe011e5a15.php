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

/* /partials/lavorazione_sottotetto.twig */
class __TwigTemplate_81f4e1e2c19d06ad0a857ee3509ac473 extends Template
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
        echo "<div class=\"col-12 my-3 text-light\">
    <h3>Scheda sottotetto</h3>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Larghezza sottotetto</label>
        <input type=\"text\" name=\"larghezzaSottotetto\" class=\"form-control mka-decimal field\" value=\"";
        // line 7
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "larghezzaSottotetto", [], "any", false, false, false, 7) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "larghezzaSottotetto", [], "any", false, false, false, 7), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div> 
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Lunghezza sottotetto</label>
        <input type=\"text\" name=\"lunghezzaSottotetto\" class=\"form-control mka-decimal field\" value=\"";
        // line 13
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lunghezzaSottotetto", [], "any", false, false, false, 13) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lunghezzaSottotetto", [], "any", false, false, false, 13), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"intercapedineSottotetto\" class=\"form-control mka-decimal field\" value=\"";
        // line 19
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "intercapedineSottotetto", [], "any", false, false, false, 19) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "intercapedineSottotetto", [], "any", false, false, false, 19), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 mb-3\">
    <div class=\"form-group\">
        <label>Metri cubi da insufflare nel sottotetto</label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <button class=\"btn btn-warning btnCalcSottotetto\" type=\"button\">Calcola</button>
            </div>
            <input type=\"text\" name=\"metriCubiSottotetto\" class=\"form-control\" value=\"";
        // line 29
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metriCubiSottotetto", [], "any", false, false, false, 29) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metriCubiSottotetto", [], "any", false, false, false, 29), "html", null, true))) : (print ("")));
        echo "\" readonly>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log(\"OK\");
\t\tDelegate(document).on('click', '.btnCalcSottotetto', function() {
\t\t\tconsole.log(\"BTN\");
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metriCubiSottotetto\"]');
\t\t\tconst larghezzaSottotetto = parseFloat(document.querySelector('[name=\"larghezzaSottotetto\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaSottotetto = parseFloat(document.querySelector('[name=\"lunghezzaSottotetto\"]').value.replace(\",\", \".\"));
\t\t\tconst intercapedineSottotetto = parseFloat(document.querySelector('[name=\"intercapedineSottotetto\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubiSottotetto = (larghezzaSottotetto*lunghezzaSottotetto*intercapedineSottotetto).toFixed(2);
            console.log('larghezza-> '+larghezzaSottotetto);
\t\t\tconsole.log('lunghezza-> '+lunghezzaSottotetto);
\t\t\tconsole.log('intercapedine-> '+intercapedineSottotetto);
\t\t\tconsole.log(metriCubiSottotetto);
\t\t\tmetriCubiOutput.value = metriCubiSottotetto;
\t\t});

    });
</script>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/lavorazione_sottotetto.twig";
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
        return array (  76 => 29,  63 => 19,  54 => 13,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"col-12 my-3 text-light\">
    <h3>Scheda sottotetto</h3>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Larghezza sottotetto</label>
        <input type=\"text\" name=\"larghezzaSottotetto\" class=\"form-control mka-decimal field\" value=\"{{ immobile.larghezzaSottotetto != '' ? immobile.larghezzaSottotetto : '' }}\">
    </div>
</div> 
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Lunghezza sottotetto</label>
        <input type=\"text\" name=\"lunghezzaSottotetto\" class=\"form-control mka-decimal field\" value=\"{{ immobile.lunghezzaSottotetto != '' ? immobile.lunghezzaSottotetto : '' }}\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"intercapedineSottotetto\" class=\"form-control mka-decimal field\" value=\"{{ immobile.intercapedineSottotetto != '' ? immobile.intercapedineSottotetto : '' }}\">
    </div>
</div>
<div class=\"col-12 mb-3\">
    <div class=\"form-group\">
        <label>Metri cubi da insufflare nel sottotetto</label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <button class=\"btn btn-warning btnCalcSottotetto\" type=\"button\">Calcola</button>
            </div>
            <input type=\"text\" name=\"metriCubiSottotetto\" class=\"form-control\" value=\"{{ immobile.metriCubiSottotetto != '' ? immobile.metriCubiSottotetto : '' }}\" readonly>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log(\"OK\");
\t\tDelegate(document).on('click', '.btnCalcSottotetto', function() {
\t\t\tconsole.log(\"BTN\");
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metriCubiSottotetto\"]');
\t\t\tconst larghezzaSottotetto = parseFloat(document.querySelector('[name=\"larghezzaSottotetto\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaSottotetto = parseFloat(document.querySelector('[name=\"lunghezzaSottotetto\"]').value.replace(\",\", \".\"));
\t\t\tconst intercapedineSottotetto = parseFloat(document.querySelector('[name=\"intercapedineSottotetto\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubiSottotetto = (larghezzaSottotetto*lunghezzaSottotetto*intercapedineSottotetto).toFixed(2);
            console.log('larghezza-> '+larghezzaSottotetto);
\t\t\tconsole.log('lunghezza-> '+lunghezzaSottotetto);
\t\t\tconsole.log('intercapedine-> '+intercapedineSottotetto);
\t\t\tconsole.log(metriCubiSottotetto);
\t\t\tmetriCubiOutput.value = metriCubiSottotetto;
\t\t});

    });
</script>", "/partials/lavorazione_sottotetto.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/lavorazione_sottotetto.twig");
    }
}
