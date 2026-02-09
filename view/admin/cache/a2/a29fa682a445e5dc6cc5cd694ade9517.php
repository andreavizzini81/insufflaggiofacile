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

/* admin_page_category.twig */
class __TwigTemplate_058ff25d0eee5ffd8ae5ac3f6ef403a1 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "admin_page_category.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"row\">
\t<div class=\"col-md-10 col-lg-8\">
\t\t<div class=\"widget\">
\t\t\t<div class=\"content\">
\t\t\t\t<fieldset>
\t\t\t\t\t<legend>DATI CATEGORIA</legend>
\t\t\t\t\t<div>
\t\t\t\t\t\t<form class=\"form-horizontal admin-page-category-form\" action=\"javascript:void(0);\" method=\"POST\">
\t\t\t\t\t\t\t";
        // line 11
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 11), "exists", [], "method", false, false, false, 11)) {
            // line 12
            echo "\t\t\t\t\t\t\t<input type=\"hidden\" name=\"params.id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 12), "getId", [], "method", false, false, false, 12), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t";
        }
        // line 14
        echo "\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Nome categoria</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"params.name\" class=\"form-control\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 17), "getName", [], "method", false, false, false, 17), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Classe icona</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"params.icon\" class=\"form-control\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 23), "getIcon", [], "method", false, false, false, 23), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Link</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_link\" value=\"1\" ";
        // line 30
        echo Utils::setCheckbox(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 30), "getIsLink", [], "method", false, false, false, 30), true);
        echo "> SI
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_link\" value=\"0\" ";
        // line 33
        echo Utils::setCheckbox(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 33), "getIsLink", [], "method", false, false, false, 33), false);
        echo "> NO
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Link esterno</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"1\" ";
        // line 41
        echo Utils::setCheckbox(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 41), "getIsExternal", [], "method", false, false, false, 41), true);
        echo "> SI
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"0\" ";
        // line 44
        echo Utils::setCheckbox(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 44), "getIsExternal", [], "method", false, false, false, 44), false);
        echo "> NO
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">URL</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"params.url\" class=\"form-control\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 51), "getUrl", [], "method", false, false, false, 51), "html", null, true);
        echo "\" ";
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 51), "getIsLink", [], "method", false, false, false, 51)) ? ("") : ("readonly"));
        echo ">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Ordine</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t<input type=\"number\" name=\"params.sort\" class=\"form-control\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "category", [], "any", false, false, false, 57), "getSort", [], "method", false, false, false, 57), "html", null, true);
        echo "\" min=\"0\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</fieldset>
\t\t\t</div>
\t\t</div>\t\t
\t</div>
</div>
<script>
\tdocument.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('change', 'input[name=\"params.is_link\"]', function() {
\t\t\tdocument.querySelector('input[name=\"params.url\"]').readOnly = (this.value == '0' && this.checked == true);
\t\t});

