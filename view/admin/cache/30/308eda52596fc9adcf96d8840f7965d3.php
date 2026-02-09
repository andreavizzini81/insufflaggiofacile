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

/* partials/contact.twig */
class __TwigTemplate_f08f886b9df0badf6ee63494ad673ea9 extends Template
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
        echo "<div class=\"row\">
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Tipo</label>
            <select class=\"form-control\" disabled>
                <option value=\"0\">Privato</option>
                <option value=\"1\">Azienda</option>
            </select>
        </div>                    
    </div>
    ";
        // line 11
        if ((twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getTypeId", [], "method", false, false, false, 11) == 0)) {
            // line 12
            echo "    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Nome</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getFirstName", [], "method", false, false, false, 15), "html", null, true);
            echo "\" readonly>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Cognome</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getLastName", [], "method", false, false, false, 21), "html", null, true);
            echo "\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Data di nascita</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 27
            (( !(null === twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getBirthDate", [], "method", false, false, false, 27))) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getBirthDate", [], "method", false, false, false, 27), "d/m/Y"), "html", null, true))) : (print ("")));
            echo "\" readonly>
        </div> 
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Luogo di nascita</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getBirthPlace", [], "method", false, false, false, 33), "html", null, true);
            echo "\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Codice fiscale</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getTaxCode", [], "method", false, false, false, 39), "html", null, true);
            echo "\" readonly>
        </div>                        
    </div>
    ";
        }
        // line 43
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getTypeId", [], "method", false, false, false, 43) == 1)) {
            // line 44
            echo "    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Rag. sociale</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getBusinessName", [], "method", false, false, false, 47), "html", null, true);
            echo "\" readonly>
        </div>
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Partita IVA</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getVatNumber", [], "method", false, false, false, 53), "html", null, true);
            echo "\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>PEC/SDI</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPec", [], "method", false, false, false, 59), "html", null, true);
            echo "\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Referente</label>
            <input type=\"text\" class=\"form-control\" value=\"";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getContactPerson", [], "method", false, false, false, 65), "html", null, true);
            echo "\" readonly>
        </div>                        
    </div>
    ";
        }
        // line 69
        echo "    <div class=\"col-md-4\">
        <div class=\"form-group\">
            <label>Email</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getEmail", [], "method", false, false, false, 72), "html", null, true);
        echo "\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-4\">
        <div class=\"form-group\">
            <label>Telefono</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPhone", [], "method", false, false, false, 78), "html", null, true);
        echo "\" readonly>
        </div>
    </div>        
</div>
<div class=\"row\">
    <div class=\"col-md-5\">
        <div class=\"form-group\">
            <label>Indirizzo</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getAddress", [], "method", false, false, false, 86), "html", null, true);
        echo "\" readonly>
        </div>                    
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Provincia</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getState", [], "method", false, false, false, 92), "html", null, true);
        echo "\" readonly>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Città</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getCity", [], "method", false, false, false, 98), "html", null, true);
        echo "\" readonly>
        </div>
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>CAP</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getZipcode", [], "method", false, false, false, 104), "html", null, true);
        echo "\" readonly>
        </div>                        
    </div>        
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Nazione</label>
            <input type=\"text\" class=\"form-control\" value=\"";
        // line 110
        echo Definitions::getValue("COUNTRIES", twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getCountry", [], "method", false, false, false, 110));
        echo "\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-9\">
        <div class=\"form-group\">
            <label>Consensi privacy</label>
            <div class=\"checkbox mt5\">
                <label class=\"checkbox-inline\">
                    <input type=\"checkbox\" class=\"field\" ";
        // line 118
        echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPrivacyStandard", [], "method", false, false, false, 118));
        echo " readonly>Trattamento dati personali UE2016/679
                </label>
                <label class=\"checkbox-inline\">
                    <input type=\"checkbox\" class=\"field\" ";
        // line 121
        echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPrivacyMarketing", [], "method", false, false, false, 121));
        echo " readonly>Finalit&agrave; di marketing
                </label>
                <label class=\"checkbox-inline\">
                    <input type=\"checkbox\" class=\"field\" ";
        // line 124
        echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPrivacyAnalysis", [], "method", false, false, false, 124));
        echo " readonly>Analisi del traffico
                </label>            
            </div>
        </div>    
    </div>    
</div>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "partials/contact.twig";
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
        return array (  225 => 124,  219 => 121,  213 => 118,  202 => 110,  193 => 104,  184 => 98,  175 => 92,  166 => 86,  155 => 78,  146 => 72,  141 => 69,  134 => 65,  125 => 59,  116 => 53,  107 => 47,  102 => 44,  99 => 43,  92 => 39,  83 => 33,  74 => 27,  65 => 21,  56 => 15,  51 => 12,  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"row\">
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Tipo</label>
            <select class=\"form-control\" disabled>
                <option value=\"0\">Privato</option>
                <option value=\"1\">Azienda</option>
            </select>
        </div>                    
    </div>
    {% if contact.getTypeId() == 0 %}
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Nome</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getFirstName() }}\" readonly>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Cognome</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getLastName() }}\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Data di nascita</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getBirthDate() is not null ? contact.getBirthDate()|date('d/m/Y') : '' }}\" readonly>
        </div> 
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Luogo di nascita</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getBirthPlace() }}\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Codice fiscale</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getTaxCode() }}\" readonly>
        </div>                        
    </div>
    {% endif %}
    {% if contact.getTypeId() == 1 %}
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Rag. sociale</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getBusinessName() }}\" readonly>
        </div>
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Partita IVA</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getVatNumber() }}\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>PEC/SDI</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getPec() }}\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Referente</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getContactPerson() }}\" readonly>
        </div>                        
    </div>
    {% endif %}
    <div class=\"col-md-4\">
        <div class=\"form-group\">
            <label>Email</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getEmail() }}\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-4\">
        <div class=\"form-group\">
            <label>Telefono</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getPhone() }}\" readonly>
        </div>
    </div>        
</div>
<div class=\"row\">
    <div class=\"col-md-5\">
        <div class=\"form-group\">
            <label>Indirizzo</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getAddress() }}\" readonly>
        </div>                    
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>Provincia</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getState() }}\" readonly>
        </div>
    </div>
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Città</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getCity() }}\" readonly>
        </div>
    </div>
    <div class=\"col-md-2\">
        <div class=\"form-group\">
            <label>CAP</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ contact.getZipcode() }}\" readonly>
        </div>                        
    </div>        
    <div class=\"col-md-3\">
        <div class=\"form-group\">
            <label>Nazione</label>
            <input type=\"text\" class=\"form-control\" value=\"{{ getDefinition('COUNTRIES', contact.getCountry()) }}\" readonly>
        </div>                        
    </div>
    <div class=\"col-md-9\">
        <div class=\"form-group\">
            <label>Consensi privacy</label>
            <div class=\"checkbox mt5\">
                <label class=\"checkbox-inline\">
                    <input type=\"checkbox\" class=\"field\" {{ setCheckbox(true, contact.getPrivacyStandard()) }} readonly>Trattamento dati personali UE2016/679
                </label>
                <label class=\"checkbox-inline\">
                    <input type=\"checkbox\" class=\"field\" {{ setCheckbox(true, contact.getPrivacyMarketing()) }} readonly>Finalit&agrave; di marketing
                </label>
                <label class=\"checkbox-inline\">
                    <input type=\"checkbox\" class=\"field\" {{ setCheckbox(true, contact.getPrivacyAnalysis()) }} readonly>Analisi del traffico
                </label>            
            </div>
        </div>    
    </div>    
</div>", "partials/contact.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/partials/contact.twig");
    }
}
