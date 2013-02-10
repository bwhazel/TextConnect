@layout('layouts.unauthenticated')

@section('content')
	  {{ Form::horizontal_open('register', 'POST') }}
		{{ Form::token() }}
      <h2>Register</h2>
		  <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
  			<label class="control-label" for="email">Email address: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-envelope"></i></span>
      			{{ Form::xlarge_text('email', Input::old('email') ,array('placeholder' => 'Email'))}}
    			</div>
    		{{ $errors->has('email') ? Form::inline_help($errors->first('email','<li>:message</li>')) : '' }}
  			</div>
		  </div>
		  <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
  			<label class="control-label" for="password">Password: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-lock"></i></span>
      			{{ Form::password('password', array('class' => 'input-xlarge', 'placeholder' => 'Password'))}}
    			</div>
    		{{ $errors->has('email') ? Form::inline_help($errors->first('password','<li>:message</li>')) : '' }}
  			</div>
		  </div>
		  <div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
  			<label class="control-label" for="password_confirmation">Confirm Password: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-lock"></i></span>
      			{{ Form::password('password_confirmation', array('class' => 'input-xlarge', 'placeholder' => 'Confirm Password'))}}
    			</div>
    		{{ $errors->has('password_confirmation') ? Form::inline_help($errors->first('password_confirmation', '<li>:message</li>')) : '' }}
  			</div>
		  </div>
		  <div class="control-group {{ $errors->has('fName') ? 'error' : '' }}">
  			<label class="control-label" for="fName">First Name: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-user"></i></span>
      			{{ Form::xlarge_text('fName', Input::old('fName') ,array('placeholder' => 'First Name'))}}
    			</div>
    		{{ $errors->has('fName') ? Form::inline_help($errors->first('fName', '<li>Your first name is required.</li>')) : '' }}
  			</div>
		  </div>
		  <div class="control-group {{ $errors->has('lName') ? 'error' : '' }}">
  			<label class="control-label" for="lName">Last Name: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-user"></i></span>
      			{{ Form::xlarge_text('lName', Input::old('lName') ,array('placeholder' => 'Last Name'))}}
    			</div>
    			{{ $errors->has('lName') ? Form::inline_help($errors->first('lName', '<li>Your last name is required.</li>')) : '' }}
  			</div>
		  </div>
		  <div class="control-group {{ $errors->has('major') ? 'error' : '' }}">
  			<label class="control-label" for="major">Major: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-book "></i></span>
      			{{ Form::xlarge_text('major', Input::old('major') ,array('placeholder' => 'Major'))}}
    		  </div>
    		{{ $errors->has('major') ? Form::inline_help($errors->first('major', '<li>:message</li>')) : '' }}
  			</div>
		  </div>
		  <div class="control-group">
  			<label class="control-label" for="bio">About: </label>
  			<div class="controls">
    			<div class="input-prepend">
      			<span class="add-on"><i class="icon-pencil"></i></span>
      			{{ Form::xlarge_textarea('bio', Input::old('bio') ,array('placeholder' => 'Tell us a bit about yourself...', 'cols' => '100'))}}
    			</div>
  			</div>
		  </div>
      {{ Form::actions(Button::primary_submit('Register')) }}
    {{ Form::close() }}
@endsection