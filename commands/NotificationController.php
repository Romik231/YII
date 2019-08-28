<?php


namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;

class NotificationController extends Controller
{
    public $name;
    public $name2;

    public function options($actionID)
    {
        return ['name','name2'];
    }

    public function optionAliases()
    {
        return [
            'n'=>'name',
            'n2'=>'name2',
        ];
    }

    public function actionTest()
    {
        echo 'test'.PHP_EOL;
        $arr=explode(',',$this->name);
//          echo 'name '.$this->name.PHP_EOL;
//          echo 'name2 '.$this->name2.PHP_EOL;
        print_r($arr);

    }

    public function actionNotification(){
        $activities=\Yii::$app->activity->getActivityUseNotification();
        echo count($activities).PHP_EOL;

        $notif=\Yii::createObject(['class'=>NotificationComponent::class]);
        $notif->sendNotification($activities);
    }
}