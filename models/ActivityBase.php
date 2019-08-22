<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $startDate
 * @property string $endDate
 * @property int $isBlocked
 * @property int $isRepeated
 * @property int $useNotification
 * @property string $repeatedType
 * @property string $email
 * @property string $createdAt
 * @property int $isDeleted
 * @property int $user_id
 *
 * @property Users $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'startDate', 'endDate', 'repeatedType', 'user_id'], 'required'],
            [['description'], 'string'],
            [['startDate', 'endDate', 'createdAt'], 'safe'],
            [['isBlocked', 'isRepeated', 'useNotification', 'isDeleted', 'user_id'], 'integer'],
            [['title', 'repeatedType', 'email'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'isRepeated' => Yii::t('app', 'Is Repeated'),
            'useNotification' => Yii::t('app', 'Use Notification'),
            'repeatedType' => Yii::t('app', 'Repeated Type'),
            'email' => Yii::t('app', 'Email'),
            'createdAt' => Yii::t('app', 'Created At'),
            'isDeleted' => Yii::t('app', 'Is Deleted'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
