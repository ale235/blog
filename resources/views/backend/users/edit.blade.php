@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Edit User
            <a href="{{ url('admin/users') }}" style="float: right;font-size: 16px; margin-top:20px;">Back to Users</a>
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


                <form role="form" method="POST" action="{{ url("/admin/users/edit/$user->users_id") }}">
                    {{ csrf_field() }}    
                    <div class="row">
                        <div class="col-lg-12">	
                            <div class="row form-group">
                                <div class="col-md-6 {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label>Name</label><em>*</em>
                                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ? old('username'):$user->username }}">
                                    @if ($errors->has('username'))
                                    <span class="form-error">
                                        {{ $errors->first('username') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {!! ($errors->has('phone')) ? ' has-error' : '' !!}">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') ? old('phone'):$user->phone }}">
                                    @if ($errors->has('phone'))
                                    <span class="form-error">
                                        {{ $errors->first('phone') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 {!! ($errors->has('email')) ? ' has-error' : '' !!}">
                                    <label>Email</label><em>*</em>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):$user->email }}">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {!! ($errors->has('users_role_id')) ? ' has-error' : '' !!}">
                                    <label>Role</label><em>*</em>
                                    <select id="users_role_id" name="users_role_id" class="form-control">
                                        <option value="" style="display: none"></option>
                                        <option value="1" {{ ($user->users_role_id == '1' ? "selected":"") }}>Administrator</option>
                                        <option value="2" {{ ($user->users_role_id == '2' ? "selected":"") }}>Manager</option>
                                        <option value="3" {{ ($user->users_role_id == '3' ? "selected":"") }}>User</option>
                                    </select>
                                    @if ($errors->has('users_role_id'))
                                    <span class="help-block">
                                        {{ $errors->first('users_role_id') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>User Status</label><em>*</em>
                                    <select id="users_status_id" name="users_status_id" class="form-control">
                                        <option value="1" {{ ($user->users_status_id == '1' ? "selected":"") }}>Active</option>
                                        <option value="2" {{ ($user->users_status_id == '2' ? "selected":"") }}>Inactive</option>
                                        <option value="3" {{ ($user->users_status_id == '3' ? "selected":"") }}>Disabled</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <!--<label><input type="checkbox" id="reset_password" name="reset_password"> Reset Password</label>-->
                                    {{ Form::checkbox('reset_password', '1', old('reset_password', false), array('id'=>'reset_password', 'class' => 'check')) }}

                                    {{ Form::label('reset_password', 'Reset Password') }}

                                </div>
                            </div>
                            
                            <div class="row form-group row-password" style="<?php if(!old('reset_password')) echo 'display:none'?>">
                                <div class="col-md-6 {!! ($errors->has('password')) ? ' has-error' : '' !!}">
                                    <label>Password</label><em>*</em>
                                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') ? old('password'):@$password }}">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {!! ($errors->has('password_confirmation')) ? ' has-error' : '' !!}">
                                    <label>Confirm Password</label><em>*</em>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') ? old('password_confirmation'):@$password }}">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                                   
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block-" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

          
        </div>
    
    
</div>
@endsection
