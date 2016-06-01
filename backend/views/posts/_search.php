<?php
/**
 * Created by Jasmine2.
 * FileName: _search.php
 * Date: 2016-5-28
 * Time: 8:05
 */
use jasmine2\dwz\widgets\SearchForm;
use jasmine2\dwz\helpers\ArrayHelper;
?>
<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
		<div class="searchBar">
			<?php $form = SearchForm::begin()?>

			<?= $form->field($model, 'title') ?>

			<?= $form->field($model,'category_id')->widget(\jasmine2\dwz\widgets\Combox::className(),[
				'items' => ArrayHelper::map(\backend\models\CmsCategory::find()->all(),'id','name')
			]) ?>

			<?php SearchForm::end(); ?>
			<div class="subBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
				</ul>
			</div>
		</div>
	</form>
</div>
