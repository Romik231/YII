<?php


namespace app\controllers;


use app\base\BaseActivityController;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;
use yii\web\HttpException;

class ActivityController extends BaseActivityController
{
    public function actions()
    {
        return [
            'create' => ['class' => ActivityCreateAction::class]
        ];
    }

    public function actionView($id)
    {
        $model = Activity::find()->andWhere(['id' => $id])->one();
        if (!\Yii::$app->rbac->canViewEditAll($model)){
            throw new HttpException(403,'Error');
        }


        return $this->render('info', ['model' => $model]);
    }

}