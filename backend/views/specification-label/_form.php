<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SpecificationLabel $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="specification-label-form">

    <?php $form = ActiveForm::begin([
        'id' => 'saveForm',
        'method' => 'post'
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','id' => 'saveButton']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
