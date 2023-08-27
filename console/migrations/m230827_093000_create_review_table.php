<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m230827_093000_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('review', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'customer_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'comment' => $this->string(255),
            'rate' => $this->integer(),
            'status' => $this->smallInteger(),
        ]);

        $this->createIndex('idx_product_id', 'review', 'product_id');
        $this->createIndex('idx_customer_id', 'review', 'customer_id');
        $this->addForeignKey('fk_review_product_id', 'review', 'product_id', 'product', 'id');
        $this->addForeignKey('fk_review_customer_id', 'review', 'customer_id', 'customer', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_review_customer_id', 'review');
        $this->dropForeignKey('fk_review_product_id', 'review');
        $this->dropIndex('idx_customer_id', 'review');
        $this->dropIndex('idx_product_id', 'review');
        $this->dropTable('review');
    }
}
