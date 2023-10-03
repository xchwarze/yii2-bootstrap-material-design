<?php

namespace exocet\bootstrap5md;

use Yii;

class MaterialAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/mdb-ui-kit';

    /**
     * @inheritDoc
     */
    public $css = [
        'css/mdb.min.css',
    ];

    /**
     * @inheritDoc
     */
    public $js = [
        'js/mdb.min.js',
    ];

    /**
     * @inheritDoc
     */
    public function init()
    {
        // disable original bootstrap 5 assets
        //Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapAsset'] = false;
        //Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapPluginAsset'] = false;

        parent::init();
    }
}