\t\tDelegate(document).on('click', '.action.submit', function() {

\t\t\tconst form = document.querySelector('.admin-page-category-form');
\t\t\tlet validator = new FormValidator();
\t\t\tconst validation = validator.checkAll(form);

\t\t\tif (!validation.valid) {
\t\t\t\tvalidation.fields.forEach(item => {
\t\t\t\t\tif (!item.valid) {
\t\t\t\t\t\titem.field.closest('.form-group').classList.add('has-error');
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\treturn resAlert.error('Operazione annullata', 'Uno o pi&ugrave; campi non sono stati compilati correttamente');
\t\t\t}

\t\t\tconst payload = FormSerializer.for(form).serialize();

\t\t\tthis.classList.add('loading');
\t\t\tHttpRequest.post(`\${res.path}admin-page-category/set`, payload, (data, response) => {
\t\t\t\tif (data.status !== 1) {
\t\t\t\t\tthrow data.message ?? 'Errore generico';
\t\t\t\t}
\t\t\t\twindow.location = `\${res.path}admin-page-categories`;
\t\t\t}, err => resAlert.error('Operazione fallita', err.toString()));
\t\t});

\t\tDelegate(document).on('click', '.action.delete-category', function() {
\t\t\tif (!confirm('Eliminare questa categoria e le relative pagine ?')) {
\t\t\t\treturn false;
\t\t\t}
\t\t\tthis.classList.add('loading');
\t\t\tHttpRequest.delete(`\${res.path}admin-page-category/\${this.dataset.id}`, {},
\t\t\t\tresponse => {
\t\t\t\t\tif (response.status == 0) {
\t\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t\t}
\t\t\t\t\twindow.location.href = `\${res.path}admin-page-categories`;
\t\t\t\t}, 
\t\t\t\terror => {
\t\t\t\t\tvoid new resAlert('Operazione fallita', error.toString(), {type:'error'});
\t\t\t\t}
\t\t\t);
\t\t});

\t});
</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "admin_page_category.twig";
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
        return array (  136 => 57,  125 => 51,  115 => 44,  109 => 41,  98 => 33,  92 => 30,  82 => 23,  73 => 17,  68 => 14,  62 => 12,  60 => 11,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<div class=\"row\">
\t<div class=\"col-md-10 col-lg-8\">
\t\t<div class=\"widget\">
\t\t\t<div class=\"content\">
\t\t\t\t<fieldset>
\t\t\t\t\t<legend>DATI CATEGORIA</legend>
\t\t\t\t\t<div>
\t\t\t\t\t\t<form class=\"form-horizontal admin-page-category-form\" action=\"javascript:void(0);\" method=\"POST\">
\t\t\t\t\t\t\t{% if data.category.exists() %}
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"params.id\" value=\"{{ data.category.getId() }}\">
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Nome categoria</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"params.name\" class=\"form-control\" value=\"{{ data.category.getName() }}\" required>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Classe icona</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"params.icon\" class=\"form-control\" value=\"{{ data.category.getIcon() }}\" required>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Link</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_link\" value=\"1\" {{ setCheckbox(data.category.getIsLink(), true) }}> SI
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_link\" value=\"0\" {{ setCheckbox(data.category.getIsLink(), false) }}> NO
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Link esterno</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"1\" {{ setCheckbox(data.category.getIsExternal(), true) }}> SI
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"0\" {{ setCheckbox(data.category.getIsExternal(), false) }}> NO
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">URL</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"params.url\" class=\"form-control\" value=\"{{ data.category.getUrl() }}\" {{ data.category.getIsLink() ? '' : 'readonly' }}>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"control-label col-md-3\">Ordine</label>
\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t<input type=\"number\" name=\"params.sort\" class=\"form-control\" value=\"{{ data.category.getSort() }}\" min=\"0\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</fieldset>
\t\t\t</div>
\t\t</div>\t\t
\t</div>
</div>
<script>
\tdocument.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('change', 'input[name=\"params.is_link\"]', function() {
\t\t\tdocument.querySelector('input[name=\"params.url\"]').readOnly = (this.value == '0' && this.checked == true);
\t\t});

\t\tDelegate(document).on('click', '.action.submit', function() {

\t\t\tconst form = document.querySelector('.admin-page-category-form');
\t\t\tlet validator = new FormValidator();
\t\t\tconst validation = validator.checkAll(form);

\t\t\tif (!validation.valid) {
\t\t\t\tvalidation.fields.forEach(item => {
\t\t\t\t\tif (!item.valid) {
\t\t\t\t\t\titem.field.closest('.form-group').classList.add('has-error');
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\treturn resAlert.error('Operazione annullata', 'Uno o pi&ugrave; campi non sono stati compilati correttamente');
\t\t\t}

\t\t\tconst payload = FormSerializer.for(form).serialize();

\t\t\tthis.classList.add('loading');
\t\t\tHttpRequest.post(`\${res.path}admin-page-category/set`, payload, (data, response) => {
\t\t\t\tif (data.status !== 1) {
\t\t\t\t\tthrow data.message ?? 'Errore generico';
\t\t\t\t}
\t\t\t\twindow.location = `\${res.path}admin-page-categories`;
\t\t\t}, err => resAlert.error('Operazione fallita', err.toString()));
\t\t});

\t\tDelegate(document).on('click', '.action.delete-category', function() {
\t\t\tif (!confirm('Eliminare questa categoria e le relative pagine ?')) {
\t\t\t\treturn false;
\t\t\t}
\t\t\tthis.classList.add('loading');
\t\t\tHttpRequest.delete(`\${res.path}admin-page-category/\${this.dataset.id}`, {},
\t\t\t\tresponse => {
\t\t\t\t\tif (response.status == 0) {
\t\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t\t}
\t\t\t\t\twindow.location.href = `\${res.path}admin-page-categories`;
\t\t\t\t}, 
\t\t\t\terror => {
\t\t\t\t\tvoid new resAlert('Operazione fallita', error.toString(), {type:'error'});
\t\t\t\t}
\t\t\t);
\t\t});

\t});
</script>
{% endblock content %}", "admin_page_category.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/admin_page_category.twig");
    }
}
