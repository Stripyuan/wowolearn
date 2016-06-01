<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="links-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'url:url',
            'created_at:datetime',
            'updated_at:datetime',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
