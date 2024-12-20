<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TableOwner;

/**
 * TableOwnerSearch represents the model behind the search form of `app\models\TableOwner`.
 */
class TableOwnerSearch extends TableOwner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_owner', 'nomer_hp'], 'integer'],
            [['alamat', 'nama_owner'], 'safe'],
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
        $query = TableOwner::find();

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
            'id_owner' => $this->id_owner,
            'nomer_hp' => $this->nomer_hp,
        ]);

        $query->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nama_owner', $this->nama_owner]);

        return $dataProvider;
    }
}
