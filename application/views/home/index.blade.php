@layout('layouts.master')

@section('content')
<h1>Search Page</h1>

@if(Session::has('message'))
	{{ Session::get('message') }}	        
@endif

@endsection
