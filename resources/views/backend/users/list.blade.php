@extends('backend.layouts.master')

@push('css')
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-xs-12 table-responsive" id="example4">
        <table class="stripe hover row-border- cell-border order-column" id="users-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection


@push('scripts')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script>
    $(function () {
//        $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                //'CSRFToken': $('meta[name="csrf-token"]').attr('content')
//            }
//        });

//        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            //"_token": "{{ csrf_token() }}",
            //dataType: 'json',
            //headers: {'X-CSRF-TOKEN': {{ csrf_token() }} },
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
            ajax: '{{ url("/admin/users/getdata") }}',
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            //headers : { 'Content-Type': 'application/json' }
            
            
        });

    });
</script>
@endpush
