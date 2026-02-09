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

/* admin_pages.twig */
class __TwigTemplate_0dc0ab131f78e0ea828f211bf43b9909 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "admin_pages.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"row\">
\t<div class=\"col-md-12\"> 
\t\t<div class=\"folders\" id=\"folderContainer\">
\t\t";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pages", [], "any", false, false, false, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 7
            echo "\t\t<div class=\"folder\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 7), "html", null, true);
            echo "\">
\t\t\t<img src=\"";
            // line 8
            echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
            echo "assets/img/php.png\">
\t\t\t<label>";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "name", [], "any", false, false, false, 9), "html", null, true);
            echo "</label>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "\t\t</div>
\t</div>
</div>
<script>

\tdocument.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('click', '.folder', function() {
\t\t\twindow.location.href = `\${res.path}admin-page/\${this.dataset.id}`;
\t\t});

\t\tvoid new Sortable(document.getElementById('folderContainer'), {
\t\t\tonSort: function (evt) {
\t\t\t\tlet sort = Array.from(document.querySelectorAll('.folder')).map(itm => itm.dataset.id);
\t\t\t\tpostRequest(`\${res.path}admin-page/order`, {ids: sort}, result => {
\t\t\t\t\tif (result.status == 1) {
\t\t\t\t\t\tvoid new resAlert('Operazione completata', 'Il nuovo ordine è stato applicato', {autoclose:true});
\t\t\t\t\t} else {
\t\t\t\t\t\tvoid new resAlert('Operazione fallita', result.message, {type:'error'});
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
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
        return "admin_pages.twig";
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
        return array (  77 => 12,  68 => 9,  64 => 8,  59 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<div class=\"row\">
\t<div class=\"col-md-12\"> 
\t\t<div class=\"folders\" id=\"folderContainer\">
\t\t{% for page in data.pages %}
\t\t<div class=\"folder\" data-id=\"{{ page.id }}\">
\t\t\t<img src=\"{{theme}}assets/img/php.png\">
\t\t\t<label>{{ page.name }}</label>
\t\t</div>
\t\t{% endfor %}
\t\t</div>
\t</div>
</div>
<script>

\tdocument.addEventListener('DOMContentLoaded', function() {

\t\tDelegate(document).on('click', '.folder', function() {
\t\t\twindow.location.href = `\${res.path}admin-page/\${this.dataset.id}`;
\t\t});

\t\tvoid new Sortable(document.getElementById('folderContainer'), {
\t\t\tonSort: function (evt) {
\t\t\t\tlet sort = Array.from(document.querySelectorAll('.folder')).map(itm => itm.dataset.id);
\t\t\t\tpostRequest(`\${res.path}admin-page/order`, {ids: sort}, result => {
\t\t\t\t\tif (result.status == 1) {
\t\t\t\t\t\tvoid new resAlert('Operazione completata', 'Il nuovo ordine è stato applicato', {autoclose:true});
\t\t\t\t\t} else {
\t\t\t\t\t\tvoid new resAlert('Operazione fallita', result.message, {type:'error'});
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t});
\t});

</script>
{% endblock content %}", "admin_pages.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/admin_pages.twig");
    }
}
