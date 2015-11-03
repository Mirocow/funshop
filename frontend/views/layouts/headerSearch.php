<?php
use frontend\components\Nav;

$query = new \yii\db\Query();
$result = $query->select('sum(number) as number')->from('cart')->where(['or', 'session_id = "' . Yii::$app->session->id . '"', 'user_id = ' . (Yii::$app->user->id ? Yii::$app->user->id : -1)])->createCommand()->queryOne();
$totalNumber = $result['number'];
?>
<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="/"><img src="/images/home/logo.png" alt="" /></a>
                </div>
                <?php /*
                <div class="btn-group pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            USA
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">UK</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            DOLLAR
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canadian Dollar</a></li>
                            <li><a href="#">Pound</a></li>
                        </ul>
                    </div>
                </div>
 */ ?>
            </div>

            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-star"></i> Избранное</a></li>
                        <li class="hd_cart2">
                            <a class="tit " href="<?= Yii::$app->urlManager->createUrl(['/cart']) ?>">
                                <b class="glyphicon glyphicon-shopping-cart"></b>
                                <span class="<?=($totalNumber) ? 'with-ammount' : ''?>">Ваша корзина</span>
                                <em class="num" id="hd_cartnum" <?php if ($totalNumber > 0) { ?>style="visibility: visible"<?php } ?>><?= $totalNumber ?></em>
                            </a>
                        </li>
                        <li><a href="<?=Yii::$app->urlManager->createUrl(['site/login'])?>"><i class="fa fa-user"></i> Войти</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->

<?php
$js = <<<JS
jQuery("#searchText").focus(function(){
    if (jQuery("#searchText").val() == '请输入商品')
        jQuery("#searchText").val('');
});
jQuery("#searchText").blur(function(){
    if (jQuery("#searchText").val() == '')
        jQuery("#searchText").val('请输入商品');
});
jQuery("#search_fm").submit(function(){
    if (jQuery("#searchText").val() == '请输入商品' || jQuery("#searchText").val() == '')
        return false;
});
JS;

$this->registerJs($js);
?>
