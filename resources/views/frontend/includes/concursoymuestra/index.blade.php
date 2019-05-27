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
                                            <div class="owl-carousel">
                                                    @foreach($concursosymuestrasimagen as $key => $imagen)
                                                        @if($key == 0)
                                                            <div class="item" id="{{$imagen->titulo}}">
                                                                <img class="img-responsive" src="{{$imagen->image_path}}" alt="">
                                                            </div>
                                                        @else
                                                            <div class="item" id="{{$imagen->titulo}}">
                                                                <img class="img-responsive" src="{{$imagen->image_path}}" alt="">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                            </div> <!--/#home-carousel-->
                                        </section>
                                        <div >
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
                        <h4 class="sidebar-title">Galería</h4>
                        <ul class="owl-carousel">
                            @foreach($concursosymuestrasimagen as $imagen)
                            <li>
                                <a>
                                    <img class="img-responsive {{$imagen->titulo}} imgchiquita" src="{{asset($imagen->image_path)}}" alt="">
                                </a>
                            </li>
                            @endforeach
                        </ul>
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

    #home-carousel  .item {
        background-position: center top;
        background-repeat: no-repeat;
        background-size:cover;
        width:100%;
        height: 650px;
    }

    #home-carousel .item:before{
        background-color: #000;
        content: "";
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        position: absolute;
        width: 100%;
    }

    .carousel-caption {
        left: 15px;
        right: 15px;
        top: 50%;
        font-size: 10px;
        text-align: left;
        color: #fff;
        text-shadow: none;
        margin-top: -130px;
    }

    .carousel-caption h1 {
        font-size:70px;
        margin-bottom:0;
        line-height:27px;
        letter-spacing:2px;
        font-weight:100;
    }

    .carousel-caption h2 {
        font-size:81px;
        font-weight:600;
        margin-top:0px;
        text-transform:lowercase;
        letter-spacing:2px;
        margin-bottom:20px;
    }

    .home-carousel-left,
    .home-carousel-right {
        background-color: #f0f0f0;
        color:#000;
        font-size: 32px;
        height: 40px;
        line-height: 40px;
        margin-top: -20px;
        position: absolute;
        text-align: center;
        top: 50%;
        width: 32px;
        z-index: 999;
        -webkit-transition: 300ms;
        -moz-transition: 300ms;
        -o-transition: 300ms;
        -ms-transition: 300ms;
        transition: 300ms;
    }

    .home-carousel-left {
        left:-32px;
    }

    .home-carousel-right {
        right:-32px;
    }

    #home-carousel:hover .home-carousel-left {
        left:0;
    }

    #home-carousel:hover .home-carousel-right {
        right:0;
    }
    /* Carousel animation */

    #home-carousel .item h1,
    #home-carousel .item h2,
    #home-carousel .item p {
        opacity:0;
        -moz-transform: scale(0.5);
        -webkit-transform: scale(0.5);
        -o-transform: scale(0.5);
        -ms-transform: scale(0.5);
        transform: scale(0.5);
    }

    #home-carousel .item h1 {
        -webkit-transition: all 0.5s ease-in-out 0.15s;
        -moz-transition: all 0.5s ease-in-out 0.15s;
        -ms-transition: all 0.5s ease-in-out 0.15s;
        -o-transition: all 0.5s ease-in-out 0.15s;
        transition: all 0.5s ease-in-out 0.15s;
    }

    #home-carousel .item.active h1,
    #home-carousel .item.active h2,
    #home-carousel .item.active p {
        opacity:1;
        -moz-transform: scale(1);
        -webkit-transform: scale(1);
        -o-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    #home-carousel .item h2 {
        -webkit-transition: all 0.5s ease-in-out 0.30s;
        -moz-transition: all 0.5s ease-in-out 0.30s;
        -ms-transition: all 0.5s ease-in-out 0.30s;
        -o-transition: all 0.5s ease-in-out 0.30s;
        transition: all 0.5s ease-in-out 0.30s;
    }

    #home-carousel .item p {
        -webkit-transition: all 0.5s ease-in-out 0.45s;
        -moz-transition: all 0.5s ease-in-out 0.45s;
        -ms-transition: all 0.5s ease-in-out 0.45s;
        -o-transition: all 0.5s ease-in-out 0.45s;
        transition: all 0.5s ease-in-out 0.45s;
    }

   /* 14. BLOG */

   .single-blog{
       margin-top: 35px;
       margin-bottom: 35px;
   }

   .post-title{
       margin-top: 20px;
       margin-bottom: 5px;
   }

   .post-meta{
       margin-bottom: 15px;
   }

   .post-meta span{
       margin-right: 6px;
       font-size: 12px;
       font-weight: 600;
       opacity: 0.6;
   }

   .post-meta span:hover{
       opacity: 1;
   }

   .post-carousel-left,
   .post-carousel-right {
       background-color: #f0f0f0;
       color:#000;
       font-size: 32px;
       height: 40px;
       line-height: 40px;
       margin-top: -20px;
       position: absolute;
       text-align: center;
       top: 50%;
       width: 32px;
       z-index: 999;
       -webkit-transition: 300ms;
       -moz-transition: 300ms;
       -o-transition: 300ms;
       -ms-transition: 300ms;
       transition: 300ms;
   }

   .post-carousel-left {
       left:-32px;
   }

   .post-carousel-right {
       right:-32px;
   }

   #post-carousel:hover .post-carousel-left {
       left:0;
   }

   #post-carousel:hover .post-carousel-right {
       right:0;
   }

   .post-link{
       background-color: #f5f5f5;
       text-align: center;
       padding: 40px 0;
       font-size: 16px;
       font-weight: 600;
   }

   .post-quote{
       background-color: #f5f5f5;
       padding: 30px;
       font-size: 16px;
       font-weight: 500;
       font-style: italic;
   }

   #blog .pagination{
       margin-bottom: 80px;
   }

   #blog .pagination li a{
       width: 35px;
       height: 35px;
       line-height: 31px;
       text-align: center;
       font-size: 16px;
       color: #a3a3a3;
       border: 1px solid #d1d1d1;
       padding: 0;
       margin-right: 5px;
       border-radius: 0;
   }

   #blog .pagination li.active a,
   #blog .pagination li a:hover{
       background-color: transparent;
       border-color: #000;
       color: #000;
   }

   .sidebar-widget{
       margin-top: 35px;
       margin-bottom: 50px;
   }

   .sidebar-widget .sidebar-title{
       margin-top: 0;
       margin-bottom: 20px;
   }

   .sidebar-widget ul{
       list-style: square;
       margin: 0;
       padding-left: 18px;
   }

   .sidebar-widget ul li{
       margin-bottom: 10px;
       font-weight: 500;
   }

   .blog-search{
       position: relative;
   }

   .blog-search input {
       border: 1px solid #d6d6d6;
       color: #8d8d8d;
       height: 44px;
       outline: medium none;
       padding: 0 50px 0 17px;
       width: 100%;
   }

   .blog-search span {
       color: #252525;
       font-size: 12px;
       position: absolute;
       right: 10px;
       top: 50%;
       transform: translateY(-50%);
       -moz-transform: translateY(-50%);
       -webkit-transform: translateY(-50%);
   }

   .blog-search .search-submit {
       background: none;
       border: none;
   }

   .blog-search:after {
       background-color: #d6d6d6;
       content: "";
       display: block;
       height: 27px;
       position: absolute;
       right: 40px;
       top: 50%;
       transform: translateY(-50%);
       -moz-transform: translateY(-50%);
       -webkit-transform: translateY(-50%);
       width: 1px;
   }

   .sidebar-widget .tagcloud a{
       padding: 4px 10px;
       border: 1px solid #ccc;
       margin: 3px 1px;
       display: inline-block;
   }

   .sidebar-widget .tagcloud a:hover{
       border-color: #000;
       color: #000;
   }

   ul.content-flickr {
       margin: 0;
       overflow: hidden;
       padding: 0;
   }

   ul.content-flickr li {
       display: block;
       float: left;
       padding: 5px 10px 5px 0;
       width: 33.33%;
   }

   .content-flickr li a {
       display: block;
       position: relative;
       width: 100%;
   }



</style>
<link rel="stylesheet" href="{{asset('css/owlcarousel/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owlcarousel/owl.theme.default.min.css')}}">
{{--<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />--}}
{{--<script src="jquery.min.js"></script>--}}
<script src="{{asset('js/owlcarousel/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
    });
</script>
{{--<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>--}}

@endpush