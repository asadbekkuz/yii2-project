<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m230827_092033_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'amount' => $this->integer(),
            'payment_system_id' => $this->integer(),
            'transaction_id' => $this->string(255),
            'created_at' => $this->dateTime(),
            'status' => $this->smallInteger(),
        ]);

        $this->createIndex('idx_order_id', 'payment', 'order_id');
        $this->createIndex('idx_payment_system_id', 'payment', 'payment_system_id');
        $this->addForeignKey('fk_payment_order_id', 'payment', 'order_id', 'order', 'id');
        $this->addForeignKey('fk_payment_payment_system_id', 'payment', 'payment_system_id', 'payment_system', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_payment_payment_system_id', 'payment');
        $this->dropForeignKey('fk_payment_order_id', 'payment');
        $this->dropIndex('idx_payment_system_id', 'payment');
        $this->dropIndex('idx_order_id', 'payment');
        $this->dropTable('payment');
    }
}
