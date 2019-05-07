@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Survey
            <a href="{{ url('admin/survey/') }}" style="float: right;font-size: 16px; margin-top:20px;">List Survey</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-6 form">
        @if($errors->any()) 
        <ul class="errors alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        @if(Session::has('notif'))
        <div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('notif') }}</p>
        </div>
        @endif
        
        
        <form role="form" method="POST" action="{{ url("/admin/survey/edit/$survey->survey_id") }}">
            {{ csrf_field() }}  
            <div class="row form-group">
                <div class="col-lg-12 {{ $errors->has('question') ? ' has-error' : '' }}">
                    <label>Question</label><em>*</em>
                    <input type="text" name="question" id="question" class="form-control" value="{{ old('question') ? old('question'):@$survey->question }}">
                    @if ($errors->has('question'))
                    <span class="form-error">
                        {{ $errors->first('question') }}
                    </span>
                    @endif
                </div>
            </div>
            
            <div id="bloc-response">
            @foreach ($responses as $response)
                <div class="row form-group">
                    <div class="col-lg-4">
                        <input type="text" name="response[]"  class="form-control" value="{{ $response->response_text }}" disabled>
                    </div>
                </div>
            @endforeach
            </div>
            
            <div class="row form-group">
                <div class="col-md-4">
                    <label>Status</label><em>*</em>
                    <select id="active" name="active" class="form-control">
                        <option value="1" {{ (@$survey->active == '1' ? "selected":"") }}>Active</option>
                        <option value="0" {{ (@$survey->active == '0' ? "selected":"") }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block-" type="submit">Save</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function () {
        /*
         * 
         */
        $(document).on('click', '#add-response', function () {
            var html = '' +
                    '<div class="row form-group" style="">' +
                    '<div class="col-lg-4">' +
                    '<input type="text" name="response[]"  class="form-control" value="">' +
                    '</div>' +
                    '<div class="col-lg-1">' +
                    '<button class="btn btn-sm btn-danger delete-response" type="button"><i class="fa fa-trash"></i></button>' +
                    '</div>' +
                    '</div>';
            $('#bloc-response').append(html);
            return false;
        });
        /*
         * 
         */
        $(document).on('click', '.delete-response', function () {
            var div = $(this).parent().closest('div.form-group');
            $(div).remove();
            return false;
        });

    });
</script>
@endpush
