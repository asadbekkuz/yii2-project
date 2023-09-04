<?php

namespace backend\controllers;

use Yii;
use common\models\Brand;
use common\models\BrandSearch;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;


/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends Controller
{
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
     * Lists all Brand models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brand model.
     * @param int $id ID
     * @return string|array
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $response['status'] = false;
        $response['content'] = $this->renderAjax('view', ['model' => $this->findModel($id)]);
        return $response;
    }

    /**
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Brand();
        if (Yii::$app->request->isAjax) {
            $response['status'] = false;
            if ($this->request->isPost) {
                if ($model->load(Yii::$app->request->post())) {
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    if ($model->imageFile) {
                        $imageName = Yii::$app->security->generateRandomString(8) . '.' . $model->imageFile->extension;
                        if ($model->imageFile->saveAs(Yii::getAlias('@brand/') . $imageName)) {
                            $model->logo = $imageName;
                        }
                    }
                    if ($model->save(false)) {
                        $response['status'] = true;
                    } else {
                        $response['error'] = $model->errors;
                    }
                }
                $response['content'] = $this->renderAjax('create', ['model' => $model]);
                return $response;
            }
        } else {
            return "Invalid request";
        }
    }

    /**
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return array|string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $response['status'] = false;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $imageName = Yii::$app->security->generateRandomString(8) . '.' . $model->imageFile->extension;
                if ($model->imageFile->saveAs(Yii::getAlias('@brand/') . $imageName)) {
                    if(file_exists(Yii::getAlias('@brand/').$model->logo)){
                        unlink(Yii::getAlias('@brand/').$model->logo);
                    }
                    $model->logo = $imageName;
                }
            }
            if ($model->save(false)) {
                $response['status'] = true;
            } else {
                $response['error'] = $model->errors;
            }
        }
        $response['content'] = $this->renderAjax('update', ['model' => $model]);
        return $response;
    }

    /**
     * Deletes an existing Brand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(file_exists(Yii::getAlias('@brand/').$model->logo)){
            unlink(Yii::getAlias('@brand/').$model->logo);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Brand::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
