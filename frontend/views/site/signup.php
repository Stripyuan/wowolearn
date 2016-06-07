<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Url;
$this->title = '注册';
?>
<style>
    button[type="submit"]:hover{
        background: rgba(0,0,0,0.1);
    }
    input[type="submit"]:hover{
        background: rgba(63,137,236,0.5);
    }
</style>
<div class="container-fluid login-header" style="border-bottom:2px solid #449d44;">
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/'])?>" title="返回主页">
            <img src="/images/register-banner.png" alt="" class="img-responsive pull-left">
        </a>
        <div class="pull-right">
            我已注册，现在就&nbsp; <a href="<?= Url::to(['site/login'])?>"><button type="submit" class="login-btn">登陆</button></a>
        </div>
    </div>
</div>
<!-- content -->
<div class="content container r-p" style="background:#FFF;padding:20px 0 0 80px;">
    <div class="register">
        <form action="" method="post" id="signup-form">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">
        <p class="field-signup-phone_number required">手机号：
            <input type="text" id="signup-phone_number" name="SignUp[phone_number]" placeholder="可用于登录和找回密码" value="<?= $model->phone_number?>">

            <?php if($error_phone_number = $model->getFirstError('phone_number')): ?>
                <span class="wowo-error"><?= $error_phone_number ?></span>
            <?php else:?>
                <span class=""> 请输入手机号码</span>
            <?php endif; ?>
        </p>
        <p class="field-signup-password required">密　码：
            <input type="password" id="signup-password" name="SignUp[password]" placeholder="密码">

            <?php if($error_password = $model->getFirstError('password')): ?>
                <span class="wowo-error"><?= $error_password ?></span>
            <?php else:?>
                <span> 请输入8-16位数字、大写字母和小写字母的组合</span>
            <?php endif; ?>
        </p>
        <p class="clr">身　份：
            <label class="wowo-radio"><input type="radio" class="wowo-ckb" name="SignUp[role]" value="student" <?= $model->role == "student"?'checked="checked"':""?>> 学生</label>
            <label class="wowo-radio"><input type="radio" class="wowo-ckb" name="SignUp[role]" value="teacher" <?= $model->role == "teacher"?'checked="checked"':""?>> 老师</label>
            <label class="wowo-radio"><input type="radio" class="wowo-ckb" name="SignUp[role]" value="institution" <?= $model->role == "institution"?'checked="checked"':""?>> 机构</label>
        </p>
        <p class="field-signup-v_code required">验证码：
            <input type="text" id="signup-v_code" class="wowo-yzm" name="SignUp[v_code]" placeholder="验证码" value="<?= $model->v_code?>">
            <button type="button" id="get-v-code">获取短信验证码</button>

            <?php if($error_v_code = $model->getFirstError('v_code')): ?>
                <span class="wowo-error"><?= $error_v_code ?></span>
            <?php else:?>
                <span class="">输入手机验证码</span>
            <?php endif; ?>
        </p>
        <p class="agreement"><input id="accept-deal" type="checkbox" checked="checked" class="wowo-ckb"> 阅读并接受<a type="button" data-toggle="modal" data-target="#agreement" style="cursor: pointer;">蜗蜗在线《学生服务协议》</a></p>
        <p><input type="submit" value="注册" class="r-submit"></p>
        </form>
    </div>
    <div class="wowo-prompt" style="display: none;">
        <h3 class="reg-sms-title">手机快速注册</h3>
        <hr>
        <div>
            <p>请使用中国大陆手机号，编辑短信：</p>
            <p class="clr">6-14位字符（支持数字/字母/符号）</p><br>
            <p>作为登录密码，发送至：</p>
            <p class="clr">1069 80000 36590</p>
            <p>即可注册成功，手机号即为登录帐号。</p>
        </div>
    </div>
</div>
<?php
$this->registerJsFile("/statics/js/signup.js",['depends' => 'yii\web\JqueryAsset']);
?>

<!-- Modal -->
<div class="modal fade" id="agreement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>