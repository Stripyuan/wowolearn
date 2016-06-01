<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
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
<div class="container-fluid top">
	<div class="container">
		<div class="pull-right">
			<?php if(Yii::$app->user->isGuest):?>
				<a href="<?= Url::to(['site/login'])?>" style="color: #666;">马上登录</a>
				&nbsp;
				<a href="<?= Url::to(['site/signup'])?>" style="color: #666;">注册</a>
			<?php else: ?>
				欢迎您：<?= Yii::$app->user->identity->username?>
			<?php endif;?>
			&nbsp;
			<?php if(!Yii::$app->user->isGuest):?>
				<a href="<?= Url::to(['site/logout'])?>" style="color: #666;">退出</a>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="container hidden-sm hidden-xs">
	<div class="row" style="padding: 12px;">
		<div class="col-md-8">
			<a href="/" title="首页">
			<img src="/images/banner.png" alt="" class="img-responsive" style="height: 50px;width: auto;"/>
			</a>
		</div>
		<div class="col-md-4 navbar-form">
			<form class="form-inline navbar-form">
				<input class="form-control" type="text" placeholder="请输入课程名称或学科">
				<button class="btn btn-success" type="submit">搜 索</button>
			</form>
		</div>
	</div>
</div>
<?= $content ?>
<div class="container-fluid footer">
	<div class="container">
		<div class="col-md-4">
			<ul>
				<h6>使用帮助</h6>
				<li><a href="">平台功能简介</a></li>
				<li><a href="">平台使用流程</a></li>
				<li><a href="">收费标准</a></li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul>
				<h6>收费标准</h6>
				<li><a href="">平台功能简介</a></li>
				<li><a href="">平台使用流程</a></li>
				<li><a href="">收费标准</a></li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul>
				<h6>二维码</h6>
				<img src="/images/images.png" alt="">
			</ul>
		</div>

		<p class="text-center">© 2016 - 2018 白银金中琳自动化科技有限公司 陇ICP备-1000000</p>
	</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
