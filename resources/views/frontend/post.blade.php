@extends('frontend.layouts.master')
@section('descripcion', $post->description)
@section('titulo')
   {{$post->title}} : {{config('app.name', 'Laravel')}}
@endsection
@section('twitter-card')
    {{--<meta name="twitter:card" content="summary_large_image">--}}
    {{--<meta name="twitter:site" content="@publisher_handle">--}}
    {{--<meta name="twitter:title" content="Page Title">--}}
    {{--<meta name="twitter:description" content="Page description less than 200 characters">--}}
    {{--<meta name="twitter:creator" content="@author_handle">--}}
    {{--<!-- Twitter summary card with large image must be at least 280x150px -->--}}
    {{--<meta name="twitter:image:src" content=" http://www.example.com/image.html">--}}
@endsection

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            @include('frontend.includes.left-content-post')
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            @include('frontend.includes.right-content')
        </div>
    </div>
</div>
@endsection
