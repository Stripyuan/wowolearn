<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
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
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $institution_id
 * @property integer $status
 * @property string $realname
 * @property string $email
 * @property integer $is_del
 *
 * @property AttentionTeacher[] $attentionTeachers
 * @property Students[] $students
 * @property Integral $integral
 * @property IntegralLog[] $integralLogs
 * @property OnlineClass[] $onlineClasses
 * @property Teachs[] $teachs
 */
class Teachers extends \yii\db\ActiveRecord
{
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
            [['username', 'password_hash', 'auth_key', 'phone_number', 'identity_number', 'teacher_certificate', 'created_at', 'updated_at', 'realname', 'email'], 'required'],
            [['is_school_teacher', 'created_at', 'updated_at', 'institution_id', 'status', 'is_del'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'teacher_certificate', 'realname', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 11],
            [['identity_number'], 'string', 'max' => 18],
            [['username'], 'unique'],
            [['phone_number'], 'unique'],
            [['identity_number'], 'unique'],
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
            'phone_number' => 'Phone Number',
            'identity_number' => 'Identity Number',
            'is_school_teacher' => '是否在职，默认0，在职，1为非在职',
            'teacher_certificate' => '教师资格证，存放位置',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'institution_id' => 'Institution ID',
            'status' => 'Status',
            'realname' => 'Realname',
            'email' => 'Email',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttentionTeachers()
    {
        return $this->hasMany(AttentionTeacher::className(), ['teacher_id' => 'id']);
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
    public function getTeachs()
    {
        return $this->hasMany(Teachs::className(), ['teacher_id' => 'id']);
    }
}
