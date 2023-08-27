<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer_user}}`.
 */
class m230827_085145_create_customer_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer_user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->unique(),
            'confirmation_code' => $this->integer(),
            'status' => $this->smallInteger(),
        ]);

        $this->createIndex('idx_username', 'customer_user', 'username');
    }

    public function safeDown()
    {
        $this->dropTable('customer_user');
    }
}
