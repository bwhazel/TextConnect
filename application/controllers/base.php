<?php

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : base.php
Author : Bobby Hazel
Description : Base controller 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}