<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FocusMap */

$this->title = 'Update Focus Map: ' . $model->title;
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
