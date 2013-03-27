@layout('layouts.master')

@section('content')    
          <blockquote>
            <p class="lead">Add a Class</p>
          </blockquote>
          {{ Form::horizontal_open('classes', 'POST', array('class' => 'open_textbooks')) }}
          {{ Form::token() }}
            <div class="control-group {{ $errors->has('Term') ? 'error' : '' }}">
              <label class="control-label" for="term">Term: </label>
              <div class="controls">
               <select name="term">
                <option value="Spring 2013">Spring 2013</option>
                <option value="Fall 2013">Fall 2013</option>
                <option value="Spring 2014">Spring 2014</option>
              </select>    
              {{ $errors->has('term') ? Form::inline_help($errors->first('term', '<li>:message</li>')) : '' }}
              </div>
            </div>
                  <select id="name" multiple="multiple" size="10"  style="width: 380px;"></select> 
            <div class="control-group {{ $errors->has('department') ? 'error' : '' }}">
              <label class="control-label" for="department">Department: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-book"></i></span>
                  {{ Form::xlarge_text('department', Input::old('department') , array('placeholder' => 'Department'))}}
                </div>
                {{ $errors->has('department') ? Form::inline_help($errors->first('department','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('course') ? 'error' : '' }}">
              <label class="control-label" for="course">Course: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  {{ Form::xlarge_text('course', Input::old('course') , array('placeholder' => 'Course'))}}
                </div>
                {{ $errors->has('course') ? Form::inline_help($errors->first('course','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('section') ? 'error' : '' }}">
              <label class="control-label" for="Section">Section: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">#</span>
                  {{ Form::xlarge_text('section', Input::old('section'), array('class' => 'input-xlarge', 'placeholder' => 'Section'))}}
                </div>
                {{ $errors->has('section') ? Form::inline_help($errors->first('section','<li>:message</li>')) : '' }}
              </div>
            </div>
            {{ Form::actions(Button::primary_submit('Add Class')) }}
          {{ Form::close() }}
@endsection