<?php
/**
 * Created by Jasmine2.
 * FileName: index.php
 * Date: 2016-6-2
 * Time: 17:50
 */
use jasmine2\dwz\grid\GridView;
use jasmine2\dwz\DwzAsset;
?>
<div class="online-income">
	<?php
	$data = $dataProvider->getModels();
	$axisxstep = $dataProvider->getCount()==0?1:$dataProvider->getCount() - 1;
	$chart_x = "[";
	$chart_y = "[";
	$axisxstepLabel = "[";
	for($i = $axisxstep;$i>=0;$i--){
		$chart_x .= $data[$i]->date_time . ",";
		$chart_y .= $data[$i]->income . ",";
		$axisxstepLabel .= ($axisxstep - $i) . ",";
	}
	$chart_x = substr($chart_x,0,-1)."]";
	$chart_y = substr($chart_y,0,-1)."]";
	$axisxstepLabel = substr($axisxstepLabel,0,-1)."]";
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
	axisxstep: '.$axisxstep.' ,
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
		60, // X start in pixels
		0, // Y start in pixels
		930, // Width of chart in pixels
		400, // Height of chart in pixels
		'.$axisxstepLabel.',
		'.$chart_y.',
		options // opts object
	).hoverColumn(function () {
        this.tags = r.set();

        for (var i = 0, ii = this.y.length; i < ii; i++) {
            this.tags.push(r.tag(this.x, this.y[i], this.values[i]+"元", 30, 10).insertBefore(this).attr([{ fill: "#fff" }, { fill: this.symbols[i].attr("fill") }]));
        }
    }, function () {
        this.tags && this.tags.remove();
    });
});
</script>
<h2 style="text-align:center;" class="contentTitle">近30天收入增长曲线图<small>单位(元)</small></h2>
<div id="dayChart" style="width: 100%;height: 520px;"></div>'
			]
		]
	])?>

</div>
