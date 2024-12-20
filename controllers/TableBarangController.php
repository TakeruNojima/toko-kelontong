<?php

namespace app\controllers;

use app\models\TableBarang;
use app\models\TableBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TableBarangController implements the CRUD actions for TableBarang model.
 */
class TableBarangController extends Controller
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
     * Lists all TableBarang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TableBarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TableBarang model.
     * @param int $id_barang Id Barang
     * @param int $tabel pemasok_id_pemasok Tabel Pemasok Id Pemasok
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_barang, $tabel_pemasok_id_pemasok)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_barang, $tabel_pemasok_id_pemasok),
        ]);
    }

    /**
     * Creates a new TableBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TableBarang();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_barang' => $model->id_barang, 'tabel_pemasok_id_pemasok' => $model->tabel_pemasok_id_pemasok]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TableBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_barang Id Barang
     * @param int $tabel pemasok_id_pemasok Tabel Pemasok Id Pemasok
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_barang, $tabel_pemasok_id_pemasok)
    {
        $model = $this->findModel($id_barang, $tabel_pemasok_id_pemasok);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_barang' => $model->id_barang, 'tabel_pemasok_id_pemasok' => $model->tabel_pemasok_id_pemasok]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TableBarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_barang Id Barang
     * @param int $tabel pemasok_id_pemasok Tabel Pemasok Id Pemasok
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_barang, $tabel_pemasok_id_pemasok)
    {
        $this->findModel($id_barang, $tabel_pemasok_id_pemasok)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TableBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_barang Id Barang
     * @param int $tabel pemasok_id_pemasok Tabel Pemasok Id Pemasok
     * @return TableBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_barang, $tabel_pemasok_id_pemasok)
    {
        if (($model = TableBarang::findOne(['id_barang' => $id_barang, 'tabel_pemasok_id_pemasok' => $tabel_pemasok_id_pemasok])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
