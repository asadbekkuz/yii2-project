<?php

use unclead\multipleinput\MultipleInput;
use yii\widgets\ActiveForm;

/** @var \common\models\Specification $model */
/** @var \common\models\Specification $count */

$form = ActiveForm::begin();

echo $form->field($model, 'specification_name')->widget(MultipleInput::class, [
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
])->label(false);


ActiveForm::end();
