<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CmsPosts */

$this->title = $current_category?$current_category->name:"全部分类";
?>
<hr>
<div class="cms-posts-view container">

    <div class="col-md-3">
        <div class="list-group">
            <?php if($current_category):?>
                <a href="<?= \yii\helpers\Url::to(['posts/index','cate' => $current_category->id])?>" class="list-group-item active">
                    <?= $current_category->name?>
                </a>
            <?php endif;?>
            <?php foreach($category as $item):?>
                <a href="<?= \yii\helpers\Url::to(['posts/index','cate' => $item->id])?>" class="list-group-item <?= $cate == $item->id? "active":"";?>">
                    <?= $item->name?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-9">
        <ol class="breadcrumb">
            <li><a href="<?= \yii\helpers\Url::to(['posts/index', 'cate' => -1])?>">全部分类</a></li>
            <?php if($current_category): ?>
            <?php foreach($current_category->getBreadcrumb() as $item):?>
                <?php if($current_category->id != $item['id']): ?>
                <li><a href="<?= \yii\helpers\Url::to(['posts/index','cate'=>$item['id']])?>"><?= $item['name']?></a></li>
                <?php else: ?>
                <li class="active"><?= $item['name']?></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </ol>
        <!--<h1 class="post-title"><?/*= Html::encode($this->title) */?></h1>-->
        <div class="post-content" style="margin-top: 20px;">
            <ul>
                <?php foreach($model as $item): ?>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['posts/view','id' => $item->id])?>"><?= $item->title?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>
