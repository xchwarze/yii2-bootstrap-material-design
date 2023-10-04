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
    public $inputDefaultTemplate = "<div class=\"form-outline\">\n{input}\n{label}\n{error}\n{hint}\n</div>";

    /**
     * @inheritDoc
     */
    public $errorOptions = ['class' => 'invalid-feedback'];

    /**
     * Adjusts the input template based on the provided options.
     *
     * If no template is specified in the options, the default template is used.
     * Otherwise, the template specified in the options is used.
     *
     * @param array $options The options where a template might be specified.
     * @return void
     */
    protected function fixInputTemplate($options)
    {
        if (!isset($options['template'])) {
            $this->template = $this->inputDefaultTemplate;
        } else {
            $this->template = $options['template'];
        }
    }

    /**
     * @inheritDoc
     */
    protected function createLayoutConfig(array $instanceConfig): array
    {
        $config = parent::createLayoutConfig($instanceConfig);
        if (isset($config['inputOptions'])) {
            unset($config['inputOptions']);
        }

        return $config;
    }

    /**
     * @inheritDoc
     */
    public function input($type, $options = [])
    {
        $this->fixInputTemplate($options);

        return parent::input($options);
    }

    /**
     * @inheritDoc
     */
    public function textInput($options = [])
    {
        $this->fixInputTemplate($options);

        return parent::textInput($options);
    }

    /**
     * @inheritDoc
     */
    public function passwordInput($options = [])
    {
        $this->fixInputTemplate($options);

        return parent::passwordInput($options);
    }

    /**
     * @inheritDoc
     */
    public function textarea($options = [])
    {
        $this->fixInputTemplate($options);

        return parent::textarea($options);
    }
}
