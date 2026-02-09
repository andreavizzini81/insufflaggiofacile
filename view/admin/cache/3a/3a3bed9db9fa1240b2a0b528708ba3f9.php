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

/* /filters/contact_list.twig */
class __TwigTemplate_af12d3f8c0273cfaba4c48a6b8cf251d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<form action=\"javascript:void(0);\" method=\"post\" class=\"filter-wrapper list-filter-form\" data-action=\"";
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "contact-list\">
    <input type=\"hidden\" name=\"page\" value=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "pagination_obj", [], "any", false, false, false, 2), "current", [], "any", false, false, false, 2), "html", null, true);
        echo "\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" class=\"search-input\" name=\"params[key]\" value=\"";
        // line 7
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 7), "key", [], "any", true, true, false, 7) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 7), "key", [], "any", false, false, false, 7)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "filterParams", [], "any", false, true, false, 7), "key", [], "any", false, false, false, 7), "html", null, true))) : (print ("")));
        echo "\" placeholder=\"Ricerca libera...\" autocomplete=\"off\">
        </div> 
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Provincia</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param filter-state\" name=\"params[state]\">
                        <option value=\"\" selected=\"selected\">Qualsiasi</option>
                        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "state", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["state"]) {
            // line 19
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["state"], "nome_provincia", [], "any", false, false, false, 19), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["state"], "nome_provincia", [], "any", false, false, false, 19), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['state'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Città</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param filter-city\" name=\"params[city]\">
                        <option value=\"\">Qualsiasi</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button> -->
    </div>
</form>

<script>

document.addEventListener('DOMContentLoaded', function() {
    Delegate(document).on('click', '.filter-submit', function() {
        submitForm();
    });

    Delegate(document).on('change', '.filter-state', function() {
        let state = document.querySelector('.filter-state'); 
        let data = { state:`\${state.value}` };
        let removeTags = Array.from(document.querySelectorAll(\".filter-param-token\")).slice(1);
        removeTags.forEach(function(tag) {
            tag.remove();
        });
        HttpRequest.post(`/api/contact/getCity`, { state:`\${state.value}` }, response => {
            if (response.status != 1) {
                throw response.message ?? 'Errore generico';
            }
            console.log(response.result);
            let options = response.result;
            let selectCity = document.querySelector('.filter-city');
            selectCity.innerHTML = '<option value=\"\" selected=\"selected\">Qualsiasi</option>';
            options.forEach(function(option) {
                let optionCity = document.createElement('option');
                optionCity.text = option;
                optionCity.value = option;
                selectCity.appendChild(optionCity);
            });
        });
    });

    const filter = new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
        onSubmit: () => {
            console.log(\"SUBMIT\");
        },
        onInit: (toolbar) => {
            console.log(\"INIT TOOLBAR\");
        }
    });
\t
\tfunction submitForm(){
\t\tlet key = document.querySelector('.search-input'); 
        let city = document.querySelector('.filter-city'); 
        let state = document.querySelector('.filter-state'); 
        location.href = `/admin/contact-list?key=\${key.value}&city=\${city.value}&state=\${state.value}`;
\t}

}); 

</script>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/filters/contact_list.twig";
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
        return array (  79 => 21,  68 => 19,  64 => 18,  50 => 7,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form action=\"javascript:void(0);\" method=\"post\" class=\"filter-wrapper list-filter-form\" data-action=\"{{ path }}contact-list\">
    <input type=\"hidden\" name=\"page\" value=\"{{ data.pagination_obj.current }}\">
    <div class=\"params-wrapper\">
        <div class=\"dropdown-toggle\" data-toggle-filter></div>
        <div class=\"tokens-wrapper\"></div>
        <div class=\"search-input-wrapper\">
            <input type=\"text\" class=\"search-input\" name=\"params[key]\" value=\"{{ data.filterParams.key ?? '' }}\" placeholder=\"Ricerca libera...\" autocomplete=\"off\">
        </div> 
        <button type=\"button\" class=\"filter-submit\" data-action=\"submit\"></button>
    </div>
    <div class=\"dropdown-wrapper\">
        <div class=\"form-horizontal\">
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Provincia</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param filter-state\" name=\"params[state]\">
                        <option value=\"\" selected=\"selected\">Qualsiasi</option>
                        {% for state in data.state %}
                        <option value=\"{{ state.nome_provincia }}\">{{ state.nome_provincia }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"control-label col-md-3\">Città</label>
                <div class=\"col-md-9\">
                    <select class=\"form-control filter-param filter-city\" name=\"params[city]\">
                        <option value=\"\">Qualsiasi</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- <button class=\"submit\" data-action=\"submit\">APPLICA FILTRO</button> -->
    </div>
</form>

<script>

document.addEventListener('DOMContentLoaded', function() {
    Delegate(document).on('click', '.filter-submit', function() {
        submitForm();
    });

    Delegate(document).on('change', '.filter-state', function() {
        let state = document.querySelector('.filter-state'); 
        let data = { state:`\${state.value}` };
        let removeTags = Array.from(document.querySelectorAll(\".filter-param-token\")).slice(1);
        removeTags.forEach(function(tag) {
            tag.remove();
        });
        HttpRequest.post(`/api/contact/getCity`, { state:`\${state.value}` }, response => {
            if (response.status != 1) {
                throw response.message ?? 'Errore generico';
            }
            console.log(response.result);
            let options = response.result;
            let selectCity = document.querySelector('.filter-city');
            selectCity.innerHTML = '<option value=\"\" selected=\"selected\">Qualsiasi</option>';
            options.forEach(function(option) {
                let optionCity = document.createElement('option');
                optionCity.text = option;
                optionCity.value = option;
                selectCity.appendChild(optionCity);
            });
        });
    });

    const filter = new ToolbarFilter(document.querySelector('.page-toolbar .filter-wrapper'), {
        onSubmit: () => {
            console.log(\"SUBMIT\");
        },
        onInit: (toolbar) => {
            console.log(\"INIT TOOLBAR\");
        }
    });
\t
\tfunction submitForm(){
\t\tlet key = document.querySelector('.search-input'); 
        let city = document.querySelector('.filter-city'); 
        let state = document.querySelector('.filter-state'); 
        location.href = `/admin/contact-list?key=\${key.value}&city=\${city.value}&state=\${state.value}`;
\t}

}); 

</script>", "/filters/contact_list.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/filters/contact_list.twig");
    }
}
