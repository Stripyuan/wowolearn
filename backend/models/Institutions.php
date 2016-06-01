<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use jasmine2\dwz\helpers\Html;
/**
 * This is the model class for table "{{%institutions}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $phone_number
 * @property string $business_license
 * @property string $tax_registration_number
 * @property string $organization_code
 * @property string $organization_code_img
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $logo
 * @property integer $status
 * @property string $realname
 * @property string $name
 */
class Institutions extends \yii\db\ActiveRecord
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
        return '{{%institutions}}';
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
            [['username', 'password_hash', 'auth_key', 'phone_number', 'created_at', 'updated_at', 'realname', 'name'], 'required'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'business_license', 'tax_registration_number', 'organization_code', 'organization_code_img', 'logo', 'realname', 'name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 11],
            [['username'], 'unique'],
            [['phone_number'], 'unique'],
            ['password',function($attribute, $params){
                if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
                    $this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
            },'skipOnEmpty' => true],
            [['phone_number'],  function($attribute, $params){
                if(!preg_match('/^1[3|5|7|8]\d{9}$/',$this->$attribute))
                    $this->addError($attribute,"手机号码不正确");
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'password_hash' => '密码',
            'auth_key' => '授权KEY',
            'password_reset_token' => '密码重置TOKEN',
            'phone_number' => '手机号码',
            'business_license' => '营业执照',
            'tax_registration_number' => '税务登记证',
            'organization_code' => '组织机构代码',
            'organization_code_img' => '组织机构代码证',
            'created_at' => '注册时间',
            'updated_at' => '更新时间',
            'logo' => '头像',
            'status' => '状态',
            'status0' => '状态',
            'realname' => '负责人',
            'name' => '机构名称',
        ];
    }

    public function getStatus0(){
        if($this->status == self::STATUS_LOCK)
            return Html::tag('label',self::STATUS_LABELS[$this->status],['class' => 'danger']);
        if($this->status == self::STATUS_ACTIVE)
            return Html::tag('label',self::STATUS_LABELS[$this->status],['class' => 'success']);
    }
    public function beforeSave($insert)
    {
        if(!empty($this->password)){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }
        return parent::beforeSave($insert);
    }

    public function getTeachers(){
        return $this->hasMany(Teachers::className(),['institution_id' => 'id']);
    }

    public static function primaryKey()
    {
        return ['id'];
    }
}
