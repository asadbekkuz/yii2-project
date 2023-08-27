<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m230827_085701_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'PID' => $this->integer(),
            'name' => $this->string(255)->unique(),
            'status' => $this->smallInteger(),
            'image' => $this->string(255),
        ]);

        $this->createIndex('idx_PID', 'category', 'PID');
        $this->createIndex('idx_name', 'category', 'name');
    }

    public function safeDown()
    {
        $this->dropTable('category');
    }
}
