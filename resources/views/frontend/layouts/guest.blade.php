<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>TOYOTER | REPUESTOS TOYOTA, MARCAS JAPONESAS y COREANAS</title>
        <!-- Tell the browser to be responsive to screen width -->
        @yield('card');

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/brands.css" integrity="sha384-BKw0P+CQz9xmby+uplDwp82Py8x1xtYPK3ORn/ZSoe6Dk3ETP59WCDnX+fI1XCKK" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                /*background-color: #fff;*/
                background-image: url("../images/toyoterlanding.jpg");
                /*background-size: 100%;*/
                background-size: 100%;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            ul {
                padding:0;
                list-style: none;
            }
            .footer-social-icons {
                width: 350px;
                display:block;
                margin: 0 auto;
            }
            .social-icon {
                color: #fff;
            }
            ul.social-icons {
                margin-top: 10px;
            }
            .social-icons li {
                vertical-align: top;
                display: inline;
                height: 100px;
            }
            .social-icons a {
                color: #fff;
                text-decoration: none;
            }
            .fa-facebook {
                padding:10px 14px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                /*background-color: #322f30;*/
            }
            .fa-facebook:hover {
                background-color: #3d5b99;
            }
            .fa-twitter {
                padding:10px 12px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                /*background-color: #322f30;*/
            }
            .fa-twitter:hover {
                background-color: #00aced;
            }
            .fa-youtube {
                padding:10px 14px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                /*background-color: #322f30;*/
            }
            .fa-youtube:hover {
                background-color: #e64a41;
            }

        </style>
    </head>
    <body>
    <header>
        {{--<nav class="navbar navbar-expand-lg bg-dark navbar-dark">--}}
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid"  style="z-index:100;">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/toyoterlogo.png') }}" alt="Smiley face" width="15%">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/buscar') }}"><strong><p>Buscar</p></strong></a></li>
                        @if (Route::has('login'))
                            @auth
                            @role('admin')
                            <li class="nav-item active"><a class="nav-link" href="{{ url('/home') }}"><strong>Admin</strong></a></li>
                            @endrole
                            <li>
                                <a class="nav-link " href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><strong>Ingresar</strong></a></li>
                            {{--@if (Route::has('register'))--}}
                                {{--<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>--}}
                            {{--@endif--}}
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container" style="padding-top: 10px;">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
        @stack('scripts')


    </body>
</html>
