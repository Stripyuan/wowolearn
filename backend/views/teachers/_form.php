<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;
use jasmine2\dwz\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="046d5c36b48ad0e5311ea04d0e2675b0b2ee9c56">

    <?= $form->field($model, 'username')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'introduction')->textarea(['show' => false,'rows' => 3]) ?>

    <?= $form->field($model, 'identity_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_school_teacher')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'items' => \backend\models\Teachers::SCHOOL_TEACHER_LABELS
    ]) ?>
    <?= $form->field($model, 'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'promptShow' => false,
        'items' => \backend\models\Students::STATUS_LABELS
    ]) ?>

    <?= $form->field($model, 'institution_id')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'items' => ArrayHelper::map(\backend\models\Institutions::find()->all(),'id','name')
    ]) ?>


    <?php ActiveForm::end(); ?>

