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

/* rent_offer_params.twig */
class __TwigTemplate_b0cde31df31163099dd2e9c85980b2bb extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "rent_offer_params.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"row\">
    <div class=\"col-md-5\">
        <div class=\"widget\">
            <div class=\"content\">
                <fieldset>
                    <legend>PARAMETRI CALCOLO OFFERTA STANDARD</legend>
                    <div>
                        <form class=\"form-horizontal mt15\">
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Decadimento valore</label>
                                <div class=\"col-md-5\">
                                    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("RentInstallmentCalculator::DECAY_RATE_VALUES"));
        foreach ($context['_seq'] as $context["period"] => $context["percent"]) {
            // line 15
            echo "                                    <div class=\"input-group mb10\">
                                        <input type=\"text\" class=\"form-control\" value=\"";
            // line 16
            echo twig_escape_filter($this->env, $context["percent"], "html", null, true);
            echo "%\" readonly>
                                        <span class=\"input-group-addon\">fino a ";
            // line 17
            echo twig_escape_filter($this->env, $context["period"], "html", null, true);
            echo " mesi</span>
                                    </div>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['period'], $context['percent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Durata noleggio</label>
                                <div class=\"col-md-4\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"duration\" value=\"36\" min=\"6\" readonly>
                                        <span class=\"input-group-addon\">mesi</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Km inclusi</label>
                                <div class=\"col-md-5\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"km_per_year\" value=\"10000\" min=\"1000\" step=\"1000\" readonly>
                                        <span class=\"input-group-addon\">km</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Anticipo</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"deposit\" value=\"0\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">IVA</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"vat\" value=\"22\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Sconto dealer</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"dealer_discount\" value=\"15\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Incidenza servizi</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"services_incidence\" value=\"40\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Tasso d&rsquo;interesse</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"services_incidence\" value=\"8\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "rent_offer_params.twig";
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
        return array (  83 => 20,  74 => 17,  70 => 16,  67 => 15,  63 => 14,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"row\">
    <div class=\"col-md-5\">
        <div class=\"widget\">
            <div class=\"content\">
                <fieldset>
                    <legend>PARAMETRI CALCOLO OFFERTA STANDARD</legend>
                    <div>
                        <form class=\"form-horizontal mt15\">
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Decadimento valore</label>
                                <div class=\"col-md-5\">
                                    {% for period, percent in constant('RentInstallmentCalculator::DECAY_RATE_VALUES') %}
                                    <div class=\"input-group mb10\">
                                        <input type=\"text\" class=\"form-control\" value=\"{{ percent }}%\" readonly>
                                        <span class=\"input-group-addon\">fino a {{ period }} mesi</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Durata noleggio</label>
                                <div class=\"col-md-4\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"duration\" value=\"36\" min=\"6\" readonly>
                                        <span class=\"input-group-addon\">mesi</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Km inclusi</label>
                                <div class=\"col-md-5\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"km_per_year\" value=\"10000\" min=\"1000\" step=\"1000\" readonly>
                                        <span class=\"input-group-addon\">km</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Anticipo</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"deposit\" value=\"0\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">IVA</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"vat\" value=\"22\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Sconto dealer</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"dealer_discount\" value=\"15\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Incidenza servizi</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"services_incidence\" value=\"40\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-4\">Tasso d&rsquo;interesse</label>
                                <div class=\"col-md-3\">
                                    <div class=\"input-group\">
                                        <input type=\"number\" class=\"form-control numeric\" name=\"services_incidence\" value=\"8\" min=\"0\" max=\"100\" readonly>
                                        <span class=\"input-group-addon\">&percnt;</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
{% endblock content %}", "rent_offer_params.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/rent_offer_params.twig");
    }
}
