<?php

class m150419_160742_likes extends CDbMigration
{
    public function up()
    {
        $this->createTable('project_likes',array(
            'id'=>'pk',

            'project_name'         =>'varchar(255) NOT NULL'
        ));

        $this->createTable('users_likes',array(
            'id'=>'pk',

            'user_login'         =>'varchar(255) NOT NULL'
        ));
    }

	public function down()
	{
		echo "m150419_160742_likes does not support migration down.\n";
		return false;
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