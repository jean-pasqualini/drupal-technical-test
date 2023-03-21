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

/* modules/custom/word_meaning/templates/search-definitions.html.twig */
class __TwigTemplate_606377afe61ad72a57516e359c8e2ad2 extends Template
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
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html>
  <head>
    <style type=\"text/css\">
      html, body {
        max-width: 800px;
        margin: auto;
      }

      fieldset {
        margin: 0px;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        border: solid grey 1px;
      }
      input[type=submit] {
        padding: 5px;
        font-size: 10px;
        width: 100px;
        margin-right: auto;
      }
      input[type=text] {
        padding: 5px;
        font-size: 10px;
        width: 80%;
        margin-right: auto;
      }

      #result-panel {
        padding: 10px;
        border: solid grey 1px;
        min-height: 200px;
        width: 100%;
        box-sizing: border-box;
      }

      #result-panel-content ul li {
        list-style: none;
        padding: 5px;
        background: lightgray;
        margin-bottom: 5px;
        border: solid grey 2px;
      }

      .empty-content {
        width: 100%;
        font-size: 50px;
        text-align: center;
      }

      #search-error {
        background: lightcoral;
        color: white;
        font-size: 20px;
        font-weight: bold;
        text-align: left;
        box-sizing: border-box;
        padding: 10px;
        display: none;
      }

      #loading-spin {
        display: none;
      }
    </style>

  </script>
  </head>
  <body>
    <div id=\"app\">
      <fieldset>
        <legend>Look for a word</legend>
        <div>
          ";
        // line 75
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 75, $this->source), "html", null, true);
        echo "
        </div>
        <div id=\"search-error\">

        </div>
        <div id=\"loading-spin\">
          <img src=\"https://media.tenor.com/1s1_eaP6BvgAAAAC/rainbow-spinner-loading.gif\" width=\"48\" height=\"48\">
        </div>
      </fieldset>
      <div id=\"result-panel\">
        <h3 class=\"empty-content\">
          What are you waiting for doing your first search 😉
        </h3>
      </div>
    </div>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/word_meaning/templates/search-definitions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 75,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/word_meaning/templates/search-definitions.html.twig", "/var/www/html/web/modules/custom/word_meaning/templates/search-definitions.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 75);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
