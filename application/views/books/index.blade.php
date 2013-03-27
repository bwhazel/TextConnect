@layout('layouts.master')

@section('content')	
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
    {{ $books->links(0, Paginator::ALIGN_CENTER); }} 
@endsection