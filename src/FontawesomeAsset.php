<?php

namespace exocet\bootstrap5md;

class FontawesomeAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/fortawesome--fontawesome-free';

    /**
     * @inheritDoc
     */
    public $css = [
        'css/all.min.css',
    ];
}
