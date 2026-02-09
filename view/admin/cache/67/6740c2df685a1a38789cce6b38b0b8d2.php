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

/* quotation_list.twig */
class __TwigTemplate_4cb163d52388efac42aed78a58fc38c5 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "quotation_list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<script>

    document.addEventListener('DOMContentLoaded', function() {

        async function getFileFromUrl(url, name, defaultType = 'image/jpeg'){
            const response = await fetch(url);
            const data = await response.blob();
            const file = new File([data], name, {
                type: data.type || defaultType,
            });
            console.log(file);
        }

        getFileFromUrl('https://www.rentalness.com/media/vehicle/00042395.JPG.jpg', 'filename')


        //void new MailModal();

    });

</script>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "quotation_list.twig";
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
        return array (  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'index.twig' %}
{% block content %}

<script>

    document.addEventListener('DOMContentLoaded', function() {

        async function getFileFromUrl(url, name, defaultType = 'image/jpeg'){
            const response = await fetch(url);
            const data = await response.blob();
            const file = new File([data], name, {
                type: data.type || defaultType,
            });
            console.log(file);
        }

        getFileFromUrl('https://www.rentalness.com/media/vehicle/00042395.JPG.jpg', 'filename')


        //void new MailModal();

    });

</script>
{% endblock content %}", "quotation_list.twig", "/web/htdocs/www.bricocenteritalia.it/home/view/admin/quotation_list.twig");
    }
}
