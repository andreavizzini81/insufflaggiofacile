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

/* blog_categories.twig */
class __TwigTemplate_85d3d15138df4e0f906ed186e0232b2c extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "blog_categories.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"row\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "categories", [], "any", false, false, false, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 5
            echo "    <div class=\"col-md-3\">
        <div class=\"panel panel-white blog-category\">
            <div class=\"panel-body\">
                <h2>
                    <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "blog-category/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 9), "html", null, true);
            echo "/articles\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "title", [], "any", false, false, false, 9), "html", null, true);
            echo "</a>
                </h2>
                <div class=\"actions\">
                    <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "blog-category/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 12), "html", null, true);
            echo "\">Modifica</a>
                    <a href=\"javascript:void(0);\" class=\"delete\" data-id=\"";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 13), "html", null, true);
            echo "\">Elimina</a>
                </div>
            </div>
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.blog-category .delete', function() {
            if (!confirm('Eliminare la categoria selezionata e TUTTI I RELATIVI ARTICOLI ?')) {
                return;
            }
            let _body = this.closest('.blog-category');
            _body.classList.add('loading');
            HttpRequest.delete(`\${res.path}blog-category/\${this.dataset.id}`, null, (data, response) => {
                if (data.status !== 1) {
                    _body.classList.remove('loading');
                    throw data.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
    });
</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "blog_categories.twig";
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
        return array (  91 => 19,  79 => 13,  73 => 12,  63 => 9,  57 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"row\">
    {% for category in data.categories %}
    <div class=\"col-md-3\">
        <div class=\"panel panel-white blog-category\">
            <div class=\"panel-body\">
                <h2>
                    <a href=\"{{ path }}blog-category/{{ category.id }}/articles\">{{ category.title }}</a>
                </h2>
                <div class=\"actions\">
                    <a href=\"{{ path }}blog-category/{{ category.id }}\">Modifica</a>
                    <a href=\"javascript:void(0);\" class=\"delete\" data-id=\"{{ category.id }}\">Elimina</a>
                </div>
            </div>
        </div>
    </div>
    {% endfor %}
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.blog-category .delete', function() {
            if (!confirm('Eliminare la categoria selezionata e TUTTI I RELATIVI ARTICOLI ?')) {
                return;
            }
            let _body = this.closest('.blog-category');
            _body.classList.add('loading');
            HttpRequest.delete(`\${res.path}blog-category/\${this.dataset.id}`, null, (data, response) => {
                if (data.status !== 1) {
                    _body.classList.remove('loading');
                    throw data.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
    });
</script>
{% endblock content %}", "blog_categories.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/blog_categories.twig");
    }
}
