<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_system}}`.
 */
class m230827_092020_create_payment_system_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment_system', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('payment_system');
    }
}
