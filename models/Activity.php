<?php


namespace app\models;


use app\base\BaseActivityModel;
use yii\base\Model;

class Activity extends BaseActivityModel
{
    public $title;
    public $description;
    public $startDate;
    public $endDate;
    public $isBlocked;
    public $isRepeated;

    public function rules()
    {
        return [
            [['title', 'description'],'required'],
            [['startDate', 'endDate'], 'string'],
            [['isBlocked', 'isRepeated'],'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'description' => 'Описание события',
            'startDate' => 'Начало события',
            'endDate' => 'Окончание события',
            'isBlocked' => 'Запрет на доплнительные события',
            'isRepeated' => 'Повторять событие',
        ];
    }
}