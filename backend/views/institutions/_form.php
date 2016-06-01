<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Institutions */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="2a34d9c3211f7330455149e7556fa315387794b7">
    <?= $form->field($model, 'username')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_license')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_registration_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
    'items' => \backend\models\Institutions::STATUS_LABELS
    ])  ?>

    <?php ActiveForm::end(); ?>

