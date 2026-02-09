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

/* deal.twig */
class __TwigTemplate_02f39b894087c5619a912e76b0697a2e extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "deal.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<!-- ";
        echo json_encode(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 3));
        echo " -->
<div class=\"stage-manager\">
    <script type=\"application/json\" class=\"stage-manager-config\">";
        // line 5
        echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 5), "getStageManagerConfig", [], "method", false, false, false, 5));
        echo "</script>
</div>
<div class=\"widget\">
    <div class=\"content\">
        <div class=\"calendar-events-wrapper mb-3\">
            <script type=\"application/json\" class=\"calendar-events-list\">";
        // line 10
        echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 10), "getEvents", [], "method", false, false, false, 10));
        echo "</script>
        </div>
        <div class=\"crm-note-wrapper mb-3\">
            <script type=\"application/json\" class=\"crm-note-list\">";
        // line 13
        echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 13), "getNotes", [], "method", false, false, false, 13));
        echo "</script>
        </div>
    </div>
</div>
<form class=\"widget deal-data-wrapper\" data-id=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 17), "getId", [], "method", false, false, false, 17), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"id\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 18), "getId", [], "method", false, false, false, 18), "html", null, true);
        echo "\">
    <div class=\"content\">
        <div class=\"row mb-5\">
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Titolo</label>
                    <input type=\"text\" class=\"form-control\" name=\"title\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 24), "getTitle", [], "method", false, false, false, 24), "html", null, true);
        echo "\" maxlength=\"60\">
                </div>
            </div>
            ";
        // line 35
        echo "            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Data e ora</label>
                    <input type=\"text\" class=\"form-control\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 38), "getCreatedAt", [], "method", false, false, false, 38), "d/m/Y H:i:s"), "html", null, true);
        echo "\" readonly>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Società/Ditta</label>
                    <select class=\"form-control\" name=\"agency_id\">
                        <option value=\"\">Nessuna opzione selezionata</option>
                        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agencies", [], "any", false, false, false, 46));
        foreach ($context['_seq'] as $context["_key"] => $context["agency"]) {
            // line 47
            echo "                        <option 
                            value=\"";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 48), "html", null, true);
            echo "\" 
                            ";
            // line 49
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 49), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 49), "getAgencyId", [], "method", false, false, false, 49));
            echo "
                        >";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getDescription", [], "method", false, false, false, 50), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "                    </select>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Responsabile</label>
                    <select class=\"form-control\" name=\"responsible_id\">
                        <option value=\"\">Nessuna opzione selezionata</option>
                        ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "responsibleList", [], "any", false, false, false, 60));
        foreach ($context['_seq'] as $context["_key"] => $context["responsible"]) {
            // line 61
            echo "                        <option 
                            value=\"";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 62), "html", null, true);
            echo "\"
                            ";
            // line 63
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 63), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 63), "getResponsibleId", [], "method", false, false, false, 63));
            echo "
                        >";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getFullName", [], "method", false, false, false, 64), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['responsible'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                    </select>
                </div>
            </div>
        </div>
        <fieldset class=\"mb-3\">
            <legend>ANAGRAFICA CONTATTO</legend>
            ";
        // line 72
        $this->loadTemplate("partials/contact.twig", "deal.twig", 72)->display(twig_array_merge($context, ["contact" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 72)]));
        // line 73
        echo "        </fieldset>
        <fieldset class=\"mb-3\">
            <legend>DETTAGLIO RICHIESTA</legend>
            <div class=\"row\">
