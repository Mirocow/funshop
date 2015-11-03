<?php
/* @var $this yii\web\View */
use common\models\Product;
use common\models\Category;
use yii\helpers\Url;

$isFavorite = 0;
if (!Yii::$app->user->isGuest) {
    $favorite = \common\models\Favorite::find()->where(['user_id' => Yii::$app->user->id, 'product_id' => $model->id])->one();
    if ($favorite) {
        $isFavorite = 1;
    }
}
$urlAddToCart = Yii::$app->urlManager->createUrl(['cart/add-to-cart']);
$urlFavorite = Yii::$app->urlManager->createUrl(['product/favorite']);
$urlLogin = Yii::$app->urlManager->createUrl(['site/login']);
$urlConsultationAdd = Yii::$app->urlManager->createUrl(['consultation/ajax-add']);
$urlComment = Yii::$app->urlManager->createUrl(['product/comment']);
$urlConsultation = Yii::$app->urlManager->createUrl(['product/consultation']);

$arrayPath = Category::getCatalogPath($model->category_id, $allCategory);
foreach ($arrayPath as $path) {
    $category = Category::findOne($path);
    $this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['/category/view', 'id' => $category->id]];
}
$this->params['breadcrumbs'][] = $model->name;

$countCommentsPassed = count($model->commentsPassed);
$starGoodPercent = $starNormalPercent = $starBadPercent = 0;
if ($countCommentsPassed > 0) {
    $starGoodPercent = Yii::$app->formatter->asPercent(count($model->commentsPassedGood) / $countCommentsPassed);
    $starNormalPercent = Yii::$app->formatter->asPercent(count($model->commentsPassedNormal) / $countCommentsPassed);
    $starBadPercent = Yii::$app->formatter->asPercent(count($model->commentsPassedBad) / $countCommentsPassed);
}

$products = Product::find()->where(['category_id' =>$category->id, 'status'=> 1])->all();


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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">

                            <img src="<?= $model->image ?>" alt=""/>

                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <? /*
                                    <?php foreach ($model->productImagesSort as $k => $image): ?>
                                        <?php if( ($k + 1) % 3): ?>
                                            <div class="item <?= ($k == 0) ? 'active' : '' ?>">
                                        <?php endif; ?>
                                            <img data-k="<?=$k?>" alt="<?= $model->name ?>" src="<?= $image->thumb ?>" data-view="<?= $image->image ?>"/>
                                        <?php if( (($k + 1) % 3) || !isset($model->productImagesSort[$k+1]) ): ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
*/ ?>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="/images/product-details/new.jpg" class="newarrival" alt=""/>

                            <h2><?= $model->name ?></h2>

                            <p>Web ID: 1089772</p>
								<span>
									<span><?= $model->price ?></span>
									<input type="hidden" value="3"/>
                                    <span class="add_cart_li"></span>

								</span>
                            <?php if ($isFavorite): ?>
                                <a href="javascript:;" class="graybtn" id="has_fav_btn"><i
                                        class="glyphicon glyphicon-heart"></i> Удалить в избранное</a>
                            <?php else: ?>
                                <a href="javascript:;" class="graybtn" id="fav_btn"><i
                                        class="glyphicon glyphicon-heart-empty"></i> Добавить в избранное</a>
                            <?php endif; ?>

                            <p><b>Availability:</b> In Stock</p>

                            <p><b>Condition:</b> New</p>

                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive" alt=""/></a>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Описание</a></li>
                            <li><a href="#reviews" data-toggle="tab">Вопрос ответ
                                    (<?= count($model->consultationsPassed) ?>)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade  active in" id="details">
                            <?php if ($model->brief): ?>
                                <?= $model->brief ?>
                            <?php endif; ?>
                            <h2>Описание</h2>
                            <?= Yii::$app->formatter->asHtml($model->content) ?>

                        </div>

                        <div class="tab-pane fade" id="reviews">
                            <div class="col-sm-12">
                                <div class="ask-form cle">

                                    <textarea id="consultation-question" placeholder="Напишите Ваш вопрос"></textarea>
                                    <a href="javascript:;" class="graybtn" id="consultation-btn">Задать вопрос</a>

                                    <div class="fr">
                                        <p><b>Важно:</b> Все вопросы проходят модерацию, для получения оперативной
                                            информации свяхитесь с нашими менеджерами</p>
                                    </div>
                                    <div class="ask-list" id="ask-list">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Смотрите также</h2>

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
                        <a class="left recommended-item-control" href="#recommended-item-carousel"
                           data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel"
                           data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<?php

