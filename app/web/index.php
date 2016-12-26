<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');


require(__DIR__ . '/../../framework/yii2/vendor/autoload.php');
require(__DIR__ . '/../../framework/yii2/vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../config/alias.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
