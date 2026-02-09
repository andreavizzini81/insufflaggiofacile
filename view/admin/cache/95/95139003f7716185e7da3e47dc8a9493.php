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

/* /partials/lavorazione_controsoffitto.twig */
class __TwigTemplate_b61f182def95fc20559b74b8bb41bc87 extends Template
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
    <h3>Scheda controsoffitto</h3>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Larghezza controsoffitto</label>
        <input type=\"text\" name=\"larghezzaControsoffitto\" class=\"form-control mka-decimal field\" value=\"";
        // line 7
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "larghezzaControsoffitto", [], "any", false, false, false, 7) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "larghezzaControsoffitto", [], "any", false, false, false, 7), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Lunghezza controsoffitto</label>
        <input type=\"text\" name=\"lunghezzaControsoffitto\" class=\"form-control mka-decimal field\" value=\"";
        // line 13
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lunghezzaControsoffitto", [], "any", false, false, false, 13) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lunghezzaControsoffitto", [], "any", false, false, false, 13), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div> 
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"intercapedineControsoffitto\" class=\"form-control mka-decimal field\" value=\"";
        // line 19
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "intercapedineControsoffitto", [], "any", false, false, false, 19) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "intercapedineControsoffitto", [], "any", false, false, false, 19), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 mb-3\">
    <div class=\"form-group\">
        <label>Metri cubi da insufflare nel controsoffitto</label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <button class=\"btn btn-warning btnCalcControsoffitto\" type=\"button\">Calcola</button> 
            </div>
            <input type=\"text\" name=\"metriCubiControsoffitto\" class=\"form-control\" value=\"";
        // line 29
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metriCubiControsoffitto", [], "any", false, false, false, 29) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metriCubiControsoffitto", [], "any", false, false, false, 29), "html", null, true))) : (print ("")));
        echo "\" readonly>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log(\"OK\");
\t\tDelegate(document).on('click', '.btnCalcControsoffitto', function() {
\t\t\tconsole.log(\"BTN\");
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metriCubiControsoffitto\"]');
\t\t\tconst larghezzaControsoffitto = parseFloat(document.querySelector('[name=\"larghezzaControsoffitto\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaControsoffitto = parseFloat(document.querySelector('[name=\"lunghezzaControsoffitto\"]').value.replace(\",\", \".\"));
\t\t\tconst intercapedineControsoffitto = parseFloat(document.querySelector('[name=\"intercapedineControsoffitto\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubiControsoffitto = (larghezzaControsoffitto*lunghezzaControsoffitto*intercapedineControsoffitto).toFixed(2);
            console.log('larghezza-> '+larghezzaControsoffitto);
\t\t\tconsole.log('lunghezza-> '+lunghezzaControsoffitto);
\t\t\tconsole.log('intercapedine-> '+intercapedineControsoffitto);
\t\t\tconsole.log(metriCubiControsoffitto);
\t\t\tmetriCubiOutput.value = metriCubiControsoffitto;
\t\t});

    });
</script>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/lavorazione_controsoffitto.twig";
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
    <h3>Scheda controsoffitto</h3>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Larghezza controsoffitto</label>
        <input type=\"text\" name=\"larghezzaControsoffitto\" class=\"form-control mka-decimal field\" value=\"{{ immobile.larghezzaControsoffitto != '' ? immobile.larghezzaControsoffitto : '' }}\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Lunghezza controsoffitto</label>
        <input type=\"text\" name=\"lunghezzaControsoffitto\" class=\"form-control mka-decimal field\" value=\"{{ immobile.lunghezzaControsoffitto != '' ? immobile.lunghezzaControsoffitto : '' }}\">
    </div>
</div> 
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"intercapedineControsoffitto\" class=\"form-control mka-decimal field\" value=\"{{ immobile.intercapedineControsoffitto != '' ? immobile.intercapedineControsoffitto : '' }}\">
    </div>
</div>
<div class=\"col-12 mb-3\">
    <div class=\"form-group\">
        <label>Metri cubi da insufflare nel controsoffitto</label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <button class=\"btn btn-warning btnCalcControsoffitto\" type=\"button\">Calcola</button> 
            </div>
            <input type=\"text\" name=\"metriCubiControsoffitto\" class=\"form-control\" value=\"{{ immobile.metriCubiControsoffitto != '' ? immobile.metriCubiControsoffitto : '' }}\" readonly>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log(\"OK\");
\t\tDelegate(document).on('click', '.btnCalcControsoffitto', function() {
\t\t\tconsole.log(\"BTN\");
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metriCubiControsoffitto\"]');
\t\t\tconst larghezzaControsoffitto = parseFloat(document.querySelector('[name=\"larghezzaControsoffitto\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaControsoffitto = parseFloat(document.querySelector('[name=\"lunghezzaControsoffitto\"]').value.replace(\",\", \".\"));
\t\t\tconst intercapedineControsoffitto = parseFloat(document.querySelector('[name=\"intercapedineControsoffitto\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubiControsoffitto = (larghezzaControsoffitto*lunghezzaControsoffitto*intercapedineControsoffitto).toFixed(2);
            console.log('larghezza-> '+larghezzaControsoffitto);
\t\t\tconsole.log('lunghezza-> '+lunghezzaControsoffitto);
\t\t\tconsole.log('intercapedine-> '+intercapedineControsoffitto);
\t\t\tconsole.log(metriCubiControsoffitto);
\t\t\tmetriCubiOutput.value = metriCubiControsoffitto;
\t\t});

    });
</script>", "/partials/lavorazione_controsoffitto.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/lavorazione_controsoffitto.twig");
    }
}
