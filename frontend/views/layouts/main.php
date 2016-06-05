<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- top -->
<div class="bg"></div>
<!-- 导航条 -->
<div class="logo-nav-itp container">
    <div class="logo">
        <h1><a href="./">窝窝教育</a></h1>
    </div>
    <div class="nav">
        <ul>
            <li class="active"><a href="">首页</a></li>
            <li><a href="homework.html">作业直播</a></li>
            <li><a href="">文化直播</a></li>
            <li><a href="">艺术直播</a></li>
            <!--<li><a href="">名师在线</a></li>-->
            <li><a href="">教案文档</a></li>
        </ul>
    </div>
    <div class="itp">
        <form class="form-inline navbar-form">
            <input class="form-control" type="text" placeholder="请输入课程名称或学科">
            <button class="btn btn-success" type="submit">搜 索</button>
        </form>
    </div>
    <div class="pull-right l-i">
        <?php if(Yii::$app->user->isGuest):?>
            <a href="<?= Url::to(['site/login'])?>" style="color: #666;">马上登录</a>
            &nbsp;
            <a href="<?= Url::to(['site/signup'])?>" style="color: #666;">注册</a>
        <?php else: ?>
            <span class="text-overflow">欢迎您：<?= Yii::$app->user->identity->username?></span>
        <?php endif;?>
        &nbsp;
        <?php if(!Yii::$app->user->isGuest):?>
            <a href="<?= Url::to(['site/logout'])?>" style="color: #666;">退出</a>
        <?php endif; ?>
    </div>
</div>
<?= $content ?>
<div class="container-fluid footer">
    <?= $this->render('footer')?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