\t\t\t\t<div class=\"col-md-12\">
                    <div class=\"form-group\">
                        <label>Messaggio richiesta</label>
                        ";
        // line 80
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 80), "getCreatedById", [], "method", false, false, false, 80))) {
            // line 81
            echo "                        <textarea class=\"form-control\" rows=\"5\" name=\"message\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 81), "getMessage", [], "method", false, false, false, 81), "html", null, true);
            echo "</textarea>
                        ";
        } else {
            // line 83
            echo "                        <textarea class=\"form-control\" rows=\"3\" readonly>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 83), "getMessage", [], "method", false, false, false, 83), "html", null, true);
            echo "</textarea>
                        ";
        }
        // line 85
        echo "                    </div>
                </div>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 89), "getMetadata", [], "method", false, false, false, 89));
        foreach ($context['_seq'] as $context["metaKey"] => $context["metaValue"]) {
            // line 90
            echo "                <div class=\"col-sm-6 col-lg-4 col-12\">
                    <div class=\"form-group\">
                        <label>";
            // line 92
            echo twig_escape_filter($this->env, $context["metaKey"], "html", null, true);
            echo "</label>
                        <input type=\"text\" class=\"form-control\" value=\"";
            // line 93
            echo twig_escape_filter($this->env, $context["metaValue"], "html", null, true);
            echo "\" readonly>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['metaKey'], $context['metaValue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo " 
            </div>
        </fieldset>
        ";
        // line 99
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 99), "exists", [], "method", false, false, false, 99)) {
            // line 100
            echo "        <fieldset class=\"attachment-list mb-3\" data-entity=\"Deal\" data-entity-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 100), "getId", [], "method", false, false, false, 100), "html", null, true);
            echo "\">
            <legend>
                DOCUMENTI E ALLEGATI
                <div class=\"action-group\">
                    <a class=\"action add-attachment\" href=\"javascript:void(0);\">
                        <i class=\"far fa-plus\"></i>
                        <span>CARICA ALLEGATO</span>
                    </a>
                </div>
            </legend>
            <div class=\"attachment-grid\" data-empty=\"Non sono stati trovati allegati\"></div>
        </fieldset>
\t\t
        ";
        }
        // line 114
        echo "    </div>
</form>
";
        // line 116
        $this->loadTemplate("/partials/scheda_lavorazione_immobile.twig", "deal.twig", 116)->display($context);
        // line 117
        echo "
