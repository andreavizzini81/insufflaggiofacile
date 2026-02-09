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

/* /partials/header.twig */
class __TwigTemplate_345081ceaf7353429ecad571b1d69863 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'header' => [$this, 'block_header'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $this->displayBlock('header', $context, $blocks);
    }

    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<div class=\"header_absolute ds cover-background s-overlay\">
\t<!-- header with two Bootstrap columns - left for logo and right for navigation and includes ( phone ) -->
\t<header class=\"page_header ds justify-nav-center\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"row align-items-center\">
\t\t\t\t<div class=\"my-15 my-md-0 col-xl-2 col-md-4 col-11\">
\t\t\t\t\t<a href=\"index.html\" class=\"logo\">
\t\t\t\t\t\t<img src=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/logo.png\" alt=\"\">
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xl-8 col-1 order-3 order-lg-2\">
\t\t\t\t\t<div class=\"nav-wrap\">
\t\t\t\t\t\t<!-- main nav start -->
\t\t\t\t\t\t<nav class=\"top-nav\">
\t\t\t\t\t\t\t<ul class=\"nav sf-menu\">
\t\t\t\t\t\t\t\t<li class=\"active\">
\t\t\t\t\t\t\t\t\t<a href=\"/home\">Home</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"/faq\">FAQ</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</nav>
\t\t\t\t\t\t<!-- eof main nav -->
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xl-2 col-5 order-2 order-lg-3 d-none d-md-block top-phone\">
\t\t\t\t\t<a href=\"tel:+393518964605\" class=\"fs-20 fw-500 d-flex align-items-center justify-content-xl-end links-light\">
\t\t\t\t\t\t<i class=\"fa fa-phone-square color-main fs-37 mr-2\"></i>
\t\t\t\t\t\t<span>3518964605</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!-- header toggler -->
\t\t<span class=\"toggle_menu\"><span></span></span>
\t</header>

</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/header.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  54 => 9,  45 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block header %}
<div class=\"header_absolute ds cover-background s-overlay\">
\t<!-- header with two Bootstrap columns - left for logo and right for navigation and includes ( phone ) -->
\t<header class=\"page_header ds justify-nav-center\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"row align-items-center\">
\t\t\t\t<div class=\"my-15 my-md-0 col-xl-2 col-md-4 col-11\">
\t\t\t\t\t<a href=\"index.html\" class=\"logo\">
\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/logo.png\" alt=\"\">
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xl-8 col-1 order-3 order-lg-2\">
\t\t\t\t\t<div class=\"nav-wrap\">
\t\t\t\t\t\t<!-- main nav start -->
\t\t\t\t\t\t<nav class=\"top-nav\">
\t\t\t\t\t\t\t<ul class=\"nav sf-menu\">
\t\t\t\t\t\t\t\t<li class=\"active\">
\t\t\t\t\t\t\t\t\t<a href=\"/home\">Home</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"/faq\">FAQ</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</nav>
\t\t\t\t\t\t<!-- eof main nav -->
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xl-2 col-5 order-2 order-lg-3 d-none d-md-block top-phone\">
\t\t\t\t\t<a href=\"tel:+393518964605\" class=\"fs-20 fw-500 d-flex align-items-center justify-content-xl-end links-light\">
\t\t\t\t\t\t<i class=\"fa fa-phone-square color-main fs-37 mr-2\"></i>
\t\t\t\t\t\t<span>3518964605</span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!-- header toggler -->
\t\t<span class=\"toggle_menu\"><span></span></span>
\t</header>

</div>
{% endblock header %}", "/partials/header.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/website/partials/header.twig");
    }
}
