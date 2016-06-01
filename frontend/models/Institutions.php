<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
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
 * @property integer $is_del
 */
class Institutions extends \yii\db\ActiveRecord
{
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
            [['created_at', 'updated_at', 'status', 'is_del'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'business_license', 'tax_registration_number', 'organization_code', 'organization_code_img', 'logo', 'realname', 'name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone_number'], 'string', 'max' => 11],
            [['username'], 'unique'],
            [['phone_number'], 'unique'],
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
            'business_license' => '营业执照',
            'tax_registration_number' => '税务登记证',
            'organization_code' => '组织机构代码证',
            'organization_code_img' => '组织机构代码证',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'logo' => 'Logo',
            'status' => 'Status',
            'realname' => 'Realname',
            'name' => 'Name',
            'is_del' => 'Is Del',
        ];
    }
}
