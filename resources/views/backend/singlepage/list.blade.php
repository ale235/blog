@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Comentarios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">


    {{--'content', 'seen', 'create_at', 'upload_at', 'post_id', 'users_id'--}}

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
            <th>Fecha de Creación</th>
            <th>Comentario</th>
            <th>Opciones</th>
            </thead>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->content}}</td>
                    <td>
                        <a href=""><button class="btn btn-primary">Eliminar</button></a>
                        {{--<a href="{{URL::action('IngresoController@show',$comment->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>--}}
                        {{--<a href="{{URL::action('IngresoController@edit',$ing->idingreso)}}"><button class="btn btn-info">Editar</button></a>--}}
                        {{--<a href="" data-target="#modal-delete-{{$comment->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>--}}
                        {{--<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>--}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    
    
    
    
    
    
</div>
@endsection
