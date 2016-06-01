<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="23c199b23874a8cfd95629de1f0b533236ce13f4">
    <?= $form->field($model, 'username')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'promptShow' => false,
        'items' => \backend\models\Students::STATUS_LABELS
    ]) ?>
    <div class="divider"></div>
    <h1>帮助信息</h1>
    <?php ActiveForm::end(); ?>

