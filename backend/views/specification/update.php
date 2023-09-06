<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Specification $model */

$this->title = 'Update Specification: ' . $model->category?->name;
$this->params['breadcrumbs'][] = ['label' => 'Specifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specification-update">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
