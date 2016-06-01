<?php
/**
 * Created by Jasmine2.
 * FileName: StudentsSearch.php
 * Date: 2016-5-24
 * Time: 20:46
 */

namespace backend\models;


use yii\data\ActiveDataProvider;

class StudentsSearch extends Students
{
	public $status = -1;
	public function rules()
	{
		return [
			[['username','realname','status','phone_number'],'string','skipOnEmpty' => true],
		];
	}
	public function search($params)
	{
		$query = Students::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);
		if (!$this->validate()) {
			return $dataProvider;
		}

		$query->andFilterWhere([
			'like',
			'username' ,
			$this->username
		]);
		$query->andFilterWhere([
			'like',
			'realname' ,
			$this->realname
		]);
		$query->andFilterWhere([
			'like',
			'phone_number' ,
			$this->phone_number
		]);
		if($this->status != -1)
			$query->andFilterWhere(['status' => $this->status]);

		return $dataProvider;
	}
}