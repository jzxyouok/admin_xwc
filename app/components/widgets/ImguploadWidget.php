<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/24
 * Time: 11:41
 */
namespace app\components\widgets;

use yii\base\Widget;

class ImguploadWidget extends Widget{
    public $postUrl = '';
    public $title = ''; //名称
    public $name; //表单字段name
    public $value; //默认图片地址
    public function init(){
        parent::init();
    }


    public function run(){
        $data['postUrl'] = $this->postUrl;
        $data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['value'] = $this->value;
        $data['src'] = empty($this->value) ? "/adminx/images/blank.jpg" : \Yii::$app->params['file_show_url'].$this->value;
        $data['randkey'] =uniqid();
        return $this->render('//widgets/imgupload',$data);
    }

}