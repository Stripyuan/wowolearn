<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CmsPosts */

$this->title = '发布文章';
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
