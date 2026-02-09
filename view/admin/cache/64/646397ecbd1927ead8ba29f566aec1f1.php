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

/* /filters/calendar.twig */
class __TwigTemplate_172625183dbd78f84e0c55bbfea2ead8 extends Template
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
        echo "\" placeholder=\"Ricerca per titolo o nota...\" autocomplete=\"off\">
        </div>
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Utente</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control multiselect filter-param\" name=\"user_id[]\" multiple>
                        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getSiblings", [], "method", false, false, false, 16));
        foreach ($context['_seq'] as $context["_key"] => $context["responsible"]) {
            // line 17
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 17), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 17), twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "responsible_id", [], "any", false, false, false, 17));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getFullName", [], "method", false, false, false, 17), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['responsible'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "                    </select>
                </div>
            </div>
        </div>
        <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button>
    </div>
</form> ";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/filters/calendar.twig";
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
        return array (  74 => 19,  61 => 17,  57 => 16,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form action=\"javascript:void(0);\" method=\"get\" class=\"filter-wrapper\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" name=\"key\" value=\"{{ data.filterParams.key ?? '' }}\" placeholder=\"Ricerca per titolo o nota...\" autocomplete=\"off\">
        </div>
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Utente</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control multiselect filter-param\" name=\"user_id[]\" multiple>
                        {% for responsible in user.getSiblings() %}
                        <option value=\"{{ responsible.getId() }}\" {{ setOption(responsible.getId(), data.responsible_id) }}>{{ responsible.getFullName() }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
        </div>
        <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button>
    </div>
</form> ", "/filters/calendar.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/filters/calendar.twig");
    }
}
