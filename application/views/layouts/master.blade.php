<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TextConnect</title>
	<meta name="viewport" content="width=device-width">
	{{ Asset::container('bootstrapper')->styles();}}  
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<!-- Navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="{{ URL::to('/') }}"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="24px" height="20.94px" viewBox="0 0 24 20.94" enable-background="new 0 0 24 20.94" xml:space="preserve">
<g>
  <rect x="1.03" y="9.575" fill="#67C7BF" width="9.964" height="1.913"/>
  <polygon fill="#67C7BF" points="12.068,17.917 14.122,15.958 9.729,11.407 9.729,9.639 14.122,5.214 12.1,3.192 13.269,1.992 
    18.578,7.173 17.44,8.342 15.354,6.352 11.089,10.523 15.292,14.694 17.376,12.641 18.578,13.841 13.269,19.086   "/>
  <polygon fill="#67C7BF" points="13.869,19.655 19.052,14.378 20.273,15.611 14.965,20.75  "/>
  <polygon fill="#67C7BF" points="13.869,1.455 15.038,0.19 20.221,5.425 19.135,6.615  "/>
</g>
          </svg>TextConnect</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="{{ URI::is('/') ? 'active' : '' }}"><a href="/"><i class="icon-home"></i>Home</a></li>
            <li class="{{ URI::is('books*') ? 'active' : '' }}"><a href="/books"><i class="icon-book"></i>Books</a></li>
            <li class="{{ URI::is('messages*') ? 'active' : '' }}"><a href="/messages"><i class="icon-envelope"></i>Messages</a></li>
            <li class=""><a href=""><i class="icon-cogs"></i>Settings</a></li>
          </ul>
          <div class="nav navbar-text pull-right">
            Welcome, {{ Auth::user()->fname }} ( {{ HTML::link_to_route('logout', 'logout') }} )      
          </div>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
<body>
	<div class="container">
  @if(Session::has('message'))
    {{ Session::get('message') }}         
  @endif
    <div class="row-fluid">
      <div class="span2">
        <div class="sidebar-nav">
          <div class="well" style="width: 180px; padding: 15px 0;">
            <ul class="nav nav-list">
              <li class="{{ URI::is('books') ? 'active' : '' }}"><a href="/books"><i class="icon-home"></i>Home</a></li>
              <li class="nav-header"><i class="icon-book"></i>Books</li>
              <li class="{{ URI::is('books/new') ? 'active' : '' }}"><a href="{{ URL::to('books/new') }}"><i class="icon-plus"></i>Post A Book</a></li>
              <li class=""><a href="#"><i class="icon-search"></i>Search Books</a></li>
              <li class="{{ URI::is('books/library') ? 'active' : '' }}"><a href="{{ URL::to('books/library') }}"><i class="icon-book"></i>My Library</a></li>
              <li class="nav-header">Profile</li>
              <li class="{{ URI::is('classes*') ? 'active' : '' }}"><a href="/classes"><i class="icon-list-alt"></i>Class Schedule</a></li>
              <li class="nav-header"><i class="icon-envelope"></i>Messages</li>
            </ul>
          </div><!--/.well -->
        </div>
      </div><!--/span-->
      <div class="span9">
		    @yield('content')
      </div>
    </div>
	</div>	
</body>
{{ Asset::container('bootstrapper')->scripts();}}
{{ HTML::script('js/main.js') }}
</html>