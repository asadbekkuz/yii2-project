<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meta_tag}}`.
 */
class m230827_092901_create_meta_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('meta_tag', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'title' => $this->string(255),
            'description' => $this->text(),
            'keywords' => $this->string(255),
            'og_title' => $this->string(255),
            'og_description' => $this->text(),
            'og_image_url' => $this->string(255),
            'twitter_title' => $this->string(255),
            'twitter_description' => $this->text(),
            'twitter_image_url' => $this->string(255),
            'canonical_url' => $this->string(255),
        ]);

        $this->createIndex('idx_product_id', 'meta_tag', 'product_id');
        $this->addForeignKey('fk_meta_tag_product_id', 'meta_tag', 'product_id', 'product', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_meta_tag_product_id', 'meta_tag');
        $this->dropIndex('idx_product_id', 'meta_tag');
        $this->dropTable('meta_tag');
    }
}
