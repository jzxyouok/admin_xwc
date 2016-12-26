<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;;
use yii\captcha\Captcha;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    <link href="/adminx/css/style.css" rel="stylesheet">
    <link href="/adminx/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/adminx/js/html5shiv.js"></script>
    <script src="/adminx/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">
<?php $this->beginBody() ?>
<div class="container">

    <?php $form = ActiveForm::begin(['id' => 'login-form','options' =>['class' => 'form-signin']]); ?>
        <div class="form-signin-heading text-center">
            <h1 class="sign-title"><i class="fa fa-group"></i> <strong>管 理 后 台</strong></h1>

        </div>
        <div class="login-wrap">
            <?= $form->field($model, 'username')->label("用户名")->input("text",['placeholder'=>'用户名'])->label(false); ?>
            <?= $form->field($model, 'password')->passwordInput()->label(false)->input("password",['placeholder'=>'密码']); ?>

            <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                    <?= $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
                                                        'template' => '<div class="row"><div class="col-xs-6">{input}</div><div class="col-xs-5">{image}</div></div>',
                                                    ]) ?>
                                                    </span>
            </label>

            <?= Html::submitButton('<i class="fa fa-check"></i>', ['class' => 'btn btn-lg btn-login btn-block', 'name' => 'login-button']) ?>


            <div class="registration">
                <!--Not a member yet?-->
                <!--<a class="" href="registration.html">-->
                <!--Signup-->
                <!--</a>-->
            </div>
            <label class="checkbox">
                <?= $form->field($model, 'rememberMe')->label("记住我")->checkbox() ?>
<!--                <span class="pull-right">-->
<!--                    <a data-toggle="modal" href="#myModal">忘记密码</a>-->
<!--                </span>-->
            </label>

        </div>

        <!-- Modal 忘记密码-->
<!--        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">-->
<!--            <div class="modal-dialog">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<!--                        <h4 class="modal-title">Forgot Password ?</h4>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                        <p>Enter your e-mail address below to reset your password.</p>-->
<!--                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">-->
<!---->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>-->
<!--                        <button class="btn btn-primary" type="button">Submit</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!-- modal -->

        <?php ActiveForm::end(); ?>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/adminx/js/jquery-1.10.2.min.js"></script>
<script src="/adminx/js/bootstrap.min.js"></script>
<script src="/adminx/js/modernizr.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>