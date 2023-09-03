<?php

namespace exocet\bootstrap5md;


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
	public $depends = [
		'yii\bootstrap5\BootstrapAsset',
	];
}
