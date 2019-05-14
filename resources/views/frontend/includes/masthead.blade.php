<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10">
                <img src="{{url($header->image_path)}}">
            </div>
            @if($header->style_type == 0)
            <div class="col-lg-10 align-self-baseline">
                <p class="text-uppercase text-black-75 font-weight-light mb-5" style="font-family: 'Sigmar One', cursive;">Jornadas de Arte Juvenil Alternativo</p>
                <p class="font-weight-light descripcion" style="font-family: 'Sigmar One', cursive;">Jornada de Arte Juvenil Alternativa es una exposición cuya temática intenta englobar toda expresión artística juvenil, relacionada a la cultura freak global no popular, con el objetivo de canalizar esta cultura, a través de diversas producciones artísticas.</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">¡Se parte!</a>
            </div>
            @endif
        </div>
    </div>
</header>