@extends('backend.layouts.master')

@push('css')

@endpush



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo post
            <a href="{{ url('admin/post') }}" class="btn btn-default" role="button" style="float: right">Volver al Post</a>
            <button class="btn btn-default disabled" style="float: right; margin-right:10px">Preview</button>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-8 form" style="margin-bottom:60px">

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

        <form role="form" method="POST" action="{{ url('/admin/post') }}" id="form-post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-group">
                <div class="col-md-9 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Título</label><em>*</em>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-9 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Link:</label><em>*</em><br>
                    http://localhost:8000/blog/
                    <input type="text" name="slug" id="slug" class="" value="{{ old('slug') ? old('slug'):@$post->slug }}" size="50">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 {{ $errors->has('imgportada') ? ' has-error' : '' }}">
                    <label>Imagen en la principal: Poner solo si se desea que el posteo aparezca en la principal 200px 150px</label><em>*</em>
                    <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="imgportada" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Elegí
                                    </a>
                                    </span>
                        <input id="thumbnail" class="form-control" type="text" name="imgportada">
                    </div>
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
            </div>

            <div class="row form-group-">
                <div class="col-md-12 {{ $errors->has('content') ? ' has-error' : '' }}">
                    <label>Contenido</label><em>*</em>
                    {{--<textarea name="content" id="content" class="form-control textarea" rows="8">{{ old('content') ? old('content'):@$post->content }}</textarea>--}}
                    <textarea name="content" id="content" cols="30" class="form-control textarea" rows="40">{{ old('content') ? old('content'):@$post->content }}</textarea>
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
                        <label><input type="checkbox" name="published" id="published" value="1">Publicar</label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block-" type="submit">Guardar</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection


@push('scripts')

<link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ asset('summernote/summernote.js') }}"></script>
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script>
    $('#imgportada').filemanager('image');

    $(document).ready(function(){

        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {

                            context.invoke('insertImage', lfmItems);

                    });

                }
            });
            return button.render();
        };

        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#content').summernote({
            height: 300,
            toolbar: [
                ['popovers', ['lfm']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link','hr']]

            ],
            buttons: {
                lfm: LFMButton
            }
        })


    });
</script>

@endpush

