<?php

namespace backend\controllers;

use common\models\Category;
use common\models\CategorySearch;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['create','update','view'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON
                ]
            ]
        ];
    }

    /**
     * Lists all Category models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|array|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Category();
        if (Yii::$app->request->isAjax) {
            $response['status'] = false;
            if ($this->request->isPost) {
                if ($model->load(Yii::$app->request->post())) {
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    if ($model->imageFile) {
                        $imageName = Yii::$app->security->generateRandomString(8) . '.' . $model->imageFile->extension;
                        if ($model->imageFile->saveAs(Yii::getAlias('@category/') . $imageName)) {
                            $model->image = $imageName;
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|array|\yii\web\Response
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
                if ($model->imageFile->saveAs(Yii::getAlias('@category/') . $imageName)) {
                    if(file_exists(Yii::getAlias('@category/').$model->image)){
                        unlink(Yii::getAlias('@category/').$model->image);
                    }
                    $model->image = $imageName;
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
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(file_exists(Yii::getAlias('@category/').$model->image)){
            unlink(Yii::getAlias('@category/').$model->image);
        }
        try {
            $model->delete();
        } catch (\Exception $e) {
            throw new \UnhandledMatchError('Category has not deleted.');
        } catch (\Throwable $e) {
            throw new NotFoundHttpException('Category does not exists.');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
