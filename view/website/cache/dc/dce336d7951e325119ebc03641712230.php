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

/* home.twig */
class __TwigTemplate_68e1783222814227eb9b0ae7ae1e4201 extends Template
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
        $this->parent = $this->loadTemplate("index.twig", "home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<section class=\"page_slider ds\">
\t<div class=\"flexslider\" data-nav=\"false\">
\t\t<ul class=\"slides\">
\t\t\t<li class=\"cover-image\">
\t\t\t\t<span class=\"flexslider-overlay\"></span>
\t\t\t\t<img src=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/slide04.jpg\" alt=\"\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\"> 
\t\t\t\t\t\t\t<div class=\"intro_layers_wrapper\">
\t\t\t\t\t\t\t\t<div class=\"intro_layers\">
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<div class=\"d-inline-block\">
\t\t\t\t\t\t\t\t\t\t\t<h2 class=\"intro_featured_word\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"color-main\">Insufflaggio:</span><br>Isolamento Termico<br>a Basso Costo
\t\t\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer slider-buttons\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn-link with-icon light-link\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div> <!-- eof .intro_layers -->
\t\t\t\t\t\t\t</div> <!-- eof .intro_layers_wrapper -->
\t\t\t\t\t\t</div> <!-- eof .col-* -->
\t\t\t\t\t</div><!-- eof .row -->
\t\t\t\t</div><!-- eof .container -->
\t\t\t</li>
\t\t\t<li class=\"cover-image\">
\t\t\t\t<span class=\"flexslider-overlay light-overlay\"></span>
\t\t\t\t<img src=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/slide05.jpg\" alt=\"\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t<div class=\"intro_layers_wrapper\">
\t\t\t\t\t\t\t\t<div class=\"intro_layers\">
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<div class=\"d-inline-block\">
\t\t\t\t\t\t\t\t\t\t\t<h2 class=\"intro_featured_word\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"color-main\">Protezione</span> dalla<br>
\t\t\t\t\t\t\t\t\t\t\t\tMuffa e Umidit&agrave;
\t\t\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer slider-buttons\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn-link with-icon light-link\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div> <!-- eof .intro_layers -->
\t\t\t\t\t\t\t</div> <!-- eof .intro_layers_wrapper -->
\t\t\t\t\t\t</div> <!-- eof .col-* -->
\t\t\t\t\t</div><!-- eof .row -->
\t\t\t\t</div><!-- eof .container -->
\t\t\t</li>
\t\t\t<li class=\"cover-image\">
\t\t\t\t<span class=\"flexslider-overlay light-overlay\"></span>
\t\t\t\t<img src=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/slide06.jpg\" alt=\"\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t<div class=\"intro_layers_wrapper\">
\t\t\t\t\t\t\t\t<div class=\"intro_layers\">
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<div class=\"d-inline-block\">
\t\t\t\t\t\t\t\t\t\t\t<h2 class=\"intro_featured_word\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"color-main\">Miglioramento</span><br> dell' Isolamento Acustico
\t\t\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer slider-buttons\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn-link with-icon light-link\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div> <!-- eof .intro_layers -->
\t\t\t\t\t\t\t</div> <!-- eof .intro_layers_wrapper -->
\t\t\t\t\t\t</div> <!-- eof .col-* -->
\t\t\t\t\t</div><!-- eof .row -->
\t\t\t\t</div><!-- eof .container -->
\t\t\t</li>
\t\t</ul>
\t</div> <!-- eof flexslider -->
</section>

<!-- Section Icon Boxes -->
<section class=\"ls s-pt-60 s-pb-15 s-pt-lg-95 s-pb-lg-35 s-pt-xl-150 s-pb-xl-85 icon-bg s-parallax\">
\t<div class=\"container\">
\t\t<div class=\"row\">

\t\t\t<div class=\"col-12 col-lg-4\">
\t\t\t\t<div class=\"divider-lg-15\"></div>
\t\t\t\t<img src=\"";
        // line 91
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/logo-dark.png\" alt=\"\">
\t\t\t\t<div class=\"divider-40 divider-lg-65\"></div>
\t\t\t\t
\t\t\t\t<h4 class=\"special-heading\">
\t\t\t\t\tI vantaggi dell'insufflaggio di cellulosa
\t\t\t\t</h4>

\t\t\t\t<div class=\"divider-40 divider-lg-0\"></div>
\t\t\t</div>

\t\t\t<div class=\"col-12 col-lg-8\">
\t\t\t\t<div class=\"row c-gutter-90 c-mb-40 c-mb-lg-60\">
\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-footprint\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Isolamento termico</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tLa cellulosa ha eccellenti proprietà isolanti grazie alla sua struttura fibrosa, che riduce significativamente la dispersione di calore. Ciò contribuisce a creare un ambiente interno più confortevole durante tutto l'anno, riducendo la necessità di riscaldamento o raffreddamento e abbassando i costi energetici.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-listening\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Isolamento acustico</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tL'insufflaggio di cellulosa riduce notevolmente la trasmissione dei rumori provenienti dall'esterno o da altre stanze all'interno dell'edificio. Ciò significa che potrete godere di un ambiente più tranquillo e silenzioso, proteggendo la vostra privacy e migliorando la qualità della vita all'interno della struttura.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-plug\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Riduzione dei consumi energetici</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tGrazie all'efficace isolamento termico offerto dalla cellulosa, è possibile ridurre notevolmente il consumo di energia per il riscaldamento e il raffreddamento dell'edificio. Ciò comporta un risparmio significativo sulle bollette energetiche a lungo termine, consentendo un ritorno sull'investimento nel tempo.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-award\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Riduzione dell'impatto ambientale</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tLa cellulosa è un materiale isolante ecologico, realizzato principalmente da carta riciclata e trattato con additivi ignifughi naturali. L'uso della cellulosa come isolante contribuisce alla riduzione dell'impatto ambientale dell'edificio, promuovendo la sostenibilità e la protezione dell'ambiente.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-house\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Migliore comfort abitativo</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tGrazie all'isolamento termico e acustico superiore fornito dall'insufflaggio di cellulosa, l'ambiente interno diventa più confortevole. Si riducono le variazioni di temperatura e gli sbalzi termici, creando un'atmosfera piacevole e stabile all'interno dell'edificio.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-support\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Durata e resistenza</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tLa cellulosa insufflata forma uno strato compatto e stabile all'interno delle intercapedini, che mantiene le sue prestazioni nel tempo. La cellulosa è resistente al deterioramento, alle muffe e agli insetti dannosi, garantendo un'efficace protezione dell'edificio nel corso degli anni.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t</div><!-- .row* -->
\t\t\t</div><!-- .col-* -->
\t\t</div><!-- .row* -->
\t</div>
</section>

<!-- Section Call To Action -->
<section class=\"ds s-py-60 s-py-lg-100 s-py-xl-150 s-overlay s-parallax call-to-action text-center text-lg-left\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-11 m-auto col-lg-12 p-40 px-lg-60 py-lg-65 ls animate\" data-animation=\"pullDown\">
\t\t\t\t<div class=\"row align-items-center justify-content-between\">
\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t<img src=\"";
        // line 212
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/logo-dark.png\" alt=\"\">
\t\t\t\t\t\t<div class=\"divider-25 divider-lg-0\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t\t<p>Saremo lieti di fornirti un preventivo GRATUITO per il tuo isolamento termico ed acustico.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-3 text-lg-right\">
\t\t\t\t\t\t<div class=\"divider-25 divider-lg-0\"></div>
\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn btn-small btn-maincolor with-icon btn-ls\">Richiedi un preventivo</a>
\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</div>
\t\t</div>
\t</div>
</section>

<!-- Section Steps -->
<section class=\"ls s-py-55 s-pt-lg-100 s-pb-lg-95 s-pt-xl-150 s-pb-xl-145 text-center text-md-left\">
\t<div class=\"container\">
\t\t<div class=\"row align-items-center\">
\t\t\t<div class=\"col-md-5 col-lg-3 col-xl-4\">
\t\t\t\t<h4 class=\"special-heading\">Come funziona</h4>
\t\t\t</div>
\t\t\t<div class=\"col-md-7 col-lg-5 col-xl-8\">
\t\t\t\t<div class=\"divider-25 divider-md-0\"></div>
\t\t\t\t<p>Dal 2012, il nostro impegno nel campo dei servizi di isolamento si è distinto per la sua affidabilità e la sua qualità insuperabile. Tuttavia, ciò che ci rende veramente unici è la nostra visione: non ci limitiamo a essere soltanto un'azienda di isolamento, ma aspiriamo a trasformare i sogni dei nostri clienti in una solida realtà, prestando attenzione a ogni dettaglio.</p>
\t\t\t</div>
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"divider-40  divider-lg-60\"></div>
\t\t\t\t<div class=\"steps-alt\">
\t\t\t\t\t<i class=\"ico-step text-left ico ico-start color-dark fs-40\"></i>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Valutiamo la Tua richiesta</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Formuliamo un preventivo</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Isoliamo la Tua Casa</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Risparmi sulle bollette</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<i class=\"ico-step text-right ico ico-finish color-dark fs-40\"></i>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<!-- Section  Testimonials -->
<section id=\"testimonials\" class=\"ls ms s-pt-55 s-pb-50 s-pt-lg-95 s-pb-lg-90 s-pt-xl-145 s-pb-xl-140\">
\t<div class=\"container\">
\t\t<div class=\"row\">

\t\t\t<div class=\"col-12 col-md-7 mx-auto text-center\">
\t\t\t\t<h4 class=\"special-heading\">Cosa dice la gente</h4>
\t\t\t\t<p class=\"special-heading\">Scopri cosa dicono i nostri clienti: leggi le recensioni qui sotto.</p>
\t\t\t\t<div class=\"divider-30 divider-lg-40\"></div>
\t\t\t</div>

\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"testimonials-slider owl-carousel\" data-autoplay=\"true\" data-loop=\"true\" data-responsive-lg=\"1\" data-responsive-md=\"1\" data-responsive-sm=\"1\" data-nav=\"true\" data-dots=\"false\" data-animateout=\"fadeOut\">
\t\t\t\t\t<div class=\"quote-item hero-bg box-shadow\">
\t\t\t\t\t\t<div class=\"quote-image\">
\t\t\t\t\t\t\t<img src=\"";
        // line 299
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/team/testimonials01.jpg\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"quote-content\">
\t\t\t\t\t\t\t<blockquote class=\"fs-20\">
\t\t\t\t\t\t\t\tSono rimasto estremamente soddisfatto del servizio di insufflaggio di cellulosa fornito da questa azienda. Innanzitutto, il personale è stato estremamente professionale e cortese fin dall'inizio. Mi hanno fornito tutte le informazioni necessarie e risposto a tutte le mie domande in modo chiaro e esauriente.
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t<h6>Diana V.</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"quote-item hero-bg box-shadow\">
\t\t\t\t\t\t<div class=\"quote-image\">
\t\t\t\t\t\t\t<img src=\"";
        // line 311
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/team/testimonials02.jpg\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"quote-content\">
\t\t\t\t\t\t\t<blockquote class=\"fs-20\">
\t\t\t\t\t\t\t\tL'intero processo di insufflaggio è stato rapido ed efficiente, e ho notato immediatamente un miglioramento nella temperatura e nell'isolamento acustico della mia abitazione. Inoltre, ho apprezzato molto l'attenzione ai dettagli durante l'installazione.
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t<h6>Daniele M.</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"quote-item hero-bg box-shadow\">
\t\t\t\t\t\t<div class=\"quote-image\">
\t\t\t\t\t\t\t<img src=\"";
        // line 323
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/team/testimonials03.jpg\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"quote-content\">
\t\t\t\t\t\t\t<blockquote class=\"fs-20\">
\t\t\t\t\t\t\t\tDopo aver avuto questa esperienza positiva, consiglio vivamente il servizio di insufflaggio di cellulosa di questa azienda a chiunque sia alla ricerca di un'efficace soluzione di isolamento per la propria casa. Grazie ancora per il servizio impeccabile!
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t<h6>Letizia B.</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div><!-- .testimonials-slider -->

\t\t\t</div>
\t\t</div>
\t</div>

</section>

<!-- Section Project -->
<section id=\"project\" class=\"ds ms s-overlay s-parallax s-py-55 s-py-lg-95 s-py-xl-145 project-horizontal-section\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-8 offset-md-2 text-center\">
\t\t\t\t<h4 class=\"special-heading\">Prodotti da insufflaggio</h4>
\t\t\t\t<p class=\"special-heading\">Offriamo i nostri servizi professionali di isolamento di immobili residenziali e commerciali sia per edifici esistenti che di nuova costruzione.</p>
\t\t\t\t<div class=\"divider-30 divider-lg-53\"></div>
\t\t\t</div>
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"owl-carousel count-list\" data-nav=\"false\" data-dots=\"true\" data-autoplay=\"false\" data-loop=\"false\" data-margin=\"30\" data-responsive-xs=\"1\" data-responsive-sm=\"2\" data-responsive-md=\"2\" data-responsive-lg=\"2\">

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Cellulosa</a>
\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"";
        // line 363
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/cellulosa.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Lana di vetro</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"";
        // line 381
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/lana-di-vetro.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Lana di roccia</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"";
        // line 399
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/lana-di-roccia.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Sughero</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"";
        // line 417
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/sughero.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Polistirolo in perle sfuse</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"";
        // line 435
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/polistirolo.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Argilla espansa</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"";
        // line 453
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/argilla-espansa.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<!-- Section Contacts -->
<section class=\"ls s-py-xl-0 container-px-0 contacts-section\">

\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"ls page_map absolute_map\">
\t\t\t\t\t<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3156.346331358047!2d15.18030587626157!3d37.71154781579898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1314065183933c4b%3A0x5cd4a1150d087f5!2sVia%20Giuseppe%20Ungaretti%2C%2015%2C%2095014%20Giarre%20CT!5e0!3m2!1sit!2sit!4v1711782490003!5m2!1sit!2sit\" width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>
\t\t\t\t</div>
\t\t\t\t<div class=\"divider-40 divider-lg-0\"></div>
\t\t\t</div>
\t\t\t<div class=\"ls col-xl-12 px-30 custom-col-absolute\">
\t\t\t\t<h4 class=\"special-heading mt-5\">Contatti</h4>
\t\t\t\t<div class=\"divider-40 divider-lg-50\"></div>
\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Indirizzo</h6>
\t\t\t\t\t<p>Via G. Ungaretti, 15/a - 95014 Giarre (CT)</p>
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
</section>

<!-- Section partners
<section class=\"c-gutter-0 container-px-45 s-py-30 s-pt-lg-120 s-pb-lg-110 partners-section\">
\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-sm-12 text-center\">
\t\t\t\t<div class=\"owl-carousel\" data-margin=\"100\" data-responsive-lg=\"6\" data-responsive-md=\"4\" data-responsive-sm=\"3\" data-responsive-xs=\"1\" data-nav=\"false\" data-loop=\"true\">
\t\t\t\t\t<img src=\"";
        // line 505
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/partners/01.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"";
        // line 506
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/partners/02.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"";
        // line 507
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/partners/03.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"";
        // line 508
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/partners/04.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"";
        // line 509
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/partners/05.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"";
        // line 510
        echo twig_escape_filter($this->env, ($context["theme"] ?? null), "html", null, true);
        echo "assets/images/partners/06.jpg\" alt=\"\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
 -->
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "home.twig";
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
        return array (  616 => 510,  612 => 509,  608 => 508,  604 => 507,  600 => 506,  596 => 505,  541 => 453,  520 => 435,  499 => 417,  478 => 399,  457 => 381,  436 => 363,  393 => 323,  378 => 311,  363 => 299,  273 => 212,  149 => 91,  113 => 58,  85 => 33,  58 => 9,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.twig\" %}
{% block content %}

<section class=\"page_slider ds\">
\t<div class=\"flexslider\" data-nav=\"false\">
\t\t<ul class=\"slides\">
\t\t\t<li class=\"cover-image\">
\t\t\t\t<span class=\"flexslider-overlay\"></span>
\t\t\t\t<img src=\"{{ theme }}assets/images/slide04.jpg\" alt=\"\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\"> 
\t\t\t\t\t\t\t<div class=\"intro_layers_wrapper\">
\t\t\t\t\t\t\t\t<div class=\"intro_layers\">
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<div class=\"d-inline-block\">
\t\t\t\t\t\t\t\t\t\t\t<h2 class=\"intro_featured_word\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"color-main\">Insufflaggio:</span><br>Isolamento Termico<br>a Basso Costo
\t\t\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer slider-buttons\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn-link with-icon light-link\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div> <!-- eof .intro_layers -->
\t\t\t\t\t\t\t</div> <!-- eof .intro_layers_wrapper -->
\t\t\t\t\t\t</div> <!-- eof .col-* -->
\t\t\t\t\t</div><!-- eof .row -->
\t\t\t\t</div><!-- eof .container -->
\t\t\t</li>
\t\t\t<li class=\"cover-image\">
\t\t\t\t<span class=\"flexslider-overlay light-overlay\"></span>
\t\t\t\t<img src=\"{{ theme }}assets/images/slide05.jpg\" alt=\"\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t<div class=\"intro_layers_wrapper\">
\t\t\t\t\t\t\t\t<div class=\"intro_layers\">
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<div class=\"d-inline-block\">
\t\t\t\t\t\t\t\t\t\t\t<h2 class=\"intro_featured_word\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"color-main\">Protezione</span> dalla<br>
\t\t\t\t\t\t\t\t\t\t\t\tMuffa e Umidit&agrave;
\t\t\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer slider-buttons\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn-link with-icon light-link\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div> <!-- eof .intro_layers -->
\t\t\t\t\t\t\t</div> <!-- eof .intro_layers_wrapper -->
\t\t\t\t\t\t</div> <!-- eof .col-* -->
\t\t\t\t\t</div><!-- eof .row -->
\t\t\t\t</div><!-- eof .container -->
\t\t\t</li>
\t\t\t<li class=\"cover-image\">
\t\t\t\t<span class=\"flexslider-overlay light-overlay\"></span>
\t\t\t\t<img src=\"{{ theme }}assets/images/slide06.jpg\" alt=\"\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t<div class=\"intro_layers_wrapper\">
\t\t\t\t\t\t\t\t<div class=\"intro_layers\">
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<div class=\"d-inline-block\">
\t\t\t\t\t\t\t\t\t\t\t<h2 class=\"intro_featured_word\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"color-main\">Miglioramento</span><br> dell' Isolamento Acustico
\t\t\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"intro_layer slider-buttons\" data-animation=\"fadeInDown\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn-link with-icon light-link\">Richiedi un preventivo</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div> <!-- eof .intro_layers -->
\t\t\t\t\t\t\t</div> <!-- eof .intro_layers_wrapper -->
\t\t\t\t\t\t</div> <!-- eof .col-* -->
\t\t\t\t\t</div><!-- eof .row -->
\t\t\t\t</div><!-- eof .container -->
\t\t\t</li>
\t\t</ul>
\t</div> <!-- eof flexslider -->
</section>

<!-- Section Icon Boxes -->
<section class=\"ls s-pt-60 s-pb-15 s-pt-lg-95 s-pb-lg-35 s-pt-xl-150 s-pb-xl-85 icon-bg s-parallax\">
\t<div class=\"container\">
\t\t<div class=\"row\">

\t\t\t<div class=\"col-12 col-lg-4\">
\t\t\t\t<div class=\"divider-lg-15\"></div>
\t\t\t\t<img src=\"{{ theme }}assets/images/logo-dark.png\" alt=\"\">
\t\t\t\t<div class=\"divider-40 divider-lg-65\"></div>
\t\t\t\t
\t\t\t\t<h4 class=\"special-heading\">
\t\t\t\t\tI vantaggi dell'insufflaggio di cellulosa
\t\t\t\t</h4>

\t\t\t\t<div class=\"divider-40 divider-lg-0\"></div>
\t\t\t</div>

\t\t\t<div class=\"col-12 col-lg-8\">
\t\t\t\t<div class=\"row c-gutter-90 c-mb-40 c-mb-lg-60\">
\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-footprint\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Isolamento termico</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tLa cellulosa ha eccellenti proprietà isolanti grazie alla sua struttura fibrosa, che riduce significativamente la dispersione di calore. Ciò contribuisce a creare un ambiente interno più confortevole durante tutto l'anno, riducendo la necessità di riscaldamento o raffreddamento e abbassando i costi energetici.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-listening\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Isolamento acustico</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tL'insufflaggio di cellulosa riduce notevolmente la trasmissione dei rumori provenienti dall'esterno o da altre stanze all'interno dell'edificio. Ciò significa che potrete godere di un ambiente più tranquillo e silenzioso, proteggendo la vostra privacy e migliorando la qualità della vita all'interno della struttura.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-plug\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Riduzione dei consumi energetici</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tGrazie all'efficace isolamento termico offerto dalla cellulosa, è possibile ridurre notevolmente il consumo di energia per il riscaldamento e il raffreddamento dell'edificio. Ciò comporta un risparmio significativo sulle bollette energetiche a lungo termine, consentendo un ritorno sull'investimento nel tempo.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-award\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Riduzione dell'impatto ambientale</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tLa cellulosa è un materiale isolante ecologico, realizzato principalmente da carta riciclata e trattato con additivi ignifughi naturali. L'uso della cellulosa come isolante contribuisce alla riduzione dell'impatto ambientale dell'edificio, promuovendo la sostenibilità e la protezione dell'ambiente.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-house\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Migliore comfort abitativo</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tGrazie all'isolamento termico e acustico superiore fornito dall'insufflaggio di cellulosa, l'ambiente interno diventa più confortevole. Si riducono le variazioni di temperatura e gli sbalzi termici, creando un'atmosfera piacevole e stabile all'interno dell'edificio.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t\t<div class=\"col-12 col-md-6 animate\" data-animation=\"fadeInUp\">
\t\t\t\t\t\t<div class=\"media px-10\">
\t\t\t\t\t\t\t<div class=\"icon-styled fs-40\">
\t\t\t\t\t\t\t\t<i class=\"ico ico-support\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t<h6>
\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Durata e resistenza</a>
\t\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\tLa cellulosa insufflata forma uno strato compatto e stabile all'interno delle intercapedini, che mantiene le sue prestazioni nel tempo. La cellulosa è resistente al deterioramento, alle muffe e agli insetti dannosi, garantendo un'efficace protezione dell'edificio nel corso degli anni.
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- .col-* -->

\t\t\t\t</div><!-- .row* -->
\t\t\t</div><!-- .col-* -->
\t\t</div><!-- .row* -->
\t</div>
</section>

<!-- Section Call To Action -->
<section class=\"ds s-py-60 s-py-lg-100 s-py-xl-150 s-overlay s-parallax call-to-action text-center text-lg-left\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-11 m-auto col-lg-12 p-40 px-lg-60 py-lg-65 ls animate\" data-animation=\"pullDown\">
\t\t\t\t<div class=\"row align-items-center justify-content-between\">
\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/logo-dark.png\" alt=\"\">
\t\t\t\t\t\t<div class=\"divider-25 divider-lg-0\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t\t<p>Saremo lieti di fornirti un preventivo GRATUITO per il tuo isolamento termico ed acustico.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-3 text-lg-right\">
\t\t\t\t\t\t<div class=\"divider-25 divider-lg-0\"></div>
\t\t\t\t\t\t<a href=\"/richiedi-preventivo\" class=\"btn btn-small btn-maincolor with-icon btn-ls\">Richiedi un preventivo</a>
\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t</div>
\t\t</div>
\t</div>
</section>

<!-- Section Steps -->
<section class=\"ls s-py-55 s-pt-lg-100 s-pb-lg-95 s-pt-xl-150 s-pb-xl-145 text-center text-md-left\">
\t<div class=\"container\">
\t\t<div class=\"row align-items-center\">
\t\t\t<div class=\"col-md-5 col-lg-3 col-xl-4\">
\t\t\t\t<h4 class=\"special-heading\">Come funziona</h4>
\t\t\t</div>
\t\t\t<div class=\"col-md-7 col-lg-5 col-xl-8\">
\t\t\t\t<div class=\"divider-25 divider-md-0\"></div>
\t\t\t\t<p>Dal 2012, il nostro impegno nel campo dei servizi di isolamento si è distinto per la sua affidabilità e la sua qualità insuperabile. Tuttavia, ciò che ci rende veramente unici è la nostra visione: non ci limitiamo a essere soltanto un'azienda di isolamento, ma aspiriamo a trasformare i sogni dei nostri clienti in una solida realtà, prestando attenzione a ogni dettaglio.</p>
\t\t\t</div>
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"divider-40  divider-lg-60\"></div>
\t\t\t\t<div class=\"steps-alt\">
\t\t\t\t\t<i class=\"ico-step text-left ico ico-start color-dark fs-40\"></i>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Valutiamo la Tua richiesta</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Formuliamo un preventivo</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Isoliamo la Tua Casa</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"step\">
\t\t\t\t\t\t<span class=\"step-dot\">
\t\t\t\t\t\t\t<i class=\"fa fa-circle\"></i>
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<div class=\"step-content mt-20\">
\t\t\t\t\t\t\t<p>Risparmi sulle bollette</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<i class=\"ico-step text-right ico ico-finish color-dark fs-40\"></i>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<!-- Section  Testimonials -->
<section id=\"testimonials\" class=\"ls ms s-pt-55 s-pb-50 s-pt-lg-95 s-pb-lg-90 s-pt-xl-145 s-pb-xl-140\">
\t<div class=\"container\">
\t\t<div class=\"row\">

\t\t\t<div class=\"col-12 col-md-7 mx-auto text-center\">
\t\t\t\t<h4 class=\"special-heading\">Cosa dice la gente</h4>
\t\t\t\t<p class=\"special-heading\">Scopri cosa dicono i nostri clienti: leggi le recensioni qui sotto.</p>
\t\t\t\t<div class=\"divider-30 divider-lg-40\"></div>
\t\t\t</div>

\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"testimonials-slider owl-carousel\" data-autoplay=\"true\" data-loop=\"true\" data-responsive-lg=\"1\" data-responsive-md=\"1\" data-responsive-sm=\"1\" data-nav=\"true\" data-dots=\"false\" data-animateout=\"fadeOut\">
\t\t\t\t\t<div class=\"quote-item hero-bg box-shadow\">
\t\t\t\t\t\t<div class=\"quote-image\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/team/testimonials01.jpg\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"quote-content\">
\t\t\t\t\t\t\t<blockquote class=\"fs-20\">
\t\t\t\t\t\t\t\tSono rimasto estremamente soddisfatto del servizio di insufflaggio di cellulosa fornito da questa azienda. Innanzitutto, il personale è stato estremamente professionale e cortese fin dall'inizio. Mi hanno fornito tutte le informazioni necessarie e risposto a tutte le mie domande in modo chiaro e esauriente.
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t<h6>Diana V.</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"quote-item hero-bg box-shadow\">
\t\t\t\t\t\t<div class=\"quote-image\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/team/testimonials02.jpg\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"quote-content\">
\t\t\t\t\t\t\t<blockquote class=\"fs-20\">
\t\t\t\t\t\t\t\tL'intero processo di insufflaggio è stato rapido ed efficiente, e ho notato immediatamente un miglioramento nella temperatura e nell'isolamento acustico della mia abitazione. Inoltre, ho apprezzato molto l'attenzione ai dettagli durante l'installazione.
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t<h6>Daniele M.</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"quote-item hero-bg box-shadow\">
\t\t\t\t\t\t<div class=\"quote-image\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/team/testimonials03.jpg\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"quote-content\">
\t\t\t\t\t\t\t<blockquote class=\"fs-20\">
\t\t\t\t\t\t\t\tDopo aver avuto questa esperienza positiva, consiglio vivamente il servizio di insufflaggio di cellulosa di questa azienda a chiunque sia alla ricerca di un'efficace soluzione di isolamento per la propria casa. Grazie ancora per il servizio impeccabile!
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t<h6>Letizia B.</h6>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div><!-- .testimonials-slider -->

\t\t\t</div>
\t\t</div>
\t</div>

</section>

<!-- Section Project -->
<section id=\"project\" class=\"ds ms s-overlay s-parallax s-py-55 s-py-lg-95 s-py-xl-145 project-horizontal-section\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-8 offset-md-2 text-center\">
\t\t\t\t<h4 class=\"special-heading\">Prodotti da insufflaggio</h4>
\t\t\t\t<p class=\"special-heading\">Offriamo i nostri servizi professionali di isolamento di immobili residenziali e commerciali sia per edifici esistenti che di nuova costruzione.</p>
\t\t\t\t<div class=\"divider-30 divider-lg-53\"></div>
\t\t\t</div>
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"owl-carousel count-list\" data-nav=\"false\" data-dots=\"true\" data-autoplay=\"false\" data-loop=\"false\" data-margin=\"30\" data-responsive-xs=\"1\" data-responsive-sm=\"2\" data-responsive-md=\"2\" data-responsive-lg=\"2\">

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Cellulosa</a>
\t\t\t\t\t\t\t</h6>
\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/cellulosa.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Lana di vetro</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/lana-di-vetro.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Lana di roccia</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/lana-di-roccia.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Sughero</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/sughero.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Polistirolo in perle sfuse</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/polistirolo.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"gallery-item-extended horizontal-item count-item cs venting attic-insulation\">
\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t<h6 class=\"item-title\">
\t\t\t\t\t\t\t\t<a href=\"javascript:void(0);\">Argilla espansa</a>
\t\t\t\t\t\t\t</h6>

\t\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"btn-link btn-absolute with-icon item-button\">
\t\t\t\t\t\t\t\tVai alla scheda
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item-media\">
\t\t\t\t\t\t\t<img src=\"{{ theme }}assets/images/argilla-espansa.jpg\" alt=\"\">
\t\t\t\t\t\t\t<div class=\"media-links\">
\t\t\t\t\t\t\t\t<a class=\"abs-link\" href=\"javascript:void(0);\"></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>

<!-- Section Contacts -->
<section class=\"ls s-py-xl-0 container-px-0 contacts-section\">

\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<div class=\"ls page_map absolute_map\">
\t\t\t\t\t<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3156.346331358047!2d15.18030587626157!3d37.71154781579898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1314065183933c4b%3A0x5cd4a1150d087f5!2sVia%20Giuseppe%20Ungaretti%2C%2015%2C%2095014%20Giarre%20CT!5e0!3m2!1sit!2sit!4v1711782490003!5m2!1sit!2sit\" width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>
\t\t\t\t</div>
\t\t\t\t<div class=\"divider-40 divider-lg-0\"></div>
\t\t\t</div>
\t\t\t<div class=\"ls col-xl-12 px-30 custom-col-absolute\">
\t\t\t\t<h4 class=\"special-heading mt-5\">Contatti</h4>
\t\t\t\t<div class=\"divider-40 divider-lg-50\"></div>
\t\t\t\t<div class=\"contact-info mb-30\">
\t\t\t\t\t<h6 class=\"mb-10\">Indirizzo</h6>
\t\t\t\t\t<p>Via G. Ungaretti, 15/a - 95014 Giarre (CT)</p>
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
</section>

<!-- Section partners
<section class=\"c-gutter-0 container-px-45 s-py-30 s-pt-lg-120 s-pb-lg-110 partners-section\">
\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-sm-12 text-center\">
\t\t\t\t<div class=\"owl-carousel\" data-margin=\"100\" data-responsive-lg=\"6\" data-responsive-md=\"4\" data-responsive-sm=\"3\" data-responsive-xs=\"1\" data-nav=\"false\" data-loop=\"true\">
\t\t\t\t\t<img src=\"{{ theme }}assets/images/partners/01.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"{{ theme }}assets/images/partners/02.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"{{ theme }}assets/images/partners/03.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"{{ theme }}assets/images/partners/04.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"{{ theme }}assets/images/partners/05.jpg\" alt=\"\">
\t\t\t\t\t<img src=\"{{ theme }}assets/images/partners/06.jpg\" alt=\"\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
 -->
{% endblock content %}", "home.twig", "/var/www/vhosts/insufflaggiofacile.it/staging/view/website/home.twig");
    }
}
