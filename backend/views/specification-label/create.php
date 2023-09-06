<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SpecificationLabel $model */

$this->title = 'Create Specification Label';
$this->params['breadcrumbs'][] = ['label' => 'Specification Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specification-label-create">
    <div class="card">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
