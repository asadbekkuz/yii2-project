<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m230827_091519_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'customer_user_id' => $this->integer(),
            'ordered_at' => $this->dateTime(),
            'customer_address_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'required_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_customer_id', 'order', 'customer_user_id');
        $this->createIndex('idx_customer_address_id', 'order', 'customer_address_id');
        $this->addForeignKey('fk_order_customer_user_id', 'order', 'customer_user_id', 'customer_user', 'id');
        $this->addForeignKey('fk_order_customer_address_id', 'order', 'customer_address_id', 'customer_address', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_order_customer_address_id', 'order');
        $this->dropForeignKey('fk_order_customer_user_id', 'order');
        $this->dropIndex('idx_customer_address_id', 'order');
        $this->dropIndex('idx_customer_id', 'order');
        $this->dropTable('order');
    }
}
