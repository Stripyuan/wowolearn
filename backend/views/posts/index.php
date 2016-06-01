<?php

use yii\helpers\Html;
use jasmine2\dwz\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-posts-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'search'    => $this->render('_search',['model' => $searchModel]),
        'columns' =>[
            ['class' => 'yii\grid\SerialColumn'],

            'user.username:text:用户',
            'title',
            'summary',
            'category.name',
            'view_times',
            'created_at:datetime',
            'updated_at:datetime',
            // ['class' => 'jasmine2\dwz\grid\ActionColumn'],

        ],
    ]); ?>
</div>
