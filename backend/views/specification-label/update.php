<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SpecificationLabel $model */

$this->title = 'Update Specification Label: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Specification Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specification-label-update">
    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
