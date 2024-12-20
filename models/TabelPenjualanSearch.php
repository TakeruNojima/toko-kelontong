<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabelPenjualan;

/**
 * TabelPenjualanSearch represents the model behind the search form of `app\models\TabelPenjualan`.
 */
class TabelPenjualanSearch extends TabelPenjualan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjualan', 'jumlah_barang', 'total_transaksi', 'table_pembeli_id_pembeli', 'table_owner_id_owner'], 'integer'],
            [['tanggal_transaksi'], 'safe'],
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
        $query = TabelPenjualan::find();

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
            'id_penjualan' => $this->id_penjualan,
            'jumlah_barang' => $this->jumlah_barang,
            'total_transaksi' => $this->total_transaksi,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'table_pembeli_id_pembeli' => $this->table_pembeli_id_pembeli,
            'table_owner_id_owner' => $this->table_owner_id_owner,
        ]);

        return $dataProvider;
    }
}
