<?php
/**
 * Created by Jasmine2.
 * FileName: OnlineIncomeController.php
 * Date: 2016-6-2
 * Time: 17:09
 */

namespace backend\controllers;


use jasmine2\dwz\Controller;
use backend\models\Income;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class OnlineIncomeController extends Controller
{
	public function actionIndex(){
		\Yii::$app->response->format = Response::FORMAT_HTML;
		$dataProvider = new ActiveDataProvider([
			'query' => Income::find()->select('sum(income) as income,date_time')->groupBy('date_time')->orderBy(['date_time' => SORT_DESC]),
			'pagination' => [
                'pageSize' => 30,
            ],
		]);
		return $this->render('index',[
			'dataProvider'  => $dataProvider,
		]);
	}

	public function actionCategory(){
		\Yii::$app->response->format = Response::FORMAT_HTML;
		$dataProvider = new ActiveDataProvider([
			'query' => Income::find()->orderBy(['date_time' => SORT_DESC]),
			'pagination' => [
				'pageSize' => 90,
			],
		]);
		return $this->render('category',[
			'dataProvider'  => $dataProvider,
		]);
	}
}