<script>

    document.addEventListener('DOMContentLoaded', function() {

        const wrapper = document.querySelector('.deal-data-wrapper');
        const dealId = wrapper.dataset.id;

        void new StageManager(document.querySelector('.stage-manager'), {
            onChange: async (stageId) => {
                const data = await HttpRequest.put(
                    `\${res.absolutePath}api/deal/\${dealId}/stage/\${stageId}`, {}, 
                    (data, response) => data.status === 1,
                    err => alert(err.message)
                );
                return data.status === 1;
            }
        });

        void new AttachmentsList
            (document.querySelector('.attachment-list')
        );
        
        void new CrmNoteFieldset('.crm-note-wrapper', {
            entity: 'deal',
            entityId: dealId
        });

        void new CalendarEventsFieldset('.calendar-events-wrapper', {
            entity: 'deal',
            entityId: dealId
        });

        Delegate(document).on('click', '.action.save-deal', function() {
            const form = document.querySelector('.deal-data-wrapper');

            this.classList.add('loading');

            HttpRequest.patch(`\${res.absolutePath}api/deal/\${dealId}`, FormSerializer.for(form).serialize(), (data, response) => {
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
                window.location = `\${res.path}deals`;
            }, err => void new ResAlert('Operazione fallita', err.toString(), {type:'error'}));
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
        return "deal.twig";
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
        return array (  260 => 117,  258 => 116,  254 => 114,  236 => 100,  234 => 99,  229 => 96,  219 => 93,  215 => 92,  211 => 90,  207 => 89,  201 => 85,  195 => 83,  189 => 81,  187 => 80,  178 => 73,  176 => 72,  168 => 66,  160 => 64,  156 => 63,  152 => 62,  149 => 61,  145 => 60,  135 => 52,  127 => 50,  123 => 49,  119 => 48,  116 => 47,  112 => 46,  101 => 38,  96 => 35,  90 => 24,  81 => 18,  77 => 17,  70 => 13,  64 => 10,  56 => 5,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<!-- {{ data.contact|json_encode|raw }} -->
<div class=\"stage-manager\">
    <script type=\"application/json\" class=\"stage-manager-config\">{{ data.deal.getStageManagerConfig()|json_encode|raw }}</script>
</div>
<div class=\"widget\">
    <div class=\"content\">
        <div class=\"calendar-events-wrapper mb-3\">
            <script type=\"application/json\" class=\"calendar-events-list\">{{ data.deal.getEvents()|json_encode|raw }}</script>
        </div>
        <div class=\"crm-note-wrapper mb-3\">
            <script type=\"application/json\" class=\"crm-note-list\">{{ data.deal.getNotes()|json_encode|raw }}</script>
        </div>
    </div>
</div>
<form class=\"widget deal-data-wrapper\" data-id=\"{{ data.deal.getId() }}\">
    <input type=\"hidden\" name=\"id\" value=\"{{ data.deal.getId() }}\">
    <div class=\"content\">
        <div class=\"row mb-5\">
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Titolo</label>
                    <input type=\"text\" class=\"form-control\" name=\"title\" value=\"{{ data.deal.getTitle() }}\" maxlength=\"60\">
                </div>
            </div>
            {#
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Tipo richiesta</label>
                    <input type=\"text\" class=\"form-control\" value=\"{{ data.deal.getType() }}\" readonly>
                </div>
            </div>            
            #}
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Data e ora</label>
                    <input type=\"text\" class=\"form-control\" value=\"{{ data.deal.getCreatedAt()|date('d/m/Y H:i:s') }}\" readonly>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Società/Ditta</label>
                    <select class=\"form-control\" name=\"agency_id\">
                        <option value=\"\">Nessuna opzione selezionata</option>
                        {% for agency in data.agencies %}
                        <option 
                            value=\"{{ agency.getId() }}\" 
                            {{ setOption(agency.getId(), data.deal.getAgencyId()) }}
                        >{{ agency.getDescription() }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Responsabile</label>
                    <select class=\"form-control\" name=\"responsible_id\">
                        <option value=\"\">Nessuna opzione selezionata</option>
                        {% for responsible in data.responsibleList %}
                        <option 
                            value=\"{{ responsible.getId() }}\"
                            {{ setOption(responsible.getId(), data.deal.getResponsibleId()) }}
                        >{{ responsible.getFullName() }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
        </div>
        <fieldset class=\"mb-3\">
            <legend>ANAGRAFICA CONTATTO</legend>
            {% include 'partials/contact.twig' with {'contact': data.contact} %}
        </fieldset>
        <fieldset class=\"mb-3\">
            <legend>DETTAGLIO RICHIESTA</legend>
            <div class=\"row\">
\t\t\t\t<div class=\"col-md-12\">
                    <div class=\"form-group\">
                        <label>Messaggio richiesta</label>
                        {% if data.deal.getCreatedById() is not null %}
                        <textarea class=\"form-control\" rows=\"5\" name=\"message\">{{ data.deal.getMessage() }}</textarea>
                        {% else %}
                        <textarea class=\"form-control\" rows=\"3\" readonly>{{ data.deal.getMessage() }}</textarea>
                        {% endif %}
                    </div>
                </div>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t{% for metaKey, metaValue in data.deal.getMetadata() %}
                <div class=\"col-sm-6 col-lg-4 col-12\">
                    <div class=\"form-group\">
                        <label>{{ metaKey }}</label>
                        <input type=\"text\" class=\"form-control\" value=\"{{ metaValue }}\" readonly>
                    </div>
                </div>
                {% endfor %} 
            </div>
        </fieldset>
        {% if data.deal.exists() %}
        <fieldset class=\"attachment-list mb-3\" data-entity=\"Deal\" data-entity-id=\"{{ data.deal.getId() }}\">
            <legend>
                DOCUMENTI E ALLEGATI
                <div class=\"action-group\">
                    <a class=\"action add-attachment\" href=\"javascript:void(0);\">
                        <i class=\"far fa-plus\"></i>
                        <span>CARICA ALLEGATO</span>
                    </a>
                </div>
            </legend>
            <div class=\"attachment-grid\" data-empty=\"Non sono stati trovati allegati\"></div>
        </fieldset>
\t\t
        {% endif %}
    </div>
</form>
{% include '/partials/scheda_lavorazione_immobile.twig' %}

<script>

    document.addEventListener('DOMContentLoaded', function() {

        const wrapper = document.querySelector('.deal-data-wrapper');
        const dealId = wrapper.dataset.id;

        void new StageManager(document.querySelector('.stage-manager'), {
            onChange: async (stageId) => {
                const data = await HttpRequest.put(
                    `\${res.absolutePath}api/deal/\${dealId}/stage/\${stageId}`, {}, 
                    (data, response) => data.status === 1,
                    err => alert(err.message)
                );
                return data.status === 1;
            }
        });

        void new AttachmentsList
            (document.querySelector('.attachment-list')
        );
        
        void new CrmNoteFieldset('.crm-note-wrapper', {
            entity: 'deal',
            entityId: dealId
        });

        void new CalendarEventsFieldset('.calendar-events-wrapper', {
            entity: 'deal',
            entityId: dealId
        });

        Delegate(document).on('click', '.action.save-deal', function() {
            const form = document.querySelector('.deal-data-wrapper');

            this.classList.add('loading');

            HttpRequest.patch(`\${res.absolutePath}api/deal/\${dealId}`, FormSerializer.for(form).serialize(), (data, response) => {
                if (data.status !== 1) {
                    throw data.message ?? 'Errore generico';
                }
                window.location = `\${res.path}deals`;
            }, err => void new ResAlert('Operazione fallita', err.toString(), {type:'error'}));
        });

    });

</script>
{% endblock content %}", "deal.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/deal.twig");
    }
}
