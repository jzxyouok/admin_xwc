<?php
/**
 * Created by PhpStorm.
 * User: gaojiyong
 * Date: 2015/12/24
 * Time: 11:41
 */
namespace app\components\widgets;

use yii\base\Widget;

class EditorWidget extends Widget{
    public $imgPostUrl = '';
    public $name; //表单字段name
    public $content;
    public $cat = "editor";
    public function init(){
        parent::init();
    }


    public function run(){
        $data['imgPostUrl'] = empty($this->imgPostUrl) ? '':$this->imgPostUrl;
        $data['name'] = $this->name;
        $data['cat'] = empty($this->cat) ? '':$this->cat;
        $data['content'] = $this->content;
        $data['randkey'] =uniqid();
        return $this->render('//widgets/editor',$data);
    }

}