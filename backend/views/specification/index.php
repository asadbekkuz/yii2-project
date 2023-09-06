<?php

use common\models\Specification;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\SpecificationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Specifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specification-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('<i class="fas fa-plus-circle"></i>  ' . Yii::t('app', 'Create Specification'),
                    Url::to(['/specification/create']),
                    [
                        'class' => 'btn btn-outline-success',
                    ]) ?>
            </p>

            <?php Pjax::begin(); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
                    [
                        'attribute' => 'category_id',
                        'value' => fn($model) => $model->category?->name
                    ],
                    [
                        'attribute' => 'specification_label_id',
                        'value' => fn($model) => $model->specificationLabel?->name
                    ],
                    'specification_name',
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
                'pager' => [
                    'class' => 'yii\bootstrap4\LinkPager',
                    'prevPageLabel' => '<i class="fas fa-chevron-left"></i>', // Font Awesome icon for previous page
                    'nextPageLabel' => '<i class="fas fa-chevron-right"></i>', // Font Awesome icon for next page
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
