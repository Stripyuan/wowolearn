<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%order_status_log}}".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $status
 * @property integer $created_at
 * @property string $admin
 */
class OrderStatusLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_status_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'created_at'], 'integer'],
            [['status', 'admin'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单号',
            'status' => '状态',
            'created_at' => '修改时间',
            'admin' => '操作员',
        ];
    }

    public function getStatus0(){
        return Orders::ORDER_STATUS_LABELS[$this->status];
    }
    public function getOrder(){
        return $this->hasOne(Orders::className(),['id' => 'order_id']);
    }

    public static function log($order_id,$status,$admin = false){
        $log = new self;
        $log->order_id  = $order_id;
        $log->status    = (string)$status;
        $log->created_at= time();
        $log->admin     = $admin ? $admin:Yii::$app->user->identity->realname;
        return $log->save();
    }
}
