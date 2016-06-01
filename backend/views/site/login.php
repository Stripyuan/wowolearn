<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Login';
?>
<div class="login-page">
    <img src="/www/wowolearn/backend/web/images/backend-logo.png" alt="">
        <?php $form = ActiveForm::begin(['method' => 'post','options' => ['class' => 'form']])?>
        <?= $form->field($model,'username')->textInput(['placeholder' => '用户名'])->label(false)?>
        <?= $form->field($model,'password')->passwordInput(['placeholder' => '密码'])->label(false)?>
        <?= $form->field($model,'rememberMe')->checkbox()?>
        <button type="submit">登 录</button>
        <p class="message">忘记了密码？<a href="">忘记密码</a></p>
        <?php ActiveForm::end()?>
    <p class="copyright">©白银金中琳科技有限公司版权所有</p>
</div>
