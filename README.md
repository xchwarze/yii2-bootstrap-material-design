# yii2-bootstrap-material-design

Composer package for implementing FezVrasta's bootstrap material design in Yii2
https://github.com/FezVrasta/bootstrap-material-design


## Installation

The preferred way of installation is through Composer.
If you don't have Composer you can get it here: https://getcomposer.org/

You also should install the Composer Asset Plugin to handle NPM and Bower assets:
```
$ composer global require "fxp/composer-asset-plugin:~1.2"
```

To install the package add the following to the ```require``` section of your composer.json:
```
"require": {
    "exocet/yii2-bootstrap-material-design": "*"
},
```

## Usage

To load the Materialize CSS files integrate the MaterializeAsset into your app.
Two ways to achieve this is to register the asset in the main layout:

```php
// @app/views/layouts/main.php

\exocet\BootstrapMD\MaterialAsset::register($this); // include css and js
\exocet\BootstrapMD\MaterialIconsAsset::register($this); // include icons (optional)
\exocet\BootstrapMD\MaterialInitAsset::register($this); // add $.material.init(); js (optional)
// further code
```

or as a dependency in your app wide AppAsset.php

```php
// @app/assets/AppAsset.php

public $depends = [
    'exocet\BootstrapMD\MaterialAsset', // include css and js
    'exocet\BootstrapMD\MaterialIconsAsset', // include icons (optional)
    'exocet\BootstrapMD\MaterialInitAsset', // add $.material.init(); js (optional)
    // more dependencies
];
```

## Widgets

The following widgets are currently available:

* ActiveField
* ActiveForm
* GridView with ActionColumn


## Gii support

If you are creating your CRUD controller and view files using Gii you can get materialized view files by integrating the adapted Gii templates.

```php
// @app/config/main-local.php

$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',      
    'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],  
    'generators' => [
        'crud' => [
            'class' => 'yii\gii\generators\crud\Generator',
            'templates' => [ // setting templates
                'material-desing' => '@vendor/exocet/yii2-bootstrap-material-design/generators/material-design/crud',
                'material-desing-h' => '@vendor/exocet/yii2-bootstrap-material-design/generators/material-design-h/crud', 
                'material-design-with-icons' => '@vendor/exocet/yii2-bootstrap-material-design/generators/material-design-with-icons/crud',
                'material-design-h-with-icons' => '@vendor/exocet/yii2-bootstrap-material-design/generators/material-design-h-with-icons/crud'
            ]
        ]
    ],
];
```

You can copy those templates to any location you wish for further customization. Make sure you adapt the path accordingly in your config.
