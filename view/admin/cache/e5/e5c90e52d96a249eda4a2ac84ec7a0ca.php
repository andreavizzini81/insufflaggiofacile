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

/* faq.twig */
class __TwigTemplate_037baf978f3152c003187be89ead2ce7 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "faq.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal linked-fields contact-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            ";
        // line 6
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "faq", [], "any", false, false, false, 6), "getId", [], "method", false, false, false, 6))) {
            // line 7
            echo "            <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "faq", [], "any", false, false, false, 7), "getId", [], "method", false, false, false, 7), "html", null, true);
            echo "\">
            ";
        }
        // line 9
        echo "            <div class=\"row\">
                <div class=\"col-md-12\">
                    <fieldset>
                        <legend>FAQ</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Domanda</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"domanda\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "faq", [], "any", false, false, false, 16), "getDomanda", [], "method", false, false, false, 16), "html", null, true);
        echo "\" required>
                            </div>
                        </div>     
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Risposta</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"risposta\" rows=\"8\">";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "faq", [], "any", false, false, false, 22), "getRisposta", [], "method", false, false, false, 22), "html", null, true);
        echo "</textarea>
                            </div> 
                        </div>  
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<script>

    ClassicEditor
\t\t.create( document.querySelector( 'textarea[name=\"risposta\"]' ), {
            minHeight: '300px',
            updateSourceElementOnDestroy: true,
            forcePasteAsPlainText: true,
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'bold', 'italic',
                    '|', 'bulletedList', 'numberedList'
                ]
            },
            language: 'it'
\t\t} )
\t\t.then( editor => {
\t\t\twindow.editor = editor;
\t\t} )
\t\t.catch( err => {
\t\t\tconsole.error( err );
\t\t} );

    
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-faq', function() {
            window.editor.updateSourceElement();
            let _frm = document.querySelector('.contact-form');
            let validation = (new FormValidator({alerts: false})).checkAll(_frm);
            if (!validation.valid) {
                validation.fields.forEach(entry => {
                    entry.field.closest('.form-group').classList.toggle('has-error', !entry.valid);
                });
                return new resAlert('Operazione fallita', 'I campi contrassegnati in rosso sono incompleti o contengono valori non validi.', {type:'error'});
            }
            let data = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.post(`\${res.absolutePath}api/faq`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}faq-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });     

    });
    /**/  

</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "faq.twig";
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
        return array (  81 => 22,  72 => 16,  63 => 9,  57 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal linked-fields contact-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            {% if data.faq.getId() is not null %}
            <input type=\"hidden\" name=\"id\" value=\"{{ data.faq.getId() }}\">
            {% endif %}
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <fieldset>
                        <legend>FAQ</legend>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Domanda</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"domanda\" value=\"{{ data.faq.getDomanda() }}\" required>
                            </div>
                        </div>     
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Risposta</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"risposta\" rows=\"8\">{{ data.faq.getRisposta() }}</textarea>
                            </div> 
                        </div>  
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<script>

    ClassicEditor
\t\t.create( document.querySelector( 'textarea[name=\"risposta\"]' ), {
            minHeight: '300px',
            updateSourceElementOnDestroy: true,
            forcePasteAsPlainText: true,
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'bold', 'italic',
                    '|', 'bulletedList', 'numberedList'
                ]
            },
            language: 'it'
\t\t} )
\t\t.then( editor => {
\t\t\twindow.editor = editor;
\t\t} )
\t\t.catch( err => {
\t\t\tconsole.error( err );
\t\t} );

    
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-faq', function() {
            window.editor.updateSourceElement();
            let _frm = document.querySelector('.contact-form');
            let validation = (new FormValidator({alerts: false})).checkAll(_frm);
            if (!validation.valid) {
                validation.fields.forEach(entry => {
                    entry.field.closest('.form-group').classList.toggle('has-error', !entry.valid);
                });
                return new resAlert('Operazione fallita', 'I campi contrassegnati in rosso sono incompleti o contengono valori non validi.', {type:'error'});
            }
            let data = (new FormSerializer(_frm)).serialize();
            this.classList.add('loading');
            HttpRequest.post(`\${res.absolutePath}api/faq`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}faq-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });     

    });
    /**/  

</script>
{% endblock content %}", "faq.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/faq.twig");
    }
}
