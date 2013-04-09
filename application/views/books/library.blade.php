@layout('layouts.master')

@section('content')	
	  	<blockquote>
  		  <p class="lead">Your Books</p>
		</blockquote>
		@if(!$books->results)
		  <p>No results found</p>
		@else
		  <table class="table table-hover table-bordered table-striped">
			<thead>
			  <tr>
			  	<th>Picture</th>
				<th>Title</th>
				<th>Author</th>
		        <th>ISBN</th>
		    	<th>Price</th>
				<th>Trade</th>
				<th>Edit</th>
				<th>Delete</th>
			  </tr>
			</thead>
			<tbody>
			  @foreach($books->results as $book)
			    <tr>
			      <td><img src="http://covers.openlibrary.org/b/isbn/{{e($book->isbn)}}-S.jpg"/></td> 
				  <td>{{ HTML::link_to_route('book', $book->title, $book->id); }}</td>
				  <td>{{ e($book->author) }}</td>
				  <td>{{ e($book->isbn) }}</td>
				  <td>{{ $book->price == ''? e($book->price) : e('$'. $book->price) }}</td>
				  <td>{{ $book->trade == 0? '<i class="icon-remove x-icon"></i>' : '<i class="icon-ok check-icon"></i>' }}</td>
				  <td >{{ HTML::link_to_route('edit_book', 'Edit', $book->id, array('class' => 'btn btn-success btn-small')) }}</td>
				  <td>{{ Form::open('books/library', 'DELETE', array('class' => 'delete-form table-center')) }} {{ Form::hidden('book_id', $book->id) }} <input type="submit" value="Delete" class="btn btn-danger btn-small"/>{{ Form::close() }}</td>
				</tr>
			  @endforeach
			</tbody>
		  </table>
		@endif
    {{ $books->links(0, Paginator::ALIGN_CENTER); }} 
@endsection