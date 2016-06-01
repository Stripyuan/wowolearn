<?php
/**
 * Created by Jasmine2.
 * FileName: SignupFormStudent.php
 * Date: 2016-5-31
 * Time: 11:07
 */

namespace frontend\models;


use yii\base\Model;

class SignupFormStudent extends Model
{
	public $username;//用户名
	public $password;//密码
	public $confirm_password;//确认密码
	public $phone_number;//家长手机号
	public $identify_number;//身份证号
	public $sms_code;//手机验证码

	public function attributeLabels()
	{
		return [
			'username' => '用户名',
			'password' => '密码',
			'confirm_password' => '确认密码',
			'phone_number' => '手机号码',
			'identify_number' => '身份证号',
			'sms_code' => '验证码',
		];
	}

	public function signup(){
		return false;
	}
}