@extends('frontend.layouts.galeriatemplate')

@section('contenido')
    <div id="wrapper">
        <div id="page-content-wrapper">
            <section id="blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="single-blog">
                                <article>
                                    <section id="slider">
                                        <h3 class="post-title" style="font-size: 40px;"><a style="color: #0b0b0b" href="">{{$concursoymuestra->titulo}}</a></h3>
                                        <hr>
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach($concursosymuestrasimagen as $key => $concursosymuestrasimage)
                                                    @if($key == 0)
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="active"></li>
                                                    @else
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"></li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                @foreach($concursosymuestrasimagen as $key => $concursosymuestrasimage)
                                                    @if($key == 0)
                                                        <div class="carousel-item active" style="background-image: url({{asset($concursosymuestrasimage->image_path)}})">
                                                            <div class="carousel-caption d-none d-md-block">
                                                                <h2 class="display-4">{{$concursosymuestrasimage->titulo}}</h2>
                                                                {{--<p class="lead">This is a description for the first slide.</p>--}}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="carousel-item" style="background-image: url({{asset($concursosymuestrasimage->image_path)}})">
                                                            <div class="carousel-caption d-none d-md-block">
                                                                <h2 class="display-4">{{$concursosymuestrasimage->titulo}}</h2>
                                                                {{--<p class="lead">This is a description for the second slide.</p>--}}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </section>
                                    <br>
                                    <div>
                                        <h4 class="post-title">MEMORIA DESCRIPTIVA</h4>
                                        <hr>
                                        <div class="post-article" style="color: black">
                                            {!! $concursoymuestra->resenia !!}
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sidebar-widget" style="    margin-top: 200px;">
                                <h4 class="sidebar-title">Datos</h4>
                                <ul>
                                    <li><a href="">Ubicación: {{$concursoymuestra->lugar}}</a></li>
                                    <li><a href="">Año: {{$concursoymuestra->anio}}</a></li>
                                    {{--<li><a href="">Etapa: En Construcción</a></li>--}}
                                </ul>
                            </div>
                            <div class="sidebar-widget">
                                {{--<h4 class="sidebar-title">Galería</h4>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('scripts')
<style>
    /* 5. SLIDER */

    #slider{
        margin-top: 80px;
    }


    .carousel-item {
        height: 100vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
@endpush