<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/24
 * Time: 11:48
 */
?>
<style type="text/css">
    .uploadify-queue-item .cancel a {
/*        background: url('*/<?//=Yii::$app->getBasePath().'/web/tools/uploadify/cancel.png' ?>/*') 0 0 no-repeat;*/
        float: right;
        height:	16px;
        text-indent: -9999px;
        width: 16px;
    }
</style>
<div class="filediv_<?php echo $randkey; ?>">
    <input type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>" class="hiddenfile<?php echo $randkey; ?>" />
    <input id="file_upload_<?php echo $randkey; ?>" name="file_upload" type="file"  multiple="false">
    <!--    <a href="javascript:jQuery('#file_upload').uploadifyUpload();">Upload Last File</a>-->
    <span id="btn_upload_<?php echo $randkey; ?>"></span>
    <div id="queue-<?php echo $randkey; ?>" style="width: 300px;"></div>
    <span id="showpanel_<?php echo $randkey; ?>" >
        <?=$value; ?>
        </span>

</div>
<script type="application/javascript" src="/ace/js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/tools/uploadify/uploadify.css">
<script type="text/javascript" src="/tools/uploadify/jquery.uploadify.js"></script>
<script type="text/javascript">
    <?php  $timestamp = microtime();?>
    $('#file_upload_<?php echo $randkey; ?>').uploadify({
        'formData'     : {
            'timestamp' : '<?php echo $timestamp.$randkey;?>',
            'token'     : '<?php echo md5('unique_key' . $timestamp.$randkey);?>',
            '_csrf' :"<?= Yii::$app->request->csrfToken ?>"
        },
        'swf'      : '/tools/uploadify/uploadify.swf',
        'auto' : true,
        'buttonText': "<i class='icon-cloud-upload bigger-250' style='padding-top: 5px;'></i>",                  //按钮文字
        'uploader' : "<?php echo $postUrl; ?>",
        'queueID': 'queue-<?php echo $randkey; ?>',
        'removeCompleted' :true,
        'fileTypeDesc' : "请选择文件",           //文件说明
        'height' : 40,
        'width' : 105,
        'progressData' : 'speed',//percentage
        'removeTimeout':1,
        'multi' : false,
        'itemTemplate' : '<div id="${fileID}" class="uploadify-queue-item" style="text-align: center">\
                    <div class="cancel">\
                        <a href="javascript:jQuery(\'#${instanceID}\').uploadify(\'cancel\', \'${fileID}\')">X</a>\
                    </div>\
                    <span class="fileName" >${fileName}<div>${fileSize}</div></span>\
                   <div class="uploadify-progress">\
                   <div class="uploadify-progress-bar"></div>\
                   </div>\
                </div>',
        //每次更新上载的文件的进展
        'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            //有时候上传进度什么想自己个性化控制，可以利用这个方法
            //使用方法见官方说明
        },
        'onUploadSuccess': function (file, data, response) {   //一个文件上传成功后的响应事件处理
            var data = $.parseJSON(data);
            if(data.status){
                $("#showpanel_<?php echo $randkey; ?>").html(data.filePath);
                $(".filediv_<?php echo $randkey; ?>").find(".hiddenfile<?php echo $randkey; ?>").val(data.fileName);
            }else{
                alert(data.msg);
            }

        }
    });
</script>

<!--<div class="uploadify-button"><i class='icon-cloud-upload bigger-250'></i> </div>-->