@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Encuestas
            <a href="{{ url('admin/survey/add') }}" style="float: right;font-size: 16px; margin-top:20px;">Nueva Encuesta</a>
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
                    <th>Question</th>
                    <th>Active</th>
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
        $('#table').DataTable({
            "oLanguage": {
                sProcessing: '<i class="fa fa-spinner fa-spin fa-4x text-info loader"></i>'
            },
            bAutoWidth: true,
            processing: true,
            serverSide: true,
            //order: [3, "desc"],
            ajax: '{{ url("/admin/survey/getdata/") }}',
            columns: [
                {data: 'survey_id'},
                {data: 'question'},
                {data: 'active'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, width: '72px'}
            ]
        });
        
        
    });
</script>
@endpush