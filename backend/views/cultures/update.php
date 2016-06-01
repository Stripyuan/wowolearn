<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OnlineClass */

$this->title = '更新课程信息: ' . $model->class_name;
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
