<?php


namespace app\models;


use app\base\BaseActivityModel;
use phpDocumentor\Reflection\Types\Self_;
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
    public $repeatedType;
    public $email;
    public $emailRepeat;
    public $file;

    public const REPEATED_TYPE = [
      1=>'Каждый час',
      2=>'Каждый день',
      3=>'Каждую неделю'

    ];

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
            ['file','file','extensions'=>['jpg','png']],
            ['email', 'email'],
            ['emailRepeat', 'compare', 'compareAttribute'=>'email'],
            [['email','emailRepeat'], 'required', 'when' => function($model){
                return $model->useNotification?true:false;
            }],
            [['title', 'description'],'required'],
            ['repeatedType', 'in', 'range'=>array_keys(self::REPEATED_TYPE)],
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
            'repeatedType' => 'Интервал повторений',
            'file' => 'Прикрепить',
        ];
    }
}