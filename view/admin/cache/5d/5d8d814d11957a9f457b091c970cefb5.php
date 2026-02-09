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
class __TwigTemplate_4e8f75ec825d2fbfaa788f061eba119b extends Template
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
        echo "<!--<pre> ";
        echo json_encode(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 3));
        echo " </pre> -->
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
                    <label>Società/Ditta</label>
                    <select class=\"form-control\" name=\"agency_id\">
                        <option value=\"\">Nessuna opzione selezionata</option>
                        ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "agencies", [], "any", false, false, false, 40));
        foreach ($context['_seq'] as $context["_key"] => $context["agency"]) {
            // line 41
            echo "                        <option 
                            value=\"";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 42), "html", null, true);
            echo "\" 
                            ";
            // line 43
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["agency"], "getId", [], "method", false, false, false, 43), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 43), "getAgencyId", [], "method", false, false, false, 43));
            echo "
                        >";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["agency"], "getDescription", [], "method", false, false, false, 44), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                    </select>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"form-group\">
                    <label>Responsabile</label>
                    <select class=\"form-control\" name=\"responsible_id\">
                        <option value=\"\">Nessuna opzione selezionata</option>
                        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "responsibleList", [], "any", false, false, false, 54));
        foreach ($context['_seq'] as $context["_key"] => $context["responsible"]) {
            // line 55
            echo "                        <option 
                            value=\"";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 56), "html", null, true);
            echo "\"
                            ";
            // line 57
            echo Utils::setOption(twig_get_attribute($this->env, $this->source, $context["responsible"], "getId", [], "method", false, false, false, 57), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 57), "getResponsibleId", [], "method", false, false, false, 57));
            echo "
                        >";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["responsible"], "getFullName", [], "method", false, false, false, 58), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['responsible'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                    </select>
                </div>
            </div>
\t\t\t<div class=\"col-md-2\">
                <div class=\"form-group\">
                    <label>Data e ora</label>
                    <input type=\"text\" class=\"form-control\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 66), "getCreatedAt", [], "method", false, false, false, 66), "d/m/Y H:i:s"), "html", null, true);
        echo "\" readonly>
                </div>
            </div>
\t\t\t<div class=\"col-md-1\">
                <div class=\"form-group\">
                    <label>Valore</label>
                    <input type=\"text\" name=\"value\" class=\"form-control\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 72), "getValue", [], "method", false, false, false, 72), "html", null, true);
        echo "\" >
                </div>
            </div>
        </div>
        <fieldset class=\"mb-3\">
            <legend>ANAGRAFICA CONTATTO</legend>
            ";
        // line 78
        $this->loadTemplate("partials/contact.twig", "deal.twig", 78)->display(twig_array_merge($context, ["contact" => twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "contact", [], "any", false, false, false, 78)]));
        // line 79
        echo "        </fieldset>
        <fieldset class=\"mb-3\">
            <legend>DETTAGLIO RICHIESTA</legend>
            <div class=\"row\">
\t\t\t\t<div class=\"col-md-12\">
                    <div class=\"form-group\">
                        <label>Messaggio richiesta</label>
                        ";
        // line 86
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 86), "getCreatedById", [], "method", false, false, false, 86))) {
            // line 87
            echo "                        <textarea class=\"form-control\" rows=\"5\" name=\"message\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 87), "getMessage", [], "method", false, false, false, 87), "html", null, true);
            echo "</textarea>
                        ";
        } else {
            // line 89
            echo "                        <textarea class=\"form-control\" rows=\"3\" readonly>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 89), "getMessage", [], "method", false, false, false, 89), "html", null, true);
            echo "</textarea>
                        ";
        }
        // line 91
        echo "                    </div>
                </div>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 95), "getMetadata", [], "method", false, false, false, 95));
        foreach ($context['_seq'] as $context["metaKey"] => $context["metaValue"]) {
            // line 96
            echo "                <div class=\"col-sm-6 col-lg-4 col-12\">
                    <div class=\"form-group\">
                        <label>";
            // line 98
            echo twig_escape_filter($this->env, $context["metaKey"], "html", null, true);
            echo "</label>
                        <input type=\"text\" class=\"form-control\" value=\"";
            // line 99
            echo twig_escape_filter($this->env, $context["metaValue"], "html", null, true);
            echo "\" readonly>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['metaKey'], $context['metaValue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo " 
            </div>
        </fieldset>
        ";
        // line 105
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 105), "exists", [], "method", false, false, false, 105)) {
            // line 106
            echo "        <fieldset class=\"attachment-list mb-3\" data-entity=\"Deal\" data-entity-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "deal", [], "any", false, false, false, 106), "getId", [], "method", false, false, false, 106), "html", null, true);
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
        // line 120
        echo "    </div>
</form>
";
        // line 122
        $this->loadTemplate("/partials/scheda_lavorazione_immobile.twig", "deal.twig", 122)->display($context);
        // line 123
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
        return array (  269 => 123,  267 => 122,  263 => 120,  245 => 106,  243 => 105,  238 => 102,  228 => 99,  224 => 98,  220 => 96,  216 => 95,  210 => 91,  204 => 89,  198 => 87,  196 => 86,  187 => 79,  185 => 78,  176 => 72,  167 => 66,  159 => 60,  151 => 58,  147 => 57,  143 => 56,  140 => 55,  136 => 54,  126 => 46,  118 => 44,  114 => 43,  110 => 42,  107 => 41,  103 => 40,  96 => 35,  90 => 24,  81 => 18,  77 => 17,  70 => 13,  64 => 10,  56 => 5,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<!--<pre> {{ data.deal|json_encode|raw }} </pre> -->
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
\t\t\t<div class=\"col-md-2\">
                <div class=\"form-group\">
                    <label>Data e ora</label>
                    <input type=\"text\" class=\"form-control\" value=\"{{ data.deal.getCreatedAt()|date('d/m/Y H:i:s') }}\" readonly>
                </div>
            </div>
\t\t\t<div class=\"col-md-1\">
                <div class=\"form-group\">
                    <label>Valore</label>
                    <input type=\"text\" name=\"value\" class=\"form-control\" value=\"{{ data.deal.getValue() }}\" >
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
{% endblock content %}", "deal.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/deal.twig");
    }
}
