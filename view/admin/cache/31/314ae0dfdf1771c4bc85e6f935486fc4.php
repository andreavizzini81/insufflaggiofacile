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

/* user.twig */
class __TwigTemplate_425a85c498f6ae0a685b28a00dd630e5 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "user.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal user-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            ";
        // line 6
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 6), "getId", [], "method", false, false, false, 6))) {
            // line 7
            echo "            <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 7), "getId", [], "method", false, false, false, 7), "html", null, true);
            echo "\">
            ";
        }
        // line 9
        echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>INFORMAZIONI PRINCIPALI</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Ruolo</label>
                            <div class=\"col-md-5\">
                                <select class=\"form-control\" name=\"role_id\">
                                    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("User::ROLES"));
        foreach ($context['_seq'] as $context["roleId"] => $context["roleName"]) {
            // line 18
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $context["roleId"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["roleId"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 18), "getRoleId", [], "method", false, false, false, 18));
            echo ">";
            echo twig_escape_filter($this->env, $context["roleName"], "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['roleId'], $context['roleName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Ruolo sito web</label>
                            <div class=\"col-md-5\">
                                <select class=\"form-control\" name=\"website_role_id\">
                                    <option>Nessun ruolo</option>
                                    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("User::WEBSITE_ROLES"));
        foreach ($context['_seq'] as $context["roleId"] => $context["roleName"]) {
            // line 29
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $context["roleId"], "html", null, true);
            echo "\" ";
            echo Utils::setOption($context["roleId"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 29), "getWebsiteRoleId", [], "method", false, false, false, 29));
            echo ">";
            echo twig_escape_filter($this->env, $context["roleName"], "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['roleId'], $context['roleName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Nome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"first_name\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 37), "getFirstName", [], "method", false, false, false, 37), "html", null, true);
        echo "\" required>
                            </div>
                        </div>     
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Cognome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"last_name\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 43), "getLastName", [], "method", false, false, false, 43), "html", null, true);
        echo "\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Ragione sociale</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"business_name\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 49), "getBusinessName", [], "method", false, false, false, 49), "html", null, true);
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Telefono</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 55), "getPhone", [], "method", false, false, false, 55), "html", null, true);
        echo "\" required>
                            </div>
                        </div> 
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Indirizzo email</label>
                            <div class=\"col-md-9\">
                                <div class=\"input-group\">
                                    <input type=\"email\" class=\"form-control\" name=\"email\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 62), "getEmail", [], "method", false, false, false, 62), "html", null, true);
        echo "\" data-uid=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 62), "id", [], "any", false, false, false, 62), "html", null, true);
        echo "\" autocomplete=\"off\" role=\"presentation\" required>
                                    <div class=\"input-group-addon\">
                                        <span class=\"fas fa-fw\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Password</label>
                            <div class=\"col-md-8\">
                                <div class=\"input-group\">
                                    <input 
                                        type=\"password\" 
                                        class=\"form-control ";
        // line 75
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 75), "hasPassword", [], "method", false, false, false, 75)) {
            echo "optional";
        }
        echo "\" 
                                        name=\"password\" 
                                        placeholder=\"Lasciare vuoto per non modificare la password corrente...\" 
                                        autocomplete=\"new-password\" 
                                        pattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\"
                                        ";
        // line 80
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 80), "hasPassword", [], "method", false, false, false, 80)) {
            echo "required";
        }
        // line 81
        echo "                                    >
                                    <div class=\"input-group-addon accentFont cursor-pointer password-strength-info\" title=\"Visualizza come creare la password\">
                                        <span class=\"fad fa-info fa-fw\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Conferma password</label>
                            <div class=\"col-md-8\">
                                <input 
                                    type=\"password\" 
                                    class=\"form-control ";
        // line 93
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 93), "hasPassword", [], "method", false, false, false, 93)) {
            echo "optional";
        }
        echo "\" 
                                    name=\"password_confirm\" 
                                    data-validate-linked=\"password\" 
                                    pattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\" 
                                    ";
        // line 97
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 97), "hasPassword", [], "method", false, false, false, 97)) {
            echo "required";
        }
        // line 98
        echo "                                >
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>ACCESSO E PERMESSI</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Stato</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"is_active\" value=\"1\" ";
        // line 111
        echo Utils::setCheckbox(1, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 111), "getIsActive", [], "method", false, false, false, 111));
        echo "> ATTIVO
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"is_active\" value=\"0\" ";
        // line 114
        echo Utils::setCheckbox(0, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 114), "getIsActive", [], "method", false, false, false, 114));
        echo "> NON ATTIVO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Inserimento offerte</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"can_insert_offers\" value=\"1\" ";
        // line 124
        echo Utils::setCheckbox(1, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 124), "getCanInsertOffers", [], "method", false, false, false, 124));
        echo "> ABILITATO
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"can_insert_offers\" value=\"0\" ";
        // line 127
        echo Utils::setCheckbox(0, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 127), "getCanInsertOffers", [], "method", false, false, false, 127));
        echo "> NON ABILITATO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Data scadenza abbonamento</label>
                            <div class=\"col-md-6\">
                                <input 
                                    type=\"text\" 
                                    name=\"subscription_expiration\" 
                                    class=\"form-control dtpicker\"
                                    value=\"";
        // line 139
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 139), "getSubscriptionExpiration", [], "method", false, false, false, 139))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 139), "getSubscriptionExpiration", [], "method", false, false, false, 139), "d/m/Y"), "html", null, true))) : (print ("")));
        echo "\"
                                    required
                                >
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Agenzia di riferimento</label>
                            <div class=\"col-md-5\">
                                <select class=\"form-control\" name=\"default_agency_id\">
                                    <option value=\"\">Nessuna agenzia di riferimento</option>
                                    ";
        // line 149
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agencyList", [], "any", false, false, false, 149));
        foreach ($context['_seq'] as $context["_key"] => $context["agency"]) {
            // line 150
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 150), "html", null, true);
            echo "\" ";
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 150), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 150), "getDefaultAgencyId", [], "method", false, false, false, 150));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getDescription", [], "method", false, false, false, 150), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        echo "                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Agenzie assegnate</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox multiple\">
                                    ";
        // line 159
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agencyList", [], "any", false, false, false, 159));
        foreach ($context['_seq'] as $context["_key"] => $context["agency"]) {
            // line 160
            echo "                                    <label class=\"mb10\">
                                        <input 
                                            type=\"checkbox\" 
                                            name=\"authorized_agency_id[]\" 
                                            value=\"";
            // line 164
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 164), "html", null, true);
            echo "\" 
                                            ";
            // line 165
            echo Utils::flagInArray(twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 165), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 165), "getAuthorizedAgenciesId", [], "method", false, false, false, 165), "checked");
            echo "
                                        >";
            // line 166
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getDescription", [], "method", false, false, false, 166), "html", null, true);
            echo "
                                    </label>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        echo "                                    
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Data creazione</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" 
                                value=\"";
        // line 176
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 176), "getCreatedAt", [], "method", false, false, false, 176))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 176), "getCreatedAt", [], "method", false, false, false, 176), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
        echo "\" readonly>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Data aggiornamento</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" 
                                value=\"";
        // line 183
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 183), "getUpdatedAt", [], "method", false, false, false, 183))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "user", [], "any", false, false, false, 183), "getUpdatedAt", [], "method", false, false, false, 183), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
        echo "\" readonly>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-user', function() {
            let _frm = document.querySelector('.user-form');
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
            HttpRequest.post(`\${res.path}user`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}user-list`;
            });
        });

        Delegate(document).on('change', 'select[name=\"default_agency_id\"]', function() {
            const checkbox = document.querySelector(`input[name=\"authorized_agency_id[]\"][value=\"\${this.value}\"]`);
            if (!checkbox) { return; }
            checkbox.checked = true;
        });

        function validateEmailUniqueness(skipOnEmpty = false) {
            let _ctl = document.querySelector('input[type=\"email\"][data-uid]');
            if (skipOnEmpty && _ctl.value.trim() == '') {
                return;
            }
            let _adn = _ctl.nextElementSibling;
            _adn.classList.remove('is-valid', 'is-error');
            _adn.classList.add('loading');
            HttpRequest.post(`\${res.path}user/validate`, {
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
        }      

        Delegate(document).on('change', 'input[type=\"email\"][data-uid]', validateEmailUniqueness);

        validateEmailUniqueness(true);
    });


