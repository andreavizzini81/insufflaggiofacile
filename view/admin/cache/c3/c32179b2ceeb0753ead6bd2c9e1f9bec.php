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

/* /partials/lavorazione_pareti.twig */
class __TwigTemplate_88f68432db99e7eaa3ede6ae14d1ab1a extends Template
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
        echo "<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Altezza sottotrave in metri</label>
        <input type=\"text\" name=\"altezza_sottotrave\" class=\"form-control mka-decimal field\" value=\"";
        // line 4
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "altezza_sottotrave", [], "any", false, false, false, 4) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "altezza_sottotrave", [], "any", false, false, false, 4), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Metri lineari delle pareti</label>
        <input type=\"text\" name=\"metri_lineari_delle_pareti\" class=\"form-control mka-decimal field\" value=\"";
        // line 10
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_lineari_delle_pareti", [], "any", false, false, false, 10) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_lineari_delle_pareti", [], "any", false, false, false, 10), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\"> 
        <label>Metri quadri totali degli infissi</label>
        <input type=\"text\" name=\"metri_quadri_infissi\" class=\"form-control mka-decimal field\" value=\"";
        // line 16
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_quadri_infissi", [], "any", false, false, false, 16) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_quadri_infissi", [], "any", false, false, false, 16), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"spessore_intercapedine\" class=\"form-control mka-decimal field\" value=\"";
        // line 22
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "spessore_intercapedine", [], "any", false, false, false, 22) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "spessore_intercapedine", [], "any", false, false, false, 22), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono cassonetti / avvolgibili?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cassonetti_avvolgibili\" value=\"Si\" ";
        // line 30
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili", [], "any", false, false, false, 30) == "Si")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"cassonetti_avvolgibili_numero\" value=\"";
        // line 33
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_numero", [], "any", false, false, false, 33) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_numero", [], "any", false, false, false, 33), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se si, scrivi quì il numero\">
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili\" value=\"No\" ";
        // line 37
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili", [], "any", false, false, false, 37) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Se ci sono cassonetti / avvolgibili, comunicano con l'intercapedine?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"Si\" ";
        // line 48
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_comunicanti", [], "any", false, false, false, 48) == "Si")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"No\" ";
        // line 54
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_comunicanti", [], "any", false, false, false, 54) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"Non so\" ";
        // line 60
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_comunicanti", [], "any", false, false, false, 60) == "Non so")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Non so\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono verande da insufflare?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"verande_da_insufflare\" value=\"Si\" ";
        // line 71
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "verande_da_insufflare", [], "any", false, false, false, 71) == "Si")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"verande_da_insufflare\" value=\"No\" ";
        // line 77
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "verande_da_insufflare", [], "any", false, false, false, 77) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono vani scala da insufflare?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"vano_scala_da_insufflare\" ";
        // line 88
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "vano_scala_da_insufflare", [], "any", false, false, false, 88) == "Si")) ? ("checked") : (""));
        echo " value=\"Si\" required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"vano_scala_da_insufflare\" value=\"No\" ";
        // line 94
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "vano_scala_da_insufflare", [], "any", false, false, false, 94) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Da dove si svolge la lavorazione?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"lavorazione\" value=\"Interno\" ";
        // line 105
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione", [], "any", false, false, false, 105) == "Interno")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Interno\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"lavorazione\" value=\"Esterno\" ";
        // line 111
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione", [], "any", false, false, false, 111) == "Esterno")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Esterno\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"lavorazione\" value=\"Misto\" ";
        // line 117
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione", [], "any", false, false, false, 117) == "Misto")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Misto\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"lavorazione_misto\" value=\"";
        // line 120
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione_misto", [], "any", false, false, false, 120) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione_misto", [], "any", false, false, false, 120), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se misto, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 \">
    <div class=\"form-group\">
        <label class=\"control-label\">Se si lavora esternamente, che tipo di facciata ha l'immobile?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"facciata_immobile\" value=\"Rasata\" ";
        // line 129
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_immobile", [], "any", false, false, false, 129) == "Rasata")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Rasata\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"facciata_immobile\" value=\"Mattone faccia vista\" ";
        // line 135
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_immobile", [], "any", false, false, false, 135) == "Mattone faccia vista")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Mattone faccia vista\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"facciata_immobile\" value=\"Altro\" ";
        // line 141
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_immobile", [], "any", false, false, false, 141) == "Altro")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Altro\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"facciata_altro\" value=\"";
        // line 144
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_altro", [], "any", false, false, false, 144) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_altro", [], "any", false, false, false, 144), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se altro, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 \">
    <div class=\"form-group\">
        <label class=\"control-label\">Se si lavora esternamente, si ha un piano d'appoggio?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"piano_appoggio\" value=\"Si\" ";
        // line 153
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio", [], "any", false, false, false, 153) == "Si")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"piano_appoggio\" value=\"No\" ";
        // line 159
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio", [], "any", false, false, false, 159) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"piano_appoggio\" value=\"In parte\" ";
        // line 165
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio", [], "any", false, false, false, 165) == "In parte")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"In parte\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"piano_appoggio_altro\" value=\"";
        // line 168
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio_altro", [], "any", false, false, false, 168) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio_altro", [], "any", false, false, false, 168), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se in parte, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 \">
    <div class=\"form-group\">
        <label class=\"control-label\">Se si lavora internamente, come si presenta l'immobile?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"immobile_interno\" value=\"In ristrutturazione\" ";
        // line 177
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "immobile_interno", [], "any", false, false, false, 177) == "In ristrutturazione")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"In ristrutturazione\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"immobile_interno\" value=\"Finito e non arredato\" ";
        // line 183
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "immobile_interno", [], "any", false, false, false, 183) == "Finito e non arredato")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Finito e non arredato\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"immobile_interno\" value=\"Finito e arredato\" ";
        // line 189
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "immobile_interno", [], "any", false, false, false, 189) == "Finito e arredato")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Finito e arredato\" disabled>
        </div>
    </div>
