<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cms Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-category-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'created_at:datetime',
            'updated_at:datetime',
            'parent.name',
        ],
    ]) ?>

</div>
