@extends('frontend.layouts.master')
@section('auth-style')
   <link href="/css/front/login.css" rel="stylesheet">
@endsection

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-12 left-content" style="padding-bottom: 60px;">

            <div class="col-lg-6 col-lg-offset-3 auth-form" style="height: 400px;">
                <form role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}    
                    <h3 class="form-title">Forgot password</h3>
                    <div class="row">
                        <div class="col-lg-12">	
                            <div class="input-group" style="margin-top: 20px;">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="email address">
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
