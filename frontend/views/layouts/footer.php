<?php
/**
 * Created by Jasmine2.
 * FileName: footer.php
 * Date: 2016-6-5
 * Time: 21:41
 */
?>
<div class="container">
	<div class="col-md-3">
		<ul>
			<h6>使用帮助</h6>
			<li><a href="">平台功能简介</a></li>
			<li><a href="">平台使用流程</a></li>
			<li><a href="">收费标准</a></li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul>
			<h6>收费标准</h6>
			<li><a href="">平台功能简介</a></li>
			<li><a href="">平台使用流程</a></li>
			<li><a href="">收费标准</a></li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul>
			<h6>友情链接</h6>
			<?php $links = \frontend\models\Links::find()->orderBy(['created_at' => SORT_DESC])->limit(4)->all(); ?>
			<?php if($links):?>
				<?php foreach($links as $link):?>
					<li><a href="<?= $link->url?>" target="_blank"><?= $link->title ?></a></li>
				<?php endforeach;?>
			<?php endif;?>
		</ul>
	</div>
	<div class="col-md-3">
		<ul>
			<h6>二维码</h6>
			<img src="/images/images.png" alt="">
		</ul>
	</div>
	<p class="text-center">© 2016 - 2018 白银金中琳自动化科技有限公司 陇ICP备-1000000</p>
</div>
