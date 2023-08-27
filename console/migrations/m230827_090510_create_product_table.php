<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230827_090510_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->unique(),
            'desc_list' => $this->text(),
            'description' => $this->text(),
            'category_id' => $this->integer(),
            'brand_id' => $this->integer(),
            'SKU' => $this->string(255)->unique(),
            'specification' => $this->json(),
            'status' => $this->smallInteger(),
            'price' => $this->integer(),
            'new_price' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'deleted_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx_product_category', 'product', 'category_id');
        $this->createIndex('idx_product_brand', 'product', 'brand_id');
        $this->addForeignKey('fk_product_category', 'product', 'category_id', 'category', 'id');
        $this->addForeignKey('fk_product_brand', 'product', 'brand_id', 'brand', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_product_brand', 'product');
        $this->dropForeignKey('fk_product_category', 'product');
        $this->dropIndex('idx_product_brand', 'product');
        $this->dropIndex('idx_product_category', 'product');
        $this->dropTable('product');
    }
}
