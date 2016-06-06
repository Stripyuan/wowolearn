<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InstitutionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
        <div class="searchBar">
            <?php $form = SearchForm::begin()?>

    <?= $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'business_license') ?>

    <?php // echo $form->field($model, 'tax_registration_number') ?>

    <?php // echo $form->field($model, 'organization_code') ?>

    <?php // echo $form->field($model, 'organization_code_img') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'logo') ?>


    <?php // echo $form->field($model, 'realname') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'items' => \backend\models\Users::STATUS_LABELS
    ]) ?>


    <?php SearchForm::end(); ?>
            <div class="subBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
                </ul>
            </div>
        </div>
    </form>
</div>
