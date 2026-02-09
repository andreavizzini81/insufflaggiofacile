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

/* contact.twig */
class __TwigTemplate_4b1be2d40048de96c1bb10915f8524f0 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "contact.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal linked-fields contact-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            ";
        // line 6
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 6), "getId", [], "method", false, false, false, 6))) {
            // line 7
            echo "            <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 7), "getId", [], "method", false, false, false, 7), "html", null, true);
            echo "\">
            ";
        }
        // line 9
        echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>INFORMAZIONI PRINCIPALI</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Tipologia</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"contact_type_id\" value=\"0\" data-toggle-group=\"contact-type\" ";
        // line 18
        echo Utils::setCheckbox(0, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 18), "getTypeId", [], "method", false, false, false, 18));
        echo ">Privato
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"contact_type_id\" value=\"1\" data-toggle-group=\"contact-type\" ";
        // line 21
        echo Utils::setCheckbox(1, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 21), "getTypeId", [], "method", false, false, false, 21));
        echo ">Azienda
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Nome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"first_name\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 29), "getFirstName", [], "method", false, false, false, 29), "html", null, true);
        echo "\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\" required>
                            </div>
                        </div>     
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Cognome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"last_name\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 35), "getLastName", [], "method", false, false, false, 35), "html", null, true);
        echo "\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Ragione sociale</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"business_name\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 41), "getBusinessName", [], "method", false, false, false, 41), "html", null, true);
        echo "\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Partita IVA</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"vat_number\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 47), "getVatNumber", [], "method", false, false, false, 47), "html", null, true);
        echo "\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">PEC/SDI</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"pec\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 53), "getPec", [], "method", false, false, false, 53), "html", null, true);
        echo "\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" >
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Referente</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"contact_person\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 59), "getContactPerson", [], "method", false, false, false, 59), "html", null, true);
        echo "\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Indirizzo email</label>
                            <div class=\"col-md-9\">
                                <div class=\"input-group\">
                                    <input type=\"email\" class=\"form-control\" name=\"email\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 66), "getEmail", [], "method", false, false, false, 66), "html", null, true);
        echo "\" data-uid=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 66), "getId", [], "method", false, false, false, 66), "html", null, true);
        echo "\" required>
                                    <div class=\"input-group-addon\">
                                        <span class=\"fas fa-fw\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Telefono</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 76), "getPhone", [], "method", false, false, false, 76), "html", null, true);
        echo "\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Indirizzo</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"address\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 82), "getAddress", [], "method", false, false, false, 82), "html", null, true);
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Citt&agrave;</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"city\" value=\"";
        // line 88
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 88), "getCity", [], "method", false, false, false, 88), "html", null, true);
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">CAP</label>
                            <div class=\"col-md-3\">
                                <input type=\"text\" class=\"form-control\" name=\"zipcode\" value=\"";
        // line 94
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 94), "getZipcode", [], "method", false, false, false, 94), "html", null, true);
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Provincia</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"state\" value=\"";
        // line 100
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 100), "getState", [], "method", false, false, false, 100), "html", null, true);
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Data di nascita</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control dtpicker\" name=\"birth_date\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\"
                                 value=\"";
        // line 107
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 107), "getBirthDate", [], "method", false, false, false, 107))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 107), "getBirthDate", [], "method", false, false, false, 107), "d/m/Y"), "html", null, true))) : (print ("")));
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Luogo di nascita</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control\" name=\"birth_place\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\"
                                 value=\"";
        // line 114
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 114), "getBirthPlace", [], "method", false, false, false, 114), "html", null, true);
        echo "\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Codice fiscale</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control\" name=\"tax_code\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\" value=\"";
        // line 120
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 120), "getTaxCode", [], "method", false, false, false, 120), "html", null, true);
        echo "\">
                            </div>
                        </div>   
                    </fieldset>
                </div>
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>PRIVACY</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Privacy Standard</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_standard\" value=\"1\" ";
        // line 133
        echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 133), "getPrivacyStandard", [], "method", false, false, false, 133));
        echo ">SI
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_standard\" value=\"0\" ";
        // line 136
        echo Utils::setCheckbox(false, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 136), "getPrivacyStandard", [], "method", false, false, false, 136));
        echo ">NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Privacy Marketing</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_marketing\" value=\"1\" ";
        // line 146
        echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 146), "getPrivacyMarketing", [], "method", false, false, false, 146));
        echo ">SI
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_marketing\" value=\"0\" ";
        // line 149
        echo Utils::setCheckbox(false, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 149), "getPrivacyMarketing", [], "method", false, false, false, 149));
        echo ">NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Privacy Analisi</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_analysis\" value=\"1\" ";
        // line 159
        echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 159), "getPrivacyAnalysis", [], "method", false, false, false, 159));
        echo ">SI
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_analysis\" value=\"0\" ";
        // line 162
        echo Utils::setCheckbox(false, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 162), "getPrivacyAnalysis", [], "method", false, false, false, 162));
        echo ">NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">IP registrazione</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" value=\"";
        // line 170
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 170), "getRegistrationIp", [], "method", false, false, false, 170), "html", null, true);
        echo "\" readonly>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Data registrazione</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" name=\"fd\" class=\"form-control\" 
                                value=\"";
        // line 177
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 177), "getCreatedAt", [], "method", false, false, false, 177))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 177), "getCreatedAt", [], "method", false, false, false, 177), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
        echo "\" readonly>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Data aggiornamento</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" 
                                value=\"";
        // line 184
        (( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 184), "getUpdatedAt", [], "method", false, false, false, 184))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 184), "getUpdatedAt", [], "method", false, false, false, 184), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
        echo "\" readonly>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>NOTE CONTATTO</legend>
                        <div class=\"mt10\">
                            <textarea class=\"form-control\" name=\"note\" rows=\"8\">";
        // line 191
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 191), "getNote", [], "method", false, false, false, 191), "html", null, true);
        echo "</textarea>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-contact', function() {
            let _frm = document.querySelector('.contact-form');
            let validation = (new FormValidator({alerts: false})).checkAll(_frm);
            if (!validation.valid) {
                validation.fields.forEach(entry => {
                    entry.field.closest('.form-group').classList.toggle('has-error', !entry.valid);
                });
                return new resAlert('Operazione fallita', 'I campi contrassegnati in rosso sono incompleti o contengono valori non validi.', {type:'error'});
            }
            let data = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.post(`\${res.absolutePath}api/contact`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}contact-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });

        function validateEmailUniqueness(skipOnEmpty = false) {
            let _ctl = document.querySelector('input[type=\"email\"][data-uid]');
            if (skipOnEmpty && _ctl.value.trim() == '') {
                return;
            }
            let _adn = _ctl.nextElementSibling;
            _adn.classList.remove('is-valid', 'is-error');
            _adn.classList.add('loading');
            HttpRequest.post(`\${res.absolutePath}api/contact/validate`, {
                id: _ctl.dataset.uid,
                email: _ctl.value
            }, response => {
                _adn.classList.remove('loading');
                if (response.status != 1) {
                    _adn.classList.add('is-error');
                    _ctl.closest('.form-group').classList.add('has-error');
                    if (response.result.contactId != null) {
                        return resAlert.error('Contatto gi&agrave; registrato', `L&rsquo;indirizzo email inserito risulta gi&agrave; registrato in anagrafica. <a href=\"\${res.path}contact/\${response.result.contactId}\" target=\"_blank\">Fai click qui per visualizzare il contatto.</a>`)
                    }
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
        return "contact.twig";
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
        return array (  327 => 191,  317 => 184,  307 => 177,  297 => 170,  286 => 162,  280 => 159,  267 => 149,  261 => 146,  248 => 136,  242 => 133,  226 => 120,  217 => 114,  207 => 107,  197 => 100,  188 => 94,  179 => 88,  170 => 82,  161 => 76,  146 => 66,  136 => 59,  127 => 53,  118 => 47,  109 => 41,  100 => 35,  91 => 29,  80 => 21,  74 => 18,  63 => 9,  57 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal linked-fields contact-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            {% if data.contact.getId() is not null %}
            <input type=\"hidden\" name=\"id\" value=\"{{ data.contact.getId() }}\">
            {% endif %}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>INFORMAZIONI PRINCIPALI</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Tipologia</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"contact_type_id\" value=\"0\" data-toggle-group=\"contact-type\" {{ setCheckbox(0, data.contact.getTypeId()) }}>Privato
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"contact_type_id\" value=\"1\" data-toggle-group=\"contact-type\" {{ setCheckbox(1, data.contact.getTypeId()) }}>Azienda
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Nome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"first_name\" value=\"{{ data.contact.getFirstName() }}\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\" required>
                            </div>
                        </div>     
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Cognome</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"last_name\" value=\"{{ data.contact.getLastName() }}\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Ragione sociale</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"business_name\" value=\"{{ data.contact.getBusinessName() }}\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Partita IVA</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"vat_number\" value=\"{{ data.contact.getVatNumber() }}\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">PEC/SDI</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"pec\" value=\"{{ data.contact.getPec() }}\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" >
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Referente</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"contact_person\" value=\"{{ data.contact.getContactPerson() }}\" data-toggled-by=\"contact-type\" data-toggled-on=\"1\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Indirizzo email</label>
                            <div class=\"col-md-9\">
                                <div class=\"input-group\">
                                    <input type=\"email\" class=\"form-control\" name=\"email\" value=\"{{ data.contact.getEmail() }}\" data-uid=\"{{ data.contact.getId() }}\" required>
                                    <div class=\"input-group-addon\">
                                        <span class=\"fas fa-fw\"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Telefono</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"{{ data.contact.getPhone() }}\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Indirizzo</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"address\" value=\"{{ data.contact.getAddress() }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Citt&agrave;</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"city\" value=\"{{ data.contact.getCity() }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">CAP</label>
                            <div class=\"col-md-3\">
                                <input type=\"text\" class=\"form-control\" name=\"zipcode\" value=\"{{ data.contact.getZipcode() }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Provincia</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"state\" value=\"{{ data.contact.getState() }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Data di nascita</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control dtpicker\" name=\"birth_date\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\"
                                 value=\"{{ data.contact.getBirthDate() is not null ? data.contact.getBirthDate()|date('d/m/Y') : '' }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Luogo di nascita</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control\" name=\"birth_place\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\"
                                 value=\"{{ data.contact.getBirthPlace() }}\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Codice fiscale</label>
                            <div class=\"col-md-5\">
                                <input type=\"text\" class=\"form-control\" name=\"tax_code\" data-toggled-by=\"contact-type\" data-toggled-on=\"0\" value=\"{{ data.contact.getTaxCode() }}\">
                            </div>
                        </div>   
                    </fieldset>
                </div>
                <div class=\"col-md-6\">
                    <fieldset>
                        <legend>PRIVACY</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Privacy Standard</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_standard\" value=\"1\" {{ setCheckbox(true, data.contact.getPrivacyStandard()) }}>SI
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_standard\" value=\"0\" {{ setCheckbox(false, data.contact.getPrivacyStandard()) }}>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Privacy Marketing</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_marketing\" value=\"1\" {{ setCheckbox(true, data.contact.getPrivacyMarketing()) }}>SI
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_marketing\" value=\"0\" {{ setCheckbox(false, data.contact.getPrivacyMarketing()) }}>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Privacy Analisi</label>
                            <div class=\"col-md-9\">
                                <div class=\"checkbox\">
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_analysis\" value=\"1\" {{ setCheckbox(true, data.contact.getPrivacyAnalysis()) }}>SI
                                    </label>
                                    <label>
                                        <input type=\"checkbox\" name=\"privacy_analysis\" value=\"0\" {{ setCheckbox(false, data.contact.getPrivacyAnalysis()) }}>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">IP registrazione</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" value=\"{{ data.contact.getRegistrationIp() }}\" readonly>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Data registrazione</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" name=\"fd\" class=\"form-control\" 
                                value=\"{{ data.contact.getCreatedAt() is not null ? data.contact.getCreatedAt()|date('d/m/Y H:i:s') : '' }}\" readonly>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Data aggiornamento</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" 
                                value=\"{{ data.contact.getUpdatedAt() is not null ? data.contact.getUpdatedAt()|date('d/m/Y H:i:s') : '' }}\" readonly>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>NOTE CONTATTO</legend>
                        <div class=\"mt10\">
                            <textarea class=\"form-control\" name=\"note\" rows=\"8\">{{ data.contact.getNote() }}</textarea>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-contact', function() {
            let _frm = document.querySelector('.contact-form');
            let validation = (new FormValidator({alerts: false})).checkAll(_frm);
            if (!validation.valid) {
                validation.fields.forEach(entry => {
                    entry.field.closest('.form-group').classList.toggle('has-error', !entry.valid);
                });
                return new resAlert('Operazione fallita', 'I campi contrassegnati in rosso sono incompleti o contengono valori non validi.', {type:'error'});
            }
            let data = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.post(`\${res.absolutePath}api/contact`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}contact-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });

        function validateEmailUniqueness(skipOnEmpty = false) {
            let _ctl = document.querySelector('input[type=\"email\"][data-uid]');
            if (skipOnEmpty && _ctl.value.trim() == '') {
                return;
            }
            let _adn = _ctl.nextElementSibling;
            _adn.classList.remove('is-valid', 'is-error');
            _adn.classList.add('loading');
            HttpRequest.post(`\${res.absolutePath}api/contact/validate`, {
                id: _ctl.dataset.uid,
                email: _ctl.value
            }, response => {
                _adn.classList.remove('loading');
                if (response.status != 1) {
                    _adn.classList.add('is-error');
                    _ctl.closest('.form-group').classList.add('has-error');
                    if (response.result.contactId != null) {
                        return resAlert.error('Contatto gi&agrave; registrato', `L&rsquo;indirizzo email inserito risulta gi&agrave; registrato in anagrafica. <a href=\"\${res.path}contact/\${response.result.contactId}\" target=\"_blank\">Fai click qui per visualizzare il contatto.</a>`)
                    }
                    throw response.message ?? 'Errore generico';
                }
                _adn.classList.add('is-valid');
            }, err => void new resAlert('Operazione fallita', err.toString(), {type: 'error'}));
        }      

        Delegate(document).on('change', 'input[type=\"email\"][data-uid]', validateEmailUniqueness);

        validateEmailUniqueness(true);
    });

</script>
{% endblock content %}", "contact.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/contact.twig");
    }
}
