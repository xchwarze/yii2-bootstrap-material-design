<?php

namespace exocet\BootstrapMD\widgets\form;

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
    public $options = ['class' => 'form-group form-control-wrapper'];
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
            if ($label === false && $this->form->layout === 'horizontal') {
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
}
