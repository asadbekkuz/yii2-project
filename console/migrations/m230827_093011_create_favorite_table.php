<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite}}`.
 */
class m230827_093011_create_favorite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('favorite', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'product_id' => $this->integer(),
            'added_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_customer_id', 'favorite', 'customer_id');
        $this->createIndex('idx_product_id', 'favorite', 'product_id');
        $this->addForeignKey('fk_favorite_customer_id', 'favorite', 'customer_id', 'customer', 'id');
        $this->addForeignKey('fk_favorite_product_id', 'favorite', 'product_id', 'product', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_favorite_product_id', 'favorite');
        $this->dropForeignKey('fk_favorite_customer_id', 'favorite');
        $this->dropIndex('idx_product_id', 'favorite');
        $this->dropIndex('idx_customer_id', 'favorite');
        $this->dropTable('favorite');
    }
}
