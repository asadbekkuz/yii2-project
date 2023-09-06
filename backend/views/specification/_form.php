<?php

use common\models\Category;
use common\models\Specification;
use common\models\SpecificationLabel;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Specification $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="specification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), [
        'prompt' => 'select category ...'
    ]) ?>
    <?= $form->field($model, 'specification_label_id')->dropDownList(ArrayHelper::map(SpecificationLabel::find()->all(), 'id', 'name'), [
        'prompt' => 'select specification label ...'
    ]) ?>

    <?= $form->field($model, 'specification_name')->widget(MultipleInput::class, [
        'max' => 20,
        'addButtonOptions' => [
            'class' => 'btn btn-success',
            'label' => '<i class="fas fa-plus"></i>' // also you can use html code
        ],
        'removeButtonOptions' => [
            'label' => '<i class="fas fa-trash"></i>'
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
