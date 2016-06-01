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

</div>
