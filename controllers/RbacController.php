<?php


namespace app\controllers;


use app\base\BaseActivityController;
use app\base\BaseController;

class RbacController extends BaseController
{
    public function actionGen()
    {
        \Yii::$app->rbac->initRbacRules();

    }
}