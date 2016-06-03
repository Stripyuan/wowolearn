<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;
use jasmine2\dwz\Dialog;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tools'     => [
            'view',
            'delete',
            'update',
            Html::tag('li',Html::a('<span>批量删除</span>',
                [Yii::$app->controller->uniqueId . '/m-delete'],
                [
                    'class' => 'delete',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
            Html::tag('li', Dialog::widget([
                'title' => '修改订单状态',
                'mask'  => true,
                'text'  => '<span>修改订单状态</span>',
                'options' => [
                    'class' => 'icon',
                ],
                'url'   => [Yii::$app->controller->uniqueId . '/update-status?id={row_id}']
            ]))
        ],
        'search'  => $this->render('_search',['model' => $searchModel]),
        'columns' =>[
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            'class.class_name',
            'user.realname:text:用户姓名',
            'count',
            'total_fee:currency',
            'status0:raw',
            'created_at:datetime',
            'updated_at:datetime',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
