<?php

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : routes.php
Author : Bobby Hazel
Description : routes for TextConnect
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

/*
* Home Resource	
*/
Route::get('/', array('before' => 'auth', 'as' => 'home', 'uses' => 'home@index'));


/*
* User Resource
*/
Route::get('users', array('as' => 'users', 'uses' => 'users@index'));
//Route::get('users/(:any)', array('as' => 'user', 'uses' => 'users@show'));
Route::get('register', array('as' => 'register', 'uses' => 'users@new'));
Route::get('logout', array('as' => 'logout', 'uses' => 'users@logout'));
Route::get('login', array('as'=> 'login', 'uses' => 'users@login'));
//Route::get('users/(:any)/edit', array('as' => 'edit_user', 'uses' => 'users@edit'));
Route::post('register', array('before' => 'csrf', 'uses' => 'users@create'));
Route::post('login', array('uses' => 'users@login'));
//Route::put('users/(:any)', 'users@update');
//Route::delete('users/(:any)', 'users@destroy');


/*
* Book Resource
*/
Route::get('books', array('as' => 'books', 'uses' => 'books@index'));
Route::get('books/(:num)', array('as' => 'book', 'uses' => 'books@show'));
Route::get('books/library', array('as'=> 'library' , 'uses' => 'books@library'));
Route::get('books/new', array('as' => 'new_book', 'uses' => 'books@new'));
Route::get('books/(:any)/edit', array('as' => 'edit_book', 'uses' => 'books@edit'));
Route::post('books', array('before' => 'csrf', 'uses' => 'books@create'));
Route::put('books/(:any)', array('before' => 'csrf', 'uses' => 'books@update'));
Route::delete('books/library', array('as' => 'destroy_book', 'uses' => 'books@destroy'));

/* 
* Class Resource
*/
Route::get('classes', array('as' => 'classes', 'uses' => 'classes@index'));
Route::get('classes/(:any)', array('as' => 'class', 'uses' => 'classes@show'));
Route::get('classes/new', array('as' => 'new_class', 'uses' => 'classes@new'));
Route::get('classes/term', array('as' => 'term', 'uses' => 'classes@term'));
Route::get('classes/(:any)/edit', array('as' => 'edit_class', 'uses' => 'classes@edit'));
Route::post('classes', 'classes@create');
Route::put('classes/(:any)', 'classes@update');
Route::delete('classes/(:any)', 'classes@destroy');

/* 
* File Uploader
*/
Route::any('upload', function()
{
	$upload_handler = IoC::resolve('uploadhandler');

	header('Pragma: no-cache');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Content-Disposition: inline; filename="files.json"');
	header('X-Content-Type-Options: nosniff');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

	switch ($_SERVER['REQUEST_METHOD']) 
	{
	    case 'OPTIONS':
	        break;
	    case 'HEAD':
	    case 'GET':
	        $upload_handler->get();
	        break;
	    case 'POST':
	        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
	            $upload_handler->delete();
	        } else {
	            $upload_handler->post();
	        }
	        break;
	    case 'DELETE':
	        $upload_handler->delete();
	        break;
	    default:
	        header('HTTP/1.1 405 Method Not Allowed');
	}
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});