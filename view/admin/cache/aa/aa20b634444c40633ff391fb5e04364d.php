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

/* admin_page.twig */
class __TwigTemplate_7d51d166a7684b3c31a7951027c30dea extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "admin_page.twig", 1);
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
\t\t\t<div class=\"head\">
\t\t\t\t<div class=\"icon fa fa-pencil\"></div>
\t\t\t\t<p class=\"title\">Gestione pagina</p>
\t\t\t</div>
\t\t\t<div class=\"content\">
\t\t\t\t<form class=\"form-horizontal admin-page-form\" action=\"javascript:void(0);\" method=\"POST\">
\t\t\t\t\t<input type=\"hidden\" name=\"params.id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 12), "getId", [], "method", false, false, false, 12), "html", null, true);
        echo "\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Nome pagina</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.name\" class=\"form-control reqField\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 16), "getName", [], "method", false, false, false, 16), "html", null, true);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-md-3 control-label\">Categoria</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<select class=\"form-control\" name=\"params.id_admin_page_category\">
\t\t\t\t\t\t\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "categories", [], "any", false, false, false, 23));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 24
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 24), "html", null, true);
            echo "\" ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "categoryId", [], "any", false, false, false, 24) == twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 24))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 24), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Visibile nel men&ugrave;</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.visible\" value=\"1\" ";
        // line 33
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 33), "isVisible", [], "method", false, false, false, 33)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.visible\" value=\"0\" ";
        // line 36
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 36), "isVisible", [], "method", false, false, false, 36)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Pubblica</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_public\" value=\"1\" ";
        // line 44
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 44), "isPublic", [], "method", false, false, false, 44)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_public\" value=\"0\" ";
        // line 47
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 47), "isPublic", [], "method", false, false, false, 47)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Abilitata di default</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_default\" value=\"1\" ";
        // line 55
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 55), "isDefault", [], "method", false, false, false, 55)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_default\" value=\"0\" ";
        // line 58
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 58), "isDefault", [], "method", false, false, false, 58)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Men&ugrave; laterale</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_nav\" value=\"1\" ";
        // line 66
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 66), "hasNav", [], "method", false, false, false, 66)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_nav\" value=\"0\" ";
        // line 69
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 69), "hasNav", [], "method", false, false, false, 69)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Barra superiore</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_topbar\" value=\"1\" ";
        // line 77
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 77), "hasTopbar", [], "method", false, false, false, 77)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_topbar\" value=\"0\" ";
        // line 80
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 80), "hasTopbar", [], "method", false, false, false, 80)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Titolo di pagina e azioni</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_pagebar\" value=\"1\" ";
        // line 88
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 88), "hasPagebar", [], "method", false, false, false, 88)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_pagebar\" value=\"0\" ";
        // line 91
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 91), "hasPagebar", [], "method", false, false, false, 91)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Link esterno</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"1\" ";
        // line 99
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 99), "isExternal", [], "method", false, false, false, 99)) ? ("checked") : (""));
        echo "> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"0\" ";
        // line 102
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 102), "isExternal", [], "method", false, false, false, 102)) ? ("") : ("checked"));
        echo "> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Apertura</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_new_page\" value=\"0\" ";
        // line 110
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 110), "isNewPage", [], "method", false, false, false, 110)) ? ("") : ("checked"));
        echo "> Stessa pagina
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_new_page\" value=\"1\" ";
        // line 113
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 113), "isNewPage", [], "method", false, false, false, 113)) ? ("checked") : (""));
        echo "> Nuova pagina
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">URL</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.url\" class=\"form-control reqField\" value=\"";
        // line 120
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 120), "getUrl", [], "method", false, false, false, 120), "html", null, true);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Template Twig</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.view\" class=\"form-control reqField\" value=\"";
        // line 126
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 126), "getView", [], "method", false, false, false, 126), "html", null, true);
        echo "\" ";
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 126), "isExternal", [], "method", false, false, false, 126)) ? ("readonly") : (""));
        echo ">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Filtro</label>
\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.filter\" class=\"form-control\" value=\"";
        // line 132
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 132), "getFilterName", [], "method", false, false, false, 132), "html", null, true);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Gruppi utente</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<div class=\"checkbox multiple\">
\t\t\t\t\t\t\t\t";
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_constant("User::ROLES"));
        foreach ($context['_seq'] as $context["roleId"] => $context["roleName"]) {
            // line 140
            echo "\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"params.roles[]\" value=\"";
            // line 141
            echo twig_escape_filter($this->env, $context["roleId"], "html", null, true);
            echo "\" ";
            echo Utils::flagInArray($context["roleId"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 141), "getUserRoles", [], "method", false, false, false, 141), "checked");
            echo ">";
            echo twig_escape_filter($this->env, $context["roleName"], "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['roleId'], $context['roleName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Ordine</label>
\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t<input type=\"number\" name=\"params.sort\" class=\"form-control monospace f16pt\" value=\"";
        // line 150
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "page", [], "any", false, false, false, 150), "getSort", [], "method", false, false, false, 150), "html", null, true);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t\t<div class=\"footer\">
\t\t\t\t<button class=\"btn btn-primary action submit\">
\t\t\t\t\t<span class=\"fa fa-check navyFont\"></span>&nbsp;APPLICA
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script>

