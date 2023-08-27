<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 */
class m230827_090622_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
            'session' => $this->string(255),
            'user_id' => $this->integer(),
            'added_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_product_id', 'cart', 'product_id');
        $this->addForeignKey('fk_cart_product_id', 'cart', 'product_id', 'product', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_cart_product_id', 'cart');
        $this->dropIndex('idx_product_id', 'cart');
        $this->dropTable('cart');
    }
}
