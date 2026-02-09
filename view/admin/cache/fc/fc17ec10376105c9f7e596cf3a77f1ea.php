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

/* faq_list.twig */
class __TwigTemplate_60a91be0eb5c14a6fa40831fdecea36a extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "faq_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $this->loadTemplate("partials/pagination.twig", "faq_list.twig", 3)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 3)]));
        // line 4
        echo "<!--";
        echo twig_escape_filter($this->env, json_encode(($context["data"] ?? null), twig_constant("JSON_PRETTY_PRINT")), "html", null, true);
        echo "  -->
<div class=\"table-responsive dashboard-stage mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>Domanda</th>
                <th>Risposta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 15));
        foreach ($context['_seq'] as $context["_key"] => $context["faq"]) {
            echo "         
            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "domanda", [], "any", false, false, false, 17), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "risposta", [], "any", false, false, false, 18), "html", null, true);
            echo "</td>
                <td>
\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square-small ml5 edit-faq\" data-id=\"";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 22), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square-small ml5 delete-faq\" data-id=\"";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 25), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['faq'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>
</div>


<div class=\"kanban kanban-wrapper dashboard-stage\">
\t";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 39));
        foreach ($context['_seq'] as $context["_key"] => $context["faq"]) {
            // line 40
            echo "\t<div class=\"kanban-stage\">
\t\t<div class=\"kanban-card\">
            <p class=\"mb-1\"><b>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "domanda", [], "any", false, false, false, 42), "html", null, true);
            echo "</b></p>
            <p>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "risposta", [], "any", false, false, false, 43), "html", null, true);
            echo "</p>
            <div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t<div class=\"d-flex\">
                    <button type=\"button\" class=\"btn btn-success btn-square ml5 edit-faq\" data-id=\"";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getId", [], "method", false, false, false, 46), "html", null, true);
            echo "\">
\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square ml5 delete-faq\" data-id=\"";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getId", [], "method", false, false, false, 49), "html", null, true);
            echo "\">
\t\t\t\t\t\t<span class=\"fa fa-times\"></span>
\t\t\t\t\t</button>
                </div>\t
            </div>
\t\t</div>
\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['faq'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "</div>







<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-faq', function() {
            if (!confirm('Eliminare il contatto selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`/api/faq/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\tDelegate(document).on('click', '.edit-faq', function() {
                window.location.href = `/admin/faq/\${this.dataset.id}`;
        });
    }); 
/**/
</script>
";
        // line 87
        $this->loadTemplate("partials/pagination.twig", "faq_list.twig", 87)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 87)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "faq_list.twig";
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
        return array (  183 => 87,  151 => 57,  137 => 49,  131 => 46,  125 => 43,  121 => 42,  117 => 40,  113 => 39,  105 => 33,  91 => 25,  85 => 22,  78 => 18,  74 => 17,  67 => 15,  52 => 4,  50 => 3,  46 => 2,  35 => 1,);
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
                <th>Domanda</th>
                <th>Risposta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for faq in data.list %}         
            <tr>
                <td>{{ faq.domanda }}</td>
                <td>{{ faq.risposta }}</td>
                <td>
\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square-small ml5 edit-faq\" data-id=\"{{ faq.getId() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square-small ml5 delete-faq\" data-id=\"{{ faq.getId() }}\">
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


<div class=\"kanban kanban-wrapper dashboard-stage\">
\t{% for faq in data.list %}
\t<div class=\"kanban-stage\">
\t\t<div class=\"kanban-card\">
            <p class=\"mb-1\"><b>{{ faq.domanda }}</b></p>
            <p>{{ faq.risposta }}</p>
            <div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t<div class=\"d-flex\">
                    <button type=\"button\" class=\"btn btn-success btn-square ml5 edit-faq\" data-id=\"{{ contact.getId() }}\">
\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square ml5 delete-faq\" data-id=\"{{ contact.getId() }}\">
\t\t\t\t\t\t<span class=\"fa fa-times\"></span>
\t\t\t\t\t</button>
                </div>\t
            </div>
\t\t</div>
\t</div>
\t{% endfor %}
</div>







<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-faq', function() {
            if (!confirm('Eliminare il contatto selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`/api/faq/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\tDelegate(document).on('click', '.edit-faq', function() {
                window.location.href = `/admin/faq/\${this.dataset.id}`;
        });
    }); 
/**/
</script>
{% include 'partials/pagination.twig' with {'data':data.pagination} only %}
{% endblock content %}", "faq_list.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/faq_list.twig");
    }
}