\tdocument.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('change', 'input[name=\"is_external\"]', function() {
\t\t\tdocument.querySelector('input[name=\"view\"]').readOnly = (this.value == '1' && this.checked == true);
\t\t});

\t\tDelegate(document).on('click', '.action.submit', function() {
\t\t\tlet error = false;
\t\t\tlet _frm = document.querySelector('.admin-page-form');
\t\t\t_frm.querySelectorAll('.reqField:not([readonly])').forEach(itm => {
\t\t\t\tif (!Utils.validateString(itm.value)) {
\t\t\t\t\titm.closest('.form-group').classList.add('has-error');
\t\t\t\t\terror = true;
\t\t\t\t}
\t\t\t});
\t\t\tif (error) {
\t\t\t\treturn new resAlert('Dati mancanti', 'Uno o pi&ugrave; campi non sono stati compilati correttamente.', {type:'error'});
\t\t\t}
\t\t\t_frm.classList.add('loading-overlay');
\t\t\tthis.disabled = true;
\t\t\tlet serializer = new FormSerializer(_frm);
\t\t\tHttpRequest.post(`\${res.path}admin-page`, serializer.serialize(), 
\t\t\t\tresponse => {
\t\t\t\t\tif (response.status == 0) {
\t\t\t\t\t\t_frm.classList.remove('loading-overlay');
\t\t\t\t\t\tthis.disabled = false;
\t\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t\t}
\t\t\t\t\twindow.location.href = `\${res.path}admin-pages/\${response.result.categoryId}`;
\t\t\t\t}, 
\t\t\t\terror => {
\t\t\t\t\tvoid new resAlert('Operazione fallita', error.toString(), {type:'error'});
\t\t\t\t}
\t\t\t);
\t\t});

