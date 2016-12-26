<?php
/**
 * 面包屑.
 * User: gaojiyong
 * Date: 2015/12/22
 * Time: 16:50
 */
use yii\widgets\Breadcrumbs;
?>

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <?=
        Breadcrumbs::widget(
            [
                'tag' => "ul",
                'homeLink' =>[
                    'label' => 'Home',
                    'encode' =>false,
                    'url' =>'/index.php',
                    'title' => '返回首页',
                    'template'=> '<li><a href="/"><i class="fa fa-home"></i> Home</a></li>'
                ],
                'options' => ['class' => 'breadcrumb panel'],
                'class' => "breadcrumb panel",
                'itemTemplate' =>"<li>{link}</li>",
                'activeItemTemplate' => "<li class=\"active\">{link}</li>",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
        <!--breadcrumbs end -->
    </div>
</div>


