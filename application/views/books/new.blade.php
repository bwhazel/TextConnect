@layout('layouts.master')

@section('content')   
          <blockquote>
            <p class="lead">Add a book</p>
          </blockquote>
          {{ Form::horizontal_open('books', 'POST') }}
          {{ Form::token() }}
            <div class="control-group {{ $errors->has('title') ? 'error' : '' }}">
              <label class="control-label" for="title">Title: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-book"></i></span>
                  {{ Form::xlarge_text('title', Input::old('title') , array('placeholder' => 'Title'))}}
                </div>
                {{ $errors->has('title') ? Form::inline_help($errors->first('title','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('author') ? 'error' : '' }}">
              <label class="control-label" for="author">Author: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  {{ Form::xlarge_text('author', Input::old('author') , array('placeholder' => 'Author'))}}
                </div>
                {{ $errors->has('title') ? Form::inline_help($errors->first('author','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('isbn') ? 'error' : '' }}">
              <label class="control-label" for="isbn">ISBN Number: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">#</span>
                  {{ Form::xlarge_text('isbn', Input::old('isbn'), array('class' => 'input-xlarge', 'placeholder' => 'ISBN Number'))}}
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
                  {{ Form::xlarge_text('price', Input::old('price') , array('placeholder' => 'Price'))}}
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
            {{ Form::actions(Button::primary_submit('Submit Book')) }}
          {{ Form::close() }}
@endsection