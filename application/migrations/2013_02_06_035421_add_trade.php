<?php

class Add_Trade {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('books', function($table)
        {
            $table->boolean('trade');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('books', function($table)
        {
            $table->drop_column('trade');
        });
		
	}

}