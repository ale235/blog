<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="J.A.J.A. es una organización productora de eventos culturales, cuya temática intenta englobar toda expresión artística juvenil, relacionada a la cultura freak global, con el objetivo de canalizar esta cultura, a través de diversas producciones artísticas.">
    <meta name="author" content="">
    <meta property="og:image" content="{{asset('/img/JAJAlogopeque.png')}}" />

    <title>JAJA Eventos</title>

    @include('frontend.includes.css')

</head>

<body id="page-top">

<!-- Navigation -->
@include('frontend.includes.navbar')

<!-- Masthead -->
@include('frontend.includes.masthead')

{{--<!-- Contact Section -->--}}
{{--@include('frontend.includes.contacto')--}}

{{--Quienes Somos--}}
@include('frontend.includes.quienessomos')

<!-- Members Section -->
@include('frontend.includes.miembros')

<!-- Portfolio Section -->
@include('frontend.includes.galeria')

<!-- Stand y Artistas Section -->
@include('frontend.includes.standsyartistas')

<!-- Reseñas Section -->
@include('frontend.includes.resenia')

<!-- Portfolio Section -->
@include('frontend.includes.concursoymuestra')

<!-- Services Section -->
@include('frontend.includes.sponsors')

<!-- Call to Action Section -->
<section class="page-section" id="avales">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: -50px;">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Avales</h2>
                <hr class="divider my-4">
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- Team Member 1 -->
            @foreach($avales as $aval)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        {{--<img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">--}}
                        <img src="{{asset($aval->image_path)}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            {{--<h5 class="card-title mb-0"><a href="{{url('http://'.$miembro->slug)}}">{{$miembro->nombre}}</a></h5>--}}
                            <hr class="divider my-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-text text-black-50">{{$aval->texto_uno}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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

<!-- Footer -->
@include('frontend.includes.footerlanding')

@include('frontend.includes.js')

</body>

</html>
<style>
</style>
