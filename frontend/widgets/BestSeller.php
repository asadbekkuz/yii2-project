<?php

namespace frontend\widgets;

use yii\base\Widget;

class BestSeller extends Widget
{
    public function run()
    {
        return $this->render('best-seller');
    }

}