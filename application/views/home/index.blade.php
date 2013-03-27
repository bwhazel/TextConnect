@layout('layouts.master')

@section('content')
<h3>Welcome back, {{ Auth::user()->fname }} </h3>

@if(Session::has('message'))
	{{ Session::get('message') }}	        
@endif

@endsection
