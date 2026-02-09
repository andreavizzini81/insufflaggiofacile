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

/* /partials/nav.twig */
class __TwigTemplate_d8f5a02bcc63d98dfd6e1d7036c9fbe2 extends Template
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
        echo "<nav>
    <div class=\"user-data\">
        <div class=\"user-role\" data-role=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getRoleId", [], "method", false, false, false, 3), "html", null, true);
        echo "\">
            <span>";
        // line 4
        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFirstName", [], "method", false, false, false, 4), 0, 1), "html", null, true);
        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getLastName", [], "method", false, false, false, 4), 0, 1), "html", null, true);
        echo "</span>
        </div>
        <div class=\"info\">
            <span class=\"name\">";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFullName", [], "method", false, false, false, 7), "html", null, true);
        echo "</span>
            <span class=\"role\">";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getRoleDescription", [], "method", false, false, false, 8), "html", null, true);
        echo "</span>
        </div>
    </div>
    <div class=\"entries\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["nav"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 13
            echo "        <div class=\"entry ";
            echo (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "pages", [], "any", false, false, false, 13)) > 0)) ? ("has-child") : (""));
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 13), "html", null, true);
            echo "\" data-title=\"";
            (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "pages", [], "any", false, false, false, 13)) > 0)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 13), "html", null, true))) : (print ("")));
            echo "\">
            <div class=\"inner\">
                <span class=\"icon ";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 15), "html", null, true);
            echo "\"></span>
                <span class=\"title\">";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 16), "html", null, true);
            echo "</span>                
            </div>
            ";
            // line 18
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "pages", [], "any", false, false, false, 18)) > 0)) {
                // line 19
                echo "            <div class=\"child\">
                <span class=\"category-name\">";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 20), "html", null, true);
                echo "</span>
                ";
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["item"], "pages", [], "any", false, false, false, 21));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    // line 22
                    echo "                <div class=\"entry\" data-href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 22), "html", null, true);
                    echo "\">
                    <span class=\"title\">";
                    // line 23
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "name", [], "any", false, false, false, 23), "html", null, true);
                    echo "</span>
                </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo "            </div>
            ";
            }
            // line 28
            echo "        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "      
    </div>
    <div class=\"expand-collapse\"></div>
</nav>
<script>

document.addEventListener('DOMContentLoaded', function() {

    Delegate(document).on('click', 'nav .expand-collapse', function() {
        document.body.classList.toggle('collapsed-nav');
        let status = document.body.classList.contains('collapsed-nav') ? 'close' : 'open';
        document.cookie = `NAV_STATUS=\${status};path=/;max-age=86400`;
    });

    Delegate(document).on('click', 'nav .entry', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let _entry = e.target.closest('.entry[data-href]');
        if (_entry.classList.contains('has-child')) {
            Array.from(document.querySelectorAll('nav .entry.open')).forEach(_item => {
                if (_item === _entry) {
                    return;
                }
                _item.classList.remove('open');
            });
            return _entry.classList.toggle('open');
        }
        const href = _entry.dataset.href;
        const target = (e.metaKey || e.ctrlKey) ? '_blank' : '_self';
        window.open(href, target);
    });

    Delegate(document).on('click', '.show-mobile-nav', function() {
        document.querySelector('nav').classList.toggle('side-open');
    });
});

</script>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/nav.twig";
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
        return array (  124 => 29,  117 => 28,  113 => 26,  104 => 23,  99 => 22,  95 => 21,  91 => 20,  88 => 19,  86 => 18,  81 => 16,  77 => 15,  67 => 13,  63 => 12,  56 => 8,  52 => 7,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav>
    <div class=\"user-data\">
        <div class=\"user-role\" data-role=\"{{ user.getRoleId() }}\">
            <span>{{ user.getFirstName()[:1] }}{{ user.getLastName()[:1] }}</span>
        </div>
        <div class=\"info\">
            <span class=\"name\">{{ user.getFullName() }}</span>
            <span class=\"role\">{{ user.getRoleDescription() }}</span>
        </div>
    </div>
    <div class=\"entries\">
        {% for item in nav %}
        <div class=\"entry {{ item.pages|length > 0 ? 'has-child' : '' }}\" data-href=\"{{ item.url }}\" data-title=\"{{ item.pages|length > 0 ? item.name : '' }}\">
            <div class=\"inner\">
                <span class=\"icon {{ item.icon }}\"></span>
                <span class=\"title\">{{ item.name }}</span>                
            </div>
            {% if item.pages|length > 0 %}
            <div class=\"child\">
                <span class=\"category-name\">{{ item.name }}</span>
                {% for page in item.pages %}
                <div class=\"entry\" data-href=\"{{ page.url }}\">
                    <span class=\"title\">{{ page.name }}</span>
                </div>
                {% endfor %}
            </div>
            {% endif %}
        </div>
        {% endfor %}      
    </div>
    <div class=\"expand-collapse\"></div>
</nav>
<script>

document.addEventListener('DOMContentLoaded', function() {

    Delegate(document).on('click', 'nav .expand-collapse', function() {
        document.body.classList.toggle('collapsed-nav');
        let status = document.body.classList.contains('collapsed-nav') ? 'close' : 'open';
        document.cookie = `NAV_STATUS=\${status};path=/;max-age=86400`;
    });

    Delegate(document).on('click', 'nav .entry', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let _entry = e.target.closest('.entry[data-href]');
        if (_entry.classList.contains('has-child')) {
            Array.from(document.querySelectorAll('nav .entry.open')).forEach(_item => {
                if (_item === _entry) {
                    return;
                }
                _item.classList.remove('open');
            });
            return _entry.classList.toggle('open');
        }
        const href = _entry.dataset.href;
        const target = (e.metaKey || e.ctrlKey) ? '_blank' : '_self';
        window.open(href, target);
    });

    Delegate(document).on('click', '.show-mobile-nav', function() {
        document.querySelector('nav').classList.toggle('side-open');
    });
});

</script>", "/partials/nav.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/admin/partials/nav.twig");
    }
}
