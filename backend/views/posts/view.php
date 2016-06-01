<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsPosts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cms Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pageContent">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username:text:用户',
            'category.name',
            'title',
            'summary',
           // 'content:html',
            'view_times',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>
