<?php

namespace exocet\BootstrapMD\widgets\form;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * ActiveForm is a widget that builds an interactive HTML form for one or multiple data models.
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html
 * @author DSR! <xchwarze@gmail.com>
 * @package widgets
 * @subpackage form
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    const LAYOUT_DEFAULT = 'default';
    const LAYOUT_HORIZONTAL = 'horizontal';
    const LAYOUT_INLINE = 'inline';
    const LAYOUT_FLOATING = 'floating';

    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = 'exocet\BootstrapMD\widgets\form\ActiveField';
    /**
     * @var array HTML attributes for the form tag. Default is `['role' => 'form']`.
     */
    public $options = ['role' => 'form'];
    /**
     * @var string the form layout. Either 'default', 'horizontal' or 'inline'.
     * By choosing a layout, an appropriate default field configuration is applied. This will
     * render the form fields with slightly different markup for each layout. You can
     * override these defaults through [[fieldConfig]].
     * @see \yii\bootstrap\ActiveField for details on Bootstrap 3 field configuration
     */
    public $layout = self::LAYOUT_FLOATING;


    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!in_array($this->layout, [ self::LAYOUT_DEFAULT, 
            self::LAYOUT_HORIZONTAL, self::LAYOUT_INLINE, self::LAYOUT_FLOATING ])) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }

        if ($this->layout !== self::LAYOUT_DEFAULT) {
            Html::addCssClass($this->options, 'form-' . $this->layout);
        }
        
        parent::init();
    }

    /**
     * @inheritdoc
     * @return ActiveField the created ActiveField object
     */
    public function field($model, $attribute, $options = [])
    {
        return parent::field($model, $attribute, $options);
    }
}
