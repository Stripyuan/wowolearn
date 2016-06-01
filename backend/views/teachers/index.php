<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'search'  => $this->render('_search',['model' => $searchModel]),
        'tools' => [
            'view',
            'update',
            Html::tag('li',Html::a('<span>批量删除</span>',
                [Yii::$app->controller->uniqueId . '/m-delete'],
                [
                    'class' => 'delete',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
            Html::tag('li',Html::a('<span>批量锁定</span>',
                [Yii::$app->controller->uniqueId . '/m-lock'],
                [
                    'class' => 'icon',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => '您确定锁定这些用户吗？',
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
            Html::tag('li',Html::a('<span>批量解除锁定</span>',
                [Yii::$app->controller->uniqueId . '/m-un-lock'],
                [
                    'class' => 'icon',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => '您确定锁定这些用户吗？',
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
        ],
        'columns' =>[
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'realname',
            'email:email',
            'phone_number',
            'identity_number',
            'status0:raw',
            'isSchoolTeacher:raw',
            'institution.name',
            'created_at:datetime',
            'updated_at:datetime',
            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],

        ],
    ]); ?>
</div>