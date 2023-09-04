<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Brand $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="brand-view">
    <div class="card">
        <div class="card-body">
            <h3><?= Html::encode($this->title) ?></h3>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    [
                        'attribute' => 'logo',
                        'value' => fn($model) => Html::img(Yii::$app->params['imagePath'].'/brand/'.$model->logo,['width'=>'50px']),
                        'format' => 'raw'
                    ],
                    'short_name',
                    [
                        'attribute' => 'status',
                        'value' => fn($model) => $model->getStatusBadge($model->status),
                        'format' => 'html'
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
