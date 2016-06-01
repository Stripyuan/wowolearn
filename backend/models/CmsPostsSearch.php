<?php
/**
 * Created by Jasmine2.
 * FileName: CmsPostsSearch.php
 * Date: 2016-5-28
 * Time: 8:00
 */

namespace backend\models;

use yii\data\ActiveDataProvider;
class CmsPostsSearch extends CmsPosts
{
	public function init()
	{
		$this->category_id = -1;
		parent::init();
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['category_id'], 'integer'],
			[['category_id', 'title'], 'safe'],
		];
	}
	public function search($params)
	{
		$query = CmsPosts::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		if($this->category_id != -1)
			$query->andFilterWhere([
				'category_id' => $this->category_id,
			]);

		$query->andFilterWhere(['like', 'title', $this->title]);

		return $dataProvider;
	}
}