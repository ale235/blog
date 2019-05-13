<section id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            @foreach($galerias as $galeria)
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{url('/')}}/galeria/{{$galeria->slug}}">
                    <img class="img-fluid" src="{{asset($galeria->image_path)}}" alt="">
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">
                            Category
                        </div>
                        <div class="project-name">
                            {{$galeria->titulo}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>