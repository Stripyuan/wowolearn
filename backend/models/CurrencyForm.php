<?php
/**
 * Created by Jasmine2.
 * FileName: CurrencyForm.php
 * Date: 2016-6-1
 * Time: 18:29
 */

namespace backend\models;


use yii\base\Model;

class CurrencyForm extends Model
{
	public $student_id;
	public $plus;
	public function rules()
	{
		return [
			[['student_id', 'plus'], 'required'],
			[['student_id'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'student_id' => '学生ID',
			'plus' => '虚拟币',
		];
	}

	public function save(){
		if($vc = VirtualCurrency::findOne($this->student_id)){
			if(($this->plus + $vc->currency) < 0){
				$this->addError('plus','当前值不够相减');
				return false;
			} else {
				$vc->currency += $this->plus;
				if($vc->save()){
					VirtualCurrencyLog::log($this->student_id,$this->plus);
					return true;
				}
			}
		} else {
			$vc = new VirtualCurrency();
			if($this->plus < 0){
				$this->addError('plus','当前值为0，不能继续相减');
				return false;
			} else {
				$vc->student_id = $this->student_id;
				$vc->currency   = $this->plus;
				if($vc->save()){
					VirtualCurrencyLog::log($this->student_id,$this->plus);
					return true;
				}
			}
		}
	}
}