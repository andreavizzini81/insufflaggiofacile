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

/* /partials/footer.twig */
class __TwigTemplate_29a4b95de2b6e04b1127eda66d8b580a extends Template
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
        echo "<section class=\"page_copyright ds s-py-20\">
\t<div class=\"container\">
\t\t<div class=\"row align-items-center\">
\t\t\t<div class=\"col-md-6 text-center text-md-left animate\" data-animation=\"fadeInUp\">
\t\t\t\t<p>&copy; <span class=\"copyright_year\">2024</span> Casabiocasamia s.r.l.s. · P.IVA 05022260870</p>
\t\t\t</div>
\t\t\t<div class=\"col-md-6 text-center text-md-right  animate\" data-animation=\"fadeInUp\">
\t\t\t\t<div class=\"widget widget_nav_menu\">
\t\t\t\t\t<a href=\"#\">Privacy</a>
\t\t\t\t\t<a href=\"#\" title=\"facebook\"><span class=\"fa fa-facebook bg-icon rounded-icon\"></span></a>
\t\t\t\t\t<a href=\"#\" title=\"google\"><span class=\"fa fa-google bg-icon rounded-icon\"></span></a>
\t\t\t\t\t<a href=\"#\" title=\"instagram\"><span class=\"fa fa-instagram bg-icon rounded-icon\"></span></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/partials/footer.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"page_copyright ds s-py-20\">
\t<div class=\"container\">
\t\t<div class=\"row align-items-center\">
\t\t\t<div class=\"col-md-6 text-center text-md-left animate\" data-animation=\"fadeInUp\">
\t\t\t\t<p>&copy; <span class=\"copyright_year\">2024</span> Casabiocasamia s.r.l.s. · P.IVA 05022260870</p>
\t\t\t</div>
\t\t\t<div class=\"col-md-6 text-center text-md-right  animate\" data-animation=\"fadeInUp\">
\t\t\t\t<div class=\"widget widget_nav_menu\">
\t\t\t\t\t<a href=\"#\">Privacy</a>
\t\t\t\t\t<a href=\"#\" title=\"facebook\"><span class=\"fa fa-facebook bg-icon rounded-icon\"></span></a>
\t\t\t\t\t<a href=\"#\" title=\"google\"><span class=\"fa fa-google bg-icon rounded-icon\"></span></a>
\t\t\t\t\t<a href=\"#\" title=\"instagram\"><span class=\"fa fa-instagram bg-icon rounded-icon\"></span></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>", "/partials/footer.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/website/partials/footer.twig");
    }
}
