<?php

namespace app\controllers;

use app\models\TableOwner;
use app\models\TableOwnerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TableOwnerController implements the CRUD actions for TableOwner model.
 */
class TableOwnerController extends Controller
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
     * Lists all TableOwner models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TableOwnerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TableOwner model.
     * @param int $id_owner Id Owner
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_owner)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_owner),
        ]);
    }

    /**
     * Creates a new TableOwner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TableOwner();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_owner' => $model->id_owner]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TableOwner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_owner Id Owner
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_owner)
    {
        $model = $this->findModel($id_owner);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_owner' => $model->id_owner]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TableOwner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_owner Id Owner
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_owner)
    {
        $this->findModel($id_owner)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TableOwner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_owner Id Owner
     * @return TableOwner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_owner)
    {
        if (($model = TableOwner::findOne(['id_owner' => $id_owner])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
