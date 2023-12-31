<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Specification $model */

$this->title = 'Create Specification';
$this->params['breadcrumbs'][] = ['label' => 'Specifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specification-create">
    <div class="card">
        <div class="card-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
