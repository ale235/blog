@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Avales</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="sort" class="table table-striped grid">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Orden</th>
                            <th>Estado</th>
                            {{--<th>Opciones</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($avales as $aval)
                            <tr style="
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                <td>{{$aval->id}}</td>
                                <td>{{$aval->nombre}}</td>
                                {{--<td>--}}
                                {{--<div>--}}
                                {{--<img src="{{ asset('imagenes/slider')}}/{{$slider->imagen}}" class="img-thumbnail" alt="{{$slider->titulo}}">--}}
                                {{--</div>--}}
                                {{--</td>--}}
                                <td class="index">{{$aval->orden}}</td>
                                <td>
                                    <label class="switch">
                                        <input class="estado" type="checkbox" @if($aval->estado) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                {{--<td>--}}
                                {{--<div class="btn-group" style="display: inline-block;">--}}
                                {{--<a href="slider/{{$slider->id}}" class="btn btn-xs btn-primary edit" id="'.slider->id.'"><i class=""></i> Ver</a>--}}
                                {{--<a href="slider/{{$slider->id}}/edit" class="btn btn-xs btn-primary edit" id="'.slider->id.'"><i class=""></i> Editar</a>--}}
                                {{--<a href="" data-toggle="modal" data-target="#modal-delete-{{$slider->id}}" class="btn btn-xs btn-primary" ><i class=""></i> Borrar</a>--}}
                                {{--</div>--}}
                                {{--</td>--}}
                            </tr>
                            {{--                            @include('backend.slider.modal')--}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            {{--{!! $servicios->render() !!}--}}
            <!-- /.box-body -->
                <div class="box-footer">
                    <a  href="{{url('/admin/singlepage/aval/create/')}}"><button type="button" class="btn btn-default pull-left"><i class="fa fa-plus"></i> Agregar Stand y/o Artista</button></a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width())
            });
            return $helper;
        },
        updateIndex = function(e, ui) {
            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i + 1);
                var id = parseInt($($(this).parent().find('td')[0]).text());
                var orden = i + 1;
                $.ajax({
                    type: 'get', // Type of response and matches what we said in the route
                    url: '{{ route('ordenarAvales') }}', // This is the url we gave in the route
                    data: {'id' : id, 'orden' : orden}, // a JSON object to send back
                    success: function(response){ // What to do if we succeed
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });


        };

    $("#sort tbody").sortable({
        helper: fixHelperModified,
        stop: updateIndex
    }).disableSelection();

    $(".estado").change(function(){
        if($(this).prop("checked") == true){
            var id = parseInt($($(this).parent().parent().parent().find('td')[0]).text());
            $.ajax({
                type: 'get', // Type of response and matches what we said in the route
                url: '{{ route('cambiarEstadoAvales') }}', // This is the url we gave in the route
                data: {'id' : id, 'estado' : 1}, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }else{
            var id = parseInt($($(this).parent().parent().parent().find('td')[0]).text());
            $.ajax({
                type: 'get', // Type of response and matches what we said in the route
                url: '{{ route('cambiarEstadoAvales') }}', // This is the url we gave in the route
                data: {'id' : id, 'estado' : 0}, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    });
</script>
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@endpush