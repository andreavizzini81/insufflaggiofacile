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

/* review_list.twig */
class __TwigTemplate_7eebab0b86261933c39cc964a6f5fd89 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "review_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
";
        // line 4
        $this->loadTemplate("partials/pagination.twig", "review_list.twig", 4)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 4)]));
        // line 5
        echo "<div class=\"table-responsive mb15\">
    <table class=\"bordered hover w100\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Citt&agrave;</th>
                <th>Testo</th>
                <th>Data</th>
                <th>Canale</th>
                <th>Punteggio</th>
                <th>Opzioni</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
            // line 21
            echo "            <tr class=\"cursor-pointer\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getId", [], "method", false, false, false, 21), "html", null, true);
            echo "\">
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getId", [], "method", false, false, false, 22), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getName", [], "method", false, false, false, 23), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getCity", [], "method", false, false, false, 24), "html", null, true);
            echo "</td>
                <td class=\"w50\">";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getText", [], "method", false, false, false, 25), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "utils", [], "any", false, false, false, 26), "europeanDate", [twig_get_attribute($this->env, $this->source, $context["review"], "getDate", [], "method", false, false, false, 26)], "method", false, false, false, 26), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, (($__internal_compile_0 = twig_constant("Definitions::CHANNEL_TYPE")) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[(((twig_get_attribute($this->env, $this->source, $context["review"], "getChannel", [], "method", true, true, false, 27) &&  !(null === twig_get_attribute($this->env, $this->source, $context["review"], "getChannel", [], "method", false, false, false, 27)))) ? (twig_get_attribute($this->env, $this->source, $context["review"], "getChannel", [], "method", false, false, false, 27)) : ("1"))] ?? null) : null), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getScore", [], "method", false, false, false, 28), "html", null, true);
            echo "</td>
                <td>
                    <a class=\"action edit-review\" href=\"";
            // line 30
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "review-manager/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getId", [], "method", false, false, false, 30), "html", null, true);
            echo "\">
                        <span class=\"fas fa-pencil orangeFont\"></span>
                    </a>
                    <button class=\"action delete-review\" data-id=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "getId", [], "method", false, false, false, 33), "html", null, true);
            echo "\">
                        <span class=\"fas fa-trash redFont\"></span>
                    </button>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['review'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "        </tbody>
    </table>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        Delegate(document).on('click', '.delete-review', function() {
            if (!confirm('Eliminare la recensione selezionata?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.path}review/\${this.dataset.id}`, null, response => {
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
        // line 61
        $this->loadTemplate("partials/pagination.twig", "review_list.twig", 61)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 61)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "review_list.twig";
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
        return array (  154 => 61,  130 => 39,  118 => 33,  110 => 30,  105 => 28,  101 => 27,  97 => 26,  93 => 25,  89 => 24,  85 => 23,  81 => 22,  76 => 21,  72 => 20,  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
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
                <th>Nome</th>
                <th>Citt&agrave;</th>
                <th>Testo</th>
                <th>Data</th>
                <th>Canale</th>
                <th>Punteggio</th>
                <th>Opzioni</th>
            </tr>
        </thead>
        <tbody>
            {% for review in data.list %}
            <tr class=\"cursor-pointer\" data-id=\"{{ review.getId() }}\">
                <td>{{ review.getId() }}</td>
                <td>{{ review.getName() }}</td>
                <td>{{ review.getCity() }}</td>
                <td class=\"w50\">{{ review.getText() }}</td>
                <td>{{ data.utils.europeanDate(review.getDate()) }}</td>
                <td>{{ constant('Definitions::CHANNEL_TYPE')[review.getChannel() ?? '1'] }}</td>
                <td>{{ review.getScore() }}</td>
                <td>
                    <a class=\"action edit-review\" href=\"{{ path }}review-manager/{{ review.getId() }}\">
                        <span class=\"fas fa-pencil orangeFont\"></span>
                    </a>
                    <button class=\"action delete-review\" data-id=\"{{ review.getId() }}\">
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
        Delegate(document).on('click', '.delete-review', function() {
            if (!confirm('Eliminare la recensione selezionata?')) {
                return false;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.path}review/\${this.dataset.id}`, null, response => {
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
{% endblock content %}", "review_list.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/review_list.twig");
    }
}
