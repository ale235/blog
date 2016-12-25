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

        <!-- Styles -->
        <link href="{{ asset('/css/front/home.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    </head>
    <body>
        <div id="site">
            <section class="vcenter">
                <div id="page-content" class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{ asset('/images/laravel.png') }}" alt="Laravel" class="center">
                            <h1 class="intro-text1">Laravel Blog</h1>
                            <h2 class="intro-text2" style="">With Laravel 5.3</h2>      
                            <div class="centered">
                                <a href="{{ url('/blog') }}" class="btn btn-primary btn-start" role="button" style="">Start</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
