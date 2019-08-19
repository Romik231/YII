<?php


namespace app\controllers;


use app\base\BaseActivityController;
use app\components\DaoComponent;

class DaoController extends BaseActivityController
{
    public function actionTest()
    {
        /**
         * @var DaoComponent $dao
         */
        $dao=\Yii::$app->dao;

        $users=$dao->getUsers();
        $activityUsers=$dao->getActivityUser(\Yii::$app->request->get('user'));
        $activ=$dao->getActivityAny();
        $count=$dao->getCountActivity();
        $reader=$dao->readerData();

        return $this->render('dao', ['users'=>$users, 'activityUser'=>$activityUsers,
            'activity'=>$activ, 'count'=>$count, 'reader'=>$reader]);
    }
}