<?php

return [
    'controllersNamespace' => 'app\controllers',
    'defaultController' => 'index',
    'defaultAction' => 'index',
    'authPage' => '/guest/login',
    'components' => [
        'db' => [
            'driver' => 'mysql',
            'host' => 'db',
            'user' => 'skillup_user',
            'password' => 'skillup_pwd',
            'dbName' => 'skillup_db',
        ],
        'template' => [
            'templatesDir' => __DIR__ . '/../app/views/templates',
            'layoutsDir' => __DIR__ . '/../app/views/layouts',
            'defaultLayout' => 'main',
            'extension' => 'php'
        ],
    ],
];