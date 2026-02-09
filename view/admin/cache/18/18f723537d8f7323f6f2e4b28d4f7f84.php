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

/* agency_list.twig */
class __TwigTemplate_381fde9dda6745ddfd3240f9fa28f239 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "agency_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $this->loadTemplate("partials/pagination.twig", "agency_list.twig", 3)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 3)]));
        // line 4
        echo "<div class=\"table-responsive mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrizione</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Opzioni</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 16));
        foreach ($context['_seq'] as $context["_key"] => $context["agency"]) {
            // line 17
            echo "            <tr>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 18), "html", null, true);
            echo "</td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getDescription", [], "method", false, false, false, 19), "html", null, true);
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getEmail", [], "method", false, false, false, 20), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getPhone", [], "method", false, false, false, 21), "html", null, true);
            echo "</td>
                <td>
                    <a class=\"action edit-agency\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "agency-manager/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 23), "html", null, true);
            echo "\">
                        <span class=\"fas fa-pencil orangeFont\"></span>
                    </a>
                    <button class=\"action delete-agency\" data-id=\"";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 26), "html", null, true);
            echo "\">
                        <span class=\"fas fa-trash redFont\"></span>
                    </button>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </tbody>
    </table>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-agency', function() {
            if (!confirm('Eliminare l&rsquo;agenzia selezionata?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.path}agency/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
    }); 

</script>
";
        // line 54
        $this->loadTemplate("partials/pagination.twig", "agency_list.twig", 54)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 54)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "agency_list.twig";
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
        return array (  134 => 54,  110 => 32,  98 => 26,  90 => 23,  85 => 21,  81 => 20,  77 => 19,  73 => 18,  70 => 17,  66 => 16,  52 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
{% include 'partials/pagination.twig' with {'data':data.pagination} only %}
<div class=\"table-responsive mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrizione</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Opzioni</th>
            </tr>
        </thead>
        <tbody>
            {% for agency in data.list %}
            <tr>
                <td>{{ agency.getId() }}</td>
                <td>{{ agency.getDescription() }}</td>
                <td>{{ agency.getEmail() }}</td>
                <td>{{ agency.getPhone() }}</td>
                <td>
                    <a class=\"action edit-agency\" href=\"{{ path }}agency-manager/{{ agency.getId() }}\">
                        <span class=\"fas fa-pencil orangeFont\"></span>
                    </a>
                    <button class=\"action delete-agency\" data-id=\"{{ agency.getId() }}\">
                        <span class=\"fas fa-trash redFont\"></span>
                    </button>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-agency', function() {
            if (!confirm('Eliminare l&rsquo;agenzia selezionata?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.path}agency/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
    }); 

</script>
{% include 'partials/pagination.twig' with {'data':data.pagination} only %}
{% endblock content %}", "agency_list.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/agency_list.twig");
    }
}
