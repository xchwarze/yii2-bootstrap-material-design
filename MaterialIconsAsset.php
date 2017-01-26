<?php

namespace exocet\BootstrapMD;


class MaterialIconsAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/mervick/material-design-icons';
    public $css = [
        'css/material-icons.min.css'
    ];

    public function init()
    {
        parent::init();

        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
}