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
        <div class="row justify-content-center">
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

{{--<section class="page-section" id="our-team">--}}
        {{--<div class="container">--}}
            {{--<div class="row justify-content-center" style="margin-top: -50px;">--}}
                {{--<div class="col-lg-8 text-center">--}}
                    {{--<h2 class="mt-0">Stands y Artistas</h2>--}}
                    {{--<hr class="divider my-4">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<!-- Team Member 1 -->--}}
                {{--@foreach($standsyartistas as $standsyartista)--}}
                {{--<div class="col-xl-3 col-md-6 mb-4">--}}
                    {{--<div class="card border-0 shadow">--}}
                        {{--<img src="{{asset($standsyartista->image_path)}}" class="card-img-top" alt="...">--}}
                        {{--<div class="card-body text-center">--}}
                            {{--<h5 class="card-title mb-0"><a href="{{url('http://'.$standsyartista->slug)}}" target="_blank">{{$standsyartista->nombre}}</a></h5>--}}
                            {{--<div class="card-text text-black-50">Web Developer</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12" style="text-align: center; padding: 0px 0px 20px">--}}
                            {{--@if($standsyartista->facebook != null)--}}
                            {{--<a href="{{url('http://www.facebook.com/'.$standsyartista->facebook)}}" class="fa fa-facebook" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>--}}
                            {{--@endif--}}
                            {{--@if($standsyartista->instagram != null)--}}
                            {{--<a href="{{url('http://www.instagram.com/'.$standsyartista->instagram)}}" class="fa fa-instagram" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>--}}
                            {{--@endif--}}
                            {{--@if($standsyartista->instagram != null)--}}
                            {{--<a href="#" class="fa fa-twitter" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}

            {{--</div>--}}
        {{--</div>--}}
{{--</section>--}}

{{--<style>--}}

{{--</style>--}}

{{--<!-- Team Member 4 -->--}}
{{--<div class="col-xl-3 col-md-6 mb-4">--}}
    {{--<div class="card border-0 shadow">--}}
        {{--<img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">--}}
        {{--<div class="card-body text-center">--}}
            {{--<h5 class="card-title mb-0">Team Member</h5>--}}
            {{--<div class="card-text text-black-50">Web Developer</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}