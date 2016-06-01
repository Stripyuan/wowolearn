<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
    'aliases'   => [
        'jasmine2/dwz' => '@vendor/jasmine2/yii2-dwz/src'
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'yii2-dwz-crud' => [
                'class'  => 'jasmine2\dwz\gii\generators\crud\Generator',
                'templates' => [
                    //'Yii2-dwz-crud' => '@jasmine2/dwz/gii/generators/crud/default'
                ]
            ]
        ]
    ];
}

return $config;
