<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CmsCategory */

$this->title = '更新CMS分类: ' . $model->name;
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
