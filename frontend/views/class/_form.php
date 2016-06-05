<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OnlineClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="online-class-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_time')->textInput() ?>

    <?= $form->field($model, 'class_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class_subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'online_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_now')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teaching_plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'like_times')->textInput() ?>

    <?= $form->field($model, 'class_type')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'teacher_id')->textInput() ?>

    <?= $form->field($model, 'in_times')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'integral')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
