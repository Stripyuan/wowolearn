<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InstitutionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutions-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tools'  => [
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
        'search'  => $this->render('_search',['model' => $searchModel]),
        'columns' =>[
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'username',
                'format'    => 'raw',
                'value'     => function($data){
                    return Html::a($data->username,['view','id' => $data->id],['target' => 'navTab','title' => $data->name]);
                }
            ],
            'name',
            'realname',
            'phone_number',
            'business_license',
            'tax_registration_number',
            'organization_code',
            'created_at:datetime',
            'updated_at:datetime',
            'status0:raw',
        ],
    ]); ?>
</div>
