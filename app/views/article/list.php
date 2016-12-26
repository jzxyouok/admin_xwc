<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/22
 * Time: 17:15
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['list'] ];
$this->params['breadcrumbs'][] = "文章列表";
?>
<?php $form = ActiveForm::begin(['action' => ['article/list'],'method'=>'get',]); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <?= Html::submitButton(' 搜 索', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
            <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl(['article/create']) ?>" role="button">添加文章</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-1">
        <div class="form-group">
            <input name="search[title]" type="text" value="<?=$searchParams['title'] ?>" placeholder=" 标题..." />
        </div>
    </div>


</div>

<?php ActiveForm::end(); ?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                数据列表
                <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                         </span>
            </header>
            <div class="panel-body">
                <table class="table  table-hover ">
                    <thead>
                    <tr>
                        <th><?=$attrbutes['id']; ?></th>
                        <th><?=$attrbutes['title']; ?></th>
                        <th><?=$attrbutes['source']; ?></th>
                        <th><?=$attrbutes['create_time']; ?></th>
                        <th>操 作</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($list as $key => $item): ?>
                        <tr>
                            <td>
                                <?=Html::encode($item['id']); ?>
                            </td>

                            <td>
                                <?=Html::encode($item['title']); ?>

                            </td>
                            <td>
                                <?=Html::encode($item['source']); ?>

                            </td>


                            <td >
                                <?=date('Y/m/d H:i:s',$item['create_time']); ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-default" type="button" href="<?=Yii::$app->urlManager->createUrl(['article/edit','id' => $item['id']]); ?>">编辑</a>
                                    <a class="btn btn-danger delcve" type="button" data-id="<?=$item['id'];?>">删除</a>
                                </div>


                            </td>
                        </tr>
                    <?php endforeach; ?>



                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-6"><div class="dataTables_info" id="editable-sample_info">
                            显示记录 <?= $pages->offset+1; ?> 到 <?= $pages->offset+$pages->limit; ?>,共 <?= $pages->totalCount; ?> 条记录
                        </div></div>
                    <div class="col-lg-6">
                        <div class="dataTables_paginate paging_bootstrap pagination">
                            <?=  \yii\widgets\LinkPager::widget([
                                'pagination' => $pages,
                                'lastPageLabel' => "最后一页",
                                'firstPageLabel' => "第一页",
//                            'linkOptions' =>'ss'

                            ]); ?>

                        </div></div></div>
            </div>
        </section>
    </div>
</div>







    <!--删除crumb-->




<script type="text/javascript">

    $('.delcve').on('click', function(){

        var id = $(this).data("id");
        layer.msg('确定删除吗?', {
            time: 0 //不自动关闭
            ,btn: ['确定', '取消']
            ,yes: function(index){
                layer.close(index);
                window.location.href = "<?=Yii::$app->urlManager->createUrl(['article/del']); ?>&id="+id;
            }
        });


    });

</script>
