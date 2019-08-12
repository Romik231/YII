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
    public $useNotification;

    public function beforeValidate()
    {
        $dateStart=\DateTime::createFromFormat('d.m.Y', $this->startDate);
        $dateEnd=\DateTime::createFromFormat('d.m.Y', $this->endDate);
        if($dateStart and $dateEnd){
            $this->startDate=$dateStart->format('Y-m-d');
            $this->endDate=$dateEnd->format('Y-m-d');
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title', 'trim'],
            ['description', 'trim'],
            [['title', 'description'],'required'],
            [['startDate', 'endDate'], 'date', 'format'=>'php:Y-m-d'],
            [['isBlocked', 'isRepeated', 'useNotification'],'boolean'],
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
            'useNotification' => 'Напоминать',
        ];
    }
}