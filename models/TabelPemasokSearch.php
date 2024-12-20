<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPemasok;

/**
 * TabelPemasokSearch represents the model behind the search form of `app\models\TabelPemasok`.
 */
class TabelPemasokSearch extends TabelPemasok
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasok'], 'integer'],
            [['nama_pemasok'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TabelPemasok::find();

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
            'id_pemasok' => $this->id_pemasok,
        ]);

        $query->andFilterWhere(['like', 'nama_pemasok', $this->nama_pemasok]);

        return $dataProvider;
    }
}
