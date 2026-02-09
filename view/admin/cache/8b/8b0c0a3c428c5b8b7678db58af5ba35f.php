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

/* training_categories.twig */
class __TwigTemplate_223518ed5766d3be117307a96e732684 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "training_categories.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"folders training-folders\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "categories", [], "any", false, false, false, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 5
            echo "    <div class=\"training-folder folder\"  data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "getId", [], "method", false, false, false, 5), "html", null, true);
            echo "\">
        <img src=\"";
            // line 6
            echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
            echo "assets/img/folder.png\">
        <label>";
            // line 7
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "getTitle", [], "method", false, false, false, 7)), "html", null, true);
            echo "</label>
        ";
            // line 8
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasAdminRights", [], "method", false, false, false, 8)) {
                // line 9
                echo "        <div class=\"actions\">
            <button class=\"action edit-category text-orange\" data-id=\"";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "getId", [], "method", false, false, false, 10), "html", null, true);
                echo "\">
                <span class=\"fa fa-pencil\"></span>
            </button>
            <button class=\"action delete-category text-red\" data-id=\"";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "getId", [], "method", false, false, false, 13), "html", null, true);
                echo "\">
                <span class=\"fa fa-times\"></span>
            </button>
        </div>
        ";
            }
            // line 18
            echo "    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.training-folder', function(e) {
            if (!e.target.classList.contains('training-folder')) {
                return;
            }
            window.location = `\${res.path}training-category/\${this.dataset.id}`;
        });

        ";
        // line 32
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasAdminRights", [], "method", false, false, false, 32)) {
            // line 33
            echo "
        const foldersWrapper = document.querySelector('.folders');
    
        if (foldersWrapper) {
            void new Sortable(foldersWrapper, {
                swapThreshold: 1,
                animation: 150,
                onSort: function (evt) {
                    let items = foldersWrapper.querySelectorAll('.training-folder');
                    let sort = {};
                    items.forEach((item, index) => {
                        sort[index] = item.dataset.id;
                    });
                    foldersWrapper.classList.add('loading');
                    
                    HttpRequest.post(`\${res.absolutePath}api/training-category/sort`, {sort: sort}, (data, response) => {
                        foldersWrapper.classList.remove('loading');
                        if (data.status != 1) {
                            throw data.message ?? 'Errore generico';
                        }
                    }, err => resAlert.error('Operazione fallita', err.toString()));
                }
            });
        }

        Delegate(document).on('click', '.action.edit-category', function() {
            void new TrainingCategoryModal(this.dataset.id, {
                onSuccess: () => {
                    window.location.reload();
                }
            });
        });

        Delegate(document).on('click', '.action.delete-category', function() {
            if (!confirm('Confermi l\\'eliminazione della categoria e di tutti i contenuti ad essa collegati?')) {
                return;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.absolutePath}api/training-category/\${this.dataset.id}`, null, (data, response) => {
                if (data.status !== 1) {
                    this.classList.remove('loading');
                    throw data.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => resAlert('Operazione fallita', err.toString()));
        });

        Delegate(document).on('click', '.action.create-category', function() {
            void new TrainingCategoryModal(null, {
                onSuccess: () => {
                    window.location.reload();
                }
            });
        });

        ";
        }
        // line 89
        echo "
\t});

</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "training_categories.twig";
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
        return array (  170 => 89,  112 => 33,  110 => 32,  96 => 20,  89 => 18,  81 => 13,  75 => 10,  72 => 9,  70 => 8,  66 => 7,  62 => 6,  57 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}
<div class=\"folders training-folders\">
    {% for category in data.categories %}
    <div class=\"training-folder folder\"  data-id=\"{{ category.getId() }}\">
        <img src=\"{{ theme }}assets/img/folder.png\">
        <label>{{ category.getTitle()|upper }}</label>
        {% if user.hasAdminRights() %}
        <div class=\"actions\">
            <button class=\"action edit-category text-orange\" data-id=\"{{ category.getId() }}\">
                <span class=\"fa fa-pencil\"></span>
            </button>
            <button class=\"action delete-category text-red\" data-id=\"{{ category.getId() }}\">
                <span class=\"fa fa-times\"></span>
            </button>
        </div>
        {% endif %}
    </div>
    {% endfor %}
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.training-folder', function(e) {
            if (!e.target.classList.contains('training-folder')) {
                return;
            }
            window.location = `\${res.path}training-category/\${this.dataset.id}`;
        });

        {% if user.hasAdminRights() %}

        const foldersWrapper = document.querySelector('.folders');
    
        if (foldersWrapper) {
            void new Sortable(foldersWrapper, {
                swapThreshold: 1,
                animation: 150,
                onSort: function (evt) {
                    let items = foldersWrapper.querySelectorAll('.training-folder');
                    let sort = {};
                    items.forEach((item, index) => {
                        sort[index] = item.dataset.id;
                    });
                    foldersWrapper.classList.add('loading');
                    
                    HttpRequest.post(`\${res.absolutePath}api/training-category/sort`, {sort: sort}, (data, response) => {
                        foldersWrapper.classList.remove('loading');
                        if (data.status != 1) {
                            throw data.message ?? 'Errore generico';
                        }
                    }, err => resAlert.error('Operazione fallita', err.toString()));
                }
            });
        }

        Delegate(document).on('click', '.action.edit-category', function() {
            void new TrainingCategoryModal(this.dataset.id, {
                onSuccess: () => {
                    window.location.reload();
                }
            });
        });

        Delegate(document).on('click', '.action.delete-category', function() {
            if (!confirm('Confermi l\\'eliminazione della categoria e di tutti i contenuti ad essa collegati?')) {
                return;
            }
            this.classList.add('loading');
            HttpRequest.delete(`\${res.absolutePath}api/training-category/\${this.dataset.id}`, null, (data, response) => {
                if (data.status !== 1) {
                    this.classList.remove('loading');
                    throw data.message ?? 'Errore generico';
                }
                window.location.reload();
            }, err => resAlert('Operazione fallita', err.toString()));
        });

        Delegate(document).on('click', '.action.create-category', function() {
            void new TrainingCategoryModal(null, {
                onSuccess: () => {
                    window.location.reload();
                }
            });
        });

        {% endif %}

\t});

</script>
{% endblock content %}", "training_categories.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/training_categories.twig");
    }
}
