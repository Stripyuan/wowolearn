<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index pageContent">
    <h2 class="contentTitle">直播收入</h2>
    <?php
    $axisxstep = count($data) -1;
    $chart_x = "[";
    $chart_y = "[";
    $axisxstepLabel = "[";

    for($i = $axisxstep;$i>=0;$i--){
        $chart_x .= $data[$i]['date_time'] . ",";
        $chart_y .= $data[$i]['income'] . ",";
        $axisxstepLabel .= ($axisxstep - $i) . ",";
    }
    $chart_x = substr($chart_x,0,-1)."]";
    $chart_y = substr($chart_y,0,-1)."]";
    $axisxstepLabel = substr($axisxstepLabel,0,-1)."]";
    ?>
    <script type="text/javascript">
        var options = {
            axis: "0 0 1 1",
            axisxstep: <?= $axisxstep ?>,
            axisxlables: <?= $chart_x ?>,
            shade:true,
            smooth:false,
            symbol:"circle",
            colors:["#855"]
        };

        $(function () {

            // Make the raphael object
            var r = Raphael("onlineClass");

            var lines = r.linechart(
                60, // X start in pixels
                0, // Y start in pixels
                920, // Width of chart in pixels
                200, // Height of chart in pixels
                <?= $axisxstepLabel ?>,
                <?= $chart_y ?>,
                options // opts object
            ).hoverColumn(function () {
                this.tags = r.set();

                for (var i = 0, ii = this.y.length; i < ii; i++) {
                    this.tags.push(r.tag(this.x, this.y[i], this.values[i]+"元", 180, 10).insertBefore(this).attr([{ fill: "#fff" }, { fill: this.symbols[i].attr("fill") }]));
                }
            }, function () {
                this.tags && this.tags.remove();
            });
        });
    </script>
    <div id="onlineClass" style="width: 1000px;height: 220px;"></div>

    <h2 class="contentTitle">视频收入</h2>
    <div id="video" style="width: 1000px;height: 200px;"></div>
    <h2 class="contentTitle">商城收入</h2>
    <div id="jfd" style="width: 1000px;height: 200px;">
    </div>
</div>
