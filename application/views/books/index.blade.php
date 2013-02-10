@layout('layouts.master')

@section('content')
	<div class="page-header">
	  <h1>Books <small>Find the right books for upcoming classes, or browse!</small></h1>
	</div>
	@if(Session::has('message'))
		{{ Session::get('message') }}	        
	@endif
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><i class="icon-book"></i>Books</li>
              <li class="active"><a href="/books"><i class="icon-home"></i>Home</a></li>
              <li><a href="{{ URL::to('books/new') }}"><i class="icon-plus"></i>Post A Book</a></li>
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
		<div class="span9" id="books">		
	  	<blockquote>
  		  <p class="lead">Recommended For You</p>
		</blockquote>
		@if(!$books->results)
		  <p>No results found</p>
		@else
		  <table class="table table-hover table-bordered table-striped">
			<thead>
			  <tr>
				<th>Title</th>
				<th>Author</th>
		        <th>ISBN</th>
		    	<th>Price</th>
				<th>Trade</tr>
			  </tr>
			</thead>
			<tbody>
			  @foreach($books->results as $book)
			    <tr>
				  <td>{{ HTML::link_to_route('book', $book->title, $book->id); }}</td>
				  <td>{{ e($book->author) }}</td>
				  <td>{{ e($book->isbn) }}</td>
				  <td>{{ e($book->price) }}</td>
				  <td>{{ $book->trade == 0? '<i class="icon-remove x-icon"></i>' : '<i class="icon-ok check-icon"></i>' }}</td>
				</tr>
			  @endforeach
			</tbody>
		  </table>
		@endif
	    </div>
      </div>
    </div>
    {{ $books->links(0, Paginator::ALIGN_CENTER); }} 
@endsection