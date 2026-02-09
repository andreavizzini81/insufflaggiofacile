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

/* /filters/deals.twig */
class __TwigTemplate_692696604c292c4e9f305111a9dc47b4 extends Template
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
        echo "<form action=\"javascript:void(0);\" method=\"get\" class=\"filter-wrapper\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" name=\"key\" value=\"";
        // line 6
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 6), "key", [], "any", true, true, false, 6) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 6), "key", [], "any", false, false, false, 6)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 6), "key", [], "any", false, false, false, 6), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Ricerca per nominativo...\" autocomplete=\"off\">
        </div>
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Broker/Agenzia</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" name=\"agency_id\">
                        <option value=\"\">Qualsiasi</option>
                        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "authorizedAgencies", [], "any", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["agency"]) {
            // line 18
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 18), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 18), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, false, false, 18), "agency_id", [], "any", false, false, false, 18));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getDescription", [], "method", false, false, false, 18), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Stato richiesta</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Stato richiesta\" name=\"crm_status\">
                        <option value=\"\">Qualsiasi</option>
                        ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "crm_status_list", [], "any", false, false, false, 28));
        foreach ($context['_seq'] as $context["key"] => $context["label"]) {
            // line 29
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["key"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, false, false, 29), "crm_status", [], "any", false, false, false, 29));
            echo ">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Responsabile</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Responsabile\" name=\"responsible_id\">
                        <option value=\"\">Qualsiasi</option>
                        ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getSiblings", [], "method", false, false, false, 39));
        foreach ($context['_seq'] as $context["_key"] => $context["responsible"]) {
            // line 40
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 40), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 40), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, false, false, 40), "responsible_id", [], "any", false, false, false, 40));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getFullName", [], "method", false, false, false, 40), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['responsible'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                    </select>
                </div>
            </div>
        </div>
        <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button>
    </div>
</form>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/filters/deals.twig";
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
        return array (  129 => 42,  116 => 40,  112 => 39,  102 => 31,  89 => 29,  85 => 28,  75 => 20,  62 => 18,  58 => 17,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form action=\"javascript:void(0);\" method=\"get\" class=\"filter-wrapper\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" name=\"key\" value=\"{{ data.filterParams.key ?? '' }}\" placeholder=\"Ricerca per nominativo...\" autocomplete=\"off\">
        </div>
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Broker/Agenzia</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" name=\"agency_id\">
                        <option value=\"\">Qualsiasi</option>
                        {% for agency in data.authorizedAgencies %}
                        <option value=\"{{ agency.getId() }}\" {{ setOption(agency.getId(), data.filterParams.agency_id) }}>{{ agency.getDescription() }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Stato richiesta</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Stato richiesta\" name=\"crm_status\">
                        <option value=\"\">Qualsiasi</option>
                        {% for key, label in data.crm_status_list %}
                        <option value=\"{{ key }}\" {{ setOption(key, data.filterParams.crm_status) }}>{{ label }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Responsabile</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Responsabile\" name=\"responsible_id\">
                        <option value=\"\">Qualsiasi</option>
                        {% for responsible in user.getSiblings() %}
                        <option value=\"{{ responsible.getId() }}\" {{ setOption(responsible.getId(), data.filterParams.responsible_id) }}>{{ responsible.getFullName() }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
        </div>
        <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button>
    </div>
</form>", "/filters/deals.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/filters/deals.twig");
    }
}
