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

/* partials/deal_custom_request.twig */
class __TwigTemplate_5db44509f583c8b11301fc9dba1eefea extends Template
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
    <legend>RICHIESTA PERSONALIZZATA</legend>
    <div class=\"row\">
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Durata</label>
                <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "installments", [], "any", false, false, false, 8), "html", null, true);
        echo "\" readonly>
                    <div class=\"input-group-addon\">mesi</div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Anticipo</label>
                <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatNumber(twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "deposit", [], "any", false, false, false, 17), ["fraction_digit" => 2]), "html", null, true);
        echo "\" readonly>
                    <div class=\"input-group-addon\">&euro;</div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Km inclusi</label>
                <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "mileage", [], "any", false, false, false, 26), "html", null, true);
        echo "\" readonly>
                    <div class=\"input-group-addon\">km</div>
                </div>
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
        return "partials/deal_custom_request.twig";
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
        return array (  70 => 26,  58 => 17,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<fieldset>
    <legend>RICHIESTA PERSONALIZZATA</legend>
    <div class=\"row\">
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Durata</label>
                <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" value=\"{{ request.installments }}\" readonly>
                    <div class=\"input-group-addon\">mesi</div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Anticipo</label>
                <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" value=\"{{ request.deposit|format_number({fraction_digit: 2}) }}\" readonly>
                    <div class=\"input-group-addon\">&euro;</div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"form-group\">
                <label>Km inclusi</label>
                <div class=\"input-group\">
                    <input type=\"text\" class=\"form-control\" value=\"{{ request.mileage }}\" readonly>
                    <div class=\"input-group-addon\">km</div>
                </div>
            </div>
        </div>
    </div>
</fieldset>", "partials/deal_custom_request.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/partials/deal_custom_request.twig");
    }
}
