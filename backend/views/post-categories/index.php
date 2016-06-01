<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="cms-category-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format'    => 'raw',
                'value'     => function($data){
                    if(count($data->child) > 0)
                        return Html::a($data->name.'<span class="badge">'.count($data->child).'</span>',['post-categories/index', 'cat' => $data->id],['target' => 'navTab','title' => $data->name]);
                    else
                        return $data->name;
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],
        ],
    ]); ?>
</div>
