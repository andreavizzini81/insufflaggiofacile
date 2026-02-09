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
class __TwigTemplate_91f7b9acaee575d21028d8298fed9908 extends Template
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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MW4768MH');</script>
    <!-- End Google Tag Manager -->
    <meta charset=\"utf-8\" />
    <title>";
        // line 10
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
    <meta name=\"description\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width,user-scalable=yes,maximum-scale=5\">
    <meta http-equiv=\"Pragma\" content=\"no-cache\">
    <meta http-equiv=\"Expires\" content=\"0\">
    ";
        // line 17
        $this->loadTemplate("/partials/head_bundle.twig", "/partials/head.twig", 17)->display($context);
        // line 18
        echo "\t<!-- Hotjar Tracking Code for insufflaggiofacile.it -->
\t<script>
\t\t(function(h,o,t,j,a,r){
\t\t\th.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
\t\t\th._hjSettings={hjid:4967041,hjsv:6};
\t\t\ta=o.getElementsByTagName('head')[0];
\t\t\tr=o.createElement('script');r.async=1;
\t\t\tr.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
\t\t\ta.appendChild(r);
\t\t})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
\t</script>
  <!-- Meta Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '987200226523357');
  fbq('track', 'PageView');
  </script>
  <noscript><img height=\"1\" width=\"1\" style=\"display:none\"
  src=\"https://www.facebook.com/tr?id=987200226523357&ev=PageView&noscript=1\"
  /></noscript> 
  <!-- End Meta Pixel Code -->
</head>
";
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
        return array (  63 => 18,  61 => 17,  52 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MW4768MH');</script>
    <!-- End Google Tag Manager -->
    <meta charset=\"utf-8\" />
    <title>{{ title }}</title>
    <meta name=\"description\" content=\"{{ description }}\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width,user-scalable=yes,maximum-scale=5\">
    <meta http-equiv=\"Pragma\" content=\"no-cache\">
    <meta http-equiv=\"Expires\" content=\"0\">
    {% include '/partials/head_bundle.twig' %}
\t<!-- Hotjar Tracking Code for insufflaggiofacile.it -->
\t<script>
\t\t(function(h,o,t,j,a,r){
\t\t\th.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
\t\t\th._hjSettings={hjid:4967041,hjsv:6};
\t\t\ta=o.getElementsByTagName('head')[0];
\t\t\tr=o.createElement('script');r.async=1;
\t\t\tr.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
\t\t\ta.appendChild(r);
\t\t})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
\t</script>
  <!-- Meta Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '987200226523357');
  fbq('track', 'PageView');
  </script>
  <noscript><img height=\"1\" width=\"1\" style=\"display:none\"
  src=\"https://www.facebook.com/tr?id=987200226523357&ev=PageView&noscript=1\"
  /></noscript> 
  <!-- End Meta Pixel Code -->
</head>
", "/partials/head.twig", "/var/www/vhosts/insufflaggiofacile.it/httpdocs/view/website/partials/head.twig");
    }
}
