<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%students}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone_number
 * @property string $identity_number
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $qq
 * @property string $wechat
 * @property string $realname
 * @property string $logo
 * @property integer $is_del
 *
 * @property AttentionClass[] $attentionClasses
 * @property OnlineClass[] $classes
 * @property AttentionTeacher[] $attentionTeachers
 * @property Teachers[] $teachers
 * @property Learns[] $learns
 * @property VirtualCurrency $virtualCurrency
 * @property VirtualCurrencyLog[] $virtualCurrencyLogs
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%students}}';
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
            [['username', 'password_hash', 'email', 'phone_number', 'identity_number', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'password_reset_token', 'email', 'logo'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 11],
            [['identity_number'], 'string', 'max' => 18],
            [['qq'], 'string', 'max' => 20],
            [['wechat'], 'string', 'max' => 45],
            [['realname'], 'string', 'max' => 128],
            [['username'], 'unique'],
            [['phone_number'], 'unique'],
            [['identity_number'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone_number' => '家长手机号',
            'identity_number' => '身份证号码',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'qq' => 'Qq',
            'wechat' => 'Wechat',
            'realname' => 'Realname',
            'logo' => 'Logo',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttentionClasses()
    {
        return $this->hasMany(AttentionClass::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(OnlineClass::className(), ['id' => 'class_id'])->viaTable('{{%attention_class}}', ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttentionTeachers()
    {
        return $this->hasMany(AttentionTeacher::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teachers::className(), ['id' => 'teacher_id'])->viaTable('{{%attention_teacher}}', ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearns()
    {
        return $this->hasMany(Learns::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVirtualCurrency()
    {
        return $this->hasOne(VirtualCurrency::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVirtualCurrencyLogs()
    {
        return $this->hasMany(VirtualCurrencyLog::className(), ['student_id' => 'id']);
    }
}
