<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsPosts */

$this->title = 'Update Cms Posts: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cms Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cms-posts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
