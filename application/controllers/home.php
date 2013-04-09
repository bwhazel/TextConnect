<?php

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : books.php
Author : Bobby Hazel
Description : RESTful Home controller 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

class Home_Controller extends Base_Controller {

	public $restful = true;

	public function get_index(){
			return View::make('home.index');
	}


}