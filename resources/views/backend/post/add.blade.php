@extends('backend.layouts.master')

@push('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endpush



@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Post <a href="#" class="btn btn-default" role="button">Preview</a>
            <a href="{{ url('admin/post') }}" style="float: right;font-size: 16px; margin-top:20px;">Back to Post</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-8 form" style="">

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

        <form role="form" method="POST" action="{{ url('/admin/post/create') }}">
            {{ csrf_field() }}    
            <div class="row form-group">
                <div class="col-md-9 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Title</label><em>*</em>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$title }}">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                    <label>Summary</label><em>*</em>
                    <textarea name="summary" id="summary" class="form-control" rows="4"></textarea>
                    @if ($errors->has('summary'))
                    <span class="form-error">
                        {{ $errors->first('summary') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group-">
                <div class="col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                    <label>Content</label><em>*</em>
                    <textarea name="content" id="content" class="form-control" rows="8"></textarea>  
                    @if ($errors->has('content'))
                    <span class="form-error">
                        {{ $errors->first('content') }}
                    </span>
                    @endif
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-3">
                    <label>Status</label><em>*</em>
                    <select id="active" name="active" class="form-control">
                        <option value="1" {{ (old('active') == '1' ? "selected":"") }}>Active</option>
                        <option value="0" {{ (old('active') == '0' ? "selected":"") }}>Inactive</option>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script type="text/javascript">
$(function () {
    $('#content0').summernote();

    $('#content').summernote({
        height: 300, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
    });
    
});
</script>
@endpush