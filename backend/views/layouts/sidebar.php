<?php

use \yii\helpers\Url;

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link">
        <img src="<?= Yii::getAlias('@web') ?>/img/AdminLTELogo.png" alt="Ecommerce Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::getAlias('@web') ?>/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?? 'Username' ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => Yii::t('app', 'Dashboard'),
                        'url' => Url::to(['/site/index']),
                        'icon' => 'fas fa-home',
                    ],
                    [
                        'label' => Yii::t('app', 'Products'),
                        'icon' =>'fas fa-archive',
                        'items' => [
                            ['label' => Yii::t('app', 'Product'), 'url' => Url::to(['/product/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Category'), 'url' => Url::to(['/category/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Brand'), 'url' => Url::to(['/brand/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Favorite'), 'url' => Url::to(['/favorite/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Specification'), 'url' => Url::to(['/specification/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Specification Label'), 'url' => Url::to(['/specification-label/index']), 'iconStyle' => 'far'],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Customer'),
                        'icon' => 'fas fa-user-tie',
                        'items' => [
                            ['label' => Yii::t('app', 'Customer'), 'url' => Url::to(['/customer/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Review'), 'url' => Url::to(['/review /index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Customer Address'), 'url' => Url::to(['/customer-address/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Customer User'), 'url' => Url::to(['/customer-user/index']), 'iconStyle' => 'far'],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Payment'),
                        'icon' =>'fas fa-money-check-alt',
                        'items' => [
                            ['label' => Yii::t('app', 'Payment'), 'url' => Url::to(['/payment/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Payment Method'), 'url' => Url::to(['/payment-method/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'Payment System'), 'url' => Url::to(['/payment-system/index']), 'iconStyle' => 'far'],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Address'),
                        'icon' => 'fas fa-map-marker-alt',
                        'items' => [
                            ['label' => Yii::t('app', 'Region'), 'url' => Url::to(['/region/index']), 'iconStyle' => 'far'],
                            ['label' => Yii::t('app', 'District'), 'url' => Url::to(['/district/index']), 'iconStyle' => 'far'],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Order'),
                        'icon' =>'fas fa-shipping-fast',
                        'url' => Url::to(['/order/index'])
                    ],
                    [
                        'label' => Yii::t('app', 'Cart'),
                        'url' => Url::to(['/cart/index']),
                        'icon' => 'fas fa-shopping-cart',
                    ],
                    [
                        'label' => Yii::t('app', 'Workers'),
                        'url' => Url::to(['/user/index']),
                        'icon' => 'fas fa-users',
                    ],
                    [
                        'label' => Yii::t('app', 'SEO'),
                        'url' => Url::to(['/meta-tag/index']),
                        'icon' => 'fas fa-user-tag'
                    ],
                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>