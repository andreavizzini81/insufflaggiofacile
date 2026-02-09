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

/* /partials/scheda_lavorazione_immobile.twig */
class __TwigTemplate_558f364baa0dd41359322ff631bbdfef extends Template
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
        $context["metadata"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 1), "getMetadata", [], "method", false, false, false, 1);
        // line 2
        $context["immobile"] = twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "immobile", [], "any", false, false, false, 2);
        // line 3
        echo "<form class=\"widget build-data-wrapper\" data-id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 3), "getId", [], "method", false, false, false, 3), "html", null, true);
        echo "\">
    <div class=\"content\">
\t\t<fieldset class=\"mb-3\">
\t\t\t<legend>SCHEDA IMMOBILE</legend>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label\">Scegli la tipologia dell'immobile</label>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"tipo_immobile\" value=\"Appartamento\" ";
        // line 13
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "tipo_immobile", [], "any", false, false, false, 13) == "Appartamento")) ? ("checked") : (""));
        echo " required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Appartamento\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"tipo_immobile\" value=\"Villa\" ";
        // line 19
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "tipo_immobile", [], "any", false, false, false, 19) == "Villa")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Villa\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">\t
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"tipo_immobile\" value=\"Altro\" ";
        // line 25
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "tipo_immobile", [], "any", false, false, false, 25) == "Altro")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Altro\" disabled>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"tipo_immobile_altro\" value=\"";
        // line 28
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "tipo_immobile_altro", [], "any", false, false, false, 28) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "tipo_immobile_altro", [], "any", false, false, false, 28), "html", null, true))) : (print ("")));
        echo "\"  placeholder=\"Se altro, scrivi quì cosa\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label>Quale materiale si deve insufflare?</label>
\t\t\t\t\t\t<select class=\"form-control\" name=\"materiale_da_insufflare\">
\t\t\t\t\t\t\t<option value=\"\">Scegli il materiale da insufflare</option>
\t\t\t\t\t\t\t<option value=\"Cellulosa\" ";
        // line 37
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "materiale_da_insufflare", [], "any", false, false, false, 37) == "Cellulosa")) ? ("selected") : (""));
        echo ">Cellulosa</option>
\t\t\t\t\t\t\t<option value=\"Lana di vetro\" ";
        // line 38
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "materiale_da_insufflare", [], "any", false, false, false, 38) == "Lana di vetro")) ? ("selected") : (""));
        echo ">Lana di vetro</option>
\t\t\t\t\t\t\t<option value=\"Lana di roccia\" ";
        // line 39
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "materiale_da_insufflare", [], "any", false, false, false, 39) == "Lana di roccia")) ? ("selected") : (""));
        echo ">Lana di roccia</option>
\t\t\t\t\t\t\t<option value=\"Sughero\" ";
        // line 40
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "materiale_da_insufflare", [], "any", false, false, false, 40) == "Sughero")) ? ("selected") : (""));
        echo ">Sughero</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label\">Cosa si deve insufflare?</label>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cosa_insufflare\" value=\"Pareti perimetrali\" ";
        // line 49
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cosa_insufflare", [], "any", false, false, false, 49) == "Pareti perimetrali")) ? ("checked") : (""));
        echo " required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Pareti perimetrali\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cosa_insufflare\" value=\"Sottotetto\" ";
        // line 55
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cosa_insufflare", [], "any", false, false, false, 55) == "Sottotetto")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Sottotetto\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cosa_insufflare\" value=\"Controsoffitto\" ";
        // line 61
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cosa_insufflare", [], "any", false, false, false, 61) == "Controsoffitto")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Controsoffitto\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label\">Esiste già un isolante nell'intercapedine?</label>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"isolante_preesistente\" value=\"Si\" ";
        // line 72
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "isolante_preesistente", [], "any", false, false, false, 72) == "Si")) ? ("checked") : (""));
        echo " required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"isolante_preesistente\" value=\"No\" ";
        // line 78
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "isolante_preesistente", [], "any", false, false, false, 78) == "No")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"isolante_preesistente\" value=\"Non so\" ";
        // line 84
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "isolante_preesistente", [], "any", false, false, false, 84) == "Non so")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Non so\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row psc pareti-perimetrali\">
\t\t\t\t";
        // line 92
        $this->loadTemplate("/partials/lavorazione_pareti.twig", "/partials/scheda_lavorazione_immobile.twig", 92)->display($context);
        // line 93
        echo "\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label>Metri cubi da insufflare</label>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-warning btn-calc\" type=\"button\">Calcola</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" name=\"metri_cubi\" class=\"form-control\" value=\"";
        // line 102
        (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_cubi", [], "any", false, false, false, 102) != "")) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "metri_cubi", [], "any", false, false, false, 102), "html", null, true))) : (print ("")));
        echo "\" readonly>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"d-grid gap-2\">
\t\t\t\t  <button class=\"btn btn-success save-building-sheet\" type=\"button\"><span class=\"fad fa-check \"></span>&nbsp;&nbsp;Salva scheda immobile</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</fieldset> 
\t</div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-building-sheet', function() {
            const form = document.querySelector('.build-data-wrapper');
\t\t\tconst dealId = form.dataset.id;
            this.classList.add('loading');
\t\t\tconsole.log(FormSerializer.for(form).serialize());
            HttpRequest.patch(`\${res.absolutePath}api/deal-build-sheet/\${dealId}`, FormSerializer.for(form).serialize(), (data, response) => {
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
               //window.location = `\${res.path}deal/\${dealId}`;
            }, err => void new ResAlert('Operazione fallita', err.toString(), {type:'error'}));
        });

