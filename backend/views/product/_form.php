<?php

use common\models\Brand;
use common\models\Category;
use common\models\Product;
use kartik\switchinput\SwitchInput;
use unclead\multipleinput\MultipleInput;
use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
            'id'=>'product-form'
    ]); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'brand_id')->dropDownList(
                ArrayHelper::map(Brand::find()->active()->all(), 'id', 'name'), [
                    'prompt' => 'Select brand...'
                ]
            )->label('<span style="color:red">*</span> Brand') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> Title') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'SKU')->textInput(['maxlength' => true])->label('<span style="color:red">*</span> SKU') ?>
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
        <div class="col-lg-10">
            <?= $form->field($model, 'category_id')->dropDownList(
                ArrayHelper::map(Category::find()->active()->all(), 'id', 'name'), [
                    'prompt' => 'Select category...',
                    'id' => 'category-dropdown'
                ]
            )->label('<span style="color:red">*</span> Category') ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'status')->widget(SwitchInput::class, [
                'value' => true
            ]) ?>
        </div>
    </div>

    <div class="row">
            <div class="col-lg-12" id="multiple-input-container">
                <?= $form->field($model, 'specification')->widget(MultipleInput::class, [
                    'max' => 10,
                    'addButtonOptions' => [
                        'class' => 'btn btn-success',
                        'label' => '<i class="fas fa-plus"></i>' // also you can use html code
                    ],
                    'removeButtonOptions' => [
                        'label' => '<i class="fas fa-trash"></i>'
                    ],
                    'columns' => [
                        [
                            'name' => 'specification_name',
                            'title' => 'Specification Name',
                        ],
                        [
                            'name' => 'value',
                            'title' => 'Specification Value',
                        ],
                    ]
                ])->label(false); ?>
            </div>
    </div>

    <?= $form->field($model, 'desc_list')->widget(Widget::class, [
        'settings' => [
            'lang' => 'en',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'description')->widget(Widget::class, [
        'settings' => [
            'lang' => 'en',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="far fa-save"></i>&nbsp&nbsp' . Yii::t('app', 'Save'), [
            'class' => 'btn btn-warning',
            'id' => 'saveButton'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$this->registerJs("
    $('#category-dropdown').on('change', function() {
        var selectedCategory = $(this).val();
        $.ajax({
            url: '" . Url::to(['product/specification-name']) . "',
            type: 'post',
            data: { category: selectedCategory },
            success: function(response) {
                $('#multiple-input-container').html(response);
            }
        });
    });
");
?>