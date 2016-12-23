<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22 0022
 * Time: 下午 5:11
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
$this->params['breadcrumbs'][] = ['label' => '系统提示'];
?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <!--notification start-->
        <section class="panel">
            <div class="panel-body">
                <?php if(Yii::$app->getSession()->hasFlash('success') ): ?>
                    <h3><p class="text-success text-center"><?php echo Yii::$app->getSession()->getFlash('success'); ?></p></h3>
                    <p class="text-success text-center"><a  href="<?php echo $url;?>">如果您的浏览器没有自动跳转，请点击这里</a></p>
                <?php endif; ?>

                <?php if(Yii::$app->getSession()->hasFlash('error')) : ?>
                    <h3><p class="text-danger text-center"><?php echo Yii::$app->getSession()->getFlash('error'); ?></p></h3>
                    <p class="text-danger text-center"><a href="<?php echo $url;?>">如果您的浏览器没有自动跳转，请点击这里</a></p>
                <?php endif; ?>

            </div>
        </section>
        <!--notification end-->
    </div>
</div>

<script type="text/JavaScript">setTimeout("window.location ='<?php echo $url;?>';",2000);</script>




