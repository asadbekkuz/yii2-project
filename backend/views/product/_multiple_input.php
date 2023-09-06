<?php

use unclead\multipleinput\MultipleInput;

?>
<?php

echo MultipleInput::widget([
    'max' => 10,
    'name' => '',
    'addButtonOptions' => [
        'class' => 'btn btn-success',
        'label' => '<i class="fas fa-plus"></i>'
    ],
    'removeButtonOptions' => [
        'label' => '<i class="fas fa-trash"></i>'
    ],
    'columns' => [
        [
            'name' => 'name',
            'title' => 'Specification Name',
        ],
        [
            'name' => 'value',
            'title' => 'Specification Value',
        ],
    ]
]);
?>

