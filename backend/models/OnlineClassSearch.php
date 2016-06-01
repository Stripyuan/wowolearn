<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OnlineClass;

/**
 * OnlineClassSearch represents the model behind the search form about `backend\models\OnlineClass`.
 */
class OnlineClassSearch extends OnlineClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'class_time', 'class_category', 'class_subject', 'online_time', 'like_times', 'class_type', 'created_at', 'updated_at', 'teacher_id', 'in_times'], 'integer'],
            [['class_name', 'class_code', 'class_img', 'class_summary', 'teaching_plan'], 'safe'],
            [['price', 'price_now'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OnlineClass::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'class_time' => $this->class_time,
            'class_category' => $this->class_category,
            'class_subject' => $this->class_subject,
            'online_time' => $this->online_time,
            'price' => $this->price,
            'price_now' => $this->price_now,
            'like_times' => $this->like_times,
            'class_type' => $this->class_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'teacher_id' => $this->teacher_id,
            'in_times' => $this->in_times,
        ]);

        $query->andFilterWhere(['like', 'class_name', $this->class_name])
            ->andFilterWhere(['like', 'class_code', $this->class_code])
            ->andFilterWhere(['like', 'class_img', $this->class_img])
            ->andFilterWhere(['like', 'class_summary', $this->class_summary])
            ->andFilterWhere(['like', 'teaching_plan', $this->teaching_plan]);

        return $dataProvider;
    }
}
