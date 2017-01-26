<?php

namespace exocet\BootstrapMD;


class MaterialAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@bower/bootstrap-material-design/dist';
	public $css = [
		'css/ripples.min.css',
		'css/bootstrap-material-design.min.css'
	];
	public $js = [
		'js/ripples.min.js',
		'js/material.min.js'
	];
	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset'
	];
}
