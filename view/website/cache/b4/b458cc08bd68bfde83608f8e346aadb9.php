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
class __TwigTemplate_7aee09cec3185dc6d6c379fae9b79308 extends Template
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
        echo "
<section class=\"page_title ds s-pt-115 s-pb-65 s-pb-lg-85 s-pt-lg-145 bg-auto page_title s-parallax s-overlay\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12 text-center text-lg-left\">
\t\t\t\t<h1 class=\"color-main\">FAQ</h1>
\t\t\t\t<ol class=\"breadcrumb links-light\">
\t\t\t\t\t<li class=\"breadcrumb-item\">
\t\t\t\t\t\t<a href=\"/home\">Home</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"breadcrumb-item active\">
\t\t\t\t\t\t<span class=\"bg-maincolor\">FAQ</span>
\t\t\t\t\t</li>
\t\t\t\t</ol>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<section class=\"ls py-5 c-gutter-50\">
\t<div class=\"container\">
\t\t<div class=\"text-center pb-5\">
\t\t\t<h3 class=\"special-heading\">
\t\t\t\tQuello che devi sapere sull'insufflaggio
\t\t\t</h3>
\t\t\t<p>
\t\t\tTutte le risposte alle vostre domande più comuni sull’Insufflaggio
\t\t\t</p>
\t\t</div>
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"divider-30 d-md-none\"></div>
\t\t\t\t<div class=\"tab-content vertical-tab-content p-0 border-0\">

\t\t\t\t\t<div class=\"tab-pane fade active show\" id=\"tab";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "getFaqCategoriaId", [], "method", false, false, false, 37), "html", null, true);
        echo "_pane\" role=\"tabpanel\" aria-labelledby=\"tab";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "getFaqCategoriaId", [], "method", false, false, false, 37), "html", null, true);
        echo "\">
\t\t\t\t\t\t<div class=\"accordion\" id=\"accordion";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["faq"] ?? null), "getFaqCategoriaId", [], "method", false, false, false, 38), "html", null, true);
        echo "\" role=\"tablist\">
\t\t\t\t\t\t\t";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "list", [], "any", false, false, false, 39));
        foreach ($context['_seq'] as $context["_key"] => $context["faq"]) {
            // line 40
            echo "\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-header\" role=\"tab\" id=\"collapse";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 41), "html", null, true);
            echo "_header\">
\t\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t\t<a class=\"collapsed\" data-toggle=\"collapse\" href=\"#collapse";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 43), "html", null, true);
            echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 43), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getDomanda", [], "method", false, false, false, 44), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"collapse";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 48), "html", null, true);
            echo "\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"collapse";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 48), "html", null, true);
            echo "_header\" data-parent=\"#accordion";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["faq"], "getId", [], "method", false, false, false, 48), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t";
            // line 50
            echo twig_get_attribute($this->env, $this->source, $context["faq"], "getRisposta", [], "method", false, false, false, 50);
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['faq'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "\t\t\t\t\t\t</div><!-- collapse -->
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
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
        return array (  141 => 55,  130 => 50,  121 => 48,  114 => 44,  108 => 43,  103 => 41,  100 => 40,  96 => 39,  92 => 38,  86 => 37,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}

<section class=\"page_title ds s-pt-115 s-pb-65 s-pb-lg-85 s-pt-lg-145 bg-auto page_title s-parallax s-overlay\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12 text-center text-lg-left\">
\t\t\t\t<h1 class=\"color-main\">FAQ</h1>
\t\t\t\t<ol class=\"breadcrumb links-light\">
\t\t\t\t\t<li class=\"breadcrumb-item\">
\t\t\t\t\t\t<a href=\"/home\">Home</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"breadcrumb-item active\">
\t\t\t\t\t\t<span class=\"bg-maincolor\">FAQ</span>
\t\t\t\t\t</li>
\t\t\t\t</ol>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<section class=\"ls py-5 c-gutter-50\">
\t<div class=\"container\">
\t\t<div class=\"text-center pb-5\">
\t\t\t<h3 class=\"special-heading\">
\t\t\t\tQuello che devi sapere sull'insufflaggio
\t\t\t</h3>
\t\t\t<p>
\t\t\tTutte le risposte alle vostre domande più comuni sull’Insufflaggio
\t\t\t</p>
\t\t</div>
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"divider-30 d-md-none\"></div>
\t\t\t\t<div class=\"tab-content vertical-tab-content p-0 border-0\">

\t\t\t\t\t<div class=\"tab-pane fade active show\" id=\"tab{{ faq.getFaqCategoriaId() }}_pane\" role=\"tabpanel\" aria-labelledby=\"tab{{ faq.getFaqCategoriaId() }}\">
\t\t\t\t\t\t<div class=\"accordion\" id=\"accordion{{ faq.getFaqCategoriaId() }}\" role=\"tablist\">
\t\t\t\t\t\t\t{% for faq in data.list %}
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-header\" role=\"tab\" id=\"collapse{{ faq.getId() }}_header\">
\t\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t\t<a class=\"collapsed\" data-toggle=\"collapse\" href=\"#collapse{{ faq.getId() }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ faq.getId() }}\">
\t\t\t\t\t\t\t\t\t\t\t{{ faq.getDomanda() }}
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"collapse{{ faq.getId() }}\" class=\"collapse\" role=\"tabpanel\" aria-labelledby=\"collapse{{ faq.getId() }}_header\" data-parent=\"#accordion{{ faq.getId() }}\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t{{ faq.getRisposta()|raw }}
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t</div><!-- collapse -->
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
{# ?Tv1jHA9ay\$e9sfv #}
{% endblock content %}", "faq.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/website/faq.twig");
    }
}
