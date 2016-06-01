<?php
namespace backend\models;

use Yii;
use jasmine2\dwz\helpers\Html;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Admins extends ActiveRecord implements IdentityInterface
{
    public $password;
    const STATUS_LOCK = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_LABELS = [
        '0' => '锁定',
        '10' => '正常',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
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
            [['username','email','phone_number','realname'],'required'],
            [['password'],'required','on' => ['create']],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_LOCK]],
            [['username','email'],'unique'],
            [['email'],'email'],
            ['username',function($attribute, $params){
                if(!preg_match('/^\w{5,32}$/',$this->$attribute))
                    $this->addError($attribute,"用户名不符合规则[5-32字母、数字、下划线的组合]");
            }],
            ['password',function($attribute, $params){
               // if(!$this->isNewRecord && )
                if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
                    $this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
            }],
            [['phone_number'],  function($attribute, $params){
                if(!preg_match('/^1[3|5|7|8]\d{9}$/',$this->$attribute))
                    $this->addError($attribute,"手机号码不正确");
            }],
        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['username','email','password','phone_number','status','realname'],
            'update' => ['username','email','password','phone_number','status','realname'],
        ];
    }
    public function beforeSave($insert)
    {
        if($this->password){
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }
        if($this->isNewRecord){
            $this->generateAuthKey();
        }
        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'password_hash' => '密码',
            'auth_key' => '授权 Key',
            'password_reset_token' => '密码重置 Token',
            'phone_number' => '手机号码',
            'created_at' => '注册时间',
            'updated_at' => '更新时间',
            'status0' => '状态',
            'status' => '状态',
            'realname' => '姓名',
        ];
    }

    public function getStatus0(){
        if($this->status == self::STATUS_LOCK)
            return Html::tag('label',self::STATUS_LABELS[$this->status],['class' => 'danger']);
        if($this->status == self::STATUS_ACTIVE)
            return Html::tag('label',self::STATUS_LABELS[$this->status],['class' => 'success']);
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
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
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
