<?php

use jasmine2\dwz\widgets\ActiveForm;
use jasmine2\dwz\widgets\Combox;
use jasmine2\dwz\helpers\ArrayHelper;
use backend\models\CmsCategory;
/* @var $this yii\web\View */
/* @var $model backend\models\CmsCategory */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="3302edc7856266dddf251e85f278820824e930a7">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->widget(Combox::className(),[
        'items' => ArrayHelper::map(
            CmsCategory::find()->where(['<>','id',$model->id == null? 0 : $model->id])->asArray()->all(),
            'id','name'
        )
    ]) ?>


    <?php ActiveForm::end(); ?>

