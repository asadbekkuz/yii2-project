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

        $this->createIndex('idx-customer_image-customer_id','customer_image','customer_id');

        $this->addForeignKey('fk-customer_image-customer_id','customer_image','customer_id','customer','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-customer_image-customer_id','customer_image');
        $this->dropIndex('idx-customer_image-customer_id','customer_image');
        $this->dropTable('{{%customer_image}}');
    }
}
