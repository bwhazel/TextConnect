<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>BookConnect</title>
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
        <a class="brand" href="{{ URL::to('/') }}">TextConnect</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="{{ URI::is('/') ? 'active' : '' }}"><a href="/"><i class="icon-search"></i>Search</a></li>
            <li class="{{ URI::is('books*') ? 'active' : '' }}"><a href="/books"><i class="icon-book"></i>Books</a></li>
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
		@yield('content')
	</div>	
</body>
{{ Asset::container('bootstrapper')->scripts();}}
{{ HTML::script('js/main.js') }}
</html>