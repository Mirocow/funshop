<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
?>
<div class="site-login">

    <div class="row">
        <div class="col-sm-5">
            <div class="login-form">
                <h2>Вход</h2>
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'layout'=>'horizontal']); ?>
                <?= $form->field($model, 'username' ) ?>
                <?= $form->field($model, 'password' )->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    <?= Html::a('Восстановления пароля', ['site/request-password-reset']) ?>
                    .
                </div>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Вход'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

            <!--/login form-->

        <div class="col-sm-2 ">
            <h2 class="or">или</h2>
        </div>
        <div class="col-sm-5 ">
            <div class="signup-form"><!--sign up form-->
                <h2>Регистация</h2>

                <form action="#">
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email Address">
                    <input type="password" placeholder="Password">
                    <button type="submit" class="btn btn-default">Регистрация</button>
                </form>
            </div>
            <!--/sign up form-->
        </div>
    </div>
</div>

</div>
