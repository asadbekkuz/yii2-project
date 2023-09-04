<?php

use common\models\Category;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Category $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
            'id' => 'saveForm',
            'options' => ['enctype' => 'multipart/form-data'],
            'method' => 'post'
    ]); ?>

    <?= $form->field($model, 'PID')->dropDownList(ArrayHelper::map(Category::find()->all(),'id','name'),[
            'prompt' => 'select category ...'
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class,[
        'value' => true
    ]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','id' => 'saveButton']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
