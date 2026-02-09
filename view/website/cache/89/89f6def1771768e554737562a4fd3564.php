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

/* ok.twig */
class __TwigTemplate_b6b51267055045efe2f867b600ec9387 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "ok.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<section class=\"ds s-pt-145 s-pb-100 s-pt-lg-195 s-pb-lg-150 s-pt-xl-240 s-pb-xl-195 s-overlay error-404 not-found page_404 s-overlay error-404\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-12 text-center\">
                <div class=\"img_404\">
                    <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "images/img404.png\" alt=\"\">
                </div>
                <div class=\"page-content\">
                    <h1>Grazie per la tua richiesta!</h1>
                    <p>Abbiamo ricevuto la tua richiesta di preventivo. Uno dei nostri consulenti ti contatterà al più presto.</p>
                    <p>Nel frattempo, se hai bisogno di ulteriori informazioni, non esitare a <a href=\"contact.html\">contattarci</a>.</p>
                    <p class=\"buttons_404 \">
                        <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "home\" class=\"btn btn-small with-icon btn-maincolor\">Vai alla home</a>
                    </p>
                </div>
                <!-- .page-content -->
            </div>
        </div>
    </div>
</section>

";
        // line 25
        $this->loadTemplate("/partials/map.twig", "ok.twig", 25)->display($context);
        // line 26
        echo "
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ok.twig";
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
        return array (  82 => 26,  80 => 25,  68 => 16,  58 => 9,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}

<section class=\"ds s-pt-145 s-pb-100 s-pt-lg-195 s-pb-lg-150 s-pt-xl-240 s-pb-xl-195 s-overlay error-404 not-found page_404 s-overlay error-404\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-12 text-center\">
                <div class=\"img_404\">
                    <img src=\"{{ theme }}images/img404.png\" alt=\"\">
                </div>
                <div class=\"page-content\">
                    <h1>Grazie per la tua richiesta!</h1>
                    <p>Abbiamo ricevuto la tua richiesta di preventivo. Uno dei nostri consulenti ti contatterà al più presto.</p>
                    <p>Nel frattempo, se hai bisogno di ulteriori informazioni, non esitare a <a href=\"contact.html\">contattarci</a>.</p>
                    <p class=\"buttons_404 \">
                        <a href=\"{{ path }}home\" class=\"btn btn-small with-icon btn-maincolor\">Vai alla home</a>
                    </p>
                </div>
                <!-- .page-content -->
            </div>
        </div>
    </div>
</section>

{% include '/partials/map.twig' %}

{% endblock content %}", "ok.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/website/ok.twig");
    }
}
