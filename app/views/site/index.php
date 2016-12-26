<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/22
 * Time: 17:38
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => '概述'];

?>
<div class="row">
<div class="col-xs-12">
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <i class="icon-ok green"></i>

        欢迎使用
        <strong class="green">
            夏午茶管理后台
<!--            <small>(v1.0)</small>-->
        </strong>
        ,轻量级好用的后台管理系统.
    </div>


    <div class="alert alert-block alert-info">



    </div>
</div>


</div>



<script type="text/javascript">

    $(document).ready(function(){

        $.ajax({
            url: '/index.php?r=common/tj',
            dataType: 'json',
            success: function (data) {
                $(".redayUrlCount").html(data.redayUrlCount);
                $(".ingUrlCount").html(data.ingUrlCount);
                $(".outUrlCount").html(data.outUrlCount);

                $(".itemsCount").html(data.itemsCount);
                $(".okCveCount").html(data.okCveCount);
                $(".redayCveCount").html(data.redayCveCount);

            }
        });

    });

</script>
