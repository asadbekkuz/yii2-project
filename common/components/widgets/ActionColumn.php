<?php

namespace common\components\widgets;

class ActionColumn extends \yii\grid\ActionColumn
{
    public $template = '{update} {delete} {view}';

    public $icons = [
        'pencil' => '<i class="fas fa-pen"></i>',
        'trash' => '<i class="fas fa-trash"></i>',
        'eye' => '<i class="far fa-eye"></i>'
    ];
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye',[ 'class' => 'btn btn-outline-info view-button']);
        $this->initDefaultButton('update', 'pencil',['class' => 'btn btn-outline-primary update-button']);
        $this->initDefaultButton('delete', 'trash', ['class' => 'btn btn-outline-danger delete-button']);
    }

    public $contentOptions = ['style' => 'width:160px'];
}

