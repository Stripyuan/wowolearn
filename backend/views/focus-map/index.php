<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Focus Maps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="focus-map-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tools'     => [
            'view',
            'create',
            'update',
            'delete',
            Html::tag('li',Html::a(
                '<span>批量删除</span>',
                [Yii::$app->controller->uniqueId . '/m-delete'],
                [
                    'class' => 'delete',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ]))
        ],
        'columns' =>[
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'img_url',
            'to_url:url',
            'created_at:datetime',
            'updated_at:datetime',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
