<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'search'  => $this->render('_search',['model' => $searchModel]),
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'class_id',
            'user_id',
            'count',
            // 'total_fee',
            // 'status',
            // 'created_at',
            // 'updated_at',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
