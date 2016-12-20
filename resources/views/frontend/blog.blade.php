@extends('frontend.layouts.master')

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        
        @include('frontend.includes.left-content')
        @include('frontend.includes.right-content')
        
    </div>
</div>
@endsection
