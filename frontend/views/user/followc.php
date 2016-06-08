<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = "我关注的课程";
?>	
	<div class="content" style="background:#FFF;">
		<div class="container profile" style="background:#FFF;">
			<ol class="breadcrumb" style="background:#FFF;">
			  <li><a href="./">主页</a></li>
			  <li class="active" style="color:#fc6238;">个人中心</li>
			</ol>
			<div class="g-img-view">
				<div class="card card-default">
					<img src="http://www.yiichina.com/images/user-bg.jpg" alt="" width="100%" height="150px">
					<div class="user-img">
						<img src="http://tva1.sinaimg.cn/crop.0.0.438.438.180/6b3bb762jw1ewyeimjdztj20c80caab8.jpg" alt="" class="img-circle" width="100px" height="100px">
					</div>
					<p class="text-center user-name">Jasmine</p>
					<p class="text-center text-nowrap">(这个人很懒，什么都没有留下)</p>					
            	</div>
			</div>
			<hr>
			<div class="content container wowo-profile row" style="background:#FFF;">
				<div class="col-md-3">
					<div class="list-group" style="width:90%">
					  <a href="#" class="list-group-item active">个人中心</a>
					  <a href="#" class="list-group-item">我的直播</a>
					  <a href="#" class="list-group-item">我的视频</a>
					  <a href="#" class="list-group-item">我的问答</a>
					  <a href="#" class="list-group-item">我的作文</a>
					  <a href="#" class="list-group-item">我的作业</a>
					  <a href="#" class="list-group-item" style="background: #f0ad4e; color: #fff; border: 1px solid #f0ad4e;">我关注的课程</a>
					  <a href="#" class="list-group-item">我关注的老师</a>				
					  <a href="#" class="list-group-item">我要学习</a>
					  <a href="#" class="list-group-item">我的订单</a>					  
					  <a href="#" class="list-group-item">我要充值</a>
					</div>
				</div>				
               	<div class="col-md-9">
               		<div class="wowo-level-title"><strong style="font-size: 16px;">我关注的课程</strong><a href="#" class="pull-right">写作文</a></div>
               		<ol>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               			<li><a href="x">PS教程最新版</a><em class="pull-right">2016-06-07</em></li>
               		</ol>
               	</div>
               	<div class="wowo-tcdPageCode"></div>
			</div>
		</div>
	</div>
<?php
$this->registerJsFile("/statics/js/page.js",['depends' => 'yii\web\JqueryAsset']);
$js = <<<EOF
    $(".wowo-tcdPageCode").createPage({
        pageCount:10,
        current:1,
        backFn:function(p){
            console.log(p);
        }
    });
EOF;
$this->registerJs($js);
?>
