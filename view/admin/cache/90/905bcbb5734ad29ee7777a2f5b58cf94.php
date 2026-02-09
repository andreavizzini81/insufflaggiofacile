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

/* vehicle_list.twig */
class __TwigTemplate_039155c67b222e56cb896e57e85246ec extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "vehicle_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    ";
        $this->loadTemplate("partials/pagination.twig", "vehicle_list.twig", 3)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 3)]));
        // line 4
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasAdminRights", [], "method", false, false, false, 4)) {
            // line 5
            echo "    <div class=\"vlist-select-page-wrapper\">
        <label>
            <input type=\"checkbox\" class=\"vlist-select-page\" title=\"Seleziona tutti\">Seleziona tutti
        </label>
    </div>
    ";
        }
        // line 11
        echo "    <div class=\"vlist-wrapper\">
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["vehicle"]) {
            // line 13
            echo "        <a class=\"vlist-vehicle\" href=\"";
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "vehicle-manager/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "getId", [], "method", false, false, false, 13), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "getId", [], "method", false, false, false, 13), "html", null, true);
            echo "\">
            <div class=\"vlist-vehicle-inner\">
                ";
            // line 15
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasAdminRights", [], "method", false, false, false, 15)) {
                // line 16
                echo "                <div data-prevent=\"1\">
                    <input type=\"checkbox\" class=\"vlist-vehicle-select\" ";
                // line 17
                echo Utils::setCheckbox(true, twig_get_attribute($this->env, $this->source, $context["vehicle"], "isSelected", [], "method", false, false, false, 17));
                echo ">
                </div>
                ";
            }
            // line 20
            echo "                <div class=\"vlist-image-wrapper\">
                    <div class=\"vlist-image-wrapper\">
                        ";
            // line 22
            $context["images"] = twig_get_attribute($this->env, $this->source, $context["vehicle"], "getImageUrls", [], "method", false, false, false, 22);
            // line 23
            echo "                        ";
            if ( !twig_test_empty(($context["images"] ?? null))) {
                // line 24
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["images"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
                echo "\">
                        ";
            }
            // line 26
            echo "                    </div>
                </div>
                <div class=\"badges\">
                    <div class=\"badge ";
            // line 29
            echo ((twig_get_attribute($this->env, $this->source, $context["vehicle"], "active", [], "any", false, false, false, 29)) ? ("success") : ("muted op50"));
            echo "\" title=\"Disponibile\">DS</div>
                    <div class=\"badge ";
            // line 30
            echo ((twig_get_attribute($this->env, $this->source, $context["vehicle"], "onSale", [], "any", false, false, false, 30)) ? ("success") : ("muted op50"));
            echo "\" title=\"Extra sconto\">EX</div>
                    <div class=\"badge ";
            // line 31
            echo ((twig_get_attribute($this->env, $this->source, $context["vehicle"], "inStock", [], "any", false, false, false, 31)) ? ("success") : ("muted op50"));
            echo "\" title=\"Pronta consegna\">PC</div>
                </div>
                <div class=\"vlist-vehicle-details\">
                    <h4 class=\"title\">";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "getMake", [], "method", false, false, false, 34), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "getModel", [], "method", false, false, false, 34), "html", null, true);
            echo "</h4>
                    <p class=\"variant\">";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "getVariant", [], "method", false, false, false, 35), "html", null, true);
            echo "</p>
                    <p class=\"price-list\">Listino: ";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency(twig_get_attribute($this->env, $this->source, $context["vehicle"], "getPriceList", [], "method", false, false, false, 36), "EUR", array(), "it"), "html", null, true);
            echo "</p>
                    <div class=\"specs\">
                        <div class=\"prop\">
                            <span>Alimentazione: </span>";
            // line 39
            echo twig_escape_filter($this->env, (($__internal_compile_1 = twig_constant("Definitions::FUEL_TYPE")) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[(((twig_get_attribute($this->env, $this->source, $context["vehicle"], "fuelType", [], "any", true, true, false, 39) &&  !(null === twig_get_attribute($this->env, $this->source, $context["vehicle"], "fuelType", [], "any", false, false, false, 39)))) ? (twig_get_attribute($this->env, $this->source, $context["vehicle"], "fuelType", [], "any", false, false, false, 39)) : ("B"))] ?? null) : null), "html", null, true);
            echo "
                        </div>
                        <div class=\"prop\">
                            <span>Cambio: </span>";
            // line 42
            echo twig_escape_filter($this->env, (($__internal_compile_2 = twig_constant("Definitions::GEAR_TYPE")) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[(((twig_get_attribute($this->env, $this->source, $context["vehicle"], "gearType", [], "any", true, true, false, 42) &&  !(null === twig_get_attribute($this->env, $this->source, $context["vehicle"], "gearType", [], "any", false, false, false, 42)))) ? (twig_get_attribute($this->env, $this->source, $context["vehicle"], "gearType", [], "any", false, false, false, 42)) : ("M"))] ?? null) : null), "html", null, true);
            echo "
                        </div>
                        <div class=\"prop\">
                            <span>Cilindrata: </span>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "engineCubicSize", [], "any", false, false, false, 45), "html", null, true);
            echo "&nbsp;cc
                        </div>
                        <div class=\"prop\">
                            <span>Potenza: </span>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "powerCv", [], "any", false, false, false, 48), "html", null, true);
            echo " CV
                        </div>
                    </div>
                    ";
            // line 51
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "getOffers", [], "method", false, false, false, 51)) > 0)) {
                // line 52
                echo "                    <div class=\"offer-info\">
                        ";
                // line 53
                $context["offer"] = (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, $context["vehicle"], "getOffers", [], "method", false, false, false, 53)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null);
                // line 54
                echo "                        <h4 class=\"installment\">";
                echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency(twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "getMonthlyFee", [], "any", false, false, false, 54), "EUR", array(), "it"), "html", null, true);
                echo "</h4>
                        <div class=\"details\">
                            <span>";
                // line 56
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "getInstallments", [], "method", false, false, false, 56), "html", null, true);
                echo " rate</span>
                            <span>Anticipo ";
                // line 57
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "getDeposit", [], "method", false, false, false, 57), 0, "", "."), "html", null, true);
                echo "&euro;</span>
                            <span>";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "getKmPerYear", [], "method", false, false, false, 58), "html", null, true);
                echo " km</span>
                        </div>
                    </div>
                    ";
            }
            // line 62
            echo "                </div>
            </div>
        </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function() {

            function syncMakeModels() {
                let _make = document.querySelector('select[name=\"params[make_id][]\"]');
                let _models = document.querySelector('select[name=\"params[model_id][]\"]');
                const selectedMakeIds = Array.from(_make.selectedOptions).map(_option => _option.value);
                for (let _group of _models.children) {
                    if (!(_group instanceof HTMLOptGroupElement)) return;
                    _group.disabled = !selectedMakeIds.includes(_group.dataset.makeId) && selectedMakeIds.length > 0;
                    _group.hidden = _group.disabled;
                    for (let _option of _group.children) {
                        _option.selected = _option.selected && !_group.disabled && selectedMakeIds.length > 0;
                    }                
                }
                _models.vanillaSelectBox && _models.vanillaSelectBox.destroy();
                void new vanillaSelectBox(_models, {
                    ...vsBoxDefaults,
                    placeHolder: 'Tutti i modelli'
                });
            }

            Delegate(document).on('change', 'select[name=\"params[make_id][]\"]', syncMakeModels);

            void new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
                onSubmit: (form) => {
                    let data = new FormSerializer(form).serialize();
                    let url = new URL(form.dataset.action);
                    for(let prop in data) {
                        let value = data[prop];
                        if (Array.isArray(value)) {
                            value.forEach(item => {
                                url.searchParams.append(`\${prop}[]`, item);
                            });
                        } else {
                            if (value.trim() != '') {
                                url.searchParams.set(prop, value);
                            }
                        }
                    }
                    url.searchParams.set('page', 1);
                    window.location = url.toString();
                }
            });

            syncMakeModels();

            ";
        // line 115
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasAdminRights", [], "method", false, false, false, 115)) {
            // line 116
            echo "
            function syncMultiselectionColumnStatus() {
                let _items = Array.from(document.querySelectorAll('.vlist-vehicle-select'));
                let _toggle = document.querySelector('.vlist-select-page');
                let status = _items.every(_item => _item.checked);
                _toggle.checked = status;
            }

            Delegate(document).on('click', 'tr[data-id] td:not([data-prevent=\"1\"])', function(evt) {
                let target = (evt.ctrlKey || evt.metaKey) ? '_blank' : '_self';
                window.open(`\${res.path}vehicle-manager/\${this.parentNode.dataset.id}`, target);
            });

            Delegate(document).on('change', '.vlist-vehicle-select', function() {
                let id = this.closest('.vlist-vehicle').dataset.id;
                console.log(id);
                const method = this.checked ? 'put' : 'delete'
                HttpRequest[method](`\${res.absolutePath}api/multiselection/Vehicle/\${id}`, null, {
                    onSuccess: (data, response) => {

                    },
                    onFail: (error) => {

                    }
                });
            });

            Delegate(document).on('change', '.vlist-select-page', function() {
                let method = this.checked ? 'PUT' : 'DELETE';
                let _items = Array.from(document.querySelectorAll('.vlist-vehicle-select'));
                let ids = _items.map(_item => _item.closest('.vlist-vehicle').dataset.id);
                this.classList.add('loading');
                void new HttpRequest({
                    url: `\${res.absolutePath}api/multiselection/Vehicle`,
                    method: method,
                    data: {
                        ids: JSON.stringify(ids)
                    },
                    onSuccess: (data, response) => {
                        this.classList.remove('loading');
                        if (data.status !== 1) {
                            throw data.message ?? 'Errore generico';
                        }
                        _items.forEach(_item => _item.checked = this.checked);
                    },
                    onFail: (error) => {
                        void new resAlert('Operazione fallita', error.toString(), {type:'error'});
                    }
                }).send();
            });

            Delegate(document).on('click', '.bulk-actions', function() {
                this.classList.add('loading');
                void new VehicleBulkActionsModal({
                    onShow: () => {
                        this.classList.remove('loading');
                    },
                    onError: () => {
                        this.classList.remove('loading');
                    }
                });
            });

            [...document.querySelectorAll('.multiselect')].forEach(_multiselect => {
                void new vanillaSelectBox(_multiselect, {
                    ...vsBoxDefaults,
                    ..._multiselect.dataset
                });
            });

            syncMultiselectionColumnStatus();

            ";
        }
        // line 189
        echo "        });

    </script>
    ";
        // line 192
        $this->loadTemplate("partials/pagination.twig", "vehicle_list.twig", 192)->display(twig_to_array(["data" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination", [], "any", false, false, false, 192)]));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "vehicle_list.twig";
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
        return array (  336 => 192,  331 => 189,  256 => 116,  254 => 115,  203 => 66,  194 => 62,  187 => 58,  183 => 57,  179 => 56,  173 => 54,  171 => 53,  168 => 52,  166 => 51,  160 => 48,  154 => 45,  148 => 42,  142 => 39,  136 => 36,  132 => 35,  126 => 34,  120 => 31,  116 => 30,  112 => 29,  107 => 26,  101 => 24,  98 => 23,  96 => 22,  92 => 20,  86 => 17,  83 => 16,  81 => 15,  71 => 13,  67 => 12,  64 => 11,  56 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
    {% include 'partials/pagination.twig' with {'data': data.pagination} only %}
    {% if user.hasAdminRights() %}
    <div class=\"vlist-select-page-wrapper\">
        <label>
            <input type=\"checkbox\" class=\"vlist-select-page\" title=\"Seleziona tutti\">Seleziona tutti
        </label>
    </div>
    {% endif %}
    <div class=\"vlist-wrapper\">
    {% for vehicle in data.list %}
        <a class=\"vlist-vehicle\" href=\"{{ path }}vehicle-manager/{{ vehicle.getId() }}\" data-id=\"{{ vehicle.getId() }}\">
            <div class=\"vlist-vehicle-inner\">
                {% if user.hasAdminRights() %}
                <div data-prevent=\"1\">
                    <input type=\"checkbox\" class=\"vlist-vehicle-select\" {{ setCheckbox(true, vehicle.isSelected()) }}>
                </div>
                {% endif %}
                <div class=\"vlist-image-wrapper\">
                    <div class=\"vlist-image-wrapper\">
                        {% set images = vehicle.getImageUrls() %}
                        {% if images is not empty %}
                        <img src=\"{{ images[0] }}\">
                        {% endif %}
                    </div>
                </div>
                <div class=\"badges\">
                    <div class=\"badge {{ vehicle.active ? 'success' : 'muted op50' }}\" title=\"Disponibile\">DS</div>
                    <div class=\"badge {{ vehicle.onSale ? 'success' : 'muted op50' }}\" title=\"Extra sconto\">EX</div>
                    <div class=\"badge {{ vehicle.inStock ? 'success' : 'muted op50' }}\" title=\"Pronta consegna\">PC</div>
                </div>
                <div class=\"vlist-vehicle-details\">
                    <h4 class=\"title\">{{ vehicle.getMake() }} {{ vehicle.getModel() }}</h4>
                    <p class=\"variant\">{{ vehicle.getVariant() }}</p>
                    <p class=\"price-list\">Listino: {{vehicle.getPriceList()|format_currency('EUR', locale='it') }}</p>
                    <div class=\"specs\">
                        <div class=\"prop\">
                            <span>Alimentazione: </span>{{ constant('Definitions::FUEL_TYPE')[vehicle.fuelType ?? 'B'] }}
                        </div>
                        <div class=\"prop\">
                            <span>Cambio: </span>{{ constant('Definitions::GEAR_TYPE')[vehicle.gearType ?? 'M'] }}
                        </div>
                        <div class=\"prop\">
                            <span>Cilindrata: </span>{{ vehicle.engineCubicSize }}&nbsp;cc
                        </div>
                        <div class=\"prop\">
                            <span>Potenza: </span>{{ vehicle.powerCv }} CV
                        </div>
                    </div>
                    {% if vehicle.getOffers()|length >  0 %}
                    <div class=\"offer-info\">
                        {% set offer = vehicle.getOffers()[0] %}
                        <h4 class=\"installment\">{{ offer.getMonthlyFee|format_currency('EUR', locale='it') }}</h4>
                        <div class=\"details\">
                            <span>{{ offer.getInstallments() }} rate</span>
                            <span>Anticipo {{ offer.getDeposit()|number_format(0, '', '.') }}&euro;</span>
                            <span>{{ offer.getKmPerYear() }} km</span>
                        </div>
                    </div>
                    {% endif %}
                </div>
            </div>
        </a>
    {% endfor %}
    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function() {

            function syncMakeModels() {
                let _make = document.querySelector('select[name=\"params[make_id][]\"]');
                let _models = document.querySelector('select[name=\"params[model_id][]\"]');
                const selectedMakeIds = Array.from(_make.selectedOptions).map(_option => _option.value);
                for (let _group of _models.children) {
                    if (!(_group instanceof HTMLOptGroupElement)) return;
                    _group.disabled = !selectedMakeIds.includes(_group.dataset.makeId) && selectedMakeIds.length > 0;
                    _group.hidden = _group.disabled;
                    for (let _option of _group.children) {
                        _option.selected = _option.selected && !_group.disabled && selectedMakeIds.length > 0;
                    }                
                }
                _models.vanillaSelectBox && _models.vanillaSelectBox.destroy();
                void new vanillaSelectBox(_models, {
                    ...vsBoxDefaults,
                    placeHolder: 'Tutti i modelli'
                });
            }

            Delegate(document).on('change', 'select[name=\"params[make_id][]\"]', syncMakeModels);

            void new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
                onSubmit: (form) => {
                    let data = new FormSerializer(form).serialize();
                    let url = new URL(form.dataset.action);
                    for(let prop in data) {
                        let value = data[prop];
                        if (Array.isArray(value)) {
                            value.forEach(item => {
                                url.searchParams.append(`\${prop}[]`, item);
                            });
                        } else {
                            if (value.trim() != '') {
                                url.searchParams.set(prop, value);
                            }
                        }
                    }
                    url.searchParams.set('page', 1);
                    window.location = url.toString();
                }
            });

            syncMakeModels();

            {% if user.hasAdminRights() %}

            function syncMultiselectionColumnStatus() {
                let _items = Array.from(document.querySelectorAll('.vlist-vehicle-select'));
                let _toggle = document.querySelector('.vlist-select-page');
                let status = _items.every(_item => _item.checked);
                _toggle.checked = status;
            }

            Delegate(document).on('click', 'tr[data-id] td:not([data-prevent=\"1\"])', function(evt) {
                let target = (evt.ctrlKey || evt.metaKey) ? '_blank' : '_self';
                window.open(`\${res.path}vehicle-manager/\${this.parentNode.dataset.id}`, target);
            });

            Delegate(document).on('change', '.vlist-vehicle-select', function() {
                let id = this.closest('.vlist-vehicle').dataset.id;
                console.log(id);
                const method = this.checked ? 'put' : 'delete'
                HttpRequest[method](`\${res.absolutePath}api/multiselection/Vehicle/\${id}`, null, {
                    onSuccess: (data, response) => {

                    },
                    onFail: (error) => {

                    }
                });
            });

            Delegate(document).on('change', '.vlist-select-page', function() {
                let method = this.checked ? 'PUT' : 'DELETE';
                let _items = Array.from(document.querySelectorAll('.vlist-vehicle-select'));
                let ids = _items.map(_item => _item.closest('.vlist-vehicle').dataset.id);
                this.classList.add('loading');
                void new HttpRequest({
                    url: `\${res.absolutePath}api/multiselection/Vehicle`,
                    method: method,
                    data: {
                        ids: JSON.stringify(ids)
                    },
                    onSuccess: (data, response) => {
                        this.classList.remove('loading');
                        if (data.status !== 1) {
                            throw data.message ?? 'Errore generico';
                        }
                        _items.forEach(_item => _item.checked = this.checked);
                    },
                    onFail: (error) => {
                        void new resAlert('Operazione fallita', error.toString(), {type:'error'});
                    }
                }).send();
            });

            Delegate(document).on('click', '.bulk-actions', function() {
                this.classList.add('loading');
                void new VehicleBulkActionsModal({
                    onShow: () => {
                        this.classList.remove('loading');
                    },
                    onError: () => {
                        this.classList.remove('loading');
                    }
                });
            });

            [...document.querySelectorAll('.multiselect')].forEach(_multiselect => {
                void new vanillaSelectBox(_multiselect, {
                    ...vsBoxDefaults,
                    ..._multiselect.dataset
                });
            });

            syncMultiselectionColumnStatus();

            {% endif %}
        });

    </script>
    {% include 'partials/pagination.twig' with {data: data.pagination} only %}
{% endblock content %}", "vehicle_list.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/vehicle_list.twig");
    }
}
