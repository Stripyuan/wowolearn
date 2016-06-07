<?php
namespace frontend\models\forms;
use frontend\models\Users;
use yii\base\Model;


/**
 * Created by Jasmine2.
 * FileName: SignUp.php
 * Date: 2016-6-5
 * Time: 22:37.
 * @property string $phone_number
 * @property string $password
 * @property string $v_code
 */
class SignUp extends Users
{
	public $phone_number; // 手机号码
	public $password; // 密码
	public $v_code;// 手机验证码
	public $role = 'student';

	public function rules()
	{
		return [
			[['phone_number','password','v_code','role'],'required'],
			['phone_number',function($attribute,$params){
				if(!preg_match('/^1[3|5|7|8]\d{9}$/',$this->$attribute))
					$this->addError($attribute,"手机号码不正确");
			}],
			['password',function($attribute, $params){
				if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
					$this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
			}],
			['password','match','pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/'],
			['role','in', 'range' => ['student','teacher','institution']],
			['v_code',function($attribute, $params){
				if(($code = \Yii::$app->cache->get($this->phone_number)) && $code == $this->$attribute){
				} else {
					$this->addError($attribute,"验证码不正确");
				}
			}],
			[['phone_number', 'role'], 'unique', 'targetAttribute' => ['phone_number', 'role'], 'message' => '手机号码已经注册了.'],
		];
	}

	public function signup(){
		if($this->validate()){
			$user = new Users();
			$user->phone_number = $this->phone_number;
			$user->role         = $this->role;
			$user->setPassword($this->password);
			$user->generateAuthKey();
			if($user->save())
				return $user;
			else
				return false;
		} else {
			return false;
		}
	}

	public function attributeLabels()
	{
		return [
			'phone_number' => '手机号',
			'password' => '密码',
			'v_code' => '验证码',
		];
	}
}