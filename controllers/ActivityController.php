<?php


namespace app\controllers;


use app\base\BaseActivityController;
use app\controllers\actions\ActivityCreateAction;

class ActivityController extends BaseActivityController
{
    public function actions()
    {
        return [
            'create'=>['class'=>ActivityCreateAction::class]
        ];
    }

}