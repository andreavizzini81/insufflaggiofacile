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

/* insufflaggio.twig */
class __TwigTemplate_1f6c9796bfcda80ceda5ff53f871a065 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "insufflaggio.twig", 1);
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
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "insufflaggio", [], "any", false, false, false, 6), "getId", [], "method", false, false, false, 6))) {
            // line 7
            echo "            <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "insufflaggio", [], "any", false, false, false, 7), "getId", [], "method", false, false, false, 7), "html", null, true);
            echo "\">
            ";
        }
        // line 9
        echo "            <div class=\"row\">
                <div class=\"col-md-12\">
                    <fieldset>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Titolo</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"title\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "insufflaggio", [], "any", false, false, false, 15), "getTitle", [], "method", false, false, false, 15), "html", null, true);
        echo "\" required>
                            </div>
                        </div>   
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Meta Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"meta_description\" rows=\"8\">";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "insufflaggio", [], "any", false, false, false, 21), "getMetaDescription", [], "method", false, false, false, 21), "html", null, true);
        echo "</textarea>
                            </div> 
                        </div>  
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"description\" rows=\"8\">";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "insufflaggio", [], "any", false, false, false, 27), "getDescription", [], "method", false, false, false, 27), "html", null, true);
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
\t\t.create( document.querySelector( 'textarea[name=\"description\"]' ), {
            minHeight: '300px',
            updateSourceElementOnDestroy: true,
            forcePasteAsPlainText: true,
\t\t\thtmlSupport: {
\t\t\t\tallow: [
\t\t\t\t\t{
\t\t\t\t\t\tname: /^.*\$/,
\t\t\t\t\t\tstyles: true,
\t\t\t\t\t\tattributes: true,
\t\t\t\t\t\tclasses: true
\t\t\t\t\t}
\t\t\t\t]
\t\t\t},
            alignment: {
                options: [ 'left', 'right', 'center', 'justify' ]
            },
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'bold', 'italic',
                    '|', 'bulletedList', 'numberedList',
                    '|', 'alignment',
\t\t\t\t\t'|', 'sourceEditing',
                    '|', 'link'
                ]
            },
            language: 'it',
\t\t\tsourceEditing: {
\t\t\t\tallowCollaborationFeatures: true
\t\t\t}
\t\t} )
\t\t.then( editor => {
\t\t\twindow.editor = editor;
\t\t} )
\t\t.catch( err => {
\t\t\tconsole.error( err );
\t\t} );

    
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-insufflaggio', function() {
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
            HttpRequest.post(`\${res.absolutePath}api/insufflaggio`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}insufflaggio-list`;
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
        return "insufflaggio.twig";
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
        return array (  89 => 27,  80 => 21,  71 => 15,  63 => 9,  57 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal linked-fields contact-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            {% if data.insufflaggio.getId() is not null %}
            <input type=\"hidden\" name=\"id\" value=\"{{ data.insufflaggio.getId() }}\">
            {% endif %}
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <fieldset>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Titolo</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"title\" value=\"{{ data.insufflaggio.getTitle() }}\" required>
                            </div>
                        </div>   
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Meta Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"meta_description\" rows=\"8\">{{ data.insufflaggio.getMetaDescription() }}</textarea>
                            </div> 
                        </div>  
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"description\" rows=\"8\">{{ data.insufflaggio.getDescription() }}</textarea>
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
\t\t.create( document.querySelector( 'textarea[name=\"description\"]' ), {
            minHeight: '300px',
            updateSourceElementOnDestroy: true,
            forcePasteAsPlainText: true,
\t\t\thtmlSupport: {
\t\t\t\tallow: [
\t\t\t\t\t{
\t\t\t\t\t\tname: /^.*\$/,
\t\t\t\t\t\tstyles: true,
\t\t\t\t\t\tattributes: true,
\t\t\t\t\t\tclasses: true
\t\t\t\t\t}
\t\t\t\t]
\t\t\t},
            alignment: {
                options: [ 'left', 'right', 'center', 'justify' ]
            },
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'bold', 'italic',
                    '|', 'bulletedList', 'numberedList',
                    '|', 'alignment',
\t\t\t\t\t'|', 'sourceEditing',
                    '|', 'link'
                ]
            },
            language: 'it',
\t\t\tsourceEditing: {
\t\t\t\tallowCollaborationFeatures: true
\t\t\t}
\t\t} )
\t\t.then( editor => {
\t\t\twindow.editor = editor;
\t\t} )
\t\t.catch( err => {
\t\t\tconsole.error( err );
\t\t} );

    
   
    document.addEventListener('DOMContentLoaded', function() {

        Delegate(document).on('click', '.save-insufflaggio', function() {
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
            HttpRequest.post(`\${res.absolutePath}api/insufflaggio`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}insufflaggio-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });    

    });
    /**/  

</script>
{% endblock content %}", "insufflaggio.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/insufflaggio.twig");
    }
}
