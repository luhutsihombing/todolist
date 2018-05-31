<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'urlManager' => [
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'site',
                    'tokens' => [
                        '{message}' => '<message:\\d+>'
                    ],
                    'extraPatterns' => [
                        'GET say/{message}' => 'say'
                    ],
                    'pluralize' => false,
                ],
            ]
        ],
        'request' => [
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => [''],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
    'modules' =>[
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'controllerMap' => [
            'file' => 'mdm\\upload\\FileController', // use to show or download file
    ],
];

if (YII_ENV_DEV) {
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
