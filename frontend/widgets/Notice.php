<?php

namespace frontend\widgets;

use yii\base\Widget;

class Notice extends Widget
{
    public function run()
    {
        return $this->render('notice');
    }

}