<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_detail_beli".
 *
 * @property string|null $nama_barang
 * @property int|null $jumlah_barang
 * @property int|null $harga_barang
 * @property int $id_detail_beli
 * @property int $tabel_penjualan_id_penjualan
 * @property int $tabel_penjualan_table_pembeli_id_pembeli
 * @property int $tabel_penjualan_table_owner_id_owner
 * @property int $table_barang_id_barang
 * @property int $table_barang_tabel_pemasok_id_pemasok
 *
 * @property TabelPenjualan $tabelPenjualanIdPenjualan
 * @property TableBarang $tableBarangIdBarang
 */
class TableDetailBeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table_detail_beli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jumlah_barang', 'harga_barang', 'id_detail_beli', 'tabel_penjualan_id_penjualan', 'table_barang_id_barang',], 'integer'],
            [['id_detail_beli', 'tabel_penjualan_id_penjualan', 'table_barang_id_barang',], 'required'],
            [['nama_barang'], 'string', 'max' => 30],
            [['id_detail_beli', 'tabel_penjualan_id_penjualan', 'table_barang_id_barang',], 'unique', 'targetAttribute' => ['id_detail_beli', 'tabel_penjualan_id_penjualan','table_barang_id_barang',]],
            [['tabel_penjualan_id_penjualan',], 'exist', 'skipOnError' => true, 'targetClass' => TabelPenjualan::class, 'targetAttribute' => ['tabel_penjualan_id_penjualan' => 'id_penjualan',]],
            [[], 'exist', 'skipOnError' => true, 'targetClass' => TableBarang::class, 'targetAttribute' => ['table_barang_id_barang' => 'id_barang',]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama_barang' => 'Nama Barang',
            'jumlah_barang' => 'Jumlah Barang',
            'harga_barang' => 'Harga Barang',
            'id_detail_beli' => 'Id Detail Beli',
            'tabel_penjualan_id_penjualan' => 'Tabel Penjualan Id Penjualan',
            'table_barang_id_barang' => 'Table Barang Id Barang',
        ];
    }

    /**
     * Gets query for [[TabelPenjualanIdPenjualan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPenjualanIdPenjualan()
    {
        return $this->hasOne(TabelPenjualan::class, ['id_penjualan' => 'tabel_penjualan_id_penjualan', 'table_pembeli_id_pembeli' => 'tabel_penjualan_table_pembeli_id_pembeli', 'table_owner_id_owner' => 'tabel_penjualan_table_owner_id_owner']);
    }

    /**
     * Gets query for [[TableBarangIdBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTableBarangIdBarang()
    {
        return $this->hasOne(TableBarang::class, ['id_barang' => 'table_barang_id_barang', 'tabel_pemasok_id_pemasok' => 'table_barang_tabel_pemasok_id_pemasok']);
    }
}
