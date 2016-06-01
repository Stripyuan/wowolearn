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


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
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

</div>
