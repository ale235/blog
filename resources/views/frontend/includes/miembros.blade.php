<section class="page-section" id="our-team">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: -50px;">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Stands y Artistas</h2>
                    <hr class="divider my-4">
                </div>
            </div>
            <div class="row">
                <!-- Team Member 1 -->
                @foreach($standsyartistas as $standsyartista)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="{{asset($standsyartista->image_path)}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">{{$standsyartista->nombre}}</h5>
                            <div class="card-text text-black-50">Web Developer</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
</section>

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