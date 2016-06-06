<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = "登录";
?>
<style>
    button:hover{
        background: rgba(0,0,0,0.1);
    }
</style>
<div class="container-fluid login-header">
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/'])?>" title="返回主页">
        <img src="/images/login-banner.png" alt="" class="img-responsive pull-left">
        </a>
        <div class="pull-right">
            没有账号?&nbsp; <a href="<?= Url::to(['site/signup'])?>"><button type="submit" class="login-btn">注册</button></a>
        </div>
    </div>
</div>

<div class="content login">
    <div class="container">

        <div class="login-page">
            <?php $form = ActiveForm::begin(['method' => 'post','options' => ['class' => 'form']])?>
            <h3 class="text-left">用户登录</h3>
            <?= $form->field($model,'role')->label(false)->dropDownList([
                'student'   => '学生',
                'teacher'   => '老师',
                'institution'   => '机构',
            ])?>
            <?= $form->field($model,'phone_number')->textInput(['placeholder' => '请输入手机号码'])->label(false)?>
            <?= $form->field($model,'password')->passwordInput(['placeholder' => '密码'])->label(false)?>
            <?= $form->field($model,'rememberMe')->checkbox()?>
            <button type="submit">登 录</button>
            <p class="message">忘记了密码？<a href="">忘记密码</a></p>
            <?php ActiveForm::end()?>
        </div>
    </div>
</div>