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

        <!-- CSS --><!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ asset('/ckeditor/plugins/spoiler/spoiler.css') }}">

        <link href="{{asset('plugings/lobibox/css/lobibox.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/front/front.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

        <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
        <!-- Remove "#_=_" from Facebook Redirect -->
        <script type="text/javascript">
            if (window.location.hash == '#_=_') {
                window.location.hash = ''; // for older browsers, leaves a # behind
                history.pushState('', document.title, window.location.pathname); // nice and clean
                e.preventDefault(); // no page reload
            }
        </script>
    </head>
    <body>
        <div id="site">
            @include('frontend.includes.navbar')

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="{{asset('plugings/lobibox/js/notifications.min.js')}}"></script>
        <script>var base_url ="{{ asset('/') }}";</script>
        <script src="{{ asset('js/front/config.js') }}"></script>
        <script src="{{ asset('js/front/front.js') }}"></script>
        <script id="dsq-count-scr" src="https://mates-y-papeles.disqus.com/count.js" async></script>
        <script src="{{asset('/ckeditor/plugins/spoiler/spoiler.js')}}"></script>
    </body>
</html>
