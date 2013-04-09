<?php

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : users.php
Author : Bobby Hazel
Description : RESTful users controller 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

class Users_Controller extends Base_Controller {
	
	public $restful = true;

	public function get_new ()
	{
		return View::make('users.new');
	}

	public function post_create()
	{
		$validation = User::validate(Input::all());

		if($validation->passes())
		{
			User::create(array(
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('password')),
				'fName' => Input::get('fName'),
				'lName' => Input::get('lName'),
				'bio' => Input::get('bio'),
				'major' => Input::get('major')
			));

			return Redirect::to_route('login')->with('message','<div class="alert alert-success">Thanks for registering!</div>');
		}
		else
		{
			return Redirect::to_route('register')->with_errors($validation)->with_input();
		}	
	}

	public function get_login()
	{
		return View::make('users.login');
	}

	public function post_login()
	{
		$user = array(
			'username' => Input::get('email'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($user)) 
		{
			return Redirect::to_route('home');
		} 
		else 
		{
			return Redirect::to_route('login')
				->with('message', '<div class="alert alert-error">Your username or password is incorrect, please try again.</div>');
		}
	}

	public function get_logout()
	{
		if(Auth::check())
		{
			Auth::logout();
			return Redirect::to_route('login')
				->with('message', '<div class="alert alert-warning">You are now logged out</div>');
		} 
		else
		{
			return Redirect::to_route('home');
		}
	}	
}


?>