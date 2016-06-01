<?php
/**
 * Created by Jasmine2.
 * FileName: currency.php
 * Date: 2016-6-1
 * Time: 17:53
 */
use jasmine2\dwz\widgets\ActiveForm;
?>
<div class="pageContent">
	<?php $form = ActiveForm::begin(['options'=>['onsubmit' => 'return validateCallback(this,dialogAjaxDone)']]);?>
	<p>
		<label>用户名：</label>
		<input readonly="readonly" type="text" size="30" value="<?= $teacher->username?>"/>
	</p>
	<p>
		<label>老师姓名：</label>
		<input readonly="readonly" type="text" size="30" value="<?= $teacher->realname?>"/>
	</p>
	<div class="divider"></div>
	<p>
		<label>当前积分：</label>
		<input readonly="readonly" type="text" size="30" value="<?= $teacher->integral?$teacher->integral->integral:0?>"/>
	</p>
	<?= $form->field($model,'integral')?>
	<div class="divider"></div>
	<p style="color: #ff0000;"> * 增加使用正数，减少使用负数</p>
	<?php ActiveForm::end();?>
</div>
