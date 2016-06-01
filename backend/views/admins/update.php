<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admins */

$this->title = '修改管理员信息: ' . $model->username;
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
