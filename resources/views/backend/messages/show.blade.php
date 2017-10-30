@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Mensaje
            <a href="{{ url('admin/messages') }}" style="float: right;font-size: 16px; margin-top:20px;">Volver a mensajes</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">

    <div class="col-lg-6 form" style="">
        <div class="row form-group">
            <div class="col-lg-6">
                <label>From name</label>
                <input type="text"  class="form-control" value="{{ @$message->from_name }}" disabled>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-6">
                <label>Phone</label>
                <input type="text"  class="form-control" value="{{ @$message->from_phone }}" disabled>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-6">
                <label>Enail</label>
                <input type="text" class="form-control" value="{{ @$message->from_email }}" disabled>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-6">
                <label>Subject</label>
                <input type="text" class="form-control" value="{{ @$message->subject }}" disabled>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-12">
                <label>Message</label>
                <textarea class="form-control" rows="10" disabled>{{ @$message->message_text }}</textarea>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-lg-12">
                <p>Sent on: {{ @$message->created_at }}</p>
                @if(!empty($users))
                <p>The Real user how sent this message: <a href="{{ url('/admin/users/edit/'.$users->users_id.'')}}">{{ @$users->username }}</a></p>
                @endif
                
            </div>
        </div>

    </div>

</div>
@endsection
