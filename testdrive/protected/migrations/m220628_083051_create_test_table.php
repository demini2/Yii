<?php

class m220628_083051_create_test_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('test', [
            'id' => 'int',
            'content' => 'string'
        ]);
    }


    public function down()
    {
        $this->dropTable('test');
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}