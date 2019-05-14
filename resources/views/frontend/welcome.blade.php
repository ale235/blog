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

<!-- Members Section -->
@include('frontend.includes.miembros')

<!-- About Section -->
@include('frontend.includes.about')

<!-- Portfolio Section -->
@include('frontend.includes.portfolio')


<!-- Services Section -->
@include('frontend.includes.sponsors')


<!-- Contact Section -->
@include('frontend.includes.contacto')

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
