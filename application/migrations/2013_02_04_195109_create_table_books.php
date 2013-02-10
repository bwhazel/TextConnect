<?php

class Create_Table_Books {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('isbn');
			$table->string('title');
			$table->string('author');
			$table->string('edition');
			$table->string('price');
			$table->boolean('completed');
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
		Schema::drop('books');
	}

}