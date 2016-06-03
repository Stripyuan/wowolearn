<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LearnsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="learns-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'search'  => $this->render('_search',['model' => $searchModel]),
        'tools'     => [
            'view',
            'delete',
            'm-delete'
        ],
        'columns' =>[
            [
                'class'     => 'jasmine2\dwz\grid\CheckboxColumn',
                'rel'       => 'ids[]'
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'student.username',
            'student.realname',
            'title',
            'content:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>
</div>
