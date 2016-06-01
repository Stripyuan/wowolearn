<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Institutions */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Institutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutions-view" layoutH="0">


    <?= DetailView::widget([
        'model' => $model,
        'columns' => 3,
        'attributes' => [
            'id',
            'username',
            'name',
            'realname',
            'password_hash',
            'auth_key',
            'password_reset_token',
            'phone_number',
            'business_license',
            'tax_registration_number',
            'organization_code',
            'organization_code_img',
            'status0:raw',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
    <?php
    $dataProvider = new \yii\data\ArrayDataProvider([
        'allModels' => $model->teachers,
    ]);
    ?>
    <?= GridView::widget([
        'showTools' => false,
        'dataProvider' => $dataProvider,
        'layoutH'   => 168,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username:text:用户名',
            'realname:text:姓名',
            'email:email',
            'phone_number:text:手机号码',
            'identity_number:text:身份证号码',
            'status0:raw:状态',
            'isSchoolTeacher:raw:是否在职',
            'institution.name:text:所属机构',
            'created_at:datetime:注册时间',
            'updated_at:datetime:更新时间',
        ]
    ])
    ?>
</div>
