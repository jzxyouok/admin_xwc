<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/22
 * Time: 17:38
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\widgets\EditorWidget;
use app\components\widgets\FileuploadWidget;
use app\components\widgets\ImguploadWidget;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['plist'] ];
$this->params['breadcrumbs'][] =  $projectModel->isNewRecord ? '新增文章' : '编辑文章';

?>
<?php if($projectModel->isNewRecord): ?>
    <?php $form = ActiveForm::begin(['action' => ['article/create'],'method'=>'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>
<?php else: ?>
    <?php $form = ActiveForm::begin(['action' => ['article/edit'],'method'=>'post','options' => ['enctype' => 'multipart/form-data']]); ?>
<?php endif; ?>
<div class="row">
    <div class="col-xs-9 col-sm-9">
        <section class="panel">
            <div class="panel-body">
                <?= $form->field($projectModel, 'tag')->textInput(['maxlength' => 255,'placeholder' => '多个标签用","分隔']) ?>
                <?= $form->field($projectModel, 'description')->textarea() ?>
                <div class="form-group">
                    <?= EditorWidget::widget([
                        'name' => 'ClArticle[content]',
                        'imgPostUrl' => Yii::$app->urlManager->createUrl(['file/upload', 'cat' => 'editor','type' => 1]),
                        'content' => empty($projectModel['content'])? '' :$projectModel['content'] ]); ?>
                </div>




            </div>
        </section>
    </div>


    <div class="col-xs-2 col-sm-2">
        <section class="panel">
            <div class="panel-body">
                <?= $form->field($projectModel, 'title')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($projectModel, 'simple_title')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($projectModel, 'pub_time')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($projectModel, 'source')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($projectModel, 'url')->textInput(['maxlength' => 255]) ?>


                <div class="form-group">
                    <?= ImguploadWidget::widget([
                        'title' =>'列表页缩略图',
                        'name'=>"ClArticle[thumb]",
                        "value" => $projectModel->isNewRecord ? null : $projectModel['thumb'],
                        'postUrl'=> Yii::$app->urlManager->createUrl(['file/upload', 'cat' => 'thumb'])
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= ImguploadWidget::widget([
                        'title' =>'详情页焦点图',
                        'name'=>"ClArticle[focus]",
                        "value" => $projectModel->isNewRecord ? null : $projectModel['focus'],
                        'postUrl'=> Yii::$app->urlManager->createUrl(['file/upload', 'cat' => 'thumb'])
                    ]) ?>
                </div>

                <div class="form-group">
                    <?php if(!$projectModel->isNewRecord): ?>
                        <?=Html::hiddenInput('id',$projectModel['id']); ?>
                    <?php endif; ?>
                    <?= Html::submitButton("<i class='icon-ok bigger-110'></i>保存", ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
                    &nbsp;
                    <?= Html::resetButton("<i class='icon-undo bigger-110'></i>重置", ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
                </div>


            </div>
        </section>
    </div>

</div>
<?php ActiveForm::end(); ?>

</div>



