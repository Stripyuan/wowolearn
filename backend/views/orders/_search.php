<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
        <div class="searchBar">
            <?php $form = SearchForm::begin()?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'class_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'total_fee') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>


    <?php SearchForm::end(); ?>
            <div class="subBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
                </ul>
            </div>
        </div>
    </form>
</div>
