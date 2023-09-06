<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Specification $model */

$this->title = $model->category?->name;
$this->params['breadcrumbs'][] = ['label' => 'Specifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="specification-view">
    <div class="card">
        <div class="card-body">
            <?= Yii::$app->session->getFlash('message');   ?>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
                    [
                        'attribute' => 'category_id',
                        'value' => fn($model) => $model->category?->name
                    ],
                    [
                        'attribute' => 'specification_label_id',
                        'value' => fn($model) => $model->specificationLabel?->name
                    ],
                    'specification_name'
                ],
            ]) ?>
        </div>
    </div>
</div>
