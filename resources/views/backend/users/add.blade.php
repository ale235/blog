@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New User</h1>
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


                <form role="form" method="POST" action="{{ url('/admin/users/add') }}">
                    {{ csrf_field() }}    
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
                                <div class="col-md-6 {!! ($errors->has('email')) ? ' has-error' : '' !!}">
                                    <label>Email</label><em>*</em>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$email }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {!! ($errors->has('users_role_id')) ? ' has-error' : '' !!}">
                                    <label>Role</label><em>*</em>
                                    <select id="users_role_id" name="users_role_id" class="form-control">
                                        <option value="" style="display: none"></option>
                                        <option value="1" {{ (old('users_role_id') == '1' ? "selected":"") }}>Administrator</option>
                                        <option value="2" {{ (old('users_role_id') == '2' ? "selected":"") }}>Manager</option>
                                        <option value="3" {{ (old('users_role_id') == '3' ? "selected":"") }}>User</option>
                                    </select>
                                    @if ($errors->has('users_role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('users_role_id') }}</strong>
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
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block-" type="submit">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

           

        </div>
    
    
    
</div>
@endsection
