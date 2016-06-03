<?php
/**
 * Created by Jasmine2.
 * FileName: OnlineIncomeController.php
 * Date: 2016-6-2
 * Time: 17:09
 */

namespace backend\controllers;

use backend\models\Orders;
use Yii;
use jasmine2\dwz\Controller;
use backend\models\Income;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class OnlineIncomeController extends Controller
{
	public function init()
	{
		$this->sumIncome();
		parent::init();
	}

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

	private function sumIncome(){
		$date = date('Ymd',strtotime("-1 day"));
		if(!Income::find()->where(['date_time' => $date])->all()){
			// 没查到，计算
			$begin = strtotime($date . " 00:00:00");
			$data = Orders::find()->select('online_class.class_type,sum(orders.total_fee) as income')->where(['orders.status' => 2])->andWhere(['between','orders.created_at',$begin,$begin+86400])->leftJoin('online_class','orders.class_id=online_class.id')->groupBy(['online_class.class_type'])->asArray()->all();
			$_data = [];
			foreach($data as $item){
				$_data[] = array_merge([$date],array_values($item));
			}

			Yii::$app->db->createCommand()->batchInsert('income',['date_time','type','income'],$_data)->execute();
		}
	}

}