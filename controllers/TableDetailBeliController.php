<?php

namespace app\controllers;

use app\models\TableDetailBeli;
use app\models\TableDetailBeliSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TableDetailBeliController implements the CRUD actions for TableDetailBeli model.
 */
class TableDetailBeliController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TableDetailBeli models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TableDetailBeliSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TableDetailBeli model.
     * @param int $id_detail_beli ID Detail Beli
     * @param int $penjualan_id_penjualan ID Penjualan
     * @param int $pembeli_id_pembeli ID Pembeli
     * @param int $owner_id_owner ID Owner
     * @param int $barang_id_barang ID Barang
     * @param int $pemasok_id_pemasok ID Pemasok
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok),
        ]);
    }

    /**
     * Creates a new TableDetailBeli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TableDetailBeli();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_detail_beli' => $model->id_detail_beli, 'penjualan_id_penjualan' => $model->penjualan_id_penjualan, 'pembeli_id_pembeli' => $model->pembeli_id_pembeli, 'owner_id_owner' => $model->owner_id_owner, 'barang_id_barang' => $model->barang_id_barang, 'pemasok_id_pemasok' => $model->pemasok_id_pemasok]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TableDetailBeli model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_detail_beli ID Detail Beli
     * @param int $penjualan_id_penjualan ID Penjualan
     * @param int $pembeli_id_pembeli ID Pembeli
     * @param int $owner_id_owner ID Owner
     * @param int $barang_id_barang ID Barang
     * @param int $pemasok_id_pemasok ID Pemasok
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok)
    {
        $model = $this->findModel($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_detail_beli' => $model->id_detail_beli, 'penjualan_id_penjualan' => $model->penjualan_id_penjualan, 'pembeli_id_pembeli' => $model->pembeli_id_pembeli, 'owner_id_owner' => $model->owner_id_owner, 'barang_id_barang' => $model->barang_id_barang, 'pemasok_id_pemasok' => $model->pemasok_id_pemasok]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TableDetailBeli model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_detail_beli ID Detail Beli
     * @param int $penjualan_id_penjualan ID Penjualan
     * @param int $pembeli_id_pembeli ID Pembeli
     * @param int $owner_id_owner ID Owner
     * @param int $barang_id_barang ID Barang
     * @param int $pemasok_id_pemasok ID Pemasok
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok)
    {
        $this->findModel($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TableDetailBeli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_detail_beli ID Detail Beli
     * @param int $penjualan_id_penjualan ID Penjualan
     * @param int $pembeli_id_pembeli ID Pembeli
     * @param int $owner_id_owner ID Owner
     * @param int $barang_id_barang ID Barang
     * @param int $pemasok_id_pemasok ID Pemasok
     * @return TableDetailBeli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_detail_beli, $penjualan_id_penjualan, $pembeli_id_pembeli, $owner_id_owner, $barang_id_barang, $pemasok_id_pemasok)
    {
        if (($model = TableDetailBeli::findOne([
            'id_detail_beli' => $id_detail_beli,
            'penjualan_id_penjualan' => $penjualan_id_penjualan,
            'pembeli_id_pembeli' => $pembeli_id_pembeli,
            'owner_id_owner' => $owner_id_owner,
            'barang_id_barang' => $barang_id_barang,
            'pemasok_id_pemasok' => $pemasok_id_pemasok
        ])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
