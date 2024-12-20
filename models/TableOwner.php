<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_owner".
 *
 * @property int $id_owner
 * @property string|null $alamat
 * @property string|null $nama_owner
 * @property int|null $nomer_hp
 *
 * @property TabelPenjualan[] $tabelPenjualans
 */
class TableOwner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table_owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_owner'], 'required'],
            [['id_owner', 'nomer_hp'], 'integer'],
            [['alamat'], 'string', 'max' => 50],
            [['nama_owner'], 'string', 'max' => 45],
            [['id_owner'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_owner' => 'Id Owner',
            'alamat' => 'Alamat',
            'nama_owner' => 'Nama Owner',
            'nomer_hp' => 'Nomer Hp',
        ];
    }

    /**
     * Gets query for [[TabelPenjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTabelPenjualans()
    {
        return $this->hasMany(TabelPenjualan::class, ['table owner_id_owner' => 'id_owner']);
    }
}
