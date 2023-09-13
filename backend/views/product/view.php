<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Image Upload', ['image-upload', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?=
            /** @var \common\models\Product $model */
            DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
                    'title',
                    'desc_list:ntext',
                    'description:ntext',
                    [
                        'attribute' =>'category_id',
                        'value' => fn($model)=>$model->category->name
                    ],
                    [
                        'attribute' => 'brand_id',
                        'value' => fn($model)=>$model->brand->name
                    ],
                    'SKU',
                    [
                        'attribute' =>'specification',
                        'value' => function($model){
                            $str = '';
                            for ($i=0;$i < (count($model->specification) - 1);$i++){
                                $str .= $model->specification[$i]['specification_name'].'|'.$model->specification[$i]['value'].'<br>';
                            }
                            return $str;
                        },
                        'format' => 'raw'
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => fn($model) => $model->showStatus($model->status)
                    ],
                    'price',
                    'new_price',
                    'created_at:datetime',
                    'updated_at:datetime',
//                    'deleted_at:datetime',
                ],
            ]) ?>
        </div>
    </div>
</div>
