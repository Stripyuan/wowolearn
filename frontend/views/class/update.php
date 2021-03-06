<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OnlineClass */

$this->title = 'Update Online Class: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Online Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="online-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
