<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TachingPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Online Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="online-class-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tools' =>  [
            'delete',
            Html::tag('li',Html::a('<span>批量删除</span>',
                [Yii::$app->controller->uniqueId .'/m-delete'],
                [
                    'class' => 'delete',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
        ],
        'search'  => $this->render('_search',['model' => $searchModel]),
        'columns' =>[
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'class_name',
            'class_code',
            // 'class_time:datetime',
            // 'class_category',
            // 'class_subject',
            // 'online_time',
            // 'price',
            // 'price_now',
            'teaching_plan',
            // 'like_times:datetime',
            // 'class_type',
            'teacher.realname',
            'created_at:datetime',
            // 'in_times:datetime',
            // 'content:ntext',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
            'updated_at:datetime',
            [
                'label' => '下载',
                'format'=> 'raw',
                'value' => function($data){

                }
            ]
        ],
    ]); ?>
</div>
