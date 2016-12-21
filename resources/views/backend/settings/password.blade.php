@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Change password</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-12">
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
    </div>
    
    <div class="col-lg-4 col-sm-12 form">

        {!! Form::open(['url' => 'admin/password']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Current password:') !!}
            {!! Form::input('password', 'current_password', null, array('class'=>'form-control', 'placeholder'=>'old password', 'required'=>'required')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'New password:') !!}
            {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password', 'placeholder'=>'new password']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm password:') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control',  'placeholder'=>'confirm password']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


</div>
@endsection
