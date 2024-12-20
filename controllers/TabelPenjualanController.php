<?php

namespace app\controllers;

use app\models\TabelPenjualan;
use app\models\TabelPenjualanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TabelPenjualanController implements the CRUD actions for TabelPenjualan model.
 */
class TabelPenjualanController extends Controller
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
     * Lists all TabelPenjualan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TabelPenjualanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelPenjualan model.
     * @param int $id_penjualan Id Penjualan
     * @param int $table pembeli_id_pembeli Table Pembeli Id Pembeli
     * @param int $table owner_id_owner Table Owner Id Owner
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner),
        ]);
    }

    /**
     * Creates a new TabelPenjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TabelPenjualan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_penjualan' => $model->id_penjualan, 'table_pembeli_id_pembeli' => $model->table_pembeli_id_pembeli, 'table_owner_id_owner' => $model->table_owner_id_owner]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TabelPenjualan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_penjualan Id Penjualan
     * @param int $table pembeli_id_pembeli Table Pembeli Id Pembeli
     * @param int $table owner_id_owner Table Owner Id Owner
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner)
    {
        $model = $this->findModel($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_penjualan' => $model->id_penjualan, 'table_pembeli_id_pembeli' => $model->table_pembeli_id_pembeli, 'table_owner_id_owner' => $model->table_owner_id_owner]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TabelPenjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_penjualan Id Penjualan
     * @param int $table pembeli_id_pembeli Table Pembeli Id Pembeli
     * @param int $table owner_id_owner Table Owner Id Owner
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner)
    {
        $this->findModel($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelPenjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_penjualan Id Penjualan
     * @param int $table pembeli_id_pembeli Table Pembeli Id Pembeli
     * @param int $table owner_id_owner Table Owner Id Owner
     * @return TabelPenjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_penjualan, $table_pembeli_id_pembeli, $table_owner_id_owner)
    {
        if (($model = TabelPenjualan::findOne(['id_penjualan' => $id_penjualan, 'table_pembeli_id_pembeli' => $table_pembeli_id_pembeli, 'table_owner_id_owner' => $table_owner_id_owner])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
