<?php
/**
 * Created by Jasmine2.
 * FileName: OrderStatusForm.php
 * Date: 2016-6-2
 * Time: 11:25
 */

namespace backend\models\forms;


use backend\models\Orders;
use backend\models\OrderStatusLog;
use yii\base\Model;

class OrderStatusForm extends Model
{
	public $order_id;
	public $status;

	public function attributeLabels()
	{
		return [
			'order_id'  => '订单号',
			'status'  => '状态',
		];
	}

	public function rules()
	{
		return [
			[['order_id','status'],'required'],
			['status','in','range'  => array_keys(Orders::ORDER_STATUS_LABELS)]
		];
	}

	public function save(){
		$order = $this->order;
		if($order->status != $this->status){
			//订单状态跟当前不一样，更新
			$order->status = $this->status;
			if($order->save()){
				OrderStatusLog::log($this->order_id,$this->status);
				return true;
			} else {
				return false;
			}
		}
		return true;
	}

	public function getOrder(){
		return Orders::findOne($this->order_id);
	}
}