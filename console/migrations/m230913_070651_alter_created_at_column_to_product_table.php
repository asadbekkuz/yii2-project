<?php

use yii\db\Migration;

/**
 * Class m230913_070651_alter_created_at_column_to_product_table
 */
class m230913_070651_alter_created_at_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('product','created_at',$this->integer());
        $this->alterColumn('product','updated_at',$this->integer());
        $this->alterColumn('product','deleted_at',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('product','created_at',$this->dateTime());
        $this->alterColumn('product','updated_at',$this->dateTime());
        $this->alterColumn('product','deleted_at',$this->dateTime());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230913_070651_alter_created_at_column_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
