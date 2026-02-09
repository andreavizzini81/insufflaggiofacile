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
class __TwigTemplate_76725f4f70ae21a9160e64584fe4c124 extends Template
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
    <div class=\"content\" id=\"contentToPrint\">
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
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\"  type=\"checkbox\" name=\"cosa_insufflare_1\" value=\"Pareti perimetrali\" ";
        // line 49
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cosa_insufflare_1", [], "any", false, false, false, 49) == "Pareti perimetrali")) ? ("checked") : (""));
        echo " required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Pareti perimetrali\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"checkbox\" name=\"cosa_insufflare_2\" value=\"Sottotetto\" ";
        // line 55
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cosa_insufflare_2", [], "any", false, false, false, 55) == "Sottotetto")) ? ("checked") : (""));
        echo ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Sottotetto\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"checkbox\" name=\"cosa_insufflare_3\" value=\"Controsoffitto\" ";
        // line 61
        echo (((twig_get_attribute($this->env, $this->source, ($context["immobile"] ?? null), "cosa_insufflare_3", [], "any", false, false, false, 61) == "Controsoffitto")) ? ("checked") : (""));
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
\t\t\t<div class=\"row psc cosa_insufflare_1 m-3 bg-info rounded\">
\t\t\t\t";
        // line 92
        $this->loadTemplate("/partials/lavorazione_pareti.twig", "/partials/scheda_lavorazione_immobile.twig", 92)->display($context);
        // line 93
        echo "\t\t\t</div>
\t\t\t<div class=\"row psc cosa_insufflare_2 m-3 bg-info rounded\">
\t\t\t\t";
        // line 95
        $this->loadTemplate("/partials/lavorazione_sottotetto.twig", "/partials/scheda_lavorazione_immobile.twig", 95)->display($context);
        // line 96
        echo "\t\t\t</div>
\t\t\t<div class=\"row psc cosa_insufflare_3 m-3 bg-info rounded\">
\t\t\t\t";
        // line 98
        $this->loadTemplate("/partials/lavorazione_controsoffitto.twig", "/partials/scheda_lavorazione_immobile.twig", 98)->display($context);
        // line 99
        echo "\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"d-grid gap-2 mt-2\">
\t\t\t\t  <button class=\"btn btn-success save-building-sheet\" type=\"button\"><span class=\"fad fa-check \"></span>&nbsp;&nbsp;Salva scheda immobile</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"d-grid gap-2 mt-2\">
\t\t\t\t  <button class=\"btn btn-warning print-building-sheet\" type=\"button\"><span class=\"fad fa-check \"></span>&nbsp;&nbsp;Stampa scheda</button>
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
               window.location = `\${res.path}deal/\${dealId}`;
            }, err => void new ResAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\t
