<?php
namespace frontend\models\forms;
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
class SignUp extends Model
{
	public $phone_number; // 手机号码
	public $password; // 密码
	public $v_code;// 手机验证码
	public $identity = 'student';

	public function rules()
	{
		return [
			[['phone_number','password','v_code','identity'],'required'],
			['phone_number',function($attribute,$params){
				if(!preg_match('/^1[3|5|7|8]\d{9}$/',$this->$attribute))
					$this->addError($attribute,"手机号码不正确");
			}],
			['password',function($attribute, $params){
				if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$this->$attribute))
					$this->addError($attribute,"密码不符合规则[必须包含大小写字母和数字的组合]");
			}],
			['password','match','pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/'],
			['identity','in', 'range' => ['student','teacher','institution']],
			['v_code',function($attribute, $params){
				if(($code = \Yii::$app->cache->get($this->phone_number)) && $code == $this->$attribute){
				} else {
					$this->addError($attribute,"验证码不正确");
				}
			}],
		];
	}

	public function signup(){
		if($this->validate()){
			// 按角色存储

			return $this;
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