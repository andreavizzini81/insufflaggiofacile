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

/* dashboard.twig */
class __TwigTemplate_48649908f8d39dab54a116777d6bde7e extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "dashboard.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<!-- ";
        // line 4
        echo twig_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 4), twig_constant("JSON_PRETTY_PRINT")), "html", null, true);
        echo " -->

<div class=\"table-responsive dashboard-stage mb15\">
    <table class=\"bordered hover w100\">
        <thead>
\t\t\t<tr>
\t\t\t\t<th>Start / End</th>
                <th>Attività</th>
\t\t\t\t<th>Leads</th>
\t\t\t\t<th>Responsabile</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            echo "       
            <tr class=\"";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getColor", [], "method", false, false, false, 19), "html", null, true);
            echo "\">
\t\t\t\t<td><b>";
            // line 20
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getStartsAt", [], "method", false, false, false, 20), "d/m/Y"), "html", null, true);
            echo "</b> [";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getStartsAt", [], "method", false, false, false, 20), "H:i"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEndsAt", [], "method", false, false, false, 20), "H:i"), "html", null, true);
            echo "]</td>
                <td> ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getActivity", [], "method", false, false, false, 21), "html", null, true);
            echo "</td>
                <td><a href=\"/admin/";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntity", [], "method", false, false, false, 22), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntityId", [], "method", false, false, false, 22), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getSubject", [], "method", false, false, false, 22), "html", null, true);
            echo "</a></td>
\t\t\t\t<td> ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEventUserName", [], "method", false, false, false, 23), "html", null, true);
            echo " </td> 
\t\t\t\t";
            // line 24
            $__internal_compile_0 = $context;
            $__internal_compile_1 = ["contact" => twig_get_attribute($this->env, $this->source, $context["event"], "getEntityContact", [], "method", false, false, false, 24)];
            if (!is_iterable($__internal_compile_1)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 24, $this->getSourceContext());
            }
            $__internal_compile_1 = twig_to_array($__internal_compile_1);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_1));
            // line 25
            echo "\t\t\t\t<td>
                    <div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t";
            // line 28
            $__internal_compile_2 = $context;
            $__internal_compile_3 = ["contact" => twig_get_attribute($this->env, $this->source, $context["event"], "getEntityContact", [], "method", false, false, false, 28)];
            if (!is_iterable($__internal_compile_3)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 28, $this->getSourceContext());
            }
            $__internal_compile_3 = twig_to_array($__internal_compile_3);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_3));
            // line 29
            echo "\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square mr5\" href=\"tel:";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPhone", [], "method", false, false, false, 29), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-phone\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square mr5\" href=\"https://wa.me/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPhone", [], "method", false, false, false, 32), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fab fa-whatsapp\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
            // line 35
            if ((twig_get_attribute($this->env, $this->source, $context["event"], "getEmailAgency", [], "method", false, false, false, 35) == true)) {
                // line 36
                echo "\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square mr5 send-email-modal muted\" data-email=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getEmail", [], "method", false, false, false, 36), "html", null, true);
                echo "\" href=\"javascript:void(0);\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-envelope\"></span>
\t\t\t\t\t\t\t</a>  
\t\t\t\t\t\t\t";
            }
            // line 40
            echo "\t\t\t\t\t\t\t";
            $context = $__internal_compile_2;
            // line 41
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square ml5 edit-event\" data-title=\"";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getSubject", [], "method", false, false, false, 43), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "method", false, false, false, 43), "html", null, true);
            echo "\" data-entity=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntity", [], "method", false, false, false, 43), "html", null, true);
            echo "\" data-eid=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntityId", [], "method", false, false, false, 43), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-eye\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square ml5 delete-event\" data-id=\"";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "method", false, false, false, 46), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-times\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
                </td>
\t\t\t\t";
            $context = $__internal_compile_0;
            // line 53
            echo "            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "        </tbody>
    </table>
</div>
<div class=\"kanban kanban-wrapper dashboard-stage\">
\t";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 59));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            echo " 
\t<div class=\"kanban-stage ";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getColor", [], "method", false, false, false, 60), "html", null, true);
            echo "\">
\t\t<div class=\"kanban-card\">
            <p><b>";
            // line 62
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getStartsAt", [], "method", false, false, false, 62), "d/m/Y"), "html", null, true);
            echo "</b> [";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getStartsAt", [], "method", false, false, false, 62), "H:i"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEndsAt", [], "method", false, false, false, 62), "H:i"), "html", null, true);
            echo "]</p>
\t\t\t<p class=\"title\">";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getActivity", [], "method", false, false, false, 63), "html", null, true);
            echo "</p>
\t\t\t<div class=\"owner\">
\t\t\t\t<label data-prop=\"ownerLabel\">LEADS</label>
\t\t\t\t<a class=\"subject\" href=\"/admin/";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntity", [], "method", false, false, false, 66), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntityId", [], "method", false, false, false, 66), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getSubject", [], "method", false, false, false, 66), "html", null, true);
            echo "</a>
