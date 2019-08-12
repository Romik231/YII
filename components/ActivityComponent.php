<?php


namespace app\components;


use app\base\BaseActivityComponent;
use app\models\Activity;

class ActivityComponent extends BaseActivityComponent
{
    public $classModel;

    public function getModel(){
        return new $this->classModel;
    }

    public function createActivity(Activity &$activity): bool
    {
        if($activity->validate()){
            return true;
        }
        return false;
    }
}