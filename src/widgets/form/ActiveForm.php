<?php

namespace exocet\bootstrap5md\widgets\form;

/**
 * ActiveForm is a widget that builds an interactive HTML form for one or multiple data models.
 * @see http://www.yiiframework.com/doc-2.0/yii-widgets-activeform.html
 * @author DSR! <xchwarze@gmail.com>
 * @package widgets
 * @subpackage form
 */
class ActiveForm extends \yii\bootstrap5\ActiveForm
{
    /**
     * @inheritDoc
     */
    public $fieldClass = 'exocet\bootstrap5md\widgets\form\ActiveField';
}
