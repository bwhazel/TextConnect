<?php

class Create_Classes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('semester');
			$table->string('department');
			$table->string('course');
			$table->string('section');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classes');		
	}

}