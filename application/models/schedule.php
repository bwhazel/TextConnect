<?php

class Schedule extends Basemodel {

	public static $table = 'classes';

	public static $rules = array(
		'term' => 'required',
		'department' => 'required',
		'course' => 'required',
		'section' => 'required',
	);

	public function user() 
	{
		return $this->belongs_to('User');
	}

	public static function get_user_schedule($term)
	{
		return static::where('user_id', '=' , Auth::user()->id)->where('term', '=', $term)->paginate(5);
	}
}