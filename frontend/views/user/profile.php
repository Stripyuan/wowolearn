<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = "个人中心";
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
					  <a href="#" class="list-group-item" style="background: #f0ad4e; color: #fff; border: 1px solid #f0ad4e;">我的作业</a>
					  <a href="#" class="list-group-item">我关注的课程</a>
					  <a href="#" class="list-group-item">我关注的老师</a>				
					  <a href="#" class="list-group-item">我要学习</a>
					  <a href="#" class="list-group-item">我的订单</a>					  
					  <a href="#" class="list-group-item">我要充值</a>
					</div>
				</div>
				<div class="col-md-9">
					<div class="no-data register" style="padding:0;">
						<p class="wowo-xinxi" style="margin-bottom: 0px;">请完善您的信息</p>
						<p>昵　　称：<input type="text" placeholder="用户名"></p>
						<p>真实姓名：<input type="text" placeholder="真实姓名"><span> 请输入真实姓名</span></p>
						<p>身 份 证 ：<input type="text" placeholder="身份证"><span> 请输入您的身份证</span></p>
						<p style="height: 90px;">头　　像：<input type="file" style="width: 80px;display: inline">
							<span style="margin-left: 30px;">头像预览：</span><img src="/images/images.png"></p>
						<p>Q Q　号：<input type="text" placeholder="QQ号"><span> 请输入您的QQ号</span></p>
						<p>微 信 号 ：<input type="text" placeholder="微信"><span> 请输入您的微信</span></p>
					</div>
					<div class="wowo-user-inf" style="display: none;">
						<p>您的信息<span class="pull-right"><a href="">编辑</a></span></p>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<th>用 户 名 ：</th>
								<td>测试用户</td>
							</tr>
							<tr>
								<th>真实姓名：</th>
								<td>测试用户</td>
							</tr>
							<tr>
								<th>身份证号：</th>
								<td>620421199012250607</td>
							</tr>
							<tr>
								<th>Q Q　号：</th>
								<td>123456789</td>
							</tr>
							<tr>
								<th>微 信 号 ：</th>
								<td>ceshi123</td>
							</tr>
							<tr>
								<th>头 像 图 ：</th>
								<td><img src="/images/images.png"></td>
							</tr>
							<tr>
								<th>金　　币：</th>
								<td>123个</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>