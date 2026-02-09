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

/* /partials/map.twig */
class __TwigTemplate_20d8059212a8e77802e0ddf8cd197203 extends Template
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
        echo "<!-- Section Contacts -->
<section class=\"ls s-py-xl-0 container-px-0 contacts-section\">

\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"ls page_map absolute_map\">
\t\t\t\t\t<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578.6204679961388!2d15.189882227681547!3d37.690540297333996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131407b96656e347%3A0xe5b254e295261c1f!2sStr.%2011%2C%2057%2F59%2C%2095014%20Giarre%20CT!5e0!3m2!1sit!2sit!4v1716274299424!5m2!1sit!2sit\" width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>
\t\t\t\t</div>
\t\t\t\t<div class=\"divider-40 divider-lg-0\"></div>
\t\t\t</div>
\t\t\t<div class=\"ls col-xl-12 px-30 custom-col-absolute\">
\t\t\t\t<h4 class=\"special-heading mt-5\">Contatti</h4>
\t\t\t\t<div class=\"divider-40 divider-lg-50\"></div>
\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Indirizzo</h6>
\t\t\t\t\t<p>Via Strada 11 n. 57/59 - 95014 Giarre (CT)</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Email</h6>
\t\t\t\t\t<a href=\"#\"><span class=\"__cf_email__\" data-cfemail=\"3051545d595e70565f5d59481e535f5d\">info@casabiocasamia.com</span></a>
\t\t\t\t</div>

\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Telefono</h6>
\t\t\t\t\t<a href=\"callto:+393518964605\">+39 3518964605</a>
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
        return "/partials/map.twig";
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
        return new Source("<!-- Section Contacts -->
<section class=\"ls s-py-xl-0 container-px-0 contacts-section\">

\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"ls page_map absolute_map\">
\t\t\t\t\t<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578.6204679961388!2d15.189882227681547!3d37.690540297333996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131407b96656e347%3A0xe5b254e295261c1f!2sStr.%2011%2C%2057%2F59%2C%2095014%20Giarre%20CT!5e0!3m2!1sit!2sit!4v1716274299424!5m2!1sit!2sit\" width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>
\t\t\t\t</div>
\t\t\t\t<div class=\"divider-40 divider-lg-0\"></div>
\t\t\t</div>
\t\t\t<div class=\"ls col-xl-12 px-30 custom-col-absolute\">
\t\t\t\t<h4 class=\"special-heading mt-5\">Contatti</h4>
\t\t\t\t<div class=\"divider-40 divider-lg-50\"></div>
\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Indirizzo</h6>
\t\t\t\t\t<p>Via Strada 11 n. 57/59 - 95014 Giarre (CT)</p>
\t\t\t\t</div>

\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Email</h6>
\t\t\t\t\t<a href=\"#\"><span class=\"__cf_email__\" data-cfemail=\"3051545d595e70565f5d59481e535f5d\">info@casabiocasamia.com</span></a>
\t\t\t\t</div>

\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Telefono</h6>
\t\t\t\t\t<a href=\"callto:+393518964605\">+39 3518964605</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>", "/partials/map.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/website/partials/map.twig");
    }
}
