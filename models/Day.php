<?php


namespace app\models;


use app\base\BaseActivityModel;

class Day extends BaseActivityModel
{
    public $isHoliday;
    public $releatedEvent;

    public function attributeLabels()
    {
        return [
            'isHoliday'=>'Выходной',
            'releatedEvent'=>'Связанное событие',
        ];
    }
}