<section class="page-section" id="quienessomos">
    <div class="row justify-content-center" style="margin-top: -50px;">
        <div class="col-lg-8 text-center">
            <h2 class="mt-0">¿Quienes somos?</h2>
            <hr class="divider my-4">
        </div>
        <div class="container text-center">
            <div class="row justify-content-center">
                @foreach($quienessomos as $quienessomo)
                    <div class="col-xl-12 col-md-12 mb-12">
                        <img src="{{asset($quienessomo->image_path)}}" style="float: left;"/>
                        <p class="text-muted mb-5" style="text-align: justify; font-size: large">
                            {{$quienessomo->texto_uno}}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>