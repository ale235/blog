@extends('frontend.layouts.master')

@section('titulo',  config('app.name', 'Laravel'))
@section('descripcion')
{{config('app.name', 'Laravel')}} es un blog en el que vas a poder encontrar opiniones de muchas áreas, desde Entretenimiento, Cine, Política hasta Reflexiones y opiniones personales. ¡Pasate!
@endsection


@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">
        
        @include('frontend.includes.left-content')
        @include('frontend.includes.right-content')
        
    </div>
</div>
@endsection
