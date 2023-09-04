<?php


use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Brand $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="brand-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'id' => 'saveForm',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput([
        'accept' => 'image/*'
    ]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class,[
         'value' => true
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'saveButton']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
