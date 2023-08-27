<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%district}}`.
 */
class m230827_085541_create_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('district', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer(),
            'name' => $this->string(255)->unique(),
        ]);

        $this->createIndex('idx_district_by_region', 'district', 'region_id');
        $this->addForeignKey('fk_district_region_id', 'district', 'region_id', 'region', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_district_region_id', 'district');
        $this->dropIndex('idx_district_by_region', 'district');
        $this->dropTable('district');
    }
}
