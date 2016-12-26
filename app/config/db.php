<?php

return [
    'class' => 'yii\db\Connection',

    // 配置主服务器
    'dsn' => 'mysql:host=172.24.62.151;dbname=admin_xwc',
    'username' => 'cloud_checker',
    'password' => 'aw@#$1902e',
    'charset' => 'utf8',

    // 配置从服务器
    'slaveConfig' => [
        'username' => 'cloud_checker',
        'password' => 'aw@#$1902e',
        'charset' => 'utf8',
        'attributes' => [
            // use a smaller connection timeout
            PDO::ATTR_TIMEOUT => 10,
        ],
    ],

    // 配置从服务器组
    'slaves' => [
        ['dsn' => 'mysql:host=172.24.62.151;dbname=admin_xwc'],
    ]

];
