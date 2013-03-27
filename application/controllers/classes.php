<?php

class Classes_Controller extends Base_Controller {

	public $restful = true; 

	public function get_index()
	{
		return View::make('classes.home');
	}

	public function get_new()
	{
		return View::make('classes.new');
	}

	public function get_term()
	{
		return View::make('classes.show')
			->with('term', Input::get('term'))
			->with('classes', Schedule::get_user_schedule(Input::get('term')));
	}

	public function post_create()
	{
		$validation = Schedule::validate(Input::all());

		if($validation->passes())
		{
			Schedule::create(array(
				'user_id' => Auth::user()->id,
				'term' => Input::get('term'),
				'department' => Input::get('department'),
				'course' => Input::get('course'),
				'section' => Input::get('section')
			));

			return Redirect::to_route('classes')
				->with('message', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>The class has been added.</div>');
		}
		else
		{
			return Redirect::to_route('new_class')->with_errors($validation)->with_input();
		}
	}


}