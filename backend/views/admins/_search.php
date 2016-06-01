<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
        <div class="searchBar">
            <?php $form = SearchForm::begin()?>

    <?= $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'realname') ?>

    <?php echo $form->field($model, 'status')->widget(\jasmine2\dwz\widgets\Combox::className(),[
        'items' => \backend\models\Admins::STATUS_LABELS
    ]) ?>

    <?php SearchForm::end(); ?>
            <div class="subBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
                </ul>
            </div>
        </div>
    </form>
</div>
