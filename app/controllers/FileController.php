<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jiong
 * Date: 2015/12/08
 * Time: 下午3:09
 *   文件上传类
 */
namespace app\controllers;

use app\components\TyuanController;
use Yii;

class FileController extends TyuanController{
    private $fileType = 0; #0表示文件 1表示图片
    private $fileRoot;
    private $imgRoot;
    private $error;


    // 允许上传的文件后缀
    private  $allowExts = array("gz","zip","rar","tar.gz","jpg","png");
    private  $allowImgExts = array("jpg","png");
    // 允许上传的文件大小
    private  $maxSize = -1;


    public function init(){
        parent::init();
        $this->fileRoot =  $this->imgRoot = Yii::$app->params['file_upload_path'];
//        $this->imgRoot = Yii::$app->basePath.'/uploads/img//';
//        $this->enableCsrfValidation = false;

    }


    /**
     * 上传
     * @param $cat 标识符
     * @param int $type 0表示文件 1表示图片
     */
    public function actionUpload($cat,$type = 0){
        if($type ==0) $this->uploadFile($cat);
        if($type ==1) $this->uploadImg($cat);

    }



    /**
     * 上传文件
     * @param $type
     */
    private function uploadFile($type){

//        $verifyToken = md5('unique_key' . $_POST['timestamp']);#防止恶意提交
//        if (empty($_FILES) || $_POST['token'] == $verifyToken) {
//            $this->error  =  '验证不通过';
//            echo '{"success":false,"msg":"'.$this->error.'"}';
//            exit();
//        }

        $prefixDir = $type.date('/Ym/d/');

        if(!is_writeable($this->fileRoot)) {
            $this->error  =  '上传目录'.$this->fileRoot.'不可写';
            echo '{"status":false,"msg":"'.$this->error.'"}';
            exit();
        }


        if(!is_dir($this->fileRoot.$prefixDir) || !file_exists( $this->fileRoot.$prefixDir)){
            mkdir( $this->fileRoot.$prefixDir,0770,true);
        }


        $file = array_shift($_FILES);
        //相关检查
        if(false == ($this->check($file))){
            $ret['status'] = false;
            $ret['msg'] = $this->error;
        }else{
            $ext = $this->getExt($file['name']);
            $filename = $this->_getFileName($ext);
            $filePath = $this->fileRoot.$prefixDir.$filename;

            if(false == (@move_uploaded_file($file['tmp_name'],$filePath))){
                $ret['status'] = false;
                $ret['msg'] = $filePath;
            }else{
                $ret['status'] = true;
                $ret['msg'] = "ok";
                #文件展示名称
                $ret['fileName'] = $prefixDir.$filename;
                #文件href地址
                $ret['filePath'] = Yii::$app->params['file_show_url'].$prefixDir.$filename;;
            }

        }

        echo json_encode($ret);
        exit;
    }



    /**
     * 上传图片
     *
     * @return string
     */
    private function uploadImg($type){

        $prefixDir = $type.date('/Ym/d/');
        $this->fileType=1;

        if(!is_dir($this->imgRoot.$prefixDir) || !file_exists( $this->imgRoot.$prefixDir)){
            mkdir( $this->imgRoot.$prefixDir,0770,true);
        }


        $file = array_shift($_FILES);
        //相关检查
        if(false == ($this->check($file))){
            $ret['success'] = false;
            $ret['msg'] = $this->error;
        }else{
            $ext = $this->getExt($file['name']);
            $imgName = $this->_getFileName($ext);
            $imgPath = $this->fileRoot.$prefixDir.$imgName;



            if(false == (@move_uploaded_file($file['tmp_name'],$imgPath))){
                $ret['success'] = false;
                $ret['msg'] = '上传文件失败';
            }else{
                $ret['success'] = true;
                #文件href地址
                $ret['file_path'] = Yii::$app->params['file_show_url'].$prefixDir.$imgName;
            }
        }
        echo  json_encode($ret);exit;
    }


    /**
     * 检查上传的文件大小和文件类型
     */
    private function check($file) {
        if($file['error']!== 0) {
            //文件上传失败
            //捕获错误代码
            $this->error = $this->getError($file['error']);
            return false;
        }
        //文件上传成功，进行自定义规则检查
        //检查文件大小
        if(!$this->checkSize($file['size'])) {
            $this->error = '上传文件大小不符！';
            return false;
        }

        //检查文件Mime类型
//        if(!$this->checkType($file['type'])) {
//            $this->error = '上传文件MIME类型不允许！';
//            return false;
//        }
        //检查文件类型
        $ext = $this->getExt($file['name']);
        if(!$this->checkExt($ext)) {
            $this->error ='上传文件类型不允许'.$ext;
            return false;
        }

        //检查是否合法上传
//        if(!$this->checkUpload($file['tmp_name'])) {
//            $this->error = '非法上传文件！';
//            return false;
//        }
        return true;
    }

    /**
     * 生成随机文件名
     *
     * @param $ext
     * @return string
     */
    private function _getFileName($ext){
        return md5(uniqid(rand())).".{$ext}";
    }



    /**
     * 取得文件的后缀
     */
    private function getExt($filename)
    {

        #如果是tar包
        if(strpos($filename,'tar.gz') != false){
            return "tar.gz";
        }

        $pathinfo = pathinfo($filename);
        return strtolower($pathinfo['extension']);
    }


    /**
     * 检查上传的文件后缀是否合法
     */
    private function checkExt($ext)
    {
        if($this->fileType ==1){
            return in_array(strtolower($ext),$this->allowImgExts,true);
        }else{
            return in_array(strtolower($ext),$this->allowExts,true);
        }

        return true;
    }


    /**
     * 检查文件大小是否合法
     */
    private function checkSize($size)
    {
        return !($size > $this->maxSize) || (-1 == $this->maxSize);
    }


}