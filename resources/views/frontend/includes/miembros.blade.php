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
                            {{--<div class="card-text text-black-50">Web Developer</div>--}}
                        </div>
                        <div class="col-md-12" style="text-align: center; padding: 0px 0px 20px">
                            <a href="#" class="fa fa-facebook" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>
                            <a href="#" class="fa fa-instagram" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>
                            <a href="#" class="fa fa-twitter" style="padding: 9px 10px 7px 10px;width: 50px;font-size: 30px;"></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
</section>

<style>

</style>

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