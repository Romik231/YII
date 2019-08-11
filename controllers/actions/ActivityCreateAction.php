<?php


namespace app\controllers\actions;


use app\base\BaseActivityAction;
use app\components\ActivityComponent;
use app\models\Activity;

class ActivityCreateAction extends BaseActivityAction
{
    public function run()
    {
//      $model = new Activity();
        $activityComponent = \Yii::createObject(['class' => ActivityComponent::class, 'classModel'=>Activity::class]);

        $model = \Yii::$app->activity->getModel();// заменяем $model = new Activity();

        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->activity->createActivity($model)){

            }else{
                print_r($model->getErrors());
                exit;
            }
//            print_r($model->getAttributes());
//            exit;
        }
        return $this->controller->render('create',['model'=>$model]);
    }

}