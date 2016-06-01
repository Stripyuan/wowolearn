<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapters */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(['options'=>['onsubmit' => 'return validateCallback(this,dialogAjaxDone)']]); ?>
    <input type="hidden" name="navTabId" value="_blank">

    <?= $form->field($model, 'online_time')->widget(\jasmine2\dwz\widgets\DateTimePicker::className(),['options' => ['dateFmt' => 'yyyy-MM-dd HH:mm','minDate' => date('Y-m-d')]]) ?>

    <?= $form->field($model, 'chapter_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chapter_summary')->textarea(['options' => ['show' => false,],'rows' => 6]) ?>


    <?php ActiveForm::end(); ?>

