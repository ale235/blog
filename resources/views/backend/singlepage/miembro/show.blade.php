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
                    <form action="{{ url('/admin/singlepage/miembro/'.$miembro->id) }}" enctype="multipart/form-data" method="post">
                        <input name="_method" type="hidden" value="PATCH">
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
                                <label>Nombre del Stand y/o Artista</label><em>*</em>
                                <input disabled type="text" name="title" id="title" class="form-control" value="{{$miembro->nombre}}">
                                @if ($errors->has('title'))
                                    <span class="form-error">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('texto_uno') ? ' has-error' : '' }}">
                                <label>Primer Descripción</label><em>*</em>
                                <input disabled type="text" name="texto_uno" id="texto_uno" class="form-control" value="{{ $miembro->texto_uno}}">
                                @if ($errors->has('texto_uno'))
                                    <span class="form-error">
                                        {{ $errors->first('texto_uno') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('texto_dos') ? ' has-error' : '' }}">
                                <label>Segunda Descripción</label><em>*</em>
                                <input disabled type="text" name="texto_dos" id="texto_dos" class="form-control" value="{{ $miembro->texto_dos}}">
                                @if ($errors->has('texto_dos'))
                                    <span class="form-error">
                                        {{ $errors->first('texto_dos') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 {{ $errors->has('imgportada') ? ' has-error' : '' }}">
                                <label>Imagen principal: Recomendado 500px x 350px</label><em>*</em>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a disabled id="imgportada" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Elegí
                                    </a>
                                    </span>
                                    <input disabled id="thumbnail" class="form-control" type="text" name="imgportada" value="{{ $miembro->image_path}}">
                                </div>
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ asset($miembro->image_path)}}">
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9 {{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label>Link a su web:</label><em>*</em><br>
                                http://
                                <input disabled type="text" name="slug" id="slug" class="" value="{{ $miembro->slug}}" size="50">
                                @if ($errors->has('slug'))
                                    <span class="form-error">
                                    {{ $errors->first('slug') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9 {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label>Link a su face:</label><em>*</em><br>
                                http://www.facebook.com/
                                <input disabled type="text" name="facebook" id="facebook" class="" value="{{ $miembro->facebook}}" size="50">
                                @if ($errors->has('facebook'))
                                    <span class="form-error">
                                    {{ $errors->first('facebook') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9 {{ $errors->has('instagram') ? ' has-error' : '' }}">
                                <label>Link a su insta:</label><em>*</em><br>
                                http://www.instagram.com/
                                <input disabled type="text" name="instagram" id="instagram" class="" value="{{ $miembro->instagram}}" size="50">
                                @if ($errors->has('instagram'))
                                    <span class="form-error">
                                    {{ $errors->first('instagram') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9 {{ $errors->has('twitter') ? ' has-error' : '' }}">
                                <label>Link a su insta:</label><em>*</em><br>
                                http://www.twitter.com/
                                <input disabled type="text" name="twitter" id="twitter" class="" value="{{ $miembro->twitter}}" size="50">
                                @if ($errors->has('twitter'))
                                    <span class="form-error">
                                    {{ $errors->first('twitter') }}
                                    </span>
                                @endif
                            </div>
                        </div>

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