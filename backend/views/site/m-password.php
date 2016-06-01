<?php
/**
 * Created by Jasmine2.
 * FileName: m-password.php
 * Date: 2016-5-25
 * Time: 9:07
 */
use jasmine2\dwz\widgets\ActiveForm;
?>
<div class="pageContent">
	<?php $form = ActiveForm::begin(['options'=>['onsubmit' => 'return validateCallback(this,dialogAjaxDone)']]);?>
	<?= $form->field($model,'old_password')->passwordInput()?>
	<?= $form->field($model,'password')->passwordInput()?>
	<?= $form->field($model,'confirm_password')->passwordInput()?>
	<?php ActiveForm::end();?>
</div>
