<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%specification}}`.
 */
class m230906_053541_create_specification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%specification}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->notNull(),
            'specification_label_id' => $this->integer(11)->notNull(),
            'specification_name'=>$this->string(100)->notNull()
        ]);

        $this->createIndex('idx-specification-category_id','specification','category_id');

        $this->addForeignKey('fk-specification-category_id','specification','category_id','category','id');

        $this->createIndex('idx-specification-specification_label_id','specification','specification_label_id');

        $this->addForeignKey('fk-specification-specification_label_id','specification','specification_label_id','specification_label','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-specification-category_id','specification');
        $this->dropIndex('idx-specification-category_id','specification');

        $this->dropForeignKey('fk-specification-specification_label_id','specification');
        $this->dropIndex('idx-specification-specification_label_id','specification');

        $this->dropTable('{{%specification}}');
    }
}
