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

/* insufflaggio_list.twig */
class __TwigTemplate_eac1cc9741258640686076431b3c22fc extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "insufflaggio_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $this->loadTemplate("partials/pagination.twig", "insufflaggio_list.twig", 3)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 3)]));
        // line 4
        echo "<!--";
        echo twig_escape_filter($this->env, json_encode(($context["data"] ?? null), twig_constant("JSON_PRETTY_PRINT")), "html", null, true);
        echo "  -->
<div class=\"table-responsive dashboard-stage mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th></th>
            </tr>
        </thead>
        <tbody> 
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 15));
        foreach ($context['_seq'] as $context["_key"] => $context["insufflaggio"]) {
            echo "         
            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["insufflaggio"], "title", [], "any", false, false, false, 17), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["insufflaggio"], "description", [], "any", false, false, false, 18), "html", null, true);
            echo "</td>
                <td>
\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square-small ml5 edit-insufflaggio\" data-id=\"";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["insufflaggio"], "getId", [], "method", false, false, false, 22), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square-small ml5 delete-insufflaggio\" data-id=\"";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["insufflaggio"], "getId", [], "method", false, false, false, 25), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-times\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['insufflaggio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-insufflaggio', function() {
            if (!confirm('Eliminare il contatto selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`/api/insufflaggio/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\tDelegate(document).on('click', '.edit-insufflaggio', function() {
                window.location.href = `/admin/insufflaggio/\${this.dataset.id}`;
        });
    }); 
/**/
</script>
";
        // line 60
        $this->loadTemplate("partials/pagination.twig", "insufflaggio_list.twig", 60)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 60)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "insufflaggio_list.twig";
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
        return array (  134 => 60,  105 => 33,  91 => 25,  85 => 22,  78 => 18,  74 => 17,  67 => 15,  52 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
{% include 'partials/pagination.twig' with {'data':data.pagination} only %}
<!--{{ data | json_encode(constant('JSON_PRETTY_PRINT')) }}  -->
<div class=\"table-responsive dashboard-stage mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Descrizione</th>
                <th></th>
            </tr>
        </thead>
        <tbody> 
            {% for insufflaggio in data.list %}         
            <tr>
                <td>{{ insufflaggio.title }}</td>
                <td>{{ insufflaggio.description }}</td>
                <td>
\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square-small ml5 edit-insufflaggio\" data-id=\"{{ insufflaggio.getId() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square-small ml5 delete-insufflaggio\" data-id=\"{{ insufflaggio.getId() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-times\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-insufflaggio', function() {
            if (!confirm('Eliminare il contatto selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`/api/insufflaggio/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\tDelegate(document).on('click', '.edit-insufflaggio', function() {
                window.location.href = `/admin/insufflaggio/\${this.dataset.id}`;
        });
    }); 
/**/
</script>
{% include 'partials/pagination.twig' with {'data':data.pagination} only %}
{% endblock content %}", "insufflaggio_list.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/insufflaggio_list.twig");
    }
}
