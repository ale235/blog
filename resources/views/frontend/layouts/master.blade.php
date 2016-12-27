<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/favicon.png">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        
        <link href="{{asset('plugings/lobibox/css/lobibox.min.css')}}" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/front/front.css') }}" rel="stylesheet">
        @yield('auth-style')

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
                <div id="page-content-wrapper">
                    @yield('content')
                </div>
            </div>

            @include('frontend.includes.footer')
        </div>

        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
        <script src="{{asset('plugings/lobibox/js/notifications.min.js')}}"></script>
        <script>var base_url ="{{ asset('/') }}";</script>
        <script src="{{ asset('js/front/config.js') }}"></script>
        <script src="{{ asset('js/front/front.js') }}"></script>
    </body>
</html>
