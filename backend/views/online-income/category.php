<?php
/**
 * Created by Jasmine2.
 * FileName: category.php
 * Date: 2016-6-2
 * Time: 23:04
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
	$chart_x1 = "[";
	$chart_x2 = "[";
	$chart_x3 = "[";
	$chart_y1 = "[";
	$chart_y2 = "[";
	$chart_y3 = "[";
	for($i = 89;$i>=0;$i--){
		if($data[$i]->type == 1){
			$chart_x1 .= $data[$i]->date_time . ",";
			$chart_y1 .= $data[$i]->income/10000 . ",";
		} elseif($data[$i]->type == 2){
			$chart_x2 .= $data[$i]->date_time . ",";
			$chart_y2 .= $data[$i]->income/10000 . ",";
		} elseif($data[$i]->type == 3){
			$chart_x3 .= $data[$i]->date_time . ",";
			$chart_y3 .= $data[$i]->income/10000 . ",";
		}
	}
	$chart_x1 = substr($chart_x1,0,-1)."]";
	$chart_y1 = substr($chart_y1,0,-1)."]";
	$chart_x2 = substr($chart_x2,0,-1)."]";
	$chart_y2 = substr($chart_y2,0,-1)."]";
	$chart_x3 = substr($chart_x3,0,-1)."]";
	$chart_y3 = substr($chart_y3,0,-1)."]";
	$chart_x  = "[$chart_x1,$chart_x2,$chart_x3]";
	$chart_y  = "[$chart_y1,$chart_y2,$chart_y3]";
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
						'type0:text:课程类型',
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
	axisxlables: '.$chart_x1.',
	shade:true,
	smooth:false,
	symbol:"circle",
	color:["red","blue","green"]
};

$(function () {

	// Make the raphael object
	var r = Raphael("categroyChart");

	var lines = r.linechart(
		25, // X start in pixels
		20, // Y start in pixels
		930, // Width of chart in pixels
		400, // Height of chart in pixels
		[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29],
		'.$chart_y.',
		options // opts object
	).hoverColumn(function () {
        this.tags = r.set();

        for (var i = 0, ii = this.y.length; i < ii; i++) {
            this.tags.push(r.tag(this.x, this.y[i], this.values[i]+"万元", 0, 10).insertBefore(this).attr([{ fill: "#fff" }, { fill: this.symbols[i].attr("fill") }]));
        }
    }, function () {
        this.tags && this.tags.remove();
    });
});
</script>
<h2 style="text-align:center;" class="contentTitle">近30天收入增长曲线图<small>单位(万元)</small></h2>
<div style="padding-left:750px;">
<span style="padding-left:150px;width:50px;height:15px;display:block;background: rgb(47, 105, 191)">作业直播</span>
<span style="padding-left:150px;width:50px;height:15px;display:block;background:rgb(191, 90, 47)">艺术直播</span>
<span style="padding-left:150px;width:50px;height:15px;display:block;background:rgb(162, 191, 47)">文化直播</span>
</div>
<div id="categroyChart" style="width: 100%;height: 520px;"></div>'
			]
		]
	])?>

</div>