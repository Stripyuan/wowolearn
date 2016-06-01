<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;
use jasmine2\dwz\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\OnlineClass */

$this->title = $model->class_name;
?>
<div class="pageContent" layoutH="0">
    <h2 class="contentTitle"><?=  $this->title ?></h2>

    <?= DetailView::widget([
        'model' => $model,
        'columns'   => 2,
        'attributes' => [
            'id',
            'class_name',
            'class_code',
            'teacher.realname:text:主讲教师',
            'class_img',
            'class_summary:html',
            'content:html',
            'class_time',
            'classCategoryLabels',
            'classSubjectLabels',
            'online_time:datetime',
            'price:currency',
            'price_now:currency',
            'teaching_plan',
            'like_times',
            'in_times',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
    <div class="divider"></div>
    <?php
    $dataProvider = new \yii\data\ArrayDataProvider([
        'allModels' => $model->chapters,
        'key'       => 'id'
    ]);
    ?>
    <?= GridView::widget([
        'dataProvider'  => $dataProvider,
        'tools'     => [
            Html::tag('li',\jasmine2\dwz\Dialog::widget([
                'title' => '查看',
                'mask'  => true,
                'text'  => '<span>查看</span>',
                'options' => [
                    'class' => 'icon',
                ],
                'url'   => 'chapters/view?id={row_id}'
            ])),
            Html::tag('li',\jasmine2\dwz\Dialog::widget(['height'=>'500','width'=> '800','title' => '编辑章节','text' => '<span>编辑</span>','url' => 'chapters/update?id={row_id}','options' => ['class' => 'edit']])),
            Html::tag('li',Html::a('<span>删除</span>',
                'chapters/delete?id={row_id}',
                [
                    'class' => 'delete',
                    'target' => 'ajaxTodo',
                    'title' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
            Html::tag('li',Html::a('<span>批量删除</span>',
                ['chapters/m-delete'],
                [
                    'class' => 'delete',
                    'target' => 'selectedTodo',
                    'rel'    => 'ids[]',
                    'title' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    '_csrf' => Yii::$app->request->getCsrfToken()
                ])),
        ],
        'layoutH'   => 347,
        'columns'   => [
            [
                'class' => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'   => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],
            'online_time:text:直播时间',
            'chapter_name:text:章节名称',
            'chapter_summary:html:摘要',
            'created_at:datetime:创建时间',
            'updated_at:datetime:更新时间'
        ]
    ])
    ?>
</div>
