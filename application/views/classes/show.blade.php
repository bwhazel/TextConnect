@layout('layouts.master')

@section('content')    
          <blockquote>
              <p class="lead">{{$term}} Classes<a class="btn btn-warning pull-right" href="{{ URL::to('classes/new') }}">Add More!</a></p>
          </blockquote>
          @if(!$classes->results)
            <p>No results found</p>
          @else
            <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Course</th>
                <th>Department</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($classes->results as $class)
                <tr>
                <td>{{ e($class->course) . '.' . e($class->section) }}</td>
                <td>{{ e($class->department) }}</td>
                <td>{{ HTML::link_to_route('edit_class', 'Edit', $class->id, array('class' => 'btn btn-success btn-small')) }}</td>
                <td>{{ Form::open('classes/term', 'DELETE', array('class' => 'delete-form table-center')) }} {{ Form::hidden('book_id', $class->id) }} <input type="submit" value="Delete" class="btn btn-danger btn-small"/>{{ Form::close() }}</td>
              </tr>
              @endforeach
            </tbody>
            </table>
          @endif
          {{ $classes->links(0, Paginator::ALIGN_CENTER); }} 
@endsection