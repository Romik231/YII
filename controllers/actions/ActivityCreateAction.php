<?php


namespace app\controllers\actions;


use app\base\BaseActivityAction;
use app\components\ActivityComponent;
use app\models\Activity;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ActivityCreateAction extends BaseActivityAction
{
    public function run()
    {

        if (!\Yii::$app->rbac->canCreataActivity()){
            throw new HttpException('403','Какая-то херня' );
        }
//      $model = new Activity();
        $activityComponent = \Yii::createObject(['class' => ActivityComponent::class, 'classModel'=>Activity::class]);

        $model = \Yii::$app->activity->getModel();// заменяем $model = new Activity();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }
        if(\Yii::$app->request->isPost){

            if(\Yii::$app->activity->createActivity($model)){
                return $this->controller->render('info',['model'=>$model]);

            }else{
//                print_r($model->getErrors());
                exit;
            }
//            print_r($model->getAttributes());
//            exit;
        }
        return $this->controller->render('create',['model'=>$model]);
    }

}