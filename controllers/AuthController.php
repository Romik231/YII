<?php


namespace app\controllers;


use app\models\Users;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionUp()
    {
       $model = new Users();
       return $this->render('signup',['model'=>$model]);
    }
}