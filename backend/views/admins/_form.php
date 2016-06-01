<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admins */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="fd162f4eaf8e1fa608234d5e0ec3792f10d1f6b9">
    <?= $form->field($model,'username')->textInput($model->isNewRecord?[]:['disabled' => 'disabled'])?>
    <?= $form->field($model,'password')?>
    <?= $form->field($model,'email')?>
    <?= $form->field($model,'realname')?>
    <?= $form->field($model,'phone_number')?>
    <?= $form->field($model, 'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'items' => \backend\models\Admins::STATUS_LABELS
    ]) ?>


    <?php ActiveForm::end(); ?>

