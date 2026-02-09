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

/* scheda_prodotto.twig */
class __TwigTemplate_4990265c4b5761051a8e82107050de8f extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "scheda_prodotto.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<section class=\"page_title ds s-pt-115 s-pb-65 s-pb-lg-85 s-pt-lg-145 bg-auto page_title s-parallax s-overlay\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12 text-center text-lg-left\">
\t\t\t\t<h1 class=\"color-main\">";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 7), "title", [], "any", false, false, false, 7), "html", null, true);
        echo "</h1>
\t\t\t\t<ol class=\"breadcrumb links-light\">
\t\t\t\t\t<li class=\"breadcrumb-item\">
\t\t\t\t\t\t<a href=\"/home\">Home</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"breadcrumb-item active\">
\t\t\t\t\t\t<span class=\"bg-maincolor\">Scheda prodotto</span>
\t\t\t\t\t</li>
\t\t\t\t</ol>
\t\t\t</div>

\t\t</div>
\t</div>
</section>

<section class=\"ls s-pt-60 s-pb-10 s-py-lg-100 s-py-xl-150 c-gutter-60 c-mb-50 c-mb-lg-0\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-7\">

\t\t\t\t<h1>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 27), "title", [], "any", false, false, false, 27), "html", null, true);
        echo "</h1>

\t\t\t\t";
        // line 29
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 29), "description", [], "any", false, false, false, 29);
        echo "
\t\t\t\t<!--
\t\t\t\t<p class=\"excerpt\">
\t\t\t\t\tNamber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
\t\t\t\t\tfacer possim assum.
\t\t\t\t</p>

\t\t\t\t<p>
\t\t\t\t\tLorem idolorame conseetur sadipscing elitdiam nonumy eirmod tempor invidunt ut labore et dolore
\t\t\t\t\tmagna aliquyam ersed diam voluptua vero eoet accusam et justo duo dolores et ea rebum. Stet clita
\t\t\t\t\tkasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet rem ipsum dolorsit amet
\t\t\t\t\tconsetetur sadipscing elitr:
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\tLorem idolorame conseetur sadipscing elitdiam nonumy eirmod tempor invidunt ut labore et dolore
\t\t\t\t\tmagna aliquyam ersed diam voluptua vero eoet accusam et justo duo dolores et ea rebum. Stet clita
\t\t\t\t\tkasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet rem ipsum dolorsit amet
\t\t\t\t\tconsetetur sadipscing elitr:
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\tLorem idolorame conseetur sadipscing elitdiam nonumy eirmod tempor invidunt ut labore et dolore
\t\t\t\t\tmagna aliquyam ersed diam voluptua vero eoet accusam et justo duo dolores et ea rebum. Stet clita
\t\t\t\t\tkasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet rem ipsum dolorsit amet
\t\t\t\t\tconsetetur sadipscing elitr:
\t\t\t\t</p>
\t\t\t\t<ul class=\"list-styled\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Lorem ipsum dolor sit amet</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Sint animi non ut sed</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Eaque blanditiis nemo</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Amet, consectetur adipisicing</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Blanditiis nemo quaerat</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t-->
\t\t\t</div>

\t\t\t<div class=\"col-lg-5 service-tab\">
\t\t\t\t<div class=\"mb-30\">
\t\t\t\t\t<img src=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 76), "getImage", [], "method", false, false, false, 76), "html", null, true);
        echo "\" alt=\"\">
\t\t\t\t</div>
\t\t\t\t<div id=\"accordion01\" role=\"tablist\">
\t\t\t\t\t";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($__internal_compile_0 = ($context["f_nav"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["product"] ?? null) : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 80
            echo "\t\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 80) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 80), "id", [], "any", false, false, false, 80))) {
                // line 81
                echo "\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-header\" role=\"tab\" id=\"collapse";
                // line 82
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 82), "html", null, true);
                echo "_header\">
\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t<a class=\"collapsed\" data-toggle=\"collapse\" href=\"#collapse";
                // line 84
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 84), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 84), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t";
                // line 85
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getTitle", [], "method", false, false, false, 85), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"collapse";
                // line 89
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 89), "html", null, true);
                echo "\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"collapse";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 89), "html", null, true);
                echo "_header\" data-parent=\"#accordion01\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<div class=\"media align-items-center\">
