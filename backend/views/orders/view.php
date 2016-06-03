<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">


    <?= DetailView::widget([
        'model' => $model,
        'columns'   => 2,
        'attributes' => [
            'id',
            'order_id',
            'class_id',
            'user_id',
            'count',
            'total_fee',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    <?php $log = new \yii\data\ArrayDataProvider([
        'allModels'     => $model->log,
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $log,
        'showTools' =>false,
        'columns'   => [
            'order.order_id:text:订单号',
            'admin:text:操作员',
            'status0:text:状态',
            'created_at:datetime:时间',
        ],
    ])?>
</div>
