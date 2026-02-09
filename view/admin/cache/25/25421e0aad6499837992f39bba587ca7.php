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

/* contact_list.twig */
class __TwigTemplate_0430d047ffdd5e65f0999701fdc49900 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "contact_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $this->loadTemplate("partials/pagination.twig", "contact_list.twig", 3)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 3)]));
        // line 4
        echo "<!--";
        echo twig_escape_filter($this->env, json_encode(($context["data"] ?? null), twig_constant("JSON_PRETTY_PRINT")), "html", null, true);
        echo "  -->
<div class=\"table-responsive dashboard-stage mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>Nominativo/Rag.Sociale</th>
                <th>Provincia</th>
\t\t\t\t<th>Città</th>
\t\t\t\t<th>Leads</th>
\t\t\t\t<th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 19
            echo "            ";
            $context["contactName"] = (((twig_get_attribute($this->env, $this->source, $context["contact"], "getTypeId", [], "method", false, false, false, 19) == 0)) ? (((twig_get_attribute($this->env, $this->source, $context["contact"], "getFirstName", [], "method", false, false, false, 19) . " ") . twig_get_attribute($this->env, $this->source, $context["contact"], "getLastName", [], "method", false, false, false, 19))) : (twig_get_attribute($this->env, $this->source, $context["contact"], "getBusinessName", [], "method", false, false, false, 19)));
            echo "            
            <tr>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, ($context["contactName"] ?? null), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getState", [], "method", false, false, false, 22), "html", null, true);
            echo "</td>
\t\t\t\t<td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getCity", [], "method", false, false, false, 23), "html", null, true);
            echo "</td>
\t\t\t\t<td>
\t\t\t\t";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getCountDeals", [], "method", false, false, false, 25), "html", null, true);
            echo "
\t\t\t\t</td>
\t\t\t\t<td class=\"text-start\">
\t\t\t\t";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "getDeals", [], "method", false, false, false, 28));
            foreach ($context['_seq'] as $context["_key"] => $context["deal"]) {
                // line 29
                echo "\t\t\t\t\t<button type=\"button\" class=\"btn btn-warning btn-sm mb-1 view-deal\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["deal"], "id", [], "any", false, false, false, 29), "html", null, true);
                echo "\">
\t\t\t\t\t";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["deal"], "label", [], "any", false, false, false, 30), "html", null, true);
                echo "<br>
\t\t\t\t\t</button>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['deal'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "\t
\t\t\t\t</td>
                <td>
\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square-small mr5\" href=\"tel:";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getPhone", [], "method", false, false, false, 37), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-phone\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square-small mr5\" href=\"https://wa.me/";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getPhone", [], "method", false, false, false, 40), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fab fa-whatsapp\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square-small mr5 send-email-modal muted\" data-email=\"";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getEmail", [], "method", false, false, false, 43), "html", null, true);
            echo "\" href=\"javascript:void(0);\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-envelope\"></span>
\t\t\t\t\t\t\t</a>  
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square-small ml5 edit-contact\" data-id=\"";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getId", [], "method", false, false, false, 48), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square-small ml5 delete-contact\" data-id=\"";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getId", [], "method", false, false, false, 51), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "        </tbody>
    </table>
</div>


<div class=\"kanban kanban-wrapper dashboard-stage\">
\t";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 65));
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 66
            echo "\t";
            $context["contactName"] = (((twig_get_attribute($this->env, $this->source, $context["contact"], "getTypeId", [], "method", false, false, false, 66) == 0)) ? (((twig_get_attribute($this->env, $this->source, $context["contact"], "getFirstName", [], "method", false, false, false, 66) . " ") . twig_get_attribute($this->env, $this->source, $context["contact"], "getLastName", [], "method", false, false, false, 66))) : (twig_get_attribute($this->env, $this->source, $context["contact"], "getBusinessName", [], "method", false, false, false, 66)));
            echo "  
\t<div class=\"kanban-stage ";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "getColor", [], "method", false, false, false, 67), "html", null, true);
            echo "\">