\t\t\t\t\t\t\t\t\t<div class=\"media-left\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 93
                echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
                echo "scheda-prodotto/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getId", [], "method", false, false, false, 93), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 94
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "getImage", [], "method", false, false, false, 94), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t\t\tScheda di approfondimento
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 105
            echo "\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 106
        echo "\t\t\t\t</div>

\t\t\t\t<div class=\"ls ms mt-40 p-40\">
\t\t\t\t\t<form class=\"contact-form c-mb-10 c-gutter-10\" method=\"post\">
\t\t\t\t\t\t<h5 class=\"special-heading\">
\t\t\t\t\t\t\tCompila il form sottostante e sarai ricontattato telefonicamente per ricevere un preventivo
\t\t\t\t\t\t</h5>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Lavoriamo solo in Sicilia, in quale provincia si trova il tuo immobile?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select provincia\" name=\"provincia\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Scegli la provincia</option>
\t\t\t\t\t\t\t\t<option value=\"AG\">AGRIGENTO</option>
\t\t\t\t\t\t\t\t<option value=\"CL\">CALTANISSETTA</option>
\t\t\t\t\t\t\t\t<option value=\"CT\">CATANIA</option>
\t\t\t\t\t\t\t\t<option value=\"EN\">ENNA</option>
\t\t\t\t\t\t\t\t<option value=\"ME\">MESSINA</option>
\t\t\t\t\t\t\t\t<option value=\"PA\">PALERMO</option>
\t\t\t\t\t\t\t\t<option value=\"RG\">RAGUSA</option>
\t\t\t\t\t\t\t\t<option value=\"PA\">PALERMO</option>
\t\t\t\t\t\t\t\t<option value=\"TP\">TRAPANI</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>In quale comune?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select comune\" name=\"comune\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Scegli il comune</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>In quale condizione si trova il tuo immobile?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select\" name=\"stato_immobile\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Ad es. in ristrutturazione</option>
\t\t\t\t\t\t\t\t<option value=\"in costruzione\">In costruzione</option>
\t\t\t\t\t\t\t\t<option value=\"in ristrutturazione\">In ristrutturazione</option>
\t\t\t\t\t\t\t\t<option value=\"ci vivo dentro\">Ci vivo dentro</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Cosa vuoi isolare?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select\" name=\"isolamento_immobile\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Ad es. muri perimetrali</option>
\t\t\t\t\t\t\t\t<option value=\"muri perimetrali\">Muri perimetrali</option>
\t\t\t\t\t\t\t\t<option value=\"tetto\">Tetto</option>
\t\t\t\t\t\t\t\t<option value=\"solaio\">Solaio</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Quando vuoi iniziare i lavori?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select\" name=\"lavori_immobile\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Ad es. subito</option>
\t\t\t\t\t\t\t\t<option value=\"subito\">Subito</option>
\t\t\t\t\t\t\t\t<option value=\"1 - 3 mesi\">1 - 3 Mesi</option>
\t\t\t\t\t\t\t\t<option value=\"3 - 6 mesi\">3 - 6 Mesi</option>
\t\t\t\t\t\t\t\t<option value=\"non so\">Non so</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder d-none\">
\t\t\t\t\t\t\t<textarea rows=\"7\" cols=\"45\" name=\"messaggio\" class=\"form-control\" placeholder=\"Descrivi il problema\" required>Voglio insufflare il mio immobile con: ";
        // line 173
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 173), "title", [], "any", false, false, false, 173), "html", null, true);
        echo "</textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Inserisci le informazioni richieste di seguito, le useremo per contattarti ed inviarti il preventivo richiesto.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"name\">Nome <span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t<input type=\"text\" size=\"30\" value=\"\" name=\"nome\" class=\"form-control\" placeholder=\"Nome\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"surname\">Cognome <span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<input type=\"text\" size=\"30\" value=\"\" name=\"cognome\" class=\"form-control\" placeholder=\"Cognome\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"phone\">Telefono<span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<i class=\"fa fa-phone\"></i>
