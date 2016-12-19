@extends('frontend.layouts.master')
@section('auth-style')
   <link href="/css/front/login.css" rel="stylesheet">
@endsection

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-12 left-content" style="padding-bottom: 60px;">

            <div class="col-lg-8 col-lg-offset-2 form auth-form" style="height: 400px; border: 0px solid silver">

                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}    
                    <h3 class="form-title">Register Form</h3>
                    <div class="row">
                        <div class="col-lg-12">	
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Name</label><em>*</em>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name'):@$name }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Email</label><em>*</em>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$email }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') ? old('phone'):@$phone }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Password</label><em>*</em>
                                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') ? old('password'):@$password }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Confirm Password</label><em>*</em>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') ? old('password_confirmation'):@$password }}">
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
