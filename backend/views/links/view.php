<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Links */

$this->title = $model->title;
?>
<div class="links-view">
    <h2 class="contentTitle"><?=  $this->title ?></h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:url',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
