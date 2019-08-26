<?php

use yii\db\Migration;

/**
 * Class m190826_125704_alter
 */
class m190826_125704_alter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('users', ['password_hash'=> Yii::$app->security->generatePasswordHash(123456)], ['id'=>1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190826_125704_alter cannot be reverted.\n";

        return false;
    }
    */
}
