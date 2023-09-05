<?php

namespace exocet\bootstrap5md;

class MaterialIconsAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/mervick--mdi-icons';

    /**
     * @inheritDoc
     */
    public $css = [
        'css/material-icons.min.css'
    ];

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
}
