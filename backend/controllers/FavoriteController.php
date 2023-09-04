<?php

namespace backend\controllers;

use common\models\Favorite;
use common\models\FavoriteSearch;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * FavoriteController implements the CRUD actions for Favorite model.
 */
class FavoriteController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['create', 'update', 'view'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON
                ]
            ]
        ];
    }

    /**
     * Lists all Favorite models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FavoriteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favorite model.
     * @param int $id ID
     * @return array
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $response['status'] = false;
        $response['content'] = $this->renderAjax('view', ['model' => $this->findModel($id)]);
        return $response;
    }

    /**
     * Creates a new Favorite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Favorite();

        if (Yii::$app->request->isAjax) {
            $response['status'] = false;
            if ($this->request->isPost) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $response['status'] = true;
                }
                $response['content'] = $this->renderAjax('create', ['model' => $model]);
            }
            return $response;
        } else {
            return "Invalid request";
        }
    }

    /**
     * Updates an existing Favorite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return array|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $response['status'] = false;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $response['status'] = true;
        }
        $response['content'] = $this->renderAjax('update', ['model' => $model]);
        return $response;
    }

    /**
     * Deletes an existing Favorite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Favorite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Favorite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Favorite::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
