<?php
/**
 * Created by Jasmine2.
 * FileName: LoginForm.php
 * Date: 2016-5-30
 * Time: 14:44
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

class LoginForm extends Model
{
	public $username;
	public $password;
	public $role = 'student';
	public $rememberMe = true;

	private $_user;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			// username and password are both required
			[['username', 'password'], 'required'],
			// rememberMe must be a boolean value
			['rememberMe', 'boolean'],
			// password is validated by validatePassword()
			['password', 'validatePassword'],
			['role' ,'in','range' => ['student','teacher','institution']]
		];
	}

	public function attributeLabels()
	{
		return [
			'username' => '用户名',
			'password' => '密 码',
			'rememberMe' => '记住我的登录信息',
		];
	}
	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();
			if (!$user || !$user->validatePassword($this->password)) {
				$this->addError($attribute, '用户名或密码不正确.');
			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 *
	 * @return boolean whether the user is logged in successfully
	 */
	public function login()
	{
		if ($this->validate()) {
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
		} else {
			return false;
		}
	}

	/**
	 * Finds user by [[username]]
	 *
	 * @return mixed|null
	 */
	protected function getUser()
	{
		if ($this->_user === null) {
			$this->_user = User::findByUsername($this->username,$this->role);
		}
		return $this->_user;
	}
}