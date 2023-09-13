<?php

namespace backend\controllers;

use common\models\Specification;
use common\models\SpecificationLabel;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\db\Query;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if (!is_array($model->specification)) {
            $model->specification = array_values(json_decode($model->specification, true));
        }
        $model->specification = array_values($model->specification);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $model->specification = json_encode($model->loadSpecificationName($data['Specification']['specification_name']));
            if ($model->load($data) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (!is_array($model->specification)) {
            $model->specification = array_values(json_decode($model->specification, true));
        }
        $model->specification = array_values($model->specification);
        if ($this->request->isPost) {
            $data = Yii::$app->request->post();
            $model->specification = json_encode($model->loadSpecificationName($data['Product']['specification']));
            if ($model->load($data) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     *  Get specification labels
     * @return string
     */
    public function actionSpecificationName()
    {
        $category_id = Yii::$app->request->post('category');
        $specification_name = Specification::find()->select('specification_name')->where(['category_id' => $category_id])->asArray()->all();
        $model = new Specification();
        $model->specification_name = $specification_name;
        return $this->renderPartial('_multiple_input', [
            'model' => $model
        ]);
    }


}
