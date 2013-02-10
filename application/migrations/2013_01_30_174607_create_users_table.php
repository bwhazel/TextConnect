<?php

class Create_Users_Table {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('fName');
			$table->string('lName');
			$table->string('email');
			$table->text('bio')->nullable();
			$table->string('major');
			$table->string('password');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('users');

    }

}