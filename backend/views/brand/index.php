<?php


use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\BrandSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">
    <div class="card">
        <div class="card-body">

            <p>
                <?= Html::a('<i class="fas fa-plus-circle"></i>  ' . Yii::t('app', 'Create Brand'),
                    Url::to(['/brand/create']),
                    [
                        'class' => 'btn btn-outline-success',
                        'id' => 'create-button'
                    ]) ?>
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
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//                    'id',
                    'name',
                    [
                        'attribute' => 'logo',
                        'value' => fn($model) => "<div class='card'><div class='card-body'>".Html::img(Yii::$app->params['imagePath'].'/brand/'.$model->logo,['width'=>'100px'])."</div></div>",
                        'format' => 'raw'
                    ],
                    'short_name',
                    [
                        'attribute' => 'status',
                        'value' => fn($model) => $model->getStatusBadge($model->status),
                        'format' => 'html',
                        'filter' => ['1' => 'Active', '0' => 'Inactive'], // Dropdown filter options
                        'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'All'], // Additional filter options
                    ],
                    [
                        'class' => \common\components\widgets\ActionColumn::class,
                        'buttons' => [
                                'delete' => function($url,$model) {
                                    return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-outline-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
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
