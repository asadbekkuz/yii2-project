<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%specification_label}}`.
 */
class m230906_053540_create_specification_label_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%specification_label}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%specification_label}}');
    }
}
