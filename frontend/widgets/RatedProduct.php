<?php

namespace frontend\widgets;

use yii\base\Widget;

class RatedProduct extends Widget
{
    public function run()
    {
        return $this->render('rated-product');
    }

}