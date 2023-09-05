# yii2-bootstrap-material-design

Composer package for implementing FezVrasta's new bootstrap material design (MDB 6) in Yii2
https://github.com/mdbootstrap/mdb-ui-kit


## Installation

The preferred way of installation is through Composer.
```bash
composer install exocet/yii2-bootstrap-material-design
```


## Usage

To load the MDB CSS and JS files integrate the MaterialAsset into your app.
Two ways to achieve this is to register the asset in the main layout:

```php
// @app/views/layouts/main.php

\exocet\bootstrap5md\MaterialAsset::register($this); // include css and js
\exocet\bootstrap5md\MaterialIconsAsset::register($this); // include icons (optional)
// further code
```

or as a dependency in your app wide AppAsset.php

```php
// @app/assets/AppAsset.php

public $depends = [
    // include bootstrap 5 and material
    'exocet\bootstrap5md\MaterialAsset',
    
    // include material icons (optional)
    'exocet\bootstrap5md\MaterialIconsAsset',
    
    // more dependencies
    //...
];
```

## Widgets

This add-on extends Bootstrap 5 by replacing dependencies with MDB dependencies and corrects the way html is generated in certain components to make them the way they are used with MDB.

It is probably best to use it in combination with https://github.com/kartik-v/yii2-widgets

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
                'material-bootstrap' => '@vendor/exocet/yii2-bootstrap-material-design/generators/material-design/crud',
                'material-bootstrap-with-icons' => '@vendor/exocet/yii2-bootstrap-material-design/generators/material-design-with-icons/crud',
            ]
        ]
    ],
];
```

You can copy those templates to any location you wish for further customization. Make sure you adapt the path accordingly in your config.
