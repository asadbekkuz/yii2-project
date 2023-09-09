<?php

namespace backend\controllers;

use common\models\Specification;
use common\models\SpecificationSearch;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpecificationController implements the CRUD actions for Specification model.
 */
class SpecificationController extends Controller
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
     * Lists all Specification models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SpecificationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Specification model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Specification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Specification();

        if ($this->request->isPost) {
            
            if ($model->load($this->request->post())) {
                if(is_array($model->specification_name)){
                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        foreach ($model->specification_name as $name) {
                            $specification =  new Specification();
                            $specification->category_id = $model->category_id;
                            $specification->specification_label_id = $model->specification_label_id;
                            $specification->specification_name = $name;
                            $specification->save();
                            $model->id = $specification->id;
                        }
                        // Commit the transaction if all database operations are successful
                        $transaction->commit();
                        Yii::$app->session->setFlash('message', 'Transaction completed successfully');
                    }catch (\Exception $exception){
                        // Rollback the transaction in case of an error
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('message', 'Transaction failed: ' . $exception->getMessage());
                    }

                    $model->specification_name = implode(',',$model->specification_name);
                }else{
                    $model->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Specification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @var Specification $model
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Specification model.
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
     * Finds the Specification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Specification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Specification::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
