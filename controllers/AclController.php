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

class AclController extends TyuanController
{
    public $topMenu = 'acl';


    public function actionUser()
    {
        throw new ForbiddenHttpException ("待更新");

    }
    public function actionRole()
    {
        throw new ForbiddenHttpException ("待更新");
    }
    public function actionResource()
    {
        throw new ForbiddenHttpException ("待更新");
    }















}
