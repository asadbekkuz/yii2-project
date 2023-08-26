<?php

namespace frontend\widgets;

use yii\base\Widget;

class Banner extends Widget
{
    public function run()
    {
        return $this->render('banner');
    }
}