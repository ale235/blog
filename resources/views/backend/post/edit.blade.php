@extends('backend.layouts.master')

@push('css')

@endpush



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Post 
            <a href="{{ url('admin/post') }}" class="btn btn-default" role="button" style="float: right">Back to Post</a>
            <a href="{{ url('admin/post/'.@$post->post_id) }}" class="btn btn-default" role="button" style="float: right; margin-right:10px">Preview</a>
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

        
        <form role="form" method="POST" action="{{ url('/admin/post/'.$post->post_id) }}" id="form-post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            
            {{ csrf_field() }}    
            <div class="row form-group">
                <div class="col-md-9 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Title</label><em>*</em>
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
                    <label>Permanent link:</label><em>*</em><br>
                    http://localhost:8000/blog/
                    <input type="text" name="slug" id="slug" class="" value="{{ old('slug') ? old('slug'):@$post->slug }}" size="50">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>

            {{--<div class="row form-group">--}}
                {{--<div class="col-md-9 {{ $errors->has('image') ? ' has-error' : '' }}">--}}
                    {{--<label>Imagen</label><em>*</em>--}}
                    {{--<input type="file" name="image" id="image" class="form-control" value="{{ old('image') ? old('image'):@$post->image }}">--}}
                    {{--@if ($errors->has('image'))--}}
                        {{--<span class="form-error">--}}
                        {{--{{ $errors->first('image') }}--}}
                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}



            {{--<div class="row form-group">--}}
                {{--<div class="col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">--}}
                    {{--<label>Resumen</label><em>*</em>--}}
                    {{--<textarea name="summary" id="summary" cols="30" class="form-control textarea" rows="4">{{ old('summary') ? old('summary'):@$post->summary }}</textarea>--}}
                    {{--@if ($errors->has('summary'))--}}
                        {{--<span class="form-error">--}}
                        {{--{{ $errors->first('summary') }}--}}
                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="row form-group-">
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
                <div class="col-md-3">
                    <div class="checkbox">
                        <input type="hidden" name="published" value="0">
                        <input type="checkbox" name="published" value="1" checked>
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
<script>
//    tinymce.init({forced_root_block : "",selector:'textarea'});
</script>

{{--<script src="{{url('ckeditor/ckeditor.js')}}"></script>--}}
{{--<script>--}}
    {{--var ckview = document.getElementById("summary");--}}
    {{--CKEDITOR.replace(ckview,{--}}
        {{--language:'en-gb',--}}
        {{--filebrowserImageBrowseUrl: '{{ url("/") }}' + '/laravel-filemanager?type=Images',--}}
        {{--filebrowserBrowserUrl: '{{ url("/") }}' + '/laravel-filemanager?type=files'--}}
    {{--});--}}
{{--</script>--}}
{{--<script>--}}
    {{--var ckview = document.getElementById("content");--}}
    {{--CKEDITOR.replace(ckview,{--}}
        {{--language:'en-gb',--}}
        {{--filebrowserImageBrowseUrl: '{{ url("/") }}' + '/laravel-filemanager?type=Images',--}}
        {{--filebrowserBrowserUrl: '{{ url("/") }}' + '/laravel-filemanager?type=files'--}}
    {{--});--}}
{{--</script>--}}
<link href="{{ url('public/summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ url('public/summernote/summernote.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote({
            lang: 'es-ES',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript','fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture','video','hr']],
                ['view', ['fullscreen', 'codeview']],
            ],
            height:350,
        });
        $('#content').summernote('fontSize', 14);
    });
</script>
@endpush

