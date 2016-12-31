@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show Post
            <a href="{{ url('admin/post') }}" class="btn btn-default" role="button" style="float: right">Back to Post</a>
            <a href="{{ url('admin/post/'.$post->post_id.'/edit') }}" class="btn btn-default" role="button" style="float: right; margin-right:10px">Edit</a>
            <a href="{{ url('admin/post/'.$post->post_id.'/delete') }}" class="btn btn-danger" role="button" style="float: right; margin-right:10px">Delete</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="container">


    <div class="row">
        <h2>{{ $post->title }}</h2>
        <div class="col-lg-12 post post-summary" style="border: 1px dotted silver;padding: 15px;">
            {!! $post->summary !!}
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12 post post-content" style="border: 1px dotted silver;padding: 15px;">
            {!! $post->content !!}
        </div>    
    </div>

</div>   
@endsection


    <style>
        .post img[align="left"], .post img[style*="float: left"], .post img[style*="float:left"]{
            margin: 0px 15px 15px 0px;
        }
        .post img[align="right"], .post img[style*="float: right"], .post img[style*="float:right"]{
            margin: 0px 0px 15px 15px;
        }
    </style>