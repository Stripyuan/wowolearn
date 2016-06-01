<?php

/* @var $this yii\web\View */
use frontend\models\FocusMap;
use yii\helpers\Url;
$this->title = '蜗蜗在线教育';
?>
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
<!-- 焦点图开始 -->
<div class="container-fluid focus-map">
    <div id="focus-map" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $focus_map = FocusMap::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->asArray()->all();
            ?>
            <?php for($i = 0;$i < count($focus_map);$i++):?>
            <li data-target="#focus-map" data-slide-to="<?= $i?>" class="<?= $i == 0?"active":""?>"></li>
            <?php endfor;?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php for($i=0;$i<count($focus_map);$i++):?>
            <div class="item <?= $i == 0?"active":""?>">
                <a href="<?= $focus_map[$i]['to_url']?>">
                <img src="<?= \yii\helpers\Url::to(['/media','name' => $focus_map[$i]['img_url']])?>" alt="<?= $focus_map[$i]['title']?>">
                <div class="carousel-caption wowo-caption">
                    <?= $focus_map[$i]['title']?>
                </div>
                </a>
            </div>
            <?php endfor;?>
        </div>
    </div>
</div>
<!-- 导航开始 -->
<div class="container-fluid navigate">
    <div class="container">
        <ul>
            <li><span>蜗蜗在线</span></li>
            <li class="active"><a href="">首页</a></li>
            <li><a href="homework.html">作业直播</a></li>
            <li><a href="">文化直播</a></li>
            <li><a href="">艺术直播</a></li>
            <!--<li><a href="">名师在线</a></li>-->
            <li><a href="">教案文档</a></li>
        </ul>
    </div>
</div>