\t\t\t\t\t\t\t<input type=\"text\" size=\"30\" value=\"\" name=\"telefono\" class=\"form-control\" placeholder=\"Telefono\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"email\">Email<span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<i class=\"fa fa-envelope\"></i>
\t\t\t\t\t\t\t<input type=\"email\" size=\"30\" value=\"\" name=\"email\" class=\"form-control\" placeholder=\"Email\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<button type=\"button\" id=\"send-form\" class=\"btn btn-wide btn-small btn-maincolor with-icon \">Invia</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<script>

 document.addEventListener('DOMContentLoaded', function() {

\tDelegate(document).on('change', '.provincia', function(event) {
\t\tlet provincia = document.querySelector('.provincia');
\t\tHttpRequest.post(`/api/address/getCity`, { state: provincia.value }, response => {
\t\t\tif (response.status != 1) {
\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t}
\t\t\tlet comune = document.querySelector('.comune');
\t\t\tresponse.result.list.forEach(item => {
\t\t\t\tconst option = document.createElement('option');
\t\t\t\toption.value = item._key;
\t\t\t\toption.text = item._value;
\t\t\t\tcomune.add(option);
\t\t\t});
\t\t});
\t\t/**/
\t});

\tDelegate(document).on('click', '#send-form', function(event) {
\t\tconst badElements = document.querySelectorAll('.bad');
\t\tbadElements.forEach(element => {
\t\t\telement.classList.remove('bad');
\t\t});
\t\tlet _frm = document.querySelector('.contact-form');
\t\tlet validation = (new FormValidator({alerts: false})).checkAll(_frm);
\t\tconsole.log(validation);
\t\tif (!validation.valid) {
\t\t\tvalidation.fields.forEach(entry => {
\t\t\t\tentry.field.closest('.form-group').classList.toggle('bad', !entry.valid);
\t\t\t});
\t\t} else {
\t\t\tlet data = (new FormSerializer(_frm)).serialize();
\t\t\tthis.classList.add('invisible');
\t\t\tHttpRequest.post(`/api/richiedi-preventivo`, {...data, piattaforma: 'website' }, response => {
\t\t\t\tthis.classList.remove('invisible');
\t\t\t\tif (response.status != 1) {
\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t}
\t\t\t\tgtag_report_conversion('/ok');
\t\t\t});
\t\t}
\t});
\t
});

</script>

