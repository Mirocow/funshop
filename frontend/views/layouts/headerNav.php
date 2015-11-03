<?php
use frontend\components\Nav;

$query = new \yii\db\Query();
$result = $query->select('sum(number) as number')->from('cart')->where(['or', 'session_id = "' . Yii::$app->session->id . '"', 'user_id = ' . (Yii::$app->user->id ? Yii::$app->user->id : -1)])->createCommand()->queryOne();
$totalNumber = $result['number'];

?>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li>
                                        <a class="tit" href="<?= Yii::$app->urlManager->createUrl(['/cart']) ?>">
                                            <b class="glyphicon glyphicon-shopping-cart"></b>
                                            Ваша корзина<span><i class="glyphicon glyphicon-play"></i></span>
                                            <em class="num" id="hd_cartnum" <?php if ($totalNumber > 0) { ?>style="visibility: visible"<?php } ?>><?= $totalNumber ?></em>
                                        </a>

                                    </li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header-bottom-->

<?php
$js = <<<JS
jQuery("#J_mainCata").mouseenter(function(){
    jQuery("#J_mainCata").css({"opacity":1,"height":95,"display":"block"})
});
jQuery("#J_mainCata").mouseleave(function(){
    //jQuery("#J_mainCata").css({"opacity":0,"height":0,"display":"none"})
});
jQuery("#head_cart").mouseenter(function(){
    jQuery(this).addClass('hd_cart_hover');
    jQuery.getJSON("/cart/json-list", function(data, status) {
        if (status == "success") {
            var str = data_class = '';
            jQuery.each(data.data, function(l, v){
                str += '<dl><dt><a target="_blank" href="/product/' + v.product_id + '"><img src="' + v.thumb + '"></a></dt><dd><h4><a target="_blank" href="/product/' + v.product_id + '">' + v.name + '</a></h4><p><span class="red">￥' + v.price + "</span>&nbsp;<i>X</i>&nbsp;" + v.number + '</p><a class="iconfont del" title="删除" href="javascript:;" data-lid="' + v.id + '" data-taocan="">&#x164;</a></dd></dl>';
                if (l > 5) {
                    data_class = " data_over";
                }
            });
            str += '<div class="data">' + data_class + '</div>' +
                '<div class="count">共<span class="red" id="hd_cart_count">' + data.totalNumber + '</span>' +
                '件商品，满99元就包邮哦~<p>总价:<span class="red">￥<em id="hd_cart_total">' + data.totalPrice + '</em></span>' +
                '<a href="/cart" class="btn">去结算</a></p>' +
                '</div>';
            jQuery("#head_cart").find('.list').html(str);
        }
    }).error(function(){
        jQuery("#head_cart").find('.list').html('<p class="fail"><i class="iconfont">&#371;</i><br>购物车数据加载失败<br>请稍后再试</p>');
    });
});
jQuery("#head_cart").mouseleave(function(){
    jQuery(this).removeClass('hd_cart_hover');
});
JS;

$this->registerJs($js);
?>