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
		<label>学生用户名：</label>
		<input readonly="readonly" type="text" size="30" value="<?= $student->username?>"/>
	</p>
	<p>
		<label>学生姓名：</label>
		<input readonly="readonly" type="text" size="30" value="<?= $student->realname?>"/>
	</p>
	<div class="divider"></div>
	<p>
		<label>当前虚拟币：</label>
		<input readonly="readonly" type="text" size="30" value="<?= $student->virtualCurrency?$student->virtualCurrency->currency:0?>"/>
	</p>
	<?= $form->field($model,'plus')?>
	<div class="divider"></div>
	<p style="color: #ff0000;"> * 增加使用正数，减少使用负数</p>
	<?php ActiveForm::end();?>
</div>
