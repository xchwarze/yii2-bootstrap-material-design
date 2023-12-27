# yii2-bootstrap-material-design

Composer package for implementing FezVrasta's new bootstrap material design (MDB 6) in Yii2
https://github.com/mdbootstrap/mdb-ui-kit


## Installation

The preferred way of installation is through Composer.
```bash
composer require exocet/yii2-bootstrap-material-design
```


## Usage

To load the MDB CSS and JS files integrate the MaterialAsset into your app.
Two ways to achieve this is to register the asset in the main layout:

```php
// @app/views/layouts/main.php

\exocet\bootstrap5md\MaterialAsset::register($this); // include css and js
\exocet\bootstrap5md\FontawesomeAsset::register($this); // include icons (optional)
// further code
```

or as a dependency in your app wide AppAsset.php

```php
// @app/assets/AppAsset.php

public $depends = [
    // include mdb assets
    'exocet\bootstrap5md\MaterialAsset',
    
    // include Fontawesome icons (optional)
    'exocet\bootstrap5md\FontawesomeAsset',

    // include material icons (optional)
    'exocet\bootstrap5md\MaterialIconsAsset',
    
    // more dependencies
    //...
];
```

In order for it to work properly, the files must be patched to accept the settings in the same way as the original Bootstrap does. So we have to add this in our `composer.json` so that it is always done automatically.
```json
    "scripts": {
        "post-install-cmd": [
            "@composer run-script post-install-cmd --working-dir=vendor/exocet/yii2-bootstrap-material-design"
        ],
        "post-update-cmd": [
            "@composer run-script post-update-cmd --working-dir=vendor/exocet/yii2-bootstrap-material-design"
        ]
    }
```

## Widgets

This add-on extends Bootstrap 5 by replacing dependencies with MDB dependencies and corrects the way html is generated in certain components to make them the way they are used with MDB.

For this we must overwrite the original AssetBundle as follows


```php
// @app/config/web.php
'components' => [
    'assetManager' => [
        'bundles' => [
            'yii\bootstrap5\BootstrapAsset' => [
                'class' => \exocet\bootstrap5md\BootstrapAsset::class,
            ],
            'yii\bootstrap5\BootstrapPluginAsset' => [
                'class' => \exocet\bootstrap5md\BootstrapPluginAsset::class,
            ],
        ],
    ],
```

It is probably best to use it in combination with https://github.com/kartik-v/yii2-widgets

## Gii support

If you are creating your CRUD controller and view files using Gii you can get materialized view files by integrating the adapted Gii templates.

```php
// @app/config/main-local.php

$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',      
    'allowedIPs' => ['127.0.0.1', '::1'],  
    'generators' => [
        'crud' => [
            'class' => 'yii\gii\generators\crud\Generator',
            'templates' => [
                'material-bootstrap' => '@vendor/exocet/yii2-bootstrap-material-design/src/generators/crud',
            ]
        ]
    ],
];
```

You can copy those templates to any location you wish for further customization. Make sure you adapt the path accordingly in your config.
