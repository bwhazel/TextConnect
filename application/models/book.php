<?php

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : book.php
Author : Bobby Hazel
Description : Book model
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

class Book extends Basemodel {

	public static $rules = array(
		'title' => 'required',
		'author' => 'required',
		'completed' => 'in:0,1',
		'isbn' => 'size:13',
	);

	public function user() 
	{
		return $this->belongs_to('User');
	}

	public static function incomplete() 
	{
		return static::where('completed' , '=' , 0)->order_by('id', 'DESC')->paginate(30);
	}

	public static function your_books()
	{
		return static::where('user_id', '=' , Auth::user()->id)->paginate(5);
	}
}