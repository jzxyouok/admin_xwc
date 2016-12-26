<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<form>
		<div id="queue" style="width: 150px;"></div>
		<input id="file_upload" name="file_upload" type="file"  multiple="true">
        <a href="javascript:$('#file_upload').uploadifyUpload();">Upload Last File</a>
	</form>


    <span id="btn_upload"></span>

	<script type="text/javascript">
		<?php  $timestamp = time();?>


/*        $(function () {
            $('#btn_upload').uploadify({
                uploader: 'uploadify.php',            // 服务器处理地址
                swf: 'uploadify.swf',
                buttonText: "选择文件",                  //按钮文字
                height: 34,                             //按钮高度
                width: 82,                              //按钮宽度
                fileTypeExts: "*.jpg;*.png;*.txt;",           //允许的文件类型
                fileTypeDesc: "请选择图片文件",           //文件说明
                formData: { "imgType": "normal" }, //提交给服务器端的参数
                onUploadSuccess: function (file, data, response) {   //一个文件上传成功后的响应事件处理
                    var data = $.parseJSON(data);
                    alert(data.imgpath);
                }
            });
        });*/

		$(function() {

			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'uploadify.swf',
                'auto' : true,
                'buttonText': "选择文件",                  //按钮文字
				'uploader' : 'uploadify.php',
                'cancelImg': 'http://localhost/upload/cancel.png',
                'queueID': 'queue',
//                'progressData'    : 'percentage',
                'removeCompleted' :false,
                'fileTypeDesc' : "请选择文件",           //文件说明
                'height' : 20,
                'width' : 100,
                'progressData' : 'percentage',
                'itemTemplate' : '<div id="${fileID}" class="uploadify-queue-item" style="text-align: center">\
                    <div class="cancel">\
                        <a href="javascript:$(\'#${instanceID}\').uploadify(\'cancel\', \'${fileID}\')">X</a>\
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
                    $("body").append("<a href='"+data.filepath+"'>"+data.filename+"</a>");
//                    alert(data.filename);
                }
			});
		});
	</script>
</body>
</html>