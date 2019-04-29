<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('descripcion')" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- SEO -->
        <title>@yield('titulo')</title>
        @yield('auth-style')
        <!-- Twitter Card data -->
        @yield('twitter-card')

        <!-- CSS -->
        @include('frontend.includes.css')

        <link href="{{ asset('css/front/front.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    </head>
    <body>
        <div id="site">
            @include('frontend.includes.blog.navbar')

            <div id="wrapper">
                <div id="page-content-wrapper" style="
                background: url('../../img/fondojaja.png');
                background-position: center;
                /*background-size: cover;*/
                background-repeat: repeat;
                background-attachment: scroll;">
                    @yield('content')
                </div>
            </div>

            @include('frontend.includes.footer')
        </div>

        <!-- JS -->
        @include('frontend.includes.js')
    </body>
</html>
