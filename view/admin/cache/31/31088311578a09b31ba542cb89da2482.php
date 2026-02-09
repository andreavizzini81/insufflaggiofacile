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

/* agency.twig */
class __TwigTemplate_0d04ea192c06a690c1c57fc867aca869 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "agency.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["users"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 3), "getUsers", [], "method", false, false, false, 3);
        // line 4
        echo "
<form class=\"form-horizontal agency-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
    ";
        // line 6
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 6), "getId", [], "method", false, false, false, 6))) {
            // line 7
            echo "    <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 7), "getId", [], "method", false, false, false, 7), "html", null, true);
            echo "\">
    ";
        }
        // line 9
        echo "    <div class=\"tabs\">
        <div class=\"head\">
            <div class=\"tab active\" title=\"Informazioni principali\"></div>
            <div class=\"tab\" title=\"Indirizzi e sedi\"></div>
            <div class=\"tab\" title=\"Amministrazione\"></div>
        </div>
        <div class=\"content\">
            ";
        // line 17
        echo "            <div class=\"tab active\">
                <fieldset>
                    <legend>INFORMAZIONI PRINCIPALI</legend>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Tipologia</label>
                        <div class=\"col-md-2\">
                            <select class=\"form-control\" name=\"type\">
                                ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("Agency::TYPES"));
        foreach ($context['_seq'] as $context["key"] => $context["label"]) {
            // line 25
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["key"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 25), "getType", [], "method", false, false, false, 25));
            echo ">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Descrizione</label>
                        <div class=\"col-md-5\">
                            <input type=\"text\" class=\"form-control\" name=\"description\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 33), "getDescription", [], "method", false, false, false, 33), "html", null, true);
        echo "\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Titolare</label>
                        <div class=\"col-md-4\">
                            <select class=\"form-control\" name=\"holder_user_id\">
                                <option value=\"\">Nessun titolare</option>
                                ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 42
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 42), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 42), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 42), "getHolderUserId", [], "method", false, false, false, 42));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getFirstName", [], "method", false, false, false, 42), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getLastName", [], "method", false, false, false, 42), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Responsabile CRM</label>
                        <div class=\"col-md-4\">
                            <select class=\"form-control\" name=\"default_responsible_id\">
                                <option value=\"\">Nessun responsabile di default</option>
                                ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 53
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 53), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 53), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 53), "getDefaultResponsibleId", [], "method", false, false, false, 53));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getFirstName", [], "method", false, false, false, 53), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getLastName", [], "method", false, false, false, 53), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Sottodominio</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"subdomain\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 61), "getSubdomain", [], "method", false, false, false, 61), "html", null, true);
        echo "\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Telefono</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"fixed_phone\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 67), "getFixedPhone", [], "method", false, false, false, 67), "html", null, true);
        echo "\" required>
                        </div>
                    </div> 
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Mobile</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 73), "getPhone", [], "method", false, false, false, 73), "html", null, true);
        echo "\" required>
                        </div>
                    </div> 
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Indirizzo email</label>
                        <div class=\"col-md-5\">
                            <div class=\"input-group\">
                                <input type=\"email\" class=\"form-control\" name=\"email\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 80), "getEmail", [], "method", false, false, false, 80), "html", null, true);
        echo "\" data-uid=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 80), "getId", [], "method", false, false, false, 80), "html", null, true);
        echo "\" autocomplete=\"off\" role=\"presentation\" required>
                                <div class=\"input-group-addon\">
                                    <span class=\"fas fa-fw\"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Ragione sociale</label>
                        <div class=\"col-md-5\">
                            <input type=\"text\" class=\"form-control\" name=\"business_name\" value=\"";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 90), "getBusinessName", [], "method", false, false, false, 90), "html", null, true);
        echo "\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Partita IVA</label>
                        <div class=\"col-md-3\">
                            <input type=\"text\" class=\"form-control\" name=\"vat_number\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 96), "getVatNumber", [], "method", false, false, false, 96), "html", null, true);
        echo "\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Orario apertura</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"opening_info\" value=\"";
        // line 102
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 102), "getOpeningInfo", [], "method", false, false, false, 102), "html", null, true);
        echo "\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">PEC</label>
                        <div class=\"col-md-5\">
                            <input type=\"text\" class=\"form-control\" name=\"pec\" value=\"";
        // line 108
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 108), "getPec", [], "method", false, false, false, 108), "html", null, true);
        echo "\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Codice SDI</label>
                        <div class=\"col-md-3\">
                            <input type=\"text\" class=\"form-control\" name=\"sdi\" value=\"";
        // line 114
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 114), "getSdi", [], "method", false, false, false, 114), "html", null, true);
        echo "\">
                        </div>
                    </div>
                </fieldset>
            </div>
            ";
        // line 120
        echo "            <div class=\"tab\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <fieldset>
                            <legend>SEDE OPERATIVA</legend>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Indirizzo</label>
                                <div class=\"col-md-9\">
                                    <input type=\"text\" class=\"form-control\" name=\"address\" value=\"";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 128), "getAddress", [], "method", false, false, false, 128), "html", null, true);
        echo "\" required>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Regione</label>
                                <div class=\"col-md-5\">
                                    <select name=\"region\" class=\"form-control agency-region\" data-location-explorer-field=\"region\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 136
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "region", [], "any", false, false, false, 136));
        foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
            // line 137
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["region"], twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 137), "getRegion", [], "method", false, false, false, 137)));
            echo ">";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Provincia</label>
                                <div class=\"col-md-5\">
                                    <select name=\"state\" class=\"form-control agency-state\" data-location-explorer-field=\"state\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "state", [], "any", false, false, false, 147));
        foreach ($context['_seq'] as $context["_key"] => $context["state"]) {
            // line 148
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["state"], "provincia", [], "any", false, false, false, 148), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["state"], "provincia", [], "any", false, false, false, 148), twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 148), "getState", [], "method", false, false, false, 148)));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["state"], "nome_provincia", [], "any", false, false, false, 148), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['state'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Citt&agrave;</label>
                                <div class=\"col-md-9\">
                                    <select name=\"city\" class=\"form-control agency-city\" data-location-explorer-field=\"city\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "city", [], "any", false, false, false, 158));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 159
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["city"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["city"], twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 159), "getCity", [], "method", false, false, false, 159)));
            echo ">";
            echo twig_escape_filter($this->env, $context["city"], "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">CAP</label>
                                <div class=\"col-md-3\">
                                    <select name=\"zipcode\" class=\"form-control agency-zipcode\" data-location-explorer-field=\"zipcode\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 169
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "zipcode", [], "any", false, false, false, 169));
        foreach ($context['_seq'] as $context["_key"] => $context["zipcode"]) {
            // line 170
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["zipcode"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["zipcode"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 170), "getZipcode", [], "method", false, false, false, 170));
            echo ">";
            echo twig_escape_filter($this->env, $context["zipcode"], "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zipcode'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 172
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Latitudine</label>
                                <div class=\"col-md-4\">
                                    <input type=\"text\" class=\"form-control latitude\" name=\"latitude\" value=\"";
        // line 178
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 178), "getLatitude", [], "method", false, false, false, 178), "html", null, true);
        echo "\" readonly>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Longitudine</label>
                                <div class=\"col-md-4\">
                                    <input type=\"text\" class=\"form-control longitude\" name=\"longitude\" value=\"";
        // line 184
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 184), "getLongitude", [], "method", false, false, false, 184), "html", null, true);
        echo "\" readonly>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-3\">Mappa</label>
                                <div class=\"col-md-9\">
                                    <div id=\"map-wrapper\" class=\"agency-map\"></div>   
                                </div>
                            </div>
                        </fieldset>                    
                    </div>
                    <div class=\"col-md-6\">
                        <fieldset>
                            <legend>SEDE LEGALE</legend>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Indirizzo</label>
                                <div class=\"col-md-9\">
                                    <input type=\"text\" class=\"form-control\" name=\"business_address\" value=\"";
        // line 201
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 201), "getBusinessAddress", [], "method", false, false, false, 201), "html", null, true);
        echo "\">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Regione</label>
                                <div class=\"col-md-5\">
                                    <select name=\"business_region\" class=\"form-control agency-business-region\" data-location-explorer-field=\"business_region\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 209
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "region", [], "any", false, false, false, 209));
        foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
            // line 210
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["region"], twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 210), "getBusinessRegion", [], "method", false, false, false, 210)));
            echo ">";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 212
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Provincia</label>
                                <div class=\"col-md-5\">
                                    <select name=\"business_state\" class=\"form-control agency-business-state\" data-location-explorer-field=\"business_state\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 220
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "state", [], "any", false, false, false, 220));
        foreach ($context['_seq'] as $context["_key"] => $context["state"]) {
            // line 221
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["state"], "provincia", [], "any", false, false, false, 221), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["state"], "provincia", [], "any", false, false, false, 221), twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 221), "getBusinessState", [], "method", false, false, false, 221)));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["state"], "nome_provincia", [], "any", false, false, false, 221), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['state'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 223
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Citt&agrave;</label>
                                <div class=\"col-md-9\">
                                    <select name=\"business_city\" class=\"form-control agency-business-city\" data-location-explorer-field=\"business_city\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 231
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "city", [], "any", false, false, false, 231));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 232
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["city"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["city"], twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 232), "getBusinessCity", [], "method", false, false, false, 232)));
            echo ">";
            echo twig_escape_filter($this->env, $context["city"], "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 234
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">CAP</label>
                                <div class=\"col-md-3\">
                                    <select name=\"business_zipcode\" class=\"form-control agency-business-zipcode\" data-location-explorer-field=\"business_zipcode\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        ";
        // line 242
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "zipcode", [], "any", false, false, false, 242));
        foreach ($context['_seq'] as $context["_key"] => $context["zipcode"]) {
            // line 243
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $context["zipcode"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["zipcode"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 243), "getBusinessZipcode", [], "method", false, false, false, 243));
            echo ">";
            echo twig_escape_filter($this->env, $context["zipcode"], "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zipcode'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 245
        echo "                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            ";
        // line 253
        echo "            <div class=\"tab\">
                <fieldset>
                    <legend>PARAMETRI INVIO EMAIL</legend>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Invio abilitata</label>
                        <div class=\"col-md-10\">
                            <div class=\"checkbox\">
                                <label>
                                    <input type=\"checkbox\" name=\"smtp_enabled\" value=\"1\" ";
        // line 261
        echo Utils::setCheckbox(1, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 261), "smtpIsEnabled", [], "method", false, false, false, 261));
        echo "> SI
                                </label>
                                <label>
                                    <input type=\"checkbox\" name=\"smtp_enabled\" value=\"0\" ";
        // line 264
        echo Utils::setCheckbox(0, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 264), "smtpIsEnabled", [], "method", false, false, false, 264));
        echo "> NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Nome utente</label>
                        <div class=\"col-md-3\">
                            <input type=\"text\" class=\"form-control\" value=\"";
        // line 272
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 272), "getSmtpUsername", [], "method", false, false, false, 272), "html", null, true);
        echo "\" name=\"smtp_username\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Password</label>
                        <div class=\"col-md-3\">
                            <div class=\"input-group\">
                                <input type=\"password\" class=\"form-control\" value=\"";
        // line 279
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 279), "getSmtpPassword", [], "method", false, false, false, 279), "html", null, true);
        echo "\" name=\"smtp_password\">
                                <span class=\"input-group-addon toggle-password-visibility\">
                                    <i class=\"fas\"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>ALTRO</legend>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Data creazione</label>
                        <div class=\"col-md-2\">
                            <input type=\"text\" class=\"form-control\" value=\"";
        // line 292
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 292), "getCreatedAt", [], "method", false, false, false, 292))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 292), "getCreatedAt", [], "method", false, false, false, 292), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
        echo "\" readonly>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Data aggiornamento</label>
                        <div class=\"col-md-2\">
                            <input type=\"text\" class=\"form-control\" value=\"";
        // line 298
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 298), "getUpdatedAt", [], "method", false, false, false, 298))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agency", [], "any", false, false, false, 298), "getUpdatedAt", [], "method", false, false, false, 298), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
        echo "\" readonly>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</form>

