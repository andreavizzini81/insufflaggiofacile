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

/* deals.twig */
class __TwigTemplate_fb629ab3f77d6d807bdaa90680a82135 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "deals.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"kanban loading-overlay\"></div>
<script>

    function adjustKanban() {
        if (window.innerWidth >= 992) {
            return;
        }
        let kanbanPosition = document.querySelector('.kanban').getBoundingClientRect();
        let main = document.querySelector('main');
        main.style.cssText = `height: calc(100svh - \${kanbanPosition.top}px);`    
    }

    document.addEventListener('DOMContentLoaded', function() {

        const filter = new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
            onSubmit: () => {
                kanban.init();
            }
        });

        window.kanbanWrapper = document.querySelector('.kanban');

        const kanban = new Kanban(null, {
            wrapper: kanbanWrapper,
            config: {
                cardClass: DealKanbanCard
            },
            onInit: async () => {

                kanbanWrapper.classList.add('loading-overlay');

                const data = await HttpRequest.post(`\${res.absolutePath}api/deals/kanban`, filter.getData());
                if (data.status !== 1) {
                    return resAlert.error('Kanban non disponibile', data.message ?? 'Errore generico');
                }
                
                return data.result.data;
            },
            onFetchData: async (params, page) => {
                return await HttpRequest.post(`\${res.absolutePath}api/deals/kanban/\${page ?? ''}`, {
                    ...filter.getData(),
                    ...params
                });
            }
        });

        Delegate(document).on('click', '.create-deal', () => {
            void new ContactModal({
                onSelect: async (contact) => {
                    const data = await HttpRequest.put(`\${res.absolutePath}api/deal`, {
                        contact_id: contact.id
                    });
                    if (data.status !== 1) {
                        return resAlert.error('Operazione fallita', data.message ?? 'Errore generico');
                    }
                    window.location = `\${res.path}deal/\${data.result.dealId}`;
                }
            });
        });

        adjustKanban();

    });

    window.addEventListener('resize', adjustKanban);
</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "deals.twig";
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
<div class=\"kanban loading-overlay\"></div>
<script>

    function adjustKanban() {
        if (window.innerWidth >= 992) {
            return;
        }
        let kanbanPosition = document.querySelector('.kanban').getBoundingClientRect();
        let main = document.querySelector('main');
        main.style.cssText = `height: calc(100svh - \${kanbanPosition.top}px);`    
    }

    document.addEventListener('DOMContentLoaded', function() {

        const filter = new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
            onSubmit: () => {
                kanban.init();
            }
        });

        window.kanbanWrapper = document.querySelector('.kanban');

        const kanban = new Kanban(null, {
            wrapper: kanbanWrapper,
            config: {
                cardClass: DealKanbanCard
            },
            onInit: async () => {

                kanbanWrapper.classList.add('loading-overlay');

                const data = await HttpRequest.post(`\${res.absolutePath}api/deals/kanban`, filter.getData());
                if (data.status !== 1) {
                    return resAlert.error('Kanban non disponibile', data.message ?? 'Errore generico');
                }
                
                return data.result.data;
            },
            onFetchData: async (params, page) => {
                return await HttpRequest.post(`\${res.absolutePath}api/deals/kanban/\${page ?? ''}`, {
                    ...filter.getData(),
                    ...params
                });
            }
        });

        Delegate(document).on('click', '.create-deal', () => {
            void new ContactModal({
                onSelect: async (contact) => {
                    const data = await HttpRequest.put(`\${res.absolutePath}api/deal`, {
                        contact_id: contact.id
                    });
                    if (data.status !== 1) {
                        return resAlert.error('Operazione fallita', data.message ?? 'Errore generico');
                    }
                    window.location = `\${res.path}deal/\${data.result.dealId}`;
                }
            });
        });

        adjustKanban();

    });

    window.addEventListener('resize', adjustKanban);
</script>
{% endblock content %}", "deals.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/deals.twig");
    }
}
