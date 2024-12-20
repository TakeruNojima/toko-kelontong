<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_pembeli".
 *
 * @property int $id_pembeli
 * @property string|null $nama_pembeli
 * @property string|null $Alamat
 * @property int|null $nomer_hp
 * @property string|null $email
 *
 * @property TabelPenjualan[] $tabelPenjualans
 */
class TablePembeli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table_pembeli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli'], 'required'],
            [['id_pembeli', 'nomer_hp'], 'integer'],
            [['nama_pembeli'], 'string', 'max' => 45],
            [['Alamat'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30],
            [['id_pembeli'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembeli' => 'Id Pembeli',
            'nama_pembeli' => 'Nama Pembeli',
            'Alamat' => 'Alamat',
            'nomer_hp' => 'Nomer Hp',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[TabelPenjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPenjualans()
    {
        return $this->hasMany(TabelPenjualan::class, ['table_pembeli_id_pembeli' => 'id_pembeli']);
    }
}
