<?php
/* @var $this yii\web\View */
$this->registerCssFile('@web/css/cart.css', ['depends' => \frontend\assets\AppAsset::className()]);
$totalNumber = 0;
$totalPrice = 0;
foreach($products as $product) {
    $totalNumber += $product->number;
    $totalPrice += $product->number * $product->price;
}
?>

    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Товар</td>
                        <td class="description"> </td>
                        <td class="price">Цена</td>
                        <td class="quantity">Количество</td>
                        <td class="total">Итого</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($products as $product) : ?>

                    <tr>
                        <td class="cart_product">
                            <a href="<?= Yii::$app->urlManager->createUrl(['product/view', 'id' => $product->product_id]) ?>" target="_blank" >
                                <img src="<?= $product->thumb ?>" alt="<?= $product->name ?>" >
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="<?= Yii::$app->urlManager->createUrl(['product/view', 'id' => $product->product_id]) ?>" target="_blank">
                                    <?= $product->name ?>
                                </a></h4>
                            <p>ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p><?= $product->price ?> <i class="fa fa-rouble"></i></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button nums">
                                <a class="cart_quantity_down minus" href="#" data-link="<?= Yii::$app->urlManager->createUrl(['cart/index', 'type' => 'minus', 'product_id' => $product->product_id]) ?>"> - </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="<?= $product->number ?>" autocomplete="off" size="2">
                                <a class="cart_quantity_up add" href="#" data-link="<?= Yii::$app->urlManager->createUrl(['cart/index', 'type' => 'add', 'product_id' => $product->product_id]) ?>"> + </a>
                            </div>

                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?=$totalPrice?><i class="fa fa-rouble"></i></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="<?= Yii::$app->urlManager->createUrl(['cart/delete', 'id' => $product->product_id]) ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <tr class="cart_menu_footer">
                        <td class="text-right" colspan="6">
                            Итого: <?= $totalNumber ?> товара, на сумму <strong><?=$totalPrice?></strong> рублей
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="row">
                <a class="btn btn-default btn-success check_out" href="<?=Yii::$app->urlManager->createUrl(['cart/checkout'])?>"><i class="fa fa-check"></i> Оформить</a>
                <a class="btn btn-default check_out" href="<?= Yii::$app->urlManager->createUrl(['cart/destroy']) ?>"><i class="fa fa-times"></i> Очистить</a>
            </div>
        </div>
    </section> <!--/#cart_items-->



<?php
$urlCurrent = Yii::$app->urlManager->baseUrl;
$js = <<<JS
jQuery(".minus").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            location.reload();
        }
    });
});//end click
jQuery(".add").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            location.reload();
        }
    });
});//end click
jQuery(".nums input").change(function(){
    var link = $(this).data('link');
    $.get(link + "&value=" + this.value, function(data, status) {
        if (status == "success") {
            location.reload();
        }
    });
});//end click
JS;

$this->registerJs($js);
