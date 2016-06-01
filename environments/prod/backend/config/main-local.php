<?php
return [
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
