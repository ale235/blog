@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">My Profile</h1>
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

    <div class="col-sm-12 form">

        {!! Form::open(['url' => 'admin/profile']) !!}

        <div class="row form-group">
            <div class="col-lg-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('username', 'Name:') !!}
                {!! Form::text('username', old('username') ? old('username'):$user->username , array('class'=>'form-control', 'placeholder'=>'Name', 'required'=>'required')) !!}
                @if ($errors->has('username'))
                <span class="form-error">{{ $errors->first('username') }}</span>
                @endif
            </div>
        </div>

        <div class="row form-group">
            <div class="col-lg-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', old('email') ? old('email'):$user->email , ['class' => 'form-control', 'id' => 'password', 'placeholder'=>'Email']) !!}
                @if ($errors->has('email'))
                <span class="form-error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="col-lg-3 {{ $errors->has('phone') ? ' has-error' : '' }}">
                {!! Form::label('phone', 'Phone:') !!}
                {!! Form::text('phone', old('phone') ? old('phone'):$user->phone, ['class' => 'form-control', 'id' => 'password', 'placeholder'=>'Phone']) !!}
                @if ($errors->has('phone'))
                <span class="form-error">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>

        <div class="row form-group">
            <div class="col-lg-6 {{ $errors->has('avatar') ? ' has-error' : '' }}">
                {!! Form::label('avatar', 'Avatar:') !!}
                {!! Form::file('avatar', ['class' => 'form-control', 'id' => 'avatar']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!} 
        </div>

        {!! Form::close() !!}

    </div> 


</div>
@endsection
