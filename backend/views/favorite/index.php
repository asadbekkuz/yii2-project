<?php

use common\models\Favorite;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\FavoriteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Favorites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorite-index">

    <div class="card">
        <div class="card-body">

            <p>
                <?= Html::a('<i class="fas fa-plus-circle"></i>  ' . Yii::t('app', 'Create Favorite'),
                    Url::to(['/favorite/create']),
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

            <?php Pjax::begin(['id' => 'pjaxGrid']); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'customer_id',
                    'product_id',
                    'added_at',
                    [
                        'class' => \common\components\widgets\ActionColumn::class,
                        'buttons' => [
                            'delete' => function ($url, $model) {
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
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
