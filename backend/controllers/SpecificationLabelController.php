<?php

namespace backend\controllers;

use common\models\SpecificationLabel;
use common\models\SpecificationLabelSearch;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SpecificationLabelController implements the CRUD actions for SpecificationLabel model.
 */
class SpecificationLabelController extends Controller
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
     * Lists all SpecificationLabel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SpecificationLabelSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SpecificationLabel model.
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
     * Creates a new SpecificationLabel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SpecificationLabel();

        if (Yii::$app->request->isAjax) {
            $response['status'] = false;
            if ($this->request->isPost && $model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    $response['status'] = true;
                } else {
                    $response['error'] = $model->errors;
                }
            }
            $response['content'] = $this->renderAjax('create', ['model' => $model]);
            return $response;
        } else {
            return "Invalid request";
        }
    }

    /**
     * Updates an existing SpecificationLabel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $response['status'] = false;
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                $response['status'] = true;
            } else {
                $response['error'] = $model->errors;
            }
        }
        $response['content'] = $this->renderAjax('update', ['model' => $model]);
        return $response;
    }

    /**
     * Deletes an existing SpecificationLabel model.
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
     * Finds the SpecificationLabel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SpecificationLabel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SpecificationLabel::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
