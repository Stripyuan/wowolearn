<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use jasmine2\dwz\helpers\Html;
/**
 * This is the model class for table "{{%teachers}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $phone_number
 * @property string $identity_number
 * @property integer $is_school_teacher
 * @property string $teacher_certificate
 * @property string $introduction
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $institution_id
 *
 * @property AttentionTeacher[] $attentionTeachers
 * @property Students[] $students
 * @property Integral $integral
 * @property IntegralLog[] $integralLogs
 * @property OnlineClass[] $onlineClasses
 * @property Institutions $institution
 * @property Teachs[] $teachs
 */
class Teachers extends \yii\db\ActiveRecord
{
    public $password;
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
        return '{{%teachers}}';
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
            [['username', 'password_hash','introduction', 'auth_key', 'phone_number', 'identity_number', 'teacher_certificate', 'created_at', 'updated_at','introduction'], 'required'],
            [['is_school_teacher', 'status', 'institution_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'teacher_certificate'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 11],
            [['introduction'], 'string', 'max' => 1024],
            [['identity_number'], 'string', 'max' => 18],
            [['username'], 'unique'],
            [['phone_number'], 'unique'],
            [['identity_number'], 'unique'],
           // [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institutions::className(), 'targetAttribute' => ['institution_id' => 'id']],
            [['email'], 'unique'],
            [['email'], 'email'],
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
            'realname' => '真实姓名',
            'password' => '密码',
            'password_hash' => '密码',
            'auth_key' => '授权 Key',
            'password_reset_token' => '密码重置 Token',
            'phone_number' => '手机号码',
            'identity_number' => '身份证号码',
            'is_school_teacher' => '是否在职',
            'isSchoolTeacher' => '是否在职',
            'teacher_certificate' => '教师资格证',
            'created_at' => '注册时间',
            'updated_at' => '更新时间',
            'institution_id' => '所属机构',
            'status0' => '状态',
            'status' => '状态',
            'introduction' => '老师简介',
        ];
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
    public function getStatus0(){
        if($this->status == Students::STATUS_LOCK)
            return Html::tag('label',Students::STATUS_LABELS[$this->status],['class' => 'danger']);
        if($this->status == Students::STATUS_ACTIVE)
            return Html::tag('label',Students::STATUS_LABELS[$this->status],['class' => 'success']);
    }
    public function getIsSchoolTeacher(){
        if($this->is_school_teacher == self::SCHOOL_TEACHER_TRUE)
            return Html::tag('label',self::SCHOOL_TEACHER_LABELS[$this->is_school_teacher],['class' => 'success']);
        if($this->is_school_teacher == self::SCHOOL_TEACHER_FALSE)
            return Html::tag('label',self::SCHOOL_TEACHER_LABELS[$this->is_school_teacher],['class' => 'danger']);
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
    public function getInstitution()
    {
        return $this->hasOne(Institutions::className(), ['id' => 'institution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachs()
    {
        return $this->hasMany(Teachs::className(), ['teacher_id' => 'id']);
    }
}
