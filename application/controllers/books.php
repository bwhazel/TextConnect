<?php

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : books.php
Author : Bobby Hazel
Description : RESTful Books controller 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/


class Books_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
		$this->filter('before','auth')->only(
			array('create', 'library', 'edit', 'update', 'show', 'new', 'index')
		);
	}

	public function get_index()
	{
		return View::make('books.index')
			->with('books', Book::incomplete());
	}

	public function get_new()
	{
		$isbn = Input::get('isbn');

		if($isbn != ''){

			//Create url
			$url='http://isbndb.com/api/books.xml?access_key=XRTO3TED&results=details&index1=isbn&value1='.$isbn;

			//Load url into $response
			$response = simplexml_load_file($url);

			//Check if we got at least one result
			if($response->BookList['total_results']==1)
			{
				$book = $response->BookList->BookData;

				return View::make('books.new')
					->with('isbn', $book['isbn13'])
					->with('title', $book->Title)
					->with('author', $book->AuthorsText)
					->with('publisher', $book->PublisherText)
					->with('edition', $book->Details['edition_info'])
					->with('language', $book->Details['language'])
					->with('description', $book->Details['physical_description_text']);
			}
			else
			{
			return View::make('books.new')
				->with('message', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">x</button>No Book was found with ISBN</div>');
			}	
		}
		else
		{
			return View::make('books.new');
		}
		
	}

	public function post_create()
	{
		$validation = Book::validate(Input::all());
		if (Input::get('trade')){$checked = 1;}else{$checked = 0;}

		if($validation->passes()) 
		{
			Book::create(array(
				'user_id' => Auth::user()->id,
				'isbn' => Input::get('isbn'),
				'title' => Input::get('title'),
				'author' => Input::get('author'),
				'edition' => Input::get('edition'),
				'price' => Input::get('price'),
				'trade' => $checked,
			));

			return Redirect::to_route('books')
				->with('message', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>The book has been added.</div>');
		}
		else
		{
			return Redirect::to_route('new_book')
				->with_errors($validation)->with_input();
		}

	}

	public function get_show($id = null)
	{
		return View::make('books.show')
			->with('book', Book::find($id));
	}
	public function get_library()
	{
		return View::make('books.library')
			->with('fname', Auth::user()->fname)
			->with('lname', Auth::user()->lname)
			->with('email', Auth::user()->email)
			->with('books', Book::your_books());
	}

	public function get_edit($id = NULL)
	{
		if (!$this->book_belongs_to_user($id))
		{
			return Redirect::to_route('library')
				->with('message', '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>You do not have permission to edit this book</div>');
		}

		return View::make('books.edit')
			->with('book', Book::find($id));
	}

	public function put_update()
	{
		$id = Input::get('book_id');

		if(!$this->book_belongs_to_user($id))
		{
			return Redirect::to_route('your_books')
				->with('message', '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>You do not have permission to edit this book.</div>');
		}

		$validation = Book::validate(Input::all());

		if (Input::get('trade')){$checked = 1;}else{$checked = 0;}

		if($validation->passes())
		{
			Book::update($id, array(
				'user_id' => Auth::user()->id,
				'isbn' => Input::get('isbn'),
				'title' => Input::get('title'),
				'author' => Input::get('author'),
				'edition' => Input::get('edition'),
				'price' => Input::get('price'),
				'trade' => $checked,
			));

			return Redirect::to_route('book', $id)
				->with('message', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>Book has been updated</div>');
		}
		else
		{
			return Redirect::to_route('edit_book', $id)->with_errors($validation);
		}
	}

	public function delete_destroy($id = NULL)
	{
		$id = Input::get('book_id');
		$book = Book::find($id);
		$book->delete();
		return Redirect::to_route('library')
			->with('message', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>Book <i> ' . $book->title . '</i> has been deleted</div>' );
	}

	private function book_belongs_to_user($id)
	{
		$book = Book::find($id);

		if ($book->user_id == Auth::user()->id) 
		{
			return true;
		}

		return false;
	}

}