\t\tfunction invisibleAll() {
\t\t\tconst psc = document.querySelector('.psc');
\t\t\tpsc.style.height = \"0px\"
\t\t\tpsc.classList.add('invisible');
\t\t\tconst disableAll = psc.querySelectorAll(\"input.field, select.field, textarea.field, button.field\");
\t\t\tdisableAll.forEach(function(el) {
\t\t\t\tel.disabled = true;
\t\t\t});
\t\t}

\t\tinvisibleAll();

\t\tDelegate(document).on('change', '[name=\"cosa_insufflare\"]', function() {
\t\t\tconst cosaInsufflare = document.querySelector('[name=\"cosa_insufflare\"]:checked').value.toLowerCase().replace(/ /g, \"-\");
\t\t\tinvisibleAll();
\t\t\tconst selettore = document.querySelector('.' + cosaInsufflare);
\t\t\tselettore.style.height = \"100%\";
\t\t\tselettore.classList.remove('invisible');
\t\t\tconst enableAll = selettore.querySelectorAll(\"input.field, select.field, textarea.field, button.field\");
\t\t\tenableAll.forEach(function(el) {
\t\t\t\tel.disabled = false;
\t\t\t});
\t\t});

\t\tDelegate(document).on('click', '.btn-calc', function() {
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metri_cubi\"]');
\t\t\tconst altezza = parseFloat(document.querySelector('[name=\"altezza_sottotrave\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaPareti = parseFloat(document.querySelector('[name=\"metri_lineari_delle_pareti\"]').value.replace(\",\", \".\"));
\t\t\tconst mqInfissi = parseFloat(document.querySelector('[name=\"metri_quadri_infissi\"]').value.replace(\",\", \".\"));
\t\t\tconst spessoreIntercapedine = parseFloat(document.querySelector('[name=\"spessore_intercapedine\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubi = (((altezza*lunghezzaPareti)-mqInfissi)*spessoreIntercapedine).toFixed(2);
\t\t\tmetriCubiOutput.value = metriCubi;
\t\t});
    });
</script>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/scheda_lavorazione_immobile.twig";
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
        return array (  189 => 102,  178 => 93,  176 => 92,  165 => 84,  156 => 78,  147 => 72,  133 => 61,  124 => 55,  115 => 49,  103 => 40,  99 => 39,  95 => 38,  91 => 37,  79 => 28,  73 => 25,  64 => 19,  55 => 13,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set metadata = data.deal.getMetadata() %}
{% set immobile = metadata.immobile %}
<form class=\"widget build-data-wrapper\" data-id=\"{{ data.deal.getId() }}\">
    <div class=\"content\">
\t\t<fieldset class=\"mb-3\">
\t\t\t<legend>SCHEDA IMMOBILE</legend>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label\">Scegli la tipologia dell'immobile</label>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"tipo_immobile\" value=\"Appartamento\" {{ immobile.tipo_immobile == 'Appartamento' ? 'checked' : '' }} required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Appartamento\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"tipo_immobile\" value=\"Villa\" {{ immobile.tipo_immobile == 'Villa' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Villa\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">\t
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"tipo_immobile\" value=\"Altro\" {{ immobile.tipo_immobile == 'Altro' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Altro\" disabled>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"tipo_immobile_altro\" value=\"{{ immobile.tipo_immobile_altro != '' ? immobile.tipo_immobile_altro : '' }}\"  placeholder=\"Se altro, scrivi quì cosa\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label>Quale materiale si deve insufflare?</label>
\t\t\t\t\t\t<select class=\"form-control\" name=\"materiale_da_insufflare\">
\t\t\t\t\t\t\t<option value=\"\">Scegli il materiale da insufflare</option>
\t\t\t\t\t\t\t<option value=\"Cellulosa\" {{ immobile.materiale_da_insufflare == 'Cellulosa' ? 'selected' : '' }}>Cellulosa</option>
\t\t\t\t\t\t\t<option value=\"Lana di vetro\" {{ immobile.materiale_da_insufflare == 'Lana di vetro' ? 'selected' : '' }}>Lana di vetro</option>
\t\t\t\t\t\t\t<option value=\"Lana di roccia\" {{ immobile.materiale_da_insufflare == 'Lana di roccia' ? 'selected' : '' }}>Lana di roccia</option>
\t\t\t\t\t\t\t<option value=\"Sughero\" {{ immobile.materiale_da_insufflare == 'Sughero' ? 'selected' : '' }}>Sughero</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label\">Cosa si deve insufflare?</label>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"cosa_insufflare\" value=\"Pareti perimetrali\" {{ immobile.cosa_insufflare == 'Pareti perimetrali' ? 'checked' : '' }} required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Pareti perimetrali\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cosa_insufflare\" value=\"Sottotetto\" {{ immobile.cosa_insufflare == 'Sottotetto' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Sottotetto\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"cosa_insufflare\" value=\"Controsoffitto\" {{ immobile.cosa_insufflare == 'Controsoffitto' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Controsoffitto\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label\">Esiste già un isolante nell'intercapedine?</label>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\"  type=\"radio\" name=\"isolante_preesistente\" value=\"Si\" {{ immobile.isolante_preesistente == 'Si' ? 'checked' : '' }} required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Si\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"isolante_preesistente\" value=\"No\" {{ immobile.isolante_preesistente == 'No' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"No\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"radio\" name=\"isolante_preesistente\" value=\"Non so\" {{ immobile.isolante_preesistente == 'Non so' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Non so\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row psc pareti-perimetrali\">
\t\t\t\t{% include '/partials/lavorazione_pareti.twig' %}
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-lg-6 mb-3\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label>Metri cubi da insufflare</label>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-warning btn-calc\" type=\"button\">Calcola</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" name=\"metri_cubi\" class=\"form-control\" value=\"{{ immobile.metri_cubi != '' ? immobile.metri_cubi : '' }}\" readonly>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"d-grid gap-2\">
\t\t\t\t  <button class=\"btn btn-success save-building-sheet\" type=\"button\"><span class=\"fad fa-check \"></span>&nbsp;&nbsp;Salva scheda immobile</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</fieldset> 
\t</div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-building-sheet', function() {
            const form = document.querySelector('.build-data-wrapper');
\t\t\tconst dealId = form.dataset.id;
            this.classList.add('loading');
\t\t\tconsole.log(FormSerializer.for(form).serialize());
            HttpRequest.patch(`\${res.absolutePath}api/deal-build-sheet/\${dealId}`, FormSerializer.for(form).serialize(), (data, response) => {
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
               //window.location = `\${res.path}deal/\${dealId}`;
            }, err => void new ResAlert('Operazione fallita', err.toString(), {type:'error'}));
        });

\t\tfunction invisibleAll() {
\t\t\tconst psc = document.querySelector('.psc');
\t\t\tpsc.style.height = \"0px\"
\t\t\tpsc.classList.add('invisible');
\t\t\tconst disableAll = psc.querySelectorAll(\"input.field, select.field, textarea.field, button.field\");
\t\t\tdisableAll.forEach(function(el) {
\t\t\t\tel.disabled = true;
\t\t\t});
\t\t}

\t\tinvisibleAll();

\t\tDelegate(document).on('change', '[name=\"cosa_insufflare\"]', function() {
\t\t\tconst cosaInsufflare = document.querySelector('[name=\"cosa_insufflare\"]:checked').value.toLowerCase().replace(/ /g, \"-\");
\t\t\tinvisibleAll();
\t\t\tconst selettore = document.querySelector('.' + cosaInsufflare);
\t\t\tselettore.style.height = \"100%\";
\t\t\tselettore.classList.remove('invisible');
\t\t\tconst enableAll = selettore.querySelectorAll(\"input.field, select.field, textarea.field, button.field\");
\t\t\tenableAll.forEach(function(el) {
\t\t\t\tel.disabled = false;
\t\t\t});
\t\t});

\t\tDelegate(document).on('click', '.btn-calc', function() {
\t\t\tconst metriCubiOutput = document.querySelector('[name=\"metri_cubi\"]');
\t\t\tconst altezza = parseFloat(document.querySelector('[name=\"altezza_sottotrave\"]').value.replace(\",\", \".\"));
\t\t\tconst lunghezzaPareti = parseFloat(document.querySelector('[name=\"metri_lineari_delle_pareti\"]').value.replace(\",\", \".\"));
\t\t\tconst mqInfissi = parseFloat(document.querySelector('[name=\"metri_quadri_infissi\"]').value.replace(\",\", \".\"));
\t\t\tconst spessoreIntercapedine = parseFloat(document.querySelector('[name=\"spessore_intercapedine\"]').value.replace(\",\", \".\"));
\t\t\tconst metriCubi = (((altezza*lunghezzaPareti)-mqInfissi)*spessoreIntercapedine).toFixed(2);
\t\t\tmetriCubiOutput.value = metriCubi;
\t\t});
    });
</script>", "/partials/scheda_lavorazione_immobile.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/partials/scheda_lavorazione_immobile.twig");
    }
}
