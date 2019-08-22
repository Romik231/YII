<?php

use yii\db\Migration;

/**
 * Class m190818_154534_CreteTablse
 */
class m190818_154534_CreteTablse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
           'id'=>$this->primaryKey(),
           'title'=>$this->string(150)->notNull(),
           'description'=>$this->text(),
           'startDate'=>$this->date()->notNull(),
           'endDate'=>$this->date()->notNull(),
           'isBlocked'=>$this->boolean()->notNull()->defaultValue(0),
           'isRepeated'=>$this->boolean()->notNull()->defaultValue(0),
           'useNotification' =>$this->boolean()->notNull()->defaultValue(0),
           'repeatedType'=>$this->string(150)->notNull(),
           'email'=>$this->string(150),
           'createdAt'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
           'isDeleted'=>$this->boolean()->notNull()->defaultValue(0)

        ]);

        $this->createTable('users',[
            'id'=>$this->primaryKey(),
            'email'=>$this->string(150)->notNull(),
            'password_hash'=>$this->string(150)->notNull(),
            'token'=>$this->string(150),
            'auth_key'=>$this->string(150),
            'createdAt'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createIndex('userEmailUni', 'users', 'email',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('activity');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190818_154534_CreteTablse cannot be reverted.\n";

        return false;
    }
    */
}
