<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=wowolearn',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'formatter' => [
            'datetimeFormat' => 'php:Y-m-d H:i:s',
            'dateFormat' => 'php:Y-m-d',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'CNY',
        ],
    ],
];
