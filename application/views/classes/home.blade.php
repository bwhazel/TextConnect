@layout('layouts.master')

@section('content')    
          <blockquote>
            <p class="lead">Please Select Semester</p>
          </blockquote>
          <hr>
          {{ Form::horizontal_open('classes/term', 'GET') }}
          {{ Form::token() }}
             <div class="control-group {{ $errors->has('term') ? 'error' : '' }}">
              <label class="control-label" for="term">Term: </label>
              <div class="controls">
               <select name="term">
                <option>Spring 2013</option>
                <option>Fall 2013</option>
                <option>Spring 2014</option>
              </select>    
              {{ $errors->has('term') ? Form::inline_help($errors->first('term', '<li>:message</li>')) : '' }}
              {{ Button::primary_submit('View Schedule') }}
              </div>
            </div>
          {{ Form::close() }}
@endsection