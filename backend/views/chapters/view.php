<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapters */

$this->title = $model->chapter_name;
?>
<div class="chapters-view" layoutH="0">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'class.class_name',
            'online_time',
            'chapter_name',
            'chapter_summary:html',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
