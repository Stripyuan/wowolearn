<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapters */

$this->title = '更新章节信息: ' . $model->chapter_name;
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
