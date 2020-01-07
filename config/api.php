<?php

use tabler\infrastructure\ErrorHandler;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'container' => [
		'definitions' => require __DIR__ . '/definitions.php',
	],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'qEp0cmf3zZOfU2i2A9uKaXLEIecFAhXQ',
        ],
		'response' => [
			'format' => \yii\web\Response::FORMAT_JSON
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
        	'class' => ErrorHandler::class,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
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
        'db' => $db,
		'mongodb' => [
			'class' => \yii\mongodb\Connection::class,
			'dsn' => 'mongodb://root:123456@localhost:27017/tbdb?authSource=admin',
		],
        'urlManager' => [
            'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
				'api/v1/posts' => 'posts',
				'api/v1/user' => 'users/index',
				'api/v1/place' => 'places/index',
			],
        ],
    ],
    'params' => $params,
];
