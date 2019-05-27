<section id="concursosymuestras">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            @foreach($concursosymuestras as $concursosymuestra)
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{url('/')}}/concursoymuestra/{{$concursosymuestra->slug}}">
                    <img class="img-fluid" src="{{asset($concursosymuestra->image_path)}}" alt="">
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">
                            {{--Category--}}
                        </div>
                        <div class="project-name">
                            {{$concursosymuestra->titulo}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>