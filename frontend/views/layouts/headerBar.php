    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

<?php
$js = <<<JS
jQuery("#favorite_wb").click(function(){
    var h = location.href;
    j = "Магазин Yii2"
    try {
        window.external.addFavorite(h, j);
    } catch(i) {
        try {
            window.sidebar.addPanel(j, h, "");
        } catch(i) {
            alert("");
        }
    }
});
jQuery("#main_nav").mouseenter(function(){
    jQuery(this).addClass('main_nav_hover');
    jQuery("#J_mainCata").css({"opacity":1,"height":95,"display":"block"})
});
jQuery("#main_nav").mouseleave(function(){
    jQuery(this).removeClass('main_nav_hover');
    jQuery("#J_mainCata").css({"opacity":0,"height":0,"display":"none"})
});

JS;
$this->registerJs($js);
?>