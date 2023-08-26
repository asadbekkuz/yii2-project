<?php

namespace frontend\widgets;

use yii\base\Widget;

class SpecialOffers extends Widget
{
    public function run()
    {
        return $this->render('special-offers');
    }

}