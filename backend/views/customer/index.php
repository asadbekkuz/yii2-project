<?php

use common\models\Customer;
use yii\bootstrap4\LinkPager;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use common\components\widgets\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('<i class="fas fa-plus-circle"></i>  ' . Yii::t('app', 'Create Customer'),
                    Url::to(['/customer/create']),
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
                'pager' => [
                    'class' => LinkPager::class,
                    'prevPageLabel' => Yii::t('app','Prev'),
                    'nextPageLabel' => Yii::t('app','Next')
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
//                    'customer_user_id',
                    'first_name',
                    'last_name',
                    'middle_name',
                    'gender',
                    'birth_date',
//                    'registered_at',
                    'status',
                    [
                        'class' => ActionColumn::class
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>

</div>
