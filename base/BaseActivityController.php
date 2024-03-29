<?php


namespace app\base;


use yii\db\Exception;
use yii\web\Controller;
use yii\web\HttpException;

class BaseActivityController extends Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
           throw new HttpException(401, 'Need auth');
        }
        return parent::beforeAction($action);
    }
}