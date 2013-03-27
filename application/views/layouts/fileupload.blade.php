<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TextConnect</title>
	<meta name="viewport" content="width=device-width">
	{{ Asset::container('bootstrapper')->styles();}}
  {{ HTML::style('bundles/jqueryfileupload/css/style.css') }}
  {{ HTML::style('bundles/jqueryfileupload/css/bootstrap-image-gallery.min.css') }}
  {{ HTML::style('bundles/jqueryfileupload/css/jquery.fileupload-ui.css') }}   
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
            <li class="{{ URI::is('/') ? 'active' : '' }}"><a href="/"><i class="icon-home"></i>Home</a></li>
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
{{ HTML::script('bundles/jqueryfileupload/js/tmpl.min.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/load-image.min.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/canvas-to-blob.min.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/bootstrap-image-gallery.min.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/jquery.ui.widget.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/jquery.iframe-transport.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/jquery.fileupload.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/jquery.fileupload-fp.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/jquery.fileupload-ui.js') }}
{{ HTML::script('bundles/jqueryfileupload/js/locale.js') }}
{{ HTML::script('js/main.js') }}
</html>