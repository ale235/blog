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
                    <h2>Estilo 1: <i class="fa fa-info"></i></h2>
                </div>
                <div class="col-md-12">
                    <form action="{{ url('/admin/singlepage/header/headerestilouno') }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{--Foto principal: recomendado 860 x 480px<br>--}}
                        {{--<input name="photo" type="file">--}}
                        <img id="holder" style="margin-top:15px;max-height:100px;"  src="{{asset($header->image_path)}}">
                        <br><br>
                        {{--<input type="submit" value="Subir">--}}
                    </form>
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