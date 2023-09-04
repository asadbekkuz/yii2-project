<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Brand;
use common\models\Customer;
use common\models\Product;
use yii\helpers\ArrayHelper;



/** @var yii\web\View $this */
/** @var common\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> First Name') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'birth_date')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> Birth Date') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> Last Name') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'gender')->dropDownList(Customer::getCustomerGenderLabels())->label('<span style="color:red">*</span> Gender') ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> Middle Name') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'status')->dropDownList(Customer::getCustomerStatusLabels())->label("<span style='color:red'>*</span> Status") ?>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo '<label class="control-label">Rasmlarni yuklash</label>';
            echo FileInput::widget([
                'model' => $model,
                'attribute' => 'gallery[]',
                'options' => ['multiple' => true]
            ]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('<i class="far fa-save"></i>&nbsp&nbsp'.Yii::t('app', 'Save'), [
            'class' => 'btn btn-warning',
            'id' => 'saveButton'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>