$this->registerJs('
var product = {productId:' . $model->id . ', stock:' . $model->stock . ', csrf:"' . Yii::$app->request->getCsrfToken() . '"};
var user = {id:' . (Yii::$app->user->isGuest ? 0 : Yii::$app->user->id) . ', favorite:' . $isFavorite . '};
var urlCartAdd = "' . Yii::$app->urlManager->createUrl(['cart/ajax-add']) . '";
');
$js = <<<JS
var view = $("#pic-view");
var thumb = $("#item-thumbs");
var clone = thumb.find('img').eq(0).clone();
var len = thumb.find('li').length;
var _left = 66;
var  show = null;
clone.insertAfter(view);
thumb.append('<div class="arrow"><i class="icon iconfont">^</i></div>');
var arrow = thumb.find('div.arrow');
arrow.css({
    'left': _left
}).show();
if (len < 5) {
    var l = 5 - len;
    _left += l * 33;
    arrow.css({
        'left': _left
    }).show();
    thumb.find('ul').css({
        'width': 66 * len
    });
}
thumb.find('li').eq(0).addClass('current');
thumb.find('li').mouseenter(function(){
    var _li = $(this);
    if (_li.hasClass('current')) {
        return false;
    }
    var _i = _li.index();
    var _img = _li.find('img');
    _ssrc = _img.attr('src');
    _bsrc = _img.data('view');

    arrow.css({
        'left': _i * 66 + _left
    });
    _li.addClass('current').siblings('li').removeClass('current');
    clone.attr('src', _ssrc);
    view.attr('src', _bsrc);

});



if (product.stock > 0) {
    $(".add_cart_li").html('<a href="javascript:;" class="btn btn-fefault cart" id="buy_btn"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>');
} else {
    $(".add_cart_li").html('<span>Нет в наличии</span>');
}


$("#pjxqitem").hide();
$("#askitem").hide();

jQuery(".minus").click(function(){
    $("#input-buy-number").val(parseInt($("#input-buy-number").val()) - 1);
    if (parseInt($("#input-buy-number").val()) < 1 ) {
        $("#input-buy-number").val(1);
    }
});//end click
jQuery(".add").click(function(){
    $("#input-buy-number").val(parseInt($("#input-buy-number").val()) + 1);
    if (parseInt($("#input-buy-number").val()) > product.stock ) {
        $("#input-buy-number").val(product.stock);
    }
});//end click


jQuery("#buy_btn").click(function(){
    var number = $("#input-buy-number").val();
    if (number > product.stock) {
        alert('На складе нет такого количества товара');
    } else {
        $(this).html('<img src="/images/loading.gif" /> Добавляем');
        param = {
            productId : product.productId,
            // number : $("#input-buy-number").val(),
            number : 1,
            _csrf : product.csrf
        };
        $.post(urlCartAdd, param, function(data) {
            if (data.status > 0) {
                location.href = "{$urlAddToCart}?id=" + product.productId;
            }
        }, "json");
    }

});
$("#fav_btn").click(function(){
    if (user.id > 0) {
        $.get("{$urlFavorite}?id=" + product.productId, function(data, status) {
            if (status == "success") {
                if (data.status) {
                    $("#fav_btn").html('<i class="glyphicon glyphicon-heart"></i> В избранном</a>');
                }
            }
        }, "json");
    } else {
        location.href = '{$urlLogin}?returnUrl=' + window.location.href;
    }
});


$(".spxqitem").click(function(){
    $("#tabs_bar li").removeClass('current_select');
    $(this).parent().addClass('current_select');
    $("#spxqitem").show();
    $("#pjxqitem").hide();
    $("#askitem").hide();
});
$(".pjxqitem").click(function(){
    $("#tabs_bar li").removeClass('current_select');
    $(this).parent().addClass('current_select');
    $("#spxqitem").hide();
    $("#pjxqitem").show();
    $("#askitem").hide();
});
$(".askitem").click(function(){
    $("#tabs_bar li").removeClass('current_select');
    $(this).parent().addClass('current_select');
    $("#spxqitem").hide();
    $("#pjxqitem").hide();
    $("#askitem").show();
});

$.ajax({
    url: "{$urlComment}?productId=" + {$model->id},
    type: "GET",
    dataType: "html",
    success: function(data){
        $('.z-com-list').html(data);
    }
}).fail(function(){
        alert("Error");
});


$('.z-com-list').on('click', '.pagination a', function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        dataType: "html",
        success: function(data){
            $('.z-com-list').html(data);
        }

    }).fail(function(){
            alert("Error");
    });

});

$('.z-com-list').on('click', 'a.up', function(e){
    var up = $(this);
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            //alert(data.up);
            up.html("赞 ( <i>" + data.up + "</i> )");
        }
    }, 'json');
});

$("#consultation-btn").click(function(){
    if (user.id > 0) {
        param = {
            productId : product.productId,
            question : $("#consultation-question").val(),
            _csrf : product.csrf
        };
        $.post("{$urlConsultationAdd}", param, function(data) {
            if (data.status > 0) {
                alert("你的咨询已提交成功，我们会尽快回复你的哦。");
                $("#consultation-question").val('');
            }
        }, "json");
    } else {
        location.href = '$urlLogin?returnUrl=' + window.location.href;
    }
});


$.ajax({
    url: "{$urlConsultation}?productId=" + {$model->id},
    type: "GET",
    dataType: "html",
    success: function(data){
        $('.ask-list').html(data);
    }
}).fail(function(){
        alert("Error");
});

$('.ask-list').on('click', '.pagination a', function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        dataType: "html",
        success: function(data){
            $('.ask-list').html(data);
        }

    }).fail(function(){
        alert("Error");
    });

});

JS;

$this->registerJs($js);
?>
