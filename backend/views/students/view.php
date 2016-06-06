<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Students */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view" layoutH="0">
    <h2 class="contentTitle"><?= $model->realname?></h2>
    <?= DetailView::widget([
        'model' => $model,
        'columns'   => 2,
        'attributes' => [
            'id',
            'username',
            'realname',
            'password_hash',
            'auth_key',
            'virtualCurrency.currency',
            'password_reset_token',
            'email:email',
            'phone_number',
            'identity_number',
            'status0:raw',
            'qq',
            'wechat',
            'created_at:datetime',
            'updated_at:datetime',
            'logo',
        ],
    ]) ?>
    <h2 class="contentTitle">虚拟币操作明细</h2>
    <div class="divider"></div>
    <?php $logs = new \yii\data\ArrayDataProvider([
        'allModels' => $model->virtualCurrencyLogs
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $logs,
        'layoutH'       => 300,
        'showTools'     => false,
        'columns'       => [
            'created_at:datetime:时间',
            'currency:text:虚拟币',
            'admin.username:text:操作员'
        ]
    ])?>
    <h2 class="contentTitle">关注的课程</h2>
    <div class="divider"></div>
    <?php $class = new \yii\data\ArrayDataProvider([
        'allModels' => $model->attentionClasses
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $class,
        'layoutH'       => 300,
        'showTools'     => false,
        'columns'       => [
            'class.class_code:text:课程代码',
            'class.class_name:text:课程名称',
            'class.teacher.realname:text:主讲老师',
            'class.classCategoryLabels:text:课程年级',
            'class.classSubjectLabels:text:课程学科',
            'class.online_time:datetime:直播时间',
            'created_at:datetime:时间',
        ]
    ])?>
    <h2 class="contentTitle">关注的老师</h2>
    <div class="divider"></div>
    <?php $teachers = new \yii\data\ArrayDataProvider([
        'allModels' => $model->attentionStudents
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $teachers,
        'layoutH'       => 300,
        'showTools'     => false,
        'columns'       => [
            'teacher.username:text:用户名',
            'teacher.realname:text:老师姓名',
            'created_at:datetime:关注时间',
        ]
    ])?>
</div>
