<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TableDetailBeli;

/**
 * TableDetailBeliSearch represents the model behind the search form of `app\models\TableDetailBeli`.
 */
class TableDetailBeliSearch extends TableDetailBeli
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // Mengatur tipe data untuk kolom yang ingin dicari
            [['nama_barang'], 'safe'], // Digunakan untuk string (safe) dan memungkinkan pencarian
            [['jumlah_barang', 'harga_barang', 'id_detail_beli', 'tabel_penjualan_id_penjualan','table_barang_id_barang',], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // Menggunakan skenario default dari kelas Model
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // Membuat query untuk mencari data
        $query = TableDetailBeli::find();

        // Membuat data provider
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Memuat parameter pencarian
        $this->load($params);

        // Validasi input
        if (!$this->validate()) {
            // Jika tidak valid, return data provider kosong tanpa query
            return $dataProvider;
        }

        // Menambahkan kondisi pencarian menggunakan andFilterWhere
        $query->andFilterWhere([
            'jumlah_barang' => $this->jumlah_barang,
            'harga_barang' => $this->harga_barang,
            'id_detail_beli' => $this->id_detail_beli,
            'tabel_penjualan_id_penjualan' => $this->tabel_penjualan_id_penjualan,
            'table_barang_id_barang' => $this->table_barang_id_barang,
        ]);

        // Menambahkan kondisi untuk pencarian berdasarkan nama_barang
        $query->andFilterWhere(['like', 'nama_barang', $this->nama_barang]);

        // Mengembalikan data provider untuk ditampilkan di grid
        return $dataProvider;
    }
}
