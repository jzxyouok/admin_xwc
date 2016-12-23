<?php

$data = array();

$body = "hello, world!";

$mail = array(
    'subject' => 'Test new mail service interface',
    'from' => 'no-reply@ucmail.360.cn',
    'named_from' => 'Web平台部',
    'to' => '624288876@qq.com',
    'body' => $body,
    'format' => 'html'
);

$data['mail'] = json_encode($mail);

$data['token'] = 'tPU0Yy29c7W01DSY';


$url = 'http://qms.addops.soft.360.cn:8360/interface/ext_deliver.php';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
}
curl_close($ch);

print_r($response);

