@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{$title}}</h1>
</div>
    <!-- /.col-lg-12 -->
</div>

    <div class="row">
            <div class="col-12 col-md-12">
                <div class="col-md-12">
                    <form action="{{ url('/admin/singlepage/galeria/store') }}" id="form-galery" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{--Foto principal: recomendado 860 x 480px<br>--}}
                        {{--<input name="photo" type="file">--}}
                        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                            <span style="font-size: 40px; background-color: #F3F5F6; padding: 0 10px;">
                                Infomación de la Principal <!--Padding is optional-->
                            </span>
                        </div>

                        <br><br>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label>Título</label><em>*</em>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title')}}">
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
                                http://localhost:8000/galeria/
                                <input type="text" name="slug" id="slug" class="" value="{{ old('slug')}}" size="50">
                                @if ($errors->has('title'))
                                    <span class="form-error">
                                    {{ $errors->first('title') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('imgportada') ? ' has-error' : '' }}">
                                <label>Imagen principal</label><em>*</em>
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

                        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                            <span style="font-size: 40px; background-color: #F3F5F6; padding: 0 10px;">
                                Infomación de la Galería <!--Padding is optional-->
                            </span>
                        </div>
                        <br><br>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('lugar') ? ' has-error' : '' }}">
                                <label>Lugar</label><em>*</em>
                                <input type="text" name="lugar" id="lugar" class="form-control" value="{{ old('lugar')}}">
                                @if ($errors->has('lugar'))
                                    <span class="form-error">
                                        {{ $errors->first('lugar') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('anio') ? ' has-error' : '' }}">
                                <label>Año</label><em>*</em>
                                <input type="text" name="anio" id="anio" class="form-control" value="{{ old('anio')}}">
                                @if ($errors->has('anio'))
                                    <span class="form-error">
                                        {{ $errors->first('anio') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('imggaleria') ? ' has-error' : '' }}">
                                <label>Imagen principal</label><em>*</em>
                                <div class="form-group">
                                    <div class="file-loading">
                                        <input id="imggaleria" type="file" name="imggaleria[]" multiple class="file" data-overwrite-initial="false">
                                    </div>
                                </div>
                            </div>
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



                        <input type="submit" value="Subir">
                    </form>
                </div>
            </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
<script src="{{ asset('summernote/summernote.js') }}"></script>
<script>
    $('#imgportada').filemanager('image');
//    $('#imggaleria').filemanager('image');
    $(document).ready(function(){
        $("#imggaleria").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });

        $("#form-galery #title").keyup(function () {
            var str = $(this).val();
            var trimmed = $.trim(str);
            var slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
            slug = slug.toLowerCase();
            $("#slug").val(slug);
        });

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