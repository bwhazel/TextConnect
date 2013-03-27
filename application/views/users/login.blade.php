@layout('layouts.unauthenticated')

@section('content')
	<div class="jumbotron masthead">
 	  <div class="container">
      {{ Form::open('login', 'POST', array('class' => 'form-signin')) }}
      <div class="row-fluid logo">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 			width="56.345px" height="60.199px" viewBox="0 0 56.345 60.199" enable-background="new 0 0 56.345 60.199" xml:space="preserve">
			<g>
			<rect y="27.474" fill="#67C7BF" width="29.169" height="5.599"/>
			<polygon fill="#67C7BF" points="32.314,51.896 38.328,46.161 25.467,32.838 25.467,27.66 38.328,14.708 32.408,8.787 35.831,5.273 
				51.373,20.442 48.042,23.865 41.937,18.038 29.449,30.249 41.753,42.462 47.856,36.448 51.373,39.962 35.831,55.318 	"/>
			<polygon fill="#67C7BF" points="37.587,56.983 52.76,41.536 56.336,45.145 40.795,60.19 	"/>
			<polygon fill="#67C7BF" points="37.587,3.701 41.01,0 56.183,15.326 53.004,18.808 	"/>
			</g>
			</svg>
      	</div>
      	<div class="logo-text">
      		Please Log in
      	</div>
      	<hr>
        @if(Session::has('message'))
	        {{ Session::get('message') }}	        
        @endif
	        <input type="text" class="input-block-level" name="email" placeholder="Email address">
	        <input type="password" class="input-block-level" name="password" placeholder="Password">
        <button class="btn btn-success" type="submit">Sign In</button> 
      {{ Form::close() }}
      <div class="footer">
    	<p> Don't have an account? <a class="btn btn-primary" href="{{ URL::to('register') }}">Sign Up!</a><p>
      </div>
      </div> <!-- /container -->
    </div>
    
@endsection
