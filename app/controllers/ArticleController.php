<?php

namespace app\controllers;

use app\components\TyuanController;
use app\models\ClArticle;
use app\models\ProjectSearch;
use app\components\CTools;
use yii\base\Exception;
use Yii;
use yii\data\Pagination;
use yii\web\ForbiddenHttpException;

class ArticleController extends TyuanController
{
    public $topMenu = 'article';


    public function actionIndex()
    {

    }


    /**
     * 项目
     *
     * @return string
     */
    public function actionList(){
        $searchParams = Yii::$app->request->get('search');
        $obj = new ClArticle();
        $query = $obj->find();
        #过滤�?
        $searchModel = new ProjectSearch();
        $query = $searchModel->searchAll($searchParams,$query,'article_list');
        $pages = new Pagination(['totalCount' => $query->count()]);
        $pages->setPageSize(10);
//        if(!empty($searchParams))  $pages->params = ['search'=>$searchParams];

        $list= $query->orderBy(['id'=> SORT_DESC])
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()->all();

        $data = [];
        $data['list'] = $list;
        $data['pages'] = $pages;
        $data['searchParams'] = $searchParams;
        $data['attrbutes'] = $obj->attributeLabels();
        return  $this->render('list',$data);

    }


    /**
     * 添加文章
     *
     * @return string
     */
    public function actionCreate(){

        $projectModel = new ClArticle();
        if(!empty($post = Yii::$app->request->post())){
            try{
                if (null  != ClArticle::findOne(['title' =>$post['ClArticle']['title']])){
                    throw new Exception ("文章已存在");
                }

                if($projectModel->load($post) && $projectModel->save()){
                    Yii::$app->getSession()->setFlash('success', '保存成功');
                    return $this->redictPage(Yii::$app->urlManager->createUrl(['article/list']));
                }else{
                    #抛出异常
                    throw new Exception (CTools::recursiveMultiArray($projectModel->errors));
                }
            }catch (Exception $e){
                #捕获抛出的异�?
                Yii::$app->getSession()->setFlash('error', $e->getMessage());
                return $this->redictPage(Yii::$app->urlManager->createUrl(['article/create']));
            }


        }
        $projectModel->pub_time = date("Y年m月d日",time());
        $data['projectModel'] = $projectModel;
        return $this->render('add',$data);

    }

    public function actionTest(){
                return $this->render('test');
    }


    /**
     * 添加文章
     *
     * @return string
     */
    public function actionEdit($id=0){
        $id = empty($id) ? Yii::$app->request->post('id') :$id ;
        $projectModel = ClArticle::findOne($id);
        if(!empty($post = Yii::$app->request->post())){
            try{

                if($projectModel->load($post) && $projectModel->save()){
                    Yii::$app->getSession()->setFlash('success', '保存成功');
                    return $this->redictPage(Yii::$app->urlManager->createUrl(['article/list']));
                }else{
                    #抛出异常
                    throw new Exception (CTools::recursiveMultiArray($projectModel->errors));
                }
            }catch (Exception $e){
                #捕获抛出的异�?
                Yii::$app->getSession()->setFlash('error', $e->getMessage());
                return $this->redictPage(Yii::$app->urlManager->createUrl(['article/edit','id' => $id]));
            }


        }
        $projectModel->pub_time = empty($projectModel->pub_time) ? date("Y年m月d日",time()) : $projectModel->pub_time;
        $data['projectModel'] = $projectModel;
        return $this->render('add',$data);

    }

    public function actionDel($id){
        $res = ClArticle::deleteAll(['id' => $id]);

        if($res == 1 ){
            Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
            Yii::$app->getSession()->setFlash('error', '保存失败');
        }
        return $this->redictPage(Yii::$app->urlManager->createUrl(['article/list']));

    }

    /**
     * @inheritdoc
     */
//    public function beforeAction($action)
//    {
//        if (parent::beforeAction($action)) {
//            $permission =  $this->id.'/'.$action->id;
//            if (Yii::$app->user->can($permission)) {
//                return true;
//            }else{
//                throw new ForbiddenHttpException("抱歉,您没有权限操作这个页面,请联系管理员开通!");
//
//            }
//
//
//        }
//
//        return false;
//    }












}
