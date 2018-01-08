<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="icon" type="image/png" href="images/favicon.png">-->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- MetisMenu CSS -->
        <link href="{{ asset('/plugings/back/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('/css/back/sb-admin-2.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset('/plugings/back/morrisjs/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
        <link href="{{asset('plugings/lobibox/css/lobibox.min.css')}}" rel="stylesheet">
              
        <!-- Scripts -->
       
        <link href="{{ asset('/css/back/back.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/ckeditor/plugins/spoiler/spoiler.css') }}">
        @stack('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">

            @include('backend.includes.navbar')
            
            <div id="page-wrapper">
                 @yield('content')
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        
        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('/plugings/back/metisMenu/metisMenu.min.js') }}"></script>
        <script src="{{asset('plugings/lobibox/js/notifications.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('/js/back/sb-admin-2.js') }}"></script>
        <script src="{{ asset('/js/back/config.js') }}"></script>
        <script>var base_url ="{{ asset('/') }}";</script>
        <script src="{{ asset('/js/back/back.js') }}"></script>
        
        @stack('scripts')
        
       
    </body>
</html>
