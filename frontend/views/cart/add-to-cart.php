<?php
$this->registerCssFile('@web/css/add-to-cart.css', ['depends' => \frontend\assets\AppAsset::className()]);

?>
    <div class="add_ok">
        <div class="tip"> Товар успешно добавлен </div>
        <div class="go">
            <a class="back" href="<?= Yii::$app->urlManager->createUrl(['product/view', 'id' => $id]) ?>">
                Назад
            </a>
            <a class="btn" href="<?= Yii::$app->urlManager->createUrl(['/cart']) ?>">
                Оформить заказ
            </a>
        </div>
    </div>
