<?php

namespace exocet\bootstrap5md\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @inheritDoc
 */
class ActiveField extends \yii\bootstrap5\ActiveField
{
    /**
     * @inheritDoc
     */
    public $options = ['class' => ['widget' => 'form-item mb-4']];

    /**
     * @inheritDoc
     */
    public $inputOptions = ['class' => ['widget' => 'form-control form-control-lg']];

    /**
     * @inheritDoc
     */
    public $template = "<div class=\"form-outline\">\n{input}\n{label}\n{error}\n{hint}\n</div>";

    /**
     * @inheritDoc
     */
    public $errorOptions = ['class' => 'invalid-feedback'];

    /**
     * @inheritDoc
     */
    protected function createLayoutConfig(array $instanceConfig): array
    {
        $config = [
            'hintOptions' => [
                'tag' => 'div',
                'class' => ['form-text', 'text-muted'],
            ],
            'errorOptions' => [
                'tag' => 'div',
                'class' => 'invalid-feedback',
            ],
            'labelOptions' => [
                'class' => ['form-label'],
            ],
        ];

        $layout = $instanceConfig['form']->layout;
        if ($layout === \yii\bootstrap5\ActiveForm::LAYOUT_HORIZONTAL) {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{hint}\n{endWrapper}";
            $config['wrapperOptions'] = [];
            $config['labelOptions'] = [];
            $config['options'] = [];
            $cssClasses = [
                'offset' => ['col-sm-10', 'offset-sm-2'],
                'label' => ['col-sm-2', 'col-form-label'],
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
                'field' => 'mb-3 row',
            ];
            if (isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;

            Html::addCssClass($config['wrapperOptions'], $cssClasses['wrapper']);
            Html::addCssClass($config['labelOptions'], $cssClasses['label']);
            Html::addCssClass($config['errorOptions'], $cssClasses['error']);
            Html::addCssClass($config['hintOptions'], $cssClasses['hint']);
            Html::addCssClass($config['options'], $cssClasses['field']);
        } elseif ($layout === \yii\bootstrap5\ActiveForm::LAYOUT_INLINE) {
            $config['inputOptions']['placeholder'] = true;
            $config['enableError'] = false;

            Html::addCssClass($config['labelOptions'], ['screenreader' => 'visually-hidden']);
        } elseif ($layout === \yii\bootstrap5\ActiveForm::LAYOUT_FLOATING) {
            $config['inputOptions']['placeholder'] = true;
            $config['template'] = "{input}\n{label}\n{error}\n{hint}";
            Html::addCssClass($config['options'], ['layout' => 'form-floating mt-3']);
        }

        return $config;
    }
}
