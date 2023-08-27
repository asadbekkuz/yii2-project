<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m230827_085533_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->unique(),
        ]);

        $this->createIndex('idx_name', 'region', 'name');
    }

    public function safeDown()
    {
        $this->dropTable('region');
    }
}
