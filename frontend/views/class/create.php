<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\OnlineClass */

$this->title = 'Create Online Class';
$this->params['breadcrumbs'][] = ['label' => 'Online Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="online-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
