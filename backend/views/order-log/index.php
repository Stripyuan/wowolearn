<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-log-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tools'     => [
            'view'
        ],
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],
            'created_at:datetime',
            //'content:text',
            'admin',
            'action',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