";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "scheda_prodotto.twig";
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
        return array (  272 => 173,  203 => 106,  197 => 105,  183 => 94,  177 => 93,  168 => 89,  161 => 85,  155 => 84,  150 => 82,  147 => 81,  144 => 80,  140 => 79,  134 => 76,  84 => 29,  79 => 27,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<section class=\"page_title ds s-pt-115 s-pb-65 s-pb-lg-85 s-pt-lg-145 bg-auto page_title s-parallax s-overlay\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12 text-center text-lg-left\">
\t\t\t\t<h1 class=\"color-main\">{{ data.product.title }}</h1>
\t\t\t\t<ol class=\"breadcrumb links-light\">
\t\t\t\t\t<li class=\"breadcrumb-item\">
\t\t\t\t\t\t<a href=\"/home\">Home</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"breadcrumb-item active\">
\t\t\t\t\t\t<span class=\"bg-maincolor\">Scheda prodotto</span>
\t\t\t\t\t</li>
\t\t\t\t</ol>
\t\t\t</div>

\t\t</div>
\t</div>
</section>

<section class=\"ls s-pt-60 s-pb-10 s-py-lg-100 s-py-xl-150 c-gutter-60 c-mb-50 c-mb-lg-0\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-7\">

\t\t\t\t<h1>{{ data.product.title }}</h1>

\t\t\t\t{{ data.product.description | raw }}
\t\t\t\t<!--
\t\t\t\t<p class=\"excerpt\">
\t\t\t\t\tNamber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
\t\t\t\t\tfacer possim assum.
\t\t\t\t</p>

\t\t\t\t<p>
\t\t\t\t\tLorem idolorame conseetur sadipscing elitdiam nonumy eirmod tempor invidunt ut labore et dolore
\t\t\t\t\tmagna aliquyam ersed diam voluptua vero eoet accusam et justo duo dolores et ea rebum. Stet clita
\t\t\t\t\tkasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet rem ipsum dolorsit amet
\t\t\t\t\tconsetetur sadipscing elitr:
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\tLorem idolorame conseetur sadipscing elitdiam nonumy eirmod tempor invidunt ut labore et dolore
\t\t\t\t\tmagna aliquyam ersed diam voluptua vero eoet accusam et justo duo dolores et ea rebum. Stet clita
\t\t\t\t\tkasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet rem ipsum dolorsit amet
\t\t\t\t\tconsetetur sadipscing elitr:
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\tLorem idolorame conseetur sadipscing elitdiam nonumy eirmod tempor invidunt ut labore et dolore
\t\t\t\t\tmagna aliquyam ersed diam voluptua vero eoet accusam et justo duo dolores et ea rebum. Stet clita
\t\t\t\t\tkasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet rem ipsum dolorsit amet
\t\t\t\t\tconsetetur sadipscing elitr:
\t\t\t\t</p>
\t\t\t\t<ul class=\"list-styled\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Lorem ipsum dolor sit amet</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Sint animi non ut sed</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Eaque blanditiis nemo</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Amet, consectetur adipisicing</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"javascript:void(0);\">Blanditiis nemo quaerat</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t-->
\t\t\t</div>

\t\t\t<div class=\"col-lg-5 service-tab\">
\t\t\t\t<div class=\"mb-30\">
\t\t\t\t\t<img src=\"{{ data.product.getImage() }}\" alt=\"\">
\t\t\t\t</div>
\t\t\t\t<div id=\"accordion01\" role=\"tablist\">
\t\t\t\t\t{% for product in f_nav['product'] %}
\t\t\t\t\t{% if  product.getId() != data.product.id %}
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-header\" role=\"tab\" id=\"collapse{{ product.getId() }}_header\">
\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t<a class=\"collapsed\" data-toggle=\"collapse\" href=\"#collapse{{ product.getId() }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ product.getId() }}\">
\t\t\t\t\t\t\t\t\t{{ product.getTitle() }}
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"collapse{{ product.getId() }}\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"collapse{{ product.getId() }}_header\" data-parent=\"#accordion01\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<div class=\"media align-items-center\">
\t\t\t\t\t\t\t\t\t<div class=\"media-left\">
\t\t\t\t\t\t\t\t\t\t<a href=\"{{ path }}scheda-prodotto/{{ product.getId() }}\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"{{ product.getImage() }}\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t\t\tScheda di approfondimento
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% endfor %}
\t\t\t\t</div>

