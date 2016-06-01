<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Links */

$this->title = '更新友情链接: ' . $model->title;
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
