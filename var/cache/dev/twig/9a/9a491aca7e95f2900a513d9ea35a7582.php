<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* Cartes/index.html.twig */
class __TwigTemplate_36fa7fda95d047bd3075d803c28743ed extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'PageTitle' => [$this, 'block_PageTitle'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "template.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Cartes/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Cartes/index.html.twig"));

        $this->parent = $this->load("template.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Liste des Cartes
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_PageTitle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "PageTitle"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "PageTitle"));

        // line 6
        yield "    Liste totale des Cartes
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        yield "<div class=\"row\">
    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cartes"]) || array_key_exists("cartes", $context) ? $context["cartes"] : (function () { throw new RuntimeError('Variable "cartes" does not exist.', 10, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["carte"]) {
            // line 11
            yield "        <div class=\"card\" style=\"width: 18rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "name", [], "any", false, false, false, 13), "html", null, true);
            yield "</h5>
                <img src=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/cartes_postales/") . CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "imagefront", [], "any", false, false, false, 14)) . ".jpg"), "html", null, true);
            yield "\" alt=\"\" width=\"250\" height=\"200\">
                <p class=\"card-text\">Prix: ";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "prix", [], "any", false, false, false, 15), "html", null, true);
            yield " DT</p>
                <p class=\"card-text\">Pays: ";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "pays", [], "any", false, false, false, 16), "html", null, true);
            yield "</p>
                <h6 class=\"card-subtitle mb-2 text-body-secondary\">Stock: ";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "quantiteStock", [], "any", false, false, false, 17), "html", null, true);
            yield "</h6>
                <a href=\"";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cards.detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "id", [], "any", false, false, false, 18)]), "html", null, true);
            yield "\" class=\"card-link\">
                    détail
                </a>
                <a href=\"";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cards.edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "id", [], "any", false, false, false, 21)]), "html", null, true);
            yield "\" class=\"card-link\">
                    modifier
                <a href=\"";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cards.delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["carte"], "id", [], "any", false, false, false, 23)]), "html", null, true);
            yield "\" class=\"card-link\">
                    supprimer
                </a>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['carte'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "</div>
";
        // line 30
        if ((array_key_exists("isPaginated", $context) && (isset($context["isPaginated"]) || array_key_exists("isPaginated", $context) ? $context["isPaginated"] : (function () { throw new RuntimeError('Variable "isPaginated" does not exist.', 30, $this->source); })()))) {
            // line 31
            yield "    <div class=\"row\">
        <nav aria-label=\"Page navigation example\">
            <ul class=\"pagination justify-content-center\">
                <li class=\"page-item ";
            // line 34
            if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 34, $this->source); })()) == 1)) {
                yield "disabled ";
            }
            yield "\">
                    <a class=\"page-link\" href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cards.paginate", ["page" => ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 35, $this->source); })()) - 1), "nbre" => (isset($context["nbre"]) || array_key_exists("nbre", $context) ? $context["nbre"] : (function () { throw new RuntimeError('Variable "nbre" does not exist.', 35, $this->source); })())]), "html", null, true);
            yield "\">Previous</a>
                </li>
                ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, (isset($context["nbrePage"]) || array_key_exists("nbrePage", $context) ? $context["nbrePage"] : (function () { throw new RuntimeError('Variable "nbrePage" does not exist.', 37, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 38
                yield "                    <li class=\"page-item ";
                if (($context["i"] == (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 38, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                        <a class=\"page-link\" href=\"";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cards.paginate", ["page" => $context["i"], "nbre" => (isset($context["nbre"]) || array_key_exists("nbre", $context) ? $context["nbre"] : (function () { throw new RuntimeError('Variable "nbre" does not exist.', 39, $this->source); })())]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                yield "</a>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            yield "                <li class=\"page-item ";
            if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 42, $this->source); })()) == (isset($context["nbrePage"]) || array_key_exists("nbrePage", $context) ? $context["nbrePage"] : (function () { throw new RuntimeError('Variable "nbrePage" does not exist.', 42, $this->source); })()))) {
                yield "disabled ";
            }
            yield "\">
                    <a class=\"page-link\" href=\"";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cards.paginate", ["page" => ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 43, $this->source); })()) + 1), "nbre" => (isset($context["nbre"]) || array_key_exists("nbre", $context) ? $context["nbre"] : (function () { throw new RuntimeError('Variable "nbre" does not exist.', 43, $this->source); })())]), "html", null, true);
            yield "\">Next</a>
                </li>
            </ul>
        </nav>
    </div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Cartes/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  231 => 43,  224 => 42,  213 => 39,  206 => 38,  202 => 37,  197 => 35,  191 => 34,  186 => 31,  184 => 30,  181 => 29,  169 => 23,  164 => 21,  158 => 18,  154 => 17,  150 => 16,  146 => 15,  142 => 14,  138 => 13,  134 => 11,  130 => 10,  127 => 9,  114 => 8,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'template.html.twig' %}

{% block title %}Liste des Cartes
{% endblock %}
{% block PageTitle%}
    Liste totale des Cartes
{% endblock %}
{% block body %}
<div class=\"row\">
    {% for carte in cartes %}
        <div class=\"card\" style=\"width: 18rem;\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">{{carte.name}}</h5>
                <img src=\"{{ asset('assets/cartes_postales/') ~ carte.imagefront ~ '.jpg'}}\" alt=\"\" width=\"250\" height=\"200\">
                <p class=\"card-text\">Prix: {{carte.prix}} DT</p>
                <p class=\"card-text\">Pays: {{carte.pays}}</p>
                <h6 class=\"card-subtitle mb-2 text-body-secondary\">Stock: {{carte.quantiteStock}}</h6>
                <a href=\"{{path('cards.detail',{id: carte.id})}}\" class=\"card-link\">
                    détail
                </a>
                <a href=\"{{path('cards.edit',{id: carte.id})}}\" class=\"card-link\">
                    modifier
                <a href=\"{{path('cards.delete',{id: carte.id})}}\" class=\"card-link\">
                    supprimer
                </a>
            </div>
        </div>
    {% endfor %}
</div>
{% if isPaginated is defined and isPaginated%}
    <div class=\"row\">
        <nav aria-label=\"Page navigation example\">
            <ul class=\"pagination justify-content-center\">
                <li class=\"page-item {% if page==1 %}disabled {% endif %}\">
                    <a class=\"page-link\" href=\"{{ path('cards.paginate', {page:page-1, nbre:nbre} ) }}\">Previous</a>
                </li>
                {% for i in range(1,nbrePage) %}
                    <li class=\"page-item {% if i == page %}active{% endif %}\">
                        <a class=\"page-link\" href=\"{{ path('cards.paginate', {page:i, nbre:nbre} ) }}\">{{i}}</a>
                    </li>
                {% endfor %}
                <li class=\"page-item {% if page==nbrePage %}disabled {% endif %}\">
                    <a class=\"page-link\" href=\"{{ path('cards.paginate', {page:page+1, nbre:nbre} ) }}\">Next</a>
                </li>
            </ul>
        </nav>
    </div>
{% endif %}
{% endblock %}", "Cartes/index.html.twig", "C:\\Users\\MSI\\first_ever_web_app\\site_ecommerce\\templates\\Cartes\\index.html.twig");
    }
}
