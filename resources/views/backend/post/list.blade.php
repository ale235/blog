@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Posts
           <a href="{{ url('admin/post/create') }}" class="btn btn-default" role="button" style="float: right; margin-right:10px">New Post</a> 
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
{{--<div class="row">--}}
    {{----}}
        {{--<div class="col-xs-12 table-responsive" id="example4">--}}
        {{--<table class="stripe hover row-border- cell-border order-column table" id="table">--}}
            {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Id</th>--}}
                    {{--<th>Post Title</th>--}}
                    {{--<th>Published</th>--}}
                    {{--<th>Created By</th>--}}
                    {{--<th>Created At</th>--}}
                    {{--<th>Updated At</th>--}}
                    {{--<th>Action</th>--}}
                {{--</tr>--}}
            {{--</thead>--}}
        {{--</table>--}}
    {{--</div>--}}
      {{----}}
{{--</div>--}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
            <th>Id</th>
            <th>Post Title</th>
            <th>Published</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
            </thead>
            @foreach($posts as $p)
                <tr>
                    <td>{{$p->post_id}}</td>
                    <td>{{$p->title}}</td>
                    <td>{{$p->published}}</td>
                    <td>{{$p->username}}</td>
                    <td>{{$p->created_at_us}}</td>
                    <td>{{$p->updated_at_us}}</td>
                    <td>
                        {{--<a href="{{URL::action('ArticuloController@show',$art->idarticulo)}}"><button class="btn btn-success">Mostrar</button></a>--}}
                        {{--<a href="{{URL::action('PostController@edit',$p->post_id)}}"><button class="btn btn-info">Editar</button></a>--}}
                        <strong><a href="{{url('/admin/post/')}}/{{ $p->post_id }}/edit">{{ $title }}</a></strong>
                        {{--<a href="{{URL::action('ArticuloController@cambiarEstadoArticulo',$art->idarticulo)}}"><button class="btn btn-warning">Cambiar estado</button></a>--}}
                        {{--<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>--}}
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $posts->render() !!}
        {{--{!! $articulos->appends(['selectText' => $selectText, 'searchText' => $searchText, 'searchText2' => $searchText2])->render() !!}--}}
    </div>
</div>

@endsection

@push('scripts')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(function () {
        /*
         * 
         * @returns {undefined}
         */
        $('#table').DataTable({
            "oLanguage": {
                sProcessing: '<i class="fa fa-spinner fa-spin fa-4x text-info loader"></i>'
            },
            bAutoWidth: true,
            processing: true,
            serverSide: true,
            order: [4, "desc"],
            ajax: '{{ url("/admin/post/getdata/") }}',
            columns: [
                {data: 'post_id'},
                {data: 'title'},
                {data: 'published'},
                {data: 'username'},
                {data: 'created_at_us'},
                {data: 'updated_at_us'},
                {data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, width: '80px'}
            ]
        });
        
        /*
        * 
         */
         $(document).on('change', '.published', function () {
            var post_id = $(this).val();
            var published =0;
            if($(this).prop('checked')) {
                published =1;
            }
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ url("/admin/post/") }}'+'/'+post_id,
                data: {"published": published},
                beforeSend: function () {
                    //$(this).after('<i class="fa fa-spinner fa-spin fa-fw td-loader"></i>').fadeIn();  
                },
                success: function (response) {
                    //$(this).after(''); 
                    if(response.success){ 
                        var table = $('table[id^="table"]').DataTable();
                        table.ajax.reload(null, false); // user paging is not reset on reload
                    }
                    else{
                        
                    }  
                    lobibox(response.type, response.msg);
                },
                error: function () {
                    //$(this).after('');  
                    console.log('Failed request; give feedback to admin');
                }
            });
        });
        
        

        
        
    });
</script>
@endpush