<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/24
 * Time: 11:41
 */
namespace app\components\widgets;

use yii\base\Widget;

class FileuploadWidget extends Widget{
    public $postUrl = '';
    public $title = ''; //标题
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
        $data['randkey'] =uniqid();
        $data['show'] = '/'.$this->value;
        return $this->render('//widgets/fileupload',$data);
    }

}