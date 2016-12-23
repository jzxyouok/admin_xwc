<?php

namespace app\controllers;



use app\models\Project;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\components\TyuanController;

class SiteController extends TyuanController
{


    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' =>  [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => 40,
                'width' => 100,
                'minLength' => 4,
                'maxLength' => 4,
                'backColor' => 0xf7f7f7,
                'foreColor' => 0x4fa693,
                'padding' => 0,
                'transparent' => true,
                'offset' => 5,
                'fontFile' => '@yii/captcha/SerDomingo.ttf'
            ],
        ];
    }


    public function actionIndex()
    {
//        Yii::$app->getSession()->setFlash('error', '保存失败');
//        return $this->_redictPage(Yii::$app->urlManager->createUrl(['project/plist']));
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {



            return $this->goBack();
        }

//        var_export($model);
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionTest(){

        $auth = Yii::$app->authManager;

        echo null != $auth->getPermission('project/pcreate');
        exit;

    }




}
