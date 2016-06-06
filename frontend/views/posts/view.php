<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsPosts */

$this->title = $model->title;
?>
<hr>
<?php if(!Yii::$app->request->isAjax): ?>
<div class="cms-posts-view container">
    <div class="col-md-3">
        <div class="list-group">
            <?php foreach($category as $item):?>
            <a href="<?= \yii\helpers\Url::to(['posts/index','cate' => $item->id])?>" class="list-group-item <?= $model->category_id == $item->id? "active":"";?>">
                <?= $item->name?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-9">
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['posts/index', 'cate' => -1])?>">全部分类</a></li>
            <?php if($model->category): ?>
                <?php foreach($model->category->getBreadcrumb() as $item):?>
                    <?php if($model->category->id != $item['id']): ?>
                        <li><a href="<?= \yii\helpers\Url::to(['posts/index','cate'=>$item['id']])?>"><?= $item['name']?></a></li>
                    <?php else: ?>
                        <li class="active"><?= $item['name']?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ol>
        <h1 class="post-title"><?= Html::encode($this->title) ?></h1>
        <?php if($model->summary):?>
        <div class="post-summary">
            <p><?= $model->summary ?></p>
        </div>
        <?php endif;?>
        <div class="post-content">
            <?= $model->content ?>
        </div>
        <hr>
        <div class="row" style="padding: 0 15px;margin-bottom: 15px;">
            <label class="label label-success">分类：<?= $model->category->name?></label>
            <label class="label label-info">浏览次数：<?= $model->view_times?></label>
            <label class="label label-primary"><i>更新于：<?= Yii::$app->formatter->asDatetime($model->updated_at)?></i></label>
        </div>
    </div>

</div>
<?php else: ?>
    <h1 class="post-title"><?= Html::encode($this->title) ?></h1>
    <?php if($model->summary):?>
        <div class="post-summary">
            <p><?= $model->summary ?></p>
        </div>
    <?php endif;?>
    <div class="post-content">
        <?= $model->content ?>
    </div>
    <hr>
    <div class="row" style="padding: 0 15px;margin-bottom: 15px;">
        <label class="label label-success">分类：<?= $model->category->name?></label>
        <label class="label label-info">浏览次数：<?= $model->view_times?></label>
        <label class="label label-primary"><i>更新于：<?= Yii::$app->formatter->asDatetime($model->updated_at)?></i></label>
    </div>

<?php endif; ?>