\t\tDelegate(document).on('click', '.delete-page', function() {
\t\t\tif (!confirm('Eliminare questa pagina?')) {
\t\t\t\treturn false;
\t\t\t}
\t\t\tthis.classList.add('loading');
\t\t\tHttpRequest.delete(`\${res.path}admin-page/\${this.dataset.id}`, {},
\t\t\t\tresponse => {
\t\t\t\t\tif (response.status == 0) {
\t\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t\t}
\t\t\t\t\twindow.location.href = `\${res.path}admin-pages/\${this.dataset.categoryId}`;
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
        return "admin_page.twig";
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
        return array (  297 => 150,  289 => 144,  276 => 141,  273 => 140,  269 => 139,  259 => 132,  248 => 126,  239 => 120,  229 => 113,  223 => 110,  212 => 102,  206 => 99,  195 => 91,  189 => 88,  178 => 80,  172 => 77,  161 => 69,  155 => 66,  144 => 58,  138 => 55,  127 => 47,  121 => 44,  110 => 36,  104 => 33,  95 => 26,  82 => 24,  78 => 23,  68 => 16,  61 => 12,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<div class=\"row\">
\t<div class=\"col-md-10 col-lg-8\">
\t\t<div class=\"widget\">
\t\t\t<div class=\"head\">
\t\t\t\t<div class=\"icon fa fa-pencil\"></div>
\t\t\t\t<p class=\"title\">Gestione pagina</p>
\t\t\t</div>
\t\t\t<div class=\"content\">
\t\t\t\t<form class=\"form-horizontal admin-page-form\" action=\"javascript:void(0);\" method=\"POST\">
\t\t\t\t\t<input type=\"hidden\" name=\"params.id\" value=\"{{ data.page.getId() }}\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Nome pagina</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.name\" class=\"form-control reqField\" value=\"{{ data.page.getName() }}\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-md-3 control-label\">Categoria</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<select class=\"form-control\" name=\"params.id_admin_page_category\">
\t\t\t\t\t\t\t\t{% for category in data.categories %}
\t\t\t\t\t\t\t\t<option value=\"{{ category.id }}\" {{ data.categoryId == category.id ? 'selected' : '' }}>{{ category.name }}</option>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Visibile nel men&ugrave;</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.visible\" value=\"1\" {{ data.page.isVisible() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.visible\" value=\"0\" {{ data.page.isVisible() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Pubblica</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_public\" value=\"1\" {{ data.page.isPublic() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_public\" value=\"0\" {{ data.page.isPublic() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Abilitata di default</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_default\" value=\"1\" {{ data.page.isDefault() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_default\" value=\"0\" {{ data.page.isDefault() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Men&ugrave; laterale</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_nav\" value=\"1\" {{ data.page.hasNav() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_nav\" value=\"0\" {{ data.page.hasNav() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Barra superiore</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_topbar\" value=\"1\" {{ data.page.hasTopbar() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_topbar\" value=\"0\" {{ data.page.hasTopbar() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Titolo di pagina e azioni</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_pagebar\" value=\"1\" {{ data.page.hasPagebar() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.has_pagebar\" value=\"0\" {{ data.page.hasPagebar() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Link esterno</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"1\" {{ data.page.isExternal() ? 'checked' : ''}}> SI
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_external\" value=\"0\" {{ data.page.isExternal() ? '' : 'checked'}}> NO
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Apertura</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_new_page\" value=\"0\" {{ data.page.isNewPage() ? '' : 'checked'}}> Stessa pagina
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"params.is_new_page\" value=\"1\" {{ data.page.isNewPage() ? 'checked' : ''}}> Nuova pagina
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">URL</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.url\" class=\"form-control reqField\" value=\"{{ data.page.getUrl() }}\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Template Twig</label>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.view\" class=\"form-control reqField\" value=\"{{ data.page.getView() }}\" {{ data.page.isExternal() ? 'readonly' : '' }}>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Filtro</label>
\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"params.filter\" class=\"form-control\" value=\"{{ data.page.getFilterName() }}\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Gruppi utente</label>
\t\t\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t\t\t<div class=\"checkbox multiple\">
\t\t\t\t\t\t\t\t{% for roleId, roleName in constant('User::ROLES') %}
\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"params.roles[]\" value=\"{{ roleId }}\" {{ flagInArray(roleId, data.page.getUserRoles(), 'checked') }}>{{ roleName }}
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3\">Ordine</label>
\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t<input type=\"number\" name=\"params.sort\" class=\"form-control monospace f16pt\" value=\"{{ data.page.getSort() }}\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t\t<div class=\"footer\">
\t\t\t\t<button class=\"btn btn-primary action submit\">
\t\t\t\t\t<span class=\"fa fa-check navyFont\"></span>&nbsp;APPLICA
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script>

\tdocument.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('change', 'input[name=\"is_external\"]', function() {
\t\t\tdocument.querySelector('input[name=\"view\"]').readOnly = (this.value == '1' && this.checked == true);
\t\t});

\t\tDelegate(document).on('click', '.action.submit', function() {
\t\t\tlet error = false;
\t\t\tlet _frm = document.querySelector('.admin-page-form');
\t\t\t_frm.querySelectorAll('.reqField:not([readonly])').forEach(itm => {
\t\t\t\tif (!Utils.validateString(itm.value)) {
\t\t\t\t\titm.closest('.form-group').classList.add('has-error');
\t\t\t\t\terror = true;
\t\t\t\t}
\t\t\t});
\t\t\tif (error) {
\t\t\t\treturn new resAlert('Dati mancanti', 'Uno o pi&ugrave; campi non sono stati compilati correttamente.', {type:'error'});
\t\t\t}
\t\t\t_frm.classList.add('loading-overlay');
\t\t\tthis.disabled = true;
\t\t\tlet serializer = new FormSerializer(_frm);
\t\t\tHttpRequest.post(`\${res.path}admin-page`, serializer.serialize(), 
\t\t\t\tresponse => {
\t\t\t\t\tif (response.status == 0) {
\t\t\t\t\t\t_frm.classList.remove('loading-overlay');
\t\t\t\t\t\tthis.disabled = false;
\t\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t\t}
\t\t\t\t\twindow.location.href = `\${res.path}admin-pages/\${response.result.categoryId}`;
\t\t\t\t}, 
\t\t\t\terror => {
\t\t\t\t\tvoid new resAlert('Operazione fallita', error.toString(), {type:'error'});
\t\t\t\t}
\t\t\t);
\t\t});

\t\tDelegate(document).on('click', '.delete-page', function() {
\t\t\tif (!confirm('Eliminare questa pagina?')) {
\t\t\t\treturn false;
\t\t\t}
\t\t\tthis.classList.add('loading');
\t\t\tHttpRequest.delete(`\${res.path}admin-page/\${this.dataset.id}`, {},
\t\t\t\tresponse => {
\t\t\t\t\tif (response.status == 0) {
\t\t\t\t\t\tthrow response.message ?? 'Errore generico';
\t\t\t\t\t}
\t\t\t\t\twindow.location.href = `\${res.path}admin-pages/\${this.dataset.categoryId}`;
\t\t\t\t}, 
\t\t\t\terror => {
\t\t\t\t\tvoid new resAlert('Operazione fallita', error.toString(), {type:'error'});
\t\t\t\t}
\t\t\t);
\t\t});

\t});

</script>
{% endblock content %}", "admin_page.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/admin_page.twig");
    }
}
