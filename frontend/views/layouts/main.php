<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
