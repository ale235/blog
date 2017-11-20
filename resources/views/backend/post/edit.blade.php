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



            <div class="row form-group">
                <div class="col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                    <label>Resumen</label><em>*</em>
                    <textarea name="summary" id="summary" cols="30" class="form-control textarea" rows="4">{{ old('summary') ? old('summary'):@$post->summary }}</textarea>
                    @if ($errors->has('summary'))
                        <span class="form-error">
                        {{ $errors->first('summary') }}
                    </span>
                    @endif
                </div>
            </div>

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
                        @if($post->published==1) 
                            <label><input type="checkbox" name="published" id="published" value="1" checked>Published</label>
                         @else 
                            <label><input type="checkbox" name="published" id="published" value="1" checked>Published</label>
                        @endif
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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script type="text/javascript"> 
{{--var editor_config_1 = {--}}
    {{--path_absolute: '{{ url("/") }}',--}}
    {{--selector: "#summary",--}}
    {{--height : "200",--}}
    {{--plugins: [--}}
        {{--"advlist autolink lists link image charmap preview hr anchor wordcount visualblocks visualchars code",--}}
        {{--"insertdatetime media nonbreaking textcolor colorpicker textpattern code"--}}
    {{--],--}}
    {{--toolbar: "insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | link image | code |  preview",--}}
    {{--menubar: false,--}}
    {{--relative_urls: false,--}}
    {{--color_picker_callback: function(callback, value) {--}}
        {{--callback('#FF00FF');--}}
    {{--},--}}
    {{--file_browser_callback: function (field_name, url, type, win) {--}}
        {{--var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;--}}
        {{--var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;--}}

        {{--var cmsURL = editor_config_1.path_absolute + '/laravel-filemanager?field_name=' + field_name;--}}
        {{--if (type == 'image') {--}}
            {{--cmsURL = cmsURL + "&type=Images";--}}
        {{--} else {--}}
            {{--cmsURL = cmsURL + "&type=Files";--}}
        {{--}--}}
        {{--tinyMCE.activeEditor.windowManager.open({--}}
            {{--file: cmsURL,--}}
            {{--title: 'Filemanager',--}}
            {{--width: x * 0.8,--}}
            {{--height: y * 0.8,--}}
            {{--resizable: "yes",--}}
            {{--close_previous: "no"--}}
        {{--});--}}
    {{--}--}}
{{--};    --}}
    {{----}}
{{--var editor_config_2 = {--}}
    {{--path_absolute: '{{ url("/") }}',--}}
    {{--selector: "#content",--}}
    {{--height : "450",--}}
    {{--plugins: [--}}
        {{--"advlist autolink lists link image charmap preview hr anchor pagebreak",--}}
        {{--"searchreplace wordcount visualblocks visualchars code fullscreen",--}}
        {{--"insertdatetime media nonbreaking table textcolor colorpicker textpattern"--}}
    {{--],--}}
    {{--toolbar: "insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify \n\--}}
              {{--| bullist numlist outdent indent | searchreplace hr pagebreak | link image media | preview",--}}
    {{--menubar: true,--}}
    {{--relative_urls: false,--}}
    {{--color_picker_callback: function(callback, value) {--}}
        {{--callback('#FF00FF');--}}
    {{--},--}}
    {{--file_browser_callback: function (field_name, url, type, win) {--}}
        {{--var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;--}}
        {{--var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;--}}

        {{--var cmsURL = editor_config_2.path_absolute + '/laravel-filemanager?field_name=' + field_name;--}}
        {{--if (type == 'image') {--}}
            {{--cmsURL = cmsURL + "&type=Images";--}}
        {{--} else {--}}
            {{--cmsURL = cmsURL + "&type=Files";--}}
        {{--}--}}
        {{--tinyMCE.activeEditor.windowManager.open({--}}
            {{--file: cmsURL,--}}
            {{--title: 'Filemanager',--}}
            {{--width: x * 0.8,--}}
            {{--height: y * 0.8,--}}
            {{--resizable: "yes",--}}
            {{--close_previous: "no"--}}
        {{--});--}}
    {{--}--}}
{{--};--}}

{{--tinymce.init(editor_config_1);--}}
{{--tinymce.init(editor_config_2);--}}

</script>

<script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $('#lfm').filemanager('content');
    $('#lfm').filemanager('summary');
</script>
<script>
//    tinymce.init({forced_root_block : "",selector:'textarea'});
</script>

<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
    var ckview = document.getElementById("summary");
    CKEDITOR.replace(ckview,{
        language:'en-gb',
        filebrowserImageBrowseUrl: '{{ url("/") }}' + '/laravel-filemanager?type=Images',
        filebrowserBrowserUrl: '{{ url("/") }}' + '/laravel-filemanager?type=files'
    });
</script>
<script>
    var ckview = document.getElementById("content");
    CKEDITOR.replace(ckview,{
        language:'en-gb',
        filebrowserImageBrowseUrl: '{{ url("/") }}' + '/laravel-filemanager?type=Images',
        filebrowserBrowserUrl: '{{ url("/") }}' + '/laravel-filemanager?type=files'
    });
</script>
@endpush

