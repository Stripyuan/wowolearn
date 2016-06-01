<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CmsPosts */

$this->title = 'Create Cms Posts';
$this->params['breadcrumbs'][] = ['label' => 'Cms Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
