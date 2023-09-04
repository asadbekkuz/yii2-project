<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer_image}}`.
 */
class m230904_155519_create_customer_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer_image}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'image' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer_image}}');
    }
}