</div>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/lavorazione_pareti.twig";
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
        return array (  311 => 189,  302 => 183,  293 => 177,  281 => 168,  275 => 165,  266 => 159,  257 => 153,  245 => 144,  239 => 141,  230 => 135,  221 => 129,  209 => 120,  203 => 117,  194 => 111,  185 => 105,  171 => 94,  162 => 88,  148 => 77,  139 => 71,  125 => 60,  116 => 54,  107 => 48,  93 => 37,  86 => 33,  80 => 30,  69 => 22,  60 => 16,  51 => 10,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Altezza sottotrave in metri</label>
        <input type=\"text\" name=\"altezza_sottotrave\" class=\"form-control mka-decimal field\" value=\"{{ immobile.altezza_sottotrave != '' ? immobile.altezza_sottotrave : '' }}\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Metri lineari delle pareti</label>
        <input type=\"text\" name=\"metri_lineari_delle_pareti\" class=\"form-control mka-decimal field\" value=\"{{ immobile.metri_lineari_delle_pareti != '' ? immobile.metri_lineari_delle_pareti : '' }}\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\"> 
        <label>Metri quadri totali degli infissi</label>
        <input type=\"text\" name=\"metri_quadri_infissi\" class=\"form-control mka-decimal field\" value=\"{{ immobile.metri_quadri_infissi != '' ? immobile.metri_quadri_infissi : '' }}\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"spessore_intercapedine\" class=\"form-control mka-decimal field\" value=\"{{ immobile.spessore_intercapedine != '' ? immobile.spessore_intercapedine : '' }}\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono cassonetti / avvolgibili?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cassonetti_avvolgibili\" value=\"Si\" {{ immobile.cassonetti_avvolgibili == 'Si' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"cassonetti_avvolgibili_numero\" value=\"{{ immobile.cassonetti_avvolgibili_numero != '' ? immobile.cassonetti_avvolgibili_numero : '' }}\" placeholder=\"Se si, scrivi quì il numero\">
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili\" value=\"No\" {{ immobile.cassonetti_avvolgibili == 'No' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Se ci sono cassonetti / avvolgibili, comunicano con l'intercapedine?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"Si\" {{ immobile.cassonetti_avvolgibili_comunicanti == 'Si' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"No\" {{ immobile.cassonetti_avvolgibili_comunicanti == 'No' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"Non so\" {{ immobile.cassonetti_avvolgibili_comunicanti == 'Non so' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Non so\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono verande da insufflare?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"verande_da_insufflare\" value=\"Si\" {{ immobile.verande_da_insufflare == 'Si' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"verande_da_insufflare\" value=\"No\" {{ immobile.verande_da_insufflare == 'No' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono vani scala da insufflare?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"vano_scala_da_insufflare\" {{ immobile.vano_scala_da_insufflare == 'Si' ? 'checked' : '' }} value=\"Si\" required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"vano_scala_da_insufflare\" value=\"No\" {{ immobile.vano_scala_da_insufflare == 'No' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Da dove si svolge la lavorazione?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"lavorazione\" value=\"Interno\" {{ immobile.lavorazione == 'Interno' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Interno\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"lavorazione\" value=\"Esterno\" {{ immobile.lavorazione == 'Esterno' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Esterno\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"lavorazione\" value=\"Misto\" {{ immobile.lavorazione == 'Misto' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Misto\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"lavorazione_misto\" value=\"{{ immobile.lavorazione_misto != '' ? immobile.lavorazione_misto : '' }}\" placeholder=\"Se misto, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 \">
    <div class=\"form-group\">
        <label class=\"control-label\">Se si lavora esternamente, che tipo di facciata ha l'immobile?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"facciata_immobile\" value=\"Rasata\" {{ immobile.facciata_immobile == 'Rasata' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Rasata\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"facciata_immobile\" value=\"Mattone faccia vista\" {{ immobile.facciata_immobile == 'Mattone faccia vista' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Mattone faccia vista\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"facciata_immobile\" value=\"Altro\" {{ immobile.facciata_immobile == 'Altro' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Altro\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"facciata_altro\" value=\"{{ immobile.facciata_altro != '' ? immobile.facciata_altro : '' }}\" placeholder=\"Se altro, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 \">
    <div class=\"form-group\">
        <label class=\"control-label\">Se si lavora esternamente, si ha un piano d'appoggio?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"piano_appoggio\" value=\"Si\" {{ immobile.piano_appoggio == 'Si' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"piano_appoggio\" value=\"No\" {{ immobile.piano_appoggio == 'No' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"piano_appoggio\" value=\"In parte\" {{ immobile.piano_appoggio == 'In parte' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"In parte\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"piano_appoggio_altro\" value=\"{{ immobile.piano_appoggio_altro != '' ? immobile.piano_appoggio_altro : '' }}\" placeholder=\"Se in parte, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 \">
    <div class=\"form-group\">
        <label class=\"control-label\">Se si lavora internamente, come si presenta l'immobile?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"immobile_interno\" value=\"In ristrutturazione\" {{ immobile.immobile_interno == 'In ristrutturazione' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"In ristrutturazione\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"immobile_interno\" value=\"Finito e non arredato\" {{ immobile.immobile_interno == 'Finito e non arredato' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Finito e non arredato\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"immobile_interno\" value=\"Finito e arredato\" {{ immobile.immobile_interno == 'Finito e arredato' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Finito e arredato\" disabled>
        </div>
    </div>
</div>", "/partials/lavorazione_pareti.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/partials/lavorazione_pareti.twig");
    }
}
