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
                
                
                <form role="form" method="POST" action="{{ url('/profile') }}">
                    {{ csrf_field() }}    
                    <h3 class="form-title">My profile Form</h3>
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
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$email }}" disabled>
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
                                <div class="col-lg-12 {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    {!! Form::label('avatar', 'Avatar:') !!}
                                    {!! Form::file('avatar', ['class' => 'form-control', 'id' => 'avatar']) !!}
                                </div>
                            </div>
                            
                            <div class="" style="margin-top: 20px;">
                                <button class="btn btn-primary btn-block" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
