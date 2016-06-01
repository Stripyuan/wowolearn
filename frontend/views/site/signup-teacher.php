<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
?>
<div class="container-fluid login-header">
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/'])?>" title="返回主页">
            <img src="/images/register-banner.png" alt="" class="img-responsive pull-left">
        </a>
    </div>
</div>
<div class="content login">
    <div class="container">
        <div class="login-page register-page">
            <?php $form = ActiveForm::begin(['method' => 'post','options' => ['class' => 'form']])?>
            <div class="form-group">
                <!-- Single button -->
                <label for="">您的身份是</label>
                <div class="btn-group" style="width: 100%;">
                    <a style="width: 100%;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        教师 <span class="caret pull-right" style="margin-top: 9px;"></span>
                    </a>
                    <ul class="dropdown-menu" style="width: 100%;">
                        <li><a href="<?= \yii\helpers\Url::to(['site/signup'])?>">学生</a></li>
                        <li class="active"><a href="<?= \yii\helpers\Url::to(['site/signup-teacher'])?>">教师</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['site/signup-institution'])?>">机构</a></li>
                    </ul>
                </div>
            </div>
            <?= $form->field($model, 'username')?>
            <?= $form->field($model, 'password')?>
            <?= $form->field($model, 'confirm_password')?>
            <?= $form->field($model, 'identify_number')?>
            <?= $form->field($model, 'phone_number')?>
            <?= $form->field($model, 'sms_code')?>
            <button type="submit">注 册</button>
            <?php ActiveForm::end()?>
        </div>
    </div>
</div>
