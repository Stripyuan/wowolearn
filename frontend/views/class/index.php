<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Online Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="online-class-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Online Class', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'class_name',
            'class_code',
            'class_img',
            'class_summary',
            // 'class_time:datetime',
            // 'class_category',
            // 'class_subject',
            // 'online_time',
            // 'price',
            // 'price_now',
            // 'teaching_plan',
            // 'like_times:datetime',
            // 'class_type',
            // 'created_at',
            // 'updated_at',
            // 'teacher_id',
            // 'in_times:datetime',
            // 'content:ntext',
            // 'integral',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
