<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TablePembeli;

/**
 * TablePembeliSearch represents the model behind the search form of `app\models\TablePembeli`.
 */
class TablePembeliSearch extends TablePembeli
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli', 'nomer_hp'], 'integer'],
            [['nama_pembeli', 'Alamat', 'email'], 'safe'],
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
        $query = TablePembeli::find();

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
            'id_pembeli' => $this->id_pembeli,
            'nomer_hp' => $this->nomer_hp,
        ]);

        $query->andFilterWhere(['like', 'nama_pembeli', $this->nama_pembeli])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
