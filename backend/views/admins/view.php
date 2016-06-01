<?php

use yii\helpers\Html;
use jasmine2\dwz\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Admins */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admins-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'password_hash',
            'auth_key',
            'password_reset_token',
            'email:email',
            'phone_number',
            'status0:raw',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
