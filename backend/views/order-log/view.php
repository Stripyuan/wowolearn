<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-log-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at:datetime',
            [
                'attribute' => 'content',
                'format'    => 'raw',
                'value'     => Html::tag('pre',($content = @unserialize($model->content))?\yii\helpers\VarDumper::dumpAsString($content):$model->content)
            ],
            'admin',
            'action',
        ],
    ]) ?>

</div>
