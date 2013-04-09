@layout('layouts.master')

@section('content')
	<blockquote>
		<h3>{{ $book->title }}</h3>
	</blockquote>
	<hr>
	<img src="http://covers.openlibrary.org/b/isbn/{{e($book->isbn)}}-M.jpg" class="img-polaroid">
@endsection