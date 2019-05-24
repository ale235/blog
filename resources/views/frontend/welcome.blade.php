<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    @include('frontend.includes.css')

</head>

<body id="page-top">

<!-- Navigation -->
@include('frontend.includes.navbar')

<!-- Masthead -->
@include('frontend.includes.masthead')

<section class="page-section" id="quienessomos">
    <div class="row justify-content-center" style="margin-top: -50px;">
    <div class="col-lg-8 text-center">
        <h2 class="mt-0">Quienes somos</h2>
        <hr class="divider my-4">
    </div>
    <div class="container text-center">
        <img src="{{asset('img/JAJAlogopeque.png')}}" style="float: left;"/>
        <p class="text-muted mb-5" style="text-align: justify; font-size: large">J.A.J.A. es una organización productora de eventos culturales, cuya temática intenta englobar toda expresión artística juvenil, relacionada a la cultura freak global, con el objetivo de canalizar esta cultura, a través de diversas producciones artísticas.
            Entre las expresiones artísticas que reúne se encuentran, baile, canto, escultura, maquillaje, dibujo, arte digital, pintura, composición, producción local, cosplay, diseño de moda, ropa, imagen, fotografía, animación, videojuegos, entre otras.
            Las temáticas que incluye este movimiento son el comic, manga, historieta, anime, ciencia ficción, música, kpop, videojuegos, cine, televisión, series, etc.
        </p>
    </div>
</div>
</section>

<section class="page-section" id="miembrosdelstaff" style="
                background: url('../../img/fondojaja.png');
                background-position: center;
                /*background-size: cover;*/
                background-repeat: repeat;
                background-attachment: scroll;">
    <!-- Page Content -->
    <div class="container">
        <div class="row justify-content-center" style="margin-top: -50px;">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Organizadores</h2>
                <hr class="divider my-4">
            </div>
        </div>
        <div class="row">
            <!-- Team Member 1 -->
            @foreach($miembros as $miembro)
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    {{--<img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">--}}
                    <img src="{{asset($miembro->image_path)}}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0"><a href="{{url('http://'.$miembro->slug)}}">{{$miembro->nombre}}</a></h5>
                        <hr class="divider my-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-text text-black-50">{{$miembro->texto_uno}}</div>
                                <hr class="divider my-4">
                                <div class="card-text text-black-50">{{$miembro->texto_dos}}</div>
                                <hr class="divider my-4">
                                <div class="col-md-12" style="text-align: center; padding: 0px 0px 20px">
                                    @if($miembro->facebook != null)
                                        <a href="{{url('http://www.facebook.com/'.$miembro->facebook)}}" class="fa fa-facebook" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>
                                    @endif
                                    @if($miembro->instagram != null)
                                        <a href="{{url('http://www.instagram.com/'.$miembro->instagram)}}" class="fa fa-instagram" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>
                                    @endif
                                    @if($miembro->twitter != null)
                                        <a href="{{url('http://www.twitter.com/'.$miembro->twitter)}}" class="fa fa-twitter" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>
                                    @endif
                                    {{--@if($standsyartista->instagram != null)--}}
                                    {{--<a href="#" class="fa fa-twitter" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.container -->
</section>

<!-- Portfolio Section -->
@include('frontend.includes.portfolio')

<!-- About Section -->
@include('frontend.includes.about')

<!-- Members Section -->
@include('frontend.includes.miembros')


<!-- Contact Section -->
@include('frontend.includes.contacto')



<!-- Services Section -->
@include('frontend.includes.sponsors')


<!-- Call to Action Section -->
<section class="page-section">
    <div class="container text-center">
        <h2 class="mb-4">Avales</h2>
        <hr class="divider my-4">
        <p class="text-muted mb-5">Por el aval o Imagen (A defninir)</p>
    </div>
</section>

{{--<!-- Call to Action Section -->--}}
{{--<section class="page-section bg-dark text-white">--}}
    {{--<div class="container text-center">--}}
        {{--<h2 class="mb-4">Free Download at Start Bootstrap!</h2>--}}
        {{--<a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>--}}
    {{--</div>--}}
{{--</section>--}}

{{--<!-- Contact Section -->--}}
{{--@include('frontend.includes.contacto')--}}

{{--<!-- Footer -->--}}
{{--@include('frontend.includes.footerlanding')--}}

@include('frontend.includes.js')

</body>

</html>
<style>
</style>
