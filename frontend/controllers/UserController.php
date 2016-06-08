<?php

namespace frontend\controllers;

class UserController extends \yii\web\Controller
{
    public function actionProfile()
    {
        return $this->render('profile');
    }
    public function actionSeeding(){
    	return $this->render('seeding');
    }
    public function actionVideo(){
    	return $this->render('video');
    }
    public function actionAnswer(){
    	return $this->render('answer');
    }
    public function actionComposition(){
    	return $this->render('composition');
    }
    public function actionTask(){
    	return $this->render('task');
    }
    public function actionFollowc(){
        return $this->render('followc');
    }
}
