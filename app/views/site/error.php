<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => '错误'];
$this->title = $name;
?>

<div class="row">
    <div class="col-md-12">
        <!--notification start-->
        <section class="panel">
            <header class="panel-heading">
               <?= Html::encode($this->title) ?>
            </header>
            <div class="panel-body">
                <div class="alert alert-danger alert-block fade in">
                    <h4>
                        <i class="icon-ok-sign"></i>
                        <?= nl2br(Html::encode($message)) ?>
                    </h4>
                </div>

            </div>
        </section>
        <!--notification end-->
    </div>
</div>

