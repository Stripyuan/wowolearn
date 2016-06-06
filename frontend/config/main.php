<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\Users',
            'enableAutoLogin' => true,
            'identityCookie' =>
                [
                    'name' => 'wowolearn_front_identity',
                    'httpOnly' => true
                ]
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:[-\w]+>.html'   =>  'site/<action>',
                'posts/categroy/<cate:\d+>.html'    => 'posts/index',
                'posts/<id:\d+>.html' => 'posts/view',
                'class/<id:\w+>.html' => 'class/view',
            ],
        ],
        'formatter' => [
            'datetimeFormat' => 'php:Y年m月d日 H:i',
            'dateFormat' => 'php:Y年m月d日',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => '¥',
        ],
        'shortMessage' => [
            'class'     => 'common\services\ShortMessage'
        ],
    ],
    'params' => $params,
];
