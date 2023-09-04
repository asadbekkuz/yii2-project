<?php

use common\models\Category;
use common\models\Customer;
use common\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Favorite $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="favorite-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'id' => 'saveForm',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'customer_id')->dropDownList(ArrayHelper::map(Customer::find()->all(),'id','first_name'),[
        'prompt' => 'select customer ...'
    ]) ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(),'id','title'),[
        'prompt' => 'select product ...'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'saveButton']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
