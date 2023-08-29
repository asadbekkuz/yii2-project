<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form row">
    <div class="card card-primary col-md-12">
        <div class="card-header ">
            <h3 class="card-title">Create Customer</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="card-body row">
        <div class="col-md-6">


        <div class="form-group">

            <?= $form->field($model, 'first_name', [
                'template' => '{label}{input}{error}',
                'labelOptions' => [
                    'for' => 'firstname'
                ],
                'inputOptions' => [
                    'id' => 'firstname',
                    'class' => 'form-control',
                    'placeholder' => 'Enter First Name'
                ]

            ])->textInput(['maxlength' => true]) ?>

        </div>

        <div class="form-group">

            <?= $form->field($model, 'last_name', [
                'template' => '{label}{input}{error}',
                'labelOptions' => [
                    'for' => 'lastname'
                ],
                'inputOptions' => [
                    'id' => 'lastname',
                    'class' => 'form-control',
                    'placeholder' => 'Enter Last Name'
                ]

            ])->textInput(['maxlength' => true]) ?>

        </div>

        <div class="form-group">

            <?= $form->field($model, 'middle_name', [
                'template' => '{label}{input}{error}',
                'labelOptions' => [
                    'for' => 'middlename'
                ],
                'inputOptions' => [
                    'id' => 'middlename',
                    'class' => 'form-control',
                    'placeholder' => 'Enter Middle Name'
                ]

            ])->textInput(['maxlength' => true]) ?>

        </div>


        </div>

        <div class="col-md-6">

            <div class="row">
                <div class="col-sm-6">
                    <div class="custom-control custom-radio">

                        <?= $form->field($model, 'gender')->label('Gender')->radioList([
                            0 =>'Male',
                            1 =>'Female',
                        ])  ?>

                    </div>
                </div>
                <div class="col-sm-6">

                <?= $form->field($model, 'status')->dropDownList([
                    '0' => 'Active',
                    '1' => 'Inactive',
                    '2'=>'Deleted'
                ]); ?>
                </div>

            </div>
            <?= $form->field($model, 'birth_date')->textInput() ?>

            <?= $form->field($model, 'registered_at')->textInput() ?>

        </div>
        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

