<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Teachers;

/**
 * TeachersSearch represents the model behind the search form about `backend\models\Teachers`.
 */
class TeachersSearch extends Teachers
{
    public $status = -1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_school_teacher','status'], 'integer'],
            [['username', 'realname','status'], 'safe'],
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
        $query = Teachers::find();

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
            'is_school_teacher' => $this->is_school_teacher,
        ]);
        if($this->status != -1)
            $query->andFilterWhere([
                'status'            => $this->status
            ]);
        $query->andFilterWhere(['like', 'username', $this->username]);
        $query->andFilterWhere(['like', 'realname', $this->realname]);

        return $dataProvider;
    }
}
