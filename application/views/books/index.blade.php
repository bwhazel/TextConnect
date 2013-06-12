@layout('layouts.open')

@section('content')	
	  	<blockquote>
  		  <p class="lead">Recommended For You</p>
		</blockquote>
		<hr/>
		@if(!$books->results)
		  <p>No results found</p>
		@else
		<div id="main">
			<ul id="tiles">
				@foreach($books->results as $book)
					<li>
						<div class="btn-list">
							<section><a href="books/{{$book->id}}"/><i class="icon-search icon-large"></i><p>View</p></a></section>
							<section><i class="icon-envelope icon-large"></i><p>Message</p></section>
							<section><i class="icon-share icon-large"></i><p>Share</p></section>
						</div>
						<img class="thumb-pic img-polaroid" src="http://covers.openlibrary.org/b/isbn/{{e($book->isbn)}}-M.jpg">
						<hr>
						<div class="caption">
							<p><b>{{ e($book->title) }}</b></p>
							<p class="author">{{ e($book->author) }}</p>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		@endif
    	{{ $books->links(0, Paginator::ALIGN_CENTER); }} 
@endsection