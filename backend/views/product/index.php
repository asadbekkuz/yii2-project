<?php


use yii\bootstrap4\LinkPager;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use common\components\widgets\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('<i class="fas fa-plus-circle"></i>  ' . Yii::t('app', 'Create Product'),
                    Url::to(['/product/create']),
                    ['class' => 'btn btn-outline-success']) ?>
            </p>

            <?php Modal::begin([
                'id' => 'modal',
                'size' => Modal::SIZE_LARGE
            ]);

            echo "<div id='modal-content'></div>";

            Modal::end(); ?>

            <?php Pjax::begin(['id'=>'pjaxGrid']); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager' => [
                    'class' => LinkPager::class,
                    'prevPageLabel' => Yii::t('app','Prev'),
                    'nextPageLabel' => Yii::t('app','Next')
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
                    'title',
//                    'desc_list:ntext',
//                    'description:ntext',
                    [
                        'attribute' =>'category_id',
                        'value' => fn($model)=>$model->category->name
                    ],
//                    'brand_id',
                    //'SKU',
                    //'specification',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => fn($model) => $model->showStatus($model->status)
                    ],
                    'price',
                    'new_price',
                    'created_at:datetime',
//                    'updated_at',
                    //'deleted_at',
                    [
                        'class' => ActionColumn::class,
                        'template' => '{update} {delete} {view}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-outline-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                            'view' => function($url,$model) {
                                return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-info']);
                            },
                            'update' => function($url,$model) {
                                return Html::a('<i class="fas fa-pen"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);
                            }
                        ],
                        'contentOptions' => [
                            'style' => [
                                'width' => '156px'
                            ]
                        ]
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
