<?php


namespace app\controllers;


use app\base\BaseActivityController;
use app\controllers\actions\ActivityCreateAction;
use app\models\Activity;

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
        return $this->render('info', ['model' => $model]);
    }

}