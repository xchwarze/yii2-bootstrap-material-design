<?php

namespace exocet\bootstrap5md\widgets\form;

use yii\helpers\Html;

/**
 * ActiveField represents a form input field within an [yii\widgets\ActiveForm](http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html).
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activefield.html
 * @author DSR! <xchwarze@gmail.com>
 * @package widgets
 * @subpackage form
 */
class ActiveField extends \yii\bootstrap\ActiveField
{
    /**
     * @var ActiveForm the form that this field is associated with.
     */
    public $form;
    public $options = ['class' => 'form-group form-group-lg form-control-wrapper'];
    public $template = '{label}{input}<span class="material-input"></span>{error}{hint}';


    public function label($label = null, $options = [])
    {
        if ($label === false) {
            $this->parts['{label}'] = '';
            return $this;
        }

        $label = isset($options['label']) 
            ? $options['label']
            : Html::encode($this->model->getAttributeLabel($this->attribute));
        if ($this->form->layout == ActiveForm::LAYOUT_FLOATING) {
            if (isset($this->options['class'])) {
                $this->options['class'] .= ' label-floating';
            }
        }

        if (is_bool($label)) {
            $this->enableLabel = $label;
            if ($label === false && $this->form->layout == ActiveForm::LAYOUT_HORIZONTAL) {
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
        } else {
            $this->enableLabel = true;
            $this->renderLabelParts($label, $options);
            parent::label($label, $options);
        }
        
        return $this;
    }

    public function checkbox($options = [], $enclosedByLabel = true)
    {
        $options['template'] = "<div class=\"checkbox\">\n{beginLabel}\n{input}\n<span class=\"checkbox-material\"></span>{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
        return parent::checkbox($options, $enclosedByLabel);
    }

    /**
     * @param array $instanceConfig the configuration passed to this instance's constructor
     * @return array the layout specific default configuration for this instance
     */
    protected function createLayoutConfig($instanceConfig)
    {
        $config = [
            'hintOptions' => [
                'tag' => 'p',
                'class' => 'help-block',
            ],
            'errorOptions' => [
                'tag' => 'p',
                'class' => 'help-block help-block-error',
            ],
            'inputOptions' => [
                'class' => 'form-control',
            ],
        ];

        $layout = $instanceConfig['form']->layout;

        if ($layout === 'horizontal') {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n<span class='material-input'></span>\n{error}\n{endWrapper}\n{hint}";
            $cssClasses = [
                'offset' => 'col-sm-offset-3',
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => 'col-sm-3',
            ];
            if (isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;
            $config['wrapperOptions'] = ['class' => $cssClasses['wrapper']];
            $config['labelOptions'] = ['class' => 'control-label ' . $cssClasses['label']];
            $config['errorOptions'] = ['class' => 'help-block help-block-error ' . $cssClasses['error']];
            $config['hintOptions'] = ['class' => 'help-block ' . $cssClasses['hint']];
        } elseif ($layout === 'inline') {
            $config['labelOptions'] = ['class' => 'sr-only'];
            $config['enableError'] = false;
        }

        return $config;
    }
}
