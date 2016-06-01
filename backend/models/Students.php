<?php

namespace backend\models;

use jasmine2\dwz\helpers\Html;
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

    public $password;
    const STATUS_ACTIVE = 10;
    const STATUS_LOCK   = 0;
    const STATUS_LABELS = [
        '0' => '锁定',
        '10' => '正常',
    ];
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
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'password_reset_token', 'email', 'logo'], 'string', 'max' => 255],
            [['phone_number'],  function($attribute, $params){
                if(!preg_match('/^1[3|5|7|8]\d{9}$/',$this->$attribute))
                    $this->addError($attribute,"手机号码不正确");
            }],
            [['identity_number'], function($attribute, $params){
                if(!preg_match('/^\d{18}$/',$this->$attribute))
                    $this->addError($attribute,"身份证号必须是18位");
            }],
            [['qq'], function($attribute, $params){
                if(!preg_match('/^\d{5,12}$/',$this->$attribute))
                    $this->addError($attribute,"QQ号码必须是数字[5-12位]");
            }],
            [['wechat'], 'string', 'max' => 45],
            [['realname'], 'string', 'max' => 128],
            [['username'], 'unique'],
            [['phone_number'], 'unique'],
            [['identity_number'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
            ['password',function($attribute, $params){
                if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
                    $this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
            },'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password_hash' => '密码',
            'password' => '密码',
            'auth_key' => '授权 Key',
            'password_reset_token' => '密码重置 Token',
            'email' => 'Email',
            'phone_number' => '家长手机号码',
            'identity_number' => '身份证号码',
            'status' => '状态',
            'status0' => '状态',
            'created_at' => '注册时间',
            'updated_at' => '更新时间',
            'qq' => 'QQ',
            'wechat' => '微信号',
            'realname' => '真实姓名',
            'logo' => '头像',
        ];
    }

    public function getStatus0(){
        if($this->status == self::STATUS_LOCK)
            return Html::tag('label',self::STATUS_LABELS[$this->status],['class' => 'danger']);
        if($this->status == self::STATUS_ACTIVE)
            return Html::tag('label',self::STATUS_LABELS[$this->status],['class' => 'success']);
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

    public function beforeSave($insert)
    {
        if(!empty($this->password)){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }

        return parent::beforeSave($insert);
    }
    public static function primaryKey()
    {
        return ['id'];
    }
}