\t\tfunction formatKey(key) {
\t\t\tif (key.includes('_')) {
\t\t\t\treturn key.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
\t\t\t} else {
\t\t\t\treturn key.replace(/([A-Z])/g, ' \$1').trim();
\t\t\t}
\t\t}
\t\t
\t\tDelegate(document).on('click', '.print-building-sheet', function() {
\t\t\tconst form = document.querySelector('.build-data-wrapper');
\t\t\tconst formSerialized = FormSerializer.for(form).serialize();
\t\t\tconst finestraDiStampa = window.open('', '', 'width=800, height=600');
\t\t\tfinestraDiStampa.document.write('<html><head><title>Contenuto da Stampare</title></head><body><table>');
\t\t\tfor (const key in formSerialized) {
\t\t\t\tconst value = formSerialized[key];
\t\t\t\tif (!value) continue;
\t\t\t\tconst formattedKey = formatKey(key);
\t\t\t\tfinestraDiStampa.document.write(`<tr><td>\${formattedKey}</td><td>\${value}</td></tr>`);
\t\t\t}
\t\t
\t\t\tfinestraDiStampa.document.write('</table></body></html>');
\t\t\tfinestraDiStampa.document.close();
\t\t\tfinestraDiStampa.print();
\t\t});
\t\t
\t\tfunction ciOpenClose(num) {
\t\t\tconst selettore = document.querySelector('.cosa_insufflare_' + num );
\t\t\tconst cosaInsufflareSelsector = document.querySelector('[name=\"cosa_insufflare_'+num+'\"]');
\t\t\tconst edAll = selettore.querySelectorAll(\"input.field, select.field, textarea.field, button.field\");
\t\t\tconsole.log(cosaInsufflareSelsector.checked);
\t\t\tif(cosaInsufflareSelsector.checked){
\t\t\t\tconst cosaInsufflare = cosaInsufflareSelsector.value.toLowerCase().replace(/ /g, \"-\");
\t\t\t\tselettore.style.height = \"100%\";
\t\t\t\tselettore.classList.remove('invisible');
\t\t\t\tedAll.forEach(function(el) {
\t\t\t\t\tel.disabled = false;
\t\t\t\t});
\t\t\t} else {
\t\t\t\tselettore.style.height = \"0px\"
\t\t\t\tselettore.classList.add('invisible');
\t\t\t\tedAll.forEach(function(el) {
\t\t\t\t\tel.disabled = true;
\t\t\t\t});
\t\t\t}
\t\t}

\t\tfor(let i=1;i<=3;i++){
\t\t\tDelegate(document).on('change', '[name=\"cosa_insufflare_' + i + '\"]', () => {
\t\t\t\tciOpenClose(i);
\t\t\t});
\t\t\tciOpenClose(i);
\t\t}

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
        return array (  190 => 99,  188 => 98,  184 => 96,  182 => 95,  178 => 93,  176 => 92,  165 => 84,  156 => 78,  147 => 72,  133 => 61,  124 => 55,  115 => 49,  103 => 40,  99 => 39,  95 => 38,  91 => 37,  79 => 28,  73 => 25,  64 => 19,  55 => 13,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set metadata = data.deal.getMetadata() %}
{% set immobile = metadata.immobile %}
<form class=\"widget build-data-wrapper\" data-id=\"{{ data.deal.getId() }}\">
    <div class=\"content\" id=\"contentToPrint\">
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
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\"  type=\"checkbox\" name=\"cosa_insufflare_1\" value=\"Pareti perimetrali\" {{ immobile.cosa_insufflare_1 == 'Pareti perimetrali' ? 'checked' : '' }} required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Pareti perimetrali\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group mb-1\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"checkbox\" name=\"cosa_insufflare_2\" value=\"Sottotetto\" {{ immobile.cosa_insufflare_2 == 'Sottotetto' ? 'checked' : '' }}>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Sottotetto\" disabled>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t<div class=\"input-group-text\">
\t\t\t\t\t\t\t\t<input class=\"form-check-input mt-0 field\" type=\"checkbox\" name=\"cosa_insufflare_3\" value=\"Controsoffitto\" {{ immobile.cosa_insufflare_3 == 'Controsoffitto' ? 'checked' : '' }}>
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
\t\t\t<div class=\"row psc cosa_insufflare_1 m-3 bg-info rounded\">
\t\t\t\t{% include '/partials/lavorazione_pareti.twig' %}
\t\t\t</div>
\t\t\t<div class=\"row psc cosa_insufflare_2 m-3 bg-info rounded\">
\t\t\t\t{% include '/partials/lavorazione_sottotetto.twig' %}
\t\t\t</div>
\t\t\t<div class=\"row psc cosa_insufflare_3 m-3 bg-info rounded\">
\t\t\t\t{% include '/partials/lavorazione_controsoffitto.twig' %}
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"d-grid gap-2 mt-2\">
\t\t\t\t  <button class=\"btn btn-success save-building-sheet\" type=\"button\"><span class=\"fad fa-check \"></span>&nbsp;&nbsp;Salva scheda immobile</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"d-grid gap-2 mt-2\">
\t\t\t\t  <button class=\"btn btn-warning print-building-sheet\" type=\"button\"><span class=\"fad fa-check \"></span>&nbsp;&nbsp;Stampa scheda</button>
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
               window.location = `\${res.path}deal/\${dealId}`;
            }, err => void new ResAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\t
\t\tfunction formatKey(key) {
\t\t\tif (key.includes('_')) {
\t\t\t\treturn key.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
\t\t\t} else {
\t\t\t\treturn key.replace(/([A-Z])/g, ' \$1').trim();
\t\t\t}
\t\t}
\t\t
\t\tDelegate(document).on('click', '.print-building-sheet', function() {
\t\t\tconst form = document.querySelector('.build-data-wrapper');
\t\t\tconst formSerialized = FormSerializer.for(form).serialize();
\t\t\tconst finestraDiStampa = window.open('', '', 'width=800, height=600');
\t\t\tfinestraDiStampa.document.write('<html><head><title>Contenuto da Stampare</title></head><body><table>');
\t\t\tfor (const key in formSerialized) {
\t\t\t\tconst value = formSerialized[key];
\t\t\t\tif (!value) continue;
\t\t\t\tconst formattedKey = formatKey(key);
\t\t\t\tfinestraDiStampa.document.write(`<tr><td>\${formattedKey}</td><td>\${value}</td></tr>`);
\t\t\t}
\t\t
\t\t\tfinestraDiStampa.document.write('</table></body></html>');
\t\t\tfinestraDiStampa.document.close();
\t\t\tfinestraDiStampa.print();
\t\t});
\t\t
\t\tfunction ciOpenClose(num) {
\t\t\tconst selettore = document.querySelector('.cosa_insufflare_' + num );
\t\t\tconst cosaInsufflareSelsector = document.querySelector('[name=\"cosa_insufflare_'+num+'\"]');
\t\t\tconst edAll = selettore.querySelectorAll(\"input.field, select.field, textarea.field, button.field\");
\t\t\tconsole.log(cosaInsufflareSelsector.checked);
\t\t\tif(cosaInsufflareSelsector.checked){
\t\t\t\tconst cosaInsufflare = cosaInsufflareSelsector.value.toLowerCase().replace(/ /g, \"-\");
\t\t\t\tselettore.style.height = \"100%\";
\t\t\t\tselettore.classList.remove('invisible');
\t\t\t\tedAll.forEach(function(el) {
\t\t\t\t\tel.disabled = false;
\t\t\t\t});
\t\t\t} else {
\t\t\t\tselettore.style.height = \"0px\"
\t\t\t\tselettore.classList.add('invisible');
\t\t\t\tedAll.forEach(function(el) {
\t\t\t\t\tel.disabled = true;
\t\t\t\t});
\t\t\t}
\t\t}

\t\tfor(let i=1;i<=3;i++){
\t\t\tDelegate(document).on('change', '[name=\"cosa_insufflare_' + i + '\"]', () => {
\t\t\t\tciOpenClose(i);
\t\t\t});
\t\t\tciOpenClose(i);
\t\t}

    });
</script>", "/partials/scheda_lavorazione_immobile.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/scheda_lavorazione_immobile.twig");
    }
}
