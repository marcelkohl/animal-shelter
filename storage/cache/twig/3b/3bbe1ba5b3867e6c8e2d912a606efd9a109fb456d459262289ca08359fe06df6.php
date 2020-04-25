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
class __TwigTemplate_ab5135511f9dd32f760bbb0a60bec50a10f9e1b00b68b584c6b67b7d7a181641 extends \Twig\Template
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
        echo "<html>
     <head>
         <meta charset=\"utf-8\"/>
         <title>Animal Shelter - API</title>
         <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
         <link href='";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
     </head>
     <body>
         <h1>Animal Shelter</h1>
         <div>Animal shelter API implementation</div>
     </body>
 </html>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
     <head>
         <meta charset=\"utf-8\"/>
         <title>Animal Shelter - API</title>
         <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
         <link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>
     </head>
     <body>
         <h1>Animal Shelter</h1>
         <div>Animal shelter API implementation</div>
     </body>
 </html>
", "index.twig", "/opt/lampp/htdocs/as-mvc/app/templates/index.twig");
    }
}
