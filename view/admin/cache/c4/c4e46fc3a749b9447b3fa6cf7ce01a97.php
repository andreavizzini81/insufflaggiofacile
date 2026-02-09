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
class __TwigTemplate_6ae98d76fea702f6eab72f5e5668eb34 extends Template
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
        echo "<div class=\"col-12 my-3 text-light\">
    <h3>Scheda pareti perimetrali</h3>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono cassonetti / avvolgibili?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cassonetti_avvolgibili\" value=\"Si\" ";
        // line 9
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili", [], "any", false, false, false, 9) == "Si")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"cassonetti_avvolgibili_numero\" value=\"";
        // line 12
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_numero", [], "any", false, false, false, 12) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_numero", [], "any", false, false, false, 12), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se si, scrivi quì il numero\">
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili\" value=\"No\" ";
        // line 16
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili", [], "any", false, false, false, 16) == "No")) ? ("checked") : (""));
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
        // line 27
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_comunicanti", [], "any", false, false, false, 27) == "Si")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"No\" ";
        // line 33
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_comunicanti", [], "any", false, false, false, 33) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cassonetti_avvolgibili_comunicanti\" value=\"Non so\" ";
        // line 39
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cassonetti_avvolgibili_comunicanti", [], "any", false, false, false, 39) == "Non so")) ? ("checked") : (""));
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
        // line 50
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "verande_da_insufflare", [], "any", false, false, false, 50) == "Si")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"verande_da_insufflare\" value=\"No\" ";
        // line 56
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "verande_da_insufflare", [], "any", false, false, false, 56) == "No")) ? ("checked") : (""));
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
        // line 67
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "vano_scala_da_insufflare", [], "any", false, false, false, 67) == "Si")) ? ("checked") : (""));
        echo " value=\"Si\" required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"vano_scala_da_insufflare\" value=\"No\" ";
        // line 73
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "vano_scala_da_insufflare", [], "any", false, false, false, 73) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label class=\"control-label\">Ci sono canne fumarie?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"canne_fumarie\" ";
        // line 84
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "canne_fumarie", [], "any", false, false, false, 84) == "Si")) ? ("checked") : (""));
        echo " value=\"Si\" required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"canne_fumarie\" value=\"No\" ";
        // line 90
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "canne_fumarie", [], "any", false, false, false, 90) == "No")) ? ("checked") : (""));
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
        // line 101
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione", [], "any", false, false, false, 101) == "Interno")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Interno\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"lavorazione\" value=\"Esterno\" ";
        // line 107
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione", [], "any", false, false, false, 107) == "Esterno")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Esterno\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"lavorazione\" value=\"Misto\" ";
        // line 113
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione", [], "any", false, false, false, 113) == "Misto")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Misto\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"lavorazione_misto\" value=\"";
        // line 116
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione_misto", [], "any", false, false, false, 116) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "lavorazione_misto", [], "any", false, false, false, 116), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se misto, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 esterno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Esternamente che tipo di facciata ha l'immobile?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"facciata_immobile\" value=\"Rasata\" ";
        // line 125
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_immobile", [], "any", false, false, false, 125) == "Rasata")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Rasata\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"facciata_immobile\" value=\"Mattone faccia vista\" ";
        // line 131
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_immobile", [], "any", false, false, false, 131) == "Mattone faccia vista")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Mattone faccia vista\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"facciata_immobile\" value=\"Altro\" ";
        // line 137
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_immobile", [], "any", false, false, false, 137) == "Altro")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Altro\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"facciata_altro\" value=\"";
        // line 140
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_altro", [], "any", false, false, false, 140) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "facciata_altro", [], "any", false, false, false, 140), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se altro, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 esterno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Esternamente si ha un piano d'appoggio?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"piano_appoggio\" value=\"Si\" ";
        // line 149
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio", [], "any", false, false, false, 149) == "Si")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"piano_appoggio\" value=\"No\" ";
        // line 155
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio", [], "any", false, false, false, 155) == "No")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"piano_appoggio\" value=\"In parte\" ";
        // line 161
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio", [], "any", false, false, false, 161) == "In parte")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"In parte\" disabled>
            <input type=\"text\" class=\"form-control field\" name=\"piano_appoggio_altro\" value=\"";
        // line 164
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio_altro", [], "any", false, false, false, 164) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "piano_appoggio_altro", [], "any", false, false, false, 164), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Se in parte, specifica\">
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 esterno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Quali strumenti di elevazione sono necessari?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"strumenti_necessari\" value=\"Nessuno\" ";
        // line 173
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "strumenti_necessari", [], "any", false, false, false, 173) == "Nessuno")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Nessuno\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"strumenti_necessari\" value=\"Trabattello\" ";
        // line 179
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "strumenti_necessari", [], "any", false, false, false, 179) == "Trabattello")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Trabattello\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"strumenti_necessari\" value=\"Cestello\" ";
        // line 185
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "strumenti_necessari", [], "any", false, false, false, 185) == "Cestello")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Cestello\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 interno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Internamente come si presenta l'immobile?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"immobile_interno\" value=\"In ristrutturazione\" ";
        // line 196
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "immobile_interno", [], "any", false, false, false, 196) == "In ristrutturazione")) ? ("checked") : (""));
        echo " required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"In ristrutturazione\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"immobile_interno\" value=\"Finito e non arredato\" ";
        // line 202
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "immobile_interno", [], "any", false, false, false, 202) == "Finito e non arredato")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Finito e non arredato\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"immobile_interno\" value=\"Finito e arredato\" ";
        // line 208
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "immobile_interno", [], "any", false, false, false, 208) == "Finito e arredato")) ? ("checked") : (""));
        echo ">
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Finito e arredato\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Altezza sottotrave in metri</label>
        <input type=\"text\" name=\"altezza_sottotrave\" class=\"form-control mka-decimal field\" value=\"";
        // line 217
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "altezza_sottotrave", [], "any", false, false, false, 217) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "altezza_sottotrave", [], "any", false, false, false, 217), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Metri lineari delle pareti</label>
        <input type=\"text\" name=\"metri_lineari_delle_pareti\" class=\"form-control mka-decimal field\" value=\"";
        // line 223
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_lineari_delle_pareti", [], "any", false, false, false, 223) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_lineari_delle_pareti", [], "any", false, false, false, 223), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\"> 
        <label>Metri quadri totali degli infissi</label>
        <input type=\"text\" name=\"metri_quadri_infissi\" class=\"form-control mka-decimal field\" value=\"";
        // line 229
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_quadri_infissi", [], "any", false, false, false, 229) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_quadri_infissi", [], "any", false, false, false, 229), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div> 
<div class=\"col-12 col-lg-6 mb-3\">
    <div class=\"form-group\">
        <label>Spessore intercapedine in metri</label>
        <input type=\"text\" name=\"spessore_intercapedine\" class=\"form-control mka-decimal field\" value=\"";
        // line 235
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "spessore_intercapedine", [], "any", false, false, false, 235) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "spessore_intercapedine", [], "any", false, false, false, 235), "html", null, true))) : (print ("")));
        echo "\">
    </div>
