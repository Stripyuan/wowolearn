<?php
/**
 * Created by Jasmine2.
 * FileName: index.php
 * Date: 2016-6-2
 * Time: 17:50
 */
use jasmine2\dwz\grid\GridView;
use jasmine2\dwz\DwzAsset;
$baseUrl = \Yii::$app->assetManager->getBundle(DwzAsset::className())->baseUrl;
?>
<div class="online-income">
	<script type="text/javascript" src="<?= $baseUrl ?>/chart/raphael.js"></script>
	<script type="text/javascript" src="<?= $baseUrl ?>/chart/g.raphael.js"></script>
	<script type="text/javascript" src="<?= $baseUrl ?>/chart/g.line.js"></script>
	<?php
	$data = $dataProvider->getModels();
	$chart_x = "[";
	$chart_y = "[";
	for($i = 29;$i>=0;$i--){
		$chart_x .= $data[$i]->date_time . ",";
		$chart_y .= $data[$i]->income/10000 . ",";
	}
	$chart_x = substr($chart_x,0,-1)."]";
	$chart_y = substr($chart_y,0,-1)."]";
	?>
	<?= \jasmine2\dwz\Tabs::widget([
		'items' => [
			[
				'title' => '收入明细 ',
				'content' => GridView::widget([
					'dataProvider'  => $dataProvider,
					'showTools'     => false,
					'layoutH'   => 60,
					'columns'       => [
						'date_time:text:日期',
						'income:currency:收入'
					]
				])
			],
			[
				'title' => '增长曲线图',
				'content'   => '
<script type="text/javascript">
var options = {
	axis: "0 0 1 1",
	axisxstep: 29 ,
	axisxlables: '.$chart_x.',
	shade:true,
	smooth:false,
	symbol:"circle",
	colors:["blue"]
};

$(function () {

	// Make the raphael object
	var r = Raphael("dayChart");

	var lines = r.linechart(
		0, // X start in pixels
		0, // Y start in pixels
		930, // Width of chart in pixels
		400, // Height of chart in pixels
		[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29],
		'.$chart_y.',
		options // opts object
	).hoverColumn(function () {
        this.tags = r.set();

        for (var i = 0, ii = this.y.length; i < ii; i++) {
            this.tags.push(r.tag(this.x, this.y[i], this.values[i]+"万元", 30, 10).insertBefore(this).attr([{ fill: "#fff" }, { fill: this.symbols[i].attr("fill") }]));
        }
    }, function () {
        this.tags && this.tags.remove();
    });
});
</script>
<h2 style="text-align:center;" class="contentTitle">近30天收入增长曲线图<small>单位(万元)</small></h2>
<div id="dayChart" style="width: 100%;height: 520px;"></div>'
			]
		]
	])?>

</div>