\t\t\t\t<div class=\"ls ms mt-40 p-40\">
\t\t\t\t\t<form class=\"contact-form c-mb-10 c-gutter-10\" method=\"post\">
\t\t\t\t\t\t<h5 class=\"special-heading\">
\t\t\t\t\t\t\tCompila il form sottostante e sarai ricontattato telefonicamente per ricevere un preventivo
\t\t\t\t\t\t</h5>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Lavoriamo solo in Sicilia, in quale provincia si trova il tuo immobile?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select provincia\" name=\"provincia\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Scegli la provincia</option>
\t\t\t\t\t\t\t\t<option value=\"AG\">AGRIGENTO</option>
\t\t\t\t\t\t\t\t<option value=\"CL\">CALTANISSETTA</option>
\t\t\t\t\t\t\t\t<option value=\"CT\">CATANIA</option>
\t\t\t\t\t\t\t\t<option value=\"EN\">ENNA</option>
\t\t\t\t\t\t\t\t<option value=\"ME\">MESSINA</option>
\t\t\t\t\t\t\t\t<option value=\"PA\">PALERMO</option>
\t\t\t\t\t\t\t\t<option value=\"RG\">RAGUSA</option>
\t\t\t\t\t\t\t\t<option value=\"PA\">PALERMO</option>
\t\t\t\t\t\t\t\t<option value=\"TP\">TRAPANI</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>In quale comune?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select comune\" name=\"comune\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Scegli il comune</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>In quale condizione si trova il tuo immobile?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select\" name=\"stato_immobile\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Ad es. in ristrutturazione</option>
\t\t\t\t\t\t\t\t<option value=\"in costruzione\">In costruzione</option>
\t\t\t\t\t\t\t\t<option value=\"in ristrutturazione\">In ristrutturazione</option>
\t\t\t\t\t\t\t\t<option value=\"ci vivo dentro\">Ci vivo dentro</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Cosa vuoi isolare?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select\" name=\"isolamento_immobile\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Ad es. muri perimetrali</option>
\t\t\t\t\t\t\t\t<option value=\"muri perimetrali\">Muri perimetrali</option>
\t\t\t\t\t\t\t\t<option value=\"tetto\">Tetto</option>
\t\t\t\t\t\t\t\t<option value=\"solaio\">Solaio</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Quando vuoi iniziare i lavori?</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<select class=\"form-select\" name=\"lavori_immobile\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t<option value=\"\">Ad es. subito</option>
\t\t\t\t\t\t\t\t<option value=\"subito\">Subito</option>
\t\t\t\t\t\t\t\t<option value=\"1 - 3 mesi\">1 - 3 Mesi</option>
\t\t\t\t\t\t\t\t<option value=\"3 - 6 mesi\">3 - 6 Mesi</option>
\t\t\t\t\t\t\t\t<option value=\"non so\">Non so</option>
\t\t\t\t\t\t\t<select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder d-none\">
\t\t\t\t\t\t\t<textarea rows=\"7\" cols=\"45\" name=\"messaggio\" class=\"form-control\" placeholder=\"Descrivi il problema\" required>Voglio insufflare il mio immobile con: {{ data.product.title }}</textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder text-left\">
\t\t\t\t\t\t\t<p>Inserisci le informazioni richieste di seguito, le useremo per contattarti ed inviarti il preventivo richiesto.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"name\">Nome <span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t<input type=\"text\" size=\"30\" value=\"\" name=\"nome\" class=\"form-control\" placeholder=\"Nome\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"surname\">Cognome <span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<input type=\"text\" size=\"30\" value=\"\" name=\"cognome\" class=\"form-control\" placeholder=\"Cognome\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"phone\">Telefono<span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<i class=\"fa fa-phone\"></i>
\t\t\t\t\t\t\t<input type=\"text\" size=\"30\" value=\"\" name=\"telefono\" class=\"form-control\" placeholder=\"Telefono\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-group has-placeholder\">
\t\t\t\t\t\t\t<label for=\"email\">Email<span class=\"required\">*</span></label>
\t\t\t\t\t\t\t<i class=\"fa fa-envelope\"></i>
\t\t\t\t\t\t\t<input type=\"email\" size=\"30\" value=\"\" name=\"email\" class=\"form-control\" placeholder=\"Email\" required>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<button type=\"button\" id=\"send-form\" class=\"btn btn-wide btn-small btn-maincolor with-icon \">Invia</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<script>

 document.addEventListener('DOMContentLoaded', function() {

\tDelegate(document).on('change', '.provincia', function(event) {
\t\tlet provincia = document.querySelector('.provincia');
\t\tHttpRequest.post(`/api/address/getCity`, { state: provincia.value }, response => {
\t\t\tif (response.status != 1) {
\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t}
\t\t\tlet comune = document.querySelector('.comune');
\t\t\tresponse.result.list.forEach(item => {
\t\t\t\tconst option = document.createElement('option');
\t\t\t\toption.value = item._key;
\t\t\t\toption.text = item._value;
\t\t\t\tcomune.add(option);
\t\t\t});
\t\t});
\t\t/**/
\t});

\tDelegate(document).on('click', '#send-form', function(event) {
\t\tconst badElements = document.querySelectorAll('.bad');
\t\tbadElements.forEach(element => {
\t\t\telement.classList.remove('bad');
\t\t});
\t\tlet _frm = document.querySelector('.contact-form');
\t\tlet validation = (new FormValidator({alerts: false})).checkAll(_frm);
\t\tconsole.log(validation);
\t\tif (!validation.valid) {
\t\t\tvalidation.fields.forEach(entry => {
\t\t\t\tentry.field.closest('.form-group').classList.toggle('bad', !entry.valid);
\t\t\t});
\t\t} else {
\t\t\tlet data = (new FormSerializer(_frm)).serialize();
\t\t\tthis.classList.add('invisible');
\t\t\tHttpRequest.post(`/api/richiedi-preventivo`, {...data, piattaforma: 'website' }, response => {
\t\t\t\tthis.classList.remove('invisible');
\t\t\t\tif (response.status != 1) {
\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t}
\t\t\t\tgtag_report_conversion('/ok');
\t\t\t});
\t\t}
\t});
\t
});

</script>

{% endblock content %}", "scheda_prodotto.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/website/scheda_prodotto.twig");
    }
}
