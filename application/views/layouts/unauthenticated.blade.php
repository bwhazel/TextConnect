<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sign In</title>
	<meta name="viewport" content="width=device-width">
	{{ Asset::container('bootstrapper')->styles() }}
	{{ HTML::style('css/font-awesome.min.css') }}
	{{ HTML::style('css/login.css') }}
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
          <a class="brand" href="/">TextConnect</a>
        </div>
      </div>
    </div>
<body>
	<div class="container">
		@yield('content')
	</div>	
</body>
{{ Asset::container('bootstrapper')->scripts() }}
</html>
