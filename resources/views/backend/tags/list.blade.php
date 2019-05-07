@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Tags
            <a href="#" class="add_tag" style="float: right;font-size: 16px; margin-top:20px;">Nuevo Tag</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-xs-12 table-responsive" id="example4">
        <table class="stripe hover row-border- cell-border order-column table" id="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    @include('backend.includes.modal')

</div>
@endsection


@push('scripts')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#table').DataTable({
            "oLanguage": {
                sProcessing: '<i class="fa fa-spinner fa-spin fa-4x text-info loader"></i>'
            },
            bAutoWidth: true,
            processing: true,
            serverSide: true,
            //order: [2, "desc"],
            ajax: '{{ url("/admin/tags/getdata/") }}',
            columns: [
                {data: 'tag_id'},
                {data: 'tag_name'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, width: '72px'}
            ]

        });

        /*
         * 
         */
        $(document).on('click', '.add_tag', function () {
            init_form();
            $('#myModal .modal-title').html('New Tag');
            $('#myModal').modal({backdrop: 'static', keyboard: false});
            return false;
        });
        
        function init_form(){
            $('#modal-form .modal-body').removeClass('has-error');
            $('#modal-form .help-block').html('');
            $("#modal-form")[0].reset(); 
        }
        /*
         * 
         */
        $(document).on('submit', '#modal-form', function () {
            var tag_id = $('#modal-form #tag_id').val();
            var url = '{{ url("/admin/tags/") }}';
            if(tag_id){
                url = '{{ url("/admin/tags/") }}'+'/'+tag_id;
            }    
            $.ajax({
                //dataType: 'json',
                type: 'POST',
                //url: $("#modal-form").attr("action"),
                url: url,
                data: $("#modal-form").serialize(),
                //data: {"app_id": app_id, "action_id": action_id},
                beforeSend: function () {

                },
                success: function (response) {
                    if(response.success){ 
                        $("#modal-form")[0].reset(); 
                        $('#myModal').modal('toggle');
                        var table = $('table[id^="table"]').DataTable();
                        table.ajax.reload(null, false); // user paging is not reset on reload
                        lobibox(response.type, response.msg);
                    }
                    else{
                        $('#modal-form .modal-body').addClass('has-error');
                        $('#modal-form .help-block').html(response.errors.tag_name);
                    }    
                },
                error: function () {
                    //console.log(e);
                    console.log('Failed request; give feedback to admin');
                }
            });
            //alert('sub');
            return false;
        });
        
        /*
         * 
         */
        $(document).on('click', '.edit_tag', function () {
            init_form();
            var id = $(this).attr('rel');
            $.ajax({
                dataType: 'json',
                type: 'GET',
                url: '{{ url("/admin/tags/") }}'+'/'+id,
                //data: {"id": id},
                beforeSend: function () {

                },
                success: function (response) {
                    if(response.success){ 
                        $('#myModal .modal-title').html('Edit Tag');
                        $('#myModal').modal({backdrop: 'static', keyboard: false});
                        $('#modal-form #tag_name').val(response.tag.tag_name);
                        $('#modal-form #tag_id').val(response.tag.tag_id);
                    }
                    else{
                        alert('errors');
                    }    
                },
                error: function () {
                    console.log('Failed request; give feedback to admin');
                }
            });
            return false;
        });
    });
</script>
@endpush
