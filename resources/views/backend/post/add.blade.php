@extends('backend.layouts.master')

@push('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endpush



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Post 
            <a href="{{ url('admin/post') }}" class="btn btn-default" role="button" style="float: right">Back to Post</a>
            <a href="#" class="btn btn-default" role="button" style="float: right; margin-right:10px">Preview</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-8 form" style="">

        @if($errors->any()) 
        <ul class="errors alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        @if(Session::has('notif'))
        <div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('notif') }}</p>
        </div>
        @endif

        <form role="form" method="POST" action="{{ url('/admin/post') }}" id="form-post">
            {{ csrf_field() }}    
            <div class="row form-group">
                <div class="col-md-9 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Title</label><em>*</em>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$title }}">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-9 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Permanent link:</label><em>*</em><br>
                    http://localhost:8000/blog/
                    <input type="text" name="slug" id="slug" class="" value="{{ old('slug') ? old('slug'):@$slug }}" size="50">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                    <label>Summary</label><em>*</em>
                    <textarea name="summary" id="summary" class="form-control" rows="4"></textarea>
                    @if ($errors->has('summary'))
                    <span class="form-error">
                        {{ $errors->first('summary') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group-">
                <div class="col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                    <label>Content</label><em>*</em>
                    <textarea name="content" id="content" class="form-control" rows="8"></textarea>  
                    @if ($errors->has('content'))
                    <span class="form-error">
                        {{ $errors->first('content') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-3">
                    <div class="checkbox">
                        <label><input type="checkbox" name="published" id="published" value="1">Published</label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block-" type="submit">Save</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection

@push('scripts')
<script src="http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>



<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>


<script src="{{asset('plugings/elfinder/js/elfinder.min.js')}}"></script>
<script src="plugin/summernote-ext-elfinder/elfinder-callback.js"></script>


<script src="{{asset('plugings/summernote/summernote-ext-elfinder.js')}}"></script>


<script type="text/javascript">
// https://github.com/semplon/summernote-ext-elfinder
// https://github.com/summernote/summernote/issues/1203

$(function () {
    $('#content0').summernote({
        height: 300, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
    });

    $('#content00').summernote({
        height: 200,
        tabsize: 2,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['insert', ['elfinder']]
        ]
    });
    $('#content').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
            ['genixcms', ['elfinder']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
        onImageUpload: function (files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    });


});

function elfinderDialog(){
    var fm = $('<div/>').dialogelfinder({
        url : '{{ url("/plugings/elfinder/php/connector.minimal.php") }}',
        lang : 'en',
        width : 840,
        height: 450,
        destroyOnClose : true,
        getFileCallback : function(files, fm) {
            console.log(files);
            $('.editor').summernote('editor.insertImage',files.url);
        },
       commandsOptions : {
            getfile : {
                oncomplete : 'close',
                folders : false
            }
        }

    }).dialogelfinder('instance');
}



function elfinderDialog000() {
    var fm = $('<div/>').dialogelfinder({
        //url: 'https://path.to/your/connector.php', // change with the url of your connector
        url: '{{ url("/plugings/elfinder/php/connector.php") }}',
        lang: 'en',
        width: 840,
        height: 450,
        destroyOnClose: true,
        getFileCallback: function (files, fm) {
            console.log(files);
            $('.editor').summernote('editor.insertImage', files.url);
        },
        commandsOptions: {
            getfile: {
                oncomplete: 'close',
                folders: false
            }
        }
    }).dialogelfinder('instance');
}


</script>
@endpush