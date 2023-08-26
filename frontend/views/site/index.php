<?php

/** @var yii\web\View $this */

use frontend\widgets\Banner;
use frontend\widgets\MainBanner;
use frontend\widgets\Notice;
use frontend\widgets\RatedProduct;
use frontend\widgets\SingleCarousel;
use frontend\widgets\Slider;
use frontend\widgets\SpecialOffers;
use frontend\widgets\BestSeller;
use frontend\widgets\BannerBlock;
use frontend\widgets\TopCategory;
use frontend\widgets\BrandsCarousel;

$this->title = 'TechMarket';

?>
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?=Slider::widget() ?>
                    <?=Banner::widget() ?>
                    <?=SingleCarousel::widget() ?>
                    <?=Notice::widget() ?>
                    <?=MainBanner::widget() ?>
                    <?=RatedProduct::widget() ?>
                    <?=SpecialOffers::widget() ?>
                    <?=BestSeller::widget() ?>
                    <?=BannerBlock::widget() ?>
                    <?=TopCategory::widget() ?>
                    <?=BrandsCarousel::widget() ?>
                </main>
            </div>
        </div>
    </div>
</div>
