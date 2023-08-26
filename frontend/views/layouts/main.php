<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\Footer;use frontend\widgets\Header;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="woocommerce-active page-template-template-homepage-v4 can-uppercase">
<?php $this->beginBody() ?>
<div id="page" class="hfeed site">

<?= Header::widget()?>

<?= Alert::widget() ?>

<?= $content ?>

<?= Footer::widget() ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
