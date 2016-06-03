<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Teachers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-view" layoutH="0">

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
            'password_reset_token',
            'phone_number',
            'identity_number',
            'status0:raw',
            'isSchoolTeacher:raw',
            'teacher_certificate',
            'created_at:datetime',
            'updated_at:datetime',
            'institution.name',
        ],
    ]) ?>
    <h2 class="contentTitle">积分操作明细</h2>
    <div class="divider"></div>
    <?php $logs = new \yii\data\ArrayDataProvider([
        'allModels' => $model->integralLogs
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $logs,
        'showTools'     => false,
        'columns'       => [
            'created_at:datetime:时间',
            'integral:text:积分',
            'admin.username:text:操作员'
        ]
    ])?>
    <h2 class="contentTitle">关注学生</h2>
    <div class="divider"></div>
    <?php $attentionTeacher = new \yii\data\ArrayDataProvider([
        'allModels'     => $model->attentionTeachers
    ]); ?>
    <?= \jasmine2\dwz\grid\GridView::widget([
        'dataProvider'  => $attentionTeacher,
        'showTools'     => false,
        'columns'       => [
            'created_at:datetime:时间',
            'student.realname:text:姓名',
            'student.username:text:用户名',
        ]
    ])?>
</div>
