<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%category}}`.
 */
class m230905_163915_add_foreign_key_pid_column_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-category-PID','category','PID');

        $this->addForeignKey('fk-category-PID','category','PID','category','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-PID','category');

        $this->dropIndex('idx-category-PID','category');
    }
}
