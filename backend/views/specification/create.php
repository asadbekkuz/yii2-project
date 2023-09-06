<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Specification $model */

$this->title = 'Create Specification';
$this->params['breadcrumbs'][] = ['label' => 'Specifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
