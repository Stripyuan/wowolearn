<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = 'Create Orders';
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