<script>
   
    document.addEventListener('DOMContentLoaded', function() {

        const _frm = document.querySelector('.agency-form');
        const mapWrapper = document.getElementById('map-wrapper');

        Delegate(document).on('click', '.save-agency', function() {
            let validation = (new FormValidator({alerts: false})).checkAll(_frm);
            if (!validation.valid) {
                let invalidFieldsErrors = [];
                validation.fields.forEach(entry => {
                    let _group = entry.field.closest('.form-group');
                    _group.classList.toggle('has-error', !entry.valid);
                    if (!entry.valid) {
                        let label = _group.querySelector('label.field-descriptor');
                        invalidFieldsErrors.push(`<span class=\"fw400 blackFont\">\${label.textContent}: </span>\${entry.error}`);
                    }
                });
                return new resAlert('Verificare i campi contrassegnati in rosso:', `\${invalidFieldsErrors.join('<br>')}`, {type:'warning'});
            }
            let data = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.post(`\${res.path}agency`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}agency-list`;
            });
        });

        Delegate(document).on('change', 'input[type=\"email\"][data-uid]', validateEmailUniqueness);

        function validateEmailUniqueness(skipOnEmpty = false) {
            let _ctl = document.querySelector('input[type=\"email\"][data-uid]');
            if (skipOnEmpty && _ctl.value.trim() == '') {
                return;
            }
            let _adn = _ctl.nextElementSibling;
            _adn.classList.remove('is-valid', 'is-error');
            _adn.classList.add('loading');
            HttpRequest.post(`\${res.path}agency/validate`, {
                id: _ctl.dataset.uid,
                email: _ctl.value
            }, response => {
                _adn.classList.remove('loading');
                if (response.status != 1) {
                    _adn.classList.add('is-error');
                    _ctl.closest('.form-group').classList.add('has-error');
                    throw response.message ?? 'Errore generico';
                }
                _adn.classList.add('is-valid');
            }, err => void new resAlert('Operazione fallita', err.toString(), {type: 'error'}));
        };
        
        function getGeoCoordsByAddress(params, onSuccess) {
            
        }

        validateEmailUniqueness(true);

        const mapHandler = new AgencyMapHandler(
            mapWrapper, {
                onSelect: (coordinates) => {
                    _frm.latitude.value = coordinates.lat.toFixed(6);
                    _frm.longitude.value = coordinates.lng.toFixed(6);
                }                
            }
        );

        void new AddressExplorer(_frm, {
            onChange: (name, params) => {
                if (name != 'zipcode') {
                    return;
                }
                HttpRequest.post(`\${res.absolutePath}api/address/coordinates`, params, (data, response) => {
                    if (data.status == 1) {
                        mapHandler.setPosition(data.result);
                        _frm.latitude.value = data.result.lat;
                        _frm.longitude.value = data.result.lng;
                    }
                });
            }
        });
        
        void new AddressExplorer(_frm, {
            prefix: 'business'
        });

    });

</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "agency.twig";
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
        return array (  597 => 298,  588 => 292,  572 => 279,  562 => 272,  551 => 264,  545 => 261,  535 => 253,  526 => 245,  513 => 243,  509 => 242,  499 => 234,  486 => 232,  482 => 231,  472 => 223,  459 => 221,  455 => 220,  445 => 212,  432 => 210,  428 => 209,  417 => 201,  397 => 184,  388 => 178,  380 => 172,  367 => 170,  363 => 169,  353 => 161,  340 => 159,  336 => 158,  326 => 150,  313 => 148,  309 => 147,  299 => 139,  286 => 137,  282 => 136,  271 => 128,  261 => 120,  253 => 114,  244 => 108,  235 => 102,  226 => 96,  217 => 90,  202 => 80,  192 => 73,  183 => 67,  174 => 61,  166 => 55,  151 => 53,  147 => 52,  137 => 44,  122 => 42,  118 => 41,  107 => 33,  99 => 27,  86 => 25,  82 => 24,  73 => 17,  64 => 9,  58 => 7,  56 => 6,  52 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
{% set users = data.agency.getUsers() %}

<form class=\"form-horizontal agency-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
    {% if data.agency.getId() is not null %}
    <input type=\"hidden\" name=\"id\" value=\"{{ data.agency.getId() }}\">
    {% endif %}
    <div class=\"tabs\">
        <div class=\"head\">
            <div class=\"tab active\" title=\"Informazioni principali\"></div>
            <div class=\"tab\" title=\"Indirizzi e sedi\"></div>
            <div class=\"tab\" title=\"Amministrazione\"></div>
        </div>
        <div class=\"content\">
            {# Informazioni principali #}
            <div class=\"tab active\">
                <fieldset>
                    <legend>INFORMAZIONI PRINCIPALI</legend>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Tipologia</label>
                        <div class=\"col-md-2\">
                            <select class=\"form-control\" name=\"type\">
                                {% for key, label in constant('Agency::TYPES') %}
                                <option value=\"{{ key }}\" {{ setOption(key, data.agency.getType()) }}>{{ label }}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Descrizione</label>
                        <div class=\"col-md-5\">
                            <input type=\"text\" class=\"form-control\" name=\"description\" value=\"{{ data.agency.getDescription() }}\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Titolare</label>
                        <div class=\"col-md-4\">
                            <select class=\"form-control\" name=\"holder_user_id\">
                                <option value=\"\">Nessun titolare</option>
                                {% for user in users %}
                                <option value=\"{{ user.getId() }}\" {{ setOption(user.getId(), data.agency.getHolderUserId()) }}>{{ user.getFirstName() }} {{ user.getLastName() }}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Responsabile CRM</label>
                        <div class=\"col-md-4\">
                            <select class=\"form-control\" name=\"default_responsible_id\">
                                <option value=\"\">Nessun responsabile di default</option>
                                {% for user in users %}
                                <option value=\"{{ user.getId() }}\" {{ setOption(user.getId(), data.agency.getDefaultResponsibleId()) }}>{{ user.getFirstName() }} {{ user.getLastName() }}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Sottodominio</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"subdomain\" value=\"{{ data.agency.getSubdomain() }}\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Telefono</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"fixed_phone\" value=\"{{ data.agency.getFixedPhone() }}\" required>
                        </div>
                    </div> 
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Mobile</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"{{ data.agency.getPhone() }}\" required>
                        </div>
                    </div> 
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Indirizzo email</label>
                        <div class=\"col-md-5\">
                            <div class=\"input-group\">
                                <input type=\"email\" class=\"form-control\" name=\"email\" value=\"{{ data.agency.getEmail() }}\" data-uid=\"{{ data.agency.getId() }}\" autocomplete=\"off\" role=\"presentation\" required>
                                <div class=\"input-group-addon\">
                                    <span class=\"fas fa-fw\"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Ragione sociale</label>
                        <div class=\"col-md-5\">
                            <input type=\"text\" class=\"form-control\" name=\"business_name\" value=\"{{ data.agency.getBusinessName() }}\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Partita IVA</label>
                        <div class=\"col-md-3\">
                            <input type=\"text\" class=\"form-control\" name=\"vat_number\" value=\"{{ data.agency.getVatNumber() }}\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Orario apertura</label>
                        <div class=\"col-md-4\">
                            <input type=\"text\" class=\"form-control\" name=\"opening_info\" value=\"{{ data.agency.getOpeningInfo() }}\" required>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">PEC</label>
                        <div class=\"col-md-5\">
                            <input type=\"text\" class=\"form-control\" name=\"pec\" value=\"{{ data.agency.getPec() }}\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Codice SDI</label>
                        <div class=\"col-md-3\">
                            <input type=\"text\" class=\"form-control\" name=\"sdi\" value=\"{{ data.agency.getSdi() }}\">
                        </div>
                    </div>
                </fieldset>
            </div>
            {# Indirizzi e sedi #}
            <div class=\"tab\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <fieldset>
                            <legend>SEDE OPERATIVA</legend>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Indirizzo</label>
                                <div class=\"col-md-9\">
                                    <input type=\"text\" class=\"form-control\" name=\"address\" value=\"{{ data.agency.getAddress() }}\" required>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Regione</label>
                                <div class=\"col-md-5\">
                                    <select name=\"region\" class=\"form-control agency-region\" data-location-explorer-field=\"region\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for region in data.region %}
                                        <option value=\"{{ region }}\" {{ setOption(region, data.agency.getRegion()|upper)  }}>{{ region }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Provincia</label>
                                <div class=\"col-md-5\">
                                    <select name=\"state\" class=\"form-control agency-state\" data-location-explorer-field=\"state\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for state in data.state %}
                                        <option value=\"{{ state.provincia }}\" {{ setOption(state.provincia, data.agency.getState()|upper)  }}>{{ state.nome_provincia }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Citt&agrave;</label>
                                <div class=\"col-md-9\">
                                    <select name=\"city\" class=\"form-control agency-city\" data-location-explorer-field=\"city\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for city in data.city %}
                                        <option value=\"{{ city }}\" {{ setOption(city, data.agency.getCity()|upper)  }}>{{ city }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">CAP</label>
                                <div class=\"col-md-3\">
                                    <select name=\"zipcode\" class=\"form-control agency-zipcode\" data-location-explorer-field=\"zipcode\" required>
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for zipcode in data.zipcode %}
                                        <option value=\"{{ zipcode }}\" {{ setOption(zipcode, data.agency.getZipcode()) }}>{{ zipcode }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Latitudine</label>
                                <div class=\"col-md-4\">
                                    <input type=\"text\" class=\"form-control latitude\" name=\"latitude\" value=\"{{ data.agency.getLatitude() }}\" readonly>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Longitudine</label>
                                <div class=\"col-md-4\">
                                    <input type=\"text\" class=\"form-control longitude\" name=\"longitude\" value=\"{{ data.agency.getLongitude() }}\" readonly>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label col-md-3\">Mappa</label>
                                <div class=\"col-md-9\">
                                    <div id=\"map-wrapper\" class=\"agency-map\"></div>   
                                </div>
                            </div>
                        </fieldset>                    
                    </div>
                    <div class=\"col-md-6\">
                        <fieldset>
                            <legend>SEDE LEGALE</legend>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Indirizzo</label>
                                <div class=\"col-md-9\">
                                    <input type=\"text\" class=\"form-control\" name=\"business_address\" value=\"{{ data.agency.getBusinessAddress() }}\">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Regione</label>
                                <div class=\"col-md-5\">
                                    <select name=\"business_region\" class=\"form-control agency-business-region\" data-location-explorer-field=\"business_region\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for region in data.region %}
                                        <option value=\"{{ region }}\" {{ setOption(region, data.agency.getBusinessRegion()|upper)  }}>{{ region }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Provincia</label>
                                <div class=\"col-md-5\">
                                    <select name=\"business_state\" class=\"form-control agency-business-state\" data-location-explorer-field=\"business_state\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for state in data.state %}
                                        <option value=\"{{ state.provincia }}\" {{ setOption(state.provincia, data.agency.getBusinessState()|upper)  }}>{{ state.nome_provincia }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">Citt&agrave;</label>
                                <div class=\"col-md-9\">
                                    <select name=\"business_city\" class=\"form-control agency-business-city\" data-location-explorer-field=\"business_city\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for city in data.city %}
                                        <option value=\"{{ city }}\" {{ setOption(city, data.agency.getBusinessCity()|upper)  }}>{{ city }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label class=\"control-label field-descriptor col-md-3\">CAP</label>
                                <div class=\"col-md-3\">
                                    <select name=\"business_zipcode\" class=\"form-control agency-business-zipcode\" data-location-explorer-field=\"business_zipcode\">
                                        <option value=\"\">Seleziona un'opzione...</option>
                                        {% for zipcode in data.zipcode %}
                                        <option value=\"{{ zipcode }}\" {{ setOption(zipcode, data.agency.getBusinessZipcode()) }}>{{ zipcode }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            {# Amministrazione #}
            <div class=\"tab\">
                <fieldset>
                    <legend>PARAMETRI INVIO EMAIL</legend>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-2\">Invio abilitata</label>
                        <div class=\"col-md-10\">
                            <div class=\"checkbox\">
                                <label>
                                    <input type=\"checkbox\" name=\"smtp_enabled\" value=\"1\" {{ setCheckbox(1, data.agency.smtpIsEnabled()) }}> SI
                                </label>
                                <label>
                                    <input type=\"checkbox\" name=\"smtp_enabled\" value=\"0\" {{ setCheckbox(0, data.agency.smtpIsEnabled()) }}> NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Nome utente</label>
                        <div class=\"col-md-3\">
                            <input type=\"text\" class=\"form-control\" value=\"{{ data.agency.getSmtpUsername() }}\" name=\"smtp_username\">
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Password</label>
                        <div class=\"col-md-3\">
                            <div class=\"input-group\">
                                <input type=\"password\" class=\"form-control\" value=\"{{ data.agency.getSmtpPassword() }}\" name=\"smtp_password\">
                                <span class=\"input-group-addon toggle-password-visibility\">
                                    <i class=\"fas\"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>ALTRO</legend>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Data creazione</label>
                        <div class=\"col-md-2\">
                            <input type=\"text\" class=\"form-control\" value=\"{{ data.agency.getCreatedAt() is not null ? data.agency.getCreatedAt()|date('d/m/Y H:i:s') : '' }}\" readonly>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label field-descriptor col-md-2\">Data aggiornamento</label>
                        <div class=\"col-md-2\">
                            <input type=\"text\" class=\"form-control\" value=\"{{ data.agency.getUpdatedAt() is not null ? data.agency.getUpdatedAt()|date('d/m/Y H:i:s') : '' }}\" readonly>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</form>

<script>
   
    document.addEventListener('DOMContentLoaded', function() {

        const _frm = document.querySelector('.agency-form');
        const mapWrapper = document.getElementById('map-wrapper');

        Delegate(document).on('click', '.save-agency', function() {
            let validation = (new FormValidator({alerts: false})).checkAll(_frm);
            if (!validation.valid) {
                let invalidFieldsErrors = [];
                validation.fields.forEach(entry => {
                    let _group = entry.field.closest('.form-group');
                    _group.classList.toggle('has-error', !entry.valid);
                    if (!entry.valid) {
                        let label = _group.querySelector('label.field-descriptor');
                        invalidFieldsErrors.push(`<span class=\"fw400 blackFont\">\${label.textContent}: </span>\${entry.error}`);
                    }
                });
                return new resAlert('Verificare i campi contrassegnati in rosso:', `\${invalidFieldsErrors.join('<br>')}`, {type:'warning'});
            }
            let data = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.post(`\${res.path}agency`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}agency-list`;
            });
        });

        Delegate(document).on('change', 'input[type=\"email\"][data-uid]', validateEmailUniqueness);

        function validateEmailUniqueness(skipOnEmpty = false) {
            let _ctl = document.querySelector('input[type=\"email\"][data-uid]');
            if (skipOnEmpty && _ctl.value.trim() == '') {
                return;
            }
            let _adn = _ctl.nextElementSibling;
            _adn.classList.remove('is-valid', 'is-error');
            _adn.classList.add('loading');
            HttpRequest.post(`\${res.path}agency/validate`, {
                id: _ctl.dataset.uid,
                email: _ctl.value
            }, response => {
                _adn.classList.remove('loading');
                if (response.status != 1) {
                    _adn.classList.add('is-error');
                    _ctl.closest('.form-group').classList.add('has-error');
                    throw response.message ?? 'Errore generico';
                }
                _adn.classList.add('is-valid');
            }, err => void new resAlert('Operazione fallita', err.toString(), {type: 'error'}));
        };
        
        function getGeoCoordsByAddress(params, onSuccess) {
            
        }

        validateEmailUniqueness(true);

        const mapHandler = new AgencyMapHandler(
            mapWrapper, {
                onSelect: (coordinates) => {
                    _frm.latitude.value = coordinates.lat.toFixed(6);
                    _frm.longitude.value = coordinates.lng.toFixed(6);
                }                
            }
        );

        void new AddressExplorer(_frm, {
            onChange: (name, params) => {
                if (name != 'zipcode') {
                    return;
                }
                HttpRequest.post(`\${res.absolutePath}api/address/coordinates`, params, (data, response) => {
                    if (data.status == 1) {
                        mapHandler.setPosition(data.result);
                        _frm.latitude.value = data.result.lat;
                        _frm.longitude.value = data.result.lng;
                    }
                });
            }
        });
        
        void new AddressExplorer(_frm, {
            prefix: 'business'
        });

    });

</script>
{% endblock content %}", "agency.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/agency.twig");
    }
}
