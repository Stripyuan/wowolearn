<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FocusMap */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="navTabId" value="1faac6afd5fa0bf32d993ddb291774e7d45f7601">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'to_url') ?>

    <?= $form->field($model, 'img_url')->widget(\jasmine2\dwz\widgets\UploadifyInput::className(),[
        'uploader' => \yii\helpers\Url::to(['site/upload']),
        'formData' => [
            'id' => 'focus-map',
            '_csrf' => Yii::$app->request->getCsrfToken()
        ]
    ]) ?>
    <div class="divider"></div>
<p style="color: #ff0000;;">* 请使用1139pxx300px图片</p>
    <?php ActiveForm::end(); ?>

