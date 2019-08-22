<?php

use yii\db\Migration;

/**
 * Class m190818_164153_Insert
 */
class m190818_164153_Insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id'=>1,
            'email'=>'test@email.ru',
            'password_hash'=>'123456',
        ]);

        $this->insert('users',[
            'id'=>2,
            'email'=>'test2@email.ru',
            'password_hash'=>'123456',
        ]);

        $this->batchInsert('activity',['title','startDate','user_id','useNotification' ],[
            [Yii::$app->security->generateRandomString(),date('Y-m-d'),1,0],
            [Yii::$app->security->generateRandomString(),date('Y-m-d'),2,0],
            [Yii::$app->security->generateRandomString(),date('Y-m-d'),1,1],
            [Yii::$app->security->generateRandomString(),date('Y-m-d'),2,1],
            [Yii::$app->security->generateRandomString(),date('Y-m-d'),1,0],
            [Yii::$app->security->generateRandomString(),'2019-08-19',1,0],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
        $this->delete('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190818_164153_Insert cannot be reverted.\n";

        return false;
    }
    */
}
