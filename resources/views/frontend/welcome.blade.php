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

{{--Quienes Somos--}}
@include('frontend.includes.quienessomos')

<!-- Members Section -->
@include('frontend.includes.miembros')

<!-- Portfolio Section -->
@include('frontend.includes.galeria')

<!-- Reseñas Section -->
@include('frontend.includes.resenia')

<!-- Portfolio Section -->
@include('frontend.includes.concursoymuestra')

<!-- Contact Section -->
@include('frontend.includes.contacto')



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
            @foreach($avales as $key => $aval)
                <div class="container text-center">
                    <a href="{{url($aval->image_path)}}">
                        <img src="{{asset($aval->image_path)}}" class="thumbnail" width="10%" />
                    </a>
                    <br><br>
                    <p class="text-muted mb-5" style="text-align: center; font-size: large">
                        {{$aval->texto_uno}}
                    </p>
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
