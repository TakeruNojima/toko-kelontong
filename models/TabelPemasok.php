<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_pemasok".
 *
 * @property int $id_pemasok
 * @property string|null $nama_pemasok
 *
 * @property TableBarang[] $tableBarangs
 */
class TabelPemasok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tabel_pemasok';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasok'], 'required'],
            [['id_pemasok'], 'integer'],
            [['nama_pemasok'], 'string', 'max' => 50],
            [['id_pemasok'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemasok' => 'Id Pemasok',
            'nama_pemasok' => 'Nama Pemasok',
        ];
    }

    /**
     * Gets query for [[TableBarangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTableBarangs()
    {
        return $this->hasMany(TableBarang::class, ['tabel pemasok_id_pemasok' => 'id_pemasok']);
    }
}
