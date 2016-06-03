<?php
/**
 * Created by Jasmine2.
 * FileName: update-status.php
 * Date: 2016-6-2
 * Time: 11:32
 */
use jasmine2\dwz\widgets\ActiveForm;
?>
<div class="pageContent">
	<?php $form = ActiveForm::begin(['options'=>['onsubmit' => 'return validateCallback(this,dialogAjaxDone)']]);?>
	<p class="">
		<label class="">订单号</label>
		<input type="text" class="textInput" value="<?= $model->order->order_id?>" readonly>
	</p>
	<p class="">
		<label class="">课程名称</label>
		<input type="text" class="textInput" value="<?= $model->order->class->class_name?>" readonly>
	</p>
	<p class="">
		<label class="">用户姓名</label>
		<input type="text" class="textInput" value="<?= $model->order->user->realname?>" readonly>
	</p>
	<?= $form->field($model,'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
		'promptShow'    => false,
		'items'         => \backend\models\Orders::ORDER_STATUS_LABELS
	])?>
	<?php ActiveForm::end();?>
</div>