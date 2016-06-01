<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chapters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapters-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'class_id',
            'online_time',
            'created_at',
            'updated_at',
            // 'chapter_name',
            // 'chapter_summary',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
