<?php


namespace app\components;


use app\base\BaseActivityComponent;
use yii\db\Connection;
use yii\db\Query;

class DaoComponent extends BaseActivityComponent
{
    public function getDb(): Connection
    {
        return \Yii::$app->db;
    }

    public function getUsers()
    {
        $sql = 'Select * from users;';
        return $this->getDb()->createCommand($sql)->cache(10)->queryAll();
    }

    public function getActivityUser($user_id)
    {
        $sql = 'select * from activity where user_id=:user';
        return $this->getDb()->createCommand($sql, [':user' => $user_id])->queryAll();
    }

    public function getActivityAny()
    {
        $query = new Query();
        $data = $query->from('activity')
            ->andWhere(['user_id' => 2])
            ->limit(2)
            //->createCommand()->rawSql;
            ->one($this->getDb());

        return $data;
    }

    public function getCountActivity()
    {
        $query = new Query();
        $data = $query->from('activity')
            ->select('count(id) as cnt')
            ->scalar($this->getDb());
        return $data;
    }

    public function readerData()
    {
        $query=new Query();
        $data=$query->from('activity')
            ->createCommand()->query();
        return $data;
    }

}