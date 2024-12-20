<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_penjualan".
 *
 * @property int $id_penjualan
 * @property int|null $jumlah_barang
 * @property int|null $total_transaksi
 * @property string|null $tanggal_transaksi
 * @property int $table pembeli_id_pembeli
 * @property int $table owner_id_owner
 *
 * @property TableDetailBeli[] $tableDetailBelis
 * @property TableOwner $tableOwnerIdOwner
 * @property TablePembeli $tablePembeliIdPembeli
 */
class TabelPenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjualan', 'table_pembeli_id_pembeli', 'table_owner_id_owner'], 'required'],
            [['id_penjualan', 'jumlah_barang', 'total_transaksi', 'table_pembeli_id_pembeli', 'table_owner_id_owner'], 'integer'],
            [['tanggal_transaksi'], 'safe'],
            [['id_penjualan', 'table_pembeli_id_pembeli', 'table_owner_id_owner'], 'unique', 'targetAttribute' => ['id_penjualan', 'table_pembeli_id_pembeli', 'table_owner_id_owner']],
            [['table_owner_id_owner'], 'exist', 'skipOnError' => true, 'targetClass' => TableOwner::class, 'targetAttribute' => ['table_owner_id_owner' => 'id_owner']],
            [['table_pembeli_id_pembeli'], 'exist', 'skipOnError' => true, 'targetClass' => TablePembeli::class, 'targetAttribute' => ['table_pembeli_id_pembeli' => 'id_pembeli']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penjualan' => 'Id Penjualan',
            'jumlah_barang' => 'Jumlah Barang',
            'total_transaksi' => 'Total Transaksi',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'table_pembeli_id_pembeli' => 'Table Pembeli Id Pembeli',
            'table_owner_id_owner' => 'Table Owner Id Owner',
        ];
    }

    /**
     * Gets query for [[TableDetailBelis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTableDetailBelis()
    {
        return $this->hasMany(TableDetailBeli::class, ['tabel_penjualan_id_penjualan' => 'id_penjualan', 'tabel_penjualan_table_pembeli_id_pembeli' => 'table_pembeli_id_pembeli', 'tabel_penjualan_table_owner_id_owner' => 'table_owner_id_owner']);
    }

    /**
     * Gets query for [[TableOwnerIdOwner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTableOwnerIdOwner()
    {
        return $this->hasOne(TableOwner::class, ['id_owner' => 'table_owner_id_owner']);
    }

    /**
     * Gets query for [[TablePembeliIdPembeli]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTablePembeliIdPembeli()
    {
        return $this->hasOne(TablePembeli::class, ['id_pembeli' => 'table_pembeli_id_pembeli']);
    }
}
