<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
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
            'order_id' => '订单号',
            'class_id' => '课程名',
            'user_id' => '用户',
            'count' => '数量',
            'total_fee' => '总价',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