\t\t\t</div>
\t\t\t<div class=\"responsible\">
\t\t\t\t<label data-prop=\"ownerLabel\">RESPONSABILE</label>
\t\t\t\t<p class=\"name mb10\" data-prop=\"owner\">";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEventUserName", [], "method", false, false, false, 70), "html", null, true);
            echo "</p>
\t\t\t</div>
            <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"d-flex\">
\t\t\t\t\t";
            // line 74
            $__internal_compile_4 = $context;
            $__internal_compile_5 = ["contact" => twig_get_attribute($this->env, $this->source, $context["event"], "getEntityContact", [], "method", false, false, false, 74)];
            if (!is_iterable($__internal_compile_5)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 74, $this->getSourceContext());
            }
            $__internal_compile_5 = twig_to_array($__internal_compile_5);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_5));
            // line 75
            echo "\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"tel:";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPhone", [], "method", false, false, false, 75), "html", null, true);
            echo "\"> 
                        <span class=\"fa fa-phone\"></span> 
                    </a>
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"https://wa.me/";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getPhone", [], "method", false, false, false, 78), "html", null, true);
            echo "\">
                        <span class=\"fab fa-whatsapp\"></span>
                    </a>
\t\t\t\t\t";
            // line 81
            if ((twig_get_attribute($this->env, $this->source, $context["event"], "getEmailAgency", [], "method", false, false, false, 81) == true)) {
                // line 82
                echo "\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5 send-email-modal muted\" data-email=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact"] ?? null), "getEmail", [], "method", false, false, false, 82), "html", null, true);
                echo "\" href=\"javascript:void(0);\">
                        <span class=\"fa fa-envelope\"></span>
                    </a>  
\t\t\t\t\t";
            }
            // line 86
            echo "\t\t\t\t\t";
            $context = $__internal_compile_4;
            // line 87
            echo "                </div>
\t\t\t\t<div class=\"d-flex\">
                    <button type=\"button\" class=\"btn btn-success btn-lg btn-square ml5 action edit-event\" data-title=\"";
            // line 89
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getSubject", [], "method", false, false, false, 89), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "method", false, false, false, 89), "html", null, true);
            echo "\" data-entity=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntity", [], "method", false, false, false, 89), "html", null, true);
            echo "\" data-eid=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getEntityId", [], "method", false, false, false, 89), "html", null, true);
            echo "\">
                        <span class=\"fa fa-eye\"></span>
                    </button>
                    <button type=\"button\" class=\"btn btn-danger btn-lg  btn-square ml5 action delete-event\" data-id=\"";
            // line 92
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "getId", [], "method", false, false, false, 92), "html", null, true);
            echo "\">
                        <span class=\"fa fa-times\"></span>
                    </button>
                </div>\t
            </div>
