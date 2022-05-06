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

/* bootstrap_3_layout.html.twig */
class __TwigTemplate_18ff86d1b70ac6383a9810d542ff3ab6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        // line 1
        $_trait_0 = $this->loadTemplate("bootstrap_base_layout.html.twig", "bootstrap_3_layout.html.twig", 1);
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."bootstrap_base_layout.html.twig".'" cannot be used as a trait.', 1, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_widget_simple' => [$this, 'block_form_widget_simple'],
                'button_widget' => [$this, 'block_button_widget'],
                'money_widget' => [$this, 'block_money_widget'],
                'checkbox_widget' => [$this, 'block_checkbox_widget'],
                'radio_widget' => [$this, 'block_radio_widget'],
                'form_label' => [$this, 'block_form_label'],
                'choice_label' => [$this, 'block_choice_label'],
                'checkbox_label' => [$this, 'block_checkbox_label'],
                'radio_label' => [$this, 'block_radio_label'],
                'checkbox_radio_label' => [$this, 'block_checkbox_radio_label'],
                'form_row' => [$this, 'block_form_row'],
                'button_row' => [$this, 'block_button_row'],
                'choice_row' => [$this, 'block_choice_row'],
                'date_row' => [$this, 'block_date_row'],
                'time_row' => [$this, 'block_time_row'],
                'datetime_row' => [$this, 'block_datetime_row'],
                'checkbox_row' => [$this, 'block_checkbox_row'],
                'radio_row' => [$this, 'block_radio_row'],
                'form_errors' => [$this, 'block_form_errors'],
                'form_help' => [$this, 'block_form_help'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "
";
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('button_widget', $context, $blocks);
        // line 16
        echo "
";
        // line 17
        $this->displayBlock('money_widget', $context, $blocks);
        // line 34
        echo "
";
        // line 35
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 45
        echo "
";
        // line 46
        $this->displayBlock('radio_widget', $context, $blocks);
        // line 56
        echo "
";
        // line 58
        echo "
";
        // line 59
        $this->displayBlock('form_label', $context, $blocks);
        // line 63
        echo "
";
        // line 64
        $this->displayBlock('choice_label', $context, $blocks);
        // line 69
        echo "
";
        // line 70
        $this->displayBlock('checkbox_label', $context, $blocks);
        // line 75
        echo "
";
        // line 76
        $this->displayBlock('radio_label', $context, $blocks);
        // line 81
        echo "
";
        // line 82
        $this->displayBlock('checkbox_radio_label', $context, $blocks);
        // line 103
        echo "
";
        // line 105
        echo "
";
        // line 106
        $this->displayBlock('form_row', $context, $blocks);
        // line 118
        echo "
";
        // line 119
        $this->displayBlock('button_row', $context, $blocks);
        // line 124
        echo "
";
        // line 125
        $this->displayBlock('choice_row', $context, $blocks);
        // line 129
        echo "
";
        // line 130
        $this->displayBlock('date_row', $context, $blocks);
        // line 134
        echo "
";
        // line 135
        $this->displayBlock('time_row', $context, $blocks);
        // line 139
        echo "
";
        // line 140
        $this->displayBlock('datetime_row', $context, $blocks);
        // line 144
        echo "
";
        // line 145
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 152
        echo "
";
        // line 153
        $this->displayBlock('radio_row', $context, $blocks);
        // line 160
        echo "
";
        // line 162
        echo "
";
        // line 163
        $this->displayBlock('form_errors', $context, $blocks);
        // line 174
        echo "
";
        // line 176
        echo "
";
        // line 177
        $this->displayBlock('form_help', $context, $blocks);
    }

    // line 5
    public function block_form_widget_simple($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        if (( !array_key_exists("type", $context) || !twig_in_filter(($context["type"] ?? null), [0 => "file", 1 => "hidden"]))) {
            // line 7
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 7)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 7), "")) : ("")) . " form-control"))]);
        }
        // line 9
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
    }

    // line 12
    public function block_button_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 13)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 13), "btn-default")) : ("btn-default")) . " btn"))]);
        // line 14
        $this->displayParentBlock("button_widget", $context, $blocks);
    }

    // line 17
    public function block_money_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        $context["prepend"] =  !(is_string($__internal_compile_0 = ($context["money_pattern"] ?? null)) && is_string($__internal_compile_1 = "{{") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)));
        // line 19
        echo "    ";
        $context["append"] =  !(is_string($__internal_compile_2 = ($context["money_pattern"] ?? null)) && is_string($__internal_compile_3 = "}}") && ('' === $__internal_compile_3 || $__internal_compile_3 === substr($__internal_compile_2, -strlen($__internal_compile_3))));
        // line 20
        echo "    ";
        if ((($context["prepend"] ?? null) || ($context["append"] ?? null))) {
            // line 21
            echo "        <div class=\"input-group\">
            ";
            // line 22
            if (($context["prepend"] ?? null)) {
                // line 23
                echo "                <span class=\"input-group-addon\">";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->encodeCurrency($this->env, ($context["money_pattern"] ?? null));
                echo "</span>
            ";
            }
            // line 25
            $this->displayBlock("form_widget_simple", $context, $blocks);
            // line 26
            if (($context["append"] ?? null)) {
                // line 27
                echo "                <span class=\"input-group-addon\">";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->encodeCurrency($this->env, ($context["money_pattern"] ?? null));
                echo "</span>
            ";
            }
            // line 29
            echo "        </div>
    ";
        } else {
            // line 31
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
    }

    // line 35
    public function block_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 36)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 36), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 36)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 36), "")) : (""))));
        // line 37
        if (twig_in_filter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 38
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
        } else {
            // line 40
            echo "<div class=\"checkbox\">";
            // line 41
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
            // line 42
            echo "</div>";
        }
    }

    // line 46
    public function block_radio_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 47)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 47), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 47)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 47), "")) : (""))));
        // line 48
        if (twig_in_filter("radio-inline", ($context["parent_label_class"] ?? null))) {
            // line 49
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
        } else {
            // line 51
            echo "<div class=\"radio\">";
            // line 52
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
            // line 53
            echo "</div>";
        }
    }

    // line 59
    public function block_form_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 60)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 60), "")) : ("")) . " control-label"))]);
        // line 61
        $this->displayParentBlock("form_label", $context, $blocks);
    }

    // line 64
    public function block_choice_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter(twig_replace_filter(((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 66)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 66), "")) : ("")), ["checkbox-inline" => "", "radio-inline" => ""]))]);
        // line 67
        $this->displayBlock("form_label", $context, $blocks);
    }

    // line 70
    public function block_checkbox_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 71
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["for" => ($context["id"] ?? null)]);
        // line 73
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 76
    public function block_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 77
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["for" => ($context["id"] ?? null)]);
        // line 79
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 82
    public function block_checkbox_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        if (array_key_exists("widget", $context)) {
            // line 85
            if (($context["required"] ?? null)) {
                // line 86
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 86)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, false, 86), "")) : ("")) . " required"))]);
            }
            // line 88
            if (( !(($context["label"] ?? null) === false) && twig_test_empty(($context["label"] ?? null)))) {
                // line 89
                if ( !twig_test_empty(($context["label_format"] ?? null))) {
                    // line 90
                    $context["label"] = twig_replace_filter(($context["label_format"] ?? null), ["%name%" =>                     // line 91
($context["name"] ?? null), "%id%" =>                     // line 92
($context["id"] ?? null)]);
                } else {
                    // line 95
                    $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(($context["name"] ?? null));
                }
            }
            // line 98
            echo "<label";
            $__internal_compile_4 = $context;
            $__internal_compile_5 = ["attr" => ($context["label_attr"] ?? null)];
            if (!twig_test_iterable($__internal_compile_5)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 98, $this->getSourceContext());
            }
            $__internal_compile_5 = twig_to_array($__internal_compile_5);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_5));
            $this->displayBlock("attributes", $context, $blocks);
            $context = $__internal_compile_4;
            echo ">";
            // line 99
            echo ($context["widget"] ?? null);
            echo " ";
            (( !(($context["label"] ?? null) === false)) ? (print (twig_escape_filter($this->env, (((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["label"] ?? null), ($context["label_translation_parameters"] ?? null), ($context["translation_domain"] ?? null)))), "html", null, true))) : (print ("")));
            // line 100
            echo "</label>";
        }
    }

    // line 106
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 107
        $context["widget_attr"] = [];
        // line 108
        if ( !twig_test_empty(($context["help"] ?? null))) {
            // line 109
            $context["widget_attr"] = ["attr" => ["aria-describedby" => (($context["id"] ?? null) . "_help")]];
        }
        // line 111
        echo "<div";
        $__internal_compile_6 = $context;
        $__internal_compile_7 = ["attr" => twig_array_merge(($context["row_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 111)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 111), "")) : ("")) . " form-group") . (((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) ? (" has-error") : (""))))])];
        if (!twig_test_iterable($__internal_compile_7)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 111, $this->getSourceContext());
        }
        $__internal_compile_7 = twig_to_array($__internal_compile_7);
        $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_7));
        $this->displayBlock("attributes", $context, $blocks);
        $context = $__internal_compile_6;
        echo ">";
        // line 112
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        echo " ";
        // line 113
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget', ($context["widget_attr"] ?? null));
        echo " ";
        // line 114
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'help');
        // line 115
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo " ";
        // line 116
        echo "</div> ";
    }

    // line 119
    public function block_button_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 120
        echo "<div";
        $__internal_compile_8 = $context;
        $__internal_compile_9 = ["attr" => twig_array_merge(($context["row_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 120)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 120), "")) : ("")) . " form-group"))])];
        if (!twig_test_iterable($__internal_compile_9)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 120, $this->getSourceContext());
        }
        $__internal_compile_9 = twig_to_array($__internal_compile_9);
        $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_9));
        $this->displayBlock("attributes", $context, $blocks);
        $context = $__internal_compile_8;
        echo ">";
        // line 121
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 122
        echo "</div>";
    }

    // line 125
    public function block_choice_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 126
        $context["force_error"] = true;
        // line 127
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 130
    public function block_date_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 131
        $context["force_error"] = true;
        // line 132
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 135
    public function block_time_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 136
        $context["force_error"] = true;
        // line 137
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 140
    public function block_datetime_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 141
        $context["force_error"] = true;
        // line 142
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 145
    public function block_checkbox_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 146
        echo "<div";
        $__internal_compile_10 = $context;
        $__internal_compile_11 = ["attr" => twig_array_merge(($context["row_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 146)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 146), "")) : ("")) . " form-group") . (( !($context["valid"] ?? null)) ? (" has-error") : (""))))])];
        if (!twig_test_iterable($__internal_compile_11)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 146, $this->getSourceContext());
        }
        $__internal_compile_11 = twig_to_array($__internal_compile_11);
        $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_11));
        $this->displayBlock("attributes", $context, $blocks);
        $context = $__internal_compile_10;
        echo ">";
        // line 147
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 148
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'help');
        // line 149
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 150
        echo "</div>";
    }

    // line 153
    public function block_radio_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 154
        echo "<div";
        $__internal_compile_12 = $context;
        $__internal_compile_13 = ["attr" => twig_array_merge(($context["row_attr"] ?? null), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 154)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, false, 154), "")) : ("")) . " form-group") . (( !($context["valid"] ?? null)) ? (" has-error") : (""))))])];
        if (!twig_test_iterable($__internal_compile_13)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 154, $this->getSourceContext());
        }
        $__internal_compile_13 = twig_to_array($__internal_compile_13);
        $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_13));
        $this->displayBlock("attributes", $context, $blocks);
        $context = $__internal_compile_12;
        echo ">";
        // line 155
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 156
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'help');
        // line 157
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 158
        echo "</div>";
    }

    // line 163
    public function block_form_errors($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 164
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 165
            if ( !Symfony\Bridge\Twig\Extension\twig_is_root_form(($context["form"] ?? null))) {
                echo "<span class=\"help-block\">";
            } else {
                echo "<div class=\"alert alert-danger\">";
            }
            // line 166
            echo "    <ul class=\"list-unstyled\">";
            // line 167
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 168
                echo "<li><span class=\"glyphicon glyphicon-exclamation-sign\"></span> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 168), "html", null, true);
                echo "</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            echo "</ul>
    ";
            // line 171
            if ( !Symfony\Bridge\Twig\Extension\twig_is_root_form(($context["form"] ?? null))) {
                echo "</span>";
            } else {
                echo "</div>";
            }
        }
    }

    // line 177
    public function block_form_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 178
        if ( !twig_test_empty(($context["help"] ?? null))) {
            // line 179
            $context["help_attr"] = twig_array_merge(($context["help_attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["help_attr"] ?? null), "class", [], "any", true, true, false, 179)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["help_attr"] ?? null), "class", [], "any", false, false, false, 179), "")) : ("")) . " help-block"))]);
            // line 180
            echo "<span id=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "_help\"";
            $__internal_compile_14 = $context;
            $__internal_compile_15 = ["attr" => ($context["help_attr"] ?? null)];
            if (!twig_test_iterable($__internal_compile_15)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 180, $this->getSourceContext());
            }
            $__internal_compile_15 = twig_to_array($__internal_compile_15);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_15));
            $this->displayBlock("attributes", $context, $blocks);
            $context = $__internal_compile_14;
            echo ">";
            // line 181
            if ((($context["translation_domain"] ?? null) === false)) {
                // line 182
                if ((($context["help_html"] ?? null) === false)) {
                    // line 183
                    echo twig_escape_filter($this->env, ($context["help"] ?? null), "html", null, true);
                } else {
                    // line 185
                    echo ($context["help"] ?? null);
                }
            } else {
                // line 188
                if ((($context["help_html"] ?? null) === false)) {
                    // line 189
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["help"] ?? null), ($context["help_translation_parameters"] ?? null), ($context["translation_domain"] ?? null)), "html", null, true);
                } else {
                    // line 191
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["help"] ?? null), ($context["help_translation_parameters"] ?? null), ($context["translation_domain"] ?? null));
                }
            }
            // line 194
            echo "</span>";
        }
    }

    public function getTemplateName()
    {
        return "bootstrap_3_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  608 => 194,  604 => 191,  601 => 189,  599 => 188,  595 => 185,  592 => 183,  590 => 182,  588 => 181,  574 => 180,  572 => 179,  570 => 178,  566 => 177,  557 => 171,  554 => 170,  546 => 168,  542 => 167,  540 => 166,  534 => 165,  532 => 164,  528 => 163,  524 => 158,  522 => 157,  520 => 156,  518 => 155,  506 => 154,  502 => 153,  498 => 150,  496 => 149,  494 => 148,  492 => 147,  480 => 146,  476 => 145,  472 => 142,  470 => 141,  466 => 140,  462 => 137,  460 => 136,  456 => 135,  452 => 132,  450 => 131,  446 => 130,  442 => 127,  440 => 126,  436 => 125,  432 => 122,  430 => 121,  418 => 120,  414 => 119,  410 => 116,  407 => 115,  405 => 114,  402 => 113,  399 => 112,  387 => 111,  384 => 109,  382 => 108,  380 => 107,  376 => 106,  371 => 100,  367 => 99,  355 => 98,  351 => 95,  348 => 92,  347 => 91,  346 => 90,  344 => 89,  342 => 88,  339 => 86,  337 => 85,  335 => 84,  331 => 82,  327 => 79,  325 => 77,  321 => 76,  317 => 73,  315 => 71,  311 => 70,  307 => 67,  305 => 66,  301 => 64,  297 => 61,  295 => 60,  291 => 59,  286 => 53,  284 => 52,  282 => 51,  279 => 49,  277 => 48,  275 => 47,  271 => 46,  266 => 42,  264 => 41,  262 => 40,  259 => 38,  257 => 37,  255 => 36,  251 => 35,  246 => 31,  242 => 29,  236 => 27,  234 => 26,  232 => 25,  226 => 23,  224 => 22,  221 => 21,  218 => 20,  215 => 19,  213 => 18,  209 => 17,  205 => 14,  203 => 13,  199 => 12,  195 => 9,  192 => 7,  190 => 6,  186 => 5,  182 => 177,  179 => 176,  176 => 174,  174 => 163,  171 => 162,  168 => 160,  166 => 153,  163 => 152,  161 => 145,  158 => 144,  156 => 140,  153 => 139,  151 => 135,  148 => 134,  146 => 130,  143 => 129,  141 => 125,  138 => 124,  136 => 119,  133 => 118,  131 => 106,  128 => 105,  125 => 103,  123 => 82,  120 => 81,  118 => 76,  115 => 75,  113 => 70,  110 => 69,  108 => 64,  105 => 63,  103 => 59,  100 => 58,  97 => 56,  95 => 46,  92 => 45,  90 => 35,  87 => 34,  85 => 17,  82 => 16,  80 => 12,  77 => 11,  75 => 5,  72 => 4,  69 => 2,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "bootstrap_3_layout.html.twig", "C:\\Users\\yarae\\Documents\\22-DevWeb\\Symphony-lesson\\Tuto-Symfony-4\\vendor\\symfony\\twig-bridge\\Resources\\views\\Form\\bootstrap_3_layout.html.twig");
    }
}
