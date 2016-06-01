<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Links */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="e6fa0657ed4a9e35b17ebfeee0abfe544508cbb8">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>

