<?php
/**
 * Created by Jasmine2.
 * FileName: MPassword.php
 * Date: 2016-5-25
 * Time: 9:08
 */

namespace backend\models;


use yii\base\Model;
use backend\models\Admins;
/**
 * 修改密码
 * Class MPassword
 * @package backend\models
 */
class MPassword extends Model
{
	public $password;
	public $confirm_password;
	public $old_password;

	public function rules()
	{
		return [
			[['password','confirm_password','old_password'],'required'],
			[['password','confirm_password',],function($attribute, $params){
				if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
					$this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
			}],
			['confirm_password',function($attribute, $params){
				if($this->$attribute != $this->password){
					$this->addError($attribute,"两次密码输入不一致");
				}
			}],
			['old_password',function($attribute,$params){
				if(!\Yii::$app->security->validatePassword($this->$attribute,\Yii::$app->user->identity->password_hash)){
					$this->addError($attribute,"旧密码不正确");
				}
			}]
		];
	}
	public function attributeLabels()
	{
		return [
			'old_password' => '旧密码',
			'password' => '新密码',
			'confirm_password' => '确认密码',
		];
	}

	public function save(){
		if($this->validate()){
			$admin = \Yii::$app->user->identity;
			$admin->setScenario('update');
			$admin->setPassword($this->password);
			if($admin->save()){
				return true;
			}
		}
		return false;
	}
}