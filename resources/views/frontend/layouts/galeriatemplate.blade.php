<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    @include('frontend.includes.css')

</head>

<body id="page-top" style="
                background: url('../../img/fondojaja.png');
                background-position: center;
                /*background-size: cover;*/
                background-repeat: repeat;
                background-attachment: scroll;">

<!-- Navigation -->
{{--@include('frontend.includes.navbar')--}}
@include('frontend.includes.navbar-galeria')

@yield('contenido')

@include('frontend.includes.js')

@stack('scripts')

</body>

</html>


