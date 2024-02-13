<?php

namespace exocet\bootstrap5md;

use yii\web\View;

class BootstrapPluginAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = null;

    /**
     * @inheritDoc
     */
    public $css = [];

    /**
     * @inheritDoc
     */
    public $js = [];

    /**
     * @inheritDoc
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        // mdb rename as the original name....
        $view->registerJs("window.bootstrap=window.mdb;", View::POS_END);
    }
}
