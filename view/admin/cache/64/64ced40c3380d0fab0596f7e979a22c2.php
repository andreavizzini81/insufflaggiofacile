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

/* product.twig */
class __TwigTemplate_53108906768aa89371b6852be6050ac9 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "product.twig", 1);
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
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 6), "getId", [], "method", false, false, false, 6))) {
            // line 7
            echo "            <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 7), "getId", [], "method", false, false, false, 7), "html", null, true);
            echo "\">
            ";
        }
        // line 9
        echo "            <div class=\"row\">
                <div class=\"col-md-12\">
                    <fieldset class=\"attachment-list\" data-entity=\"Product\" data-entity-id=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 11), "getId", [], "method", false, false, false, 11), "html", null, true);
        echo "\">
                        <legend>Prodotto
                            <div class=\"action-group\">
                                <a class=\"action add-attachment\" href=\"javascript:void(0);\">
                                    <i class=\"far fa-plus\"></i>
                                    <span>CARICA IMMAGINE</span>
                                </a>
                            </div>
                        </legend>
                        <div class=\"attachment-grid\" data-empty=\"Non sono stati trovati allegati\"></div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Titolo</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"title\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 24), "getTitle", [], "method", false, false, false, 24), "html", null, true);
        echo "\" required>
                            </div>
                        </div>   
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Meta Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"meta_description\" rows=\"8\">";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 30), "getMetaDescription", [], "method", false, false, false, 30), "html", null, true);
        echo "</textarea>
                            </div> 
                        </div>  
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"description\" rows=\"8\">";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "product", [], "any", false, false, false, 36), "getDescription", [], "method", false, false, false, 36), "html", null, true);
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
\t\t\t\t\t'|', 'sourceEditing'
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

        Delegate(document).on('click', '.save-product', function() {
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
            HttpRequest.post(`\${res.absolutePath}api/product`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}product-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });    

        void new AttachmentsList
            (document.querySelector('.attachment-list')
        ); 

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
        return "product.twig";
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
        return array (  101 => 36,  92 => 30,  83 => 24,  67 => 11,  63 => 9,  57 => 7,  55 => 6,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}
<div class=\"widget\">
    <div class=\"content\">
        <form class=\"form-horizontal linked-fields contact-form\" action=\"javascript:void(0);\" method=\"POST\" autocomplete=\"off\">
            {% if data.product.getId() is not null %}
            <input type=\"hidden\" name=\"id\" value=\"{{ data.product.getId() }}\">
            {% endif %}
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <fieldset class=\"attachment-list\" data-entity=\"Product\" data-entity-id=\"{{ data.product.getId() }}\">
                        <legend>Prodotto
                            <div class=\"action-group\">
                                <a class=\"action add-attachment\" href=\"javascript:void(0);\">
                                    <i class=\"far fa-plus\"></i>
                                    <span>CARICA IMMAGINE</span>
                                </a>
                            </div>
                        </legend>
                        <div class=\"attachment-grid\" data-empty=\"Non sono stati trovati allegati\"></div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Titolo</label>
                            <div class=\"col-md-9\">
                                <input type=\"text\" class=\"form-control\" name=\"title\" value=\"{{ data.product.getTitle() }}\" required>
                            </div>
                        </div>   
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Meta Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"meta_description\" rows=\"8\">{{ data.product.getMetaDescription() }}</textarea>
                            </div> 
                        </div>  
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3\">Descrizione</label>
                            <div class=\"col-md-9\">
                                <textarea class=\"form-control\" name=\"description\" rows=\"8\">{{ data.product.getDescription() }}</textarea>
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
\t\t\t\t\t'|', 'sourceEditing'
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

        Delegate(document).on('click', '.save-product', function() {
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
            HttpRequest.post(`\${res.absolutePath}api/product`, data, response => {
                this.classList.remove('loading');
                if (response.status != 1) {
                    throw response.message ?? 'Errore generico';
                }
                window.location = `\${res.path}product-list`;
            }, err => resAlert.error('Operazione fallita', err.toString()));
        });    

        void new AttachmentsList
            (document.querySelector('.attachment-list')
        ); 

    });
    /**/  

</script>
{% endblock content %}", "product.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/product.twig");
    }
}
