@extends('frontend.layouts.master')

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-lg-12 left-content" style="padding-bottom: 60px;">

            <div class="col-lg-8 col-lg-offset-2 auth_form" style="height: 550px; border: 0px solid silver">

                <form role="form" method="POST" action="{{ url('/contact') }}">
                    {{ csrf_field() }}    
                    <h3 class="">Conact Form</h3>
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
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label>Subject</label><em>*</em>
                                    <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') ? old('subject'):@$subject }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label>Message</label><em>*</em>
                                    <textarea class="form-control" rows="5" name="message" id="message">{{ old('message') ? old('message'):@$message }}</textarea>
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