</div>
<div class=\"col-12 mb-3\">
    <div class=\"form-group\">
        <label>Metri cubi da insufflare a parete</label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <button class=\"btn btn-warning btn-calc\" type=\"button\">Calcola</button>
            </div>
            <input type=\"text\" name=\"metri_cubi_pareti\" class=\"form-control\" value=\"";
        // line 245
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_cubi_pareti", [], "any", false, false, false, 245) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_cubi_pareti", [], "any", false, false, false, 245), "html", null, true))) : (print ("")));
        echo "\" readonly>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('click', '.btn-calc', function() {
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metri_cubi_pareti\"]');
\t\t\tconst altezza = parseFloat(document.querySelector('[name=\"altezza_sottotrave\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaPareti = parseFloat(document.querySelector('[name=\"metri_lineari_delle_pareti\"]').value.replace(\",\", \".\"));
\t\t\tconst mqInfissi = parseFloat(document.querySelector('[name=\"metri_quadri_infissi\"]').value.replace(\",\", \".\"));
\t\t\tconst spessoreIntercapedine = parseFloat(document.querySelector('[name=\"spessore_intercapedine\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubi = (((altezza*lunghezzaPareti)-mqInfissi)*spessoreIntercapedine).toFixed(2);
\t\t\tmetriCubiOutput.value = metriCubi;
\t\t});

    });
\t
\tDelegate(document).on('change', '[name=\"lavorazione\"]', () => {
\t\tconst selectedValue = document.querySelector('input[name=\"lavorazione\"]:checked').value;
\t\tconsole.log(\"Nuovo valore selezionato: \" + selectedValue);
\t\tintExt();
\t});
\t
\tfunction intExt() {
\t\tconst selectedValue = document.querySelector('input[name=\"lavorazione\"]:checked').value;
\t\tconst selectorsIntExtAll = document.querySelectorAll(\".int-ext\");
\t\tselectorsIntExtAll.forEach(function(el) {
\t\t\tel.classList.add('invisible');
\t\t\tel.classList.remove('col-12');
\t\t\tel.classList.remove('col-lg-6');
\t\t\tel.classList.remove('mb-3');
\t\t\tel.style.height = \"0px\"
\t\t});
\t\tif (selectedValue.toLowerCase() === 'esterno' || selectedValue.toLowerCase() === 'interno') {
\t\t\tconst selectors = document.querySelectorAll(\".\" + selectedValue.toLowerCase());
\t\t\tselectors.forEach(function(el) {
\t\t\t\tel.classList.remove('invisible');
\t\t\t\tel.classList.add('col-12');
\t\t\t\tel.classList.add('col-lg-6');
\t\t\t\tel.classList.add('mb-3');
\t\t\t\tel.style.height = \"100%\"
\t\t\t});
\t\t\treturn;
\t\t}
\t\tselectorsIntExtAll.forEach(function(el) {
\t\t\tel.classList.remove('invisible');
\t\t\tel.classList.add('col-12');
\t\t\tel.classList.add('col-lg-6');
\t\t\tel.classList.add('mb-3');
\t\t\tel.style.height = \"100%\"
\t\t});
\t\t
\t}
\t
\tintExt();
\t
</script>";
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
        return array (  385 => 245,  372 => 235,  363 => 229,  354 => 223,  345 => 217,  333 => 208,  324 => 202,  315 => 196,  301 => 185,  292 => 179,  283 => 173,  271 => 164,  265 => 161,  256 => 155,  247 => 149,  235 => 140,  229 => 137,  220 => 131,  211 => 125,  199 => 116,  193 => 113,  184 => 107,  175 => 101,  161 => 90,  152 => 84,  138 => 73,  129 => 67,  115 => 56,  106 => 50,  92 => 39,  83 => 33,  74 => 27,  60 => 16,  53 => 12,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"col-12 my-3 text-light\">
    <h3>Scheda pareti perimetrali</h3>
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
        <label class=\"control-label\">Ci sono canne fumarie?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"canne_fumarie\" {{ immobile.canne_fumarie == 'Si' ? 'checked' : '' }} value=\"Si\" required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
        </div>
        <div class=\"input-group\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"canne_fumarie\" value=\"No\" {{ immobile.canne_fumarie == 'No' ? 'checked' : '' }}>
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
<div class=\"col-12 col-lg-6 mb-3 esterno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Esternamente che tipo di facciata ha l'immobile?</label>
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
<div class=\"col-12 col-lg-6 mb-3 esterno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Esternamente si ha un piano d'appoggio?</label>
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
<div class=\"col-12 col-lg-6 mb-3 esterno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Quali strumenti di elevazione sono necessari?</label>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"strumenti_necessari\" value=\"Nessuno\" {{ immobile.strumenti_necessari == 'Nessuno' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Nessuno\" disabled>
        </div>
        <div class=\"input-group mb-1\">
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"strumenti_necessari\" value=\"Trabattello\" {{ immobile.strumenti_necessari == 'Trabattello' ? 'checked' : '' }} required>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Trabattello\" disabled>
        </div>
        <div class=\"input-group\">\t
            <div class=\"input-group-text\">
                <input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"strumenti_necessari\" value=\"Cestello\" {{ immobile.strumenti_necessari == 'Cestello' ? 'checked' : '' }}>
            </div>
            <input type=\"text\" class=\"form-control\" placeholder=\"Cestello\" disabled>
        </div>
    </div>
</div>
<div class=\"col-12 col-lg-6 mb-3 interno int-ext\">
    <div class=\"form-group\">
        <label class=\"control-label\">Internamente come si presenta l'immobile?</label>
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
</div>
<div class=\"col-12 col-lg-6 mb-3\">
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
<div class=\"col-12 mb-3\">
    <div class=\"form-group\">
        <label>Metri cubi da insufflare a parete</label>
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <button class=\"btn btn-warning btn-calc\" type=\"button\">Calcola</button>
            </div>
            <input type=\"text\" name=\"metri_cubi_pareti\" class=\"form-control\" value=\"{{ immobile.metri_cubi_pareti != '' ? immobile.metri_cubi_pareti : '' }}\" readonly>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('click', '.btn-calc', function() {
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metri_cubi_pareti\"]');
\t\t\tconst altezza = parseFloat(document.querySelector('[name=\"altezza_sottotrave\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaPareti = parseFloat(document.querySelector('[name=\"metri_lineari_delle_pareti\"]').value.replace(\",\", \".\"));
\t\t\tconst mqInfissi = parseFloat(document.querySelector('[name=\"metri_quadri_infissi\"]').value.replace(\",\", \".\"));
\t\t\tconst spessoreIntercapedine = parseFloat(document.querySelector('[name=\"spessore_intercapedine\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubi = (((altezza*lunghezzaPareti)-mqInfissi)*spessoreIntercapedine).toFixed(2);
\t\t\tmetriCubiOutput.value = metriCubi;
\t\t});

    });
\t
\tDelegate(document).on('change', '[name=\"lavorazione\"]', () => {
\t\tconst selectedValue = document.querySelector('input[name=\"lavorazione\"]:checked').value;
\t\tconsole.log(\"Nuovo valore selezionato: \" + selectedValue);
\t\tintExt();
\t});
\t
\tfunction intExt() {
\t\tconst selectedValue = document.querySelector('input[name=\"lavorazione\"]:checked').value;
\t\tconst selectorsIntExtAll = document.querySelectorAll(\".int-ext\");
\t\tselectorsIntExtAll.forEach(function(el) {
\t\t\tel.classList.add('invisible');
\t\t\tel.classList.remove('col-12');
\t\t\tel.classList.remove('col-lg-6');
\t\t\tel.classList.remove('mb-3');
\t\t\tel.style.height = \"0px\"
\t\t});
\t\tif (selectedValue.toLowerCase() === 'esterno' || selectedValue.toLowerCase() === 'interno') {
\t\t\tconst selectors = document.querySelectorAll(\".\" + selectedValue.toLowerCase());
\t\t\tselectors.forEach(function(el) {
\t\t\t\tel.classList.remove('invisible');
\t\t\t\tel.classList.add('col-12');
\t\t\t\tel.classList.add('col-lg-6');
\t\t\t\tel.classList.add('mb-3');
\t\t\t\tel.style.height = \"100%\"
\t\t\t});
\t\t\treturn;
\t\t}
\t\tselectorsIntExtAll.forEach(function(el) {
\t\t\tel.classList.remove('invisible');
\t\t\tel.classList.add('col-12');
\t\t\tel.classList.add('col-lg-6');
\t\t\tel.classList.add('mb-3');
\t\t\tel.style.height = \"100%\"
\t\t});
\t\t
\t}
\t
\tintExt();
\t
</script>", "/partials/lavorazione_pareti.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/lavorazione_pareti.twig");
    }
}
