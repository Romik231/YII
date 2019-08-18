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

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190818_164153_Insert cannot be reverted.\n";

        return false;
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
