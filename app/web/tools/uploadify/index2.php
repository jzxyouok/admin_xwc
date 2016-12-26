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
	<h1>Uploadify Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>


        $(function () {
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
        });

<!--		$(function() {-->
<!--            -->
<!--            -->
<!--            -->
<!--            -->
<!--            -->
<!--			$('#file_upload').uploadify({-->
<!--				'formData'     : {-->
<!--					'timestamp' : '--><?php //echo $timestamp;?><!--',-->
<!--					'token'     : '--><?php //echo md5('unique_salt' . $timestamp);?><!--'-->
<!--				},-->
<!--				'swf'      : '/upload/uploadify.swf',-->
<!--				'uploader' : '/upload/uploadify.php',-->
<!--                'cancelImg': '/upload/uploadify-cancel.png',-->
<!--                'progressData'    : 'percentage',-->
<!--                 'multi'           : true-->
<!--			});-->
<!--		});-->
	</script>
</body>
</html>