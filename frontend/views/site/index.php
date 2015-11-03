<?php

/* @var $this yii\web\View */
$this->title = 'Funshop';
$this->registerCssFile('@web/css/index.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerJsFile('@web/js/switchable.js', ['depends' => \frontend\assets\AppAsset::className()]);
?>


    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>


                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Популярные товары</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php foreach ($products as $k => $item) : ?>
                                    <div class="col-sm-4 <?=$k+1?>">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?= $item->thumb ?>" alt="">
                                                    <h2><?= $item->price ?> <i class="fa fa-ruble"></i></h2>
                                                    <p><?= $item->name ?></p>
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['product/view', 'id' => $item->id]) ?>" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i>Подробнее</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php if( (($k+1) % 3) == 0): ?>
                                    </div>
                                    <div class="item">
                                <?php endif;?>
                                <?php endforeach; ?>
                                    </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section><!--/slider-->



<?php
$js = <<<JS
if ($("#index-slide").find("li").length == 1) {
    $("#index-slide").find(".trigger-box").hide();
}
a(0);
$('#index-slide').switchable({
    triggers: $('#index-slide').find(".trigger-box"),
    panels: "li",
    effect: "fade",
    interval: 5,
    autoplay: true,
    beforeSwitch: function(f, d) {
        a(d);
    }
});
function a(e) {
    var f = $('#index-slide').find("li").eq(e),
            d = f.data("img");
    if (d != "none" && d != undefined) {
        f.css("background-image", "url(" + d + ")").data("img", "none");
    }
}
JS;

$this->registerJs($js);
?>