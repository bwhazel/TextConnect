@layout('layouts.unauthenticated')

@section('content')
 	  <div class="container">
      {{ Form::open('login', 'POST', array('class' => 'form-signin')) }}
        <h2 class="form-signin-heading">Log In</h2> 
        @if(Session::has('message'))
	        {{ Session::get('message') }}	        
        @endif
	        <input type="text" class="input-block-level" name="email" placeholder="Email address">
	        <input type="password" class="input-block-level" name="password" placeholder="Password">
        <button class="btn btn-success" type="submit">Sign In</button> &nbsp or &nbsp <a class="btn btn-primary" href="{{ URL::to('register') }}">Sign Up</a><br />
      {{ Form::close() }}
    </div> <!-- /container -->
@endsection
