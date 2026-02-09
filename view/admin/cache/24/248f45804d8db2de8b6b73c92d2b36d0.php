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

/* /partials/head.twig */
class __TwigTemplate_607fad3db963b34f69fc6832ffebc647 extends Template
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
        echo "<head>
    <meta charset=\"utf-8\" />
    <title>";
        // line 3
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getFunction('getenv')->getCallable()("SW_PRODUCT_NAME"), "html", null, true);
        echo "</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width,user-scalable=no\">
    <meta http-equiv=\"Pragma\" content=\"no-cache\">
    <meta http-equiv=\"Expires\" content=\"0\">
    ";
        // line 9
        $this->loadTemplate("/partials/head_bundle.twig", "/partials/head.twig", 9)->display($context);
        // line 10
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "assets/img/favicon.ico\" sizes=\"128x128\" rel=\"shortcut icon\" type=\"image/x-icon\">
    <script>
\t\tconst res = {
            path: '";
        // line 13
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "',
            absolutePath: '";
        // line 14
        echo twig_escape_filter($this->env, ($context["absolutePath"] ?? null), "html", null, true);
        echo "',
            assets: '";
        // line 15
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "'
        };
    </script>
</head>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/head.twig";
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
        return array (  69 => 15,  65 => 14,  61 => 13,  54 => 10,  52 => 9,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<head>
    <meta charset=\"utf-8\" />
    <title>{{ title }} - {{ getenv('SW_PRODUCT_NAME') }}</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width,user-scalable=no\">
    <meta http-equiv=\"Pragma\" content=\"no-cache\">
    <meta http-equiv=\"Expires\" content=\"0\">
    {% include '/partials/head_bundle.twig' %}
    <link href=\"{{ path }}assets/img/favicon.ico\" sizes=\"128x128\" rel=\"shortcut icon\" type=\"image/x-icon\">
    <script>
\t\tconst res = {
            path: '{{ path }}',
            absolutePath: '{{ absolutePath }}',
            assets: '{{ theme }}'
        };
    </script>
</head>", "/partials/head.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/head.twig");
    }
}
