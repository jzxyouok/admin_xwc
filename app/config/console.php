<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'tyuan-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'vendorPath' =>  dirname(__DIR__).'/../framework/yii2/vendor',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'aliases' => [
        '@PHPGit' => '@vendor/PHPGit',
        '@Symfony' => '@vendor/Symfony',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'error', 'warning'],
                    'categories' => ['cve_new'],
                    'logFile' => '@app/runtime/logs/spider/cve_new.log',
                    'maxFileSize' => 1024 * 10,
                    'maxLogFiles' => 100,
                    'logVars' => [],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'error', 'warning'],
                    'categories' => ['cve_old'],
                    'logFile' => '@app/runtime/logs/spider/cve_old.log',
                    'maxFileSize' => 1024 * 10,
                    'maxLogFiles' => 100,
                    'logVars' => [],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'error', 'warning'],
                    'categories' => ['email_success'],
                    'logFile' => '@app/runtime/logs/email/success.log',
                    'maxFileSize' => 1024 * 10,
                    'maxLogFiles' => 100,
                    'logVars' => [],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'error', 'warning'],
                    'categories' => ['email_fail'],
                    'logFile' => '@app/runtime/logs/email/fail.log',
                    'maxFileSize' => 1024 * 10,
                    'maxLogFiles' => 100,
                    'logVars' => [],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'db' => $db,
        'db_k' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=172.24.62.151;dbname=knowledge',
            'username' => 'knowledge',
            'password' => 'vqd45#$12q',
            'charset' => 'utf8',
        ],
    ],
    'params' => $params,
];
