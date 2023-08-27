<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m230827_085258_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'customer_user_id' => $this->integer(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'middle_name' => $this->string(255),
            'gender' => $this->string(255),
            'birth_date' => $this->date(),
            'registered_at' => $this->dateTime(),
            'status' => $this->smallInteger(),
        ]);

        $this->createIndex('idx_customer_user_id', 'customer', 'customer_user_id');
        $this->addForeignKey('fk_customer_user_id', 'customer', 'customer_user_id', 'customer_user', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_customer_user_id', 'customer');
        $this->dropIndex('idx_customer_user_id', 'customer');
        $this->dropTable('customer');
    }
}
