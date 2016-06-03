<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OnlineClassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Online Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="online-class-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tools'        => [
            'view',
            'update',
            'delete',
            Html::tag('li',Html::a('<span>批量删除</span>',
                [Yii::$app->controller->uniqueId . '/m-delete'],
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

            [
                'attribute' => 'class_name',
                'format'    => 'raw',
                'value'     => function($data){
                    return \jasmine2\dwz\helpers\Html::a($data->class_name,['view','id' => $data->id],['target' => 'navTab','title' => $data->class_name]);
                }
            ],
            'class_code',
            'teacher.realname:text:主讲老师',
            'class_time',
            'classCategoryLabels',
            'classSubjectLabels',
            'online_time:datetime',
            'price:currency',
            'price_now:currency',
            'like_times',
            'in_times',
            'integral',
            'status0:raw',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>
</div>
