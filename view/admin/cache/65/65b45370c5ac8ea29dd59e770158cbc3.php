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

/* /filters/vehicle_list.twig */
class __TwigTemplate_fd7e583b084e321d6343fdabd326c88c extends Template
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
        echo "<form action=\"javascript:void(0);\" method=\"get\" class=\"filter-wrapper list-filter-form\" data-action=\"";
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "vehicle-list\">
    <input type=\"hidden\" name=\"page\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination_obj", [], "any", false, false, false, 2), "current", [], "any", false, false, false, 2), "html", null, true);
        echo "\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" name=\"params[key]\" value=\"";
        // line 7
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 7), "key", [], "any", true, true, false, 7) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 7), "key", [], "any", false, false, false, 7)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 7), "key", [], "any", false, false, false, 7), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Ricerca...\" autocomplete=\"off\">
        </div>
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Marca</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control multiselect filter-param\" data-label=\"Marca\" name=\"params[make_id][]\" data-place-holder=\"Tutte le marche\" multiple>
                        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "makeModels", [], "any", false, false, false, 17));
        foreach ($context['_seq'] as $context["makeId"] => $context["makeData"]) {
            // line 18
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["makeId"], "html", null, true);
            echo "\" ";
            echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 18), "make_id", [], "any", true, true, false, 18) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 18), "make_id", [], "any", false, false, false, 18)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 18), "make_id", [], "any", false, false, false, 18)) : ("")), $context["makeId"]);
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["makeData"], "make", [], "any", false, false, false, 18), "description", [], "any", false, false, false, 18), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['makeId'], $context['makeData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Modello</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Modello\" name=\"params[model_id][]\" multiple>
                        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "makeModels", [], "any", false, false, false, 27));
        foreach ($context['_seq'] as $context["makeId"] => $context["makeData"]) {
            // line 28
            echo "                        <optgroup label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["makeData"], "make", [], "any", false, false, false, 28), "description", [], "any", false, false, false, 28), "html", null, true);
            echo "\" data-make-id=\"";
            echo twig_escape_filter($this->env, $context["makeId"], "html", null, true);
            echo "\">
                            ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["makeData"], "models", [], "any", false, false, false, 29));
            foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
                // line 30
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "id", [], "any", false, false, false, 30), "html", null, true);
                echo "\" ";
                echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 30), "model_id", [], "any", true, true, false, 30) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 30), "model_id", [], "any", false, false, false, 30)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 30), "model_id", [], "any", false, false, false, 30)) : ("")), twig_get_attribute($this->env, $this->source, $context["model"], "id", [], "any", false, false, false, 30));
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "description", [], "any", false, false, false, 30), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['model'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "                        </optgroup>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['makeId'], $context['makeData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Extra sconto</label>
                <div class=\"col-md-4\">
                    <select class=\"form-control filter-param\" data-label=\"Extra sconto\" name=\"params[on_sale]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"1\" ";
        // line 42
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 42), "on_sale", [], "any", true, true, false, 42) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 42), "on_sale", [], "any", false, false, false, 42)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 42), "on_sale", [], "any", false, false, false, 42)) : ( -1)), 1);
        echo ">SI</option>
                        <option value=\"0\" ";
        // line 43
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 43), "on_sale", [], "any", true, true, false, 43) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 43), "on_sale", [], "any", false, false, false, 43)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 43), "on_sale", [], "any", false, false, false, 43)) : ( -1)), 0);
        echo ">NO</option>
                    </select>                  
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Pronta cons.</label>
                <div class=\"col-md-4\">
                    <select class=\"form-control filter-param\" data-label=\"Pronta consegna\" name=\"params[in_stock]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"1\" ";
        // line 52
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 52), "in_stock", [], "any", true, true, false, 52) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 52), "in_stock", [], "any", false, false, false, 52)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 52), "in_stock", [], "any", false, false, false, 52)) : ( -1)), 1);
        echo ">SI</option>
                        <option value=\"0\" ";
        // line 53
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 53), "in_stock", [], "any", true, true, false, 53) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 53), "in_stock", [], "any", false, false, false, 53)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 53), "in_stock", [], "any", false, false, false, 53)) : ( -1)), 0);
        echo ">NO</option>
                    </select>                   
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Alimentazione</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control multiselect filter-param\" data-label=\"Alimentazione\" name=\"params[fuel_type][]\" data-select-all=\"1\" data-place-holder=\"Tutte le alimentazioni\" multiple>
                        ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("Definitions::FUEL_TYPE"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 62
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" ";
            echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 62), "fuel_type", [], "any", true, true, false, 62) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 62), "fuel_type", [], "any", false, false, false, 62)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 62), "fuel_type", [], "any", false, false, false, 62)) : ("")), $context["key"]);
            echo ">";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Tipo cambio</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Tipo cambio\" name=\"params[gear_type]\">
                        <option value=\"\">Tutte i tipi di cambio</option>
                        ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("Definitions::GEAR_TYPE"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 73
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" ";
            echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 73), "gear_type", [], "any", true, true, false, 73) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 73), "gear_type", [], "any", false, false, false, 73)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 73), "gear_type", [], "any", false, false, false, 73)) : ("")), $context["key"]);
            echo ">";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Tipo carrozz.</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Tipo carrozz.\" name=\"params[body_type]\">
                        <option value=\"\">Tutte le carrozzerie</option>
                        ";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("Definitions::NORMALIZED_BODY_TYPES"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 84
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" ";
            echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 84), "body_type", [], "any", true, true, false, 84) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 84), "body_type", [], "any", false, false, false, 84)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 84), "body_type", [], "any", false, false, false, 84)) : ("")), $context["key"]);
            echo ">";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Disponibile</label>
                <div class=\"col-md-5\">
                    <select class=\"form-control filter-param\" data-label=\"Disponibile\" name=\"params[active]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"1\" ";
        // line 94
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 94), "active", [], "any", true, true, false, 94) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 94), "active", [], "any", false, false, false, 94)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 94), "active", [], "any", false, false, false, 94)) : ( -1)), 1);
        echo ">SI</option>
                        <option value=\"0\" ";
        // line 95
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 95), "active", [], "any", true, true, false, 95) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 95), "active", [], "any", false, false, false, 95)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 95), "active", [], "any", false, false, false, 95)) : ( -1)), 0);
        echo ">NO</option>
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Importo rata</label>
                <div class=\"col-md-9\">
                    <div class=\"inline-fields\">
                        <input type=\"text\" class=\"form-control numeric filter-param\" data-label=\"Importo rata\" name=\"params[offers_from]\" value=\"";
        // line 103
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 103), "offers_from", [], "any", true, true, false, 103) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 103), "offers_from", [], "any", false, false, false, 103)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 103), "offers_from", [], "any", false, false, false, 103), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Min...\">
                        <input type=\"text\" class=\"form-control numeric filter-param\" data-label=\"Importo rata\" name=\"params[offers_to]\" value=\"";
        // line 104
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 104), "offers_to", [], "any", true, true, false, 104) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 104), "offers_to", [], "any", false, false, false, 104)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 104), "offers_to", [], "any", false, false, false, 104), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Max...\">
                    </div>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Multiselezione</label>
                <div class=\"col-md-6\">
                    <select class=\"form-control filter-param\" data-label=\"Multiselezione\" name=\"params[is_selected]\">
                        <option value=\"\">Qualsiasi stato</option>
                        <option value=\"1\" ";
        // line 113
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 113), "is_selected", [], "any", true, true, false, 113) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 113), "is_selected", [], "any", false, false, false, 113)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 113), "is_selected", [], "any", false, false, false, 113)) : ( -1)), 1);
        echo ">Selezionato</option>
                        <option value=\"0\" ";
        // line 114
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 114), "is_selected", [], "any", true, true, false, 114) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 114), "is_selected", [], "any", false, false, false, 114)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 114), "is_selected", [], "any", false, false, false, 114)) : ( -1)), 0);
        echo ">Non selezionato</option>
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Immagine</label>
                <div class=\"col-md-5\">
                    <select class=\"form-control filter-param\" data-label=\"Immagine\" name=\"params[no_image]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"0\" ";
        // line 123
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 123), "no_image", [], "any", true, true, false, 123) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 123), "no_image", [], "any", false, false, false, 123)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 123), "no_image", [], "any", false, false, false, 123)) : ( -1)), 0);
        echo ">Presente</option>
                        <option value=\"1\" ";
        // line 124
        echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 124), "no_image", [], "any", true, true, false, 124) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 124), "no_image", [], "any", false, false, false, 124)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 124), "no_image", [], "any", false, false, false, 124)) : ( -1)), 1);
        echo ">Assente</option>
                    </select>                   
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Lungh. pagina</label>
                <div class=\"col-md-5\">
                    <select class=\"form-control\" name=\"page_size\">
                        ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page_size", [], "any", false, false, false, 132));
        foreach ($context['_seq'] as $context["_key"] => $context["size"]) {
            // line 133
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $context["size"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["size"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination_obj", [], "any", false, false, false, 133), "size", [], "any", false, false, false, 133));
            echo ">";
            echo twig_escape_filter($this->env, $context["size"], "html", null, true);
            echo " elementi</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['size'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
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
        return "/filters/vehicle_list.twig";
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
        return array (  325 => 135,  312 => 133,  308 => 132,  297 => 124,  293 => 123,  281 => 114,  277 => 113,  265 => 104,  261 => 103,  250 => 95,  246 => 94,  236 => 86,  223 => 84,  219 => 83,  209 => 75,  196 => 73,  192 => 72,  182 => 64,  169 => 62,  165 => 61,  154 => 53,  150 => 52,  138 => 43,  134 => 42,  124 => 34,  117 => 32,  104 => 30,  100 => 29,  93 => 28,  89 => 27,  80 => 20,  67 => 18,  63 => 17,  50 => 7,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form action=\"javascript:void(0);\" method=\"get\" class=\"filter-wrapper list-filter-form\" data-action=\"{{ path }}vehicle-list\">
    <input type=\"hidden\" name=\"page\" value=\"{{ data.pagination_obj.current }}\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" name=\"params[key]\" value=\"{{ data.filterParams.key ?? '' }}\" placeholder=\"Ricerca...\" autocomplete=\"off\">
        </div>
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Marca</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control multiselect filter-param\" data-label=\"Marca\" name=\"params[make_id][]\" data-place-holder=\"Tutte le marche\" multiple>
                        {% for makeId, makeData in data.makeModels %}
                        <option value=\"{{ makeId }}\" {{ setOption(data.filterParams.make_id ?? '', makeId) }}>{{ makeData.make.description }}</option>
                        {% endfor %}
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Modello</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Modello\" name=\"params[model_id][]\" multiple>
                        {% for makeId, makeData in data.makeModels %}
                        <optgroup label=\"{{ makeData.make.description }}\" data-make-id=\"{{ makeId }}\">
                            {% for model in makeData.models %}
                            <option value=\"{{ model.id }}\" {{ setOption(data.filterParams.model_id ?? '', model.id) }}>{{ model.description }}</option>
                            {% endfor %}
                        </optgroup>
                        {% endfor %}
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Extra sconto</label>
                <div class=\"col-md-4\">
                    <select class=\"form-control filter-param\" data-label=\"Extra sconto\" name=\"params[on_sale]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"1\" {{ setOption(data.filterParams.on_sale ?? -1, 1)}}>SI</option>
                        <option value=\"0\" {{ setOption(data.filterParams.on_sale ?? -1, 0)}}>NO</option>
                    </select>                  
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Pronta cons.</label>
                <div class=\"col-md-4\">
                    <select class=\"form-control filter-param\" data-label=\"Pronta consegna\" name=\"params[in_stock]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"1\" {{ setOption(data.filterParams.in_stock ?? -1, 1)}}>SI</option>
                        <option value=\"0\" {{ setOption(data.filterParams.in_stock ?? -1, 0)}}>NO</option>
                    </select>                   
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Alimentazione</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control multiselect filter-param\" data-label=\"Alimentazione\" name=\"params[fuel_type][]\" data-select-all=\"1\" data-place-holder=\"Tutte le alimentazioni\" multiple>
                        {% for key, value in constant('Definitions::FUEL_TYPE')%}
                        <option value=\"{{ key }}\" {{ setOption(data.filterParams.fuel_type ?? '', key) }}>{{ value }}</option>
                        {% endfor %}
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Tipo cambio</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Tipo cambio\" name=\"params[gear_type]\">
                        <option value=\"\">Tutte i tipi di cambio</option>
                        {% for key, value in constant('Definitions::GEAR_TYPE')%}
                        <option value=\"{{ key }}\" {{ setOption(data.filterParams.gear_type ?? '', key) }}>{{ value }}</option>
                        {% endfor %}
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Tipo carrozz.</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param\" data-label=\"Tipo carrozz.\" name=\"params[body_type]\">
                        <option value=\"\">Tutte le carrozzerie</option>
                        {% for key, value in constant('Definitions::NORMALIZED_BODY_TYPES')%}
                        <option value=\"{{ key }}\" {{ setOption(data.filterParams.body_type ?? '', key) }}>{{ value }}</option>
                        {% endfor %}
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Disponibile</label>
                <div class=\"col-md-5\">
                    <select class=\"form-control filter-param\" data-label=\"Disponibile\" name=\"params[active]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"1\" {{ setOption(data.filterParams.active ?? -1, 1)}}>SI</option>
                        <option value=\"0\" {{ setOption(data.filterParams.active ?? -1, 0)}}>NO</option>
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Importo rata</label>
                <div class=\"col-md-9\">
                    <div class=\"inline-fields\">
                        <input type=\"text\" class=\"form-control numeric filter-param\" data-label=\"Importo rata\" name=\"params[offers_from]\" value=\"{{ data.filterParams.offers_from ?? '' }}\" placeholder=\"Min...\">
                        <input type=\"text\" class=\"form-control numeric filter-param\" data-label=\"Importo rata\" name=\"params[offers_to]\" value=\"{{ data.filterParams.offers_to ?? '' }}\" placeholder=\"Max...\">
                    </div>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Multiselezione</label>
                <div class=\"col-md-6\">
                    <select class=\"form-control filter-param\" data-label=\"Multiselezione\" name=\"params[is_selected]\">
                        <option value=\"\">Qualsiasi stato</option>
                        <option value=\"1\" {{ setOption(data.filterParams.is_selected ?? -1, 1)}}>Selezionato</option>
                        <option value=\"0\" {{ setOption(data.filterParams.is_selected ?? -1, 0)}}>Non selezionato</option>
                    </select>                
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Immagine</label>
                <div class=\"col-md-5\">
                    <select class=\"form-control filter-param\" data-label=\"Immagine\" name=\"params[no_image]\">
                        <option value=\"\">Non selezionato</option>
                        <option value=\"0\" {{ setOption(data.filterParams.no_image ?? -1, 0)}}>Presente</option>
                        <option value=\"1\" {{ setOption(data.filterParams.no_image ?? -1, 1)}}>Assente</option>
                    </select>                   
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Lungh. pagina</label>
                <div class=\"col-md-5\">
                    <select class=\"form-control\" name=\"page_size\">
                        {% for size in data.page_size %}
                        <option value=\"{{ size }}\" {{ setOption(size, data.pagination_obj.size)}}>{{ size }} elementi</option>
                        {% endfor %}
                    </select>                   
                </div>  
            </div>
        </div>
        <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button>
    </div>
</form>", "/filters/vehicle_list.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/filters/vehicle_list.twig");
    }
}