\t\t<div class=\"kanban-card\">
            <p class=\"mb-1\"><b>";
            // line 69
            echo twig_escape_filter($this->env, ($context["contactName"] ?? null), "html", null, true);
            echo "</b><br>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getCity", [], "method", false, false, false, 69), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getState", [], "method", false, false, false, 69), "html", null, true);
            echo ")</p>
\t\t\t";
            // line 70
            if ((twig_get_attribute($this->env, $this->source, $context["contact"], "getCountDeals", [], "method", false, false, false, 70) > 0)) {
                // line 71
                echo "\t\t\t<div class=\"owner\">
\t\t\t\t<label data-prop=\"ownerLabel\">";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getCountDeals", [], "method", false, false, false, 72), "html", null, true);
                echo " LEADS</label>
\t\t\t\t";
                // line 73
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["contact"], "getDeals", [], "method", false, false, false, 73));
                foreach ($context['_seq'] as $context["_key"] => $context["deal"]) {
                    // line 74
                    echo "\t\t\t\t<button type=\"button\" class=\"btn btn-warning btn-sm my-2 view-deal\" data-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["deal"], "id", [], "any", false, false, false, 74), "html", null, true);
                    echo "\">
\t\t\t\t";
                    // line 75
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["deal"], "label", [], "any", false, false, false, 75), "html", null, true);
                    echo " [ID:";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["deal"], "id", [], "any", false, false, false, 75), "html", null, true);
                    echo "]
\t\t\t\t</button>
\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['deal'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 78
                echo "\t\t\t</div>
\t\t\t";
            }
            // line 80
            echo "            <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"d-flex\">
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"tel:";
            // line 82
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getPhone", [], "method", false, false, false, 82), "html", null, true);
            echo "\"> 
                        <span class=\"fa fa-phone\"></span> 
                    </a>
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"https://wa.me/";
            // line 85
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getPhone", [], "method", false, false, false, 85), "html", null, true);
            echo "\">
                        <span class=\"fab fa-whatsapp\"></span>
                    </a>
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5 send-email-modal muted\" data-email=\"";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getEmail", [], "method", false, false, false, 88), "html", null, true);
            echo "\" href=\"javascript:void(0);\">
                        <span class=\"fa fa-envelope\"></span>
                    </a>  
                </div>
\t\t\t\t<div class=\"d-flex\">
                    <button type=\"button\" class=\"btn btn-success btn-square ml5 edit-contact\" data-id=\"";
            // line 93
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getId", [], "method", false, false, false, 93), "html", null, true);
            echo "\">
\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square ml5 delete-contact\" data-id=\"";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "getId", [], "method", false, false, false, 96), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "</div>







<script>
    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-contact', function() {
            if (!confirm('Eliminare il contatto selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`/api/contact/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\tDelegate(document).on('click', '.edit-contact', function() {
                window.location.href = `/admin/contact/\${this.dataset.id}`;
        });
\t\tDelegate(document).on('click', '.view-deal', function() {
                window.location.href = `/admin/deal/\${this.dataset.id}`;
        });
    }); 

</script>
";
        // line 136
        $this->loadTemplate("partials/pagination.twig", "contact_list.twig", 136)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 136)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "contact_list.twig";
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
        return array (  305 => 136,  271 => 104,  257 => 96,  251 => 93,  243 => 88,  237 => 85,  231 => 82,  227 => 80,  223 => 78,  212 => 75,  207 => 74,  203 => 73,  199 => 72,  196 => 71,  194 => 70,  186 => 69,  181 => 67,  176 => 66,  172 => 65,  164 => 59,  150 => 51,  144 => 48,  136 => 43,  130 => 40,  124 => 37,  117 => 32,  108 => 30,  103 => 29,  99 => 28,  93 => 25,  88 => 23,  84 => 22,  80 => 21,  74 => 19,  70 => 18,  52 => 4,  50 => 3,  46 => 2,  35 => 1,);
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
                <th>Nominativo/Rag.Sociale</th>
                <th>Provincia</th>
