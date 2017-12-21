@extends('frontend.layouts.master')
@section('descripcion', $post->description)
@section('titulo')
   {{$post->title}} : {{config('app.name', 'Laravel')}}
@endsection
@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        
        @include('frontend.includes.left-content-post')
        @include('frontend.includes.right-content')
        
    </div>
</div>
@endsection
