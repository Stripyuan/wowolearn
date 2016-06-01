<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;
use jasmine2\dwz\widgets\Combox;
/* @var $this yii\web\View */
/* @var $model backend\models\CmsPosts */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="ad3fd0f4c7f7e1afff1122a478df383af32e4e0f">

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textInput() ?>

    <?= $form->field($model, 'category_id')->widget(Combox::className(),[
        'items' => \jasmine2\dwz\helpers\ArrayHelper::map(
            \backend\models\CmsCategory::find()->all(),
            'id','name'
        )
    ]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php ActiveForm::end(); ?>

