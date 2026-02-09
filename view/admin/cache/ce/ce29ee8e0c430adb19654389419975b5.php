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

/* partials/deal_vehicle.twig */
class __TwigTemplate_103e9100fa2a847f9b325b8f6c8be777 extends Template
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
        echo "<fieldset>
    <legend>
        INFORMAZIONI VEICOLO
        <div class=\"action-group\">
            <a class=\"action\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "vehicle-manager/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vehicle"] ?? null), "id", [], "any", false, false, false, 5), "html", null, true);
        echo "\" target=\"_blank\">VAI ALLA SCHEDA VEICOLO</a>
        </div>        
    </legend>
    <div class=\"row\">
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Marca</label>
                <input type=\"text\" class=\"form-control\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vehicle"] ?? null), "make", [], "any", false, false, false, 12), "html", null, true);
        echo "\" readonly>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Modello</label>
                <input type=\"text\" class=\"form-control\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vehicle"] ?? null), "model", [], "any", false, false, false, 18), "html", null, true);
        echo "\" readonly>
            </div>
        </div>
        <div class=\"col-md-5\">
            <div class=\"form-group\">
                <label>Allestimento</label>
                <input type=\"text\" class=\"form-control\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["vehicle"] ?? null), "variant", [], "any", false, false, false, 24), "html", null, true);
        echo "\" readonly>
            </div>
        </div>
    </div>
</fieldset>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "partials/deal_vehicle.twig";
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
        return array (  73 => 24,  64 => 18,  55 => 12,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<fieldset>
    <legend>
        INFORMAZIONI VEICOLO
        <div class=\"action-group\">
            <a class=\"action\" href=\"{{ path }}vehicle-manager/{{ vehicle.id }}\" target=\"_blank\">VAI ALLA SCHEDA VEICOLO</a>
        </div>        
    </legend>
    <div class=\"row\">
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Marca</label>
                <input type=\"text\" class=\"form-control\" value=\"{{ vehicle.make }}\" readonly>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Modello</label>
                <input type=\"text\" class=\"form-control\" value=\"{{ vehicle.model }}\" readonly>
            </div>
        </div>
        <div class=\"col-md-5\">
            <div class=\"form-group\">
                <label>Allestimento</label>
                <input type=\"text\" class=\"form-control\" value=\"{{ vehicle.variant }}\" readonly>
            </div>
        </div>
    </div>
</fieldset>", "partials/deal_vehicle.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/partials/deal_vehicle.twig");
    }
}
