@extends('backend.layouts.master')

@push('css')

@endpush



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Post 
            <a href="{{ url('admin/post') }}" class="btn btn-default" role="button" style="float: right">Volver al post</a>
            <a href="{{ url('admin/post/'.@$post->id) }}" class="btn btn-default" role="button" style="float: right; margin-right:10px">Previsualizar</a>
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

        
        <form role="form" method="POST" action="{{ url('/admin/post/'.$post->id) }}" id="form-post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            
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
                    <label>URL</label><em>*</em><br>
                    <input type="text" name="slug" id="slug" class="" value="{{ old('slug') ? old('slug'):@$post->slug }}" size="50">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 {{ $errors->has('content') ? ' has-error' : '' }}">
                    <label>Contenido</label><em>*</em>
                    {{--<textarea name="content" id="content" class="form-control textarea" rows="8">{{ old('content') ? old('content'):@$post->content }}</textarea>--}}
                    <textarea name="content" id="content" cols="30" class="form-control textarea" rows="10">{{ old('content') ? old('content'):@$post->content }}</textarea>
                    @if ($errors->has('content'))
                        <span class="form-error">
                        {{ $errors->first('content') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <div class="checkbox">
                        <input type="hidden" name="published" value="0">
                        <input type="checkbox" name="published" value="1" checked> Publicado
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary pull-left" type="submit">Editar</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection


@push('scripts')

<link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ asset('summernote/summernote.js') }}"></script>

<script>
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
            oninit: function() {
                $('.note-editable').addClass('yourFrontendContentClass');
            },
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

