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

/* /partials/topbar.twig */
class __TwigTemplate_a8cb8a41177c45f4f710fa1d8f177205 extends Template
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
        echo "<header>
    <div class=\"product-logo\">
        <a href=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "\">
            <picture>
                <source srcset=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/img/logo.png\" media=\"(min-width: 992px)\" />
                <img src=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/img/logo-small.svg\"/>
            </picture>        
        </a>
    </div>
\t<!--
    <div class=\"global-search\">
        <input type=\"text\" name=\"key\" placeholder=\"Ricerca...\">
        <button type=\"button\" class=\"submit-global-search\"></button>
    </div>
\t-->
    <div class=\"user-info\">
        <div class=\"dropdown\">
            <span class=\"dropdown-toggle\">
                <span class=\"fad fa-user-alt fa-fw\"></span>
                <span class=\"user-name\">";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFullName", [], "method", false, false, false, 20), "html", null, true);
        echo "</span>
            </span>
            <div class=\"dropdown-content\">
                <ul>
                    <li>
                        <a href=\"javascript:void(0);\" class=\"generate-calendar-link\">Ottieni link calendario</a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0);\" class=\"send-logout-req\">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class=\"show-mobile-nav\">
        <i class=\"fas fa-ellipsis-v-alt\"></i>
    </div>
</header>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/topbar.twig";
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
        return array (  67 => 20,  50 => 6,  46 => 5,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header>
    <div class=\"product-logo\">
        <a href=\"{{ path }}\">
            <picture>
                <source srcset=\"{{theme}}assets/img/logo.png\" media=\"(min-width: 992px)\" />
                <img src=\"{{theme}}assets/img/logo-small.svg\"/>
            </picture>        
        </a>
    </div>
\t<!--
    <div class=\"global-search\">
        <input type=\"text\" name=\"key\" placeholder=\"Ricerca...\">
        <button type=\"button\" class=\"submit-global-search\"></button>
    </div>
\t-->
    <div class=\"user-info\">
        <div class=\"dropdown\">
            <span class=\"dropdown-toggle\">
                <span class=\"fad fa-user-alt fa-fw\"></span>
                <span class=\"user-name\">{{ user.getFullName() }}</span>
            </span>
            <div class=\"dropdown-content\">
                <ul>
                    <li>
                        <a href=\"javascript:void(0);\" class=\"generate-calendar-link\">Ottieni link calendario</a>
                    </li>
                    <li>
                        <a href=\"javascript:void(0);\" class=\"send-logout-req\">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class=\"show-mobile-nav\">
        <i class=\"fas fa-ellipsis-v-alt\"></i>
    </div>
</header>", "/partials/topbar.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/admin/partials/topbar.twig");
    }
}