\t\t</div>
\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-event', function() {
            if (!confirm('Imposti l\\'attività su eseguita?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.get(`/api/dashboardevents/\${this.dataset.id}/completed`, response => {
                console.log(response);
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'})); 
              
        });

        Delegate(document).on('click', '.edit-event', function() {
            endpoint = `\${res.absolutePath}api/\${this.dataset.entity}/\${this.dataset.eid}/event`;
            console.log(endpoint);
            void new CalendarEventModal(this.dataset.id, {
                endpoint: endpoint,
\t\t\t\ttitle: this.dataset.title,
                onSuccess: () => {
                    window.location.reload();
                }
            });
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
        return "dashboard.twig";
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
        return array (  297 => 100,  283 => 92,  271 => 89,  267 => 87,  264 => 86,  256 => 82,  254 => 81,  248 => 78,  241 => 75,  233 => 74,  226 => 70,  215 => 66,  209 => 63,  201 => 62,  196 => 60,  190 => 59,  184 => 55,  177 => 53,  167 => 46,  155 => 43,  151 => 41,  148 => 40,  140 => 36,  138 => 35,  132 => 32,  125 => 29,  117 => 28,  112 => 25,  104 => 24,  100 => 23,  92 => 22,  88 => 21,  80 => 20,  76 => 19,  70 => 18,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}

<!-- {{ data.list | json_encode(constant('JSON_PRETTY_PRINT')) }} -->

<div class=\"table-responsive dashboard-stage mb15\">
    <table class=\"bordered hover w100\">
        <thead>
\t\t\t<tr>
\t\t\t\t<th>Start / End</th>
                <th>Attività</th>
\t\t\t\t<th>Leads</th>
\t\t\t\t<th>Responsabile</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% for event in data.list %}       
            <tr class=\"{{ event.getColor() }}\">
\t\t\t\t<td><b>{{ event.getStartsAt() | date('d/m/Y') }}</b> [{{ event.getStartsAt() | date('H:i') }} / {{ event.getEndsAt() | date('H:i') }}]</td>
                <td> {{ event.getActivity() }}</td>
                <td><a href=\"/admin/{{ event.getEntity() }}/{{ event.getEntityId() }}\">{{ event.getSubject() }}</a></td>
\t\t\t\t<td> {{ event.getEventUserName() }} </td> 
\t\t\t\t{% with {contact: event.getEntityContact()} %}
\t\t\t\t<td>
                    <div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t{% with {contact: event.getEntityContact()} %}
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square mr5\" href=\"tel:{{ contact.getPhone() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-phone\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square mr5\" href=\"https://wa.me/{{ contact.getPhone() }}\">
\t\t\t\t\t\t\t\t<span class=\"fab fa-whatsapp\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t{% if event.getEmailAgency() == true %}
\t\t\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-square mr5 send-email-modal muted\" data-email=\"{{ contact.getEmail() }}\" href=\"javascript:void(0);\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-envelope\"></span>
\t\t\t\t\t\t\t</a>  
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% endwith %}
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"d-flex\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-success btn-square ml5 edit-event\" data-title=\"{{ event.getSubject() }}\" data-id=\"{{ event.getId() }}\" data-entity=\"{{ event.getEntity() }}\" data-eid=\"{{ event.getEntityId() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-eye\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-danger  btn-square ml5 delete-event\" data-id=\"{{ event.getId() }}\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-times\"></span>
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>\t
\t\t\t\t\t</div>
                </td>
\t\t\t\t{% endwith %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
<div class=\"kanban kanban-wrapper dashboard-stage\">
\t{% for event in data.list %} 
\t<div class=\"kanban-stage {{ event.getColor() }}\">
\t\t<div class=\"kanban-card\">
            <p><b>{{ event.getStartsAt() | date('d/m/Y') }}</b> [{{ event.getStartsAt() | date('H:i') }} / {{ event.getEndsAt() | date('H:i') }}]</p>
\t\t\t<p class=\"title\">{{ event.getActivity() }}</p>
\t\t\t<div class=\"owner\">
\t\t\t\t<label data-prop=\"ownerLabel\">LEADS</label>
\t\t\t\t<a class=\"subject\" href=\"/admin/{{ event.getEntity() }}/{{ event.getEntityId() }}\">{{ event.getSubject() }}</a>
\t\t\t</div>
\t\t\t<div class=\"responsible\">
\t\t\t\t<label data-prop=\"ownerLabel\">RESPONSABILE</label>
\t\t\t\t<p class=\"name mb10\" data-prop=\"owner\">{{ event.getEventUserName() }}</p>
\t\t\t</div>
            <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"d-flex\">
\t\t\t\t\t{% with {contact: event.getEntityContact()} %}
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"tel:{{ contact.getPhone() }}\"> 
                        <span class=\"fa fa-phone\"></span> 
                    </a>
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5\" href=\"https://wa.me/{{ contact.getPhone() }}\">
                        <span class=\"fab fa-whatsapp\"></span>
                    </a>
\t\t\t\t\t{% if event.getEmailAgency() == true %}
\t\t\t\t\t<a type=\"button\" class=\"btn btn-primary btn-lg btn-square mr5 send-email-modal muted\" data-email=\"{{ contact.getEmail() }}\" href=\"javascript:void(0);\">
                        <span class=\"fa fa-envelope\"></span>
                    </a>  
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% endwith %}
                </div>
\t\t\t\t<div class=\"d-flex\">
                    <button type=\"button\" class=\"btn btn-success btn-lg btn-square ml5 action edit-event\" data-title=\"{{ event.getSubject() }}\" data-id=\"{{ event.getId() }}\" data-entity=\"{{ event.getEntity() }}\" data-eid=\"{{ event.getEntityId() }}\">
                        <span class=\"fa fa-eye\"></span>
                    </button>
                    <button type=\"button\" class=\"btn btn-danger btn-lg  btn-square ml5 action delete-event\" data-id=\"{{ event.getId() }}\">
                        <span class=\"fa fa-times\"></span>
                    </button>
                </div>\t
            </div>
\t\t</div>
\t</div>
\t{% endfor %}
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-event', function() {
            if (!confirm('Imposti l\\'attività su eseguita?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.get(`/api/dashboardevents/\${this.dataset.id}/completed`, response => {
                console.log(response);
                if (response.status != 1) {
                    this.classList.remove('loading');
                    throw response.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'})); 
              
        });

        Delegate(document).on('click', '.edit-event', function() {
            endpoint = `\${res.absolutePath}api/\${this.dataset.entity}/\${this.dataset.eid}/event`;
            console.log(endpoint);
            void new CalendarEventModal(this.dataset.id, {
                endpoint: endpoint,
\t\t\t\ttitle: this.dataset.title,
                onSuccess: () => {
                    window.location.reload();
                }
            });
        });

    }); 

</script>
{% endblock content %}", "dashboard.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/dashboard.twig");
    }
}
