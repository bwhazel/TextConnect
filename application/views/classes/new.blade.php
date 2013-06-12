@layout('layouts.classes')

@section('content')    
          <blockquote>
            <p class="lead">Add a Class</p>
          </blockquote>
          {{ Form::horizontal_open('classes', 'POST', array('class' => 'open_textbooks')) }}
          {{ Form::token() }}
            <div id="school-select2" class="control-group {{ $errors->has('school') ? 'error' : '' }}">
              <label class="control-label" for="school">School: </label>
              <div class="controls">
                <input class="select2" type="hidden" name="school" id="school" style="width: 300px;"/> 
                <span id="school-loading" class="loading help-inline"></span>  
                {{ $errors->has('term') ? Form::inline_help($errors->first('school', '<li>:message</li>')) : '' }}
              </div>
            </div>
            <div id="term-select2" class="select2-hidden control-group {{ $errors->has('term') ? 'error' : '' }}">
              <label class="control-label" for="term">Term: </label>
              <div class="controls">
                <input class="select2" type="hidden" name="term" id="term" style="width: 300px;"/> 
                <span id="term-loading" class="loading help-inline"></span>   
                {{ $errors->has('term') ? Form::inline_help($errors->first('term','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div id="department-select2" class="select2-hidden control-group {{ $errors->has('dept') ? 'error' : '' }}">
              <label class="control-label" for="dept">Department: </label>
              <div class="controls">
                <input class="select2" type="hidden" name="dept" id="dept" style="width: 300px;"/> 
                <span id="dept-loading" class="loading help-inline"></span>   
                {{ $errors->has('dept') ? Form::inline_help($errors->first('dept','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div id="course-select2" class="select2-hidden control-group {{ $errors->has('course') ? 'error' : '' }}">
              <label class="control-label" for="course">Course: </label>
              <div class="controls">
                <input class="select2" type="hidden" name="course" id="course" style="width: 300px;"/>
                <span id="course-loading" class="loading help-inline"></span>    
                {{ $errors->has('course') ? Form::inline_help($errors->first('course','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div id="section-select2" class="select2-hidden control-group {{ $errors->has('section') ? 'error' : '' }}">
              <label class="control-label" for="section">Section: </label>
              <div class="controls">
                <input class="select2" type="hidden" name="section" id="section" style="width: 300px;"/>
                <span id="section-loading" class="loading help-inline"></span>    
                {{ $errors->has('section') ? Form::inline_help($errors->first('section','<li>:message</li>')) : '' }}
              </div>
            </div>
            {{ Form::actions(Button::primary_submit('Add Class')) }}
          {{ Form::close() }}
@endsection