</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "user.twig";
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
        return array (  362 => 183,  352 => 176,  342 => 168,  333 => 166,  329 => 165,  325 => 164,  319 => 160,  315 => 159,  306 => 152,  293 => 150,  289 => 149,  276 => 139,  261 => 127,  255 => 124,  242 => 114,  236 => 111,  221 => 98,  217 => 97,  208 => 93,  194 => 81,  190 => 80,  180 => 75,  162 => 62,  152 => 55,  143 => 49,  134 => 43,  125 => 37,  117 => 31,  104 => 29,  100 => 28,  90 => 20,  77 => 18,  73 => 17,  63 => 9,  57 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal user-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            {% if data.user.getId() is not null %}
            <input type=\"hidden\" name=\"id\" value=\"{{ data.user.getId() }}\">
            {% endif %}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>INFORMAZIONI PRINCIPALI</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Ruolo</label>
                            <div class=\"col-md-5\">
                                <select class=\"form-control\" name=\"role_id\">
                                    {% for roleId, roleName in constant('User::ROLES') %}
                                    <option value=\"{{ roleId }}\" {{ setOption(roleId, data.user.getRoleId()) }}>{{ roleName }}</option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Ruolo sito web</label>
                            <div class=\"col-md-5\">
                                <select class=\"form-control\" name=\"website_role_id\">
                                    <option>Nessun ruolo</option>
                                    {% for roleId, roleName in constant('User::WEBSITE_ROLES') %}
                                    <option value=\"{{ roleId }}\" {{ setOption(roleId, data.user.getWebsiteRoleId()) }}>{{ roleName }}</option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Nome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"first_name\" value=\"{{ data.user.getFirstName() }}\" required>
                            </div>
                        </div>     
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Cognome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"last_name\" value=\"{{ data.user.getLastName() }}\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Ragione sociale</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"business_name\" value=\"{{ data.user.getBusinessName() }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Telefono</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"{{ data.user.getPhone() }}\" required>
                            </div>
                        </div> 
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Indirizzo email</label>
                            <div class=\"col-md-9\">
                                <div class=\"input-group\">
                                    <input type=\"email\" class=\"form-control\" name=\"email\" value=\"{{ data.user.getEmail() }}\" data-uid=\"{{ data.user.id }}\" autocomplete=\"off\" role=\"presentation\" required>
                                    <div class=\"input-group-addon\">
                                        <span class=\"fas fa-fw\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Password</label>
                            <div class=\"col-md-8\">
                                <div class=\"input-group\">
                                    <input 
                                        type=\"password\" 
                                        class=\"form-control {% if data.user.hasPassword() %}optional{% endif %}\" 
                                        name=\"password\" 
                                        placeholder=\"Lasciare vuoto per non modificare la password corrente...\" 
                                        autocomplete=\"new-password\" 
                                        pattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\"
                                        {% if not data.user.hasPassword() %}required{% endif %}
                                    >
                                    <div class=\"input-group-addon accentFont cursor-pointer password-strength-info\" title=\"Visualizza come creare la password\">
                                        <span class=\"fad fa-info fa-fw\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Conferma password</label>
                            <div class=\"col-md-8\">
                                <input 
                                    type=\"password\" 
                                    class=\"form-control {% if data.user.hasPassword() %}optional{% endif %}\" 
                                    name=\"password_confirm\" 
                                    data-validate-linked=\"password\" 
                                    pattern=\"^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@\$!%*?&])[A-Za-z\\d@\$!%*?&]{8,}\$\" 
                                    {% if not data.user.hasPassword() %}required{% endif %}
                                >
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>ACCESSO E PERMESSI</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Stato</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"is_active\" value=\"1\" {{ setCheckbox(1, data.user.getIsActive()) }}> ATTIVO
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"is_active\" value=\"0\" {{ setCheckbox(0, data.user.getIsActive()) }}> NON ATTIVO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Inserimento offerte</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"can_insert_offers\" value=\"1\" {{ setCheckbox(1, data.user.getCanInsertOffers()) }}> ABILITATO
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"can_insert_offers\" value=\"0\" {{ setCheckbox(0, data.user.getCanInsertOffers()) }}> NON ABILITATO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Data scadenza abbonamento</label>
                            <div class=\"col-md-6\">
                                <input 
                                    type=\"text\" 
                                    name=\"subscription_expiration\" 
                                    class=\"form-control dtpicker\"
                                    value=\"{{ data.user.getSubscriptionExpiration() is not null ? data.user.getSubscriptionExpiration()|date('d/m/Y') : '' }}\"
                                    required
                                >
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Agenzia di riferimento</label>
                            <div class=\"col-md-5\">
                                <select class=\"form-control\" name=\"default_agency_id\">
                                    <option value=\"\">Nessuna agenzia di riferimento</option>
                                    {% for agency in data.agencyList %}
                                    <option value=\"{{ agency.getId() }}\" {{ setOption(agency.getId(), data.user.getDefaultAgencyId()) }}>{{ agency.getDescription() }}</option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Agenzie assegnate</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox multiple\">
                                    {% for agency in data.agencyList %}
                                    <label class=\"mb10\">
                                        <input 
                                            type=\"checkbox\" 
                                            name=\"authorized_agency_id[]\" 
                                            value=\"{{ agency.getId() }}\" 
                                            {{ flagInArray(agency.getId(), data.user.getAuthorizedAgenciesId(), 'checked') }}
                                        >{{ agency.getDescription() }}
                                    </label>
                                    {% endfor %}                                    
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Data creazione</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" 
                                value=\"{{ data.user.getCreatedAt() is not null ? data.user.getCreatedAt()|date('d/m/Y H:i:s') : '' }}\" readonly>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label field-descriptor col-md-3\">Data aggiornamento</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" 
                                value=\"{{ data.user.getUpdatedAt() is not null ? data.user.getUpdatedAt()|date('d/m/Y H:i:s') : '' }}\" readonly>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-user', function() {
            let _frm = document.querySelector('.user-form');
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
            HttpRequest.post(`\${res.path}user`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}user-list`;
            });
        });

        Delegate(document).on('change', 'select[name=\"default_agency_id\"]', function() {
            const checkbox = document.querySelector(`input[name=\"authorized_agency_id[]\"][value=\"\${this.value}\"]`);
            if (!checkbox) { return; }
            checkbox.checked = true;
        });

        function validateEmailUniqueness(skipOnEmpty = false) {
            let _ctl = document.querySelector('input[type=\"email\"][data-uid]');
            if (skipOnEmpty && _ctl.value.trim() == '') {
                return;
            }
            let _adn = _ctl.nextElementSibling;
            _adn.classList.remove('is-valid', 'is-error');
            _adn.classList.add('loading');
            HttpRequest.post(`\${res.path}user/validate`, {
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
        }      

        Delegate(document).on('change', 'input[type=\"email\"][data-uid]', validateEmailUniqueness);

        validateEmailUniqueness(true);
    });


</script>
{% endblock content %}", "user.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/user.twig");
    }
}
