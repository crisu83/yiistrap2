<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

defined('YII_ENV') or define('YII_ENV', 'test');

require_once(__DIR__ . '/../vendor/yiisoft/yii2/yii/Yii.php');
require_once(__DIR__ . '/../vendor/autoload.php');
Yii::importNamespaces(require(__DIR__ . '/../vendor/composer/autoload_namespaces.php'));

new yii\web\Application(
    array(
        'id' => 'bootstrap',
        'basePath' => dirname(__DIR__),
    )
);