<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use jasmine2\dwz\helpers\Html;
/**
 * This is the model class for table "{{%orders}}".
 *
 * @property integer $id
 * @property string $order_id
 * @property integer $class_id
 * @property string $user_id
 * @property integer $count
 * @property string $total_fee
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    const ORDER_STATUS_CREATE   = 1;
    const ORDER_STATUS_DONE     = 2;
    const ORDER_STATUS_COLOSE   = 3;

    const ORDER_STATUS_LABELS = [
        1   => '待支付',
        2   => '支付成功',
        3   => '关闭订单',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'class_id', 'user_id', 'total_fee', 'created_at', 'updated_at'], 'required'],
            [['class_id', 'count', 'status', 'created_at', 'updated_at'], 'integer'],
            [['total_fee'], 'number'],
            [['order_id'], 'string', 'max' => 32],
            [['user_id'], 'string', 'max' => 45],
            [['order_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单号码',
            'class_id' => '课程',
            'user_id' => '用户',
            'count' => '数量',
            'total_fee' => '订单总金额',
            'status' => '订单状态',
            'status0' => '订单状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getClass()
    {
        return $this->hasOne(OnlineClass::className(),['id' => 'class_id']);
    }

    public function getUser()
    {
        return $this->hasOne(Students::className(),['id'    => 'user_id']);
    }
    public function getStatus0(){
        if($this->status == self::ORDER_STATUS_COLOSE){
            return Html::tag('label',self::ORDER_STATUS_LABELS[$this->status],['class' => 'danger']);
        } elseif($this->status == self::ORDER_STATUS_DONE){
            return Html::tag('label',self::ORDER_STATUS_LABELS[$this->status],['class' => 'success']);
        } elseif($this->status == self::ORDER_STATUS_CREATE){
            return Html::tag('label',self::ORDER_STATUS_LABELS[$this->status],['class' => 'info']);
        }
    }
    public function getLog(){
        return $this->hasMany(OrderStatusLog::className(),['order_id'=> 'id']);
    }
}
