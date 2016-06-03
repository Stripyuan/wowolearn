<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Learns */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Learns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learns-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'student.username',
            'student.realname',
            'title',
            'content:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
