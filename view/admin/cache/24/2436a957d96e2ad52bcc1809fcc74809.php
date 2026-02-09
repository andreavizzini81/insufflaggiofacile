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

/* calendar.twig */
class __TwigTemplate_c808c59f215f44abad4d442c0d9f7666 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "calendar.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"calendar-wrapper\"></div>

<style>

@media screen and (max-width: 575.999px) {

    .fc .fc-header-toolbar {
        flex-wrap: wrap;
    }

    .fc .fc-toolbar-chunk {
        flex: 0 0 100%;
    }


}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const filter = new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
            onSubmit: () => {
                calHandler.refetchEvents();
            },
            onInit: (toolbar) => {
                const userSelect = toolbar.form.querySelector('select[name=\"user_id[]\"]');+
                void new vanillaSelectBox(userSelect, {
                    ...vsBoxDefaults,
                    placeHolder: 'Nessuna selezione'
                });
            }
        });

        const calHandler = new FullCalendar.Calendar(document.querySelector('.calendar-wrapper'), {
            locale: 'it',
            height: 'auto',
            navLinks: true,
            nowIndicator: true,
            selectMirror: true,
            slotDuration: '00:30:00',
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            selectable: false,
            selectConstraint: {
                startTime: '00:00',
                endTime: '23:59'
            },
            views: {
                timeGridWeek: {
                    slotMinTime: '08:00:00',
                    slotMaxTime: '22:00:00'
                },
                timeGridDay: {
                    slotMinTime: '08:00:00',
                    slotMaxTime: '22:00:00'
                }
            },
            loading: function(isLoading, view) {
                this.el.classList.toggle('loading-overlay', isLoading);
            },
            eventClick: function(info) {
                info.el.classList.add('loading');
                const props = info.event.extendedProps;
                void new CalendarEventModal(props.eventId, {
                    endpoint: props.endpoint,
                    onHide: () => {
                        this.refetchEvents();
                    }
                });
            },

            events: function(info, success, failure) {
                const fromDate = moment(info.start).format('YYYY-MM-DD');
                const toDate = moment(info.end).format('YYYY-MM-DD');
                let queryParams = new URLSearchParams(
                    new FormData(filter.form)
                );
                queryParams.set('from', fromDate);
                queryParams.set('to', toDate);

                let url = `\${res.absolutePath}api/calendar?\${queryParams.toString()}`;
\t\t\t\t//let url = `\${res.absolutePath}api/calendar`;

                HttpRequest.get(url, (data, response) => {
                    if (data.status !== 1) {
                        failure(data.message ?? 'Errore generico');
                    }
                    success(data.result.list);
                });
            }
        });
        calHandler.render();

    });
</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "calendar.twig";
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
        return array (  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"calendar-wrapper\"></div>

<style>

@media screen and (max-width: 575.999px) {

    .fc .fc-header-toolbar {
        flex-wrap: wrap;
    }

    .fc .fc-toolbar-chunk {
        flex: 0 0 100%;
    }


}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const filter = new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
            onSubmit: () => {
                calHandler.refetchEvents();
            },
            onInit: (toolbar) => {
                const userSelect = toolbar.form.querySelector('select[name=\"user_id[]\"]');+
                void new vanillaSelectBox(userSelect, {
                    ...vsBoxDefaults,
                    placeHolder: 'Nessuna selezione'
                });
            }
        });

        const calHandler = new FullCalendar.Calendar(document.querySelector('.calendar-wrapper'), {
            locale: 'it',
            height: 'auto',
            navLinks: true,
            nowIndicator: true,
            selectMirror: true,
            slotDuration: '00:30:00',
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            selectable: false,
            selectConstraint: {
                startTime: '00:00',
                endTime: '23:59'
            },
            views: {
                timeGridWeek: {
                    slotMinTime: '08:00:00',
                    slotMaxTime: '22:00:00'
                },
                timeGridDay: {
                    slotMinTime: '08:00:00',
                    slotMaxTime: '22:00:00'
                }
            },
            loading: function(isLoading, view) {
                this.el.classList.toggle('loading-overlay', isLoading);
            },
            eventClick: function(info) {
                info.el.classList.add('loading');
                const props = info.event.extendedProps;
                void new CalendarEventModal(props.eventId, {
                    endpoint: props.endpoint,
                    onHide: () => {
                        this.refetchEvents();
                    }
                });
            },

            events: function(info, success, failure) {
                const fromDate = moment(info.start).format('YYYY-MM-DD');
                const toDate = moment(info.end).format('YYYY-MM-DD');
                let queryParams = new URLSearchParams(
                    new FormData(filter.form)
                );
                queryParams.set('from', fromDate);
                queryParams.set('to', toDate);

                let url = `\${res.absolutePath}api/calendar?\${queryParams.toString()}`;
\t\t\t\t//let url = `\${res.absolutePath}api/calendar`;

                HttpRequest.get(url, (data, response) => {
                    if (data.status !== 1) {
                        failure(data.message ?? 'Errore generico');
                    }
                    success(data.result.list);
                });
            }
        });
        calHandler.render();

    });
</script>
{% endblock content %}", "calendar.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/calendar.twig");
    }
}
