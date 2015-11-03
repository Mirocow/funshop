<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Вход';
?>

<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image"><img src="assets/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt="" /></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> GeelShopCMS
                <small>Вход в админ панель</small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'margin-bottom-0', 'method'=>'POST']); ?>

                <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false) ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <?= Html::submitButton('Вход', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!-- end login -->


    <!-- begin theme-panel -->
    <!-- end theme-panel -->
</div>
<!-- end page container -->

<?php

$js = <<<JS
$(document).ready(function() {
        App.init();
        LoginV2.init();
    });
JS;
$this->registerJs($js, \yii\web\View::POS_END);



