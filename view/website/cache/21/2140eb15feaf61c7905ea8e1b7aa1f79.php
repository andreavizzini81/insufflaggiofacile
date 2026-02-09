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

/* index.twig */
class __TwigTemplate_4d539a12fed06436cf9cd182dc7b0f51 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"IT\">
    ";
        // line 3
        $this->loadTemplate("/partials/head.twig", "index.twig", 3)->display($context);
        // line 4
        echo "    <body data-page-name=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "getViewName", [], "method", false, false, false, 4), "html", null, true);
        echo "\">
\t\t<!--[if lt IE 9]>
\t\t\t<div class=\"bg-danger text-center\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\" class=\"color-main\">upgrade your browser</a> to improve your experience.</div>
\t\t<![endif]-->
\t
\t\t<div class=\"preloader\">
\t\t\t<div class=\"preloader_image\"></div>
\t\t</div>
\t
\t\t<!-- search modal -->
\t\t<div class=\"modal fade modal-search\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"search_modal\" id=\"search_modal\" aria-hidden=\"true\">
\t\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t</button>
\t\t\t\t\t<div class=\"widget widget_search\">
\t\t\t\t\t\t<form method=\"get\" class=\"searchform search-form\" action=\"https://html.modernwebtemplates.com/\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<input type=\"text\" value=\"\" name=\"search\" class=\"form-control\" placeholder=\"Search keyword\" id=\"modal-search-input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Search</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!-- Unyson messages modal -->
\t\t<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"messages_modal\">
\t\t\t<div class=\"fw-messages-wrap ls p-normal\">
\t\t\t\t<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
\t\t\t\t<!--
\t\t\t<ul class=\"list-unstyled\">
\t\t\t\t<li>Message To User</li>
\t\t\t</ul>
\t\t\t-->
\t
\t\t\t</div>
\t\t</div><!-- eof .modal -->
\t
\t
\t\t<!-- wrappers for visual page editor and boxed version of template -->
\t\t<div id=\"canvas\">
\t\t\t<div id=\"box_wrapper\">
\t\t\t
\t\t\t";
        // line 49
        $this->loadTemplate("/partials/header.twig", "index.twig", 49)->display($context);
        // line 50
        echo "\t\t\t";
        $this->displayBlock('content', $context, $blocks);
        // line 51
        echo "\t\t\t";
        $this->loadTemplate("/partials/footer.twig", "index.twig", 51)->display($context);
        // line 52
        echo "\t\t\t";
        $this->loadTemplate("/partials/body_bundle.twig", "index.twig", 52)->display($context);
        // line 53
        echo "\t\t\t
\t\t\t</div><!-- eof #box_wrapper -->
\t\t</div><!-- eof #canvas -->
    </body>
</html>";
    }

    // line 50
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "index.twig";
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
        return array (  112 => 50,  104 => 53,  101 => 52,  98 => 51,  95 => 50,  93 => 49,  44 => 4,  42 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"IT\">
    {% include '/partials/head.twig' %}
    <body data-page-name=\"{{ page.getViewName() }}\">
\t\t<!--[if lt IE 9]>
\t\t\t<div class=\"bg-danger text-center\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\" class=\"color-main\">upgrade your browser</a> to improve your experience.</div>
\t\t<![endif]-->
\t
\t\t<div class=\"preloader\">
\t\t\t<div class=\"preloader_image\"></div>
\t\t</div>
\t
\t\t<!-- search modal -->
\t\t<div class=\"modal fade modal-search\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"search_modal\" id=\"search_modal\" aria-hidden=\"true\">
\t\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
\t\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t\t</button>
\t\t\t\t\t<div class=\"widget widget_search\">
\t\t\t\t\t\t<form method=\"get\" class=\"searchform search-form\" action=\"https://html.modernwebtemplates.com/\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<input type=\"text\" value=\"\" name=\"search\" class=\"form-control\" placeholder=\"Search keyword\" id=\"modal-search-input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Search</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!-- Unyson messages modal -->
\t\t<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"messages_modal\">
\t\t\t<div class=\"fw-messages-wrap ls p-normal\">
\t\t\t\t<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
\t\t\t\t<!--
\t\t\t<ul class=\"list-unstyled\">
\t\t\t\t<li>Message To User</li>
\t\t\t</ul>
\t\t\t-->
\t
\t\t\t</div>
\t\t</div><!-- eof .modal -->
\t
\t
\t\t<!-- wrappers for visual page editor and boxed version of template -->
\t\t<div id=\"canvas\">
\t\t\t<div id=\"box_wrapper\">
\t\t\t
\t\t\t{% include '/partials/header.twig' %}
\t\t\t{% block content %}{% endblock content %}
\t\t\t{% include '/partials/footer.twig' %}
\t\t\t{% include '/partials/body_bundle.twig' %}
\t\t\t
\t\t\t</div><!-- eof #box_wrapper -->
\t\t</div><!-- eof #canvas -->
    </body>
</html>", "index.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/website/index.twig");
    }
}
