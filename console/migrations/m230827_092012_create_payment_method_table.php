<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_method}}`.
 */
class m230827_092012_create_payment_method_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment_method', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'card_name' => $this->string(255),
            'card_number' => $this->string(255),
            'card_expire_date' => $this->string(255),
        ]);

        $this->createIndex('idx_customer_id', 'payment_method', 'customer_id');
        $this->addForeignKey('fk_payment_method_customer_id', 'payment_method', 'customer_id', 'customer', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_payment_method_customer_id', 'payment_method');
        $this->dropIndex('idx_customer_id', 'payment_method');
        $this->dropTable('payment_method');
    }
}
