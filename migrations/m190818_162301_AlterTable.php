<?php

use yii\db\Migration;

/**
 * Class m190818_162301_AlterTable
 */
class m190818_162301_AlterTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'user_id', $this->integer()->notNull());
        $this->addForeignKey('activity_user_FK', 'activity','user_id', 'users',
            'id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190818_162301_AlterTable cannot be reverted.\n";

        return false;
    }
    */
}
