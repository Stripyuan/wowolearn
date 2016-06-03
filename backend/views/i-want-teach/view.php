<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Teachs */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Teachs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachs-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'teacher.username',
            'teacher.realname',
            'title',
            'content:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
