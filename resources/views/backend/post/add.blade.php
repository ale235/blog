@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Post
            <a href="{{ url('admin/post') }}" style="float: right;font-size: 16px; margin-top:20px;">Back to Post</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-6 form" style="">

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

        <form role="form" method="POST" action="{{ url('/admin/post/') }}">
            {{ csrf_field() }}    
            <div class="row form-group">
                <div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>Title</label><em>*</em>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$title }}">
                    @if ($errors->has('title'))
                    <span class="form-error">
                        {{ $errors->first('title') }}
                    </span>
                    @endif
                </div>
            </div>


        </form>

    </div>

</div>
@endsection
