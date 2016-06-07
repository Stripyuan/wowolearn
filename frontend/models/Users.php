<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
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
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }
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
            [['phone_number', 'role','password_hash'], 'required'],
            [['status', 'is_school_teacher', 'institution_id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'password_reset_token', 'email', 'role', 'wechat', 'realname', 'logo', 'is_del', 'teacher_certificate', 'business_license', 'tax_registration_number', 'organization_code', 'organization_code_img', 'name'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 11],
            [['qq'], 'string', 'max' => 32],
            [['identity_number'], 'string', 'max' => 18],
            [['introduction'], 'string', 'max' => 1024],
            [['phone_number', 'role'], 'unique', 'targetAttribute' => ['phone_number', 'role'], 'message' => 'The combination of Phone Number and Role has already been taken.'],
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
            'phone_number' => 'Phone Number',
            'role' => 'Role',
            'status' => 'Status',
            'qq' => 'Qq',
            'wechat' => 'Wechat',
            'realname' => 'Realname',
            'logo' => 'Logo',
            'is_del' => 'Is Del',
            'identity_number' => 'Identity Number',
            'is_school_teacher' => 'Is School Teacher',
            'teacher_certificate' => 'Teacher Certificate',
            'institution_id' => 'Institution ID',
            'introduction' => 'Introduction',
            'business_license' => 'Business License',
            'tax_registration_number' => 'Tax Registration Number',
            'organization_code' => 'Organization Code',
            'organization_code_img' => 'Organization Code Img',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username,$role = 'student')
    {
        return static::findOne(['username' => $username,'role'=>$role, 'status' => self::STATUS_ACTIVE]);
    }
    public static function findByPhoneNumber($phone,$role = 'student')
    {
        return static::findOne(['phone_number' => $phone,'role'=>$role, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
