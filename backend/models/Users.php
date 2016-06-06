<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone_number
 * @property string $role
 * @property integer $status
 * @property string $qq
 * @property string $wechat
 * @property string $realname
 * @property string $logo
 * @property string $is_del
 * @property string $identity_number
 * @property integer $is_school_teacher
 * @property string $teacher_certificate
 * @property integer $institution_id
 * @property string $introduction
 * @property string $business_license
 * @property string $tax_registration_number
 * @property string $organization_code
 * @property string $organization_code_img
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    public $password;
    const STATUS_ACTIVE = 10;
    const STATUS_LOCK   = 0;
    const STATUS_LABELS = [
        '0' => '锁定',
        '10' => '正常',
    ];
    const SCHOOL_TEACHER_TRUE = 0;
    const SCHOOL_TEACHER_FALSE= 1;
    const SCHOOL_TEACHER_LABELS = [
        0 => '是',
        1 => '否'
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
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
            [['phone_number', 'role'], 'required'],
            [['status', 'is_school_teacher', 'institution_id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'password_reset_token', 'email', 'role', 'wechat', 'realname', 'logo', 'teacher_certificate', 'business_license', 'tax_registration_number', 'organization_code', 'organization_code_img', 'name'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 11],
            [['qq'], 'string', 'max' => 32],
            [['identity_number'], 'string', 'max' => 18],
            [['introduction'], 'string', 'max' => 1024],
            [['phone_number', 'role'], 'unique', 'targetAttribute' => ['phone_number', 'role'], 'message' => 'The combination of Phone Number and Role has already been taken.'],
            ['password',function($attribute, $params){
                if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
                    $this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
            },'skipOnEmpty' => true],
            [['phone_number'],  function($attribute, $params){
                if(!preg_match('/^1[3|5|7|8]\d{9}$/',$this->$attribute))
                    $this->addError($attribute,"手机号码不正确");
            }],
            [['identity_number'], function($attribute, $params){
                if(!preg_match('/^\d{18}$/',$this->$attribute))
                    $this->addError($attribute,"身份证号必须是18位");
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
            'password_hash' => '密码 Hash',
            'auth_key' => 'Auth Key',
            'password_reset_token' => '密码重置Token',
            'email' => 'Email',
            'phone_number' => '手机号码',
            'role' => '角色',
            'status' => '状态',
            'status0' => '状态',
            'qq' => 'QQ',
            'wechat' => '微信',
            'realname' => '真实姓名',
            'logo' => '头像',
            'is_del' => '删除标志',
            'identity_number' => '身份证号',
            'is_school_teacher' => '是否是在职',
            'isSchoolTeacher' => '是否是在职',
            'teacher_certificate' => '教师资格证',
            'institution_id' => '所属机构',
            'introduction' => '老师简介',
            'business_license' => '营业执照',
            'tax_registration_number' => '税务登记证',
            'organization_code' => '组织机构证',
            'organization_code_img' => '组织机构证图片',
            'name' => '机构名称',
            'created_at' => '注册时间',
            'updated_at' => '更新时间',
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
    public function getAttentionStudents()
    {
        return $this->hasMany(AttentionTeacher::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Users::className(), ['id' => 'teacher_id'])->viaTable('{{%attention_teacher}}', ['student_id' => 'id']);
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
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttentionTeachers()
    {
        return $this->hasMany(AttentionTeacher::className(), ['teacher_id' => 'id']);
    }
    public function getIsSchoolTeacher(){
        if ($this->is_school_teacher == self::SCHOOL_TEACHER_TRUE)
            return Html::tag('label', self::SCHOOL_TEACHER_LABELS[$this->is_school_teacher], ['class' => 'success']);
        if ($this->is_school_teacher == self::SCHOOL_TEACHER_FALSE)
            return Html::tag('label', self::SCHOOL_TEACHER_LABELS[$this->is_school_teacher], ['class' => 'danger']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['id' => 'student_id'])->viaTable('{{%attention_teacher}}', ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegral()
    {
        return $this->hasOne(Integral::className(), ['teacher_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegralLogs()
    {
        return $this->hasMany(IntegralLog::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnlineClasses()
    {
        return $this->hasMany(OnlineClass::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution0()
    {
        return $this->hasOne(self::className(), ['id' => 'institution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachs()
    {
        return $this->hasMany(Teachs::className(), ['teacher_id' => 'id']);
    }
}
