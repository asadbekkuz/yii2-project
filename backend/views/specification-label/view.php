<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\SpecificationLabel $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Specification Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="specification-label-view">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                ],
            ]) ?>
        </div>
    </div>
</div>
