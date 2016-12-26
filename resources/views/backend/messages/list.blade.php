@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

<style type="text/css">
    .table a.seen0, .table a.seen1{
        color: #333333;
    }
    .table .seen0{font-weight: bold;}
</style>

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Messages</h1>
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
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Created At</th>
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
        $('#table').DataTable({
            "oLanguage": {
                sProcessing: '<i class="fa fa-spinner fa-spin fa-4x text-info loader"></i>'
            },
            bAutoWidth: true,
            processing: true,
            serverSide: true,
            //order: [2, "desc"],
            ajax: '{{ url("/admin/messages/getdata/") }}',
            columns: [
                {data: 'message_id'},
                {data: 'from_name'},
                {data: 'from_phone'},
                {data: 'from_email'},
                {data: 'subject'},
                {data: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, width: '40px'}
            ]
        });
    });
</script>
@endpush
