<?php

return [
    //文件上传目录
    'file_upload_path' => dirname(__DIR__).'/web/uploads/img/',
    //文件展示url $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'] 可以换成自己的独立域名
    'file_show_url' => $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].'/uploads/img/',
];
