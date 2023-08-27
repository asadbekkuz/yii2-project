<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_detail}}`.
 */
class m230827_091911_create_order_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_detail', [
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
        ]);

        $this->createIndex('idx_order_id', 'order_detail', 'order_id');
        $this->createIndex('idx_product_id', 'order_detail', 'product_id');
        $this->addForeignKey('fk_order_detail_order_id', 'order_detail', 'order_id', 'order', 'id');
        $this->addForeignKey('fk_order_detail_product_id', 'order_detail', 'product_id', 'product', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_order_detail_product_id', 'order_detail');
        $this->dropForeignKey('fk_order_detail_order_id', 'order_detail');
        $this->dropIndex('idx_product_id', 'order_detail');
        $this->dropIndex('idx_order_id', 'order_detail');
        $this->dropTable('order_detail');
    }
}
