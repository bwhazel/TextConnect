@layout('layouts.fileupload')

@section('content')   
          <blockquote>
            <p class="lead">Edit</p>
          </blockquote>
          <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">Information</a></li>
              <li><a href="#tab2" data-toggle="tab">Images</a></li>
            </ul>
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">
          {{ Form::horizontal_open('books/'. $book->id, 'PUT') }}
          {{ Form::token() }}
            <div class="control-group {{ $errors->has('title') ? 'error' : '' }}">
              <label class="control-label" for="title">Title: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-book"></i></span>
                  {{ Form::xlarge_text('title', $book->title , array('placeholder' => 'Title'))}}
                </div>
                {{ $errors->has('title') ? Form::inline_help($errors->first('title','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('author') ? 'error' : '' }}">
              <label class="control-label" for="author">Author: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on"><i class="icon-user"></i></span>
                  {{ Form::xlarge_text('author', $book->author , array('placeholder' => 'Author'))}}
                </div>
                {{ $errors->has('author') ? Form::inline_help($errors->first('author','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('isbn') ? 'error' : '' }}">
              <label class="control-label" for="isbn">ISBN Number: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">#</span>
                  {{ Form::xlarge_text('isbn', $book->isbn, array('class' => 'input-xlarge', 'placeholder' => 'ISBN Number'))}}
                </div>
                {{ $errors->has('isbn') ? Form::inline_help($errors->first('isbn','<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('edition') ? 'error' : '' }}">
              <label class="control-label" for="edition">Edition: </label>
              <div class="controls">
                {{ Form::select('edition', array('--','1', '2', '3', '4', '5', '6', '7', '8', '9','10')) }}      
              {{ $errors->has('edition') ? Form::inline_help($errors->first('edition', '<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('price') ? 'error' : '' }}">
              <label class="control-label" for="price">Price: </label>
              <div class="controls">
                <div class="input-prepend">
                  <span class="add-on">$</span>
                  {{ Form::xlarge_text('price', $book->price , array('placeholder' => 'Price'))}}
                </div>
                {{ $errors->has('price') ? Form::inline_help($errors->first('price', '<li>:message</li>')) : '' }}
              </div>
            </div>
            <div class="control-group {{ $errors->has('trade') ? 'error' : '' }}">
              <label class="control-label" for="trade">Trade: </label>
              <div class="controls">
                {{ Form::labelled_checkbox('trade', 'Would you be willing to trade this book for another you may need?', 'option1') }}       
              {{ $errors->has('trade') ? Form::inline_help($errors->first('trade', '<li>:message</li>')) : '' }}
              </div>
            </div>
            {{ Form::hidden('book_id', $book->id) }}
            {{ Form::actions(Button::primary_submit('Update'), HTML::link_to_route('library', 'Cancel', $book->id, array('class' => 'btn btn-warning'))) }}
          {{ Form::close() }}
          </div>
          <div class="tab-pane" id="tab2">
            <!-- The file upload form used as target for the file upload widget -->
            <form id="fileupload" action="upload" method="POST" enctype="multipart/form-data">
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="fileupload-buttonbar">
                    <div class="span7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple>
                        </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="icon-upload icon-white"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-warning cancel">
                            <i class="icon-ban-circle icon-white"></i>
                            <span>Cancel upload</span>
                        </button>
                        <button type="button" class="btn btn-danger delete">
                            <i class="icon-trash icon-white"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">
                    </div>
                    <!-- The global progress information -->
                    <div class="span5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="bar" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress information -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The loading indicator is shown during file processing -->
                <div class="fileupload-loading"></div>
                <br>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
            </form>
            <br>
            </div>
          </div>
        <!-- modal-gallery is the modal dialog used for the image gallery -->
          <div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">&times;</a>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body"><div class="modal-image"></div></div>
            <div class="modal-footer">
                <a class="btn modal-download" target="_blank">
                    <i class="icon-download"></i>
                    <span>Download</span>
                </a>
                <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
                    <i class="icon-play icon-white"></i>
                    <span>Slideshow</span>
                </a>
                <a class="btn btn-info modal-prev">
                    <i class="icon-arrow-left icon-white"></i>
                    <span>Previous</span>
                </a>
                <a class="btn btn-primary modal-next">
                    <span>Next</span>
                    <i class="icon-arrow-right icon-white"></i>
                </a>
            </div>
            <!-- The template to display files available for upload -->
            <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-upload fade">
                    <td class="preview"><span class="fade"></span></td>
                    <td class="name"><span>{%=file.name%}</span></td>
                    <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                    {% if (file.error) { %}
                        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                    {% } else if (o.files.valid && !i) { %}
                        <td>
                            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
                        </td>
                        <td class="start">{% if (!o.options.autoUpload) { %}
                            <button class="btn btn-primary">
                                <i class="icon-upload icon-white"></i>
                                <span>{%=locale.fileupload.start%}</span>
                            </button>
                        {% } %}</td>
                    {% } else { %}
                        <td colspan="2"></td>
                    {% } %}
                    <td class="cancel">{% if (!i) { %}
                        <button class="btn btn-warning">
                            <i class="icon-ban-circle icon-white"></i>
                            <span>{%=locale.fileupload.cancel%}</span>
                        </button>
                    {% } %}</td>
                </tr>
            {% } %}
            </script>
            <!-- The template to display files available for download -->
            <script id="template-download" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-download fade">
                    {% if (file.error) { %}
                        <td></td>
                        <td class="name"><span>{%=file.name%}</span></td>
                        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                    {% } else { %}
                        <td class="preview">{% if (file.thumbnail_url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                        {% } %}</td>
                        <td class="name">
                            <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                        </td>
                        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                        <td colspan="2"></td>
                    {% } %}
                    <td class="delete">
                        <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                            <i class="icon-trash icon-white"></i>
                            <span>{%=locale.fileupload.destroy%}</span>
                        </button>
                        <input type="checkbox" name="delete" value="1">
                    </td>
                </tr>
            {% } %}
            </script>        
            </div>
          </div>
        </div>
      </div>
@endsection