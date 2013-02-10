@layout('layouts.master')

@section('content')
	<div class='page-header'>
      <h1>Books <small>Edit</small></h1>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><i class="icon-book"></i>Books</li>
              <li><a href="/books"><i class="icon-home"></i>Home</a></li>
              <li class="active" ><a href="{{ URL::to('books/new') }}"><i class="icon-plus"></i>Post A Book</a></li>
              <li><a href="#"><i class="icon-search"></i>Search Books</a></li>
              <li><a href="{{ URL::to('books/your_books') }}"><i class="icon-user"></i>My Books</a></li>
              <li class="nav-header">Profile</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" id="new_book">    
          <blockquote>
            <p class="lead">Edit</p>
          </blockquote>
          {{ Form::horizontal_open('books/'. $book->id, 'PUT') }}
          {{ Form::token() }}
            <div class="control-group {{ $errors->has('title') ? 'error' : '' }}">
              <label class="control-label" for="title">Title: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-book"></i></span>
                  {{ Form::xlarge_text('title', $book->title , array('placeholder' => 'Title'))}}
                </div>
                {{ $errors->has('title') ? Form::inline_help($errors->first('title','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('author') ? 'error' : '' }}">
              <label class="control-label" for="author">Author: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  {{ Form::xlarge_text('author', $book->author , array('placeholder' => 'Author'))}}
                </div>
                {{ $errors->has('author') ? Form::inline_help($errors->first('author','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('isbn') ? 'error' : '' }}">
              <label class="control-label" for="isbn">ISBN Number: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">#</span>
                  {{ Form::xlarge_text('isbn', $book->isbn, array('class' => 'input-xlarge', 'placeholder' => 'ISBN Number'))}}
                </div>
                {{ $errors->has('isbn') ? Form::inline_help($errors->first('isbn','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('edition') ? 'error' : '' }}">
              <label class="control-label" for="edition">Edition: </label>
              <div class="controls">
                {{ Form::select('edition', array('--','1', '2', '3', '4', '5', '6', '7', '8', '9','10')) }}      
              {{ $errors->has('edition') ? Form::inline_help($errors->first('edition', '<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('price') ? 'error' : '' }}">
              <label class="control-label" for="price">Price: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">$</span>
                  {{ Form::xlarge_text('price', $book->price , array('placeholder' => 'Price'))}}
                </div>
                {{ $errors->has('price') ? Form::inline_help($errors->first('price', '<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('trade') ? 'error' : '' }}">
              <label class="control-label" for="trade">Trade: </label>
              <div class="controls">
                {{ Form::labelled_checkbox('trade', 'Would you be willing to trade this book for another you may need?', 'option1') }}       
              {{ $errors->has('trade') ? Form::inline_help($errors->first('trade', '<li>:message</li>')) : '' }}
              </div>
            </div>
            {{ Form::hidden('book_id', $book->id) }}
            {{ Form::actions(Button::primary_submit('Update')) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
@endsection