<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brand}}`.
 */
class m230827_085708_create_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->unique(),
            'logo' => $this->string(255),
            'short_name' => $this->string(255),
            'status' => $this->smallInteger(),
        ]);

        $this->createIndex('idx_name', 'brand', 'name');
    }

    public function safeDown()
    {
        $this->dropTable('brand');
    }
}
