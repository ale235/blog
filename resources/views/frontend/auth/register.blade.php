@extends('frontend.layouts.master')
@section('auth-style')
<link href="/css/front/login.css" rel="stylesheet">
@endsection

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-12 left-content" style="padding-bottom: 60px;">

            <div class="col-lg-8 col-lg-offset-2 form auth-form" style="height: 400px; border: 0px solid silver">

                @if($errors->any()) 
                <ul class="errors alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif


                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}    
                    <h3 class="form-title">Register Form</h3>
                    <div class="row">
                        <div class="col-lg-12">	
                            <div class="row form-group">
                                <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Name</label><em>*</em>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name'):@$name }}">
                                    @if ($errors->has('name'))
                                    <span class="form-error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 {!! ($errors->has('email')) ? ' has-error' : '' !!}">
                                    <label>Email</label><em>*</em>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$email }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {!! ($errors->has('phone')) ? ' has-error' : '' !!}">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') ? old('phone'):@$phone }}">
                                    @if ($errors->has('phone'))
                                    <span class="form-error">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 {!! ($errors->has('password')) ? ' has-error' : '' !!}">
                                    <label>Password</label><em>*</em>
                                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') ? old('password'):@$password }}">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {!! ($errors->has('password_confirmation')) ? ' has-error' : '' !!}">
                                    <label>Confirm Password</label><em>*</em>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') ? old('password_confirmation'):@$password }}">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="" style="margin-top: 20px;">
                                <button class="btn btn-primary btn-block" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
@endsection
