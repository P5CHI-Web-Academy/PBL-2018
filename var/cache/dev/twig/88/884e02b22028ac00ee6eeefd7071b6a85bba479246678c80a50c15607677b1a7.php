<?php

/* @Administration/Tags/showTag.html.twig */
class __TwigTemplate_3d9fb8ded4702e8b479d1f15d9bf4c5003ee149930eb8ccc324450d75f96b7ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Administration/base.html.twig", "@Administration/Tags/showTag.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Administration/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Administration/Tags/showTag.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Administration/Tags/showTag.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <table class=\"table text-center\">
        <tr>
            <th class=\"active text-center\">ID of tag</th>
            <th class=\"active text-center\">Name of tag</th>
            <th class=\"active text-center\">Slides connected to tag</th>
        </tr>

        <tr>
            <td>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["someTag"] ?? $this->getContext($context, "someTag")), "id", array()), "html", null, true);
        echo "</td>
            <td>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute(($context["someTag"] ?? $this->getContext($context, "someTag")), "tag", array()), "html", null, true);
        echo "</td>
            <td>
                ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["someTag"] ?? $this->getContext($context, "someTag")), "slides", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["sl"]) {
            // line 16
            echo "                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["sl"], "name", array()), "html", null, true);
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "            </td>
        </tr>
        ";
        // line 20
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["deleteForm"] ?? $this->getContext($context, "deleteForm")), 'form_start', array("attr" => array("class" => "navbar-form navbar-left")));
        echo "
        ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["deleteForm"] ?? $this->getContext($context, "deleteForm")), 'widget');
        echo "

        <button type=\"submit\" class=\"btn btn-default\" onclick=\"return confirm('Are you sure?')\">
            <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
            Delete
        </button>
        ";
        // line 27
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["deleteForm"] ?? $this->getContext($context, "deleteForm")), 'form_end');
        echo "
    </table>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@Administration/Tags/showTag.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 27,  89 => 21,  85 => 20,  81 => 18,  72 => 16,  68 => 15,  63 => 13,  59 => 12,  49 => 4,  40 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Administration/base.html.twig' %}

{% block body %}
    <table class=\"table text-center\">
        <tr>
            <th class=\"active text-center\">ID of tag</th>
            <th class=\"active text-center\">Name of tag</th>
            <th class=\"active text-center\">Slides connected to tag</th>
        </tr>

        <tr>
            <td>{{ someTag.id }}</td>
            <td>{{ someTag.tag }}</td>
            <td>
                {% for sl in someTag.slides %}
                    {{ sl.name }}
                {% endfor %}
            </td>
        </tr>
        {{ form_start(deleteForm, {'attr': {'class': 'navbar-form navbar-left'}}) }}
        {{ form_widget(deleteForm) }}

        <button type=\"submit\" class=\"btn btn-default\" onclick=\"return confirm('Are you sure?')\">
            <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
            Delete
        </button>
        {{ form_end(deleteForm) }}
    </table>
{% endblock %}
", "@Administration/Tags/showTag.html.twig", "/var/www/src/AdministrationBundle/Resources/views/Tags/showTag.html.twig");
    }
}
