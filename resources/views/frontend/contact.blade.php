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
                
                
                <form role="form" method="POST" action="{{ url('/contact') }}">
                    {{ csrf_field() }}    
                    <h3 class="form-title">Conact Form</h3>
                    <div class="row">
                        <div class="col-lg-12">	
                            <div class="row form-group">
                                <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Name</label><em>*</em>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name'):@$name }}">
                                    @if ($errors->has('name'))
                                    <span class="form-error">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label>Phone</label>
                                    <input type="phone" name="phone" id="phone" class="form-control" value="{{ old('phone') ? old('phone'):@$phone }}">
                                    @if ($errors->has('phone'))
                                    <span class="form-error">
                                        {{ $errors->first('phone') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email</label><em>*</em>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$email }}">
                                     @if ($errors->has('email'))
                                    <span class="form-error">
                                        {{ $errors->first('email') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 {{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label>Subject</label><em>*</em>
                                    <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') ? old('subject'):@$subject }}">
                                     @if ($errors->has('subject'))
                                    <span class="form-error">
                                        {{ $errors->first('subject') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 {{ $errors->has('message') ? ' has-error' : '' }}">
                                    <label>Message</label><em>*</em>
                                    <textarea class="form-control" rows="5" name="message" id="message">{{ old('message') ? old('message'):@$message }}</textarea>
                                     @if ($errors->has('message'))
                                    <span class="form-error">
                                        {{ $errors->first('message') }}
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
