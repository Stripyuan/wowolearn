<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = $model->class_name;
?>
<div class="content" style="background:#FFF;">
    <div class="container class-detail" style="background:#FFF;">
        <ol class="breadcrumb" style="background:#FFF;">
            <li><a href="/">主页</a></li>
            <li><a href="homework.html">作业直播</a></li>
            <li class="active" style="color:#ff7500;"><?= $model->class_name?></li>
        </ol>
        <div class="row class-header">
            <div class="col-md-5">
                <img src="<?= $model->class_img?>" alt="<?= $model->class_name?>">
            </div>
            <div class="col-md-6">
                <h5 class="text-overflow"><?= $model->class_name?></h5>
                <ul class="summary">
                    <li class="price">
                        <h6>价　　格</h6>
							<span class="price">
								<em>¥</em>
								<?= $model->price_now?>
							</span>
                            <span class="price-old" style="margin-left: 10px;font-size: 12px;line-height: 60px;text-decoration: line-through;">
								¥
								<?= $model->price?>
							</span>
                    </li>
                    <li class="clearfix"></li>
                    <li>
                        <h6>课程代码</h6>
                        <span style="height: 33px;line-height: 33px;">
                            <?= $model->class_code ?>
                        </span>
                    </li>
                    <li class="clearfix"></li>
                    <li>
                        <h6>课程直播时间</h6>
							<span style="height: 33px;line-height: 33px;">
								<?= Yii::$app->formatter->asDatetime($model->online_time)?>
							</span>
                    </li>
                    <li class="clearfix"></li>
                    <li>
                        <h6>课　　时</h6>
							<span style="height: 33px;line-height: 33px;">
								<?= $model->class_time?>
							</span>
                    </li>
                    <li class="clearfix"></li>
                    <li>
                        <h6>已报名人数</h6>
							<span style="height: 33px;line-height: 33px;">
							<?= $model->in_times ?>
							</span>
                    </li>
                    <li class="clearfix"></li>
                    <li class="summary">
                        <h6>课程简介</h6>
                        <p class="text-overflow" style="height: 68px;line-height: 16px;"><?= $model->class_summary ?></p>
                    </li>
                </ul>
                <a href="login.html" class="btn btn-danger">立即报名</a>
                <a href="online.html" class="btn btn-warning">进入直播间</a>
                <a class="pull-right" href="<?= Url::to(['class/like','id' => $model->class_code])?>"><span class="glyphicon glyphicon-heart "></span>关注</a>
            </div>

        </div>
        <div class="class-content" style="border:2px solid #f1f1f1;margin-top:20px;">
            <div class="col-md-9" style="border-right:2px solid #f1f1f1">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" href="#jianjie" role="tab" data-toggle="tab">课程简介</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#qita" role="tab" data-toggle="tab">章节信息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wenda" role="tab" data-toggle="tab">在线问答</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="jianjie">
                    <?= $model->content ?>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="qita">
                        <div class="clearfix"></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>章节</th>
                                    <th>直播时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach($model->chapters as $item):?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <td><?= $item->chapter_name?></td>
                                        <td><?= $item->online_time?></td>
                                    </tr>
                                <?php
                                $i++;
                                endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div id="wenda">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="teacher" align="center" style="margin-top: 20px;">
                    <!-- 导航到教师的公共个人中心 -->
                    <a href="" class="teacher-avatar">
                        <?php if($model->teacher->logo):?>
                            <img class="img-circle" src="<?= $model->teacher->logo?>" alt="" width="140px" height="auto" style="margin-left: auto;margin-right: auto;">
                        <?php else:?>
                        <img class="img-circle" src="/statics/avatars/unknown.png" alt="" width="140px" height="auto" style="margin-left: auto;margin-right: auto;">
                        <?php endif;?>
                    </a>
                    <h3 class="text-center"><?= $model->teacher->realname?></h3>
                    <p class="text-muted"><?= $model->teacher->introduction?></p>
                </div>
            </div>
        </div>
    </div>
</div>