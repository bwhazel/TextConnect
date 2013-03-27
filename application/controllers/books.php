<?php

class Books_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
		$this->filter('before','auth')->only(array('create', 'library', 'edit', 'update'));
	}

	public function get_index()
	{
		return View::make('books.index')
			->with('books', Book::incomplete());
	}

	public function get_new()
	{
		return View::make('books.new');
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
			return Redirect::to_route('new_book')->with_errors($validation)->with_input();
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
			return Redirect::to_route('library')->with('message', '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>Invalid Book</div>');
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
				->with('message', '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>Invalid Book</div>');
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