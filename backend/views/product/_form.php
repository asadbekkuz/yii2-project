<?php

use common\models\Brand;
use common\models\Category;
use common\models\Product;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> Title') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'SKU')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> SKU') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'specification')->textInput()->label('<span style="color:red">*</span> Specification') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'status')->widget(SwitchInput::class,[
                'value' => true
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'price')->textInput()->label('<span style="color:red">*</span> Price') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'new_price')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'category_id')->dropDownList(
                    ArrayHelper::map(Category::find()->active()->all(),'id','name'),[
                            'prompt' => 'Select category...'
                ]
            )->label('<span style="color:red">*</span> Category') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'brand_id')->dropDownList(
                ArrayHelper::map(Brand::find()->active()->all(),'id','name'),[
                    'prompt' => 'Select brand...'
                ]
            )->label('<span style="color:red">*</span> Brand') ?>
        </div>
    </div>

    <?= $form->field($model, 'desc_list')->textarea(['rows' => 4,'style' => ['resize'=>'none']]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4,'style' => ['resize'=>'none']]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="far fa-save"></i>&nbsp&nbsp'.Yii::t('app', 'Save'), [
            'class' => 'btn btn-warning',
            'id' => 'saveButton'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
