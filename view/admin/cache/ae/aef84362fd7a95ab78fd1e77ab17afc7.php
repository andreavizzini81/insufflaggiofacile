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

/* models_options.twig */
class __TwigTemplate_f0df0b0c830a8e46933f917d2ec34f13 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "models_options.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"widget\">
    <div class=\"head\">
        <span class=\"title\">Filtro lista modelli</span>
    </div>
    <div class=\"content\">
        <form action=\"javascript:void(0);\" method=\"get\" class=\"list-filter-form\" data-action=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "models-options\">
            <div class=\"row\">
                <div class=\"col-md-3\">
                    <div class=\"form-group\">
                        <label>Ricerca</label>
                        <input type=\"text\" class=\"form-control\" name=\"params[key]\" value=\"";
        // line 13
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 13), "key", [], "any", true, true, false, 13) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 13), "key", [], "any", false, false, false, 13)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 13), "key", [], "any", false, false, false, 13), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Ricerca per nome modello...\">
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <div class=\"form-group\">
                        <label>Marca</label>
                        <select class=\"form-control\" name=\"params[make_id]\">
                            <option value=\"\">Tutte le marche</option>
                            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "makes", [], "any", false, false, false, 21));
        foreach ($context['_seq'] as $context["_key"] => $context["make"]) {
            // line 22
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["make"], "id", [], "any", false, false, false, 22), "html", null, true);
            echo "\" ";
            echo Utils::setOption((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 22), "make_id", [], "any", true, true, false, 22) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 22), "make_id", [], "any", false, false, false, 22)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 22), "make_id", [], "any", false, false, false, 22)) : ("")), twig_get_attribute($this->env, $this->source, $context["make"], "id", [], "any", false, false, false, 22));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["make"], "description", [], "any", false, false, false, 22), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['make'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class=\"d-flex justify-content-end mb15\">
    <button class=\"apply-filter btn btn-primary\">APPLICA FILTRO</button>
</div>
<div class=\"row model-list-wrapper\">
    ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 35));
        foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
            // line 36
            echo "    ";
            $context["coverImage"] = twig_get_attribute($this->env, $this->source, $context["model"], "getCoverImage", [], "method", false, false, false, 36);
            // line 37
            echo "    <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-2\">
        <div class=\"model-card\" data-id=\"";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getId", [], "method", false, false, false, 38), "html", null, true);
            echo "\">
            <div class=\"image-wrapper\" data-id=\"";
            // line 39
            ((($context["coverImage"] ?? null)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coverImage"] ?? null), "id", [], "any", false, false, false, 39), "html", null, true))) : (print ("")));
            echo "\" title=\"Scegli immagine di copertina di questo modello\">
                ";
            // line 40
            if (($context["coverImage"] ?? null)) {
                // line 41
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coverImage"] ?? null), "getLocalUrl", [], "method", false, false, false, 41), "html", null, true);
                echo "\" loading=\"lazy\">
                ";
            }
            // line 43
            echo "            </div>
            <div class=\"inner\">
                <span class=\"model-id\">ID: ";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getId", [], "method", false, false, false, 45), "html", null, true);
            echo "</span>
                <form action=\"javascript:void(0);\" method=\"post\">
                    <input type=\"hidden\" name=\"model_id\" value=\"";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getId", [], "method", false, false, false, 47), "html", null, true);
            echo "\">
                    <p class=\"make-name\">";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["model"], "getMake", [], "method", false, false, false, 48), "getDescription", [], "method", false, false, false, 48), "html", null, true);
            echo "</p>
                    <h4 class=\"model-name\">";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getDescription", [], "method", false, false, false, 49), "html", null, true);
            echo "</h4>
                    <div class=\"param-group\">
                        <label>Sconto dealer</label>
                        <div class=\"input-group\">
                            <input type=\"number\" class=\"form-control\" name=\"dealer_discount\" value=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getDealerDiscount", [], "method", false, false, false, 53), "html", null, true);
            echo "\" data-prev=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getDealerDiscount", [], "method", false, false, false, 53), "html", null, true);
            echo "\" min=\"0\" max=\"100\">
                            <span class=\"input-group-addon\">%</span>
                        </div>
                    </div>
                    <div class=\"param-group\">
                        <label>Incidenza servizi</label>
                        <div class=\"input-group\">
                            <input type=\"number\" class=\"form-control\" name=\"services_incidence\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getServicesIncidence", [], "method", false, false, false, 60), "html", null, true);
            echo "\" data-prev=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["model"], "getServicesIncidence", [], "method", false, false, false, 60), "html", null, true);
            echo "\" min=\"0\" max=\"100\">
                            <span class=\"input-group-addon\">%</span>
                        </div>
                    </div>
                    <button type=\"button\" class=\"btn btn-primary apply-values\">AGGIORNA OFFERTE</button>                
                </form>
            </div>
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['model'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {

        function submitForm() {
            let _frm = document.querySelector('.list-filter-form');
            let data = new FormSerializer(_frm).serialize();
            let url = new URL(_frm.dataset.action);
            for(let prop in data) {
                let value = data[prop];
                if (value.trim() != '') {
                    url.searchParams.set(prop, value);
                }
            }
            url.searchParams.set('page', 1);
            window.location = url.toString();            
        }

        Delegate(document).on('keydown', '.list-filter-form input[type=\"text\"]', function(e) {
            if ((e.code == 'Enter' || e.which == 13) && this.value.length > 0) {
                submitForm();
            }
        });

        Delegate(document).on('click', '.apply-filter', submitForm);

        Delegate(document).on('change', '.model-card form input[type=\"number\"]', function() {
            this.closest('.input-group').classList.toggle('has-warning', this.value != this.dataset.prev);
        });

        Delegate(document).on('click', '.model-card .apply-values', function() {
            let _frm = this.closest('form');
            let payload = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.patch(`\${res.absolutePath}api/offer/update-model-default-params`, payload, (data, response) => {
                this.classList.remove('loading');
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
                _frm.querySelectorAll('input[type=\"number\"]').forEach(_input => {
                    _input.dataset.prev = _input.value;
                    _input.closest('.input-group').classList.remove('has-warning');
                });
                void new resAlert('Offerte aggiornate', 'Le offerte automatiche per il modello selezionato sono state aggiornate.', {type:'success'})
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });

        Delegate(document).on('click', '.model-card .image-wrapper', function() {

            this.classList.add('loading');

            void new ModelImageGalleryModal({
                modelId: this.parentNode.dataset.id,
                currentImageId: this.dataset.id,
                onShow: () => this.classList.remove('loading'),
                onCoverImageSet: (image) => {
                    this.innerHTML = `<img src=\"\${image.localUrl}\">`;
                    this.dataset.id = image.id;
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
        return "models_options.twig";
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
        return array (  186 => 70,  168 => 60,  156 => 53,  149 => 49,  145 => 48,  141 => 47,  136 => 45,  132 => 43,  126 => 41,  124 => 40,  120 => 39,  116 => 38,  113 => 37,  110 => 36,  106 => 35,  93 => 24,  80 => 22,  76 => 21,  65 => 13,  57 => 8,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget\">
    <div class=\"head\">
        <span class=\"title\">Filtro lista modelli</span>
    </div>
    <div class=\"content\">
        <form action=\"javascript:void(0);\" method=\"get\" class=\"list-filter-form\" data-action=\"{{ path }}models-options\">
            <div class=\"row\">
                <div class=\"col-md-3\">
                    <div class=\"form-group\">
                        <label>Ricerca</label>
                        <input type=\"text\" class=\"form-control\" name=\"params[key]\" value=\"{{ data.filterParams.key ?? '' }}\" placeholder=\"Ricerca per nome modello...\">
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <div class=\"form-group\">
                        <label>Marca</label>
                        <select class=\"form-control\" name=\"params[make_id]\">
                            <option value=\"\">Tutte le marche</option>
                            {% for make in data.makes %}
                            <option value=\"{{ make.id }}\" {{ setOption(data.filterParams.make_id ?? '', make.id) }}>{{ make.description }}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class=\"d-flex justify-content-end mb15\">
    <button class=\"apply-filter btn btn-primary\">APPLICA FILTRO</button>
</div>
<div class=\"row model-list-wrapper\">
    {% for model in data.list %}
    {% set coverImage = model.getCoverImage() %}
    <div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-2\">
        <div class=\"model-card\" data-id=\"{{ model.getId() }}\">
            <div class=\"image-wrapper\" data-id=\"{{ coverImage ? coverImage.id : '' }}\" title=\"Scegli immagine di copertina di questo modello\">
                {% if coverImage %}
                <img src=\"{{ coverImage.getLocalUrl() }}\" loading=\"lazy\">
                {% endif %}
            </div>
            <div class=\"inner\">
                <span class=\"model-id\">ID: {{ model.getId() }}</span>
                <form action=\"javascript:void(0);\" method=\"post\">
                    <input type=\"hidden\" name=\"model_id\" value=\"{{ model.getId() }}\">
                    <p class=\"make-name\">{{ (model.getMake()).getDescription() }}</p>
                    <h4 class=\"model-name\">{{ model.getDescription() }}</h4>
                    <div class=\"param-group\">
                        <label>Sconto dealer</label>
                        <div class=\"input-group\">
                            <input type=\"number\" class=\"form-control\" name=\"dealer_discount\" value=\"{{ model.getDealerDiscount() }}\" data-prev=\"{{ model.getDealerDiscount() }}\" min=\"0\" max=\"100\">
                            <span class=\"input-group-addon\">%</span>
                        </div>
                    </div>
                    <div class=\"param-group\">
                        <label>Incidenza servizi</label>
                        <div class=\"input-group\">
                            <input type=\"number\" class=\"form-control\" name=\"services_incidence\" value=\"{{ model.getServicesIncidence() }}\" data-prev=\"{{ model.getServicesIncidence() }}\" min=\"0\" max=\"100\">
                            <span class=\"input-group-addon\">%</span>
                        </div>
                    </div>
                    <button type=\"button\" class=\"btn btn-primary apply-values\">AGGIORNA OFFERTE</button>                
                </form>
            </div>
        </div>
    </div>
    {% endfor %}
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {

        function submitForm() {
            let _frm = document.querySelector('.list-filter-form');
            let data = new FormSerializer(_frm).serialize();
            let url = new URL(_frm.dataset.action);
            for(let prop in data) {
                let value = data[prop];
                if (value.trim() != '') {
                    url.searchParams.set(prop, value);
                }
            }
            url.searchParams.set('page', 1);
            window.location = url.toString();            
        }

        Delegate(document).on('keydown', '.list-filter-form input[type=\"text\"]', function(e) {
            if ((e.code == 'Enter' || e.which == 13) && this.value.length > 0) {
                submitForm();
            }
        });

        Delegate(document).on('click', '.apply-filter', submitForm);

        Delegate(document).on('change', '.model-card form input[type=\"number\"]', function() {
            this.closest('.input-group').classList.toggle('has-warning', this.value != this.dataset.prev);
        });

        Delegate(document).on('click', '.model-card .apply-values', function() {
            let _frm = this.closest('form');
            let payload = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.patch(`\${res.absolutePath}api/offer/update-model-default-params`, payload, (data, response) => {
                this.classList.remove('loading');
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
                _frm.querySelectorAll('input[type=\"number\"]').forEach(_input => {
                    _input.dataset.prev = _input.value;
                    _input.closest('.input-group').classList.remove('has-warning');
                });
                void new resAlert('Offerte aggiornate', 'Le offerte automatiche per il modello selezionato sono state aggiornate.', {type:'success'})
            }, err => void new resAlert('Operazione fallita', err.toString(), {type:'error'}));
        });

        Delegate(document).on('click', '.model-card .image-wrapper', function() {

            this.classList.add('loading');

            void new ModelImageGalleryModal({
                modelId: this.parentNode.dataset.id,
                currentImageId: this.dataset.id,
                onShow: () => this.classList.remove('loading'),
                onCoverImageSet: (image) => {
                    this.innerHTML = `<img src=\"\${image.localUrl}\">`;
                    this.dataset.id = image.id;
                }
            });

        });

    });

</script>
{% endblock content %}", "models_options.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/models_options.twig");
    }
}
