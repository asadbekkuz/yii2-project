<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Category $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'PID',
                    'name',
                    [
                        'attribute' => 'status',
                        'value' => fn($model) => $model->getStatusBadge($model->status),
                        'format' => 'html'
                    ],
                    [
                        'attribute' => 'image',
                        'value' => fn($model) => Html::img(Yii::$app->params['imagePath'].'/category/'.$model->image,['width'=>'50px']),
                        'format' => 'raw'
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
