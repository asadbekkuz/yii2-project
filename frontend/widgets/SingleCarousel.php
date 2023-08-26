<?php

namespace frontend\widgets;


use yii\base\Widget;

class SingleCarousel extends Widget
{
    public function run()
    {
        return $this->render('single-carousel');
    }
}