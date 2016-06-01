<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Institutions */

$this->title = 'Create Institutions';
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
