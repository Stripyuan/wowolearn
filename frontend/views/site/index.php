<?php

/* @var $this yii\web\View */
use frontend\models\FocusMap;
use yii\helpers\Url;
$this->title = '蜗蜗在线教育';
?>

<!-- 焦点图 -->
<div class="container-fluid focus-map">
    <div id="focus-map" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators wowo-dian">
            <?php
            $focus_map = FocusMap::find()->orderBy(['updated_at' => SORT_DESC])->limit(5)->asArray()->all();
            ?>
            <?php for($i = 0;$i < count($focus_map);$i++):?>
                <li data-target="#focus-map" data-slide-to="<?= $i?>" class="<?= $i == 0?"active":""?>"></li>
            <?php endfor;?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php for($i=0;$i<count($focus_map);$i++):?>
                <div class="item <?= $i == 0?"active":""?>">
                    <a href="<?= $focus_map[$i]['to_url']?>">
                        <img src="<?= \yii\helpers\Url::to(['/media','name' => $focus_map[$i]['img_url']])?>" alt="<?= $focus_map[$i]['title']?>">
                        <div class="carousel-caption wowolearn-caption">
                            <?= $focus_map[$i]['title']?>
                        </div>
                    </a>
                </div>
            <?php endfor;?>
        </div>
    </div>
</div>
<!-- 内容开始 -->
<div style="height:50px;background:#f1f1f1"></div>
<div class="content">
    <div class="container">
        <div class="class-list">
            <a href="" class="title">作业直播</a>
            <a href="" class="pull-right wowo-more">更多</a>
            <div class="hr"></div>
            <?php foreach ($homework as $item):?>
            <div class="col-md-3 list-item">
                <div class="class-img">
                    <a href="<?= Url::to(['class/view','id' => $item['class_code']]);?>" target="_blank"><img src="<?= $item['class_img']?>" alt="" class="img-responsive"></a>
                </div>
                <div class="class-words">
                    <h5>
                        <a href="<?= Url::to(['class/view','id' => $item['class_code']]);?>" target="_blank"><?= $item['class_name']?></a>
                    </h5>
                    <p>直播时间<em><?= Yii::$app->formatter->asDatetime($item['online_time'])?></em><span>|</span>共<i><?= $item['in_times']?></i>人报名</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="class-list">
            <a href="" class="title">文化直播</a>
            <a href="" class="pull-right wowo-more">更多</a>
            <div class="hr"></div>
            <?php foreach ($cultures as $item):?>
                <div class="col-md-3 list-item">
                    <div class="class-img">
                        <a href="<?= Url::to(['class/view','id' => $item['class_code']]);?>" target="_blank"><img src="<?= $item['class_img']?>" alt="" class="img-responsive"></a>
                    </div>
                    <div class="class-words">
                        <h5>
                            <a href="<?= Url::to(['class/view','id' => $item['class_code']]);?>" target="_blank"><?= $item['class_name']?></a>
                        </h5>
                        <p>直播时间<em><?= Yii::$app->formatter->asDatetime($item['online_time'])?></em><span>|</span>共<i><?= $item['in_times']?></i>人报名</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="class-list">
            <a href="" class="title">艺术直播</a>
            <a href="" class="pull-right wowo-more">更多</a>
            <div class="hr"></div>
            <?php foreach ($arts as $item):?>
                <div class="col-md-3 list-item">
                    <div class="class-img">
                        <a href="<?= Url::to(['class/view','id' => $item['class_code']]);?>" target="_blank"><img src="<?= $item['class_img']?>" alt="" class="img-responsive"></a>
                    </div>
                    <div class="class-words">
                        <h5>
                            <a href="<?= Url::to(['class/view','id' => $item['class_code']]);?>" target="_blank"><?= $item['class_name']?></a>
                        </h5>
                        <p>直播时间<em><?= Yii::$app->formatter->asDatetime($item['online_time'])?></em><span>|</span>共<i><?= $item['in_times']?></i>人报名</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="headline">
            <h2>更多课程，更多科目</h2>
            <p>选择一门课程开始学习，相信只是可以改变命运</p>
        </div>
        <div class="items">
            <ul class="clearfix">
                <li class="item-1">
                    <a href="xxx" target="_black">
                        <h3>作业直播</h3>
                        <i class="icon">
                        </i>
                    </a>
                </li>
                <li class="item-2">
                    <a href="xxx" target="_black">
                        <h3>文化直播</h3>
                        <i class="icon">
                        </i>
                    </a>
                </li>
                <li class="item-3">
                    <a href="xxx" target="_black">
                        <h3>艺术直播</h3>
                        <i class="icon">
                        </i>
                    </a>
                </li>
                <li class="item-4">
                    <a href="xxx" target="_black">
                        <h3>教案文档</h3>
                        <i class="icon">
                        </i>
                    </a>
                </li>
                <li class="item-5">
                    <a href="xxx" target="_black">
                        <h3>视频中心</h3>
                        <i class="icon">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt50 text-center">
            <a href="xx" class="btn btn-sty btn-lg">全部课程</a>
        </div>
    </div>
    <!-- 实时互动直播 -->
    <div class="telecast">
        <div class="container container-max">
            <div class="headline">
                <h2>7x12小时实时互动直播</h2>
                <p>真实而有趣的用户体验，让学习变得愉悦，更加高效</p>
            </div>
            <div class="items">
                <div class="pic">
                    <img src="/images/telecast.jpg" alt="7×12小时实时互动直播" width="650px">
                </div>
                <div class="cont pull-right">
                    <h3>真实体验感</h3>
                    <p>我们倡导老师真人出镜教学，<br>给您一种身临真实课堂的极致体验，让学习不再孤单。</p>
                    <h3>寓教于乐</h3>
                    <p>我们把教学寄予在乐趣里，<br>让您在轻松愉快的学习氛围中快速掌握知识，提升专业能力。</p>
                    <h3>短而快</h3>
                    <p>我们的课堂从来不会废话连篇，<br>每堂课一个小时的直播，我们尽可能让您学到更多。</p><br>
                    <a href="xx" target="_blank" class="btn btn-sty btn-lg">直播试听</a>
                </div>
            </div>
        </div>
    </div>