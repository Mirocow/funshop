<?php
use backend\assets\ColorAdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

ColorAdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title); ?></title>
    <?= Html::csrfMetaTags(); ?>
    <?php $this->head(); ?>
</head>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>