\t\t\t\t<th>Città</th>
\t\t\t\t<th>Leads</th>
\t\t\t\t<th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for contact in data.list %}
            {% set contactName = contact.getTypeId() == 0 ? contact.getFirstName() ~ ' ' ~ contact.getLastName() : contact.getBusinessName() %}            
            <tr>
                <td>{{ contactName }}</td>
                <td>{{ contact.getState() }}</td>
\t\t\t\t<td>{{ contact.getCity() }}</td>
\t\t\t\t<td>
\t\t\t\t{{ contact.getCountDeals() }}
\t\t\t\t</td>
\t\t\t\t<td class=\"text-start\">
\t\t\t\t{% for deal in contact.getDeals() %}
\t\t\t\t\t<button type=\"button\" class=\"btn btn-warning btn-sm mb-1 view-deal\" data-id=\"{{ deal.id }}\">
\t\t\t\t\t{{ deal.label }}<br>
\t\t\t\t\t</button>
\t\t\t\t{% endfor %}\t
\t\t\t\t</td>
                <td>
\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square-small mr5\" href=\"tel:{{ contact.getPhone() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-phone\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square-small mr5\" href=\"https://wa.me/{{ contact.getPhone() }}\">
\t\t\t\t\t\t\t\t<span class=\"fab fa-whatsapp\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square-small mr5 send-email-modal muted\" data-email=\"{{ contact.getEmail() }}\" href=\"javascript:void(0);\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-envelope\"></span>
\t\t\t\t\t\t\t</a>  
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square-small ml5 edit-contact\" data-id=\"{{ contact.getId() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square-small ml5 delete-contact\" data-id=\"{{ contact.getId() }}\">
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
\t{% for contact in data.list %}
\t{% set contactName = contact.getTypeId() == 0 ? contact.getFirstName() ~ ' ' ~ contact.getLastName() : contact.getBusinessName() %}  
\t<div class=\"kanban-stage {{ event.getColor() }}\">
\t\t<div class=\"kanban-card\">
            <p class=\"mb-1\"><b>{{ contactName }}</b><br>{{ contact.getCity() }} ({{ contact.getState() }})</p>
\t\t\t{% if contact.getCountDeals() > 0 %}
\t\t\t<div class=\"owner\">
\t\t\t\t<label data-prop=\"ownerLabel\">{{ contact.getCountDeals() }} LEADS</label>
\t\t\t\t{% for deal in contact.getDeals() %}
\t\t\t\t<button type=\"button\" class=\"btn btn-warning btn-sm my-2 view-deal\" data-id=\"{{ deal.id }}\">
\t\t\t\t{{ deal.label }} [ID:{{ deal.id }}]
\t\t\t\t</button>
\t\t\t\t{% endfor %}
\t\t\t</div>
\t\t\t{% endif %}
            <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"d-flex\">
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"tel:{{ contact.getPhone() }}\"> 
                        <span class=\"fa fa-phone\"></span> 
                    </a>
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"https://wa.me/{{ contact.getPhone() }}\">
                        <span class=\"fab fa-whatsapp\"></span>
                    </a>
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5 send-email-modal muted\" data-email=\"{{ contact.getEmail() }}\" href=\"javascript:void(0);\">
                        <span class=\"fa fa-envelope\"></span>
                    </a>  
                </div>
\t\t\t\t<div class=\"d-flex\">
                    <button type=\"button\" class=\"btn btn-success btn-square ml5 edit-contact\" data-id=\"{{ contact.getId() }}\">
\t\t\t\t\t\t<span class=\"fa fa-pencil\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square ml5 delete-contact\" data-id=\"{{ contact.getId() }}\">
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
        Delegate(document).on('click', '.delete-contact', function() {
            if (!confirm('Eliminare il contatto selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`/api/contact/\${this.dataset.id}`, null, response => {
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });
\t\tDelegate(document).on('click', '.edit-contact', function() {
                window.location.href = `/admin/contact/\${this.dataset.id}`;
        });
\t\tDelegate(document).on('click', '.view-deal', function() {
                window.location.href = `/admin/deal/\${this.dataset.id}`;
        });
    }); 

</script>
{% include 'partials/pagination.twig' with {'data':data.pagination} only %}
{% endblock content %}", "contact_list.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/contact_list.twig");
    }
}
