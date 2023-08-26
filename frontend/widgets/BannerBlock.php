<?php

namespace frontend\widgets;

use yii\base\Widget;

class BannerBlock extends Widget
{
    public function run()
    {
        return $this->render('banner-block');
    }

}