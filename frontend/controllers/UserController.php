<?php

namespace frontend\controllers;

class UserController extends \yii\web\Controller
{
    public function actionProfile()
    {
        return $this->render('profile');
    }

}
