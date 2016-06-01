<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OnlineClass */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="b29c95d49586486f3a9eb537718cacf0333806a9">
    <?= $form->field($model, 'class_name')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'class_code')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'class_img')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'class_summary')->textarea() ?>

    <?= $form->field($model, 'content')->textarea() ?>

    <?= $form->field($model, 'class_time')->textInput(['min' => 1])->unit('小时') ?>

    <?= $form->field($model, 'class_category')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'promptShow' => false,
        'items' => \backend\models\OnlineClass::CLASS_CATEGORY_LABELS
    ]) ?>

    <?= $form->field($model, 'class_subject')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'promptShow' => false,
        'items' => \backend\models\OnlineClass::CLASS_SUBJECT_LABELS
    ]) ?>

    <?= $form->field($model, 'online_time')->widget(\jasmine2\dwz\widgets\DateTimePicker::className(),['options'=>['dateFmt' => 'yyyy-MM-dd HH:mm','minDate' => date('Y-m-d')]]) ?>

    <?= $form->field($model, 'price')->textInput()->unit('(元)') ?>

    <?= $form->field($model, 'price_now')->textInput()->unit('(元)') ?>

    <?= $form->field($model, 'teacher')->textInput(['disabled' => true,'value' => $model->teacher->realname]) ?>

    <?= $form->field($model, 'like_times')->textInput() ?>
    <?= $form->field($model, 'in_times')->textInput() ?>
    <?= $form->field($model, 'integral')->textInput() ?>

    <?php ActiveForm::end(); ?>

