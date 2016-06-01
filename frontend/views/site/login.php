<?php
use yii\widgets\ActiveForm;
$this->title = "登录";
?>
<div class="container-fluid login-header">
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/'])?>" title="返回主页">
        <img src="/images/login-banner.png" alt="" class="img-responsive pull-left">
        </a>
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
            <?= $form->field($model,'username')->textInput(['placeholder' => '用户名'])->label(false)?>
            <?= $form->field($model,'password')->passwordInput(['placeholder' => '密码'])->label(false)?>
            <?= $form->field($model,'rememberMe')->checkbox()?>
            <button type="submit">登 录</button>
            <p class="message">忘记了密码？<a href="">忘记密码</a></p>
            <?php ActiveForm::end()?>
        </div>
    </div>
</div>