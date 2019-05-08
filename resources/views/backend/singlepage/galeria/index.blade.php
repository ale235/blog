@extends('backend.layouts.master')

@section('content')
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{$title}}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

    <div class="row">
            <div class="col-6 col-md-6">
                <div class="col-md-12">
                    <h2>Estilo 1: <i class="fa fa-info"></i></h2>
                </div>
                <div class="col-md-12">
                    <form action="{{ url('/admin/singlepage/header/headerestilouno') }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{--Foto principal: recomendado 860 x 480px<br>--}}
                        {{--<input name="photo" type="file">--}}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="filepath">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                        <br><br>
                        <input type="submit" value="Subir">
                    </form>
                </div>
            </div>

            <div class="col-6 col-md-6">
                <div>
                    <div class="col-md-12">
                        <h2>Estilo 2: <i class="fa fa-info"></i></h2>
                    </div>
                    <div class="col-md-12">
                        <form action="{{ url('/admin/singlepage/header/headerestilodos') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            {{--Foto principal: recomendado 860 x 480px<br>--}}
                            {{--<input name="photo" type="file">--}}
                            <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                                <input id="thumbnail2" class="form-control" type="text" name="filepath2">
                            </div>
                            <img id="holder2" style="margin-top:15px;max-height:100px;">
                            <br><br>
                            Título: <br>
                            <input name="title_text" type="text">
                            <br><br>
                            Subtítulo: <br>
                            <input name="subtitle_text" type="text">
                            <br><br>
                            <input type="submit" value="Subir">
                        </form>
                    </div>
                </div>
            </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    $('#lfm').filemanager('image');
    $('#lfm2').filemanager('image');
</script>
@endpush