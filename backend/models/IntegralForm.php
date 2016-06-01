<?php
/**
 * Created by Jasmine2.
 * FileName: IntegralForm.php
 * Date: 2016-6-1
 * Time: 23:00
 */

namespace backend\models;


use yii\base\Model;

class IntegralForm extends Model
{
	public $teacher_id;
	public $integral;

	public function rules()
	{
		return [
			[['teacher_id','integral'],'required'],
			['integral','integer']
		];
	}

	public function attributeLabels()
	{
		return [
			'teacher_id'    => '老师',
			'integral'    => '积分',
		];
	}

	public function save(){
		if($in = Integral::findOne($this->teacher_id)){
			if(($this->integral + $in->integral) < 0){
				$this->addError('integral','当前积分不够相减');
				return false;
			} else {
				$in->integral += $this->integral;
				if($in->save()){
					IntegralLog::log($this->teacher_id,$this->integral);
					return true;
				}
			}
		} else {
			$in = new Integral();
			if($this->integral < 0){
				$this->addError('integral','当前值为0，不能继续相减');
				return false;
			} else {
				$in->teacher_id = $this->teacher_id;
				$in->integral   = $this->integral;
				if($in->save()){
					IntegralLog::log($this->teacher_id,$this->integral);
					return true;
				}
			}
		}
	}
}