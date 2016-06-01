<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view" layoutH="0">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'password_hash',
            'auth_key',
            'virtualCurrency.currency',
            'password_reset_token',
            'email:email',
            'phone_number',
            'identity_number',
            'status0:raw',
            'qq',
            'wechat',
            'realname',
            'created_at:datetime',
            'updated_at:datetime',
            'logo',
        ],
    ]) ?>
    <?php $logs = new \yii\data\ArrayDataProvider([
        'allModels' => $model->virtualCurrencyLogs
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $logs,
        'showTools'     => false,
        'columns'       => [
            'created_at:datetime:时间',
            'currency:text:积分',
            'admin.username:text:操作员'
        ]
    ])?>
</div>
