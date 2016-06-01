<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Institutions;

/**
 * InstitutionsSearch represents the model behind the search form about `backend\models\Institutions`.
 */
class InstitutionsSearch extends Institutions
{
    public function init()
    {
        $this->status = -1;
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'password_reset_token', 'phone_number', 'business_license', 'tax_registration_number', 'organization_code', 'organization_code_img', 'logo', 'realname', 'name'], 'safe'],
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
        $query = Institutions::find();

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
        if($this->status != -1)
            $query->andFilterWhere([
                'status' => $this->status,
            ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'business_license', $this->business_license])
            ->andFilterWhere(['like', 'tax_registration_number', $this->tax_registration_number])
            ->andFilterWhere(['like', 'organization_code', $this->organization_code])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
