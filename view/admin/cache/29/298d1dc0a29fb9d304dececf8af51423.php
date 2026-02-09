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

/* user_list.twig */
class __TwigTemplate_bc419cc93af50b72e0848489d01e274b extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "user_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $this->loadTemplate("partials/pagination.twig", "user_list.twig", 3)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 3)]));
        // line 4
        echo "<div class=\"table-responsive mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Nome e cognome</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Stato</th>
                <th>Scadenza abb.</th>
                <th>Opzioni</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 20
            echo "            ";
            $context["status_class"] = ((twig_get_attribute($this->env, $this->source, $context["user"], "getIsActive", [], "method", false, false, false, 20)) ? ("success") : ("muted"));
            // line 21
            echo "            ";
            $context["status_text"] = ((twig_get_attribute($this->env, $this->source, $context["user"], "getIsActive", [], "method", false, false, false, 21)) ? ("ATTIVO") : ("NON ATTIVO"));
            // line 22
            echo "            <tr>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 23), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getRoleDescription", [], "method", false, false, false, 24), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "firstName", [], "any", false, false, false, 25), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lastName", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getEmail", [], "method", false, false, false, 26), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getPhone", [], "method", false, false, false, 27), "html", null, true);
            echo "</td>
                <td>
                    <div class=\"badge ";
            // line 29
            echo twig_escape_filter($this->env, ($context["status_class"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["status_text"] ?? null), "html", null, true);
            echo "</div>
                </td>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getSubscriptionExpiration", [], "method", false, false, false, 31), "d/m/Y"), "html", null, true);
            echo "</td>
                <td>
                    <a class=\"action edit-user\" href=\"";
            // line 33
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "user-manager/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 33), "html", null, true);
            echo "\">
                        <span class=\"fas fa-pencil orangeFont\"></span>
                    </a>
                    <button class=\"action delete-user\" data-id=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getId", [], "method", false, false, false, 36), "html", null, true);
            echo "\">
                        <span class=\"fas fa-trash redFont\"></span>
                    </button>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "        </tbody>
    </table>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-user', function() {
            if (!confirm('Eliminare l&rsquo;utente selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.path}user/\${this.dataset.id}`, null, response => {
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
        // line 64
        $this->loadTemplate("partials/pagination.twig", "user_list.twig", 64)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 64)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "user_list.twig";
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
        return array (  161 => 64,  137 => 42,  125 => 36,  117 => 33,  112 => 31,  105 => 29,  100 => 27,  96 => 26,  90 => 25,  86 => 24,  82 => 23,  79 => 22,  76 => 21,  73 => 20,  69 => 19,  52 => 4,  50 => 3,  46 => 2,  35 => 1,);
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
                <th>Tipo</th>
                <th>Nome e cognome</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Stato</th>
                <th>Scadenza abb.</th>
                <th>Opzioni</th>
            </tr>
        </thead>
        <tbody>
            {% for user in data.list %}
            {% set status_class = user.getIsActive() ? 'success' : 'muted' %}
            {% set status_text = user.getIsActive() ? 'ATTIVO' : 'NON ATTIVO' %}
            <tr>
                <td>{{ user.getId() }}</td>
                <td>{{ user.getRoleDescription() }}</td>
                <td>{{ user.firstName }} {{ user.lastName }}</td>
                <td>{{ user.getEmail() }}</td>
                <td>{{ user.getPhone() }}</td>
                <td>
                    <div class=\"badge {{ status_class}}\">{{ status_text }}</div>
                </td>
                <td>{{ user.getSubscriptionExpiration()|date('d/m/Y') }}</td>
                <td>
                    <a class=\"action edit-user\" href=\"{{ path }}user-manager/{{ user.getId() }}\">
                        <span class=\"fas fa-pencil orangeFont\"></span>
                    </a>
                    <button class=\"action delete-user\" data-id=\"{{ user.getId() }}\">
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
        Delegate(document).on('click', '.delete-user', function() {
            if (!confirm('Eliminare l&rsquo;utente selezionato?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.path}user/\${this.dataset.id}`, null, response => {
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
{% endblock content %}", "user_list.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/user_list.twig");
    }
}
