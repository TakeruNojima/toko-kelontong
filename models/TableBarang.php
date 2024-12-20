<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_barang".
 *
 * @property int $id_barang
 * @property string|null $jenis_barang
 * @property string|null $nama_barang
 * @property int|null $harga_barang
 * @property int $tabel pemasok_id_pemasok
 *
 * @property TabelPemasok $tabelPemasokIdPemasok
 * @property TableDetailBeli[] $tableDetailBelis
 */
class TableBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'tabel_pemasok_id_pemasok'], 'required'],
            [['id_barang', 'harga_barang', 'tabel_pemasok_id_pemasok'], 'integer'],
            [['jenis_barang', 'nama_barang'], 'string', 'max' => 45],
            [['id_barang', 'tabel_pemasok_id_pemasok'], 'unique', 'targetAttribute' => ['id_barang', 'tabel_pemasok_id_pemasok']],
            [['tabel_pemasok_id_pemasok'], 'exist', 'skipOnError' => true, 'targetClass' => TabelPemasok::class, 'targetAttribute' => ['tabel_pemasok_id_pemasok' => 'id_pemasok']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'jenis_barang' => 'Jenis Barang',
            'nama_barang' => 'Nama Barang',
            'harga_barang' => 'Harga Barang',
            'tabel_pemasok_id_pemasok' => 'Tabel Pemasok Id Pemasok',
        ];
    }

    /**
     * Gets query for [[TabelPemasokIdPemasok]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPemasokIdPemasok()
    {
        return $this->hasOne(TabelPemasok::class, ['id_pemasok' => 'tabel_pemasok_id_pemasok']);
    }

    /**
     * Gets query for [[TableDetailBelis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTableDetailBelis()
    {
        return $this->hasMany(TableDetailBeli::class, ['table_barang_id_barang' => 'id_barang', 'table_barang_tabel_pemasok_id_pemasok' => 'tabel_pemasok_id_pemasok']);
    }
}
