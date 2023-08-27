<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_image}}`.
 */
class m230827_090557_create_product_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_image', [
            'product_id' => $this->integer(),
            'image' => $this->string(255),
            'order_num' => $this->smallInteger(),
            'main_image' => $this->boolean(),
        ]);

        $this->createIndex('idx_product_id', 'product_image', 'product_id');
        $this->addForeignKey('fk_product_image_product_id', 'product_image', 'product_id', 'product', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_product_image_product_id', 'product_image');
        $this->dropIndex('idx_product_id', 'product_image');
        $this->dropTable('product_image');
    }
}
