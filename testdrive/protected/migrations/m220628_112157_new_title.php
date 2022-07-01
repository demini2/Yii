<?php

class m220628_112157_new_title extends CDbMigration
{
	public function up()
	{
        $this->execute('ALTER TABLE test ADD title VARCHAR (150)');
	}

	public function down()
	{
		$this->execute('ALTER TABLE test DROP COLUMN title');
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