<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer_address}}`.
 */
class m230827_090916_create_customer_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer_address', [
            'id' => $this->primaryKey(),
            'customer_user_id' => $this->integer(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer(),
            'address' => $this->text(),
            'zipcode' => $this->string(255),
            'phone_number' => $this->string(255),
        ]);

        $this->createIndex('idx_address_customer_id', 'customer_address', 'customer_user_id');
        $this->createIndex('idx_address_region_id', 'customer_address', 'region_id');
        $this->createIndex('idx_address_district_id', 'customer_address', 'district_id');
        $this->addForeignKey('fk_address_customer_id', 'customer_address', 'customer_user_id', 'customer_user', 'id');
        $this->addForeignKey('fk_address_region_id', 'customer_address', 'region_id', 'region', 'id');
        $this->addForeignKey('fk_address_district_id', 'customer_address', 'district_id', 'district', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_address_district_id', 'customer_address');
        $this->dropForeignKey('fk_address_region_id', 'customer_address');
        $this->dropForeignKey('fk_address_customer_id', 'customer_address');
        $this->dropIndex('idx_address_district_id', 'customer_address');
        $this->dropIndex('idx_address_region_id', 'customer_address');
        $this->dropIndex('idx_address_customer_id', 'customer_address');
        $this->dropTable('customer_address');
    }
}
