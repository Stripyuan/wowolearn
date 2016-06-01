<?php
/**
 * Created by Jasmine2.
 * FileName: view.php
 * Date: 2016-5-29
 * Time: 12:15
 */
use jasmine2\dwz\widgets\DetailView;
?>
<div class="focus-map-view" layoutH="0">
	<?= DetailView::widget([
		'model' => $model,
		'columns'   => 2,
		'attributes' => [
			'title',
			'img_url',
			'created_at:datetime',
			'updated_at:datetime',
		]
	])?>
	<div class="img">
		<img src="<?= \yii\helpers\Url::to(['focus-map/get-img','name' => $model->img_url])?>" alt="">
	</div>
</div>
