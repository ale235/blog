@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Posts
           <a href="{{ url('admin/post/create') }}" style="float: right;font-size: 16px; margin-top:20px;">New Post</a>
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
                    <th>Post Title</th>
                    <th>Published</th>
                    <th>Created By</th>
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
                {data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, width: '70px'}
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