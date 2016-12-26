@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users
            <a href="{{ url('admin/users/add') }}" style="float: right;font-size: 16px; margin-top:20px;">New User</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-xs-12 table-responsive" id="example4">
        <table class="stripe hover row-border- cell-border order-column table" id="tablex">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection


@push('scripts')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#tablex').DataTable({
            "oLanguage": {
                sProcessing: '<i class="fa fa-spinner fa-spin fa-4x text-info loader"></i>'
            },
           // bAutoWidth: true,
            processing: true,
            serverSide: true,
            //order: [3, "desc"],
            type: "get",
            ajax: '{{ url("/admin/users/getdata/") }}',
            columns: [
//                {data: 'users_id', visible: true, searchable: false},
//                {data: 'username'},
//                {data: 'email'},
//                {data: 'created_at'},
//                {data: 'updated_at'},
//                {data: 'action', orderable: false, searchable: false, bSortable: false, width: '72px'}
                
                {data: 'users_id', name: 'users_id'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'}
            ]
            
        });

    });
</script>
@endpush
