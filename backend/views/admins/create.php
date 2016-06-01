<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Admins */

$this->title = '新增管理员';
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
