<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeachsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
        <div class="searchBar">
            <?php $form = SearchForm::begin()?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content') ?>

    <?php SearchForm::end(); ?>
            <div class="subBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
                </ul>
            </div>
        </div>
    </form>
</div>
