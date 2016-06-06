<?php
/**
 * Created by Jasmine2.
 * FileName: _search.php
 * Date: 2016-5-24
 * Time: 20:40
 */
use jasmine2\dwz\widgets\SearchForm;
?>
<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
		<div class="searchBar">
			<?php $form = SearchForm::begin()?>
			<?= $form->field($model,'username') ?>
			<?= $form->field($model,'realname') ?>
			<?= $form->field($model,'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
				'items' => \backend\models\Users::STATUS_LABELS
			]) ?>
			<?php SearchForm::end()?>
			<div class="subBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
				</ul>
			</div>
		</div>
	</form>
</div>
