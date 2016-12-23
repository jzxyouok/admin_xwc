
<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/22
 * Time: 17:15
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="/adminx/css/animate.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/adminx/js/html5shiv.js"></script>
    <script src="/adminx/js/respond.min.js"></script>
    <![endif]-->
    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="/adminx/js/jquery-1.10.2.min.js"></script>
    <script src="/adminx/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/adminx/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/adminx/js/bootstrap.min.js"></script>
    <script src="/adminx/js/modernizr.min.js"></script>
    <script src="/adminx/js/jquery.nicescroll.js"></script>
    <script src="/tools/layer/layer.js"></script>
</head>

<body class="sticky-header">
<?php $this->beginBody() ?>
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--个人资料 start-->
        <div class="logo   dropdown">
            <img src="/adminx/images/user-avatar.png">

            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
                                <span class="clear">
                               <span class="block m-t-xs"><strong
                                       class="font-bold"><?= Yii::$app->getUser()->identity->attributes['username'] ?></strong></span>
                                    <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a class="J_menuItem" href="form_avatar.html" data-index="0">个人资料</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/index.php?r=site/logout" data-method="post"><i class="icon-off"></i>安全退出</a>
                </li>
            </ul>
        </div>

        <div class="logo-icon text-center"><a href="/"><i class="fa fa-home"></i></a></div>
        <!--个人资料  end-->


        <div class="left-side-inner">
            <!-- visible to small devices only -->
            <!--sidebar nav start-->
            <!--左边菜单-->
            <?= $this->render('/common/leftMenu') ?>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content">

        <!-- header section start-->
        <div class="header-section">
            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <!--快捷菜单-->
            <?= $this->render('/common/topMenu') ?>
            <!--notification menu end -->

        </div>
        <!-- header section end-->
        <!--面包屑-->
        <?= $this->render('_breadcrumbs') ?>
        <!--body wrapper start-->
        <div class="wrapper">
            <?= $content ?>
        </div>
        <!--body wrapper end-->

    </div>
    <!-- main content end-->
</section>


<!--common scripts for all pages-->
<link href="/adminx/css/style.css" rel="stylesheet">
<link href="/adminx/css/style-responsive.css" rel="stylesheet">
<script src="/adminx/js/scripts.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>