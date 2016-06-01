<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%online_class_commonts}}".
 *
 * @property integer $id
 * @property integer $class_id
 * @property integer $user_id
 * @property integer $user_type
 * @property string $commont
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $self_id
 *
 * @property OnlineClass $class
 * @property OnlineClassCommonts $self
 * @property OnlineClassCommonts[] $onlineClassCommonts
 */
class OnlineClassCommonts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%online_class_commonts}}';
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
            [['class_id', 'user_id', 'user_type', 'commont', 'created_at', 'updated_at'], 'required'],
            [['class_id', 'user_id', 'user_type', 'created_at', 'updated_at', 'self_id'], 'integer'],
            [['commont'], 'string'],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => OnlineClass::className(), 'targetAttribute' => ['class_id' => 'id']],
            [['self_id'], 'exist', 'skipOnError' => true, 'targetClass' => OnlineClassCommonts::className(), 'targetAttribute' => ['self_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => 'Class ID',
            'user_id' => 'User ID',
            'user_type' => 'User Type',
            'commont' => '回复',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'self_id' => 'Self ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(OnlineClass::className(), ['id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSelf()
    {
        return $this->hasOne(OnlineClassCommonts::className(), ['id' => 'self_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnlineClassCommonts()
    {
        return $this->hasMany(OnlineClassCommonts::className(), ['self_id' => 'id']);
    }
}
