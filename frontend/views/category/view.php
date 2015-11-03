<?php
/* @var $this yii\web\View */

$this->registerCssFile('@web/css/category.css', ['depends' => \frontend\assets\AppAsset::className()]);

$arrayPath = \common\models\Category::getCatalogPath($model->id, $allCategory);
array_pop($arrayPath);
foreach ($arrayPath as $path) {
    $category = \common\models\Category::findOne($path);
    $this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['/category/view', 'id' => $category->id]];
}
$this->params['breadcrumbs'][] = $model->name;
$rootId = \common\models\Category::getRootCatalogId($model->id, $allCategory);

$this->title = $model->name;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?= $this->render('/layouts/partials/catalogMenu', ['allCategory' => $allCategory]); ?>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?php if (count($products)):
                        foreach ($products as $product) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?= $product->thumb ?>" title="<?= $product->name ?>" alt="<?= $product->name ?>"/>
                                            <h2><?= $product->price ?></h2>
                                            <p><?= !empty($product->brief) ? $product->brief : '' ?></p>
                                            <a href="<?= Yii::$app->urlManager->createUrl(['product/view', 'id' => $product->id]) ?>" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?= $product->price ?></h2>

                                                <p><?= !empty($product->brief) ? $product->brief : '' ?></p>
                                                <a href="<?= Yii::$app->urlManager->createUrl(['product/view', 'id' => $product->id]) ?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>В избранное</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>В сравнение</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>

            </div>
        </div>
    </div>
</section>
<?php
$js = <<<JS

$(".submit").click(function(){
    if (parseInt($("#pricemin").val()) < 0 || parseInt($("#pricemax").val()) < 0) {
        alert("请输入正确的价格区间");
    } else {
        location.href = "?min=" + parseInt($("#pricemin").val()) + '&max=' + parseInt($("#pricemax").val());
    }
    return false;
});

JS;

$this->registerJs($js);
?>
