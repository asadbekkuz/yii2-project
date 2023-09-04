<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Favorite $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="favorite-view">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'customer_id',
                    'product_id',
                    'added_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
