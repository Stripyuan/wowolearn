<?php
/**
 * Created by Jasmine2.
 * FileName: ShortMessageController.php
 * Date: 2016-6-6
 * Time: 10:32
 */

namespace frontend\controllers;


use yii\web\Controller;
use yii\web\Response;
use Yii;
use yii\filters\VerbFilter;
class ShortMessageController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions'   => [
					'index' => ['ajax','post']
				]
			]
		];
	}

	public function actionIndex(){
		Yii::$app->response->format = Response::FORMAT_JSON;
		$phone_number = Yii::$app->request->post('phone_number');

		if(!$phone_number){
			return [
				'error'     => '001'
			];
		}

		if(Yii::$app->cache->get($phone_number)){
			return [
				'error'     => '002'
			];
		}

		if($code = $this->generateCode($phone_number)){
			// 调用发送短信的接口
			if(Yii::$app->shortMessage->send($phone_number,$code)){
				return [
					'error'     => '000',
					'phone'     => $phone_number
				];
			} else {
				return [
					'error'     => '003',
				];
			}
		}
	}

	private function generateCode($phone){
		$code = random_int(100000,999999);
		Yii::$app->cache->set($phone,$code,600);
		return $code;
	}
}