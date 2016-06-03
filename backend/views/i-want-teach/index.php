<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeachsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachs-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'search'  => $this->render('_search',['model' => $searchModel]),
        'tools'     => [
            'view',
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
        'columns' =>[
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],

            ['class' => 'yii\grid\SerialColumn'],

            'teacher.username',
            'teacher.realname',
            'title',
            'content:ntext',
            'created_at:datetime',
            'updated_at:datetime',

            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
