<?php

namespace app\controllers;

use app\models\TabelPemasok;
use app\models\TabelPemasokSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TabelPemasokController implements the CRUD actions for TabelPemasok model.
 */
class TabelPemasokController extends Controller
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
     * Lists all TabelPemasok models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TabelPemasokSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelPemasok model.
     * @param int $id_pemasok Id Pemasok
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pemasok)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pemasok),
        ]);
    }

    /**
     * Creates a new TabelPemasok model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TabelPemasok();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pemasok' => $model->id_pemasok]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TabelPemasok model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pemasok Id Pemasok
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pemasok)
    {
        $model = $this->findModel($id_pemasok);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pemasok' => $model->id_pemasok]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TabelPemasok model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pemasok Id Pemasok
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pemasok)
    {
        $this->findModel($id_pemasok)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelPemasok model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pemasok Id Pemasok
     * @return TabelPemasok the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pemasok)
    {
        if (($model = TabelPemasok::findOne(['id_pemasok' => $id_pemasok])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
