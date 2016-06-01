<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FocusMap */

$this->title = '增加焦点图';
?>
<h2 class="contentTitle"><?=  $this->title ?></h2>
<div class="pageContent">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
