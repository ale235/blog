@extends('frontend.layouts.master')


@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-12 left-content" style="padding-bottom: 60px;">

            <div class="col-lg-8 col-lg-offset-2 form" style="">

                @if($errors->any()) 
                <ul class="errors alert alert-danger alert-dismissable" style="margin-top: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if(Session::has('notif'))
                <div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable" style="margin-top: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('notif') }}</p>
                </div>
                @endif
                
                <h3 class="form-title">Change password</h3>

                {!! Form::open(['url' => 'admin/password']) !!}
                
                <div class="row form-group">
                    <div class="col-md-6">
                        {!! Form::label('title', 'Current password:') !!}
                        {!! Form::input('password', 'current_password', null, array('class'=>'form-control', 'placeholder'=>'old password', 'required'=>'required')) !!}
                    </div>
                </div>
                
                 <div class="row form-group">
                    <div class="col-md-6">
                       {!! Form::label('body', 'New password:') !!}
                       {!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password', 'placeholder'=>'new password']) !!}
                    </div>
                    <div class="col-md-6">
                       {!! Form::label('password_confirmation', 'Confirm password:') !!}
                       {!! Form::password('password_confirmation', ['class' => 'form-control',  'placeholder'=>'confirm password']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
                
            </div>

        </div>
    </div>
</div>
@endsection
